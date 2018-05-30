<div class="req_analyzes threeb">

	<div class="icon_analyzes icon_rec"></div>

	<p class="text1">Рекомендуем сдать следующие комплексы анализов</p>

	<div class="result_analyzes">
		<div>По результатам теста вам рекомендуется сдать следующие анализы</div>
		<div>Рекомендуемый минимум</div>
		<div class="rec_min">
			<ul>
				<li>Общий анализ крови<a class="help-reverse" href="" onclick="return false">Подробнее</a></li>
				<li>Биохимическй анализ крови<a class="help-reverse" href="" onclick="return false">Подробнее</a></li>
				<li>Общий анализ мочи<a class="help-reverse" href="" onclick="return false">Подробнее</a></li>
			</ul>
		</div>
		<div>Индивидуальный набор</div>
		<div class="rec_individual">
			<ul>
                <?php
                if(strpos($result_test['dead'], "Желудочно-кишечные болезни")){
				    echo '<li>Гастрокомплекс<a class="help-reverse" href=""';
                    echo 'onclick="return false">Подробнее</a></li>';
                }
                if((strpos($result_test['dead'], "Сахарный диабет")) && (round(pow($result_test['height']/100, 2)*20)) > 25){
				    echo '<li>Диагностика диабета, биохимический<a class="help-reverse" ';
                    echo 'href="" onclick="return false">Подробнее</a></li>';
                }
                if(strpos($result_test['dead'], "Сахарный диабет")){
				    echo '<li>Кардиологический<a class="help-reverse" href="" ';
                    echo 'onclick="return false">Подробнее</a></li>';
                }
                if(strpos($result_test['dead'], "Рак") && ($result_test['sex'] == 'м')){
				    echo '<li>Онкологический для мужчин, биохимический<a class="help-';
                    echo 'reverse" href="" onclick="return false">Подробнее</a></li>';
                }
                if(strpos($result_test['dead'], "Рак") && ($result_test['sex'] == 'ж')){
				    echo '<li>Онкологический для женщин, биохимический<a class="help-';
                    echo 'reverse" href="" onclick="return false">Подробнее</a></li>';
                }
                if(strpos($result_test['dead'], "Инсульт")){
				    echo '<li>Диагностика сосудистых заболеваний головного мозга<a ';
                    echo 'class="help-reverse" href="" onclick="return false">Подробнее</a></li>';
                }
                if((2018 - $result_test['year_birth'] > 40) && ($result_test['sex'] == 'м')){
				    echo '<li>Гормональный профиль (комплекс) для мужчин<a class="help-';
                    echo 'reverse" href="" onclick="return false">Подробнее</a></li>';
                }
                if((2018 - $result_test['year_birth'] > 40) && ($result_test['sex'] == 'ж')){
				    echo '<li>Гормональный профиль (комплекс) для женщин<a class="help-';
                    echo 'reverse" href="" onclick="return false">Подробнее</a></li>';
                }
                if(($result_test['cold'] == "Больше 2-х раз в год")){
				    echo '<li>Комплексный анализ крови на витамины (A, D, E, K, C, B1, B5, ';
                    echo 'B6, В9, B12)<a class="help-reverse" href="" onclick="return ';
                    echo 'false">Подробнее</a></li>';
                }
                ?>
			</ul>
		</div>
	</div>
	<p class="text2">В нашем сервисе есть возможностьзаказать рекомендованные анализы с <br> бесплатным выездом сестры на дом или в офис и с бесплатной их расшифровкой</p>
    
	<div class="plus_life_analyzes help">+ 2 года жизни</div>

	<a class="rec-button-analyzes" href="" onclick="return false">Перейти</a>

</div>