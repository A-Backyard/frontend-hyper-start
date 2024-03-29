<?php
/**
 * Section:	`Contact Information`
 * Panel: 	`Header`
 *
 * @since 2.6.3
 */

if ( ! function_exists( 'inspiry_contact_information_customizer' ) ) :

	/**
	 * inspiry_contact_information_customizer.
	 *
	 * @param  WP_Customize_Manager $wp_customize
	 * @since  2.6.3
	 */

	function inspiry_contact_information_customizer( WP_Customize_Manager $wp_customize ) {

		/**
		 * Header Contact Information Section
		 */
		$wp_customize->add_section( 'inspiry_header_contact_info', array(
			'title' => __( 'Contact Information', 'framework' ),
			'panel' => 'inspiry_header_panel',
		) );

			/* Header Email */
			$wp_customize->add_setting( 'theme_header_email', array(
				'type' 				=> 'option',
				'transport'			=> 'postMessage',
				'sanitize_callback' => 'sanitize_email',
			) );
			$wp_customize->add_control( 'theme_header_email', array(
				'label' 	=> __( 'Email Address', 'framework' ),
				'type' 		=> 'email',
				'section' 	=> 'inspiry_header_contact_info',
			) );

			/* Header Email Selective Refresh */
			if ( isset( $wp_customize->selective_refresh ) ) {
				$wp_customize->selective_refresh->add_partial( 'theme_header_email', array(
					'selector' 				=> '#contact-email',
					'container_inclusive'	=> false,
					'render_callback' 		=> 'inspiry_header_email_render'
				) );
			}

		/* Header Phone Number */
		$wp_customize->add_setting( 'theme_header_phone', array(
			'type' 				=> 'option',
			'transport'			=> 'postMessage',
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( 'theme_header_phone', array(
			'label' 	=> __( 'Phone Number', 'framework' ),
			'type' 		=> 'tel',
			'section' 	=> 'inspiry_header_contact_info',
		) );

		/* Header Email Selective Refresh */
		if ( isset( $wp_customize->selective_refresh ) ) {
			$wp_customize->selective_refresh->add_partial( 'theme_header_phone', array(
				'selector' 				=> '.contact-number',
				'container_inclusive'	=> false,
				'render_callback' 		=> 'inspiry_header_phone_render'
			) );
		}

		/* Header Phone Number Icon */
		$wp_customize->add_setting( 'theme_header_phone_icon', array(
			'type' 		=> 'option',
			'default' 	=> 'phone',
		) );
		$wp_customize->add_control( 'theme_header_phone_icon', array(
			'label' 	=> __( 'Phone Number Icon ', 'framework' ),
			'type' 		=> 'radio',
			'section' 	=> 'inspiry_header_contact_info',
			'choices' 	=> array(
				'phone' 	=> 'Phone',
				'whatsapp'	=> 'WhatsApp',
			),
		) );
	}

	add_action( 'customize_register', 'inspiry_contact_information_customizer' );
endif;


if ( ! function_exists( 'inspiry_header_email_render' ) ) {
	function inspiry_header_email_render() {
		if ( get_option( 'theme_header_email' ) ) {
			$header_email 	= get_option( 'theme_header_email' );
			include( INSPIRY_THEME_DIR . '/images/icon-mail.svg' );
			echo '<a href="mailto:' . antispambot( $header_email ) . '">' . antispambot( $header_email ) . '</a>';
		}
	}
}


if ( ! function_exists( 'inspiry_header_phone_render' ) ) {
	function inspiry_header_phone_render() {
		if ( get_option( 'theme_header_phone' ) && ( 'classic' === INSPIRY_DESIGN_VARIATION ) ) {
			$header_phone 		= get_option( 'theme_header_phone' );
			$header_phone_icon  = get_option( 'theme_header_phone_icon', 'phone' );
			$desktop_version	= '<span class="desktop-version">' . $header_phone . '</span>';
    		$mobile_version 	= '<a class="mobile-version" href="tel://' . $header_phone . '" title="' . esc_attr( 'Make a Call', 'framework' ) . '">' . $header_phone . '</a>';
    		echo '<i class="fa fa-' . esc_attr( $header_phone_icon ) . '"></i>'.  $desktop_version . $mobile_version .  '<span class="outer-strip"></span>';
		} elseif ( get_option( 'theme_header_phone' ) && ( 'modern' === INSPIRY_DESIGN_VARIATION ) ) {
			echo esc_html( get_option( 'theme_header_phone' ) );
		}
	}
}

