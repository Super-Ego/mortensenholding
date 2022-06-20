<?
// Adds styles and scripts to the WordPress editor
add_action('init', 'add_editor_styles');
function add_editor_styles()
{
    add_editor_style(get_template_directory_uri() . '/assets/styles/css/main.css');
    add_editor_style(get_template_directory_uri() . '/style.css');
    add_editor_style(THEME . '/assets/styles/vendors/swiper-bundle.min.css');
}

add_action('admin_enqueue_scripts', 'my_enqueue');

add_action('init', 'add_editor_script');
function add_editor_script()
{
    if (is_admin()) {
        // Register Admin js
        wp_enqueue_script('admin-js', THEME . '/assets/scripts/admin.js', array('jquery'), false, false);
        wp_enqueue_script('swiper-js', THEME . '/assets/scripts/vendors/swiper-bundle.min.js', array('jquery'), false, false);
        wp_enqueue_script('aos-3-js', THEME . '/assets/scripts/vendors/aos-3.js', array('jquery'), false, false);
        wp_enqueue_script('isotope-js', THEME . '/assets/scripts/vendors/isotope.pkgd.min.js', array('jquery'), false, false);
        wp_enqueue_script('fancybox-js', THEME . '/assets/scripts/vendors/fancybox.umd.js', array('jquery'), false, false);
        wp_enqueue_script('theme-editor', get_template_directory_uri() . '/assets/scripts/editor.js', ['wp-blocks', 'wp-dom'], filemtime(get_template_directory() . '/assets/scripts/editor.js'), true);

        // Register Google fonts from Customizer
        if (get_theme_mod('setting_google_fonts')) :
            wp_enqueue_style('google-fonts', get_theme_mod('setting_google_fonts'), [], null);
        endif;

        // Register Adobe Typekit from Customizer
        if (get_theme_mod('setting_adobe_typekit')) :
            wp_enqueue_style('adobe-typekit', get_theme_mod('setting_adobe_typekit'), [], null);
        endif;

        //wp_enqueue_script('awp-gutenberg-filters', get_template_directory_uri() . '/assets/scripts/gutenberg-filters.js', ['wp-edit-post']);
    }
}
add_action('enqueue_block_editor_assets', 'add_editor_script');
