document.addEventListener('DOMContentLoaded', function() {
    const burgerMenu = document.getElementById('burger-menu');
    const menuList = document.getElementById('menu-list');

    burgerMenu.addEventListener('click', function() {
        menuList.classList.toggle('active');
        burgerMenu.classList.toggle('active');
    });
});
