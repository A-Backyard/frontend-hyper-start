<?php
/**
 * 404 Template
 *
 * @since 1.0.0
 * @package RH/classic
 */

get_header();

$banner_image_path = get_default_banner();

$banner_title   = __( '404 - Page Not Found!', 'framework' );
$banner_details = __( 'The page you are looking for is not here!', 'framework' );
?>

    <div class="page-head" style="background-repeat: no-repeat;background-position: center top;background-image: url('<?php echo esc_url( $banner_image_path ); ?>'); ">
        <div class="container">
            <div class="wrap clearfix">
                <h1 class="page-title"><span><?php echo esc_html( $banner_title ); ?></span></h1>
                <?php if ( ! empty( $banner_details ) ) { ?>
                    <p><?php echo esc_html( $banner_details ); ?></p>
                <?php } ?>
            </div>
        </div>
    </div><!-- End Page Head -->

    <!-- Content -->
    <div class="container contents single">
        <div class="row">
            <div class="span12 main-wrap">

                <!-- Main Content -->
                <div class="main">

                    <div class="inner-wrapper">
                        <section class="page-404 error-404 not-found">
                            <header class="page-header">
                                <h3 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'framework' ); ?></h3>
                            </header><!-- .page-header -->
                            <div class="page-content">
                                <p><strong><?php esc_html_e( 'Please try using top navigation OR search for what you are looking for!', 'framework' ); ?></strong></p>
			                    <?php get_search_form(); ?>
                            </div><!-- .page-content -->
                        </section><!-- .error-404 -->
                    </div>

                </div><!-- End Main Content -->

            </div> <!-- End span12 -->

        </div><!-- End contents row -->

    </div><!-- End Content -->

<?php get_footer(); ?>
