<?php
$section = 'khaddokothon_blog_index';

// Blog Index Page Heading
Kirki::add_field( 'khaddokothon_config', array(
	'type'            => 'text',
	'settings'        => 'khaddokothon_blog_index_heading',
	'label'           => esc_html__( 'Custom Page Heading', 'khaddokothon' ),
	'section'         => $section,
	'default'         => esc_html__( 'Blog Page', 'khaddokothon' ),
	'transport'       => 'postMessage',
	'js_vars'         => [
		[
			'element'  => '.khaddokothon-page-header-content h1',
			'function' => 'html',
		],
	],
) );

// Blog Index Layout
Kirki::add_field( 'khaddokothon_config', array(
	'type'     => 'radio-image',
	'settings' => 'khaddokothon_index_layout',
	'label'    => esc_html__( 'Choose Layout', 'khaddokothon' ),
	'section'  => $section,
	'default'  => 'right-sidebar',
	'choices'  => [
		'left-sidebar'   => get_template_directory_uri() . '/assets/img/customizer/left-sidebar.png',
		'right-sidebar' => get_template_directory_uri() . '/assets/img/customizer/right-sidebar.png',
		'fullwidth'  => get_template_directory_uri() . '/assets/img/customizer/fullwidth.png',
	],
) );

// Blog Index Post Type
Kirki::add_field( 'khaddokothon_config', array(
	'type'     => 'radio-image',
	'settings' => 'khaddokothon_index_post_type',
	'label'    => esc_html__( 'Choose Post Type', 'khaddokothon' ),
	'section'  => $section,
	'default'  => 'grid',
	'choices'  => [
		'grid'   => get_template_directory_uri() . '/assets/img/customizer/grid.png',
		'list' => get_template_directory_uri() . '/assets/img/customizer/list.png',
	],
) );

// Grid Column
Kirki::add_field( 'khaddokothon_config', array(
	'type'     => 'select',
	'settings' => 'khaddokothon_index_grid_column',
	'label'    => esc_html__( 'Grid Column', 'khaddokothon' ),
	'section'  => $section,
	'default'  => 1,
	'choices'  => [
		'1'   => '2 column',
		'2' => '3 column',
	],
	'active_callback'  => [
		[
			'setting'  => 'khaddokothon_index_post_type',
			'operator' => '==',
			'value'    => 'grid',
		],
	]
) );

// Blog Index meta display or not
Kirki::add_field( 'khaddokothon_config', array(
	'type'     => 'toggle',
	'settings' => 'khaddokothon_index_meta_display',
	'label'    => esc_html__( 'Show Meta', 'khaddokothon' ),
	'section'  => $section,
	'default'  => 1,
) );

// Blog Index excerpt words display or not
Kirki::add_field( 'khaddokothon_config', array(
	'type'     => 'toggle',
	'settings' => 'khaddokothon_index_excerpt_display',
	'label'    => esc_html__( 'Show Excerpt', 'khaddokothon' ),
	'section'  => $section,
	'default'  => 1,
) );