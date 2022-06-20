// Swiper code wrapped in function to initialize inside document.ready
var initializeSwiper = function ($block) {
    var swiper = new Swiper(".swiper-slider", {
        slidesPerView: 3,
        spaceBetween: 16,
        grabCursor: true,
        loop: true,
    });
}

jQuery(document).ready(function ($) {
    // Initialize block on page load (front end)
    initializeSwiper();

    // Initialize block preview (editor)
    if (window.acf) {
        window.acf.addAction('render_block_preview/type=swiper', initializeSwiper);
    }
});