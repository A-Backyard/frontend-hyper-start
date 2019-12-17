<?php

$section = 'khaddokothon_home_subscribe';

// Subscribe Section Display
Kirki::add_field( 'khaddokothon_config', array(
	'type'     => 'switch',
	'settings' => 'khaddokothon_home_subscribe_display',
	'label'    => esc_html__( 'Show Subscribe Section', 'khaddokothon' ),
	'section'  => $section,
	'default'  => 2,
	'choices'  => [
		'on'  => esc_html__( 'Show', 'khaddokothon' ),
		'off' => esc_html__( 'Hide', 'khaddokothon' ),
	],
) );

// Subscribe Section Heading
Kirki::add_field( 'khaddokothon_config', array(
	'type'            => 'text',
	'settings'        => 'khaddokothon_subscribe_heading',
	'label'           => esc_html__( 'Heading', 'khaddokothon' ),
	'section'         => $section,
	'default'         => esc_html__( 'Subscribe', 'khaddokothon' ),
	'active_callback' => [
		[
			'setting'  => 'khaddokothon_home_subscribe_display',
			'operator' => '==',
			'value'    => true,
		]
	],
	'transport'       => 'postMessage',
	'js_vars'         => [
		[
			'element'  => '#khaddokothon-subscribe-home h2',
			'function' => 'html',
		],
	],
) );

// Choose Page For Subscribe Section
Kirki::add_field( 'khaddokothon_config', array(
	'type'            => 'dropdown-pages',
	'settings'        => 'khaddokothon_subscribe_page',
	'label'           => esc_html__( 'Subscribe Page', 'khaddokothon' ),
	'description'     => esc_html__( 'Choose the page where you have put your subscribe shortcode', 'khaddokothon' ),
	'section'         => $section,
	'active_callback' => [
		[
			'setting'  => 'khaddokothon_home_subscribe_display',
			'operator' => '==',
			'value'    => true,
		]
	],
) );


