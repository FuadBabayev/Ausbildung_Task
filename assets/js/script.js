$(function () {
    "use strict";

    // Show & Hide Password
    let togglePassword = $(".form-group .icon.blind-button");
    togglePassword.each(function (index, item) {
        $(item).on("click", function () {
            let type = $(this).prev().attr("type");
            if (type == "password") {
                $(this).prev().attr("type", "text");
                $(this).children().attr("class", "fa-solid fa-eye");
            } else {
                $(this).prev().attr("type", "password");
                $(this).children().attr("class", "fa-solid fa-eye-slash");
            }
        });
    });
    // Show & Hide Password

});