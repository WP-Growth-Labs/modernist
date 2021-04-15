<?php
/**
 * Image Separator Block
 *
 * @package      ModernistStudio
 * @author       Rishi Patel
 * @since        1.0.0
 * @license      GPL-2.0+
**/

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

$width = 'wide';
if( !empty( get_field( 'width' ) ) ) {
	$width = get_field( 'width' );
}

?>

<div id="<?php echo $id; ?>" class="<?php echo $scheme; ?> <?php echo $width; ?> <?php echo $className; ?> block-image-row">

	<div class="image-row-inner">

		<?php

		$images = get_field( 'images' );
		$size = 'full';

		if( $images ) :

			foreach( $images as $image_id ): 

			?>
			<div class="animate-in image-wrap">
			
				<?php echo wp_get_attachment_image( $image_id, $size ); ?>
			</div>
			<?php

			endforeach;

		endif;

		?>

	</div>

</div>