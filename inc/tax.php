<?php
// Taxonomy Types for Merchant CPT

function create_city_taxonomy() {

    register_taxonomy(
    	'markets', 
    	array('merchant'), 
    	array(
        'hierarchical' => true,
        'labels' => array(
           'name' => __( 'Markets', 'trptheme' ), // name of the custom taxonomy
			'singular_name' => __( 'Market', 'trptheme' ), // single taxonomy name 
			'search_items' =>  __( 'Search Markets', 'trptheme' ), // search title for taxomony
			'all_items' => __( 'All Markets', 'trptheme' ), // all title for taxonomies
			'edit_item' => __( 'Edit Market', 'trptheme' ), // edit custom taxonomy title
			'update_item' => __( 'Update Market', 'trptheme' ), // update title for taxonomy
			'add_new_item' => __( 'Add New Market', 'trptheme' ), // add new title for taxonomy
			'new_item_name' => __( 'New Market Name', 'trptheme' ) // name title for taxonomy
        ),
        'show_admin_column' => true, 
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'market' ),
    ));

}

add_action('init', 'create_city_taxonomy');

// End Taxonomy Type for News CPT