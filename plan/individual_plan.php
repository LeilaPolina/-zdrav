<?php 
    include('../includes/config.php');
    /*
    if(!$user->is_logged_in()) {
        header('Location: ../test.php');
    }
    */
    $demo = false;
    include('../modules/general_data_src.php');
    include("scripts/rendering.php");
    include("scripts/indexes.php");
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
                    <span>
                        <?php echo date("d\.m\.Y"); ?>
                    </span>
                </div>
                <div class="data-box">
                    <span>Год рождения</span>
                    <span>
                        <?php echo $user_data_arr['year_birth']; ?>
                    </span>
                </div>
                <div class="data-box">
                    <span>Пол</span>
                    <span>
                        <?php if($user_data_arr['sex'] = 'male') {
                            echo "Мужской";
                        } else {
                            echo "Женский";
                        }
                        ?>
                    </span>
                </div>
                <div class="data-box">
                    <span>Вес</span>
                    <span>
                        <?php echo $user_data_arr['weight']; ?>
                    </span>
                </div>
                <div class="data-box">
                    <span>Рост</span>
                    <span>
                        <?php echo $user_data_arr['height']; ?>
                    </span>
                </div>
                <div class="data-box">
                    <span>Спорт</span>
                    <span>
                        <?php echo $user_data_arr['sport']; ?>
                    </span>
                </div>
                <div class="data-box">
                    <span>Питание</span>
                    <span>
                        <?php echo $user_data_arr['diet']; ?>
                    </span>
                </div>
                <div class="data-box">
                    <span>Дети</span>
                    <span>
                        <?php echo $user_data_arr['children']; ?>
                    </span>
                </div>
                <div class="data-box">
                    <span>Алкоголь</span>
                    <span>
                        <?php echo $user_data_arr['alcohol']; ?>
                    </span>
                </div>
                <div class="data-box">
                    <span>Курение</span>
                    <span>
                        <?php echo $user_data_arr['smoking']; ?>
                    </span>
                </div>
                <div class="data-box">
                    <span>Работа</span>
                    <span>
                        <?php echo $user_data_arr['job']; ?>
                    </span>
                </div>
                <div class="data-box empty"></div>
            </div>

            <div class="title">2. Ваши нормы основных показателей</div>
            <div class="numbers-container">
                <div class="data-box">
                    <span>Вес</span>
                    <span>
                        <?php echo $ideal_weight; ?> кг
                    </span>
                </div>
                <div class="data-box">
                    <span>Глюкоза (сахар)</span>
                    <span>
                        <?php echo $ideal_glucose; ?>* ммоль/литр
                    </span>
                </div>
                <div class="data-box">
                    <span>Холестерин общий</span>
                    <span>
                        <?php echo $ideal_cholesterol; ?> ммоль/литр
                    </span>
                </div>
                <div class="data-box">
                    <span>Давление</span>
                    <span>
                        <?php echo $ideal_pressure; ?> мм.рт.ст.
                    </span>
                </div>
            </div>
            <div class="footnote">*Показатель анализа сделанного натощак. После принятия пищи показатели норм могут достигать 7.8 ммоль/литр</div>
            <hr>
            <div class="title">
                По полису ОМС бесплатно в районной поликлинике Вы можете пройти медосмотр в <?php echo $oms_year; ?> году.
            </div>
            <hr>
            <div class="title">3. Согласно Вашим данным Вам рекомендуется пройти следующие обследования:</div>

            <?php render_table($ind_checkups); ?>

            <div class="footnote">* не входит в стандартный медосмотр по ОМС, но может быть назначено врачом</div>
            <div class="footnote">** может быть включено в бесплатный медосмотр по результатам других обследований</div>

            <!--table class="checkups">
                <tr>
                    <th>Что</th>
                    <th>Зачем</th>
                    <th>ОМС</th>
                    <th>Регулярность</th>
                </tr>
                <tr>
                    <td colspan="4" class="title">Входит в бесплатный медосмотр по ОМС</td>
                <tr>
                <tr>
                    <td>Анкетирование</td>
                    <td>Сбор анамнеза – истории жизни,
                        профессиональной истории, привычек,
                        особенностей образа жизни, которые
                        могут привести к развитию разных
                        заболеваний и повлиять на
                        продолжительность Вашей жизни.</td>
                    <td>+</td>
                    <td>Раз в 3 года</td>
                </tr>
                <tr>
                    <td>Измерение артериального давления</td>
                    <td>Гипертоническая болезнь</td>
                    <td>+</td>
                    <td>Раз в 3 года</td>
                </tr>
                <tr>
                    <td colspan="4" class="title">Не входит в бесплатный медосмотр по ОМС</td>
                <tr>
                <tr>
                    <td>Общий клинический анализ крови</td>
                    <td>Определение уровня гемоглобина позволяет
оценить наличие анемии, которая может быть
следствием разных заболеваний. Показатель
СОЭ (скорость оседания эритроцитов) и число
лейкоцитов позволят заподозрить наличие в
организме воспалительного процесса.</td>
                    <td>- *</td>
                    <td>Раз в год</td>
                </tr>
            </table-->
        </div>
    </div>
</body>
</html>