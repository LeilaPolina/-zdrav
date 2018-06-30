$(document).ready(function() {
    let unregistered_modal = $("#unregistered-wip"),
        registered_modal = $("#registered-wip"),
        unregistered_modal_btns = $(".button-unregistered-wip"),
        registered_modal_btns = $(".button-registered-wip"),
        close_btns = $(".close"),
        active_modal = null;
        
    unregistered_modal_btns.each(function (index) {
        $(this).click(function () {
            unregistered_modal.toggleClass("modal-hidden");
            unregistered_modal.toggleClass("modal-active");
        })
    })

    registered_modal_btns.each(function (index) {
        $(this).click(function () {
            registered_modal.toggleClass("modal-hidden");
            registered_modal.toggleClass("modal-active");
        })
    })

    close_btns.each(function (index) {
        $(this).click(function () {
            active_modal = $(".modal-active");
            active_modal.toggleClass("modal-hidden");
            active_modal.toggleClass("modal-active");
        })
    })
/* не работает да и бог с ним
    window.onclick = function (event) {
        if (active_modal != null) {
            active_modal.toggleClass("modal-hidden");
            active_modal.toggleClass("modal-active");
        }
    }
    */
})