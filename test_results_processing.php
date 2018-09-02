<?php include('includes/config.php'); ?>
<?php
	function save_test_iteration($db, $result_test){
		try{
			if($result_test['sex'] == 'м'){
				$sex = 'male';
			}
			else{
				$sex = 'female';
			}
			$user_birth_year = $result_test['year_birth']."-12-30";

			$save_test_iteration_query = $db->prepare('INSERT INTO test_iterations (
					test_iterations_date, test_iterations_age, test_iterations_sex, test_iterations_height, test_iterations_weight,
					test_iterations_family_status,
					test_iterations_job_conditions, 
					test_iterations_education,
					test_iterations_smoking, 
					test_iterations_alcohol, 
					test_iterations_sport_activity,
					test_iterations_diet, 
					test_iterations_sleep,
					test_iterations_immunity,
					test_iterations_last_exam_date, 
					test_iterations_exam_prevention_causes, 
					test_iterations_children
				) 
				VALUES (
					now(), :user_age, :user_sex, :user_height, :user_weight,					
					(SELECT family_status_type_id FROM family_status_types WHERE family_status_type_name = :user_family), 
					(SELECT job_conditions_type_id FROM job_conditions_types WHERE job_conditions_type_name = :user_job_conditions),
					(SELECT education_type_id FROM education_types WHERE education_type_name = :user_education), 
					(SELECT smoking_type_id FROM smoking_types WHERE smoking_type_name = :user_smoking), 
					(SELECT alcohol_type_id FROM alcohol_types WHERE alcohol_type_name = :user_alcohol),					
					(SELECT sport_activity_type_id FROM sport_activity_types WHERE sport_activity_type_name = :user_sport_activity),
					(SELECT diet_type_id FROM diet_types WHERE diet_type_name = :user_diet),
					(SELECT sleep_type_id FROM sleep_types WHERE sleep_type_name = :user_sleep),
					(SELECT immunity_type_id FROM immunity_types WHERE immunity_type_name = :user_immunity),
					(SELECT last_exam_date_type_id FROM last_exam_date_types WHERE last_exam_date_type_name = :user_last_exam_date), 
					(SELECT exam_prevention_causes_type_id FROM exam_prevention_causes_types WHERE exam_prevention_causes_type_name = :user_exam_prevention_causes),
					(SELECT children_type_id FROM children_types WHERE children_type_name = :user_children)
			);');
			
			$save_test_iteration_query->execute(array(
				':user_age' => $user_birth_year, 
				':user_sex' => $sex, 
				':user_height' => $result_test['height'], 
				':user_weight' => $result_test['weight'],
				':user_family' => $result_test['family'],
				':user_job_conditions' => $result_test['work'], 
				':user_education' => $result_test['education'],
				':user_smoking' => $result_test['smoking'], 
				':user_alcohol' => $result_test['alcohol'], 
				':user_sport_activity' => $result_test['sport'],
				':user_diet' => $result_test['food'], 
				':user_sleep' => $result_test['sleep'],
				':user_immunity' => $result_test['cold'],
				':user_last_exam_date' => $result_test['bodycheck'], 
				':user_exam_prevention_causes' => $result_test['whynotbodycheck'], 
				':user_children' => $result_test['children']
			));		
			
			return 'OK';
		}
		catch(Exception $e){
			return 'error';
		}
	}

	$_SESSION = array();
    $name_fields = array('sex', 'year_birth', 'height', 'weight', 'education', 'work', 'smoking', 'alcohol', 'family', 'children', 'sport', 'food', 'sleep', 'cold', 'dead', 'bodycheck','whynotbodycheck','lifetime','personal_manager','smoke','healthyfood','healthyheart','homebodycheck','count_homebodycheck','count_work', 'count_smoking','count_food','count_dead', 'count_bodycheck','count_whynotbodycheck');
	$result_test = array();
	foreach ($name_fields as $field) {
		$val = '';
		if (isset($_POST[$field])) {
			$val = $_POST[$field];
		}
		$result_test[$field] = $val;
	}
	
	$_SESSION['result_test'] = $result_test;
	$_SESSION['test_completed'] = true;
    header('Location: test.php');
	exit;	
?>