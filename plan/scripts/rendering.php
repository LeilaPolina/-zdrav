<?php
include "checkups_array.php";
include "individual_checkups.php";

function render_table_row($arr) {
    echo '<tr>';
        echo '<td>'.$arr["title"].'</td>';
        echo '<td>'.$arr["reason"].'</td>';
        echo '<td>'.$arr["oms"].'</td>';
        echo '<td>'.$arr["regularity"].'</td>';
    echo '</tr>';
}

function render_table($ind) {
    echo '<table class="checkups">';
    echo '<tr>';
        echo '<th>Что</th>';
        echo '<th>Зачем</th>';
        echo '<th>ОМС</th>';
        echo '<th>Регулярность</th>';
    echo '</tr>';
    echo '<tr>';
        echo '<td colspan="4" class="title">Входит в бесплатный медосмотр по ОМС</td>';
    echo '</tr>';
    
    foreach($ind as $chk_arr) {
        if ( strpos($chk_arr["oms"] , "+") === 0){
            render_table_row($chk_arr);
        }
    }

    echo '<tr>';
        echo '<td colspan="4" class="title">Не входит в бесплатный медосмотр по ОМС</td>';
    echo '</tr>';

    foreach($ind as $chk_arr) {
        if ( strpos($chk_arr["oms"] , "+") !== 0){
            render_table_row($chk_arr);
        }
    }

    echo '</table>';
}

?>