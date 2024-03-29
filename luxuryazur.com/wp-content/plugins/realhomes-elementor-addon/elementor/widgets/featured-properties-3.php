<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class RHEA_Featured_Properties_Three_Widget extends \Elementor\Widget_Base {
	public function get_name() {
		return 'ere-featured-properties-three-widget';
	}

	public function get_title() {
		return esc_html__( 'Featured Properties Three Carousel', 'realhomes-elementor-addon' );
	}

	public function get_icon() {
		return 'eicon-post-slider';
	}

	public function get_categories() {
		return [ 'real-homes' ];
	}

	protected function _register_controls() {
		$allowed_html = array(
			'a'      => array(
				'href'  => array(),
				'title' => array()
			),
			'br'     => array(),
			'em'     => array(),
			'strong' => array(),
		);
		$this->start_controls_section(
			'ere_featured_properties_2_section',
			[
				'label' => esc_html__( 'Featured Properties Three Carousel', 'realhomes-elementor-addon' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'number_of_properties',
			[
				'label'   => esc_html__( 'Number of Properties', 'realhomes-elementor-addon' ),
				'type'    => \Elementor\Controls_Manager::NUMBER,
				'min'     => 1,
				'max'     => 50,
				'step'    => 1,
				'default' => 5,
			]
		);

		$this->add_control(
			'featured_excerpt_length',
			[
				'label'   => esc_html__( 'Excerpt Length (Words)', 'realhomes-elementor-addon' ),
				'type'    => \Elementor\Controls_Manager::NUMBER,
				'min'     => 5,
				'max'     => 100,
				'default' => 15,
			]
		);

		$this->add_control(
			'show_address',
			[
				'label'        => esc_html__( 'Show Address', 'realhomes-elementor-addon' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Yes', 'realhomes-elementor-addon' ),
				'label_off'    => esc_html__( 'No', 'realhomes-elementor-addon' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			]
		);

		$this->add_control(
			'show_excerpt',
			[
				'label'        => esc_html__( 'Show Excerpt', 'realhomes-elementor-addon' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Yes', 'realhomes-elementor-addon' ),
				'label_off'    => esc_html__( 'No', 'realhomes-elementor-addon' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			]
		);


		$this->add_control(
			'show_meta',
			[
				'label'        => esc_html__( 'Show Property Meta', 'realhomes-elementor-addon' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Yes', 'realhomes-elementor-addon' ),
				'label_off'    => esc_html__( 'No', 'realhomes-elementor-addon' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			]
		);



		$this->add_control(
			'ere_enable_fav_properties',
			[
				'label'        => esc_html__( 'Show Add To Favourite Button', 'realhomes-elementor-addon' ),
				'description'  => wp_kses( __( '<strong>Important:</strong> Make sure to select <strong>Show</strong> in Customizer <strong>Favorites</strong> settings. ', 'realhomes-elementor-addon' ), $allowed_html ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Yes', 'realhomes-elementor-addon' ),
				'label_off'    => esc_html__( 'No', 'realhomes-elementor-addon' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			]
		);

		$this->add_control(
			'ere_enable_compare_properties',
			[
				'label'        => esc_html__( 'Show Add To Compare Button  ', 'realhomes-elementor-addon' ),
				'description'  => wp_kses( __( '<strong>Important:</strong> Make sure <strong>Compare Properties</strong> is <strong>enabled</strong> in Customizer settings. ', 'realhomes-elementor-addon' ), $allowed_html ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Yes', 'realhomes-elementor-addon' ),
				'label_off'    => esc_html__( 'No', 'realhomes-elementor-addon' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			]
		);

		$this->add_control(
			'show_agent',
			[
				'label'        => esc_html__( 'Show Agent', 'realhomes-elementor-addon' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Yes', 'realhomes-elementor-addon' ),
				'label_off'    => esc_html__( 'No', 'realhomes-elementor-addon' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			]
		);


		$this->end_controls_section();

		$this->start_controls_section(
			'ere_featured_typo_section',
			[
				'label' => esc_html__( 'Typography', 'realhomes-elementor-addon' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'property_heading_typography',
				'label'    => esc_html__( 'Heading', 'realhomes-elementor-addon' ),
				'scheme'   => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .rhea_fp_slide_info h3.rhea_fp2_title',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'property_address_typography',
				'label'    => esc_html__( 'Address', 'realhomes-elementor-addon' ),
				'scheme'   => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .rhea_fp_address .rhea_address_text',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'property_excerpt_typography',
				'label'    => esc_html__( 'Excerpt', 'realhomes-elementor-addon' ),
				'scheme'   => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .rhea_fp_slide_info_inner .rhea_fp_excerpt',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'property_label_typography',
				'label'    => esc_html__( 'Meta Label', 'realhomes-elementor-addon' ),
				'scheme'   => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .rh_prop_card_meta_wrap_stylish .rh_prop_card__meta .rhea_meta_titles',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'property_figure_typography',
				'label'    => esc_html__( 'Figure', 'realhomes-elementor-addon' ),
				'scheme'   => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .rh_prop_card_meta_wrap_stylish .rh_prop_card__meta .figure',
			]
		);


		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'property_area_postfix_typography',
				'label'    => esc_html__( 'Area Post Fox', 'realhomes-elementor-addon' ),
				'scheme'   => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .rh_prop_card_meta_wrap_stylish .rh_prop_card__meta .label',
			]
		);


		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'property_status_typography',
				'label'    => esc_html__( 'Status', 'realhomes-elementor-addon' ),
				'scheme'   => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .rhea_fp_price_status .rhea_fp_status',
			]
		);


		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'property_price_typography',
				'label'    => esc_html__( 'Price', 'realhomes-elementor-addon' ),
				'scheme'   => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .rhea_fp_price_status .rhea_fp_price',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'property_agent_typography',
				'label'    => esc_html__( 'Agent', 'realhomes-elementor-addon' ),
				'scheme'   => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .rhea_fp_agent_expand_wrapper .rhea_agent_agency .rh_property_agent__title',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'property_agency_typography',
				'label'    => esc_html__( 'Agency', 'realhomes-elementor-addon' ),
				'scheme'   => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .rhea_fp_agent_expand_wrapper .rhea_agent_agency .rh_property_agent__agency',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'ere_featured_properties_labels',
			[
				'label' => esc_html__( 'Property Meta Labels', 'realhomes-elementor-addon' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'ere_property_bedrooms_label',
			[
				'label' => esc_html__( 'Bedrooms', 'realhomes-elementor-addon' ),
				'type'  => \Elementor\Controls_Manager::TEXT,
			]
		);
		$this->add_control(
			'ere_property_bathrooms_label',
			[
				'label' => esc_html__( 'Bathrooms', 'realhomes-elementor-addon' ),
				'type'  => \Elementor\Controls_Manager::TEXT,
			]
		);
		$this->add_control(
			'ere_property_area_label',
			[
				'label' => esc_html__( 'Area', 'realhomes-elementor-addon' ),
				'type'  => \Elementor\Controls_Manager::TEXT,
			]
		);

		$this->add_control(
			'ere_property_fav_label',
			[
				'label'   => esc_html__( 'Add To Favourite', 'realhomes-elementor-addon' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Add To Favourite', 'realhomes-elementor-addon' ),
			]
		);
		$this->add_control(
			'ere_property_fav_added_label',
			[
				'label'   => esc_html__( 'Added To Favourite', 'realhomes-elementor-addon' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Added To Favourite', 'realhomes-elementor-addon' ),
			]
		);

		$this->add_control(
			'ere_property_compare_label',
			[
				'label'   => esc_html__( 'Add To Compare', 'realhomes-elementor-addon' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Add To Compare', 'realhomes-elementor-addon' ),
			]
		);
		$this->add_control(
			'ere_property_compare_added_label',
			[
				'label'   => esc_html__( 'Added To Compare', 'realhomes-elementor-addon' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Added To Compare', 'realhomes-elementor-addon' ),
			]
		);


		$this->end_controls_section();

		$this->start_controls_section(
			'ere_feature_properties_sizes',
			[
				'label' => esc_html__( 'Sizes', 'realhomes-elementor-addon' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'ere_content_position',
			[
				'label' => esc_html__( 'Content Position', 'realhomes-elementor-addon' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'absolute',
				'tablet_default' => 'relative',
				'mobile_default' => 'relative',
				'options' => [
					'absolute' => esc_html__( 'Over Image', 'realhomes-elementor-addon' ),
					'relative' => esc_html__( 'Bottom', 'realhomes-elementor-addon' ),
				],
				'prefix_class' => 'elementor-content-%s',
				'frontend_available' => true,
				'selectors' => [
					'{{WRAPPER}} .rhea_fp_slide_info' => 'position: {{SIZE}} ',
				],
			]
		);

		$this->add_responsive_control(
			'ere_content_align',
			[
				'label' => esc_html__( 'Content Align', 'realhomes-elementor-addon' ),
				'description' => esc_html('Note: These options will work opposite in RTL languages'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '',
				'tablet_default' => 'center',
				'mobile_default' => 'center',
				'options' => [
					'flex-start' => esc_html__( 'Left', 'realhomes-elementor-addon' ),
					'center'     => esc_html__( 'Center', 'realhomes-elementor-addon' ),
					'flex-end'   => esc_html__( 'Right', 'realhomes-elementor-addon' ),
				],
				'prefix_class' => 'elementor-content-align-%s',
				'frontend_available' => true,
				'selectors' => [
					'{{WRAPPER}} .rhea_fp_slide_info' => 'justify-content: {{SIZE}} ',
				],
			]
		);

		$this->add_responsive_control(
			'ere_featured_2_slider_vertical_margin',
			[
				'label'           => esc_html__( 'Vertical Margin', 'realhomes-elementor-addon' ),
				'type'            => \Elementor\Controls_Manager::SLIDER,
				'range'           => [
					'px' => [
						'min' => -500,
						'max' => 500,
					],
				],
				'devices'         => [ 'desktop', 'tablet', 'mobile' ],
				'desktop_default' => [
					'size' => '',
					'unit' => 'px',
				],
				'tablet_default'  => [
					'size' => -80,
					'unit' => 'px',
				],
				'mobile_default'  => [
					'size' => 0,
					'unit' => 'px',
				],
				'selectors'       => [
					'{{WRAPPER}} .rhea_fp_slide_info' => 'margin-top: {{SIZE}}{{UNIT}};',

				],
			]
		);


		$this->add_responsive_control(
			'ere_featured_2_slider_size',
			[
				'label'           => esc_html__( 'Content Area Size', 'realhomes-elementor-addon' ),
				'type'            => \Elementor\Controls_Manager::SLIDER,
				'range'           => [
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'devices'         => [ 'desktop', 'tablet', 'mobile' ],
				'desktop_default' => [
					'size' => '',
					'unit' => '%',
				],
				'tablet_default'  => [
					'size' => 80,
					'unit' => '%',
				],
				'mobile_default'  => [
					'size' => 100,
					'unit' => '%',
				],
				'selectors'       => [
					'{{WRAPPER}} .rhea_fp_slide_info_inner' => 'max-width: {{SIZE}}{{UNIT}};',

				],
			]
		);



		$this->add_responsive_control(
			'ere_featured_property_content_padding',
			[
				'label'      => esc_html__( 'Content Area Padding', 'realhomes-elementor-addon' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .rhea_fp_slide_info_inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'bg-animation',
			[
				'label'        => esc_html__( 'Parallax Animation', 'realhomes-elementor-addon' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Yes', 'realhomes-elementor-addon' ),
				'label_off'    => esc_html__( 'No', 'realhomes-elementor-addon' ),
				'return_value' => 'yes',
				'default'      => 'no',
			]
		);

		$this->add_responsive_control(
			'ere_prop_card_meta_icon_size',
			[
				'label' => esc_html__( 'Meta Icon Size (px)', 'realhomes-elementor-addon' ),
				'type'  => \Elementor\Controls_Manager::SLIDER,

				'range'           => [
					'px' => [
						'min' => 0,
						'max' => 200,
					],
				],
				'devices'         => [ 'desktop', 'tablet', 'mobile' ],
				'desktop_default' => [
					'size' => '',
					'unit' => 'px',
				],
				'tablet_default'  => [
					'size' => '',
					'unit' => 'px',
				],
				'mobile_default'  => [
					'size' => '',
					'unit' => 'px',
				],
				'selectors'       => [
					'{{WRAPPER}} .rh_prop_card_meta_wrap_stylish .rh_prop_card__meta svg' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
	$this->add_responsive_control(
			'ere_prop_agent_thumb_size',
			[
				'label' => esc_html__( 'Property Agent Thumb Size (px)', 'realhomes-elementor-addon' ),
				'type'  => \Elementor\Controls_Manager::SLIDER,

				'range'           => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'devices'         => [ 'desktop', 'tablet', 'mobile' ],
				'desktop_default' => [
					'size' => '',
					'unit' => 'px',
				],
				'tablet_default'  => [
					'size' => '',
					'unit' => 'px',
				],
				'mobile_default'  => [
					'size' => '',
					'unit' => 'px',
				],
				'selectors'       => [
					'{{WRAPPER}} .rhea_fp_agent_expand_wrapper .agent-image' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'ere_featured_corner_pin_size',
			[
				'label' => esc_html__( 'Corner Pin Size (px)', 'realhomes-elementor-addon' ),
				'type'  => \Elementor\Controls_Manager::SLIDER,

				'range'           => [
					'px' => [
						'min' => 0,
						'max' => 50,
					],
				],
				'devices'         => [ 'desktop', 'tablet', 'mobile' ],
				'desktop_default' => [
					'size' => '',
					'unit' => 'px',
				],
				'tablet_default'  => [
					'size' => '',
					'unit' => 'px',
				],
				'mobile_default'  => [
					'size' => '',
					'unit' => 'px',
				],
				'selectors'       => [
					'{{WRAPPER}} .rhea_fp_slide_info_inner:after' => 'border-width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'ere_corner_pin_position',
			[
				'label' => esc_html__( 'Corner Pin Position', 'realhomes-elementor-addon' ),
				'description' => esc_html('Note: These options will work opposite in RTL languages'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'right',
				'options' => [
					'top-right' => esc_html__( 'Top Right', 'realhomes-elementor-addon' ),
					'right'     => esc_html__( 'Bottom Right', 'realhomes-elementor-addon' ),
					'top-left'  => esc_html__( 'Top left', 'realhomes-elementor-addon' ),
					'left'      => esc_html__( 'Bottom left', 'realhomes-elementor-addon' ),
				],
				'prefix_class' => 'rhea-corner-pin-%s',
				'frontend_available' => true,
				'selectors' => [
					'{{WRAPPER}} .rhea_fp_slide_info_inner' => '',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'ere_feature_properties_spaces',
			[
				'label' => esc_html__( 'Spaces', 'realhomes-elementor-addon' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'ere_featured_2_header_margin_bottom',
			[
				'label'           => esc_html__( 'Heading Margin Bottom', 'realhomes-elementor-addon' ),
				'type'            => \Elementor\Controls_Manager::SLIDER,
				'range'           => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'devices'         => [ 'desktop', 'tablet', 'mobile' ],
				'desktop_default' => [
					'size' => '',
					'unit' => 'px',
				],
				'tablet_default'  => [
					'size' => '',
					'unit' => 'px',
				],
				'mobile_default'  => [
					'size' => '',
					'unit' => 'px',
				],
				'selectors'       => [
					'{{WRAPPER}} .rhea_fp_slide_info h3.rhea_fp2_title' => 'margin-bottom: {{SIZE}}{{UNIT}};',

				],
			]
		);
		$this->add_responsive_control(
			'ere_featured_2_address_margin_bottom',
			[
				'label'           => esc_html__( 'Address Margin Bottom', 'realhomes-elementor-addon' ),
				'type'            => \Elementor\Controls_Manager::SLIDER,
				'range'           => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'devices'         => [ 'desktop', 'tablet', 'mobile' ],
				'desktop_default' => [
					'size' => '',
					'unit' => 'px',
				],
				'tablet_default'  => [
					'size' => '',
					'unit' => 'px',
				],
				'mobile_default'  => [
					'size' => '',
					'unit' => 'px',
				],
				'selectors'       => [
					'{{WRAPPER}} .rhea_fp_address' => 'margin-bottom: {{SIZE}}{{UNIT}};',

				],
			]
		);
		$this->add_responsive_control(
			'ere_featured_2_excerpt_margin_bottom',
			[
				'label'           => esc_html__( 'Excerpt Margin Bottom', 'realhomes-elementor-addon' ),
				'type'            => \Elementor\Controls_Manager::SLIDER,
				'range'           => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'devices'         => [ 'desktop', 'tablet', 'mobile' ],
				'desktop_default' => [
					'size' => '',
					'unit' => 'px',
				],
				'tablet_default'  => [
					'size' => '',
					'unit' => 'px',
				],
				'mobile_default'  => [
					'size' => '',
					'unit' => 'px',
				],
				'selectors'       => [
					'{{WRAPPER}} .rhea_fp_slide_info_inner .rhea_fp_excerpt' => 'margin-bottom: {{SIZE}}{{UNIT}};',

				],
			]
		);
		$this->add_responsive_control(
			'ere_featured_2_meta_margin_bottom',
			[
				'label'           => esc_html__( 'Excerpt Margin Bottom', 'realhomes-elementor-addon' ),
				'type'            => \Elementor\Controls_Manager::SLIDER,
				'range'           => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'devices'         => [ 'desktop', 'tablet', 'mobile' ],
				'desktop_default' => [
					'size' => '',
					'unit' => 'px',
				],
				'tablet_default'  => [
					'size' => '',
					'unit' => 'px',
				],
				'mobile_default'  => [
					'size' => '',
					'unit' => 'px',
				],
				'selectors'       => [
					'{{WRAPPER}} .rhea_fp2_meta' => 'margin-bottom: {{SIZE}}{{UNIT}};',

				],
			]
		);

		$this->add_responsive_control(
			'ere_featured_property_status_margin',
			[
				'label'           => esc_html__( 'Status Margin Bottom', 'realhomes-elementor-addon' ),
				'type'            => \Elementor\Controls_Manager::SLIDER,
				'range'           => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'devices'         => [ 'desktop', 'tablet', 'mobile' ],
				'desktop_default' => [
					'size' => '',
					'unit' => 'px',
				],
				'tablet_default'  => [
					'size' => '',
					'unit' => 'px',
				],
				'mobile_default'  => [
					'size' => '',
					'unit' => 'px',
				],
				'selectors'       => [
					'{{WRAPPER}} .rhea_fp_price_status .rhea_fp_status' => 'margin-bottom: {{SIZE}}{{UNIT}};',

				],
			]
		);

		$this->add_responsive_control(
			'ere_featured_property_price_margin',
			[
				'label'           => esc_html__( 'Price Margin Bottom', 'realhomes-elementor-addon' ),
				'type'            => \Elementor\Controls_Manager::SLIDER,
				'range'           => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'devices'         => [ 'desktop', 'tablet', 'mobile' ],
				'desktop_default' => [
					'size' => '',
					'unit' => 'px',
				],
				'tablet_default'  => [
					'size' => '',
					'unit' => 'px',
				],
				'mobile_default'  => [
					'size' => '',
					'unit' => 'px',
				],
				'selectors'       => [
					'{{WRAPPER}} .rhea_fp_price_status .rhea_fp_price' => 'margin-bottom: {{SIZE}}{{UNIT}};',

				],
			]
		);
		$this->add_responsive_control(
			'ere_featured_property_member_functions_margin',
			[
				'label'           => esc_html__( 'Additional Functions Icons Bottom Margin', 'realhomes-elementor-addon' ),
				'type'            => \Elementor\Controls_Manager::SLIDER,
				'range'           => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'devices'         => [ 'desktop', 'tablet', 'mobile' ],
				'desktop_default' => [
					'size' => '',
					'unit' => 'px',
				],
				'tablet_default'  => [
					'size' => '',
					'unit' => 'px',
				],
				'mobile_default'  => [
					'size' => '',
					'unit' => 'px',
				],
				'selectors'       => [
					'{{WRAPPER}} .rhea_wrapper_member_functions' => 'margin-bottom: {{SIZE}}{{UNIT}};',

				],
			]
		);

		$this->add_responsive_control(
			'ere_featured_property_member_functions_between_margin',
			[
				'label'           => esc_html__( 'Additional Functions Icons Space Between', 'realhomes-elementor-addon' ),
				'type'            => \Elementor\Controls_Manager::SLIDER,
				'range'           => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'devices'         => [ 'desktop', 'tablet', 'mobile' ],
				'desktop_default' => [
					'size' => '',
					'unit' => 'px',
				],
				'tablet_default'  => [
					'size' => '',
					'unit' => 'px',
				],
				'mobile_default'  => [
					'size' => '',
					'unit' => 'px',
				],
				'selectors'       => [
					'{{WRAPPER}} .rhea_wrapper_member_functions'                      => 'margin-left: -{{SIZE}}{{UNIT}}; margin-right: -{{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .rhea_wrapper_member_functions .add-to-favorite'     => 'margin-left: {{SIZE}}{{UNIT}}; margin-right: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .rhea_wrapper_member_functions .add-to-compare-span' => 'margin-left: {{SIZE}}{{UNIT}}; margin-right: {{SIZE}}{{UNIT}};',

				],
			]
		);


		$this->end_controls_section();

		$this->start_controls_section(
			'ere_feature_properties_nav_button',
			[
				'label' => esc_html__( 'Slider Nav Buttons', 'realhomes-elementor-addon' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);


		$this->add_control(
			'ere_show_featured_nav_buttons',
			[
				'label'        => esc_html__( 'Show Slider Nav Buttons', 'realhomes-elementor-addon' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Show', 'realhomes-elementor-addon' ),
				'label_off'    => esc_html__( 'Hide', 'realhomes-elementor-addon' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			]
		);

		$this->add_responsive_control(
			'ere_featured_nav_position_horizontal',
			[
				'label'           => esc_html__( 'Nav Button Horizontal Position (px)', 'realhomes-elementor-addon' ),
				'type'            => \Elementor\Controls_Manager::SLIDER,
				'condition'       => [
					'ere_show_featured_nav_buttons' => 'yes',
				],
				'range'           => [
					'px' => [
						'min' => - 300,
						'max' => 300,
					],
				],
				'devices'         => [ 'desktop', 'tablet', 'mobile' ],
				'desktop_default' => [
					'size' => - 60,
					'unit' => 'px',
				],
				'tablet_default'  => [
					'size' => - 40,
					'unit' => 'px',
				],
				'mobile_default'  => [
					'size' => -22,
					'unit' => 'px',
				],
				'selectors'       => [
					'{{WRAPPER}} .rhea_wrapper_fp_carousel .flex-prev' => 'left: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .rhea_wrapper_fp_carousel .flex-next' => 'right: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'ere_featured_nav_position_vertical',
			[
				'label'           => esc_html__( 'Nav Button Vertical Position (%)', 'realhomes-elementor-addon' ),
				'type'            => \Elementor\Controls_Manager::SLIDER,
				'condition'       => [
					'ere_show_featured_nav_buttons' => 'yes',
				],
				'range'           => [
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'devices'         => [ 'desktop', 'tablet', 'mobile' ],
				'desktop_default' => [
					'size' => '',
					'unit' => '%',
				],
				'tablet_default'  => [
					'size' => '',
					'unit' => '%',
				],
				'mobile_default'  => [
					'size' => '',
					'unit' => '%',
				],
				'selectors'       => [
					'{{WRAPPER}} .rhea_wrapper_fp_carousel .rhea_fp_nav' => 'top: {{SIZE}}{{UNIT}};',
				],
			]
		);


		$this->add_responsive_control(
			'ere_nav_button_padding',
			[
				'label'      => esc_html__( 'Nav Buttons Padding', 'realhomes-elementor-addon' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'condition'  => [
					'ere_show_featured_nav_buttons' => 'yes',
				],
				'selectors'  => [
					'{{WRAPPER}} .rhea_wrapper_fp_carousel .flex-prev' => 'Padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .rhea_wrapper_fp_carousel .flex-next' => 'Padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'ere_featured_nav_button_arrow_size',
			[
				'label'           => esc_html__( 'Nav Buttons Icon Size (px)', 'realhomes-elementor-addon' ),
				'type'            => \Elementor\Controls_Manager::SLIDER,
				'condition'       => [
					'ere_show_featured_nav_buttons' => 'yes',
				],
				'range'           => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'devices'         => [ 'desktop', 'tablet', 'mobile' ],
				'desktop_default' => [
					'size' => '',
					'unit' => 'px',
				],
				'tablet_default'  => [
					'size' => '',
					'unit' => 'px',
				],
				'mobile_default'  => [
					'size' => '',
					'unit' => 'px',
				],
				'selectors'       => [
					'{{WRAPPER}} .rhea_wrapper_fp_carousel .rhea_fp_nav svg' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);


		$this->end_controls_section();
		$this->start_controls_section(
			'rhea_fp_colors_section',
			[
				'label' => esc_html__( 'Colors', 'realhomes-elementor-addon' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'rhea_content_background',
			[
				'label'     => esc_html__( 'Content Background', 'realhomes-elementor-addon' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .rhea_fp_slide_info_inner' => 'background: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'contant_area_box_shadow',
				'label'    => esc_html__( 'Content Area Box Shadow', 'realhomes-elementor-addon' ),
				'selector' => '{{WRAPPER}} .rhea_fp_slide_info_inner',
			]
		);

		$this->add_control(
			'rhea_content_heading_color',
			[
				'label'     => esc_html__( 'Heading', 'realhomes-elementor-addon' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .rhea_fp_slide_info h3.rhea_fp2_title a' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'rhea_content_heading_hover_color',
			[
				'label'     => esc_html__( 'Heading Hover', 'realhomes-elementor-addon' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .rhea_fp_slide_info h3.rhea_fp2_title a:hover' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'rhea_content_address_color',
			[
				'label'     => esc_html__( 'Address', 'realhomes-elementor-addon' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .rhea_fp_address a' => 'color: {{VALUE}}',
				],
			]
		);
			$this->add_control(
			'rhea_content_address_pin_color',
			[
				'label'     => esc_html__( 'Map Pin', 'realhomes-elementor-addon' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .rhea_fp_address svg' => 'fill: {{VALUE}}',
				],
			]
		);


		$this->add_control(
			'rhea_content_address_hover_color',
			[
				'label'     => esc_html__( 'Address Hover', 'realhomes-elementor-addon' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .rhea_fp_address a:hover' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'rhea_content_address_pin_hover_color',
			[
				'label'     => esc_html__( 'Map Pin On Address Hover', 'realhomes-elementor-addon' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .rhea_fp_address a:hover svg' => 'fill: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'rhea_content_excerpt_color',
			[
				'label'     => esc_html__( 'Excerpt', 'realhomes-elementor-addon' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .rhea_fp_slide_info_inner .rhea_fp_excerpt' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'rhea_content_meta_label_color',
			[
				'label'     => esc_html__( 'Meta Label', 'realhomes-elementor-addon' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .rh_prop_card_meta_wrap_stylish .rh_prop_card__meta .rhea_meta_titles' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'rhea_content_meta_icon_color',
			[
				'label'     => esc_html__( 'Meta Icon', 'realhomes-elementor-addon' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .rh_prop_card_meta_wrap_stylish .rh_prop_card__meta svg' => 'fill: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'rhea_content_meta_figure_color',
			[
				'label'     => esc_html__( 'Meta Figure', 'realhomes-elementor-addon' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .rh_prop_card_meta_wrap_stylish .rh_prop_card__meta .figure' => 'color: {{VALUE}}',
				],
			]
		);
	$this->add_control(
			'rhea_content_meta_area_color',
			[
				'label'     => esc_html__( 'Meta Area Unit', 'realhomes-elementor-addon' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .rh_prop_card_meta_wrap_stylish .rh_prop_card__meta .label' => 'color: {{VALUE}}',
				],
			]
		);


	$this->add_control(
			'rhea_property_status_color',
			[
				'label'     => esc_html__( 'Status Color', 'realhomes-elementor-addon' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .rhea_fp_price_status .rhea_fp_status' => 'color: {{VALUE}}',
				],
			]
		);

	$this->add_control(
			'rhea_property_price_color',
			[
				'label'     => esc_html__( 'Price Color', 'realhomes-elementor-addon' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .rhea_fp_price_status .rhea_fp_price' => 'color: {{VALUE}}',
				],
			]
		);


		$this->add_control(
			'rhea_property_fav_icon_color',
			[
				'label'     => esc_html__( 'Favourite Icon', 'realhomes-elementor-addon' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .add-to-favorite .rh_svg' => 'fill: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'rhea_property_fav_icon_hover_color',
			[
				'label'     => esc_html__( 'Favourite Icon Hover/Added', 'realhomes-elementor-addon' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .add-to-favorite:hover .rh_svg' => 'fill: {{VALUE}};',
					'{{WRAPPER}} .highlight__red .rh_svg'            => 'fill: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'rhea_property_icon_tooltips',
			[
				'label'     => esc_html__( 'Favourite Tooltip Background', 'realhomes-elementor-addon' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .add-to-favorite:before' => 'border-top-color: {{VALUE}};',
					'{{WRAPPER}} .favorite-placeholder:before' => 'border-top-color: {{VALUE}};',
					'{{WRAPPER}} .add-to-favorite:after'  => 'background: {{VALUE}};',
					'{{WRAPPER}} .favorite-placeholder:after'  => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'rhea_property_icon_tooltips_text',
			[
				'label'     => esc_html__( 'Favourite Tooltip Text', 'realhomes-elementor-addon' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .add-to-favorite:after' => 'color: {{VALUE}};',
					'{{WRAPPER}} .favorite-placeholder:after' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'rhea_property_compare_icon_color',
			[
				'label'     => esc_html__( 'Compare Icon', 'realhomes-elementor-addon' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .rhea_add_to_compare svg' => 'fill: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'rhea_property_compare_icon_color:hover',
			[
				'label'     => esc_html__( 'Compare Icon Hover/Added', 'realhomes-elementor-addon' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .rhea_add_to_compare:hover svg' => 'fill: {{VALUE}};',
					'{{WRAPPER}} .highlight svg path'            => 'fill: {{VALUE}};',
				],
			]
		);


		$this->add_control(
			'rhea_property_compare_icon_tooltips',
			[
				'label'     => esc_html__( 'Compare Tooltip Background', 'realhomes-elementor-addon' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .add-to-compare-span [data-tooltip]:not([flow]):hover::before' => 'border-top-color: {{VALUE}};',
					'{{WRAPPER}} .add-to-compare-span [data-tooltip]:not([flow]):hover::after'  => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'rhea_property_compare_icon_tooltips_text',
			[
				'label'     => esc_html__( 'Compare Tooltip Text', 'realhomes-elementor-addon' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .add-to-compare-span [data-tooltip]:not([flow]):hover::after' => 'color: {{VALUE}};',
				],
			]
		);


		$this->add_control(
			'rhea_property_agent_color',
			[
				'label'     => esc_html__( 'Agent', 'realhomes-elementor-addon' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .rhea_fp_agent_expand_wrapper .rhea_agent_agency .rh_property_agent__title' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'rhea_property_agent_hover_color',
			[
				'label'     => esc_html__( 'Agent Hover', 'realhomes-elementor-addon' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .rhea_fp_agent_expand_wrapper .rhea_agent_agency .rh_property_agent__title:hover' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'rhea_property_agency_color',
			[
				'label'     => esc_html__( 'Agency', 'realhomes-elementor-addon' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .rhea_fp_agent_expand_wrapper .rhea_agent_agency .rh_property_agent__agency' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'rhea_property_agency_hover_color',
			[
				'label'     => esc_html__( 'Agency Hover', 'realhomes-elementor-addon' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .rhea_fp_agent_expand_wrapper .rhea_agent_agency .rh_property_agent__agency:hover' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'rhea_property_corner_pin_color',
			[
				'label'     => esc_html__( 'Corner Pin', 'realhomes-elementor-addon' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '#ea723d',
				'selectors' => [
					'{{WRAPPER}}.rhea-corner-pin-right .rhea_fp_slide_info_inner:after'          => 'border-top-color: transparent; border-right-color: {{VALUE}}; border-bottom-color: {{VALUE}}; border-left-color: transparent;',
					'.rtl {{WRAPPER}}.rhea-corner-pin-right .rhea_fp_slide_info_inner:after'     => 'border-top-color: transparent; border-left-color: {{VALUE}}; border-bottom-color: {{VALUE}}; border-right-color: transparent;',
					'{{WRAPPER}}.rhea-corner-pin-left .rhea_fp_slide_info_inner:after'           => 'border-top-color: transparent; border-left-color: {{VALUE}}; border-bottom-color: {{VALUE}}; border-right-color: transparent;',
					'.rtl {{WRAPPER}}.rhea-corner-pin-left  .rhea_fp_slide_info_inner:after'     => 'border-top-color: transparent; border-right-color: {{VALUE}}; border-bottom-color: {{VALUE}}; border-left-color: transparent;',
					'{{WRAPPER}}.rhea-corner-pin-top-left .rhea_fp_slide_info_inner:after'       => 'border-bottom-color: transparent; border-top-color: {{VALUE}}; border-left-color: {{VALUE}}; border-right-color: transparent;',
					'.rtl {{WRAPPER}}.rhea-corner-pin-top-left .rhea_fp_slide_info_inner:after'  => 'border-bottom-color: transparent; border-top-color: {{VALUE}}; border-right-color: {{VALUE}}; border-left-color: transparent;',
					'{{WRAPPER}}.rhea-corner-pin-top-right .rhea_fp_slide_info_inner:after'      => 'border-bottom-color: transparent; border-top-color: {{VALUE}}; border-right-color: {{VALUE}}; border-left-color: transparent;',
					'.rtl {{WRAPPER}}.rhea-corner-pin-top-right .rhea_fp_slide_info_inner:after' => 'border-bottom-color: transparent; border-top-color: {{VALUE}}; border-left-color: {{VALUE}}; border-right-color: transparent;',
				],
			]
		);


		$this->add_control(
			'rhea_property_nav_button_bg',
			[
				'label'     => esc_html__( 'Nav Button Background', 'realhomes-elementor-addon' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .rhea_wrapper_fp_carousel .rhea_fp_nav' => 'background: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'rhea_property_nav_button_bg_hover',
			[
				'label'     => esc_html__( 'Nav Button Background Hover', 'realhomes-elementor-addon' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .rhea_wrapper_fp_carousel .rhea_fp_nav:hover' => 'background: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'rhea_property_nav_button_icon',
			[
				'label'     => esc_html__( 'Nav Button Icon', 'realhomes-elementor-addon' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .rhea_wrapper_fp_carousel .rhea_fp_nav svg' => 'fill: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'rhea_property_nav_button_icon_hover',
			[
				'label'     => esc_html__( 'Nav Button Icon Hover', 'realhomes-elementor-addon' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .rhea_wrapper_fp_carousel .rhea_fp_nav:hover svg' => 'fill: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'nav_box_shadow',
				'label'    => esc_html__( 'Nav Button Box Shadow', 'realhomes-elementor-addon' ),
				'selector' => '{{WRAPPER}} .rhea_wrapper_fp_carousel .rhea_fp_nav',
			]
		);



		$this->end_controls_section();

	}

	protected function render() {
		global $settings;
		$settings = $this->get_settings_for_display();

		// Number of Properties
		if ( ! $settings['number_of_properties'] ) {
			$settings['number_of_properties'] = 5;
		}
				// Featured Properties Query Arguments.
		$featured_properties_args = array(
			'post_type'      => 'property',
			'post_status'    => 'publish',
			'posts_per_page' => $settings['number_of_properties'],
			'meta_query'     => array(
				array(
					'key'     => 'REAL_HOMES_featured',
					'value'   => 1,
					'compare' => '=',
					'type'    => 'NUMERIC',
				),
			),
		);

		$featured_properties_query = new WP_Query( $featured_properties_args );

		if ( $featured_properties_query->have_posts() ) {
			?>
            <section class="rhea_features_properties_2">
                <div class="rhea_wrapper_fp_carousel">
                    <div class="flexslider loading">
                        <ul class="slides">
							<?php
							while ( $featured_properties_query->have_posts() ) {
								$featured_properties_query->the_post();
								?>
                                <li>
                                    <div class="rhea_fp_slide_contents">
                                        <a href="<?php the_permalink() ?>" class="rhea_fp_thumbnail <?php if ( 'yes' === $settings['bg-animation'] ) {
			                                echo esc_attr( 'rhea_fp_parallax' );
		                                } ?>" style="background-image: url('<?php echo get_the_post_thumbnail_url( get_the_ID(), 'large' ); ?>')">
                                        </a>
                                        <div class="rhea_fp_slide_info">
                                            <a class="rhea_fp_permalink" href="<?php the_permalink() ?>"></a>
                                            <div class="rhea_fp_slide_info_inner">
												<?php
												rhea_get_template_part( 'assets/partials/featured/title' );
												if ( 'yes' === $settings['show_address'] ) {
													rhea_get_template_part( 'assets/partials/featured/address' );
												}

												if ( 'yes' === $settings['show_meta'] ) {
													?>
                                                    <div class="rhea_fp2_meta">
														<?php rhea_get_template_part( 'assets/partials/featured/meta' ); ?>
                                                    </div>
													<?php
												}
												if ( 'yes' === $settings['show_excerpt'] ) {
													rhea_get_template_part( 'assets/partials/featured/excerpt' );
												}
							?>

                                                <div class="rhea_fp_sales_icons">
													<?php rhea_get_template_part( 'assets/partials/featured/price' ); ?>
                                                    <div class="rhea_wrapper_member_functions">
														<?php
														if ( 'yes' === $settings['ere_enable_fav_properties'] ) {
															if ( function_exists( 'inspiry_favorite_button' ) ) {
																inspiry_favorite_button(get_the_ID(),null,$settings['ere_property_fav_label'],$settings['ere_property_fav_added_label']);
															}
														}
														if('yes' === $settings['ere_enable_compare_properties']){
															rhea_get_template_part( 'assets/partials/featured/compare' );
														}
                                                        ?>
                                                    </div>
                                                </div>
                                                <?php if('yes' === $settings['show_agent']){ ?>
                                                <div class="rhea_fp_agents">
	                                                <?php rhea_get_template_part( 'assets/partials/featured/agent' ); ?>
                                                </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </li>
								<?php
							}

							?>
                        </ul>
                    </div>
					<?php if ( 'yes' === $settings['ere_show_featured_nav_buttons'] ) { ?>
                        <div class="rhea_fp_slider_nav">
                            <a href="#" class="flex-prev rhea_fp_nav">
								<?php include RHEA_ASSETS_DIR . '/icons/fp-arrow.svg'; ?>
                            </a>
                            <a href="#" class="flex-next rhea_fp_nav">
								<?php include RHEA_ASSETS_DIR . '/icons/fp-arrow.svg'; ?>
                            </a>
                        </div>
					<?php } ?>
                </div>
            </section>

            <script type="application/javascript">
                jQuery('.rhea_wrapper_fp_carousel .flexslider').each(function () {
                    jQuery(this).flexslider({
                        animation: "fade",
                        slideshowSpeed: 7000,
                        animationSpeed: 1500,
                        slideshow: false,
                        directionNav: true,
                        controlNav: false,
                        keyboardNav: true,
                        smoothHeight: true,
                        // directionNav: false,
                        // customDirectionNav: $(".rh_flexslider__nav_main_gallery .nav-mod"),
                        customDirectionNav: jQuery(this).next('.rhea_fp_slider_nav').find('.rhea_fp_nav'),
                        start: function (slider) {
                            slider.removeClass('loading');
                        }
                    });
                });

                function fpisInViewport(node) {
                    var rect = node.getBoundingClientRect()
                    return (
                        (rect.height > 0 || rect.width > 0) &&
                        rect.bottom >= 0 &&
                        rect.right >= 0 &&
                        rect.top <= (window.innerHeight || document.documentElement.clientHeight) &&
                        rect.left <= (window.innerWidth || document.documentElement.clientWidth)
                    )
                }

                function fpscrollParallax(selector) {
                    var scrolled = jQuery(window).scrollTop();
                    jQuery(selector).each(function (index, element) {
                        var initY = jQuery(this).offset().top;
                        var height = jQuery(this).height();
                        var endY = initY + jQuery(this).height();

                        // Check if the element is in the viewport.
                        var visible = fpisInViewport(this);
                        if (visible) {
                            var diff = scrolled - initY;
                            var ratio = Math.round((diff / height) * 100);
                            jQuery(this).css('background-position', 'center ' + parseInt((ratio * 1)) + 'px')
                        }

                    })
                }

                jQuery('.rhea_fp_parallax').each(function () {
                    fpscrollParallax(this);
                });

                jQuery(window).scroll(function () {
                    jQuery('.rhea_fp_parallax').each(function () {
                        fpscrollParallax(this);
                    });

                });

            </script>

			<?php
		}
		?>


		<?php
	}

}
?>