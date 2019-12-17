<?php
/**
 * Theme Customizer
 *
 * @package KhaddoKothon
 */


function khaddokothon_customize_register( $wp_customize ) {
	// Move
	$wp_customize->get_section( 'background_image' )->title   = esc_html__( 'Background Styles', 'khaddokothon' );
	$wp_customize->get_control( 'background_color' )->section = 'khaddokothon_colors';
	$wp_customize->get_section( 'header_image' )->panel = 'khaddokothon_header';

	//Remove
	$wp_customize->remove_control('header_textcolor');

	// Upspell
	require_once trailingslashit( get_template_directory() ) . '/inc/upgrade-to-pro/upgrade.php';
	$wp_customize->register_section_type( 'khaddokothon_Customize_Section_Upsell' );

	// Register sections.
	$wp_customize->add_section(
		new khaddokothon_Customize_Section_Upsell(
			$wp_customize,
			'theme_upsell',
			array(
				'title'    => esc_html__( 'KhaddoKothon Pro', 'khaddokothon' ),
				'pro_text' => esc_html__( 'Get Pro', 'khaddokothon' ),
				'pro_url'  => 'https://www.tabthemes.com/themes/khaddokothon/',
				'priority' => 999,
			)
		)
	);

}

add_action( 'customize_register', 'khaddokothon_customize_register' );


// Check if Kirki is installed
if ( class_exists( 'Kirki' ) ) {


	// Selector Vars
	$khaddokothon_color_selector = array(

		//Theme Colors
		'khaddokothon_theme_color' => '.widget ul li a:hover,.widget #wp-calendar a:hover, #khaddokothon-regular-blog-home article .khaddokothon-regular-blog-info .khaddokothon-regular-blog-cat li a,
		.khaddokothon-regular-pagination a:hover, .khaddokothon-index-blog h2 a:hover, .khaddokothon-index-blog .post-grid-meta a:hover,.khaddokothon-blog-item .khaddokothon-blog-tags ul li a:hover,
		.khaddokothon-blog-item .khaddokothon-blog-categories ul li a:hover, .khaddokothon-blog-item .khaddokothon-blog-share li a:hover,.khaddokothon-post-nav a:hover h4, .khaddokothon-post-nav a:hover span,
		.khaddokothon-author-box a:hover, .comment-author a:hover, .comment-edit-link, .owl-prev i:hover, .owl-next i:hover, ul li a:hover,
		ol li a:hover, .khaddokothon-post-meta li a:hover, .khaddokothon-hover-item .khaddokothon-hover-content a:hover, #khaddokothon-regular-blog-home article .khaddokothon-regular-blog-title a:hover,
		.khaddokothon-search-page .post-grid-meta a:hover, .khaddokothon-search-page .post-list-meta a:hover, .khaddokothon-index-blog .post-list-meta a:hover, .khaddokothon-search-page h2 a:hover',

		'khaddokothon_theme_bg_color' => '#khaddokothon-back-to-top i, blockquote:before, pre:before, .preloader .v-center .khaddokothon-ellipsis div,
		.khaddokothon-btn,.widget.widget_tag_cloud a:hover, .khaddokothon-search-form .khaddokothon-btn:hover, .khaddokothon-post-nav a:hover .btn, .khaddokothon-pagination-list a:hover,
		.comment .reply a:hover, .khaddokothon-btn-transparent:hover, .wp-block-button.is-style-outline a:hover, .khaddokothon-blog-item .khaddokothon-page-breaks a:hover,
		#khaddokothon-featured-home .khaddokothon-featured-home-posts-nav [type=button]:hover, #khaddokothon-subscribe-home input[type=submit],
		.khaddokothon-blog-item .khaddokothon-page-breaks .current, .wpcf7 input[type=submit]',

		'khaddokothon_theme_border_color' => '.khaddokothon-btn,.widget.widget_tag_cloud a:hover, .khaddokothon-search-form .khaddokothon-btn:hover, .khaddokothon-post-nav a:hover .btn,
		.khaddokothon-pagination-list a:hover, .comment .reply a:hover, .form-control:focus, .wp-block-pullquote, .khaddokothon-btn-transparent:hover, 
		.wp-block-button.is-style-outline a:hover, #khaddokothon-featured-home .khaddokothon-featured-home-posts-nav [type=button]:hover,
		.khaddokothon-blog-item .khaddokothon-page-breaks a:hover, .khaddokothon-blog-item .khaddokothon-page-breaks .current, .wpcf7 input:focus, .wpcf7 textarea:focus',

		'khaddokothon_theme_hover_color' => 'a:hover, #khaddokothon-regular-blog-home article .khaddokothon-regular-blog-info .khaddokothon-regular-blog-cat li a:hover,.comment-edit-link:hover',

		'khaddokothon_theme_bg_hover_color' => '.khaddokothon-btn:hover, #khaddokothon-back-to-top i:hover, #khaddokothon-subscribe-home [type=submit]:hover,
		.wpcf7 input[type=submit]:hover',

		'khaddokothon_theme_border_hover_color' => '.khaddokothon-btn:hover',

		'khaddokothon_theme_text_color' => 'body, p, h1, .h1, h2, .h2, h3, .h3, h4, .h4, h5, .h5, h6, .h6, .khaddokothon-search-popup .form-inline .khaddokothon-search-form .khaddokothon-search-field,
		.khaddokothon-btn-transparent, .widget ul li a, .widget.widget_tag_cloud a, .widget #wp-calendar a, #khaddokothon-featured-home .khaddokothon-featured-home-posts-nav [type=button],
		#khaddokothon-regular-blog-home article .khaddokothon-regular-blog-title a, .khaddokothon-regular-pagination a, .khaddokothon-index-blog h2 a, .khaddokothon-index-blog .post-grid-meta a, 
		.khaddokothon-index-blog .post-list-meta a, .khaddokothon-search-page .post-grid-meta a, .khaddokothon-search-page .post-list-meta a, .khaddokothon-search-page h2 a,
		.khaddokothon-blog-item .khaddokothon-blog-tags ul li a, .khaddokothon-blog-item .khaddokothon-blog-categories ul li a, .khaddokothon-blog-item .khaddokothon-blog-share li a,
		.khaddokothon-post-nav a h4, .khaddokothon-post-nav a span, .khaddokothon-pagination-list a, .khaddokothon-author-box a, .comment-author a, .comment-date, .comment .reply a,
		ul li a, ol li a, table thead tr th, pre, .wp-block-button.is-style-outline a, table caption,
		.khaddokothon-blog-item .khaddokothon-page-breaks a, .khaddokothon-blog-item .khaddokothon-page-breaks>span, .screen-reader-text',

		'khaddokothon_theme_text_color_in_bg' => '.khaddokothon-theme-bg-dark, .khaddokothon-sec-title:after, .khaddokothon-hover-item .khaddokothon-hover-overlay, .khaddokothon-search-form .khaddokothon-btn,
		.khaddokothon-pagination-list .current',

		'khaddokothon_theme_text_color_in_border' => '.khaddokothon-img-frame:after, .khaddokothon-btn-transparent, .widget.widget_tag_cloud a, .khaddokothon-search-form .khaddokothon-search-field,
		.khaddokothon-search-form .khaddokothon-btn, #khaddokothon-featured-home .khaddokothon-featured-home-posts-nav [type=button], .khaddokothon-pagination-list .page-numbers, .comment .reply a,
		.wp-block-button.is-style-outline a, .khaddokothon-blog-item .khaddokothon-page-breaks a, .khaddokothon-blog-item .khaddokothon-page-breaks>span',

		'khaddokothon_theme_link_color' => 'a, .comment-edit-link',

		//Navigation Colors
		'khaddokothon_header_bg_color'            => '.khaddokothon-site-header, .header-transparent.sticked .main-header',
		'khaddokothon_header_menu_txt_color'      => '.main-navigation ul>li>a, .search-box .toggle_search i,
		.khaddokothon-site-header .site-title, .khaddokothon-site-header .site-description',

		'khaddokothon_menu_dropdown_bg_color'   => '.main-navigation ul ul',
		'khaddokothon_menu_drpdwn_border_color' => '.main-navigation ul li li a',
		'khaddokothon_menu_drpdwn_font_color'   => '.main-navigation ul li li a',

		'khaddokothon_menu_mobile_bg_color' => '.header_mobile .mlogo_wrapper, .header_mobile .mobile_nav',
		'khaddokothon_menu_toggle_btn_color' => '#mmenu_toggle button, #mmenu_toggle button:before, #mmenu_toggle button:after',
		'khaddokothon_mobile_menu_border_color' => '.header_mobile .mobile_nav .mobile_mainmenu li a',

		//Hero Colors
		'hero_heading_color'      => '#khaddokothon-hero-home h1',
		'hero_subheading_color'   => '#khaddokothon-hero-home p',

		//Hero Image
		'khaddokothon_hero_bg'      => '#khaddokothon-hero-home',

		//Footer Colors
		'khaddokothon_footer_bg_color'      => '#khaddokothon-site-footer.khaddokothon-theme-bg-dark',
		'khaddokothon_footer_text_color'    => '#khaddokothon-site-footer .khaddokothon-footer-copyright, #khaddokothon-site-footer .khaddokothon-footer-copyright p',
		'khaddokothon_footer_link_color'    => '#khaddokothon-site-footer .khaddokothon-footer-copyright a',

		'khaddokothon_footer_icon_bg_color' => '#khaddokothon-site-footer .khaddokothon-footer-social i',
		'khaddokothon_footer_icon_color'    => '#khaddokothon-site-footer .khaddokothon-footer-social i',

		'khaddokothon_footer_widget_elements_bg_color'         => '.khaddokothon-footer-widget .khaddokothon-sec-title:after, .khaddokothon-footer-widget .khaddokothon-search-form .khaddokothon-btn',
		'khaddokothon_footer_widget_elements_bg_hvr_color'     => '.khaddokothon-footer-widget .khaddokothon-search-form .khaddokothon-btn:hover',
		'khaddokothon_footer_widget_elements_link_color'       => '.khaddokothon-footer-widget ul li a, .khaddokothon-footer-widget #wp-calendar a, 
		.khaddokothon-footer-widget.widget_tag_cloud a, .khaddokothon-footer-widget .comment-author-link',
		'khaddokothon_footer_widget_elements_text_color'       => '.khaddokothon-footer-widget p, .khaddokothon-footer-widget h4, .khaddokothon-footer-widget #wp-calendar th,
		.khaddokothon-footer-widget #wp-calendar td, .khaddokothon-footer-widget ul li, .khaddokothon-footer-widget table caption',
		'khaddokothon_footer_widget_elements_border_color'     => '.khaddokothon-footer-widget th, .khaddokothon-footer-widget td,
		.khaddokothon-footer-widget #wp-calendar > tfoot > tr, .khaddokothon-footer-widget.widget_tag_cloud a, .khaddokothon-footer-widget .khaddokothon-search-field,
		.khaddokothon-footer-widget .khaddokothon-search-form .khaddokothon-btn, .khaddokothon-footer-widget table caption',
		'khaddokothon_footer_widget_elements_border_hvr_color' => '.khaddokothon-footer-widget .khaddokothon-search-form .khaddokothon-btn:hover',

		//Fonts
		'khaddokothon_heading_font'                            => 'h1, .h1, h2, .h2, h3, .h3, h4, .h4, h5, .h5, h6, .h6',

	);


	// Kirki
	Kirki::add_config( 'khaddokothon_config', array(
		'capability'  => 'edit_theme_options',
		'option_type' => 'theme_mod',
		'option_name' => 'khaddokothon_config'
	) );


	/**
	 * =================
	 * SECTIONS / PANELS
	 * =================
	 **/
	$priority = 20;

	// Preloader
	Kirki::add_section( 'khaddokothon_preloader', array(
		'title'       => esc_html__( 'Preloader', 'khaddokothon' ),
		'description' => esc_html__( 'Theme Preloader Options', 'khaddokothon' ),
		'priority'    => $priority++,
		'capability'  => 'edit_theme_options',
	) );


	/**
	 * Header Panel
	 **/
	Kirki::add_panel( 'khaddokothon_header', array(
		'title'    => esc_html__( 'Header Settings', 'khaddokothon' ),
		'priority' => $priority ++,
	) );

		// Genral
		Kirki::add_section( 'khaddokothon_header_general', array(
			'title'       => esc_html__( 'General', 'khaddokothon' ),
			'panel'      => 'khaddokothon_header',
			'capability' => 'edit_theme_options',
		) );

		// Overlay
		Kirki::add_section( 'khaddokothon_header_overlay', array(
			'title'       => esc_html__( 'Page Header Overlay', 'khaddokothon' ),
			'panel'      => 'khaddokothon_header',
			'capability' => 'edit_theme_options',
		) );


	/**
	 * Home Page PANEL
	**/
	Kirki::add_panel( 'khaddokothon_home_page', array(
		'title'           => esc_html__( 'Home Page Sections', 'khaddokothon' ),
		'priority'        => $priority ++,
		'active_callback' => function () {
			if ( is_page_template( 'page-templates/kk-home.php' ) ) {
				return true;
			}

			return false;
		}
	) );

		// Home Page Hero
		Kirki::add_section( 'khaddokothon_home_hero', array(
			'title'      => esc_html__( 'Hero Section', 'khaddokothon' ),
			'panel'      => 'khaddokothon_home_page',
			'capability' => 'edit_theme_options',
		) );

		// Featured Section
		Kirki::add_section( 'khaddokothon_home_featured', array(
			'title'      => esc_html__( 'Featured Section', 'khaddokothon' ),
			'panel'      => 'khaddokothon_home_page',
			'capability' => 'edit_theme_options',
		) );

		// Subscribe Section
		Kirki::add_section( 'khaddokothon_home_subscribe', array(
			'title'      => esc_html__( 'Subscribe Section', 'khaddokothon' ),
			'panel'      => 'khaddokothon_home_page',
			'capability' => 'edit_theme_options',
		) );

		// Regular Section
		Kirki::add_section( 'khaddokothon_home_regular', array(
			'title'      => esc_html__( 'Regular Section 2 column', 'khaddokothon' ),
			'panel'      => 'khaddokothon_home_page',
			'capability' => 'edit_theme_options',
		) );

		// Category Section
		Kirki::add_section( 'khaddokothon_home_cat', array(
			'title'      => esc_html__( 'Category Section 3 column', 'khaddokothon' ),
			'panel'      => 'khaddokothon_home_page',
			'capability' => 'edit_theme_options',
		) );


	/**
	 * Blog PANEL
	**/
	Kirki::add_panel( 'khaddokothon_blog', array(
		'title'    => esc_html__( 'Blog Settings', 'khaddokothon' ),
		'priority' => $priority ++,
	) );

		// Blog Single
		Kirki::add_section( 'khaddokothon_blog_single', array(
			'title'      => esc_html__( 'Blog Single Post Page', 'khaddokothon' ),
			'panel'      => 'khaddokothon_blog',
			'capability' => 'edit_theme_options',
		) );

		// Blog Index
		Kirki::add_section( 'khaddokothon_blog_index', array(
			'title'      => esc_html__( 'Blog Index Settings', 'khaddokothon' ),
			'panel'      => 'khaddokothon_blog',
			'capability' => 'edit_theme_options',
		) );

		// Blog Search
		Kirki::add_section( 'khaddokothon_blog_search', array(
			'title'      => esc_html__( 'Search Page Settings', 'khaddokothon' ),
			'panel'      => 'khaddokothon_blog',
			'capability' => 'edit_theme_options',
		) );


	/**
	 * Footer
	 **/
	Kirki::add_panel( 'khaddokothon_footer', array(
		'title'    => esc_html__( 'Footer Settings', 'khaddokothon' ),
		'priority' => $priority ++,
	) );

		// Footer Widgets
		Kirki::add_section( 'khaddokothon_footer_widgets', array(
			'title'      => esc_html__( 'Footer Widgets Area', 'khaddokothon' ),
			'panel'      => 'khaddokothon_footer',
			'capability' => 'edit_theme_options',
		) );

		// Footer Bottom
		Kirki::add_section( 'khaddokothon_footer_copy_social', array(
			'title'      => esc_html__( 'Footer Copyrights & Social', 'khaddokothon' ),
			'panel'      => 'khaddokothon_footer',
			'capability' => 'edit_theme_options',
		) );

		// Back to Top
		Kirki::add_section( 'khaddokothon_back_to_top', array(
			'title'      => esc_html__( 'Back to top', 'khaddokothon' ),
			'panel'      => 'khaddokothon_footer',
			'capability' => 'edit_theme_options',
		) );


	// Typography
	Kirki::add_section( 'khaddokothon_typography', array(
		'title'      => esc_html__( 'Typography Settings', 'khaddokothon' ),
		'priority'   => $priority ++,
		'capability' => 'edit_theme_options',
	) );

	// Color Section
	Kirki::add_section( 'khaddokothon_colors', array(
		'title'      => esc_html__( 'Theme Colors', 'khaddokothon' ),
		'priority'   => $priority ++,
		'capability' => 'edit_theme_options',
	) );

	// 404 Section
	Kirki::add_section( 'khaddokothon_404_page', array(
		'title'      => esc_html__( '404 Page Settings', 'khaddokothon' ),
		'priority'   => $priority ++,
		'capability' => 'edit_theme_options',
	) );


	/**
	 * =================
	 * CONTROLS
	 * =================
	 **/

	// Preloader Control
	Kirki::add_field( 'khaddokothon_config', array(
		'type'     => 'switch',
		'settings' => 'khaddokothon_preloader_display',
		'label'    => esc_html__( 'Enable/Disable Theme Preloader', 'khaddokothon' ),
		'section'  => 'khaddokothon_preloader',
		'default'  => 1,
		'choices'  => [
			'on'  => esc_attr__( 'On', 'khaddokothon' ),
			'off' => esc_attr__( 'Off', 'khaddokothon' ),
		],
	) );

	// Back to Top Control
	Kirki::add_field( 'khaddokothon_config', array(
		'type'     => 'switch',
		'settings' => 'khaddokothon_back_to_top_display',
		'label'    => esc_html__( 'Enable/Disable Back to Top', 'khaddokothon' ),
		'section'  => 'khaddokothon_back_to_top',
		'default'  => 1,
		'choices'  => [
			'on'  => esc_attr__( 'On', 'khaddokothon' ),
			'off' => esc_attr__( 'Off', 'khaddokothon' ),
		],
	) );


	/**
	 * Header Controls
	 **/

		//General Controls
		require khaddokothonTHEMEDIR . '/inc/customizer-controls/header-controls/header_general-controls.php';

		//Overlay Controls
		require khaddokothonTHEMEDIR . '/inc/customizer-controls/header-controls/overlay-controls.php';


	/**
	 * Home Page  Controls
	 **/

		//Hero Section Controls
		require khaddokothonTHEMEDIR . '/inc/customizer-controls/home-controls/hero-home-controls.php';

		//Featured Section Controls
		require khaddokothonTHEMEDIR . '/inc/customizer-controls/home-controls/featured-home-controls.php';

	    //Subscribe Section Controls
		require khaddokothonTHEMEDIR . '/inc/customizer-controls/home-controls/subscribe-home-controls.php';

		//Regular Section Controls
		require khaddokothonTHEMEDIR . '/inc/customizer-controls/home-controls/regular-home-controls.php';

		//Category Section Controls
		require khaddokothonTHEMEDIR . '/inc/customizer-controls/home-controls/cat-home-controls.php';


	/**
	 * Blog Page Controls
	 **/

		//Blog Single Controls
		require khaddokothonTHEMEDIR . '/inc/customizer-controls/blog-controls/blog-single-controls.php';

		//Blog Index Controls
		require khaddokothonTHEMEDIR . '/inc/customizer-controls/blog-controls/blog-index-controls.php';

		//Blog Search Controls
		require khaddokothonTHEMEDIR . '/inc/customizer-controls/blog-controls/blog-search-controls.php';


	/**
	 * Footer Controls
	 **/

		// Footer Widgets Controls
		require khaddokothonTHEMEDIR . '/inc/customizer-controls/footer-controls/footer-widgets-controls.php';

		//Footer Copyright & Social Controls
		require khaddokothonTHEMEDIR . '/inc/customizer-controls/footer-controls/footer-copy-social-controls.php';


	/**
	 * Typography Controls
	 **/
	require khaddokothonTHEMEDIR . '/inc/customizer-controls/common-controls/typography-controls.php';


	/**
	 * Color Controls
	 **/
	require khaddokothonTHEMEDIR . '/inc/customizer-controls/common-controls/color-controls.php';


	/**
	 * 404 Controls
	 **/
	require khaddokothonTHEMEDIR . '/inc/customizer-controls/common-controls/404-controls.php';


}// endif Kirki Check




// Enqueue Customizer Scripts and Styles
function khaddokothon_cust_enqueues() {
	wp_enqueue_style( 'khaddokothon-upgrade-css', khaddokothonTHEMEURI . '/inc/customizer-assets/upgrade.css' );
	wp_enqueue_script( 'khaddokothon-upgrade-js', khaddokothonTHEMEURI . '/inc/customizer-assets/upgrade.js', array( 'jquery' ), khaddokothon_VERSION, true );
}
add_action( 'customize_controls_enqueue_scripts', 'khaddokothon_cust_enqueues' );