<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Документы</title>
    <link rel="stylesheet" href="css/test.css">
    <link rel="stylesheet" href="css/docs.css">
    <script src="jquery/jquery-3.1.1.min.js"></script>
    <script src="jquery/jquery.maskedinput.min.js"></script>
	<!-- FINISH -->
	
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans" />
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
	
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