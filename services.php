<?php include_once('includes/config.php'); ?>
<?php

    function getIndexMass ($weight, $height, $db) {
		$weight = (int) $weight;
		$height = (int) $height;
		if ($height == 0) {
			$height = 1;
		}
		return round($weight / pow($height/100, 2), 2);
    }
    
    function getUserData ($user, $db) {
        $user_data_query = $db->prepare('SELECT user_height, user_weight, user_sex FROM user_data WHERE user_data_user_id = :user_id');
        $user_data_query->execute(array(':user_id' => $_SESSION['user_id']));
        return $user_data_query->fetch(PDO::FETCH_ASSOC);
    }

    if ($user->is_logged_in()) {
        $user_data_row = getUserData ($user, $db);

        $user_weight = $user_data_row['user_weight'];
        $user_height = $user_data_row['user_height'];
        $user_sex = $user_data_row['user_sex'];
        $index_mass = getIndexMass ($user_weight, $user_height, $db);
    } else {
        $user_weight = $_SESSION['result_test']['weight'];
        $user_height = $_SESSION['result_test']['height'];
        $user_sex = $_SESSION['result_test']['sex'];
        $index_mass = getIndexMass ($user_weight, $user_height, $db);
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Сервисы</title>
    <link rel="stylesheet" href="css/test.css" />
    <link rel="stylesheet" href="css/services.css" />
    <link rel="stylesheet" href="css/services_windows.css" />
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/demo_btn.css" />
    <script src="jquery/jquery-3.1.1.min.js"></script>
    <script src="jquery/jquery.maskedinput.min.js"></script>
    <script src="scripts/demo.js"></script>
    <script src="scripts/services_modal_texts.js"></script>
    <script src="scripts/services.js"></script>
    <script src="scripts/accordions.js"></script>

	<!-- FINISH -->
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans" />
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
	
    <script src="scripts/signout.js"></script>
    
    <!-- Yandex.Metrika counter --> 
    <script type="text/javascript">
        (function (d, w, c) { 
            (w[c] = w[c] || []).push(function() { 
                try { w.yaCounter40933314 = new Ya.Metrika({
                    id:40933314, clickmap:true, trackLinks:true, accurateTrackBounce:true, webvisor:true 
                    }); } catch(e) { } 
        }); 
        var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { 
            n.parentNode.insertBefore(s, n); 
        }; 
        s.type = "text/javascript"; 
        s.async = true; 
        s.src = "https://mc.yandex.ru/metrika/watch.js"; 
        if (w.opera == "[object Opera]") { 
            d.addEventListener("DOMContentLoaded", f, false); 
        } 
        else { f(); } 
    })(document, window, "yandex_metrika_callbacks");
    </script> 
    <noscript><div><img src="https://mc.yandex.ru/watch/40933314" style="position:absolute; left:-9999px;" alt="" /></div></noscript> 
    <!-- /Yandex.Metrika counter -->   

    <!-- Rating@Mail.ru counter -->
    <script type="text/javascript">
    var _tmr = window._tmr || (window._tmr = []);
    _tmr.push({id: "2885114", type: "pageView", start: (new Date()).getTime()});
    (function (d, w, id) {
        if (d.getElementById(id)) return;
        var ts = d.createElement("script"); ts.type = "text/javascript"; ts.async = true; ts.id = id;
        ts.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//top-fwz1.mail.ru/js/code.js";
        var f = function () {var s = d.getElementsByTagName("script")[0]; s.parentNode.insertBefore(ts, s);};
        if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); }
    })(document, window, "topmailru-code");
    </script><noscript><div>
    <img src="//top-fwz1.mail.ru/counter?id=2885114;js=na" style="border:0;position:absolute;left:-9999px;" alt="" />
    </div></noscript>
    <!-- //Rating@Mail.ru counter -->
    
    <!-- Google analytics -->
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-96242372-1', 'auto');
        ga('send', 'pageview');
    </script>
    <!-- /Google analytics -->


</head>
<body>
    <div class="header-menu">
        <div class="wrapper">
            <div class="menu-logo"></div>
            <div class="menu-nav">
            <?php 
                    if($user->is_logged_in()){
                        echo '<a id="general-inf" href="general_data.php" style=""><p>Общие сведения</p></a>';
                    }
                    else{
                        echo '<a id="general-inf" href="test.php" style=""><p>Общие сведения</p></a>';
                    }
                ?>
                <a id="health-in-numbers" href="health.php" style=""><p>Моё здоровье в цифрах</p></a>
                <a id="my-documents" href="docs.php" style=""><p>Мои документы</p></a>
                <a id="shop" href="shop.php" style=""><p>Магазин</p></a>
                <a id="services" href="services.php" style="" onclick=""><p>Сервисы</p></a>
				<?php 
                    if($user->is_logged_in()){
                        echo '<a id="sign-out-lk" href="#" style=""><p>Выход</p></a>';
                    }
                ?>
            </div>
        </div>
    </div>
    <div class="main">

        <!-- DEMO PART -->
        <?php 
            if(!$user->is_logged_in()){
                echo '<div class="demo-div">';
                echo '<h2 class="pagename">Демонстрационный режим</h2>';                    
                echo '<h1 class="pagename">Сервисы</h1>'; 
                echo '<br/>';
                echo '<ul class="demo-ul">';
                    echo '<li><p>Данный сервис предоставлен в демонстрационном режиме<p></li>';
                    echo '<li><p>Для полноценной работы необходимо создать Личный кабинет<p></li>';
                echo '</ul>';
                echo '<br/>';
                echo '<button class="demo-btn button-center" id="go-to-result-test-save" href="">Создать личный кабинет</button>';
                echo '</div>';
            }
            else{					
                echo '<h2 class="pagename">Личный кабинет</h2>';
                echo '<h1 class="pagename">Сервисы</h1>';
            }
        ?>
        <!-- /DEMO PART -->
        
        <div class="services-menu">
            <div id="weight" class="accordion">
                <p>
                    <span class="accordions-left">Контроль веса</span>
                    <span class="accordions-right">Открыть</span>
                </p>
            </div>
            <div class="panel">
                <div class="service-content">
                    <img class="img-center" src="images/video_cap.PNG">
                    <h1>Программы по контролю за весом</h1>
                    <form name="weight-inf">
                    <div id="weight-numbers">
                        <div class="weight-form-column">
                            <p>Текущий вес, кг</p>
                            <input type="text" id="current-weight" name="current-weight" value="<?php echo $user_weight ?>"></input>
                        </div>
                        <div class="weight-form-column">
                            <p>Индекс массы</p>
                            <h1 id="mass-index"><?php echo ("= " . $index_mass); ?></h1>
                        </div>
                        <div class="weight-form-column">
                            <p>Оптимальный вес</p>
                            <h1 id="optimal-weight"><?php echo round(pow($user_height/100, 2)*20 , 0, PHP_ROUND_HALF_DOWN); ?>-<?php echo round(pow($user_height/100, 2)*24 , 0, PHP_ROUND_HALF_DOWN); ?> кг</h1>
                        </div>
                        <div class="weight-form-column">
                            <img src="images/icons/fast_forward_arrows.svg">
                        </div>
                        <div class="weight-form-column">
                            <p>Желаемый вес</p>
                            <input type="text" id="desired-weight" name="desired-weight"></input>
                        </div>
                    </div>
                    <h1>Консультация с диетологом</h1>
                    <div class="contact">
                        <div class="contact-column-left">
                            <label class="container-radio">
                                <input type="radio" name="contact" value="video">
                                <span class="checkmark-radio"></span>
                                <span>Видеоконсультация</span>
                            </label><br>
                                      
                            <label class="container-radio">
                                <input type="radio" name="contact" value="chat">
                                <span class="checkmark-radio"></span>
                                <span>Чат</span>
                            </label><br>
                                      
                            <label class="container-radio">
                                <input type="radio" name="contact" value="phone" checked="checked">
                                <span class="checkmark-radio"></span>
                                <span>Телефон</span>
                            </label>
                        </div>
                        <div class="contact-column-right">
                            <p><i class="fa fa-info-circle"></i> Перед консультацией специалист ознакомится с показателями вашего здоровья введенными в программу, результатами анализов и обследований.</p>
                            <p>Эта информация позволит составить наиболее подходящую для вас систему питания.</p>
                        </div>
                        <?php
                            if($user->is_logged_in()) {
                                echo '<button type="submit">Заказать</button>';
                            } else {
                                echo '<p>Чтобы воспользоваться данным сервисом, необходимо <a href="test.php#register">создать личный кабинет.</a></p>';
                            }
                        ?>
                        
                        </form>
                    </div>
                </div>
            </div>
            <div id="food" class="accordion">
                    <p>
                        <span class="accordions-left">Здоровое питание</span>
                        <span class="accordions-right">Открыть</span>
                    </p>
            </div>
            <div class="panel">
                <div class="service-content">
                    <p>
                        Вы можете воспользоваться сервисом Дневник питания и тренировок совершенно
                        бесплатно. Для этого необходимо пройти по ссылке, пройти дополнительную
                        регистрацию и ознакомиться с 5-ю шагами к контролю над весом.
                    </p>
                    <img src="images/banners/five_steps.png">
                    <img class="img-center" src="images/banners/dnevnik.png">
                    <?php
                    if($user->is_logged_in()) {
                        echo '<button class="button-center" onclick="window.open(\'https://здравствую.рф/tvoy_dnevnik.php#/\',\'_blank\');">Начать</button>';
                    } else {
                        echo '<p>Чтобы воспользоваться данным сервисом, необходимо <a href="test.php#register">создать личный кабинет.</a></p><br>';
                    }
                    ?>
                    <img class="img-center" src="images/banners/healthy_food_1.png">
                    <img class="img-center" src="images/banners/healthy_food_2.png"><br>
                    <button class="button-center" onclick="window.open('https://www.justfood.pro/','_blank');">Подробнее</button>
                </div>
            </div>
            <div id="smoking" class="accordion">
                    <p>
                        <span class="accordions-left">Отказ от курения</span>
                        <span class="accordions-right">Открыть</span>
                    </p>
            </div>
            <div class="panel">
                <div class="service-content">
                    <h1 class="service-title">Полный отказ от курения за 21 день</h1>
                    <h2 class="service-title">Если вы хотите бросить курить, предлагаем пройти интерактивный он-лайн тест</h2>
                    <img class="img-center" src="images/banners/prostye_pravila_landing.png">
                    <button class="button-center" onclick="window.open('http://простыеправила.рф/no-smoking/?gcpc=8b7f1','_blank');">Начать</button>
                    <h1>О программе «Полный отказ от курения за 21 день»</h1>
                    <p>В основе курса борьба с причинами курения, преодоление физической и психологической зависимостей, а также замещение курения привычками, необходимыми для полноценной жизни.</p>
                    <p class="text-bold">В программе курса:</p>
                    <p>факты о курении, эффективные приемы и практические задания, следуя которым, Вы полностью освободите себя от зависимости.</p>
                    <p>24 часа в сутки 7 дней в неделю работает онлайн-поддержка, которая поможет в трудные моменты отвыкания от курения, а также ответит на любой волнующий вопрос.</p>
                    <p class="text-bold">План прохождения курса:</p>
                    <p>
                        Первая неделя — подготовка к полному отказу от курения.<br>
                        Вторая неделя — отказ от курения, внедрение новых привычек, заменяющих курение.<br>
                        Третья неделя — удержание результата, привыкаем не курить всегда и везде.<br>
                    </p>
                    <hr>
                    <p class="text-bold">Механика действия курса:</p>
                    <p>Курс длится 21 день, в состав курса входят теория, практика, мотивация, контроль и поддержка. Совокупность этих факторов дает положительный результат в отказе от курения.</p>
                    <p><span class="text-bold">21 день</span> — известно, что любая привычка формируется двадцать один день, именно столько времени необходимо для приобретения новой привычки не курить в любой ситуации.</p>
                    <p><span class="text-bold">Теория</span> — развенчиваем все мифы, которые мешают бросить курить. Вся правда о курении, а также о том, как правильно и эффективно бороться с никотиновой и психологической зависимостью. Знание — сила: кто осведомлен, тот вооружен!</p>
                    <p><span class="text-bold">Практика</span> — ежедневно в течении 21 дня даем задания и практические приемы, которые помогут справиться с физиологической и психологической зависимостью от курения.</p>
                    <p><span class="text-bold">Мотивация</span> — вселяем уверенность, настраиваем на успех, помогаем принять правильное решение и придаем силы для отказа от курения.</p>
                    <p><span class="text-bold">Поддержка</span> — семь дней в неделю двадцать четыре часа в сутки работает онлайн-поддержка, которая поможет в самый трудный момент, ответив на любой волнующий вопрос.</p>
                    <p><span class="text-bold">Контроль</span> — выполнение каждого задания контролируется наставником, доступ к следующему уроку предоставляется только после изучения материала, прохождения проверочных тестов и выполнения заданий во всех предыдущих уроках.</p>
                    <p><span class="text-bold">Целостность</span> — именно последовательное и непрерывное прохождение всего курса дает полноценный результат: полный отказ от курения. Даже если на первый взгляд некоторые задания кажутся банальными и слишком простыми, нельзя их игнорировать, т. к. именно в простоте кроется успех. Как говорится, все гениальное — просто!</p>
                    <button class="button-center" onclick="window.open('http://простыеправила.рф/no-smoking/?gcpc=8b7f1','_blank');">Начать</button>
                </div>
            </div>
            <div id="personal-manager" class="accordion">
                    <p>
                        <span class="accordions-left">Персональный менеджер здоровья</span>
                        <span class="accordions-right">Открыть</span>
                    </p>
            </div>
            <div class="panel">
                <div class="service-content">
                    <h1>Аутсорсинг здоровья</h1>
                    <p>Подключив данный сервис вы получите персонального удаленного помощника для<br>контроля над здоровьем</p>
                    <p>Помощник не является врачом. его цель помочь вам привести здоровье в норму и<br>сохранить его на долгие годы</p>
                    <h1>Как это работает?</h1>
                    <p><i class="fa fa-check" aria-hidden="true"></i>вы подключаете и оплачиваете услугу Персональный Менеджер Здоровья (ПМЗ)</p>
                    <p><i class="fa fa-check" aria-hidden="true"></i>ПМЗ знакомится с данными которые вы ввели в Личный кабинет</p>
                    <p><i class="fa fa-check" aria-hidden="true"></i>в удобное для вас время он с вами связывается наиболее удобным для вас способом<br>(телефон, почта, месенджеры)</p>
                    <p><i class="fa fa-check" aria-hidden="true"></i>задает ряд вопросов для уточнения вашего текущего состояния и пожелания по<br>изменению состояния (провести полную профилактику, снизить вес, улучшить фигуру,<br>подправить показания анализов, подлечить органы и др )</p>
                    <p><i class="fa fa-check" aria-hidden="true"></i>ПМЗ предлагает вам план конкретных действий, вы его одобряете или совместно<br>корректируете</p>
                    <p><i class="fa fa-check" aria-hidden="true"></i>ПМЗ находит для Вас наиболее подходящие вам клиники, курсы, специалистов и пр.<br>записывает вас к ним, составляет удобный для вас график</p>
                    <p><i class="fa fa-check" aria-hidden="true"></i>связывается с вами в соответствии с графиком и помогает дойти до результата</p>
                    <h1>Стоимость услуги</h1>
                    <p><span class="text-bold">3 000 руб.</span> за составление плана и графика</p>
                    <p><span class="text-bold">2 000 руб.</span> за месяц поддержки</p>
                    <p><span class="text-bold">18 000 руб.</span> при оплате за год + составление плана-графика бесплатно <span class="text-bold text-green">(экономия 33%)</span></p>
                    <?php
                            if($user->is_logged_in()) {
                                echo '<button class="button-registered-wip">Подключить</button>';
                            } else {
                                echo '<button class="button-unregistered-wip">Подключить</button>';
                            }
                    ?>
                </div>
            </div>
            <div id="screening" class="accordion">
                    <p>
                        <span class="accordions-left">Генетический скрининг организма</span>
                        <span class="accordions-right">Открыть</span>
                    </p>
            </div>
            <div class="panel">
                <div class="service-content">
                    <p>Сервис находится в разработке</p>
                </div>
            </div>
            <div id="immunity" class="accordion">
                    <p>
                        <span class="accordions-left">Поднятие иммунитета</span>
                        <span class="accordions-right">Открыть</span>
                    </p>
            </div>
            <div class="panel">
            
                <div class="service-content">
                    <p>Сервис находится в разработке</p>
                    <!--
                    <p>Иммунная и эндокринная (гормоны) системы организма тесно взаимозависимы.<br>
                    Поэтому для приведения иммунитета в норму прежде всего необходимо оценить их состояние.</p>
                    <div class="service-analyses">
                        <h1>Для этого мы рекомендуем сдать комплексы анализов</h1>
                        <?php
                            if($user_sex == "male" || $user_sex == "м"){
                                echo '<label class="container">';
                                echo '<input type="checkbox" checked="checked">';
                                echo '<span class="checkmark"></span>';
                                echo '<span>Гормональный профиль для мужчин</span>';
                                echo '</label>';
                                echo '<div class="info-right">';
                                echo '<div class="questionmark hormones-m-hover-info">';
                                echo '<span class="tooltip-content">Рекомендовано сдавать данный анализ для поддержания
                                иммунитета и эндокринной системы в норме (до 40 лет – 1 раз
                                в 2 года, 40-60 лет 1 раз в год, старше 60 лет 1 раз в пол года)</span>';
                                echo '</div>';
                                echo '<a class="hormones-m-info btn-info">Подробнее</a>';
                                echo '</div><br>';
                            } else {
                                echo '<label class="container">';
                                echo '<input type="checkbox" checked="checked">';
                                echo '<span class="checkmark"></span>';
                                echo '<span>Гормональный профиль для женщин</span>';
                                echo '</label>';
                                echo '<div class="info-right">';
                                echo '<div class="questionmark hormones-f-hover-info">';
                                echo '<span class="tooltip-content">Рекомендовано сдавать данный анализ для поддержания
                                иммунитета и эндокринной системы в норме (до 40 лет – 1 раз
                                в 2 года, 40-60 лет 1 раз в год, старше 60 лет 1 раз в пол года)</span>';
                                echo '</div>';
                                echo '<a class="hormones-f-info btn-info">Подробнее</a>';
                                echo '</div><br>';
                            }
                        ?>
                        <label class="container">
                            <input type="checkbox" checked="checked">
                            <span class="checkmark"></span>
                            <span>Комплексный анализ на витамины (А, D, E, K, C, B1, B5, B6, B9, B12)</span>
                        </label>

                        <div class="info-right">
                            <div class="questionmark vitamins-hover-info">
                                <span class="tooltip-content">Рекомендовано сдавать данный анализ для поддержания иммунитета и эндокринной системы в норме (до 40 лет – 1 раз в 2 года, 40-60 лет 1 раз в год, старше 60 лет 1 раз в пол года)</span>
                            </div>
                            <a class="vitamins-info btn-info">Подробнее</a>
                        </div><br>
                    </div>
                    <div class="contact">
                    <?php
                        if($user->is_logged_in()) {
                            echo '<div class="contact-column-left">';
                            echo '<button type="submit">Заказать</button>';
                            echo '</div>';
                            echo '<div class="contact-column-right">';
                            echo '<p><i class="fa fa-info-circle"></i> В расшифрованных  результатах анализов вы увидите какие гормоны и витамины в норме, а какие нет.</p>';
                            echo '<p>После этого вы сможете получить онлайн консультацию иммунолога-эндокринолога</p>';
                            echo '</div>';
                            } else {
                            echo '<p>Чтобы воспользоваться данным сервисом, необходимо <a href="test.php#register">создать личный кабинет.</a></p>';
                        }
                    ?>
                    </div>
                    <h1>Консультация с Иммунологом-эндокринологом</h1>
                    <div class="contact">
                        <div class="contact-column-left">
                            <label class="container-radio">
                                <input type="radio" name="contact" value="video">
                                <span class="checkmark-radio"></span>
                                <span>Видеоконсультация</span>
                            </label><br>
                                      
                            <label class="container-radio">
                                <input type="radio" name="contact" value="chat">
                                <span class="checkmark-radio"></span>
                                <span>Чат</span>
                            </label><br>
                                      
                            <label class="container-radio">
                                <input type="radio" name="contact" value="phone" checked="checked">
                                <span class="checkmark-radio"></span>
                                <span>Телефон</span>
                            </label>
                        </div>
                        <div class="contact-column-right">
                            <p><i class="fa fa-info-circle"></i> Перед консультацией специалист ознакомится с показателями вашего здоровья введенными в программу, результатами анализов и обследований.</p>
                            <p>Результаты консультации будут помещены в раздел Мои документы и всегда вам доступны</p>
                        </div>
                        <?php
                        if($user->is_logged_in()) {
                            echo '<button type="submit">Заказать</button>';
                            } else {
                                echo '<p>Чтобы воспользоваться данным сервисом, необходимо <a href="test.php#register">создать личный кабинет.</a></p>';
                            }
                        ?>
                    </div>
                    -->
                </div>
            </div>
            
            <div id="analyzes" class="accordion">
                    <p>
                        <span class="accordions-left">Сдача анализов</span>
                        <span class="accordions-right">Открыть</span>
                    </p>
            </div>
            <div class="panel">
                <div class="service-content">
                    <p>Прямо сейчас вы можете заказать сдачу анализов дома или в офисе с бесплатным выездом при заказе от 1500р</p>
                    <p>Сделав заказ на нашем сайте по цене лаборатории, Вы получите бесплатную автоматическую расшифровку с пояснениями причин возможных отклонений.</p>
                    <p>Мы сотрудничаем с одной из крупнейших федеральных лабораторий <strong>KDL</strong> <img class="img-inline" src="images/icons/kdl_logo.png"></p>
                    <div class="service-analyses">
                        <h1>По результатам теста вам рекомендуется сдать следующие анализы</h1>

                        <label class="container">
                            <input type="checkbox" checked="checked" class="analysis-checkbox">
                            <span class="checkmark"></span>
                            <span>Биохимическй анализ крови</span>
                        </label>

                        <div class="info-right">
                            <div class="analysis-price">3780 руб.</div>
                            <div class="questionmark vitamins-hover-info">
                                <span class="tooltip-content">Рекомендовано сдавать данный анализ (до 40 лет – 1 раз в 2 года, 40-60 лет 1 раз в год, старше 60 лет 1 раз в пол года)</span>
                            </div>
                            <a class="blood-info btn-info">Подробнее</a>
                        </div><br>
                        <label class="container">
                            <input type="checkbox" checked="checked" class="analysis-checkbox">
                            <span class="checkmark"></span>
                            <span>Общий анализ мочи</span>
                        </label>

                        <div class="info-right">
                            <div class="analysis-price">340 руб.</div>
                            <div class="questionmark vitamins-hover-info">
                                <span class="tooltip-content">Рекомендовано сдавать данный анализ (до 40 лет – 1 раз в 2 года, 40-60 лет 1 раз в год, старше 60 лет 1 раз в пол года)</span>
                            </div>
                            <a class="pee-info btn-info">Подробнее</a>
                        </div><br>
                        <label class="container">
                            <input type="checkbox" class="analysis-checkbox">
                            <span class="checkmark"></span>
                            <span>Гастрокомплекс</span>
                        </label>

                        <div class="info-right">
                            <div class="analysis-price">3240 руб.</div>
                            <div class="questionmark vitamins-hover-info">
                                <span class="tooltip-content">Рекомендовано сдавать данный анализ на основании возможной генетической предрасположенности к <strong>заболеваниям ЖКТ</strong> (до 40 лет – 1 раз в 2 года, 40-60 лет 1 раз в год, старше 60 лет 1 раз в пол года)</span>
                            </div>
                            <a class="gastro-info btn-info">Подробнее</a>
                        </div><br>
                        <label class="container">
                            <input type="checkbox" class="analysis-checkbox">
                            <span class="checkmark"></span>
                            <span>Диагностика диабета, биохимический</span>
                        </label>

                        <div class="info-right">
                            <div class="analysis-price">4220 руб.</div>
                            <div class="questionmark vitamins-hover-info">
                                <span class="tooltip-content">Рекомендовано сдавать данный анализ на основании возможной генетической предрасположенности к <strong>диабету</strong> (до 40 лет – 1 раз в 2 года, 40-60 лет 1 раз в год, старше 60 лет 1 раз в пол года)</span>
                            </div>
                            <a class="diabetes-info btn-info">Подробнее</a>
                        </div><br>
                        <label class="container">
                            <input type="checkbox" class="analysis-checkbox">
                            <span class="checkmark"></span>
                            <span>Кардиологический</span>
                        </label>

                        <div class="info-right">
                            <div class="analysis-price">5530 руб.</div>
                            <div class="questionmark vitamins-hover-info">
                                <span class="tooltip-content">Рекомендовано сдавать данный анализ на основании возможной генетической предрасположенности к заболеваниям <strong>сердечно сосудистой системы</strong> (до 40 лет – 1 раз в 2 года, 40-60 лет 1 раз в год, старше 60 лет 1 раз в пол года)</span>
                            </div>
                            <a class="cardio-info btn-info">Подробнее</a>
                        </div><br>
                        <label class="container">
                            <input type="checkbox" class="analysis-checkbox">
                            <span class="checkmark"></span>
                            <span>Онкологический для мужчин, биохимический</span>
                        </label>

                        <div class="info-right">
                            <div class="analysis-price">3910 руб.</div>
                            <div class="questionmark vitamins-hover-info">
                                <span class="tooltip-content">Рекомендовано сдавать данный анализ на основании возможной генетической предрасположенности к <strong>раковым</strong> заболеваниям (до 40 лет – 1 раз в 2 года, 40-60 лет 1 раз в год, старше 60 лет 1 раз в пол года)</span>
                            </div>
                            <a class="onco-m-info btn-info">Подробнее</a>
                        </div><br>
                        <label class="container">
                            <input type="checkbox" class="analysis-checkbox">
                            <span class="checkmark"></span>
                            <span>Онкологический для женщин, биохимический</span>
                        </label>

                        <div class="info-right">
                            <div class="analysis-price">5720 руб.</div>
                            <div class="questionmark vitamins-hover-info">
                                <span class="tooltip-content">Рекомендовано сдавать данный анализ на основании возможной генетической предрасположенности к <strong>раковым</strong> заболеваниям (до 40 лет – 1 раз в 2 года, 40-60 лет 1 раз в год, старше 60 лет 1 раз в пол года)</span>
                            </div>
                            <a class="onco-f-info btn-info">Подробнее</a>
                        </div><br>
                        <label class="container">
                            <input type="checkbox" class="analysis-checkbox">
                            <span class="checkmark"></span>
                            <span>Диагностика сосудистых заболеваний головного мозга</span>
                        </label>

                        <div class="info-right">
                            <div class="analysis-price">4610 руб.</div>
                            <div class="questionmark vitamins-hover-info">
                                <span class="tooltip-content">Рекомендовано сдавать данный анализ на основании возможной генетической предрасположенности к заболеваниям <strong>сосудистой системы головного мозга</strong> (до 40 лет – 1 раз в 2 года, 40-60 лет 1 раз в год, старше 60 лет 1 раз в пол года)</span>
                            </div>
                            <a class="vessels-info btn-info">Подробнее</a>
                        </div><br>
                        
                        <label class="container">
                            <input type="checkbox" class="analysis-checkbox">
                            <span class="checkmark"></span>
                            <span>Гормональный профиль (комплекс) для мужчин</span>
                        </label>

                        <div class="info-right">
                            <div class="analysis-price">2880 руб.</div>
                            <div class="questionmark vitamins-hover-info">
                                <span class="tooltip-content">Рекомендовано сдавать данный анализ для поддержания иммунитета и эндокринной системы в норме (до 40 лет – 1 раз в 2 года, 40-60 лет 1 раз в год, старше 60 лет 1 раз в пол года)</span>
                            </div>
                            <a class="hormones-m-info btn-info">Подробнее</a>
                        </div><br>
                        <label class="container">
                            <input type="checkbox" class="analysis-checkbox">
                            <span class="checkmark"></span>
                            <span>Гормональный профиль (комплекс) для женщин</span>
                        </label>

                        <div class="info-right">
                            <div class="analysis-price">6140 руб.</div>
                            <div class="questionmark vitamins-hover-info">
                                <span class="tooltip-content">Рекомендовано сдавать данный анализ для поддержания иммунитета и эндокринной системы в норме (до 40 лет – 1 раз в 2 года, 40-60 лет 1 раз в год, старше 60 лет 1 раз в пол года)</span>
                            </div>
                            <a class="hormones-f-info btn-info">Подробнее</a>
                        </div><br>
                        <label class="container">
                            <input type="checkbox" class="analysis-checkbox">
                            <span class="checkmark"></span>
                            <span>Комплексный анализ крови на витамины (A, D, E, K, C, B1, B5, B6, В9, B12)</span>
                        </label>

                        <div class="info-right">
                            <div class="analysis-price">15500 руб.</div>
                            <div class="questionmark vitamins-hover-info">
                                <span class="tooltip-content">Рекомендовано сдавать данный анализ для поддержания иммунитета и эндокринной системы в норме (до 40 лет – 1 раз в 2 года, 40-60 лет 1 раз в год, старше 60 лет 1 раз в пол года)</span>
                            </div>
                            <a class="vitamins-info btn-info">Подробнее</a>
                        </div><br>

                        <p class="total">ИТОГО</p>
                        <p class="total-number" id="an-price"></p>
                        </div>

                        <p>Сдать анализы в лаборатории КДЛ можно в любом отделении на территории России или дома, визит сестры для приема анализов бесплатный.</p>

                        <div class="contact">
                        <div class="contact-column-left">
                            <button class="button-wider" type="submit">Заказать</button>
                            <p class="order-info">Кэшбэк <strong id="an-cashback"></strong> (3%)</p>
                            <p class="order-info-lower btn-info">Подробнее о заказе</p>
                        </div>
                        <div class="contact-column-right">
                            <p><i class="fa fa-info-circle"></i> В течение 2-3 дней после сдачи расшифрованные данные анализов и рекомендации появятся в разделе Мое здоровье в цифрах, а сам бланк можно будет посмотреть и скачать в разделе Мои мед документы</p>
                            <p><i class="fa fa-info-circle"></i> Мы не сотрудничаем с врачами и клиниками, не рекламируем и не рекомендуем их. Результаты расшифровки анализов носят информационный характер, не ставят диагнозов, не назначают лечение, а лишь рекомендуют оборащение к врачу в случае необходимости.</p>
                        </div>
                        </div>
                    
                </div>
            </div>
            <div id="home-checkup" class="accordion">
                    <p>
                        <span class="accordions-left">Домашний медосмотр</span>
                        <span class="accordions-right">Открыть</span>
                    </p>
            </div>
            <div class="panel">
                <div class="service-content">
                    <p class="inline">Данная услуга предоставляется совместно с нашим партнером клиникой </p>
                    <img src="images/icons/neomed_logo.png" class="img-inline neomed-logo">
                    <h1>В стандартный домашний медосмотр входят следующие процедуры</h1>
                    <div class="inline">
                        <p><i class="fa fa-check" aria-hidden="true"></i>Измерение веса и роста</p>
                        <p><i class="fa fa-check" aria-hidden="true"></i>Измерение давления</p>
                        <p><i class="fa fa-check" aria-hidden="true"></i>Экспресс анализ на сахар, холестерин, гемоглобин</p>
                        <p><i class="fa fa-check" aria-hidden="true"></i>ЭКГ (проверка сердца)</p>
                        <p><i class="fa fa-check" aria-hidden="true"></i>Проверка зрения</p>
                        <p><i class="fa fa-check" aria-hidden="true"></i>Проверка легких (спирография)</p>
                    </div>
                    <div class="inline">
                        <img src="images/home_checkup.png" class="inline img-checkup">
                    </div>
                    <hr>
                    <p class="total">Стоимость</p> <p class="checkup-pre-price">5900 руб.</p>
                    <h1 class="additional">Дополнительно можно провести следующие обследования:</h1>
                    
                    <label class="container">
                            <input type="checkbox" checked="checked" class="checkup-checkbox">
                            <span class="checkmark"></span>
                            <span>УЗИ брюшной полости на дому</span>
                    </label>

                    <div class="info-right">
                        <div class="uzi-price">+ 1500 руб.</div>
                    </div>
                    <div class="uzi-stomach-additional">
                        <p>железу поджелудочную;</p>
                        <p>орган-депо желчи;</p>
                        <p>почки и зону надпочечников;</p>
                        <p>печень;</p>
                        <p>селезенку.</p>
                    </div>

                    <label class="container">
                            <input type="checkbox" checked="checked" class="checkup-checkbox">
                            <span class="checkmark"></span>
                            <span>УЗИ печени и желчного органа</span>
                    </label>

                    <div class="info-right">
                        <div class="uzi-price">+ 1500 руб.</div>
                    </div><br>

                    <label class="container">
                            <input type="checkbox" checked="checked" class="checkup-checkbox">
                            <span class="checkmark"></span>
                            <span>УЗИ мочевого органа и мочеточников</span>
                    </label>

                    <div class="info-right">
                        <div class="uzi-price">+ 1500 руб.</div>
                    </div><br>

                    <label class="container">
                            <input type="checkbox" checked="checked" class="checkup-checkbox">
                            <span class="checkmark"></span>
                            <span>УЗИ сосудов нижних конечностей (вены + артерии)</span>
                    </label>

                    <div class="info-right">
                        <div class="uzi-price">+ 1500 руб.</div>
                    </div><br>

                    <label class="container">
                            <input type="checkbox" checked="checked" class="checkup-checkbox">
                            <span class="checkmark"></span>
                            <span>УЗИ сердца</span>
                    </label>

                    <div class="info-right">
                        <div class="uzi-price">+ 2000 руб.</div>
                    </div><br>

                    <label class="container">
                            <input type="checkbox" checked="checked" class="checkup-checkbox">
                            <span class="checkmark"></span>
                            <span>Рентген легких на дому</span>
                    </label>

                    <div class="info-right">
                        <div class="uzi-price">+ 5000 руб.</div>
                    </div><br>

                    <p><i class="fa fa-info-circle"></i> Результаты осмотра с комментариями врача будут доступны в личном кабинете в<br>течение 24 часов после прохождения обследования</p>
                    <p><i class="fa fa-info-circle"></i> Обследование проходит у вас дома или в офисе. Необходимо наличие стула, стола, а так<br>же небольшой кушетки (дивана) для УЗИ</p>
                    <hr>
                    <h1 class="inline">Стоимость для Москвы</h1>
                    <p class="total-number" id="checkup-price">10000 руб.</p>
                    <button class="inline">Заказать</button>
                    <p id="checkup-cashback">Кэшбэк <strong>100 руб.</strong> (3%)<p>
                </div>
            </div>
            <div id="healthy-heart" class="accordion">
                    <p>
                        <span class="accordions-left">Здоровое сердце</span>
                        <span class="accordions-right">Открыть</span>
                    </p>
            </div>
            <div class="panel">
                <div class="service-content">
                    <p>Сервис находится в разработке</p>
                </div>
            </div>
            <div id="expecting" class="accordion">
                    <p>
                        <span class="accordions-left">Жду малыша</span>
                        <span class="accordions-right">Открыть</span>
                    </p>
            </div>
            <div class="panel">
                <div class="service-content">
                    <p>Сервис находится в разработке</p>
                </div>
            </div>
            <div id="be-mom" class="accordion">
                    <p>
                        <span class="accordions-left">Хочу быть мамой</span>
                        <span class="accordions-right">Открыть</span>
                    </p>
            </div>
            <div class="panel">
                <div class="service-content">
                    <p>Сервис находится в разработке</p>
                </div>
            </div>
            <div id="be-dad" class="accordion">
                    <p>
                        <span class="accordions-left">Хочу быть папой</span>
                        <span class="accordions-right">Открыть</span>
                    </p>
            </div>
            <div class="panel">
                <div class="service-content">
                    <p>Сервис находится в разработке</p>
                </div>
            </div>
        </div>

        <hr>
        <div class="footer">
            
            <div class="contacts">
                <div class="social-media">
                    <a class="social-OK" href="https://ok.ru/zdorovyebu"></a>
                    <a class="social-VK" href="https://vk.com/public157016043"></a>
                    <a class="social-FB" href="https://www.facebook.com/zdrav.rf/"></a>
                    <a class="social-IG" href="https://www.instagram.com/zdrav.rf"></a>
                </div>
                <div class="phone">+7 495 131-32-73</div>
                <div class="OOO">2016-2018 ООО «Здравствую»</div>
            </div>
            
            <div class="zdrav-menu">
                <p>Здравствую</p>
                <ul>
                    <li>
                            <a>О нас</a>
                        </li>
                        <li>
                            <a>FAQ</a>
                        </li>
                        <li>
                            <a>Отзывы о сервисе</a>
                        </li>
                        <li>
                            <a>Партнерская программа</a>
                        </li>
                        <li>
                            <a>Команда</a>
                        </li>
                        <li>
                            <a>Контакты</a>
                        </li>
                    </ul>
                </div>
            
                <div class="documents">
                    <p>Документы</p>
                    <ul>
                        <li>
                            <a>Миссия, цель, ценности</a>
                        </li>
                        <li>
                            <a>Правила использования</a>
                        </li>
                        <li>
                            <a>Обработка персональных данных</a>
                        </li>
                    </ul>
            </div>
        </div>
    </div>
    </div>
    <!--button class="button-unregistered-wip">Open unregistered Modal</button-->
    <!--button class="button-registered-wip">Open registered Modal</button-->
    <div id="unregistered-wip" class="modal-window modal-hidden">
        <div class="modal-content">
            <span class="close close-cross">×</span>
            <div class="modal-text-content">
                <h1 class="modal-title">Сервис в разработке</h1>
                <p class="modal-text">Данный сервис находится в разработке. Зарегистрируйте Личный кабинет, оставьте заявку и мы сообщим вам когда им можно будет воспользоваться.</p>
                <button id="register-button" class="modal-button" onclick="window.location = 'test.php#register';">Зарегистрироваться</button>
            </div>
        </div>
    </div>

    <div id="registered-wip" class="modal-window modal-hidden">
        <div class="modal-content">
            <span class="close close-cross">×</span>
            <div class="modal-text-content">
                <h1 class="modal-title">Сервис в разработке</h1>
                <p class="modal-text">Данный сервис находится в разработке. Мы сообщим вам, когда им можно будет воспользоваться.</p>
                <form><button id="notify-me-button" class="modal-button close">ОК</button></form>
            </div>
        </div>
    </div>

    <div id="info-modal" class="modal-window modal-hidden">
        <div class="modal-content">
            <span class="close close-cross">×</span>
            <div class="modal-text-content">
                <h1 class="modal-title" id="info-modal-title"></h1>
                <p class="modal-text" id="info-modal-text"></p>
                <button id="notify-me-button" class="modal-button close">ОК</button>
            </div>
        </div>
    </div>
</body>
</html>