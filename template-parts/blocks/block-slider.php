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

?>

<div id="<?php echo $id; ?>" class="<?php echo $scheme; ?> <?php echo $width; ?> <?php echo $className; ?> block-slider">
	

	<?php if( get_field('slick_gallery') ): 

		$images = get_field('slick_gallery');

		?>

		<div id="slides-<?php echo $block['id']; ?>" class="animate-in box-shadow slick slider-slides-wrapper">

			<?php foreach( $images as $image ): ?>


				<div class="slide">
					<?php echo wp_get_attachment_image( $image['id'], 'large' ); ?>
				</div>

			<?php endforeach; ?>



		</div>

		<?php if( get_field('navigation_type') === 'thumbnails' ) : ?>

			<div id="nav-<?php echo $block['id']; ?>" class="animate-in slick slider-nav-wrapper">

				<?php foreach( $images as $image ): ?>

					<div class="thumbnail">
						<?php echo wp_get_attachment_image( $image['id'], 'thumbnail' ); ?>
					</div>

				<?php endforeach; ?>

			</div>

		<?php endif; ?>


		<script type="text/javascript">

			jQuery(document).ready(function($) {

				$('#slides-<?php echo $block['id']; ?>').slick({
					dots: false,
					arrows: false,
  					infinite: true,
  					asNavFor: '#nav-<?php echo $block['id']; ?>',
  					respondTo: 'slider',
  					lazyLoad: 'ondemand',
				});

					$('#nav-<?php echo $block['id']; ?>').slick({
						dots: false,
	  					infinite: true,
	  					asNavFor: '#slides-<?php echo $block['id']; ?>',
	  					arrows: false,
	  					focusOnSelect: true,
	  					respondTo: 'slider',
	  					slidesToShow: 4,
						slidesToScroll: 1,
						accessibility: false,
	  					responsive: [
						    {
						      breakpoint: 1024,
						      settings: {
						        slidesToShow: 4,
						        slidesToScroll: 1,
						        infinite: true,
						        dots: false
						      }
						    },
						    {
						      breakpoint: 600,
						      settings: {
						        slidesToShow: 3,
						        slidesToScroll: 1
						      }
						    },
						    {
						      breakpoint: 480,
						      settings: {
						        slidesToShow: 2,
						        slidesToScroll: 1
						      }
						    }
						]
					});

			});

		</script>

	<?php endif; ?>


</div>