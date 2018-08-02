                    <p>Прямо сейчас вы можете заказать сдачу анализов дома или в офисе с бесплатным выездом при заказе от 1500р</p>
                    <p>Сделав заказ на нашем сайте по цене лаборатории, Вы получите бесплатную автоматическую расшифровку с пояснениями причин возможных отклонений.</p>
                    <p>Мы сотрудничаем с одной из крупнейших федеральных лабораторий <strong>KDL</strong> <img class="img-inline" src="images/icons/kdl_logo.png"></p>
                    <div class="service-analyses">
                        <h1>По результатам теста вам рекомендуется сдать следующие анализы</h1>

                        <label class="container-checkbox">
                            <input type="checkbox" checked="checked" class="analysis-checkbox">
                            <span class="checkmark"></span>
                            <span>Биохимическй анализ крови</span>
                        </label>

                        <div class="info-right">
                            <div class="analysis-price">3780 руб.</div>
                            <div class="questionmark">
                                <span class="tooltip-content">Рекомендовано сдавать данный анализ (до 40 лет – 1 раз в 2 года, 40-60 лет 1 раз в год, старше 60 лет 1 раз в пол года)</span>
                            </div>
                            <a class="blood btn-info">Подробнее</a>
                        </div><br>
                        <label class="container-checkbox">
                            <input type="checkbox" checked="checked" class="analysis-checkbox">
                            <span class="checkmark"></span>
                            <span>Общий анализ мочи</span>
                        </label>

                        <div class="info-right">
                            <div class="analysis-price">340 руб.</div>
                            <div class="questionmark">
                                <span class="tooltip-content">Рекомендовано сдавать данный анализ (до 40 лет – 1 раз в 2 года, 40-60 лет 1 раз в год, старше 60 лет 1 раз в пол года)</span>
                            </div>
                            <a class="pee btn-info">Подробнее</a>
                        </div><br>
                        <label class="container-checkbox">
                            <input type="checkbox" class="analysis-checkbox">
                            <span class="checkmark"></span>
                            <span>Гастрокомплекс</span>
                        </label>

                        <div class="info-right">
                            <div class="analysis-price">3240 руб.</div>
                            <div class="questionmark">
                                <span class="tooltip-content">Рекомендовано сдавать данный анализ на основании возможной генетической предрасположенности к <strong>заболеваниям ЖКТ</strong> (до 40 лет – 1 раз в 2 года, 40-60 лет 1 раз в год, старше 60 лет 1 раз в пол года)</span>
                            </div>
                            <a class="gastro btn-info">Подробнее</a>
                        </div><br>
                        <label class="container-checkbox">
                            <?php
                                if($an_gastro){
                                    echo '<input type="checkbox" checked="checked" class="analysis-checkbox">';
                                }
                                else{
                                    echo '<input type="checkbox" class="analysis-checkbox">';
                                }
                            ?>
                            <span class="checkmark"></span>
                            <span>Диагностика диабета, биохимический</span>
                        </label>

                        <div class="info-right">
                            <div class="analysis-price">4220 руб.</div>
                            <div class="questionmark">
                                <span class="tooltip-content">Рекомендовано сдавать данный анализ на основании возможной генетической предрасположенности к <strong>диабету</strong> (до 40 лет – 1 раз в 2 года, 40-60 лет 1 раз в год, старше 60 лет 1 раз в пол года)</span>
                            </div>
                            <a class="diabetes btn-info">Подробнее</a>
                        </div><br>
                        <label class="container-checkbox">
                            <?php
                                if($an_cardio){
                                    echo '<input type="checkbox" checked="checked" class="analysis-checkbox">';
                                }
                                else{
                                    echo '<input type="checkbox" class="analysis-checkbox">';
                                }
                            ?>
                            <span class="checkmark"></span>
                            <span>Кардиологический</span>
                        </label>

                        <div class="info-right">
                            <div class="analysis-price">5530 руб.</div>
                            <div class="questionmark">
                                <span class="tooltip-content">Рекомендовано сдавать данный анализ на основании возможной генетической предрасположенности к заболеваниям <strong>сердечно сосудистой системы</strong> (до 40 лет – 1 раз в 2 года, 40-60 лет 1 раз в год, старше 60 лет 1 раз в пол года)</span>
                            </div>
                            <a class="cardio btn-info">Подробнее</a>
                        </div><br>
                        <label class="container-checkbox">
                            <?php
                                if($an_onco_m){
                                    echo '<input type="checkbox" checked="checked" class="analysis-checkbox">';
                                }
                                else{
                                    echo '<input type="checkbox" class="analysis-checkbox">';
                                }
                            ?>
                            <span class="checkmark"></span>
                            <span>Онкологический для мужчин, биохимический</span>
                        </label>

                        <div class="info-right">
                            <div class="analysis-price">3910 руб.</div>
                            <div class="questionmark">
                                <span class="tooltip-content">Рекомендовано сдавать данный анализ на основании возможной генетической предрасположенности к <strong>раковым</strong> заболеваниям (до 40 лет – 1 раз в 2 года, 40-60 лет 1 раз в год, старше 60 лет 1 раз в пол года)</span>
                            </div>
                            <a class="onco_m btn-info">Подробнее</a>
                        </div><br>
                        <label class="container-checkbox">
                            <?php
                                if($an_onco_f){
                                    echo '<input type="checkbox" checked="checked" class="analysis-checkbox">';
                                }
                                else{
                                    echo '<input type="checkbox" class="analysis-checkbox">';
                                }
                            ?>
                            <span class="checkmark"></span>
                            <span>Онкологический для женщин, биохимический</span>
                        </label>

                        <div class="info-right">
                            <div class="analysis-price">5720 руб.</div>
                            <div class="questionmark">
                                <span class="tooltip-content">Рекомендовано сдавать данный анализ на основании возможной генетической предрасположенности к <strong>раковым</strong> заболеваниям (до 40 лет – 1 раз в 2 года, 40-60 лет 1 раз в год, старше 60 лет 1 раз в пол года)</span>
                            </div>
                            <a class="onco_f btn-info">Подробнее</a>
                        </div><br>
                        <label class="container-checkbox">
                            <?php
                                if($an_vessels){
                                    echo '<input type="checkbox" checked="checked" class="analysis-checkbox">';
                                }
                                else{
                                    echo '<input type="checkbox" class="analysis-checkbox">';
                                }
                            ?>
                            <span class="checkmark"></span>
                            <span>Диагностика сосудистых заболеваний головного мозга</span>
                        </label>

                        <div class="info-right">
                            <div class="analysis-price">4610 руб.</div>
                            <div class="questionmark">
                                <span class="tooltip-content">Рекомендовано сдавать данный анализ на основании возможной генетической предрасположенности к заболеваниям <strong>сосудистой системы головного мозга</strong> (до 40 лет – 1 раз в 2 года, 40-60 лет 1 раз в год, старше 60 лет 1 раз в пол года)</span>
                            </div>
                            <a class="vessels btn-info">Подробнее</a>
                        </div><br>
                        
                        <label class="container-checkbox">
                            <?php
                                if($an_hormones_m){
                                    echo '<input type="checkbox" checked="checked" class="analysis-checkbox">';
                                }
                                else{
                                    echo '<input type="checkbox" class="analysis-checkbox">';
                                }
                            ?>
                            <span class="checkmark"></span>
                            <span>Гормональный профиль (комплекс) для мужчин</span>
                        </label>

                        <div class="info-right">
                            <div class="analysis-price">2880 руб.</div>
                            <div class="questionmark">
                                <span class="tooltip-content">Рекомендовано сдавать данный анализ для поддержания иммунитета и эндокринной системы в норме (до 40 лет – 1 раз в 2 года, 40-60 лет 1 раз в год, старше 60 лет 1 раз в пол года)</span>
                            </div>
                            <a class="hormones_m btn-info">Подробнее</a>
                        </div><br>
                        <label class="container-checkbox">
                            <?php
                                if($an_hormones_f){
                                    echo '<input type="checkbox" checked="checked" class="analysis-checkbox">';
                                }
                                else{
                                    echo '<input type="checkbox" class="analysis-checkbox">';
                                }
                            ?>
                            <span class="checkmark"></span>
                            <span>Гормональный профиль (комплекс) для женщин</span>
                        </label>

                        <div class="info-right">
                            <div class="analysis-price">6140 руб.</div>
                            <div class="questionmark">
                                <span class="tooltip-content">Рекомендовано сдавать данный анализ для поддержания иммунитета и эндокринной системы в норме (до 40 лет – 1 раз в 2 года, 40-60 лет 1 раз в год, старше 60 лет 1 раз в пол года)</span>
                            </div>
                            <a class="hormones_f btn-info">Подробнее</a>
                        </div><br>
                        <label class="container-checkbox">
                            <?php
                                if($an_vitamins){
                                    echo '<input type="checkbox" checked="checked" class="analysis-checkbox">';
                                }
                                else{
                                    echo '<input type="checkbox" class="analysis-checkbox">';
                                }
                            ?>
                            <span class="checkmark"></span>
                            <span>Комплексный анализ крови на витамины (A, D, E, K, C, B1, B5, B6, В9, B12)</span>
                        </label>

                        <div class="info-right">
                            <div class="analysis-price">15500 руб.</div>
                            <div class="questionmark">
                                <span class="tooltip-content">Рекомендовано сдавать данный анализ для поддержания иммунитета и эндокринной системы в норме (до 40 лет – 1 раз в 2 года, 40-60 лет 1 раз в год, старше 60 лет 1 раз в пол года)</span>
                            </div>
                            <a class="vitamins btn-info">Подробнее</a>
                        </div><br>

                        <p class="total">ИТОГО</p>
                        <p class="total-number" id="an-price"></p>
                        </div>

                        <p>Сдать анализы в лаборатории КДЛ можно в любом отделении на территории России или дома, визит сестры для приема анализов бесплатный.</p>

                        <div class="contact">
                        <div class="contact-column-left">
                            <button class="button-wider" type="submit">Заказать</button>
                            <p class="order-info">Кэшбэк <strong id="an-cashback"></strong> (3%)</p>
                            <p class="order btn-info">Подробнее о заказе</p>
                        </div>
                        <div class="contact-column-right">
                            <p><i class="fa fa-info-circle"></i> В течение 2-3 дней после сдачи расшифрованные данные анализов и рекомендации появятся в разделе Мое здоровье в цифрах, а сам бланк можно будет посмотреть и скачать в разделе Мои мед документы</p>
                            <p><i class="fa fa-info-circle"></i> Мы не сотрудничаем с врачами и клиниками, не рекламируем и не рекомендуем их. Результаты расшифровки анализов носят информационный характер, не ставят диагнозов, не назначают лечение, а лишь рекомендуют оборащение к врачу в случае необходимости.</p>
                        </div>
                        </div>