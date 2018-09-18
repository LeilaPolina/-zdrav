<?php include_once('includes/config.php'); ?>

<!DOCTYPE html>
<html>
<head>
	<title>Мое здоровье в цифрах</title>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/test.css" />
	<link rel="stylesheet" type="text/css" href="css/health.css" />
	<link rel="stylesheet" type="text/css" href="css/common.css" />
	<link rel="stylesheet" type="text/css" href="css/registration_login_windows.css" />
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<!--DEMO Zdrav Test Styles-->
	<link rel="stylesheet" type="text/css" href="css/demo.css" />
	<link rel="stylesheet" type="text/css" href="css/docs.css" />
	<link rel="stylesheet" type="text/css" href="css/mobile_health.css">
	
	<!--SCRIPTS-->
    <script src="jquery/jquery-3.1.1.min.js"></script>
	<script src="scripts/plotly-latest.min.js"></script>
	<script src="scripts/errors.js"></script>
	<script src="scripts/init_indexes.js"></script>
	<script src="scripts/demo_indexes.js"></script>
	<script src="scripts/diseases.js"></script>
    <script src="scripts/health.js"></script>
	<script src="scripts/reason_models.js"></script>
	<script src="jquery/jquery.maskedinput.min.js"></script>
	<script src="scripts/signout.js"></script>
	<script src="scripts/demo.js"></script>
	<script src="scripts/header.js"></script>

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

	<?php
	include 'header.php';
	?>

	<!--#################################Main#################################-->
	<div class="main">
		<div class="lk health-in-numbers-wrapper">			
			<!-- DEMO PART -->
			<?php 
				if(!$user->is_logged_in()){
					echo '<div class="demo-div">';
					echo '<h2 class="pagename">Демонстрационный режим</h2>';                    
                    echo '<h1 class="pagename">Мое здоровье в цифрах</h1>';
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
					echo '<h2 class="pagename">Личный кабинет</h2>';                    
                    echo '<h1 class="pagename">Мое здоровье в цифрах</h1>';
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
				<p>Показатели<p/>
			</div>
			<div id="add-user-index-wrapper">
			<input class="add" id="add-user-index-btn" type="submit" value="+ Добавить свой показатель">
			</div>
		</div>		
		<div class="table-wrapper">
			<table class="main-indexes">
				<thead >
					<tr class="indexes-head">
						<th class="border-col"></th>
						<th class="index-col">Показатель</th>
						<th class="date-col">Дата</th>
						<th class="value-col">Значение</th>
						<th class="btn-col"></th>
						<th class="estimation-col">Оценка</th>
						<th class="graph-col">График</th>
						<th class="reason-col">Причина</th>
					</tr>
				</thead >
				<!--#################################Сholesterol#################################-->
				<tr class="indexes-row">
					<td class="border-col" id="cholesterol-brd"></td>
					<td class="index-col index-name" id="cholesterol-index">Холестерин общий, мм/л</td>
					<td class="date-col index-date" id="cholesterol-date">&mdash;</td>
					<td class="value-col index-value">
						<span  class="index-span" id="cholesterol-span">&mdash;</span>
					</td>
					<td class="btn-col">
						<a type="button" class="pl-btn" id="cholesterol-btn" href="#">+</a>
					</td>
					<td class="estimation-col index-estimation" id="cholesterol-estm">&mdash;</td>
					<td class="graph-col index-graph">
						<div class="index-graph-img-wrapper graph" id="cholesterol-graph"></div>
					</td>
					<td class="reason-col index-reason">
						<div class="index-reason-wrapper">
							<a href="#" class="index-reason-a" id="cholesterol-reason"></a>
						</div>
					</td>
				</tr>
				<!--#################################Glucose#################################-->
				<tr class="indexes-row">
					<td class="border-col" id="glucose-brd" ></td>
					<td class="index-col index-name" id="glucose-index">Сахар, мм/л</td>
					<td class="date-col index-date" id="glucose-date">&mdash;</td>
					<td class="value-col index-value">
						<span class="index-span" id="glucose-span">&mdash;</span>
					</td>
					<td class="btn-col">
						<a type="button" class="pl-btn" id="glucose-btn" href="#">+</a>
					</td>
					<td class="estimation-col index-estimation" id="glucose-estm">&mdash;</td>
					<td class="graph-col index-graph">
						<div class="index-graph-img-wrapper graph" id="glucose-graph"></div>
					</td>
					<td class="reason-col index-reason">
						<div class="index-reason-wrapper">
							<a href="#" class="index-reason-a" id="glucose-reason"></a>
						</div>
					</td>
				</tr>
				<!--#################################Blood pressure#################################-->
				<tr class="indexes-row">
					<td class="border-col" id="blood-pressure-brd"></td>
					<td class="index-col index-name" id="pressure-index">Давление</td>
					<td class="date-col index-date" id="blood-pressure-date">&mdash;</td>
					<td class="value-col index-value">
						
						<div class="blood-spans-wrapper">
							<span id="blood-pressure-1" class="blood-pressure-span">&mdash;</span>
							<span class="blood-pressure-span"> на</span>
							<span id="blood-pressure-2" class="blood-pressure-span">&mdash;</span>
						</div>
					</td>
					<td class="btn-col">
						<a type="button" class="pl-btn" id="pressure-btn" href="#">+</a>
					</td>
					<td class="estimation-col index-estimation" id="blood-pressure-estm">&mdash;</td>
					<td class="graph-col index-graph">
						<div class="index-graph-img-wrapper graph" id="pressure-graph"></div>
					</td>
					<td class="reason-col index-reason">
						<div class="index-reason-wrapper">
							<a href="#" class="index-reason-a"  id="blood-reason"></a>
						</div>
					</td>
				</tr>
				<!--#################################Weight#################################-->
				<tr class="indexes-row">
					<td class="border-col" id="weight-brd"></td>
					<td class="index-col index-name" id="weight-index">Вес, кг</td>
					<td class="date-col index-date" id="weight-date">&mdash;</td>
					<td class="value-col index-value">
						<span class="index-span" id="weight-span">&mdash;</span>
					</td>
					<td class="btn-col">
						<a type="button" class="pl-btn" id="weight-btn" href="#">+</a>
					</td>
					<td class="estimation-col index-estimation" id="weight-estm">&mdash;</td>
					<td class="graph-col index-graph">
						<div class="index-graph-img-wrapper graph" id="weight-graph"></div>
					</td>
					<td class="reason-col index-reason">
						<div class="index-reason-wrapper">
							<a href="#" class="index-reason-a"  id="weight-reason"></a>
						</div>
					</td>
				</tr>
				<?php if(!$user->is_logged_in()){
					$file = file_get_contents('./other_indexes.txt', FILE_USE_INCLUDE_PATH);
					echo $file;
					echo '<script>show_other_indexes=true;</script>';
			} ?>
			</table>
		</div>
	
	<!--#################################Footer#################################-->		
	<?php
		include("footer.php");
	?>

	</div>
	<!--#################################Modal#################################-->
	<div>
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
						<div class="modal-title">Возможные причины отклонения от нормы</div>
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
		
	<!--#################################Modal Window For Graph#################################-->
	<div class="modal-window" id="graph-modal">
			<div class="modal-window-content"  id="graph-modal-content">
				<div class="modal-window-body">
					<div class="modal-header sm-body" id="reason_header">
						<span class="close" id="graph-close">&times;</span>
						<div class="modal-title" id="graph-modal-title"></div>
					</div>
					<div id="graph-table-wrapper">
						<table id="graph-table">
						</table>
					</div>
					<div id="graph-main">
						<div id="graph-modal-body-wrapper">
							<div id="graph-modal-body"></div>
						</div>

					<!--	<div id="img-labels-container"> 
							<div class="label-img-wrapper" id="upper_border_label">
								<img src="images/icons/upper_norm.png"/>Верхняя граница
							</div>
							<div class="label-img-wrapper" id="lower_border_label">
								<img src="images/icons/lower_norm.png"/> Нижняя граница</br>
							</div>
							<div class="label-img-wrapper" id="lower_blood_upper_border_label">
								<img src="images/icons/lower_blood_upper.png"/>Верхняя граница (ниж.давл)
							</div>
							<div class="label-img-wrapper" id="lower_blood_lower_border_label">
								<img src="images/icons/lower_blood_lower.png"/> Нижняя граница (ниж.давл)</br>
							</div>
						</div>-->

						<div class="input-date" id="graph-input-wrapper">
							с <input type="date" class="modal-input" id="graph-date-1"  disabled>
							по <input type="date" class="modal-input" id="graph-date-2"  disabled>
							<div id="show-forecast-wrapper">
								<input type="checkbox" id="show-all" />
								<label class="graph-label" for="show-all">Все</label>
								<input type="checkbox" id="show-forecast" />
								<label class="graph-label" for="show-forecast">Показать прогноз</label>
								<a type="button" class="modal-btn" id="show-btn" disabled>Показать</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>


		<div class="modal-window" id="add-user-index-modal">
			<div class="modal-window-content" id="add-user-index-content">
				<div class="modal-window-body">
					<div class="modal-header sm-body"">
						<span class="close" id="add-user-index-close">&times;</span>
						<div class="modal-title"></div>
					</div>
					<label for="input-user-index">Название показателя</label><br>
					<input type="text"id="input-user-index" class="input-user-index-values"><br>
					<label for="input-user-index-value">Единица измерения</label><br>
					<input type="text" id="input-user-index-value" class="input-user-index-values"><br>
					<label for="input-user-index-upperborder">Верхняя граница (не обязательно)</label><br>
					<input type="text" id="input-user-index-upperborder" class="input-user-index-values"><br>
					<label for="input-user-index-lowerborder">Нижняя граница (не обязательно)</label><br>
					<input type="text" id="input-user-index-lowerborder" class="input-user-index-values"><br>
					<input class="add" id="add-user-index" type="submit" value="+ Добавить свой показатель" onClick=false>
				</div>
			</div>
		</div>
		
</body>
</html>
