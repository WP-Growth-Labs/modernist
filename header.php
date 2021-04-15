<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package wpgl
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<!-- Start: Loading spinner --> 
<div id="page-overlay" class="loading">
    <span aria-hidden="true" aria-label="Loading">
        <?php echo __('Loading ... ')?>
    </span>
</div> 
<!-- End: Loading spinner --> 
<?php wp_body_open(); ?>
<div id="page" class="page site <?php if( !empty( get_field( 'ms_header_style' ) ) && get_field( 'ms_header_style' ) === 'dark' ) { echo 'dark'; } ?>">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'wpgl' ); ?></a>

	<?php get_template_part('template-parts/partials/headers/header', 'site');