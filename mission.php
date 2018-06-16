<?php include_once('includes/config.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Миссия, цель, ценности</title>
    <link rel="stylesheet" href="css/test.css">
    <link rel="stylesheet" href="css/info.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <script src="jquery/jquery-3.1.1.min.js"></script>
    <script src="jquery/jquery.maskedinput.min.js"></script>

    <!-- EDITED -->
	<link rel="stylesheet" type="text/css" href="css/registration_login_windows.css" />
	<script src="scripts/registration.js"></script>
	<!-- FINISH -->
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans" />
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
	
</head>
<body>

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
			<a id="health-in-numbers" href="health.php" style="" onclick="return false"><p>Моё здоровье в цифрах</p></a>
			<a id="my-documents" href="docs.php" style=""><p>Мои документы</p></a>
			<a id="shop" href="shop.php" style=""><p>Магазин</p></a>
			<a id="services" href="" style="" onclick="return false"><p>Сервисы</p></a>
		</div>
	</div>
</div>

<div class="main">
    <div class="content">
		<div class="maintext">
        	<h1>Миссия, цель, ценности и культура ЗдравствуюРФ</h1>
        	<h2>Миссия</h2>
        	<p>Продление жизни и сохранение здоровья людей. Развитие культуры профилактики взамен реактивной культуры здоровья. Вовлечение в процесс профилактики максимально большого количества людей.</p><br>
			<h2>Цель</h2>
			<p>Стать ведущим интернет сервисом по предоставлению услуг профилактики здоровья.</p><br>
			<h2>Ценности</h2>
			<p>Мы полностью белая компания, работаем по законам. Интересы клиента важнее интересов компании. Мы не «разводим» клиентов на деньги, а помогаем им сохранить здоровье. Не предлагаем людям то что им не нужно.</p><br>
			<h2>Культура</h2>
			<p>Люди важнее процессов. Работа должна приносить радость и удовлетворение. Мы создаем максимально комфортную среду для работы и достижения результатов.</p>
		</div>
	</div>


    <hr>
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

</body>
</html>