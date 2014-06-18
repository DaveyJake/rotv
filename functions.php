<?php
/**
 * Rugby On TV functions and definitions
 *
 * @package Rugby On TV
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'rotv_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function rotv_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Rugby On TV, use a find and replace
	 * to change 'rotv' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'rotv', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' 		=> __( 'Primary Menu', 'rotv' ),
	) );

}
endif; // rotv_setup

add_action( 'after_setup_theme', 'rotv_setup' );

// Register Widgets --------------------------------------------------------------------------------------------------

function rotv_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'rotv' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'rotv_widgets_init' );

// Enqueue scripts and styles --------------------------------------------------------------------------------------------------

function rotv_scripts() {
	wp_enqueue_style( 'rotv-style', get_stylesheet_uri() , false, '1.1.2', 'all' );
	wp_enqueue_style( 'font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css' , false, '4.1.0', 'all' );
	wp_enqueue_style( 'dT-style', get_template_directory_uri() . '/plugins/dataTables/dataTables.foundation.css' , false, '1.0', 'all' );
	
	wp_enqueue_script( 'rotv-custom', get_template_directory_uri() . '/js/custom.js', array(), '20120206', true );
	wp_enqueue_script( 'rotv-mobile', get_template_directory_uri() . '/js/mobile.js', array(), '20120206', true );
	wp_enqueue_script( 'rotv-foundation', get_template_directory_uri() . '/js/foundation.js', array(), '20120206', true );
	wp_enqueue_script( 'rotv-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
	wp_enqueue_script( 'flowType-script', get_template_directory_uri() . '/plugins/flowType/flowtype.js', false, '3.9.1', 'all' );
	wp_enqueue_script( 'dataTables-foundation', get_template_directory_uri() . '/plugins/dataTables/dataTables.foundation.js', false, '3.9.1', 'all' );
	wp_enqueue_script( 'dataTables-script', get_template_directory_uri() . '/plugins/dataTables/jquery.dataTables.js', false, '3.9.1', 'all' );
}
add_action( 'wp_enqueue_scripts', 'rotv_scripts' );

// Require jquery ---------------------------------------------------------------------------------------------------------------

if (!is_admin()) add_action("wp_enqueue_scripts", "my_jquery_enqueue", 11);
function my_jquery_enqueue() {
   wp_deregister_script('jquery');
   wp_register_script('jquery', "http://localhost:8888/jquery-1.11.1.min.js", false, null);
   wp_enqueue_script('jquery');
}