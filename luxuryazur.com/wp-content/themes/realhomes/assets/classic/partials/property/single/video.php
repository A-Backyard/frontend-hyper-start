<?php
/**
 * Property video.
 *
 * @package    realhomes
 * @subpackage classic
 */

$display_video = get_option( 'theme_display_video' );
if ( 'true' === $display_video ) {
	$tour_video_url       = get_post_meta( $post->ID, 'REAL_HOMES_tour_video_url', true );
	$tour_video_image_id  = get_post_meta( $post->ID, 'REAL_HOMES_tour_video_image', true );
	$tour_video_image_src = wp_get_attachment_image_src( $tour_video_image_id, 'property-detail-video-image' );
	$tour_video_image     = $tour_video_image_src[0];

	if ( ! empty( $tour_video_image ) && ! empty( $tour_video_url ) ) {
		?>
		<div class="property-video">
			<?php
			$property_video_title = get_option( 'theme_property_video_title' );
			if ( ! empty( $property_video_title ) ) {
				?><span class="video-label"><?php echo esc_html( $property_video_title ); ?></span><?php
			}
			?>
			<a href="<?php echo esc_url( $tour_video_url ); ?>" class="inspiry-lightbox-item" data-autoplay="true" data-vbtype="video">
				<div class="play-btn"></div>
				<?php echo '<img src="' . $tour_video_image . '" alt="' . get_the_title( $post->ID ) . '">'; ?>
			</a>
		</div>
		<?php
	}
}