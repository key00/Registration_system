// sidebarbtn = document.querySelector(".sidebarBtn");
// sidebar = document.querySelector(".aside");
// console.log("qs working");
// sidebarbtn.onclick = function () {
//   if (sidebar.classList.contains("sidebar-hide")) {
//     sidebar.classList.remove("sidebar-hide");
//   } else sidebar.classList.add("sidebar-hide");
// };

(function ($) {
  "use strict";
  console.log("hello");
  $(".content").each(function () {
    console.log("hello1");
    $(this).click(function () {
      console.log("button clicked");
      if (!$(this).hasClass("active")) {
        $(".content").each(function () {
          $(this).removeClass("active");
        });
        $(".dashboard").each(function () {
          $(this).removeClass("active");
        });
        $(this).addClass("active");
        console.log("hello2");
        if ($(this).hasClass("active")) {
          if ($(this).hasClass("pinfo")) {
            $(".p_info.dashboard").addClass("active");
          }

          if ($(this).hasClass("trans")) {
            $(".std_transc.dashboard").addClass("active");
          }

          if ($(this).hasClass("curr_sem")) {
            $(".current.dashboard").addClass("active");
          }

          if ($(this).hasClass("course")) {
            $(".courses.dashboard").addClass("active");
          }

          if ($(this).hasClass("transfer")) {
            $(".transfer.dashboard").addClass("active");
          }
          console.log("hello3");
        }
      }
    });
  });
})(jQuery);
