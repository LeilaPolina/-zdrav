<div class="mass_index threeb">
	<div class="icon_mass-index icon_rec"></div>

	<div class="rec-text">Индекс массы вашего тела составляет <?php echo round($index_mass, 0); ?> при норме 20-25, что соответствует <?php echo $txt_index_mass; ?>.
	 Ваш оптимальный вес <?php
	 	echo (round(pow($user_data_arr['height']/100, 2)*20 , 0, PHP_ROUND_HALF_DOWN) . "-" . round(pow($user_data_arr['height']/100, 2)*24 , 0, PHP_ROUND_HALF_DOWN));
	?> кг</div>
	<p class="rec-text">Рекомендуем воспользоваться одной из наших программ по контролю за весом</p>
	
	<?php
		if($lifetime_index_mass != 0) {
			echo '<div class="plus_life help">+ ';
			echo (-(int)$lifetime_index_mass);
			echo ' года жизни</div>';
		}
	?>

	<a class="rec-button" href="services.php#weight">Перейти</a>

</div>