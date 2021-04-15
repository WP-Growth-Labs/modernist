<nav id="site-navigation" class="main-navigation">

	<div class="nav-wrapper">

		<?php
		wp_nav_menu(
			array(
				'container' => false,                           // remove nav container
				'menu' => "Main Navigation",  // nav name
				'menu_class' => 'nav main-nav cf',               // adding custom nav class
				'theme_location' => 'main-nav',                 // where it's located in the theme
				'before' => '',                                 // before the menu
				'after' => '',                                  // after the menu
				'link_before' => '',                            // before each link
				'link_after' => '',                             // after each link
				'depth' => 0,                                   // limit the depth of the nav
				'fallback_cb' => '',
				'walker' => new Menu_Exclude_Headers                             // fallback function (if there is one)
			)
		);
		?>
		
	</div>

</nav><!-- #site-navigation -->