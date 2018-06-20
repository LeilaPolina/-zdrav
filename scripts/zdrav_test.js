
// zdrav test

$(function () {
	
	// vars
	var modal_test = $('#modal_test');
	var modal_loading = $('#modal_loading');
	var close_modal = $('#close_modal');
	var cont_testing = $('#cont_testing');
	var cont_num_testing, title_testing, choice_testing, btn_testing;
	var current_q = 0;
	var result_answers = Object.create(null);
	var lifetime = 0;
	var result_warnings = Object.create(null);
	var result_lifetime = Object.create(null);
	
	var questions = [
		/* 1 */
		{
			name: 'sex',
			title: 'Ваш пол:',
			type: 'radio',
			answers: [ 
				{ value: 'м', text: 'Мужской', count: '66'},
				{ value: 'ж', text: 'Женский', count: '77' },
			],
		},
		/* 2 */
		{
			name: 'year_birth',
			title: 'Год рождения:',
			placeholder: 'гггг',
			type: 'input',
		},
		/* 3 */
		{
			name: 'height',
			title: 'Рост:',
			placeholder: 'В сантиметрах',
			type: 'input',
		},
		/* 4 */
		{
			name: 'weight',
			title: 'Вес:',
			placeholder: 'В килограммах (примерно)',
			type: 'input',
		},
		/* 5 */
		{
			name: 'education',
			title: 'Образование:',
			type: 'radio',
			answers: [ 
				{ text: 'Незаконченное среднее', count: '-2'},
				{ text: 'Среднее', count: '-1' },
				{ text: 'Специальное', count: '0' },
				{ text: 'Высшее', count: '2' },
				{ text: 'Ученая степень', count: '4' },
			],
		},
		/* 6 */
		{
			name: 'work',
			title: 'Работа:',
			type: 'radio',
			answers: [ 
				{ text: 'Руководящая', count: '2', warning: 'personal_manager' },
				{ text: 'Творческая', count: '2' },
				{ text: 'Офисная', count: '0' },
				{ text: 'Физически тяжелая', count: '-2' },
				{ text: 'Вредная', count: '-2' },
				{ text: 'На ногах', count: '-1' },
				{ text: 'Не работаю', count: '0' },
				{ text: 'Ничего из перечисленного', count: '2' },
			],
		},
		/* 7 */
		{
			name: 'smoking',
			title: 'Курение:',
			type: 'radio',
			answers: [ 
				{ text: 'Не курю и не курил', count: '3' },
				{ text: 'Курил и бросил', count: '1' },
				{ text: 'Курю иногда немного', count: '-1', warning: 'smoke' },
				{ text: 'Курю каждый день', count: '-3', warning: 'smoke' },
			],
		},
		/* 8 */
		{
			name: 'alcohol',
			title: 'Алкоголь:',
			type: 'radio',
			answers: [ 
				{ text: 'Не пью совсем', count: '2' },
				{ text: 'Пью иногда', count: '0' },
				{ text: 'Пью каждый день', count: '-2' },
			],
		},
		/* 9 */
		{
			choice_answer: 'sex',
			if_answer: {
				'м': {
					name: 'family',
					title: 'Семейное положение:',
					type: 'radio',
					answers: [ 
						{ text: 'Живу один', count: '-1' },
						{ text: 'Живу с супругой', count: '2' },
						{ text: 'Живу с родителями', count: '1' },
						
					],
				},
				'ж': {
					name: 'family',
					title: 'Семейное положение:',
					type: 'radio',
					answers: [ 
						{ text: 'Живу одна', count: '-1' },
						{ text: 'Живу с супругом', count: '2'  },
						{ text: 'Живу с родителями', count: '1' },
					],
				}
			}
		},
		/* 10 */
		{
			name: 'children',
			title: 'Есть ли у Вас дети?',
			type: 'radio',
			answers: [ 
				{ text: 'Нет', count: '0'  },
				{ text: '1', count: '0'  },
				{ text: '2', count: '0'  },
				{ text: '3 или больше', count: '0'  },
			],
		},
		/* 11 */
		{
			name: 'sport',
			title: 'Занятия спортом или фитнесом:',
			type: 'radio',
			answers: [ 
				{ text: 'Занимаюсь более 1 раза в неделю', count: '2' },
				{ text: 'Не занимаюсь', count: '-1' },
			],
		},
		/* 12 */
		{
			name: 'food',
			title: 'Как бы Вы оценили свое питание?',
			type: 'radio',
			answers: [ 
				{ text: 'Здоровое', count: '2' },
				{ text: 'Обычное', count: '0', warning: 'healthyfood' },
				{ text: 'Не здоровое', count: '-2', warning: 'healthyfood' },
			],
		},
		/* 13 */
		{
			name: 'sleep',
			title: 'Сон:',
			type: 'radio',
			answers: [ 
				{ text: 'Чаще высыпаюсь', count: '1' },
				{ text: 'Чаще не высыпаюсь', count: '-1' },
			],
		},
		/* 14 */
		{
			name: 'cold',
			title: 'Как часто Вы болеете простудными заболеваниями?',
			type: 'radio',
			answers: [ 
				{ text: 'Больше 4-х раз в год', count: '-1' },
				{ text: 'Меньше 4-х раз в год', count: '1' },
			],
		},
		/* 15 */
		{
			name: 'dead',
			title: 'Чем болели кровные родственники (родители, дедушки, бабушки, братья, сестры )',
			type: 'checkbox',
			answers: [ 
				{ text: 'Ничем или не знаю', count: '0' },
				{ text: 'Сердце', count: '-2', warning: 'healthyheart' },
				{ text: 'Инсульт', count: '-2' },
				{ text: 'Рак', subcheckbox: [
					{ text: 'Легких' },
					{ text: 'Молочной железы' },
					{ text: 'Кишечника' },
					{ text: 'Печени' },
					{ text: 'Предстательной железы' },
					{ text: 'Кожи' },
					{ text: 'Шейки матки' },
					{ text: 'Другой' },
				], count: '-2' },
				{ text: 'Желудочно-кишечные болезни', count: '-2' },
				{ text: 'Сахарный диабет', count: '-2' },
			],
		},
		/* 16 */
		{
			name: 'bodycheck',
			title: 'Когда Вы в последний раз проходили профилактический медосмотр?',
			type: 'radio',
			answers: [ 
				{ text: 'Не помню когда проходил', count: '-2', warning: 'homebodycheck' },
				{ text: 'Более года назад', count: '0', warning: 'homebodycheck' },
				{ text: 'Менее года назад', count: '2' },
			],
		},
		/* 17 */
		{
			name: 'whynotbodycheck',
			title: 'Что мешает Вам заниматься профилактикой здоровья?',
			type: 'radio',
			answers: [ 
				{ text: 'Нет на это денег', count: '0' },
				{ text: 'Нет на это времени', count: '0', warning: 'personal_manager' },
				{ text: 'Просто лень', count: '0', warning: 'personal_manager' },
				{ text: 'Я занимаюсь профилактикой', count: '0' },
			],
		},
		
	];
	
	initTest();
	initHandlers();
	
	// События
	function initHandlers () {
		// Клик по кнопкам "Начать тест"
		$('.btn_start_test').click(function (e) {
			e.preventDefault();
			
			startTest();
		});
		
		// Клик вне конента модального окна
		$(modal_test).click(function (e) {
			closeModalTest();
		}).children().click(function (e) { // Отменяем всплытие у потомков
			e.stopPropagation();
		});
		
		// Закрыть окно
		$(close_modal).click(function () {
			closeModalTest();
		});
	}
	
	// Начать тест
	function startTest () {
		current_q = 0;
		nextQuestion();
		
		$(modal_test).fadeIn(300);
	}
	
	// Закрыть тест
	function closeModalTest () {
		$(modal_test).fadeOut(300);
	}
	
	// Инициализация теста
	function initTest () {
		// Добавление элементов
		$(cont_testing).append('<div id="cont_num_testing"></div>'+
			'<div id="title_testing"></div>'+
			'<div id="choice_testing"></div>'+
			'<div id="btn_testing"></div>');
		cont_num_testing = $('#cont_num_testing');
		title_testing = $('#title_testing');
		choice_testing = $('#choice_testing');
		btn_testing = $('#btn_testing');
		
	}
	
	// Следующий вопрос
	function nextQuestion () {
		current_q++;
		if (current_q > questions.length) {
			return;
		}
		
		var one_q = questions[current_q-1];
		// Если выбор в зависимости от ответа
		if (one_q.choice_answer != undefined) {
			one_q = one_q.if_answer[result_answers[one_q.choice_answer]];
		}
		
		$(cont_num_testing).html('Вопрос '+ current_q +' из '+ questions.length);
		$(title_testing).html(one_q.title);
		
		$(choice_testing).empty();
		if (one_q.type == 'input') {
			one_q.placeholder = (one_q.placeholder == undefined) ? (one_q.title +'...') : one_q.placeholder;
			if(one_q.name == 'year_birth'){
				$(choice_testing).append('<input type="text" id="year_birth" name="input_test" placeholder="'+ one_q.placeholder +'" />');
				$('#year_birth').mask("9999");
			}
			else{
				$(choice_testing).append('<input type="text" name="input_test" placeholder="'+ one_q.placeholder +'" />');
			}
		} else if (one_q.type == 'radio') {
			var one_radio;
			for (var i = 0; i < one_q.answers.length; i++) {
				one_radio = one_q.answers[i];
				if (one_radio.value == undefined) {
					one_radio.value = one_radio.text;
				}
				$(choice_testing).append('<label><input type="radio" name="radio_test" value="'+ one_radio.value +'" /> '+ one_radio.text +'</label>');
			}
		} else if (one_q.type == 'checkbox') {
			var one_checkbox;
			for (var i = 0; i < one_q.answers.length; i++) {
				one_checkbox = one_q.answers[i];
				if (one_checkbox.value == undefined) {
					one_checkbox.value = one_checkbox.text;
				}
				$(choice_testing).append('<label><input type="checkbox" name="checkbox_test_'+ i +'" data-value="'+ one_checkbox.value +'" /> '+ one_checkbox.text +'</label>');
				if (one_checkbox.subcheckbox != undefined) {
					var one_sub;
					var str = '';
					for (var j = 0; j < one_checkbox.subcheckbox.length; j++) {
						one_sub = one_checkbox.subcheckbox[j];
						if (one_sub.value == undefined) {
							one_sub.value = one_sub.text;
						}
						str += '<label><input type="checkbox" name="subcheckbox_test_'+ j +'" data-value="'+ one_sub.value +'" /> '+ one_sub.text +'</label>';
					}
					$(choice_testing).append('<div class="hidden_subcheckbox">'+ str +'</div>');
					$('input[name="checkbox_test_'+ i +'"]').change(function () {
						if ($(this).prop('checked')) {
							$('.hidden_subcheckbox').show();
						} else {
							$('.hidden_subcheckbox').hide();
							$('.hidden_subcheckbox').find('input:checkbox').prop('checked', false);
						}
					});
				}
			}
		}
		
		$(btn_testing).empty();
		if (current_q <= questions.length - 1) {
			$(btn_testing).append('<div class="btn_next">Следующий вопрос</div>');
			
			// Клик по кнопке далее
			$('.btn_next').click(function () {
				if (validateAndSaveAnswer()) {
					nextQuestion();
				}
			});
		} else {
			$(btn_testing).append('<div class="btn_endtest">Завершить тест</div>');
			
			// Клик по кнопке завершить тест
			$('.btn_endtest').click(function () {
				if (validateAndSaveAnswer()) {
					endTest();
				}
			});
		}
	}
	
	// Валидация и сохранение ответов
	function validateAndSaveAnswer () {
		var one_q = questions[current_q-1];
		if (one_q.choice_answer != undefined) {
			one_q = one_q.if_answer[result_answers[one_q.choice_answer]];
		}
		
		var val = '';
		switch (one_q.type) {
			case 'radio' :
				val = $('input[name="radio_test"]:checked').val();

				if (val == undefined) {
					showErrorTest();
					return false;
				}

				for (var i = 0; i < one_q.answers.length; i++) {
				one_radio = one_q.answers[i];
					if (one_radio.value == undefined) {
						one_radio.value = one_radio.text;
					}
					if (one_radio.value == val) {
						lifetime += +one_radio.count;
						result_lifetime['count_' + one_q.name] = one_radio.count;
						if (one_radio.hasOwnProperty('warning')) {
							result_warnings[one_radio.warning] = 1;
						}
					}
				}
			break;

			case 'input' :
				val = $('input[name="input_test"]').val();
				if (val == '') {
					showErrorTest('Заполните поле');
					return false;
				}
				if (one_q.name == "year_birth" && (val < 1900 || val > 2018)) {
					showErrorTest('Введено не реальное значение');
					return false;
				}
				if (one_q.name == "weight" && (val < 10 || val > 200)) {
					showErrorTest('Введено не реальное значение');
					return false;
				}
				if (one_q.name == "height" && (val < 50 || val > 250)) {
					showErrorTest('Введено не реальное значение');
					return false;
				}
			break;
			
			case 'checkbox' :
				var tmp = [];
				var elems = $(choice_testing).find('input:checkbox');
				var elem;

				for (var i = 0; i < elems.length; i++) {

					elem = $(elems).get(i);
					if ($(elem).prop('checked')) {
						tmp.push($(elem).attr('data-value'));

						for (var j = 0; j < one_q.answers.length; j++) {
							one_checkbox = one_q.answers[j];
							if (one_checkbox.value == undefined) {
								one_checkbox.value = one_checkbox.text;
							}
							if (one_checkbox.value == $(elem).attr('data-value')) {
								lifetime += +one_checkbox.count;
								result_lifetime['count_' + one_q.name] = one_checkbox.count;
								if (one_checkbox.hasOwnProperty('warning')) {
									result_warnings[one_checkbox.warning] = 1;
								}
							}
						}

					}

				}

				val = tmp.join(', ');

			break;
		}
		result_answers[one_q.name] = val;

		
		return true;
	}
	
	// Показать ошибку в тесте
	function showErrorTest (msg) {
		msg = msg || 'Выберите значение';
		if ($('.error_test').length != 0) {
			$('.error_test').html(msg);
		} else {
			$(btn_testing).append('<div class="error_test">'+ msg +'</div>');
		}
	}
	
	// Завершение теста
	function endTest () {
		var str = '';
		for (var key in result_answers) {
			str += '<input type="hidden" name="'+ key +'" value="'+ result_answers[key] +'" />';
		}
		for (var key in result_lifetime) {
			str += '<input type="hidden" name="'+ key +'" value="'+ result_lifetime[key] +'" />';
		}
		for (var key in result_warnings) {
			str += '<input type="hidden" name="'+ key +'" value="'+ result_warnings[key] +'" />';
		}
		str += '<input type="hidden" name="lifetime" value="'+ lifetime +'" />';
		$('body').append('<form action="test_results_processing.php" method="POST" id="form_test">'+ str +'</form>');
		
		$(modal_test).hide();
		$(modal_loading).show();
		
		setTimeout(function () {
			$('#form_test').submit();
		}, 4000);
	}
	
});