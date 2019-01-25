<?php
if ( ! defined( 'ABSPATH' ) ) exit;

/*-----------------------------------------------------------------------------------*/
/* Theme essentials! */
/*-----------------------------------------------------------------------------------*/

include( get_template_directory() . '/inc/theme-essentials.php');
include( get_template_directory() . '/inc/theme-options.php');
include( get_template_directory() . '/inc/theme-functions.php');
include( get_template_directory() . '/inc/theme-metabox.php');
include( get_template_directory() . '/inc/comments.php');


/**
 * Woocommerce integration
 */
if ( class_exists( 'woocommerce' ) ) {
	include( get_template_directory() . '/inc/woocommerce.php');
}

/**
 * VC integration
 */
if ( function_exists( 'vc_set_as_theme' ) ) {
  include_once get_template_directory(). '/inc/integrations/visual-composer/vc-init.php';
}

/**
 * TGM class for plugin includes.
 */
if( is_admin() ){
	if (!( class_exists( 'TGM_Plugin_Activation' ) ))
		include_once get_template_directory(). '/inc/tgm-activation/tt-plugins.php';
}

if ( ! function_exists( 'plumberx_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * Create your own plumberx_setup() function to override in a child theme.
 *
 * @since Plumberx 1.0
 */

 function plumberx_setup() {



	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Plumberx, use a find and replace
	 * to change 'plumberx' to the name of your theme in all the template files
	 */


	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	add_theme_support( 'custom-header' );
	add_theme_support( 'custom-background' );
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
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size ( 'plumberx_thumb', 120, 92, true );


	register_nav_menus( array(
		'primary_menu' => esc_html__( 'Primary Menu', 'plumberx' ),
		'footer_menu' => esc_html__( 'Footer Menu', 'plumberx' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );


	if (class_exists ( 'woocommerce' )) {
			add_theme_support ( 'woocommerce' );
		}


}
endif; // plumberx_setup
add_action( 'after_setup_theme', 'plumberx_setup' );

/**
 * Sets the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 *
 * @since Plumberx 1.0
 */
if ( ! isset( $content_width ) ) {
	$content_width = 1170;
}