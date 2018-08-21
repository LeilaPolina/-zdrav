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

    function get_homecheckup_only_price($db, $homecheckup_arr){
        $homecheckup_only_price = 0;
        if(count($homecheckup_arr) > 0){
            
            $get_homecheckup_sum = $db->prepare('SELECT home_checkup_name, home_checkup_price
                                                FROM home_checkup_types
                                                WHERE home_checkup_name = :home_checkup_name');

            foreach($homecheckup_arr as $homecheckup){
            // get homecheckup price
                $get_homecheckup_sum->execute(array(
                    ':home_checkup_name' => $homecheckup
                ));

                while($row = $get_homecheckup_sum->fetch(PDO::FETCH_ASSOC)){
                    $homecheckup_only_price += $row['home_checkup_price'];
                }
            }
        }
        return $homecheckup_only_price;
    }

    function get_total_price($db, $complex_arr, $homecheckup_arr){
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

                while($row = $get_complexes_sum->fetch(PDO::FETCH_ASSOC)){
                    $complexes_price += $row['complex_price'];
                }

                // get complex items
                $get_all_ordered->execute(array(
                    ':complex_name' => $complex
                ));

                while($row = $get_all_ordered->fetch(PDO::FETCH_ASSOC)){
                    array_push($every_item, $row);
                }
            }

            $price_substract = get_repeating_items_price($every_item);
            $homecheckup_only_price = get_homecheckup_only_price($db, $homecheckup_arr);

            return $homecheckup_only_price + $complexes_price - $price_substract;
        }
        catch(Exception $e){
            return $e->getMessage();
        }
    }

    function send_email($content, $user_phone){
        // === EMAIL ===
        $to      = 'wayay@yandex.ru, zdrav.rf@mail.ru';
        $subject = 'Новый заказ';
        $message = 'Пользователь с номером '.$user_phone.' заказал: '.$content;

        mail($to, $subject, $message);
        // === /EMAIL === 
    }

    function process_order($db, $complex_arr, $homecheckup_arr, $order_str, $user_phone){
        try{            
            $total_price = get_total_price($db, $complex_arr, $homecheckup_arr);
            $order_content = "Домашний медосмотр\nСостав заказа:\n".$order_str.
                            "\nОбщая сумма: ".$total_price.
                            "\nКОНЕЦ ЗАКАЗА";
            
            if($user_phone){
                //send_email($order_content, $user_phone);
                return 'OK';
            }
            return 'no phone number is set';
        }
        catch(Exception $e){
            return $e->getMessage();
        }
    }

    if(isset($_POST['order']) && $_POST['order'] == true){
        $order_an_str = $_POST['order_an_items'];
        $order_checkup_str = $_POST['order_checkup_items'];
        $_POST['order'] = false;

        $user_phone = $_POST['user_phone'];
        $order_str = $order_checkup_str.$order_an_str;

        $complex_arr = explode("\n", $order_an_str);
        array_pop($complex_arr);

        $homecheckup_arr = explode("\n", $order_checkup_str);        
        array_pop($homecheckup_arr);

        echo json_encode(array('result' => process_order($db, $complex_arr, $homecheckup_arr, $order_str, $user_phone)));
    }
    
    if(isset($_POST['get_price']) && $_POST['get_price'] == true){
        $order_an_str = $_POST['order_an_items'];
        $order_checkup_str = $_POST['order_checkup_items'];

        $complex_arr = explode("\n", $order_an_str);
        array_pop($complex_arr);

        $homecheckup_arr = explode("\n", $order_checkup_str);        
        array_pop($homecheckup_arr);
        
        echo json_encode(array('result' => get_total_price($db, $complex_arr, $homecheckup_arr)));
    }
?>