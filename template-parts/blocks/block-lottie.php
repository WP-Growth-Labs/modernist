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

$width = 'full';
if( !empty( $block['align'] ) ) {
	$width = $block['align'] ;
}

$lottie = get_field( 'lottie_file' );

$loop = false;
$loop = get_field( 'lottie_loop' );

$mode = 'autoplay';
$mode = get_field( 'lottie_mode' );

?>

<figure id="<?php echo $id; ?>" class="<?php echo $scheme; ?> align<?php echo $width; ?> <?php echo $className; ?> block-lottie">

	<div class="lottie-inner">

		<lottie-player <?php echo ( $mode === 'hover' ) ? 'hover' : 'autoplay'; ?> <?php echo( $loop === true ) ? 'loop' : ''; ?>  src="<?php echo $lottie; ?>" mode="normal" style="width: 100%; height: auto;"></lottie-player>

	</div>

</figure>