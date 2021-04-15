<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package wpgl
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php 
		// An array of arguments
		$args = array(
			'ignore_sticky_posts' => 1,
			'post__in' => get_option( 'sticky_posts' ),
			'posts_per_page' => 1,
		);

		// The Query
		$the_query = new WP_Query( $args );

		if ( $the_query->have_posts() ) : ?>

			<div class="grid post-list featured">

				<?php

				while (  $the_query->have_posts() ) :
				 $the_query->the_post();

				?>

				<?php get_template_part( 'template-parts/content', 'archive-' . get_post_type(), array( 'columns' => 24, 'classes' => 'animate-in' ) ); ?>

				<?php

				$exclude_id = get_the_ID();

				endwhile;

				?>

			</div>

		<?php endif;

		wp_reset_postdata();

		?>

		<?php 
		// An array of arguments
		$args = array(
			'posts_per_page' => 8,
			'ignore_sticky_posts' => 1,
			'post__not_in' => array( $exclude_id ),
		);

		// The Query
		$the_query = new WP_Query( $args );

		if (  $the_query->have_posts() ) : ?>

			<div class="grid post-list main-loop">

			<?php

			$index = 0;

			/* Start the Loop */
			while (  $the_query->have_posts() ) :
				$the_query->the_post();

				$index++;

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'archive-' . get_post_type(), array( 'index' => $index, 'classes' => 'animate-in' ) );

			endwhile;

			?>

			</div>

			<?php
			
			echo '<div class="load-more-button">';
			if($wp_query->max_num_pages > 1) :
				
				echo '<a class="load-more button">Load More</a>';
				
			endif;	
			
			echo '</div>';

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;

		wp_reset_postdata();
		?>

	</main><!-- #main -->

<?php
get_footer();
