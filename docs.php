<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Документы</title>
    <link rel="stylesheet" href="css/test.css">
    <link rel="stylesheet" href="css/docs.css">
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
    <div class="content">
        <section class="row">
            <h2 class="pagename">Личный кабинет</h2>
            <h1 class="pagename">Мои документы</h1>
            <div class="background-gray" style="height: 227px; width: 421px; margin: 0 auto 20px auto;">
                <p><i class="fa fa-play-circle-o fa-3x" aria-hidden="true"></i><br>Видеораспаковка: заголовок внутри видео</p>
                </div>
        </section>
    </div>
    <div class="content">
        <section class="row">
            <div class="line"><span class="title">История моего здоровья</span><br>
                <input class="download" type="submit" value="Скачать все">
                <input class="add" type="submit" value="+Добавить">
                <p>Информация об анализах, обследованиях и лечении в хронологическом порядке</p>
            </div>
            <div class="line"><span class="title">Найти</span><br>
                <div style="float:left; width: 15%;">
                    <span style="margin: 5px 0; display: inline-block;">Дата</span><br>
                    <input type="text" style="margin-bottom: 30px;">
                </div>
                <div style="float:left; margin-left: 2%; width: 28%;">
                    <span style="margin: 5px 0; display: inline-block;">Вид</span><br>
                    <select>
                        <option>Пункт 2</option>
                        <option>Пункт 1</option>
                    </select>
                </div>
                <div style="float:left; margin-left: 2%; width: 38%;">
                    <span style="margin: 5px 0; display: inline-block;">Название</span><br>
                    <input type="text">
                </div>
                <div style="float:right; margin-left: 2%; margin-top: 28px; width: 13%">
                    <input class="find" type="submit" value="Найти">
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
                <td width="150px">22 марта 2018</td>
                <td width="180px">Холестерин общий</td>
                <td>Название довольно длинное может быть</td>
                <td><input class="open" type="submit" value="Открыть"></td>
                <td><a href="#" style="float:right;"><i class="fa fa-download"></i></a></td>
                
                <td><a href="#" style="float:right; margin-right: 10px;"><i class="fa fa-times-circle"></i></a></td>
            </tr>
            <tr>
                <td width="150px">22 марта 2018</td>
                <td width="180px">Сахар</td>
                <td>Название довольно длинное может быть</td>
                <td><input class="open" type="submit" value="Открыть"></td>
                <td><a href="#" style="float:right;"><i class="fa fa-download"></i></a></td>
                
                <td><a href="#" style="float:right; margin-right: 10px;"><i class="fa fa-times-circle"></i></a></td>
            </tr>
        </tbody>
    </table>
    <footer>
        <div class="footer">
            <section class="row">
            <div class="col-1-3" style="height: 280px;">
                <div class="content-box" style="text-align: left; vertical-align: middle; padding: 60px 30px;">
                    <div class="soc"><a href="#"><i class="fa fa-odnoklassniki" aria-hidden="true"></i></a></div>
                    <div class="soc"><a href="#"><i class="fa fa-vk" aria-hidden="true"></i></a></div>
                    <div class="soc"><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></div>
                    <div class="soc"><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></div><br>
                    <h1 style="margin-bottom: 5px;">+7 495 131-32-73</h1>
                    <p>2016-2018 ООО «Здравствую»</p>
                </div>
            </div>
            <div class="col-1-3">
                <div class="content-box" style="text-align: left">
                    <h1>Здравствую</h1>
                    <ul>
                        <li><a href="#">О нас</a></li>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Отзывы о сервисе</a></li>
                        <li><a href="#">Партнерская программа</a></li>
                        <li><a href="#">Команда</a></li>
                        <li><a href="#">Контакты</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-1-3">
                <div class="content-box" style="text-align: left">
                    <h1>Документы</h1>
                    <ul>
                        <li><a href="#">Миссия, цель, ценности</a></li>
                        <li><a href="#">Правила использования</a></li>
                        <li><a href="#">Обработка персональных данных</a></li>
                    </ul>
                </div>
            </div>
        </section>
        </div>
    </footer>
</body>
</html>