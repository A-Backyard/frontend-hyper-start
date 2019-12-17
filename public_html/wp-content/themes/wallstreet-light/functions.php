<?php add_action( 'wp_enqueue_scripts', 'wallstreetlight_theme_css',999);
function wallstreetlight_theme_css() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.css');
	wp_dequeue_style('wallstreet-default',get_template_directory_uri() .'/css/default.css');
	wp_enqueue_style('wallstreetlight-default', get_stylesheet_directory_uri() . '/css/default.css');
	wp_enqueue_style( 'media-responsive', get_template_directory_uri() . '/css/media-responsive.css');
}

add_action( 'after_setup_theme', 'wallstreetlight_theme_setup' );
function wallstreetlight_theme_setup() {
	load_child_theme_textdomain( 'wallstreet-light', get_stylesheet_directory() . '/languages' );
	require( get_stylesheet_directory() . '/functions/customizer/customizer-copyright.php' );
}

function wallstreetlight_theme_data_setup()
{
	
	return $theme_options=array(
			'footer_copyright' => '<p>'.__( '<a href="https://wordpress.org">Proudly powered by WordPress</a> | Theme: <a href="https://webriti.com" rel="designer"> Wallstreet Light</a> by Webriti', 'leo' ).'</p>',
			'footer_social_media_enabled'=>'on',			
			'social_media_twitter_link' =>"#",			
			'social_media_facebook_link' =>"#",
			'social_media_googleplus_link' =>"#",
			'social_media_linkedin_link' =>"#",		
			'social_media_youtube_link' =>"#",
			'social_media_instagram_link' => '#',
		
		);
}
?>