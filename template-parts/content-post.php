<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package wpgl
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php wpgl_post_thumbnail(); ?>

	<header class="entry-header">
		
		<p class="post-categories widowed"><?php echo wpgl_get_all_terms(); ?></p>

		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		?>

		
	</header><!-- .entry-header -->

	<div class="entry-content type-<?php echo get_post_type(); ?>">
		<?php

		ms_output_color_scheme( $post );

		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'wpgl' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		);

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'wpgl' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php if( get_the_author_meta( 'display_name' ) != 'Modernist Studio' ) : ?>

			<?php

			$author_id = get_the_author_meta( 'ID' );
			$author_name = get_the_author_meta( 'display_name' );
			$author_headshot = get_field( 'author_headshot', 'user_' . $author_id );
			$author_title = get_field( 'author_title', 'user_' . $author_id );
			$author_bio = get_field( 'author_bio', 'user_' . $author_id );

			?>
		
			<div class="block-author-box animate-in">

				<div class="author-headshot">

					<div class="headshot-wrapper">

						<?php echo wp_get_attachment_image( $author_headshot, 'thumbnail' ); ?>

					</div>

					<div class="author-info">
						<h3><?php echo $author_name; ?></h3>
						<p class="title"><?php echo $author_title; ?></p>
					</div>

				</div>

				<div class="author-content">

					<div class="author-info">
						<h3><?php echo $author_name; ?></h3>
						<p class="title"><?php echo $author_title; ?></p>
					</div>
					<div class="description">
						<?php echo $author_bio; ?>
					</div>

				</div>

			</div>

		<?php endif; ?>

		<div id="" class="block-related">

			<h3>Featured Posts</h3>

			<div class="post-list-related grid">
				<?php

				$the_category = get_the_category();

				$args = array(
					'category__in' 			=> $the_category[0]->term_id,	
					'post__not_in'		=> array($post->ID),	
					'posts_per_page'	=> 3,
				);

				$my_query = new wp_query( $args );	

				while( $my_query->have_posts() ) :

					$my_query->the_post();	

					?>	

					<div class="col-8_md-24 animate-in related-thumb">	

						<a rel="external" href="<?php the_permalink() ?>">

							<div class="post-thumbnail-link">

								<?php the_post_thumbnail('medium'); ?>

							</div>

							<div class="post-title">

								<h4><?php the_title(); ?></h4>

							</div>	

						</a>	

					</div>	

				<?php 

				endwhile;	
			
				wp_reset_query(); 

				?>
			
			</div>

			<p class="all-posts-link animate-in"><a class="button" href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>">View All Posts</a></p>

		</div>

	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
