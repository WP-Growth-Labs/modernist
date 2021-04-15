<?php

global $post;

$blocks = parse_blocks( $post->post_content );
if( be_has_h1_block( $blocks ) ) :

?>
	<header class="entry-header" >
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->
<?php

endif;