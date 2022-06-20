<?

// Define template directory
define('DIR', get_template_directory());

// Define theme path
define('THEME', get_stylesheet_directory_uri());

// Register Mobile Detect
require_once(DIR . '/functions/vendors/Mobile_Detect.php');

// Theme support options
require_once(DIR . '/functions/theme-support.php');

// WP Head and other cleanup functions
require_once(DIR . '/functions/cleanup.php');

// Register scripts and stylesheets
require_once(DIR . '/functions/enqueue-scripts.php');

// Register custom menus and menu walkers
require_once(DIR . '/functions/menu.php');

// Register sidebars/widget areas
require_once(DIR . '/functions/sidebar.php');

// Register Advanced Custom Fields settings
require_once(DIR . '/functions/acf.php');

// Add custom posttype and taxonomy
require_once(DIR . '/functions/custom-post-type.php');

// Add Employee Custom Post type
require_once(DIR . '/functions/medarbejdere.php');

// Replace 'older/newer' post links with numbered navigation
require_once(DIR . '/functions/page-navi.php');

// Customize the WordPress login menu
require_once(DIR . '/functions/login.php');

// Customize the WordPress admin
require_once(DIR . '/functions/admin.php');

// Disable emojis
require_once(DIR . '/functions/disable-emoji.php');

// Adds site styles to the WordPress editor
require_once(DIR . '/functions/editor-styles.php');

// Adds custom WP Customizer functionality
require_once(DIR . '/functions/customize.php');

// Adds custom utility functions
require_once(DIR . '/functions/utilities.php');

// Remove IE Support
require_once(DIR . '/functions/no-ie-support.php');

// Makes WordPress comments suck less
//require_once( DIR .'/functions/comments.php' );

// Related post function
// require_once( DIR .'/functions/related-posts.php' );
