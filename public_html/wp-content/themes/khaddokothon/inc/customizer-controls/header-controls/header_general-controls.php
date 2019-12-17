<?php

$section = 'khaddokothon_header_general';

// Sticky Header on Desktop
Kirki::add_field( 'khaddokothon_config', array(
	'type'     => 'toggle',
	'settings' => 'desktop_sticky_header',
	'label'    => esc_html__( 'Sticky Header On Desktop', 'khaddokothon' ),
	'section'  => $section,
	'default'  => 1,
) );

// Sticky Header on Mobile
Kirki::add_field( 'khaddokothon_config', array(
	'type'     => 'toggle',
	'settings' => 'mobile_sticky_header',
	'label'    => esc_html__( 'Sticky Header On Mobile', 'khaddokothon' ),
	'section'  => $section,
	'default'  => 0,
) );

// Transparent Header
Kirki::add_field( 'khaddokothon_config', array(
	'type'     => 'toggle',
	'settings' => 'header_transperant',
	'label'    => esc_html__( 'Transparent Header', 'khaddokothon' ),
	'section'  => $section,
	'default'  => 0,
) );

// Transparent Header Home
Kirki::add_field( 'khaddokothon_config', array(
	'type'     => 'toggle',
	'settings' => 'header_transperant_home',
	'label'    => esc_html__( 'Transparent Header Only Home', 'khaddokothon' ),
	'section'  => $section,
	'default'  => 0,
	'active_callback' => [
		[
			'setting'  => 'header_transperant',
			'operator' => '==',
			'value'    => false,
		]
	],
) );

// Search in Header
Kirki::add_field( 'khaddokothon_config', array(
	'type'     => 'toggle',
	'settings' => 'search_in_header',
	'label'    => esc_html__( 'Show Search in Header', 'khaddokothon' ),
	'section'  => $section,
	'default'  => 1,
) );


// Separator
Kirki::add_field( 'khaddokothon_config', array(
	'type'     => 'custom',
	'settings' => 'header_general_sep1',
	'label'    => '',
	'section'  => $section,
	'default'  => '<hr>',
) );


// Header Bg Color
Kirki::add_field( 'khaddokothon_config', array(
	'type'      => 'color',
	'settings'  => 'khaddokothon_header_bg_color',
	'label'     => esc_html__( 'Header Background Color', 'khaddokothon' ),
	'section'   => $section,
	'output'    => [
		[
			'element'  => $khaddokothon_color_selector['khaddokothon_header_bg_color'],
			'function' => 'css',
			'property' => 'background-color',
		]
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => $khaddokothon_color_selector['khaddokothon_header_bg_color'],
			'function' => 'css',
			'property' => 'background-color',
		],
	],
) );

// Menu Text Color
Kirki::add_field( 'khaddokothon_config', array(
	'type'      => 'color',
	'settings'  => 'khaddokothon_header_menu_txt_color',
	'label'     => esc_html__( 'Header Text Color', 'khaddokothon' ),
	'section'   => $section,
	'output'    => [
		[
			'element'  => $khaddokothon_color_selector['khaddokothon_header_menu_txt_color'],
			'function' => 'css',
			'property' => 'color',
		]
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => $khaddokothon_color_selector['khaddokothon_header_menu_txt_color'],
			'function' => 'css',
			'property' => 'color',
		],
	],
) );


// Separator
Kirki::add_field( 'khaddokothon_config', array(
	'type'     => 'custom',
	'settings' => 'header_general_sep2',
	'label'    => '',
	'section'  => $section,
	'default'  => '<hr>',
) );


// Dropdown Bg Color
Kirki::add_field( 'khaddokothon_config', array(
	'type'      => 'color',
	'settings'  => 'khaddokothon_menu_dropdown_bg_color',
	'label'     => esc_html__( 'Background Color for Drop Down Menu', 'khaddokothon' ),
	'section'   => $section,
	'output'    => [
		[
			'element'  => $khaddokothon_color_selector['khaddokothon_menu_dropdown_bg_color'],
			'function' => 'css',
			'property' => 'background-color',
		]
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => $khaddokothon_color_selector['khaddokothon_menu_dropdown_bg_color'],
			'function' => 'css',
			'property' => 'background-color',
		],
	],
) );

// Dropdown Menu Border
Kirki::add_field( 'khaddokothon_config', array(
	'type'      => 'color',
	'settings'  => 'khaddokothon_menu_drpdwn_border_color',
	'label'     => esc_html__( 'Border Color for Drop Down Menu', 'khaddokothon' ),
	'section'   => $section,
	'output'    => [
		[
			'element'  => $khaddokothon_color_selector['khaddokothon_menu_drpdwn_border_color'],
			'function' => 'css',
			'property' => 'border-color',
		]
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => $khaddokothon_color_selector['khaddokothon_menu_drpdwn_border_color'],
			'function' => 'css',
			'property' => 'border-color',
		],
	],
) );

// Font Color for DropDown Menu
Kirki::add_field( 'khaddokothon_config', array(
	'type'      => 'color',
	'settings'  => 'khaddokothon_menu_drpdwn_font_color',
	'label'     => esc_html__( 'Font Color for Drop Down Menu', 'khaddokothon' ),
	'section'   => $section,
	'output'    => [
		[
			'element'  => $khaddokothon_color_selector['khaddokothon_menu_drpdwn_font_color'],
			'function' => 'css',
			'property' => 'color',
		]
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => $khaddokothon_color_selector['khaddokothon_menu_drpdwn_font_color'],
			'function' => 'css',
			'property' => 'color',
		],
	],
) );


// Separator
Kirki::add_field( 'khaddokothon_config', array(
	'type'     => 'custom',
	'settings' => 'header_general_sep3',
	'label'    => '',
	'section'  => $section,
	'default'  => '<hr>',
) );

// Header Bg Color for Mobile
Kirki::add_field( 'khaddokothon_config', array(
	'type'      => 'color',
	'settings'  => 'khaddokothon_menu_mobile_bg_color',
	'label'     => esc_html__( 'Header Background Color for Mobile', 'khaddokothon' ),
	'section'   => $section,
	'output'    => [
		[
			'element'  => $khaddokothon_color_selector['khaddokothon_menu_mobile_bg_color'],
			'function' => 'css',
			'property' => 'background-color',
		]
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => $khaddokothon_color_selector['khaddokothon_menu_mobile_bg_color'],
			'function' => 'css',
			'property' => 'background-color',
		],
	],
) );

// Toggle Button Color
Kirki::add_field( 'khaddokothon_config', array(
	'type'      => 'color',
	'settings'  => 'khaddokothon_menu_toggle_btn_color',
	'label'     => esc_html__( 'Mobile Menu Toggle Button Color', 'khaddokothon' ),
	'section'   => $section,
	'output'    => [
		[
			'element'  => $khaddokothon_color_selector['khaddokothon_menu_toggle_btn_color'],
			'function' => 'css',
			'property' => 'background-color',
		]
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => $khaddokothon_color_selector['khaddokothon_menu_toggle_btn_color'],
			'function' => 'css',
			'property' => 'background-color',
		],
	],
) );

// Mobile Menu Border Color
Kirki::add_field( 'khaddokothon_config', array(
	'type'      => 'color',
	'settings'  => 'khaddokothon_mobile_menu_border_color',
	'label'     => esc_html__( 'Mobile Menu Border Color', 'khaddokothon' ),
	'section'   => $section,
	'output'    => [
		[
			'element'  => $khaddokothon_color_selector['khaddokothon_mobile_menu_border_color'],
			'function' => 'css',
			'property' => 'border-color',
		]
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => $khaddokothon_color_selector['khaddokothon_mobile_menu_border_color'],
			'function' => 'css',
			'property' => 'border-color',
		],
	],
) );


