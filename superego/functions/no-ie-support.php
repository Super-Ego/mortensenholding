<?
// This theme doesn't allow access from IE users
global $is_IE;

// Load CSS + HTML popup if IE
if ($is_IE) :
  // load HTML for No IE Support
  get_template_part('/template-parts/parts/ie-no-support');

  // Register script for IE
  function ie_scripts() {
      wp_enqueue_style('ie-no-support', THEME . '/assets/styles/css/ie-no-support.css');
  }
  add_action('wp_enqueue_scripts', 'ie_scripts', 999);
endif;
