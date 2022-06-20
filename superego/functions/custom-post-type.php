<?

// Register Custom Post Type
function custom_post_type()
{
    $labels = array(
        'name'              => __('Custom Post', 'superegowp'),
        'singular_name'     => __('Custom Post', 'superegowp'),
        'all_items'         => __('Alle Custom Posts', 'superegowp'),
        'add_new'           => __('Tilføj ny', 'superegowp'),
        'add_new_item'      => __('Tilføj ny Custom Type', 'superegowp'),
        'edit'              => __('Redigér', 'superegowp'),
        'edit_item'         => __('Redigér Post Types', 'superegowp'),
        'new_item'          => __('Ny Post Type', 'superegowp'),
        'view_item'         => __('Vis Post Type', 'superegowp'),
        'search_items'      => __('Søg efter Post Type', 'superegowp'),
        'not_found'         =>  __('Der blev ikke fundet nogle resultater.', 'superegowp'),
        'not_found_in_trash' => __('Der blev ikke fundet noget i papirskurven', 'superegowp'),
        'parent_item_colon' => __('Forældre post', 'superegowp')
    );

    $args = array(
        'labels'                => $labels,
        'description'           => __('This is the example custom post type', 'superegowp'),
        'public'                => true,
        'publicly_queryable'    => true,
        'exclude_from_search'   => false,
        'show_ui'               => true,
        'query_var'             => true,
        'menu_position'         => 6,
        'menu_icon'             => 'dashicons-book',
        'rewrite'               => ['slug' => 'custom_type', 'with_front' => false],
        'has_archive'           => false,
        'capability_type'       => 'post',
        'hierarchical'          => false,
        'delete_with_user'      => false,
        'show_in_rest'          => true,
        'supports' => ['title', 'editor', 'author', 'thumbnail', 'excerpt', 'revisions', 'page-attributes']
    );

    register_post_type('custom_type', $args);

    // Enable categories & Tags for custom posttype
    register_taxonomy_for_object_type('category', 'custom_type');
    register_taxonomy_for_object_type('post_tag', 'custom_type');
}
add_action('init', 'custom_post_type', 0);

// Custom categories (these act like categories)
// register_taxonomy(
//     'custom_cat',
//     array('custom_type'),
//     array(
//         'hierarchical' => true,     /* if this is true, it acts like categories */
//         'labels' => [
//             'name' => __('Custom Categories', 'superegowp'),
//             'singular_name' => __('Custom Category', 'superegowp'),
//             'search_items' =>  __('Search Custom Categories', 'superegowp'),
//             'all_items' => __('All Custom Categories', 'superegowp'),
//             'parent_item' => __('Parent Custom Category', 'superegowp'),
//             'parent_item_colon' => __('Parent Custom Category:', 'superegowp'),
//             'edit_item' => __('Edit Custom Category', 'superegowp'),
//             'update_item' => __('Update Custom Category', 'superegowp'),
//             'add_new_item' => __('Add New Custom Category', 'superegowp'),
//             'new_item_name' => __('New Custom Category Name', 'superegowp')
//         ],
//         'show_admin_column' => true,
//         'show_ui' => true,
//         'query_var' => true,
//         'rewrite' => array('slug' => 'custom-slug'),
//         'show_in_rest'      => true,
//     )
// );

// Custom tags (these act like tags)
// register_taxonomy(
//     'custom_tag',
//     array('custom_type'),
//     array(
//         'hierarchical' => false,    /* if this is false, it acts like tags */
//         'labels' => array(
//             'name' => __('Custom Tags', 'superegowp'),
//             'singular_name' => __('Custom Tag', 'superegowp'),
//             'search_items' =>  __('Search Custom Tags', 'superegowp'),
//             'all_items' => __('All Custom Tags', 'superegowp'),
//             'parent_item' => __('Parent Custom Tag', 'superegowp'),
//             'parent_item_colon' => __('Parent Custom Tag:', 'superegowp'),
//             'edit_item' => __('Edit Custom Tag', 'superegowp'),
//             'update_item' => __('Update Custom Tag', 'superegowp'),
//             'add_new_item' => __('Add New Custom Tag', 'superegowp'),
//             'new_item_name' => __('New Custom Tag Name', 'superegowp')
//         ),
//         'show_in_rest'      => true,
//         'show_admin_column' => true,
//         'show_ui' => true,
//         'query_var' => true,
//     )
// );
