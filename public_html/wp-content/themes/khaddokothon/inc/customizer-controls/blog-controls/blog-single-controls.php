<?php
$section = 'khaddokothon_blog_single';

// Blog Single Sidebar Position
Kirki::add_field( 'khaddokothon_config', array(
	'type'     => 'radio-image',
	'settings' => 'khaddokothon_single_layout',
	'label'    => esc_html__( 'Choose Layout', 'khaddokothon' ),
	'section'  => $section,
	'default'  => 'right-sidebar',
	'choices'  => [
		'left-sidebar'   => get_template_directory_uri() . '/assets/img/customizer/left-sidebar.png',
		'right-sidebar' => get_template_directory_uri() . '/assets/img/customizer/right-sidebar.png',
		'fullwidth'  => get_template_directory_uri() . '/assets/img/customizer/fullwidth.png',
	],
) );


// Blog Single Category Display or not
Kirki::add_field( 'khaddokothon_config', array(
	'type'     => 'toggle',
	'settings' => 'khaddokothon_single_categories_show',
	'label'    => esc_html__( 'Show Categories', 'khaddokothon' ),
	'section'  => $section,
	'default'  => 1,
) );

// Blog Single Tag Display or not
Kirki::add_field( 'khaddokothon_config', array(
	'type'     => 'toggle',
	'settings' => 'khaddokothon_single_tags_show',
	'label'    => esc_html__( 'Show Tags', 'khaddokothon' ),
	'section'  => $section,
	'default'  => 1,
) );