// -----------------------------------------------------------------------------
// All the GSAP animations for the website.
// -----------------------------------------------------------------------------

// Default settings
const defaultDuration = 1;
const defaultEasing = "power3.out";

// Data attributes for GSAP animations
const fadeInAnimation = gsap.utils.toArray("[data-animation='fade-in']");
const fadeUpAnimation = gsap.utils.toArray("[data-animation='fade-up']");
const menuTimeline = gsap.timeline({ paused: true });
const menuTimelineMobile = gsap.timeline({ paused: true });

// Custom GSAP function
function customGSAP(array, start, options) {
  array.length > 0 &&
    array.forEach((item) => {
      const defaultOptions = {
        scrollTrigger: {
          trigger: item,
          start: start,
          invalidateOnResize: true,
        },
      };

      options = { ...defaultOptions, ...options };
      gsap.to(item, options);
    });
}

jQuery(document).ready(function ($) {
  // Fade in animation
  customGSAP(fadeInAnimation, "center bottom", {
    duration: defaultDuration,
    ease: defaultEasing,
    opacity: 1,
  });

  // Fade up animation
  customGSAP(fadeUpAnimation, "20% bottom", {
    duration: defaultDuration,
    ease: defaultEasing,
    opacity: 1,
    y: 0,
  });

  // Menu animation desktop
  menuTimeline.to("#main-navigation", {
    duration: 1,
    ease: "power2.out",
    left: 0,
  });

  menuTimeline.from(
    "#main-nav",
    {
      duration: 1,
      ease: "power2.out",
      x: -800,
    },
    "-=0.8"
  );

  menuTimeline.from(
    "#menufig-container",
    {
      duration: 1,
      ease: "power2.out",
      y: 2000,
    },
    "-=1"
  );

  $("#menu-toggle").click(function () {
    if (
      $("#main-navigation").hasClass("outOfBounds") &&
      !$(".logo-text").hasClass("logo-text--scrolled")
    ) {
      menuTimeline.play();
      $("body").addClass("no-scroll");
    } else if (
      $("#main-navigation").hasClass("outOfBounds") &&
      $(".logo-text").hasClass("logo-text--scrolled")
    ) {
      menuTimeline.play();
      $("body").addClass("no-scroll");
      $(".logo-text").removeClass("logo-text--scrolled");
    } else if ($(document).scrollTop() > 80) {
      menuTimeline.reverse();
      $("body").removeClass("no-scroll");
      $(".logo-text").addClass("logo-text--scrolled");
    } else {
      menuTimeline.reverse();
      $("body").removeClass("no-scroll");
    }

    $("#toggle").toggleClass("active");
    $("#main-header").toggleClass("open-menu");
    $("#main-navigation").toggleClass("outOfBounds");
  });

  // Menu animation mobile
  menuTimelineMobile.to("#main-navigation-mobile", {
    duration: 1,
    ease: "power2.out",
    top: 0,
  });

  menuTimelineMobile.from(
    "#main-nav-mobile",
    {
      duration: 1,
      ease: "power2.out",
      y: -800,
    },
    "-=0.8"
  );
  
  menuTimelineMobile.from(
    "#menufig-container-mobile",
    {
      duration: 1,
      ease: "power2.out",
      y: 2000,
    },
    "-=0.8"
  );

  menuTimelineMobile.from(
    ".socials-mobile",
    {
      duration: 1,
      ease: "power2.out",
      y: 2000,
    },
    "-=1.2"
  );

  $("#menu-toggle-mobile").click(function () {
    if ($("#main-navigation-mobile").hasClass("outOfBounds")) {
      menuTimelineMobile.play();
      $("body").addClass("no-scroll");
    } else {
      menuTimelineMobile.reverse();
      $("body").removeClass("no-scroll");
    }

    $("#toggle-mobile").toggleClass("active");
    $("#main-header").toggleClass("open-menu");
    $("#main-navigation-mobile").toggleClass("outOfBounds");
  });

  //ScrollTrigger for logo
  ScrollTrigger.create({
    start: "top -80",
    end: 99999,
    toggleClass: { className: "logo-text--scrolled", targets: ".logo-text" },
  });
});
