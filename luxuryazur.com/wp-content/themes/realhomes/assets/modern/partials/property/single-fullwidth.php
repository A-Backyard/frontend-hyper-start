<?php
/**
 * Template for Single Property Fullwidth
 */

get_header();

$get_header_variations = get_option( 'inspiry_header_mod_variation_option', 'one' );
?>
<div class="selected-header-variation-<?php echo esc_attr( $get_header_variations ); ?>">
	<?php
	if ( inspiry_show_header_search_form() ) {
		get_template_part( 'assets/modern/partials/properties/search/advance' );
	}
	?>
</div>

<div class="single-property-fullwidth">
	<?php
	if ( have_posts() ):

		while ( have_posts() ): the_post();

			if ( ! post_password_required() ) :

				global $post;

				/**
				 * Property Slider.
				 */
				get_template_part( 'assets/modern/partials/property/single-fullwidth/slider' );  ?>

                <div id="primary" class="content-area rh_property">

					<?php
					/**
					 * Property Content.
					 */
					get_template_part( 'assets/modern/partials/property/single-fullwidth/content' );

					/**
					 * Property Additional Details.
					 */
					get_template_part( 'assets/modern/partials/property/single-fullwidth/additional-details' );

					/**
					 * Property Features.
					 */
					get_template_part( 'assets/modern/partials/property/single-fullwidth/features' );

					/**
					 * Property Floor Plans.
					 */
					get_template_part( 'assets/modern/partials/property/single-fullwidth/floor-plans' );

					/**
					 * Property Video.
					 */
					get_template_part( 'assets/modern/partials/property/single-fullwidth/video' );

					/**
					 * Property virtual tour.
					 */
					get_template_part( 'assets/modern/partials/property/single-fullwidth/virtual-tour' );

					/**
					 * Property Location Map.
					 */
					get_template_part( 'assets/modern/partials/property/single-fullwidth/map' );

					/**
					 * Common Note.
					 */
					get_template_part( 'assets/modern/partials/property/single-fullwidth/common-note' );

					/**
					 * Child Properties.
					 */
					get_template_part( 'assets/modern/partials/property/single-fullwidth/children' );

					/**
					 * Property Agent.
					 */
					get_template_part( 'assets/modern/partials/property/single-fullwidth/agent' );

					/**
					 * Similar Properties.
					 */
					get_template_part( 'assets/modern/partials/property/single-fullwidth/similar-properties' );

					/**
					 * Display RVR related contents if it's enabled.
					 */
					if ( inspiry_is_rvr_enabled() ) :?>
                        <div class="rvr-content-wrapper single-property-section">
                            <div class="container">
								<?php
								/*
								 * RVR - Property Outdoor Features.
								 */
								get_template_part( 'assets/modern/partials/property/single/rvr/outdoor-features' );

								/*
								 * RVR - Property Optional Services.
								 */
								get_template_part( 'assets/modern/partials/property/single/rvr/optional-services' );

								/*
								 * RVR - Property Privacy Policies.
								 */
								get_template_part( 'assets/modern/partials/property/single/rvr/privacy-policies' );

								/*
								 * RVR - Property Location Surroundings.
								 */
								get_template_part( 'assets/modern/partials/property/single/rvr/location-surroundings' );

								/*
								 * RVR - Property Availability Calendar.
								 */
								get_template_part( 'assets/modern/partials/property/single/rvr/availability-calendar' );
								?>
                            </div>
                        </div>
					<?php endif; ?>

					<?php
					/**
					 * Comments
					 * If comments are open or we have at least one comment, load up the comment template.
					 */
					if ( comments_open() || get_comments_number() ) :?>
                        <div class="comments-content-wrapper single-property-section">
                            <div class="container">
								<?php comments_template(); ?>
                            </div>
                        </div>
					<?php endif; ?>
                </div><!-- /.content-area -->
			<?php else: ?>
                <div id="primary" class="content-area">
					<?php echo get_the_password_form(); ?>
                </div><!-- /.content-area -->
			<?php endif; ?>
		<?php endwhile; ?>
	<?php endif; ?>
</div><!-- /.single-property-fullwidth -->
<?php
get_footer();