document.addEventListener('DOMContentLoaded', function() {
    const header = document.querySelector('#header');
    const burgerMenu = document.querySelector('.burger-menu');
    const navLinks = document.querySelector('#nav-links');

    // Slide-in animation for header
    setTimeout(() => {
        header.classList.add('active');
    }, 100);

    // Burger menu toggle
    burgerMenu.addEventListener('click', function() {
        burgerMenu.classList.toggle('active');
        navLinks.classList.toggle('active');
    });
});