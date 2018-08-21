<?php include('includes/config.php'); ?>
<?php
	/*
	if(!$_SESSION['test_completed']){
	    if(!$user->is_logged_in()){
		    header('Location: https://здравствую.рф/');
	    }
	}
	*/

	include('modules/general_data_src.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Общие сведения</title>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/multiselect.css" />
	<link rel="stylesheet" type="text/css" href="css/accordion.css" />
	<link rel="stylesheet" type="text/css" href="css/input_radio.css" />
	<link rel="stylesheet" type="text/css" href="css/input_checkbox.css" />
	<link rel="stylesheet" type="text/css" href="css/input_toggle.css" />
	<link rel="stylesheet" href="css/info_modals.css" />
	<link rel="stylesheet" href="css/test.css" />
	<!--<link rel="stylesheet" type="text/css" href="css/registration_login_windows.css" />-->
	<link rel="stylesheet" type="text/css" href="css/modals.css" />
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
	<script src="scripts/header.js"></script>
	<script src="scripts/multiselect.js"></script>
	<script src="scripts/accordions.js"></script>
	<script src="scripts/info_modal_texts.js"></script>
	<script src="scripts/info_modals.js"></script>
	<script src="scripts/reminders.js"></script>
	<script src="scripts/save_general_data.js"></script>
	<script src="scripts/signout.js"></script>
	<script src="scripts/responsive_tooltips.js"></script>

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

<?php
	include 'header.php';
?>

<div class="main">
	<div class="recommendations-top">
		<div class="personal-recommendations threeb blue-shadow">
			<div class="main-rec-container">
				<div class="main-rec-text-container">
					<div class="rec-icon-main"></div>
					<div class="rec-text-main">Личные рекомендации</div>
				</div>
				<div class="rec-sum-container">
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
							elseif ($lifecount >= 5) { 
								echo 'лет жизни';
							} ?>
					</div>
				</div>
			</div>
				<div class="lifetime">
					Согласно тесту расчетная продолжительность вашей жизни составит <b><?php 
						if ($user_data_arr['lifetime'] - (date("Y") - $user_data_arr['year_birth']) < 5) { 
							echo date("Y") - $user_data_arr['year_birth'] + 5; 
						} else { 
							echo $user_data_arr['lifetime']; 
						} ?> лет</b> </br>
					Максимальная возможная продолжительность жизни может составить
					<b><?php if ($user_data_arr['lifetime'] - (date("Y") - $user_data_arr['year_birth']) < 5){
						echo date("Y") - $user_data_arr['year_birth'] + 5 + $lifecount;
						echo ' лет ';
					}
					else 
					{
						echo $user_data_arr['lifetime'] + $lifecount;
						echo ' лет ';
					} ?></b>
					<div class="questionmark">
						<span class="tooltip-content">
							Тест и расчет возможной продолжительности жизни основаны на
							статистических данных по средней продолжительности жизни мужчин и женщин в России
							на 2017г, а так же на исследованиях Всемирной организации здравоохранения о факторах
							влияющих на продолжительность жизни
						</span>
					</div>
				</div>
		</div>
	</div>

	<div class="rec-list">
		<?php

		include './modules/module_plan.php';

		include './modules/module_mass.php';

		include './modules/module_shop.php';

		if ($user_data_arr['give_up_smoking']) {
			include './modules/module_smoke.php';
		}

		include './modules/module_analyzes.php';

		if ($user_data_arr['healthyfood']) {
			include './modules/module_healthyfood.php';
		}

		if ($user_data_arr['immunity'] == "4 раза в год или больше") {
			include './modules/module_immunity.php';
		}

		if ($user_data_arr['healthyheart']) {
			include './modules/module_healthyheart.php';
		}

		if ($user_data_arr['personal_manager']) {
			include './modules/module_personal_manager.php';
		}

		/*
		include './modules/module_scales.php';

		if($user_data_arr['module_tester']) {
			include './modules/module_tester.php';
		}

		if ($user_data_arr['healthyheart'] || $user_data_arr['job'] == "Физически тяжелая") {
			include './modules/module_ekg.php';
		}
		
		if($user_data_arr['healthyheart'] || $user_data_arr['job'] == "На ногах") {
			include './modules/module_tonometer.php';
		}
		
		if(in_array("Сахарный диабет", $user_data_arr['risks'])) {
			include './modules/module_glucose.php';
		}

		if($user_data_arr['smart_watch']) {
			include './modules/module_smart_watch.php';
		}
		*/

		?>
	</div>

	<?php 
		if(!$user->is_logged_in()){
			echo '<form name="personal-inf"  id="register">';
		}
		else{
			echo '<form name="personal-inf"  id="save_gen_data">';
		}
	?>
	
	<div id="register-acc" class="accordion">
		<p>
			<span class="accordions-left">Общие сведения</span>
			<span class="accordions-right">Открыть</span>
		</p>		
	</div>
	<div class="panel">
		<div class="user-data-wrapper">
			<div class="data-category-title">Общая информация</div>
			<div class="data-container">
				<div class="data-box">
					<div class="input-title">Как к Вам обращаться</div>
					<?php
						echo '<input type="text" value="'.$user_data_arr['name'].'" id="iname">';
					?>
				</div>
				<div class="data-box short">
					<div class="input-title">Пол</div>
					<?php
								if($user_data_arr['sex'] == 'male'){
									/*
									echo '<input type="radio" checked="checked" name="sex" value="Мужской" id="iman">';
									echo '<label for="man">Мужской</label>';
									echo '<input type="radio" name="sex" value="Женский" id="iwoman">';
									echo '<label for="woman">Женский</label>';
									*/
									echo '<label class="container-radio">';
									echo '<input type="radio" checked="checked" name="sex" value="Мужской" id="iman">';
									echo '<span class="checkmark-radio"></span>';
									echo '<span>Мужской</span>';
									echo '</label>';
	
									echo '<label class="container-radio">';
									echo '<input type="radio" name="sex" value="Женский" id="iwoman">';
									echo '<span class="checkmark-radio"></span>';
									echo '<span>Женский</span>';
									echo '</label>';
								}
								else{
									/*
									echo '<input type="radio" name="sex" value="Мужской" id="iman">';
									echo '<label for="man">Мужской</label>';
									echo '<input type="radio" checked="checked" name="sex" value="Женский" id="iwoman">';
									echo '<label for="woman">Женский</label>';
									*/
	
									echo '<label class="container-radio">';
									echo '<input type="radio"name="sex" value="Мужской" id="iman">';
									echo '<span class="checkmark-radio"></span>';
									echo '<span>Мужской</span>';
									echo '</label>';
	
									echo '<label class="container-radio">';
									echo '<input type="radio" checked="checked" name="sex" value="Женский" id="iwoman">';
									echo '<span class="checkmark-radio"></span>';
									echo '<span>Женский</span>';
									echo '</label>';
								}
							?>
				</div>
				<div class="data-box short">
					<div class="input-title">Год рождения</div>
					<?php
						echo '<input type="text" value="'.$user_data_arr['year_birth'].'" placeholder="гггг" id="iyear">';
					?>
				</div>
				<div class="data-box short">
					<div class="input-title">Рост, см</div>
					<?php
						echo '<input type="text" value="'.$user_data_arr['height'].'" id="iheight">';
					?>
				</div>
				<div class="data-box short">
					<div class="input-title">Вес, кг</div>
					<?php
						echo '<input type="text" value="'.$user_data_arr['weight'].'" id="iweight">';
					?>
				</div>
			</div>
			<div class="data-category-title">Образ жизни</div>
			<div class="data-container">
				<div class="data-box">
					<div class="input-title">Работа</div>
					<select name="work" id="iwork">
						<?php
								$work_query = $db->query('SELECT job_conditions_type_name, job_conditions_type_id FROM job_conditions_types ORDER BY job_conditions_type_id');
								while ($row = $work_query->fetch(PDO::FETCH_ASSOC)){
									if($row['job_conditions_type_name'] == $user_data_arr['job']){								
										echo '<option value='.$row['job_conditions_type_id'].' selected>'.$row[	'job_conditions_type_name'].'</option>';
									}
									else{								
										echo '<option value='.$row['job_conditions_type_id'].'>'.$row[	'job_conditions_type_name'].'</option>';
									}
								}
							?>
					</select>
				</div>
				<div class="data-box">
					<div class="input-title">Курение</div>
					<select name="smoking" id="ismoke">
						<?php
								$work_query = $db->query('SELECT smoking_type_name, smoking_type_id FROM smoking_types ORDER BY smoking_type_id');
								while ($row = $work_query->fetch(PDO::FETCH_ASSOC)){
									if($row['smoking_type_name'] == $user_data_arr['smoking']){								
										echo '<option value='.$row['smoking_type_id'].' selected>'.$row['smoking_type_name'].'</option>';
									}
									else{								
										echo '<option value='.$row['smoking_type_id'].'>'.$row['smoking_type_name'].'</option>';
									}
								}
						?>
					</select>
	
				</div>
				<div class="data-box">
					<div class="input-title">Спорт</div>
	
					<select name="sport" id="isport">
						<?php
								$work_query = $db->query('SELECT sport_activity_type_name, sport_activity_type_id FROM sport_activity_types ORDER BY sport_activity_type_id');
								while ($row = $work_query->fetch(PDO::FETCH_ASSOC)){
									if($row['sport_activity_type_name'] == $user_data_arr['sport']){								
										echo '<option value='.$row['sport_activity_type_id'].' selected>'.$row['sport_activity_type_name'].'</option>';
									}
									else{								
										echo '<option value='.$row['sport_activity_type_id'].'>'.$row['sport_activity_type_name'].'</option>';
									}
								}
							?>
					</select>
				</div>
				<div class="data-box">
					<div class="input-title">Питание</div>
					<select name="food" id="ifood">
						<?php
								$work_query = $db->query('SELECT diet_type_name, diet_type_id FROM diet_types ORDER BY diet_type_id');
								while ($row = $work_query->fetch(PDO::FETCH_ASSOC)){
									if($row['diet_type_name'] == $user_data_arr['diet']){								
										echo '<option value='.$row['diet_type_id'].' selected>'.$row['diet_type_name'].'</option>';
									}
									else{								
										echo '<option value='.$row['diet_type_id'].'>'.$row['diet_type_name'].'</option>';
									}
								}
						?>
					</select>
	
				</div>
				<div class="data-box">
					<div class="input-title">Дети</div>
	
					<select name="children" id="ichildren">
						<?php
								$work_query = $db->query('SELECT children_type_name, children_type_id FROM children_types ORDER BY children_type_id');
								while ($row = $work_query->fetch(PDO::FETCH_ASSOC)){
									if($row['children_type_name'] == $user_data_arr['children']){								
										echo '<option value='.$row['children_type_id'].' selected>'.$row['children_type_name'].'</option>';
									}
									else{								
										echo '<option value='.$row['children_type_id'].'>'.$row['children_type_name'].'</option>';
									}
								}
						?>
					</select>
	
				</div>
				<div class="data-box">
					<div class="input-title">Алкоголь</div>
	
					<select name="alcohol" id="ialcohol">
						<?php
								$work_query = $db->query('SELECT alcohol_type_name, alcohol_type_id FROM alcohol_types ORDER BY alcohol_type_id');
								while ($row = $work_query->fetch(PDO::FETCH_ASSOC)){
									if($row['alcohol_type_name'] == $user_data_arr['alcohol']){								
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
	
			<div class="data-category-title">Заболевания</div>
			<div class="data-container">
				<div class="data-box long">
					<div class="input-title">Генетические риски</div>
					<div class="gen-risks-selectBox" onclick="showCheckboxes()">
						<select id="gen_risks">
							<option>Нажмите, чтобы развернуть</option>
						</select>
						<div class="gen-risks-overSelect"></div>
					</div>
					<div id="gen-risks-checkboxes">
						<?php
									$risks_query = $db->query('SELECT relatives_death_causes_type_id, relatives_death_causes_type_name FROM relatives_death_causes_types ORDER BY relatives_death_causes_type_id');
									while ($row = $risks_query->fetch(PDO::FETCH_ASSOC)){									
										if(in_array($row['relatives_death_causes_type_name'], $user_data_arr['risks'])){
											echo '<label class="container-checkbox">';
											echo '<input type="checkbox" value='.$row['relatives_death_causes_type_id'].' name="risks_group" checked>';
											echo '<span class="checkmark"></span>';
											echo '<span>'.$row['relatives_death_causes_type_name'].'</span>';
											echo '</label>';
										}
										else{
											echo '<label class="container-checkbox">';
											echo '<input type="checkbox" value='.$row['relatives_death_causes_type_id'].' name="risks_group">';
											echo '<span class="checkmark"></span>';
											echo '<span>'.$row['relatives_death_causes_type_name'].'</span>';
											echo '</label>';
										}
									}
						?>
					</div>
				</div>
				<div class="data-box long">
					<div class="input-title">Чем болел(а) раньше</div>
					<?php echo '<input type="text" value="'.$user_data_arr['diseases'].'" id="isick">'; ?>
				</div>
				<div class="data-box long">
					<div class="input-title">Хронические заболевания</div>
					<?php echo '<input type="text" value="'.$user_data_arr['chronical'].'" id="ichronic">' ?>
				</div>
			</div>
	
			<div class="data-category-title">Контакты</div>
			<div class="data-container">
				<div class="data-box">
					<div class="input-title">E-mail</div>
					<?php echo '<input type="text" value="'.$user_data_arr['email'].'" id="iemail">'; ?>
				</div>
				<div class="data-box">
					<div class="input-title">Телефон</div>
					<?php echo '<input type="text" value="'.$user_data_arr['phone'].'"  id="itele">'; ?>
				</div>
			</div>
		</div>
	</div>
	<?php
		if(!$user->is_logged_in()){
			echo '<input type="hidden" id="ilifetime" value="'.$user_data_arr['lifetime'].'">';
			echo '<input type="submit" id="register-button" value="Создать личный кабинет" class="save-btn">';
			echo '<div class="footnote">И получить план профилактики здоровья на 3 года <a href="plan/demo.php" target="_blank">(пример)</a></div>';
		}
		else{
			echo '<input type="submit" id="save_gen_data_button" value="Сохранить" class="save-btn">';
		}
	?>
	</form>	

	<div class="threeb">
		<div class="rec-wrapper">
			<div class="rec-icon-container">
				<div class="icon-chain"></div>
			</div>
			<div class="rec-container">
				<div class="rec-text-container">
					<div class="rec-text">Предоставить временный доступ к Личному кабинету по ссылке:</div>
					<div class="rec-text-additional">http://site.ru/url&2333?</div>
				</div>
				<div class="rec-button-container">
					<a class="rec-button-white" href="#">Открыть доступ</a>
				</div>
			</div>
		</div>
	</div>

	<div class="threeb">
		<div class="rec-wrapper">
			<div class="rec-icon-container">
				<div class="icon-family"></div>
			</div>
			<div class="rec-container">
				<div class="rec-text-container">
					<div class="rec-text">Создать семейный профиль</div>
					<div class="rec-text-additional">(ребенок, муж, жена, мама, папа, родственник)</div>
				</div>
				<div class="rec-button-container">
					<a class="rec-button-white" href="#">+ Добавить члена семьи</a>
				</div>
			</div>
		</div>
	</div>
	
	<div class="threeb cashback">
	<div class="rec-wrapper">
		<div class="cashback-container-top">
			<div>
				<strong>Кэшбек</strong> (3% от всех заказов сделанных через сайт)
				<div class="questionmark">
					<span class="tooltip-content">
						Время обработки кэшбека от 15 до 60 дней с момента оплаты заказа. Срок
						обработки зависит от срока предоставления финансовых отчетов нашими партнерами
					</span>
				</div>
			</div>
			<div>Сумма в обработке <strong>205р</strong> Доступно к снятию <strong>634р</strong></div>
		</div>
		<div class="cashback-container-bottom">
			<div class="cashback-bottom-box">
					<div>Перевести</div>
					<input type="text">
					<div class="rec-text-additional">минимальная сумма снятия 500р</div>
			</div>
			<div class="cashback-bottom-box">
				<label class="container-radio">
                	<input type="radio" name="cashback">
                	<span class="checkmark-radio"></span>
                	<span>На телефон</span>
            	</label><br>
				<input type="text">
			</div>
			<div class="cashback-bottom-box">
				<div class="cashback-card-info">
				<label class="container-radio">
                	<input type="radio" name="cashback">
                	<span class="checkmark-radio"></span>
                	<span>На карту</span>
				</label>
				<img src="images/icons/cards.png">
				</div>
				<input type="text">
			</div>
		</div>
		<div class="cashback-button-container">
			<a class="cashback-button button-unregistered-wip">Отправить</a>
		</div>
		</div>
	</div>

	<div id="reminders" class="accordion">
        <p>
            <span class="accordions-left">Напоминания</span>
            <span class="accordions-right">Открыть</span>
        </p>
    </div>
    <div class="panel">
        <div class="panel-content">
            <h1 class="reminders-title">Добавить напоминание</h1>
			<div class="reminders-container">
				<div class="reminders-box">
					<p>Вид</p>
					<select>
						<option>Принять лекарство</option>
						<option>Сдать анализы</option>
						<option>Пройти обследование</option>
						<option>Посетить врача</option>
						<option>Другое</option>
					</select>
				</div>
				<div class="reminders-box">
					<p>Повторение</p>
					<select>
						<option>Один раз</option>
						<option>Каждый день</option>
						<option>Раз в неделю</option>
						<option>Раз в месяц</option>
						<option>Раз в 3 месяца</option>
						<option>Раз в 6 месяцев</option>
						<option>Раз в год</option>
					</select>
				</div>
				<div class="reminders-box">
					<p>Дата</p>
					<input type="date">
				</div>
				<div class="reminders-box">
					<p>Время</p>
					<input type="text" id="reminders-time">
				</div>

			
				<div class="reminders-box">
					<p>Уведомление</p>
					<select>
						<option>SMS</option>
						<option>Почта</option>
						<option>Viber</option>
						<option>WhatsApp</option>
					</select>
				</div>
				<div class="reminders-box">
					<p>Название</p>
					<input type="text">
				</div>
			</div>
			<a class="rec-button button-unregistered-wip">Добавить</a>
			<h1 class="reminders-title">Мои напоминания</h1>
			<table class="table-reminders">
				<tr>
					<td class="rem-type">Пройти обследование</td>
					<td class="rem-info">Раз в 6 месяцев</td>
					<td class="rem-info">23.03 в 10:00</td>
					<td class="rem-info">WhatsApp</td>
					<td class="rem-name">Онкомаркеры</td>
					<td>
						<label class="switch">
  						<input type="checkbox">
  						<span class="slider"></span>
						</label>
					</td>
				</tr>
				<tr>
					<td class="rem-type">Сдать анализы</td>
					<td class="rem-info">1 раз в год</td>
					<td class="rem-info">23.03 в 10:00</td>
					<td class="rem-info">Почта</td>
					<td class="rem-name">УЗИ молочной железы</td>
					<td>
						<label class="switch">
  						<input type="checkbox">
  						<span class="slider"></span>
						</label>
					</td>
				</tr>
			</table>

			<div class="reminders-block-mobile">
				<div class="table-rem-mobile">
					<div class="rem-line">
						<div>Вид:</div>
						<div>Пройти обследование</div>	
					</div>
					<div class="rem-line">
						<div>Повторение:</div>
						<div>Раз в 6 месяцев</div>
					</div>
					<div class="rem-line">
						<div>Дата:</div>
						<div>23.03</div>	
					</div>
					<div class="rem-line">
						<div>Время:</div>
						<div>10:00</div>
					</div>
					<div class="rem-line">
						<div>Уведомление:</div>
						<div>WhatsApp</div>
					</div>
					<div class="rem-line">
						<div>Название:</div>
						<div>Онкомаркеры</div>
					</div>
					<div class="rem-line">
						<div>Статус:</div>
						<div>
							<label class="switch">
  							<input type="checkbox">
  							<span class="slider"></span>
							</label>
						</div>	
					</div>
				</div>
			</div>

        </div>
    </div>

	<div class="services">
		<div class="title">Сервисы</div>
		<div class="global-toggle">
			Активировать все сервисы
			<label class="switch">
  				<input type="checkbox">
  				<span class="slider"></span>
			</label>
		</div>
		<div class="services-toggles">
				<div class="service-box threeb">
					<div>
						<div class="rec-icon-container">
							<div class="icon-mass-index"></div>
						</div>
						Контроль веса
					</div>
					<label class="switch">
  						<input type="checkbox">
  						<span class="slider"></span>
					</label>
				</div>
				
				<div class="service-box threeb">
					<div>
						<div class="rec-icon-container">
							<div class="icon-be-mom"></div>
						</div>
						Хочу быть мамой
					</div>
					<label class="switch">
  						<input type="checkbox">
  						<span class="slider"></span>
					</label>
				</div>

				<div class="service-box threeb">
					<div>
						<div class="rec-icon-container">
							<div class="icon-be-dad"></div>
						</div>
						Хочу быть папой
					</div>
					<label class="switch">
  						<input type="checkbox">
  						<span class="slider"></span>
					</label>
				</div>

				<div class="service-box threeb">
					<div>
						<div class="rec-icon-container">
							<div class="icon-expecting"></div>
						</div>
						Жду малыша
					</div>
					<label class="switch">
  						<input type="checkbox">
  						<span class="slider"></span>
					</label>
				</div>

				<div class="service-box threeb">
					<div>
						<div class="rec-icon-container">
							<div class="icon-healthyheart"></div>
						</div>
						Здоровое сердце
					</div>
					<label class="switch">
  						<input type="checkbox">
  						<span class="slider"></span>
					</label>
				</div>

				<div class="service-box threeb">
					<div>
						<div class="rec-icon-container">
							<div class="icon-personal-manager"></div>
						</div>
						Персональный менеджер здоровья
					</div>
					<label class="switch">
  						<input type="checkbox">
  						<span class="slider"></span>
					</label>
				</div>

				<div class="service-box threeb">
					<div>
						<div class="rec-icon-container">
							<div class="icon-analyzes"></div>
						</div>
						Сдача анализов
					</div>
					<label class="switch">
  						<input type="checkbox">
  						<span class="slider"></span>
					</label>
				</div>

				<div class="service-box threeb">
					<div>
						<div class="rec-icon-container">
							<div class="icon-homebodycheck"></div>
						</div>
						Домашний медосмотр
					</div>
					<label class="switch">
  						<input type="checkbox">
  						<span class="slider"></span>
					</label>
				</div>

				<div class="service-box threeb">
					<div>
						<div class="rec-icon-container">
							<div class="icon-smoke"></div>
						</div>
						Отказ от курения
					</div>
					<label class="switch">
  						<input type="checkbox">
  						<span class="slider"></span>
					</label>
				</div>

				<div class="service-box threeb">
					<div>
						<div class="rec-icon-container">
							<div class="icon-healthyfood"></div>
						</div>
						Здоровое питание
					</div>
					<label class="switch">
  						<input type="checkbox">
  						<span class="slider"></span>
					</label>
				</div>

				<div class="service-box threeb">
					<div>
						<div class="rec-icon-container">
							<div class="icon-immunity"></div>
						</div>
						Поднятие иммунитета
					</div>
					<label class="switch">
  						<input type="checkbox">
  						<span class="slider"></span>
					</label>
				</div>

				<div class="service-box threeb">
					<div>
						<div class="rec-icon-container">
							<div class=""></div>
						</div>
						Генетический скрининг организма
					</div>
					<label class="switch">
  						<input type="checkbox">
  						<span class="slider"></span>
					</label>
				</div>
			</div>
		</div>
	<!--div class="instructions">
   		<input type="checkbox" id="how_video" name="video" value="how_video">
    	<label for="video">Показывать видеоинструкции?</label>
  	</div-->
	<hr>
	
	<?php
        include("footer.php");
    ?>
</div>

<?php 
	include("info_modals.php");
	include("registration_modals.php");
?>

		
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