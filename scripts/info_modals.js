$(document).ready(function() {
    let unregistered_modal = $("#unregistered-wip"),
        registered_modal = $("#registered-wip"),
        info_modal = $("#info-modal"),
        info_modal_title = $("#info-modal-title"),
        info_modal_text = $("#info-modal-text"),
        unregistered_modal_btns = $(".button-unregistered-wip"),
        registered_modal_btns = $(".button-registered-wip"),
        close_btns = $(".close-modal"),
        info_btns = $(".btn-info"),
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

    info_btns.each(function () {
        $(this).click(function () {
            let cls = $(this).attr("class").split(" ")[0],
                /* объект из info_modal_texts.js */
                new_title = modal_texts[cls + "_title"],
                new_text = modal_texts[cls + "_text"];

            function changeModalContent(title, text) {
                info_modal_title.html(title);
                info_modal_text.html(text);
            }

            info_modal.toggleClass("modal-hidden");
            info_modal.toggleClass("modal-active");
            changeModalContent(new_title, new_text);
        })
    })
})