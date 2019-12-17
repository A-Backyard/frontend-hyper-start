<?php
$section = 'khaddokothon_footer_widgets';

// Display Footer Widgets Area or Not
Kirki::add_field( 'khaddokothon_config', array(
	'type'     => 'switch',
	'settings' => 'khaddokothon_footer_widgets_display',
	'label'    => esc_html__( 'Show Footer Widget Area', 'khaddokothon' ),
	'section'  => $section,
	'default'  => false,
	'choices'  => [
		'on'  => esc_html__( 'Show', 'khaddokothon' ),
		'off' => esc_html__( 'Hide', 'khaddokothon' ),
	],
) );

// Footer Widgets Column Numbers
Kirki::add_field( 'khaddokothon_config', array(
	'type'     => 'select',
	'settings' => 'khaddokothon_footer_widgets_column',
	'label'    => esc_html__( 'Choose Footer Widgets Column', 'khaddokothon' ),
	'section'  => $section,
	'default'  => 3,
	'choices'  => [
		'12' => esc_html__( '1', 'khaddokothon' ),
		'6' => esc_html__( '2', 'khaddokothon' ),
		'4' => esc_html__( '3', 'khaddokothon' ),
		'3' => esc_html__( '4', 'khaddokothon' ),
	],
) );

// Footer Widgets Background Settings
Kirki::add_field( 'khaddokothon_config', [
	'type'        => 'background',
	'settings'    => 'khaddokothon_footer_widgets_bg',
	'label'       => esc_html__( 'Background', 'khaddokothon' ),
	'description' => esc_html__( 'Select a plain color or image for your background', 'khaddokothon' ),
	'section'     => $section,
	'default'     => [
		'background-color'    => 'rgba(237,237,237,1)',
		'background-image'    => get_template_directory_uri() . '/assets/img/customizer/footer-bg.jpg',
		'background-repeat'   => 'no-repeat',
		'background-position' => 'center center',
		'background-size'     => 'cover',
	],
	'output'      => [
		[
			'element' => '#khaddokothon-footer-widgets',
		],
	],
	'transport'   => 'postMessage',
	'js_vars'     => [
		[
			'element'  => '#khaddokothon-footer-widgets',
			'function' => 'css',
			'property' => 'background-color',
		],
		[
			'element'  => '#khaddokothon-footer-widgets',
			'function' => 'css',
			'property' => 'background-image',
		],
	],
] );

// Footer Widgets Text Color
Kirki::add_field( 'khaddokothon_config', array(
	'type'      => 'color',
	'settings'  => 'khaddokothon_footer_widget_elements_color',
	'label'     => esc_html__( 'Widget Elements Color', 'khaddokothon' ),
	'description' => esc_html__( 'Text, link, border & background color', 'khaddokothon' ),
	'section'   => $section,
	'default'   => '#333333',
	'output'    => [
		[
			'element'  => $khaddokothon_color_selector['khaddokothon_footer_widget_elements_text_color'],
			'function' => 'css',
			'property' => 'color',
		],
		[
			'element'  => $khaddokothon_color_selector['khaddokothon_footer_widget_elements_link_color'],
			'function' => 'css',
			'property' => 'color',
		],
		[
			'element'  => $khaddokothon_color_selector['khaddokothon_footer_widget_elements_bg_color'],
			'function' => 'css',
			'property' => 'background-color',
		],
		[
			'element'  => $khaddokothon_color_selector['khaddokothon_footer_widget_elements_border_color'],
			'function' => 'css',
			'property' => 'border-color',
		]

	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => $khaddokothon_color_selector['khaddokothon_footer_widget_elements_text_color'],
			'function' => 'css',
			'property' => 'color',
		],
		[
			'element'  => $khaddokothon_color_selector['khaddokothon_footer_widget_elements_link_color'],
			'function' => 'css',
			'property' => 'color',
		],
		[
			'element'  => $khaddokothon_color_selector['khaddokothon_footer_widget_elements_bg_color'],
			'function' => 'css',
			'property' => 'background-color',
		],
		[
			'element'  => $khaddokothon_color_selector['khaddokothon_footer_widget_elements_border_color'],
			'function' => 'css',
			'property' => 'border-color',
		]
	],
) );


