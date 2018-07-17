<?php
if ($user->is_logged_in()) {
    /* todo */
} else {
    /* анализы */
    $an_gastro = (strpos($_SESSION['result_test']['dead'], "Желудочно-кишечные болезни") !== false);
    $an_diabetes = (strpos($_SESSION['result_test']['dead'], "Сахарный диабет")) !== false || $index_mass > 25;
    $an_cardio = (strpos($_SESSION['result_test']['dead'], "Сахарный диабет") !== false);
    $an_onco_m = (strpos($_SESSION['result_test']['dead'], "Рак") !== false && ($_SESSION['result_test']['sex'] == 'м'));
    $an_onco_f = (strpos($_SESSION['result_test']['dead'], "Рак") !== false && ($_SESSION['result_test']['sex'] == 'ж'));
    $an_vessels = (strpos($_SESSION['result_test']['dead'], "Инсульт") !== false);
    $an_hormones_m = (2018 - $_SESSION['result_test']['year_birth'] > 40) && ($_SESSION['result_test']['sex'] == 'м');
    $an_hormones_f = (2018 - $_SESSION['result_test']['year_birth'] > 40) && ($_SESSION['result_test']['sex'] == 'ж');
    $an_vitamins = ($_SESSION['result_test']['cold'] == "4 раза в год или больше");
    /* обследования */
    $ch_uzi_liver = (strpos($_SESSION['result_test']['dead'], "Желудочно-кишечные болезни") !== false);
    $ch_uzi_mammary = ($_SESSION['result_test']['sex'] == 'ж');
    $ch_uzi_vessels = ($_SESSION['result_test']['smoke'] == 1);
    $ch_uzi_heart = ($_SESSION['result_test']['healthyheart'] == 1);
    $ch_xray_lungs = ($_SESSION['result_test']['smoke'] == 1) || (strpos($_SESSION['result_test']['dead'], "Легких") !== false);
}
?>