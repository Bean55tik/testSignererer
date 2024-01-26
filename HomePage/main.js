const hamburger = document.querySelector(".burger");
const dropdown = document.querySelector(".dropdown");
const fade = document.querySelector(".dropdown li a");

hamburger.addEventListener("click", function () {
  dropdown.classList.toggle("open");
});