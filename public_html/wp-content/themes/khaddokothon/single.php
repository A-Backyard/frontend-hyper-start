<?php
/**
 * Single Post Page
 *
 * @package KhaddoKothon
 */
get_header();

get_template_part( 'template-parts/header/single-header');
$sidebar = get_theme_mod('khaddokothon_single_layout','right-sidebar');
$column = (($sidebar == 'fullwidth') ? 'col-md-12 col-lg-8 offset-lg-2' : (($sidebar == 'right-sidebar') ? 'col-lg-8 right-sidebar' : 'col-lg-8 left-sidebar'));

?>


<!-- ========== Start khaddokothon Blog ========== -->
<section class="khaddokothon-single-blog">
	<div class="container">
		<div class="row">

			<?php if($sidebar == 'left-sidebar'){
				get_sidebar();
			} ?>

			<div class="<?php echo esc_attr($column); ?>">
				<?php get_template_part( 'template-parts/post/blog-item' ); ?>
			</div>

			<?php if($sidebar == 'right-sidebar'){
				get_sidebar();
			} ?>

		</div> <!-- End row -->
	</div> <!-- End container -->
</section>
<!-- ========== End khaddokothon Blog ========== -->


<?php get_footer(); ?>