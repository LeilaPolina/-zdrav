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
var index_names=["cholesterol","sugar","weight","upper_blood_pressure","lower_blood_pressure"];
function init_indexes_array() {
	for (i=0;i<index_names.length;i++) {
		indexes_array[index_names[i]]=create_index_object(index_names[i],0,0,0,0,0);
	}
}

function get_blood_pressure_border_kind (upper_blood_kind,lower_blood_kind) {
			
	if (upper_blood_kind==lower_blood_kind) {
		return upper_blood_kind;
	}
	
	else if(upper_blood_kind==-2 || upper_blood_kind==2) {
		return upper_blood_kind;
	}
	else {
			return lower_blood_kind;
	}
			
}

$( document ).ready(function() {
   init_indexes_array();
   var is_blodd_btn=false;
   var pl_btn_id="none"; //which button is clicked
   var code,health_num_value,health_num_date;
   /*var code, result_percent,index_name,health_num_value,health_num_date;
   var border_kind, result_percent,result_lower_norm,result_upper_norm;
   var is_high=false, is_low=false, is_low_border=false,is_high_border=false,is_normal=false;*/
	
   $(".pl-btn").click(function(e) { 
	   e.preventDefault();
	   $("#modal-index-value").val('');
	   pl_btn_id=e.target.id; //get button id
	   
	   if(pl_btn_id=="blood-btn") {
		   is_blodd_btn=true;
		   $("#modal-index-value").attr("placeholder", "XXX/XXX");
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
		

	function get_blood_pressure_border_kind (upper_blood_kind,lower_blood_kind) {
		if (upper_blood_kind==lower_blood_kind) {
			return upper_blood_kind;
		}
		else if(upper_blood_kind==-2 || upper_blood_kind==2) {
			return upper_blood_kind;
		}
		else {
				return lower_blood_kind;
		}
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

//=====================SEND DATA==============================
	function send_cholesterol_value() {
			$.ajax({
				type: 'POST',
				url: 'health_borders.php',
				data: {
					health_num_cholesterol: indexes_array["cholesterol"].val, 
					health_num_date: indexes_array["cholesterol"].date
				},
				dataType : 'json',
				success: function(data) {
					code=data.result;
					if(code!=700) {
						indexes_array["cholesterol"].border_kind=code['border_kind'];
						indexes_array["cholesterol"].percent=code['result_percent'];
						indexes_array["cholesterol"].lower_norm=code['result_lower_norm'];
						indexes_array["cholesterol"].upper_norm=code['result_upper_norm'];
						$("#health-modal").css("display","none");
						set_values("cholesterol",indexes_array["cholesterol"].val,indexes_array["cholesterol"].date,indexes_array["cholesterol"].border_kind);
					}
					if(code==700) {
						alert("Cервис недоступен, попробуйте позже");
					}
					
				},
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

	function send_sugar_value() {
		$.ajax({
				type: 'POST',
				url: 'health_borders.php',
				data: {
					health_num_glucose: indexes_array["sugar"].val,
					health_num_date: indexes_array["sugar"].date
				},
				dataType : 'json',
				success: function(data) {
					code=data.result;
					if(code!=700) {
						indexes_array["sugar"].border_kind=code['border_kind'];
						indexes_array["sugar"].percent=code['result_percent'];
						indexes_array["sugar"].lower_norm=code['result_lower_norm'];
						indexes_array["sugar"].upper_norm=code['result_upper_norm'];
						$("#health-modal").css("display","none");
						set_values("sugar",indexes_array["sugar"].val,indexes_array["sugar"].date,indexes_array["sugar"].border_kind);
					}
					if(code==700) {
						alert("Cервис недоступен, попробуйте позже");
					}
					
				},
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
		
	function send_blood_values() {
			$.ajax({
				type: 'POST',
				url: 'health_borders.php',
				data: {
					health_num_upper_pressure: indexes_array["upper_blood_pressure"].val,
					health_num_lower_pressure: indexes_array["lower_blood_pressure"].val,
					health_num_date: indexes_array["upper_blood_pressure"].date
				},
				dataType : 'json',
				success:  function(data) {
					code=data.result;
					if(code!=700) {
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
					if(code==700) {
						alert("Cервис недоступен, попробуйте позже");
					}
					
				}
			});
	}	

	function send_weight_value() {
		$.ajax({
				type: 'POST',
				url: 'health_borders.php',
				data: {
					health_num_weight: indexes_array["weight"].val,
					health_num_date: indexes_array["weight"].date
				},
				dataType : 'json',
				success: function(data){
					code=data.result;
					if(code!=700) {
						indexes_array["weight"].border_kind=code['border_kind'];
						indexes_array["weight"].percent=code['result_percent'];
						indexes_array["weight"].lower_norm=code['result_lower_norm'];
						indexes_array["weight"].upper_norm=code['result_upper_norm'];
						$("#health-modal").css("display","none");
						set_values("weight",indexes_array["weight"].val,indexes_array["weight"].date,indexes_array["weight"].border_kind);
					}
					if(code==700) {
						alert("Cервис недоступен, попробуйте позже");
					}
					
				},
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
				send_cholesterol_value();
			}
		}
		else if(pl_btn_id == 'sugar-btn'){
			if($("#date").val()=="" || $("#modal-index-value").val()=="") {
				alert("Введите данные");
			}
			else {
				indexes_array["sugar"].val=$("#modal-index-value").val();
				indexes_array["sugar"].date=$("#date").val();
				send_sugar_value();
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
				send_blood_values();
			}
		}
		else if(pl_btn_id == 'weight-btn'){
			if($("#date").val()=="" || $("#modal-index-value").val()=="") {
				alert("Введите данные");
			}
			else {
				indexes_array["weight"].val=$("#modal-index-value").val();
				indexes_array["weight"].date=$("#date").val();
				send_weight_value();
			}
		}
	});
});