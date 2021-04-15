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

$width = 'full-width';
if( !empty( get_field( 'bg_width' ) ) ) {
	$width = get_field( 'bg_width' );
}

$tab_type = 'horizontal';
if ( !empty( get_field( 'tab_type' ) ) ) :

	$tab_type = get_field( 'tab_type' );

	if( $tab_type === 'horizontal' ) :

		$tabs = get_field( 'tabs_hz' );
		$tab_panel_index = 0;

		?>

		<div id="<?php echo $id; ?>" class="animate-in <?php echo $scheme; ?> <?php echo $width; ?> <?php echo $className; ?> block-tabs block-tabs-hz">
			
			<div class="tabbed-area">

				<div class="tab-navigation">

					<div class="desktop">

						<?php

						$tab_nav_index = 0;

						while( have_rows( 'tabs_hz' ) ) : the_row(); $tab_nav_index++;

							$tab_title = get_sub_field( 'tab_nav_title' );
							
							?>

							<div class="tab-nav-item <?php if( $tab_nav_index === 1 ) { echo 'active'; }; ?>" data-target="<?php echo $tab_nav_index; ?>">

								<span><?php echo $tab_title; ?></span>

							</div>

							<?php

						endwhile;
						
						?>

					</div>

					<div class="mobile">

						<select name="mobile-tab-nav">

							<?php

							$tab_nav_index = 0;

							while( have_rows( 'tabs_hz' ) ) : the_row(); $tab_nav_index++;

								$tab_title = get_sub_field( 'tab_nav_title' );
								
								?>

								<option value="<?php echo $tab_nav_index; ?>" <?php if( $tab_nav_index === 1 ) { echo 'selected="selected"'; }; ?>><?php echo $tab_title; ?></option>

								<?php

							endwhile;
						
							?>

						</select>

					</div>

				</div>

				<div class="tab-panels">

					<?php

					while( have_rows( 'tabs_hz' ) ) : the_row(); $tab_panel_index++;

						$tab_heading = get_sub_field( 'tab_heading' );
						$tab_content = get_sub_field( 'tab_content' );
						$tab_image = get_sub_field( 'tab_image' );
						$tab_download = get_sub_field( 'tab_download' );

						?>

						<div class="tab-panel <?php if( $tab_panel_index === 1 ) { echo 'active'; }; ?>" data-panel="<?php echo $tab_panel_index; ?>"> 

							<div class="grid tab-panel-content">

								<div class="col-12_md-24 tab-content">

									<h6><?php echo $tab_heading; ?></h6>
									<p class="content"><?php echo $tab_content; ?></p>

								</div>

								<div class="col-12_md-24 tab-image">

									<div class="tab-image-wrapper">

										<img src="<?php echo $tab_image['url']; ?>" />

										<a class="button yellow rounded" target="_blank" href="<?php echo $tab_download['url']; ?>">Download Example</a>

									</div>

								</div>

							</div>

						</div>

						<?php

					endwhile;
					
					?>

				</div>

			</div>

		</div>

	<?php
	
	else :

		$tabs = get_field( 'tabs_vt' );
		$tab_nav_index = 0;
		$tab_panel_index = 0;
		$tab_cta_index = 0;

		?>

		<div id="<?php echo $id; ?>" class="light <?php echo $width; ?> <?php echo $className; ?> block-tabs block-tabs-vt">

			<div class="content">

				<h2><?php echo get_field( 'tabbed_area_header'); ?></h2>

			</div>

			<div class="tabbed-area">

				<div class="tab-navigation">

					<div class="desktop">

						<?php

						$tab_nav_index = 0;

						while( have_rows( 'tabs_vt' ) ) : the_row(); $tab_nav_index++;

							$tab_title = get_sub_field( 'tab_nav_title' );
							
							?>

							<div class="tab-nav-item <?php if( $tab_nav_index === 1 ) { echo 'active'; }; ?>" data-target="<?php echo $tab_nav_index; ?>">

								<span><?php echo $tab_title; ?></span>

							</div>

							<?php

						endwhile;
						
						?>

					</div>

					<div class="mobile">

						<select name="mobile-tab-nav">

							<?php

							$tab_nav_index = 0;

							while( have_rows( 'tabs_vt' ) ) : the_row(); $tab_nav_index++;

								$tab_title = get_sub_field( 'tab_nav_title' );
								
								?>

								<option value="<?php echo $tab_nav_index; ?>" <?php if( $tab_nav_index === 1 ) { echo 'selected="selected"'; }; ?>><?php echo $tab_title; ?></option>

								<?php

							endwhile;
						
							?>

						</select>

					</div>

				</div>

				<div class="tab-panels">

					<?php

					while( have_rows( 'tabs_vt' ) ) : the_row(); $tab_panel_index++;

						$tab_heading = get_sub_field( 'tab_heading' );
						$tab_content = get_sub_field( 'tab_content' );
						$tab_image = get_sub_field( 'tab_image' );
						$tab_download = get_sub_field( 'tab_download' );

						?>

						<div class="tab-panel <?php if( $tab_panel_index === 1 ) { echo 'active'; }; ?>" data-panel="<?php echo $tab_panel_index; ?>"> 

							<div class="tab-panel-content">

								<div class="tab-image">

									<div class="tab-image-wrapper">

										<img src="<?php echo $tab_image['url']; ?>" />

									</div>

								</div>

							</div>

						</div>

						<?php

					endwhile;
					
					?>

				</div>

				<div class="tab-ctas">

					<?php

					while( have_rows( 'tabs_vt' ) ) : the_row(); $tab_cta_index++;

						$tab_heading = get_sub_field( 'tab_heading' );
						$tab_content = get_sub_field( 'tab_content' );
						$tab_image = get_sub_field( 'tab_image' );
						$tab_download = get_sub_field( 'tab_download' );

						?>

						<div class="tab-cta <?php if( $tab_cta_index === 1 ) { echo 'active'; }; ?>" data-cta="<?php echo $tab_cta_index; ?>"> 

							<div class="tab-panel-cta">

								<p>Looking to build Design Thinking<br />competencies within your organization?</p>

								<p><a class="button blue rounded button-no-margin" target="_blank" href="<?php echo $tab_download['url']; ?>">Download Example</a></p>
							
							</div>

						</div>

						<?php

					endwhile;
					
					?>

				</div>

			</div>

		</div>

	<?php

	endif;

endif;

?>