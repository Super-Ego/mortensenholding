<?php
// This file handles the admin area and functions - You can use this file to make changes to the dashboard.

/************* DASHBOARD WIDGETS *****************/
// Disable default dashboard widgets
function disable_default_dashboard_widgets()
{
	// Remove_meta_box('dashboard_right_now', 'dashboard', 'core');    // Right Now Widget
	remove_meta_box('dashboard_recent_comments', 'dashboard', 'core'); // Comments Widget
	remove_meta_box('dashboard_incoming_links', 'dashboard', 'core');  // Incoming Links Widget
	remove_meta_box('dashboard_plugins', 'dashboard', 'core');         // Plugins Widget

	// Remove_meta_box('dashboard_quick_press', 'dashboard', 'core');  // Quick Press Widget
	remove_meta_box('dashboard_recent_drafts', 'dashboard', 'core');   // Recent Drafts Widget
	remove_meta_box('dashboard_primary', 'dashboard', 'core');         //
	remove_meta_box('dashboard_secondary', 'dashboard', 'core');       //

	// Removing plugin dashboard boxes
	remove_meta_box('yoast_db_widget', 'dashboard', 'normal');         // Yoast's SEO Plugin Widget

}

/*
For more information on creating Dashboard Widgets, view:
http://digwp.com/2010/10/customize-wordpress-dashboard/
*/

// Calling all custom dashboard widgets
function superego_custom_dashboard_widgets()
{
	// Superego support meta box
	add_meta_box(
		'superego_support_widget', // ID
		'Superego support', // Title
		'dashboard_support', // Callback
		'dashboard', // Screen
		'side',	// Context
		'high' // Priority
	);

	// Superego support Callback
	function dashboard_support()
	{
?>
		<h2>Superego Support</h2>
		<p>Oplever du problemer eller har du ønsker til ændringer, så kontakt venligst Superego.</p>
		<hr>
		<h3>Horsens afdeling</h3>
		<p>Web: <a href="https://superego.nu/" target="_blank">superego.nu</a></p>
		<p>Email: <a href="mailto:horsens@superego.nu" target="_blank">horsens@superego.nu</a></p>
		<p>Telefon: <a href="tel:+4578702929">+45 78 70 29 29</a></p>
		<hr>
		<h3>Holstebro afdeling</h3>
		<p>Web: <a href="https://superego.nu/" target="_blank">superego.nu</a></p>
		<p>Email: <a href="mailto:holstebro@superego.nu" target="_blank">holstebro@superego.nu</a></p>
		<p>Telefon: <a href="tel:+4570707886">+45 70 70 78 86</a></p>
	<?
	}

	// Custom Welcom Panel
	function superego_welcome_panel()
	{
		$user_info = get_userdata(1);
		$user_name = $user_info->display_name;
		$frontpage_id = get_option('page_on_front');

	?>
		<div class="welcome-panel-content">
			<h2>Velkommen <?= $user_name; ?></h2>
			<p>Vi har samlet nogle links så du kan komme i gang:</p>
		</div>

		<div class="welcome-panel-column-container">
			<div class="welcome-panel-column">
				<h3>Kom i gang</h3>
				<a href="/wp-admin/customize.php" class="button button-primary button-hero load-customize">Tilpas din hjemmeside</a>
			</div>
			<div class="welcome-panel-column">
				<h3>Genveje</h3>
				<ul>
					<li>
						<a href="/wp-admin/post.php?post=<?= $frontpage_id; ?>&action=edit" class="welcome-icon welcome-edit-page">Rediger forside</a>
					</li>
					<li>
						<a href="/wp-admin/nav-menus.php" class="welcome-icon welcome-menus">Håndter menuer</a>
					</li>
					<li>
						<a href="<? echo site_url(); ?>" class="welcome-icon welcome-view-site">Se din hjemmeside</a>
					</li>
				</ul>
			</div>
		</div>

<?
	}

	// Remove and replace Welcome Panel content
	remove_action('welcome_panel', 'wp_welcome_panel');
	add_action('welcome_panel', 'superego_welcome_panel');
}

// removing the dashboard widgets
add_action('admin_menu', 'disable_default_dashboard_widgets');

// adding any custom widgets
add_action('wp_dashboard_setup', 'superego_custom_dashboard_widgets');

/************* CUSTOMIZE ADMIN *******************/
// Custom Backend Footer
function superego_custom_admin_footer()
{
	_e('<span id="footer-thankyou">Udviklet af <a href="https://superego.nu/" target="_blank">Superego</a></span>.', 'superegowp');
}

// adding it to the admin area
add_filter('admin_footer_text', 'superego_custom_admin_footer');

// Load custom admin style
function load_admin_style()
{
	wp_enqueue_style('bootstrap-5-grid', THEME . '/assets/styles/vendors/bootstrap-grid.min.css', false, false, 'all');
	wp_enqueue_style('admin-style', get_template_directory_uri() . '/assets/styles/css/admin.css', false, '1.0.0');
}
add_action('admin_enqueue_scripts', 'load_admin_style');

// Add featured images in backend
add_filter('manage_posts_columns', 'add_img_column');
add_filter('manage_posts_custom_column', 'manage_img_column', 10, 2);

function add_img_column($columns)
{
	$columns = array_slice($columns, 0, 1, true) + array("img" => "Billede") + array_slice($columns, 1, count($columns) - 1, true);
	return $columns;
}

function manage_img_column($column_name, $post_id)
{
	if ($column_name == 'img') {
		echo get_the_post_thumbnail($post_id, 'thumbnail');
	}
	return $column_name;
}

// Remove redundant user roles
// remove_role( 'subscriber' );
// remove_role( 'editor' );
// remove_role( 'contributor' );
// remove_role( 'author' );
// remove_role( 'wpseo_manager' );
// remove_role( 'wpseo_editor' );
// remove_role( 'kunde' );

// add_role(
// 	'kunde',
// 	'Kunde',
// 	get_role( 'editor' )->capabilities
// );

// https://wordpress.org/support/article/roles-and-capabilities/
function author_level_up()
{
	$role = get_role('kunde');

	// Active Addons:
	// $role->add_cap( 'edit_theme_options' );
	// $role->add_cap( 'list_users' );
	// $role->add_cap( 'create_users' );
	// $role->add_cap( 'add_users' );

}
add_action('admin_init', 'author_level_up');

wp_enqueue_style('style', get_stylesheet_uri(), [], filemtime(DIR . '/style.css'), 'all');
