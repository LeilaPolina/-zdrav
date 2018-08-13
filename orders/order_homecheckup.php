<?php include_once('../includes/config.php'); ?>

<?php

    function send_email($content, $user_phone){
        // === EMAIL ===
        $to      = 'wayay@yandex.ru, zdrav.rf@mail.ru';
        $subject = 'Новый заказ';
        $message = 'Пользователь с номером '.$user_phone.' заказал: '.$content;

        mail($to, $subject, $message);
        // === /EMAIL === 
    }

    function process_home_checkup_order(){
        try{
            $order_content = "Домашний медосмотр\nСостав заказа:\n".$_POST['order_items'].
                            "\nОбщая сумма: ".$_POST['price'].
                            "\nКОНЕЦ ЗАКАЗА";
            
            if(isset($_POST['user_phone'])){
                //send_email($order_content, $_POST['user_phone']);
                return 'OK';
            }
            return 'no phone number is set';
        }
        catch(Exception $e){
            return $e->getMessage();
        }
    }

    if(isset($_POST['home_checkup']) && $_POST['home_checkup'] == true){
        $_POST['home_checkup'] = false;
        echo json_encode(array('result' => process_home_checkup_order()));
    }
?>