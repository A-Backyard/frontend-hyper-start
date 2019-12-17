<?php
$_post = get_queried_object();
$khaddokothon_header_overlay_active = get_theme_mod('khaddokothon_header_overlay_active', true);
$khaddokothon_header_overlay = ($khaddokothon_header_overlay_active == true) ? 'khaddokothon-bg-overlay' : '';
?>

<!-- ========== Start Page Header ========== -->
<section class="khaddokothon-page-header <?php echo esc_attr($khaddokothon_header_overlay); ?>" style="background-image: url('<?php header_image(); ?>')">
	<div class="container">
		<div class="row">
			<div class="col-md-12 khaddokothon-page-header-content d-flex align-items-center justify-content-center">

				<div class="text-center">
                    <h1 class="h2"><?php echo the_title(); ?></h1>
				</div>

			</div> <!-- End col -->
		</div> <!-- End row -->
	</div> <!-- End container -->
</section>

<!-- ========== End Page Header ========== -->