<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package wpgl
 */

get_header();
?>

<div class="entry-content">

	<section id="masthead" class="masthead">

		<div class="content-wrapper">

			<h1 class="page-title masthead-title">We see potential everywhere.</h1>

			<p class="subtitle">Welcome to Modernist Studio, a strategy, design and innovation consultancy. We help clients create exceptional products, services and teams.</p>

			<div class="scroll-nav">

				<span class="scroll-text"><i class="fas fa-long-arrow-alt-left"></i> Scroll Down</span>

				<a href="#primary"  class="mouse-icon"><img src="<?php bloginfo('stylesheet_directory'); ?>/library/img/Mouse_Icon.svg" /></a>

				<div class="spacer"></div>

			</div>
		
		</div>

	</section>

	<main id="primary" class="site-main">

		<?php 

		if( have_rows( 'home_service_sectors' ) ): 

		?>

			<div class="service-sector-bgs">

				<?php

				$service_index = 0;

			    // Loop through rows.
			    while( have_rows( 'home_service_sectors' ) ) : the_row(); 

			    	$service_index++;

			    	$service_title = get_sub_field( 'section_title' );
			    	$service_link = get_sub_field( 'section_link' );
			    	$service_content = get_sub_field('section_content' );
			    	$service_image = get_sub_field( 'section_image' );
			    	$service_overlay_color = get_sub_field( 'section_overlay_color' );
			    	$service_overlay_opacity = get_sub_field( 'section_overlay_opacity' );

			    	?>

			    	<section class="service-sector <?php echo strtolower( $service_title ); ?> <?php if( $service_index === 1 ) { echo ''; }; ?>" data-panel="<?php echo strtolower( $service_title ); ?>">

				    	<div class="service-sector-bg">
							<img class="service-sector-image" src="<?php echo $service_image['url']; ?>" />
							<div class="service-sector-overlay" style="background-color: rgba(<?php echo hex_to_rgb( $service_overlay_color ) . ', ' . $service_overlay_opacity; ?>);"></div>
						</div>

					</section>

				<?php endwhile; ?>

			</div>

			<div class="service-sectors-links">

					<?php

				    // Loop through rows.
				    while( have_rows( 'home_service_sectors' ) ) : the_row(); 

				    	$service_title = get_sub_field( 'section_title' );
				    	$service_link = get_sub_field( 'section_link' );
				    	$service_content = get_sub_field('section_content' );
				    	$service_image = get_sub_field( 'section_image' );
				    	$service_overlay_color = get_sub_field( 'section_overlay_color' );
				    	$service_overlay_opacity = get_sub_field( 'section_overlay_opacity' );

				    	?>

						<section class="service-sector <?php echo strtolower( $service_title ); ?>" data-target=".<?php echo strtolower( $service_title ); ?>">

							

							<div class="service-sector-wrapper">
								<a class="card" href="<?php echo $service_link; ?>">
									<h2 class="section-title"><?php echo $service_title; ?></h2>
									<p><?php echo $service_content; ?></p>
								</a>
							</div>

						</section>

					<?php endwhile; ?>

			</div>

		<?php

		endif; 

		?>

	</main><!-- #main -->

	<section class="latest-news">

		<div class="content-wrapper">

			<h3 class="section-title">Latest News</h3>

			<div class="post-list">

				<?php
				$featured_posts = get_field('featured_posts');
				if( $featured_posts ): ?>
				    <?php foreach( $featured_posts as $post ): 

				        // Setup this post for WP functions (variable must be named $post).
				        setup_postdata($post); 
				        $category = get_the_category();
				        ?>
				        <aside class="article <?php echo get_post_type(); ?>">

				            <a class="post-info" href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3>
				            <?php 
				            
				            if( get_post_type() === 'future' ) {
				            	echo '<span class="category">Future</span>';
				            } elseif( get_post_type() === 'post' ) {
				            	echo '<span class="category">' . $category[0]->name . '</span>';
				            };

				            ?>
				            </a>
				            
				            <a class="post-link" href="<?php the_permalink(); ?>">Read Here</a>

				        </aside>
				    <?php endforeach; ?>
				    <?php 
				    // Reset the global post object so that the rest of the page works correctly.
				    wp_reset_postdata(); ?>
				<?php endif; ?>

			</div>

		</div>

	</section>
</div>
<?php
get_footer();
