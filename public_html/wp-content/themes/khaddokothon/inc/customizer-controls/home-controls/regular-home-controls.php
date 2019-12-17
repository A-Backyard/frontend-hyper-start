<?php

$section = 'khaddokothon_home_regular';

// Regular section display or not
Kirki::add_field( 'khaddokothon_config', array(
	'type'     => 'switch',
	'settings' => 'khaddokothon_home_regular_display',
	'label'    => esc_html__( 'Show Regular Section', 'khaddokothon' ),
	'section'  => $section,
	'default'  => 2,
	'choices'  => array(
		'on'  => esc_html__( 'Show', 'khaddokothon' ),
		'off' => esc_html__( 'Hide', 'khaddokothon' ),
	),
) );

// Regular section posts number
Kirki::add_field( 'khaddokothon_config', array(
	'type'            => 'number',
	'settings'        => 'khaddokothon_home_regular_post_num',
	'label'           => esc_html__( 'Total Number of Posts', 'khaddokothon' ),
	'description'     => esc_html__( 'Too many posts can make the page longer than usual, so choose wisely!', 'khaddokothon' ),
	'section'         => $section,
	'default'         => 4,
	'choices'         => [
		'min'  => 1,
		'max'  => 99,
		'step' => 1,
	],
	'active_callback' => [
		[
			'setting'  => 'khaddokothon_home_regular_display',
			'operator' => '==',
			'value'    => true,
		]
	],
) );

// Regular section categories
Kirki::add_field( 'khaddokothon_config', array(
	'type'            => 'select',
	'settings'        => 'khaddokothon_home_regular_post_cat',
	'label'           => esc_html__( 'Choose Categories', 'khaddokothon' ),
	'description'     => esc_html__( 'You can select multiple categories', 'khaddokothon' ),
	'section'         => $section,
	'multiple'        => 999,
	'default'         => 0,
	'choices'         => khaddokothon_categories_dropdown(),
	'active_callback' => [
		[
			'setting'  => 'khaddokothon_home_regular_display',
			'operator' => '==',
			'value'    => true,
		]
	],
) );

// Regular section category display or not
Kirki::add_field( 'khaddokothon_config', array(
	'type'     => 'switch',
	'settings' => 'khaddokothon_home_regular_cat_display',
	'label'    => esc_html__( 'Show Category Names', 'khaddokothon' ),
	'section'  => $section,
	'default'  => 1,
	'choices'  => array(
		'on'  => esc_html__( 'Show', 'khaddokothon' ),
		'off' => esc_html__( 'Hide', 'khaddokothon' ),
	),
	'active_callback' => [
		[
			'setting'  => 'khaddokothon_home_regular_display',
			'operator' => '==',
			'value'    => true,
		]
	],
) );

// Regular section category Typography
Kirki::add_field( 'khaddokothon_config', array(
	'type'     => 'typography',
	'settings' => 'khaddokothon_home_regular_cat_font',
	'label'    => esc_html__( 'Font For Category Names', 'khaddokothon' ),
	'section'  => $section,
	'default'     => [
		'font-family'    => 'Niconne',
		'variant'        => '400',
	],
	'transport'       => 'postMessage',
	'js_vars'         => [
		[
			'element'  => '#khaddokothon-regular-blog-home article .khaddokothon-regular-blog-info .khaddokothon-regular-blog-cat li a',
			'function' => 'css',
		],
	],
	'active_callback' => [
		[
			'setting'  => 'khaddokothon_home_regular_display',
			'operator' => '==',
			'value'    => true,
		],
		[
			'setting'  => 'khaddokothon_home_regular_cat_display',
			'operator' => '==',
			'value'    => true,
		]
	],
) );

// Regular section posts excerpt words display or not
Kirki::add_field( 'khaddokothon_config', array(
	'type'     => 'switch',
	'settings' => 'khaddokothon_home_regular_excerpt_display',
	'label'    => esc_html__( 'Show Excerpt', 'khaddokothon' ),
	'section'  => $section,
	'default'  => 1,
	'choices'  => array(
		'on'  => esc_html__( 'Show', 'khaddokothon' ),
		'off' => esc_html__( 'Hide', 'khaddokothon' ),
	),
	'active_callback' => [
		[
			'setting'  => 'khaddokothon_home_regular_display',
			'operator' => '==',
			'value'    => true,
		]
	],
) );

// Regular section read more button display or not
Kirki::add_field( 'khaddokothon_config', array(
	'type'     => 'switch',
	'settings' => 'khaddokothon_home_regular_btn_display',
	'label'    => esc_html__( 'Show Read More Button', 'khaddokothon' ),
	'section'  => $section,
	'default'  => 1,
	'choices'  => array(
		'on'  => esc_html__( 'Show', 'khaddokothon' ),
		'off' => esc_html__( 'Hide', 'khaddokothon' ),
	),
	'active_callback' => [
		[
			'setting'  => 'khaddokothon_home_regular_display',
			'operator' => '==',
			'value'    => true,
		]
	],
) );

// Regular section read more button text
Kirki::add_field( 'khaddokothon_config', array(
	'type'     => 'text',
	'settings' => 'khaddokothon_home_regular_btn_text',
	'label'    => esc_html__( 'Read more button text', 'khaddokothon' ),
	'section'  => $section,
	'default'  => 'Read it ...',
	'active_callback' => [
		[
			'setting'  => 'khaddokothon_home_regular_btn_display',
			'operator' => '==',
			'value'    => true,
		],
		[
			'setting'  => 'khaddokothon_home_regular_display',
			'operator' => '==',
			'value'    => true,
		],
	],
	'transport'       => 'postMessage',
	'js_vars'         => [
		[
			'element'  => '.khaddokothon-regular-blog-info .btn',
			'function' => 'html',
		],
	],
) );

// Regular section navigation display or not
Kirki::add_field( 'khaddokothon_config', array(
	'type'     => 'switch',
	'settings' => 'khaddokothon_home_regular_pagination',
	'label'    => esc_html__( 'Show Navigation', 'khaddokothon' ),
	'section'  => $section,
	'default'  => 2,
	'choices'  => array(
		'on'  => esc_html__( 'Show', 'khaddokothon' ),
		'off' => esc_html__( 'Hide', 'khaddokothon' ),
	),
	'active_callback' => [
		[
			'setting'  => 'khaddokothon_home_regular_display',
			'operator' => '==',
			'value'    => true,
		]
	],
) );

