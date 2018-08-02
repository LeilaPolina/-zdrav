$(document).ready(function () {
    if (window.matchMedia('(max-width: 768px)').matches) {
        adaptTooltipsPosition();
    }

    $(window).resize(function () {
        if (window.matchMedia('(max-width: 768px)').matches) {
            adaptTooltipsPosition();
        }
    })
})

/* поворачивает tooltip направо */
/* если родительский questionmark слишком близко к левому краю */
function adaptTooltipsPosition() {
    $(".questionmark").each(function () {
            let qmark = $(this),
                tt = qmark.children(".tooltip-content");

            if (qmark.position().left < 168) {
                tt.css("right", "");
                tt.css("left", "1%");
            } else {
                tt.css("left", "");
                tt.css("right", "1%");
            }
    })
}