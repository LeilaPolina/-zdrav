<?php include_once('includes/config.php'); ?>
<?php
    include_once('modules/general_data_src.php');
    include_once('modules/rec_analyses.php');
    function get_an_prices($db){
        $get_an_prices = $db->prepare('SELECT complex_name, complex_price
                                    FROM complex_types');
        $get_an_prices->execute();
        $an_prices = array();
        while($an_prices_row = $get_an_prices->fetch(PDO::FETCH_ASSOC)){
            $an_prices[$an_prices_row['complex_name']] = $an_prices_row['complex_price'];
        }
        return $an_prices;
    }
    function get_checkup_prices($db){
        $get_checkup_prices = $db->prepare('SELECT home_checkup_name, home_checkup_price
                                        FROM home_checkup_types;');
        $get_checkup_prices->execute();
        $checkup_prices = array();
        while($checkup_prices_row = $get_checkup_prices->fetch(PDO::FETCH_ASSOC)){
            $checkup_prices[$checkup_prices_row['home_checkup_name']] = $checkup_prices_row['home_checkup_price'];
        }
        return $checkup_prices;
    }

    $an_prices = get_an_prices($db);
    $checkup_prices = get_checkup_prices($db);

    $user_weight = $user_data_arr['weight'];
    $user_height = $user_data_arr['height'];
    $user_sex = $user_data_arr['sex'];
    $index_mass = getIndexMass ($user_weight, $user_height);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <!--meta name="viewport" content="width=device-width, initial-scale=1"-->
    <title>Сервисы</title>
    <link rel="stylesheet" href="css/test.css" />
    <link rel="stylesheet" href="css/services.css" />
    <link rel="stylesheet" href="css/info_modals.css" />
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/demo.css" />
    <link rel="stylesheet" type="text/css" href="css/input_radio.css" />
    <link rel="stylesheet" type="text/css" href="css/input_checkbox.css" />
    <link rel="stylesheet" type="text/css" href="css/input_toggle.css" />
    <link rel="stylesheet" href="css/modals.css" />
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans" />
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">

    <script src="jquery/jquery-3.1.1.min.js"></script>
    <script src="jquery/jquery.maskedinput.min.js"></script>
    <script src="scripts/demo.js"></script>
    <script src="scripts/info_modal_texts.js"></script>
    <script src="scripts/info_modals.js"></script>
    <script src="scripts/services.js"></script>
    <script src="scripts/accordions.js"></script>
    <script src="scripts/header.js"></script>
    <script src="scripts/errors.js"></script>
    <script src="scripts/signout.js"></script>
    <script src="scripts/registration_from_not_general_data_page.js"></script>

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
    <?php
	    include 'header.php';
    ?>
    <div class="main">

        <div class="recommendations-top threeb">
            <div class="rec-wrapper review-body">
                <img src="images/banners/review-services.jpg">
            </div>

            <?php 
				if(!$user->is_logged_in()){
					echo '<h2 class="header-title">Демонтрационный режим</h2>';
					echo '<div class="demo-btn-container">';
					echo '<button class="demo-btn" id="go-to-result-test-save" href="">Создать личный кабинет</button>';
					echo '</div>';
				} else {
					echo '<h2 class="header-title">Личный кабинет</h2>';
				}
			?>
	    </div>

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
        include('info_modals.php');
        include('registration_modals.php');
    ?>

    <!-- ORDER MODAL -->
    <div id="order-modal" class="modal-window">
        <div class="modal-window-content order-homecheckup-window">
            <div class="modal-window-body sm-body">
                <div class="modal_header">
                        <span class="close" id="order-modal-close">&times;</span>
                        <div class="modal-title">Заказать домашний медосмотр</div>
                </div>
                <br />
                <label for="user-phone-for-order">Номер телефона</label>
                <br />
                <input type=text id="user-phone-for-order" class="modal-input" />
                <p class="error_msg" id="error_msg"> </p>

                <?php
                    if($user->is_logged_in()){
                        echo '<input type="hidden" id="flag_if_logged_in" value="logged_in">';
                    }
                    else{
                        echo '<input type="hidden" id="flag_if_logged_in" value="not_logged_in">';
                        echo '<input type="checkbox" id="wanna_register" checked="checked"/>Создать личный кабинет';
                    }
                ?>
                <input type=button id="submit-order" value="Подтвердить" class="modal-submit-btn" />

            </div>
        </div>
    </div>
    <!-- /ORDER MODAL -->

</body>
</html>
