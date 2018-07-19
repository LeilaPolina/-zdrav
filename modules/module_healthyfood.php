<div class="healthyfood threeb">

	<div class="icon_healthyfood icon_rec"></div>

	<div class="rec-text">Рекомендуем воспользоваться сервисом индивидуального <br> подбора здорового питания</div>
	<?php
	if($user->is_logged_in()) {
		/* todo */
	} else if($_SESSION['result_test']['count_food'] != "0") {
		echo '<div class="plus_life help">+ ';
		echo -(int)$_SESSION['result_test']['count_food']; 
		echo ' года жизни</div>';
	}
	?> 

	<a class="rec-button" href="services.php#food">Перейти</a>

</div>