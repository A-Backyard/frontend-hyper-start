<?php
$section = 'khaddokothon_404_page';

// 404 Page Title
Kirki::add_field( 'khaddokothon_config', array(
	'type'            => 'text',
	'settings'        => 'khaddokothon_404_page_title',
	'label'           => esc_html__( 'Page Title', 'khaddokothon' ),
	'section'         => $section,
	'default'         => esc_html__( '404', 'khaddokothon' ),
	'transport'       => 'postMessage',
	'js_vars'         => [
		[
			'element'  => '.khaddokothon-404-header .khaddokothon-page-header-content h1',
			'function' => 'html',
		],
	],
) );

// 404 Page Heading
Kirki::add_field( 'khaddokothon_config', array(
	'type'            => 'text',
	'settings'        => 'khaddokothon_404_page_heading',
	'label'           => esc_html__( 'Page Heading', 'khaddokothon' ),
	'section'         => $section,
	'default'         => esc_html__( '404 Page not found', 'khaddokothon' ),
	'transport'       => 'postMessage',
	'js_vars'         => [
		[
			'element'  => '.khaddokothon-404-page h1',
			'function' => 'html',
		],
	],
) );

// 404 Page Description
Kirki::add_field( 'khaddokothon_config', array(
	'type'            => 'text',
	'settings'        => 'khaddokothon_404_page_description',
	'label'           => esc_html__( 'Description', 'khaddokothon' ),
	'section'         => $section,
	'default'         => esc_html__( 'But you can continue your search ...', 'khaddokothon' ),
	'transport'       => 'postMessage',
	'js_vars'         => [
		[
			'element'  => '.khaddokothon-404-page p',
			'function' => 'html',
		],
	],
) );

// 404 Page Search Form Display or Not
Kirki::add_field( 'khaddokothon_config', array(
	'type'            => 'switch',
	'settings'        => 'khaddokothon_404_page_search_display',
	'label'           => esc_html__( 'Show Search Form', 'khaddokothon' ),
	'section'         => $section,
	'default'  => 1,
	'choices'  => [
		'on'  => esc_html__( 'Show', 'khaddokothon' ),
		'off' => esc_html__( 'Hide', 'khaddokothon' ),
	],
) );
