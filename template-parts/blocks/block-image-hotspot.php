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

$image = get_field( 'hotspot_image' );

?>

<div id="<?php echo $id; ?>" class="<?php echo $className; ?> block-image-hotspot">


	<div class="hotspot-wrapper">

		<img src="<?php echo $image['url']; ?>" class="hotspot-bg" alt="<?php echo $image['alt']; ?>" />

		<?php if( have_rows( 'hotspots' ) ) : 

			$hs_index = 0; 

			?>

			<div class="hotspots">

				<?php while( have_rows( 'hotspots' ) ) : the_row(); $hs_index++; 

					$position_top = get_sub_field('position_top');
					$position_left = get_sub_field('position_left');
					$hotspot_text = get_sub_field('hotspot_text');

					?>


					<div class="hotspot animate-in" style="top: <?php echo $position_top; ?>%; left: <?php echo $position_left; ?>%;">

						<div class="hotspot-point"></div>
						<p class="hotspot-text"><?php echo $hotspot_text; ?></p>

					</div>

				<?php endwhile; ?>

			</div>

		<?php endif; ?>

	</div>

</div>