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
        }
      }
    });
  });

  fetch("get_advisor.php")
    .then((response) => response.json())
    .then((data) => {
      const advisorSelect = document.getElementById("advisorSelect");

      // Populate the <select> options
      data.forEach((advisor) => {
        const option = document.createElement("option");
        option.value = advisor.id;
        option.text = advisor.firstName + " " + advisor.lastName;
        advisorSelect.appendChild(option);
      });
    })
    .catch((error) => {
      console.error("Error:", error);
    });
})(jQuery);
