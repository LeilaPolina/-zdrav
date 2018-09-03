<h1>Если у вас есть вопросы, получите консультацию</h1>
<div class="form-container">
	<div class="form-input-box">
		<p class="input-title">Дата последней менструации</p>
		<input class="fullwidth" type="date">
	</div>
		<div class="form-input-box">
		<p class="input-title">Продолжительность цикла</p>
		<input class="tiny" type="text"><span class="input-text-additional"><i>дней</i></span>
	</div>
		<div class="form-input-box">
		<p class="input-title">Сейчас у меня</p>
		<input class="tiny" type="text"><span class="input-text-additional"><i>неделя</i></span>
	</div>
</div>
<?php
	if ($user->is_logged_in()) {
		echo '<button class="button-registered-wip" onclick="send_notification(\'Жду малыша\')">Заказать</button>';
	} else {
		echo '<button class="button-unregistered-wip" onclick="send_notification(\'Жду малыша\')">Заказать</button>';
	}
?>
<h1>Рекомендованные обследования</h1>
<p>Сервис находится в разработке</p>