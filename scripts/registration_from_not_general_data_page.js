var sex="", birth_year="", height="", weight="";
var work="", sport="", food="", children="", risks="", smoking="", alcohol="", sleep="", family_status="", immunity="", education="";
var bodycheck="", whynotbodycheck="";
var sick="", chronic="";
var offered_user_name="", offered_user_phone="";
var user_email="", user_name="", user_password="";
var lifetime="";
var phone_number = "";
// variable to know if values must be processed as ids or words when saved to db
var from_ids = 1;

function get_data_for_registration(callback){
    $.ajax({
        type : 'POST',
        url: 'get_data_for_registration.php',
        data: {get_reg_data: true},
        dataType : 'json',
        success : callback,        
        error: function (jqXHR, exception) {
            var msg = '';
            if (jqXHR.status === 0) {
                msg = 'Not connect.\n Verify Network.';
            } else if (jqXHR.status == 404) {
                msg = 'Requested page not found. [404]';
            } else if (jqXHR.status == 500) {
                msg = 'Internal Server Error [500].';
            } else if (exception === 'parsererror') {
                msg = 'Requested JSON parse failed.';
            } else if (exception === 'timeout') {
                msg = 'Time out error.';
            } else if (exception === 'abort') {
                msg = 'Ajax request aborted.';
            } else {
                msg = 'Uncaught Error.\n' + jqXHR.responseText;
            }
        }
    });
}

function begin_registration(data){
    birth_year = data.result.year_birth;
    height = data.result.height;
    weight = data.result.weight;    
    sex = data.result.sex;
    
    work = data.result.job;
    smoking = data.result.smoking;
    alcohol = data.result.alcohol;
    sport = data.result.sport;
    food = data.result.diet;
    children = data.result.children;
    risks = data.result.risks.join('_');

    sleep = data.result.sleep;
    family_status = data.result.family_status;
    immunity = data.result.immunity;
    education = data.result.education;
    bodycheck = data.result.bodycheck;
    whynotbodycheck = data.result.whynotbodycheck;

	lifetime = data.result.lifetime;
	from_ids = 0;
    
    phone_number = $("#user-phone-for-order").val();
    validatePhoneNumber(checkAnswer);
}

function generateRandomPassword() {
	$("#rand-register-n-confirm-password").text(Math.random().toString(36).substring(2, 6) + Math.random().toString(36).substring(2,6));
}

function checkAnswer(answer) {
	if(answer.result==705) {
		alert("Данный номер уже зарегистрирован!");
	}
	else{
        $("#register-n-confirm-phone").text(phone_number);
        
        generateRandomPassword();        
        $("#register-n-confirm-modal").css('display', 'block');

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

function registration_answer(answer) {
    if(answer.result==701) {
        alert("Что-то пошло не так. Мы работаем над этим!");
    }
    alert("Ваши данные успешно сохранены!");
    window.location.replace('test.php');
}

function send_user_data(callback) {
    user_name = $("#username").val();
    let success_modal= document.getElementById('success-modal');
    success_modal.style.display = "none";
    $.ajax({
        type : 'POST',
        url: 'process_new_user_data.php',
        data: {sex: sex, birth_year: birth_year, height: height, weight: weight, 
                work: work, sport: sport, food: food, children: children, smoking: smoking, alcohol: alcohol, 
                risks: risks, sick: sick, chronic: chronic, 
                user_email: user_email, user_phone: phone_number, user_password: user_password, user_name: user_name, 
                lifetime: lifetime, from_ids: from_ids, },
        dataType : 'json',
        success : callback,
        
        error: function (jqXHR, exception) {
            var msg = '';
            if (jqXHR.status === 0) {
                msg = 'Not connect.\n Verify Network.';
            } else if (jqXHR.status == 404) {
                msg = 'Requested page not found. [404]';
            } else if (jqXHR.status == 500) {
                msg = 'Internal Server Error [500].';
            } else if (exception === 'parsererror') {
                msg = 'Requested JSON parse failed.';
            } else if (exception === 'timeout') {
                msg = 'Time out error.';
            } else if (exception === 'abort') {
                msg = 'Ajax request aborted.';
            } else {
                msg = 'Uncaught Error.\n' + jqXHR.responseText;
            }
        }
    });
}

$(document).ready(function(){
    let reg_n_confirm_modal = document.getElementById('register-n-confirm-modal'),
	    success_modal= document.getElementById('success-modal');
	$("#phone-number").mask("+7 (999) 999-99-99");

    $("#register-n-confirm-btn").click(function (e) {
		e.preventDefault();
		let input_code=$("#register-n-confirm-code").val(),
            conf_pass=$("#register-n-confirm-password").val(),
            agree_checkbox = document.getElementById('register-n-agree');
            
        if(!agree_checkbox.checked){
            alert("Для регистрации необходимо согласиться с условиями предоставления сервиса");
        }
		else if(code==parseInt(input_code) && conf_pass!="") {
			user_password = conf_pass;
			reg_n_confirm_modal.style.display = "none";
			success_modal.style.display = "block";
		}		
		else if(conf_pass=="") {
			alert("Введите пароль");
        }
		else {
			alert('Введен неверный код');
		}
     });
     
    $("#success-btn").click(function (e) {
        e.preventDefault();
        send_user_data(registration_answer);
    });
	 
	$("#rand-register-n-confirm-password").click(function (e) { 
		e.preventDefault();
		$("#register-n-confirm-password").val($(this).text());			
	});

    $("#register-n-confirm-close").click(function (e) {
        e.preventDefault();
        reg_n_confirm_modal.style.display = "none";
    });

    $("#success-close").click(function (e) {
        e.preventDefault();
        success_modal.style.display = "none";
    });

});