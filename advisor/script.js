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

  fetch("faculty-department.json")
    .then((response) => response.json())
    .then((data) => {
      const facultySelect = document.getElementById("facultySelect");
      const departmentSelect = document.getElementById("departmentSelect");
      const faculties = Object.keys(data);

      // Populate faculties in select options
      faculties.forEach((faculty) => {
        const option = document.createElement("option");
        option.value = faculty;
        option.text = faculty;
        facultySelect.appendChild(option);
      });

      // Update department options when faculty selection changes
      facultySelect.addEventListener("change", () => {
        // Clear existing options
        departmentSelect.innerHTML = "";

        const selectedFaculty = facultySelect.value;
        const selectedDepartments = data[selectedFaculty];

        // Populate departments in select options
        selectedDepartments.forEach((department) => {
          const option = document.createElement("option");
          option.value = department;
          option.text = department;
          departmentSelect.appendChild(option);
        });
      });
    });
})(jQuery);
