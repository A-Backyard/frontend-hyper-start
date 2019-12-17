<?php
/**
 * Index Page, Grid or List Layout.
 *
 * @package KhaddoKothon
 */

get_header();
get_template_part( 'template-parts/header/index-header' );
$layout = get_theme_mod('khaddokothon_index_layout','right-sidebar');
$column = ($layout == 'fullwidth') ? 'col-12' : 'col-lg-8';
$khaddokothon_post_type = get_theme_mod('khaddokothon_index_post_type','grid');
?>


<!-- ========== Start khaddokothon Blog ========== -->
<section class="khaddokothon-index-blog">
    <div class="container">
        <div class="row">

            <?php if($layout == 'left-sidebar'){
                get_sidebar();
            } ?>

            <div class="<?php echo esc_attr($column); ?>">
                <?php
                    if($khaddokothon_post_type == 'grid') {
                        get_template_part( 'template-parts/post/layout-grid' );
                    }
                    elseif($khaddokothon_post_type == 'list')  {
                        get_template_part( 'template-parts/post/layout-list');
                    }
                ?>
                <?php khaddokothon_pagination(); ?>
            </div>

            <?php 
                get_sidebar();
            ?>

        </div> <!-- End row -->
    </div> <!-- End container -->
</section>
<!-- ========== End khaddokothon Blog ========== -->


<?php get_footer();