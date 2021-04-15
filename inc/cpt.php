<?php

// Custom Post Type Futures

function custom_post_type_futures() {

    $labels = array(
        'name' => 'Futures',
        'singular_name' => 'Future',
        'add_new' => 'Add New Future',
        'add_new_item' => 'Add new',
        'edit_item' => 'Edit',
        'new_item' => 'New',
        'view_item' => 'View',
        'search_items' => 'Search',
        'not_found' => 'Nothing to found',
        'not_found_in_trash' => 'Nothing to found in trash',
        'menu_name' => 'Futures',
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'exclude_from_search' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array( 'slug' => 'futures'),
        'capability_type' => 'page',
        'has_archive' => false,
        'hierarchical' => false,
        'menu_position' => null,
        'show_in_rest' => true,
        'menu_icon' => 'dashicons-format-aside',
        'supports' => array('title', 'editor', 'author', 'custom-fields', 'excerpt', 'thumbnail', 'revisions', 'sticky'),
    );
    register_post_type('future', $args);

}

add_action('init', 'custom_post_type_futures');

// END Custom Post Type Futures

// Custom Post Type Services

function custom_post_type_services() {

    $labels = array(
        'name' => __( 'Services', 'trptheme' ), /* This is the Title of the Group */
        'singular_name' => __( 'Service', 'trptheme' ), /* This is the individual type */
        'all_items' => __( 'All Services', 'trptheme' ), /* the all items menu item */
        'add_new' => __( 'Add New', 'trptheme' ), /* The add new menu item */
        'add_new_item' => __( 'Add New Service', 'trptheme' ), /* Add New Display Title */
        'edit' => __( 'Edit', 'trptheme' ), /* Edit Dialog */
        'edit_item' => __( 'Edit Services', 'trptheme' ), /* Edit Display Title */
        'new_item' => __( 'New Service', 'trptheme' ), /* New Display Title */
        'view_item' => __( 'View Service', 'trptheme' ),
        'search_items' => __( 'Search Services', 'trptheme' ), 
        'not_found' =>  __( 'Nothing found in the Database.', 'trptheme' ), 
        'not_found_in_trash' => __( 'Nothing found in Trash', 'trptheme' ), 
    );
    $args = array(
        'labels' => $labels,
        'description' => __( 'This is the example custom post type', 'trptheme' ),
        'public' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'show_ui' => true,
        'query_var' => true,
        'menu_position' => 8,
        'menu_icon' => 'dashicons-format-aside', 
        'rewrite'   => array( 'slug' => 'services', 'with_front' => false ), 
        'add_to_menu' => true,
        'has_archive' => false,
        'capability_type' => 'page',
        'hierarchical' => false,
        'show_in_rest' => true,
        'supports' => array('title', 'editor', 'author', 'custom-fields', 'excerpt', 'thumbnail', 'revisions', 'sticky'),
    );
    register_post_type('service', $args);

}

add_action('init', 'custom_post_type_services');

// END Custom Post Type Services

// Custom Post Type Approach

function custom_post_type_approach() {

    $labels = array(
        'name' => __( 'Our Approach', 'trptheme' ), /* This is the Title of the Group */
        'singular_name' => __( 'Approach', 'trptheme' ), /* This is the individual type */
        'all_items' => __( 'All Approaches', 'trptheme' ), /* the all items menu item */
        'add_new' => __( 'Add New', 'trptheme' ), /* The add new menu item */
        'add_new_item' => __( 'Add Approach', 'trptheme' ), /* Add New Display Title */
        'edit' => __( 'Edit', 'trptheme' ), /* Edit Dialog */
        'edit_item' => __( 'Edit Approaches', 'trptheme' ), /* Edit Display Title */
        'new_item' => __( 'New Approach', 'trptheme' ), /* New Display Title */
        'view_item' => __( 'View Approach', 'trptheme' ),
        'search_items' => __( 'Search Approaches', 'trptheme' ), 
        'not_found' =>  __( 'Nothing found in the Database.', 'trptheme' ), 
        'not_found_in_trash' => __( 'Nothing found in Trash', 'trptheme' ), 
    );
    $args = array(
        'labels' => $labels,
        'description' => __( 'This is the example custom post type', 'trptheme' ),
        'public' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'show_ui' => true,
        'query_var' => true,
        'menu_position' => 8,
        'menu_icon' => 'dashicons-format-aside', 
        'rewrite'   => array( 'slug' => 'our-approach', 'with_front' => false ), 
        'add_to_menu' => true,
        'has_archive' => false,
        'capability_type' => 'page',
        'hierarchical' => false,
        'show_in_rest' => true,
        'supports' => array('title', 'editor', 'author', 'custom-fields', 'excerpt', 'thumbnail', 'revisions', 'sticky'),
    );
    register_post_type('approach', $args);

}

add_action('init', 'custom_post_type_approach');

// END Custom Post Type Approach

/*
 *
 * Some common post types we used below. Simple copy them above to use.
 *

// Custom Post Type Feature Pages

function custom_post_type_landing() {
    $labels = array(
        'name' => 'se',
        'singular_name' => 'Feature',
        'add_new' => 'Add New',
        'add_new_item' => 'Add new',
        'edit_item' => 'Edit',
        'new_item' => 'New',
        'view_item' => 'View',
        'search_items' => 'Search',
        'not_found' => 'Nothing to found',
        'not_found_in_trash' => 'Nothing to found in trash',
        'menu_name' => 'Features',
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_rest' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'page',
        'has_archive' => false,
        'rewrite'   => array( 'slug' => 'lp', 'with_front' => false ),
        'hierarchical' => false,
        'menu_position' => null,
        'menu_icon' => 'dashicons-format-aside',
        'supports' => array('title', 'author', 'custom-fields', 'excerpt', 'thumbnail', 'revisions'),
    );
    register_post_type('feature', $args);
}

add_action('init', 'custom_post_type_landing');

// END Custom Post Type Landing Pages

// Custom Post Type Testimonials

function custom_post_type_testimonials() {

    $labels = array(
        'name' => 'Testimonials',
        'singular_name' => 'Testimonial',
        'add_new' => 'Add New',
        'add_new_item' => 'Add new',
        'edit_item' => 'Edit',
        'new_item' => 'New',
        'view_item' => 'View',
        'search_items' => 'Search',
        'not_found' => 'Nothing to found',
        'not_found_in_trash' => 'Nothing to found in trash',
        'menu_name' => 'Testimonials',
    );
    $args = array(
        'labels' => $labels,
        'public' => false,
        'exclude_from_search' => true,
        'publicly_queryable' => false,
        'show_ui' => true,
        'show_in_menu' => true,
        //'show_in_rest' => true,
        'query_var' => true,
        'rewrite' => false,
        'capability_type' => 'post',
        'has_archive' => false,
        'hierarchical' => false,
        'menu_position' => null,
        'menu_icon' => 'dashicons-format-aside',
        'supports' => array('title', 'editor', 'custom-fields')
    );
    register_post_type('testimonials', $args);

}

add_action('init', 'custom_post_type_testimonials');

// END Custom Post Type Testimonials

// Custom Post Type Team Members

function custom_post_type_team() {

    $labels = array(
        'name' => __( 'Team Members', 'trptheme' ), // This is the Title of the Group 
        'singular_name' => __( 'Team Member', 'trptheme' ), // This is the individual type 
        'all_items' => __( 'All Team Members', 'trptheme' ), // the all items menu item 
        'add_new' => __( 'Add New', 'trptheme' ), // The add new menu item 
        'add_new_item' => __( 'Add New Team Member', 'trptheme' ), // Add New Display Title 
        'edit' => __( 'Edit', 'trptheme' ), // Edit Dialog 
        'edit_item' => __( 'Edit Team Member', 'trptheme' ), // Edit Display Title 
        'new_item' => __( 'New Team Member', 'trptheme' ), // New Display Title 
        'view_item' => __( 'View Team Member', 'trptheme' ), // View Display Title 
        'search_items' => __( 'Search Team Members', 'trptheme' ), // Search Custom Type Title  
        'not_found' =>  __( 'Nothing found in the Database.', 'trptheme' ), // This displays if there are no entries yet  
        'not_found_in_trash' => __( 'Nothing found in Trash', 'trptheme' ), // This displays if there is nothing in the trash 
        'parent_item_colon' => ''
    );
    $args = array(
        'labels' => $labels,
        'description' => __( 'This is the example custom post type', 'trptheme' ), // Custom Type Description 
        'public' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'show_ui' => true,
        'query_var' => true,
        'menu_position' => 8, // this is what order you want it to appear in on the left hand side menu  
        'menu_icon' => 'dashicons-format-aside', 
        'rewrite'   => array( 'slug' => 'team', 'with_front' => false ), // you can specify its url slug 
        'has_archive' => false, // you can rename the slug here 
        'capability_type' => 'page',
        'hierarchical' => false,
        // the next one is important, it tells what's enabled in the post editor 
        'supports' => array( 'title', 'editor', 'thumbnail', 'custom-fields')
    );
    register_post_type('pt_team', $args);

}

add_action('init', 'custom_post_type_team');

// END Custom Post Type Team Members

// Custom Post Type Resources

function custom_post_type_resources() {

    $labels = array(
        'name' => __( 'Resources', 'trptheme' ), // This is the Title of the Group 
        'singular_name' => __( 'Resource', 'trptheme' ), // This is the individual type 
        'all_items' => __( 'All Resources', 'trptheme' ), // the all items menu item 
        'add_new' => __( 'Add New', 'trptheme' ), // The add new menu item 
        'add_new_item' => __( 'Add New Resouces', 'trptheme' ), // Add New Display Title 
        'edit' => __( 'Edit', 'trptheme' ), // Edit Dialog 
        'edit_item' => __( 'Edit Resource', 'trptheme' ), // Edit Display Title 
        'new_item' => __( 'New Resource', 'trptheme' ), // New Display Title 
        'view_item' => __( 'View Resource', 'trptheme' ), // View Display Title 
        'search_items' => __( 'Search Resources', 'trptheme' ), // Search Custom Type Title  
        'not_found' =>  __( 'Nothing found in the Database.', 'trptheme' ), // This displays if there are no entries yet  
        'not_found_in_trash' => __( 'Nothing found in Trash', 'trptheme' ), // This displays if there is nothing in the trash 
        'parent_item_colon' => ''
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'show_ui' => true,
        'query_var' => true,
        'menu_position' => 8, // this is what order you want it to appear in on the left hand side menu  
        'menu_icon' => 'dashicons-format-aside', 
        'rewrite'   => array( 'slug' => 'resources', 'with_front' => false ), // you can specify its url slug 
        'has_archive' => true, // you can rename the slug here 
        'capability_type' => 'page',
        'hierarchical' => false,
        // the next one is important, it tells what's enabled in the post editor 
        'supports' => array( 'title', 'editor', 'thumbnail', 'custom-fields')
    );
    register_post_type('pt_resource', $args);

}

add_action('init', 'custom_post_type_resources');

// END Custom Post Type Resources

*/