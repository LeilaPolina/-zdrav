<?php
    include_once('includes/config.php');
    $cur_user_id = $_SESSION['user_id'];
    
    $get_user_data = $db->prepare('SELECT user_age, user_sex, user_height FROM user_data WHERE user_data_user_id = :user_id');
	$get_user_data->execute(array(
		':user_id' => $cur_user_id
	));
    $user_data_row = $get_user_data->fetch(PDO::FETCH_ASSOC);

    function get_age($user){
		$birthyear=0;
		if($user->is_logged_in()) {
			global $user_data_row;
			$birthyear=$user_data_row['user_age'];
		}
		else {
			$result_test = prepare_result_test();
			$birthyear=$result_test['year_birth'];
		}
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

	function evaluate_index($user_index_value, $index_name) {
		$indexes_norms =array (
			   'glucose' => Array(3.3, 5.5),
			   'erythrocytes'=> Array(3.8, 5.3),
			   'hemoglobin' => Array(115.0, 150.0),
			   'hematocrit'=> Array(34.0, 42.0),
			   'avg_erythrocytes'=> Array(77.0, 95.0),
			   'avg_hemoglobin_content_in_erythrocytes'=> Array(25.0, 33.0),
			   'avg_hemoglobin_concentration_in_erythrocytes'=> Array(31.0, 36.0),
			   'color_index'=> Array(0.9, 1.1),
			   'reticulocytes' => Array(0.3,1.5),
			   'platelets' => Array(150.0,500.0),
			   'leucocytes' => Array(5.0,14.5),
			   'segment_nuclear_neutrophils' => Array(35.0,58.0),
			   'stab_neutrophils' => Array(0.0001,5.0),
			   'myelocytes' => Array(0.0001,0.0001),
			   'meta_myelocytes' => Array(0.0001,0.00001),
			   'lymphocytes' => Array(30.0,55.0),
			   'monocytes' => Array(2.0,10.0),
			   'eosinophils' => Array(0.5,5.0),
			   'basophils' => Array(0.0001,1.0),
			   'plasmocytes' => Array(0.0001,1.0),
			   'ESR' => Array(2.0,12.0));
		return count_percent($user_index_value,$indexes_norms[$index_name]);
	}
    

    function evaluate_pressure($user,$user_age, $user_pressure){
		$user_sex='';
		if($user->is_logged_in()) {
			global $user_data_row;
			$user_sex=$user_data_row['user_sex'];
		}
		else {
			$result_test = prepare_result_test();
			$user_sex=$result_test['sex'];
		}
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

    function evaluate_weight($user,$user_weight){
		$user_height=0;
		if($user->is_logged_in()) {
			global $user_data_row;
			$user_height=$user_data_row['user_height'];
		}
		else {
			$result_test = prepare_result_test();
			$user_height=$result_test['height'];
		}
		
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
            if($result_name != 'pressure'){
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
                if($result_name == 'weight'){
                    $send_result = $db->prepare('UPDATE user_data SET user_weight = :result_value WHERE user_data_user_id = :user_id');
                    $send_result->execute(Array(
                        ':user_id' => $cur_user_id,
                        ':result_value' => $result_value
                    ));
                }
                return "OK";
            }
            else if($result_name == 'pressure'){
                $send_result = $db->prepare('INSERT INTO user_results (user_results_user_id, user_results_result_type_id, current_value, result_date, user_results_lapse_percent, user_results_border_kind, user_results_lower_norm, user_results_upper_norm) VALUES (:user_id, (SELECT result_type_id FROM result_types WHERE result_type_name = :result_name), :result_value, :result_date, :lapse_percent, :border_kind, :lower_norm, :upper_norm)
                ON DUPLICATE KEY UPDATE current_value = :result_value, user_results_lapse_percent = :lapse_percent, user_results_border_kind = :border_kind, user_results_lower_norm = :lower_norm, user_results_upper_norm = :upper_norm');
                $send_result->execute(Array(
                    ':user_id' => $cur_user_id,
                    ':result_name' => 'upper_blood_pressure',
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
                    ':result_name' => 'lower_blood_pressure',
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
	
	function send_data($user,$db, $cur_user_id,$index_db_name,$index_date,$user_index_val, $user_index_eval) {
		if($user->is_logged_in()) {
			send_result_to_db($db, $cur_user_id, $index_db_name, $index_date, $user_index_val, $user_index_eval);
		}
		echo json_encode(array('result' => $user_index_eval));
	}

	if(isset($_POST['health_num_upper_pressure']) && isset($_POST['health_num_lower_pressure'])){
		$user_pressure = Array(
			'upper' => $_POST['health_num_upper_pressure'],
			'lower' => $_POST['health_num_lower_pressure']);
		$user_age = get_age($user);
		$user_pressure_eval = evaluate_pressure($user,$user_age,$user_pressure); 
		send_data($user,$db, $cur_user_id,'pressure',$_POST['health_num_date'],$user_pressure,$user_pressure_eval);
	}

	else if(isset($_POST['health_num'])) {
		$data = utf8_encode($_POST['health_num']); 
		$health_data = json_decode($data);
		$user_index_val = $health_data->val;
		$user_index_eval=0;
		if($health_data->name=='cholesterol') {
			$user_age = get_age($user);
			$user_index_eval = evaluate_cholesterol($user_age, $user_index_val);
		}
		else if($health_data->name=='weight') {
			$user_index_eval = evaluate_weight($user,$user_index_val);
		}
		else {
			 $user_index_eval=evaluate_index($user_index_val, $health_data->name);
		}
		send_data($user,$db, $cur_user_id,$health_data->name,$health_data->hdate,$user_index_val, $user_index_eval);
	}
    
    
?>
