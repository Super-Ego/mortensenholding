<?

// Register login styling
function superego_login_css() {
	wp_enqueue_style( 'superego_login_css', THEME . '/assets/styles/css/login.css', false );
}

// changing the logo link from wordpress.org to Superego
function superego_login_url() {
	return 'https://superego.nu/';
}

// changing the alt text on the logo to show site name
function superego_login_title() {
	return get_option('blogname'); 
}

// calling it only on the login page
add_action( 'login_enqueue_scripts', 'superego_login_css', 10 );
add_filter( 'login_headerurl', 'superego_login_url' );
add_filter( 'login_headertitle', 'superego_login_title');
