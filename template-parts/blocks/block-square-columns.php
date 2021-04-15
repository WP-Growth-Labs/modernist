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

$template = array(
    array( 'core/paragraph', array(
    	'content' => 'Insert Content Here...',
    ) )
);

?>

<div id="<?php echo $id; ?>" class="<?php echo $className; ?> animate-in block-square-columns">

	<div class="square-columns-inner">

		<div class="column left-column">

			<div class="column-content">

				<p><?php echo get_field( 'block_content' ); ?></p>

			</div>

		</div>

		<div class="column right-column">

			<div class="column-content">

				<?php

				if( get_field( 'content_type' ) === 'text' ) :

				?>	

					<p class="text"><?php echo get_field( 'content_text' ); ?></p>

				<?php

				else :

					$quote = get_field( 'content_quote' );

				?>
					<div class="quote-icon">
						<span>
							<img src="<?php echo wpgl_library('img'); ?>/Quote-Icon.svg" />
						</span>
					</div>

					<blockquote class="is-style-large">

						<p ><?php echo $quote['content']; ?></p>

						<cite>
							<strong><?php echo $quote['name']; ?></strong><br />
							<?php echo $quote['company']; ?>
						</cite>

					</blockquote>


				<?php

				endif;

				?>

			</div>
			
		</div>

	</div>

</div>