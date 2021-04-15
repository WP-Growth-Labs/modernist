	<?php

	if( get_field( 'ms_header_style' ) === 'dark' ) :

		$header_color = '';

	else :

		$header_color = 'reverse reversed';

	endif;

	?>


	<header id="site-header" class="site-header <?php echo $header_color; ?>">

		<div class="site-header-wrap">

			<div class="site-branding">
			
				<a href="<?php bloginfo('url'); ?>/" title="Home Page">

					<?php get_template_part( 'library/img/inline' , 'Modernist_Logo.svg' ); ?>

				</a>

			</div><!-- .site-branding -->

			<div class="page-title">

				<p>
				<?php 

				global $post;

				do {

					if( get_field( 'ms_custom_header_title' ) ) { 

						echo get_field( 'ms_custom_header_title' );
						break;
					}

					if( is_home() ) {

						echo get_field( 'ms_custom_header_title', get_option( 'page_for_posts' ) );
						break;

					}

					if( !is_front_page() && !is_archive() && !is_home() && !is_search() ) {

						echo get_the_title();
						break;
					};

					if( is_archive() && !is_home() && !is_front_page() ) {

						the_archive_title( '', '' ); echo ( is_search() ) ? ' / Search Results for: ' . get_search_query() : '';
						break;
					};

					if( is_search() ) {

						printf( esc_html__( 'Search Results for: %s', 'wpgl' ), '<span>' . get_search_query() . '</span>' );
						break;
					};

				} while (false);

				?>
				</p>

			</div>

			<?php if( is_home() || is_archive() || is_singular( 'post' ) ) : ?>

				<div class="menu-filter">

					<a class="button reverse" data-featherlight="#filter" data-featherlight-variant="fl-narrow"><i class="fas fa-filter"></i> Filter</a>

				</div>

			<?php endif; ?>

			<div class="menu-toggle">

				<a title="Menu Toggle">

					<?php get_template_part( 'library/img/inline' , 'Menu_Button.svg' ); ?>

				</a>

			</div>

		</div>

	</header><!-- #masthead -->