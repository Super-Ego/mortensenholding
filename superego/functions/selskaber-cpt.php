<?

// Register Selskaber Post Type
function selskaber_post_type()
{
    $labels = array(
        'name'              => __('Selskaber', 'superegowp'),
        'singular_name'     => __('Selskab', 'superegowp'),
        'all_items'         => __('Alle Selskaber', 'superegowp'),
        'add_new'           => __('Tilføj ny', 'superegowp'),
        'add_new_item'      => __('Tilføj nyt selskab', 'superegowp'),
        'edit'              => __('Redigér', 'superegowp'),
        'edit_item'         => __('Redigér Selskaber', 'superegowp'),
        'new_item'          => __('Nyt Selskab', 'superegowp'),
        'view_item'         => __('Vis selskab', 'superegowp'),
        'search_items'      => __('Søg efter selskab', 'superegowp'),
        'not_found'         =>  __('Der blev ikke fundet nogle resultater.', 'superegowp'),
        'not_found_in_trash' => __('Der blev ikke fundet noget i papirkurven', 'superegowp'),
        'parent_item_colon' => __('Forældre post', 'superegowp')
    );

    $args = array(
        'labels'                => $labels,
        'description'           => __('Dette er et post type til selskaber', 'superegowp'),
        'public'                => true,
        'publicly_queryable'    => true,
        'exclude_from_search'   => false,
        'show_ui'               => true,
        'query_var'             => true,
        'menu_position'         => 6,
        'menu_icon'             => 'dashicons-admin-multisite',
        'rewrite'               => ['slug' => 'selskaber', 'with_front' => false],
        'has_archive'           => false,
        'capability_type'       => 'post',
        'hierarchical'          => false,
        'delete_with_user'      => false,
        'show_in_rest'          => true,
        'supports' => ['title', 'editor', 'author', 'thumbnail', 'excerpt', 'revisions', 'page-attributes']
    );

    register_post_type('selskaber', $args);
}
add_action('init', 'selskaber_post_type', 0);
