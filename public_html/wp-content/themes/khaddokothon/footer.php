<?php
/**
 * Site Footer
 *
 * @package KhaddoKothon
 */

?>

</div>
<!-- ========== End Main Wrapper ========== -->


<!-- ========== Start khaddokothon Footer Widgets ========== -->
<?php
    if(get_theme_mod('khaddokothon_footer_widgets_display')){
	    get_template_part( 'template-parts/footer/footer-widgets' );
    }
?>
<!-- ========== End khaddokothon Footer Widgets ========== -->


<!-- ========== Start Footer ========== -->
<footer id="khaddokothon-site-footer" class="khaddokothon-theme-bg-dark">
	<div class="container">
		<div class="row">

			<div class="col-12">
				<div class="khaddokothon-footer-content pt-4 pb-4 d-flex flex-column flex-lg-row justify-content-lg-between">
					<div class="khaddokothon-footer-copyright align-self-lg-center">
						<p>
                            <?php echo date('Y') . ' '; ?>/
                            <!-- ========== Support the author, do not change this footer credits. If you need your own
                             branding here, please purchase a license for it. Thanks! ========== -->
							<?php printf(
								__( 'KhaddoKothon Theme by %1$sTab Themes%2$s' , 'khaddokothon' ),
								'<a href="https://www.tabthemes.com/">',
								'</a>'
							); ?>
                        </p>
					</div>

                    <?php
                        if(get_theme_mod('khaddokothon_footer_social_display')){
	                        get_template_part( 'template-parts/footer/footer-social' );
                        }
                    ?>
				</div>

			</div> <!-- End col -->
		</div> <!-- End row -->
	</div> <!-- End container -->
</footer>
<!-- ========== End Footer ========== -->

<?php if(get_theme_mod('khaddokothon_back_to_top_display',true)) : ?>
<!-- Back to top -->
<a href="#" id="khaddokothon-back-to-top" title="<?php _e('Back to top','khaddokothon'); ?>"><i class="fas fa-angle-up"></i></a>
<!-- /Back to top -->
<?php endif; ?>

<!-- Footer -->
<?php wp_footer() ?>

</body>
</html>