<?php
/**
 * Class Easy Real Estate class to work as Elementor Extension
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class RHEA_Elementor_Extension {

	/**
	 * Minimum Required Version of Elementor Plugin
	 */
	const MINIMUM_ELEMENTOR_VERSION = '2.4.0';

	/**
	 * Minimum Required Version of PHP
	 */
	const MINIMUM_PHP_VERSION = '5.6';

	/**
	 * Plugin's singleton instance.
	 *
	 * @var RHEA_Elementor_Extension
	 */
	protected static $_instance;

	/**
	 * Provides singleton instance.
	 */
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}

		return self::$_instance;
	}

	/**
	 * Constructor function.
	 */
	public function __construct() {

		// Check if Elementor installed and activated
		if ( ! did_action( 'elementor/loaded' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_missing_main_plugin' ] );
			return;
		}

		// Check for required PHP version
		if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );
			return;
		}

		// Check for required Elementor version
		if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_elementor_version' ] );
			return;
		}

		// Register Widgets
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'init_elementor_widgets' ] );

		// Register Controls
		add_action( 'elementor/controls/controls_registered', [ $this, 'init_elementor_controls' ] );

		// Enqueue Widget Styles
		add_action( 'elementor/frontend/after_enqueue_styles', [ $this, 'enqueue_frontend_styles' ] );

		// Enqueue Widget Scripts
		add_action( 'elementor/frontend/after_enqueue_scripts', [ $this, 'enqueue_frontend_scripts' ] );

		// Register New Categories
		add_action( 'elementor/elements/categories_registered', [ $this, 'add_elementor_widget_categories' ] );

		// Register New Classic Categories
		add_action( 'elementor/elements/categories_registered', [ $this, 'add_elementor_widget_classic_categories' ] );

	}

	/**
	 * Include widgets files and register them
	 */
	public function init_elementor_widgets() {

		// Include helper files
		require_once( RHEA_PLUGIN_DIR . 'elementor/widgets/common/elementor-helper.php' );

		// Include Widget files
		require_once( RHEA_PLUGIN_DIR . 'elementor/widgets/section-title.php' );
		require_once( RHEA_PLUGIN_DIR . 'elementor/widgets/classic-slogan.php' );
		require_once( RHEA_PLUGIN_DIR . 'elementor/widgets/properties.php' );
		require_once( RHEA_PLUGIN_DIR . 'elementor/widgets/inspiry-properties-2.php' );
		require_once( RHEA_PLUGIN_DIR . 'elementor/widgets/inspiry-properties-3.php' );
		require_once( RHEA_PLUGIN_DIR . 'elementor/widgets/featured-properties.php' );
		require_once( RHEA_PLUGIN_DIR . 'elementor/widgets/featured-properties-2.php' );
		require_once( RHEA_PLUGIN_DIR . 'elementor/widgets/featured-properties-3.php' );
		require_once( RHEA_PLUGIN_DIR . 'elementor/widgets/agents.php' );
		require_once( RHEA_PLUGIN_DIR . 'elementor/widgets/news.php' );
		require_once( RHEA_PLUGIN_DIR . 'elementor/widgets/big-single-testimonial.php' );
		require_once( RHEA_PLUGIN_DIR . 'elementor/widgets/call-to-action.php' );
		require_once( RHEA_PLUGIN_DIR . 'elementor/widgets/call-to-action-2.php' );
		require_once( RHEA_PLUGIN_DIR . 'elementor/widgets/partners.php' );
		require_once( RHEA_PLUGIN_DIR . 'elementor/widgets/classic-properties.php' );
		require_once( RHEA_PLUGIN_DIR . 'elementor/widgets/classic-featured-properties.php' );
		require_once( RHEA_PLUGIN_DIR . 'elementor/widgets/classic-features-section.php' );
		require_once( RHEA_PLUGIN_DIR . 'elementor/widgets/classic-news.php' );

		// Register Widgets
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new RHEA_Section_Title_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new RHEA_Classic_Slogan_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new RHEA_Properties_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new RHEA_Properties_Widget_Two() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new RHEA_Properties_Widget_Three() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new RHEA_Featured_Properties_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new RHEA_Featured_Properties_Two_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new RHEA_Featured_Properties_Three_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new RHEA_Agents_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new RHEA_News_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new RHEA_Big_Testimonial_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new RHEA_CTA_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new RHEA_CTA_Two_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new RHEA_Partners_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new RHEA_Classic_Properties_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new RHEA_Classic_Featured_Properties_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new RHEA_Classic_Features_Section_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new RHEA_Classic_News_Section_Widget() );



	}

	/**
	 * Include controls files and register them
	 */
	public function init_elementor_controls() {

		// Include Control files
		require_once( RHEA_PLUGIN_DIR . 'elementor/controls/test-control.php' );

	}

	/**
	 * Add new category for RHEA widgets
	 */
	public function add_elementor_widget_categories( $elements_manager ) {
		$elements_manager->add_category(
			'real-homes',
			[
				'title' => esc_html__( 'Real Homes', 'realhomes-elementor-addon' ),
				'icon'  => 'fa fa-home',
			]
		);
	}

	/**
	 * Add new category for RHEA Classic widgets
	 */
	public function add_elementor_widget_classic_categories( $elements_manager ) {
		$elements_manager->add_category(
			'classic-real-homes',
			[
				'title' => esc_html__( 'Real Homes Classic', 'realhomes-elementor-addon' ),
				'icon'  => 'fa fa-home',
			]
		);
	}

	/**
	 * Register front end styles
	 */
	public function enqueue_frontend_styles() {
		wp_enqueue_style( 'ere-elementor-frontend', RHEA_PLUGIN_URL . 'elementor/css/frontend.css', array(), RHEA_VERSION, 'all' );
	}

	/**
	 * Register Frontend JavaScript
	 */
	public function enqueue_frontend_scripts() {
		wp_enqueue_script( 'ere-elementor-frontend', RHEA_PLUGIN_URL . 'elementor/js/frontend.js', array( 'jquery' ), RHEA_VERSION );
	}

	/**
	 * Warning when the site doesn't have Elementor installed or activated.
	 */
	public function admin_notice_missing_main_plugin() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'realhomes-elementor-addon' ),
			'<strong>' . esc_html__( 'RealHomes Elementor Addon', 'realhomes-elementor-addon' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'realhomes-elementor-addon' ) . '</strong>'
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	/**
	 * Warning when the site doesn't have a minimum required PHP version.
	 */
	public function admin_notice_minimum_php_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'realhomes-elementor-addon' ),
			'<strong>' . esc_html__( 'RealHomes Elementor Addon', 'realhomes-elementor-addon' ) . '</strong>',
			'<strong>' . esc_html__( 'PHP', 'realhomes-elementor-addon' ) . '</strong>',
			self::MINIMUM_PHP_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	/**
	 * Warning when the site doesn't have a minimum required Elementor version.
	 */
	public function admin_notice_minimum_elementor_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'realhomes-elementor-addon' ),
			'<strong>' . esc_html__( 'RealHomes Elementor Addon', 'realhomes-elementor-addon' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'realhomes-elementor-addon' ) . '</strong>',
			self::MINIMUM_ELEMENTOR_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

}


RHEA_Elementor_Extension::instance();