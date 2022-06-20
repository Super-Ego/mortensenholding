<?

// Fire all our initial functions at the start
add_action('after_setup_theme', 'superego_start', 16);

function superego_start()
{
	// Launching operation cleanup
	add_action('init', 'superego_head_cleanup');

	// Remove pesky injected css for recent comments widget
	add_filter('wp_head', 'superego_remove_wp_widget_recent_comments_style', 1);

	// Clean up comment styles in the head
	add_action('wp_head', 'superego_remove_recent_comments_style', 1);

	// Clean up gallery output in wp
	add_filter('gallery_style', 'superego_gallery_style');

	// Cleaning up excerpt
	add_filter('excerpt_more', 'superego_excerpt_more');

	// Stop auto update emails
	add_filter('auto_plugin_update_send_email', '__return_false');

	// Disable automatic "Your Site Has Been Updated..." emails
	add_filter('auto_core_update_send_email', 'superego_disable_core_update_emails', 10, 4);
	function superego_disable_core_update_emails($send, $type, $core_update, $result)
	{
		if (!empty($type) && $type == 'success') {
			return false;
		}

		return true;
	}

	// Disable auto-update plugin email
	add_filter(
		'auto_plugin_update_send_email',
		'__return_false'
	);
}

// The default wordpress head is a mess. Let's clean it up by removing all the junk we don't need.
function superego_head_cleanup()
{
	// Remove category feeds
	remove_action('wp_head', 'feed_links_extra', 3);

	// Remove post and comment feeds
	remove_action('wp_head', 'feed_links', 2);

	// Remove EditURI link
	remove_action('wp_head', 'rsd_link');

	// Remove Windows live writer
	remove_action('wp_head', 'wlwmanifest_link');

	// Remove index link
	remove_action('wp_head', 'index_rel_link');

	// Remove previous link
	remove_action('wp_head', 'parent_post_rel_link', 10, 0);

	// Remove start link
	remove_action('wp_head', 'start_post_rel_link', 10, 0);

	// Remove links for adjacent posts
	remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

	// Remove WP version
	remove_action('wp_head', 'wp_generator');

	// Remove WP-JSON
	remove_action('wp_head', 'rest_output_link_wp_head');
} /* end superego head cleanup */

// Remove injected CSS for recent comments widget
function superego_remove_wp_widget_recent_comments_style()
{
	if (has_filter('wp_head', 'wp_widget_recent_comments_style')) {
		remove_filter('wp_head', 'wp_widget_recent_comments_style');
	}
}

// Remove injected CSS from recent comments widget
function superego_remove_recent_comments_style()
{
	global $wp_widget_factory;
	if (isset($wp_widget_factory->widgets['WP_Widget_Recent_Comments'])) {
		remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));
	}
}

// Remove injected CSS from gallery
function superego_gallery_style($css)
{
	return preg_replace("!<style type='text/css'>(.*?)</style>!s", '', $css);
}

// Remove the annoying […] to a Read More link
function superego_excerpt_more($more)
{
	global $post;
	// edit here if you like
	return '<a class="excerpt-read-more" href="' . get_permalink($post->ID) . '" title="' . __('Read', 'superegowp') . get_the_title($post->ID) . '">' . __('... Read more &raquo;', 'superegowp') . '</a>';
}

//  Stop WordPress from using the sticky class and style WordPress sticky posts using the .wp-sticky class instead
function remove_sticky_class($classes)
{
	if (in_array('sticky', $classes)) {
		$classes = array_diff($classes, array("sticky"));
		$classes[] = 'wp-sticky';
	}

	return $classes;
}
add_filter('post_class', 'remove_sticky_class');

//This is a modified the_author_posts_link() which just returns the link. This is necessary to allow usage of the usual l10n process with printf()
function superego_get_the_author_posts_link()
{
	global $authordata;
	if (!is_object($authordata))
		return false;
	$link = sprintf(
		'<a href="%1$s" title="%2$s" rel="author">%3$s</a>',
		get_author_posts_url($authordata->ID, $authordata->user_nicename),
		esc_attr(sprintf(__('Posts by %s', 'superegowp'), get_the_author())), // No further l10n needed, core will take care of this one
		get_the_author()
	);
	return $link;
}

// Remove margin on root element
function remove_admin_login_header()
{
	remove_action('wp_head', '_admin_bar_bump_cb');
}
add_action('get_header', 'remove_admin_login_header');

// Remove Block styling
// function super_remove_wp_block_library_css(){
// 	wp_dequeue_style( 'wp-block-library' );
// }
// add_action( 'wp_enqueue_scripts', 'super_remove_wp_block_library_css' );

// Remove WP Embed
function dequeue_scripts()
{
	wp_deregister_script('wp-embed');
}
add_action('wp_enqueue_scripts', 'dequeue_scripts');

//Remove JQuery migrate (Should be activated if using Swiper.js)
// function remove_jquery_migrate($scripts) {
//     if ( !is_admin() && isset( $scripts->registered['jquery'] ) ) {
//         $script = $scripts->registered['jquery'];

//         if ( $script->deps ) {
//             $script->deps = array_diff( $script->deps, array(
//                 'jquery-migrate'
//             ));
//         }
//     }
// }
// add_action( 'wp_default_scripts', 'remove_jquery_migrate' );