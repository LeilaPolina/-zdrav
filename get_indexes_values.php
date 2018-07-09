<?php include('includes/config.php'); ?>
<?php

	<script>
		function set_border_colors_and_estimation_values(brd_id,estimatimation_id,border_kind) {
			if(border_kind==2) {
			   $(brd_id).css("background-color","red"); 
			   $(estimatimation_id).css("color","red");
			   $(estimatimation_id).text("Повышен");
		   }
		   
		   else if (border_kind==1) {
			   $(brd_id).css("background-color","#E5C82E");
			   $(estimatimation_id).css("color","#E5C82E");
			   $(estimatimation_id).text("Верхняя граница");
		   }
		   else if(border_kind==-1) {
			   $(brd_id).css("background-color","#E5C82E");
			   $(estimatimation_id).css("color","#E5C82E");
			   $(estimatimation_id).text("Нижняя граница");
			   
		   }
		   else if (border_kind==-2){
			  $(brd_id).css("background-color","red");
			  $(estimatimation_id).css("color","red");
			  $(estimatimation_id).text("Понижен");
		   }
		   else if (border_kind==0){
			  $(brd_id).css("background-color","green"); 
			  $(estimatimation_id).css("color","green");
			  $(estimatimation_id).text("Норма");
		   }  
		}
	
		function set_values(index_name,index_value,index_date,border_kind) {
		   var brd_id="#"+index_name+"-brd";
		   var date_id="#"+index_name+"-date";
		   var value_span_id="#"+index_name+"-span";
		   var estimatimation_id="#"+index_name+"-estm";
		   $(date_id).text(index_date);
		   $(value_span_id).text(index_value);
		   set_border_colors_and_estimation_values(brd_id,estimatimation_id,border_kind);
		}
			

		function get_blood_pressure_border_kind (upper_blood_kind,lower_blood_kind) {
			
			if (upper_blood_kind==lower_blood_kind) {
				return upper_blood_kind;
			}
			if(upper_blood_kind==2 || upper_blood_kind==-2) {
				return upper_blood_kind;
			}
			if((upper_blood_kind!=2 && upper_blood_kind!=-2) && (lower_blood_kind==2 || lower_blood_kind==-2)) {
				return lower_blood_kind;
			}
			
			if((upper_blood_kind==1 || upper_blood_kind==-1) && lower_blood_kind==0) {
				return upper_blood_kind;
			}	
			
			if((lower_blood_kind==1 || lower_blood_kind==-1) && upper_blood_kind==0) {
				return lower_blood_kind;
			}
	}
		
		function set_blood_pressure_values(upper_value,lower_value,index_date,upper_blood_kind,lower_blood_kind) {
			$("#blood-pressure-1").text(upper_value);
			$("#blood-pressure-2").text(lower_value);
			$("#blood-pressure-date").text(index_date);
			var brd_id="#blood-pressure-brd";
			var estimatimation_id="#blood-pressure-estm";
			var border_kind=get_blood_pressure_border_kind(upper_blood_kind,lower_blood_kind);
			set_border_colors_and_estimation_values(brd_id,estimatimation_id,border_kind);
		}
		
	</script>


<?php 
	//include('includes/config.php');
	
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
		
		if($index_name=='холестерин'){
			echo '<script type="text/javascript">
			$( document ).ready(function() {
				indexes_array["cholesterol"].val='.$index_value.';
				indexes_array["cholesterol"].border_kind='.$border_kind.';
				indexes_array["cholesterol"].percent='.$index_percent.';
				indexes_array["cholesterol"].upper_norm='.$index_upper_norm.';
				indexes_array["cholesterol"].lower_norm='.$index_lower_norm.';
				var date="'.$index_date.'".split(" ")[0];
				indexes_array["cholesterol"].date=date;
				set_values("cholesterol",'.$index_value.',date,'.$border_kind.');
			 });</script>';	
		   }
		
		if($index_name=='вес'){
			echo '<script type="text/javascript">
			$( document ).ready(function() {
				indexes_array["weight"].val='.$index_value.';
				indexes_array["weight"].border_kind='.$border_kind.';
				indexes_array["weight"].percent='.$index_percent.';
				indexes_array["weight"].upper_norm='.$index_upper_norm.';
				indexes_array["weight"].lower_norm='.$index_lower_norm.';
				var date="'.$index_date.'".split(" ")[0];
				indexes_array["weight"].date=date;
				set_values("weight",'.$index_value.',date,'.$border_kind.');
			 });</script>';
		   }
		   
		if($index_name=='сахар'){
			echo '<script type="text/javascript">
			$( document ).ready(function() {
				indexes_array["sugar"].val='.$index_value.';
				indexes_array["sugar"].border_kind='.$border_kind.';
				indexes_array["sugar"].percent='.$index_percent.';
				indexes_array["sugar"].upper_norm='.$index_upper_norm.';
				indexes_array["sugar"].lower_norm='.$index_lower_norm.';
				var date="'.$index_date.'".split(" ")[0];
				indexes_array["sugar"].date=date;
				set_values("sugar",'.$index_value.',date,'.$border_kind.');
			 });</script>';	
		   }
		   
		if($index_name=='верхнее давление'){
			 $upper_blood_pressure_value=$index_value;
			 $upper_blood_kind=$border_kind;
			echo '<script type="text/javascript">
			$( document ).ready(function() {
				indexes_array["upper_blood_pressure"].val='.$index_value.';
				indexes_array["upper_blood_pressure"].border_kind='.$border_kind.';
				indexes_array["upper_blood_pressure"].percent='.$index_percent.';
				indexes_array["upper_blood_pressure"].upper_norm='.$index_upper_norm.';
				indexes_array["upper_blood_pressure"].lower_norm='.$index_lower_norm.';
				var date="'.$index_date.'".split(" ")[0];
				indexes_array["upper_blood_pressure"].date=date;
			});</script>';			 
		}

		if($index_name=='нижнее давление'){
			 $lower_blood_pressure_value=$index_value;
			 $lower_blood_kind=$border_kind;
			 $blood_date=$index_date;
			 echo '<script type="text/javascript">
			$( document ).ready(function() {
				indexes_array["lower_blood_pressure"].val='.$index_value.';
				indexes_array["lower_blood_pressure"].border_kind='.$border_kind.';
				indexes_array["lower_blood_pressure"].percent='.$index_percent.';
				indexes_array["lower_blood_pressure"].upper_norm='.$index_upper_norm.';
				indexes_array["lower_blood_pressure"].lower_norm='.$index_lower_norm.';
				var date="'.$index_date.'".split(" ")[0];
				indexes_array["lower_blood_pressure"].date=date;
			});</script>';	
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
