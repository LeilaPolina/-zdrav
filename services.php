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
    <link rel="stylesheet" href="css/info_modals.css" />
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/demo_btn.css" />
    <link rel="stylesheet" type="text/css" href="css/input_radio.css" />
    <link rel="stylesheet" type="text/css" href="css/input_checkbox.css" />
    <script src="jquery/jquery-3.1.1.min.js"></script>
    <script src="jquery/jquery.maskedinput.min.js"></script>
    <script src="scripts/demo.js"></script>
    <script src="scripts/services_modal_texts.js"></script>
    <script src="scripts/info_modals.js"></script>
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
                    <?php include("services/weight.php"); ?>
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
                    <?php include("services/food.php"); ?>
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
                    <?php include("services/smoking.php"); ?>
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
                    <?php include("services/personal_manager.php"); ?>
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
                    <?php include("services/screening.php"); ?>
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
                    <?php include("services/immunity.php"); ?>
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
                    <?php include("services/analyzes.php"); ?>
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
                    <?php include("services/home_checkup.php"); ?>
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
                    <?php include("services/healthy_heart.php"); ?>
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
                    <?php include("services/expecting.php"); ?>
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
                    <?php include("services/be_mom.php"); ?>
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
                    <?php include("services/be_dad.php") ?>
                </div>
            </div>
        </div>

        <hr>            
		<?php
			include("footer.php");
		?>
    </div>
    </div>
    <!--button class="button-unregistered-wip">Open unregistered Modal</button-->
    <!--button class="button-registered-wip">Open registered Modal</button-->
    <?php 
        include 'info_modals.php';
    ?>
</body>
</html>