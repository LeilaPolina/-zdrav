<?php
    $age = (int)date("Y") - $user_data_arr['year_birth'];
    $sex = $user_data_arr['sex'];
    $height = $user_data_arr['height'];

    $ideal_weight = evaluate_weight($height);
    $ideal_glucose = evaluate_glucose($age);
    $ideal_cholesterol = evaluate_cholesterol($age);
    $ideal_pressure = evaluate_pressure($age, $sex);
    $oms_year = get_oms_year($user_data_arr['year_birth']);

    function evaluate_weight($height) {
        return (round(pow($height/100, 2)*20 , 0, PHP_ROUND_HALF_DOWN) . "-" . round(pow($height/100, 2)*24 , 0, PHP_ROUND_HALF_DOWN));
    }

    function evaluate_glucose($age) {
        if($age <= 14) {
            return "3.3 - 5.6";
        } else if ($age <= 60) {
            return "4.1 - 5.9";
        } else if ($age <= 90) {
            return "4.6 - 6.4";
        } else {
            return "4.2 - 6.7";
        }
    }

    function evaluate_cholesterol($age){
        $cholesterol_norms = Array(5=>Array(2.95, 5.25), 10=>Array(3.13, 5.25), 15=>Array(3.08, 5.23), 
        20=>Array(2.93, 5.10), 25=>Array(3.16, 5.59), 30=>Array(3.32, 5.75), 35=>Array(3.37, 5.96), 
        40=>Array(3.63, 6.27), 45=>Array(3.81, 6.53), 50=>Array(3.94, 6.86), 55=>Array(4.20, 7.38), 
        60=>Array(4.45, 7.77), 65=>Array(4.45, 7.69), 70=>Array(4.43, 7.85), 75=>Array(4.48, 7.25));
        for($ind = 5; $ind <= 75; $ind += 5)
        {
            if(($age < $ind) || ($ind == 75)){
                return $cholesterol_norms[$ind][0]." - ".$cholesterol_norms[$ind][1];
            }
        }
    }

    function evaluate_pressure($age, $sex) {
        $male_pressure_norms = Array(5=>Array(83, 107, 55, 79), 10 => Array(93, 117, 60, 80), 15=>Array(93, 117, 60, 80), 20=>Array(105, 129, 73, 81), 
        25=>Array(108, 132, 75, 83), 30=>Array(110, 132, 76, 84), 35=>Array(113, 137, 77, 85), 40=>Array(114, 138, 78, 86), 
        45=>Array(115, 139, 79, 87), 50=>Array(116, 140, 80, 88), 55=>Array(118, 142, 81, 89), 60=>Array(120, 144, 82, 90), 
        65=>Array(123, 147, 81, 89), 70=>Array(123, 147, 76, 84), 75=>Array(123, 147, 76, 84));

        $female_pressure_norms = Array(5=>Array(83, 107, 55, 79), 10 => Array(93, 117, 60, 80), 15=>Array(93, 117, 60, 80), 20=>Array(105, 129, 69, 77), 
        25=>Array(108, 132, 71, 79), 30=>Array(110, 132, 76, 84), 35=>Array(113, 137, 77, 85), 40=>Array(114, 138, 79, 87), 
        45=>Array(115, 139, 80, 88), 50=>Array(116, 140, 81, 89), 55=>Array(118, 142, 81, 89), 60=>Array(120, 144, 82, 90), 
        65=>Array(123, 147, 83, 91), 70=>Array(123, 147, 84, 92), 75=>Array(123, 147, 85, 93));

        if($sex == 'male') {
            for($ind = 5; $ind <= 75; $ind+=5){
                if(($age < $ind) || ($ind == 75)){
                    $upper_pressure_norms[0] = $male_pressure_norms[$ind][0];
                    $upper_pressure_norms[1] = $male_pressure_norms[$ind][1];
                    $lower_pressure_norms[0] = $male_pressure_norms[$ind][2];
                    $lower_pressure_norms[1] = $male_pressure_norms[$ind][3];
                }
            }
        } else {
            for($ind = 5; $ind <= 75; $ind+=5){
                if(($age < $ind) || ($ind == 75)){
                    $upper_pressure_norms[0] = $female_pressure_norms[$ind][0];
                    $upper_pressure_norms[1] = $female_pressure_norms[$ind][1];
                    $lower_pressure_norms[0] = $female_pressure_norms[$ind][2];
                    $lower_pressure_norms[1] = $female_pressure_norms[$ind][3];               
                }
            }
        }

        return $upper_pressure_norms[0]."/".$lower_pressure_norms[0];
    }

    function get_oms_year($birth) {
        $cur_year = (int)date("Y");
        for ($i = 1928; $i < $cur_year; $i+=3) {
            if ($birth == $i) {
                $oms = 2018;
                break;
            }
        }

        for ($i = 1929; $i < $cur_year; $i+=3) {
            if ($birth == $i) {
                $oms = 2019;
                break;
            }
        }

        for ($i = 1930; $i < $cur_year; $i+=3) {
            if ($birth == $i) {
                $oms = 2020;
                break;
            }
        }

        while ($oms < $cur_year) {
            $oms+=3;
        }

        return $oms;
    }
?>