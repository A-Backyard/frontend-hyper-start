<?php
/**
 * 404 Page Template
 *
 * @package KhaddoKothon
 */
get_header();
get_template_part( 'template-parts/header/404-header');
$khaddokothon_404_page_heading = get_theme_mod('khaddokothon_404_page_heading', esc_html__('404 Page not found' , 'khaddokothon'));
$khaddokothon_404_page_description = get_theme_mod('khaddokothon_404_page_description', esc_html__('But you can continue your search ...' , 'khaddokothon'));
?>


<!-- ========== Start khaddokothon Blog ========== -->
<section class="khaddokothon-404-page h-100">
    <div class="container">
        <div class="row">

            <div class="col-lg-8 offset-lg-2">
                <h1 class="text-center">
	                <?php echo wp_kses_post($khaddokothon_404_page_heading); ?>
                </h1>
                <p class="text-center">
		            <?php echo wp_kses_post($khaddokothon_404_page_description); ?>
                </p>
                <?php
                    if(get_theme_mod('khaddokothon_404_page_search_display', true)) {
                        get_search_form();
                    }
                ?>
            </div>

        </div> <!-- End row -->
    </div> <!-- End container -->
</section>
<!-- ========== End khaddokothon Blog ========== -->


<?php get_footer();