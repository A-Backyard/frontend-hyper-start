<?php

$section = 'khaddokothon_home_cat';

// Hero Section Display
Kirki::add_field( 'khaddokothon_config', array(
	'type'     => 'switch',
	'settings' => 'khaddokothon_home_cat_display',
	'label'    => esc_html__( 'Show 3 column Category Section', 'khaddokothon' ),
	'section'  => $section,
	'default'  => 2,
	'choices'  => [
		'on'  => esc_html__( 'Show', 'khaddokothon' ),
		'off' => esc_html__( 'Hide', 'khaddokothon' ),
	],
) );


// Category Section Heading
Kirki::add_field( 'khaddokothon_config', array(
	'type'            => 'text',
	'settings'        => 'khaddokothon_cat_heading',
	'label'           => esc_html__( 'Heading', 'khaddokothon' ),
	'section'         => $section,
	'default'         => esc_html__( 'Editors Pick', 'khaddokothon' ),
	'active_callback' => [
		[
			'setting'  => 'khaddokothon_home_cat_display',
			'operator' => '==',
			'value'    => true,
		]
	],
	'transport'       => 'postMessage',
	'js_vars'         => [
		[
			'element'  => '#khaddokothon-category-blog-home .khaddokothon-cat-heading',
			'function' => 'html',
		],
	],
) );


// Category Section Description
Kirki::add_field( 'khaddokothon_config', array(
	'type'            => 'textarea',
	'settings'        => 'khaddokothon_cat_description',
	'label'           => esc_html__( 'Description', 'khaddokothon' ),
	'section'         => $section,
	'default'         => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'khaddokothon' ),
	'active_callback' => [
		[
			'setting'  => 'khaddokothon_home_cat_display',
			'operator' => '==',
			'value'    => true,
		]
	],
	'transport'       => 'postMessage',
	'js_vars'         => [
		[
			'element'  => '#khaddokothon-category-blog-home .khaddokothon-cat-description',
			'function' => 'html',
		],
	],
) );


// Regular section categories
Kirki::add_field( 'khaddokothon_config', array(
	'type'            => 'select',
	'settings'        => 'khaddokothon_home_category_post_cat',
	'label'           => esc_html__( 'Choose categories', 'khaddokothon' ),
	'description'     => esc_html__( 'You can select multiple categories', 'khaddokothon' ),
	'section'         => $section,
	'multiple'        => 999,
	'default'         => 0,
	'choices'         => khaddokothon_categories_dropdown(),
	'active_callback' => [
		[
			'setting'  => 'khaddokothon_home_cat_display',
			'operator' => '==',
			'value'    => true,
		]
	],
) );