$(document).ready(function() {
    $(".responsive-icon").click(function() {
        let resp_navbar = $(".responsive-navbar-menu");
        if (resp_navbar.css("visibility") == "hidden") {
            resp_navbar.css("visibility","visible");
            resp_navbar.css("max-height", resp_navbar[0].scrollHeight + "px");
        } else {
            resp_navbar.css("max-height", "0px");
            resp_navbar.css("visibility","hidden");
        }
    })
})