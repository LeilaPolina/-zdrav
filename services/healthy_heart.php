<img class="img-center" src="images/video_cap.PNG">
<h1>Отправить файл ЭКГ для расшифровки врачу кардиологу</h1>
<div class="cardio-form">
    <div class="heart-date-field">
        <p>Дата</p>
        <input type="date">
    </div>

    <div class="heart-file-field">
        <p>Загрузить файл</p>
    </div>

    <button class="inline heart-btn-search">
        <i class="fa fa-search" aria-hidden="true"></i>
        Найти
    </button>
    <?php
        if ($user->is_logged_in()) {
            echo '<button class="inline heart-btn-send button-registered-wip" onclick="send_notification(\'Здоровое сердце\nЭКГ для расшифровки врачу кардиологу\')">Отправить</button>';
        } else {
            echo '<button class="inline heart-btn-send button-unregistered-wip" onclick="send_notification(\'Здоровое сердце\nЭКГ для расшифровки врачу кардиологу\')">Отправить</button>';
        }
    ?>
</div>

<p>
    <i class="fa fa-info-circle"></i> Перед расшифровкой данных ЭКГ кардиолог ознакомится с показателями вашего здоровья
    <br>введенными в программу, результатами анализов и обследований.</p>
<hr class="hr-indent">
<p class="inline heart-info">
    <i class="fa fa-check" aria-hidden="true"></i>
    <strong>Комплекс анализов «Кардиологический»</strong> позволит составить наиболее полную картину состояния сердца и дать более
    точный прогноз возможных изменений</p>
<button class="inline heart-order-btn" onclick="send_notification('Здоровое сердце\nКомплекс анализов «Кардиологический»')">Заказать</button>
<hr class="hr-indent">
<p class="inline heart-info">
    <i class="fa fa-check" aria-hidden="true"></i>
    <strong>Домашний ЭКГ монитор Heal Force Prince 180B</strong> с возможностью выгрузить кардиограмму можно приобрести в нашем магазине</p>
<button class="inline heart-order-btn" onclick="window.open('http://s.click.aliexpress.com/e/MN7AMbQ','_blank');">Купить</button>
<hr class="hr-indent">
<p>
    <i class="fa fa-info-circle"></i> Результаты расшифровки будут загружены в раздел «Мои мед документы» в течение 2-х дней.
    <br>О готовности мы известим вас по СМС</p>