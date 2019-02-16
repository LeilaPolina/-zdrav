
function generateRandomPassword() {
	$("#rand-recover-password").text(Math.random().toString(36).substring(2, 6) + Math.random().toString(36).substring(2,6));
}

var user_phone,code,log_phone;
var login_modal,recover1_modal,recover_modal;

function checkUserAnswer(answer) {
	if(answer.result == 705) {
		generateRandomPassword();
		recover1_modal.style.display = "none";
		recover_modal.style.display = "block";
		$.ajax({
			type : 'POST',
			url:'action_page.php',
			data: {phone:user_phone},
			dataType : 'json', 
			success : function(data){
				code=data.result;
				if(code==700) {
					alert("Cервис недоступен, попробуйте позже");
				}
			}
		});
	}
	
	else {
		alert("Вы не зарегистрированы");
	}
}

function checkUser(callback)  {
	user_phone=$("#phone-number").val();
	$("#recover-phone-span").text(user_phone);
	$.ajax({
		type : 'POST',
		url: 'check_phone_number.php',
		data: {recover_phone: user_phone},
		dataType : 'json',
		success: callback
	});

}

function checkUpdadeResult(answer) {
	if(answer.result==true) {
		window.location.replace('test.php');
	}
	else {
		alert("Не удалось обновить пароль");
	}
}


function checkIsRegisteredUser(answer){
	
	if(answer.result==705) {
		var log_pass=$("#login-password").val();
		$.ajax({
			type : 'POST',
			url:'check_phone_number.php',
			data: {login_phone_number:log_phone, login_password:log_pass},
			dataType : 'json', 
			success : function(data){
				if(data.result==true) {
					window.location.replace('test.php');
				}
				else {
					$("#wrong-log-pass").text("Неверный номер или пароль");
					$("#wrong-log-pass").css( "display", "inline-block" );
				}
			}
		});
	}
	else {
		$("#wrong-log-pass").text("Вы не зарегистрированы");
		$("#wrong-log-pass").css( "display", "inline-block" );
	} 
}

function isRegisteredUser(callback) {
	
		log_phone=$("#login-phone-number").val();
		
		$.ajax({
			type : 'POST',
			url: 'check_phone_number.php',
			data: {login_phone: log_phone},
			dataType : 'json',
			success: callback
		});
}


function update(callback) {
	var input_code=$("#recover-code").val();
	var recov_pass=$("#recover-password").val();
	if(code==parseInt(input_code) && recov_pass!="") {
		user_password = recov_pass;
		recover_modal.style.display = "none";
		$.ajax({
			type : 'POST',
			url: 'check_phone_number.php',
			data: {user_phone: user_phone, new_password:user_password},
			dataType : 'json',
			success: callback
		});
	}
		
	else if(recov_pass=="") {
			alert("Введите пароль");
		}
		
	else {
			alert('Введен неверный код');
	}
}
	
$(document).ready(function () {
	
	login_modal= document.getElementById('login-modal');
	recover1_modal= document.getElementById('recover-first-step-modal');
	recover_modal= document.getElementById('recover-modal');
	$("#login-phone-number").mask("+7 (999) 999-99-99");
	$("#phone-number").mask("+7 (999) 999-99-99");
    $("#lk-login").click(function(e) {
        e.preventDefault();
		login_modal.style.display = "block";
    });
	
	$("#login-btn").click(function(e) {
		e.preventDefault();
		isRegisteredUser(checkIsRegisteredUser);
	});
	
	
	$("#forgot-password").click(function(e) {
        e.preventDefault();
		login_modal.style.display = "none";
		recover1_modal.style.display = "block";
    });
	
	$("#recover1-btn").click(function(e) {
        e.preventDefault();
		checkUser(checkUserAnswer);
    });
	
	$("#recover-btn").click(function (e) {
		e.preventDefault();
		update(checkUpdadeResult);
	 });
	
	$("#rand-recover-password").click(function (e) { 
		e.preventDefault();
		$("#recover-password").val($(this).text());			
	});
	
	
	 
	$("#login-close").click(function (e) {
				e.preventDefault();
				login_modal.style.display = "none";
			});
			
	$("#recover-1-close").click(function (e) {
				e.preventDefault();
				recover1_modal.style.display = "none";
			});
			
	$("#recover-close").click(function (e) {
				e.preventDefault();
				recover_modal.style.display = "none";
			});
	
});