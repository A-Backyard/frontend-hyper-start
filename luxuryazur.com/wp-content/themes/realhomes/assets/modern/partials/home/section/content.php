<?php
/**
 * Content Section of homepage.
 *
 * @package    realhomes
 * @subpackage modern
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $post;

if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();
		?>
        <section class="rh_section <?php if ( ! empty( get_the_content() ) ) {
			echo esc_attr( ' rh_section__content rh_section--content_padding' );
		} ?> ">
        <article id="post-<?php the_ID(); ?>" <?php post_class( 'rh_content' ); ?>>
				<?php the_content(); ?>
			</article>
		</section>
		<?php
	endwhile;
endif;
