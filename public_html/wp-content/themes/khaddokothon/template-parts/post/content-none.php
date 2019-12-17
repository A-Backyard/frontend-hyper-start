<?php
/**
 * No Content
 *
 * @package KhaddoKothon
 */
?>

<article <?php post_class('entry'); ?>>

	<div class="text-center">
		<h3><?php echo esc_html__( 'There is no content to display', 'khaddokothon' ); ?></h3>
		<div class="mt-2">
			<p><?php echo esc_html__( 'But you can continue your search', 'khaddokothon' ) ?></p>
			<?php get_search_form(); ?>
		</div>
	</div>

</article>