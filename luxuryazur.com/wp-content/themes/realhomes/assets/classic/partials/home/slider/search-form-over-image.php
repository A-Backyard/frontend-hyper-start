<?php
/**
 * Search Form Over Image for Homepage.
 *
 * @package    realhomes
 * @subpackage classic
 */

$SFOI_classes                 = 'SFOI clearfix rh_parallax_sfoi';
$inspiry_home_search_bg_video = trim( get_option( 'inspiry_home_search_bg_video' ) );

if ( function_exists( 'putRevSlider' ) && ( ! empty( $inspiry_home_search_bg_video ) ) ) {
	$SFOI_classes .= ' over-video';
}
?>
<!-- SFOI = Search form over image -->
<div class="<?php echo esc_attr( $SFOI_classes ); ?>" style="background-image: url('<?php echo inspiry_get_search_bg_image(); ?>') ">
	<?php if ( function_exists( 'putRevSlider' ) && ( ! empty( $inspiry_home_search_bg_video ) ) ) : ?>
        <div class="SFOV">
			<?php putRevSlider( $inspiry_home_search_bg_video ); ?>
        </div>
	<?php endif; ?>

    <div class="SFOI__overlay"></div>

    <div class="SFOI__content">
		<?php
		/*
		 * Title
		 */
		$inspiry_SFOI_title = get_option( 'inspiry_SFOI_title' );
		if ( ! empty( $inspiry_SFOI_title ) ) {
			?><h2 class="SFOI__title"><?php echo esc_html( $inspiry_SFOI_title ); ?></h2><?php
		}

		/*
		 * Description
		 */
		$inspiry_SFOI_description = get_option( 'inspiry_SFOI_description' );
		if ( ! empty( $inspiry_SFOI_description ) ) {
			?><p class="SFOI__description"><?php echo esc_html( $inspiry_SFOI_description ); ?></p><?php
		}
		?>
        <div class="SFOI__form-wrapper">
			<?php
			if ( ere_is_search_page_configured() ) :

			if ( inspiry_is_search_fields_configured() ) :

			$theme_search_fields = inspiry_get_search_fields();

			$field_count = ( count( $theme_search_fields ) ); ?>
            <form class="SFOI__form advance-search-form clearfix"
                  action="<?php echo esc_url( inspiry_get_search_page_url() ); ?>" method="get">
				<?php if ( ! empty( $theme_search_fields ) && is_array( $theme_search_fields ) ) : ?>
                    <div class="SFOI__top-fields-wrapper">
                        <div class="SFOI__top-fields-container clearfix">
							<?php
							foreach ( $theme_search_fields as $field ) {
								get_template_part( 'assets/classic/partials/properties/search/fields/' . $field );
							}
							get_template_part( 'assets/classic/partials/properties/search/fields/button' );
							?>
                        </div>
                    </div>
                    <div class="SFOI__advanced-fields-wrapper">
                        <div class="SFOI__advanced-fields-container clearfix">
							<?php
							$feature_search_option = get_option( 'inspiry_search_fields_feature_search', 'true' );

							if ( ! empty( $feature_search_option ) && $feature_search_option == 'true' ) {
								get_template_part( 'assets/classic/partials/properties/search/fields/property-features' );
							}
							?>
                        </div>
                    </div>
				<?php endif; ?>
            </form>
            <div class="SFOI__advanced-expander"><?php esc_html_e( 'Advanced Search', 'framework' ); ?>
                <i class="fa fa-angle-down" aria-hidden="true"></i></div>
        </div>
	<?php endif; ?>
	<?php endif; ?>
    </div>
</div>