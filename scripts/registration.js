function generateRandomPassword() {
	$("#rand-confirm-password").text(Math.random().toString(36).substring(2, 6) + Math.random().toString(36).substring(2,6));
}

var phone_number, user_phone="",code;
var test_reg_modal,confirm_modal,success_modal;


function checkAnswer(answer) {
	if(answer.result==705) {
		alert("Данный номер уже зарегистрирован!");
	}
	
	else if ($("#agree").attr("checked") == 'checked') {
		user_phone = $("#phone-number").val();
		$("#confirm-phone").text(user_phone);
		generateRandomPassword();
		test_reg_modal.style.display = "none";
		confirm_modal.style.display = "block";
		$.ajax({
			type : 'POST',
			url:'action_page.php',
			data: {phone:phone_number},
			dataType : 'json', 
			success : function(data){
				code=data.result;
				if(code==700) {
					alert("Cервис недоступен, попробуйте позже");
				}
			}
		});
	}
	
	else if ($("#agree").attr("checked") != 'checked'){
			alert("Для регистрации необходимо согласиться с условиями предоставления сервиса");
		 }
		 
	else {
			alert("Введён некорректный номер телефона");
		 }
}
	
function validatePhoneNumber(callback)  {
		$.ajax({
			type : 'POST',
			url: 'check_phone_number.php',
			data: {phone: phone_number},
			dataType : 'json',
			success: callback
		});
	}
	
$(document).ready(function(){	
	test_reg_modal= document.getElementById('test-register-modal');
	confirm_modal= document.getElementById('confirm-modal');
	success_modal= document.getElementById('success-modal');
	$("#phone-number").mask("+7 (999) 999-99-99");
	$("#itele").mask("+7 (999) 999-99-99");
	$("#itele").trigger('input');
	var sex="", birth_year="", height="", weight="", work="", sport="", food="", children="", risks="", sick="", chronic="", smoking="", alcohol="";
	var offered_user_name="", offered_user_phone="";
	var user_email="", user_name="", user_password="";
	
	
	
	$("#register").submit(function(e){ 
		e.preventDefault();
		offered_user_name = $("#iname").val();
		offered_user_phone = $("#itele").val();
		
		user_email = $("#iemail").val();			
		birth_year = $("#iyear").val();
		height = $("#iheight").val();
		weight = $("#iweight").val();
		
		if($('input[name=sex]:checked').val() == 'Мужской'){
			sex = 'male';
		}
		else{
			sex = 'female';
		}		
		
		work = $('select[name="work"] option:selected').val();
		smoking = $('select[name="smoking"] option:selected').val();
		alcohol = $('select[name="alcohol"] option:selected').val();
		sport = $('select[name="sport"] option:selected').val();
		food = $('select[name="food"] option:selected').val();
		children = $('select[name="children"] option:selected').val();
		
		sick = $("#isick").val();
		chronic = $("#ichronic").val();		
		
		$("#gen_risks option:selected").each(function() {
			risks = risks + "_" + this.value;
		});
		risks = risks.substring(1);
		$("#phone-number").val(offered_user_phone);
		$("#phone-number").trigger('input');
		$("#username").val(offered_user_name);

		test_reg_modal.style.display = "block";
	});

	
	$("#test-register-btn").click(function (e) {
		e.preventDefault();
		phone_number = $("#phone-number").val();
		validatePhoneNumber(checkAnswer);			
	});
	
	
	$("#confirm-btn").click(function (e) {
		e.preventDefault();
		var input_code=$("#confirm-code").val();
		var conf_pass=$("#confirm-password").val();
		if(code==parseInt(input_code) && conf_pass!="") {
			user_password = conf_pass;
			confirm_modal.style.display = "none";
			success_modal.style.display = "block";
		}
		
		else if(conf_pass=="") {
			alert("Введите пароль");
		}
		
		else {
			alert('Введен неверный код');
		}
	 });
	 
	$("#rand-confirm-password").click(function (e) { 
		e.preventDefault();
		$("#confirm-password").val($(this).text());			
	});
	
	$("#test-register-think-btn").click(function(e) {
		e.preventDefault();
		test_reg_modal.style.display = "none";		
	});
	
	$("#success-btn").click(function (e) {
		e.preventDefault();
		user_name = $("#username").val();
		$.ajax({
			type : 'POST',
			url: 'process_new_user_data.php',
			data: {sex: sex, birth_year: birth_year, height: height, weight: weight, work: work, sport: sport, food: food, children: children, risks: risks, sick: sick, chronic: chronic, smoking: smoking, alcohol: alcohol, user_email: user_email, user_phone: user_phone, user_password: user_password, user_name: user_name},
			dataType : 'json',
			success : function(answer){
				
				if(answer.result==701) {
					alert("Что-то пошло не так. Мы работаем над этим!");
				}
				
			}
		});
		success_modal.style.display = "none";
		window.location.replace('general_data.php');
	 });
	 
	 
	 
	$("#test-register-close").click(function (e) {
				e.preventDefault();
				test_reg_modal.style.display = "none";
			});
			
	$("#confirm-close").click(function (e) {
				e.preventDefault();
				confirm_modal.style.display = "none";
			});
			
	$("#success-close").click(function (e) {
				e.preventDefault();
				success_modal.style.display = "none";
			});
			
	 
	 
});

	 