<div class="threeb plan blue-shadow">
	<div class="rec-wrapper">
	<div class="rec-icon-container">
		<div class="icon-immunity"></div>
	</div>
	<div class="rec-container">
		<div class="rec-text-container">
            <?php
                if(!$user->is_logged_in()) {
                    echo '<div class="rec-text">После регистрации для вас будет создан Индивидуальный план профилактики здоровья на 3 года.</div>';
                    echo '<div class="rec-text-additional">Сейчас можете посмотреть каким он будет</div>';
                } else {
                    echo '<div class="rec-text">Рекомендуем воспользоваться индивидуальным планом профилактики здоровья на 3 года.</div>';
                }
            ?>
		</div>
		<div class="rec-button-container">
            <?php
                if($user->is_logged_in()) {
                    echo '<a class="rec-button" href="plan/individual_plan.php" target="_blank">Перейти</a>';
                } else {
                    echo '<a class="rec-button" href="plan/demo.php" target="_blank">Демо</a>';
                }
            ?>
		</div>
	</div>
	</div>
</div>