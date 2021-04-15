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

$link = array(
	'url'		=>		get_bloginfo('url') . '/contact-us',
	'target'	=>		'_self',
);

?>

<div id="<?php echo $id; ?>" class="<?php echo $className; ?> block-services">

	<div class="services-inner">

		<div class="service-links animate-in">

			<p class="content"><strong><?php echo get_field( 'block_content' ); ?></strong></p>
			<p class="links">
				<?php

				if( have_rows( 'service_links' ) ):

				    // Loop through rows.
				    while( have_rows( 'service_links' ) ) : the_row();

				    	$link = get_sub_field( 'service_link' );

				    	?>

				    	<a href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>"><?php echo $link['title']; ?></a>

				    	<?php

				    endwhile;

			   endif;

			   ?>
			</p>

		</div>
	</div>
</div>