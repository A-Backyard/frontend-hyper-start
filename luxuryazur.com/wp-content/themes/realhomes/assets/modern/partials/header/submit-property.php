<?php
$submit_url = inspiry_get_submit_property_url();
if ( ! empty( $submit_url ) ) {
	?>
	<div class="rh_menu__user_submit">
		<a href="<?php echo esc_url( $submit_url ); ?>"><?php esc_html_e( 'Submit', 'framework' ); ?></a>
	</div><!-- /.rh_menu__user_submit -->
	<?php
}
?>