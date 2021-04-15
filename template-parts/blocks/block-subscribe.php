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

<div id="<?php echo $id; ?>" class="<?php echo $className; ?> <?php echo $type; ?> block-subscribe">

	<div class="subscribe-inner">

		<div class="animate-in subscribe-content">

			<p><?php echo get_field( 'block_content' ); ?></p>

		</div>

		<div class="animate-in subscribe-form">

			<?php gravity_form( 'Subscribe to Modernist', false, false, false, '', true, 12 ); ?>

		</div>

		<div class="subscribe-all-futures">

			<p><a href="<?php bloginfo('url'); ?>/futures" class="button outline <?php echo ($type === 'light') ? 'reverse' : ''; ?>">View All Futures</a></p>

		</div>

	</div>
</div>