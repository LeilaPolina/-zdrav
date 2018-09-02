<!DOCTYPE html>

<!--#######################Register Test Modal#####################################-->  
<div class="modal-window" id="test-register-modal"> 
	<div class="modal-window-content" id="test-register-content">
		<div class="modal-window-body sm-body">
			<div class="modal-header register_modal_header" >
				<span class="close" id="test-register-close">&times;</span>
				<div class="modal-title">Регистрация</div>
			</div>
			<div class="register-form-wrapper">
				<div id="test-register-text-wrapper">
					<p class="test-register-text">Чтобы <span class="test-reg-span">сохранить результаты теста,</span> рекомендуем создать <br>
					Личный кабинет</p>
					<p class="test-register-text">Это <span class="test-reg-span">бесплатно открывает полный доступ</span> ко всем <br>
						возможностям нашего сервиса </p>
				</div>
				<form id="register-form" class="modal-form">
					<div class="input-phone">
						<p class="modal-label" id="phone-label">Номер мобильного телефона</p>
						<input type="text" name="phone-number" class="modal-input" id="phone-number">
					</div>
					<div class="checkbox">
						<p class="agree-label" >
							<input type="checkbox" id="agree" name="agree" checked> Я согласен с условиями предоставления сервиса
						</p>
					</div>
					<div id="test-reg-btns">
						<a type="button" class="modal-btn" id="test-register-btn" href="#">Создать</a>
						<a type="button" class="modal-btn" id="test-register-think-btn" href="#">Я еще подумаю</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>		
		
<!--######################Confirm modal######################################-->
<div class="modal-window" id="confirm-modal">
	<div class="modal-window-content" id="confirm-content">
		<div class="modal-window-body sm-body">
			<div class="modal-header confirm_modal_header">
				<span class="close" id="confirm-close">&times;</span>
				<div class="modal-title">Подтверждение телефона</div>
			</div>
			<div class="confirm-form-wrapper" >
				<p id="confirm-text" >На номер <span class="phone_number" id="confirm-phone">+7(925)304-26-34</span>был выслан код для <br>подтверждения телефона </p>
				<form id="code-form" class="modal-form">
					<div class="confirm-input">
						<div class="input-code">
							<p class="modal-label" >Введите полученный код</p>
							<input type="text" name="confirm-code" id="confirm-code" class="modal-input" minlength="4" maxlength="4" >
						</div>
						<div class="input-password">
							<p class="modal-label">Используйте пароль <a href="#" id="rand-confirm-password" style="text-decoration:none">hjkjjjas</a><i class="fa fa-question-circle help-icon" data-title="Нажмите на пароль"></i> или введите другой</p>
							<input type="password" name="confirm-password" id="confirm-password" class="modal-input">
						</div>
					</div>
					<a type="button" class="modal-btn" id="confirm-btn" >Подтвердить</a>
				</form>
			</div>
		</div>
	</div>
</div>	
	
<!--######################Success modal######################################-->	
<div class="modal-window" id="success-modal" >
	<div class="modal-window-content" id="success-content">
		<div class="modal-window-body">
				<div class="success-header">
					<span class="close" id="success-close">&times;</span>
					<p class="modal-title" id="success-title"> Поздравляем с регистрацией Личного кабинета <br>на сервисе Здравствую.рф!</p>
				</div>
				<div class="success-container">
					<p id="success-p1">
						Вы сделали важный шаг к сохранению здоровья и продлению жизни.<br>Теперь у Вас есть возможность воспользоваться всеми нашими сервисами. <br>
						Результаты теста помещены в раздел Общие сведения. На их основании мы будем <br> давать рекомендации для наиболее качественной и полной профилактики здоровья.<br> Изменить эти данные можно в любой момент.
					</p>
					
					<hr class="success-border">
					<div class="success-form-wrapper"  >
						<p>Цель нашего сервиса продлить вашу жизнь и сделать ее более здоровой, но сделать<br> это без вашего участия мы не сможем. Поэтому, с вашего позволения, мы бы хотели <br>
						изредка напоминать Вам о необходимости уделить время профилактике здоровья.<br>Обещаем не быть навязчивыми и прекратить по первой Вашей просьбе.					
						</p>
					</div>
					<form class="modal-form reminder-form">
						<div class="success-checkbox">
								<input type="checkbox" id="reminder" name="reminder" checked >
								<p id="reminder-label" >Разрешить <br> напоминания</p>
						</div>
					</form>
					<hr class="success-border">
					<div class="username-wrapper">
						<form class="username-form">
							<p class="modal-label">Как к Вам можно обращаться?</p>
							<input type="text" name="username" id="username" class="modal-input" >
						</form>	
						<div class="success-text">
							<p>Добро пожаловать!</p>
							<p>Будьте здоровы и живите долго!</p>
							<p>Мы поможем.</p>
						</div>
					</div>
					<div class="success-btn-wrapper">
						<a type="button" class="modal-btn" id="success-btn" href="#">Войти</a>
					</div>
				</div>
			</div>
	</div>
</div>

<!--#######################Register AND Confirm Modal#####################################-->
<div class="modal-window" id="register-n-confirm-modal">
	<div class="modal-window-content" id="register-n-confirm-content">
		<div class="modal-window-body sm-body">
			<div class="modal-header confirm_modal_header">
				<span class="close" id="register-n-confirm-close">&times;</span>
				<div class="modal-title">Ваш заказ успешно оформлен! Теперь нужно подтвердить номер</div>
			</div>
			<div class="confirm-form-wrapper" >
				<p id="register-n-confirm-text" >На номер <span class="phone_number" id="register-n-confirm-phone">+7(925)304-26-34</span>был выслан код для <br>подтверждения телефона </p>
				<form id="register-n-code-form" class="modal-form">
					<div class="confirm-input">
						<div class="input-code">
							<p class="modal-label" >Введите полученный код</p>
							<input type="text" name="register-n-confirm-code" id="register-n-confirm-code" class="modal-input" minlength="4" maxlength="4" >
						</div>
						<div class="input-password">
							<p class="modal-label">Используйте пароль <a href="#" id="rand-register-n-confirm-password" style="text-decoration:none">hjkjjjas</a><i class="fa fa-question-circle help-icon" data-title="Нажмите на пароль"></i> или введите другой</p>
							<input type="password" name="register-n-confirm-password" id="register-n-confirm-password" class="modal-input">
						</div>
					</div>
					<div class="checkbox">
						<p class="agree-label" >
							<input type="checkbox" id="register-n-agree" name="agree" checked> Я согласен с условиями предоставления сервиса
						</p>
					</div>
					<a type="button" class="modal-btn" id="register-n-confirm-btn" >Подтвердить</a>
				</form>
			</div>
		</div>
	</div>
</div>	