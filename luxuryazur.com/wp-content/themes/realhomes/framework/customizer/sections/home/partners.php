<?php
/**
 * Section: Partners
 *
 * Home partners section settings.
 *
 * @since 	3.0.0
 * @package RH
 */

if ( ! function_exists( 'inspiry_home_partners_customizer' ) ) :

	/**
	 * Function to register customizer options
	 * for home partners section
	 *
	 * @param object $wp_customize - Object of WP_Customize_Manager.
	 * @since 3.0.0
	 */
	function inspiry_home_partners_customizer( WP_Customize_Manager $wp_customize ) {

		/**
		 * Home Slogan Section
		 */
		$wp_customize->add_section( 'inspiry_home_partners', array(
			'title' => __( 'Partners', 'framework' ),
			'panel' => 'inspiry_home_panel',
		) );

		/* Show/Hide Testimonial on Homepage */
		$wp_customize->add_setting( 'inspiry_show_home_partners', array(
			'type' 		=> 'option',
			'default' 	=> 'true',
		) );
		$wp_customize->add_control( 'inspiry_show_home_partners', array(
			'label' 	=> __( 'Partners on Homepage', 'framework' ),
			'type' 		=> 'radio',
			'section' 	=> 'inspiry_home_partners',
			'choices' 	=> array(
				'true' 	=> __( 'Show', 'framework' ),
				'false' => __( 'Hide', 'framework' ),
			),
		) );

		/* Partners Section Text Over Title */
		$wp_customize->add_setting( 'inspiry_home_partners_sub_title', array(
			'type' 				=> 'option',
			'transport'			=> 'postMessage',
			'default'			=> __( 'Our', 'framework' ),
			'sanitize_callback'	=> 'sanitize_text_field',
		) );
		$wp_customize->add_control( 'inspiry_home_partners_sub_title', array(
			'label' 	=> __( 'Text Over Title', 'framework' ),
			'type' 		=> 'text',
			'section'	=> 'inspiry_home_partners',
		) );

		/* Partners Section Selective Refresh */
		if ( isset( $wp_customize->selective_refresh ) ) {
			$wp_customize->selective_refresh->add_partial( 'inspiry_home_partners_sub_title', array(
				'selector' 				=> '.home .rh_section__partners .rh_section__subtitle',
				'container_inclusive'	=> false,
				'render_callback' 		=> 'inspiry_home_partners_sub_title_render',
			) );
		}

		/* Partners Section Title */
		$wp_customize->add_setting( 'inspiry_home_partners_title', array(
			'type' 				=> 'option',
			'transport'			=> 'postMessage',
			'default'			=> __( 'Partners', 'framework' ),
			'sanitize_callback'	=> 'sanitize_text_field',
		) );
		$wp_customize->add_control( 'inspiry_home_partners_title', array(
			'label' 	=> __( 'Section Title', 'framework' ),
			'type' 		=> 'text',
			'section'	=> 'inspiry_home_partners',
		) );

		/* Partners Section Selective Refresh */
		if ( isset( $wp_customize->selective_refresh ) ) {
			$wp_customize->selective_refresh->add_partial( 'inspiry_home_partners_title', array(
				'selector' 				=> '.home .rh_section__partners .rh_section__title',
				'container_inclusive'	=> false,
				'render_callback' 		=> 'inspiry_home_partners_title_render',
			) );
		}

		/* Partners Section Description */
		$wp_customize->add_setting( 'inspiry_home_partners_desc', array(
			'type' 				=> 'option',
			'transport'			=> 'postMessage',
			'default'			=> __('Some amazing partners of Real Homes theme','framework'),
			'sanitize_callback' => 'wp_kses_data',
		) );
		$wp_customize->add_control( 'inspiry_home_partners_desc', array(
			'label' 	=> __( 'Section Description', 'framework' ),
			'type' 		=> 'textarea',
			'section' 	=> 'inspiry_home_partners',
		) );

		/* Features Section Selective Refresh */
		if ( isset( $wp_customize->selective_refresh ) ) {
			$wp_customize->selective_refresh->add_partial( 'inspiry_home_partners_desc', array(
				'selector' 				=> '.home .rh_section__partners .rh_section__desc',
				'container_inclusive'	=> false,
				'render_callback' 		=> 'inspiry_home_partners_desc_render',
			) );
		}

		/* Partners Section Variation */
		$wp_customize->add_setting( 'inpsiry_modern_partners_variation', array(
			'type'    => 'option',
			'default' => 'simple',
		) );
		$wp_customize->add_control( 'inpsiry_modern_partners_variation', array(
			'label' 	=> __( 'Partners Design Variation to Display', 'framework' ),
			'type' 		=> 'radio',
			'section' 	=> 'inspiry_home_partners',
			'choices' 	=> array(
				'simple'  	=> __( 'Simple', 'framework' ),
				'carousel'	=> __( 'Carousel', 'framework' ),
			),
		) );

	}

	add_action( 'customize_register', 'inspiry_home_partners_customizer' );
endif;

if ( ! function_exists( 'inspiry_home_partners_defaults' ) ) :

	/**
	 * inspiry_home_partners_defaults.
	 *
	 * @since  3.0.0
	 */
	function inspiry_home_partners_defaults( WP_Customize_Manager $wp_customize ) {
		$testimonial_settings_ids = array(
			'inspiry_show_home_partners',
			'inspiry_home_partners_title',
			'inspiry_home_partners_desc',
//			'inspiry_home_partners_title_span_color',
//			'inspiry_home_partners_title_color',
//			'inspiry_home_partners_desc_color',
		);
		inspiry_initialize_defaults( $wp_customize, $testimonial_settings_ids );
	}
	add_action( 'customize_save_after', 'inspiry_home_partners_defaults' );
endif;


if ( ! function_exists( 'inspiry_home_partners_sub_title_render' ) ) {
	function inspiry_home_partners_sub_title_render() {
		if ( get_option( 'inspiry_home_partners_sub_title' ) ) {
			echo esc_html( get_option( 'inspiry_home_partners_sub_title' ) );
		}
	}
}


if ( ! function_exists( 'inspiry_home_partners_title_render' ) ) {
	function inspiry_home_partners_title_render() {
		if ( get_option( 'inspiry_home_partners_title' ) ) {
			echo esc_html( get_option( 'inspiry_home_partners_title' ) );
		}
	}
}


if ( ! function_exists( 'inspiry_home_partners_desc_render' ) ) {
	function inspiry_home_partners_desc_render() {
		if ( get_option( 'inspiry_home_partners_desc' ) ) {
			echo get_option( 'inspiry_home_partners_desc' );
		}
	}
}
