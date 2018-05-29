<?php
    include_once('includes/config.php');
    
    //phone number format: +7 (555) 555-55-55
    // test with '{"login": "+7 (999) 777-77-77", "password": "test"}';

    function login_attempt($user_input, $db, $user){        
        $server_answer = $user->login($user_input['login'], $user_input['password']);
        if($server_answer){
            return $_SESSION['user_id'];
        }
        else{
            return -1;
        }
    }
    
    if(isset($_GET['mobile_login'])){
        $user_input = json_decode($_GET['mobile_login'], true);
        $server_answer = json_encode(Array('answer' => login_attempt($user_input, $db, $user)));
        echo $server_answer;
    }
?>