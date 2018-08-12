<?php
        $rec_to_buy = array("умные весы");

        if($user_data_arr['module_tester']) {
            array_push($rec_to_buy, "домашний тестер холестерина");
        }

		if($user_data_arr['smart_watch']) {
            array_push($rec_to_buy, "фитнес браслет");
		}

		if(in_array("Сахарный диабет", $user_data_arr['risks'])) {
            array_push($rec_to_buy, "глюкометр");
        }
        
        if ($user_data_arr['healthyheart'] || $user_data_arr['job'] == "Физически тяжелая") {
            array_push($rec_to_buy, "ЭКГ монитор");
		}
		
		if($user_data_arr['healthyheart'] || $user_data_arr['job'] == "На ногах") {
            array_push($rec_to_buy, "домашний тонометр");
		}
?>

<div class="threeb">
	<div class="rec-wrapper">
	<div class="rec-icon-container">
		<img class="rec-icon-default" src="images/icons/store_menu_icon.png">
	</div>
	<div class="rec-container">
		<div class="rec-text-container">
			<div class="rec-text">
                Рекомендуем приобрести: 
                <?php 
                    $count = 0;
                    foreach($rec_to_buy as $item) {
                        if ($count != count($rec_to_buy) - 1) {
                            echo $item.", ";
                        } else {
                            echo $item.".";
                        }
                        $count++;
                    }
                ?>
				<div class="questionmark">
				<span class="tooltip-content">
					По статистическим данным Всемирной организации
					здравоохранения, люди использующие домашние профилактические приборы живут в
					среднем на 2 года дольше
				</span>
				</div>
			</div>
		</div>
		<div class="rec-button-container">
			<a class="rec-button" href="shop.php" target="_blank">Перейти</a>
		</div>
	</div>
	</div>
</div>