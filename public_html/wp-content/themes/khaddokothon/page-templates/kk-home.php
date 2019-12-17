<?php
/**
 * Template Name: Home Page Template
 *
 * @package KhaddoKothon
 */
get_header();
?>


	<!-- ========== Start Hero ========== -->
    <?php
        if( get_theme_mod( 'khaddokothon_hero_display',true ) ) {
	        get_template_part( 'template-parts/home/hero-home' );
        }
    ?>
    <!-- ========== End Hero ========== -->


    <!-- ========== Start Featured ========== -->
    <?php
        if ( get_theme_mod( 'khaddokothon_home_featured_display') ){
	        get_template_part( 'template-parts/home/featured-home' );
        }
    ?>
    <!-- ========== End Featured ========== -->


	<!-- ========== Start Subscribe ========== -->
    <?php
    if ( get_theme_mod( 'khaddokothon_home_subscribe_display') ){
	    get_template_part( 'template-parts/home/subscribe-home' );
    }
    ?>
	<!-- ========== End Subscribe ========== -->


	<!-- ========== Start Big 2 col Regular Blog ========== -->
    <?php
        if ( get_theme_mod( 'khaddokothon_home_regular_display') ){
	        get_template_part( 'template-parts/home/regular-home' );
        }
    ?>
	<!-- ========== End Big 2 col Regular Blog ========== -->


	<!-- ========== Start Category Blog ========== -->
    <?php
    if ( get_theme_mod( 'khaddokothon_home_cat_display') ){
	    get_template_part( 'template-parts/home/cat-home' );
    }
    ?>
	<!-- ========== End Category Blog ========== -->


<?php get_footer();