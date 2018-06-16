<?php
    include_once('includes/config.php');

    if(isset($_POST['health_result_name'])){
        $result_name = $_POST['health_result_name'];
        echo json_encode(array('result' => $result_name));
    }
?>