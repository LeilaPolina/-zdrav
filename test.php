<?php include('includes/config.php'); ?>
<?php
	if(!$_SESSION['test_completed']){
		header('Location: https://здравствую.рф/');
	}
	
	function recToBuy ($dead) {
		$listToBuy = array();
		$txtListToBuy = '';
		if (strpos($dead,'Сердце') === true) {
		array_unshift($listToBuy,'домашний ЭКГ монитор, тонометр');
		}
		if (strpos($dead,'Инсульт') === true) {
		array_unshift($listToBuy,'тестер холестерина');
		}
		if (strpos($dead,'Сахарный диабет') === true) {
		array_unshift($listToBuy,'глюкометр');
		}
		$txtListToBuy = implode(", ", $listToBuy);
		return $txtListToBuy;
	}

	function getIndexMass ($weight, $height) {
		$weight = (int) $weight;
		$height = (int) $height;
		if ($height == 0) {
			$height = 1;
		}
		return round($weight / pow($height/100, 2), 2);
	}

	function getTxtIndexMass ($index_mass) {
		$txt = '';
		$count_weight = '';
		if ($index_mass < 15) {
			$txt = '<b>острому дефициту</b> веса';
		} elseif ($index_mass >= 15 and $index_mass < 20) {
			$txt = '<b>дефициту</b> веса';
		} elseif ($index_mass >= 20 and $index_mass < 25) {
			$txt = '<b>нормальному</b> весу';
		} elseif ($index_mass >= 25 and $index_mass < 30) {
			$txt = '<b>избыточному</b> весу';
		} elseif ($index_mass >= 30) {
			$txt = '<b>ожирению</b>';
		}
		return $txt;
	}

	function getLifetimeIndexMass ($index_mass) {
		$count_weight = '';
		if ($index_mass < 15) {
			$count_weight = '-2';
		} elseif ($index_mass >= 15 and $index_mass < 20) {
			$count_weight = '0';
		} elseif ($index_mass >= 25 and $index_mass < 30) {
			$count_weight = '-2';
		} elseif ($index_mass >= 30) {
			$count_weight = '-4';
		}
		return $count_weight;
	}

	function get_lifecount($lifetime_index_mass){
		$lifecount = 2; /* +2 всем за анализы */
		$lifecount += -(int)$lifetime_index_mass;
		
		if ($_SESSION['result_test']['smoke'] == 1) {
			$lifecount += -(int)$_SESSION['result_test']['count_smoking'];
		}

		if ($_SESSION['result_test']['cold'] == "4 раза в год или больше") {
			$lifecount += 1;
		}

		if ($_SESSION['result_test']['healthyfood'] == 1) {
			$lifecount += -(int)$_SESSION['result_test']['count_food'];
		}

		if ($_SESSION['result_test']['healthyheart'] == 1) {
			$lifecount += 2;
		}

		return $lifecount;
	}

	$index_mass = getIndexMass($_SESSION['result_test']['weight'], $_SESSION['result_test']['height']);
	$txt_index_mass = getTxtIndexMass($index_mass);
	$lifetime_index_mass = getLifetimeIndexMass($index_mass);
	$toBuy = recToBuy ($_SESSION['result_test']['dead']);
	$lifecount = get_lifecount($lifetime_index_mass);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Общие сведения</title>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/multiselect.css" />
	<link rel="stylesheet" type="text/css" href="css/accordion.css" />
	<link rel="stylesheet" href="css/test.css" />
	<link rel="stylesheet" type="text/css" href="css/registration_login_windows.css" />
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans" />
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">

	<script src="jquery/jquery-3.1.1.min.js"></script>
	<script>
		window.index_mass = '<?php echo $index_mass; ?>';
		window.sex = '<?php echo $_SESSION['result_test']['sex']; ?>';
		window.year_birth = '<?php echo $_SESSION['result_test']['year_birth']; ?>';
		window.height = '<?php echo $_SESSION['result_test']['height']; ?>';
		window.weight = '<?php echo $_SESSION['result_test']['weight']; ?>';
		window.smoking = '<?php echo $_SESSION['result_test']['smoking']; ?>';
		window.sport = '<?php echo $_SESSION['result_test']['sport']; ?>';
		window.food = '<?php echo $_SESSION['result_test']['food']; ?>';
		window.alcohol = '<?php echo $_SESSION['result_test']['alcohol']; ?>';
		window.children = '<?php echo $_SESSION['result_test']['children']; ?>';
		window.work = '<?php echo $_SESSION['result_test']['work']; ?>';
		window.parturition = '<?php echo $_SESSION['result_test']['parturition']; ?>';
		window.dead = '<?php echo $_SESSION['result_test']['dead']; ?>';
		window.education = '<?php echo $_SESSION['result_test']['education']; ?>';
	</script>
	<script src="jquery/jquery.maskedinput.min.js"></script>
	<script src="scripts/result_test.js"></script>	
	<script src="scripts/registration.js"></script>
	<script src="scripts/test_margins.js"></script>
	<script src="scripts/multiselect.js"></script>
	<script src="scripts/accordions.js"></script>
	
	
	<!-- Yandex.Metrika counter --> 
	<script type="text/javascript">
		(function (d, w, c) { 
			(w[c] = w[c] || []).push(function() { 
				try { w.yaCounter40933314 = new Ya.Metrika({
					id:40933314, clickmap:true, trackLinks:true, accurateTrackBounce:true, webvisor:true 
					}); } catch(e) { } 
		}); 
		var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { 
			n.parentNode.insertBefore(s, n); 
		}; 
		s.type = "text/javascript"; 
		s.async = true; 
		s.src = "https://mc.yandex.ru/metrika/watch.js"; 
		if (w.opera == "[object Opera]") { 
			d.addEventListener("DOMContentLoaded", f, false); 
		} 
		else { f(); } 
	})(document, window, "yandex_metrika_callbacks");
	</script> 
	<noscript><div><img src="https://mc.yandex.ru/watch/40933314" style="position:absolute; left:-9999px;" alt="" /></div></noscript> 
	<!-- /Yandex.Metrika counter -->   

	<!-- Rating@Mail.ru counter -->
	<script type="text/javascript">
	var _tmr = window._tmr || (window._tmr = []);
	_tmr.push({id: "2885114", type: "pageView", start: (new Date()).getTime()});
	(function (d, w, id) {
		if (d.getElementById(id)) return;
		var ts = d.createElement("script"); ts.type = "text/javascript"; ts.async = true; ts.id = id;
		ts.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//top-fwz1.mail.ru/js/code.js";
		var f = function () {var s = d.getElementsByTagName("script")[0]; s.parentNode.insertBefore(ts, s);};
		if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); }
	})(document, window, "topmailru-code");
	</script><noscript><div>
	<img src="//top-fwz1.mail.ru/counter?id=2885114;js=na" style="border:0;position:absolute;left:-9999px;" alt="" />
	</div></noscript>
	<!-- //Rating@Mail.ru counter -->
	
	<!-- Google analytics -->
	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-96242372-1', 'auto');
		ga('send', 'pageview');
	</script>
	<!-- /Google analytics -->

		
</head>
<body>


<div class="header-menu">
	<div class="wrapper">
		<div class="menu-logo"></div>
		<div class="menu-nav">
			<a id="general-inf" href="test.php" style=""><p>Общие сведения</p></a>
			<a id="health-in-numbers" href="health.php" style=""><p>Моё здоровье в цифрах</p></a>
			<a id="my-documents" href="docs.php" style=""><p>Мои документы</p></a>
			<a id="shop" href="shop.php" style=""><p>Магазин</p></a>
			<a id="services" href="services.php" style="" onclick=""><p>Сервисы</p></a>
		</div>
	</div>
</div>

<div class="main">

	<div class="recommendations">
		<div class="personal-recommendations threeb">
			<a class="link-for-toggle" href="" onclick="return false">
				<div class="img-rec"></div>
				<div class="per-rec"><p>Личные рекомендации</p></div>
				<div class="rec-numb">
					<?php echo "+";echo $lifecount; ?>
				</div> 
				<div class="rec_numb_text">
					<?php if ($lifecount == 1) { 
							echo 'год жизни';
						} 
						elseif ($lifecount > 1 && $lifecount < 5) { 
							echo 'года жизни';
						}
						elseif ($lifecount > 5) { 
							echo 'лет жизни';
						} ?>
				</div>
				
			</a>
			<div class="toggle-inf hide">
				<div class="video-rec">
					
				</div>
				<div class="lifetime">
					Согласно тесту расчетная продолжительность вашей жизни составит <b><?php if ($_SESSION['result_test']['lifetime'] - (date("Y") - $_SESSION['result_test']['year_birth']) < 5) { echo date("Y") - $_SESSION['result_test']['year_birth'] + 5; } else { echo $_SESSION['result_test']['lifetime']; } ?> лет</b> </br>
					Максимальная возможная продолжительность жизни может составить
					<b><?php if ($_SESSION['result_test']['lifetime'] - (date("Y") - $_SESSION['result_test']['year_birth']) < 5){
						echo date("Y") - $_SESSION['result_test']['year_birth'] + 5 + $lifecount;
						echo ' лет';
					}
					else 
					{
						echo $_SESSION['result_test']['lifetime'] + $lifecount;
						echo ' лет';
					} ?></b>
				</div>
			</div>
		</div>
	</div>

	<div class="rec-list">
		<?php 
		$job = $_SESSION['result_test']['work'];

		include './modules/module_mass.php';

		include './modules/module_scales.php';

		if($_SESSION['result_test']['food'] == "Не здоровое" || strpos($_SESSION['result_test']['dead'], "Инсульт") !== false) {
			include './modules/module_tester.php';
		}

		if ($_SESSION['result_test']['smoke'] == 1) {
			include './modules/module_smoke.php';
		}

		include './modules/module_analyzes.php';

		if ($_SESSION['result_test']['healthyfood'] == 1) {
			include './modules/module_healthyfood.php';
		}

		if ($_SESSION['result_test']['cold'] == "4 раза в год или больше") {
			include './modules/module_immunity.php';
		}

		if ($_SESSION['result_test']['healthyheart'] == 1) {
			include './modules/module_healthyheart.php';
		}

		if ($_SESSION['result_test']['healthyheart'] == 1 || $job == "Физически тяжелая") {
			include './modules/module_ekg.php';
		}
		
		if($_SESSION['result_test']['healthyheart'] == 1 || $job == "На ногах") {
			include './modules/module_tonometer.php';
		}

		if ($_SESSION['result_test']['personal_manager'] == 1) {
			include './modules/module_personal_manager.php';
		}

		if($job == "Руководящая" || $job == "Творческая" || $job == "Офисная" || $job == "Не работаю" || $_SESSION['result_test']['sport'] == "Занимаюсь более 1 раза в неделю") {
			include './modules/module_smart_watch.php';
		}

		if(strpos($_SESSION['result_test']['dead'], "Сахарный диабет") !== false) {
			include './modules/module_glucose.php';
		}

		?>
	</div>

	<form name="personal-inf"  id="register">
	<div class="accordion">
		<p>
			<span class="accordions-left">Общие сведения</span>
			<span class="accordions-right">Открыть</span>
		</p>		
	</div>
	<div class="panel">
		<div class="service-content">
			<div class="private-office input-block">
				<div class="general-information">
					<p>Общая информация</p>
					<div class="input-name">
						<p>Как к Вам обращаться</p>
						<?php
							echo '<input type="text" id="iname">';
						?>
					</div>	
					<div class="input-sex">		
						<p>Пол</p>
						<?php
							if($_SESSION['result_test']['sex'] == 'м'){								
								echo '<input type="radio" checked="checked" name="sex" value="Мужской" id="iman">';
								echo '<label for="man">Мужской</label>';
								echo '<input type="radio" name="sex" value="Женский" id="iwoman">';
								echo '<label for="woman">Женский</label>';
							}
							else{
								echo '<input type="radio" name="sex" value="Мужской" id="iman">';
								echo '<label for="man">Мужской</label>';
								echo '<input type="radio" checked="checked" name="sex" value="Женский" id="iwoman">';
								echo '<label for="woman">Женский</label>';
							}
						?>
					</div>
					<div class="input-birth">
						<p>Год рождения</p>
						<?php
							echo '<input type="text" value="'.$_SESSION['result_test']['year_birth'].'" placeholder="гггг" id="iyear">';
						?>
					</div>
					<div class="input-height">
						<p>Рост, см</p>
						<?php
							echo '<input type="text" value="'.$_SESSION['result_test']['height'].'" id="iheight">';
						?>
					</div>
					<div class="input-weight">
						<p>Вес, кг</p>
						<?php
							echo '<input type="text" value="'.$_SESSION['result_test']['weight'].'" id="iweight">';
						?>
					</div>
				</div>

				<div class="lifestyle">
					<p>Образ жизни</p>
					<div class="input-work">
						<p>Работа</p>
						
						<select name="work" id="iwork">
						<?php
							$work_query = $db->query('SELECT job_conditions_type_name, job_conditions_type_id FROM job_conditions_types ORDER BY job_conditions_type_id');
							while ($row = $work_query->fetch(PDO::FETCH_ASSOC)){
								if($row['job_conditions_type_name'] == $_SESSION['result_test']['work']){								
									echo '<option value='.$row['job_conditions_type_id'].' selected>'.$row[	'job_conditions_type_name'].'</option>';
								}
								else{								
									echo '<option value='.$row['job_conditions_type_id'].'>'.$row[	'job_conditions_type_name'].'</option>';
								}
							}
						?>
						</select>
						
					</div>
					
					<div class="input-smoke">
						<p>Курение</p>
												
						<select name="smoking" id="ismoke">

						<?php
							$work_query = $db->query('SELECT smoking_type_name, smoking_type_id FROM smoking_types ORDER BY smoking_type_id');
							while ($row = $work_query->fetch(PDO::FETCH_ASSOC)){
								if($row['smoking_type_name'] == $_SESSION['result_test']['smoking']){								
									echo '<option value='.$row['smoking_type_id'].' selected>'.$row['smoking_type_name'].'</option>';
								}
								else{								
									echo '<option value='.$row['smoking_type_id'].'>'.$row['smoking_type_name'].'</option>';
								}
							}
						?>
						</select>
						
					</div>
					
					<div class="input-sport">
						<p>Спорт</p>
												
						<select name="sport" id="isport">
						<?php
							$work_query = $db->query('SELECT sport_activity_type_name, sport_activity_type_id FROM sport_activity_types ORDER BY sport_activity_type_id');
							while ($row = $work_query->fetch(PDO::FETCH_ASSOC)){
								if($row['sport_activity_type_name'] == $_SESSION['result_test']['sport']){								
									echo '<option value='.$row['sport_activity_type_id'].' selected>'.$row['sport_activity_type_name'].'</option>';
								}
								else{								
									echo '<option value='.$row['sport_activity_type_id'].'>'.$row['sport_activity_type_name'].'</option>';
								}
							}
						?>
						</select>
					</div>
					<div class="input-food">
						<p>Питание</p>						
						<select name="food" id="ifood">
						<?php
							$work_query = $db->query('SELECT diet_type_name, diet_type_id FROM diet_types ORDER BY diet_type_id');
							while ($row = $work_query->fetch(PDO::FETCH_ASSOC)){
								if($row['diet_type_name'] == $_SESSION['result_test']['food']){								
									echo '<option value='.$row['diet_type_id'].' selected>'.$row['diet_type_name'].'</option>';
								}
								else{								
									echo '<option value='.$row['diet_type_id'].'>'.$row['diet_type_name'].'</option>';
								}
							}
						?>
						</select>
						
					</div>
					<div class="input-children">
						<p>Дети</p>
						
						<select name="children" id="ichildren">
						<?php
							$work_query = $db->query('SELECT children_type_name, children_type_id FROM children_types ORDER BY children_type_id');
							while ($row = $work_query->fetch(PDO::FETCH_ASSOC)){
								if($row['children_type_name'] == $_SESSION['result_test']['children']){								
									echo '<option value='.$row['children_type_id'].' selected>'.$row['children_type_name'].'</option>';
								}
								else{								
									echo '<option value='.$row['children_type_id'].'>'.$row['children_type_name'].'</option>';
								}
							}
						?>
						</select>
						
					</div>
					
					<div class="input-alcohol">
						<p>Алкоголь</p>
						
						<select name="alcohol" id="ialcohol">
						<?php
							$work_query = $db->query('SELECT alcohol_type_name, alcohol_type_id FROM alcohol_types ORDER BY alcohol_type_id');
							while ($row = $work_query->fetch(PDO::FETCH_ASSOC)){
								if($row['alcohol_type_name'] == $_SESSION['result_test']['alcohol']){								
									echo '<option value='.$row['alcohol_type_id'].' selected>'.$row['alcohol_type_name'].'</option>';
								}
								else{								
									echo '<option value='.$row['alcohol_type_id'].'>'.$row['alcohol_type_name'].'</option>';
								}
							}
						?>
						</select>
					</div>
				</div>

				<div class="diseases">
					<p>Заболевания</p>
					<div class="input-genetic_risks">
						<p>Генетические риски</p>
						<div class="gen-risks-selectBox" onclick="showCheckboxes()">
							<select id="gen_risks">
								<option>Нажмите, чтобы развернуть</option>
							</select>
							<div class="gen-risks-overSelect"></div>
						</div>
						<div id="gen-risks-checkboxes">
							<?php
								$risks_query = $db->query('SELECT relatives_death_causes_type_id, relatives_death_causes_type_name FROM relatives_death_causes_types ORDER BY relatives_death_causes_type_id');
								$relatives_death_causes = explode(', ', $_SESSION['result_test']['dead']);
								
								$cancer_types = array('Легких' => 'легких', 'Молочной железы' => 'молочной железы', 'Кишечника' => 'кишечника', 'Печени' => 'печени', 'Предстательной железы' => 'предстательной железы', 'Кожи' => 'кожи', 'Шейки матки' => 'шейки матки', 'Другой' => 'другой');
								foreach($cancer_types as $key => $value){
									if(in_array($key, $relatives_death_causes)){
										array_push($relatives_death_causes, "Рак ".$value);
									}
								}
								
								while ($row = $risks_query->fetch(PDO::FETCH_ASSOC)){
									if(in_array($row['relatives_death_causes_type_name'], $relatives_death_causes)){
										echo '<label><input type="checkbox" value='.$row['relatives_death_causes_type_id'].' name="risks_group" checked>'.$row['relatives_death_causes_type_name'].'</label>';
									}
									else{
										echo '<label><input type="checkbox" value='.$row['relatives_death_causes_type_id'].' name="risks_group">'.$row['relatives_death_causes_type_name'].'</label>';
									}
								}
							?>
						</div>
					</div>
					<div class="input-sick_before">
						<p>Чем болел(а) раньше</p>
						<input type="text" value="" id="isick">
					</div>
					<div class="input-chronic_dis">
						<p>Хронические заболевания</p>
						<input type="text" value="" id="ichronic">
						</div>
				</div>

				<div class="contacts-po">
					<p>Контакты</p>
					<div class="input-email">
						<p>e-mail</p>
						<input type="text" value="" id="iemail">
					</div>
					<div class="input-telephone">
						<p>Телефон</p>
							<input type="text" value=""  id="itele">
					</div>
				</div>
			</div>
		</div>
	</div>
	<input type="submit" id="register-button" value="Создать личный кабинет" class="save-btn">
	</form>	

	<div class="time-link threeb">
		<div class="img-time"></div>
		<p class="info">Предоставить временный доступ к Личному кабинету по ссылке:</p>
		<p id="acctual-link">http://site.ru/url&2333?</p>
		<a class="" href="" onclick="return false">Открыть доступ</a>
	</div>

	<div class="family-profile threeb">
		<div class="img-family"></div>
		<p class="info">Создать семейный профиль</p>
		<p class="allfam">(ребенок, муж, жена, мама, папа, родственник)</p>
		<a class="" href="" onclick="return false">+ Добавить члена семьи</a>
	</div>

	<div class="services">
		<p>Сервисы</p>
		<a class="all-serv">Активировать все сервисы</a>
		<div class="click-services">
			
				<a class="weight-control threeb" href="" onclick="return false">
					<p>Контроль веса</p>
					<div class="trigger"></div>
				</a>

				<a class="be-mom threeb" href="" onclick="return false">
					<p>Хочу быть мамой</p>
					<div class="trigger"></div>
				</a>

				<a class="be-dad threeb" href="" onclick="return false">
					<p>Хочу быть папой</p>
					<div class="trigger"></div>
				</a>

				<a class="wait-kid threeb" href="" onclick="return false">
					<p>Жду малыша</p>
					<div class="trigger"></div>
				</a>

				<a class="healthy-heart threeb" href="" onclick="return false">
					<p>Здоровое сердце</p>
					<div class="trigger"></div>
				</a>

				<a class="personal-health-manager threeb" href="" onclick="return false">
					<p>Персональный менеджер здоровья</p>
					<div class="trigger"></div>
				</a>

				<a class="analyzes threeb" href="" onclick="return false">
					<p>Сдача анализов</p>
					<div class="trigger"></div>
				</a>

				<a class="home-bodycheck threeb" href="" onclick="return false">
					<p>Домашний медосмотр</p>
					<div class="trigger"></div>
				</a>

				<a class="give-up-smoking threeb" href="" onclick="return false">
					<p>Отказ от курения</p>
					<div class="trigger"></div>
				</a>

				<a class="healthy-eating threeb" href="" onclick="return false">
					<p>Здоровое питание</p>
					<div class="trigger"></div>
				</a>
				
				<a class="immunity threeb" href="" onclick="return false">
					<p>Поднятие иммунитета</p>
					<div class="trigger"></div>
				</a>
				
				<a class="reminder threeb" href="" onclick="return false">
					<p>Напоминания</p>
					<div class="trigger"></div>
				</a>
			
		</div>
	<div class="instructions">
   		<input type="checkbox" id="how_video" name="video" value="how_video">
    	<label for="video">Показывать видеоинструкции?</label>
  	</div>
	<hr>
	</div>
	<?php
        include("footer.php");
    ?>
</div>


<!--#######################Register Test Modal#####################################-->  
<div class="modal-window" id="test-register-modal"> 
	<div class="modal-window-content" id="test-register-content">
		<div class="modal-window-body sm-body">
			<div class="modal-header register_modal_header" >
				<span class="close" id="test-register-close">&times;</span>
				<div class="modal-title">Регистрация</div>
			</div>
			<div class="register-form-wrapper">
				<div id="test-register-text-wrapper">
					<p class="test-register-text">Чтобы <span class="test-reg-span">сохранить результаты теста,</span> рекомендуем создать <br>
					Личный кабинет</p>
					<p class="test-register-text">Это <span class="test-reg-span">бесплатно открывает полный доступ</span> ко всем <br>
						возможностям нашего сервиса </p>
				</div>
				<form id="register-form" class="modal-form">
					<div class="input-phone">
						<p class="modal-label" id="phone-label">Номер мобильного телефона</p>
						<input type="text" name="phone-number" class="modal-input" id="phone-number">
					</div>
					<div class="checkbox">
						<p class="agree-label" >
							<input type="checkbox" id="agree" name="agree" checked> Я согласен с условиями предоставления сервиса
						</p>
					</div>
					<div id="test-reg-btns">
						<a type="button" class="modal-btn" id="test-register-btn" href="#">Создать</a>
						<a type="button" class="modal-btn" id="test-register-think-btn" href="#">Я еще подумаю</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
		
		
<!--######################Confirm modal######################################-->
<div class="modal-window" id="confirm-modal">
	<div class="modal-window-content" id="confirm-content">
		<div class="modal-window-body sm-body">
			<div class="modal-header confirm_modal_header">
				<span class="close" id="confirm-close">&times;</span>
				<div class="modal-title">Подтверждение телефона</div>
			</div>
			<div class="confirm-form-wrapper" >
				<p id="confirm-text" >На номер <span class="phone_number" id="confirm-phone">+7(925)304-26-34</span>был выслан код для <br>подтверждения телефона </p>
				<form id="code-form" class="modal-form">
					<div class="confirm-input">
						<div class="input-code">
							<p class="modal-label" >Введите полученный код</p>
							<input type="text" name="confirm-code" id="confirm-code" class="modal-input" minlength="4" maxlength="4" >
						</div>
						<div class="input-password">
							<p class="modal-label">Используйте пароль <a href="#" id="rand-confirm-password" style="text-decoration:none">hjkjjjas</a><i class="fa fa-question-circle help-icon" data-title="Нажмите на пароль"></i> или введите другой</p>
							<input type="text" name="confirm-password" id="confirm-password" class="modal-input">
						</div>
					</div>
					<a type="button" class="modal-btn" id="confirm-btn" >Подтвердить</a>
				</form>
			</div>
		</div>
	</div>
</div>	
	
<!--######################Success modal######################################-->	
<div class="modal-window" id="success-modal" >
	<div class="modal-window-content" id="success-content">
		<div class="modal-window-body">
				<div class="success-header">
					<span class="close" id="success-close">&times;</span>
					<p class="modal-title" id="success-title"> Поздравляем с регистрацией Личного кабинета <br>на сервисе Здравствую.рф!</p>
				</div>
				<div class="success-container">
					<p id="success-p1">
						Вы сделали важный шаг к сохранению здоровья и продлению жизни.<br>Теперь у Вас есть возможность воспользоваться всеми нашими сервисами. <br>
						Результаты теста помещены в раздел Общие сведения. На их основании мы будем <br> давать рекомендации для наиболее качественной и полной профилактики здоровья.<br> Изменить эти данные можно в любой момент.
					</p>
					
					<hr class="success-border">
					<div class="success-form-wrapper"  >
						<p>Цель нашего сервиса продлить вашу жизнь и сделать ее более здоровой, но сделать<br> это без вашего участия мы не сможем. Поэтому, с вашего позволения, мы бы хотели <br>
						изредка напоминать Вам о необходимости уделить время профилактике здоровья.<br>Обещаем не быть навязчивыми и прекратить по первой Вашей просьбе.					
						</p>
					</div>
					<form class="modal-form reminder-form">
						<div class="success-checkbox">
								<input type="checkbox" id="reminder" name="reminder" checked >
								<p id="reminder-label" >Разрешить <br> напоминания</p>
						</div>
					</form>
					<hr class="success-border">
					<div class="username-wrapper">
						<form class="username-form">
							<p class="modal-label">Как к Вам можно обращаться?</p>
							<input type="text" name="username" id="username" class="modal-input" >
						</form>	
						<div class="success-text">
							<p>Добро пожаловать!</p>
							<p>Будьте здоровы и живите долго!</p>
							<p>Мы поможем.</p>
						</div>
					</div>
					<div class="success-btn-wrapper">
						<a type="button" class="modal-btn" id="success-btn" href="#">Войти</a>
					</div>
				</div>
			</div>
	</div>
</div>	
		
	<script>
	(function(w, d, s, h, id) {
		w.roistatProjectId = id; w.roistatHost = h;
		var p = d.location.protocol == "https:" ? "https://" : "http://";
		var u = /^.*roistat_visit=[^;]+(.*)?$/.test(d.cookie) ? "/dist/module.js" : "/api/site/1.0/"+id+"/init";
		var js = d.createElement(s); js.charset="UTF-8"; js.async = 1; js.src = p+h+u; var js2 = d.getElementsByTagName(s)[0]; js2.parentNode.insertBefore(js, js2);
	})(window, document, 'script', 'cloud.roistat.com', 'e1532658477bc22fa49715ac4445f571');
	</script>
</body>
</html>