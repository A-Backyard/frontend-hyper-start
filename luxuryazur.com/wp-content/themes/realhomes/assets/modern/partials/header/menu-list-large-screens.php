<!--<div class="rh_menu__hamburger hamburger hamburger--squeeze">-->
<!--	<div class="hamburger-box">-->
<!--		<div class="hamburger-inner"></div>-->
<!--	</div>-->
<!--</div>-->
<?php
// Main Menu.
if ( has_nav_menu( 'main-menu' ) ) :
	wp_nav_menu( array(
		'theme_location' => 'main-menu',
		'walker'         => new RH_Walker_Nav_Menu(),
		'menu_class'     => 'rh_menu__main clearfix',
	) );
endif;
