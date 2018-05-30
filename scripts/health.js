

$( document ).ready(function() {
   var is_blodd_btn=false;
   var pl_btn_id="none"; //which button is clicked
   var code, result_percent,index_name,health_num_value,health_num_date;
   var is_high=false, is_high_border=false, is_low_border=false,is_low=false, is_normal=false;

   
   $(".pl-btn").click(function(e) { 
	   e.preventDefault();
	   $("#modal-index-value").val('');
	   pl_btn_id=e.target.id; //get button id
	   
	   if(pl_btn_id=="blood-btn") {
		   is_blodd_btn=true;
	   }
	   else{
			is_blodd_btn = false;
	   }
	   
	   var x=$(this).offset();
	   $("#health-modal").css("top",x.top+30);
	    $("#health-modal").css("left",x.left-200);
	   $("#health-modal").css("display","block"); //show modal for adding index value
   });
   
   $("#add-close").click(function(e){
	   e.preventDefault();
	   $("#health-modal").css("display","none");
	   $("#modal-index-value").val("");
   });
   
   /*SHOW CHOLESTEROL MODAL REASON*/
   $("#cholesterol-reason").click(function(e){
	    e.preventDefault();
		
		var cholesterol_norm="3.16 – 5.59";//TODO
		var user_index_value="";
		var cholesterol_reasons;
		var recommendations;
		$("#index-norm").text("Моя норма общего холестерина " + cholesterol_norm + " ⁄ литр");
		if(is_high) {
			user_index_value="превышает норму на " + result_percent.toString() + "%"; //add procent
			recommendations='Рекомендуем сдать биохимический анализ крови и получить подробную расшифровку сколько у вас «хорошего» холестерина, сколько «плохого» и какой риск развития атеросклероза сосудов.<br> <br> Рекомендуем распечатать анализ и обратиться к терапевту или эндокринологу';
		}
		
		else if (is_high_border || is_low_border) {
			user_index_value="на границе нормы."
			recommendations ='Рекомендуем следить за данным параметром и проверять его не реже 1 раза в 6 месяцев чтобы в случае превышения нормы своевременно его устранить';
		}
		
		else if (is_low) {
			user_index_value="ниже нормы на " + result_percent.toString()+"%"; //TODO
			recommendations='Рекомендуем распечатать анализ и обратиться к терапевту или эндокринологу';
		}
		$("#my-index-value").text("Сейчас этот показатель у меня "+ user_index_value);
		
		if (is_high || is_high_border ) {
			$("#index-description").text("При повышенной концентрации холестерина возрастает риск развития нарушений функций сердечно-сосудистой системы и головного мозга. Высокая концентрация вредного холестерина в крови провоцирует его отложение на сосудистых стенках. В результате образования бляшек и сужения просвета вен и артерий происходит нарушение кровообращения, в первую очередь от патологических изменений страдают сердце, почки и головной мозг.");
			cholesterol_reasons=
					'<p id="possible-reasons-header">Возможные причины:</p>'+
								'<ul id="possible-reasons">'+
									'<li>Застойные процессы и камни в желчном пузыре;</li>'+
									'<li>Болезни почек;</li>'+
									'<li>Заболевания печени;</li>'+
									'<li>Нарушения функции щитовидной железы;</li>'+
									'<li>Сахарный диабет;</li>'+
									'<li>Рак поджелудочной железы;</li>'+
									'<li>Рак предстательной железы у мужчин;</li>'+
									'<li>Алкоголизм;</li>'+
									'<li>Генетическая предрасположенность;</li>'+
									'<li>Ожирение.</li>'+
								'</ul>'
			$("#acticle").text("Статья про повышенный холестерин");
			$("#acticle").attr("href","http://holesterin-lechenie.ru/lechenie/holesterin-nizkoj-plotnosti-povyshen-prichiny-i-lechenie");
		}

		if (is_low || is_low_border ) {
			$("#index-description").text("У человека со критически сниженными показателями холестерина отмечается склонность к суициду, алкогольной и наркотической зависимости.");
			cholesterol_reasons=
					'<p id="possible-reasons-header">Возможные причины:</p>'+
								'<ul id="possible-reasons">'+
									'<li>Генетическая предрасположенность;</li>'+
									'<li>Нарушение функционирования печени, кишечника, надпочечников или почек;</li>'+
									'<li>Дисфункция половых желез;</li>'+
									'<li>Избыточный синтез гормонов щитовидной железы (гипотериоз);</li>'+
									'<li>Онкологический процесс в центральном органе кроветворения;</li>'+
									'<li>Форма анемии, для которой характерен дефицит витамина В12;</li>'+
									'<li>Заболевание органов дыхания;</li>'+
									'<li>Воспалительный процесс суставов;</li>'+
									'<li>Острый инфекционный процесс;</li>'+
								'</ul>'
			$("#acticle").text("Статья про пониженный холестерин");
			$("#acticle").attr("href","https://oholesterine.ru/nizkiy-uroven-holesterina-v-organizme.html");
		}
		
		$("#possible-reasons-wrapper").html(cholesterol_reasons);
		$("#recommendations-p").html(recommendations);
		$("#reason-modal-content").css("height",500);
		$("#reason-modal").css("display","block");
	});
	
	/*SHOW SUGAR MODAL REASON*/
	$("#sugar-reason").click(function(e) {
		e.preventDefault();
		var user_index_value="";
		var recommendations;
		$("#index-norm").text("Моя норма глюкозы 3,3 – 5,5 ммоль/л");
		if(is_high) {
			user_index_value="превышает норму на "+ result_percent.toString() + "%";
			recommendations ='Рекомендуем распечатать анализ и обратиться к терапевту или эндокринологу';
		}
		
		if(is_low) {
			
			user_index_value="ниже нормы на"+ result_percent.toString() + "%";
			recommendations ='Рекомендуем распечатать анализ и обратиться к терапевту или эндокринологу';
		}
		
		if(is_high_border || is_low_border) {
			user_index_value="находится на границы нормы";
			recommendations ='Рекомендуем следить за данным параметром и проверять его не реже 1 раза в 6 месяцев чтобы в случае превышения нормы своевременно его устранить';
		}
		
		$("#my-index-value").text("Сейчас этот показатель у меня " +user_index_value);
		if(is_high || is_high_border) {
			$("#index-description").text("Гипергликемия (повышенный сахар в крови) характерна только для эндокринных заболеваний (нарушение работы желез ), таких как сахарный диабет, повышенная функция щитовидной железы, для заболеваний гипоталамуса – области головного мозга, которая отвечает за всю работу желёз внутренней секреции, в редких случаях может быть из-за некоторых заболеваний печени. При продолжительной гипергликемии, начинается стойкое нарушение обменных процессов, которое приводит к ощущению сильной слабости, иммунная система начинает давать сбои, начинаются регулярные гнойные воспалительные процессы в организме, происходит нарушение половых функций и нарушается кровоснабжение всех тканей.");
			$("#recommendations-p").html("Рекомендуем следить за данным параметром и проверять его не реже 1 раза в 6 месяцев чтобы в случае превышения нормы своевременно его устранить.");
			$("#acticle").text("Статья про повышенный уровень сахара в крови");
			$("#acticle").attr("href","https://www.ayzdorov.ru/ttermini_sahar_v_krovi.php");
		}
		
		if(is_low || is_low_border) {
			$("#index-description").text("Развиться постоянная гипогликемия (пониженный сахар в крови) может и при разных заболеваниях поджелудочной железы, которые связаны с разрастанием её тканей, а также клеток, которые вырабатывают инсулин, это могут быть различные опухоли. Постоянная гипогликемия также может начаться из-за тяжёлых заболеваний печени, при которых происходит нарушение процессов усвояемости и случается выброс гликогена в кровь, а также заболевание почек, надпочечников и гипоталамуса могут быть причиной развития гипогликемии.");
			$("#recommendations-p").html("Рекомендуем следить за данным параметром и проверять его не реже 1 раза в 6 месяцев чтобы в случае превышения нормы своевременно его устранить.");
			$("#acticle").text("Статья про пониженный уровень сахара в крови");
			$("#acticle").attr("href","https://www.ayzdorov.ru/ttermini_sahar_v_krovi.php");
		}
		
		$("#possible-reasons-wrapper").html('');
		$("#reason-modal-content").css("height",450);
		$("#recommendations-p").html(recommendations);
		$("#reason-modal").css("display","block");
	});
	
	/*SHOW BLOOD PRESSURE MODAL REASON*/
	$("#blood-reason").click(function(e) {
		e.preventDefault();
		var user_index_value="";
		var recommendations;
		$("#index-norm").text("Нормальное давление для меня ___ на ___");
		if(is_high) {
			user_index_value="превышает норму на "+ result_percent.toString() + "%";;
			recommendations ='Рекомендуем распечатать анализ и обратиться к терапевту или эндокринологу';
		}
		
		if(is_low) {
			
			user_index_value="ниже нормы на "+ result_percent.toString() + "%";;
			recommendations ='Рекомендуем распечатать анализ и обратиться к терапевту или эндокринологу';
		}
		
		if(is_high_border || is_low_border) {
			user_index_value="находится на границы нормы";
			recommendations ='Рекомендуем следить за данным параметром и проверять его не реже 1 раза месяц чтобы в случае превышения нормы своевременно его устранить';
		}
		
		$("#my-index-value").text("Сейчас этот показатель у меня " +user_index_value);
		if(is_high || is_high_border) {
			$("#index-description").html('В большинстве случаев, длительное сохранение повышенного давления свидетельствует о развитии болезней:<br>'+
										'эндокринной системы;<br>сердца и сосудов;<br>остеохондроза;<br>вегето-сосудистой дистонии.');
										
			$("#recommendations-p").html("Рекомендуем следить за данным параметром и проверять его не реже 1 раза в 6 месяцев чтобы в случае превышения нормы своевременно его устранить.");
			$("#acticle").text("Статья про повышенное давление");
			$("#acticle").attr("href","http://attuale.ru/arterialnoe-davlenie-norma-po-vozrastam-tablitsa/");
		}
		
		if(is_low || is_low_border) {
			$("#index-description").text("Гипотония (пониженное давление) наблюдается при кровотечениях, сердечной недостаточности, обезвоживании, шейном остеохондрозе, цистите, туберкулезе, анемии, ревматизме, гипогликемии, язве желудка, панкреатите. В отдельных случаях, понижение показателей тонометра возможно при переутомлении, недостатке витаминов и резкой смене климата.");
			
			$("#recommendations-p").html("Рекомендуем следить за данным параметром и проверять его не реже 1 раза в 6 месяцев чтобы в случае превышения нормы своевременно его устранить.");
			$("#acticle").text("Статья про пониженное давление");
			$("#acticle").attr("href","http://attuale.ru/arterialnoe-davlenie-norma-po-vozrastam-tablitsa/");
		}
		
		$("#possible-reasons-wrapper").html('');
		$("#recommendations-p").html(recommendations);
		$("#reason-modal-content").css("height",450);
		$("#reason-modal").css("display","block");
		
		
	});
	
	/*SHOW WEIGHT MODAL REASON*/
	$("#weight-reason").click(function(e) {
		e.preventDefault();
		var user_index_value="";
		var recommendations;
		var weight_reasons
		$("#index-norm").text("Нормальное давление для меня ___ на ___");
		if(is_high) {
			user_index_value="превышает норму на "+ result_percent.toString() + "%";;
			recommendations ='Рекомендуем распечатать анализ и обратиться к терапевту или эндокринологу';
		}
		
		if(is_low) {
			
			user_index_value="ниже нормы на "+ result_percent.toString() + "%";;
			recommendations ='Рекомендуем распечатать анализ и обратиться к терапевту или эндокринологу';
		}
		
		if(is_high_border || is_low_border) {
			user_index_value="находится на границы нормы";
			recommendations ='Рекомендуем следить за данным параметром и проверять его не реже 1 раза месяц чтобы в случае превышения нормы своевременно его устранить';
		}
		
		$("#my-index-value").text("Сейчас этот показатель у меня " +user_index_value);
		if(is_high || is_high_border) {
			weight_reasons=
					'<p id="possible-reasons-header">Причины появления лишнего веса:</p>'+
								'<ul id="possible-reasons">'+
									'<li>Неправильный обмен веществ;</li>'+
									'<li>Генетика;</li>'+
									'<li>Эндокринные заболевания;</li>'+
									'<li>Сахарный диабет;</li>'+
									'<li>Сердечно-сосудистые патологии;</li>'+
									'<li>Болезни кровеносной системы;</li>'+
									'<li>Психотропные препараты;</li>'+
									'<li>Гормональные изменения;</li>'+
								'</ul>'
			$("#acticle").text("Статья про лишний вес");
			$("#acticle").attr("href","статья https://diets.guru/pohudenie/prichiny-lishnego-vesa/");
		}
		
		if(is_low || is_low_border) {
			weight_reasons=
					'<p id="possible-reasons-header">Причины дефицита веса:</p>'+
								'<ul id="possible-reasons">'+
									'<li>Недоедание;</li>'+
									'<li>Заболевания желудочно-кишечного тракта;</li>'+
									'<li>Гиперфункция щитовидной железы;</li>'+
									'<li>Недостаточное функционирование надпочечников;</li>'+
									'<li>Сахарный диабет;</li>'+
									'<li>Неправильный образ жизни: нехватка в рационе жиров и углеводов, недостаток сна, стрессы, излишняя физическая активность, курение;</li>'+
									'<li>Наследственность ;</li>'+
								'</ul>'
			$("#acticle").text("Статья про пониженный вес");
			$("#acticle").attr("href","http://fb.ru/article/257885/defitsit-massyi-tela-prichinyi-i-lechenie-nedostatka-vesa");
		}
		
		$("#possible-reasons-wrapper").html(weight_reasons);
		$("#recommendations-p").html(recommendations);
		$("#reason-modal-content").css("height",500);
		$("#reason-modal").css("display","block");
		
	});
	
	$("#reason-close").click(function(e){	
	   e.preventDefault();
	   $("#reason-modal").css("display","none");
   });
   
 
   
   function set_values() {
	   
	   var brd_id="#"+index_name+"-brd";
	   /*var date_id="#"+index_name+"-date";
	   var value_span_id="#"+index_name+"-span";
	   var estimatimation_id="#"+index_name+"-estm";*/
	   
	   $(date_id).text(health_num_date);
	   $(value_span_id).text(health_num_value);
	   
	   if(is_high) {
		   $(brd_id).css("background-color","red");  
		  // $(estimatimation_id).text("Повышен");
	   }
	   
	   else if (is_high_border) {
		   $(brd_id).css("background-color","yellow");
		 //  $(estimatimation_id).text("Верхняя граница");
	   }
	   else if(is_low_border) {
		   $(brd_id).css("background-color","yellow");
		  // $(estimatimation_id).text("Нижняя граница");
		   
	   }
	   
	   else if (is_low){
		  $(brd_id).css("background-color","red"); 
		 // $(estimatimation_id).text("Понижен");
	   }
	 
   }
  
   

   function set_borders(border_kind) {
	   alert(typeof (border_kind));
	   if(border_kind==-2) {
		   is_low=true;
		   alert("low border");
	   }
	   else if (border_kind==-1) {
		   is_low_border=true;
	   }
	   else if (border_kind == 0) {
		   is_normal=true;
	   }
	   else if (border_kind==1) {
		   is_high_border=true;
	   }
	   else if (border_kind == 2) {
		   is_high=true;
	   }
	  
   }
   
   function check_answer(answer) {
		code=answer.result;
		//alert(answer);
		if(code!=700) {
			alert(code['border_kind']+'  '+code['result_percent'] + ' ' + code['result_lower_norm'] + ' ' + code['result_upper_norm']);
			result_percent=code['result_percent'];
			set_borders(code['border_kind']);
			$("#health-modal").css("display","none");
			set_values();
			}
		if(code==700) {
			alert("Cервис недоступен, попробуйте позже");
		}
	}
	
//=====================SEND DATA==============================
	function send_cholesterol_value(val,date,callback) {
		index_name="cholesterol";
		$.ajax({
			type: 'POST',
			url: 'health_borders.php',
			data: {
				health_num_cholesterol: val, 
				health_num_date: date
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
		health_num_value = $("#modal-index-value").val();			
		health_num_date = $("#date").val();
		
		if(pl_btn_id == 'cholesterol-btn'){
			send_cholesterol_value(health_num_value, health_num_date, check_answer);
		}
		
		
		else if(pl_btn_id == 'sugar-btn'){
			$.ajax({
				type: 'POST',
				url: 'health_borders.php',
				data: {
					health_num_glucose: health_num_value,
					health_num_date: health_num_date
				},
				dataType : 'json',
				success: function(data){
					//alert(data);					
					code=data.result;
					alert(code);
					if(code==700) {
						alert("Cервис недоступен, попробуйте позже");
					}
				}
			});
		}
		else if(pl_btn_id == 'blood-btn'){
			// pressure format XXX/XXX
			var reg = /^\d+\/\d+$/;
			if(!reg.test(health_num_value)){
				alert("Неправильно введены данные!");
			}
			else{
				health_num_value = health_num_value.split('/');
				$.ajax({
					type: 'POST',
					url: 'health_borders.php',
					data: {
						health_num_upper_pressure: health_num_value[0],
						health_num_lower_pressure: health_num_value[1],
						health_num_date: health_num_date
					},
					dataType : 'json',
					success: function(data){			
						code=data.result;
						if(code==700) {
							alert("Cервис недоступен, попробуйте позже");
						}
					}
				});
			}
		}
		else if(pl_btn_id == 'weight-btn'){
			$.ajax({
				type: 'POST',
				url: 'health_borders.php',
				data: {
					health_num_weight: health_num_value,
					health_num_date: health_num_date
				},
				dataType : 'json',
				success: function(data){
					alert(data);					
					code=data.result;
					if(code==700) {
						alert("Cервис недоступен, попробуйте позже");
					}
				}
			});
		}
	});
});