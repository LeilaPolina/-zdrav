<?php

    function generate_list_item($name, $tooltip = null) {
        echo '<li>';
        echo '<div class="an-name">' . $name . '</div>';
        
        if ($tooltip) {
            echo '<div class="info-container">';
            echo '<div class="questionmark">';
            echo '<span class="tooltip-content">' . $tooltip . '</span>';
            echo '</div>';
            echo '</div>';
        }
        echo '</li>';
    }
?>