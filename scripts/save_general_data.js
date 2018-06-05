function uniq_fast(a) {
	var seen = {};
	var out = [];
	var len = a.length;
	var j = 0;
	for(var i = 0; i < len; i++) {
		 var item = a[i];
		 if(seen[item] !== 1) {
			   seen[item] = 1;
			   out[j++] = item;
		 }
	}
	return out;
}

$(document).ready(function(){
	$("#itele").mask("+7 (999) 999-99-99");
	$("#itele").trigger('input');
	//$("#iyear").mask("9999-99-99");
	//$("#iyear").trigger('input');
	var save_sex="", save_birth_year="", save_height="", save_weight="", save_work="", save_sport="", save_food="", save_children="", save_risks="", save_sick="", save_chronic="", save_smoking="", save_alcohol="",  save_user_email="", save_user_name="", save_user_phone="";
	$("#save_gen_data").submit(function(e){
		e.preventDefault();
		save_user_email = $("#iemail").val();
		save_user_phone	= $("#itele").val();	
		save_birth_year = $("#iyear").val();
		save_height = $("#iheight").val();
		save_weight = $("#iweight").val();
		save_sex = $('input[name=sex]:checked').val();
		save_work = $('select[name="work"] option:selected').val();
		save_smoking = $('select[name="smoking"] option:selected').val();
		save_alcohol = $('select[name="alcohol"] option:selected').val();
		save_sport = $('select[name="sport"] option:selected').val();
		save_food = $('select[name="food"] option:selected').val();
		save_children = $('select[name="children"] option:selected').val();	
		save_sick = $("#isick").val();
		save_chronic = $("#ichronic").val();
		save_user_name = $('#iname').val();
		
		save_risks_array = [];
		$("input:checkbox[name=risks_group]:checked").each(function() {
			save_risks_array.push(this.value);
		});
		save_risks_array = uniq_fast(save_risks_array);
		save_risks = save_risks_array.join('_');
		
		$.ajax({
			type : 'POST',
			url: 'save_general_data.php',
			data: {save_sex: save_sex, save_birth_year: save_birth_year, save_height: save_height, save_weight: save_weight, save_work: save_work, save_sport: save_sport, save_food: save_food, save_children: save_children, save_risks: save_risks, save_sick: save_sick, save_chronic: save_chronic, save_smoking: save_smoking, save_alcohol: save_alcohol, save_user_email: save_user_email, save_user_phone: save_user_phone, save_user_name: save_user_name},
			dataType : 'json',
			success : function(answer){
				//alert(answer.result);
				if(answer.result=="OK"){
					alert("Ваши данные были сохранены!");
				}
				if(answer.result==701) {
					alert("Что-то пошло не так. Мы работаем над этим!");
				}
				else if(answer.result==704){
					alert("Этот номер телефона уже зарезервирован для другого аккаунта");
				}
			}
		});
		//alert("Ваши данные были сохранены!");
		
	});
});