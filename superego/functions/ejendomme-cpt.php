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
}
add_action('init', 'ejendom_post_type', 0);
