<?php
    include('includes/config.php');

    $name_fields = array('sex', 'year_birth', 'height', 'weight', 'education', 'work', 'smoking', 'alcohol', 'family', 'children', 'sport', 'food', 'sleep', 'cold', 'dead', 'bodycheck','whynotbodycheck','lifetime','personal_manager','smoke','healthyfood','healthyheart','homebodycheck','count_homebodycheck','count_work', 'count_smoking','count_food','count_dead', 'count_bodycheck','count_whynotbodycheck');
	$result_test = array();
	foreach ($name_fields as $field) {
		$val = '';
		if (isset($_POST[$field])) {
			$val = $_POST[$field];
		}
		$result_test[$field] = $val;
    }

    $_SESSION['result_test'] = $result_test;
    header('Location: test.php');
    exit;
?>