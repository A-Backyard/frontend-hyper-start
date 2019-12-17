<?php
$section = 'khaddokothon_footer_copy_social';

//Footer Background Color
Kirki::add_field( 'khaddokothon_config', array(
	'type'      => 'color',
	'settings'  => 'khaddokothon_footer_bg_color',
	'label'     => esc_html__( 'Background Color', 'khaddokothon' ),
	'section'   => $section,
	'default'   => '#333333',
	'output'    => [
		[
			'element'  => $khaddokothon_color_selector['khaddokothon_footer_bg_color'],
			'function' => 'css',
			'property' => 'background-color',
		]
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => $khaddokothon_color_selector['khaddokothon_footer_bg_color'],
			'function' => 'css',
			'property' => 'background-color',
		],
	],
) );

//Footer Text Color
Kirki::add_field( 'khaddokothon_config', array(
	'type'      => 'color',
	'settings'  => 'khaddokothon_footer_text_color',
	'label'     => esc_html__( 'Text Color', 'khaddokothon' ),
	'section'   => $section,
	'default'   => '#ffffff',
	'output'    => [
		[
			'element'  => $khaddokothon_color_selector['khaddokothon_footer_text_color'],
			'function' => 'css',
			'property' => 'color',
		]
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => $khaddokothon_color_selector['khaddokothon_footer_text_color'],
			'function' => 'css',
			'property' => 'color',
		],
	],
) );

//Footer Link Color
Kirki::add_field( 'khaddokothon_config', array(
	'type'      => 'color',
	'settings'  => 'khaddokothon_footer_link_color',
	'label'     => esc_html__( 'Link Color', 'khaddokothon' ),
	'section'   => $section,
	'default'   => '#ffffff',
	'output'    => [
		[
			'element'  => $khaddokothon_color_selector['khaddokothon_footer_link_color'],
			'function' => 'css',
			'property' => 'color',
		]
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => $khaddokothon_color_selector['khaddokothon_footer_link_color'],
			'function' => 'css',
			'property' => 'color',
		],
	],
) );

// Footer Social Display or Not
Kirki::add_field( 'khaddokothon_config', array(
	'type'     => 'toggle',
	'settings' => 'khaddokothon_footer_social_display',
	'label'    => esc_html__( 'Show Social Icons in Footer', 'khaddokothon' ),
	'section'  => $section,
	'default'  => 0,
) );

//Footer Social Icon Color
Kirki::add_field( 'khaddokothon_config', array(
	'type'      => 'color',
	'settings'  => 'khaddokothon_footer_icon_color',
	'label'     => esc_html__( 'Icon Color', 'khaddokothon' ),
	'section'   => $section,
	'default'   => '#ffffff',
	'active_callback' => [
		[
			'setting'  => 'khaddokothon_footer_social_display',
			'operator' => '==',
			'value'    => true,
		]
	],
	'output'    => [
		[
			'element'  => $khaddokothon_color_selector['khaddokothon_footer_icon_color'],
			'function' => 'css',
			'property' => 'color',
		]
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => $khaddokothon_color_selector['khaddokothon_footer_icon_color'],
			'function' => 'css',
			'property' => 'color',
		],
	],
) );

//Footer Social Icon BG Color
Kirki::add_field( 'khaddokothon_config', array(
	'type'      => 'color',
	'settings'  => 'khaddokothon_footer_icon_bg_color',
	'label'     => esc_html__( 'Icon Background Color', 'khaddokothon' ),
	'section'   => $section,
	'default'   => '#7cb342',
	'active_callback' => [
		[
			'setting'  => 'khaddokothon_footer_social_display',
			'operator' => '==',
			'value'    => true,
		]
	],
	'output'    => [
		[
			'element'  => $khaddokothon_color_selector['khaddokothon_footer_icon_bg_color'],
			'function' => 'css',
			'property' => 'background-color',
		]
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => $khaddokothon_color_selector['khaddokothon_footer_icon_bg_color'],
			'function' => 'css',
			'property' => 'background-color',
		],
	],
) );

// Footer Facebook Display or Not
Kirki::add_field( 'khaddokothon_config', array(
	'type'     => 'checkbox',
	'settings' => 'khaddokothon_footer_facebook',
	'label'    => esc_html__( 'Active Facebook', 'khaddokothon' ),
	'section'  => $section,
	'default'  => true,
	'active_callback' => [
		[
			'setting'  => 'khaddokothon_footer_social_display',
			'operator' => '==',
			'value'    => true,
		]
	],
) );

// Footer Facebook Link
Kirki::add_field( 'khaddokothon_config', array(
	'type'     => 'link',
	'settings' => 'khaddokothon_footer_facebook_link',
	'label'    => esc_html__( 'Facebook Link', 'khaddokothon' ),
	'section'  => $section,
	'default'  => 'https://www.facebook.com/tabthemesofficial/',
	'active_callback' => [
		[
			'setting'  => 'khaddokothon_footer_social_display',
			'operator' => '==',
			'value'    => true,
		],
		[
			'setting'  => 'khaddokothon_footer_facebook',
			'operator' => '==',
			'value'    => true,
		]
	],
) );

// Footer Twitter Display or Not
Kirki::add_field( 'khaddokothon_config', array(
	'type'     => 'checkbox',
	'settings' => 'khaddokothon_footer_twitter',
	'label'    => esc_html__( 'Active Twitter', 'khaddokothon' ),
	'section'  => $section,
	'default'  => true,
	'active_callback' => [
		[
			'setting'  => 'khaddokothon_footer_social_display',
			'operator' => '==',
			'value'    => true,
		]
	],
) );

// Footer Twitter Link
Kirki::add_field( 'khaddokothon_config', array(
	'type'     => 'link',
	'settings' => 'khaddokothon_footer_twitter_link',
	'label'    => esc_html__( 'Twitter Link', 'khaddokothon' ),
	'section'  => $section,
	'default'  => 'https://twitter.com/tabthemes',
	'active_callback' => [
		[
			'setting'  => 'khaddokothon_footer_social_display',
			'operator' => '==',
			'value'    => true,
		],
		[
			'setting'  => 'khaddokothon_footer_twitter',
			'operator' => '==',
			'value'    => true,
		]
	],
) );

// Footer Pinterest Display or Not
Kirki::add_field( 'khaddokothon_config', array(
	'type'     => 'checkbox',
	'settings' => 'khaddokothon_footer_pinterest',
	'label'    => esc_html__( 'Active Pinterest', 'khaddokothon' ),
	'section'  => $section,
	'default'  => false,
	'active_callback' => [
		[
			'setting'  => 'khaddokothon_footer_social_display',
			'operator' => '==',
			'value'    => true,
		]
	],
) );

// Footer Pinterest Link
Kirki::add_field( 'khaddokothon_config', array(
	'type'     => 'link',
	'settings' => 'khaddokothon_footer_pinterest_link',
	'label'    => esc_html__( 'Pinterest Link', 'khaddokothon' ),
	'section'  => $section,
	'default'  => 'https://www.pinterest.com/',
	'active_callback' => [
		[
			'setting'  => 'khaddokothon_footer_pinterest',
			'operator' => '==',
			'value'    => true,
		]
	],
) );

// Footer Instagram Display or Not
Kirki::add_field( 'khaddokothon_config', array(
	'type'     => 'checkbox',
	'settings' => 'khaddokothon_footer_instagram',
	'label'    => esc_html__( 'Active Instagram', 'khaddokothon' ),
	'section'  => $section,
	'default'  => false,
	'active_callback' => [
		[
			'setting'  => 'khaddokothon_footer_social_display',
			'operator' => '==',
			'value'    => true,
		]
	],
) );

// Footer Instagram Link
Kirki::add_field( 'khaddokothon_config', array(
	'type'     => 'link',
	'settings' => 'khaddokothon_footer_instagram_link',
	'label'    => esc_html__( 'Instagram Link', 'khaddokothon' ),
	'section'  => $section,
	'default'  => 'https://www.instagram.com/',
	'active_callback' => [
		[
			'setting'  => 'khaddokothon_footer_instagram',
			'operator' => '==',
			'value'    => true,
		]
	],
) );

// Footer Linkedin Display or Not
Kirki::add_field( 'khaddokothon_config', array(
	'type'     => 'checkbox',
	'settings' => 'khaddokothon_footer_linkedin',
	'label'    => esc_html__( 'Active Linkedin', 'khaddokothon' ),
	'section'  => $section,
	'default'  => false,
	'active_callback' => [
		[
			'setting'  => 'khaddokothon_footer_social_display',
			'operator' => '==',
			'value'    => true,
		]
	],
) );

// Footer Linkedin Link
Kirki::add_field( 'khaddokothon_config', array(
	'type'     => 'link',
	'settings' => 'khaddokothon_footer_linkedin_link',
	'label'    => esc_html__( 'Linkedin Link', 'khaddokothon' ),
	'section'  => $section,
	'default'  => 'https://www.linkedin.com/',
	'active_callback' => [
		[
			'setting'  => 'khaddokothon_footer_linkedin',
			'operator' => '==',
			'value'    => true,
		]
	],
) );

// Footer Youtube Display or Not
Kirki::add_field( 'khaddokothon_config', array(
	'type'     => 'checkbox',
	'settings' => 'khaddokothon_footer_youtube',
	'label'    => esc_html__( 'Active Youtube', 'khaddokothon' ),
	'section'  => $section,
	'default'  => false,
	'active_callback' => [
		[
			'setting'  => 'khaddokothon_footer_social_display',
			'operator' => '==',
			'value'    => true,
		]
	],
) );

// Footer Youtube Link
Kirki::add_field( 'khaddokothon_config', array(
	'type'     => 'link',
	'settings' => 'khaddokothon_footer_youtube_link',
	'label'    => esc_html__( 'Youtube Link', 'khaddokothon' ),
	'section'  => $section,
	'default'  => 'https://www.youtube.com/',
	'active_callback' => [
		[
			'setting'  => 'khaddokothon_footer_youtube',
			'operator' => '==',
			'value'    => true,
		]
	],
) );

// Footer Tumblr Display or Not
Kirki::add_field( 'khaddokothon_config', array(
	'type'     => 'checkbox',
	'settings' => 'khaddokothon_footer_tumblr',
	'label'    => esc_html__( 'Active Tumblr', 'khaddokothon' ),
	'section'  => $section,
	'default'  => false,
	'active_callback' => [
		[
			'setting'  => 'khaddokothon_footer_social_display',
			'operator' => '==',
			'value'    => true,
		]
	],
) );

// Footer Tumblr Link
Kirki::add_field( 'khaddokothon_config', array(
	'type'     => 'link',
	'settings' => 'khaddokothon_footer_tumblr_link',
	'label'    => esc_html__( 'Tumblr Link', 'khaddokothon' ),
	'section'  => $section,
	'default'  => 'https://www.tumblr.com/',
	'active_callback' => [
		[
			'setting'  => 'khaddokothon_footer_tumblr',
			'operator' => '==',
			'value'    => true,
		]
	],
) );

// Footer VK Display or Not
Kirki::add_field( 'khaddokothon_config', array(
	'type'     => 'checkbox',
	'settings' => 'khaddokothon_footer_vk',
	'label'    => esc_html__( 'Active VK', 'khaddokothon' ),
	'section'  => $section,
	'default'  => false,
	'active_callback' => [
		[
			'setting'  => 'khaddokothon_footer_social_display',
			'operator' => '==',
			'value'    => true,
		]
	],
) );

// Footer VK Link
Kirki::add_field( 'khaddokothon_config', array(
	'type'     => 'link',
	'settings' => 'khaddokothon_footer_vk_link',
	'label'    => esc_html__( 'VK Link', 'khaddokothon' ),
	'section'  => $section,
	'default'  => 'https://vk.com/',
	'active_callback' => [
		[
			'setting'  => 'khaddokothon_footer_vk',
			'operator' => '==',
			'value'    => true,
		]
	],
) );

// Footer Reddit Display or Not
Kirki::add_field( 'khaddokothon_config', array(
	'type'     => 'checkbox',
	'settings' => 'khaddokothon_footer_reddit',
	'label'    => esc_html__( 'Active Reddit', 'khaddokothon' ),
	'section'  => $section,
	'default'  => false,
	'active_callback' => [
		[
			'setting'  => 'khaddokothon_footer_social_display',
			'operator' => '==',
			'value'    => true,
		]
	],
) );

// Footer Reddit Link
Kirki::add_field( 'khaddokothon_config', array(
	'type'     => 'link',
	'settings' => 'khaddokothon_footer_reddit_link',
	'label'    => esc_html__( 'Reddit Link', 'khaddokothon' ),
	'section'  => $section,
	'default'  => 'https://www.reddit.com/',
	'active_callback' => [
		[
			'setting'  => 'khaddokothon_footer_reddit',
			'operator' => '==',
			'value'    => true,
		]
	],
) );

// Footer Flickr Display or Not
Kirki::add_field( 'khaddokothon_config', array(
	'type'     => 'checkbox',
	'settings' => 'khaddokothon_footer_flickr',
	'label'    => esc_html__( 'Active Flickr', 'khaddokothon' ),
	'section'  => $section,
	'default'  => false,
	'active_callback' => [
		[
			'setting'  => 'khaddokothon_footer_social_display',
			'operator' => '==',
			'value'    => true,
		]
	],
) );

// Footer Reddit Link
Kirki::add_field( 'khaddokothon_config', array(
	'type'     => 'link',
	'settings' => 'khaddokothon_footer_flickr_link',
	'label'    => esc_html__( 'Flickr Link', 'khaddokothon' ),
	'section'  => $section,
	'default'  => 'https://www.flickr.com/',
	'active_callback' => [
		[
			'setting'  => 'khaddokothon_footer_flickr',
			'operator' => '==',
			'value'    => true,
		]
	],
) );
