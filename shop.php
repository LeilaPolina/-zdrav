<?php include_once('includes/config.php'); ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Магазин</title>
    <link rel="stylesheet" href="css/test.css" />
    <link rel="stylesheet" href="css/shop.css" />
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/demo.css" />
    <script src="jquery/jquery-3.1.1.min.js"></script>
    <script src="jquery/jquery.maskedinput.min.js"></script>
    <script src="scripts/demo.js"></script>
    <script src="scripts/get_ali_prices.js"></script>
    <script src="scripts/header.js"></script>

    <!-- EDITED -->
	<link rel="stylesheet" type="text/css" href="css/registration_login_windows.css" />
	<script src="scripts/registration.js"></script>
	<!-- FINISH -->
	
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans" />
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
	
	<!-- MULTISELECT -->
	<link rel="stylesheet" type="text/css" href="css/multiselect.css" />
	<script src="scripts/multiselect.js"></script>
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
    <div class="sh"></div>
        <?php
	    include 'header.php';
        ?>
    </div>
    <div class="main">

    <div class="recommendations-top threeb">
		<div class="rec-wrapper review-body">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/jlZZqiHsFCo" frameborder="0" allow="accelerometer; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
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


    <div class="content">
        <section class="row">
            <div class="col-1-2">
                <div class="content-box ali-text">
                    <img src="images/shop/AliExpress.png" class="ali-logo">
                    <h1>Наш сервис является официальным партнером крупнейшего интернет магазина AliExpress.</h1>
                    <p class="shop-text">Зарегистрированные пользователи совершая покупки на AliExpress через наш сервис получают кэшбек в размере <strong>3% от суммы покупки</strong>
                    </p>
                </div>
            </div>
            <div class="col-1-2">
                <div style="height: 227px; width: 421px; float: right; margin: 30px;">
                        <iframe height="220" width="420" src="https://www.youtube.com/embed/RF8bXxotHiI" 
                            allowfullscreen="allowfullscreen"
                            mozallowfullscreen="mozallowfullscreen" 
                            msallowfullscreen="msallowfullscreen" 
                            oallowfullscreen="oallowfullscreen" 
                            webkitallowfullscreen="webkitallowfullscreen"></iframe>
                    <p class="shop-text">Если вы никогда не совершали покупок на AliExpress
                        <strong>посмотрите видео</strong> как это делается. Все очень просто</p>
                </div>
            </div>
        </section>
        <section class="row">
            <div class="col-1-3">
                <div class="content-box info">
                    <div>
                        <svg width="33" height="49" viewBox="0 0 33 49" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M0 43.6686L30.9962 46.0249L34.3155 2.35632L3.31963 0L0 43.6686Z" transform="translate(-2.28223 4.26704) rotate(-4)"
                                fill="#484646" />
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M27.1511 41.0067L0 38.9436L2.96078 0L30.1111 2.06393L27.1511 41.0067Z" transform="translate(-0.147461 6.12267) rotate(-4)"
                                fill="#F0F3F7" />
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M8.5507 4.60535C8.37183 6.96358 6.31446 8.72883 3.95678 8.54968C1.59909 8.37053 -0.166162 6.31426 0.0124421 3.95657C0.191867 1.59889 2.24869 -0.166638 4.6061 0.0125135C6.96433 0.191938 8.72958 2.24794 8.5507 4.60535Z"
                                transform="translate(20.2031 8.97554) rotate(-4)" fill="#9E0000" />
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M4.4755 1.62303L3.07866 1.5169L3.18397 0.118978L1.62248 0L1.51636 1.39847L0.118431 1.29208L0 2.85302L1.39738 2.95914L1.29153 4.35761L2.85356 4.47659L2.95914 3.07812L4.35761 3.18424L4.4755 1.62303Z"
                                transform="translate(22.3379 10.8311) rotate(-4)" fill="#F5F2E3" />
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M7.80962 2.00458L0 1.41078L0.107217 0L7.91711 0.59325L7.80962 2.00458Z"
                                transform="translate(5.16992 9.02432) rotate(-4)" fill="#00B0D2" />
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M11.6746 2.29833L0 1.41105L0.107491 0L11.7813 0.887277L11.6746 2.29833Z"
                                transform="translate(4.38184 12.0868) rotate(-4)" fill="#00B0D2" />
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M11.6746 2.2986L0 1.41105L0.107491 0L11.7819 0.887277L11.6746 2.2986Z" transform="translate(4.521 14.0819) rotate(-4)"
                                fill="#00B0D2" />
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M11.6744 2.29833L0 1.41051L0.107217 0L11.7821 0.887277L11.6744 2.29833Z"
                                transform="translate(4.73047 17.0746) rotate(-4)" fill="#00B0D2" />
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M23.0224 3.16044L0 1.41023L0.106397 0L23.1299 1.75021L23.0224 3.16044Z"
                                transform="translate(4.93994 20.0673) rotate(-4)" fill="#00B0D2" />
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M23.0238 3.16099L0 1.41078L0.108038 0L23.131 1.75048L23.0238 3.16099Z" transform="translate(5.14893 23.06) rotate(-4)"
                                fill="#00B0D2" />
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M23.0227 3.16154L0 1.41078L0.107217 0L23.1302 1.74994L23.0227 3.16154Z"
                                transform="translate(5.28857 25.0551) rotate(-4)" fill="#00B0D2" />
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M23.0227 3.16181L0 1.4116L0.107217 0L23.1299 1.75048L23.0227 3.16181Z" transform="translate(4.43066 27.12) rotate(-4)"
                                fill="#00B0D2" />
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M23.0232 3.16127L0 1.41133L0.107217 0L23.1305 1.75048L23.0232 3.16127Z"
                                transform="translate(4.63965 30.1127) rotate(-4)" fill="#00B0D2" />
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M23.0232 3.16127L0 1.41133L0.108038 0L23.131 1.74939L23.0232 3.16127Z" transform="translate(4.91895 34.1029) rotate(-4)"
                                fill="#00B0D2" />
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M23.0238 3.16099L0 1.41105L0.107764 0L23.1313 1.75076L23.0238 3.16099Z"
                                transform="translate(5.05811 36.0981) rotate(-4)" fill="#00B0D2" />
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M23.023 3.16044L0 1.40996L0.107217 0L23.1307 1.74966L23.023 3.16044Z" transform="translate(4.27002 39.1605) rotate(-4)"
                                fill="#00B0D2" />
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M23.0235 3.16099L0 1.40996L0.108038 0L23.1307 1.75021L23.0235 3.16099Z"
                                transform="translate(4.40967 41.1556) rotate(-4)" fill="#00B0D2" />
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M7.04165 2.57704C6.62645 2.54558 6.31465 2.1829 6.34692 1.76689C6.3781 1.3517 6.74078 1.04044 7.15625 1.07217C7.57144 1.10335 7.88352 1.46603 7.85179 1.88149C7.81952 2.29723 7.45766 2.60904 7.04165 2.57704ZM12.0182 4.91913L11.2808 4.86334C11.3766 4.68227 11.4384 4.4796 11.4545 4.26298C11.5191 3.41973 10.8883 2.68508 10.0454 2.62135L9.64906 2.59072L9.81645 0.394406L4.62982 0L4.46243 2.19686L3.94466 2.1572C3.10142 2.09347 2.36704 2.72419 2.30249 3.56716C2.28608 3.78378 2.31671 3.99329 2.38345 4.18612L1.64606 4.13087C0.803366 4.06605 0.0687096 4.69732 0.00443399 5.53974C-0.0592946 6.38298 0.571427 7.11709 1.41385 7.18164L11.7868 7.9699C12.6298 8.0339 13.3639 7.40291 13.4276 6.56021C13.4919 5.71779 12.8609 4.98286 12.0182 4.91913Z"
                                transform="translate(9.59961 0.695023) rotate(-4)" fill="#DDDDDD" />
                        </svg>
                    </div>
                    <div>
                        <p class="shop-text"> Данные полученные с помощью приобретенных у нас приборов удобно хранить в
                            <strong>личном кабинете</strong> чтобы наглядно видеть динамику изменений.</p>
                    </div>
                </div>
            </div>
            <div class="col-1-3">
                <div class="content-box info">
                    <div>
                        <svg width="65" height="42" viewBox="0 0 65 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M24 6.33371C23.4778 4.5213 23.1967 3.1766 22.8954 0H1.12469C0.943933 3.1766 0.542259 4.5213 0 6.33371C7.93305 8.57487 15.9464 8.5359 24 6.33371Z"
                                transform="translate(21 16)" fill="#30DBF2" />
                            <path d="M0.723214 0.0227554C0.522321 -0.0168192 0.321429 0.0821172 0.241071 0.260203C0.0803571 0.537225 0 0.853821 0 1.17042C0 2.73361 2.00893 4 4.5 4C6.99107 4 9 2.7534 9 1.19021C9 0.853821 8.91964 0.537225 8.73884 0.240416C8.63839 0.0623299 8.4375 -0.0168192 8.2567 0.00296809C5.8058 0.438288 3.29464 0.438288 0.723214 0.0227554Z"
                                transform="translate(28 38)" fill="#484646" />
                            <path d="M35.9803 8.78642C35.9607 8.12365 34.84 7.49876 34.2895 7.08216C33.0705 6.11641 30.9077 4.1281 30.2589 2.00724C30.1212 1.53384 29.9836 1.11724 29.8656 0.719578C29.728 0.284044 29.3348 0 28.8629 0C21.3326 1.62852 13.9006 1.66639 6.5669 0C6.11469 0 5.7018 0.284044 5.56417 0.700641C5.42654 1.0983 5.28891 1.53384 5.15128 2.00724C4.50246 4.09023 2.497 6.0596 1.3763 7.04429C0.865101 7.47982 0 8.08578 0 8.74855C0 9.63855 0 10.9073 0 11.8541C0 12.5737 0.57018 12.9145 1.39596 13.1796C5.72146 14.1264 10.047 14.6945 14.3528 14.9028C17.0071 15.0354 18.6783 15.0354 21.3326 14.8839C25.4812 14.6567 29.6297 14.0886 33.7586 13.1796C35.2529 12.8577 36 12.2328 36 11.0588C35.9803 11.0398 35.9803 8.80536 35.9803 8.78642Z"
                                transform="translate(15 22)" fill="#00B0D2" />
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M21.9976 15.2629C22.0366 15.8403 21.5684 16.3407 20.9829 16.3407C14.2881 17.2068 7.63232 17.2261 1.01562 16.36C0.430176 16.36 -0.019043 15.8788 0.000488281 15.3206C0.000488281 15.1089 0.0200195 14.8779 0.0200195 14.647C0.312988 4.94649 7.45654 3.40672 8.37402 3.25275C8.43262 3.23349 8.47168 3.19501 8.47168 3.13727C8.41309 2.38663 8.51074 1.75148 8.93994 1.09708C9.01807 0.981598 9.68164 0 10.8335 0C10.8916 0 11.3018 0 11.3604 0.0192413C12.0435 0.134735 12.6094 0.519669 12.9805 1.09708C13.4097 1.75148 13.5073 2.36739 13.4683 3.11801C13.4683 3.17575 13.5073 3.21425 13.5659 3.23349C13.582 3.2363 13.6143 3.23906 13.6606 3.24307C14.5732 3.32153 21.0479 3.87849 21.939 14.6277C21.9521 14.7817 21.9653 14.9186 21.9785 15.0554L21.9976 15.2629ZM10.9697 0.789124C9.97412 0.789124 9.4668 1.48201 9.42773 2.19415C9.42773 2.40587 9.44727 2.63684 9.54492 2.81006C9.56445 2.8678 9.60352 2.9063 9.66211 2.88705C9.7793 2.84856 12.1602 2.8293 12.3164 2.88705C12.375 2.88705 12.4141 2.84856 12.4336 2.79082C12.4766 2.64978 12.5093 2.49841 12.5156 2.35185C12.5181 2.2984 12.5171 2.24559 12.5117 2.19415C12.4727 1.52051 12.0039 0.789124 10.9697 0.789124Z"
                                transform="translate(22)" fill="#00B0D2" />
                            <path d="M2.06765 14C1.7922 14 1.53397 13.8314 1.41346 13.5503C0.432171 11.3018 -0.032651 8.94082 0.00178022 6.67356C0.0362114 4.4063 0.604327 2.25147 1.65448 0.377697C1.86107 0.00294271 2.30867 -0.109483 2.65298 0.115369C2.9973 0.340221 3.10059 0.827401 2.894 1.20216C1.96436 2.85107 1.48232 4.76232 1.44789 6.76725C1.41346 8.77218 1.84385 10.8708 2.72185 12.8757C2.894 13.2692 2.73906 13.7377 2.37753 13.925C2.27424 13.9625 2.17095 14 2.06765 14Z"
                                transform="translate(0 11)" fill="#71C4E3" />
                            <path d="M2.26637 16.5753C1.4796 15.3645 0.875802 14.0561 0.509864 12.6891C0.125628 11.2635 -0.0573408 9.77937 0.0158469 8.27568C0.0890345 6.42049 0.47327 4.68246 1.05877 3.17877C1.44301 2.18282 1.90043 1.30404 2.37615 0.60102C2.52252 0.386207 2.6872 0.22998 2.87017 0.11281C3.08973 -0.0238892 3.34589 -0.0434176 3.58375 0.0932813C3.67523 0.132338 3.74842 0.210452 3.8216 0.288565C4.05946 0.581491 4.05946 1.03064 3.8216 1.3431C3.32759 1.96801 2.79698 2.94443 2.39445 4.0966C1.97362 5.28784 1.66257 6.6353 1.58938 8.0804C1.57108 8.25616 1.57108 8.43191 1.57108 8.60767C1.53449 9.95513 1.69916 11.244 2.0651 12.4743C2.37615 13.5288 2.83357 14.5638 3.41907 15.5207C3.49226 15.6379 3.54715 15.7551 3.60204 15.8918C3.74842 16.2042 3.65693 16.6143 3.34589 16.8487C3.2544 16.9268 3.14462 16.9658 3.03484 16.9854C2.96165 17.0049 2.88846 17.0049 2.81527 16.9854C2.57741 16.8877 2.39445 16.7705 2.26637 16.5753Z"
                                transform="translate(5 9)" fill="#71C4E3" />
                            <path d="M3.77125 19C3.56185 19 3.33341 18.9041 3.18112 18.7315C2.05796 17.4655 1.22036 16.0269 0.687335 14.4732C0.154313 12.9195 -0.0741255 11.2124 0.0210571 9.4477C0.135276 7.29939 0.706372 5.28535 1.41072 3.67412C2.11507 2.06289 2.99075 0.816105 3.67607 0.202303C3.99969 -0.0854168 4.51368 -0.0662355 4.79922 0.259847C5.08477 0.58593 5.06574 1.10383 4.74211 1.39155C4.17102 1.90944 3.44763 2.98359 2.81943 4.42219C2.21026 5.86079 1.71531 7.62548 1.60109 9.54361C1.52494 11.1165 1.69627 12.5934 2.17218 13.9553C2.62906 15.3172 3.35245 16.564 4.36138 17.6765C4.64693 18.0026 4.6279 18.5205 4.30427 18.8082C4.15198 18.9233 3.96162 19 3.77125 19Z"
                                transform="translate(9 8)" fill="#71C4E3" />
                            <path d="M0.932347 0C1.2078 0 1.46603 0.168639 1.58654 0.449705C2.56783 2.69823 3.03265 5.05918 2.99822 7.32644C2.96379 9.5937 2.39567 11.7485 1.34552 13.6223C1.13893 13.9971 0.691328 14.1095 0.347016 13.8846C0.00270367 13.6598 -0.10059 13.1726 0.105997 12.7978C1.03564 11.1489 1.51768 9.23768 1.55211 7.23275C1.58654 5.22782 1.15615 3.12919 0.278153 1.12426C0.105997 0.73077 0.260938 0.262328 0.622466 0.0749508C0.725759 0.0374754 0.829053 0 0.932347 0Z"
                                transform="translate(62 10)" fill="#71C4E3" />
                            <path d="M1.73363 0.424743C2.5204 1.6355 3.1242 2.94391 3.49014 4.3109C3.87437 5.73647 4.05734 7.22063 3.98415 8.72432C3.91097 10.5795 3.52673 12.3175 2.94123 13.8212C2.55699 14.8172 2.09957 15.696 1.62385 16.399C1.47748 16.6138 1.3128 16.77 1.12983 16.8872C0.910271 17.0239 0.654115 17.0434 0.416255 16.9067C0.32477 16.8677 0.251583 16.7895 0.178395 16.7114C-0.059465 16.4185 -0.059465 15.9694 0.178395 15.6569C0.672412 15.032 1.20302 14.0556 1.60555 12.9034C2.02638 11.7122 2.33743 10.3647 2.41062 8.9196C2.42892 8.74384 2.42892 8.56809 2.42892 8.39233C2.46551 7.04487 2.30084 5.756 1.9349 4.52571C1.62385 3.47117 1.16643 2.43617 0.580927 1.47928C0.507739 1.36211 0.452849 1.24494 0.397958 1.10824C0.251583 0.795783 0.343067 0.385686 0.654115 0.151345C0.745599 0.0732315 0.855381 0.0341747 0.965162 0.0146463C1.03835 -0.0048821 1.11154 -0.0048821 1.18473 0.0146463C1.42259 0.112288 1.60555 0.229459 1.73363 0.424743Z"
                                transform="translate(57 9)" fill="#71C4E3" />
                            <path d="M1.22875 0C1.43815 0 1.66659 0.0959066 1.81888 0.268539C2.94203 1.53451 3.77964 2.97311 4.31266 4.52679C4.84569 6.08048 5.07413 7.78762 4.97894 9.5523C4.86472 11.7006 4.29363 13.7146 3.58928 15.3259C2.88493 16.9371 2.02828 18.1839 1.32393 18.7977C1.00031 19.0854 0.486324 19.0662 0.200776 18.7402C-0.084772 18.4141 -0.0657355 17.8962 0.257885 17.6085C0.828981 17.0906 1.55237 16.0164 2.18057 14.5778C2.78974 13.1392 3.28469 11.3745 3.39891 9.45639C3.47506 7.88352 3.30373 6.40656 2.82782 5.04469C2.37094 3.68281 1.64755 2.43603 0.638616 1.32351C0.353068 0.997429 0.372104 0.479533 0.695725 0.191813C0.848018 0.0767253 1.03838 0 1.22875 0Z"
                                transform="translate(51 8)" fill="#71C4E3" />
                        </svg>
                    </div>
                    <div>
                        <p class="shop-text">Для удобства наших покупателей есть возможность бесплатно подключить
                            <strong>сервис по напоминанию</strong> о необходимости произвести измерения</p>
                    </div>
                </div>
            </div>
            <div class="col-1-3">
                <div class="content-box info">
                    <div>
                        <div>
                            <svg width="26" height="44" viewBox="0 0 26 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <mask id="mask0" mask-type="alpha" maskUnits="userSpaceOnUse" x="13" y="0" width="13" height="44">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M0 0H13V44H0V0Z" transform="translate(13)" fill="white" />
                                </mask>
                                <g mask="url(#mask0)">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M12.9859 3.15971L13 40.8314C13.0015 42.5819 11.6653 43.9948 10.0138 43.9948L0.0150452 44L0 0.00391135L9.99988 0C11.6535 0 12.9891 1.41473 12.9859 3.15971Z"
                                        transform="translate(13)" fill="#484646" />
                                </g>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M12.985 0L13 43.9962L2.99925 44C1.34765 44 0.0117755 42.5838 0.0117755 40.8356L2.2902e-06 3.16259C-0.00201797 1.4165 1.33281 0.00346856 2.98615 0.00346856L12.985 0Z"
                                    fill="#484646" />
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M11.987 0L12 36.9956L0.885918 37C0.40292 37 0.0110776 36.6044 0.0110776 36.1162L0 0.883087C0 0.39819 0.391046 0.00234143 0.874478 0.00234143L11.987 0Z"
                                    transform="translate(2 2)" fill="#30DBF2" />
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M10 0.497325C10 0.774114 9.8644 0.996637 9.70147 0.996637L0.298457 0.99999C0.131454 1.00173 0 0.779453 0 0.501423C0 0.22538 0.131454 0.00409781 0.29779 0.00409781L9.70088 0C9.86329 0 10 0.222027 10 0.497325Z"
                                    transform="translate(9 1)" fill="#C1BCBC" />
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M5 0.99988C5 1.55214 4.61546 2 4.14167 2H0.858192C0.384125 2 0 1.55214 0 0.99988C0 0.447536 0.384125 0 0.858192 0H4.14167C4.61546 0 5 0.447536 5 0.99988Z"
                                    transform="translate(11 39)" fill="#9E9E9E" />
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M1.6364 2C1.60986 1.74379 1.55835 1.23171 1.55835 1.23171C1.82386 1.11101 2 0.905991 2 0.67327C2 0.301354 1.55249 0 1.00026 0C0.4492 0 0 0.301354 0 0.67327C0 0.905991 0.176922 1.11101 0.443086 1.23171L0.364121 2C1.16209 1.98966 0.837908 1.98966 1.6364 2Z"
                                    transform="translate(1 39)" fill="#434343" />
                            </svg>
                        </div>
                        <p class="shop-text">Вводить данные в личный кабинет можно так же через
                            <strong>мобильное приложение</strong>
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <section class="row">
            <div class="col-1-3">
                <div class="content-box">
                    <img src="images/shop/1.jpg">
                    <h1>Тестер холестерина</h1>
                    <p class="price" id="cholesterol-tester"></p>
                    <input type="button" onclick="window.open('http://s.click.aliexpress.com/e/Iurr7eM','_blank');" class="buy-button" value="Купить">
                </div>
            </div>
            <div class="col-1-3">
                <div class="content-box">
                    <img src="images/shop/2.jpg">
                    <h1>Домашний ЭКГ монитор</h1>
                    <p class="price" id="EKG-monitor"></p>
                    <input type="button" onclick="window.open('http://s.click.aliexpress.com/e/MN7AMbQ','_blank');" class="buy-button" value="Купить">
                </div>
            </div>
            <div class="col-1-3">
                <div class="content-box">
                    <img src="images/shop/3.jpg">
                    <h1>Тонометр</h1>
                    <p class="price" id="tonometer"></p>
                    <input type="button" onclick="window.open('http://s.click.aliexpress.com/e/rBYRzFq','_blank');" class="buy-button" value="Купить">
                </div>
            </div>
        </section>
        <section class="row">
            <div class="col-1-3">
                <div class="content-box">
                    <img src="images/shop/4.jpg">
                    <h1>Умные весы</h1>
                    <p class="price" id="scales"></p>
                    <input type="button" onclick="window.open('http://s.click.aliexpress.com/e/ChYYJvq','_blank');" class="buy-button" value="Купить">
                </div>
            </div>
            <div class="col-1-3">
                <div class="content-box">
                    <img src="images/shop/5.jpg">
                    <h1>Фитнес браслет</h1>
                    <p class="price" id="smart-watch"></p>
                    <input type="button" onclick="window.open('http://s.click.aliexpress.com/e/bXipeSos','_blank');" class="buy-button" value="Купить">
                </div>
            </div>
            <div class="col-1-3">
                <div class="content-box">
                    <img src="images/shop/6.jpg">
                    <h1>Пульсометр</h1>
                    <p class="price" id="heart-rate-monitor"></p>
                    <input type="button" onclick="window.open('http://s.click.aliexpress.com/e/bqomT23I','_blank');" class="buy-button" value="Купить">
                </div>
            </div>
        </section>
        </div>
        <hr>        
		<?php
			include("footer.php");
		?>
</div>
</div>
</body>
</html>