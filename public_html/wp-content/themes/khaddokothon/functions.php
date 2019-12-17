<?php
/**
 * Theme Functions and Definitions
 *
 * @package KhaddoKothon
 */

// Restrict Direct Access.
if ( ! defined('ABSPATH')) exit;

// Set the content width.
if ( ! isset( $content_width ) ) {
	$content_width = 1170; /* pixels */
}

// Constants
define('khaddokothonTHEMEDIR', get_template_directory() );
define('khaddokothonTHEMEURI', get_template_directory_uri() );
define('khaddokothon_VERSION','1.2.5');

//Includes
require_once (get_theme_file_path("/inc/tgm.php"));
require_once (get_theme_file_path("/inc/theme-functions.php"));
require_once (get_theme_file_path("/inc/customizer.php"));
require_once (get_theme_file_path("/inc/comments-walker.php"));


/**
 * Theme Setup
 */
if ( ! function_exists( 'khaddokothon_theme_setup' ) ) :
	function khaddokothon_theme_setup() {

		load_theme_textdomain( 'khaddokothon', get_template_directory() . '/languages' );

		// Enable theme support
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', ) );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'custom-logo' );
		add_theme_support( 'custom-background', apply_filters( 'khaddokothon_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );
		$ch_args = array(
			'default-image' => khaddokothonTHEMEURI . '/assets/img/header-bg.jpg',
		);
		add_theme_support( 'custom-header', $ch_args );


		// Gutenberg
		add_theme_support( 'align-wide' );
		add_theme_support( 'responsive-embeds' );
		add_editor_style();


		// Set size of thumbnails
		add_image_size('khaddokothon-portrait',540,633,true);


		// Nav menus
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary Menu', 'khaddokothon' ),
		) );

	}
endif; // theme_setup
add_action( 'after_setup_theme', 'khaddokothon_theme_setup' );


/**
 * Register Sidebar
 */
function khaddokothon_widgets_init() {

	//Sidebar Widgets
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'khaddokothon' ),
		'id'            => 'sidebar-1',
		'description' => esc_html__('Appears on posts and pages.', 'khaddokothon'),
		'before_widget' => '<div id="%1$s" class="khaddokothon-sidebar-widget widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="khaddokothon-sec-title">',
		'after_title'   => '</h4>',
	) );

	//Footer Widgets
	$khaddokothon_footer_widgets_display = get_theme_mod('khaddokothon_footer_widgets_display');
	if($khaddokothon_footer_widgets_display):
		$footer_column = khaddokothon_get_footer_column(get_theme_mod('khaddokothon_footer_widgets_column'));
		for ($i = 1; $i <= $footer_column; $i++) {
			$args_sidebar = array(
				'name' => esc_html__('Footer Widget ', 'khaddokothon') . $i,
				'id' => 'footer-widget-' . $i,
				'description' => esc_html__('Appears on footer area ', 'khaddokothon').$i,
				'before_widget' => '<div class="khaddokothon-footer-widget widget %2$s">',
				'after_widget' => '</div>',
				'before_title' => '<h4 class="khaddokothon-sec-title">',
				'after_title' => '</h4>',
			);

			register_sidebar($args_sidebar);
		}
	endif;

}
add_action( 'widgets_init', 'khaddokothon_widgets_init' );


/**
 * Theme Styles
 */
function khaddokothon_theme_styles() {
	wp_enqueue_style( 'bootstrap', khaddokothonTHEMEURI . '/assets/css/bootstrap.min.css');
	wp_enqueue_style( 'font-awesome', khaddokothonTHEMEURI . '/assets/css/all.css');
	wp_enqueue_style( 'owl-carousel', khaddokothonTHEMEURI . '/assets/css/owl.carousel.min.css');
	wp_enqueue_style( 'khaddokothon-main', khaddokothonTHEMEURI . '/assets/css/main.css');
	wp_enqueue_style( 'khaddokothon-styles', get_stylesheet_uri(),'',khaddokothon_VERSION);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'khaddokothon_theme_styles', 1 );


/**
 * Theme Scripts
 */
function khaddokothon_theme_js() {
	wp_enqueue_script( 'bootstrap', khaddokothonTHEMEURI . '/assets/js/bootstrap.min.js', array( 'jquery' ), '4.0.0', true );
	wp_enqueue_script( 'owl-carousel', khaddokothonTHEMEURI . '/assets/js/owl.carousel.min.js', array( 'jquery' ), '2.3.4', true );
	wp_enqueue_script( 'khaddokothon-scripts', khaddokothonTHEMEURI . '/assets/js/custom.js', array( 'jquery' ), khaddokothon_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'khaddokothon_theme_js' );
