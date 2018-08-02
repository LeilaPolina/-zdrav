<?php include('includes/config.php'); ?>

<?php

function recToBuy ($dead) {
    $listToBuy = array();
    $txtListToBuy = '';
    if (in_array('Сердце', $dead)) {
        array_unshift($listToBuy,'домашний ЭКГ монитор, тонометр');
    }
    if (in_array('Инсульт', $dead)) {
        array_unshift($listToBuy,'тестер холестерина');
    }
    if (in_array('Сахарный диабет', $dead)) {
        array_unshift($listToBuy,'глюкометр');
    }
    $txtListToBuy = implode(", ", $listToBuy);
    return $txtListToBuy;
}

function getLifetimeIndexMass ($index_mass) {
    $count_weight = '';
    if ($index_mass < 15) {
        $count_weight = '-2';
    } elseif ($index_mass >= 15 and $index_mass < 20) {
        $count_weight = '0';
    } elseif ($index_mass >= 25 and $index_mass < 30) {
        $count_weight = '-2';
    } elseif ($index_mass >= 30) {
        $count_weight = '-4';
    }
    return $count_weight;
}

function get_lifecount($lifetime_index_mass, $user_data_arr){
    $lifecount = 2; /* +2 всем за анализы */
    $lifecount += -(int)$lifetime_index_mass;
    
    if ($user_data_arr['give_up_smoking']) {
        $lifecount += -(int)$user_data_arr['count_smoking'];
    }
    
    if ($user_data_arr['immunity'] == "4 раза в год или больше") {
        $lifecount += 1;
    }
    
    if ($user_data_arr['healthyfood']) {
        $lifecount += -(int)$user_data_arr['count_food'];
    }
    
    if ($user_data_arr['healthyheart']) {
        $lifecount += 2;
    }
    
    return $lifecount;
}

function getIndexMass ($weight, $height) {
    $weight = (int) $weight;
    $height = (int) $height;
    if ($height == 0) {
        $height = 1;
    }
    return round($weight / pow($height/100, 2), 2);
}

function getTxtIndexMass ($index_mass) {
    $txt = '';
    if ($index_mass < 15) {
        $txt = '<b>Острому дефициту веса</b>';
    } elseif ($index_mass >= 15 and $index_mass < 20) {
        $txt = '<b>Дефициту веса</b>';
    } elseif ($index_mass >= 20 and $index_mass < 25) {
        $txt = '<b>Нормальному весу</b>';
    } elseif ($index_mass >= 25 and $index_mass < 30) {
        $txt = '<b>Избыточному весу</b>';
    } elseif ($index_mass >= 30) {
        $txt = '<b>Ожирению</b>';
    }
    
    return $txt;
}
	
function get_essential_data($db, $cur_user_id){
    $get_essential_data = $db->prepare('SELECT user_name, user_phone FROM users WHERE user_id = :user_id');
    $get_essential_data->execute(array(
        ':user_id' => $cur_user_id
    ));
    return $get_essential_data->fetch(PDO::FETCH_ASSOC);
}

function get_general_data($db, $cur_user_id){
    $get_general_data = $db->prepare('SELECT user_sex, user_age, user_height, user_weight, 
    job_conditions_type_name, smoking_type_name, alcohol_type_name, family_status_type_name, children_type_name, sport_activity_type_name, 
    immunity_type_name, last_exam_date_type_name, exam_prevention_causes_type_name, diet_type_name, sleep_type_name, education_type_name,
    user_diseases, user_chronical
    FROM user_data 
    INNER JOIN job_conditions_types ON job_conditions_types.job_conditions_type_id = user_data.user_job_conditions
    INNER JOIN smoking_types ON smoking_types.smoking_type_id = user_data.user_smoking
    INNER JOIN alcohol_types ON alcohol_types.alcohol_type_id = user_data.user_alcohol
    INNER JOIN family_status_types ON family_status_types.family_status_type_id = user_data.user_family_status
    INNER JOIN children_types ON children_types.children_type_id = user_data.user_children
    INNER JOIN sport_activity_types ON sport_activity_types.sport_activity_type_id = user_data.user_sport_activity
    INNER JOIN immunity_types ON immunity_types.immunity_type_id = user_data.user_immunity
    INNER JOIN last_exam_date_types ON last_exam_date_types.last_exam_date_type_id = user_data.user_last_exam_date
    INNER JOIN exam_prevention_causes_types ON exam_prevention_causes_types.exam_prevention_causes_type_id = user_data.user_exam_prevention_causes
    INNER JOIN diet_types ON diet_types.diet_type_id = user_data.user_diet
    INNER JOIN sleep_types ON sleep_types.sleep_type_id = user_data.user_sleep
    INNER JOIN education_types ON education_types.education_type_id = user_data.user_education
    WHERE user_data_user_id = :user_id');
    $get_general_data->execute(array(
        ':user_id' => $cur_user_id
    ));
    
    $general_data_row = $get_general_data->fetch(PDO::FETCH_ASSOC);
    return $general_data_row;
}

function get_contact_data($db, $cur_user_id){
    $get_contact_data = $db->prepare('SELECT contact_value FROM contacts_con_user WHERE contacts_con_user_user_id = :user_id AND contacts_con_user_contact_id = (SELECT contact_id FROM contact_types WHERE contact_type = :contact_type)');
    $get_contact_data->execute(array(
        ':user_id' => $cur_user_id,
        ':contact_type' => 'email'
    ));
    return $get_contact_data->fetch(PDO::FETCH_ASSOC);
}

function get_risks_data($db, $cur_user_id){
    $get_risks_data = $db->prepare('SELECT risks_types.relatives_death_causes_type_name
    FROM relatives_death_causes_con_user AS users_risks
    INNER JOIN relatives_death_causes_types AS risks_types
    ON users_risks.relatives_death_causes_con_user_relatives_death_causes_type_id = risks_types.relatives_death_causes_type_id
    WHERE users_risks.relatives_death_causes_con_user_user_id = :user_id');
    $get_risks_data->execute(array(
        ':user_id' => $cur_user_id
    ));
    
    $relatives_death_causes = array();
    $relatives_death_causes_ind = 0;
    while($risks_row = $get_risks_data->fetch(PDO::FETCH_ASSOC)){
        $relatives_death_causes[$relatives_death_causes_ind] = $risks_row['relatives_death_causes_type_name'];
        $relatives_death_causes_ind++;
    }
    return $relatives_death_causes;
}

function process_risks_from_test($dead){
    $relatives_death_causes = explode(', ', $dead);								
    $cancer_types = array('Легких' => 'легких', 'Молочной железы' => 'молочной железы', 'Кишечника' => 'кишечника', 'Печени' => 'печени', 'Предстательной железы' => 'предстательной железы', 'Кожи' => 'кожи', 'Шейки матки' => 'шейки матки', 'Другой' => 'другой');
    foreach($cancer_types as $key => $value){
        if(in_array($key, $relatives_death_causes)){
            array_push($relatives_death_causes, "Рак ".$value);
        }
    }
    return $relatives_death_causes;
}

function get_recommendations_data($user, $user_data_arr){
    if($user_data_arr['job'] == "Руководящая" || $user_data_arr['job'] == "Творческая" || $user_data_arr['job'] == "Офисная" || $user_data_arr['job'] == "Не работаю" || $user_data_arr['sport'] == "Занимаюсь более 1 раза в неделю"){        
        $user_data_arr['smart_watch'] = 1;
    }
    if($user_data_arr['diet'] == "Не здоровое" || in_array('Инсульт', $user_data_arr['risks'])){        
        $user_data_arr['module_tester'] = 1;
    }
    if(!$user->is_logged_in()){
        $user_data_arr['healthyheart'] = $_SESSION['result_test']['healthyheart'];
        $user_data_arr['personal_manager'] = $_SESSION['result_test']['personal_manager'];
        $user_data_arr['homebodycheck'] = $_SESSION['result_test']['homebodycheck'];
        $user_data_arr['healthyfood'] = $_SESSION['result_test']['healthyfood'];
        $user_data_arr['give_up_smoking'] = $_SESSION['result_test']['smoke'];
    }
    else{        
        if(in_array('Сердце', $user_data_arr['risks'])){
            $user_data_arr['healthyheart'] = 1;
        }
        if($user_data_arr['job'] == 'Руководящая' || $user_data_arr['whynotbodycheck'] == 'Нет на это времени' || $user_data_arr['whynotbodycheck'] == 'Просто лень'){
            $user_data_arr['personal_manager'] = 1;
        }
        if($user_data_arr['bodycheck'] == 'Не помню когда проходил' || $user_data_arr['bodycheck'] == 'Более года назад'){        
            $user_data_arr['homebodycheck'] = 1;
        }
        if($user_data_arr['diet'] == "Не здоровое" || $user_data_arr['diet'] == "Обычное"){
            $user_data_arr['healthyfood'] = 1;
        }
        if($user_data_arr['smoking'] == "Курю иногда немного" || $user_data_arr['smoking'] == "Курю каждый день"){
            $user_data_arr['give_up_smoking'] = 1;
        }
    }
    return $user_data_arr;
}

function get_count_x_variables($user, $user_data_arr){
    if(!$user->is_logged_in()){
        $user_data_arr['count_homebodycheck'] = $_SESSION['result_test']['count_homebodycheck'];
        $user_data_arr['count_work'] = $_SESSION['result_test']['count_work'];
        $user_data_arr['count_smoking'] = $_SESSION['result_test']['count_smoking'];
        $user_data_arr['count_food'] = $_SESSION['result_test']['count_food'];
        $user_data_arr['count_dead'] = $_SESSION['result_test']['count_dead'];
        $user_data_arr['count_bodycheck'] = $_SESSION['result_test']['count_bodycheck'];
        $user_data_arr['count_whynotbodycheck'] = $_SESSION['result_test']['count_whynotbodycheck'];
    }
    else{
        // COUNT_WORK
        if($user_data_arr['job'] == 'Руководящая' || $user_data_arr['job'] == 'Творческая' || $user_data_arr['job'] == 'Ничего из перечисленного'){
            $user_data_arr['count_work'] = 2;
        }
        else if($user_data_arr['job'] == 'На ногах'){
            $user_data_arr['count_work'] = -1;
        }
        else if($user_data_arr['job'] == 'Физически тяжелая' || $user_data_arr['job'] == 'Вредная'){
            $user_data_arr['count_work'] = -2;
        }
        // COUNT_SMOKING
        if($user_data_arr['smoking'] == 'Не курю и не курил'){
            $user_data_arr['count_smoking'] = 3;
        }
        else if($user_data_arr['smoking'] == 'Курил и бросил'){
            $user_data_arr['count_smoking'] = 1;
        }
        else if($user_data_arr['smoking'] == 'Курю иногда немного'){
            $user_data_arr['count_smoking'] = -1;
        }
        else if($user_data_arr['smoking'] == 'Курю каждый день'){
            $user_data_arr['count_smoking'] = -3;
        }
        // COUNT_FOOD
        if($user_data_arr['diet'] == 'Здоровое'){
            $user_data_arr['count_food'] = 2;
        }
        else if($user_data_arr['diet'] == 'Обычное'){
            $user_data_arr['count_food'] = 0;
        }
        else if($user_data_arr['diet'] == 'Не здоровое'){
            $user_data_arr['count_food'] = -2;
        }
        // COUNT_DEAD
        if(in_array('Рак легких', $user_data_arr['risks']) || in_array('Рак молочной железы', $user_data_arr['risks']) || 
            in_array('Рак кишечника', $user_data_arr['risks']) || in_array('Рак печени', $user_data_arr['risks']) || 
            in_array('Рак предстательной железы', $user_data_arr['risks']) || in_array('Рак кожи', $user_data_arr['risks']) || 
            in_array('Рак шейки матки', $user_data_arr['risks']) || in_array('Рак другой', $user_data_arr['risks'])){

            $user_data_arr['count_dead'] += -2;
        }
        if(in_array('Сердце', $user_data_arr['risks'])){
            $user_data_arr['count_dead'] += -2;
        }
        if(in_array('Инсульт', $user_data_arr['risks'])){
            $user_data_arr['count_dead'] += -2;
        }
        if(in_array('Желудочно-кишечные болезни', $user_data_arr['risks'])){
            $user_data_arr['count_dead'] += -2;
        }
        if(in_array('Сахарный диабет', $user_data_arr['risks'])){
            $user_data_arr['count_dead'] += -2;
        }

        // COUNT_BODYCHECK
        if($user_data_arr['bodycheck'] == 'Менее года назад'){
            $user_data_arr['count_bodycheck'] = 2;
        }
        else if($user_data_arr['bodycheck'] == 'Более года назад'){
            $user_data_arr['count_bodycheck'] = 0;
        }
        else if($user_data_arr['bodycheck'] == 'Не помню когда проходил'){
            $user_data_arr['count_bodycheck'] = -2;
        }
        
        //$user_data_arr['count_whynotbodycheck'] = 0;
    }

    return $user_data_arr;
}

function get_supposed_lifetime($user_data_arr, $lifetime_index_mass){
    $supposed_lifetime = 0;

    if($user_data_arr['sex'] == 'male'){
        $supposed_lifetime += 66; 

        if($user_data_arr['family_status'] == 'Живу один'){
            $supposed_lifetime += -1;
        }
        else if($user_data_arr['family_status'] == 'Живу с родителями'){
            $supposed_lifetime += 1;
        }
        else if($user_data_arr['family_status'] == 'Живу с супругой'){
            $supposed_lifetime += 2;
        }

    }
    else if($user_data_arr['sex'] == 'female'){
        $supposed_lifetime += 77;
        
        if($user_data_arr['family_status'] == 'Живу одна'){
            $supposed_lifetime += -1;
        }
        else if($user_data_arr['family_status'] == 'Живу с родителями'){
            $supposed_lifetime += 1;
        }
        else if($user_data_arr['family_status'] == 'Живу с супругом'){
            $supposed_lifetime += 2;
        }
    }

    $supposed_lifetime += $lifetime_index_mass;
    $supposed_lifetime += $user_data_arr['count_work'];
    $supposed_lifetime += $user_data_arr['count_smoking'];
    $supposed_lifetime += $user_data_arr['count_food'];
    $supposed_lifetime += $user_data_arr['count_dead'];
    $supposed_lifetime += $user_data_arr['count_bodycheck'];
    $supposed_lifetime += $user_data_arr['count_whynotbodycheck'];

    if($user_data_arr['sport'] == 'Занимаюсь более 1 раза в неделю'){
        $supposed_lifetime += 2;
    }
    else if($user_data_arr['sport'] == 'Не занимаюсь'){
        $supposed_lifetime += -1;
    }

    if($user_data_arr['alcohol'] == 'Не пью совсем'){
        $supposed_lifetime += 2;
    }
    else if($user_data_arr['alcohol'] == 'Пью иногда'){
        $supposed_lifetime += 0;
    }
    else if($user_data_arr['alcohol'] == 'Пью каждый день'){
        $supposed_lifetime += -2;
    }

    if($user_data_arr['immunity'] == 'Меньше 4-х раз в год'){
        $supposed_lifetime += 1;
    }
    else if($user_data_arr['immunity'] == '4 раза в год или больше'){
        $supposed_lifetime += -1;
    }

    if($user_data_arr['sleep'] == 'Чаще высыпаюсь'){
        $supposed_lifetime += 1;
    }
    else if($user_data_arr['sleep'] == 'Чаще не высыпаюсь'){
        $supposed_lifetime += -1;
    }

    if($user_data_arr['education'] == 'Ученая степень'){
        $supposed_lifetime += 4;
    }
    else if($user_data_arr['education'] == 'Высшее'){
        $supposed_lifetime += 2;
    }
    else if($user_data_arr['education'] == 'Специальное'){
        $supposed_lifetime += 0;
    }
    else if($user_data_arr['education'] == 'Среднее'){
        $supposed_lifetime += -1;
    }
    else if($user_data_arr['education'] == 'Незаконченное среднее'){
        $supposed_lifetime += -2;
    }

    //$user_data_arr['children'];

    return $supposed_lifetime;
}

$user_data_arr = array(
    'name' => '',
    'sex' => '',
    'year_birth' => 0,
    'height' => 0,
    'weight' => 0,
    'job' => '',
    'smoking' => '',
    'sport' => '',
    'diet' => '',
    'education' => '',
    'children' => '',
    'alcohol' => '',
    'risks' => array(),
    'diseases' => '',
    'chronical' => '',
    'email' => '',
    'phone' => '',
    'immunity' => '',
    'sleep' => '',
    'family_status' => '',
    'bodycheck' => '',
    'whynotbodycheck' => '',
    'lifetime' => '',

    'healthyheart' => 0,
    'personal_manager' => 0,
    'smart_watch' => 0,
    'homebodycheck' => 0,
    'module_tester' => 0,
    'healthyfood' => 0,
    'give_up_smoking' => 0,

    'count_homebodycheck' => 0,
    'count_work' => 0,
    'count_smoking' => 0,
    'count_food' => 0,
    'count_dead' => 0,
    'count_bodycheck' => 0,
    'count_whynotbodycheck' => 0
);

if(!$user->is_logged_in()){
    if($_SESSION['result_test']['sex'] == 'м'){
        $user_data_arr['sex'] = 'male';
    }
    else{
        $user_data_arr['sex'] = 'female';
    }
    $user_data_arr['year_birth'] = $_SESSION['result_test']['year_birth'];
    $user_data_arr['height'] = $_SESSION['result_test']['height'];
    $user_data_arr['weight'] = $_SESSION['result_test']['weight'];
    $user_data_arr['job'] = $_SESSION['result_test']['work'];
    $user_data_arr['smoking'] = $_SESSION['result_test']['smoking'];
    $user_data_arr['sport'] = $_SESSION['result_test']['sport'];
    $user_data_arr['diet'] = $_SESSION['result_test']['food'];
    $user_data_arr['children'] = $_SESSION['result_test']['children'];
    $user_data_arr['alcohol'] = $_SESSION['result_test']['alcohol'];
    $user_data_arr['immunity'] = $_SESSION['result_test']['cold'];
    $user_data_arr['bodycheck'] = $_SESSION['result_test']['bodycheck'];
    $user_data_arr['whynotbodycheck'] = $_SESSION['result_test']['whynotbodycheck'];
    $user_data_arr['risks'] = process_risks_from_test($_SESSION['result_test']['dead']);

    $user_data_arr = get_recommendations_data($user, $user_data_arr);

    $user_data_arr['lifetime'] = $_SESSION['result_test']['lifetime'];

    $user_data_arr = get_count_x_variables($user, $user_data_arr);
    
    $index_mass = getIndexMass($user_data_arr['weight'], $user_data_arr['height']);
	$txt_index_mass = getTxtIndexMass($index_mass);
	$lifetime_index_mass = getLifetimeIndexMass($index_mass);
	$toBuy = recToBuy ($user_data_arr['risks']);
    $lifecount = get_lifecount($lifetime_index_mass, $user_data_arr);
}
else{
    $cur_user_id = $_SESSION['user_id'];
	$essential_data_row = get_essential_data($db, $cur_user_id);	
    $general_data_row = get_general_data($db, $cur_user_id);	
    $contact_data_row = get_contact_data($db, $cur_user_id);

    $user_data_arr['name'] = $essential_data_row['user_name'];
    $user_data_arr['phone'] = $essential_data_row['user_phone'];
    $user_data_arr['email'] = $contact_data_row['contact_value'];
    
    $user_data_arr['sex'] = $general_data_row['user_sex'];
    $user_data_arr['year_birth'] = substr($general_data_row['user_age'], 0, 4);
    $user_data_arr['height'] = $general_data_row['user_height'];
    $user_data_arr['weight'] = $general_data_row['user_weight'];

    $user_data_arr['job'] = $general_data_row['job_conditions_type_name'];
    $user_data_arr['smoking'] = $general_data_row['smoking_type_name'];
    $user_data_arr['sport'] = $general_data_row['sport_activity_type_name'];
    $user_data_arr['diet'] = $general_data_row['diet_type_name'];
    $user_data_arr['education'] = $general_data_row['education_type_name'];
    $user_data_arr['children'] = $general_data_row['children_type_name'];
    $user_data_arr['alcohol'] = $general_data_row['alcohol_type_name'];
    $user_data_arr['immunity'] = $general_data_row['immunity_type_name'];
    $user_data_arr['sleep'] = $general_data_row['sleep_type_name'];
    $user_data_arr['family_status'] = $general_data_row['family_status_type_name'];
    $user_data_arr['bodycheck'] = $general_data_row['last_exam_date_type_name'];
    $user_data_arr['whynotbodycheck'] = $general_data_row['exam_prevention_causes_type_name'];

    $user_data_arr['risks'] = get_risks_data($db, $cur_user_id);
    $user_data_arr['diseases'] = $general_data_row['user_diseases'];
    $user_data_arr['chronical'] = $general_data_row['user_chronical'];

    $user_data_arr = get_recommendations_data($user, $user_data_arr);

    $user_data_arr = get_count_x_variables($user, $user_data_arr);
    	
	$index_mass = getIndexMass($user_data_arr['weight'], $user_data_arr['height']);
    $txt_index_mass = getTxtIndexMass($index_mass);
    $lifetime_index_mass = getLifetimeIndexMass($index_mass);
	$toBuy = recToBuy ($user_data_arr['risks']);
    $lifecount = get_lifecount($lifetime_index_mass, $user_data_arr);
    
    $user_data_arr['lifetime'] = get_supposed_lifetime($user_data_arr, $lifetime_index_mass);
}

?>