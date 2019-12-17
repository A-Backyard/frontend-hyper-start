<?php
/**
 * Google reCAPTCHA Settings
 */

if( !function_exists( 'inspiry_google_recaptcha_customizer' ) ) :
	function inspiry_google_recaptcha_customizer( WP_Customize_Manager $wp_customize ) {

		// Google reCAPTCHA Section
		$wp_customize->add_section( 'inspiry_google_recaptcha_section', array(
			'title'    => esc_html__( 'Google reCAPTCHA', 'framework' ),
			'priority' => 136,
		) );

		// Enable or Disable reCAPTCHA
		$wp_customize->add_setting( 'theme_show_reCAPTCHA', array(
			'type'    => 'option',
			'default' => 'false',
		) );
		$wp_customize->add_control( 'theme_show_reCAPTCHA', array(
			'label'       => __( 'Google reCAPTCHA', 'framework' ),
			'description' => __( 'For spam protection on agent forms and contact forms!', 'framework' ),
			'type'        => 'radio',
			'section'     => 'inspiry_google_recaptcha_section',
			'choices'     => array(
				'true'  => __( 'Enable', 'framework' ),
				'false' => __( 'Disable', 'framework' ),
			),
		) );

		// reCAPTCHA Public Key
		$wp_customize->add_setting( 'theme_recaptcha_public_key', array(
			'type'              => 'option',
			'sanitize_callback' => 'sanitize_text_field',
			'transport' => 'postMessage',
		) );
		$wp_customize->add_control( 'theme_recaptcha_public_key', array(
			'label'       => __( 'Site Key', 'framework' ),
			'description' => sprintf( __( 'You can reCAPTCHA public and private keys for your website by %s signing up here %s', 'framework' ),
				'<a href="https://www.google.com/recaptcha/admin#whyrecaptcha" target="_blank">',
				'</a>'
			),
			'type'        => 'text',
			'section'     => 'inspiry_google_recaptcha_section',
		) );

		// reCAPTCHA Private Key
		$wp_customize->add_setting( 'theme_recaptcha_private_key', array(
			'type'              => 'option',
			'sanitize_callback' => 'sanitize_text_field',
			'transport' => 'postMessage',
		) );
		$wp_customize->add_control( 'theme_recaptcha_private_key', array(
			'label'   => __( 'Secret Key', 'framework' ),
			'type'    => 'text',
			'section' => 'inspiry_google_recaptcha_section',
		) );

    }
endif;

add_action( 'customize_register', 'inspiry_google_recaptcha_customizer' );



if ( ! function_exists( 'inspiry_google_recaptcha_defaults' ) ) :
	function inspiry_google_recaptcha_defaults( WP_Customize_Manager $wp_customize ) {
		$google_recaptcha_settings_ids = array(
			'theme_show_reCAPTCHA',
		);
		inspiry_initialize_defaults( $wp_customize, $google_recaptcha_settings_ids );
	}
endif;

add_action( 'customize_save_after', 'inspiry_google_recaptcha_defaults' );
