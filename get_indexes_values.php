<?php 
	include('includes/config.php');
	
	$cur_user_id = $_SESSION['user_id'];
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
	
	$upper_blood_pressure_value='';
	$lower_blood_pressure_value='';
	$blood_date='';$upper_blood_kind='';$lower_blood_kind='';
	while($results_data_row = $get_results_data->fetch(PDO::FETCH_ASSOC)){
	
		$index_name=$results_data_row['result_type_name'];
		$index_value=$results_data_row['current_value'];
		$index_date=$results_data_row['max_result_date'];
		$border_kind=$results_data_row['user_results_border_kind'];
		$index_upper_norm=$results_data_row['user_results_upper_norm'];
		$index_lower_norm=$results_data_row['user_results_lower_norm'];
		$index_percent=$results_data_row['user_results_lapse_percent'];
		
		echo '<script type="text/javascript">
			$( document ).ready(function() {
				indexes_array["'.$index_name.'"].val='.$index_value.';
				indexes_array["'.$index_name.'"].border_kind='.$border_kind.';
				indexes_array["'.$index_name.'"].percent='.$index_percent.';
				indexes_array["'.$index_name.'"].upper_norm='.$index_upper_norm.';
				indexes_array["'.$index_name.'"].lower_norm='.$index_lower_norm.';
				var date="'.$index_date.'".split(" ")[0];
				indexes_array["'.$index_name.'"].date=date;
				set_values("'.$index_name.'",'.$index_value.',date,'.$border_kind.');
			 });</script>';
		
		if($index_name=='upper_blood_pressure'){
			 $upper_blood_pressure_value=$index_value;
			 $upper_blood_kind=$border_kind;			 
		}
		
		if($index_name=='lower_blood_pressure'){
			 $lower_blood_pressure_value=$index_value;
			 $lower_blood_kind=$border_kind;
			 $blood_date=$index_date;
		} 

		if ($upper_blood_pressure_value!='' and  $lower_blood_pressure_value!=''and $blood_date!=''
			and $upper_blood_kind!='' and $lower_blood_kind!='') {
			echo '<script type="text/javascript">
			$( document ).ready(function() {
				var date="'.$index_date.'".split(" ")[0];
				set_blood_pressure_values('.$upper_blood_pressure_value.','.$lower_blood_pressure_value.',date,'.$upper_blood_kind.','.$lower_blood_kind.');});</script>';	
		}	   
	}
?>
