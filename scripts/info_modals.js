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

    info_btns.each(function() {
        $(this).click(function () {
            function changeModalContent(title, text) {
                info_modal_title.html(title);
                info_modal_text.html(text);
            }

            let cls = $(this).attr("class").split(" ")[0];

            info_modal.toggleClass("modal-hidden");
            info_modal.toggleClass("modal-active");

            switch(cls) {
                case "vitamins-info": {
                    changeModalContent(vitamins_title,vitamins_text);
                    break;
                }
                case "hormones-f-info": {
                    changeModalContent(hormones_f_title,hormones_f_text);
                    break;
                }
                case "hormones-m-info": {
                    changeModalContent(hormones_m_title,hormones_m_text);
                    break;
                }
                case "blood-info": {
                    changeModalContent(blood_title,blood_text);
                    break;
                }
                case "pee-info": {
                    changeModalContent(pee_title,pee_text);
                    break;
                }
                case "gastro-info": {
                    changeModalContent(gastro_title,gastro_text);
                    break;
                }
                case "diabetes-info": {
                    changeModalContent(diabetes_title,diabetes_text);
                    break;
                }
                case "cardio-info": {
                    changeModalContent(cardio_title,cardio_text);
                    break;
                }
                case "onco-m-info": {
                    changeModalContent(onco_m_title,onco_m_text);
                    break;
                }
                case "onco-f-info": {
                    changeModalContent(onco_f_title,onco_f_text);
                    break;
                }
                case "vessels-info": {
                    changeModalContent(vessels_title,vessels_text);
                    break;
                }

                case "order-info-lower": {
                    changeModalContent(order_info_title,order_info_text);
                    break;
                }

                default: {
                    changeModalContent("","Произошла непредвиденная ошибка");
                }
            }
        })
    })
})