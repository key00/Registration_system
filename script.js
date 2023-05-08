sidebarbtn = document.querySelector(".sidebarBtn");
sidebar = document.querySelector(".aside");
console.log("qs working");
sidebarbtn.onclick = function () {
  if (sidebar.classList.contains("sidebar-hide")) {
    sidebar.classList.remove("sidebar-hide");
  } else sidebar.classList.add("sidebar-hide");
};
