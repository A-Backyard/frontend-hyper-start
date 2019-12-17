<?php
/**
 * Maps Settings
 */

if( !function_exists( 'inspiry_maps_customizer' ) ) :
	function inspiry_maps_customizer( WP_Customize_Manager $wp_customize ) {

		// Maps settings section
		$wp_customize->add_section( 'inspiry_maps_section', array(
			'title'    => esc_html__( 'Maps', 'framework' ),
			'priority' => 135,
		) );

		$wp_customize->add_setting( 'inspiry_maps_note', array() );
		$wp_customize->add_control(
			new Inspiry_Intro_Customize_Control(
				$wp_customize,
				'inspiry_maps_note',
				array(
					'section'     => 'inspiry_maps_section',
					'label'       => esc_html__( 'Open Street Map:', 'framework' ),
					'description' => esc_html__( "By default, Open Street Map will be displayed if Google Maps API key is empty.", 'framework' ),
				)
			)
		);

		// Google Maps API Key
		$wp_customize->add_setting( 'inspiry_google_maps_api_key', array(
			'type'              => 'option',
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( 'inspiry_google_maps_api_key', array(
			'label'   => __( 'Google Maps API Key', 'framework' ),
			'type'    => 'text',
			'section' => 'inspiry_maps_section',
		) );

		// Google Maps Localization
		$wp_customize->add_setting( 'theme_map_localization', array(
			'type'    => 'option',
			'default' => 'true',
			'transport' => 'postMessage',
		) );
		$wp_customize->add_control( 'theme_map_localization', array(
			'label'   => __( 'Localize Google Maps', 'framework' ),
			'type'    => 'radio',
			'section' => 'inspiry_maps_section',
			'choices' => array(
				'true'  => __( 'Yes', 'framework' ),
				'false' => __( 'No', 'framework' ),
			),
		) );

    }
endif;

add_action( 'customize_register', 'inspiry_maps_customizer' );


if ( ! function_exists( 'inspiry_maps_defaults' ) ) :
	function inspiry_maps_defaults( WP_Customize_Manager $wp_customize ) {
		$map_settings_ids = array(
			'theme_map_localization',
		);
		inspiry_initialize_defaults( $wp_customize, $map_settings_ids );
	}
endif;

add_action( 'customize_save_after', 'inspiry_maps_defaults' );
