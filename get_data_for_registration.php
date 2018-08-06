<?php include_once('includes/config.php'); ?>
<?php
    include_once('modules/general_data_src.php');

    if(isset($_POST['get_reg_data'])){
        try{
            echo json_encode(array('result' => $user_data_arr));
        }
        catch(Exception $e){
            $e->getMessage();
        }
    }
?>