function check_order_answer(data){
    order_homecheckup = false;
    order_analyzes = false;
    $("#order-modal").css('display', 'none');
    if(data.result != "OK"){
        alert("В данный момент сервис недоступен. Попробуйте позднее!");
    }
    else{
        if($("#flag_if_logged_in").val() == "not_logged_in"){
            alert("Заказ успешно оформлен! Предлагаем создать личный кабинет, чтобы получить доступ ко всем возможностям нашего сервиса");
            get_data_for_registration(begin_registration);
        }
        else{
            alert("Заказ успешно оформлен!");
        }
    }
}
// function gets ONLY homecheckup contains, without analyzes part (even if they are in homecheckup block)
function get_order_checkup_contains(order_homecheckup){
    let order_items = "";
    if(order_homecheckup === true){        
        order_items = "Стандартный домашний медосмотр\n";
        checkup_boxes = $(".checkup-option-only");    
        checkup_boxes.each(function(){
            let item_name, box = $(this);

            if (box.hasClass("checkbox-checked")) {
                item_name = box.next().next().text();
                order_items += item_name + "\n";
            } 
        }); 
    }
    return order_items;
}

// function gets ONLY analyzes part in checkup or analyzes blocks (it depends on arguments values)
function get_order_an_contains(order_homecheckup, order_analyzes){
    let order_items = "";
    // analyzes from homecheckup block
    if(order_homecheckup === true){        
        checkup_boxes = $(".an-option-only");    
        checkup_boxes.each(function(){
            let item_name, box = $(this);

            if (box.hasClass("checkbox-checked")) {
                item_name = box.next().next().text();
                order_items += item_name + "\n";
            } 
        });
    }    
    // analyzes from analyzes block
    else if(order_analyzes === true){
        an_boxes = $(".analysis-checkbox");    
        an_boxes.each(function(){
            let item_name, box = $(this);

            if (box.hasClass("checkbox-checked")) {
                item_name = box.next().next().text();
                order_items += item_name + "\n";
            } 
        });
    }
    return order_items;
}

function send_order(callback, order_homecheckup, order_analyzes){
    $.ajax({
        type: 'POST',
        url: 'orders/order_homecheckup_or_analyzes.php',
        async: false,
        data: {
            order: order_homecheckup || order_analyzes,
            user_phone: $("#user-phone-for-order").val(),
            order_an_items: get_order_an_contains(order_homecheckup, order_analyzes),            
            order_checkup_items: get_order_checkup_contains(order_homecheckup)
        },        
        dataType: 'json',
        success: callback,
        error: get_error
    });
}

function order_home_checkup_or_analyzes(){
    // dummy validation
    if($("#user-phone-for-order").val().indexOf('_') != -1){
        $("#error_msg").text("Введите корректный номер телефона!");
    }
    else{
        send_order(check_order_answer, order_homecheckup, order_analyzes);
    }
}

function calculate_an_price_ajax(callback){
    order_homecheckup = false;
    order_analyzes = true;
    let order_an_items = get_order_an_contains(order_homecheckup, order_analyzes);
    let order_checkup_items = "";
    $.ajax({
        type: 'POST',
        url: 'orders/order_homecheckup_or_analyzes.php',
        async: false,
        data: {
            get_price: true,
            order_an_items: order_an_items,            
            order_checkup_items: order_checkup_items
        },        
        dataType: 'json',
        success: callback,
        error: get_error
    });
}

function calculate_checkup_price_ajax(callback){
    order_homecheckup = true;
    order_analyzes = false;
    let order_an_items = get_order_an_contains(order_homecheckup, order_analyzes);;
    let order_checkup_items = get_order_checkup_contains(order_homecheckup);
    $.ajax({
        type: 'POST',
        url: 'orders/order_homecheckup_or_analyzes.php',
        async: false,
        data: {
            get_price: true,
            order_an_items: order_an_items,            
            order_checkup_items: order_checkup_items
        },        
        dataType: 'json',
        success: callback,
        error: get_error
    });
}

function calculateAnalysisPrice(data){
    let an_total_price = data.result
    $("#an-price").text(an_total_price + " руб.");
    $("#an-cashback").text(Math.floor(an_total_price * 0.03) + " руб.");
    order_homecheckup = false;
    order_analyzes = false;
}

function calculateCheckupPrice(data) {
    let ch_total_price = data.result;
    $("#checkup-price").text(ch_total_price + " руб.");
    $("#checkup-cashback").children().text(Math.floor(ch_total_price * 0.03) + " руб.");    
    order_homecheckup = false;
    order_analyzes = false;
}

order_homecheckup = false;
order_analyzes = false;

$(document).ready(function() {
    let an_boxes = $(".analysis-checkbox"),
        checkup_boxes = $(".checkup-checkbox"); 
    
    function assignChecked() {
        an_boxes.each(function(){
            if ($(this).attr("checked")) {
                $(this).addClass("checkbox-checked");
            } else {
                $(this).parent().next().toggleClass("hidden");
            }
        })

        checkup_boxes.each(function(){
            if ($(this).attr("checked")) {
                $(this).addClass("checkbox-checked");
            }
        })
    }
    
    assignChecked();
    calculate_an_price_ajax(calculateAnalysisPrice);
    calculate_checkup_price_ajax(calculateCheckupPrice);

    an_boxes.change(function(){
        $(this).toggleClass("checkbox-checked");
        $(this).parent().next().toggleClass("hidden");
        calculate_an_price_ajax(calculateAnalysisPrice);
    });

    checkup_boxes.change(function(){
        $(this).toggleClass("checkbox-checked");
        calculate_checkup_price_ajax(calculateCheckupPrice);
    });
    $("#order-home-checkup").click(function(e){
        e.preventDefault();
        $("#order-modal").css('display', 'block');
        order_homecheckup = true;
        order_analyzes = false;
    });

    $("#order-analyzes").click(function(e){
        e.preventDefault();
        $("#order-modal").css('display', 'block');
        order_homecheckup = false;
        order_analyzes = true;
    });

    $("#order-modal-close").click(function (e) {
        e.preventDefault();    
        $("#order-modal").css('display', 'none');
        $("#error_msg").text("");
    });

    window.onclick = function(e) {
        var modal = document.getElementById('order-modal');
        if (e.target == modal) {
            $("#order-modal").css({'display':'none'});
            $("#error_msg").text("");
        }
    }

    $("#user-phone-for-order").mask("+7 (999) 999-99-99");
    $("#user-phone-for-order").trigger('input');

    $("#submit-order").click(function(e){
        e.preventDefault();
        order_home_checkup_or_analyzes();
    });
});