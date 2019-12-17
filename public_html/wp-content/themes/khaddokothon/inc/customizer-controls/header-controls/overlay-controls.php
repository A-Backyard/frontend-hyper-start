<?php

$section = 'khaddokothon_header_overlay';

// Header Overlay Active
Kirki::add_field( 'khaddokothon_config', array(
	'type'     => 'switch',
	'settings' => 'khaddokothon_header_overlay_active',
	'label'    => esc_html__( 'Active Overlay Over Header Banner', 'khaddokothon' ),
	'section'  => $section,
	'default'  => 1,
	'choices'  => [
		'on'  => esc_html__( 'On', 'khaddokothon' ),
		'off' => esc_html__( 'Off', 'khaddokothon' ),
	],
) );

// Overlay Color
Kirki::add_field( 'khaddokothon_config', array(
	'type'      => 'color',
	'settings'  => 'khaddokothon_header_overlay_color',
	'label'     => esc_html__( 'Choose Overlay Color', 'khaddokothon' ),
	'section'   => $section,
	'choices'     => [
		'alpha' => true,
	],
	'active_callback' => [
		[
			'setting'  => 'khaddokothon_header_overlay_active',
			'operator' => '==',
			'value'    => true,
		]
	],
	'output'    => [
		[
			'element'  => '.khaddokothon-bg-overlay:before',
			'function' => 'css',
			'property' => 'background-color',
		]
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.khaddokothon-bg-overlay:before',
			'function' => 'css',
			'property' => 'background-color',
		],
	],
) );

