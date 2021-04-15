<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package wpgl
 */

if( isset( $args['index'] ) && $args['index'] < 3 && !isset( $args['columns'] ) ) {
	$cols = 12;
} elseif( isset( $args['index'] ) && $args['index'] >2 && !isset( $args['columns'] ) ) {
	$cols = 8;
} elseif( isset($args['columns'] ) ) {
	$cols = $args['columns'];
};

if( !isset( $args['classes' ] ) )
	$args['classes'] = '';

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'col-' . $cols . '_md-24 ' . $args['classes'] ); if( isset( $args['index'] ) ) { ?>data-index="<?php echo $args['index']; ?>"<?php }; ?>>
	
	<a rel="external" class="post-thumbnail-link" href="<?php the_permalink() ?>">
		
		<?php the_post_thumbnail('large'); ?>

	</a>

	<div class="post-meta"><?php echo wpgl_get_all_terms(); ?></div>

	<a rel="external" class="post-title" href="<?php the_permalink() ?>">

		<h4><?php the_title(); ?></h4>

	</a>


</article><!-- #post-<?php the_ID(); ?> -->
