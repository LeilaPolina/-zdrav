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
<img class="img-center" src="images/banners/healthy_food_1.png">
<img class="img-center" src="images/banners/healthy_food_2.png">
<br>
<button class="button-center" onclick="window.open('https://www.justfood.pro/','_blank');">Подробнее</button>