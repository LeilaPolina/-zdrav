<?php include_once('includes/config.php'); ?>
<?php

    function get_last_from_db($user, $db, $result_name) {
        if(!$user->is_logged_in()){
            return 'none';
        }
        try{
            // для давления нужно менять запрос так как запрашивать нужно две строки на каждую дату
            if($result_name === 'давление')
            {
                $get_last_query = $db->prepare('
                    SELECT DISTINCT result_date, current_value
                    FROM user_results
                    INNER JOIN
                        (SELECT result_types.result_type_id
                        FROM result_types, user_results
                        WHERE result_types.result_type_name = :result_name) result_names
                    ON user_results.user_results_result_type_id = result_names.result_type_id
                    WHERE user_results.user_results_user_id = :user_id
                    ORDER BY result_date DESC
                ');
                $get_last_query->execute(array(
                    'user_id' => $_SESSION['user_id'],
                    'result_name' => 'верхнее давление'
                ));

                $upper_row_count = $get_last_query->rowCount();

                if($upper_row_count > 0){
                    $upper_pressure_rows = $get_last_query->fetchAll(PDO::FETCH_ASSOC);
                    $get_last_query->execute(array(
                        'user_id' => $_SESSION['user_id'],
                        'result_name' => 'нижнее давление'
                    ));
                    $lower_pressure_results = $get_last_query;
                    if($lower_pressure_results->rowCount() != $upper_row_count){
                        throw 717; // db integrity failed (если в бд число верхних и нижних давлений для одного пользователя отличается)
                    }
                    
                    else{
                        $lower_pressure_rows = $lower_pressure_results->fetchAll(PDO::FETCH_ASSOC);
                        for($i = 0; $i < $upper_row_count; $i++){
                            $dt = new DateTime($upper_pressure_rows[$i]['result_date']);
                            $date = $dt->format('Y-m-d');
                            $upper_pressure_rows[$i]['result_date'] = $date;
                            $upper_pressure_rows[$i]['current_value'] = $upper_pressure_rows[$i]['current_value'].' на '.$lower_pressure_rows[$i]['current_value'];
                        }
                        return $upper_pressure_rows;
                    }
                }
                else{
                    return 'none';
                }
            } 
            // для всех остальных результатов нужно только по одной строке       
            else{
                $get_last_query = $db->prepare('
                    SELECT DISTINCT result_date, current_value
                    FROM user_results
                    INNER JOIN
                        (SELECT result_types.result_type_id
                        FROM result_types, user_results
                        WHERE result_types.result_type_name = :result_name) result_names
                    ON user_results.user_results_result_type_id = result_names.result_type_id
                    WHERE user_results.user_results_user_id = :user_id
                    ORDER BY result_date DESC
                ');
                $get_last_query->execute(array(
                    'user_id' => $_SESSION['user_id'],
                    'result_name' => $result_name
                ));
                // если ответ не пуст то запишем все результаты этого пользователя в массив
                if($get_last_query->rowCount() > 0){
                    $answer_arr = array();
                    while($last_result = $get_last_query->fetch(PDO::FETCH_ASSOC)){
                        $dt = new DateTime($last_result['result_date']);
                        $date = $dt->format('Y-m-d');
                        $last_result['result_date'] = $date;
                        array_push($answer_arr, $last_result);
                    }
                    return $answer_arr;
                }
                // иначе вернем ключевое слово
                else{
                    return 'none';
                }
            }            
        }
        catch(Exception $e){
                return $e->getMessage();//701
        }
    }

    if(isset($_POST['health_result_name'])){
        $result_name = $_POST['health_result_name'];
        echo json_encode(array('result' => get_last_from_db($user, $db, $result_name)));
    }
?>