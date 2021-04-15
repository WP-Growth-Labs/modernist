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

if( !empty( get_field( 'dynamic_categories' ) ) ) {
	$category = get_term( get_field( 'dynamic_categories' ) );
}
?>

<div id="<?php echo $id; ?>" class="<?php echo $className; ?> block-related">

	<h3>Perspectives on <?php echo $category->name; ?></h3>

	<div class="post-list-related grid">
		<?php

		$args = array(
			'category__in' 			=> $category->term_id,	
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

</div>