<?php
/**
 * Misc Customizer Settings
 *
 * @package RH
 */

if ( ! function_exists( 'inspiry_misc_customizer' ) ) :
	function inspiry_misc_customizer( WP_Customize_Manager $wp_customize ) {

		/**
		 * Create a pages array named $inspiry_pages, This array can be used at multiple places
		 */
		// todo: look into optimising this code
		$inspiry_pages = array( 0 => esc_html__( 'None', 'framework' ) );
		$raw_pages     = get_pages();
		if ( 0 < count( $raw_pages ) ) {
			foreach ( $raw_pages as $single_page ) {
				$inspiry_pages[ $single_page->ID ] = $single_page->post_title;
			}
		}
		
		/**
		 * Misc Section
		 */
		$wp_customize->add_section( 'inspiry_misc_section', array(
			'title'    => __( 'Misc', 'framework' ),
			'priority' => 137,
		) );


		if ( 'modern' === INSPIRY_DESIGN_VARIATION ) {
			/* Change 'View Property' across the theme */
			$wp_customize->add_setting( 'inspiry_property_detail_page_link_text', array(
				'type' 				=> 'option',
				'transport'			=> 'postMessage',
				'default'			=> esc_html__( 'View Property', 'framework' ),
				'sanitize_callback'	=> 'sanitize_text_field',
			) );
			$wp_customize->add_control( 'inspiry_property_detail_page_link_text', array(
				'label' 	        => __( 'Property Detail Page Link Text', 'framework' ),
				'description'       => __( 'You can change "View Property" button text ( appears on hovering over property card image ) with any other text across the theme here.', 'framework' ),
				'type' 		        => 'text',
				'section'           => 'inspiry_misc_section',
			) );
		}

		if ( 'classic' === INSPIRY_DESIGN_VARIATION ) {
			/* Change 'Know More' across theme */
			$wp_customize->add_setting( 'inspiry_string_know_more', array(
				'type'              => 'option',
				'default'           => __( 'Know More', 'framework' ),
				'sanitize_callback' => 'sanitize_text_field',
			) );
			$wp_customize->add_control( 'inspiry_string_know_more', array(
				'label'       => __( 'Replace "Know More" Button Text', 'framework' ),
				'description' => __( 'You can change "Know More" button text with any other text across the theme here', 'framework' ),
				'type'        => 'text',
				'section'     => 'inspiry_misc_section',
			) );
		}

		/* Light Box Plugin */
		$wp_customize->add_setting( 'theme_lightbox_plugin', array(
			'type'    => 'option',
			'default' => 'venobox',
		) );
		$wp_customize->add_control( 'theme_lightbox_plugin', array(
			'label'       => __( 'Lightbox Plugin', 'framework' ),
			'description' => __( 'Select the lightbox plugin that you want to use', 'framework' ),
			'type'        => 'select',
			'section'     => 'inspiry_misc_section',
			'choices'     => array(
				'venobox'      => __( 'VenoBox Plugin', 'framework' ),
				'swipebox'     => __( 'Swipebox Plugin', 'framework' ),
				'pretty-photo' => __( 'Pretty Photo Plugin', 'framework' ),
			),
		) );

		/* Optimise JS */
		$wp_customize->add_setting( 'inspiry_optimise_js', array(
			'type'    => 'option',
			'default' => 'true',
			'transport' => 'postMessage',
		) );
		$wp_customize->add_control( 'inspiry_optimise_js', array(
			'label'       => __( 'Optimise Scripts to Improve Performance', 'framework' ),
			'description' => __( 'Enabling this will reduce the number of scripts included on a page.', 'framework' ),
			'type'        => 'radio',
			'section'     => 'inspiry_misc_section',
			'choices'     => array(
				'true'  => __( 'Yes', 'framework' ),
				'false' => __( 'No', 'framework' ),
			),
		) );
		
		/* Optimise JS */
		$wp_customize->add_setting( 'inspiry_optimise_css', array(
			'type'    => 'option',
			'default' => 'true',
			'transport' => 'postMessage',
		) );
		$wp_customize->add_control( 'inspiry_optimise_css', array(
			'label'       => __( 'Optimise Styles to Improve Performance', 'framework' ),
			'description' => __( 'Enabling this will include compressed version of few big css files.', 'framework' ),
			'type'        => 'radio',
			'section'     => 'inspiry_misc_section',
			'choices'     => array(
				'true'  => __( 'Yes', 'framework' ),
				'false' => __( 'No', 'framework' ),
			),
		) );
		
	}
	
	add_action( 'customize_register', 'inspiry_misc_customizer' );
endif;


if ( ! function_exists( 'inspiry_misc_defaults' ) ) :
	/**
	 * Set default values for misc settings
	 *
	 * @param WP_Customize_Manager $wp_customize
	 */
	function inspiry_misc_defaults( WP_Customize_Manager $wp_customize ) {
		$misc_settings_ids = array(
			'theme_lightbox_plugin',
			'inspiry_optimise_js',
			'inspiry_optimise_css',
		);
		inspiry_initialize_defaults( $wp_customize, $misc_settings_ids );
	}
	
	add_action( 'customize_save_after', 'inspiry_misc_defaults' );
endif;
