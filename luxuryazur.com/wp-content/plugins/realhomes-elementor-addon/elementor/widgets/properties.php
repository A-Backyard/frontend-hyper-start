<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class RHEA_Properties_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'rhea-properties-widget';
	}

	public function get_title() {
		return esc_html__( 'Properties Grid', 'realhomes-elementor-addon' );
	}

	public function get_icon() {
		// More classes for icons can be found at https://pojome.github.io/elementor-icons/
		return 'eicon-posts-grid';
	}

	public function get_categories() {
		return [ 'real-homes' ];
	}

	protected function _register_controls() {

	    $grid_size_array = wp_get_additional_image_sizes();

		$prop_grid_size_array = array();
	    foreach ($grid_size_array as $key => $value){
	        $str_rpl_key = ucwords( str_replace("-", " " , $key));

		    $prop_grid_size_array[$key] =  $str_rpl_key . ' - ' .$value['width'] . 'x' . $value['height'] ;
        }

        unset($prop_grid_size_array['partners-logo']);
        unset($prop_grid_size_array['property-detail-slider-thumb']);
        unset($prop_grid_size_array['post-thumbnail']);
        unset($prop_grid_size_array['agent-image']);
        unset($prop_grid_size_array['property-detail-slider-image']);
        unset($prop_grid_size_array['gallery-two-column-image']);
        unset($prop_grid_size_array['post-featured-image']);

        if(INSPIRY_DESIGN_VARIATION == 'modern'){
            $default_prop_grid_size = 'property-listing-image';
        }else{
	        $default_prop_grid_size = 'grid-view-image';
        }

		$allowed_html = array(
			'a' => array(
				'href' => array(),
				'title' => array()
			),
			'br' => array(),
			'em' => array(),
			'strong' => array(),
		);



		$this->start_controls_section(
			'ere_properties_section',
			[
				'label' => esc_html__( 'Properties', 'realhomes-elementor-addon' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'ere_property_grid_thumb_sizes',
			[
				'label' => esc_html__( 'Thumbnail Size', 'realhomes-elementor-addon' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => $default_prop_grid_size,
				'options' => $prop_grid_size_array
			]
		);


		$this->add_control(
			'posts_per_page',
			[
				'label'   => esc_html__( 'Number of Properties', 'realhomes-elementor-addon' ),
				'type'    => \Elementor\Controls_Manager::NUMBER,
				'min'     => 1,
				'max'     => 60,
				'step'    => 1,
				'default' => 6,
			]
		);


		// Select controls for Custom Taxonomies related to Property
		$property_taxonomies = get_object_taxonomies( 'property', 'objects' );
		if ( ! empty( $property_taxonomies ) && ! is_wp_error( $property_taxonomies ) ) {
			foreach ( $property_taxonomies as $single_tax ) {
				$options = [];
				$terms   = get_terms( $single_tax->name );

				if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
					foreach ( $terms as $term ) {
						$options[ $term->slug ] = $term->name;
					}
				}

				$this->add_control(
					$single_tax->name,
					[
						'label'    => $single_tax->label,
						'type'     => \Elementor\Controls_Manager::SELECT2,
						'multiple' => true,
						'options'  => $options,
					]
				);
			}
		}


		// Sorting Controls
		$this->add_control(
			'orderby',
			[
				'label'   => esc_html__( 'Order By', 'realhomes-elementor-addon' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'date'       => esc_html__( 'Date', 'realhomes-elementor-addon' ),
					'price'      => esc_html__( 'Price', 'realhomes-elementor-addon' ),
					'title'      => esc_html__( 'Title', 'realhomes-elementor-addon' ),
					'menu_order' => esc_html__( 'Menu Order', 'realhomes-elementor-addon' ),
					'rand'       => esc_html__( 'Random', 'realhomes-elementor-addon' ),
				],
				'default' => 'date',
			]
		);

		$this->add_control(
			'order',
			[
				'label'   => esc_html__( 'Order', 'realhomes-elementor-addon' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'asc'  => esc_html__( 'Ascending', 'realhomes-elementor-addon' ),
					'desc' => esc_html__( 'Descending', 'realhomes-elementor-addon' ),
				],
				'default' => 'desc',
			]
		);

		$this->add_control(
			'show_only_featured',
			[
				'label'        => esc_html__( 'Show Only Featured Properties', 'realhomes-elementor-addon' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Yes', 'realhomes-elementor-addon' ),
				'label_off'    => esc_html__( 'No', 'realhomes-elementor-addon' ),
				'return_value' => 'yes',
				'default'      => 'no',
			]
		);

		$this->add_control(
			'prop_excerpt_length',
			[
				'label' => esc_html__( 'Excerpt Length (Words)', 'realhomes-elementor-addon' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 5,
				'max' => 100,
				'default' => 10,
			]
		);

		$this->add_control(
			'skip_sticky_properties',
			[
				'label'        => esc_html__( 'Skip Sticky Properties', 'realhomes-elementor-addon' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Yes', 'realhomes-elementor-addon' ),
				'label_off'    => esc_html__( 'No', 'realhomes-elementor-addon' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			]
		);

		$this->add_control(
			'show_pagination',
			[
				'label'        => esc_html__( 'Show Pagination', 'realhomes-elementor-addon' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Yes', 'realhomes-elementor-addon' ),
				'label_off'    => esc_html__( 'No', 'realhomes-elementor-addon' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			]
		);

		$this->add_control(
			'offset',
			[
				'label'   => esc_html__( 'Offset or Skip From Start', 'realhomes-elementor-addon' ),
				'type'    => \Elementor\Controls_Manager::NUMBER,
				'default' => '0',
				'condition' => [
					'show_pagination' => '',
				],
			]
		);

		$this->add_control(
			'ere_enable_fav_properties',
			[
				'label'        => esc_html__( 'Show Add To Favourite Button', 'realhomes-elementor-addon' ),
				'description'  => wp_kses(__('<strong>Important:</strong> Make sure to select <strong>Show</strong> in Customizer <strong>Favorites</strong> settings. ','realhomes-elementor-addon'),$allowed_html),
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
				'description'  => wp_kses(__('<strong>Important:</strong> Make sure <strong>Compare Properties</strong> is <strong>enabled</strong> in Customizer settings. ','realhomes-elementor-addon'),$allowed_html),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Yes', 'realhomes-elementor-addon' ),
				'label_off'    => esc_html__( 'No', 'realhomes-elementor-addon' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'ere_properties_sizes_spaces',
			[
				'label' => esc_html__( 'Sizes & Spaces', 'realhomes-elementor-addon' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'ere_property_width',
			[
				'label'           => esc_html__( 'Property Width (%)', 'realhomes-elementor-addon' ),
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
					'size' => '',
					'unit' => '%',
				],
				'mobile_default'  => [
					'size' => '',
					'unit' => '%',
				],
				'selectors'       => [
					'{{WRAPPER}} .rh_properties_element .wrapper_properties_ele' => 'width: {{SIZE}}{{UNIT}};',

				],
			]
		);

		$this->add_responsive_control(
			'ere_property_content_padding',
			[
				'label' => esc_html__( 'Content Area Padding', 'realhomes-elementor-addon' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .rh_prop_card__details_elementor' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'ere_title_bottom_margin',
			[
				'label'           => esc_html__( 'Title Bottom Margin (px)', 'realhomes-elementor-addon' ),
				'type'            => \Elementor\Controls_Manager::SLIDER,

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
					'{{WRAPPER}} .rh_prop_card__details_elementor h3' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'ere_excerpt_bottom_margin',
			[
				'label'           => esc_html__( 'Excerpt Bottom Margin (px)', 'realhomes-elementor-addon' ),
				'type'            => \Elementor\Controls_Manager::SLIDER,

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
					'{{WRAPPER}} .rh_prop_card__details_elementor p' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'ere_prop_card_meta_wrap_margin',
			[
				'label'           => esc_html__( 'Meta Bottom Margin (px)', 'realhomes-elementor-addon' ),
				'type'            => \Elementor\Controls_Manager::SLIDER,

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
					'{{WRAPPER}} .rh_prop_card__meta_wrap_elementor' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'ere_prop_card_meta_icon_size',
			[
				'label'           => esc_html__( 'Meta Icon Size (px)', 'realhomes-elementor-addon' ),
				'type'            => \Elementor\Controls_Manager::SLIDER,

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
					'{{WRAPPER}} .rh_prop_card__details_elementor .rh_prop_card__meta svg' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'ere_prop_card_meta_status_margin',
			[
				'label'           => esc_html__( 'Status Bottom Margin (px)', 'realhomes-elementor-addon' ),
				'type'            => \Elementor\Controls_Manager::SLIDER,

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
					'{{WRAPPER}} .rh_prop_card__details_elementor .rh_prop_card__status' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'ere_property_view_button_padding',
			[
				'label' => esc_html__( 'View Property Button Padding', 'realhomes-elementor-addon' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .elementor_property_card_parent .rh_overlay__contents a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);



		$this->end_controls_section();


		$this->start_controls_section(
			'ere_properties_styles',
			[
				'label' => esc_html__( 'Property Colors', 'realhomes-elementor-addon' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);



		$this->add_control(
			'ere_property_bg_color',
			[
				'label'     => esc_html__( 'Property Background', 'realhomes-elementor-addon' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .elementor_properties_grid .rh_prop_card__details_elementor' => 'background: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'ere_image_overlay_color',
			[
				'label'     => esc_html__( 'Image Overlay', 'realhomes-elementor-addon' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => 'rgba(30, 166, 154, 0.7)',
				'selectors' => [
					'{{WRAPPER}} .elementor_properties_grid .rh_overlay' => 'background: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'ere_new_property_button',
			[
				'label'     => esc_html__( 'View Button Hover', 'realhomes-elementor-addon' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '#1ea69a',
				'selectors' => [
					'{{WRAPPER}} .elementor_properties_grid .rh_overlay__contents a:hover' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'ere_property_featured_label_bg_color',
			[
				'label'     => esc_html__( 'Feature Tag Tooltip Background', 'realhomes-elementor-addon' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .elementor_properties_grid .rh_label_elementor'             => 'background: {{VALUE}}',
					'{{WRAPPER}} .elementor_properties_grid .rh_label_elementor span'        => 'border-left-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'ere_property_featured_label_text_color',
			[
				'label'     => esc_html__( 'Feature Tag Tooltip Text', 'realhomes-elementor-addon' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .elementor_properties_grid .rh_label_elementor .rh_label__wrap' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'ere_property_heading_color',
			[
				'label'     => esc_html__( 'Property Heading', 'realhomes-elementor-addon' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .elementor_properties_grid .rh_prop_card__details_elementor h3 a' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'ere_property_heading_hover_color',
			[
				'label'     => esc_html__( 'Property Heading Hover', 'realhomes-elementor-addon' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .elementor_properties_grid .rh_prop_card__details_elementor h3 a:hover' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'ere_property_excerpt_color',
			[
				'label'     => esc_html__( 'Property Excerpt', 'realhomes-elementor-addon' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .elementor_properties_grid .rh_prop_card__details_elementor .rh_prop_card__excerpt' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'ere_property_meta_label_color',
			[
				'label'     => esc_html__( 'Meta Label', 'realhomes-elementor-addon' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .elementor_properties_grid .rh_prop_card__details_elementor .rh_prop_card__meta .rhea_meta_titles' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'ere_property_meta_svg_color',
			[
				'label'     => esc_html__( 'SVG Meta Icon', 'realhomes-elementor-addon' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .elementor_properties_grid .rh_prop_card__details_elementor .rh_prop_card__meta svg' => 'fill: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'ere_property_meta_figure_color',
			[
				'label'     => esc_html__( 'Meta Figure', 'realhomes-elementor-addon' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .elementor_properties_grid .rh_prop_card__details_elementor .rh_prop_card__meta .figure' => 'color: {{VALUE}}',
					'{{WRAPPER}} .elementor_properties_grid .rh_prop_card__details_elementor .rh_prop_card__meta .label'  => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'ere_property_status_color',
			[
				'label'     => esc_html__( 'Status', 'realhomes-elementor-addon' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .elementor_properties_grid .rh_prop_card__details_elementor .rh_prop_card__priceLabel .rh_prop_card__status' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'ere_property_price_color',
			[
				'label'     => esc_html__( 'Price', 'realhomes-elementor-addon' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .elementor_properties_grid .rh_prop_card__details_elementor .rh_prop_card__priceLabel .rh_prop_card__price' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'ere_property_fav_icon_color',
			[
				'label'     => esc_html__( 'Favourite Icon Background', 'realhomes-elementor-addon' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} a.add-to-favorite svg path ' => 'fill: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'ere_property_fav_icon_hover_color',
			[
				'label'     => esc_html__( 'Favourite Icon Background Hover', 'realhomes-elementor-addon' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .add-to-favorite:hover svg path' => 'fill: {{VALUE}}',
					'{{WRAPPER}} .favorite-placeholder svg path' => 'fill: {{VALUE}}',
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
					'{{WRAPPER}} .rh_prop_card__btns [data-tooltip]:not([flow]):hover::before' => 'border-top-color: {{VALUE}};',
					'{{WRAPPER}} .rh_prop_card__btns [data-tooltip]:not([flow]):hover::after'  => 'background: {{VALUE}};',
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
					'{{WRAPPER}} .rh_prop_card__btns [data-tooltip]:not([flow]):hover::after' => 'color: {{VALUE}};',
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
				'label'     => esc_html__( 'Compare Icon Hover', 'realhomes-elementor-addon' ),
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
			'ere_property_label_bg_color',
			[
				'label'     => esc_html__( 'Property Label Background', 'realhomes-elementor-addon' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .elementor_property_card_parent .rhea_property_label' => 'background: {{VALUE}}',
				],
			]
		);


		$this->add_control(
			'ere_property_label_text_color',
			[
				'label'     => esc_html__( 'Property Label Text', 'realhomes-elementor-addon' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .elementor_property_card_parent .rhea_property_label' => 'color: {{VALUE}}',
				],
			]
		);



		$this->end_controls_section();

		$this->start_controls_section(
			'ere_properties_box_shadow',
			[
				'label' => esc_html__( 'Box Shadow', 'realhomes-elementor-addon' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow',
				'label' => esc_html__( 'Box Shadow', 'realhomes-elementor-addon' ),
				'selector' => '{{WRAPPER}} .elementor_property_card_parent .rh_prop_card_elementor .rh_prop_card__wrap',
			]
		);



		$this->end_controls_section();

		$this->start_controls_section(
			'ere_vew_prop_border_tab',
			[
				'label' => esc_html__( 'View Property Button Border', 'realhomes-elementor-addon' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]

		);

		$this->start_controls_tabs( 'tabs_vew_btn_border' );

		$this->start_controls_tab(
			'ere_new_prop_border_normal',
			[
				'label' => esc_html__( 'Normal', 'realhomes-elementor-addon' ),
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'ere_border_type',
				'label' => esc_html__( 'Border', 'realhomes-elementor-addon' ),
				'selector' => '{{WRAPPER}} .elementor_property_card_parent .rh_overlay__contents a',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'ere_view_prop_border_hover',
			[
				'label' => esc_html__( 'Hover', 'realhomes-elementor-addon' ),
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'ere_border_type_hover',
				'label' => esc_html__( 'Border', 'realhomes-elementor-addon' ),
				'selector' => '{{WRAPPER}} .elementor_property_card_parent .rh_overlay__contents a:hover',
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tab();



		$this->end_controls_section();

		$this->start_controls_section(
			'rhea_pagination',
			[
				'label' => esc_html__( 'Pagination', 'realhomes-elementor-addon' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]

		);

		$this->add_responsive_control(
			'rhea_pagination_contianer_margin',
			[
				'label' => esc_html__( 'Pagination Container Margin', 'realhomes-elementor-addon' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .rhea_latest_properties_ajax .pagination' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'rhea_space_between_links',
			[
				'label'           => esc_html__( 'Space Between (px)', 'realhomes-elementor-addon' ),
				'type'            => \Elementor\Controls_Manager::SLIDER,
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
					'{{WRAPPER}} .rhea_latest_properties_ajax .pagination a' => 'margin-left: {{SIZE}}{{UNIT}}; margin-right: {{SIZE}}{{UNIT}};',

				],
			]
		);

		$this->add_responsive_control(
			'rhea_pagination_size',
			[
				'label'           => esc_html__( 'Size(px)', 'realhomes-elementor-addon' ),
				'type'            => \Elementor\Controls_Manager::SLIDER,
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
					'{{WRAPPER}} .rhea_latest_properties_ajax .pagination a' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}}; line-height: {{SIZE}}{{UNIT}};',

				],
			]
		);
		$this->add_responsive_control(
			'rhea_pagination_border_radius',
			[
				'label'           => esc_html__( 'Border Radius(px)', 'realhomes-elementor-addon' ),
				'type'            => \Elementor\Controls_Manager::SLIDER,
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
					'{{WRAPPER}} .rhea_latest_properties_ajax .pagination a' => 'border-radius: {{SIZE}}{{UNIT}};',

				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'property_pagination_typography',
				'label'    => esc_html__( 'Typography', 'realhomes-elementor-addon' ),
				'scheme'   => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .rhea_latest_properties_ajax .pagination a',
			]
		);

		$this->add_control(
			'rhea_pagination_bg_color',
			[
				'label'     => esc_html__( 'Background Color', 'realhomes-elementor-addon' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .rhea_latest_properties_ajax .pagination a' => 'background: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'rhea_pagination_bg_hover_color',
			[
				'label'     => esc_html__( 'Background Hover/Current Color', 'realhomes-elementor-addon' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '#1ea69a',
				'selectors' => [
					'{{WRAPPER}} .rhea_latest_properties_ajax .pagination a:hover' => 'background: {{VALUE}}',
					'{{WRAPPER}} .rhea_latest_properties_ajax .pagination a.current' => 'background: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'rhea_pagination_text_color',
			[
				'label'     => esc_html__( 'Text Color', 'realhomes-elementor-addon' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '#808080',
				'selectors' => [
					'{{WRAPPER}} .rhea_latest_properties_ajax .pagination a' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'rhea_pagination_text_hover_color',
			[
				'label'     => esc_html__( 'Text Hover/Current Color', 'realhomes-elementor-addon' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .rhea_latest_properties_ajax .pagination a:hover' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rhea_latest_properties_ajax .pagination a.current' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'pagination_box_shadow',
				'label' => esc_html__( 'Box Shadow', 'realhomes-elementor-addon' ),
				'selector' => '{{WRAPPER}} .rhea_latest_properties_ajax .pagination a',
			]
		);


		$this->end_controls_section();

		$this->start_controls_section(
			'ere_property_typo_section',
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
				'selector' => '{{WRAPPER}} .rh_prop_card__details_elementor h3 a',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'property_excerpt_typography',
				'label'    => esc_html__( 'Excerpt', 'realhomes-elementor-addon' ),
				'scheme'   => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .rh_prop_card__details_elementor .rh_prop_card__excerpt',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'property_label_typography',
				'label'    => esc_html__( 'Label', 'realhomes-elementor-addon' ),
				'scheme'   => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .rh_prop_card__details_elementor .rh_prop_card__meta .rhea_meta_titles',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'property_figure_typography',
				'label'    => esc_html__( 'Figure', 'realhomes-elementor-addon' ),
				'scheme'   => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .rh_prop_card__details_elementor .rh_prop_card__meta .figure',
			]
		);


		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'property_area_postfix_typography',
				'label'    => esc_html__( 'Area Postfix', 'realhomes-elementor-addon' ),
				'scheme'   => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .rh_prop_card__details_elementor .rh_prop_card__meta .label',
			]
		);


		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'property_status_typography',
				'label'    => esc_html__( 'Status', 'realhomes-elementor-addon' ),
				'scheme'   => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .rh_prop_card__details_elementor .rh_prop_card__priceLabel .rh_prop_card__status',
			]
		);


		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'property_price_typography',
				'label'    => esc_html__( 'Price', 'realhomes-elementor-addon' ),
				'scheme'   => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .rh_prop_card__details_elementor .rh_prop_card__priceLabel .rh_prop_card__price',
			]
		);


		$this->end_controls_section();


		$this->start_controls_section(
			'ere_properties_labels',
			[
				'label' => esc_html__( 'Property Meta Labels', 'realhomes-elementor-addon' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'ere_property_featured_label',
			[
				'label' => esc_html__( 'Featured', 'realhomes-elementor-addon' ),
				'type'  => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Featured', 'realhomes-elementor-addon' ),
			]
		);

		$this->add_control(
			'ere_property_bedrooms_label',
			[
				'label' => esc_html__( 'Bedrooms', 'realhomes-elementor-addon' ),
				'type'  => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Bedrooms', 'realhomes-elementor-addon' ),
			]
		);
		$this->add_control(
			'ere_property_bathrooms_label',
			[
				'label' => esc_html__( 'Bathrooms', 'realhomes-elementor-addon' ),
				'type'  => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Bathrooms', 'realhomes-elementor-addon' ),
			]
		);
		$this->add_control(
			'ere_property_area_label',
			[
				'label' => esc_html__( 'Area', 'realhomes-elementor-addon' ),
				'type'  => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Area', 'realhomes-elementor-addon' ),
			]
		);
		$this->add_control(
			'ere_property_view_prop_label',
			[
				'label' => esc_html__( 'View Property', 'realhomes-elementor-addon' ),
				'type'  => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'View Property', 'realhomes-elementor-addon' ),
			]
		);
		$this->add_control(
			'ere_property_fav_label',
			[
				'label' => esc_html__( 'Add To Favourite', 'realhomes-elementor-addon' ),
				'type'  => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Add To Favourite', 'realhomes-elementor-addon' ),
			]
		);
		$this->add_control(
			'ere_property_fav_added_label',
			[
				'label' => esc_html__( 'Added To Favourite', 'realhomes-elementor-addon' ),
				'type'  => \Elementor\Controls_Manager::TEXT,
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




	}


	protected function render() {

	    global $settings;
	    global $properties_query;

		$settings = $this->get_settings_for_display();

		// Remove sticky properties filter.
		if ( $settings['skip_sticky_properties'] == 'yes' ) {
			remove_filter( 'the_posts', 'inspiry_make_properties_stick_at_top', 10 );
		}

		if ( get_query_var('paged') ) {
			$paged = get_query_var('paged');
		} elseif ( get_query_var('page') ) { // if is static front page
			$paged = get_query_var('page');
		} else {
			$paged = 1;
		}

		if($settings['offset']){
		    $offset = $settings['offset'];
        }else{
		    $offset = '';
        }

		// Basic Query
		$properties_args = array(
			'post_type'      => 'property',
			'posts_per_page' => $settings['posts_per_page'],
			'order'          => $settings['order'],
			'offset'         => $offset,
			'post_status'    => 'publish',
			'paged'          => $paged,
		);

		// Sorting
		if ( 'price' === $settings['orderby'] ) {
			$properties_args['orderby']  = 'meta_value_num';
			$properties_args['meta_key'] = 'REAL_HOMES_property_price';
		} else {
			// for date, title, menu_order and rand
			$properties_args['orderby'] = $settings['orderby'];
		}

		// Filter based on custom taxonomies
		$property_taxonomies = get_object_taxonomies( 'property', 'objects' );
		if ( ! empty( $property_taxonomies ) && ! is_wp_error( $property_taxonomies ) ) {
			foreach ( $property_taxonomies as $single_tax ) {
				$setting_key = $single_tax->name;
				if ( ! empty( $settings[ $setting_key ] ) ) {
					$properties_args['tax_query'][] = [
						'taxonomy' => $setting_key,
						'field'    => 'slug',
						'terms'    => $settings[ $setting_key ],
					];
				}
			}

			if ( isset( $properties_args['tax_query'] ) && count( $properties_args['tax_query'] ) > 1 ) {
				$properties_args['tax_query']['relation'] = 'AND';
			}
		}

		$meta_query = array();
		if ( 'yes' === $settings['show_only_featured'] ) {
			$meta_query[] = array(
				'key'     => 'REAL_HOMES_featured',
				'value'   => 1,
				'compare' => '=',
				'type'    => 'NUMERIC',
			);

			$properties_args['meta_query'] = $meta_query;
		}


		$properties_query = new WP_Query( $properties_args );



		?>

        <section id="rh-<?php echo $this->get_id();?>" class="rh_latest-properties rhea_properties_default rhea_ele_property_ajax_target rhea_latest_properties_ajax elementor_properties_grid elementor_property_card_parent rhea_has_tooltip">
            <div class="container-latest-properties">
                <div class="wrapper-section-contents">
                    <div class="home-properties-section-inner home-properties-section-inner-target">
						<?php

						if ( $properties_query->have_posts() ) {

							?>
                            <div class="rh_properties_element rh_properties_pagination_append">
								<?php
								while ( $properties_query->have_posts() ) {

									$properties_query->the_post();

								?>
                                <div class="wrapper_properties_ele">
									<?php
									rhea_get_template_part( 'assets/partials/grid-property-card' );
									?>
                                </div>

									<?php
									}
									wp_reset_postdata();
									?>
                            </div>
							<?php
						}
						?>
                    </div>
                </div>
            </div>
        <?php
        if('yes' == $settings['show_pagination']){
	        ?>

            <div class="rhea_svg_loader">
		        <?php include RHEA_ASSETS_DIR . '/icons/loading-bars.svg'; ?>
            </div>
	        <?php

	        rhea_get_template_part( 'assets/partials/ajax-pagination' );
        }
        ?>
        </section>


		<?php
	}
}