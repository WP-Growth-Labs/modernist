<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package wpgl
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php if ( have_posts() ) : ?>

			<!--><header class="page-header">
				<h1 class="page-title">
					<?php
					/* translators: %s: search query. */
					//printf( esc_html__( 'Search Results for: %s', 'wpgl' ), '<span>' . get_search_query() . '</span>' );
					?>
				</h1>
			</header><!-- .page-header -->

			<div class="grid post-list main-loop">

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'archive-' . get_post_type(), array( 'columns' => 8, 'classes' => 'animate-in' ) );

			endwhile;

			?>

			</div>

			<?php
			echo '<div class="load-more-button">';
			if($wp_query->max_num_pages > 1) :
				
				echo '<a class="load-more button">Load More</a>';
				
			endif;	
			if( is_category() || is_tag() )
				echo '<a class="clear-search button reverse">Clear Search Terms</a>';
			echo '</div>';
		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
