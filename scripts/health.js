var ind_name="";

function show_add_modal(obj_x_coord) {
	$("#health-modal").css("top",obj_x_coord.top+5);
	$("#health-modal").css("left",obj_x_coord.left-200);
    $("#health-modal").css("display","block"); 
    var top=$("#health-modal").offset().top;
    $('body,html').animate({scrollTop: top}, 1500);
}

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

function set_blood_pressure_values(upper_value,lower_value,date,upper_blood_kind,lower_blood_kind) {
	$("#blood-pressure-1").text(upper_value);
	$("#blood-pressure-2").text(lower_value);
	$("#blood-pressure-date").text(date);
	var brd_id="#blood-pressure-brd";
	var estimatimation_id="#blood-pressure-estm";
	var border_kind=get_blood_pressure_border_kind(upper_blood_kind,lower_blood_kind);
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

$( document ).ready(function() {
   init_indexes_array();
   var code,health_num_value,health_num_date;
   $(".pl-btn").click(function(e) { 
	   e.preventDefault();
	   $("#modal-index-value").val('');
	   var pl_btn_id=e.target.id; //get button id
	   ind_name=pl_btn_id.split('-')[0];
	   if(ind_name=="pressure") {
		   $("#modal-index-value").attr("placeholder", "Примеры: 130/85, 90/85");
	   }
	   else {
			$("#modal-index-value").attr("placeholder", "");
	   }
	   var x=$(this).offset();
	   show_add_modal(x);
   });
   
   $("#add-close").click(function(e){
	   e.preventDefault();
	   $("#health-modal").css("display","none");
	   $("#modal-index-value").val("");
   });
   
	$("#reason-close").click(function(e){	
	   e.preventDefault();
	   $("#reason-modal").css("display","none");
   });

	function fill_blood_indexes_values(code) {
		indexes_array["upper_blood_pressure"].border_kind=code['upper']['border_kind'];
		indexes_array["upper_blood_pressure"].percent=code['upper']['result_percent'];
		indexes_array["upper_blood_pressure"].lower_norm=code['upper']['result_lower_norm'];
		indexes_array["upper_blood_pressure"].upper_norm=code['upper']['result_upper_norm'];
		
		indexes_array["lower_blood_pressure"].border_kind=code['lower']['border_kind'];
		indexes_array["lower_blood_pressure"].percent=code['lower']['result_percent'];
		indexes_array["lower_blood_pressure"].lower_norm=code['lower']['result_lower_norm'];
		indexes_array["lower_blood_pressure"].upper_norm=code['lower']['result_upper_norm'];
		
		set_blood_pressure_values(indexes_array["upper_blood_pressure"].val,indexes_array["lower_blood_pressure"].val,indexes_array["upper_blood_pressure"].date,indexes_array["upper_blood_pressure"].border_kind,indexes_array["lower_blood_pressure"].border_kind); 
		$("#health-modal").css("display","none");
	}

	function check_answer(data) {
		code=data.result;
		if(code!=700) {
			if(ind_name=="pressure") {
				fill_blood_indexes_values(code);
				return;
			}
			indexes_array[ind_name].border_kind=code['border_kind'];
			indexes_array[ind_name].percent=code['result_percent'];
			indexes_array[ind_name].lower_norm=code['result_lower_norm'];
			indexes_array[ind_name].upper_norm=code['result_upper_norm'];
			$("#health-modal").css("display","none");
			set_values(ind_name,indexes_array[ind_name].val,indexes_array[ind_name].date,indexes_array[ind_name].border_kind);
			ind_name="";
		}
		if(code==700) {
			alert("Cервис недоступен, попробуйте позже");
		}
	}

	//=====================SEND DATA==============================
	
	function send_index_value(index_name, callback) {
		var health_data={
			name:indexes_array[index_name].name,
			val:indexes_array[index_name].val,
			hdate:indexes_array[index_name].date
		};
		$.ajax({
				type: 'POST',
				url: 'health_borders.php',
				data: {health_num:JSON.stringify(health_data)},
				dataType : 'json',
				success: callback,
				error: get_error
			});
	}
	
	
	// =====================SEND BLOOD PRESSURE VALUES============================== //
		
	function send_blood_values(callback) {
		$.ajax({
			type: 'POST',
			url: 'health_borders.php',
			data: {
				health_num_upper_pressure: indexes_array["upper_blood_pressure"].val,
				health_num_lower_pressure: indexes_array["lower_blood_pressure"].val,
				health_num_date: indexes_array["upper_blood_pressure"].date
			},
			dataType : 'json',
			success:  callback,
			error: get_error
		});
	}	
	
	function is_correct_input_values() {
		if(ind_name=="pressure") {
			var reg = /^\d+\/\d+$/; // XXX/XXX
			var health_num_value=$("#modal-index-value").val();
			if(!reg.test(health_num_value)){
				return false;
			}
			else if($("#date").val()=="") {
				return false;
			}
		}
		if($("#date").val()=="" || $("#modal-index-value").val()=="") {
				return false;
			}
		return true;
	}

	// =================================================== //
	$("#add-btn").click(function(e){
		e.preventDefault();
		if(ind_name!="pressure"&&is_correct_input_values()) {
			indexes_array[ind_name].val=$("#modal-index-value").val();
			indexes_array[ind_name].date=$("#date").val();
			send_index_value(ind_name, check_answer);
		}
		else if(ind_name=="pressure"&&is_correct_input_values()) {
			var health_num_value=$("#modal-index-value").val();
			health_num_value = health_num_value.split('/');
			indexes_array["upper_blood_pressure"].val=health_num_value[0];
			indexes_array["lower_blood_pressure"].val=health_num_value[1];
			indexes_array["upper_blood_pressure"].date=$("#date").val();
			indexes_array["lower_blood_pressure"].date=$("#date").val();
			send_blood_values(check_answer);
		}
		else {
			alert("Введите данные");
		}
	});

	function show_dates_results(data) {
		code = data.result;
		if(code != 'none'){
			var last_results_arr = [];
			for(i = 0; i < code.length; i++){
				if(i == 5){
					break;
				}
				last_results_arr.push("Дата: " + code[i]['result_date'] + ' Значение: ' + code[i]['current_value']);
			}
			alert("Первые 5 результатов:\n\n" + last_results_arr.join('\n'));
		}
		else{
			alert("Вы еще не занесли ни одного результата!");
		}
	}

	function ask_last_results(health_result_name, callback){
		$.ajax({
			type: 'POST',
			url: 'get_last_health_results.php',
			data: {
				health_result_name: health_result_name
			},
			dataType : 'json',
			success: callback,
			error: get_error		
		});
	}
	
	$(".graph").click(function(e){
		e.preventDefault();
		var btn_id=e.target.id;
		var name=btn_id.split('-')[0];
		ask_last_results(name, show_dates_results);
	});

	if(document.getElementById('go-to-result-test-save')){
		fill_demo_values();
		if(show_other_indexes==true) {
			fill_other_indexes_values();
		}
	}
});

