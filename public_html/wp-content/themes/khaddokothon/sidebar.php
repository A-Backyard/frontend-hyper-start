<?php
/**
 * Default Sidebar
 *
 * @package KhaddoKothon
 */
?>

<div class="col-lg-4">
	<div class="khaddokothon-sidebar-wrapper mt-5 mt-lg-0">
		<?php
		if ( is_active_sidebar( 'sidebar-1' ) ) {
			dynamic_sidebar( 'sidebar-1' );
		}
		?>
	</div>
</div> <!-- End col -->