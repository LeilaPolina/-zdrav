<h1>Аутсорсинг здоровья</h1>
                    <p>Подключив данный сервис вы получите персонального удаленного помощника для<br>контроля над здоровьем</p>
                    <p>Помощник не является врачом. его цель помочь вам привести здоровье в норму и<br>сохранить его на долгие годы</p>
                    <h1>Как это работает?</h1>
                    <p><i class="fa fa-check" aria-hidden="true"></i>вы подключаете и оплачиваете услугу Персональный Менеджер Здоровья (ПМЗ)</p>
                    <p><i class="fa fa-check" aria-hidden="true"></i>ПМЗ знакомится с данными которые вы ввели в Личный кабинет</p>
                    <p><i class="fa fa-check" aria-hidden="true"></i>в удобное для вас время он с вами связывается наиболее удобным для вас способом<br>(телефон, почта, месенджеры)</p>
                    <p><i class="fa fa-check" aria-hidden="true"></i>задает ряд вопросов для уточнения вашего текущего состояния и пожелания по<br>изменению состояния (провести полную профилактику, снизить вес, улучшить фигуру,<br>подправить показания анализов, подлечить органы и др )</p>
                    <p><i class="fa fa-check" aria-hidden="true"></i>ПМЗ предлагает вам план конкретных действий, вы его одобряете или совместно<br>корректируете</p>
                    <p><i class="fa fa-check" aria-hidden="true"></i>ПМЗ находит для Вас наиболее подходящие вам клиники, курсы, специалистов и пр.<br>записывает вас к ним, составляет удобный для вас график</p>
                    <p><i class="fa fa-check" aria-hidden="true"></i>связывается с вами в соответствии с графиком и помогает дойти до результата</p>
                    <h1>Стоимость услуги</h1>
                    <p><span class="text-bold">3 000 руб.</span> за составление плана и графика</p>
                    <p><span class="text-bold">2 000 руб.</span> за месяц поддержки</p>
                    <p><span class="text-bold">18 000 руб.</span> при оплате за год + составление плана-графика бесплатно <span class="text-bold text-green">(экономия 33%)</span></p>
                    <?php
                            if($user->is_logged_in()) {
                                echo '<button class="button-registered-wip" onclick="send_notification(\'Персональный менеджер\')">Подключить</button>';
                            } else {
                                echo '<button class="button-unregistered-wip" onclick="send_notification(\'Персональный менеджер\')">Подключить</button>';
                            }
                    ?>