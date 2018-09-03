<?php include_once('../includes/config.php'); ?>

<?php

function send_email($content){
    // === EMAIL ===
    $to      = 'zdrav.rf@mail.ru';
    $subject = 'Новый заказ (сервис в разработке)';
    $message = 'Был сделан заказ: '.$content;

    mail($to, $subject, $message);
    // === /EMAIL === 
}

function process_order($content){
    try{
        //send_email($content);
        return "OK";
    }
    catch(Exception $e){
        return $e->getMessage();
    }
}

if(isset($_POST['notify']) && $_POST['notify'] == true){
    echo json_encode(array('result' => process_order($_POST['message'])));
}
?>