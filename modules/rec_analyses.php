<?php
if ($user->is_logged_in()) {
    /* todo */
} else {
    $an_gastro = (strpos($_SESSION['result_test']['dead'], "Желудочно-кишечные болезни") !== false);
    $an_diabetes = (strpos($_SESSION['result_test']['dead'], "Сахарный диабет")) !== false || $index_mass > 25;
    $an_cardio = (strpos($_SESSION['result_test']['dead'], "Сахарный диабет") !== false);
    $an_onco_m = (strpos($_SESSION['result_test']['dead'], "Рак") !== false && ($_SESSION['result_test']['sex'] == 'м'));
    $an_onco_f = (strpos($_SESSION['result_test']['dead'], "Рак") !== false && ($_SESSION['result_test']['sex'] == 'ж'));
    $an_vessels = (strpos($_SESSION['result_test']['dead'], "Инсульт") !== false);
    $an_hormones_m = (2018 - $_SESSION['result_test']['year_birth'] > 40) && ($_SESSION['result_test']['sex'] == 'м');
    $an_hormones_f = (2018 - $_SESSION['result_test']['year_birth'] > 40) && ($_SESSION['result_test']['sex'] == 'ж');
    $an_vitamins = ($_SESSION['result_test']['cold'] == "4 раза в год или больше");
}
?>