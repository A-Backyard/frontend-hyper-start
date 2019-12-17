<?php

$section = 'khaddokothon_colors';


// Theme Color
Kirki::add_field( 'khaddokothon_config', array(
	'type'      => 'color',
	'settings'  => 'khaddokothon_theme_color',
	'label'     => esc_html__( 'Theme Color', 'khaddokothon' ),
	'section'   => $section,
	'output'    => [
		[
			'element'  => $khaddokothon_color_selector['khaddokothon_theme_color'],
			'function' => 'css',
			'property' => 'color',
		],
		[
			'element'  => $khaddokothon_color_selector['khaddokothon_theme_bg_color'],
			'function' => 'css',
			'property' => 'background-color',
		],
		[
			'element'  => $khaddokothon_color_selector['khaddokothon_theme_border_color'],
			'function' => 'css',
			'property' => 'border-color',
		]
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => $khaddokothon_color_selector['khaddokothon_theme_color'],
			'function' => 'css',
			'property' => 'color',
		],
		[
			'element'  => $khaddokothon_color_selector['khaddokothon_theme_bg_color'],
			'function' => 'css',
			'property' => 'background-color',
		],
		[
			'element'  => $khaddokothon_color_selector['khaddokothon_theme_border_color'],
			'function' => 'css',
			'property' => 'border-color',
		]
	],
) );

// Theme Hover Color
Kirki::add_field( 'khaddokothon_config', array(
	'type'      => 'color',
	'settings'  => 'khaddokothon_theme_hover_color',
	'label'     => esc_html__( 'Theme Hover Color', 'khaddokothon' ),
	'section'   => $section,
	'output'    => [
		[
			'element'  => $khaddokothon_color_selector['khaddokothon_theme_hover_color'],
			'function' => 'css',
			'property' => 'color',
		],
		[
			'element'  => $khaddokothon_color_selector['khaddokothon_theme_bg_hover_color'],
			'function' => 'css',
			'property' => 'background-color',
		],
		[
			'element'  => $khaddokothon_color_selector['khaddokothon_theme_border_hover_color'],
			'function' => 'css',
			'property' => 'border-color',
		],
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => $khaddokothon_color_selector['khaddokothon_theme_hover_color'],
			'function' => 'css',
			'property' => 'color',
		],
		[
			'element'  => $khaddokothon_color_selector['khaddokothon_theme_bg_hover_color'],
			'function' => 'css',
			'property' => 'background-color',
		],
		[
			'element'  => $khaddokothon_color_selector['khaddokothon_theme_border_hover_color'],
			'function' => 'css',
			'property' => 'border-color',
		],
	],
) );

// Theme Text Color
Kirki::add_field( 'khaddokothon_config', array(
	'type'      => 'color',
	'settings'  => 'khaddokothon_theme_text_color',
	'label'     => esc_html__( 'Theme Text Color', 'khaddokothon' ),
	'section'   => $section,
	'output'    => [
		[
			'element'  => $khaddokothon_color_selector['khaddokothon_theme_text_color'],
			'function' => 'css',
			'property' => 'color',
		],
		[
			'element'  => $khaddokothon_color_selector['khaddokothon_theme_text_color_in_bg'],
			'function' => 'css',
			'property' => 'background-color',
		],
		[
			'element'  => $khaddokothon_color_selector['khaddokothon_theme_text_color_in_border'],
			'function' => 'css',
			'property' => 'border-color',
		],
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => $khaddokothon_color_selector['khaddokothon_theme_text_color'],
			'function' => 'css',
			'property' => 'color',
		],
		[
			'element'  => $khaddokothon_color_selector['khaddokothon_theme_text_color_in_bg'],
			'function' => 'css',
			'property' => 'background-color',
		],
		[
			'element'  => $khaddokothon_color_selector['khaddokothon_theme_text_color_in_border'],
			'function' => 'css',
			'property' => 'border-color',
		],
	],
) );

// Theme Link Color
Kirki::add_field( 'khaddokothon_config', array(
	'type'      => 'color',
	'settings'  => 'khaddokothon_theme_link_color',
	'label'     => esc_html__( 'Theme Link Color', 'khaddokothon' ),
	'section'   => $section,
	'output'    => [
		[
			'element'  => $khaddokothon_color_selector['khaddokothon_theme_link_color'],
			'function' => 'css',
			'property' => 'color',
		],
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => $khaddokothon_color_selector['khaddokothon_theme_link_color'],
			'function' => 'css',
			'property' => 'color',
		],
	],
) );