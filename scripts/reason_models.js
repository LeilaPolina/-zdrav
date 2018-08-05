$( document ).ready(function() {

	
   if(indexes_array["cholesterol"].border_kind!=0) {
		$("#cholesterol-reason").text("Причина");
	}
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
	$("#glucose-reason").click(function(e) {
		
		e.preventDefault();
		if(indexes_array["glucose"].border_kind!=0) {
		var recommendations;
		var lower_norm=indexes_array["glucose"].lower_norm;
		var upper_norm=indexes_array["glucose"].upper_norm;
		var user_index_value=indexes_array["glucose"].val;
		$("#index-norm").text("Ваша норма глюкозы 3,3 – 5,5 ммоль/л");
		if(indexes_array["glucose"].border_kind==2) {
			user_index_value="превышает норму на "+ indexes_array["glucose"].percent.toString() + "%";
			recommendations ='Рекомендуем распечатать анализ и обратиться к терапевту или эндокринологу';
		}
		if(indexes_array["glucose"].border_kind==-2) {
			user_index_value="ниже нормы на "+ indexes_array["glucose"].percent.toString() + "%";
			recommendations ='Рекомендуем распечатать анализ и обратиться к терапевту или эндокринологу';
		}
		if(indexes_array["glucose"].border_kind==-1 || indexes_array["glucose"].border_kind==1) {
			user_index_value="находится на границы нормы";
			recommendations ='Рекомендуем следить за данным параметром и проверять его не реже 1 раза в 6 месяцев чтобы в случае превышения нормы своевременно его устранить';
		}
		$("#my-index-value").text("Сейчас этот показатель у Вас " +user_index_value);
		if(indexes_array["glucose"].border_kind==2 || indexes_array["glucose"].border_kind==1) {
			$("#index-description").text("Гипергликемия (повышенный сахар в крови) характерна только для эндокринных заболеваний (нарушение работы желез ), таких как сахарный диабет, повышенная функция щитовидной железы, для заболеваний гипоталамуса – области головного мозга, которая отвечает за всю работу желёз внутренней секреции, в редких случаях может быть из-за некоторых заболеваний печени. При продолжительной гипергликемии, начинается стойкое нарушение обменных процессов, которое приводит к ощущению сильной слабости, иммунная система начинает давать сбои, начинаются регулярные гнойные воспалительные процессы в организме, происходит нарушение половых функций и нарушается кровоснабжение всех тканей.");
			$("#recommendations-p").html("Рекомендуем следить за данным параметром и проверять его не реже 1 раза в 6 месяцев чтобы в случае превышения нормы своевременно его устранить.");
			$("#acticle").text("Статья про повышенный уровень сахара в крови");
			$("#acticle").attr("href","https://www.ayzdorov.ru/ttermini_sahar_v_krovi.php");
		}
		if(indexes_array["glucose"].border_kind==-2 ||indexes_array["glucose"].border_kind==-1) {
			$("#index-description").text("Развиться постоянная гипогликемия (пониженный сахар в крови) может и при разных заболеваниях поджелудочной железы, которые связаны с разрастанием её тканей, а также клеток, которые вырабатывают инсулин, это могут быть различные опухоли. Постоянная гипогликемия также может начаться из-за тяжёлых заболеваний печени, при которых происходит нарушение процессов усвояемости и случается выброс гликогена в кровь, а также заболевание почек, надпочечников и гипоталамуса могут быть причиной развития гипогликемии.");
			$("#recommendations-p").html("Рекомендуем следить за данным параметром и проверять его не реже 1 раза в 6 месяцев чтобы в случае превышения нормы своевременно его устранить.");
			$("#acticle").text("Статья про пониженный уровень сахара в крови");
			$("#acticle").attr("href","https://www.ayzdorov.ru/ttermini_sahar_v_krovi.php");
		}
		$("#possible-reasons-wrapper").html('');
		$("#reason-modal-content").css("height",450);
		$("#recommendations-p").html(recommendations);
		$("#reason-modal").css("display","block");
		}
	});
	
	
	
	/*SHOW WEIGHT MODAL REASON*/
	$("#weight-reason").click(function(e) {
		e.preventDefault();
		if(indexes_array["weight"].border_kind!=0) {
			var lower_norm=indexes_array["weight"].lower_norm;
			var upper_norm=indexes_array["weight"].upper_norm;
			var user_index_value="";
			var recommendations;
			var weight_reasons;
			$("#index-norm").text("Ваша норма веса " + lower_norm.toString()+"-" + upper_norm.toString() + "кг.");
			if(indexes_array["weight"].border_kind==2) {
				user_index_value="превышает норму на "+ indexes_array["weight"].percent.toString() + "%";
				recommendations ='Рекомендуем распечатать анализ и обратиться к терапевту или эндокринологу';
			}
			
			if(indexes_array["weight"].border_kind==-2) {
				user_index_value="ниже нормы на "+ indexes_array["weight"].percent.toString() + "%";
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
			
			if(upper_blood_kind==2) {
				text="Сейчас Ваше верхнее давление (систолическое) превышено на " +indexes_array["upper_blood_pressure"].percent.toString()+"% / нижнее (диастолическое) ";
			}
			
			if(upper_blood_kind==-2) {
				text="Сейчас Ваше верхнее давление (систолическое) ниже нормы на " +indexes_array["upper_blood_pressure"].percent.toString()+"% / нижнее (диастолическое) ";
			}
				
			if(upper_blood_kind==-1 || upper_blood_kind==1) {
				text="Сейчас Ваше верхнее давление (систолическое) на границе нормы / нижнее (диастолическое) ";
			}
				
			if(upper_blood_kind==0) {
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
				
			
			if(border_kind==2 || border_kind==-2) {
				recommendations ='Рекомендуем распечатать анализ и обратиться к терапевту или эндокринологу.';
			}
			
			if(border_kind==1 || border_kind==-1) {
				recommendations ='Рекомендуем следить за данным параметром и проверять его не реже 1 раза месяц чтобы в случае превышения нормы своевременно его устранить.';
			}
			
			if(border_kind==2 || border_kind==1) {
				$("#index-description").html('В большинстве случаев, длительное сохранение повышенного давления свидетельствует о развитии болезней:<br>'+
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
	
	$("#erythrocytes-reason").click(function(e) {
		e.preventDefault();
		if(indexes_array["erythrocytes"].border_kind!=0) {
			$("#index-norm").text("Ваша норма 3.8 – 5.3 клеток/л");
			$("#possible-reasons-wrapper").html(
				erythremia+

				'<div class="reasons-d"><p class="reasons-header">Хронические болезни легких и сердца</p>'+
					'<p class="reasons-p">Повышение уровня эритроцитов крови могут вызываться нарушением работы сердца приводящей к сердечной недостаточности или болезнями легких, которые приводят к дыхательной недостаточности.</p></div>'+

				'<div class="reasons-d"><p class="reasons-p">Сердечная недостаточность приводит к снижению доставки обогащенного кислородом тока крови к тканям и органам.</p>'+
					'<p class="reasons-p">Испытывая дефицит кислорода (гипоксия) организм стимулирует размножение и созревание эритроцитов, которые переносят кислород.</p></div>'+

				'<div class="reasons-d"><p class="reasons-header">Причины сердечной недостаточности:</p>'+
					'<a class="reasons-a" href=" https://www.polismed.com/articles-aritmija01.html">Сердечная аритмия</a></br>'+
					'<a class="reasons-a"href="https://www.polismed.com/articles-ishemicheskaja-bolezn-serdca-stenokardija-simptomy-narushenija-krovoobrashhenija-serdca-infarkt-miokarda-lechenie-narushenijj-krovoobrashhenija-serdca.html">Ишемическая болезнь сердца </a></br>'+
					'<a class="reasons-a"href="https://www.polismed.com/articles-aortal-nyjj-klapan-i-ego-poroki.html">Коарктация аорты</a></br>'+
					'<a class="reasons-a" href="https://www.polismed.com/articles-poroki-serdca-poroki-mitral-nogo-klapana.html">Пороки сердца</a></br>'+
					'<a class="reasons-a" href="https://www.polismed.com/articles-serdechnaja-nedostatochnost-prichiny-simptomy.html">Сердечная недостаточность</a></br></br>'+
					'<p class="reasons-p">Дыхательная недостаточность может приводить к снижению количества доставляемого органам и тканям с кровью кислорода. Для того, чтобы компенсировать этот дефицит организм стимулирует размножение и созревание эритроцитов, которые переносят кислород.</p></div>'+

				'<div class="reasons-d"><p class="reasons-header">Причины легочной недостаточности:</p>'+
					'<a class="reasons-a" href="https://www.polismed.com/articles-tuberkulez-prichiny-simptomy-sovremennaja-diagnostika-i-ehffektivnoe-lechenie.html">Туберкулез</a></br>'+
					'<a class="reasons-a" href="https://www.polismed.com/articles-bronkhoehktaticheskaja-bolezn-prichiny-simptomy-diagnostika-lechenie.html">Бронхоэктатическая болезнь </a></br>'+
					'<a class="reasons-a" href=" https://www.polismed.com/articles-bronkhial-naja-astma-01.html">Бронхиальная астма</a></br>'+
					'<a class="reasons-a" href="https://www.polismed.com/articles-ehmfizema-legkogo-prichiny-simptomy-priznaki.html">Эмфизема легких</a></br>'+
					'<a class="reasons-a" href="https://www.polismed.com/articles-dykhatelnaja-nedostatochnost-prichiny-simptomy-diagnostika-lechenie.html">Дыхательная недостаточность</a></div>'+


				'<div class="reasons-d"><p class="reasons-header">Гормональные болезни</p>'+
					'<p id="possible-reasons-header">Возможные причины:</p>'+
					'<p class="reasons-p">Повышенный эритропоэтин</p>'+
					'<a class="reasons-a" href="https://www.polismed.com/articles-bolezn-icenko-kushinga.html">Болезнь Иценко-Кушинга</a></br>'+
					'<a class="reasons-a" href="https://www.polismed.com/articles-feokhromocitoma-prichiny-simptomy-priznaki.html">Феохромоцитома</a></div>'
			);
			$("#reason-modal-content").css("height",600);
			$("#reason-modal").css("display","block");
			
		}
	});


$("#hemoglobin-reason").click(function(e) {
		e.preventDefault();
		if(indexes_array["hemoglobin"].border_kind!=0) {
			$("#index-norm").text("Ваша норма 115.0 – 150.0  г/л");
			$("#possible-reasons-wrapper").html(
				'<div class="reasons-d"><p class="reasons-header">Анемия</p>'+
					'<p class="reasons-p"><span>Гемолитическая анемия</span></br>Гемолитическая анемия – патологическое состояние, при котором снижение уровня эритроцитов и гемоглобина происходит в результате ускоренного разрушения красных кровяных телец.</p></br>'+
					'<p class="reasons-p">Подробнее об этом заболевании читайте в статье: </p>'+
						'<a class="reasons-a" href="https://www.polismed.com/articles-gemoliticheskaja-anemija.html">Гемолитическая анемия</a>'+
				'</div>'+
				
				'<div class="reasons-d">'+
					'<p class="reasons-p"><span>Апластическая анемия</span></br>Апластическая анемия - патологическое состояние при котором происходит угнетение кроветворения в красном костном мозге. Данное заболевание проявляется снижением уровня эритроцитов, всех видов лейкоцитов и тромбоцитов крови.</p></br>'+
					'<p class="reasons-p">Подробнее об этом заболевании читайте в статье: </p>'+
						'<a class="reasons-a" href="https://www.polismed.com/articles-aplasticheskaja-anemija01.html">Апластическая анемия</a>'+
				'</div>'+
				
				'<div class="reasons-d">'+
					'<p class="reasons-p"><span>В12 дефицитная анемия</span></br>В12 дефицитная анемия - патологическое состояние при котором снижение уровня эритроцитов вызвано недостатком витамина В 12. Дефицит этого витамина ведет к замедлению и неправильному созреванию красных кровяных телец. По этой причине в крови наблюдается снижение количества эритроцитов и их увеличение в размерах.</p></br>'+
					'<p class="reasons-p">Подробнее об этом заболевании читайте в статье: </p>'+
						'<a class="reasons-a" href="https://www.polismed.com/articles-aplasticheskaja-anemija01.html">В12 дефицитная анемия</a>'+
				'</div>'+
				
				'<div class="reasons-d">'+
					'<p class="reasons-p"><span>Серповидноклеточная анемия</span></br>Серповидноклеточная анемия – наследственное заболевание крови, при котором образуется дефектный гемоглобин (гемоглобин S). При этом эритроциты приобретают форму серпа, снижается их функция переноса кислорода, прочность и продолжительность жизни.</p></br>'+
					'<p class="reasons-p">Подробнее об этом заболевании читайте в статье: </p>'+
						'<a class="reasons-a" href="https://www.polismed.com/articles-serpovidnokletochnaja-anemija-01.html">В12 дефицитная анемия</a>'+
				'</div>'+
				
				'<div class="reasons-d"><p class="reasons-header">Острая кровопотеря</p>'+
				'<p id="possible-reasons-header">Возможные причины:</p>'+
					'<p class="reasons-p"><span>Острое кровотечение</span></br>Острое кровотечение - состояние, при котором наружное или внутреннее кровотечение приводит к нарушению состава крови. Как правило, спустя несколько часов после кровотечения происходит восполнение жидкостной части крови. Клеточный состав восстанавливается в течение нескольких недель. </p></br>'+
					'<p class="reasons-p">Подробнее об этом заболевании читайте в статье: </p>'+
						'<a class="reasons-a" href="https://www.polismed.com/subject-ostroe-krovotechenie.html">Острое кровотечение</a>'+
				'</div>'+
				
				'<div class="reasons-d">'+
				'<p class="reasons-p"><span>Хроническое кровотечение</span></br>Длительно протекающие постоянные или периодические частые кровотечения могут быть причиной изменения состава крови. </p>'+
						'<a class="reasons-a" href="https://www.polismed.com/articles-khronicheskie-krovotechenija.html">Узнать больше </a>'+
					'</div>'
			);
			$("#reason-modal-content").css("height",600);
			$("#reason-modal").css("display","block");
			
		}
	});
	
	
	
	$("#hematocrit-reason").click(function(e) {
		e.preventDefault();
		if(indexes_array["hematocrit"].border_kind!=0) {
			$("#index-norm").text("Ваша норма 34.0 – 42.0 %");
			$("#possible-reasons-wrapper").html(
				erythremia+
					'<div class="reasons-d"><p class="reasons-header">Эритроцитоз</p>'+
					'<p class="reasons-p">Эритроцитоз - патологическое состояние при котором наблюдается повышенная концентрация эритроцитов в крови.</p></br>'+
					'<p class="reasons-p">Подробнее об этом заболевании читайте в статье: </p>'+
						'<a class="reasons-a" href="https://www.polismed.com/articles-ehritrocitoz-prichiny-pervichnogo-i-vtorichnogo-ehritrocitoza.html">Эритроцитоз</a>'+
					'</div>'
			);
			$("#reason-modal-content").css("height",480);
			$("#reason-modal").css("display","block");
		}
	
	});

	$("#avg_erythrocytes-reason").click(function(e) {
		e.preventDefault();
		if(indexes_array["avg_erythrocytes"].border_kind!=0) {
			$("#index-norm").text("Ваша норма 77.0 – 95.0 фл.");
			if(indexes_array["avg_erythrocytes"].border_kind==-1 || indexes_array["avg_erythrocytes"].border_kind==-2) {
				$("#possible-reasons-wrapper").html(
					iron_deficiency_anemia+
					thalassemia+
					porphyrin_disorder+
					lead_poisoning
				);
			}

			if(indexes_array["avg_erythrocytes"].border_kind==1 || indexes_array["avg_erythrocytes"].border_kind==2) {
				$("#possible-reasons-wrapper").html(
					folic_deficiency_anemia+
					b12_deficiency_anemia+
					hemolytic_anemia
				);
			}

			$("#reason-modal-content").css("height",510);
			$("#reason-modal").css("display","block");
		}
	
	});


	$("#avg_hemoglobin_content_in_erythrocytes-reason").click(function(e) {
		e.preventDefault();
		if(indexes_array["avg_hemoglobin_content_in_erythrocytes"].border_kind!=0) {
			$("#index-norm").text("Ваша норма 25.0 – 33.0 пг.");
			if(indexes_array["avg_hemoglobin_content_in_erythrocytes"].border_kind==-1 || indexes_array["avg_hemoglobin_content_in_erythrocytes"].border_kind==-2) {
				$("#possible-reasons-wrapper").html(
					iron_deficiency_anemia+
					thalassemia+
					porphyrin_disorder+
					lead_poisoning+
					'<div class="reasons-d"><p class="reasons-header">Хронические инфекционно-воспалительные болезни</p>'+
						'<ul id="possible-reasons">'+
										'<li>Пневмония;</li>'+
										'<li>Ангина;</li>'+
										'<li>Грипп;</li>'+
										'<li>Бронхит;</li>'+
										'<li>Ларингит;</li>'+
										'<li>Гепатит;</li>'+
										'<li>Холецистит;</li>'+
										'<li>Болень Крона;</li>'+
										'<li>Гастрит;</li>'+
										'<li>Энтерит;</li>'+
										'<li>Пиелонефрит;</li>'+
										'<li>Вагинит;</li>'+
										'<li>Эндометрит;</li>'+
										'<li>Аднексит;</li>'+
									'</ul>'+
					'<div>'
				);
			}

			if(indexes_array["avg_hemoglobin_content_in_erythrocytes"].border_kind==1 || indexes_array["avg_hemoglobin_content_in_erythrocytes"].border_kind==2) {
				$("#possible-reasons-wrapper").html(
					folic_deficiency_anemia+
					b12_deficiency_anemia+
					hemolytic_anemia+
					'<div class="reasons-d"><p class="reasons-header">Гипотиреоз</p>'+
						'<p class="reasons-p">Под гипотиреозом подразумевается хроническая недостаточность гормонов щитовидной железы на уровне периферических тканей организма. В результате происходит снижение интенсивности обменных процессов и одновременно жизненных функций организма.</p></br>'+
						'<p class="reasons-p">Подробнее об этом заболевании читайте в статье: </p>'+
						'<a class="reasons-a" href="https://www.polismed.com/articles-gipotireoz-prichiny-simptomy-sovremennaja-diagnostika-i-ehffektivnoe-lechenie.html">Гипотиреоз</a>'+	
					'</div>'
				);
			}
			
			$("#reason-modal-content").css("height",515);
			$("#reason-modal").css("display","block");
		}
	
	});

	$("#avg_hemoglobin_concentration_in_erythrocytes-reason").click(function(e) {
		e.preventDefault();
		if(indexes_array["avg_hemoglobin_concentration_in_erythrocytes"].border_kind!=0) {
			$("#index-norm").text("Ваша норма 31.0 – 36.0 г/дл.");
			if(indexes_array["avg_hemoglobin_concentration_in_erythrocytes"].border_kind==-1 || indexes_array["avg_hemoglobin_concentration_in_erythrocytes"].border_kind==-2) {
				$("#possible-reasons-wrapper").html(iron_deficiency_anemia);
			}
			if(indexes_array["avg_hemoglobin_concentration_in_erythrocytes"].border_kind==1 || indexes_array["avg_hemoglobin_concentration_in_erythrocytes"].border_kind==2) {
				$("#possible-reasons-wrapper").html(ovalocytosis);
			}
			$("#reason-modal-content").css("height",325);
			$("#reason-modal").css("display","block");
		}
	
	});


	$("#color_index-reason").click(function(e) {
		e.preventDefault();
		if(indexes_array["color_index"].border_kind!=0) {
			$("#index-norm").text("Ваша норма 0.9 – 1.1");
			if(indexes_array["color_index"].border_kind==-1 || indexes_array["color_index"].border_kind==-2) {
				$("#possible-reasons-wrapper").html(chronic_bleeding);
				$("#reason-modal-content").css("height",350);
			}
			if(indexes_array["color_index"].border_kind==1 || indexes_array["color_index"].border_kind==2) {
				$("#possible-reasons-wrapper").html(folic_deficiency_anemia + b12_deficiency_anemia);
				$("#reason-modal-content").css("height",500);
			}
			
			$("#reason-modal").css("display","block");
		}
	
	});

	$("#reticulocytes-reason").click(function(e) {
		e.preventDefault();
		if(indexes_array["reticulocytes"].border_kind!=0) {
			$("#index-norm").text("Ваша норма 0.3 – 1.5%");
			if(indexes_array["reticulocytes"].border_kind==-1 || indexes_array["reticulocytes"].border_kind==-2) {
				$("#possible-reasons-wrapper").html(
					hemolytic_anemia+malaria+iron_deficiency_anemia+acute_bleeding+cancer+
					exhausting_diseases+aplastic_anemia+b12_deficiency_anemia+folic_deficiency_anemia+thalassemia+radiation_sickness+
					sickle_cell_anemia+
					'<div class="reasons-d"><p class="reasons-header">Алкоголизм</p>'+
					'</div>'	
				);
			}

			if(indexes_array["reticulocytes"].border_kind==1 || indexes_array["reticulocytes"].border_kind==2) {
				$("#possible-reasons-wrapper").html(hemolytic_anemia+malaria+iron_deficiency_anemia+acute_bleeding+sickle_cell_anemia+exhausting_diseases);
			}

			$("#reason-modal-content").css("height",600);
			$("#reason-modal").css("display","block");
		}
	
	});


	$("#platelets-reason").click(function(e) {
		e.preventDefault();
		if(indexes_array["platelets"].border_kind!=0) {
			$("#index-norm").text("Ваша норма 150.0 – 500.0 клеток/л");
			if(indexes_array["platelets"].border_kind==-1 || indexes_array["platelets"].border_kind==-2) {
				$("#possible-reasons-wrapper").html(
					'<div class="reasons-d"><p class="reasons-header">Наследственные тромбоцитопении</p>'+
						'<p class="reasons-p">Возможные причины:</p>'+
						'<ul id="possible-reasons">'+
							'<li>Врожденная тромбоцитопения;</li>'+
							'<li>Синдром Уискотта-Олдрича;</li>'+
							'<li>Синдром Бернара-Сулье;</li>'+
							'<li>Аномалия Чедиака-Хигаси;</li>'+
							'<li>Синдром Фанкони;</li>'+
							'<li>Краснуха у новорожденных;</li>'+
							'<li>Гистиоцитоз;</li>'+
						'</ul>'+
					'</div>'+
					aplastic_anemia+b12_deficiency_anemia+folic_deficiency_anemia+
					'<div class="reasons-d"><p class="reasons-header">Поражение костного мозга</p>'+
						'<p class="reasons-p">Возможные причины:</p>'+
						'<ul id="possible-reasons">'+
							'<li>Лучевая болезнь;</li>'+
							'<li>Туберкулез костей;</li>'+
						'</ul>'+
					'</div>'+
					'<div class="reasons-d"><p class="reasons-header">Инфекционные поражения</p>'+
						'<p class="reasons-p">Возможные причины:</p>'+
						'<ul id="possible-reasons">'+
							'<li>Вирусные инфекции;</li>'+
							'<li>Бактериальные поражения;</li>'+
							'<li>Риккетсиоз;</li>'+
							'<li>Малярия;</li>'+
							'<li>Токсоплазмоз;</li>'+
						'</ul>'+
					'</div>'+
					'<div class="reasons-d"><p class="reasons-header">Побочные действия лекарств</p>'+
						'<ul id="possible-reasons">'+
							'<li>Препараты подавляющие рост и размножение клеток (цитостатики);</li>'+
							'<li>Болеутоляющие препараты;</li>'+
							'<li>Антигистаминные препараты;</li>'+
							'<li>Антибиотики;</li>'+
							'<li>Психотропные препараты;</li>'+
							'<li>Мочегонные препараты;</li>'+
							'<li>Противосудорожные препараты;</li>'+
							'<li>Дефицит витамина К;</li>'+
							'<li>Препараты: резерпин, дигоксин, гепарин, нитроглицерин;</li>'+
							'<li>Гормональные препараты: преднизолон, эстрогены;</li>'+
						'</ul>'+
					'</div>'
				);
			}
			if(indexes_array["platelets"].border_kind==1 || indexes_array["platelets"].border_kind==2) {
				$("#possible-reasons-wrapper").html(hemolytic_anemia+exhausting_diseases+cancer+acute_bleeding+erythremia+rheumatic_diseases+
					'<div class="reasons-d"><p class="reasons-header">Хирургические вмешательства</p></div>'	
				);
			}
			$("#reason-modal-content").css("height",600);
			$("#reason-modal").css("display","block");
		}
	
	});


	$("#leucocytes-reason").click(function(e) {
		e.preventDefault();
		if(indexes_array["leucocytes"].border_kind!=0) {
			$("#index-norm").text("Ваша норма 5.0 – 14.5 клеток/л");
			if(indexes_array["leucocytes"].border_kind==-1 || indexes_array["leucocytes"].border_kind==-2) {
				$("#possible-reasons-wrapper").html(aplastic_anemia+rheumatic_diseases+radiation_sickness+viral_infections);
			}
			if(indexes_array["leucocytes"].border_kind==1 || indexes_array["leucocytes"].border_kind==2) {
				$("#possible-reasons-wrapper").html(
					cancer+
					'<div class="reasons-d"><p class="reasons-header">Бактериальные инфекции</p>'+
						'<ul id="possible-reasons">'+
										'<li>Пневмония;</li>'+
										'<li>Туберкулез;</li>'+
										'<li>Грипп;</li>'+
										'<li>Бронхит;</li>'+
										'<li>Ларингит;</li>'+
										'<li>Цистит;</li>'+
										'<li>Холецистит;</li>'+
										'<li>Простатит;</li>'+
										'<li>Эндометрит;</li>'+
										'<li>Бронхоэктатическая болезнь;</li>'+
										'<li>Сепсис;</li></br>'+
									'</ul>'+
					'<div>'+
					'<div class="reasons-d"><p class="reasons-header">Гнойные поражения, некроз тканей.</p>'+
						'<p class="reasons-p">Абсцессы, флегмоны, фурункулы.</p></br>'+
					'<div>'+
					poisoning_and_intoxication+
					allergy+'</br>'+
					blood_diseases
				);
			}
			$("#reason-modal-content").css("height",600);
			$("#reason-modal").css("display","block");
		}
	
	});	




	$("#segment_nuclear_neutrophils-reason").click(function(e) {
		e.preventDefault();
		if(indexes_array["segment_nuclear_neutrophils"].border_kind!=0) {
			$("#index-norm").text("Ваша норма 35.0 – 58.0 %");
			if(indexes_array["segment_nuclear_neutrophils"].border_kind==-1 || indexes_array["segment_nuclear_neutrophils"].border_kind==-2) {
				$("#possible-reasons-wrapper").html(
					radiation_sickness+viral_infections+
					'<div class="reasons-d"><p class="reasons-header">Бактериальные инфекции</p>'+
						'<ul id="possible-reasons">'+
							'<li>Бактериальный эндокардит;</li>'+
							'<li>Туберкулез;</li>'+
							'<li>Брюшной тиф;</li>'+
							'<li>Паратиф;</li>'+
							'<li>Бруцеллез;</li></ul>'+
					'</div>'+
					'<div class="reasons-d"><p class="reasons-header">Побочные действия лекарств</p>'+
						'<ul id="possible-reasons">'+
							'<li>Сульфаниламидные препараты;</li>'+
							'<li>Стероидные гормоны;</li>'+
							'<li>Противосудорожные препараты;</li>'+
							'<li>Антитиреоидные препараты;</li>'+
							'<li>Обезболивающие противовоспалительные препараты;</li>'+
						'</ul>'+
					'</div>'


				);
			}
			if(indexes_array["segment_nuclear_neutrophils"].border_kind==1 || indexes_array["segment_nuclear_neutrophils"].border_kind==2) {
				$("#possible-reasons-wrapper").html(
					'<div class="reasons-d"><p class="reasons-header">Хронические инфекции</p>'+
						'<ul id="possible-reasons">'+
										'<li>Цистит;</li>'+
										'<li>Гепатит;</li>'+
										'<li>Бронхит;</li>'+
										'<li>Ларингит;</li>'+
										'<li>Гепатит;</li>'+
										'<li>Холецистит;</li>'+
										'<li>Болень Крона;</li>'+
										'<li>Бронхоэктатическая болезнь;</li>'+
										'<li>Энтерит;</li>'+
										'<li>Пиелонефрит;</li>'+
										'<li>Неспецифический язвенный колит;</li>'+
										'<li>Эндометрит;</li></br>'+
									'</ul>'+
					'<div>'+
					'<div class="reasons-d"><p class="reasons-header">Нагноительные процессы</p>'+
						'<ul id="possible-reasons">'+
										'<li>Абсцесс;</li>'+
										'<li>Фурункул;</li>'+
										'<li>Сепсис;</li></br>'+
									'</ul>'+
					'<div>'+
					cancer+ 
					'<div class="reasons-d"><p class="reasons-header">Острый гепатит или обострение хронического</p>'+
						'<p class="reasons-p">Гепатит - заболевание, при котором поражение печени имеет воспалительный характер.</p>'+
						'</br><p class="reasons-p">Подробнее об этом заболевании читайте в статье: </p>'+
						'<a class="reasons-a" href="https://www.polismed.com/subject-gepatit.html">Гепатит</a>'+		
					'</div>'
				);
			}
			$("#reason-modal-content").css("height",600);
			$("#reason-modal").css("display","block");
		}
	
	});

	$("#stab_neutrophils-reason").click(function(e) {
		e.preventDefault();
		if(indexes_array["stab_neutrophils"].border_kind!=0) {
			$("#index-norm").text("Ваша норма 0.0 – 5.0 %");
				$("#possible-reasons-wrapper").html(
					'<div class="reasons-d"><p class="reasons-header">Гнойные бактериальные поражения</p>'+
						'<ul id="possible-reasons">'+
							'<li>Пневмония;</li>'+
							'<li>Туберкулез;</li>'+
							'<li>Болезнь Крона;</li>'+
							'<li>Эндометрит;</li>'+
							'<li>Ларингит;</li>'+
							'<li>Бронхоэктатическая болезнь;</li>'+
							'<li>Сепсис;</li>'+
							'<li>Холецистит;</li>'+
							'<li>Цистит;</li>'+
							'<li>Грипп;</li>'+
							'<li>Гепатит;</li></ul>'+
					'</div>'+
					'<div class="reasons-d"><p class="reasons-header">Инфекционные болезни</p>'+
						'<ul id="possible-reasons">'+
							'<li>Пневмония;</li>'+
							'<li>Туберкулез;</li>'+
							'<li>Болезнь Крона;</li>'+
							'<li>Эндометрит;</li>'+
							'<li>Ларингит;</li>'+
							'<li>Бронхоэктатическая болезнь;</li>'+
							'<li>Сепсис;</li>'+
							'<li>Холецистит;</li>'+
							'<li>Цистит;</li>'+
							'<li>Грипп;</li></ul>'+
					'</div>'+

					'<div class="reasons-d"><p class="reasons-header">Инфаркт, инсульт, гангрена</p>'+
						'</br><p class="reasons-p">Читайте подробнее в статьях: : </p>'+
						'<a class="reasons-a" href="https://www.polismed.com/articles-ishemicheskaja-bolezn-serdca-stenokardija-simptomy-narushenija-krovoobrashhenija-serdca-infarkt-miokarda-lechenie-narushenijj-krovoobrashhenija-serdca.html">Инфаркт</a></br>'+		
						'<a class="reasons-a" href="https://www.polismed.com/articles-insul-t-01.html">Инсульт</a></br>'+
						'<a class="reasons-a" href="https://www.polismed.com/articles-gangrena-prichiny-simptomy-diagnostika-i-lechenie-patologii.html">Гангрена</a>'+
					'</div>'
				);
			$("#reason-modal-content").css("height",500);
			$("#reason-modal").css("display","block");
		}
	});

	$("#myelocytes-reason").click(function(e) {
		e.preventDefault();
		if(indexes_array["myelocytes"].border_kind!=0) {
			$("#index-norm").text("Ваша норма 0.0 – 0.0 %");
			$("#possible-reasons-wrapper").html(
				'<div class="reasons-d"><p class="reasons-header">Гнойные бактериальные поражения</p>'+
					'<p class="reasons-p">Воспалительные заболевания у взрослых: </p>'+
						 '<ul id="possible-reasons">'+
							'<li>Болезнь Крона;</li>'+
							'<li>Бронхоэктатическая болезнь;</li>'+
							'<li>Бронхит;</li>'+
							'<li>Туберкулез;</li>'+
							'<li>Ларингит;</li>'+
							'<li>Сепсис;</li>'+
							'<li>Грипп;</li>'+
							'<li>Холецистит;</li>'+
							'<li>Простатит;</li>'+
							'<li>Цистит;</li>'+
						'</ul>'+
				'</div>'+
				acute_bleeding+
				'<div class="reasons-d"><p class="reasons-header">Миелобластный лейкоз</p>'+
					'<p class="reasons-p">Миелобластный лейкоз - злокачественное заболевание крови, характеризующиеся бесконтрольным ростом незрелых клеток крови (миелобластов). Накапливаясь в костном мозге, периферической крови и внутренних органах, вызывают тяжелые нарушения функций всех систем организма.</p>'+	 
					'</br><p class="reasons-p">Подробнее об этом заболевании читайте в статье: </p>'+
					'<a class="reasons-a" href="https://www.polismed.com/articles-mieloblastnyjj-lejjkoz-01.html">Миелобластный лейкоз</a>'+	
				'</div>'+
				poisoning_and_intoxication+
				'<div class="reasons-d"><p class="reasons-header">Острые инфекционные болезни</p>'+
				'</div>'
			);
		
			$("#reason-modal-content").css("height",600);
			$("#reason-modal").css("display","block");
		}
	
	});


	$("#meta_myelocytes-reason").click(function(e) {
		e.preventDefault();
		if(indexes_array["meta_myelocytes"].border_kind!=0) {
			$("#index-norm").text("Ваша норма 0.0 – 0.0 %");
			$("#possible-reasons-wrapper").html(
				'<div class="reasons-d"><p class="reasons-header">Гнойные бактериальные поражения</p>'+
					'<p class="reasons-p">Воспалительные заболевания у взрослых: </p>'+
						 '<ul id="possible-reasons">'+
							'<li>Болезнь Крона;</li>'+
							'<li>Бронхоэктатическая болезнь;</li>'+
							'<li>Бронхит;</li>'+
							'<li>Туберкулез;</li>'+
							'<li>Ларингит;</li>'+
							'<li>Сепсис;</li>'+
							'<li>Грипп;</li>'+
							'<li>Холецистит;</li>'+
							'<li>Простатит;</li>'+
							'<li>Цистит;</li>'+
						'</ul>'+
				'</div>'+
				poisoning_and_intoxication+
				'<div class="reasons-d"><p class="reasons-header">Острые инфекционные болезни</p>'+
				'</div>'
			);
		
			$("#reason-modal-content").css("height",550);
			$("#reason-modal").css("display","block");
		}
	
	});



	$("#lymphocytes-reason").click(function(e) {
		e.preventDefault();
		if(indexes_array["lymphocytes"].border_kind!=0) {
			$("#index-norm").text("Ваша норма 30.0 – 55.0 %");
			if(indexes_array["lymphocytes"].border_kind==-1 || indexes_array["lymphocytes"].border_kind==-2) {
				$("#possible-reasons-wrapper").html(
					rheumatic_diseases+
					cancer+radiation_sickness+
					'<div class="reasons-d"><p class="reasons-header">Стероидные препараты или цитостатические средства</p></div>'+
					'<div class="reasons-d"><p class="reasons-header">Лимфогранулематоз</p>'+
						'<p class="reasons-p">Лимфогранулематоз - злокачественное заболевание лимфотической системы. В его основе лежит образование опухолевых клеток в лимфатических узлах, с последующим их ростом и распространением по всему организму.</p>'+
						'</br><p class="reasons-p">Подробнее об этом заболевании читайте в статье: </p>'+
						'<a class="reasons-a" href="https://www.polismed.com/articles-limfogranulematoz-01.html">Лимфогранулематоз</a>'+	
					'<div></br>'+
					'<div class="reasons-d"><p class="reasons-header">Иммунодефицитные состояния (первичные, ВИЧ, СПИД)</p></div>'
				);
			}
			if(indexes_array["lymphocytes"].border_kind==1 || indexes_array["lymphocytes"].border_kind==2) {
				$("#possible-reasons-wrapper").html(
					viral_infections+
					'<div class="reasons-d"><p class="reasons-header">Болезни кроветворной системы</p>'+
						'<ul id="possible-reasons">'+
										'<li>Острый лимфолейкоз;</li>'+
										'<li>Хронический лимфолейкоз;</li>'+
										'<li>Инфекционный мононуклеоз;</li>'+
										'<li>Макроглобулинемия Вальденстрема;</li>'+
										'<li>Лимфосаркома;</li>'+
									'</ul>'+
					'</div>'+
					'<div class="reasons-d"><p class="reasons-header">Инфекционные болезни</p>'+
						'<ul id="possible-reasons">'+
										'<li>Туберкулез;</li>'+
										'<li>Сифилис;</li>'+
										'<li>Малярия;</li>'+
										'<li>Брюшной тиф;</li>'+
										'<li>Бруцеллез;</li>'+
										'<li>Дифтерия;</li>'+
										'<li>Токсоплазмоз;</li>'+
									'</ul>'+
					'</div>'
					
				);
			}
			$("#reason-modal-content").css("height",600);
			$("#reason-modal").css("display","block");
		}
	
	});


	$("#monocytes-reason").click(function(e) {
		e.preventDefault();
		if(indexes_array["monocytes"].border_kind!=0) {
			$("#index-norm").text("Ваша норма 2.0 – 10.0 %");
				$("#possible-reasons-wrapper").html(
					'<div class="reasons-d"><p class="reasons-header">Инфекционный мононуклеоз</p>'+
						'<p class="reasons-p">Инфекционный мононуклеоз (“болезнь поцелуев”) - вирусное инфекционное заболевание, имеет преимущественно капельный механизм передачи, характеризуется лихорадкой, увеличением лимфатических узлов и специфическими изменениями в анализе крови.</p>'+
					'</div>'+aplastic_anemia+blood_diseases+
					'<div class="reasons-d"><p class="reasons-header">Период восстановления после острых состояний</p></div>'+
					'<div class="reasons-d"><p class="reasons-header">Ранний период после операций</p></div>'+
					'<div class="reasons-d"><p class="reasons-header">Ревматические болезни</p></div>'+
					'<div class="reasons-d"><p class="reasons-header">Применение стероидных препаратов</p></div>'

				);
			
			$("#reason-modal-content").css("height",600);
			$("#reason-modal").css("display","block");
		}
	
	});


	$("#eosinophils-reason").click(function(e) {
		e.preventDefault();
		if(indexes_array["eosinophils"].border_kind!=0) {
			$("#index-norm").text("Ваша норма 0.5 – 5.0 %");
			if(indexes_array["eosinophils"].border_kind==-1 || indexes_array["eosinophils"].border_kind==-2) {
				$("#possible-reasons-wrapper").html(
					'<div class="reasons-d"><p class="reasons-header">Острые инфекционные болезни</p>'+
						'<ul id="possible-reasons">'+
							'<li>Брюшной тиф;</li>'+
							'<li>Дизентерия;</li>'+
							'<li>Сепсис;</li>'+
						'</ul>'+
					'</div>'+
					'<div class="reasons-d"><p class="reasons-header">Травмы, ожоги, роды, шок</p>'+
					'<p class="reasons-p">Травмы:</p>'+
						'<ul id="possible-reasons">'+
							'<li>Вывихи;</li>'+
							'<li>Переломы;</li>'+
							'<li>Ожог;</li>'+
							'<li>Отморожение;</li>'+
						'</ul>'+
					'</div>'		
					
				);
				$("#reason-modal-content").css("height",500);
			}
			if(indexes_array["eosinophils"].border_kind==1 || indexes_array["eosinophils"].border_kind==2) {
				$("#possible-reasons-wrapper").html(
					blood_diseases+
					'<div class="reasons-d"><p class="reasons-header">Паразитарные болезни</p>'+
						'<ul id="possible-reasons">'+
							'<li>Энтеробиоз;</li>'+
							'<li>Описторхоз;</li>'+
							'<li>Аскаридоз;</li>'+
							'<li>Лямблиоз;</li>'+
							'<li>Трихинеллез;</li>'+
						'</ul>'+
					'</div>'+
					allergy+'</br><div class="reasons-d"><p class="reasons-header">Инфекционные болезни</p></div>'
					/*'<div class="reasons-d"><p class="reasons-header">Аллергии</p>'+
						'<ul id="possible-reasons">'+
							'<li>Бронхиальная астма;</li>'+
							'<li>Сенная лихорадка;</li>'+
							'<li>Атопический дерматит;</li>'+
							'<li>Поллиноз;</li>'+
							'<li>Отек Квинке;</li>'+
							'<li>Экзема;</li>'+
							'<li>Себорейный дерматит;</li>'+
							'<li>Индивидуальная непереносимость лекарств;</li>'+	
						'</ul>'+
					'</div>'*/
					
				);
				$("#reason-modal-content").css("height",570);
			}
			
			$("#reason-modal").css("display","block");
		}
	
	});


	$("#basophils-reason").click(function(e) {
		e.preventDefault();
		if(indexes_array["basophils"].border_kind!=0) {
			$("#index-norm").text("Ваша норма 0.0 – 1.0 %");
				$("#possible-reasons-wrapper").html(
					blood_diseases+
					'<div class="reasons-d"><p class="reasons-header">Хронические болезни кишечника</p>'+
						'<ul id="possible-reasons">'+
							'<li>Неспецифичеcкий язвенный колит;</li>'+
							'<li>Дивертикулит;</li>'+
							'<li>Дизентерия;</li>'+
							'<li>Болезнь Крона;</li>'+
							'<li>Язвенная болезнь желудка;</li>'+
							'<li>Язвенная двенадцатиперстной кишки;</li>'+
						'</ul>'+
					'</div>'+
					hemolytic_anemia+
					allergy
				);
			$("#reason-modal-content").css("height",570);
			$("#reason-modal").css("display","block");
		}
	});


	$("#plasmocytes-reason").click(function(e) {
		e.preventDefault();
		if(indexes_array["plasmocytes"].border_kind!=0) {
			$("#index-norm").text("Ваша норма 0.0 – 1.0 %");
				$("#possible-reasons-wrapper").html(
					'<div class="reasons-d"><p class="reasons-header">Вирусные заболевания</p>'+
						'<ul id="possible-reasons">'+
							'<li>Краснуха;</li>'+
							'<li>Ветрянка (ветряная оспа);</li>'+
							'<li>Инфекционный мононуклеоз;</li>'+
							'<li>Корь;</li>'+
							'<li>Коклюш;</li>'+
							'<li>Скарлатина;</li>'+
						'</ul>'+
					'</div>'+
					'<div class="reasons-d"><p class="reasons-header">Хронические инфекционные болезни</p>'+
						'<ul id="possible-reasons">'+
							'<li>Пневмония;</li>'+
							'<li>Грипп;</li>'+
							'<li>Бронхит;</li>'+
							'<li>Ларингит;</li>'+
							'<li>Холецистит;</li>'+
							'<li>Цистит;</li>'+
							'<li>Простатит;</li>'+
							'<li>Эндометрит;</li>'+
							'<li>Туберкулез;</li>'+
						'</ul>'+
					'</div>'+
					cancer+
					'<div class="reasons-d"><p class="reasons-header">Миеломная болезнь (плазмоцитома)</p>'+
						'<p class="reasons-p">Миеломная болезнь злокачественная болезнь крови, при которой опухолевые клетки формируются из клеток предшественников лимфоцитов. Аномальные клетки вытесняют здоровые клетки из костного мозга. Преимущественно поражается кровеносная, костная, иммунная и почечная система организма.</p></br>'+
						'<p class="reasons-p">Подробнее об этом заболевании читайте в статье: </p>'+
						'<a class="reasons-a" href="https://www.polismed.com/articles-mielomnaja-bolezn-plazmocitoma-prichiny-simptomy-diagnostika-lechenie-i-prognoz.html">Миеломная болезнь</a>'+
					'</div>'
				);
			$("#reason-modal-content").css("height",570);
			$("#reason-modal").css("display","block");
		}
	
	
	});


	$("#ESR-reason").click(function(e) {
		e.preventDefault();
		if(indexes_array["ESR"].border_kind!=0) {
			$("#index-norm").text("Ваша норма 2.0 – 12.0 мм/час");
			if(indexes_array["ESR"].border_kind==-1 || indexes_array["ESR"].border_kind==-2) {
				$("#possible-reasons-wrapper").html(

					'<div class="reasons-d"><p class="reasons-header">Недостаточность кровообращения</p>'+
						'<p class="reasons-p">Возможные причины:</p>'+
						'<ul id="possible-reasons">'+
							'<li>Ишемическая болезнь сердца;</li>'+
							'<li>Атеросклероз;</li>'+
							'<li>Сердечная аритмия;</li>'+
							'<li>Кардиосклероз;</li>'+
							'<li>Миокардит;</li>'+
							'<li>Миокардиодистрофия;</li>'+
							'<li>Перикардит;</li>'+
							'<li>Пороки сердца;</li></br>'+
						'</ul>'+
					'<div>'+
					'<div class="reasons-d"><p class="reasons-header">Эритроцитоз</p>'+
						'<p class="reasons-p">Эритроцитоз - патологическое состояние при котором наблюдается повышенная концентрация эритроцитов в крови.</p></br>'+
						'<p class="reasons-p">Подробнее об этом заболевании читайте в статье: </p>'+
						'<a class="reasons-a" href="https://www.polismed.com/articles-ehritrocitoz-prichiny-pervichnogo-i-vtorichnogo-ehritrocitoza.html">Эритроцитоз </a>'+
					'</div>'

				);
				$("#reason-modal-content").css("height",570);
			}
			if(indexes_array["ESR"].border_kind==1 || indexes_array["ESR"].border_kind==2) {
				$("#possible-reasons-wrapper").html(
					'<div class="reasons-d"><p class="reasons-header">Острые и хронические инфекции</p>'+
							'<ul id="possible-reasons">'+
								'<li>Пневмония;</li>'+
								'<li>Бронхит;</li>'+
								'<li>Грипп;</li>'+
								'<li>Ангина;</li>'+
								'<li>Ларингит;</li>'+
								'<li>Энтерит;</li>'+
								'<li>Болезнь Крона;</li>'+
								'<li>Гематит;</li>'+
								'<li>Цистит;</li>'+
								'<li>Неспецифичеcкий язвенный колит;</li>'+
								'<li>Пиелонефрит;</li>'+
								'<li>Простатит;</li>'+
							'</ul>'+
					'</div>'+

					'<div class="reasons-d"><p class="reasons-header">Воспалительные процессы и разрушения тканей организма</p>'+
							'<ul id="possible-reasons">'+
								'<li>Гангрена;</li>'+
								'<li>Перикардит;</li>'+
								'<li>Плеврит;</li>'+
								'<li>Бурсит;</li>'+
								'<li>Тендовагинит;</li>'+
								'<li>Тромбоз вен;</li>'+
							'</ul>'+
					'</div>'+
					poisoning_and_intoxication+
					'<div class="reasons-d"><p class="reasons-header">Злокачественные опухоли</p>'+
						'<ul id="possible-reasons">'+
										'<li>Рак гортани;</li>'+
										'<li>Рак лёгких;</li>'+
										'<li>Рак кожи;</li>'+
										'<li>Рак печени;</li>'+
										'<li>Рак прямой кишки;</li>'+
										'<li>Рак поджелудочной железы;</li>'+
										'<li>Рак желудка;</li>'+
										'<li>Рак толстого кишечника;</li>'+
										'<li>Рак матки;</li>'+
									'</ul>'+
					'</div>'+
					'<div class="reasons-d"><p class="reasons-header">Гипо/гипертиреоз</p>'+
						'<p class="reasons-p">Снижение концентрации гормонов щитовидной железы (гипотиреоз) или повышение концентрации гормонов щитовидной железы (гипертиреоз)являются распространенными патологическими состояниями, к которым приводят многие заболевания.</p></br>'+
						'<p class="reasons-p">Подробнее об этом заболевании читайте в статье: </p>'+
						'<a class="reasons-a" href="https://www.polismed.com/subject-shhitovidnaja-zheleza.html">Щитовидная железа</a>'+
					'</div>'+
					'<div class="reasons-d"><p class="reasons-header">Травматичные операции</p></div>'
				);
				$("#reason-modal-content").css("height",600);
		}
		
		$("#reason-modal").css("display","block");
	}
	
	});
});

