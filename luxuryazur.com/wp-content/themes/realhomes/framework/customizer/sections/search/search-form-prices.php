<?php
/**
 * Section:	`Search Form Prices`
 * Panel: 	`Properties Search`
 *
 * @since 2.6.3
 */

if ( ! function_exists( 'inspiry_search_form_prices_customizer' ) ) :

	/**
	 * inspiry_search_form_prices_customizer.
	 *
	 * @param  WP_Customize_Manager $wp_customize
	 * @since  2.6.3
	 */
	function inspiry_search_form_prices_customizer( WP_Customize_Manager $wp_customize ) {

		/**
		 * Access the property-status terms via an Array
		 *
		 * @var array
		 */
		$statuses_array	= array();
		$status_terms 	= get_terms( 'property-status' );
		if ( ! empty( $status_terms ) ) {
			foreach ( $status_terms as $status_term ) {
				$statuses_array[ $status_term->slug ]	= $status_term->name;
			}
		}

		/**
		 * Search Form Min & Max Prices
		 */
		$wp_customize->add_section( 'inspiry_search_form_prices', array(
			'title' => __( 'Search Form Prices', 'framework' ),
			'panel' => 'inspiry_properties_search_panel',
		) );

		/* Min Price Label */
		$wp_customize->add_setting( 'inspiry_min_price_label', array(
			'type' 				=> 'option',
			'transport'			=> 'postMessage',
			'default' 			=> __( 'Min Price', 'framework' ),
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( 'inspiry_min_price_label', array(
			'label' 	=> __( 'Label for Min Price Field', 'framework' ),
			'type' 		=> 'text',
			'section' 	=> 'inspiry_search_form_prices',
		) );


		$wp_customize->add_setting( 'inspiry_min_price_placeholder', array(
			'type' 				=> 'option',
			'transport'			=> 'postMessage',
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( 'inspiry_min_price_placeholder', array(
			'label' 	=> __( 'Placeholder for Min Price Field', 'framework' ),
			'type' 		=> 'text',
			'section' 	=> 'inspiry_search_form_prices',
		) );

		/* Minimum Prices for Advance Search */
		$wp_customize->add_setting( 'theme_minimum_price_values', array(
			'type' 				=> 'option',
			'sanitize_callback' => 'sanitize_text_field',
			'default' 			=> "1000,5000,10000,50000,100000,200000,300000,400000,500000,600000,700000,800000,900000,1000000,1500000,2000000,2500000,5000000",
		) );
		$wp_customize->add_control( 'theme_minimum_price_values', array(
			'label' 		=> __( 'Minimum Prices List', 'framework' ),
			'description' 	=> __( 'Only provide comma separated numbers. Do not add decimal points, dashes, spaces and currency signs.', 'framework' ),
			'type' 			=> 'textarea',
			'section' 		=> 'inspiry_search_form_prices',
		) );

		/* Max Price Label */
		$wp_customize->add_setting( 'inspiry_max_price_label', array(
			'type' 				=> 'option',
			'transport'			=> 'postMessage',
			'default' 			=> __( 'Max Price', 'framework' ),
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( 'inspiry_max_price_label', array(
			'label' 	=> __( 'Label for Max Price Field', 'framework' ),
			'type' 		=> 'text',
			'section' 	=> 'inspiry_search_form_prices',
		) );

		$wp_customize->add_setting( 'inspiry_max_price_placeholder', array(
			'type' 				=> 'option',
			'transport'			=> 'postMessage',
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( 'inspiry_max_price_placeholder', array(
			'label' 	=> __( 'Placeholder for Max Price Field', 'framework' ),
			'type' 		=> 'text',
			'section' 	=> 'inspiry_search_form_prices',
		) );

		/* Maximum Prices for Advance Search */
		$wp_customize->add_setting( 'theme_maximum_price_values', array(
			'type' 				=> 'option',
			'sanitize_callback' => 'sanitize_text_field',
			'default' 			=> '5000,10000,50000,100000,200000,300000,400000,500000,600000,700000,800000,900000,1000000,1500000,2000000,2500000,5000000,10000000',
		) );
		$wp_customize->add_control( 'theme_maximum_price_values', array(
			'label' 		=> __( 'Maximum Prices List', 'framework' ),
			'description' 	=> __( 'Only provide comma separated numbers. Do not add decimal points, dashes, spaces and currency signs.', 'framework' ),
			'type' 			=> 'textarea',
			'section' 		=> 'inspiry_search_form_prices',
		) );

		/* Status For Rent */
		$wp_customize->add_setting( 'theme_status_for_rent', array(
			'type' 		=> 'option',
			'default' 	=> 'for-rent',
		) );
		$wp_customize->add_control( 'theme_status_for_rent', array(
			'label' 		=> __( 'Status That Represents Rent', 'framework' ),
			'description' 	=> __( 'Visitor expects smaller values for rent prices. So provide the list of minimum and maximum rent prices below. The rent prices will be displayed based on rent status selected here.', 'framework' ),
			'type' 			=> 'radio',
			'section' 		=> 'inspiry_search_form_prices',
			'choices' 		=> $statuses_array,
		) );

		/* Minimum Prices for Rent in Advance Search */
		$wp_customize->add_setting( 'theme_minimum_price_values_for_rent', array(
			'type' 				=> 'option',
			'sanitize_callback' => 'sanitize_text_field',
			'default' 			=> "500,1000,2000,3000,4000,5000,7500,10000,15000,20000,25000,30000,40000,50000,75000,100000",
		) );
		$wp_customize->add_control( 'theme_minimum_price_values_for_rent', array(
			'label' 		=> __( 'Minimum Prices List for Rent Only.','framework' ),
			'description' 	=> __( 'Only provide comma separated numbers. Do not add decimal points, dashes, spaces and currency signs.', 'framework' ),
			'type' 			=> 'textarea',
			'section' 		=> 'inspiry_search_form_prices',
		) );

		/* Maximum Prices for Rent in Advance Search */
		$wp_customize->add_setting( 'theme_maximum_price_values_for_rent', array(
			'type' 				=> 'option',
			'sanitize_callback' => 'sanitize_text_field',
			'default' 			=> '1000,2000,3000,4000,5000,7500,10000,15000,20000,25000,30000,40000,50000,75000,100000,150000',
		) );
		$wp_customize->add_control( 'theme_maximum_price_values_for_rent', array(
			'label' 		=> __( 'Maximum Prices List for Rent Only.', 'framework' ),
			'description' 	=> __( 'Only provide comma separated numbers. Do not add decimal points, dashes, spaces and currency signs.', 'framework' ),
			'type' 			=> 'textarea',
			'section' 		=> 'inspiry_search_form_prices',
		) );

	}

	add_action( 'customize_register', 'inspiry_search_form_prices_customizer' );
endif;


if ( ! function_exists( 'inspiry_search_form_prices_defaults' ) ) :

	/**
	 * inspiry_search_form_prices_defaults.
	 *
	 * @since  2.6.3
	 */
	function inspiry_search_form_prices_defaults( WP_Customize_Manager $wp_customize ) {
		$search_form_prices_settings_ids = array(
			'inspiry_min_price_label',
			'theme_minimum_price_values',
			'inspiry_max_price_label',
			'theme_maximum_price_values',
			'theme_status_for_rent',
			'theme_minimum_price_values_for_rent',
			'theme_maximum_price_values_for_rent',
		);
		inspiry_initialize_defaults( $wp_customize, $search_form_prices_settings_ids );
	}
	add_action( 'customize_save_after', 'inspiry_search_form_prices_defaults' );
endif;
