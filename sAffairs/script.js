(function ($) {
  "use strict";

  $(".content").each(function () {
    $(this).click(function () {
      if (!$(this).hasClass("active")) {
        $(".content").each(function () {
          $(this).removeClass("active");
        });
        $(".dashboard").each(function () {
          $(this).removeClass("active");
        });
        $(this).addClass("active");

        if ($(this).hasClass("active")) {
          if ($(this).hasClass("info")) {
            $(".info.dashboard").addClass("active");
          }

          if ($(this).hasClass("payment")) {
            $(".payment.dashboard").addClass("active");
          }
        }
      }
    });
  });
})(jQuery);
