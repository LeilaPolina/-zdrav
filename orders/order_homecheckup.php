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
            $order_content = "Домашний медосмотр";

            if(isset($_POST['uzi_stomach']) && $_POST['uzi_stomach'] == true){
                $order_content = $order_content.", УЗИ брюшной полости на дому";
            }
            if(isset($_POST['uzi_liver']) && $_POST['uzi_liver'] == true){
                $order_content = $order_content.", УЗИ печени и желчного органа";
            }
            if(isset($_POST['uzi_pee']) && $_POST['uzi_pee'] == true){
                $order_content = $order_content.", УЗИ мочевого органа и мочеточников";
            }
            if(isset($_POST['uzi_vessels']) && $_POST['uzi_vessels'] == true){
                $order_content = $order_content.", УЗИ сосудов нижних конечностей (вены + артерии)";
            }
            if(isset($_POST['uzi_heart']) && $_POST['uzi_heart'] == true){
                $order_content = $order_content.", УЗИ сердца";
            }
            if(isset($_POST['uzi_lungs']) && $_POST['uzi_lungs'] == true){
                $order_content = $order_content.", Рентген легких на дому";
            }

            $order_content = $order_content." КОНЕЦ ЗАКАЗА";

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