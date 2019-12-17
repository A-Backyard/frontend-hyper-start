<?php
/**
 * Sidebar
 *
 * @package    realhomes
 * @subpackage classic
 */

?>
<div class="span4 sidebar-wrap">

	<!-- Sidebar -->
	<aside class="sidebar">
		<?php
		if ( ! dynamic_sidebar( 'default-sidebar' ) ) :
		endif;
		?>
	</aside>
	<!-- End Sidebar -->

</div>
