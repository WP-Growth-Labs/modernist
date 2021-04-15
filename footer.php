<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package wpgl
 */

?>

<footer  class="site-footer">

<div class="footer">

	<div class="footer-wrapper">

		<nav class="footer-navigation">
		
			<?php
			wp_nav_menu(
				array(
					'container' => false,                           // remove nav container
					'menu' => "Main Navigation",  // nav name
					'menu_class' => 'nav footer-nav cf',               // adding custom nav class
					'theme_location' => 'footer-nav',                 // where it's located in the theme
					'before' => '',                                 // before the menu
					'after' => '',                                  // after the menu
					'link_before' => '',                            // before each link
					'link_after' => '',                             // after each link
					'depth' => 0,                                   // limit the depth of the nav
					'fallback_cb' => '',                             // fallback function (if there is one)
					'walker' => new Menu_Exclude_Headers
				)
			);
			?>
		</nav>

		<div class="footer-subscribe">

			<ul class="footer-nav">

				<li class="menu-item">

					<span class="header">Subscribe to Modernist</span>

				</li>

			</ul>

			<?php gravity_form( 'Subscribe to Modernist', false, false, false, '', true, 12 ); ?>

		</div>
		
	</div>

	<div class="footer-wrapper colophon">
			<a href="<?php bloginfo('url'); ?>/" title="Home Page">
			
				<?php get_template_part( 'library/img/inline' , 'Modernist_Logo.svg' ); ?>

			</a>

			<p>&copy; <?php echo date('Y'); ?> Modernist Studio. All Rights Reserved.</p>
			
	</div>

</div>

</footer><!-- #colophon -->

</div><!-- #page -->

<?php get_template_part( 'template-parts/partials/navigation/navigation-main'); ?>

<?php if( is_home() || is_singular( 'post' ) || is_archive() )
	get_template_part( 'template-parts/partials/navigation/navigation', 'filter'); ?>

<?php wp_footer(); ?>

</body>
</html>
