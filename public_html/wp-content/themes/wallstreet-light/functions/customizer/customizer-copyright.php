<?php
// Footer copyright section 
	function wallstreetlight_copyright_customizer( $wp_customize ) {
	
	$wp_customize->add_section(
        'copyright_section_one',
        array(
            'title' => __('Footer copyright settings','wallstreet-light'),
            'priority' => 800,
        )
    );
	$wp_customize->add_setting(
    'wallstreet_pro_options[footer_copyright]',
    array(
        'default' => '<p>'.__( '<a href="https://wordpress.org">Proudly powered by WordPress</a> | Theme: <a href="https://webriti.com" rel="designer"> Wallstreet Light</a> by Webriti', 'wallstreet-light' ).'</p>',
		'type' =>'option',
		'sanitize_callback' => 'wallstreetlight_copyright_sanitize_text'
		
    )
);
$wp_customize->add_control(
    'wallstreet_pro_options[footer_copyright]',
    array(
        'label' => __('Copyright text','wallstreet-light'),
        'section' => 'copyright_section_one',
        'type' => 'textarea',
    ));
	
	function wallstreetlight_copyright_sanitize_text( $input ) {

    return wp_kses_post( force_balance_tags( $input ) );

}
	
	function wallstreetlight_copyright_sanitize_html( $input ) {

    return force_balance_tags( $input );

}
}
add_action( 'customize_register', 'wallstreetlight_copyright_customizer' );
?>