<img class="img-center" src="images/video_cap.PNG">
<h1>Программы по контролю за весом</h1>
<form name="weight-inf">
    <div id="weight-numbers">
        <div class="weight-form-column">
            <p>Текущий вес, кг</p>
            <input type="text" id="current-weight" name="current-weight" value="<?php echo $user_weight ?>">
        </div>
        <div class="weight-form-column">
            <p>Индекс массы</p>
            <h1 id="mass-index">
                <?php echo ("= " . $index_mass); ?>
            </h1>
        </div>
        <div class="weight-form-column">
            <p>Оптимальный вес</p>
            <h1 id="optimal-weight">
                <?php echo round(pow($user_height/100, 2)*20 , 0, PHP_ROUND_HALF_DOWN); ?>-
                <?php echo round(pow($user_height/100, 2)*24 , 0, PHP_ROUND_HALF_DOWN); ?> кг</h1>
        </div>
        <div class="weight-form-column">
            <img src="images/icons/fast_forward_arrows.svg">
        </div>
        <div class="weight-form-column">
            <p>Желаемый вес</p>
            <input type="text" id="desired-weight" name="desired-weight">
        </div>
    </div>
    <h1>Консультация с диетологом</h1>
    <div class="contact">
        <div class="contact-column-left">
            <label class="container-radio">
                <input type="radio" name="contact" value="video">
                <span class="checkmark-radio"></span>
                <span>Видеоконсультация</span>
            </label>
            <br>

            <label class="container-radio">
                <input type="radio" name="contact" value="chat">
                <span class="checkmark-radio"></span>
                <span>Чат</span>
            </label>
            <br>

            <label class="container-radio">
                <input type="radio" name="contact" value="phone" checked="checked">
                <span class="checkmark-radio"></span>
                <span>Телефон</span>
            </label>
        </div>
        <div class="contact-column-right">
            <p>
                <i class="fa fa-info-circle"></i> Перед консультацией специалист ознакомится с показателями вашего здоровья введенными в программу, результатами
                анализов и обследований.</p>
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
    <p>
        Вы можете воспользоваться сервисом Дневник питания и тренировок совершенно бесплатно. Для этого необходимо пройти по ссылке,
        пройти дополнительную регистрацию и ознакомиться с 5-ю шагами к контролю над весом.
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
</div>