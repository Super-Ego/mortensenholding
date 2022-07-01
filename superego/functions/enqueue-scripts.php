<?

// Enqueue scripts
function site_scripts()
{

  // Call global $wp_styles variable to add conditional wrapper around ie stylesheet the WordPress way
  global $wp_styles;
  //global $detect;

  /* STYLESHEETS */

  // Register Theme style.css (Used for Custom properties in backend)
  wp_enqueue_style('style', get_stylesheet_uri(), [], filemtime(DIR . '/style.css'), 'all');

  // Register main stylesheet
  wp_enqueue_style('main-style', THEME . '/assets/styles/css/main.css', [], filemtime(DIR . '/assets/styles/css/main.css'), 'all');

  // Register Bootstrap Grid Style
  wp_enqueue_style('bootstrap-5-grid', THEME . '/assets/styles/vendors/bootstrap-grid.min.css', [], filemtime(DIR . '/assets/styles/vendors/bootstrap-grid.min.css'), 'all');

  // Register Cookieinformation Style (Enable if Cookieinformation)
  //wp_enqueue_style('cookieinformation-style', THEME . '/assets/styles/cookieinformation.css', [], filemtime(get_template_directory() . '/assets/styles/cookieinformation.css'), 'all');

  // Register Fancybox 4 Style (CDN)
  //wp_enqueue_style('fancybox-style', 'https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css', [], null, 'all');

  // Register Swiper Style (CDN)
  //wp_enqueue_style('swiper-style', 'https://unpkg.com/swiper@8/swiper-bundle.min.css', [], null, 'all');

  /* SCRIPTS */

  // Register Main JS
  wp_enqueue_script('main', THEME . '/assets/scripts/main.js', ['jquery'], filemtime(DIR . '/assets/scripts/main.js'), true);

  // Register GSAP JS  (CDN)
  wp_enqueue_script('gsap', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.2/gsap.min.js', ['jquery'], null, true);

  // Register GSAP JS SrollTrigger  (CDN)
  wp_enqueue_script('gsap-scrolltrigger', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.2/ScrollTrigger.min.js', ['jquery', 'gsap'], null, true);

  // Register GSAP JS
  wp_enqueue_script('gsap-client', THEME . '/assets/scripts/gsap.js', ['jquery'], filemtime(DIR . '/assets/scripts/gsap.js'), true);

  // Register Simple Parallax JS (CDN)
  //wp_enqueue_script('simple-parallax-js', '//cdn.jsdelivr.net/npm/simple-parallax-js@5.5.1/dist/simpleParallax.min.js', ['jquery'], null, false);

  // Register Fancybox 4 JS (CDN)
  //wp_enqueue_script('fancybox-js', 'https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js', ['jquery'], null, false);

  // Register Formidable JS (Enable on pages / blocks with Formidable forms)
  //wp_enqueue_script('formidable-js', THEME . '/assets/scripts/formidable.js', ['jquery'], filemtime(DIR . '/assets/scripts/formidable.js'), false);

  // Register Parallax JS for Simple Parallax (Enable on pages / blocks with parallax)
  //wp_enqueue_script('parallax-js', THEME . '/assets/scripts/parallax.js', ['jquery'], filemtime(DIR . '/assets/scripts/formidable.js'), false);

  // Register frontpage script & stylesheet
  //if (is_front_page()) :
  //wp_enqueue_style('home-style', THEME . '/assets/styles/css/home.css', [], filemtime(DIR . '/assets/styles/css/home.css'), 'all');
  //wp_enqueue_script('home-js', THEME . '/assets/scripts/home.js', ['jquery'], filemtime(DIR . '/assets/scripts/home.js'), false);
  //endif;

  /* FONTS */

  // Register Google fonts from Customizer
  if (get_theme_mod('setting_google_fonts')) :
    wp_enqueue_style('google-fonts', get_theme_mod('setting_google_fonts'), [], null);
  endif;

  // Register Adobe Typekit from Customizer
  if (get_theme_mod('setting_adobe_typekit')) :
    wp_enqueue_style('adobe-typekit', get_theme_mod('setting_adobe_typekit'), [], null);
  endif;

  // Register logged-in styling
  if (is_user_logged_in()) :
    wp_enqueue_style('logged-in', THEME . '/assets/styles/css/logged-in.css', [], filemtime(DIR . '/assets/styles/css/logged-in.css'), 'all');
  endif;

  // if ($detect->isMobile()) :
  //   wp_enqueue_style('header-mobile', THEME . '/assets/styles/css/header-mobile.css', [], filemtime(DIR . '/assets/styles/css/main.css'), 'all');
  // else:
  //   wp_enqueue_style('header-desktop', THEME . '/assets/styles/css/header-desktop.css', [], filemtime(DIR . '/assets/styles/css/main.css'), 'all');
  // endif;
}
add_action('wp_enqueue_scripts', 'site_scripts', 999);

// Remove wp version param from any enqueued scripts
// function remove_version($src)
// {
//   if (strpos($src, 'ver='))
//     $src = remove_query_arg('ver', $src);
//   return $src;
// }
// add_filter('style_loader_src', 'remove_version', 9999);
// add_filter('script_loader_src', 'remove_version', 9999);
