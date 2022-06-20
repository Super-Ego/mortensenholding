<?

function medarbejder_post_type()
{
    register_post_type(
        'medarbejdere',
        array(
            'labels' => array(
                'name'              => __('Medarbejdere', 'superegowp'),
                'singular_name'     => __('Medarbejder', 'superegowp'),
                'all_items'         => __('Alle medarbejdere', 'superegowp'),
                'add_new'           => __('Tilføj ny', 'superegowp'),
                'add_new_item'      => __('Tilføj ny medarbejder', 'superegowp'),
                'edit'              => __('Redigér', 'superegowp'),
                'edit_item'         => __('Redigér medarbejder', 'superegowp'),
                'new_item'          => __('Ny medarbejder', 'superegowp'),
                'view_item'         => __('Vis medarbejder', 'superegowp'),
                'search_items'      => __('Søg efter medarbejdere', 'superegowp'),
                'not_found'         => __('Der blev ikke fundet nogle resultater.', 'superegowp'),
                'not_found_in_trash' => __('Der blev ikke fundet noget i papirskurven', 'superegowp'),
                'parent_item_colon' => ''
            ),
            'description' => __('Denne posttype indeholder alle virksomhedens medarbejdere', 'superegowp'),
            'public'                => true,
            'publicly_queryable'    => true,
            'exclude_from_search'   => false,
            'show_ui'               => true,
            'query_var'             => true,
            'menu_position'         => 8,
            'menu_icon'             => 'dashicons-businessman',
            'rewrite'               => array('slug' => 'medarbejder', 'with_front' => false),
            'has_archive'           => 'medarbejdere',
            'capability_type'       => 'post',
            'hierarchical'          => false,
            'delete_with_user'      => false,
            'show_in_rest'          => true,
            'supports' => array('title', 'thumbnail', 'custom-fields')
        )
    );

    //register_taxonomy_for_object_type('category', 'medarbejdere');
    //register_taxonomy_for_object_type('post_tag', 'medarbejdere');
}

add_action('init', 'medarbejder_post_type');

register_taxonomy(
    'afdeling',
    array('medarbejdere'),
    array(
        'hierarchical' => true,
        'labels' => array(
            'name'              => __('Afdelinger', 'superegowp'),
            'singular_name'     => __('Afdeling', 'superegowp'),
            'search_items'      => __('Søg i afdelinger', 'superegowp'),
            'all_items'         => __('Alle Afdelinger', 'superegowp'),
            'parent_item'       => __('Forældre afdeling', 'superegowp'),
            'parent_item_colon' => __('Forældre afdeling:', 'superegowp'),
            'edit_item'         => __('Redigér afdeling', 'superegowp'),
            'update_item'       => __('Opdatér afdeling', 'superegowp'),
            'add_new_item'      => __('Tilføj ny afdeling', 'superegowp'),
            'new_item_name'     => __('Ny afdeling navn', 'superegowp')
        ),
        'show_admin_column'     => true,
        'show_ui'               => true,
        'query_var'             => true,
        'show_in_rest'          => true,
        'rewrite' => array('slug' => 'afdeling'),
    )
);
