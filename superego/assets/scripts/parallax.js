jQuery(document).ready(function ($) {
    // Standard Parallax
    var parallax = document.getElementsByClassName('parallax');
    new simpleParallax(parallax, {
        scale: 1.2,
        delay: 0.6,
        transition: 'cubic-bezier(0,0,0,1)'
    });
});