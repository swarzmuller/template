const hamburger = document.querySelector(".hamburger");
const menu = document.querySelector(".menu-top-menu-container");

hamburger.addEventListener('click', () => {
    hamburger.classList.toggle('active__menu');
    menu.classList.toggle('active__menu');
});