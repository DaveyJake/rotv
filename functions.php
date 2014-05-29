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
	$content_width = '100%'; /* pixels */
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
		'primary' => __( 'Primary Menu', 'rotv' ),
	) );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'rotv_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array(
		'comment-list',
		'search-form',
		'comment-form',
		'gallery',
		'caption',
	) );
}
endif; // rotv_setup
add_action( 'after_setup_theme', 'rotv_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
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

/**
 * Enqueue scripts and styles.
 */

function rotv_scripts() {
	wp_enqueue_style( 'rotv-style', get_template_directory_uri() . '/css/style.css', false, '1.0', 'all' );
	wp_enqueue_style( 'rotv-mobile', get_template_directory_uri() . '/css/mobile.css', false, '1.0', 'only screen and (max-width: 640px)' );
	wp_enqueue_style( 'dataTables-foundation-style', get_template_directory_uri() . '/plugins/dataTables/dataTables.foundation.css', false, '3.9.1', 'all' );
	wp_enqueue_style( 'dataTables-style', get_template_directory_uri() . '/plugins/dataTables/jquery.dataTables.css', false, '3.9.1', 'all' );

	wp_enqueue_script( 'custom-mobile', get_template_directory_uri() . '/js/custom-mobile.js', false, '1.0', 'only screen and (max-width: 640px)' );
	wp_enqueue_script( 'mobile-menu', get_template_directory_uri() . '/js/mobile-menu.js', false, '1.0', 'only screen and (max-width: 640px)' );
	wp_enqueue_script( 'cssua-script', get_template_directory_uri() . '/js/mobile/cssua.min.js', false, '3.9.1', 'all' );
	wp_enqueue_script( 'currentdate-script', get_template_directory_uri() . '/js/mobile/currentdate.js', false, '1.0', 'only screen and (max-width: 640px)' );
	wp_enqueue_script( 'rotv-js', get_template_directory_uri() . '/js/custom.js', false, '1.0', 'all' );
	wp_enqueue_script( 'foundation-script', get_template_directory_uri() . '/foundation/js/foundation.min.js', false, '5.2.2', 'all' );
	wp_enqueue_script( 'flowType-script', get_template_directory_uri() . '/plugins/flowType/flowtype.js', false, '3.9.1', 'all' );
	wp_enqueue_script( 'dataTables-script', get_template_directory_uri() . '/plugins/dataTables/jquery.dataTables.js', false, '3.9.1', 'all' );
	wp_enqueue_script( 'dataTables-foundation-script', get_template_directory_uri() . '/plugins/dataTables/dataTables.foundation.js', false, '3.9.1', 'all' );

	//wp_enqueue_script( 'rotv-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
	//wp_enqueue_script( 'rotv-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'rotv_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

// Require jquery ---------------------------------------------------------------------------------------------------------------
if (!is_admin()) add_action("wp_enqueue_scripts", "my_jquery_enqueue", 11);
function my_jquery_enqueue() {
   wp_deregister_script('jquery');
   wp_register_script('jquery', get_template_directory_uri() . "/foundation/js/vendor/jquery.js", false, null );
   wp_enqueue_script('jquery');
}

// Selects Custom Post Type Templates for single and archive pages ---------------------------------------------------------------
add_filter('template_include', 'custom_template_include');
function custom_template_include($template) {
	$custom_template_location = '/views/';
     if ( get_post_type () ) {
        if ( is_archive() ) :
           if(file_exists(get_stylesheet_directory() . $custom_template_location . 'archive-' . get_post_type() . '.php'))
              return get_stylesheet_directory() . $custom_template_location . 'archive-' . get_post_type() . '.php';
        endif;
        if ( is_single() ) :
           if(file_exists(get_stylesheet_directory() . $custom_template_location . 'single-' . get_post_type() . '.php'))
              return get_stylesheet_directory() . $custom_template_location . 'single-' . get_post_type() . '.php';
        endif;
          if ( is_page() ) :
           if(file_exists(get_stylesheet_directory() . $custom_template_location . 'page-' . get_post_type() . '.php'))
              return get_stylesheet_directory() . $custom_template_location . 'page-' . get_post_type() . '.php';
        endif;
    }
    return $template;
  }
