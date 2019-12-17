<?php
$footer_columns = get_theme_mod('khaddokothon_footer_widgets_column',3);
if ($footer_columns == 12) {
	$footer_column = 1;
} elseif ($footer_columns == 6) {
	$footer_column = 2;
} elseif ($footer_columns == 4) {
	$footer_column = 3;
} elseif ($footer_columns == 3) {
	$footer_column = 4;
}
?>
<section id="khaddokothon-footer-widgets">
	<div class="container">
		<div class="row">
			<?php for ($i = 1; $i <= $footer_column; $i++): ?>
				<div class="col-md-<?php echo esc_attr($footer_columns); ?>">
					<?php
					if (is_active_sidebar('footer-widget-' . $i)):
						dynamic_sidebar('footer-widget-' . $i);
					endif;
					?>
				</div>
			<?php endfor; ?>
		</div>
	</div>
</section>