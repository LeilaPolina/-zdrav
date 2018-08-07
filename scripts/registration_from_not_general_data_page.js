var sex="", birth_year="", height="", weight="";
var work="", sport="", food="", children="", risks="", smoking="", alcohol="", sleep="", family_status="", immunity="", education="";
var bodycheck="", whynotbodycheck="";
var sick="", chronic="";
var offered_user_name="", offered_user_phone="";
var user_email="", user_name="", user_password="";
var lifetime="";
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
    
    offered_user_phone = $("#user-phone-for-order").val();
    $("#phone-number").val(offered_user_phone);
    $("#phone-number").trigger('input');

    $("#test-register-modal").css('display', 'block');
}

function generateRandomPassword() {
	$("#rand-confirm-password").text(Math.random().toString(36).substring(2, 6) + Math.random().toString(36).substring(2,6));
}

function checkAnswer(answer) {
	if(answer.result==705) {
		alert("Данный номер уже зарегистрирован!");
	}
	
	else if ($("#agree").attr("checked") == 'checked') {
		user_phone = $("#phone-number").val();
		$("#confirm-phone").text(user_phone);
        generateRandomPassword();

        $("#test-register-modal").css('display', 'none');
        $("#confirm-modal").css('display', 'block');
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

function registration_answer(answer) {
    if(answer.result==701) {
        alert("Что-то пошло не так. Мы работаем над этим!");
    }
    alert("Ваши данные успешно сохранены!");
    window.location.replace('test.php');
}

function send_user_data(callback) {
    user_name = $("#username").val();
    success_modal.style.display = "none";
    $.ajax({
        type : 'POST',
        url: 'process_new_user_data.php',
        data: {sex: sex, birth_year: birth_year, height: height, weight: weight, 
                work: work, sport: sport, food: food, children: children, smoking: smoking, alcohol: alcohol, 
                risks: risks, sick: sick, chronic: chronic, 
                user_email: user_email, user_phone: user_phone, user_password: user_password, user_name: user_name, 
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
    test_reg_modal= document.getElementById('test-register-modal');
	confirm_modal= document.getElementById('confirm-modal');
	success_modal= document.getElementById('success-modal');
	$("#phone-number").mask("+7 (999) 999-99-99");

    $("#test-register-btn").click(function (e) {
        e.preventDefault();
        /*alert("sex:"+sex + " birth_year:" + birth_year + " height:" + height + 
            " weight:" + weight + " work:" + work + " sport:" + sport + " food:" + food + 
            " children:" + children + " risks:" + risks + " smoking:" + smoking + 
            " alcohol:" + alcohol + " user_email:" + user_email + " user_name:" + user_name + 
            " user_password:" + user_password + 
            " sleep:" + sleep + " family_status:" + family_status + " immunity:" + immunity + " education:" + education + 
            " bodycheck:" + bodycheck + " whynotbodycheck:" + whynotbodycheck
            );
        */
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
     
    $("#success-btn").click(function (e) {
        e.preventDefault();
        send_user_data(registration_answer);
    });
	 
	$("#rand-confirm-password").click(function (e) { 
		e.preventDefault();
		$("#confirm-password").val($(this).text());			
	});

    $("#test-register-think-btn").click(function(e) {
		e.preventDefault();
		test_reg_modal.style.display = "none";		
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