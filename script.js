// sidebar = document.getElementById(aside);
(function ($) {
  "use strict";

  $("#aside").click(function () {
    if (!$(this).hasClass("sidebar-hide")) {
      $(this).addClass("sidebar-hide");
    } else $(this).removeClass("sidebar-hide");
  });
});
