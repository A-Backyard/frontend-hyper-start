<?php
/**
 * Big 2 Column Mosaic Category in Home
 *
 * @package KhaddoKothon
 */

$khaddokothon_home_regular_btn_text=get_theme_mod('khaddokothon_home_regular_btn_text',esc_html__( 'Read it ...','khaddokothon'));
?>
<section id="khaddokothon-regular-blog-home">
    <div class="container">

		<?php
		$number_posts  = ( get_theme_mod( 'khaddokothon_home_regular_post_num', '4' ) );
		$categories    = khaddokothon_categories_dropdown();
		$post_category = ( get_theme_mod( 'khaddokothon_home_regular_post_cat', $categories[0] ) );
		if(is_front_page()) {
			$khaddokothon_paged = (get_query_var('page')) ? get_query_var('page') : 1;
		}else {
			$khaddokothon_paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		}

		$args = array(
			'post_type'           => 'post',
			'ignore_sticky_posts' => true,
			'posts_per_page'      => $number_posts,
			'cat'                 => $post_category,
			'paged'               => $khaddokothon_paged,
		);

		$reg_query = new WP_Query( $args );

		if ( $reg_query->have_posts() ) :
			while ( $reg_query->have_posts() ) :
				$reg_query->the_post();
				if ( $reg_query->current_post % 2 == 0 ):
					?>
                    <article class="row d-flex">
                        <div class="col-md-6 col-xl-6 align-self-md-center">
							<?php if ( has_post_thumbnail() ) : ?>
                                <div class="khaddokothon-regular-blog-thumb khaddokothon-img-frame">
                                    <div class="khaddokothon-img-hover">
										<?php the_post_thumbnail( 'khaddokothon-portrait', array( 'class' => 'img-fluid' ) ); ?>
                                    </div>
                                </div>
							<?php endif; ?>
                        </div>

                        <div class="col-md-6 col-xl-5 offset-xl-1 align-self-md-center">
                            <div class="khaddokothon-regular-blog-info">

	                            <?php if( get_theme_mod('khaddokothon_home_regular_cat_display', true) ): ?>
                                    <h3 class="khaddokothon-regular-blog-cat">
			                            <?php echo khaddokothon_category_meta(); ?>
                                    </h3>
	                            <?php endif; ?>

                                <h2 class="h1 khaddokothon-regular-blog-title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h2>

                                <?php if( get_theme_mod('khaddokothon_home_regular_excerpt_display', true) ): ?>
                                <p class="khaddokothon-regular-blog-excerpt">
	                                <?php the_excerpt(); ?>
                                </p>
                                <?php endif; ?>

                                <?php if( get_theme_mod('khaddokothon_home_regular_btn_display', true) ): ?>
                                <a class="mt-2 btn khaddokothon-btn-transparent" href="<?php the_permalink(); ?>">
	                                <?php echo wp_kses_post($khaddokothon_home_regular_btn_text); ?>
                                </a>
                                <?php endif; ?>

                            </div>
                        </div>
                    </article> <!-- End Article/Row -->
				<?php else: ?>
                    <article class="row d-flex">
                        <div class="col-md-6 col-xl-6 offset-xl-1 align-self-md-center order-md-last">
							<?php if ( has_post_thumbnail() ) : ?>
                                <div class="khaddokothon-regular-blog-thumb khaddokothon-img-frame">
                                    <div class="khaddokothon-img-hover">
										<?php the_post_thumbnail( 'khaddokothon-portrait', array( 'class' => 'img-fluid' ) ); ?>
                                    </div>
                                </div>
							<?php endif; ?>
                        </div>
                        <div class="col-md-6 col-xl-5 align-self-md-center">
                            <div class="khaddokothon-regular-blog-info">

                                <?php if( get_theme_mod('khaddokothon_home_regular_cat_display', true) ): ?>
                                <h3 class="khaddokothon-regular-blog-cat">
	                                <?php echo khaddokothon_category_meta(); ?>
                                </h3>
                                 <?php endif; ?>

                                <h2 class="h1 khaddokothon-regular-blog-title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h2>

	                            <?php if( get_theme_mod('khaddokothon_home_regular_excerpt_display', true) ): ?>
                                    <p class="khaddokothon-regular-blog-excerpt">
			                            <?php the_excerpt(); ?>
                                    </p>
	                            <?php endif; ?>

					            <?php if( get_theme_mod('khaddokothon_home_regular_btn_display', true) ): ?>
                                <a class="mt-2 btn khaddokothon-btn-transparent" href="<?php the_permalink(); ?>">
	                                <?php echo wp_kses_post($khaddokothon_home_regular_btn_text); ?>
                                </a>
					            <?php endif; ?>

                            </div>
                        </div>
                    </article> <!-- End Article/Row -->
				<?php endif; ?>

			<?php
			endwhile;

		    //Check id pagination is on or not
			if ( get_theme_mod( 'khaddokothon_home_regular_pagination') ):
				//custom paginate for home regular section only
				$khaddokothon_reg_paginate_links = paginate_links( array(
					'total'     => $reg_query->max_num_pages,
					'current'   => $khaddokothon_paged,
					'prev_next' => true,
					'prev_text' => '<i class="fas fa-long-arrow-alt-left"></i><strong>' . __( ' Previous', 'khaddokothon'
						) . '</strong>',
					'next_text' => '<strong>' . __( 'Next ', 'khaddokothon' ) . '</strong><i class="fas fa-long-arrow-alt-right"></i>',
				) );
				$khaddokothon_reg_paginate_prev = '<i class="fas fa-long-arrow-alt-left fa-prev"></i><span class="prev_next-prev">' . __
					( ' Previous', 'khaddokothon'
					) . '</span>';
				$khaddokothon_reg_paginate_next = '<span class="prev_next-next">' . __( 'Next ', 'khaddokothon' ) . '</span><i class="fas fa-long-arrow-alt-right fa-next"></i>';

				//Add non-link to first page
				if ( 1 === $khaddokothon_paged) {
					$khaddokothon_reg_paginate_links = $khaddokothon_reg_paginate_prev . $khaddokothon_reg_paginate_links;
				}

				//Add non-link to last page
				if ( $reg_query->max_num_pages ==  $khaddokothon_paged   ) {
					$khaddokothon_reg_paginate_links = $khaddokothon_reg_paginate_links . $khaddokothon_reg_paginate_next;
				}
				?>
                <div class="khaddokothon-regular-pagination d-flex justify-content-center mb-0">
					<?php echo $khaddokothon_reg_paginate_links; ?>
                </div>
			<?php
			endif;//<- End Home Regular Pagination
		endif;
		wp_reset_postdata();
		?>


    </div> <!-- End container -->
</section>