<?php include("rec_analyses.php"); ?>
<div class="req_analyzes threeb">
    <div class="analyzes-content">
	<div class="icon_analyzes icon_rec"></div>

	<p class="text1"><strong>Рекомендуем сдать следующие комплексы анализов и обследований</strong></p>

	<div class="result_analyzes">
		<div class="rec_min">
        <div class="analyzes-list-title">Анализы</div>
			<ul>
				<li>Общий анализ крови<a class="help-reverse" href="" onclick="return false">Подробнее</a></li>
				<li>Биохимическй анализ крови<a class="help-reverse" href="" onclick="return false">Подробнее</a></li>
				<li>Общий анализ мочи<a class="help-reverse" href="" onclick="return false">Подробнее</a></li>
                <?php
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
            <a class="rec-button-analyzes" href="" onclick="return false">Перейти</a>

            <div class="checkup-list">
            <div class="analyzes-list-title">Обследования</div>
            <ul>
                <li>Измерение давления<a class="help-reverse" href="" onclick="return false">Подробнее</a></li>
                <li>ЭКГ<a class="help-reverse" href="" onclick="return false">Подробнее</a></li>
                <li>УЗИ брюшной полости<a class="help-reverse" href="" onclick="return false">Подробнее</a></li>
                <li>УЗИ мочевого органа и мочеточников<a class="help-reverse" href="" onclick="return false">Подробнее</a></li>
                <?php
                    if($ch_uzi_liver) {
                        echo '<li>УЗИ печени и желчного органа';
                        echo '<a class="help-reverse" href="" onclick="return false">Подробнее</a></li>';
                    }
                    if($ch_uzi_mammary) {
                        echo '<li>УЗИ молочных желез';
                        echo '<a class="help-reverse" href="" onclick="return false">Подробнее</a></li>';
                    }
                    if($ch_uzi_vessels) {
                        echo '<li>УЗИ сосудов нижних конечностей (вены + артерии)';
                        echo '<a class="help-reverse" href="" onclick="return false">Подробнее</a></li>';
                    }
                    if($ch_uzi_heart) {
                        echo '<li>УЗИ сердца';
                        echo '<a class="help-reverse" href="" onclick="return false">Подробнее</a></li>';
                    }
                    if($ch_xray_lungs) {
                        echo '<li>Рентген легких';
                        echo '<a class="help-reverse" href="" onclick="return false">Подробнее</a></li>';
                    }
                ?>
            </ul>
            </div>
            <a class="rec-button-analyzes" href="" onclick="return false">Перейти</a>
		</div>
    
	
	<p class="text2">В нашем сервисе есть возможность заказать рекомендованные анализы с <br> бесплатным выездом сестры на дом или в офис и с бесплатной их расшифровкой</p>
    
    <?php if ($user->is_logged_in()) {
        /* todo */
    } else if ($_SESSION['result_test']['homebodycheck'] == 1 && $_SESSION['result_test']['count_bodycheck'] != "0") {
        echo '<div class="plus_life_analyzes help">+ 4 года жизни</div>';
    } else {
        echo '<div class="plus_life_analyzes help">+ 2 года жизни</div>';
    }
    ?>
    </div>
</div>