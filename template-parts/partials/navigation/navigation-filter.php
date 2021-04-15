<?php
$search = '';
if( is_search() ) {

	$search = '?s=' . get_search_query();
}

?>

<div id="filter" class="modal">

	<div class="grid">

		<div class="col-12_md-24 filter-categories">

			<h3>Categories</h3>

			<ul class="term-list">

			<?php

			$categories = get_terms( array(
			    'taxonomy' => 'category',
			    'hide_empty' => true,
			) );

			foreach( $categories as $category ) :

			?>

				<li <?php if( is_category( $category->term_id ) ) { echo 'class="current-term"'; }; ?>><a href="<?php echo get_term_link( $category->term_id ) . $search; ?>"><?php echo $category->name; ?></a></li>

			<?php

			endforeach;

			?>

			</ul>

		</div>

		<div class="col-12_md-24 filter-tags">

			<h3>Tags</h3>

			<ul class="term-list">

			<?php

			$tags = get_terms( array(
			    'taxonomy' => 'post_tag',
			    'hide_empty' => true,
			) );

			foreach( $tags as $tag ) :

			?>

				<li <?php if( is_tag( $tag->term_id ) ) { echo 'class="current-term"'; }; ?>><a href="<?php echo get_term_link( $tag->term_id )  . $search; ?>"><?php echo $tag->name; ?></a></li>

			<?php

			endforeach;

			?>

			</ul>

		</div>

	</div>

</div>