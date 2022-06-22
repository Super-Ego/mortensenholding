// -----------------------------------------------------------------------------
// This is the main JS file of the Superego theme
// -----------------------------------------------------------------------------

"use strict";

jQuery(document).ready(function ($) {

  // Remove no-js class from HTML
  $('html').removeClass('no-js');

  // Add sticky to #header on scroll
  window.addEventListener("scroll", function () {
    var header = document.querySelector("header");
    header.classList.toggle("sticky", window.scrollY > 1);
  });

  $('#main-nav').addClass("h2");
  $('#main-nav-mobile').addClass("h1");

}); // End document.ready
