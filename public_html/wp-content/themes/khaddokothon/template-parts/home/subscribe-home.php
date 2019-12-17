<?php
/**
 * Subscribe Section in Home
 * Needs 3rd Party plugin
 * @package KhaddoKothon
 */
$khaddokothon_subscribe_heading=get_theme_mod('khaddokothon_subscribe_heading', esc_html__('Subscribe' , 'khaddokothon'));
$khaddokothon_subscribe_page=get_theme_mod('khaddokothon_subscribe_page');
?>


<section id="khaddokothon-subscribe-home" class="khaddokothon-theme-bg-light">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 offset-lg-2 text-center">
				<h2 class="d-block"><?php echo wp_kses_post($khaddokothon_subscribe_heading); ?></h2>
                <?php
                    $khaddokothon_post_id = $khaddokothon_subscribe_page;
                    $khaddokothon_post = get_post($khaddokothon_post_id);
                    $khaddokothon_post_content = $khaddokothon_post->post_content;
                    $khaddokothon_post_content = apply_filters('the_content', $khaddokothon_post_content);
                    echo $khaddokothon_post_content;
                ?>
			</div> <!-- End col -->
		</div> <!-- End Row -->
	</div> <!-- End container -->
</section>