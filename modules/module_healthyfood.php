<div class="threeb">
	<div class="rec-wrapper">
	<div class="rec-icon-container">
		<div class="icon-healthyfood"></div>
	</div>
	<div class="rec-container">
		<div class="rec-text-container">
			<div class="rec-text">Рекомендуем воспользоваться сервисом индивидуального подбора здорового питания</div>
		</div>
		<div class="rec-button-container">
			<a class="rec-button" href="services.php#food">Перейти</a>
		</div>
		<?php
		if($user_data_arr['count_food'] != "0") {
			echo '<div class="plus-life">+ ';
			echo -(int)$user_data_arr['count_food']; 
			echo ' года жизни ';
			echo '<div class="questionmark">';
			echo '<span class="tooltip-content">По статистическим данным Всемирной организации
			здравоохранения, болезни связанные с не здоровым питанием уменьшают жизнь в
			среднем на 2 года</span>';
			echo '</div></div>';
		}
		?> 
		</div>
	</div>
</div>