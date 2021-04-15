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

$scheme = 'light';
if( !empty( get_field( 'scheme' ) ) ) {
	$scheme = get_field( 'scheme' );
}

$width = 'full-width';
if( !empty( get_field( 'bg_width' ) ) ) {
	$width = get_field( 'bg_width' );
}

$orphans = 'widowed';

if( get_field( 'orphan_control' ) )
	$orphans = '';

if( get_field( 'balance_control' ) )
	$orphans .= ' balance-text';

?>

<div id="<?php echo $id; ?>" class="<?php echo $scheme; ?> <?php echo $width; ?> <?php echo $className; ?> block-giant-text">

	<div class="animate-in giant-text-inner">

		<p class="<?php echo $orphans; ?>"><?php echo get_field( 'block_content' ); ?></p>

	</div>

</div>