<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package wpgl
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function wpgl_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	// Adds a class if the format post_type-post_slug
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'wpgl_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function wpgl_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'wpgl_pingback_header' );


function wpgl_get_all_terms() {

	global $post;

	if( get_the_category() && get_the_tags() ) {
		$terms = array_merge( get_the_category(), get_the_tags() );
	} else {
		$terms = get_the_category();
	}
	$terms_count = count( $terms );
	$terms_list = '';
	$terms_index = 0;

	foreach( $terms as $term ) :
		$terms_index++;

		$terms_list .= '<span><a href="' . get_term_link( $term->term_id ) . '" >' . $term->name . '</a></span>';
		if( $terms_index != $terms_count )
			$terms_list .= ', ';

	endforeach;


	return $terms_list;
}