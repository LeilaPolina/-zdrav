<div class="homebodycheck threeb">

	<div class="icon_homebodycheck icon_rec"></div>

	<div class="rec-text">Рекомендуем пройти стандартный домашний медосмотр</div>
	<?php 
		if($user->is_logged_in()) {
			if ($general_data_row['count_bodycheck'] != "0") {
				echo ('<div class="plus_life help">+ ');
				echo $general_data_row['count_bodycheck'];
				echo (' года жизни</div>');
			}
		} else if($_SESSION['result_test']['count_bodycheck'] != "0") {
			echo ('<div class="plus_life help">+ ');
			echo -(int)$_SESSION['result_test']['count_bodycheck']; 
			echo (' года жизни</div>');
		}
	?> 
	

	<a class="rec-button" href="" onclick="return false">Перейти</a>

</div>