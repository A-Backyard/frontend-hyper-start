<?php
if ( ! function_exists( 'rh_banner_meta_boxes' ) ) :
	/**
	 * Contains banner's meta box declaration
	 *
	 * @param $meta_boxes
	 *
	 * @return array
	 */
	function rh_banner_meta_boxes( $meta_boxes ) {

		if ( 'classic' === INSPIRY_DESIGN_VARIATION ) {

			$meta_boxes[] = array(
				'id'         => 'banner-meta-box',
				'title'      => esc_html__( 'Top Banner Area Settings', 'framework' ),
				'post_types' => array( 'page', 'agent', 'agency' ),
				'context'    => 'normal',
				'priority'   => 'low',
				'fields'     => array(
					array(
						'name' => esc_html__( 'Banner Title', 'framework' ),
						'id'   => "REAL_HOMES_banner_title",
						'desc' => esc_html__( 'Please provide the Banner Title, Otherwise the Page Title will be displayed in its place.', 'framework' ),
						'type' => 'text',
					),
					array(
						'name' => esc_html__( 'Banner Sub Title', 'framework' ),
						'id'   => "REAL_HOMES_banner_sub_title",
						'desc' => esc_html__( 'Please provide the Banner Sub Title.', 'framework' ),
						'type' => 'textarea',
						'cols' => '20',
						'rows' => '2',
					),
					array(
						'name'             => esc_html__( 'Banner Image', 'framework' ),
						'id'               => "REAL_HOMES_page_banner_image",
						'desc'             => esc_html__( 'Please upload the Banner Image. Otherwise the default banner image from theme options will be displayed.', 'framework' ),
						'type'             => 'image_advanced',
						'max_file_uploads' => 1,
					),
					array(
						'name' => esc_html__( 'Revolution Slider Alias', 'framework' ),
						'id'   => "REAL_HOMES_rev_slider_alias",
						'desc' => esc_html__( 'If you want to replace banner with revolution slider then provide its alias here.', 'framework' ),
						'type' => 'text',
					),
				),
			);

		} elseif ( 'modern' === INSPIRY_DESIGN_VARIATION ) {

			$meta_boxes[] = array(
				'id'         => 'banner-meta-box',
				'title'      => esc_html__( 'Top Banner Area Settings', 'framework' ),
				'post_types' => array( 'page', 'agent', 'agency' ),
				'context'    => 'normal',
				'priority'   => 'low',
				'fields'     => array(
					array(
						'name' => esc_html__( 'Banner Title', 'framework' ),
						'id'   => "REAL_HOMES_banner_title",
						'desc' => esc_html__( 'Please provide the Banner Title, Otherwise the Page Title will be displayed in its place.', 'framework' ),
						'type' => 'text',
					),
					array(
						'name'             => esc_html__( 'Banner Image', 'framework' ),
						'id'               => "REAL_HOMES_page_banner_image",
						'desc'             => esc_html__( 'Please upload the Banner Image. Otherwise the default banner image from theme options will be displayed.', 'framework' ),
						'type'             => 'image_advanced',
						'max_file_uploads' => 1,
					),
					array(
						'name' => esc_html__( 'Revolution Slider Alias', 'framework' ),
						'id'   => "REAL_HOMES_rev_slider_alias",
						'desc' => esc_html__( 'If you want to replace banner with revolution slider then provide its alias here.', 'framework' ),
						'type' => 'text',
					),
				),
			);

		}

		// Apply a filter before returning meta boxes.
		$meta_boxes = apply_filters( 'framework_theme_meta', $meta_boxes );

		return $meta_boxes;

	}

	add_filter( 'rwmb_meta_boxes', 'rh_banner_meta_boxes' );

endif;