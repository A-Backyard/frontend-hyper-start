<?php
/**
 * Property card for similar properties.
 *
 * @package    realhomes
 * @subpackage classic
 */
?>
<article <?php post_class( 'property-item clearfix' ); ?>>

	<figure>
		<a href="<?php the_permalink(); ?>">
			<?php
			global $post;
			if ( has_post_thumbnail( $post->ID ) ) {
				the_post_thumbnail( 'grid-view-image' );
			} else {
				inspiry_image_placeholder( 'grid-view-image' );
			}
			?>
		</a>

		<?php
		inspiry_display_property_label( $post->ID );
		display_figcaption( $post->ID );
		?>

	</figure>


	<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
	<p><?php framework_excerpt( 9 ); ?>
		<a class="more-details" href="<?php the_permalink(); ?>"><?php esc_html_e( 'More Details ', 'framework' ); ?>
			<i class="fa fa-caret-right"></i></a></p>
	<?php
	$price = ere_get_property_price();
	if ( $price ) {
		echo '<span>' . $price . '</span>';
	}
	?>
</article>