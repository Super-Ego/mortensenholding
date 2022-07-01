// -----------------------------------------------------------------------------
// This is the isotope.js script
// -----------------------------------------------------------------------------
"use strict";

jQuery(document).ready(function ($) {
  // Ejendoms filter
  var filters = {};
  $(".filter-tab").click(function () {
    if ($(this).hasClass("active")) {
      $(".options-wrapper").slideUp();
      $(this).removeClass("active");
    } else {
      $(".filter-tab").removeClass("active");
      $(".options-wrapper").slideUp();
      $(this).find($(".options-wrapper")).slideDown();
      $(this).addClass("active");
    }

    // Individual options
    $(".option").click(function () {
      if ($(this).hasClass("active")) {
        $(this).siblings(".option").removeClass("active");
        $(this).removeClass("active");
      } else {
        $(this).siblings(".option").removeClass("active");
        $(this).addClass("active");
        var select_text = $(this).children("span").text();
        $(this).closest(".filter-tab").find(".selected").text(select_text);
      }

      var $buttonGroup = $(this).parents(".options");
      var filterGroup = $buttonGroup.attr("data-filter-group"); // set filter for group

      filters[filterGroup] = $(this).attr("data-filter"); // combine filters

      var filterValue = concatValues(filters);
      $grid.isotope({
        filter: filterValue,
      });
    });
  });

  // Count amount of matches between classes and options
  $(".option").each(function (index) {
    var optionClass = $(this).attr("data-filter");
    var optionCount = $(optionClass).size();
    $(this).children(".count").text(optionCount);

    if ($(this).children(".count").text() == "0") {
      $(this).addClass("remove");
    }
  });

  // flatten object by concatting values
  function concatValues(obj) {
    var value = "";

    for (var prop in obj) {
      value += obj[prop];
    }

    return value;
  }

  // Isotopes
  let $grid = $(".isotope-grid").isotope({
    itemSelector: ".grid-item",
  });
});
