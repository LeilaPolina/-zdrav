<?php
    /* $cls используется в info_modals.js */

    function generate_list_item($name, $isAnalysis, $cls = null, $tooltip = null) {
        echo '<li>';
        echo '<div class="an-name">' . $name . '</div>';
        echo '<div class="info-container">';
        if ($tooltip) {
            echo '<div class="questionmark">';
            echo '<span class="tooltip-content">' . $tooltip . '</span>';
            echo '</div>';
        }
        if ($cls) {
            echo '<a class="' . $cls . ' btn-info"> Подробнее</a>';
        }
        echo '</div>';
        echo '</li>';
    }
?>