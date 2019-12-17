<?php
/**
 * Default Page Template
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

            <div class="col-lg-8">
                <?php
                    while ( have_posts() ) : the_post();

                        //Featured image
                        if ( has_post_thumbnail() ) : ?>
                        <div class="khaddokothon-blog-thumb">
                            <div class="khaddokothon-img-hover">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail( 'large', array( 'class' => 'img-fluid' ) ); ?>
                                </a>
                            </div>
                        </div>
                        <?php endif;

                        //content
                        the_content();

	                    //comments
	                    if ( comments_open() || get_comments_number() ) :
		                    comments_template();
	                    endif;
                        wp_link_pages( array(
                            'before' => '<div class="khaddokothon-page-breaks d-block mb-4">' . esc_html__( 'Pages:', 'khaddokothon' ),
                            'after'  => '</div>',
                            'link_before' => '<span>',
                            'link_after'  => '</span>',
                        ) );
                    endwhile;
                ?>
            </div>

            <?php get_sidebar(); ?>

        </div> <!-- End row -->
    </div> <!-- End container -->
</section>
<!-- ========== End khaddokothon Blog ========== -->


<?php get_footer();