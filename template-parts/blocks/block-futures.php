<?php
/**
 * Image Separator Block
 *
 * @package      ModernistStudio
 * @author       Rishi Patel
 * @since        1.0.0
 * @license      GPL-2.0+
**/

global $post;

// Create id attribute allowing for custom "anchor" value.
$id = str_replace( 'acf/', '', $block['name'] ) . '-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = '';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

$scheme = 'dark';
if( !empty( get_field( 'scheme' ) ) ) {
	$scheme = get_field( 'scheme' );
}

$width = 'full-width';
if( !empty( get_field( 'bg_width' ) ) ) {
	$width = get_field( 'bg_width' );
}

if( !empty( get_field( 'featured_future' ) ) ) {
	$featured = get_field( 'featured_future' );
}
?>

<div id="<?php echo $id; ?>" class="<?php echo $className; ?> block-futures">

	<section class="wp-block-uagb-section uagb-section__wrap futures-feature futures light" style="background: #fff;">
		
		<div class="uagb-section__inner-wrap">

				<h4>Featured</h4>

				<?php

				$args = array(
					'post_type' 			=> 'future',	
					'post__in'		=> array($featured->ID),	
					'posts_per_page'	=> 1,
				);

				$my_query = new wp_query( $args );	

				while( $my_query->have_posts() ) :

					$my_query->the_post();	

					$post_id = get_the_ID();

					?>	
					<div class="animate-in future">	

						<a rel="external" class="grid" href="<?php the_permalink() ?>">

							<div class="col-10_md-24">

								<h2 class="widowed"><?php the_title(); ?></h2>
								<?php

								if( !empty( get_field( 'ms_custom_header_title', $post_id ) ) ):

									echo '<p class="future-excerp has-medium-font-size">' . get_field( 'ms_custom_header_title', $post_id ) . '</p>';

								endif;

								?>
								<span class="future-link">Read More</span>


							</div>

							<div class="col-14_md-24">

								<?php the_post_thumbnail('large'); ?>

							</div>
							
								
						</a>	
					</div>	
				<?php 

				endwhile;	
			
				wp_reset_query(); 

				?>

		</div>
	
	</section>


	<section class="wp-block-uagb-section uagb-section__wrap futures futures-list">

		<div class="uagb-section__inner-wrap">

			<?php

			$args = array(
				'post_type' 			=> 'future',	
				'post__not_in'		=> array($featured->ID),	
				'posts_per_page'	=> -1,
			);

			$my_query = new wp_query( $args );	

			while( $my_query->have_posts() ) :

				$my_query->the_post();	

				$post_id = get_the_ID();

				?>	
				<div class="animate-in future">	

					<a rel="external" class="grid" href="<?php the_permalink() ?>">

						<div class="col-10_md-24">

							<h2 class="widowed"><?php the_title(); ?></h2>
							<p>
							<?php

							if( !empty( get_field( 'ms_custom_header_title', $post_id ) ) ):

								echo '<p class="future-excerp has-medium-font-size">' . get_field( 'ms_custom_header_title', $post_id ) . '</p>';

							endif;

							?>
							</p>
							<span class="future-link">Read More</span>


						</div>

						<div class="col-14_md-24">

							<?php the_post_thumbnail('large'); ?>

						</div>
						
							
					</a>	
				</div>	
			<?php 

			endwhile;	
		
			wp_reset_query(); 

			?>
		</div>
	
	</section>

</div>