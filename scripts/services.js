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
    
    function calculateAnalysisPrice() {
        let an_total_price = 0;
        an_boxes.each(function(){
            let box = $(this),
                pricetag;

            if (box.hasClass("checkbox-checked")) {
                pricetag = box.parent().next().children(".analysis-price");
                pricetag = Number(pricetag.text().split(" ")[0]);
                an_total_price += pricetag;
            } 
        })
        $("#an-price").text(an_total_price + " руб.");
        $("#an-cashback").text(Math.floor(an_total_price * 0.03) + " руб.");
    }

    function calculateCheckupPrice() {
        let ch_total_price = 5900;
        checkup_boxes.each(function(){
            let box = $(this),
                pricetag;

            if (box.hasClass("checkbox-checked")) {
                pricetag = box.parent().next().children(".uzi-price");
                pricetag = Number(pricetag.text().split(" ")[1]);
                ch_total_price += pricetag;
            } 
        })
        $("#checkup-price").text(ch_total_price + " руб.");
        $("#checkup-cashback").children().text(Math.floor(ch_total_price * 0.03) + " руб.");
    }
    
    assignChecked();
    calculateAnalysisPrice();
    calculateCheckupPrice();
    
    an_boxes.change(function(){
        $(this).toggleClass("checkbox-checked");
        $(this).parent().next().toggleClass("hidden");
        calculateAnalysisPrice();
    });

    checkup_boxes.change(function(){
        $(this).toggleClass("checkbox-checked");
        calculateCheckupPrice();
    });

// ORDER HOMECHECKUP PART
    $("#order-home-checkup").click(function(e){
        e.preventDefault();
        $("#order-home-checkup-modal").css('display', 'block');
    });

    $("#order-home-checkup-modal-close").click(function (e) {
        e.preventDefault();    
        $("#order-home-checkup-modal").css('display', 'none');
        $("#error_msg").text("");
    });

    window.onclick = function(e) {
        var modal = document.getElementById('order-home-checkup-modal');
        if (e.target == modal) {
            $("#order-home-checkup-modal").css({'display':'none'});
            $("#error_msg").text("");
        }
    }

    $("#user-phone-for-order").mask("+7 (999) 999-99-99");
    $("#user-phone-for-order").trigger('input');

    $("#submit-home-checkup-order").click(function(e){
        e.preventDefault();
        order_home_checkup();
    });
});

function check_order_checkup_answer(data){    
    $("#order-home-checkup-modal").css('display', 'none');
    if(data.result != "OK"){
        alert("В данный момент сервис недоступен. Попробуйте позднее!");
    }
    else{
        if($("#flag_if_logged_in").val() == "not_logged_in"){
            //alert("Заказ успешно оформлен! Предлагаем создать личный кабинет, чтобы получить доступ ко всем возможностям нашего сервиса");
            // function from registration_from_not_general_data_page.js
            get_data_for_registration(begin_registration);
        }
        else{
            alert("Заказ успешно оформлен!");
        }
    }
}

function send_home_checkup_order(callback){
    $.ajax({
        type: 'POST',
        url: 'orders/order_homecheckup.php',
        async: false,
        data: {
            home_checkup: true,
            user_phone: $("#user-phone-for-order").val(),
            uzi_stomach: $("#uzi-stomach").is(':checked'),
            uzi_liver: $("#uzi-liver").is(':checked'),
            uzi_pee: $("#uzi-pee").is(':checked'),
            uzi_vessels: $("#uzi-vessels").is(':checked'),
            uzi_heart: $("#uzi-heart").is(':checked'),
            uzi_lungs: $("#uzi-lungs").is(':checked')
        },        
        dataType: 'json',
        success: callback,
        error: get_error
    });
}

function order_home_checkup(){
    // dummy validation
    if($("#user-phone-for-order").val().indexOf('_') != -1){
        $("#error_msg").text("Введите корректный номер телефона!");
    }
    else{
        send_home_checkup_order(check_order_checkup_answer);
    }
}    
// ORDER HOMECHECKUP PART ENDS