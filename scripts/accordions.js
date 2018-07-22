function open_acc(acc, panel, acc_text){
    acc.toggleClass("acc-active"); //переворачиваем стрелочку справа
    acc_text.text(acc_text.text() == "Открыть" ? "Скрыть" : "Открыть");

    if (panel.css("max-height") == "0px") {
        panel.css("max-height", panel[0].scrollHeight + "px");
    } else {
        panel.css("max-height", "0px");
    }
}

$(document).ready(function() {
    let accordions = $(".accordion");

    let hash = window.location.hash;
    if(hash != ""){
        let acc;
        if (hash == "#register") {
            acc = $("#register-acc");
        } else {
            acc = $(hash);
        }

        let panel = acc.next(),
            acc_text = acc.children().children(".accordions-right");        

        open_acc(acc, panel, acc_text);
    }

    accordions.each(function(index) {
        let acc = $(this),
            panel = acc.next(),
            acc_text = acc.children().children(".accordions-right");

        acc.click(function() {
            open_acc(acc, panel, acc_text);
        });
    })
})