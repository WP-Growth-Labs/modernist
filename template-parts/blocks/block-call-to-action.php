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

$type = 'dark';
$type = get_field( 'color_scheme' );

$link = array(
	'url'		=>		get_bloginfo('url') . '/contact-us',
	'target'	=>		'_self',
);
$link = get_field( 'button_link' );

?>

<div id="<?php echo $id; ?>" class="<?php echo $className; ?> <?php echo $type; ?> block-call-to-action">

	<div class="call-to-action-inner">

		<div class="animate-in call-to-action-content">

			<p><?php echo get_field( 'block_content' ); ?></p>

		</div>

		<div class="animate-in call-to-action-button">

			<p><span>Want to start a conversation?</span> <a class="button <?php if( $type != 'light' ) { echo 'reverse'; }; ?>" href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>">Get In Touch</a></p>

		</div>
	</div>
</div>