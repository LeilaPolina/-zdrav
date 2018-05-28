
// Результаты теста

$(function () {

	// vars
	var show_index_mass = $('#show_index_mass');
	var res_index_mass = $('#res_index_mass');
	var show_price = $('#show_price');
	var result_price = $('#result_price');
	var total_cacheback = $('#total_cacheback');
	var order_now = $('#order_now');
	var create_lk = $('#create_lk');
	var active_order = false;
	
	var modal_order = $('#modal_order');
	var content_order = $('#content_order');
	var modal_lk = $('#modal_lk');
	var content_lk = $('#content_lk');
	var close_modal = $('#close_modal');
	var close_modal_lk = $('#close_modal_lk');
	
	// order
	var city_order = $('#city_order');
	var phone_order = $('#phone_order');
	var email_order = $('#email_order');
	var license_order = $('#license_order');
	var send_order = $('#send_order');
	
	// lk
	var city_lk = $('#city_lk');
	var phone_lk = $('#phone_lk');
	var email_lk = $('#email_lk');
	var license_lk = $('#license_lk');
	var send_lk = $('#send_lk');
	
	initHandlers();
	choiceAnalyzis();
	calcPrice();
	
	// Обработчики
	function initHandlers () {
	
		// Клик на кнопку индекса массы
		$(show_index_mass).click(function () {
			$(res_index_mass).toggle();
			
			return false;
		});
		
		// Изменение чекбоксов
		$('#analyzes input:checkbox').change(function () {
			calcPrice();
		});
		
		// Клик на Подробнее
		$('.btn_spoiler').click(function () {
			$(this).parent().children('div.spoiler_content').toggle();
			
			return false;
		});
		
		// Показать цены
		$(show_price).click(function () {
			$('.price_cell').css('opacity', '1');
			active_order = true;
			checkActiveOrder();
		});
		
		// Заказать
		$(order_now).click(function () {
			showModalOrder();
		});
		
		// Создать кабинет
		$(create_lk).click(function () {
			showModalLk();
		});
		
		// Клик вне конента модального окна
		$(modal_order).click(function (e) {
			closeModalOrder();
		}).children().click(function (e) { // Отменяем всплытие у потомков
			e.stopPropagation();
		});
		
		// Закрыть окно
		$(close_modal).click(function () {
			closeModalOrder();
		});
		
		// Клик вне конента модального окна
		$(modal_lk).click(function (e) {
			closeModalLk();
		}).children().click(function (e) { // Отменяем всплытие у потомков
			e.stopPropagation();
		});
		
		// Закрыть окно
		$(close_modal_lk).click(function () {
			closeModalLk();
		});
		
		// Отправить заказ
		$(send_order).click(function () {
			sendData('order');
		});
		
		// Отправить лк
		$(send_lk).click(function () {
			sendData('lk');
		});
		
		// Маска для телефонов
		$(".phone_mask").mask("+7(999) 999-99-99");
	}
	
	// Подсчет суммы
	function calcPrice () {
		var elems = $('#analyzes input:checkbox');
		var elem, total = 0;
		for (var i = 0; i < elems.length; i++) {
			elem = $(elems).get(i);
			if ($(elem).prop('checked')) {
				total += parseInt($(elem).parent().parent().find('td:last-child').text());
				// Выделяем строку
				$(elem).parent().parent().addClass('active_str');
			} else {
				// Убираем выделение строки
				$(elem).parent().parent().removeClass('active_str');
			}
		}
		
		$(result_price).html(total);
		$(total_cacheback).html(Math.round(total / 100 * 5));
		
		checkActiveOrder();
	}
	
	// Выбор рекомендованных анализов
	function choiceAnalyzis () {
		$('#checkbox_1').prop('checked', true);
		$('#checkbox_1_2').prop('checked', true);
		$('#checkbox_2').prop('checked', true);
		if (window.dead.indexOf('Желудочно-кишечные болезни') != -1) {
			$('#checkbox_5').prop('checked', true);
		}
		if (window.dead.indexOf('Сердце') != -1 || window.index_mass >= 25) {
			$('#checkbox_6').prop('checked', true);
		}
		if (window.dead.indexOf('Сахарный диабет') != -1) {
			$('#checkbox_7').prop('checked', true);
		}
		if (window.dead.indexOf('Рак') != -1 && window.sex == 'м') {
			$('#checkbox_8').prop('checked', true);
		}
		if (window.dead.indexOf('Рак') != -1 && window.sex == 'ж') {
			$('#checkbox_9').prop('checked', true);
		}
		if (window.dead.indexOf('Инсульт') != -1) {
			$('#checkbox_10').prop('checked', true);
		}
		if (window.sex == 'м') {
			$('#checkbox_11').prop('checked', true);
		}
		if (window.sex == 'ж') {
			$('#checkbox_12').prop('checked', true);
		}
		$('#checkbox_13').prop('checked', true);
		
	}
	
	// Проверка активности заказа
	function checkActiveOrder () {
		if (active_order) {
			$(order_now).removeClass('disable_btn');
		}
		if ($(result_price).html() == '0') {
			$(order_now).addClass('disable_btn');
		}
	}
	
	function showModalOrder () {
		if ($(order_now).hasClass('disable_btn')) {
			return;
		}
		$(modal_order).fadeIn(300);
	}
	
	function closeModalOrder () {
		$(modal_order).fadeOut(300);
	}
	
	function showModalLk () {
		$(modal_lk).fadeIn(300);
	}
	
	function closeModalLk () {
		$(modal_lk).fadeOut(300);
	}
	
	// Отправка данных
	function sendData (type_data) {
	
		if (type_data == 'order') {
			if ($(phone_order).val() == '' || $(email_order).val() == '') {
				alert('Необходимо заполнить все поля');
				return;
			}
			if (!$(license_order).prop('checked')) {
				alert('Необходимо согласиться на лицензионное соглашение');
				return;
			}
		} else if (type_data == 'lk') {
			if ($(city_lk).val() == '' || ($(phone_lk).val() == '' && $(email_lk).val() == '')) {
				alert('Необходимо заполнить все поля');
				return;
			}
			if (!$(license_lk).prop('checked')) {
				alert('Необходимо согласиться на лицензионное соглашение');
				return;
			}
		}
		
		var load_content = '<div class="load_img"><img src="images/loading.gif" /></div><div class="load_txt">Идет отправка данных</div>';
		var city = '', phone = '', email = '';
		if (type_data == 'order') {
			$(content_order).html(load_content);
			city = $(city_order).find('option:selected').val();
			phone = $(phone_order).val();
			email = $(email_order).val();
		} else if (type_data == 'lk') {
			$(content_lk).html(load_content);
			phone = $(phone_lk).val();
			email = $(email_lk).val();
		}
		
		var elems = $('#analyzes input:checkbox');
		var elem, txt, price, prnt, total = 0;
		var ans = [];
		for (var i = 0; i < elems.length; i++) {
			elem = $(elems).get(i);
			if ($(elem).prop('checked')) {
				prnt = $(elem).parent().parent();
				txt = $(prnt).find('td:nth-child(2)').text();
				price = parseInt($(prnt).find('td:last-child').text());
				total += price;
				ans.push({ text: txt, price: price });
			}
		}
		
		var data = {
			sex: window.sex,
			year_birth: window.year_birth,
			height: window.height,
			weight: window.weight,
			smoking: window.smoking,
			sport: window.sport,
			food: window.food,
			alcohol: window.alcohol,
			work: window.work,
			children: window.children,
			parturition: window.parturition,
			dead: window.dead,
			total: total,
			
			analyzes: ans,
			
			city: city,
			phone: phone,
			email: email,
			type_data: type_data,
		};
		
		$.ajax({
			url: 'mail.php',
			type: 'POST',
			data: data,
			success: function (res) {
				var success_content = '<div class="load_txt">Данные успешно отправлены.</div>';
				if (type_data == 'order') {
					$(content_order).html(success_content);
				} else if (type_data == 'lk') {
					$(content_lk).html(success_content);
				}
			}
		});
	}
});