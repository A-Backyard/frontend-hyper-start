<?php
/**
 * List layout.
 *
 * @package KhaddoKothon
 */
?>

<!-- List Layout -->
<?php if ( have_posts() ) : ?>
    <div class="row">
		<?php while ( have_posts() ) : the_post(); ?>

			<div class="col-12">
				<?php get_template_part( 'template-parts/post/post-list', get_post_format() ); ?>
			</div>

		<?php endwhile; ?>
    </div>
<?php else : ?>
    <?php get_template_part( 'template-parts/post/content', 'none' ); ?>
<?php endif; ?>