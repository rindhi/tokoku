"use strict";
$(function () {
    $(".js-nav-toggle").on("click", function (s) {
        s.preventDefault(), $(".js-nav").toggleClass("is-visible"), $(this).toggleClass("is-open")
    })
}), $("#intro").imagesLoaded(function () {
    $(".js-intro-img").addClass("is-animated")
});