<?php include_once('includes/config.php'); ?>
<?php
    
    $files_arr = array();
    $folder = "user_uploads";
    $demo = false;
    if(!$user->is_logged_in()){
        $demo = true;
    }
    
    try{
        $get_upload_types_for_search = $db->prepare('SELECT upload_type_id, upload_type_name FROM upload_types');
        $get_upload_types_for_search->execute();

        if($demo){
            $folder = $folder."/demo_files/";
            $files_arr = array(
                "sample_file_1" => array("type" => "Другое", "name" => "Выписка из истории болезни", "date" => "27 июня 2018", "extension" => "jpg"), 
                "sample_file_2" => array("type" => "Анализ", "name" => "Биохимический анализ крови", "date" => "27 июня 2018", "extension" => "jpg"), 
                "sample_file_3" => array("type" => "Заключение", "name" => "Заключение от кардиолога", "date" => "27 июня 2018", "extension" => "jpg"), 
                "sample_file_4" => array("type" => "Заключение", "name" => "Заключение от невролога", "date" => "27 июня 2018", "extension" => "jpg"), 
                "sample_file_5" => array("type" => "Рецепт", "name" => "Рецепт", "date" => "27 июня 2018", "extension" => "jpg"), 
                "sample_file_6" => array("type" => "Обследование", "name" => "Узи брюшной полости", "date" => "27 июня 2018", "extension" => "jpg"), 
                "sample_file_7" => array("type" => "Обследование", "name" => "Узи почек и мочеполовой системы", "date" => "27 июня 2018", "extension" => "jpg"), 
                "sample_file_8" => array("type" => "Анализ", "name" => "Анализ мочи", "date" => "27 июня 2018", "extension" => "png"));
        }
        else{
            $folder = $folder."/".$_SESSION['user_id']."_uploads/";

            
            $get_user_files = $db->prepare('SELECT * FROM user_uploads 
                                            INNER JOIN upload_types 
                                            ON upload_types.upload_type_id = user_uploads.user_uploads_upload_type_id 
                                            WHERE user_uploads_user_id = :user_id');
            $get_user_files->execute(array(
                ':user_id' => $_SESSION['user_id']
            ));

            $months_list = array('null_value', 'января', 'февраля', 'марта', 'апреля', 'мая', 'июня', 'июля', 'августа', 'сентября', 'октября', 'ноября', 'декабря');
            while($user_file = $get_user_files->fetch(PDO::FETCH_ASSOC)){

                $day = substr($user_file['user_uploads_date'], -2);
                $month = $months_list[intval(substr($user_file['user_uploads_date'], 5, -3))];
                $year = substr($user_file['user_uploads_date'], 0, 4);
                $date_format = $day.' '.$month.' '.$year;

                $files_arr[$user_file['user_uploads_path']] = array(
                    "type" => $user_file['upload_type_name'], 
                    "name" => $user_file['user_uploads_filename'], 
                    "date" => $date_format, 
                    "extension" => $user_file['user_uploads_extension']
                );
            }
        }
    }
    catch(Exception $e){

    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Документы</title>
    <link rel="stylesheet" href="css/test.css">
    <link rel="stylesheet" href="css/upload_file_form.css">
    <link rel="stylesheet" href="css/docs.css">
    <link rel="stylesheet" type="text/css" href="css/demo_btn.css" />
    <script src="jquery/jquery-3.1.1.min.js"></script>
    <script src="jquery/jquery.maskedinput.min.js"></script>
    <script src="scripts/demo.js"></script>
	<script src="scripts/signout.js"></script>
    <script src="scripts/docs.js"></script>
	
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
    <div class="content">
        <section class="row">
            <!-- DEMO PART -->
			<?php 
				if(!$user->is_logged_in()){
                    echo '<div class="demo-div">';
                    echo '<h2 class="pagename">Демонстрационный режим</h2>';                    
                    echo '<h1 class="pagename">Мои документы</h1>'; 
					echo '<br/>';
					echo '<ul class="demo-ul">';
						echo '<li><p>Данный сервис предоставлен в демонстрационном режиме<p></li>';
						echo '<li><p>Для полноценной работы необходимо создать Личный кабинет<p></li>';
					echo '</ul>';
					echo '<br/>';
                    echo '<button class="demo-btn" id="go-to-result-test-save" href="">Создать личный кабинет</button>';
                    echo '</div>';
				}
				else{					
                    echo '<h2 class="pagename">Личный кабинет</h2>';
                    echo '<h1 class="pagename">Мои документы</h1>';
				}
			?>
			<!-- /DEMO PART -->

            <!--
                <div class="video-area">
                    <div class="play-icon">
                        <i class="fa fa-play-circle-o fa-3x" aria-hidden="true"></i>
                    </div>
                    <p>Видеораспаковка: заголовок внутри видео</p>
                </div>
            -->
        </section>
    </div>
    <div class="content">
        <section class="row">
            <div class="line"><span class="title">История моего здоровья</span><br>
                <?php
                    echo '<input class="download" type="submit" value="Скачать все" onClick="get_zip(\''.$folder.'\');">';
                    echo '<input class="add" type="submit" value="+ Добавить" onClick="add_file('.$demo.');">';
                    include_once("download_file_form.php");
                ?>
                <p>Информация об анализах, обследованиях и лечении в хронологическом порядке</p>
            </div>
            <div class="line"><span class="title">Найти</span><br>
                <div class="date-field">
                    <span class="search-text">Дата</span><br>
                    <input type="date" id="upload_search_date">
                </div>
                <div class="type-field">
                    <span class="search-text">Вид</span><br>            
                    <select id="upload_search_type">
                        <option>Показать все</option>
                        <?php
                            while($upload_type_row = $get_upload_types_for_search->fetch(PDO::FETCH_ASSOC)){
                                echo '<option>'.$upload_type_row['upload_type_name'].'</option>';
                            }
                        ?>
                    </select>
                </div>
                <div class="title-field">
                    <span class="search-text">Название</span><br>
                    <input type="text" id="upload_search_title">
                </div>
                <div class = "search-button">
                    <button class="search" type="submit" onClick="filter_files();"><i class="fa fa-search" aria-hidden="true"></i> Найти</button>
                </div>
            </div>
        </section>
    </div>
    <table class="docs">
        <tbody id="files_list">
            <?php
                try{  
                    if(count($files_arr) > 0){
                    echo '
                        <tr>
                            <th>Дата</th>
                            <th>Вид</th>
                            <th>Название</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>';
                    
                    foreach($files_arr as $file => $file_data){
                        $filepath = $folder.$file.'.'.$file_data['extension'];
                        echo
                        '<tr class="file_row">
                            <td class="document-date">'.$file_data['date'].'</td>
                            <td class="document-type">'.$file_data['type'].'</td>
                            <td class="document-name">'.$file_data['name'].'</td>
                            <td><input type="submit" value="Открыть" onClick="view_user_upload(\''.$filepath.'\');" class="open"></td>
                            <td><a href="user_upload_management.php?download_file='.$filepath.'" class="download-button"><i class="fa fa-download"></i></a></td>
                            <td><a href="#" class="delete-button" onClick="delete_user_upload(\''.$filepath.'\', \''.$file_data['name'].'\', '.$demo.');"><i class="fa fa-times-circle"></i></a></td>
                        </tr>';
                    }
                    }
                }
                catch(Exception $e) {
                    //return $e->getMessage();
                }
            ?>
        </tbody>
    </table>
    <hr>       
	<?php
		include("footer.php");
	?>
    </div>
    </div>
</body>
</html>