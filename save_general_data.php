<?php
	include_once('includes/config.php');
	
	function save_health_data($db, $user_health_data){
		$upd_health_data = $db->prepare('UPDATE user_data SET user_sex = :user_sex, user_age = :user_age, user_height = :user_height, user_weight = :user_weight, user_job_conditions = :user_job_conditions,  user_smoking = :user_smoking, user_alcohol = :user_alcohol, user_children = :user_children, user_sport_activity = :user_sport_activity, user_diet = :user_diet, user_diseases = :user_diseases, user_chronical = :user_chronical WHERE user_data_user_id = :user_data_user_id');
			
		$upd_health_data->execute(array(
			':user_data_user_id' => $_SESSION['user_id'],
			':user_sex' => $user_health_data['sex'],
			':user_age' => date($user_health_data['birth_year']),
			':user_height' => $user_health_data['height'],
			':user_weight' => $user_health_data['weight'],
			':user_job_conditions' => $user_health_data['work'],
			':user_smoking' => $user_health_data['smoking'],
			':user_alcohol' => $user_health_data['alcohol'],
			':user_children' => $user_health_data['children'],
			':user_sport_activity' => $user_health_data['sport'],
			':user_diet' => $user_health_data['food'],
			':user_diseases' => $user_health_data['sick'],
			':user_chronical' => $user_health_data['chronic'],
		));
		if($user_health_data['risks'] != ""){
			// get current values of risks
			$find_risks = $db->prepare('SELECT relatives_death_causes_con_user_relatives_death_causes_type_id FROM relatives_death_causes_con_user WHERE relatives_death_causes_con_user_user_id = :user_id');
			$find_risks->execute(array(
				':user_id' => $_SESSION['user_id']
			));
			$risks_in_db = array();
			while($risks_row = $find_risks->fetch(PDO::FETCH_ASSOC)){
				$risks_in_db[] = $risks_row['relatives_death_causes_con_user_relatives_death_causes_type_id'];
			}
			// process current values along new values
			$relatives_death_causes = explode('_', $user_health_data['risks']);
			$relatives_death_causes = array_unique($relatives_death_causes);
			$risks_not_for_del = array();
			$ins_new_risks = $db->prepare('INSERT INTO relatives_death_causes_con_user (relatives_death_causes_con_user_user_id, relatives_death_causes_con_user_relatives_death_causes_type_id) VALUES (:relatives_death_causes_con_user_user_id, :relatives_death_causes_type_id)');
			foreach($relatives_death_causes as $death_cause){
				if(in_array($death_cause, $risks_in_db)){
					// add value to array of already existing in db
					$risks_not_for_del[] = $death_cause;
				}
				else{
					// insert new ones
					$ins_new_risks->execute(array(
						':relatives_death_causes_con_user_user_id' => $_SESSION['user_id'],
						':relatives_death_causes_type_id' => $death_cause
					));
				}
			}
			$del_old_risks = $db->prepare('DELETE FROM relatives_death_causes_con_user WHERE relatives_death_causes_con_user_user_id = :relatives_death_causes_con_user_user_id AND relatives_death_causes_con_user_relatives_death_causes_type_id = :relatives_death_causes_type_id');
			foreach($risks_in_db as $cur_risk){
				// delete those which not amongst new values
				if(!in_array($cur_risk, $risks_not_for_del)){						
					$del_old_risks->execute(array(
						':relatives_death_causes_con_user_user_id' => $_SESSION['user_id'],
						':relatives_death_causes_type_id' => $cur_risk
					));
				}
			}
		}
		else{
			$del_risks = $db->prepare('DELETE FROM relatives_death_causes_con_user WHERE  relatives_death_causes_con_user_user_id = :relatives_death_causes_con_user_user_id');
			$del_risks->execute(array(
				':relatives_death_causes_con_user_user_id' => $_SESSION['user_id']
			));
		}
	}
	
	function save_essential_data($db, $user_essentials){
		$upd_essentials_data = $db->prepare('UPDATE users SET user_name = :user_name, user_phone = :user_phone WHERE user_id = :user_id');
		$upd_essentials_data->execute(array(
			':user_id'=>$_SESSION['user_id'],
			':user_phone'=>$user_essentials['user_phone'],
			':user_name'=>$user_essentials['user_name']
		));
	}
	
	function save_contact_data($db, $user_contacts){
		if($user_contacts['user_email'] != ""){
			$upd_user_contacts = $db->prepare('INSERT INTO contacts_con_user (contacts_con_user_user_id, contacts_con_user_contact_id, contact_value) VALUES (:user_id, (SELECT contact_id FROM contact_types WHERE contact_type = :contact_type), :user_email) 
			ON DUPLICATE KEY UPDATE contact_value = :user_email');
			$upd_user_contacts->execute(array(
				':user_id' => $_SESSION['user_id'],
				':contact_type' => 'email',
				':user_email' => $user_contacts['user_email']
			));
		}
		else{
			$upd_user_contacts = $db->prepare('DELETE FROM contacts_con_user WHERE contacts_con_user_user_id = :user_id AND contacts_con_user_contact_id IN (SELECT contact_id FROM contact_types WHERE contact_type = :contact_type)');
			$upd_user_contacts->execute(array(
				':user_id' => $_SESSION['user_id'],
				':contact_type' => 'email'
			));
		}		
	}
	
	function save_general_data($db, $user_essentials, $user_health_data, $user_contacts) {
		try {
			save_essential_data($db, $user_essentials);
			save_health_data($db, $user_health_data);
			save_contact_data($db, $user_contacts);
			return "OK";
		}
		catch(Exception $e) {
			// number already in db
			if($e->getMessage() == "SQLSTATE[23000]: Integrity constraint violation: 1062 Duplicate entry '+7 (999) 777-77-77' for key 'user_phone_UNIQUE'"){
				return 704;
			}
			return $e->getMessage();
			//return 701;
		}
	}
	
	if(isset($_POST['save_user_phone']) && isset($_POST['save_user_name'])) {		
		$user_essentials = array(
			'user_phone'=>$_POST['save_user_phone'],
			'user_name'=>$_POST['save_user_name']
		);
		
		$user_health_data = array(
			'sex'=>$_POST['save_sex'],
			'birth_year'=>$_POST['save_birth_year'],
			'height'=>$_POST['save_height'],
			'weight'=>$_POST['save_weight'],
			'work'=>$_POST['save_work'],
			'sport'=>$_POST['save_sport'],
			'food'=>$_POST['save_food'],
			'children'=>$_POST['save_children'],
			'risks'=>$_POST['save_risks'],
			'sick'=>$_POST['save_sick'],
			'chronic'=>$_POST['save_chronic'],
			'smoking'=>$_POST['save_smoking'],
			'alcohol'=>$_POST['save_alcohol']
		);
		$user_contacts = array(
			'user_email'=>$_POST['save_user_email']
		);
		
		echo json_encode(array('result' => save_general_data($db, $user_essentials, $user_health_data, $user_contacts)));
	}
?>