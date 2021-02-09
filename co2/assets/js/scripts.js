(function ($) {
  $(".menu_btn").on("click", function () {
    $(".menu_layout").toggle();
    $(".menu").toggle();
    $("body").toggleClass("overflow");
  });
  $(".menu_layout").on("click", function () {
    $(".menu_layout").toggle();
    $(".menu").toggle();
    $("body").toggleClass("overflow");
  });

  $(".js-more").on("click", function () {
    $("html, body").animate({
      scrollTop: $("#js-more").offset().top,
    });
    return false;
  });
})(jQuery);
