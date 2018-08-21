<?php include_once('../includes/config.php'); ?>
<?php

    function get_repeating_items_price($every_item){
        $unique_items = array();
        $repeating_items = array();
        $price_substract = 0;
        foreach($every_item as $item){
            if(!in_array($item, $unique_items)){
                array_push($unique_items, $item);
            }
            else{
                if(!in_array($item, $repeating_items)){
                    array_push($repeating_items, $item);
                    $price_substract += $item['complex_items_price'];
                }
                else{
                    $price_substract += $item['complex_items_price'];
                }
            }
        }
        return $price_substract;
    }

    function get_unique($every_item){
        $unique_items = array();
        foreach($every_item as $item){
            if(!in_array($item, $unique_items)){
                array_push($unique_items, $item);
            }
        }
        return $unique_items;
    }

    function get_total_price($db, $complex_arr){
        try{
            $complexes_price = 0;
            $every_item = array();
            $get_complexes_sum = $db->prepare('SELECT complex_name, complex_price
                                        FROM complex_types
                                        WHERE complex_name = :complex_name');

            $get_all_ordered = $db->prepare('SELECT complex_items_name, complex_items_price
                                            FROM complex_items
                                            WHERE complex_items_id IN
                                            (SELECT complex_sets_complex_item_id 
                                                FROM complex_sets 
                                                WHERE complex_sets_complex_type_id = 
                                                (SELECT complex_type_id 
                                                    FROM complex_types 
                                                    WHERE complex_name = :complex_name))');
            foreach($complex_arr as $complex){
                // get complexes price
                $get_complexes_sum->execute(array(
                    ':complex_name' => $complex
                ));
                $row = $get_complexes_sum->fetch(PDO::FETCH_ASSOC);
                $complexes_price += $row['complex_price'];

                // get complex items
                $get_all_ordered->execute(array(
                    ':complex_name' => $complex
                ));

                while($row = $get_all_ordered->fetch(PDO::FETCH_ASSOC)){
                    array_push($every_item, $row);
                }
            }
            $price_substract = get_repeating_items_price($every_item);
            
            return $complexes_price - $price_substract;
        }
        catch(Exception $e){
            return $e->getMessage();
        }
    }

    function get_items_from_order_price($db, $complex_arr){
        try{
            $get_unique_items = $db->prepare('SELECT complex_items_name, complex_items_price
                                            FROM complex_items
                                            WHERE complex_items_id IN 
                                                (SELECT complex_sets_complex_item_id
                                                FROM complex_sets
                                                WHERE complex_sets_complex_type_id IN
                                                    (SELECT complex_type_id
                                                    FROM complex_types
                                                    WHERE complex_name = :complex_name))');
            $every_item = array();
            foreach($complex_arr as $complex){
                $get_unique_items->execute(array(
                    ':complex_name' => $complex
                ));
                while($row = $get_unique_items->fetch(PDO::FETCH_ASSOC)){
                    array_push($every_item, $row);
                }
            }
            $unique_items = get_unique($every_item);
            $items_price = 0;
            foreach($unique_items as $item){
                $items_price += $item['complex_items_price'];
            }
            // обработка особого случая
            $subcase_complex = "Комплексный анализ крови на витамины (A, D, E, K, C, B1, B5, B6, В9, B12)";
            if(array_search($subcase_complex, $complex_arr)){
                $get_complex_price = $db->prepare('SELECT complex_price
                                                FROM complex_types
                                                WHERE complex_name = :complex_name');
                $get_complex_price->execute(array(
                    ':complex_name' => $subcase_complex
                ));
                $row = $get_complex_price->fetch(PDO::FETCH_ASSOC);            
                $items_price += $row['complex_price'];
            }

            return $items_price;
        }
        catch(Exception $e){
            return $e->getMessage();
        }
    }
    
    //if(isset($_POST['']) && $_POST['']){

    //}
        $order_str = "Гормональный профиль (комплекс) для женщин\n;";//Гормональный профиль (комплекс) для мужчин\n";

        $complex_arr = explode("\n", $order_str);
        array_pop($complex_arr);
    
        print(get_total_price($db, $complex_arr));
        //print(get_items_from_order_price($db, $complex_arr));
?>