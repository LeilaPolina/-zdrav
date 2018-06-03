<div class="mass_index threeb">

	<div class="icon_mass-index icon_rec"></div>

	<div>Индекс массы вашего тела составляет <?php echo round($index_mass,0); ?> при норме 20-25, что <br> соответствует <?php echo $txt_index_mass; ?>. Ваш оптимальный вес <?php echo round(pow($result_test['height']/100, 2)*20 , 0, PHP_ROUND_HALF_DOWN); ?>-<?php echo round(pow($result_test['height']/100, 2)*24 , 0, PHP_ROUND_HALF_DOWN); ?> кг</div>
	<p>Рекомендуем воспользоваться одной из наших программ по контролю за весом</p>
	<div class="plus_life help">+ <?php echo -(int)$lifetime_index_mass ?> года жизни</div>

	<a class="rec-button" href="" onclick="return false">Перейти</a>

</div>