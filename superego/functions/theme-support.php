<?

// Adding WP Functions & Theme Support
function superego_theme_support()
{

	// Add WP Thumbnail Support
	add_theme_support('post-thumbnails');

	// Default thumbnail size
	set_post_thumbnail_size(125, 125, true);

	// Add RSS Support
	add_theme_support('automatic-feed-links');

	// Add support for Editor styles
	add_theme_support('editor-styles');

	// Add Support for WP Controlled Title Tag
	add_theme_support('title-tag');

	// Add Block Styles
	add_theme_support('wp-block-styles');

	// Remove core block patterns
	remove_theme_support('core-block-patterns');

	// Add HTML5 Support
	add_theme_support(
		'html5',
		[
			'comment-list',
			'comment-form',
			'search-form',
			'script',
			'style'
		]
	);

	// Adding post format support
	add_theme_support(
		'post-formats',
		array(
			'aside',             // title less blurb
			'gallery',           // gallery of images
			'link',              // quick link to other site
			'image',             // an image
			'quote',             // a quick quote
			'status',            // a Facebook like status update
			'video',             // video
			'audio',             // audio
			'chat'               // chat transcript
		)
	);

	// Add support for WooCommerce
	add_theme_support('woocommerce');

	// Set the maximum allowed width for any content in the theme, like oEmbeds and images added to posts.
	$GLOBALS['content_width'] = apply_filters('superego_theme_support', 1200);
} /* end theme support */

add_action('after_setup_theme', 'superego_theme_support');

// Initialize global Mobile Detect
function mobile_detect_global()
{
	global $detect;
	$detect = new Mobile_Detect;
}
add_action('after_setup_theme', 'mobile_detect_global');

// Removes comments from admin menu
add_action('admin_menu', 'my_remove_admin_menus');
function my_remove_admin_menus()
{
	remove_menu_page('edit-comments.php');
}

// Removes comments from post and pages
add_action('init', 'remove_comment_support', 100);
function remove_comment_support()
{
	remove_post_type_support('post', 'comments');
	remove_post_type_support('page', 'comments');
}

// Removes comments from admin bar
add_action('wp_before_admin_bar_render', 'mytheme_admin_bar_render');
function mytheme_admin_bar_render()
{
	global $wp_admin_bar;
	$wp_admin_bar->remove_menu('comments');
}
