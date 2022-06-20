// -----------------------------------------------------------------------------
// This is the main JS file of the Superego theme
// -----------------------------------------------------------------------------

"use strict";

jQuery(document).ready(function ($) {

  // Remove no-js class from HTML
  $('html').removeClass('no-js');

  // Initialize AOS Animation
  AOS.init({
    duration: 800,
    easing: 'ease-out',
    once: true,
  });

  // Add sticky to #header on scroll
  window.addEventListener("scroll", function () {
    var header = document.querySelector("header");
    header.classList.toggle("sticky", window.scrollY > 1);
  });

  // Mobile menu: Toggle menu
  // $('#menu-toggle .inner, #menu-overlay').click(function(){
  //   $('#mobile-menu').toggleClass('active');
  //   $('body').toggleClass('no-scroll');
  //   $('#menu-toggle .inner').toggleClass('active');
  // });

  // Mobile menu: Open dropdowns
  // $("#mobile-menu-inner ul li span").click(function() {
  //   $(this).parent().find('> .sub-menu').slideToggle();
  //   $(this).parent().toggleClass('active');
  // });

}); // End document.ready
