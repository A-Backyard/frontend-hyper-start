<?php
$section = 'khaddokothon_blog_search';

// Blog Search Page Title
Kirki::add_field( 'khaddokothon_config', array(
	'type'            => 'text',
	'settings'        => 'khaddokothon_blog_search_title',
	'label'           => esc_html__( 'Title Before Query', 'khaddokothon' ),
	'section'         => $section,
	'default'         => esc_html__( 'Search Results for: ', 'khaddokothon' ),
	'transport'       => 'postMessage',
	'js_vars'         => [
		[
			'element'  => '.khaddokothon-page-header-content h1',
			'function' => 'html',
		],
	],
) );