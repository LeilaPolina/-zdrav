<div class="mass_index threeb">
	<div class="icon_mass-index icon_rec"></div>

	<div class="rec-text">Индекс массы вашего тела составляет <?php echo round($index_mass, 0); ?> при норме 20-25, что соответствует <?php echo $txt_index_mass; ?>.
	 Ваш оптимальный вес <?php if($user->is_logged_in()) {
		 							echo (round(pow($general_data_row['user_height']/100, 2)*20 , 0, PHP_ROUND_HALF_DOWN) . "-" . round(pow($general_data_row['user_height']/100, 2)*24 , 0, PHP_ROUND_HALF_DOWN));
	 							} else {
									echo (round(pow($_SESSION['result_test']['height']/100, 2)*20 , 0, PHP_ROUND_HALF_DOWN) . "-" . round(pow($_SESSION['result_test']['height']/100, 2)*24 , 0, PHP_ROUND_HALF_DOWN));
								} ?> кг</div>
	<p class="rec-text">Рекомендуем воспользоваться одной из наших программ по контролю за весом</p>
	
	<?php
		if($lifetime_index_mass != 0) {
			echo '<div class="plus_life help">+ ';
			echo (-(int)$lifetime_index_mass);
			echo ' года жизни</div>';
		}
	?>

	<a class="rec-button" href="" onclick="return false">Перейти</a>

</div>