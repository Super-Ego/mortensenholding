<?

// Sidebar & Widgets areas
function superego_register_sidebars() {
	register_sidebar(array(
		'id' => 'sidebar1',
		'name' => __('Sidebar 1', 'superegowp'),
		'description' => __('The first (primary) sidebar.', 'superegowp'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	register_sidebar(array(
		'id' => 'offcanvas',
		'name' => __('Offcanvas', 'superegowp'),
		'description' => __('The offcanvas sidebar.', 'superegowp'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

}
// End sidebar & Widgets areas

add_action( 'widgets_init', 'superego_register_sidebars' );
