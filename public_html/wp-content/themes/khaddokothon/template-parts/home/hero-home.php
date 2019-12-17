<?php
/**
 * Top Hero Section in Home
 *
 * @package KhaddoKothon
 */

$khaddokothon_hero_heading=get_theme_mod('khaddokothon_hero_heading', esc_html__('Food is Life!' , 'khaddokothon'));
$khaddokothon_hero_subheading=get_theme_mod('khaddokothon_hero_subheading', esc_html__('Awesome Sub Heading' , 'khaddokothon'));
$khaddokothon_hero_btn_text=get_theme_mod('khaddokothon_hero_btn_text', esc_html__('About us' , 'khaddokothon'));
?>

<section id="khaddokothon-hero-home">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<div class="khaddokothon-hero-content text-center">

					<h1 class="khaddokothon-hero-heading">
						<?php echo wp_kses_post($khaddokothon_hero_heading); ?>
					</h1>

					<p class="khaddokothon-hero-subheading mx-auto">
						<?php echo wp_kses_post($khaddokothon_hero_subheading); ?>
					</p>

					<a href="<?php echo esc_attr(get_theme_mod('khaddokothon_hero_btn_link')); ?>" class="mt-4 btn khaddokothon-btn">
						<?php echo wp_kses_post($khaddokothon_hero_btn_text); ?>
					</a>

				</div>

			</div> <!-- End col -->
		</div> <!-- End row -->
	</div> <!-- End container -->
</section>



