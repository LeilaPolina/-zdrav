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
   if(border_kind==0) {
   	$("#"+index_name+"-reason").text("");
   }
   else {
   	$("#"+index_name+"-reason").text("Причина");
   }
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
	
	var dates=["05.06.2017", "25.09.2017", "01.01.2018", "15.05.2018"];
	function add_row_to_graph_table(index_date, index_value) {
		var row='<tr class="graph-row"><td class="date-col">'+
					index_date+'</td>'+
					'<td class="value-col">'+index_value+'</td></tr>';


		$("#graph-table").append(row);
	}

	function fill_graph_table(values1,values2=undefined) {
		var head='<tr class="graph-head">'+
								'<th class="date-col">Дата</th>'+
								'<th class="value-col">Значение</th>'+ 
							'</tr>';
		$("#graph-table").append(head);
		for(i=0;i<dates.length;i++) {
			if(values2) {
				add_row_to_graph_table(dates[i],values1[i].toString()+'/'+values2[i].toString());
			}
			else {
				add_row_to_graph_table(dates[i],values1[i]);	
			}
		}
	}

	function to_graph_date(date) {
		var last_date=date;
		var tmp=last_date.split('-').reverse();
		last_date="";
		for(i=0;i<tmp.length;i++) {
			if(i!=2){
				last_date=last_date+tmp[i]+".";
			}
			else {
				last_date=last_date+tmp[i]
			}
		}
		return last_date;
	}

	function get_trace(y_values,x_values,type,mode,name,text,textposition, color) {
		var trace = {
			  y: y_values,
			  x: x_values, 
			  line: {color:'',width:5}
		};
		if(type!="") {
			trace.type=type;
		}
		if(mode!="") {
			trace.mode=mode;
		}

		if(name!="") {
			trace.name=name;
		}

		if(text!="") {
			trace.text=text;
		}

		if(textposition!="") {
			trace.textposition=textposition;
		}

		if(color!="") {
			trace.line.color=color;
			trace.line.width=1;
		}

		return trace;		
	}


	function get_line_obj(y0,y1,x1,color){
			var line_obj={
				type: 'line',
	      		x0: 0,
	      		y0: y0,
	      		x1: x1,
	      		y1: y1,
		        line: {
			        color: color,
			        width: 1.5
		      	}
			};
			return line_obj;
	}

	function get_shapes(index_name,last_date){
		var shapes=[];
		if(index_name=='Давление'){
			shapes.push(get_line_obj(indexes_array['upper_blood_pressure'].upper_norm,indexes_array['upper_blood_pressure'].upper_norm,last_date,'#F77373'));
			shapes.push(get_line_obj(indexes_array['upper_blood_pressure'].lower_norm,indexes_array['upper_blood_pressure'].lower_norm,last_date,'#F7EA73'));
			shapes.push(get_line_obj(indexes_array['lower_blood_pressure'].upper_norm,indexes_array['lower_blood_pressure'].upper_norm,last_date,'#ECC0F2'));
			shapes.push(get_line_obj(indexes_array['lower_blood_pressure'].lower_norm,indexes_array['lower_blood_pressure'].lower_norm,last_date,'#B5E0F8'));
		}
		else {
			shapes.push(get_line_obj(indexes_array[index_name].upper_norm,indexes_array[index_name].upper_norm,last_date,'#F77373'));
			shapes.push(get_line_obj(indexes_array[index_name].lower_norm,indexes_array[index_name].lower_norm,last_date,'#F7EA73'));
		}
		return shapes;
	}


	function get_layout(index_name) {
		var layout={
				xaxis:{fixedrange: true},
				yaxis:{fixedrange: true},
				showlegend: false
			};
		if(index_name=='Давление') {
			layout.title="График "+index_name;
			//layout.shapes=get_shapes(index_name,to_graph_date(indexes_array['upper_blood_pressure'].date));
		}
		else {
			layout.title="График "+$("#"+index_name+"-index").text();
			//layout.shapes=get_shapes(index_name,to_graph_date(indexes_array[index_name].date));
		}
		return layout;
	}


	function get_norms(index_name) {
        var ten_percent=(indexes_array[index_name].upper_norm-indexes_array[index_name].lower_norm)*0.1;
        var norms={upper:0, lower:0};
        norms.upper=indexes_array[index_name].upper_norm - ten_percent;
        norms.lower=indexes_array[index_name].lower_norm + ten_percent;
        return norms;
    }

    function get_blood_pressure_graph_date(index1_values,index2_values) {
    	var data=[];
    	var upper_blood_pressure_upper_line=get_trace(new Array(dates.length).fill(indexes_array['upper_blood_pressure'].upper_norm), dates,'scatter','lines+text','',['Верхняя граница (верх.давл)'],'top right','#FFB794');
		var upper_blood_pressure_lower_line=get_trace(new Array(dates.length).fill(indexes_array['upper_blood_pressure'].lower_norm), dates,'scatter','lines+text','',['Нижняя граница (верх.давл)'],'bottom right','#FFB794');
		var upper_pressure_norms=get_norms('upper_blood_pressure');
		var upper_blood_pressure_upper_norm_line=get_trace(new Array(dates.length).fill(upper_pressure_norms.upper), dates,'scatter','lines+text','',['Верхняя граница нормы (верх.давл)'],'bottom right','#FBFF94');
		var upper_blood_pressure_lower_norm_line=get_trace(new Array(dates.length).fill(upper_pressure_norms.lower), dates,'scatter','lines+text','',['Нижняя граница нормы (верх.давл)'],'top right','#FBFF94');

		var lower_blood_pressure_upper_line=get_trace(new Array(dates.length).fill(indexes_array['lower_blood_pressure'].upper_norm), dates,'scatter','lines+text','',['Верхняя граница (ниж.давл)'],'top right','#FFB794');
		var lower_blood_pressure_lower_line=get_trace(new Array(dates.length).fill(indexes_array['lower_blood_pressure'].lower_norm), dates,'scatter','lines+text','',['Нижняя граница (ниж.давл)'],'bottom right','#FFB794');
		var lower_pressure_norms=get_norms('lower_blood_pressure');
		var lower_blood_pressure_upper_norm_line=get_trace(new Array(dates.length).fill(lower_pressure_norms.upper), dates,'scatter','lines+text','',['Верхняя граница нормы (ниж.давл)'],'bottom right','#FBFF94');
		var lower_blood_pressure_lower_norm_line=get_trace(new Array(dates.length).fill(lower_pressure_norms.lower), dates,'scatter','lines+text','',['Нижняя граница нормы (ниж.давл)'],'top right','#FBFF94');

		data=[get_trace(index1_values,dates,"",'lines','Верхнее давление'),
		get_trace(index2_values,dates,"",'lines','Нижнее давление'),upper_blood_pressure_upper_line,upper_blood_pressure_lower_line,upper_blood_pressure_upper_norm_line,
		upper_blood_pressure_lower_norm_line,lower_blood_pressure_upper_line,lower_blood_pressure_lower_line,lower_blood_pressure_upper_norm_line,
		lower_blood_pressure_lower_norm_line];

		return data;
    }

	function get_graph_data(dates,index_name,index1_values,index2_values) {
		var data = [], last_date;
		if(index_name=="Давление") {
			last_date=to_graph_date(indexes_array['upper_blood_pressure'].date);
			dates.push(last_date);
			data=get_blood_pressure_graph_date(index1_values,index2_values);
	}
		else {
			last_date=to_graph_date(indexes_array[index_name].date);
			dates.push(last_date);
			var upper_line=get_trace(new Array(dates.length).fill(indexes_array[index_name].upper_norm), dates,'scatter','lines+text','',['Верхняя граница'],'top right','#FFB794');
			var lower_line=get_trace(new Array(dates.length).fill(indexes_array[index_name].lower_norm), dates,'scatter','lines+text','',['Нижняя граница'],'bottom right','#FFB794');
			var norms=get_norms(index_name);
			var upper_norm_line=get_trace(new Array(dates.length).fill(norms.upper), dates,'scatter','lines+text','',['Верхняя граница  нормы'],'bottom right','#FBFF94');
			var lower_norm_line=get_trace(new Array(dates.length).fill(norms.lower), dates,'scatter','lines+text','',['Нижняя граница нормы'],'top right','#FBFF94');
			data=[get_trace(index1_values,dates,'scatter'),upper_line,lower_line,upper_norm_line,lower_norm_line];	
		}
		return data;
	}

	function show_graph(index1_values,index_name,index2_values) {
		Plotly.newPlot('graph-modal-body', get_graph_data(dates,index_name,index1_values,index2_values),get_layout(index_name),{staticPlot: true});
		$(".modebar").css("display","none");
		$(".modebar--hover").css("display","none");
		/*if(index_name=="Давление"){
			$("#upper_border_label").html('<img src="images/icons/upper_norm.png"/>Верхняя граница (верх.давл)');
			$("#lower_border_label").html('<img src="images/icons/lower_norm.png"/>Нижняя граница (верх.давл)</br>');
			$("#lower_blood_upper_border_label").css("display","inline");
			$("#lower_blood_lower_border_label").css("display","inline");
		}*/
		$("#graph-modal").css("display","block");
	}
	
	
	function get_rand_value_in_range(min, max) {
		var x=Math.random() * (max - min) + min ;
		return x.toFixed(1);
	}

	function generate_random_index_values(index_name) {
		var lower_norm=indexes_array[index_name].lower_norm;
		var upper_norm=indexes_array[index_name].upper_norm;
		var rand_values=[];
		for(i=0;i<4;i++) {
			if(index_name=="upper_blood_pressure" || index_name=="lower_blood_pressure"){
				rand_values.push(Math.round(get_rand_value_in_range(lower_norm,upper_norm)));
			}
			else {
				rand_values.push(get_rand_value_in_range(lower_norm,upper_norm));
			}
		}
		rand_values.push(indexes_array[index_name].val);
		return rand_values;
	}
	
	$(".graph").click(function(e){
		e.preventDefault();
		if(document.getElementById('go-to-result-test-save')){
		var btn_id=e.target.id;
		var name=btn_id.split('-')[0];
		if(name=="pressure") {
			var upper_blood_values=generate_random_index_values('upper_blood_pressure');
			var lower_blood_values=generate_random_index_values('lower_blood_pressure');
			show_graph(upper_blood_values,"Давление",lower_blood_values);
			fill_graph_table(upper_blood_values,lower_blood_values);
		}
		else {
			var rand_vals=generate_random_index_values(name);
			show_graph(rand_vals,name);
			fill_graph_table(rand_vals);
		}
	}});/*ask_last_results(name, show_dates_results);*/
		
	

	$("#graph-close").click(function(e){
		e.preventDefault();
		$("#graph-modal").css("display","none");
		$("#graph-table").empty();
		dates.pop();
		/*$("#upper_border_label").html('<img src="images/icons/upper_norm.png"/> Верхняя граница');
		$("#lower_border_label").html('<img src="images/icons/lower_norm.png"/> Нижняя граница</br>');
		$("#lower_blood_upper_border_label").css("display","none");
		$("#lower_blood_lower_border_label").css("display","none");*/
	});
	
	if(document.getElementById('go-to-result-test-save')){
		fill_demo_values();
		if(show_other_indexes==true) {
			fill_other_indexes_values();
		}
	}
});

