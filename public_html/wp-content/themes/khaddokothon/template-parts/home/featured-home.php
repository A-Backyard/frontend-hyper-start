<?php
/**
 * Featured Category in Home
 *
 * @package KhaddoKothon
 */

$khaddokothon_featured_heading=get_theme_mod('khaddokothon_featured_heading', esc_html__('Featured Post' , 'khaddokothon'));
$khaddokothon_featured_description=get_theme_mod('khaddokothon_featured_desc', esc_html__('Lorem ipsum dolor sit amet, consectetur 
adipisicing elit. Iusto sit nostrum, quasi, impedit ipsa consequuntur quaerat sunt minima culpa eum!' , 'khaddokothon'));
?>
<section id="khaddokothon-featured-home">
	<div class="container">
		<div class="row">

			<div class="col-md-6 col-lg-4 mb-5">
				<h2 class="khaddokothon-featured-heading">
					<?php echo wp_kses_post($khaddokothon_featured_heading); ?>
                </h2>
				<p class="khaddokothon-featured-description">
					<?php echo wp_kses_post($khaddokothon_featured_description); ?>
                </p>
				<div class="khaddokothon-featured-home-posts-nav">
					<div id="customNav" class="owl-nav"></div>
				</div>
			</div>  <!-- End col -->

			<div class="col-md-6 col-lg-8">
				<div class="owl-carousel featured-carousel">

                    <?php
                    $number_posts = (get_theme_mod('khaddokothon_home_featured_post_num', '3'));
                    $categories = khaddokothon_categories_dropdown();
                    $post_category = (get_theme_mod('khaddokothon_home_featured_post_cat', $categories[0]));



                    $args = array(
	                    'post_type'      => 'post',
	                    'ignore_sticky_posts' => true,
	                    'posts_per_page' => $number_posts,
	                    'cat'            => $post_category,
	                    'meta_query' => array(
		                    array(
			                    'key' => '_thumbnail_id'
		                    )
	                    ),
                    );

                    $featured_query = new WP_Query( $args );

                    if( $featured_query->have_posts() && $featured_query->found_posts >=3  ) :
                        while( $featured_query->have_posts() ) :
                            $featured_query->the_post();

                    ?>
                            <article class="khaddokothon-featured-home-post-item">
		                        <?php if ( has_post_thumbnail() ) : ?>
                                    <div class="khaddokothon-hover-item khaddokothon-img-frame">
                                        <div class="khaddokothon-img-hover">
					                        <?php the_post_thumbnail( 'khaddokothon-portrait', array( 'class' => 'img-fluid' ) ); ?>
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
                                    </div>
		                        <?php endif; ?>
                                <div class="p-2"></div> <!--Hack to make the frame work-->
                            </article>

                        <?php
                        endwhile;
                    endif;
                    wp_reset_postdata();
                    ?>

				</div>   <!-- End owl carousel -->
			</div>  <!-- End col -->

		</div> <!-- End Row -->
	</div> <!-- End container -->
</section>
