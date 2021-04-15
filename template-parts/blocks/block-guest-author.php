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

$author_name = get_field( 'author_name' );
$author_headshot = get_field( 'author_headshot' );
$author_title = get_field( 'author_title' );
$author_bio = get_field( 'author_bio' );

?>

<div id="<?php echo $id; ?>" class="<?php echo $className; ?> animate-in block-author-box">

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