<?php
/**
 * Template Name: Full Width
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

				<div class="col-12">
                    <?php
                        while ( have_posts() ) : the_post();
                            the_content();
                        endwhile;
                    ?>
				</div>

			</div> <!-- End row -->
		</div> <!-- End container -->
	</section>
	<!-- ========== End khaddokothon Blog ========== -->


<?php get_footer();