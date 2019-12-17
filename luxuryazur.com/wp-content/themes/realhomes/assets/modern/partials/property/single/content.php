<?php
/**
 * Single Property: Content
 *
 * @package    realhomes
 * @subpackage modern
 */

global $post;

$property_id                     = get_post_meta( get_the_ID(), 'REAL_HOMES_property_id', true );
$theme_property_detail_variation = get_option( 'theme_property_detail_variation' ); ?>

<div class="rh_property__content clearfix">

    <div class="rh_property__row rh_property__meta rh_property--borderBottom">

        <div class="rh_property__id">
            <p class="title"><?php esc_html_e( 'Property ID', 'framework' ); ?> :</p>
			<?php if ( ! empty( $property_id ) ) { ?>
                <p class="id">&nbsp;<?php echo esc_html( $property_id ); ?></p>
			<?php } else { ?>
                <p class="id">&nbsp;<?php esc_html_e( 'None', 'framework' ); ?></p>
			<?php } ?>
        </div>

        <div class="rh_property__print">

            <a href="#" class="share" id="social-share">
				<?php include INSPIRY_THEME_DIR . '/images/icons/icon-share-2.svg'; ?>
            </a>
            <div id="share-button-title" class="hide"><?php esc_html_e( 'Share', 'framework' ); ?></div>
            <div class="share-this" data-check-mobile = "<?php if(wp_is_mobile()){echo esc_html('mobile');} ?>" data-property-name="<?php the_title(); ?>" data-property-permalink="<?php the_permalink(); ?>"></div>

			<?php
			$fav_button = get_option( 'theme_enable_fav_button' );
			if ( 'true' === $fav_button ) {
				$property_id = get_the_ID();
				if ( is_added_to_favorite( $property_id ) ) {
					?>
                    <span class="favorite-placeholder highlight__red">
						<?php include INSPIRY_THEME_DIR . '/images/icons/icon-favorite.svg'; ?>
                        <span class="rh_tooltip">
							<p class="label"><?php esc_html_e( 'Added to Favorite', 'framework' ); ?></p>
						</span>
					</span>
					<?php
				} else {
					?>
                    <form action="<?php echo esc_url( admin_url( 'admin-ajax.php' ) ); ?>" method="post"
                          class="add-to-favorite-form">
                        <input type="hidden" name="property_id" value="<?php echo esc_attr( $property_id ); ?>"/>
                        <input type="hidden" name="action" value="add_to_favorite"/>
                    </form>
                    <span class="favorite-placeholder highlight__red hide">
						<?php include INSPIRY_THEME_DIR . '/images/icons/icon-favorite.svg'; ?>
                        <span class="rh_tooltip">
							<p class="label"><?php esc_html_e( 'Added to Favorite', 'framework' ); ?></p>
						</span>
					</span>
                    <a href="#" class="favorite add-to-favorite">
						<?php include INSPIRY_THEME_DIR . '/images/icons/icon-favorite.svg'; ?>
                        <span class="rh_tooltip">
							<p class="label"><?php esc_html_e( 'Favorite', 'framework' ); ?></p>
						</span>
                    </a>
					<?php
				}
			}
			?>

            <a href="javascript:window.print()" class="print">
				<?php include INSPIRY_THEME_DIR . '/images/icons/icon-printer.svg'; ?>
                <span class="rh_tooltip">
					<p class="label">
						<?php esc_html_e( 'Print', 'framework' ); ?>
					</p>
				</span>
            </a>
        </div>

    </div>

	<?php
	// Property meta information.
	get_template_part( 'assets/modern/partials/property/single/meta' );
	?>

    <h4 class="rh_property__heading"><?php esc_html_e( 'Description', 'framework' ); ?></h4>

    <div class="rh_content">
		<?php the_content(); ?>
    </div>

	<?php
	/*
	 * Additional Details.
	 */
	get_template_part( 'assets/modern/partials/property/single/additional-details' );

	/*
	 * Common Note.
	 */
	get_template_part( 'assets/modern/partials/property/single/common-note' );

	/*
	 * Property Features.
	 */
	get_template_part( 'assets/modern/partials/property/single/features' );


	/**
	 * Display RVR related contents if it's enabled.
	 */
	if ( inspiry_is_rvr_enabled() ) {
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
	}

	/*
	 * Property Attachments.
	 */
	get_template_part( 'assets/modern/partials/property/single/attachments' );

	/*
	 * Floor Plans.
	 */
	get_template_part( 'assets/modern/partials/property/single/floor-plans' );

	/*
	 * Property Video
	 */
	get_template_part( 'assets/modern/partials/property/single/video' );

	/*
	 * Property virtual tour.
	 */
	get_template_part( 'assets/modern/partials/property/single/virtual-tour' );

	/*
	 * Property Google Map
	 */
	get_template_part( 'assets/modern/partials/property/single/map' );

	/*
	 * Child Properties.
	 */
	get_template_part( 'assets/modern/partials/property/single/children' );

	/*
	 * Property Agent.
	 */
	if ( 'agent-in-sidebar' !== $theme_property_detail_variation ) {
		get_template_part( 'assets/modern/partials/property/single/agent' );
	}
	?>

</div>

<?php get_template_part( 'assets/modern/partials/property/single/similar-properties' ); ?>

<section class="rh_property__comments">
	<?php
	/**
	 * Comments
	 *
	 * If comments are open or we have at least one comment, load up the comment template.
	 */
	if ( comments_open() || get_comments_number() ) {
		?>
        <div class="property-comments">
			<?php comments_template(); ?>
        </div>
		<?php
	}
	?>
</section>
