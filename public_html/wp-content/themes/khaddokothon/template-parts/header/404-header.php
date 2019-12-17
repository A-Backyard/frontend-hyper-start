<?php
$khaddokothon_404_page_title = get_theme_mod('khaddokothon_404_page_title', esc_html__('404' , 'khaddokothon'));
?>

<!-- ========== Start Page Header ========== -->
<section class="khaddokothon-page-header khaddokothon-404-header khaddokothon-bg-overlay" style="background-image: url('<?php header_image(); ?>')">
	<div class="container">
		<div class="row">
			<div class="col-md-12 khaddokothon-page-header-content d-flex align-items-center justify-content-center">

				<div class="text-center">
                    <h1 class="h2">
	                    <?php echo wp_kses_post($khaddokothon_404_page_title); ?>
                    </h1>
				</div>

			</div> <!-- End col -->
		</div> <!-- End row -->
	</div> <!-- End container -->
</section>

<!-- ========== End Page Header ========== -->