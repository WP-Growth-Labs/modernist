<?php
/**
 * Team Member block
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
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}


$title = get_field( 'ethos_title' );
$content = get_field( 'ethos_content' );
$image = get_field( 'ethos_image' );

?>

<div id="<?php echo $id; ?>" class="animate-in <?php echo $className; ?> block-ethos">

	<div class="ethos-image">

		<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

	</div>

	<div class="ethos-content-wrapper">

		<div class="ethos-counter"></div>

		<div class="ethos-title">

			<h2><?php echo $title; ?></h2>

		</div>

		<div class="ethos-content">

			<p><?php echo $content; ?></p>

		</div>

	</div>

</div>