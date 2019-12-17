<?php

$section = 'khaddokothon_typography';

// Body Typography
Kirki::add_field( 'khaddokothon_config', array(
	'type'     => 'typography',
	'settings' => 'khaddokothon_body_font',
	'label'    => esc_html__( 'Body Text Font', 'khaddokothon' ),
	'section'  => $section,
	'default'     => [
		'font-family'    => 'Open Sans',
		'variant'        => 'regular',
		'font-size'      => '16px',
		'line-height'    => '28px',
		'letter-spacing' => '0.1px',
	],
	'transport'       => 'postMessage',
	'js_vars'         => [
		[
			'element'  => 'p',
			'function' => 'css',
		],
	],
) );


// Heading Typography
Kirki::add_field( 'khaddokothon_config', array(
	'type'     => 'typography',
	'settings' => 'khaddokothon_heading_font',
	'label'    => esc_html__( 'Heading Font', 'khaddokothon' ),
	'section'  => $section,
	'default'     => [
		'font-family'    => 'Barlow Condensed',
		'variant'        => '700',
	],
	'transport'       => 'postMessage',
	'js_vars'         => [
		[
			'element'  => $khaddokothon_color_selector['khaddokothon_heading_font'],
			'function' => 'css',
		],
	],
) );