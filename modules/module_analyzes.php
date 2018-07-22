<?php include("rec_analyses.php"); ?>
<div class="req_analyzes threeb">
    <div class="module-content">
	<div class="icon_analyzes icon_rec"></div>

	<p class="text1"><strong>Рекомендуем сдать следующие комплексы анализов и обследований</strong></p>

	<div class="result_analyzes">
		<div class="rec_min">
        <div class="analyzes-list-title">Анализы</div>
			<ul>
				<li>Общий анализ крови<a class="help-reverse" href="services.php#analyzes">Подробнее</a></li>
				<li>Биохимическй анализ крови<a class="blood-info btn-info help-reverse">Подробнее</a></li>
				<li>Общий анализ мочи<a class="pee-info btn-info help-reverse">Подробнее</a></li>
                <?php
                if($an_gastro) {
				    echo '<li>Гастрокомплекс<a class="gastro-info btn-info help-reverse">';
                    echo 'Подробнее</a></li>';
                }
                if($an_diabetes) {
				    echo '<li>Диагностика диабета, биохимический<a class="diabetes-info btn-info help-reverse">';
                    echo 'Подробнее</a></li>';
                }
                if($an_cardio) {
				    echo '<li>Кардиологический<a class="cardio-info btn-info help-reverse">';
                    echo 'Подробнее</a></li>';
                }
                if($an_onco_m){
				    echo '<li>Онкологический для мужчин, биохимический<a class="onco-m-info btn-info help-';
                    echo 'reverse">Подробнее</a></li>';
                }
                if($an_onco_f){
				    echo '<li>Онкологический для женщин, биохимический<a class="onco-f-info btn-info help-';
                    echo 'reverse">Подробнее</a></li>';
                }
                if($an_vessels){
				    echo '<li>Диагностика сосудистых заболеваний головного мозга<a ';
                    echo 'class="vessels-info btn-info help-reverse">Подробнее</a></li>';
                }
                if($an_hormones_m){
				    echo '<li>Гормональный профиль (комплекс) для мужчин<a class="hormones-m-info btn-info help-';
                    echo 'reverse" href="services.php#analyzes">Подробнее</a></li>';
                }
                if($an_hormones_f){
				    echo '<li>Гормональный профиль (комплекс) для женщин<a class="hormones-f-info btn-info help-';
                    echo 'reverse">Подробнее</a></li>';
                }
                if($an_vitamins){
				    echo '<li>Комплексный анализ крови на витамины (A, D, E, K, C, B1, B5, ';
                    echo 'B6, В9, B12)<a class="vitamins-info btn-info help-reverse">';
                    echo 'Подробнее</a></li>';
                }
                ?>
            </ul>
            </div>
            <a class="rec-button-new" href="services.php#analyzes">Перейти</a>

            <div class="checkup-list">
            <div class="analyzes-list-title">Обследования</div>
            <ul>
                <li>Измерение давления<a class="help-reverse" href="services.php#home-checkup">Подробнее</a></li>
                <li>ЭКГ<a class="help-reverse" href="services.php#home-checkup">Подробнее</a></li>
                <li>УЗИ брюшной полости<a class="help-reverse" href="services.php#home-checkup">Подробнее</a></li>
                <li>УЗИ мочевого органа и мочеточников<a class="help-reverse" href="services.php#home-checkup">Подробнее</a></li>
                <?php
                    if($ch_uzi_liver) {
                        echo '<li>УЗИ печени и желчного органа';
                        echo '<a class="help-reverse" href="services.php#home-checkup">Подробнее</a></li>';
                    }
                    if($ch_uzi_mammary) {
                        echo '<li>УЗИ молочных желез';
                        echo '<a class="help-reverse" href="services.php#home-checkup">Подробнее</a></li>';
                    }
                    if($ch_uzi_vessels) {
                        echo '<li>УЗИ сосудов нижних конечностей (вены + артерии)';
                        echo '<a class="help-reverse" href="services.php#home-checkup">Подробнее</a></li>';
                    }
                    if($ch_uzi_heart) {
                        echo '<li>УЗИ сердца';
                        echo '<a class="help-reverse" href="services.php#home-checkup">Подробнее</a></li>';
                    }
                    if($ch_xray_lungs) {
                        echo '<li>Рентген легких';
                        echo '<a class="help-reverse" href="services.php#home-checkup">Подробнее</a></li>';
                    }
                ?>
            </ul>
            </div>
            <a class="rec-button-new" href="services.php#home-checkup">Перейти</a>
		</div>
    
	
	<p class="text2">В нашем сервисе есть возможность заказать рекомендованные анализы с <br> бесплатным выездом сестры на дом или в офис и с бесплатной их расшифровкой</p>
    <div class="plus_life_analyzes help">+ 2 года жизни</div>
    </div>
</div>