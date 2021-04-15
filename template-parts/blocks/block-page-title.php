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


$title = get_field( 'page_title' );

?>

<header id="<?php echo $id; ?>" class="<?php echo $className; ?> block-page-title">

		<div class="page-title">

			<h1 class="animate-in entry-title"><?php echo $title; ?></h1>

		</div>

</header>