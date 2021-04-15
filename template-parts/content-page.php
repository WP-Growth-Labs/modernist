<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package wpgl
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<?php get_template_part('template-parts/partials/headers/header', 'entry'); ?>

	<?php // wpgl_post_thumbnail(); ?>

	<div class="entry-content <?php echo ( get_field( 'content_width' ) === 'narrow' ) ? 'narrow-content' : ''; ?>">
		<?php
		the_content();

		?>
	</div><!-- .entry-content -->

	
</article><!-- #post-<?php the_ID(); ?> -->
