<?php
$khaddokothon_blog_search_title = get_theme_mod('khaddokothon_blog_search_title', esc_html__('Search Results for: ' , 'khaddokothon'));
?>

<!-- ========== Start Page Header ========== -->
<section class="khaddokothon-parallax khaddokothon-page-header khaddokothon-search-header khaddokothon-bg-overlay">
	<div class="container">
		<div class="row">
			<div class="col-md-12 khaddokothon-page-header-content d-flex align-items-center justify-content-center">

				<div class="text-center">
                    <h1 class="h2"><?php printf( wp_kses_post($khaddokothon_blog_search_title) . get_search_query() ); ?></h1>
				</div>

			</div> <!-- End col -->
		</div> <!-- End row -->
	</div> <!-- End container -->
</section>

<!-- ========== End Page Header ========== -->