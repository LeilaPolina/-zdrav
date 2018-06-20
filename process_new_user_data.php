<?php
	include_once('includes/config.php');	
	include_once('check_phone_number.php');

	
	function prepare_health_data($user_health_data) {
		$result_test = $_SESSION['result_test'];
		
		if($result_test['family'] == 'Живу одна' || $result_test['family'] == 'Живу один') {
			$user_health_data['family'] = 'Живу отдельно';
		}
		else {
			$user_health_data['family'] = $result_test['family'];
		}
		
		$user_health_data['education'] = $result_test['education'];
		$user_health_data['sleep'] = $result_test['sleep'];
		$user_health_data['cold'] = $result_test['cold'];
		$user_health_data['bodycheck'] = $result_test['bodycheck'];
		$user_health_data['whynotbodycheck'] = $result_test['whynotbodycheck'];		
		return $user_health_data;
	}
	
	function new_user_id_to_session($db, $user_essentials){
		//global $db;
		$get_new_user_id = $db->prepare("SELECT * FROM users WHERE user_phone = :user_phone");
		$get_new_user_id->execute(array(':user_phone' => $user_essentials['user_phone']));	
		$result = $get_new_user_id->fetchAll();
		if(count($result) == 1){
			$hashed_password=$result[0]['user_password'];
			if (password_verify($user_essentials['user_password'], $hashed_password)) {
				$_SESSION['user_id'] = $result[0]['user_id'];
				$_SESSION['loggedin'] = true;
				return true;
			}
			else {
				return false;
			}	
		}		
		else {
			return false;
		}
	}
	
	function save_user($user, $db, $user_essentials){
		$ins_user_essentials = $db->prepare('INSERT INTO users (user_phone, user_password, user_name) VALUES (:user_phone, :user_password, :user_name)');
		$hashed_password = $user->hash_password($user_essentials['user_password']);
		$ins_user_essentials->execute(array(
			':user_phone'=> $user_essentials['user_phone'], 
			':user_password'=> $hashed_password, 
			':user_name'=> $user_essentials['user_name']
		));	
	}
	
	function save_health($db, $user_health_data){
		$user_health_data = prepare_health_data($user_health_data);
		
		$ins_health_data = $db->prepare('INSERT INTO user_data (user_data_user_id,user_sex,user_age,user_height,user_weight,user_job_conditions,user_education, user_smoking,user_alcohol,user_family_status,user_children,user_sport_activity,user_diet,user_sleep,user_immunity,user_last_exam_date,user_exam_prevention_causes,user_diseases,user_chronical)
		VALUES (:user_data_user_id, :user_sex, :user_age, :user_height, :user_weight, :user_job_conditions, (SELECT education_type_id FROM education_types WHERE education_type_name = :user_education), :user_smoking, :user_alcohol, (SELECT family_status_type_id FROM family_status_types WHERE family_status_type_name = :user_family_status), :user_children, :user_sport_activity, :user_diet, (SELECT sleep_type_id FROM sleep_types WHERE sleep_type_name = :user_sleep), (SELECT immunity_type_id FROM immunity_types WHERE immunity_type_name = :user_immunity), (SELECT last_exam_date_type_id FROM last_exam_date_types WHERE last_exam_date_type_name = :user_last_exam_date), (SELECT exam_prevention_causes_type_id FROM exam_prevention_causes_types WHERE exam_prevention_causes_type_name = :user_exam_prevention_causes), :user_diseases, :user_chronical)');	
		
		$user_birth_year = $user_health_data['birth_year']."-12-30";

		$ins_health_data->execute(array(
			':user_data_user_id' => $_SESSION['user_id'],
			':user_sex' => $user_health_data['sex'],
			':user_age' => $user_birth_year,
			':user_height' => $user_health_data['height'],
			':user_weight' => $user_health_data['weight'],
			':user_family_status' => $user_health_data['family'],
			':user_job_conditions' => $user_health_data['work'],
			':user_education' => $user_health_data['education'],
			':user_smoking' => $user_health_data['smoking'],
			':user_alcohol' => $user_health_data['alcohol'],
			':user_family_status' => $user_health_data['family'],
			':user_children' => $user_health_data['children'],
			':user_sport_activity' => $user_health_data['sport'],
			':user_diet' => $user_health_data['food'],
			':user_sleep' => $user_health_data['sleep'],
			':user_immunity' => $user_health_data['cold'],
			':user_last_exam_date' => $user_health_data['bodycheck'],
			':user_exam_prevention_causes' => $user_health_data['whynotbodycheck'],
			':user_diseases' => $user_health_data['sick'],
			':user_chronical' => $user_health_data['chronic']));
		
		if($user_health_data['risks'] != ""){
			$ins_dead = $db->prepare('INSERT INTO relatives_death_causes_con_user (relatives_death_causes_con_user_user_id,relatives_death_causes_con_user_relatives_death_causes_type_id) VALUES (:relatives_death_causes_con_user_user_id, :relatives_death_causes_type_id)');
			
			$relatives_death_causes = explode('_', $user_health_data['risks']);
			$relatives_death_causes = array_unique($relatives_death_causes);
			foreach ($relatives_death_causes as $death_cause) {
				$ins_dead->execute(array(
					':relatives_death_causes_con_user_user_id' => $_SESSION['user_id'],
					':relatives_death_causes_type_id' => $death_cause
				));
			}				
		}		
	}
	
	function save_contacts($db, $user_contacts){
		if($user_contacts['user_email'] != ""){				
			$ins_user_contacts = $db->prepare('INSERT INTO contacts_con_user (contacts_con_user_user_id, contacts_con_user_contact_id, contact_value) VALUES (:user_id, (SELECT contact_id FROM contact_types WHERE contact_type=:contact_type), :user_email)');
			$ins_user_contacts->execute(array(
				':user_id' => $_SESSION['user_id'],
				':contact_type' => 'email',
				':user_email' => $user_contacts['user_email']
			));
		}
	}
	
	function save_data($user, $db, $user_essentials, $user_health_data, $user_contacts) {
		//global $db,$user;
		try {
			save_user($user, $db, $user_essentials);
			
			if(new_user_id_to_session($db, $user_essentials)==true) {	
				save_health($db, $user_health_data);
				save_contacts($db, $user_contacts);				
				return "OK";
			}
			else{
				return 701;
			}
			
		}		
		catch(Exception $e) {
			//return $e->getMessage();
			return 701;
		}
	}
	
	if(isset($_POST['user_phone']) && isset($_POST['user_password']) && isset($_POST['user_name'])) {
		//global $user;
		$user_name=trim(preg_replace('/ /','',$_POST['user_name']));
		$user_password=trim(preg_replace('/ /','',$_POST['user_password']));
		$user_phone=$_POST['user_phone'];
		//$hashed_password = $user->hash_password($user_password);
		
		$user_essentials = array(
			'user_phone'=>$user_phone,
			'user_password'=>$user_password,
			'user_name'=>$user_name
		);
		
		$user_health_data = array(
			'sex'=>$_POST['sex'],
			'birth_year'=>$_POST['birth_year'],
			'height'=>$_POST['height'],
			'weight'=>$_POST['weight'],
			'work'=>$_POST['work'],
			'sport'=>$_POST['sport'],
			'food'=>$_POST['food'],
			'children'=>$_POST['children'],
			'risks'=>$_POST['risks'],
			'sick'=>$_POST['sick'],
			'chronic'=>$_POST['chronic'],
			'smoking'=>$_POST['smoking'],
			'alcohol'=>$_POST['alcohol']
		);
		$user_email=trim(preg_replace('/ /','',$_POST['user_email']));
		$user_contacts = array(
			'user_email'=>$user_email
		);
		
		echo json_encode(array('result' => save_data($user, $db, $user_essentials, $user_health_data, $user_contacts)));
	}
?>