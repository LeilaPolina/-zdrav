<?php 
    include('../includes/config.php');

    $demo = true;
    include("scripts/rendering.php");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>План профилактики на 3 года</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/three_year_plan.css" />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans" />
</head>
<body>
    <div class="main">
        <div class="imgs-top">
            <img src="../images/banners/minzdrav.png">
            <img src="../images/banners/worldzdrav.png">
            <img src="../images/banners/zdrav-rf.png">
        </div>
        <div class="title-main">Индивидуальный план профилактики здоровья</div>
        <div class="subtitle">составлен на основании рекомендаций ВОЗ и Министерства здравоохранения РФ</div>
        <div class="data">
            <div class="title">1. Общие сведения</div>
            <div class="general-data-container">
                <div class="data-box">
                    <span>Дата</span>
                    <span>14.08.2018</span>
                </div>
                <div class="data-box">
                    <span>Год рождения</span>
                    <span>1976</span>
                </div>
                <div class="data-box">
                    <span>Пол</span>
                    <span>Женский</span>
                </div>
                <div class="data-box">
                    <span>Вес</span>
                    <span>89</span>
                </div>
                <div class="data-box">
                    <span>Рост</span>
                    <span>181</span>
                </div>
                <div class="data-box">
                    <span>Спорт</span>
                    <span>Не занимаюсь</span>
                </div>
                <div class="data-box">
                    <span>Питание</span>
                    <span>Обычное</span>
                </div>
                <div class="data-box">
                    <span>Дети</span>
                    <span>2</span>
                </div>
                <div class="data-box">
                    <span>Алкоголь</span>
                    <span>Пью иногда</span>
                </div>
                <div class="data-box">
                    <span>Курение</span>
                    <span>Курила и бросила</span>
                </div>
                <div class="data-box">
                    <span>Работа</span>
                    <span>Офисная</span>
                </div>
                <div class="data-box empty"></div>
            </div>

            <div class="title">2. Ваши нормы основных показателей</div>
            <div class="numbers-container">
                <div class="data-box">
                    <span>Вес</span>
                    <span>72 - 81 кг</span>
                </div>
                <div class="data-box">
                    <span>Глюкоза (сахар)</span>
                    <span>4.1 - 5.9* ммоль/литр</span>
                </div>
                <div class="data-box">
                    <span>Холестерин общий</span>
                    <span>3.81 - 6.53 ммоль/литр</span>
                </div>
                <div class="data-box">
                    <span>Давление</span>
                    <span>129/81 мм.рт.ст.</span>
                </div>
            </div>
            <div class="footnote">*Показатель анализа сделанного натощак. После принятия пищи показатели норм могут достигать 7.8 ммоль/литр</div>
            <hr>
            <div class="title">По полису ОМС бесплатно в районной поликлинике Вы можете пройти медосмотр в 2018 году.</div>
            <hr>
            <div class="title">3. Согласно Вашим данным Вам рекомендуется пройти следующие обследования:</div>

            <?php render_table($ind_checkups); ?>

            <div class="footnote">* не входит в стандартный медосмотр по ОМС, но может быть назначено врачом</div>
            <div class="footnote">** может быть включено в бесплатный медосмотр по результатам других обследований</div>

            <div class="register-button-container">
                <a class="register-button" href="../test.php#register">Зарегистрироваться</a>
            </div>
        </div>
    </div>
</body>
</html>