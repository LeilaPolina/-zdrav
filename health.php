<?php include_once('includes/config.php'); ?>

<!DOCTYPE html>
<html>
<head>
	<title>Мое здоровье в цифрах</title>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/test.css" />
	<link rel="stylesheet" type="text/css" href="css/health.css" />
	<link rel="stylesheet" type="text/css" href="css/registration_login_windows.css" />
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<!--DEMO Zdrav Test Styles-->
	<link rel="stylesheet" type="text/css" href="css/demo_btn.css" />
	
	<!--SCRIPTS-->
    <script src="jquery/jquery-3.1.1.min.js"></script>
    <script src="scripts/health.js"></script>
	<script src="scripts/reason_models.js"></script>
	<script src="jquery/jquery.maskedinput.min.js"></script>
	<script src="scripts/signout.js"></script>
	<script src="scripts/demo.js"></script>

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
<?php
	if($user->is_logged_in()){
		include('get_indexes_values.php');
	}
?>
<body>
	<!--#################################Header#################################-->
	<div class="header-menu">
	<div class="wrapper">
		<div class="menu-logo"></div>
		<div class="menu-nav">
			<?php 
                if($user->is_logged_in()){
                    echo '<a id="general-inf" href="general_data.php" style=""><p>Общие сведения</p></a>';
                }
                else{
                    echo '<a id="general-inf" href="test.php" style=""><p>Общие сведения</p></a>';
                }
            ?>
			<a id="health-in-numbers" href="health.php" style=""><p>Моё здоровье в цифрах</p></a>
			<a id="my-documents" href="docs.php" style=""><p>Мои документы</p></a>
			<a id="shop" href="shop.php" style=""><p>Магазин</p></a>
			<a id="services" href="services.php" style="" onclick=""><p>Сервисы</p></a>
			<?php 
                if($user->is_logged_in()){
					echo '<a id="sign-out-lk" href="#" style=""><p>Выход</p></a>';
				}
			?>
		</div>
	</div>
</div>

	<!--#################################Main#################################-->
	<div class="main">
		<div class="lk health-in-numbers-wrapper">			
			<!-- DEMO PART -->
			<?php 
				if(!$user->is_logged_in()){
					echo '<div class="demo-div">';
					echo '<p>Демонстрационный режим</p>';
					echo '<p>Мое здоровье в цифрах</p>';
					echo '<br/>';
					echo '<ul class="demo-ul">';
						echo '<li><p>Данный сервис предоставлен в демонстрационном режиме<p></li>';
						echo '<li><p>Нормы и показания могут не соответствовать вашим данным<p></li>';
						echo '<li><p>Для полноценной работы необходимо создать Личный кабинет<p></li>';
					echo '</ul>';
					echo '<br/>';
					echo '<button class="demo-btn" id="go-to-result-test-save" href="">Создать личный кабинет</button>';
					echo '</div>';
				}
				else{
					echo '<p>Личный кабинет</p>';
					echo '<p>Мое здоровье в цифрах</p>';
				}
			?>
			<!-- /DEMO PART -->
			<?php 
				if($user->is_logged_in()) {
					echo '<div class="video-rec" style="display:block"></div>';
				}
			
			?>
			
		</div>
		
		<div class="indexes-header-wrapper">
			<div class="indexes-header">
				<p>Главные показатели<p/>
			</div>
		</div>
		
		<div class="table-wrapper">
			<table class="main-indexes">
				<tr class="indexes-head">
					<th class="border-col"></th>
					<th class="date-col">Дата</th>
					<th class="index-col">Показатель</th>
					<th class="value-col">Значение</th>
					<th class="btn-col"></th>
					<th class="estimation-col">Оценка</th>
					<th class="graph-col">График</th>
					<th class="reason-col">Причина</th>
				</tr>
				<!--#################################Сholesterol#################################-->
				<tr class="indexes-row">
					<td class="border-col" id="cholesterol-brd"></td>
					<td class="date-col index-date" id="cholesterol-date">&mdash;</td>
					<td class="index-col index-name">Холестерин общий</td>
					<td class="value-col index-value">
						<span  class="index-span" id="cholesterol-span">&mdash;</span>
					</td>
					<td class="btn-col">
						<a type="button" class="pl-btn" id="cholesterol-btn" href="#">+</a>
					</td>
					<td class="estimation-col index-estimation" id="cholesterol-estm">&mdash;</td>
					<td class="graph-col index-graph">
						<div class="index-graph-img-wrapper" id="cholesterol-graph"></div>
					</td>
					<td class="reason-col index-reason">
						<div class="index-reason-wrapper">
							<a href="#" class="index-reason-a" id="cholesterol-reason">Причина</a>
						</div>
					</td>
				</tr>
				<!--#################################Sugar#################################-->				
				<tr class="indexes-row">
					<td class="border-col" id="sugar-brd" ></td>
					<td class="date-col index-date" id="sugar-date">&mdash;</td>
					<td class="index-col index-name">Сахар</td>
					<td class="value-col index-value">
						<span class="index-span" id="sugar-span">&mdash;</span>
					</td>
					<td class="btn-col">
						<a type="button" class="pl-btn" id="sugar-btn" href="#">+</a>
					</td>
					<td class="estimation-col index-estimation" id="sugar-estm">&mdash;</td>
					<td class="graph-col index-graph">
						<div class="index-graph-img-wrapper" id="sugar-graph"></div>
					</td>
					<td class="reason-col index-reason">
						<div class="index-reason-wrapper">
							<a href="#" class="index-reason-a" id="sugar-reason">Причина</a>
						</div>
					</td>
				</tr>
				<!--#################################Blood pressure#################################-->
				<tr class="indexes-row">
					<td class="border-col" id="blood-pressure-brd"></td>
					<td class="date-col index-date" id="blood-pressure-date">&mdash;</td>
					<td class="index-col index-name">Давление</td>
					<td class="value-col index-value">
						
						<div class="blood-spans-wrapper">
							<span id="blood-pressure-1" class="blood-pressure-span">&mdash;</span>
							<span class="blood-pressure-span"> на</span>
							<span id="blood-pressure-2" class="blood-pressure-span">&mdash;</span>
						</div>
					</td>
					<td class="btn-col">
						<a type="button" class="pl-btn" id="blood-btn" href="#">+</a>
					</td>
					<td class="estimation-col index-estimation" id="blood-pressure-estm">&mdash;</td>
					<td class="graph-col index-graph">
						<div class="index-graph-img-wrapper" id="blood-pressure-graph"></div>
					</td>
					<td class="reason-col index-reason">
						<div class="index-reason-wrapper">
							<a href="#" class="index-reason-a"  id="blood-reason">Причина</a>
						</div>
					</td>
				</tr>
				<!--#################################Weight#################################-->
				<tr class="indexes-row">
					<td class="border-col" id="weight-brd"></td>
					<td class="date-col index-date" id="weight-date">&mdash;</td>
					<td class="index-col index-name">Вес</td>
					<td class="value-col index-value">
						<span class="index-span" id="weight-span">&mdash;</span>
					</td>
					<td class="btn-col">
						<a type="button" class="pl-btn" id="weight-btn" href="#">+</a>
					</td>
					<td class="estimation-col index-estimation" id="weight-estm">&mdash;</td>
					<td class="graph-col index-graph">
						<div class="index-graph-img-wrapper" id="weight-graph"></div>
					</td>
					<td class="reason-col index-reason">
						<div class="index-reason-wrapper">
							<a href="#" class="index-reason-a"  id="weight-reason">Причина</a>
						</div>
					</td>
				</tr>
			</table>
		</div>
		
		<?php if(!$user->is_logged_in()){
			$file = file_get_contents('./other_indexes.txt', FILE_USE_INCLUDE_PATH);
			echo $file;
			echo '<script>show_other_indexes=true;</script>';
		} ?>
	
	<!--#################################Footer#################################-->
		<div class="footer">
		<div class="contacts">
			<div class="social-media">
				<a class="social-OK" href="https://ok.ru/zdorovyebu"></a>
				<a class="social-VK" href="https://vk.com/public157016043"></a>
				<a class="social-FB" href="https://www.facebook.com/zdrav.rf/"></a>
				<a class="social-IG" href="https://www.instagram.com/zdrav.rf"></a>
			</div>
			<div class="phone">+7 495 131-32-73</div>
			<div class="OOO">2016-2018 ООО «Здравствую»</div>
		</div>

		<div class="zdrav-menu">
			<p>Здравствую</p>
			<ul>
				<li><a>О нас</a></li>
				<li><a>FAQ</a></li>
				<li><a>Отзывы о сервисе</a></li>
				<li><a>Партнерская программа</a></li>
				<li><a>Команда</a></li>
				<li><a>Контакты</a></li>
			</ul>
		</div>

		<div class="documents">
			<p>Документы</p>
			<ul>
				<li><a href="mission.php">Миссия, цель, ценности</a></li>
				<li><a href="agreement.php">Правила использования</a></li>
				<li><a href="personal_data_agreement.php">Обработка персональных данных</a></li>
			</ul>
		</div>
	</div>

	</div>
	
	
	
	<!--#################################Modal#################################-->
		<div id="health-modal">
			<div id="health-numbers-content">
				<div class="modal-window-body sm-body">
					<div class="modal-header" id="health_header">
						<span class="close" id="add-close">&times;</span>
						<div class="modal-title">Добавить</div>
					</div>
					<form id="code-form" class="modal-form">
						<div class="input-date">
							<p class="modal-label">Дата</p>
							<input type="date" class="modal-input" id="date">
						</div>
						<div class="modal-input-value">
							<p class="modal-label">Значение</p>
							<input type="text" class="modal-input" id="modal-index-value">
						</div>
						<a type="button" class="modal-btn" id="add-btn" >Добавить</a>
					</form>
				</div>
			</div>
		</div>
	<!--#################################Reason Modal#################################-->
	<div class="modal-window" id="reason-modal">
			<div class="modal-window-content" id="reason-modal-content">
				<div class="modal-window-body">
				
					<div class="modal-header sm-body" id="reason_header">
						<span class="close" id="reason-close">&times;</span>
						<div class="modal-title">Причины</div>
					</div>
					
					<div id="reason-container">
						<p id="index-norm"></p>
						<p id="my-index-value"></p>
						<p id="index-description"></p>

						<div id="possible-reasons-wrapper">
						</div>
						<p id="acticle-ref">
						<a id="acticle" href="#"></a></p>
						<div id="modal-recommendations">
							<p id="recommendations-p"></p>
						</div>
					</div>
				</div>
			</div>
		</div>
		
</body>
</html>
