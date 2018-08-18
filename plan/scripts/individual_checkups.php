<?php
    
    function set_individual_checkups($src, $sex, $age) {
        $ind = array();

        /* 0 - 4 (всем) */
        for($i = 0; $i <= 4; $i++) {
            $ind = add_checkup($ind, $src, $i);
        }

        /* 8 - 15 */
        if($age <= 35) {
            for($i = 9; $i <= 15; $i++) {
                $ind = add_checkup($ind, $src, $i, 0);
            }

        } else {
            for($i = 9; $i <= 15; $i++) {
                $ind = add_checkup($ind, $src, $i, 1);
            }

            if($age >= 69) {
                $ind = add_checkup($ind, $src, 8);
            }
        }

        /* 5(f), 6, 16, 17 - 21 */
        if($sex == "female") {
            for($i = 19; $i <= 21; $i++) {
                $ind = add_checkup($ind, $src, $i);
            }

            if($age <= 35) {
                $ind = add_checkup($ind, $src, 17, 0);
                $ind = add_checkup($ind, $src, 18, 0);
            } else {
                $ind = add_checkup($ind, $src, 17, 1);
                $ind = add_checkup($ind, $src, 18, 1);
            }

            if($age <= 40) {
                $ind = add_checkup($ind, $src, 16);
            }

            if($age >= 39) {
                $ind = add_checkup($ind, $src, 6);

                if($age >= 45) {
                    $ind = add_checkup($ind, $src, 5);
                }
            }
        }

        /* 5(m), 7, 22, 23 */
        if($sex == "male") {
            if ($age <= 35) {
                $ind = add_checkup($ind, $src, 22, 0);
            } else {
                $ind = add_checkup($ind, $src, 22, 1);
                $ind = add_checkup($ind, $src, 5);

                if($age >= 40) {
                    $ind = add_checkup($ind, $src, 23);

                    if($age == 45 || $age == 51) {
                        $ind = add_checkup($ind, $src, 7);
                    }
                }
            }
        }

        return $ind;
    }

    function add_checkup($arr,$src,$chkup,$reg_i = 0) {
        array_push($arr, $src[$chkup]);
        /* переписываем массив regularity нужной нам строкой (из него же) */
        $reg_txt = $arr[count($arr) - 1]["regularity"][$reg_i];
        $arr[count($arr) - 1]["regularity"] = $reg_txt;

        return $arr;
    }

    if($demo) {
        $ind_checkups = set_individual_checkups($checkup_txts, "female", "42");
    } else {
        $ind_checkups = set_individual_checkups($checkup_txts, $user_data_arr['sex'], (int)date("Y") - (int)$user_data_arr['year_birth']);
    }
?>