<?php
/**
 * Latest properties section of homepage.
 *
 * @package    realhomes
 * @subpackage modern
 */

// Skip sticky properties.
$skip_sticky = get_option( 'inspiry_home_skip_sticky', false );
if ( $skip_sticky ) {
	remove_filter( 'the_posts', 'inspiry_make_properties_stick_at_top', 10 );
}

/* List of Properties on Homepage */
$number_of_properties = intval( get_option( 'theme_properties_on_home' ) );
if ( ! $number_of_properties ) {
	$number_of_properties = 4;
}

if ( is_front_page() ) {
	$paged = ( get_query_var( 'page' ) ) ? get_query_var( 'page' ) : 1;
}

$home_args = array(
	'post_type'      => 'property',
	'posts_per_page' => $number_of_properties,
	'paged'          => $paged,
);

/* Modify home query arguments based on theme options - related filters resides in functions.php */
$home_args = apply_filters( 'real_homes_homepage_properties', $home_args );

/* Sort Properties Based on Theme Option Selection */
$sorty_by = get_option( 'theme_sorty_by' );

if ( ! empty( $sorty_by ) ) {
	if ( 'low-to-high' === $sorty_by ) {
		$home_args['orderby']  = 'meta_value_num';
		$home_args['meta_key'] = 'REAL_HOMES_property_price';
		$home_args['order']    = 'ASC';
	} elseif ( 'high-to-low' === $sorty_by ) {
		$home_args['orderby']  = 'meta_value_num';
		$home_args['meta_key'] = 'REAL_HOMES_property_price';
		$home_args['order']    = 'DESC';
	} elseif ( 'random' === $sorty_by ) {
		$home_args['orderby'] = 'rand';
	}
}
$home_properties_query = new WP_Query( $home_args );

$inspiry_show_home_search = get_option( 'theme_show_home_search' );
$get_border_type          = get_option( 'inspiry_home_sections_border', 'diagonal-border' );

if ( $get_border_type == 'diagonal-border' ) {
	$border_class = 'diagonal-mod';
} else {
	$border_class = 'flat-border';
}

$ajax_class = '';
if ( 'true' === get_option( 'theme_ajax_pagination_home' , 'true' ) ) {
	$ajax_class = 'ajax-pagination';
}
?>
<section id="home-properties-section"
         class="rh_section rh_section--props_padding rh_latest-properties <?php echo esc_attr( $ajax_class ) . ' ' . esc_attr( $border_class ); ?>">

	<div class="diagonal-mod-background"></div>

	<div class="container-later-properties">
		<div id="home-properties-section-wrapper" class="wrapper-section-contents">
			<div id="home-properties-section-inner">

				<?php
				/* Slogan Title and Text */
				$slogan_sub_title = get_option( 'inspiry_home_properties_sub_title', 'Latest' );
				$slogan_title     = get_option( 'inspiry_home_properties_title', 'Properties' );
				$slogan_text      = get_option( 'inspiry_home_properties_desc' );
				inspiry_modern_home_heading( $slogan_sub_title, $slogan_title, $slogan_text );

				if ( $home_properties_query->have_posts() ) :
					?>

					<div class="rh_section__properties">

						<?php while ( $home_properties_query->have_posts() ) : ?>

							<?php $home_properties_query->the_post(); ?>

							<?php get_template_part( 'assets/modern/partials/home/latest-property' ); ?>

						<?php endwhile; ?>

						<?php wp_reset_postdata(); ?>

					</div>
					<!-- /.rh_section__properties -->


					<div class="svg-loader">
						<img src="<?php echo INSPIRY_DIR_URI; ?>/images/loading-bars.svg" width="32" height="32"
						     alt="<?php esc_html_e( 'Loading...', 'framework' ); ?>">
					</div>

					<?php
					if ( 'true' === get_option( 'theme_ajax_pagination_home' ,'true') ) {
						theme_ajax_pagination( $home_properties_query->max_num_pages );
					} else {
						theme_pagination( $home_properties_query->max_num_pages );
					}
					?>

				<?php endif; ?>


			</div>
		</div>
	</div>


</section>
<!-- /.rh_section -->
