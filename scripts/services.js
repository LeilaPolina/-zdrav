$(document).ready(function() {
    let accordions = $(".accordion");

    accordions.each(function(index) {
        let acc = $(this),
            panel = acc.next(),
            acc_text = acc.children().children(".services-right");

        acc.click(function() {
            acc.toggleClass("acc-active"); //переворачиваем стрелочку справа
            acc_text.text(acc_text.text() == "Открыть" ? "Скрыть" : "Открыть");

            if (panel.css("max-height") == "0px") {
                panel.css("max-height", panel[0].scrollHeight + "px");
            } else {
                panel.css("max-height", "0px");
            }
        });
    })
})