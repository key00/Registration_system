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

          if ($(this).hasClass("semester")) {
            $(".semester.dashboard").addClass("active");
          }

          if ($(this).hasClass("course")) {
            $(".course.dashboard").addClass("active");
          }

          if ($(this).hasClass("transc")) {
            $(".transc.dashboard").addClass("active");
          }

          if ($(this).hasClass("transfer")) {
            $(".transfer.dashboard").addClass("active");
          }
        }
      }
    });
  });

  $.ajax({
    url: "add_course.php",
    type: "GET",
    success: function (response) {
      $("#search_select").append(response);
    },
  });
})(jQuery);
