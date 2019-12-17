<?php
/**
 * 3 Column Category in Home
 *
 * @package KhaddoKothon
 */

$khaddokothon_cat_heading=get_theme_mod('khaddokothon_cat_heading', esc_html__('Editors Pick' , 'khaddokothon'));
$khaddokothon_cat_description=get_theme_mod('khaddokothon_cat_description', esc_html__('Lorem ipsum dolor sit amet, consectetur adipisicing elit.' , 'khaddokothon'));
?>
<!-- Section Devider -->
<div class="container">
	<div class="row">
		<div class="col-12">
			<div class="khaddokothon-section-divider"></div>
		</div> <!-- End col -->
	</div> <!-- End row -->
</div> <!-- End container -->

<section id="khaddokothon-category-blog-home">
	<div class="container">
		<div class="row text-center mb-5">
			<div class="col-xl-8 offset-xl-2">
				<h2 class="khaddokothon-cat-heading"><?php echo wp_kses_post($khaddokothon_cat_heading); ?></h2>
				<p class="khaddokothon-cat-description"><?php echo wp_kses_post($khaddokothon_cat_description); ?></p>
			</div>
		</div>
		<div class="row">

			<?php
			$categories    = khaddokothon_categories_dropdown();
			$post_category = ( get_theme_mod( 'khaddokothon_home_category_post_cat', $categories[0] ) );

			$args = array(
				'post_type'           => 'post',
				'ignore_sticky_posts' => true,
				'posts_per_page'      => 3,
				'cat'                 => $post_category,
			);

			$cat_query = new WP_Query( $args );

			if($cat_query->have_posts()):
				while($cat_query->have_posts()):
					$cat_query->the_post();
			?>
					<div class="col-md-6 col-lg-4 category-post-item">

						<article class="khaddokothon-hover-item khaddokothon-img-frame">
							<div class="khaddokothon-img-hover">
								<?php if ( has_post_thumbnail() ) : ?>
									<?php the_post_thumbnail( 'medium', array( 'class' => 'img-fluid' ) ); ?>
								<?php endif; ?>
								<div class="khaddokothon-hover-overlay"></div>
								<div class="khaddokothon-hover-content text-center pl-3 pr-4">
									<h4 class="mb-2">
										<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
									</h4>
									<div class="post-meta">
										<span class="post-date"><?php echo esc_html(get_the_date()); ?></span>
									</div>
								</div>
							</div>
						</article>

					</div>  <!-- End col -->
			<?php
				endwhile;
			endif;
			wp_reset_postdata();
			?>


		</div> <!-- End row -->
	</div> <!-- End container -->
</section>