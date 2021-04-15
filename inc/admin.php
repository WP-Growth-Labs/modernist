<?php

/**
 * Change "Edit Title" Placeholder on Merchant Profiles
 *
 */

if( is_admin() ) {
    add_filter( 'enter_title_here', function( $input ) {
        if( 'merchant' === get_post_type() ) {
            return __( 'Enter Merchant Name', 'textdomain' );
        } else {
            return $input;
        }
    } );
}

add_filter( 'admin_body_class', 'custom_admin_body_class' );
function custom_admin_body_class( $classes ) {

    // Change Editor Background if Dark Page
    	$screen = get_current_screen();
    	$header_style = get_field('ms_header_style');

    	if ( !empty( $header_style ) ) {
            $classes .= ' editor-' . $header_style . ' ';
        }

    // Add Unique Page Class (Post Type + Slug)

        $post_type = get_post_type();
        $post_slug = basename( get_permalink() );

        $classes .= ' admin_' . $post_type . '_' . $post_slug . ' ';

	return $classes;
}