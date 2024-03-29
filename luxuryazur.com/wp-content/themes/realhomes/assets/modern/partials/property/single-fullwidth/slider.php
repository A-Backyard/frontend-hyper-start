<?php
/**
 * Single Property: Slider Fullwidth
 */
$gallery_slider_type = get_post_meta( get_the_ID(), 'REAL_HOMES_gallery_slider_type', true );
$properties_images   = rwmb_meta( 'REAL_HOMES_property_images', 'type=plupload_image&size=' . 'modern-property-detail-slider', get_the_ID() );
?>
<div class="single-property-fullwidth-flexslider">
    <?php if ( ! empty( $properties_images ) && count( $properties_images ) ) : ?>
        <div id="property-detail-flexslider" class="clearfix">
            <div class="flexslider">
                <ul class="slides">
                    <?php
                    $title_in_lightbox = get_option( 'inspiry_display_title_in_lightbox' );
                    foreach ( $properties_images as $prop_image_id => $prop_image_meta ) {

                        $slider_thumb = wp_get_attachment_image_src( $prop_image_id, 'property-detail-slider-thumb' );

                        echo '<li>';
                        if ( 'true' == $title_in_lightbox ) {
                            echo '<a href="' . $prop_image_meta['full_url'] . '" class="' . get_lightbox_plugin_class() . '" ' . generate_gallery_attribute() . ' title="' . $prop_image_meta['title'] . '">';
                        } else {
                            echo '<a href="' . $prop_image_meta['full_url'] . '" class="' . get_lightbox_plugin_class() . '" ' . generate_gallery_attribute() . ' >';
                        }
                        echo '<img src="' . $prop_image_meta['url'] . '" alt="' . $prop_image_meta['title'] . '" />';
                        echo '</a>';
                        echo '</li>';
                    }
                    ?>
                </ul>
            </div>
        </div>
	    <?php if( count( $properties_images ) ) : ?>
            <span id="slider-item" class="slider-item-count">
                <span class="slider-item-current">1</span>
                <span class="of"><?php esc_html_e( 'of', 'framework' ); ?></span>
                <span class="slider-item-total"><?php echo count( $properties_images ); ?></span>
            </span>
	    <?php endif; ?>
        <?php if ( has_post_thumbnail() ) : ?>
            <div id="property-featured-image" class="clearfix only-for-print">
                <?php
                $image_id  = get_post_thumbnail_id();
                $image_url = wp_get_attachment_url( $image_id );
                echo '<img src="' . esc_url( $image_url ) . '" alt="' . get_the_title() . '" />';
                ?>
            </div>
        <?php endif; ?>
    <?php elseif ( has_post_thumbnail() ) : ?>
        <div id="property-featured-image" class="clearfix">
            <?php
            $image_id  = get_post_thumbnail_id();
            $image_url = wp_get_attachment_url( $image_id );
            echo '<a href="' . esc_url( $image_url ) . '" class="' . get_lightbox_plugin_class() . '" ' . generate_gallery_attribute() . '>';
            echo '<img src="' . esc_url( $image_url ) . '" alt="' . get_the_title() . '" />';
            echo '</a>';
            ?>
        </div>
     <?php endif; ?>
    <div class="property-head-wrapper">
	    <?php get_template_part( 'assets/modern/partials/property/single-fullwidth/head' ); ?>
    </div>
</div>