<?php
if ($user->is_logged_in()) {
    $an_gastro = in_array("Желудочно-кишечные болезни", $user_data_arr['risks']);
    $an_diabetes = in_array("Сахарный диабет", $user_data_arr['risks']) || $index_mass > 25;
    $an_cardio = in_array("Сахарный диабет", $user_data_arr['risks']);

    $an_onco_m = $user_data_arr['sex'] == 'male' && (in_array('Рак легких', $user_data_arr['risks']) || in_array('Рак молочной железы', $user_data_arr['risks']) || 
    in_array('Рак кишечника', $user_data_arr['risks']) || in_array('Рак печени', $user_data_arr['risks']) || 
    in_array('Рак предстательной железы', $user_data_arr['risks']) || in_array('Рак кожи', $user_data_arr['risks']) || 
    in_array('Рак шейки матки', $user_data_arr['risks']) || in_array('Рак другой', $user_data_arr['risks']));

    $an_onco_f = $user_data_arr['sex'] == 'female' && (in_array('Рак легких', $user_data_arr['risks']) || in_array('Рак молочной железы', $user_data_arr['risks']) || 
    in_array('Рак кишечника', $user_data_arr['risks']) || in_array('Рак печени', $user_data_arr['risks']) || 
    in_array('Рак предстательной железы', $user_data_arr['risks']) || in_array('Рак кожи', $user_data_arr['risks']) || 
    in_array('Рак шейки матки', $user_data_arr['risks']) || in_array('Рак другой', $user_data_arr['risks']));

    $an_vessels = in_array("Инсульт", $user_data_arr['risks']);
    $an_hormones_m = (2018 - $user_data_arr['year_birth'] > 40) && ($user_data_arr['sex'] == 'male');
    $an_hormones_f = (2018 - $user_data_arr['year_birth'] > 40) && ($user_data_arr['sex'] == 'female');
    $an_vitamins = $user_data_arr['immunity'] == "4 раза в год или больше";
    /* обследования */
    $ch_uzi_liver = in_array("Желудочно-кишечные болезни", $user_data_arr['risks']);
    $ch_uzi_mammary = $user_data_arr['sex'] == 'female';
    $ch_uzi_vessels = $user_data_arr['give_up_smoking'] == 1;
    $ch_uzi_heart = $user_data_arr['healthyheart'] == 1;
    $ch_xray_lungs = $user_data_arr['give_up_smoking'] == 1 || in_array("Рак легких", $user_data_arr['risks']);
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