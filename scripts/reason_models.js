$( document ).ready(function() {
   
   /*SHOW CHOLESTEROL MODAL REASON*/
   $("#cholesterol-reason").click(function(e){
	    e.preventDefault();
		if(indexes_array["cholesterol"].border_kind!=0) {
		var lower_norm=indexes_array["cholesterol"].lower_norm;
		var upper_norm=indexes_array["cholesterol"].upper_norm;
		var user_index_value=indexes_array["cholesterol"].val;
		var cholesterol_reasons;
		var recommendations;
		$("#index-norm").text("Ваша норма общего холестерина " + lower_norm.toString()+"-" + upper_norm.toString() + " ⁄ литр.");
		if(indexes_array["cholesterol"].border_kind==2) {
			user_index_value="превышает норму на " + indexes_array["cholesterol"].percent.toString() + "%"; //add procent
			recommendations='Рекомендуем сдать биохимический анализ крови и получить подробную расшифровку сколько у вас «хорошего» холестерина, сколько «плохого» и какой риск развития атеросклероза сосудов.<br> <br> Рекомендуем распечатать анализ и обратиться к терапевту или эндокринологу';
		}
		
		else if (indexes_array["cholesterol"].border_kind==-1 || indexes_array["cholesterol"].border_kind==1) {
			user_index_value="на границе нормы."
			recommendations ='Рекомендуем следить за данным параметром и проверять его не реже 1 раза в 6 месяцев чтобы в случае превышения нормы своевременно его устранить';
		}
		
		else if (indexes_array["cholesterol"].border_kind==-2) {
			user_index_value="ниже нормы на " + indexes_array["cholesterol"].percent.toString() +"%"; //TODO
			recommendations='Рекомендуем распечатать анализ и обратиться к терапевту или эндокринологу';
		}
		$("#my-index-value").text("Сейчас этот показатель у Вас "+ user_index_value);
		
		if (indexes_array["cholesterol"].border_kind==2 || indexes_array["cholesterol"].border_kind==1 ) {
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

		if (indexes_array["cholesterol"].border_kind==-2 || indexes_array["cholesterol"].border_kind==-1 ) {
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
			
		}
	});
	
	/*SHOW SUGAR MODAL REASON*/
	$("#sugar-reason").click(function(e) {
		e.preventDefault();
		var recommendations;
		var lower_norm=indexes_array["sugar"].lower_norm;
		var upper_norm=indexes_array["sugar"].upper_norm;
		var user_index_value=indexes_array["sugar"].val;
		$("#index-norm").text("Ваша норма глюкозы 3,3 – 5,5 ммоль/л");
		if(indexes_array["sugar"].border_kind==2) {
			user_index_value="превышает норму на "+ indexes_array["sugar"].percent.toString() + "%";
			recommendations ='Рекомендуем распечатать анализ и обратиться к терапевту или эндокринологу';
		}
		if(indexes_array["sugar"].border_kind==-2) {
			user_index_value="ниже нормы на "+ indexes_array["sugar"].percent.toString() + "%";
			recommendations ='Рекомендуем распечатать анализ и обратиться к терапевту или эндокринологу';
		}
		if(indexes_array["sugar"].border_kind==-1 || indexes_array["sugar"].border_kind==1) {
			user_index_value="находится на границы нормы";
			recommendations ='Рекомендуем следить за данным параметром и проверять его не реже 1 раза в 6 месяцев чтобы в случае превышения нормы своевременно его устранить';
		}
		$("#my-index-value").text("Сейчас этот показатель у Вас " +user_index_value);
		if(indexes_array["sugar"].border_kind==2 || indexes_array["sugar"].border_kind==1) {
			$("#index-description").text("Гипергликемия (повышенный сахар в крови) характерна только для эндокринных заболеваний (нарушение работы желез ), таких как сахарный диабет, повышенная функция щитовидной железы, для заболеваний гипоталамуса – области головного мозга, которая отвечает за всю работу желёз внутренней секреции, в редких случаях может быть из-за некоторых заболеваний печени. При продолжительной гипергликемии, начинается стойкое нарушение обменных процессов, которое приводит к ощущению сильной слабости, иммунная система начинает давать сбои, начинаются регулярные гнойные воспалительные процессы в организме, происходит нарушение половых функций и нарушается кровоснабжение всех тканей.");
			$("#recommendations-p").html("Рекомендуем следить за данным параметром и проверять его не реже 1 раза в 6 месяцев чтобы в случае превышения нормы своевременно его устранить.");
			$("#acticle").text("Статья про повышенный уровень сахара в крови");
			$("#acticle").attr("href","https://www.ayzdorov.ru/ttermini_sahar_v_krovi.php");
		}
		if(indexes_array["sugar"].border_kind==-2 ||indexes_array["sugar"].border_kind==-1) {
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
	
	
	
	/*SHOW WEIGHT MODAL REASON*/
	$("#weight-reason").click(function(e) {
		e.preventDefault();
		if(indexes_array["weight"].border_kind!=0) {
			var lower_norm=indexes_array["weight"].lower_norm;
			var upper_norm=indexes_array["weight"].upper_norm;
			var user_index_value=indexes_array["weight"].val;
			var recommendations;
			var weight_reasons;
			$("#index-norm").text("Ваша норма веса " + lower_norm.toString()+"-" + upper_norm.toString() + "кг.");
			if(indexes_array["weight"].border_kind==2) {
				user_index_value="превышает норму на "+ indexes_array["weight"].percent.toString() + "%";;
				recommendations ='Рекомендуем распечатать анализ и обратиться к терапевту или эндокринологу';
			}
			
			if(indexes_array["weight"].border_kind==-2) {
				user_index_value="ниже нормы на "+ result_percent.toString() + "%";;
				recommendations ='Рекомендуем распечатать анализ и обратиться к терапевту или эндокринологу';
			}
			
			if(indexes_array["weight"].border_kind==1 || indexes_array["weight"].border_kind==-1) {
				user_index_value="находится на границы нормы";
				recommendations ='Рекомендуем следить за данным параметром и проверять его не реже 1 раза месяц чтобы в случае превышения нормы своевременно его устранить';
			}
			
			$("#my-index-value").text("Сейчас этот показатель у Вас " +user_index_value);
			
			if(indexes_array["weight"].border_kind==2 || indexes_array["weight"].border_kind==1) {
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
			
			if(indexes_array["weight"].border_kind==-2 || indexes_array["weight"].border_kind==-1) {
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
		}
	});
	
	
	
	/*SHOW BLOOD PRESSURE MODAL REASON*/
	$("#blood-reason").click(function(e) {
		e.preventDefault();
		var lower_value=indexes_array["lower_blood_pressure"].val, upper_value=indexes_array["upper_blood_pressure"].val;
		var border_kind=get_blood_pressure_border_kind(indexes_array["upper_blood_pressure"].border_kind,indexes_array["lower_blood_pressure"].border_kind);
		if(border_kind!=0) {
			var upper_pressure_upper_norm=indexes_array["upper_blood_pressure"].upper_norm;
			var upper_pressure_lower_norm=indexes_array["upper_blood_pressure"].lower_norm;
			var lower_pressure_upper_norm=indexes_array["lower_blood_pressure"].upper_norm;
			var lower_pressure_lower_norm=indexes_array["lower_blood_pressure"].lower_norm;
			
			var lower_blood_kind=indexes_array["lower_blood_pressure"].border_kind;
			var upper_blood_kind=indexes_array["upper_blood_pressure"].border_kind;
			var recommendations;
			
			$("#index-norm").text("Нормальное давление для Вас  ("+upper_pressure_lower_norm.toString()+"-"+upper_pressure_upper_norm.toString()+")/("+lower_pressure_lower_norm.toString()+"-"+lower_pressure_upper_norm.toString()+")");
			var text="";
			
			if(border_kind==2) { 
				if(upper_blood_kind==2) {
				 text="Сейчас Ваше верхнее давление (систолическое) превышено на " +indexes_array["upper_blood_pressure"].percent.toString()+"% / нижнее (диастолическое) ";
				}
				if(upper_blood_kind==-2) {
					 text="Сейчас Ваше верхнее давление (систолическое) ниже нормы на " +indexes_array["upper_blood_pressure"].percent.toString()+"% / нижнее (диастолическое) ";
				}
				
				if(upper_blood_kind==-1 || upper_blood_kind==1) {
					 text="Сейчас Ваше верхнее давление (систолическое) в норме / нижнее (диастолическое) ";
				}
				//////////////////////////////////
				if(lower_blood_kind==0) {
					text+="в норме"
				}
				if (lower_blood_kind==1 || lower_blood_kind==-1) {
					text+="на границе нормы"
				}
				if(lower_blood_kind==-2) {
					text+="ниже нормы на "+indexes_array["lower_blood_pressure"].percent.toString()+"%.";
				}
				if(lower_blood_kind==2) {
					
					text+="превышает норму на "+indexes_array["lower_blood_pressure"].percent.toString()+"%.";	
				}
				
				if(upper_blood_kind==0 && (lower_blood_kind==1 || lower_blood_kind==-1)) {
					text="Сейчас Ваше нижнее (диастолическое) давление на границе нормы";
				}
				
				if(upper_blood_kind==0 && lower_blood_kind==2) {
					text="Сейчас Ваше нижнее (диастолическое) давление превышает норму на "+indexes_array["lower_blood_pressure"].percent.toString()+"%.";
				}
				
				if(upper_blood_kind==0 && lower_blood_kind==-2) {
						text="Сейчас Ваше нижнее (диастолическое) давление ниже нормы на "+indexes_array["lower_blood_pressure"].percent.toString()+"%.";
				}
				
				
				
				recommendations ='Рекомендуем распечатать анализ и обратиться к терапевту или эндокринологу.';
			}
			
				if(border_kind==-2) {
					
					if(upper_blood_kind==2) {
					 text="Сейчас Ваше верхнее давление (систолическое) превышено на " +indexes_array["upper_blood_pressure"].percent.toString()+"% / нижнее (диастолическое) ";
					}
					if(upper_blood_kind==-2) {
						 text="Сейчас Ваше верхнее давление (систолическое) ниже нормы на " +indexes_array["upper_blood_pressure"].percent.toString()+"% / нижнее (диастолическое) ";
					}
					
					if(upper_blood_kind==-1 || upper_blood_kind==1) {
						 text="Сейчас Ваше верхнее давление (систолическое) в норме / нижнее (диастолическое) ";
					}
					
					if(lower_blood_kind==0) {
						text+="в норме"
					}
					if (lower_blood_kind==1 || lower_blood_kind==-1) {
						text+="на границе нормы"
					}
					if(lower_blood_kind==-2) {
						text+="ниже нормы на "+indexes_array["lower_blood_pressure"].percent.toString()+"%.";
					}
				    if(lower_blood_kind==2) {
						text+="превышает норму на "+indexes_array["lower_blood_pressure"].percent.toString()+"%.";	
					}
					
					if(upper_blood_kind==0 && (lower_blood_kind==1 || lower_blood_kind==-1)) {
					text="Сейчас Ваше нижнее (диастолическое) давление на границе нормы";
			    	}
				
    				if(upper_blood_kind==0 && lower_blood_kind==2) {
    					text="Сейчас Ваше нижнее (диастолическое) давление превышает норму на "+indexes_array["lower_blood_pressure"].percent.toString()+"%.";
    				}
    				
    				if(upper_blood_kind==0 && lower_blood_kind==-2) {
    						text="Сейчас Ваше нижнее (диастолическое) давление ниже нормы на "+indexes_array["lower_blood_pressure"].percent.toString()+"%.";
    				}
    					
					recommendations ='Рекомендуем распечатать анализ и обратиться к терапевту или эндокринологу.';
				}
				
				if(border_kind==1 || border_kind==-1) {
					text="находится на границы нормы";
					recommendations ='Рекомендуем следить за данным параметром и проверять его не реже 1 раза месяц чтобы в случае превышения нормы своевременно его устранить';
				}
				if(border_kind==2 || border_kind==1) {
					$("#index-description").html('В большинстве случаев, длительное сохранение повышенного давления свидетельствует о развитии болезней:<br><br>'+
												'эндокринной системы;<br>сердца и сосудов;<br>остеохондроза;<br>вегето-сосудистой дистонии.');
												
					$("#recommendations-p").html("Рекомендуем следить за данным параметром и проверять его не реже 1 раза в 6 месяцев чтобы в случае превышения нормы своевременно его устранить.");
					$("#acticle").text("Статья про повышенное давление");
					$("#acticle").attr("href","http://attuale.ru/arterialnoe-davlenie-norma-po-vozrastam-tablitsa/");
				}
				
				if(border_kind==-2 || border_kind==-1) {
					$("#index-description").text("Гипотония (пониженное давление) наблюдается при кровотечениях, сердечной недостаточности, обезвоживании, шейном остеохондрозе, цистите, туберкулезе, анемии, ревматизме, гипогликемии, язве желудка, панкреатите. В отдельных случаях, понижение показателей тонометра возможно при переутомлении, недостатке витаминов и резкой смене климата.");
					
					$("#recommendations-p").html("Рекомендуем следить за данным параметром и проверять его не реже 1 раза в 6 месяцев чтобы в случае превышения нормы своевременно его устранить.");
					$("#acticle").text("Статья про пониженное давление");
					$("#acticle").attr("href","http://attuale.ru/arterialnoe-davlenie-norma-po-vozrastam-tablitsa/");
				}
			
				$("#my-index-value").text(text);
				$("#possible-reasons-wrapper").html('');
				$("#recommendations-p").html(recommendations);
				$("#reason-modal-content").css("height",450);
				$("#reason-modal").css("display","block");
			}
		
	});
	
	
});
