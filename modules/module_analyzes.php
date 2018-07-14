<div class="req_analyzes threeb">
    <div class="analyzes-content">
	<div class="icon_analyzes icon_rec"></div>

	<p class="text1"><strong>Рекомендуем сдать следующие комплексы анализов</strong></p>

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
                include("rec_analyses.php");

                if($an_gastro) {
				    echo '<li>Гастрокомплекс<a class="help-reverse" href=""';
                    echo 'onclick="return false">Подробнее</a></li>';
                }
                if($an_diabetes) {
				    echo '<li>Диагностика диабета, биохимический<a class="help-reverse" ';
                    echo 'href="" onclick="return false">Подробнее</a></li>';
                }
                if($an_cardio) {
				    echo '<li>Кардиологический<a class="help-reverse" href="" ';
                    echo 'onclick="return false">Подробнее</a></li>';
                }
                if($an_onco_m){
				    echo '<li>Онкологический для мужчин, биохимический<a class="help-';
                    echo 'reverse" href="" onclick="return false">Подробнее</a></li>';
                }
                if($an_onco_f){
				    echo '<li>Онкологический для женщин, биохимический<a class="help-';
                    echo 'reverse" href="" onclick="return false">Подробнее</a></li>';
                }
                if($an_vessels){
				    echo '<li>Диагностика сосудистых заболеваний головного мозга<a ';
                    echo 'class="help-reverse" href="" onclick="return false">Подробнее</a></li>';
                }
                if($an_hormones_m){
				    echo '<li>Гормональный профиль (комплекс) для мужчин<a class="help-';
                    echo 'reverse" href="" onclick="return false">Подробнее</a></li>';
                }
                if($an_hormones_f){
				    echo '<li>Гормональный профиль (комплекс) для женщин<a class="help-';
                    echo 'reverse" href="" onclick="return false">Подробнее</a></li>';
                }
                if($an_vitamins){
				    echo '<li>Комплексный анализ крови на витамины (A, D, E, K, C, B1, B5, ';
                    echo 'B6, В9, B12)<a class="help-reverse" href="" onclick="return ';
                    echo 'false">Подробнее</a></li>';
                }
                ?>
			</ul>
		</div>
    </div>
	<a class="rec-button-analyzes" href="" onclick="return false">Перейти</a>
	<p class="text2">В нашем сервисе есть возможность заказать рекомендованные анализы с <br> бесплатным выездом сестры на дом или в офис и с бесплатной их расшифровкой</p>
    
	<div class="plus_life_analyzes help">+ 2 года жизни</div>

    </div>
</div>