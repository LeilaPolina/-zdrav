                    <p class="inline">Данная услуга предоставляется совместно с нашим партнером клиникой </p>
                    <img src="images/icons/neomed_logo.png" class="img-inline neomed-logo">
                    <h1>В стандартный домашний медосмотр входят следующие процедуры</h1>
                    <div class="checkup-list inline">
                        <p><i class="fa fa-check" aria-hidden="true"></i>Измерение веса и роста</p>
                        <p><i class="fa fa-check" aria-hidden="true"></i>Измерение давления</p>
                        <p><i class="fa fa-check" aria-hidden="true"></i>Экспресс анализ на сахар, холестерин, гемоглобин</p>
                        <p><i class="fa fa-check" aria-hidden="true"></i>ЭКГ (проверка сердца)</p>
                        <p><i class="fa fa-check" aria-hidden="true"></i>Проверка зрения</p>
                    </div>
                    <div class="inline">
                        <img src="images/home_checkup.png" class="inline img-checkup">
                    </div>
                    <hr>
                    <p class="total">Стоимость</p> <p class="checkup-pre-price">5900 руб.</p>
                    <h1 class="additional">Дополнительно можно провести следующие обследования:</h1>
                    
                    <label class="container-checkbox">
                            <input type="checkbox" checked="checked" class="checkup-checkbox" id="uzi-stomach">
                            <span class="checkmark"></span>
                            <span>УЗИ брюшной полости на дому</span>
                    </label>

                    <div class="info-right">
                        <div class="uzi-price">+ 1500 руб.</div>
                    </div>
                    <div class="uzi-stomach-additional">
                        <p>железу поджелудочную;</p>
                        <p>орган-депо желчи;</p>
                        <p>почки и зону надпочечников;</p>
                        <p>печень;</p>
                        <p>селезенку.</p>
                    </div>

                    <label class="container-checkbox">
                            <?php
                                if($ch_uzi_liver){
                                    echo '<input type="checkbox" checked="checked" class="checkup-checkbox" id="uzi-liver">';
                                }
                                else{
                                    echo '<input type="checkbox" class="checkup-checkbox" id="uzi-liver">';
                                }
                            ?>
                            <span class="checkmark"></span>
                            <span>УЗИ печени и желчного органа</span>
                    </label>

                    <div class="info-right">
                        <div class="uzi-price">+ 1500 руб.</div>
                    </div><br>

                    <label class="container-checkbox">
                            <input type="checkbox" checked="checked" class="checkup-checkbox" id="uzi-pee">
                            <span class="checkmark"></span>
                            <span>УЗИ мочевого органа и мочеточников</span>
                    </label>

                    <div class="info-right">
                        <div class="uzi-price">+ 1500 руб.</div>
                    </div><br>

                    <label class="container-checkbox">
                            <?php
                                if($ch_uzi_vessels){
                                    echo '<input type="checkbox" checked="checked" class="checkup-checkbox" id="uzi-vessels">';
                                }
                                else{
                                    echo '<input type="checkbox" class="checkup-checkbox" id="uzi-vessels">';
                                }
                            ?>
                            <span class="checkmark"></span>
                            <span>УЗИ сосудов нижних конечностей (вены + артерии)</span>
                    </label>

                    <div class="info-right">
                        <div class="uzi-price">+ 1500 руб.</div>
                    </div><br>

                    <label class="container-checkbox">
                            <?php
                                if($ch_uzi_heart){
                                    echo '<input type="checkbox" checked="checked" class="checkup-checkbox" id="uzi-heart">';
                                }
                                else{
                                    echo '<input type="checkbox" class="checkup-checkbox" id="uzi-heart">';
                                }
                            ?>
                            <span class="checkmark"></span>
                            <span>УЗИ сердца</span>
                    </label>

                    <div class="info-right">
                        <div class="uzi-price">+ 2000 руб.</div>
                    </div><br>

                    <label class="container-checkbox">
                            <?php
                                if($ch_xray_lungs){
                                    echo '<input type="checkbox" checked="checked" class="checkup-checkbox" id="uzi-lungs">';
                                }
                                else{
                                    echo '<input type="checkbox" class="checkup-checkbox" id="uzi-lungs">';
                                }
                            ?>
                            <span class="checkmark"></span>
                            <span>Рентген легких на дому</span>
                    </label>

                    <div class="info-right">
                        <div class="uzi-price">+ 5000 руб.</div>
                    </div><br>

                    <!-- ANALYZES -->
                    
                    <h1 class="additional">Также можно заказать анализы из списка:</h1>

                    <label class="container-checkbox">
                        <input type="checkbox" checked="checked" class="checkup-checkbox">
                        <span class="checkmark"></span>
                        <span>Биохимический анализ крови</span>
                    </label>
                    <div class="info-right">
                        <div class="analysis-price uzi-price">+ 3780 руб.</div>
                        <div class="questionmark">
                            <span class="tooltip-content">Рекомендовано сдавать данный анализ (до 40 лет – 1 раз в 2 года, 40-60 лет 1 раз в год, старше 60 лет 1 раз в пол года)</span>
                        </div>
                        <a class="blood btn-info">Подробнее</a>
                    </div><br>

                    <label class="container-checkbox">
                        <input type="checkbox" checked="checked" class="checkup-checkbox">
                        <span class="checkmark"></span>
                        <span>Общий анализ мочи</span>
                    </label>                    
                    <div class="info-right">
                        <div class="analysis-price uzi-price">+ 340 руб.</div>
                        <div class="questionmark">
                            <span class="tooltip-content">Рекомендовано сдавать данный анализ (до 40 лет – 1 раз в 2 года, 40-60 лет 1 раз в год, старше 60 лет 1 раз в пол года)</span>
                        </div>
                        <a class="pee btn-info">Подробнее</a>
                    </div><br>

                    <label class="container-checkbox">
                        <input type="checkbox" class="checkup-checkbox">
                        <span class="checkmark"></span>
                        <span>Гастрокомплекс</span>
                    </label>                    
                    <div class="info-right">
                        <div class="analysis-price uzi-price">+ 3240 руб.</div>
                        <div class="questionmark">
                            <span class="tooltip-content">Рекомендовано сдавать данный анализ на основании возможной генетической предрасположенности к <strong>заболеваниям ЖКТ</strong> (до 40 лет – 1 раз в 2 года, 40-60 лет 1 раз в год, старше 60 лет 1 раз в пол года)</span>
                        </div>
                        <a class="gastro btn-info">Подробнее</a>
                    </div><br>

                    <label class="container-checkbox">
                    <?php
                            if($an_gastro){
                                echo '<input type="checkbox" checked="checked" class="checkup-checkbox">';
                            }
                            else{
                                echo '<input type="checkbox" class="checkup-checkbox">';
                            }
                        ?>
                        <span class="checkmark"></span>
                        <span>Диагностика диабета, биохимический</span>
                    </label>
                    <div class="info-right">
                        <div class="analysis-price uzi-price">+ 4220 руб.</div>
                        <div class="questionmark">
                            <span class="tooltip-content">Рекомендовано сдавать данный анализ на основании возможной генетической предрасположенности к <strong>диабету</strong> (до 40 лет – 1 раз в 2 года, 40-60 лет 1 раз в год, старше 60 лет 1 раз в пол года)</span>
                        </div>
                        <a class="diabetes btn-info">Подробнее</a>
                    </div><br>

                    <label class="container-checkbox">
                        <?php
                            if($an_cardio){
                                echo '<input type="checkbox" checked="checked" class="checkup-checkbox">';
                            }
                            else{
                                echo '<input type="checkbox" class="checkup-checkbox">';
                            }
                        ?>
                        <span class="checkmark"></span>
                        <span>Кардиологический</span>
                    </label>
                    <div class="info-right">
                        <div class="analysis-price uzi-price">+ 5530 руб.</div>
                        <div class="questionmark">
                            <span class="tooltip-content">Рекомендовано сдавать данный анализ на основании возможной генетической предрасположенности к заболеваниям <strong>сердечно сосудистой системы</strong> (до 40 лет – 1 раз в 2 года, 40-60 лет 1 раз в год, старше 60 лет 1 раз в пол года)</span>
                        </div>
                        <a class="cardio btn-info">Подробнее</a>
                    </div><br>

                    <label class="container-checkbox">
                        <?php
                            if($an_onco_m){
                                echo '<input type="checkbox" checked="checked" class="checkup-checkbox">';
                            }
                            else{
                                echo '<input type="checkbox" class="checkup-checkbox">';
                            }
                        ?>
                        <span class="checkmark"></span>
                        <span>Онкологический для мужчин, биохимический</span>
                    </label>                    
                    <div class="info-right">
                        <div class="analysis-price uzi-price">+ 3910 руб.</div>
                        <div class="questionmark">
                            <span class="tooltip-content">Рекомендовано сдавать данный анализ на основании возможной генетической предрасположенности к <strong>раковым</strong> заболеваниям (до 40 лет – 1 раз в 2 года, 40-60 лет 1 раз в год, старше 60 лет 1 раз в пол года)</span>
                        </div>
                        <a class="onco_m btn-info">Подробнее</a>
                    </div><br>

                    <label class="container-checkbox">
                        <?php
                            if($an_onco_f){
                                echo '<input type="checkbox" checked="checked" class="checkup-checkbox">';
                            }
                            else{
                                echo '<input type="checkbox" class="checkup-checkbox">';
                            }
                        ?>
                        <span class="checkmark"></span>
                        <span>Онкологический для женщин, биохимический</span>
                    </label>
                    <div class="info-right">
                        <div class="analysis-price uzi-price">+ 5720 руб.</div>
                        <div class="questionmark">
                            <span class="tooltip-content">Рекомендовано сдавать данный анализ на основании возможной генетической предрасположенности к <strong>раковым</strong> заболеваниям (до 40 лет – 1 раз в 2 года, 40-60 лет 1 раз в год, старше 60 лет 1 раз в пол года)</span>
                        </div>
                        <a class="onco_f btn-info">Подробнее</a>
                    </div><br>

                    <label class="container-checkbox">
                        <?php
                            if($an_vessels){
                                echo '<input type="checkbox" checked="checked" class="checkup-checkbox">';
                            }
                            else{
                                echo '<input type="checkbox" class="checkup-checkbox">';
                            }
                        ?>
                        <span class="checkmark"></span>
                        <span>Диагностика сосудистых заболеваний головного мозга</span>
                    </label>
                    <div class="info-right">
                        <div class="analysis-price uzi-price">+ 4610 руб.</div>
                        <div class="questionmark">
                            <span class="tooltip-content">Рекомендовано сдавать данный анализ на основании возможной генетической предрасположенности к заболеваниям <strong>сосудистой системы головного мозга</strong> (до 40 лет – 1 раз в 2 года, 40-60 лет 1 раз в год, старше 60 лет 1 раз в пол года)</span>
                        </div>
                        <a class="vessels btn-info">Подробнее</a>
                    </div><br>
                    
                    <label class="container-checkbox">
                        <?php
                            if($an_hormones_m){
                                echo '<input type="checkbox" checked="checked" class="checkup-checkbox">';
                            }
                            else{
                                echo '<input type="checkbox" class="checkup-checkbox">';
                            }
                        ?>
                        <span class="checkmark"></span>
                        <span>Гормональный профиль (комплекс) для мужчин</span>
                    </label>
                    <div class="info-right">
                        <div class="analysis-price uzi-price">+ 2880 руб.</div>
                        <div class="questionmark">
                            <span class="tooltip-content">Рекомендовано сдавать данный анализ для поддержания иммунитета и эндокринной системы в норме (до 40 лет – 1 раз в 2 года, 40-60 лет 1 раз в год, старше 60 лет 1 раз в пол года)</span>
                        </div>
                        <a class="hormones_m btn-info">Подробнее</a>
                    </div><br>

                    <label class="container-checkbox">
                        <?php
                            if($an_hormones_f){
                                echo '<input type="checkbox" checked="checked" class="checkup-checkbox">';
                            }
                            else{
                                echo '<input type="checkbox" class="checkup-checkbox">';
                            }
                        ?>
                        <span class="checkmark"></span>
                        <span>Гормональный профиль (комплекс) для женщин</span>
                    </label>
                    <div class="info-right">
                        <div class="analysis-price uzi-price">+ 6140 руб.</div>
                        <div class="questionmark">
                            <span class="tooltip-content">Рекомендовано сдавать данный анализ для поддержания иммунитета и эндокринной системы в норме (до 40 лет – 1 раз в 2 года, 40-60 лет 1 раз в год, старше 60 лет 1 раз в пол года)</span>
                        </div>
                        <a class="hormones_f btn-info">Подробнее</a>
                    </div><br>

                    <label class="container-checkbox">
                        <?php
                            if($an_vitamins){
                                echo '<input type="checkbox" checked="checked" class="checkup-checkbox">';
                            }
                            else{
                                echo '<input type="checkbox" class="checkup-checkbox">';
                            }
                        ?>
                        <span class="checkmark"></span>
                        <span>Комплексный анализ крови на витамины (A, D, E, K, C, B1, B5, B6, В9, B12)</span>
                    </label>
                    <div class="info-right">
                        <div class="analysis-price uzi-price">+ 15500 руб.</div>
                        <div class="questionmark">
                            <span class="tooltip-content">Рекомендовано сдавать данный анализ для поддержания иммунитета и эндокринной системы в норме (до 40 лет – 1 раз в 2 года, 40-60 лет 1 раз в год, старше 60 лет 1 раз в пол года)</span>
                        </div>
                        <a class="vitamins btn-info">Подробнее</a>
                    </div><br>


                    <!-- /ANALYZES -->
                    
                    <p><i class="fa fa-info-circle"></i> Результаты осмотра с комментариями врача будут доступны в личном кабинете в<br>течение 24 часов после прохождения обследования</p>
                    <p><i class="fa fa-info-circle"></i> Обследование проходит у вас дома или в офисе. Необходимо наличие стула, стола, а так<br>же небольшой кушетки (дивана) для УЗИ</p>
                    <hr>
                    <h1 class="inline">Стоимость для Москвы</h1>
                    <p class="total-number" id="checkup-price">10000 руб.</p>
                    <button class="inline" id="order-home-checkup">Заказать</button>
                    <p id="checkup-cashback">Кэшбэк <strong>100 руб.</strong> (3%)<p>
                    
                    <!-- ORDER MODAL -->
                    <div id="order-home-checkup-modal" class="modal-window">
                        <div class="modal-window-content order-homecheckup-window">
                            <div class="modal-window-body sm-body">
                                <div class="modal_header">
                                        <span class="close" id="order-home-checkup-modal-close">&times;</span>
                                        <div class="modal-title">Заказать домашний медосмотр</div>
                                </div>
                                <br />
                                <label for="user-phone-for-order">Номер телефона</label>
                                <br />
                                <input type=text id="user-phone-for-order" class="modal-input" />
                                <br />
                                <input type=button id="submit-home-checkup-order" value="Подтвердить" class="modal-submit-btn" />
                                
                                <?php
                                    if($user->is_logged_in()){
                                        echo '<input type="hidden" id="flag_if_logged_in" value="logged_in">';
                                    }
                                    else{
                                        echo '<input type="hidden" id="flag_if_logged_in" value="not_logged_in">';
                                    }
                                ?>
                                <span id="error_msg"> </span>
                                <br />

                            </div>
                        </div>
                    </div>
                    <!-- /ORDER MODAL -->