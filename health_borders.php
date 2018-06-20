<?php
    include_once('includes/config.php');
    $cur_user_id = $_SESSION['user_id'];
    
    $get_user_data = $db->prepare('SELECT user_age, user_sex, user_height FROM user_data WHERE user_data_user_id = :user_id');
	$get_user_data->execute(array(
		':user_id' => $cur_user_id
	));
    $user_data_row = $get_user_data->fetch(PDO::FETCH_ASSOC);

    function get_age($birthyear){
        $today = new DateTime();
        $birthdate = new DateTime($birthyear);
        $interval = $today->diff($birthdate);
        $user_age = (int)$interval->format('%y');
        return $user_age;
    }

    function count_percent($user_screen_value, $norms){
        // border_kind legend: lower = -2, lower_ten_percent = -1, normal = 0, upper_ten percent = 1, upper = 2
        try{			
            $result_arr = Array('border_kind' => 0, 'result_percent' => 0.0, 'result_lower_norm'=>$norms[0], 'result_upper_norm'=>$norms[1]);
            if($user_screen_value < $norms[0]){ // lower
                $result = (($user_screen_value*100)/$norms[0]) - 100;
                $result_arr['border_kind'] = -2;
                $result_arr['result_percent'] = -round($result, 2);
            }
            else if($user_screen_value > $norms[1]){ // upper
                $result = (($user_screen_value*100)/$norms[1]) - 100;                    
                $result_arr['border_kind'] = 2;
                $result_arr['result_percent'] = round($result, 2);
            }
            else{ // normal
                $ten_percent_check = ($norms[1] - $norms[0])*0.1;
                if($user_screen_value < ($norms[0] + $ten_percent_check)){                        
                    $result_arr['border_kind'] = -1;
                }
                else if($user_screen_value > ($norms[1] - $ten_percent_check)){                    
                    $result_arr['border_kind'] = 1;
                }
                else{
                    $result_arr['border_kind'] = 0;
                }
            }
            return $result_arr;
        }
        catch(Exception $e){
            return $e->getMessage();/////////////
        }
    }
    
    function evaluate_cholesterol($user_age, $user_cholesterol){
        $cholesterol_norms = Array(5=>Array(2.95, 5.25), 10=>Array(3.13, 5.25), 15=>Array(3.08, 5.23), 
        20=>Array(2.93, 5.10), 25=>Array(3.16, 5.59), 30=>Array(3.32, 5.75), 35=>Array(3.37, 5.96), 
        40=>Array(3.63, 6.27), 45=>Array(3.81, 6.53), 50=>Array(3.94, 6.86), 55=>Array(4.20, 7.38), 
        60=>Array(4.45, 7.77), 65=>Array(4.45, 7.69), 70=>Array(4.43, 7.85), 75=>Array(4.48, 7.25));
        for($ind = 5; $ind <= 75; $ind += 5)
        {
            if(($user_age < $ind) || ($ind == 75)){
                return count_percent($user_cholesterol, $cholesterol_norms[$ind]);
            }
        }
    }
    
    function evaluate_glucose($user_glucose){
        $glucose_norms = Array(3.3, 5.5);
        return count_percent($user_glucose, $glucose_norms);
    }

    function evaluate_pressure($user_age, $user_sex, $user_pressure){
        $male_pressure_norms = Array(5=>Array(83, 107, 55, 79), 10 => Array(93, 117, 60, 80), 15=>Array(93, 117, 60, 80), 20=>Array(105, 129, 73, 81), 
        25=>Array(108, 132, 75, 83), 30=>Array(110, 132, 76, 84), 35=>Array(113, 137, 77, 85), 40=>Array(114, 138, 78, 86), 
        45=>Array(115, 139, 79, 87), 50=>Array(116, 140, 80, 88), 55=>Array(118, 142, 81, 89), 60=>Array(120, 144, 82, 90), 
        65=>Array(123, 147, 81, 89), 70=>Array(123, 147, 76, 84), 75=>Array(123, 147, 76, 84));

        $female_pressure_norms = Array(5=>Array(83, 107, 55, 79), 10 => Array(93, 117, 60, 80), 15=>Array(93, 117, 60, 80), 20=>Array(105, 129, 69, 77), 
        25=>Array(108, 132, 71, 79), 30=>Array(110, 132, 76, 84), 35=>Array(113, 137, 77, 85), 40=>Array(114, 138, 79, 87), 
        45=>Array(115, 139, 80, 88), 50=>Array(116, 140, 81, 89), 55=>Array(118, 142, 81, 89), 60=>Array(120, 144, 82, 90), 
        65=>Array(123, 147, 83, 91), 70=>Array(123, 147, 84, 92), 75=>Array(123, 147, 85, 93));

        $result_arr = Array('upper' => Array('border_kind' => 0, 'result_percent' => 0.0), 
        'lower'=>Array('border_kind' => 0, 'result_percent' => 0.0));
        $upper_pressure_norms = Array();        
        $lower_pressure_norms = Array();

        if($user_sex == 'male'){
            for($ind = 5; $ind <= 75; $ind+=5){
                if(($user_age < $ind) || ($ind == 75)){
                    $upper_pressure_norms[0] = $male_pressure_norms[$ind][0];
                    $upper_pressure_norms[1] = $male_pressure_norms[$ind][1];
                    $lower_pressure_norms[0] = $male_pressure_norms[$ind][2];
                    $lower_pressure_norms[1] = $male_pressure_norms[$ind][3];
                }
            }
        }
        else{
            for($ind = 5; $ind <= 75; $ind+=5){
                if(($user_age < $ind) || ($ind == 75)){
                    $upper_pressure_norms[0] = $female_pressure_norms[$ind][0];
                    $upper_pressure_norms[1] = $female_pressure_norms[$ind][1];
                    $lower_pressure_norms[0] = $female_pressure_norms[$ind][2];
                    $lower_pressure_norms[1] = $female_pressure_norms[$ind][3];               
                }
            }
        }

        $result_arr['upper'] = count_percent($user_pressure['upper'], $upper_pressure_norms);
        $result_arr['lower'] = count_percent($user_pressure['lower'], $lower_pressure_norms);
        return $result_arr;
    }

    function evaluate_weight($user_weight, $user_height){
        if ($user_height == 0) {
			$user_height = 1;
		}
        $index_mass = round($user_weight / pow($user_height/100, 2), 2);
        $mass_norms = Array(20, 25);
		$result_arr = count_percent($index_mass, $mass_norms);
		
		$result_arr['result_upper_norm'] = round(((25 * $user_height * $user_height)/10000), 0);
		$result_arr['result_lower_norm'] = round(((20 * $user_height * $user_height)/10000), 0);
        return $result_arr;
    }

    function send_result_to_db($db, $cur_user_id, $result_name, $result_date, $result_value, $evaluated_value){
        try{
            if($result_name != 'давление'){
                $send_result = $db->prepare('INSERT INTO user_results (user_results_user_id, user_results_result_type_id, current_value, result_date, user_results_lapse_percent, user_results_border_kind, user_results_lower_norm, user_results_upper_norm) VALUES (:user_id, (SELECT result_type_id FROM result_types WHERE result_type_name = :result_name), :result_value, :result_date, :lapse_percent, :border_kind, :lower_norm, :upper_norm)
                ON DUPLICATE KEY UPDATE current_value = :result_value, user_results_lapse_percent = :lapse_percent, user_results_border_kind = :border_kind, user_results_lower_norm = :lower_norm, user_results_upper_norm = :upper_norm');
                $send_result->execute(Array(
                    ':user_id' => $cur_user_id,
                    ':result_name' => $result_name,
                    ':result_value' => $result_value,
                    ':result_date' => $result_date,
					':lapse_percent' => $evaluated_value['result_percent'],
					':border_kind' => $evaluated_value['border_kind'],
					':lower_norm' => $evaluated_value['result_lower_norm'],
					':upper_norm' => $evaluated_value['result_upper_norm']
                ));
                // update weight in user_data
                if($result_name == 'вес'){
                    $send_result = $db->prepare('UPDATE user_data SET user_weight = :result_value WHERE user_data_user_id = :user_id');
                    $send_result->execute(Array(
                        ':user_id' => $cur_user_id,
                        ':result_value' => $result_value
                    ));
                }
                return "OK";
            }
            else if($result_name == 'давление'){
                $send_result = $db->prepare('INSERT INTO user_results (user_results_user_id, user_results_result_type_id, current_value, result_date, user_results_lapse_percent, user_results_border_kind, user_results_lower_norm, user_results_upper_norm) VALUES (:user_id, (SELECT result_type_id FROM result_types WHERE result_type_name = :result_name), :result_value, :result_date, :lapse_percent, :border_kind, :lower_norm, :upper_norm)
                ON DUPLICATE KEY UPDATE current_value = :result_value, user_results_lapse_percent = :lapse_percent, user_results_border_kind = :border_kind, user_results_lower_norm = :lower_norm, user_results_upper_norm = :upper_norm');
                $send_result->execute(Array(
                    ':user_id' => $cur_user_id,
                    ':result_name' => 'верхнее давление',
                    ':result_value' => $result_value['upper'],
                    ':result_date' => $result_date,
					':lapse_percent' => $evaluated_value['upper']['result_percent'],
					':border_kind' => $evaluated_value['upper']['border_kind'],
					':lower_norm' => $evaluated_value['upper']['result_lower_norm'],
					':upper_norm' => $evaluated_value['upper']['result_upper_norm']
                ));
                $send_result = $db->prepare('INSERT INTO user_results (user_results_user_id, user_results_result_type_id, current_value, result_date, user_results_lapse_percent, user_results_border_kind, user_results_lower_norm, user_results_upper_norm) VALUES (:user_id, (SELECT result_type_id FROM result_types WHERE result_type_name = :result_name), :result_value, :result_date, :lapse_percent, :border_kind, :lower_norm, :upper_norm)
                ON DUPLICATE KEY UPDATE current_value = :result_value, user_results_lapse_percent = :lapse_percent, user_results_border_kind = :border_kind, user_results_lower_norm = :lower_norm, user_results_upper_norm = :upper_norm');
                $send_result->execute(Array(
                    ':user_id' => $cur_user_id,
                    ':result_name' => 'нижнее давление',
                    ':result_value' => $result_value['lower'],
                    ':result_date' => $result_date,
					':lapse_percent' => $evaluated_value['lower']['result_percent'],
					':border_kind' => $evaluated_value['lower']['border_kind'],
					':lower_norm' => $evaluated_value['lower']['result_lower_norm'],
					':upper_norm' => $evaluated_value['lower']['result_upper_norm']
                ));
                return "OK";
            }
            else{
                return "UKNOWN RESULT TYPE EXCEPTION";
            }
        }
        catch(Exception $e){
            return $e->getMessage();
            //return 700;
        }
    }

    function prepare_result_test(){
        if((isset($_SESSION['result_test'])) && ($_SESSION['result_test']['sex'] != "")){
            $result_test = $_SESSION['result_test'];
            if($result_test['sex'] == 'Мужской'){
                $result_test['sex'] = 'male';
            }
            else {
                $result_test['sex'] = 'female';
            }
            return $result_test;
        }  
        // for testing
        else {
            $result_test = array('year_birth' => 1990, 'height' => 180, 'sex'=> 'male');
            return $result_test;
        }
    } 
    
    if($user->is_logged_in()){
        if(isset($_POST['health_num_cholesterol'])){
            $user_cholesterol = $_POST['health_num_cholesterol'];
            $user_age = get_age($user_data_row['user_age']);
            $user_cholesterol_eval = evaluate_cholesterol($user_age, $user_cholesterol);
            send_result_to_db($db, $cur_user_id, 'холестерин', $_POST['health_num_date'], $user_cholesterol, $user_cholesterol_eval);
            echo json_encode(array('result' => $user_cholesterol_eval)); 
        }    
        else if(isset($_POST['health_num_glucose'])){
            $user_glucose = $_POST['health_num_glucose'];
            $user_glucose_eval = evaluate_glucose($user_glucose);
            send_result_to_db($db, $cur_user_id, 'сахар', $_POST['health_num_date'], $user_glucose, $user_glucose_eval);
            echo json_encode(array('result' => $user_glucose_eval));
        }
        else if(isset($_POST['health_num_upper_pressure']) && isset($_POST['health_num_lower_pressure'])){
            $user_pressure = Array(
                'upper' => $_POST['health_num_upper_pressure'],
                'lower' => $_POST['health_num_lower_pressure']);
            $user_age = get_age($user_data_row['user_age']);
            $user_pressure_eval = evaluate_pressure($user_age, $user_data_row['user_sex'], $user_pressure);  
            send_result_to_db($db, $cur_user_id, 'давление', $_POST['health_num_date'], $user_pressure, $user_pressure_eval);  
            echo json_encode(array('result' => $user_pressure_eval));
        }
        else if(isset($_POST['health_num_weight'])){
            $user_weight = $_POST['health_num_weight'];
            $user_weight_eval = evaluate_weight($user_weight, $user_data_row['user_height']);
            send_result_to_db($db, $cur_user_id, 'вес', $_POST['health_num_date'], $user_weight, $user_weight_eval);
            echo json_encode(array('result' => $user_weight_eval));
        }
    }
    else{
        // DEMO VERSION - NO SAVING TO DB
        $result_test = prepare_result_test();

        if(isset($_POST['health_num_cholesterol'])){
            $user_cholesterol = $_POST['health_num_cholesterol'];
            $user_age = get_age($result_test['year_birth']);
            $user_cholesterol_eval = evaluate_cholesterol($user_age, $user_cholesterol);
            echo json_encode(array('result' => $user_cholesterol_eval)); 
        }    
        else if(isset($_POST['health_num_glucose'])){
            $user_glucose = $_POST['health_num_glucose'];
            $user_glucose_eval = evaluate_glucose($user_glucose);
            echo json_encode(array('result' => $user_glucose_eval));
        }
        else if(isset($_POST['health_num_upper_pressure']) && isset($_POST['health_num_lower_pressure'])){
            $user_pressure = Array(
                'upper' => $_POST['health_num_upper_pressure'],
                'lower' => $_POST['health_num_lower_pressure']);
            $user_age = get_age($result_test['year_birth']);
            $user_pressure_eval = evaluate_pressure($user_age, $result_test['sex'], $user_pressure); 
            echo json_encode(array('result' => $user_pressure_eval));
        }
        else if(isset($_POST['health_num_weight'])){
            $user_weight = $_POST['health_num_weight'];
            $user_weight_eval = evaluate_weight($user_weight, $result_test['height']);
            echo json_encode(array('result' => $user_weight_eval));
        }
    }
    
?>
