<?php

$section = 'khaddokothon_home_hero';

// Hero Section Display
Kirki::add_field( 'khaddokothon_config', array(
	'type'     => 'switch',
	'settings' => 'khaddokothon_hero_display',
	'label'    => esc_html__( 'Show Hero Section', 'khaddokothon' ),
	'section'  => $section,
	'default'  => 1,
	'choices'  => [
		'on'  => esc_html__( 'Show', 'khaddokothon' ),
		'off' => esc_html__( 'Hide', 'khaddokothon' ),
	],
) );

// Hero section bcakground
Kirki::add_field( 'khaddokothon_config', [
	'type'            => 'background',
	'settings'        => 'khaddokothon_hero_bg',
	'label'           => esc_html__( 'Hero Background', 'khaddokothon' ),
	'description'     => esc_html__( 'Select a plain color or image for your background', 'khaddokothon' ),
	'section'         => $section,
	'default'         => [
		'background-color'    => 'rgba(0,0,0,.8)',
		'background-image'    => '//via.placeholder.com/1920',
	],
	'active_callback' => [
		[
			'setting'  => 'khaddokothon_hero_display',
			'operator' => '==',
			'value'    => true,
		],
	],
	'output'          => [
		[
			'element' => $khaddokothon_color_selector['khaddokothon_hero_bg'],
			'function' => 'css',
			'property' => 'background-image',
		],
		[
			'element' => $khaddokothon_color_selector['khaddokothon_hero_bg'],
			'function' => 'css',
			'property' => 'background-color',
		],
	],
	'transport'       => 'postMessage',
	'js_vars'         => [
		[
			'element'  => $khaddokothon_color_selector['khaddokothon_hero_bg'],
			'function' => 'css',
			'property' => 'background-image',
		],
		[
			'element' => $khaddokothon_color_selector['khaddokothon_hero_bg'],
			'function' => 'css',
			'property' => 'background-color',
		],
	],
] );

// Hero Heading
Kirki::add_field( 'khaddokothon_config', array(
	'type'            => 'text',
	'settings'        => 'khaddokothon_hero_heading',
	'label'           => esc_html__( 'Hero Heading', 'khaddokothon' ),
	'section'         => $section,
	'default'         => esc_html__( 'Food is Life!', 'khaddokothon' ),
	'active_callback' => [
		[
			'setting'  => 'khaddokothon_hero_display',
			'operator' => '==',
			'value'    => true,
		],
	],
	'transport'       => 'postMessage',
	'js_vars'         => [
		[
			'element'  => '.khaddokothon-hero-heading',
			'function' => 'html',
		],
	],
) );

// Hero Heading color
Kirki::add_field( 'khaddokothon_config', array(
	'type'            => 'color',
	'settings'        => 'khaddokothon_hero_heading_color',
	'label'           => esc_html__( 'Heading color', 'khaddokothon' ),
	'section'         => $section,
	'default'         => '#fff',
	'active_callback' => [
		[
			'setting'  => 'khaddokothon_hero_display',
			'operator' => '==',
			'value'    => true,
		],
	],
	'output'          => [
		[
			'element'  => $khaddokothon_color_selector['hero_heading_color'],
			'function' => 'css',
			'property' => 'color',
		]
	],
	'transport'       => 'postMessage',
	'js_vars'         => [
		[
			'element'  => $khaddokothon_color_selector['hero_heading_color'],
			'function' => 'css',
			'property' => 'color',
		],
	],
) );

// Hero Sub-Heading
Kirki::add_field( 'khaddokothon_config', array(
	'type'            => 'textarea',
	'settings'        => 'khaddokothon_hero_subheading',
	'label'           => esc_html__( 'Hero Sub Heading', 'khaddokothon' ),
	'section'         => $section,
	'default'         => esc_html__( 'Awesome Sub Heading', 'khaddokothon' ),
	'active_callback' => [
		[
			'setting'  => 'khaddokothon_hero_display',
			'operator' => '==',
			'value'    => true,
		],
	],
	'transport'       => 'postMessage',
	'js_vars'         => [
		[
			'element'  => '.khaddokothon-hero-subheading',
			'function' => 'html',
		],
	],
) );

// Hero SubHeading color
Kirki::add_field( 'khaddokothon_config', array(
	'type'            => 'color',
	'settings'        => 'khaddokothon_hero_subheading_color',
	'label'           => esc_html__( 'Sub Heading color', 'khaddokothon' ),
	'section'         => $section,
	'default'         => '#f2f2f2',
	'active_callback' => [
		[
			'setting'  => 'khaddokothon_hero_display',
			'operator' => '==',
			'value'    => true,
		],
	],
	'output'          => [
		[
			'element'  => $khaddokothon_color_selector['hero_subheading_color'],
			'function' => 'css',
			'property' => 'color',
		]
	],
	'transport'       => 'postMessage',
	'js_vars'         => [
		[
			'element'  => $khaddokothon_color_selector['hero_subheading_color'],
			'function' => 'css',
			'property' => 'color',
		],
	],
) );

// Hero Button Text
Kirki::add_field( 'khaddokothon_config', array(
	'type'            => 'text',
	'settings'        => 'khaddokothon_hero_btn_text',
	'label'           => esc_html__( 'Hero Button Text', 'khaddokothon' ),
	'section'         => $section,
	'default'         => esc_html__( 'About Us', 'khaddokothon' ),
	'active_callback' => [
		[
			'setting'  => 'khaddokothon_hero_display',
			'operator' => '==',
			'value'    => true,
		],
	],
	'transport'       => 'postMessage',
	'js_vars'         => [
		[
			'element'  => '.khaddokothon-hero-content .khaddokothon-btn',
			'function' => 'html',
		],
	],
) );

// Hero Button Link
Kirki::add_field( 'khaddokothon_config', array(
	'type'            => 'link',
	'settings'        => 'khaddokothon_hero_btn_link',
	'label'           => esc_html__( 'Hero Button Link', 'khaddokothon' ),
	'section'         => $section,
	'active_callback' => [
		[
			'setting'  => 'khaddokothon_hero_display',
			'operator' => '==',
			'value'    => true,
		],
	],
) );
