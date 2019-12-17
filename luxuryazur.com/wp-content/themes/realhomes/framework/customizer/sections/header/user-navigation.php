<?php
/**
 * Section:	`User Navigation`
 * Panel: 	`Header`
 *
 * @since 2.6.3
 */

if ( ! function_exists( 'inspiry_user_navigation_customizer' ) ) :

	/**
	 * inspiry_user_navigation_customizer.
	 *
	 * @param  WP_Customize_Manager $wp_customize
	 * @since  2.6.3
	 */

	function inspiry_user_navigation_customizer( WP_Customize_Manager $wp_customize ) {

		/**
		 * User Navigation
		 */
		$wp_customize->add_section( 'inspiry_header_user_nav', array(
			'title' => __( 'User Navigation', 'framework' ),
			'panel' => 'inspiry_header_panel',
		) );

		/* Show / Hide Header Navigation for Members */
		$wp_customize->add_setting( 'theme_enable_user_nav', array(
			'type' 		=> 'option',
			'default' 	=> 'true',
		) );
		$wp_customize->add_control( 'theme_enable_user_nav', array(
			'label' 	=> __( 'User Login and Register Links Display', 'framework' ),
			'type' 		=> 'radio',
			'section' 	=> 'inspiry_header_user_nav',
			'choices' 	=> array(
				'true' 	=> __( 'Show', 'framework' ),
				'false'	=> __( 'Hide', 'framework' ),
			)
		) );

		if ( class_exists( 'SitePress' ) ) {

			/* Enable / Disable WPML Language switcher */
			$wp_customize->add_setting( 'theme_wpml_lang_switcher', array(
				'type'    => 'option',
				'default' => 'true',
			) );
			$wp_customize->add_control( 'theme_wpml_lang_switcher', array(
				'label'   => __( 'WPML Language Switcher Display', 'framework' ),
				'type'    => 'radio',
				'section' => 'inspiry_header_user_nav',
				'choices' => array(
					'true'  => __( 'Show', 'framework' ),
					'false' => __( 'Hide', 'framework' ),
				),
			) );

			$wp_customize->add_setting( 'theme_switcher_language_display', array(
				'type'    => 'option',
				'default' => 'inspiry_name_and_flag',
			) );
			$wp_customize->add_control( 'theme_switcher_language_display', array(
				'label'   => __( 'Switcher Language Display Options', 'framework' ),
				'type'    => 'radio',
				'section' => 'inspiry_header_user_nav',
				'choices' => array(
					'language_name_and_flag' => __( 'Name and Flag', 'framework' ),
					'language_name_only' => __( 'Name Only', 'framework' ),
					'language_flag_only' => __( 'Flag Only ', 'framework' ),
				),
				'active_callback' => 'inspiry_wpml_language_switcher_callback'
			) );
		}
	}

	add_action( 'customize_register', 'inspiry_user_navigation_customizer' );
endif;


if ( ! function_exists( 'inspiry_user_navigation_defaults' ) ) :

	/**
	 * inspiry_user_navigation_defaults.
	 *
	 * @since  2.6.3
	 */

	function inspiry_user_navigation_defaults( WP_Customize_Manager $wp_customize ) {
		$user_navigation_settings_ids = array(
			'theme_enable_user_nav',
			'theme_wpml_lang_switcher',
			'theme_switcher_language_display'
		);
		inspiry_initialize_defaults( $wp_customize, $user_navigation_settings_ids );
	}
	add_action( 'customize_save_after', 'inspiry_user_navigation_defaults' );
endif;


if ( ! function_exists( 'inspiry_wpml_language_switcher_callback' ) ) :

	function inspiry_wpml_language_switcher_callback() {


		if ( 'true' === get_option( 'theme_wpml_lang_switcher', 'true' ) ) {

			return true;
		}

		return false;
	}
endif;