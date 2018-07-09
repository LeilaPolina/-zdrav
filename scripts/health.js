
var show_other_indexes=false;
function create_index_object(name,val, date, border_kind, percent,lower_norm,upper_norm ) {
	var index_obj={};
	index_obj.name=name;
	index_obj.val=val;
	index_obj.date=date;
	index_obj.border_kind=border_kind;
	index_obj.percent=percent;
	index_obj.lower_norm=lower_norm;
	index_obj.upper_norm=upper_norm;
	return index_obj;
}
var indexes_array=[];
var index_names=["cholesterol","sugar","weight","upper_blood_pressure","lower_blood_pressure","erythrocytes","hemoglobin","hematocrit"];
function init_indexes_array() {
	for (i=0;i<index_names.length;i++) {
		indexes_array[index_names[i]]=create_index_object(index_names[i],0,0,0,0,0);
	}
}

var is_cholesterol=false, is_sugar=false, is_weight=false,
is_blood_pressure=false;is_erythrocytes=false, is_hemoglobin=false, is_hematocrit=false;
$( document ).ready(function() {
   init_indexes_array();
   var is_blodd_btn=false;
   var pl_btn_id="none"; //which button is clicked
   var code,health_num_value,health_num_date;
   
	
   $(".pl-btn").click(function(e) { 
	   e.preventDefault();
	   $("#modal-index-value").val('');
	   pl_btn_id=e.target.id; //get button id
	   
	   if(pl_btn_id=="blood-btn") {
		   is_blodd_btn=true;
		   $("#modal-index-value").attr("placeholder", "Примеры: 130/85, 90/85");
	   }
	   else{
			is_blodd_btn = false;
			$("#modal-index-value").attr("placeholder", "");
	   }
	   
	   var x=$(this).offset();
	   $("#health-modal").css("top",x.top+30);
	   $("#health-modal").css("left",x.left-200);
	   $("#health-modal").css("display","block"); //show modal for adding index value
	   var top=$("#health-modal").offset().top;
	   $('body,html').animate({scrollTop: top}, 1500);
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
		var ind_name="";
		if(code!=700) {
			if(is_cholesterol==true) {
				ind_name="cholesterol";
				is_cholesterol=false;
			}
			if(is_sugar==true) {
				ind_name="sugar";
				is_sugar=false;
			}  
			
			if(is_weight==true) {
				ind_name="weight"
				is_weight=false;
			}
			
			if(is_erythrocytes==true) {
				ind_name="erythrocytes"
				is_erythrocytes=false;
			}
			
			if(is_hemoglobin ==true) {
				ind_name="hemoglobin"
				is_hemoglobin=false;
			}
			
			
			if(is_hematocrit==true) {
				ind_name="hematocrit"
				is_hematocrit=false;
			}
			
			
			if(is_blood_pressure==true) {
				is_blood_pressure=false;
				fill_blood_indexes_values(code);
				return;
			}
			
			indexes_array[ind_name].border_kind=code['border_kind'];
			indexes_array[ind_name].percent=code['result_percent'];
			indexes_array[ind_name].lower_norm=code['result_lower_norm'];
			indexes_array[ind_name].upper_norm=code['result_upper_norm'];
			$("#health-modal").css("display","none");
			set_values(ind_name,indexes_array[ind_name].val,indexes_array[ind_name].date,indexes_array[ind_name].border_kind);
			
		}
		
		if(code==700) {
			alert("Cервис недоступен, попробуйте позже");
		}
	}

//=====================SEND DATA==============================
	function send_cholesterol_value(callback) {
			$.ajax({
				type: 'POST',
				url: 'health_borders.php',
				data: {
					health_num_cholesterol: indexes_array["cholesterol"].val, 
					health_num_date: indexes_array["cholesterol"].date
				},
				dataType : 'json',
				success: callback,
				error: function (jqXHR, exception) {
					var msg = '';
					if (jqXHR.status === 0) {
						msg = 'Not connect.\n Verify Network.';
					} else if (jqXHR.status == 404) {
						msg = 'Requested page not found. [404]';
					} else if (jqXHR.status == 500) {
						msg = 'Internal Server Error [500].';
					} else if (exception === 'parsererror') {
						msg = 'Requested JSON parse failed.';
					} else if (exception === 'timeout') {
						msg = 'Time out error.';
					} else if (exception === 'abort') {
						msg = 'Ajax request aborted.';
					} else {
						msg = 'Uncaught Error.\n' + jqXHR.responseText;
					}
					alert(msg);
				}
			});			
		}

	function send_sugar_value(callback) {
		$.ajax({
				type: 'POST',
				url: 'health_borders.php',
				data: {
					health_num_glucose: indexes_array["sugar"].val,
					health_num_date: indexes_array["sugar"].date
				},
				dataType : 'json',
				success: callback,
				error: function (jqXHR, exception) {
							var msg = '';
							if (jqXHR.status === 0) {
								msg = 'Not connect.\n Verify Network.';
							} else if (jqXHR.status == 404) {
								msg = 'Requested page not found. [404]';
							} else if (jqXHR.status == 500) {
								msg = 'Internal Server Error [500].';
							} else if (exception === 'parsererror') {
								msg = 'Requested JSON parse failed.';
							} else if (exception === 'timeout') {
								msg = 'Time out error.';
							} else if (exception === 'abort') {
								msg = 'Ajax request aborted.';
							} else {
								msg = 'Uncaught Error.\n' + jqXHR.responseText;
							}
							alert(msg);
						}
					});
	}
		
		
	function send_erythrocytes_value(callback) {
		$.ajax({
				type: 'POST',
				url: 'health_borders.php',
				data: {
					health_num_erythrocytes: indexes_array["erythrocytes"].val,
					health_num_date: indexes_array["erythrocytes"].date
				},
				dataType : 'json',
				success: callback,
				error: function (jqXHR, exception) {
							var msg = '';
							if (jqXHR.status === 0) {
								msg = 'Not connect.\n Verify Network.';
							} else if (jqXHR.status == 404) {
								msg = 'Requested page not found. [404]';
							} else if (jqXHR.status == 500) {
								msg = 'Internal Server Error [500].';
							} else if (exception === 'parsererror') {
								msg = 'Requested JSON parse failed.';
							} else if (exception === 'timeout') {
								msg = 'Time out error.';
							} else if (exception === 'abort') {
								msg = 'Ajax request aborted.';
							} else {
								msg = 'Uncaught Error.\n' + jqXHR.responseText;
							}
							alert(msg);
						}
					});
	}
	
	function send_hematocrit_value(callback) {
		$.ajax({
				type: 'POST',
				url: 'health_borders.php',
				data: {
					health_num_hematocrit: indexes_array["hematocrit"].val,
					health_num_date: indexes_array["hematocrit"].date
				},
				dataType : 'json',
				success: callback,
				error: function (jqXHR, exception) {
							var msg = '';
							if (jqXHR.status === 0) {
								msg = 'Not connect.\n Verify Network.';
							} else if (jqXHR.status == 404) {
								msg = 'Requested page not found. [404]';
							} else if (jqXHR.status == 500) {
								msg = 'Internal Server Error [500].';
							} else if (exception === 'parsererror') {
								msg = 'Requested JSON parse failed.';
							} else if (exception === 'timeout') {
								msg = 'Time out error.';
							} else if (exception === 'abort') {
								msg = 'Ajax request aborted.';
							} else {
								msg = 'Uncaught Error.\n' + jqXHR.responseText;
							}
							alert(msg);
						}
					});
	}
	
	
	
	function send_hemoglobin_value(callback) {
		$.ajax({
				type: 'POST',
				url: 'health_borders.php',
				data: {
					health_num_hemoglobin: indexes_array["hemoglobin"].val,
					health_num_date: indexes_array["hemoglobin"].date
				},
				dataType : 'json',
				success: callback,
				error: function (jqXHR, exception) {
							var msg = '';
							if (jqXHR.status === 0) {
								msg = 'Not connect.\n Verify Network.';
							} else if (jqXHR.status == 404) {
								msg = 'Requested page not found. [404]';
							} else if (jqXHR.status == 500) {
								msg = 'Internal Server Error [500].';
							} else if (exception === 'parsererror') {
								msg = 'Requested JSON parse failed.';
							} else if (exception === 'timeout') {
								msg = 'Time out error.';
							} else if (exception === 'abort') {
								msg = 'Ajax request aborted.';
							} else {
								msg = 'Uncaught Error.\n' + jqXHR.responseText;
							}
							alert(msg);
						}
					});
	}
		
		
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
				error: function (jqXHR, exception) {
							var msg = '';
							if (jqXHR.status === 0) {
								msg = 'Not connect.\n Verify Network.';
							} else if (jqXHR.status == 404) {
								msg = 'Requested page not found. [404]';
							} else if (jqXHR.status == 500) {
								msg = 'Internal Server Error [500].';
							} else if (exception === 'parsererror') {
								msg = 'Requested JSON parse failed.';
							} else if (exception === 'timeout') {
								msg = 'Time out error.';
							} else if (exception === 'abort') {
								msg = 'Ajax request aborted.';
							} else {
								msg = 'Uncaught Error.\n' + jqXHR.responseText;
							}
							alert(msg);
						}
			});
	}	

	function send_weight_value(callback) {
		$.ajax({
				type: 'POST',
				url: 'health_borders.php',
				data: {
					health_num_weight: indexes_array["weight"].val,
					health_num_date: indexes_array["weight"].date
				},
				dataType : 'json',
				success: callback,
				error: function (jqXHR, exception) {
						var msg = '';
						if (jqXHR.status === 0) {
							msg = 'Not connect.\n Verify Network.';
						} else if (jqXHR.status == 404) {
							msg = 'Requested page not found. [404]';
						} else if (jqXHR.status == 500) {
							msg = 'Internal Server Error [500].';
						} else if (exception === 'parsererror') {
							msg = 'Requested JSON parse failed.';
						} else if (exception === 'timeout') {
							msg = 'Time out error.';
						} else if (exception === 'abort') {
							msg = 'Ajax request aborted.';
						} else {
							msg = 'Uncaught Error.\n' + jqXHR.responseText;
						}
						alert(msg);
					}
				
			});
	}
	
	
// =================================================== //
	$("#add-btn").click(function(e){
		e.preventDefault();
		if(pl_btn_id == 'cholesterol-btn'){
			if($("#date").val()=="" || $("#modal-index-value").val()=="") {
				alert("Введите данные");
			}
			else {
				indexes_array["cholesterol"].val=$("#modal-index-value").val();
				indexes_array["cholesterol"].date=$("#date").val();
				is_cholesterol=true;
				send_cholesterol_value(check_answer);
			}
		}
		else if(pl_btn_id == 'sugar-btn'){
			if($("#date").val()=="" || $("#modal-index-value").val()=="") {
				alert("Введите данные");
			}
			else {
				indexes_array["sugar"].val=$("#modal-index-value").val();
				indexes_array["sugar"].date=$("#date").val();
				is_sugar=true;
				send_sugar_value(check_answer);
			}
		}
		else if(pl_btn_id == 'blood-btn'){
			var reg = /^\d+\/\d+$/; //XXX/XXX
			var health_num_value=$("#modal-index-value").val();
			if(!reg.test(health_num_value)){
				alert("Неправильно введены данные!");
			}
			else if($("#date").val()=="") {
				alert("Введите дату");
			}
			else {
				health_num_value = health_num_value.split('/');
				indexes_array["upper_blood_pressure"].val=health_num_value[0];
				indexes_array["lower_blood_pressure"].val=health_num_value[1];
				indexes_array["upper_blood_pressure"].date=$("#date").val();
				indexes_array["lower_blood_pressure"].date=$("#date").val();
				is_blood_pressure=true;
				send_blood_values(check_answer);
			}
		}
		else if(pl_btn_id == 'weight-btn'){
			if($("#date").val()=="" || $("#modal-index-value").val()=="") {
				alert("Введите данные");
			}
			else {
				indexes_array["weight"].val=$("#modal-index-value").val();
				indexes_array["weight"].date=$("#date").val();
				is_weight=true;
				send_weight_value(check_answer);
			}
		}
		
		else if(pl_btn_id == 'erythrocytes-btn'){
			if($("#date").val()=="" || $("#modal-index-value").val()=="") {
				alert("Введите данные");
			}
			else {
				indexes_array["erythrocytes"].val=$("#modal-index-value").val();
				indexes_array["erythrocytes"].date=$("#date").val();
				is_erythrocytes=true;
				send_erythrocytes_value(check_answer);
			}
		}

		else if(pl_btn_id == 'hemoglobin-btn'){
			if($("#date").val()=="" || $("#modal-index-value").val()=="") {
				alert("Введите данные");
			}
			else {
				indexes_array["hemoglobin"].val=$("#modal-index-value").val();
				indexes_array["hemoglobin"].date=$("#date").val();
				is_hemoglobin=true;
				send_hemoglobin_value(check_answer);
			}
		}
		
		else if(pl_btn_id == 'hematocrit-btn'){
			if($("#date").val()=="" || $("#modal-index-value").val()=="") {
				alert("Введите данные");
			}
			else {
				indexes_array["hematocrit"].val=$("#modal-index-value").val();
				indexes_array["hematocrit"].date=$("#date").val();
				is_hematocrit=true;
				send_hematocrit_value(check_answer);
			}
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
			error: function (jqXHR, exception) {
					var msg = '';
					if (jqXHR.status === 0) {
						msg = 'Not connect.\n Verify Network.';
					} else if (jqXHR.status == 404) {
						msg = 'Requested page not found. [404]';
					} else if (jqXHR.status == 500) {
						msg = 'Internal Server Error [500].';
					} else if (exception === 'parsererror') {
						msg = 'Requested JSON parse failed.';
					} else if (exception === 'timeout') {
						msg = 'Time out error.';
					} else if (exception === 'abort') {
						msg = 'Ajax request aborted.';
					} else {
						msg = 'Uncaught Error.\n' + jqXHR.responseText;
					}
					alert(msg);
				}				
		});
	}

	$("#cholesterol-graph").click(function(e){
		e.preventDefault();
		ask_last_results('холестерин', show_dates_results);
	});

	$("#sugar-graph").click(function(e){
		e.preventDefault();
		ask_last_results('сахар', show_dates_results);
	});

	$("#blood-pressure-graph").click(function(e){
		e.preventDefault();
		ask_last_results('давление', show_dates_results);
	});

	$("#weight-graph").click(function(e){
		e.preventDefault();
		ask_last_results('вес', show_dates_results);
	});

	function fill_demo_values(){
		indexes_array['weight'].val = 80;
		indexes_array['weight'].date = "2018-06-19";
		indexes_array['weight'].border_kind = 1;
		indexes_array['weight'].percent = 0;
		indexes_array['weight'].lower_norm = 65;
		indexes_array['weight'].upper_norm = 81;
		set_values(indexes_array['weight'].name, indexes_array['weight'].val, indexes_array['weight'].date, indexes_array['weight'].border_kind);
		
		indexes_array['cholesterol'].val = 6;
		indexes_array['cholesterol'].date = "2018-06-19";
		indexes_array['cholesterol'].border_kind = 2;
		indexes_array['cholesterol'].percent = 4.35;
		indexes_array['cholesterol'].lower_norm = 3.32;
		indexes_array['cholesterol'].upper_norm = 5.75;
		set_values(indexes_array['cholesterol'].name, indexes_array['cholesterol'].val, indexes_array['cholesterol'].date, indexes_array['cholesterol'].border_kind);

		indexes_array['sugar'].val = 4.3;
		indexes_array['sugar'].date = "2018-06-19";
		indexes_array['sugar'].border_kind = 0;
		indexes_array['sugar'].percent = 0;
		indexes_array['sugar'].lower_norm = 3.3;
		indexes_array['sugar'].upper_norm = 5.5;
		set_values(indexes_array['sugar'].name, indexes_array['sugar'].val, indexes_array['sugar'].date, indexes_array['sugar'].border_kind);
		
		indexes_array['upper_blood_pressure'].val = 130;
		indexes_array['upper_blood_pressure'].date = "2018-06-19";
		indexes_array['upper_blood_pressure'].border_kind = 0;
		indexes_array['upper_blood_pressure'].percent = 0;
		indexes_array['upper_blood_pressure'].lower_norm = 120;
		indexes_array['upper_blood_pressure'].upper_norm = 140;

		indexes_array['lower_blood_pressure'].val = 80;
		indexes_array['lower_blood_pressure'].date = "2018-06-19";
		indexes_array['lower_blood_pressure'].border_kind = 0;
		indexes_array['lower_blood_pressure'].percent = 0;
		indexes_array['lower_blood_pressure'].lower_norm = 70;
		indexes_array['lower_blood_pressure'].upper_norm = 90;
		
		set_blood_pressure_values(indexes_array['upper_blood_pressure'].val, indexes_array['lower_blood_pressure'].val, indexes_array['upper_blood_pressure'].date, indexes_array["upper_blood_pressure"].border_kind, indexes_array["lower_blood_pressure"].border_kind);
	}
		
	function fill_other_indexes_values() {
		indexes_array['erythrocytes'].val = 3.0;
		indexes_array['erythrocytes'].date = "2018-06-19";
		indexes_array['erythrocytes'].border_kind = -2;
		indexes_array['erythrocytes'].percent = 0;
		indexes_array['erythrocytes'].lower_norm = 3.8;
		indexes_array['erythrocytes'].upper_norm = 5.3;
		set_values(indexes_array['erythrocytes'].name, indexes_array['erythrocytes'].val, indexes_array['erythrocytes'].date, indexes_array['erythrocytes'].border_kind);
		
		indexes_array['hemoglobin'].val = 105.0;
		indexes_array['hemoglobin'].date = "2018-06-19";
		indexes_array['hemoglobin'].border_kind = -2;
		indexes_array['hemoglobin'].percent = 0;
		indexes_array['hemoglobin'].lower_norm = 115.0;
		indexes_array['hemoglobin'].upper_norm = 150.0;
		set_values(indexes_array['hemoglobin'].name, indexes_array['hemoglobin'].val, indexes_array['hemoglobin'].date, indexes_array['hemoglobin'].border_kind);
		
		indexes_array['hematocrit'].val = 30.0;
		indexes_array['hematocrit'].date = "2018-06-19";
		indexes_array['hematocrit'].border_kind = -2;
		indexes_array['hematocrit'].percent = 0;
		indexes_array['hematocrit'].lower_norm = 34.0;
		indexes_array['hematocrit'].upper_norm = 42.0;
		set_values(indexes_array['hematocrit'].name, indexes_array['hematocrit'].val, indexes_array['hematocrit'].date, indexes_array['hematocrit'].border_kind);
	}

	if(show_other_indexes===true){
		fill_demo_values();
		if(show_other_indexes==true) {
			fill_other_indexes_values();
		}
	}
});

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