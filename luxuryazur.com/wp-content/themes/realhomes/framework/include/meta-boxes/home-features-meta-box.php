<?php
if ( ! function_exists( 'rh_home_features_meta_boxes' ) ) :
	/**
	 * Contains home features' meta box declaration
	 *
	 * @param $meta_boxes
	 *
	 * @return array
	 */
	function rh_home_features_meta_boxes( $meta_boxes ) {

		if ( 'modern' === INSPIRY_DESIGN_VARIATION ) {

			$meta_boxes[] = array(
				'id'         => 'inspiry-home-meta-box',
				'title'      => __( 'Home Page Settings', 'framework' ),
				'post_types' => array( 'page' ),
				'context'    => 'normal',
				'priority'   => 'high',
				'show'       => array(
					'template' => array(
						'templates/home.php',
					),
				),
				'tabs'       => array(
					'inspiry_features_tab' => array(
						'label' => __( 'Features', 'framework' ),
						'icon'  => 'dashicons-admin-users',
					),
				),
				'tab_style'  => 'left',
				'fields'     => array(
					array(
						'id'      => 'inspiry_features',
						'type'    => 'group',
						'columns' => 12,
						'clone'   => true,
						'tab'     => 'inspiry_features_tab',
						'fields'  => array(
							array(
								'name'    => __( 'Feature Name', 'framework' ),
								'id'      => 'inspiry_feature_name',
								'desc'    => __( 'Example: Perfect Backend', 'framework' ),
								'type'    => 'text',
								'columns' => 6,
							),
							array(
								'name'    => __( 'Feature URL', 'framework' ),
								'id'      => 'inspiry_feature_link',
								'desc'    => __( 'Example: https://inspirythemes.com', 'framework' ),
								'type'    => 'text',
								'columns' => 6,
							),
							array(
								'name'             => __( 'Feature Icon', 'framework' ),
								'id'               => 'inspiry_feature_icon',
								'desc'             => __( 'Icon should have minimum width of 150px and minimum height of 150px.', 'framework' ),
								'type'             => 'image_advanced',
								'max_file_uploads' => 1,
								'columns'          => 6,
							),
							array(
								'name'    => __( 'Feature Description', 'framework' ),
								'id'      => 'inspiry_feature_desc',
								'type'    => 'textarea',
								'rows'    => 7,
								'cols'    => 60,
								'columns' => 6,
							),
						),
					),
				),
			);

		}

		return $meta_boxes;

	}

	add_filter( 'rwmb_meta_boxes', 'rh_home_features_meta_boxes' );

endif;