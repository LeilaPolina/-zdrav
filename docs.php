<?php
	include_once('includes/config.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Документы</title>
    <link rel="stylesheet" href="css/test.css">
    <link rel="stylesheet" href="css/docs.css">
    <script src="jquery/jquery-3.1.1.min.js"></script>
    <script src="jquery/jquery.maskedinput.min.js"></script>
	<script src="scripts/signout.js"></script>
	<!-- FINISH -->
	
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans" />
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    
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
			<a id="services" href="" style="" onclick="return false"><p>Сервисы</p></a>
			<a id="sign-out-lk" href="#" style=""><p>Выход</p></a>
		</div>
	</div>
    </div>

    <div class="main">
    <div class="content">
        <section class="row">
            <h2 class="pagename">Личный кабинет</h2>
            <h1 class="pagename">Мои документы</h1>
                <div class="video-area">
                    <div class="play-icon">
                        <i class="fa fa-play-circle-o fa-3x" aria-hidden="true"></i>
                    </div>
                    <p>Видеораспаковка: заголовок внутри видео</p>
                </div>
        </section>
    </div>
    <div class="content">
        <section class="row">
            <div class="line"><span class="title">История моего здоровья</span><br>
                <input class="download" type="submit" value="Скачать все">
                <input class="add" type="submit" value="+ Добавить">
                <p>Информация об анализах, обследованиях и лечении в хронологическом порядке</p>
            </div>
            <div class="line"><span class="title">Найти</span><br>
                <div class="date-field">
                    <span class="search-text">Дата</span><br>
                    <input type="text">
                </div>
                <div class="type-field">
                    <span class="search-text">Вид</span><br>
                    <select>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                    </select>
                </div>
                <div class="title-field">
                    <span class="search-text">Название</span><br>
                    <input type="text">
                </div>
                <div class = "search-button">
                    <button class="search" type="submit"><i class="fa fa-search" aria-hidden="true"></i> Найти</button>
                </div>
            </div>
        </section>
    </div>
    <table class="docs">
        <tbody>
            <tr>
                <th>Дата</th>
                <th>Вид</th>
                <th>Название</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            <tr>
                <td class="document-date">22 марта 2018</td>
                <td class="document-type">Холестерин общий</td>
                <td class="document-name">Название довольно длинное может быть</td>
                <td><input class="open" type="submit" value="Открыть"></td>
                <td><a href="#" class="download-button"><i class="fa fa-download"></i></a></td>
                <td><a href="#" class="delete-button"><i class="fa fa-times-circle"></i></a></td>
            </tr>
            <tr>
                <td class="document-date">22 марта 2018</td>
                <td class="document-type">Сахар</td>
                <td class="document-name">Название довольно длинное может быть</td>
                <td><input class="open" type="submit" value="Открыть"></td>
                <td><a href="#" class="download-button"><i class="fa fa-download"></i></a></td>
                <td><a href="#" class="delete-button"><i class="fa fa-times-circle"></i></a></td>
            </tr>
        </tbody>
    </table>
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
                    <li><a href="mission.php">Миссия, цель, ценности</a></li>
                    <li><a href="agreement.php">Правила использования</a></li>
                    <li><a href="personal_data_agreement.php">Обработка персональных данных</a></li>
                </ul>
        </div>
	</div>
    </div>
    </div>
</body>
</html>