<?php
/**
 * kickplate functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package kickplate
 */

if ( ! function_exists( 'kickplate_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function kickplate_setup() {

	add_theme_support( 'automatic-feed-links' );

	add_theme_support( 'title-tag' );

	add_theme_support( 'post-thumbnails' );

	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'kickplate' ),
	) );

	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );
}
endif;
add_action( 'after_setup_theme', 'kickplate_setup' );

/**
 * @global int $content_width
 */
function kickplate_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'kickplate_content_width', 1024 );
}
add_action( 'after_setup_theme', 'kickplate_content_width', 0 );

function kickplate_widgets_init() {
	register_sidebar( array(
		'name'          => 'Sidebar',
		'id'            => 'sidebar-1',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
	'name'          => 'Footer 1',
	'id'            => 'footer-1',
	'before_widget' => '<div class="footer-item">',
	'after_widget'  => '</div>',
	'before_title'  => '<h3>',
	'after_title'   => '</h3>',
) );
}
add_action( 'widgets_init', 'kickplate_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function kickplate_scripts() {
	wp_enqueue_style( 'kickplate-style', get_template_directory_uri() . '/css/style.min.css', array(), '0.1' );

	wp_enqueue_script( 'kickplate-shiv', get_template_directory_uri() . '/js/html5shiv.min.js', array(), '1.0' );

	wp_enqueue_script( 'kickplate-main', get_template_directory_uri() . '/js/main.min.js', array(), '0.1', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'kickplate_scripts' );

/**
* Remove emoji junk
*/

remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );

/**
* Tidy up oembed stuff
*/

wp_deregister_script( 'wp-embed' );
  // Remove the REST API endpoint.
remove_action('rest_api_init', 'wp_oembed_register_route');
// Turn off oEmbed auto discovery.
// Don't filter oEmbed results.
remove_filter('oembed_dataparse', 'wp_filter_oembed_result', 10);
// Remove oEmbed discovery links.
remove_action('wp_head', 'wp_oembed_add_discovery_links');
// Remove oEmbed-specific JavaScript from the front-end and back-end.
remove_action('wp_head', 'wp_oembed_add_host_js');

/**
* Simplify up nav li items
*/

function trimmed_classes( $classes, $item ){
     return [];
}

add_filter('nav_menu_css_class' , 'trimmed_classes' , 10 , 2 );

/**
* Move all scripts to bottom
*/

function move_scripts_to_footer() {
	remove_action('wp_head', 'wp_print_scripts');
	remove_action('wp_head', 'wp_print_head_scripts', 9);
	remove_action('wp_head', 'wp_enqueue_scripts', 1);
}
add_action( 'wp_enqueue_scripts', 'move_scripts_to_footer' );
