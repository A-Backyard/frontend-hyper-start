<?php
/**
 * Grid post.
 *
 * @package KhaddoKothon
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('khaddokothon-post-grid mb-5'); ?>>
	
	<!-- Post thumb -->
    <!--Show template parts based on post format-->
	<?php get_template_part( 'template-parts/post/content', get_post_format() ); ?>

    <!-- Title -->
    <div class="post-grid-title">
	    <?php if ( is_sticky() ) : ?>
            <i class="fas fa-thumbtack d-inline-block mr-2"></i>
	    <?php endif; ?>
        <h2 class="h4 d-inline-block"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    </div>

	<!-- Meta -->
	<?php if( get_theme_mod('khaddokothon_index_meta_display',true) ): ?>
	<div class="post-grid-meta mt-2">

        <ul class="list-inline">
            <li class="list-inline-item pr-2"><i class="fas fa-user pr-1"></i>
                <a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' )), get_the_author_meta( 'user_nicename' ) ); ?>">
                    <?php the_author(); ?>
                </a>
            </li>
            <li class="list-inline-item pr-2"><i class="fas fa-comments pr-1"></i>
				<?php if (! post_password_required() && ( comments_open() || get_comments_number() )): ?>
                    <a href="<?php comments_link();?>">
						<?php comments_number( '0', '1', '%' ); ?>
                    </a>
				<?php endif; ?>
            </li>
        </ul>

	</div>
	<?php endif; ?>

	<!-- Excerpt -->
	<?php if( get_theme_mod('khaddokothon_index_excerpt_display',true) ): ?>
        <div class="post-grid-excerpt mt-3">
            <?php the_excerpt(); ?>
            <div class="d-block">
                <a href="<?php the_permalink(); ?>" class="btn khaddokothon-btn-transparent khaddokothon-btn-small mt-4"><?php echo esc_html__
                    ('Read it..', 'khaddokothon'); ?></a>
            </div>

        </div>
	<?php endif; ?>

	
</article><!-- #post-## -->