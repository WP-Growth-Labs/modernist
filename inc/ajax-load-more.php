<?php

/*********************
PAGE NAVI
*********************/

// Numeric Page Navi (built into the theme by default)
function ps_page_navi() {
  global $wp_query;
  if($wp_query->max_num_pages > 1) :
  	echo '<div class="load-more-button"><a class="button button-ghost">Load More</a></div>';
  endif;
} /* end page navi */

// Ajax Load More
function ps_load_more_scripts() {
	global $wp_query;

	wp_register_script('ps_load_more', get_stylesheet_directory_uri() . '/library/js/load-more.js', array('jquery'));

	wp_localize_script('ps_load_more', 'ps_load_more_params' , array(
		'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php',
		'posts' => json_encode($wp_query->query_vars),
		'current_page' => get_query_var('paged') ? get_query_var('paged') : 1,
		'max_page' => $wp_query->max_num_pages
	));

	wp_enqueue_script('ps_load_more');
};
add_action( 'wp_enqueue_scripts', 'ps_load_more_scripts' );

function ps_load_more_ajax_handler(){
 
	// prepare our arguments for the query
	$args = json_decode( stripslashes( $_POST['query'] ), true );
	$args['paged'] = $_POST['page'] + 1; // we need next page to be loaded
	$args['post_status'] = 'publish';
 	$args['posts_per_page'] = '9';

	// it is always better to use WP_Query but not here
	query_posts( $args );
 
	if( have_posts() ) :
 
		// run the loop
		while( have_posts() ): the_post(); ?>
 
			<?php get_template_part( 'template-parts/content', 'archive-' . get_post_type(), array( 'columns' => 8 ) ); ?>
 
		<?php endwhile;
 
	endif;
	die; // here we exit the script and even no wp_reset_query() required!
}
 
 
 
add_action('wp_ajax_loadmore', 'ps_load_more_ajax_handler'); // wp_ajax_{action}
add_action('wp_ajax_nopriv_loadmore', 'ps_load_more_ajax_handler'); // wp_ajax_nopriv_{action}