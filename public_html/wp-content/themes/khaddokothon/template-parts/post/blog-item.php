<?php
/**
 * Blog Item
 *
 * @package KhaddoKothon
 */
?>
<div class="khaddokothon-blog-item">
	<?php
	while ( have_posts() ) : the_post();

		?>

		<article id="post-<?php the_ID(); ?>" <?php post_class("khaddokothon-article mb-5"); ?>>

			<!--Show template parts based on post format-->
			<?php get_template_part( 'template-parts/post/content', get_post_format() ); ?>

			<div class="khaddokothon-blog-content mb-5">

                <!--Cat & Share-->
                <div class="khaddokothon-meta-cat-share d-md-flex justify-content-md-between mb-3 pb-1">

					<?php if(get_theme_mod('khaddokothon_single_categories_show',true)): ?>
                        <div class="khaddokothon-blog-categories">
                            <i class="fas fa-folder-open mr-2"></i>
							<?php echo khaddokothon_category_meta(); ?>
                        </div>
					<?php endif; ?>

                </div>

                <!--Content-->
				<?php the_content(); ?>

			</div>

            <div class="clearfix"></div>
            <!--Page Break-->
			<?php
			wp_link_pages( array(
				'before' => '<div class="khaddokothon-page-breaks d-block mb-4">' . esc_html__( 'Pages:', 'khaddokothon' ),
				'after'  => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
			) );
			?>

            <!--Tags-->
			<?php if(has_tag() && get_theme_mod('khaddokothon_single_tags_show',true)): ?>
                <div class="khaddokothon-blog-tags pt-1">
                    <i class="fas fa-tags mr-2"></i>
					<?php the_tags( '<ul class="list-inline m-0"><li class="list-inline-item">', ' ,</li> <li class="list-inline-item">', '</li></ul>' ); ?>
                </div>
			<?php endif; ?>

		</article>

		<?php

		//post nav
		if( wp_count_posts()->publish > 1 ) {
			get_template_part( 'template-parts/post/post-nav');
		}

		//author description (if have any)
		$author_desc = get_the_author_meta( 'description' );

		if ( ! empty( $author_desc ) ) : ?>
			<div class="khaddokothon-author-box khaddokothon-theme-bg-light p-5 mt-5 clearfix">
				<div class="row">
					<div class="col-md-2 mb-4 mb-md-0">
						<?php echo get_avatar( get_the_author_meta( 'ID' ), 80 ); ?>
					</div>
					<div class="col-md-10">
						<h5 class="mb-2">
                            <a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' )), get_the_author_meta( 'user_nicename' ) ); ?>"><?php the_author(); ?></a>
						</h5>
						<p class="mb-0"><?php the_author_meta( 'description' ); ?></p>
					</div>
				</div>
			</div>
		<?php endif;

		//comments
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;

	endwhile;
	?>
</div>