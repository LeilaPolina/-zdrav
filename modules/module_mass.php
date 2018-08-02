<div class="mass_index threeb">
	<div class="rec-wrapper">
	<div class="rec-icon-container">
		<div class="icon-mass-index"></div>
	</div>
	<div class="rec-container">
		<div class="rec-text-container">
			<div class="rec-text">Индекс массы вашего тела составляет <?php echo round($index_mass, 0); ?> при норме 20-25, что соответствует <?php echo $txt_index_mass; ?>.
	 		Ваш оптимальный вес <?php
	 			echo (round(pow($user_data_arr['height']/100, 2)*20 , 0, PHP_ROUND_HALF_DOWN) . "-" . round(pow($user_data_arr['height']/100, 2)*24 , 0, PHP_ROUND_HALF_DOWN));
			?> кг. Рекомендуем воспользоваться одной из наших программ по контролю за весом</div>
		</div>
		<div class="rec-button-container">
			<a class="rec-button" href="services.php#weight">Перейти</a>
		</div>
	<?php
		if($lifetime_index_mass != 0) {
			echo '<div class="plus-life">+ ';
			echo (-(int)$lifetime_index_mass);
			echo ' года жизни ';
			echo '<div class="questionmark">';
			echo '<span class="tooltip-content">По статистическим данным Всемирной организации здравоохранения, болезни
			связанные с избыточным весом уменьшают жизнь в среднем на 3 года</span>';
			echo '</div></div>';
		}
	?>
	</div>
	</div>
</div>