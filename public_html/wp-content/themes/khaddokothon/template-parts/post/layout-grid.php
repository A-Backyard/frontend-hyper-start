<?php
/**
 * Grid layout.
 *
 * @package KhaddoKothon
 */

$column_num = get_theme_mod('khaddokothon_index_grid_column',1);
$column = ($column_num == '1') ? 'col-md-6' : 'col-md-4';
?>

<!-- Grid Layout -->
<?php if ( have_posts() ) : ?>
    <div class="row">
		<?php while ( have_posts() ) : the_post(); ?>

			<div class="<?php echo esc_attr($column); ?>">
				<?php get_template_part( 'template-parts/post/post-grid', get_post_format() ); ?>
			</div>

		<?php endwhile; ?>
    </div>
<?php else : ?>
    <?php get_template_part( 'template-parts/post/content', 'none' ); ?>
<?php endif; ?>