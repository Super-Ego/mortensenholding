// -----------------------------------------------------------------------------
// This is the swiper.js script
// -----------------------------------------------------------------------------

"use strict";

jQuery(document).ready(function ($) {
  let swiper = new Swiper(".ejendomSwiper", {
    effect: "fade",
    fadeEffect: {
      crossFade: true,
    },
    centeredSlides: true,
    pagination: {
      el: ".swiper-pagination",
    },
    navigation: {
      nextEl: ".button-right",
      prevEl: ".button-left",
    },
  });
});
