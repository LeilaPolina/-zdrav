/* костыль */
/* избавиться как можно скорее */

$(document).ready(function() {
    function pixelsToNumber(str) {
        let pos = str.indexOf("px");
        str = str.substr(0, pos);
        return Number(str);
    }

    let rec_texts = $(".rec-text");
    rec_texts.each(function() {

        if (!$(this).siblings(".plus_life").length) {
            let new_top = pixelsToNumber($(this).css("top")) + 25;
            $(this).css("top", new_top + "px");
        }
    })
})