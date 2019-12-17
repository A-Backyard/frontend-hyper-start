<?php
/**
 * Site Header.
 *
 * @package KhaddoKothon
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">

	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>

	<?php wp_head(); ?>


</head>
<body <?php body_class(); ?>>
<?php
    if( function_exists( 'wp_body_open' ) ) {
        wp_body_open();
    }
?>

<!-- Preloader -->
<?php if( get_theme_mod( 'khaddokothon_preloader_display', true ) ) : ?>
<div class="preloader">
    <div class="text-center v-center">
        <div class="khaddokothon-ellipsis">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
</div>
<?php endif; ?>
<!-- End Preloader-->

<a class="skip-link screen-reader-text sr-only sr-only-focusable" href="#khaddokothon-main-wrapper"><?php esc_html_e( 'Skip to content', 'khaddokothon' ); ?></a>

<!-- ========== Start Header ========== -->
<header id="khaddokothon-site-header" class="khaddokothon-site-header <?php khaddokothon_header_class(); ?>">
    <?php get_template_part( 'template-parts/header/menu-header' ); ?>
</header>
<!-- ========== End Header ========== -->


<!-- ========== Start Main Wrapper ========== -->
<div id="khaddokothon-main-wrapper" class="khaddokothon-main-wrapper">