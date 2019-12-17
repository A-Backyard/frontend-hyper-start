<?php
/**
 * Theme functions extended
 *
 * @package KhaddoKothon
 */

// Add specific CSS class to header
function khaddokothon_header_class() {

	$header_classes = array();

	if ( get_theme_mod('desktop_sticky_header', true) == true ){
		$header_classes[] = 'sticky-header';
	}

	if ( get_theme_mod('mobile_sticky_header') == true ){
		$header_classes[] = 'mobile-sticky-header';
	}

	if ( get_theme_mod('header_transperant') == true ){
		$header_classes[] = 'header-transparent header-fixed';
	}

	if ( is_front_page() && !is_home() ) {
		if ( get_theme_mod('header_transperant_home') == true ){
			$header_classes[] = 'header-transparent header-fixed';
		}
	}

	// return the $classes array
	echo implode( ' ', $header_classes );
}

// Categories dropdown
function khaddokothon_categories_dropdown() {

	$categories = get_categories( array(
		'orderby' => 'name',
		'parent'  => 0
	) );

	$categories_dropdown = array( '0' => esc_html__( 'All categories', 'khaddokothon' ) );
	if ( ! is_wp_error( $categories )) {
		foreach ( $categories as $key => $category ) {
			$categories_dropdown[$category->term_id] = $category->name;
		}
	}

	return $categories_dropdown;
}


// Category meta
if ( ! function_exists( 'khaddokothon_category_meta' ) ) {
	function khaddokothon_category_meta() {

		$categories        = get_the_category();
		$separator         = ' , ';
		$categories_output = '';
		$output            = '';

		if ( ! empty( $categories ) ):
			foreach ( $categories as $index => $category ):
				if ( $index > 0 ) : $categories_output .= $separator; endif;
				$categories_output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '">' . esc_html( $category->name ) . '</a>';
			endforeach;
		endif;

		if ( 'post' == get_post_type() ) :
			$output .= '<ul class="list-inline m-0">';
			$output .= '<li class="list-inline-item">' . $categories_output . '</li>';
			$output .= '</ul>';
		endif;

		return $output;

	}
}


// Pagination
if ( ! function_exists( 'khaddokothon_pagination' ) ) {
	function khaddokothon_pagination() {
		// Don't print empty markup if there's only one page.
		if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
			return;
		}
		?>
			<div class="row mt-md-5">
				<div class="col-12">
                    <!-- Devider -->
                    <div class="khaddokothon-section-divider"></div>
					<nav class="list-inline khaddokothon-pagination-list d-flex justify-content-center mb-0 pt-5">
						<?php $args = array(
							'mid_size'           => 1,
							'prev_next'          => true,
							'prev_text'          => esc_html__('Previous', 'khaddokothon'),
							'next_text'          => esc_html__('Next', 'khaddokothon'),
						); ?>
						<?php echo paginate_links( $args ); ?>
					</nav>
				</div>
			</div>
		<?php
	}
}


// Comments Pagination
if ( ! function_exists( 'khaddokothon_comments_pagination' ) ) {
	function khaddokothon_comments_pagination() {

		if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :

			?>

            <nav class="khaddokothon-comments-navigation clearfix mt-5" role="navigation">
                <h6 class="sr-only sr-only-focusable screen-reader-text"><?php echo esc_html__( 'Comment navigation', 'khaddokothon' );
		            ?></h6>
                <div class="d-inline-block">
                    <?php previous_comments_link( esc_html__( 'Previous Comments', 'khaddokothon' ) ); ?>
                </div>
                <div class="d-inline-block float-right">
                    <?php next_comments_link( esc_html__( 'Next Comments', 'khaddokothon' ) ); ?>
                </div>
            </nav><!-- #comment-nav-above -->

		    <?php

		endif;
	}
}


// Excerpt length adjustment
if ( ! function_exists( 'khaddokothon_excerpt' ) ) {
	function khaddokothon_excerpt( $length ) {
	    return (is_front_page() && !is_home() || is_search()) ? 35 : 15;
	}
}
add_filter( 'excerpt_length', 'khaddokothon_excerpt', 999 );


// Tag cloud size adjustment
if ( ! function_exists( 'khaddokothon_tag_cloud_size' ) ) {
	function khaddokothon_tag_cloud_size( $args ) {
		$args['smallest'] = 12;
		$args['largest']  = 12;

		return $args;
	}
}
add_filter('widget_tag_cloud_args', 'khaddokothon_tag_cloud_size');


// Footer widget column adjustment
if ( !function_exists( 'khaddokothon_get_footer_column' ) ) {

	function khaddokothon_get_footer_column( $footer_columns ) {
		if ( $footer_columns == 12 ) {
			return 1;
		} elseif ( $footer_columns == 6 ) {
			return 2;
		} elseif ( $footer_columns == 4 ) {
			return 3;
		} else {
			return 4;
		}
	}

}