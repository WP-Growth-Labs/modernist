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

$lottie = get_field( 'lottie_bg' );

?>

<figure id="<?php echo $id; ?>" class="<?php echo $scheme; ?> align<?php echo $width; ?> <?php echo $className; ?> block-infographic">

	<div class="infographic-wrapper">

		<div class="lottie-background">

			<lottie-player autoplay src="<?php echo $lottie; ?>" mode="normal" style="width: 100%; height: auto;"></lottie-player>

		</div>

		<div class="ig-columns">

			<?php

			if( have_rows( 'ig_columns') ) :

				$col_index = 0;

				while( have_rows( 'ig_columns' ) ) : the_row(); $col_index++;

				if( $col_index % 2 == 0 ) { $col_type = 'even'; } else { $col_type = 'odd'; };

				$col_lottie = get_sub_field( 'col_lottie' );
				$col_heading = get_sub_field( 'col_heading' );
				$col_text = get_sub_field( 'col_text' );

				?>

				<div class="ig-col <?php echo $col_type; ?>">


					<?php

					if( $col_type === 'odd' ) :

					?>

					<div class="ig-lottie-wrapper-col">

						<div class="ig-lottie-inner">

							<lottie-player hover autoplay src="<?php echo $col_lottie; ?>" mode="normal" style="width: 100%; height: 100%;"></lottie-player>

						</div>

					</div>

					<div class="text-col">


						<p class="heading"><?php echo $col_heading; ?>
						<p class="text widowed"><?php echo $col_text; ?></p>

					</div>


					<?php 

					else :

					?>

					<div class="text-col desktop">


						<p class="heading"><?php echo $col_heading; ?>
						<p class="text widowed"><?php echo $col_text; ?></p>

					</div>

					<div class="ig-lottie-wrapper-col">

						<div class="ig-lottie-inner">

							<lottie-player hover autoplay src="<?php echo $col_lottie; ?>" mode="normal" style="width: 100%; height: 100%;" background="transparent"></lottie-player>

						</div>

					</div>

					<div class="text-col mobile">


						<p class="heading"><?php echo $col_heading; ?>
						<p class="text widowed"><?php echo $col_text; ?></p>

					</div>

					<?php

					endif; 

					?>

				</div>

				<?php 

				endwhile; ?>

			<?php

			endif;

			?>

		</div>

		<script type="text/javascript">

			jQuery(document).ready(function($) {

				if ( window.innerWidth < 768 ) {

					$('.ig-columns').slick({
						dots: false,
						arrows: true,
						slidesToShow: 1,
						infinite: false,
					});

				};

			});

		</script>

	</div>

</figure>