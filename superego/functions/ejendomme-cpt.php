<?

// Register Ejendomme Post Type
function ejendom_post_type()
{
    $labels = array(
        'name'              => __('Ejendomme', 'superegowp'),
        'singular_name'     => __('Ejendom', 'superegowp'),
        'all_items'         => __('Alle ejendomme', 'superegowp'),
        'add_new'           => __('Tilføj ny', 'superegowp'),
        'add_new_item'      => __('Tilføj nyt selskab', 'superegowp'),
        'edit'              => __('Redigér', 'superegowp'),
        'edit_item'         => __('Redigér ejendom', 'superegowp'),
        'new_item'          => __('Ny ejendom', 'superegowp'),
        'view_item'         => __('Vis ejendom', 'superegowp'),
        'search_items'      => __('Søg efter ejendom', 'superegowp'),
        'not_found'         =>  __('Der blev ikke fundet nogle resultater.', 'superegowp'),
        'not_found_in_trash' => __('Der blev ikke fundet noget i papirkurven', 'superegowp'),
        'parent_item_colon' => __('Forældre post', 'superegowp')
    );

    $args = array(
        'labels'                => $labels,
        'description'           => __('Dette er et post type til ejendomme', 'superegowp'),
        'public'                => true,
        'publicly_queryable'    => true,
        'exclude_from_search'   => false,
        'show_ui'               => true,
        'query_var'             => true,
        'menu_position'         => 6,
        'menu_icon'             => 'dashicons-admin-multisite',
        'rewrite'               => ['slug' => 'ejendomme', 'with_front' => false],
        'has_archive'           => false,
        'capability_type'       => 'post',
        'hierarchical'          => false,
        'delete_with_user'      => false,
        'show_in_rest'          => true,
        'supports' => ['title', 'editor', 'author', 'thumbnail', 'excerpt', 'revisions', 'page-attributes']
    );

    register_post_type('ejendom', $args);
    // register_taxonomy_for_object_type('category', 'ejendom');
	// register_taxonomy_for_object_type('post_tag', 'ejendom');
}
add_action('init', 'ejendom_post_type', 0);

//now let's add custom categories (these act like categories)
register_taxonomy(
	'beliggenhed',
	array('ejendom'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
	array(
		'hierarchical' => true,     /* if this is true, it acts like categories */
		'labels' => array(
			'name' => __('Beliggenhed', 'superegowp'), /* name of the custom taxonomy */
			'singular_name' => __('Beliggenhed', 'superegowp'), /* single taxonomy name */
			'search_items' =>  __('Search Custom Categories', 'superegowp'), /* search title for taxomony */
			'all_items' => __('All beliggenhededer', 'superegowp'), /* all title for taxonomies */
			'parent_item' => __('Parent Custom Category', 'superegowp'), /* parent title for taxonomy */
			'parent_item_colon' => __('Parent Custom Category:', 'superegowp'), /* parent taxonomy title */
			'edit_item' => __('Redigér beliggenhed', 'superegowp'), /* edit custom taxonomy title */
			'update_item' => __('Opdatér beliggenhed', 'superegowp'), /* update title for taxonomy */
			'add_new_item' => __('Tilføj ny beliggenhed', 'superegowp'), /* add new title for taxonomy */
			'new_item_name' => __('Ny beliggenhed', 'superegowp') /* name title for taxonomy */
		),
		'show_admin_column' => true,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array('slug' => 'beliggenhed'),
		'show_in_rest' => true,
	)
);

register_taxonomy(
	'mortensen_type',
	array('ejendom'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
	array(
		'hierarchical' => true,     /* if this is true, it acts like categories */
		'labels' => array(
			'name' => __('Typer', 'superegowp'), /* name of the custom taxonomy */
			'singular_name' => __('Type', 'superegowp'), /* single taxonomy name */
			'search_items' =>  __('Search Custom Categories', 'superegowp'), /* search title for taxomony */
			'all_items' => __('All typer', 'superegowp'), /* all title for taxonomies */
			'parent_item' => __('Parent Custom Category', 'superegowp'), /* parent title for taxonomy */
			'parent_item_colon' => __('Parent Custom Category:', 'superegowp'), /* parent taxonomy title */
			'edit_item' => __('Redigér type', 'superegowp'), /* edit custom taxonomy title */
			'update_item' => __('Opdatér type', 'superegowp'), /* update title for taxonomy */
			'add_new_item' => __('Tilføj ny type', 'superegowp'), /* add new title for taxonomy */
			'new_item_name' => __('Ny type', 'superegowp') /* name title for taxonomy */
		),
		'show_admin_column' => true,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array('slug' => 'type'),
		'show_in_rest' => true,
	)
);

register_taxonomy(
	'storrelse',
	array('ejendom'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
	array(
		'hierarchical' => true,     /* if this is true, it acts like categories */
		'labels' => array(
			'name' => __('Størrelser', 'superegowp'), /* name of the custom taxonomy */
			'singular_name' => __('Størrelse', 'superegowp'), /* single taxonomy name */
			'search_items' =>  __('Search Custom Categories', 'superegowp'), /* search title for taxomony */
			'all_items' => __('All størrelser', 'superegowp'), /* all title for taxonomies */
			'parent_item' => __('Parent Custom Category', 'superegowp'), /* parent title for taxonomy */
			'parent_item_colon' => __('Parent Custom Category:', 'superegowp'), /* parent taxonomy title */
			'edit_item' => __('Redigér størrelse', 'superegowp'), /* edit custom taxonomy title */
			'update_item' => __('Opdatér størrelse', 'superegowp'), /* update title for taxonomy */
			'add_new_item' => __('Tilføj ny størrelse', 'superegowp'), /* add new title for taxonomy */
			'new_item_name' => __('Ny størrelse', 'superegowp') /* name title for taxonomy */
		),
		'show_admin_column' => true,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array('slug' => 'storrelse'),
		'show_in_rest' => true,
	)
);