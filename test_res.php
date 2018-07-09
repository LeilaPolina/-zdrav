<?php include_once('includes/config.php'); ?>
<?php
	$cur_user_id = 31;//$_SESSION['user_id'];
	$get_results_data = $db->prepare('
	SELECT DISTINCT *
	FROM user_results
	INNER JOIN
		(SELECT user_results_result_type_id, MAX(result_date) AS max_result_date
		FROM user_results
		WHERE user_results_user_id = :user_id
		GROUP BY user_results_result_type_id) grouped_result_types
	ON user_results.user_results_result_type_id = grouped_result_types.user_results_result_type_id
	INNER JOIN
		(SELECT result_types.result_type_id, result_types.result_type_name
		FROM result_types, user_results
		WHERE result_types.result_type_id = user_results.user_results_result_type_id) result_names
	ON user_results.user_results_result_type_id = result_names.result_type_id
	AND user_results.result_date = grouped_result_types.max_result_date
	WHERE user_results.user_results_user_id = :user_id');
	$get_results_data->execute(array(
		':user_id' => $cur_user_id
	));
	$user_cholesterol;
	$user_weight;
	$user_sugar;
	$user_lower_pressure;
	$user_upper_pressure;
	while($results_data_row = $get_results_data->fetch(PDO::FETCH_ASSOC)){
		
		print_r($results_data_row);
		echo '<br/>';
	}
?>