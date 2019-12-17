<?php

$section = 'khaddokothon_home_featured';

// Featured Carousel Display or Not
Kirki::add_field( 'khaddokothon_config', array(
	'type'     => 'switch',
	'settings' => 'khaddokothon_home_featured_display',
	'label'    => esc_html__( 'Show Featured Section', 'khaddokothon' ),
	'section'  => $section,
	'default'  => 2,
	'choices'  => array(
		'on'  => esc_html__( 'Show', 'khaddokothon' ),
		'off' => esc_html__( 'Hide', 'khaddokothon' ),
	),
) );

// Featured Carousel Posts Number
Kirki::add_field( 'khaddokothon_config', array(
	'type'            => 'number',
	'settings'        => 'khaddokothon_home_featured_post_num',
	'label'           => esc_html__( 'Total Number of Posts', 'khaddokothon' ),
	'description'     => esc_html__( 'Must include 3 or more', 'khaddokothon' ),
	'section'         => $section,
	'default'         => 3,
	'choices'         => [
		'min'  => 3,
		'max'  => 10,
		'step' => 1,
	],
	'active_callback' => [
		[
			'setting'  => 'khaddokothon_home_featured_display',
			'operator' => '==',
			'value'    => true,
		]
	],
) );

// Featured Carousel Categories
Kirki::add_field( 'khaddokothon_config', array(
	'type'            => 'select',
	'settings'        => 'khaddokothon_home_featured_post_cat',
	'label'           => esc_html__( 'Choose featured category', 'khaddokothon' ),
	'description'     => esc_html__( 'Must have 3 or more posts in the category', 'khaddokothon' ),
	'section'         => $section,
	'default'         => 0,
	'choices'         => khaddokothon_categories_dropdown(),
	'active_callback' => [
		[
			'setting'  => 'khaddokothon_home_featured_display',
			'operator' => '==',
			'value'    => true,
		]
	],
) );

// Featured Section Heading
Kirki::add_field( 'khaddokothon_config', array(
	'type'            => 'text',
	'settings'        => 'khaddokothon_featured_heading',
	'label'           => esc_html__( 'Heading', 'khaddokothon' ),
	'section'         => $section,
	'default'         => esc_html__( 'Featured Post', 'khaddokothon' ),
	'active_callback' => [
		[
			'setting'  => 'khaddokothon_home_featured_display',
			'operator' => '==',
			'value'    => true,
		]
	],
	'transport'       => 'postMessage',
	'js_vars'         => [
		[
			'element'  => '.khaddokothon-featured-heading',
			'function' => 'html',
		],
	],
) );

// Featured Section Description
Kirki::add_field( 'khaddokothon_config', array(
	'type'            => 'textarea',
	'settings'        => 'khaddokothon_featured_desc',
	'label'           => esc_html__( 'Description', 'khaddokothon' ),
	'section'         => $section,
	'default'         => esc_html__( 'Lorem ipsum dolor sit amet, consectetur 
adipisicing elit. Iusto sit nostrum, quasi, impedit ipsa consequuntur quaerat sunt minima culpa eum!', 'khaddokothon' ),
	'active_callback' => [
		[
			'setting'  => 'khaddokothon_home_featured_display',
			'operator' => '==',
			'value'    => true,
		]
	],
	'transport'       => 'postMessage',
	'js_vars'         => [
		[
			'element'  => '.khaddokothon-featured-description',
			'function' => 'html',
		],
	],
) );