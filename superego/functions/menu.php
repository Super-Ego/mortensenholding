<?

// Register menus
register_nav_menus(
	array(
		'main-nav'			=> __('Primary menu', 'superegowp'),
		'footer-links'		=> __('Footer Links', 'superegowp')
	)
);

// Primary menu
function superego_top_nav()
{
	wp_nav_menu(array(
		'container'			=> false,									// Remove nav container
		'menu_id'			=> 'main-nav',								// Adding custom nav id
		'menu_class'		=> 'header-menu menu',						// Adding custom nav class
		'items_wrap'		=> '<ul id="%1$s" class="%2$s">%3$s</ul>',
		'theme_location'	=> 'main-nav',								// Where it's located in the theme
		'depth'				=> 5,										// Limit the depth of the nav
		'fallback_cb'		=> false,									// Fallback function (see below)
		'walker'			=> new Topbar_Menu_Walker()
	));
}

// Primary menu walker
class Topbar_Menu_Walker extends Walker_Nav_Menu
{
	function start_lvl(&$output, $depth = 0, $args = array())
	{
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<ul class=\"sub-menu\">\n";
	}
}

// The Footer Menu
function superego_footer_links()
{
	wp_nav_menu(array(
		'container'			=> 'false',			// Remove nav container
		'menu_id'			=> 'footer-links',	// Adding custom nav id
		'menu_class'		=> 'menu',			// Adding custom nav class
		'theme_location'	=> 'footer-links',	// Where it's located in the theme
		'depth'				=> 0,				// Limit the depth of the nav
		'fallback_cb'		=> ''				// Fallback function
	));
}

// Header Fallback Menu
function superego_main_nav_fallback()
{
	wp_page_menu(array(
		'show_home'			=> true,
		'menu_class'		=> '',		// Adding custom nav class
		'include'			=> '',
		'exclude'			=> '',
		'echo'				=> true,
		'link_before'		=> '',		// Before each link
		'link_after'		=> ''		// After each link
	));
}
