<?php
    if ($user->is_logged_in()) {
        $btn_cls = "button-registered-wip";
    } else {
        $btn_cls = "button-unregistered-wip";
    }
?>

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
    <h1>Консультация со специалистом</h1>
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

        <table class="coaches">
            <tbody>
                <tr>
                    <th></th>
                    <th></th>
                    <th>имя</th>
                    <th>о себе</th>
                    <th>услуги и цены</th>
                    <th></th>
                </tr>
                <tr>
                    <td>Фитнес тренер</td>
                    <td>
                        <img src="images/services/spec-1.jpg">
                    </td>
                    <td>
                        <p class="coach-name">Веденеева Юлия Андреевна</p>
                        <p class="rating">
                            <span class="rating-num">4,2</span>
                            <span>Рейтинг</span>
                        </p>
                        <p class="coach-reviews <?php echo $btn_cls; ?>">отзывы</p>
                    </td>
                    <td class="coach-desc">
                        Пилатес. Расслабление,
                        устранение болей.
                        Работа со спиной,
                        стопами, суставами,
                        ребрами. 
                        Укрепление мышц.
                        Работа с беременными.
                    </td>
                    <td>
                        <p>Фитнес</p>
                        <p>2 500 р/час</p>
                    </td>
                    <td>
                        <button type="button" class="<?php echo $btn_cls; ?>">Написать сообщение</button>
                        <span class="access-text">Доступ к данным</span>
                        <label class="switch">
                            <input type="checkbox">
                            <span class="slider"></span>
					    </label>
                    </td>
                </tr>
                <tr>
                    <td class="coaches-more" colspan="6">
                        <span class="<?php echo $btn_cls; ?>">еще фитнес тренеры >></span>
                    </td>
                </tr>
                <tr>
                    <td>Диетолог</td>
                    <td>
                        <img src="images/services/spec-2.jpg">
                    </td>
                    <td>
                        <p class="coach-name">Антонова Елена Александровна</p>
                        <p class="rating">
                            <span class="rating-num">5,0</span>
                            <span>Рейтинг</span>
                        </p>
                        <p class="coach-reviews <?php echo $btn_cls; ?>">отзывы</p>
                    </td>
                    <td class="coach-desc">
                    Работа онлайн. Составляю план диетотерапии на основе ваших данных. Расчет БЖУ, калорийности, рекомендации по питанию и физическим нагрузкам, рацион.
                    </td>
                    <td>
                        <p>Консультация</p>
                        <p>2 000р/час</p>
                    </td>
                    <td>
                        <button type="button" class="<?php echo $btn_cls; ?>">Написать сообщение</button>
                        <span class="access-text">Доступ к данным</span>
                        <label class="switch">
                            <input type="checkbox">
                            <span class="slider"></span>
					    </label>
                    </td>
                </tr>
                <tr>
                    <td class="coaches-more" colspan="6">
                        <span class="<?php echo $btn_cls; ?>">еще диетологи >></span>
                    </td>
                </tr>
                <tr>
                    <td>ЗОЖ коуч</td>
                    <td>
                        <img src="images/services/spec-3.jpg">
                    </td>
                    <td>
                        <p class="coach-name">Кулакова Оксана Александровна</p>
                        <p class="rating">
                            <span class="rating-num">5,0</span>
                            <span>Рейтинг</span>
                        </p>
                        <p class="coach-reviews <?php echo $btn_cls; ?>">отзывы</p>
                    </td>
                    <td class="coach-desc">
                    Профессионально работаю с вашим подсознанием.
Практика работы с 2009 года.За многолетнюю практику создала уникальную методику, которая даёт каждому клиенту нужные результаты.
                    </td>
                    <td>
                        <p>Консультация</p>
                        <p>3500 р/час</p>
                    </td>
                    <td>
                        <button type="button" class="<?php echo $btn_cls; ?>">Написать сообщение</button>
                        <span class="access-text">Доступ к данным</span>
                        <label class="switch">
                            <input type="checkbox">
                            <span class="slider"></span>
					    </label>
                    </td>
                </tr>
                <tr>
                    <td class="coaches-more" colspan="6">
                        <span class="<?php echo $btn_cls; ?>">еще зож коучи >></span>
                    </td>
                </tr>
                <tr>
                    <td>Вэлнесс тренер</td>
                    <td>
                        <img src="images/services/spec-4.png">
                    </td>
                    <td>
                        <p class="coach-name">Савенко Марина Сергеевна</p>
                        <p class="rating">
                            <span class="rating-num">4,7</span>
                            <span>Рейтинг</span>
                        </p>
                        <p class="coach-reviews <?php echo $btn_cls; ?>">отзывы</p>
                    </td>
                    <td class="coach-desc">
                    Индивидуальный подход, онлайн-сопровождение клиентов до результата, пунктуальность, ответственность.
                    </td>
                    <td>
                        <p>Консультация + тренировка</p>
                        <p>3000 р/час</p>
                    </td>
                    <td>
                        <button type="button" class="<?php echo $btn_cls; ?>">Написать сообщение</button>
                        <span class="access-text">Доступ к данным</span>
                        <label class="switch">
                            <input type="checkbox">
                            <span class="slider"></span>
					    </label>
                    </td>
                </tr>
                <tr>
                    <td class="coaches-more" colspan="6">
                        <span class="<?php echo $btn_cls; ?>">еще вэлнесс тренеры >></span>
                    </td>
                </tr>
            </tbody>
        </table>

        <?php
                            if($user->is_logged_in()) {
                                echo '<button type="submit" onclick="send_notification(\'Контроль веса\nКонсультация с диетологом\')">Заказать</button>';
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
            echo '<button class="button-center"  onclick="send_notification(\'Контроль веса\nТвой дневник\')">Начать</button>';
        } else {
            echo '<p>Чтобы воспользоваться данным сервисом, необходимо <a href="test.php#register">создать личный кабинет.</a></p><br>';
        }
    ?>
</div>