<p>Сервис находится в разработке</p>
                    <!--
                    <p>Иммунная и эндокринная (гормоны) системы организма тесно взаимозависимы.<br>
                    Поэтому для приведения иммунитета в норму прежде всего необходимо оценить их состояние.</p>
                    <div class="service-analyses">
                        <h1>Для этого мы рекомендуем сдать комплексы анализов</h1>
                        <?php
                            if($user_sex == "male" || $user_sex == "м"){
                                echo '<label class="container">';
                                echo '<input type="checkbox" checked="checked">';
                                echo '<span class="checkmark"></span>';
                                echo '<span>Гормональный профиль для мужчин</span>';
                                echo '</label>';
                                echo '<div class="info-right">';
                                echo '<div class="questionmark hormones-m-hover-info">';
                                echo '<span class="tooltip-content">Рекомендовано сдавать данный анализ для поддержания
                                иммунитета и эндокринной системы в норме (до 40 лет – 1 раз
                                в 2 года, 40-60 лет 1 раз в год, старше 60 лет 1 раз в пол года)</span>';
                                echo '</div>';
                                echo '<a class="hormones-m-info btn-info">Подробнее</a>';
                                echo '</div><br>';
                            } else {
                                echo '<label class="container">';
                                echo '<input type="checkbox" checked="checked">';
                                echo '<span class="checkmark"></span>';
                                echo '<span>Гормональный профиль для женщин</span>';
                                echo '</label>';
                                echo '<div class="info-right">';
                                echo '<div class="questionmark hormones-f-hover-info">';
                                echo '<span class="tooltip-content">Рекомендовано сдавать данный анализ для поддержания
                                иммунитета и эндокринной системы в норме (до 40 лет – 1 раз
                                в 2 года, 40-60 лет 1 раз в год, старше 60 лет 1 раз в пол года)</span>';
                                echo '</div>';
                                echo '<a class="hormones-f-info btn-info">Подробнее</a>';
                                echo '</div><br>';
                            }
                        ?>
                        <label class="container">
                            <input type="checkbox" checked="checked">
                            <span class="checkmark"></span>
                            <span>Комплексный анализ на витамины (А, D, E, K, C, B1, B5, B6, B9, B12)</span>
                        </label>

                        <div class="info-right">
                            <div class="questionmark vitamins-hover-info">
                                <span class="tooltip-content">Рекомендовано сдавать данный анализ для поддержания иммунитета и эндокринной системы в норме (до 40 лет – 1 раз в 2 года, 40-60 лет 1 раз в год, старше 60 лет 1 раз в пол года)</span>
                            </div>
                            <a class="vitamins-info btn-info">Подробнее</a>
                        </div><br>
                    </div>
                    <div class="contact">
                    <?php
                        if($user->is_logged_in()) {
                            echo '<div class="contact-column-left">';
                            echo '<button type="submit">Заказать</button>';
                            echo '</div>';
                            echo '<div class="contact-column-right">';
                            echo '<p><i class="fa fa-info-circle"></i> В расшифрованных  результатах анализов вы увидите какие гормоны и витамины в норме, а какие нет.</p>';
                            echo '<p>После этого вы сможете получить онлайн консультацию иммунолога-эндокринолога</p>';
                            echo '</div>';
                            } else {
                            echo '<p>Чтобы воспользоваться данным сервисом, необходимо <a href="test.php#register">создать личный кабинет.</a></p>';
                        }
                    ?>
                    </div>
                    <h1>Консультация с Иммунологом-эндокринологом</h1>
                    <div class="contact">
                        <div class="contact-column-left">
                            <label class="container-radio">
                                <input type="radio" name="contact" value="video">
                                <span class="checkmark-radio"></span>
                                <span>Видеоконсультация</span>
                            </label><br>
                                      
                            <label class="container-radio">
                                <input type="radio" name="contact" value="chat">
                                <span class="checkmark-radio"></span>
                                <span>Чат</span>
                            </label><br>
                                      
                            <label class="container-radio">
                                <input type="radio" name="contact" value="phone" checked="checked">
                                <span class="checkmark-radio"></span>
                                <span>Телефон</span>
                            </label>
                        </div>
                        <div class="contact-column-right">
                            <p><i class="fa fa-info-circle"></i> Перед консультацией специалист ознакомится с показателями вашего здоровья введенными в программу, результатами анализов и обследований.</p>
                            <p>Результаты консультации будут помещены в раздел Мои документы и всегда вам доступны</p>
                        </div>
                        <?php
                        if($user->is_logged_in()) {
                            echo '<button type="submit">Заказать</button>';
                            } else {
                                echo '<p>Чтобы воспользоваться данным сервисом, необходимо <a href="test.php#register">создать личный кабинет.</a></p>';
                            }
                        ?>
                    </div>
                    -->