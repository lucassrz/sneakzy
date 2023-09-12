require("./bootstrap");

$(document).ready(function () {
    $(".burger").click(function () {
        $(".stick").toggleClass(function () {
            return $(this).is(".open, .close") ? "open close" : "open";
        });
    });
});
