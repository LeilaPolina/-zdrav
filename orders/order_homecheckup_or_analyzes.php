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
            $order_info = array('total_price' => 0, 'complexes' => array());
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
                    array_push($order_info['complexes'], array('name' => $complex, 'price' => $row['complex_price']));
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
            $order_info['total_price'] = $homecheckup_only_price + $complexes_price - $price_substract;
            return $order_info;
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

    function save_order($db, $user, $order_content, $total_price, $user_phone){
        if($user->is_logged_in()){
            $save_order = $db->prepare('INSERT INTO user_orders 
                                    (user_orders_user_id, user_phone, user_orders_contains, user_orders_price, user_orders_date, user_orders_status) 
                                    VALUES (:user_id, :user_phone, :order_contains, :price, now(), :order_status)');                                    
            $save_order->execute(array(
                ':user_id' => $_SESSION['user_id'], 
                ':user_phone' => $user_phone,
                ':order_contains' => $order_content, 
                ':price' => $total_price,
                ':order_status' => "поступил"
            ));
        }
        else{
            $save_order = $db->prepare('INSERT INTO user_orders 
                                    (user_phone, user_orders_contains, user_orders_price, user_orders_date, user_orders_status) 
                                    VALUES (:user_phone, :order_contains, :price, now(), :order_status)');            
            $save_order->execute(array(
                ':user_phone' => $user_phone,
                ':order_contains' => $order_content, 
                ':price' => $total_price,
                ':order_status' => "поступил"
            ));
        }
    }

    function process_order($db, $user, $complex_arr, $homecheckup_arr, $user_phone){
        try{
            $order_info = get_total_price($db, $complex_arr, $homecheckup_arr);

            $order_content = "Домашний медосмотр\nСостав заказа:\n";
            foreach($order_info['complexes'] as $complex){
                $order_content = $order_content.$complex['name']." ".$complex['price']."\n";
            }
            $order_content = $order_content."\nОбщая сумма: ".$order_info['total_price']."\nКОНЕЦ ЗАКАЗА";

            if($user_phone){
                save_order($db, $user, $order_content, $order_info['total_price'], $user_phone);
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
        $_POST['order'] = false;

        $user_phone = $_POST['user_phone'];
        $complex_arr = explode("\n", $_POST['order_an_items']);
        $homecheckup_arr = explode("\n", $_POST['order_checkup_items']);

        array_pop($complex_arr);
        array_pop($homecheckup_arr);

        echo json_encode(array('result' => process_order($db, $user, $complex_arr, $homecheckup_arr, $user_phone)));
    }
    
    if(isset($_POST['get_price']) && $_POST['get_price'] == true){
        $order_an_str = $_POST['order_an_items'];
        $order_checkup_str = $_POST['order_checkup_items'];

        $complex_arr = explode("\n", $order_an_str);
        $homecheckup_arr = explode("\n", $order_checkup_str); 

        array_pop($complex_arr);      
        array_pop($homecheckup_arr);

        $total_price = get_total_price($db, $complex_arr, $homecheckup_arr)['total_price'];
        
        echo json_encode(array('result' => $total_price));
    }
?>