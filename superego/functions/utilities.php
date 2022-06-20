<?

// SVG Image function to return SVG from assets/images/svg folder
// Use echo svg_image(file_name); 
function svg_image($filename)
{
  $theme_path = get_stylesheet_directory();
  $svg_file = file_get_contents($theme_path . '/assets/images/svg/' . $filename . '.svg');

  if ($svg_file) {
    return $svg_file;
  } else {
    return null;
  }
}

// Swiper enqueue function
function se_enqueue_swiper()
{
  if (!wp_script_is('swiper')) :
    wp_enqueue_script('swiper', 'https://unpkg.com/swiper@8/swiper-bundle.min.js', ['jquery'], null, true);
    wp_enqueue_style('swiper', 'https://unpkg.com/swiper@8/swiper-bundle.min.css', [], null, 'all');
  endif;
}

// Fancybox enqueue function
function se_enqueue_fancybox()
{
  if (!wp_script_is('fancybox')) :
    wp_enqueue_script('fancybox', 'https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js', ['jquery'], null, true);
    wp_enqueue_style('fancybox', 'https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css', [], null, 'all');
  endif;
}

// Fancybox enqueue function
function se_enqueue_isotope()
{
  if (!wp_script_is('isotope')) :
    wp_enqueue_script('isotope', 'https://unpkg.com/isotope-layout@3.0.6/dist/isotope.pkgd.min.js', ['jquery'], null, true);
  endif;
}
