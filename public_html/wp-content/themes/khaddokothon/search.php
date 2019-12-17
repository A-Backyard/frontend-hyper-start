<?php
/**
 * Search Page
 *
 * @package KhaddoKothon
 */

get_header();
get_template_part( 'template-parts/header/search-header' );
?>


<!-- ========== Start khaddokothon Blog ========== -->
<section class="khaddokothon-search-page">
    <div class="container">
        <div class="row">

            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <div class="col-lg-8 offset-lg-2">
                    <?php get_template_part( 'template-parts/post/post-grid' ); ?>
                </div>

            <?php endwhile; ?>

            <?php else : ?>
            <div class="col-lg-8 offset-lg-2">
                <?php get_template_part( 'template-parts/post/content', 'none' ); ?>
            </div>
            <?php endif; ?>

        </div> <!-- End row -->
    </div> <!-- End container -->
</section>
<!-- ========== End khaddokothon Blog ========== -->


<?php get_footer();