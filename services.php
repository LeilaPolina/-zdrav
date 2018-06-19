<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Сервисы</title>
    <link rel="stylesheet" href="css/test.css" />
    <link rel="stylesheet" href="css/services.css" />
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <script src="jquery/jquery-3.1.1.min.js"></script>
    <script src="jquery/jquery.maskedinput.min.js"></script>
    <script src="scripts/services.js"></script>

    <!-- EDITED -->
	<link rel="stylesheet" type="text/css" href="css/registration_login_windows.css" />
	<script src="scripts/registration.js"></script>
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
                <a id="general-inf" href="test.php" style=""><p>Общие сведения</p></a>
                <a id="health-in-numbers" href="" style="" onclick="return false"><p>Моё здоровье в цифрах</p></a>
                <a id="my-documents" href="docs.php" style=""><p>Мои документы</p></a>
                <a id="shop" href="shop.php" style=""><p>Магазин</p></a>
                <a id="services" href="" style="" onclick="return false"><p>Сервисы</p></a>
				<a id="sign-out-lk" href="#" style=""><p>Выход</p></a>
            </div>
        </div>
    </div>
    <div class="main">

        <h2 class="pagename">Личный кабинет</h2>
        <h1 class="pagename">Сервисы</h1>
        <div class="services-menu">
            <div id="weight" class="accordion">
                <p>
                    <span class="services-left">Контроль веса</span>
                    <span class="services-right">Открыть</span>
                </p>
            </div>
            <div class="panel">
                <p>TODO</p>
            </div>
            <div id="food" class="accordion">
                    <p>
                        <span class="services-left">Здоровое питание</span>
                        <span class="services-right">Открыть</span>
                    </p>
            </div>
            <div class="panel">
                <p>TODO</p>
            </div>
            <div id="smoking" class="accordion">
                    <p>
                        <span class="services-left">Отказ от курения</span>
                        <span class="services-right">Открыть</span>
                    </p>
            </div>
            <div class="panel">
                <p>TODO</p>
            </div>
            <div id="personal-manager" class="accordion">
                    <p>
                        <span class="services-left">Персональный менеджер здоровья</span>
                        <span class="services-right">Открыть</span>
                    </p>
            </div>
            <div class="panel">
                <p>TODO</p>
            </div>
            <div id="screening" class="accordion">
                    <p>
                        <span class="services-left">Генетический скрининг организма</span>
                        <span class="services-right">Открыть</span>
                    </p>
            </div>
            <div class="panel">
                <p>TODO</p>
            </div>
            <div id="immunity" class="accordion">
                    <p>
                        <span class="services-left">Поднятие иммунитета</span>
                        <span class="services-right">Открыть</span>
                    </p>
            </div>
            <div class="panel">
                <p>TODO</p>
            </div>
            <div id="analyzes" class="accordion">
                    <p>
                        <span class="services-left">Сдача анализов</span>
                        <span class="services-right">Открыть</span>
                    </p>
            </div>
            <div class="panel">
                <p>TODO</p>
            </div>
            <div id="home-checkup" class="accordion">
                    <p>
                        <span class="services-left">Домашний медосмотр</span>
                        <span class="services-right">Открыть</span>
                    </p>
            </div>
            <div class="panel">
                <p>TODO</p>
            </div>
            <div id="healthy-heart" class="accordion">
                    <p>
                        <span class="services-left">Здоровое сердце</span>
                        <span class="services-right">Открыть</span>
                    </p>
            </div>
            <div class="panel">
                <p>TODO</p>
            </div>
            <div id="expecting" class="accordion">
                    <p>
                        <span class="services-left">Жду малыша</span>
                        <span class="services-right">Открыть</span>
                    </p>
            </div>
            <div class="panel">
                <p>TODO</p>
            </div>
            <div id="be-mom" class="accordion">
                    <p>
                        <span class="services-left">Хочу быть мамой</span>
                        <span class="services-right">Открыть</span>
                    </p>
            </div>
            <div class="panel">
                <p>TODO</p>
            </div>
            <div id="be-dad" class="accordion">
                    <p>
                        <span class="services-left">Хочу быть папой</span>
                        <span class="services-right">Открыть</span>
                    </p>
            </div>
            <div class="panel">
                <p>TODO</p>
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
</body>
</html>