<?php
/**
 * Template Name: Left Sidebar
 *
 * @package KhaddoKothon
 */

get_header();
get_template_part( 'template-parts/header/page-header');
?>


	<!-- ========== Start khaddokothon Blog ========== -->
	<section class="khaddokothon-default-page">
		<div class="container">
			<div class="row">

				<div class="col-lg-8 order-lg-2">
                    <?php
                        while ( have_posts() ) : the_post();
                            the_content();
                        endwhile;
                    ?>
				</div>

                <?php get_sidebar(); ?>

			</div> <!-- End row -->
		</div> <!-- End container -->
	</section>
	<!-- ========== End khaddokothon Blog ========== -->


<?php get_footer();