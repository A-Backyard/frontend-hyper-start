<?php
/**
 * Admin Menu Class
 *
 * Class file for admin menu of Real Homes.
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'RH_Admin_Menu' ) ) :

	class RH_Admin_Menu {

		public static $_instance;

		public function __construct() {
			// Admin menu.
			add_action( 'admin_menu', array( $this, 'real_homes_menu' ) );

			// Current menu when clicked on a tab.
			add_action( 'admin_footer', array( $this, 'open_menu' ) );

			if ( class_exists( 'OCDI_Plugin' ) ) {
				// Add demo import page to Real Homes Menu.
				add_filter( 'pt-ocdi/plugin_page_setup', array( $this, 'move_import_demo_data' ), 10, 1 );
			}

			add_action( 'admin_menu', array( $this, 're_arrange_menu' ) );
		}

		public static function instance() {
			if ( is_null( self::$_instance ) ) {
				self::$_instance = new self();
			}
			return self::$_instance;
		}


		public function real_homes_menu() {

			add_menu_page(
				__( 'Real Homes', 'framework' ),
				__( 'Real Homes', 'framework' ),
				'manage_options',
				'real_homes',
				'',
				get_template_directory_uri() . '/framework/include/admin/rh-menu-icon.svg',
				'5'
			);



			// Add all sub menus.
			$sub_menus = [];

			$sub_menus['design'] = array(
				'real_homes',
				__( 'Design', 'framework' ),
				__( 'Design', 'framework' ),
				'manage_options',
				'admin.php?page=inspiry-real-homes-design',
			);

			// Filter $_SERVER array.
			$server_array = filter_input_array( INPUT_SERVER );
			$sub_menus['settings'] = array(
				'real_homes',
				__( 'Customize Settings', 'framework' ),
				__( 'Customize Settings', 'framework' ),
				'manage_options',
				add_query_arg( 'return', rawurlencode( remove_query_arg( wp_removable_query_args(), wp_unslash( $server_array['REQUEST_URI'] ) ) ), 'customize.php' ),
			);

			// Add demo page if one click demo import plugin exists.
			if ( class_exists( 'OCDI_Plugin' ) ) {
				// Add demo import page.
				$sub_menus['demoimport'] = array(
					'real_homes',
					__( 'Demo Import', 'framework' ),
					__( 'Demo Import', 'framework' ),
					'manage_options',
					'admin.php?page=pt-one-click-demo-import',
				);
			}

			// Third-party can add more sub_menus.
			$sub_menus = apply_filters( 'real_homes_sub_menus', $sub_menus, 20 );

			if ( $sub_menus ) {
				foreach ( $sub_menus as $sub_menu ) {
					call_user_func_array( 'add_submenu_page', $sub_menu );
				}
			}

		}

		/**
		 * Remove first empty sub menu entry
		 */
		public function re_arrange_menu() {
			global $submenu;
			unset( $submenu['real_homes'][0] );
		}

		/**
		 * Method: Move Import Demo Data page to Real Homes menu.
		 *
		 * @param array $args - Array of arguments from OneClickDemoImport filter.
		 *
		 * @since 3.3.1
		 * @return array
		 */
		public function move_import_demo_data( $args ) {

			// Check the args.
			if ( empty( $args ) || ! is_array( $args ) ) {
				return $args;
			}

			$args = array(
				'parent_slug' => 'edit.php?post_type=property',
				'page_title'  => esc_html__( 'One Click Demo Import', 'framework' ),
				'menu_title'  => esc_html__( 'Demo Import', 'framework' ),
				'capability'  => 'import',
				'menu_slug'   => 'pt-one-click-demo-import',
			);

			return $args;

		}

		/**
		 * WP menu open.
		 *
		 * Open Real Homes menu when clicked on a tab.
		 *
		 * @since 1.0.0
		 */
		public function open_menu() {
			// Get Current Screen.
			$screen    = get_current_screen();

			$menu_list = array(
				'admin_page_pt-one-click-demo-import',
				'admin_page_inspiry-real-homes-design',
			);

			$menu_arr        = apply_filters( 'real_homes_open_menus_slugs', $menu_list );

			// Check if the current screen's ID has any of the above menu array items.
			if ( in_array( $screen->id, $menu_arr ) ) {

				// Filter $_GET array for security.
				$get_array = filter_input_array( INPUT_GET );
				$current_menu = '';

				if ( isset( $get_array['page'] ) && ( 'inspiry-real-homes-design' === $get_array['page'] ) ) {
					$current_menu = 'page=inspiry-real-homes-design';
				}

				if ( isset( $get_array['page'] ) && ( 'pt-one-click-demo-import' === $get_array['page'] ) ) {
					$current_menu = 'page=pt-one-click-demo-import';
				}

				if ( isset( $get_array['page'] ) && ( 'rvr-settings' === $get_array['page'] ) ) {
					$current_menu = 'page=rvr-settings';
				}

				if ( !empty( $current_menu ) ) {
					?>
					<script type="text/javascript">
						jQuery( "body" ).removeClass( "sticky-menu" );
						jQuery( "#toplevel_page_real_homes" ).addClass( 'wp-has-current-submenu wp-menu-open' ).removeClass( 'wp-not-current-submenu' );
						jQuery( "#toplevel_page_real_homes > a" ).addClass( 'wp-has-current-submenu wp-menu-open' ).removeClass( 'wp-not-current-submenu' );
						$( document ).ready( function() {
							if( '<?php echo esc_html( $current_menu ); ?>' ) {
								const anchors = $( '#toplevel_page_real_homes ul' ).find( 'li' ).children( 'a' );
								anchors.each( function() {
									if( this.href.indexOf( '<?php echo esc_html( $current_menu ); ?>' ) >= 0 ) {
										$( this ).parent( 'li' ).addClass( "current" );
									}
								} );
							}
						} );
					</script>
					<?php
				}
			}
		}

	}

endif;


/**
 * Initialize admin menu class.
 *
 * @since 3.3.1
 */
function inspiry_admin_menu() {
	return RH_Admin_Menu::instance();
}

inspiry_admin_menu();
