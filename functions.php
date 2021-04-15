<?php
@ini_set( 'upload_max_size' , '64M' );
@ini_set( 'post_max_size', '64M');
@ini_set( 'max_execution_time', '300' );
/**
 * WPGL Framework functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package wpgl
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'wpgl_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function wpgl_setup() { 
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on WPGL Framework, use a find and replace
		 * to change 'wpgl' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'wpgl', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		add_theme_support( 'responsive-embeds' );

		add_theme_support( 'align-wide' );
		
		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'main-menu' => esc_html__( 'Primary', 'wpgl' ),
			)
		);

	}
endif;
add_action( 'after_setup_theme', 'wpgl_setup' );
add_filter( 'wp_lazy_loading_enabled', '__return_false' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function wpgl_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'wpgl_content_width', 640 );
}
add_action( 'after_setup_theme', 'wpgl_content_width', 0 );

/**
 * Enqueue scripts and styles.
 */
function wpgl_scripts() {

	wp_enqueue_style( 'wpgl-loading', get_template_directory_uri() . '/library/css/loading.css' , array(), _S_VERSION );
	wp_enqueue_style( 'wpgl-style', get_template_directory_uri() . '/library/css/style.css' , array(), _S_VERSION );
	//wp_style_add_data( 'wpgl-style', 'rtl', 'replace' );

	//wp_enqueue_script( 'wpgl-slick', get_template_directory_uri() . '/library/js/slick.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'wpgl-visible', get_template_directory_uri() . '/library/js/jquery.visible.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'wpgl-featherlight', get_template_directory_uri() . '/library/js/featherlight.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'wpgl-featherlight-gallery', get_template_directory_uri() . '/library/js/featherlight.gallery.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'wpgl-balancetext', get_template_directory_uri() . '/library/js/balance-text.js', array('jquery'), _S_VERSION, true );
	wp_enqueue_script( 'wpgl-widowfix', get_template_directory_uri() . '/library/js/jquery.widowFix.min.js', array('jquery'), _S_VERSION, true );
	wp_enqueue_script( 'wpgl-scrollmagic', get_template_directory_uri() . '/library/js/ScrollMagic.min.js', array('jquery'), _S_VERSION, true );
	wp_enqueue_script( 'wpgl-scrolldebug', get_template_directory_uri() . '/library/js/debug.addIndicators.js', array('jquery'), _S_VERSION, true );
	wp_enqueue_script( 'wpgl-gsap', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.6.1/gsap.min.js', array('jquery'), _S_VERSION, true );
	wp_enqueue_script( 'wpgl-js', get_template_directory_uri() . '/library/js/scripts.js', array(), _S_VERSION, true );
	

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'wpgl_scripts' );

// read our loading style file, and put it at the top of the page content inside the head
function pixelvars_loading_inline_style(){
  ?>
  <style><?php echo @file_get_contents( get_stylesheet_directory() . '/library/css/loading.css')?></style>
  <?php
}
add_action( 'wp_head', 'pixelvars_loading_inline_style',3 );
// add our script.js to wordpress scripts
function pixelvars_child_enqueue_scripts() {
    
    wp_enqueue_script("pixelvars-loading", trailingslashit( get_stylesheet_directory_uri() ) . "/library/js/loading.js");
}
add_action( "wp_enqueue_scripts", "pixelvars_child_enqueue_scripts");
// add noscript tag, if javascript is disabled on the browser
function pixelvars_add_noscript_filter($tag, $handle, $src){
    // this filter will run for every enqueued script
    // we need to check if the handle is equals the script   
    if ( "pixelvars-loading" === $handle ){
        $noscript = "<noscript>";
        $noscript .= "<style>#page-overlay{display: none!important;}</style>";
        $noscript .= "</noscript>"; 
        $tag = $tag . $noscript; 
     } 
    return $tag; 
}
add_filter("script_loader_tag", "pixelvars_add_noscript_filter", 10, 3);


function cc_mime_types($mimes) {
	$mimes['json'] = 'application/json'; 
	$mimes['svg'] = 'image/svg+xml'; 
	return $mimes; 
} 
add_filter('upload_mimes', 'cc_mime_types');
/**
 * Load Gutenberg Styles
 */
function wpgl_gutenberg_scripts() {
	wp_enqueue_style( 'wpgl-gutenberg-style', get_template_directory_uri() . '/library/css/gutenberg.css' , array(), _S_VERSION );
}
add_action( 'enqueue_block_editor_assets', 'wpgl_gutenberg_scripts' );
add_theme_support( 'editor-styles' );
add_editor_style( get_template_directory_uri() . '/library/css/gutenberg.css' );

/**
 * Load Custom Post Types + Taxonomies
 */
require get_template_directory() . '/inc/admin.php';
require get_template_directory() . '/inc/cpt.php';
require get_template_directory() . '/inc/tax.php';

/**
 * Load Menu Walker
 */
require get_template_directory() . '/inc/menu-walker.php';

/**
 * Load Custom Blocks
 */
require get_template_directory() . '/inc/blocks.php';


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * AJAX Load More
 */
require get_template_directory() . '/inc/ajax-load-more.php';

/**
 * Allow Adding Archive Pags to Menus
 */
require get_template_directory() . '/inc/archives-in-menus.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

/**
 * Load Theme Helper
 */
require_once get_template_directory() . '/inc/wpgl.php';

/**
 * Load GF + ACF Integration
 */
if ( class_exists( 'ACF' ) ) {
	include_once('inc/gravity-acf/acf-gravity_forms.php');
}

/**
 * Selectively disable Guenberg
 */
include_once('inc/disable-editor.php');