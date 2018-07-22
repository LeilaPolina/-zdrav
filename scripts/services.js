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
    })
})