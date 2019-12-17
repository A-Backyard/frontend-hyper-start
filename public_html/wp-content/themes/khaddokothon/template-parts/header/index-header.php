<?php
$_post = get_queried_object();
$heading= get_theme_mod('khaddokothon_blog_index_heading');
$heading_pfp= get_the_title( get_option('page_for_posts', true) );
?>


<!-- ========== Start Page Header ========== -->
<section class="khaddokothon-page-header khaddokothon-bg-overlay" style="background-image: url('<?php header_image(); ?>')">
	<div class="container">
		<div class="row">
			<div class="col-md-12 khaddokothon-page-header-content d-flex align-items-center justify-content-center">

				<div class="text-center">
                    <?php if(is_home() && !empty($heading) ): ?>
					    <h1 class="h2"><?php echo esc_html($heading); ?></h1>
					<?php elseif(is_home()): ?>
                        <h1 class="h2"><?php echo esc_html($heading_pfp); ?></h1>
                    <?php elseif(is_category()): ?>
                        <h1 class="h2"><?php single_cat_title(__('Posts from: ','khaddokothon')); ?></h1>
                    <?php elseif(is_tag()): ?>
                        <h1 class="h2"><?php single_tag_title(__('Posts from: ','khaddokothon')); ?></h1>
                    <?php elseif(is_author()): ?>
                        <h1 class="h2"><?php printf( __( 'Posts from: %s', 'khaddokothon' ), get_the_author() ); ?></h1>
                    <?php else : ?>
                        <h1 class="h2"><?php _e('Archive', 'khaddokothon'); ?></h1>
                    <?php endif; ?>
				</div>

			</div> <!-- End col -->
		</div> <!-- End row -->
	</div> <!-- End container -->
</section>

<!-- ========== End Page Header ========== -->