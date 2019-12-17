<?php
/**
 * Comments Walker
 *
 * @package KhaddoKothon
 */

class khaddokothon_Walker_Comment extends Walker_Comment {

	/**
	 * Outputs a comment in the HTML5 format.
	 *
	 * @since 3.6.0
	 * @access protected
	 *
	 * @see wp_list_comments()
	 *
	 * @param WP_Comment $comment Comment to display.
	 * @param int        $depth   Depth of the current comment.
	 * @param array      $args    An array of arguments.
	 */
	protected function html5_comment( $comment, $depth, $args ) {
		$tag = ( 'div' === $args['style'] ) ? 'div' : 'li';
?>
		<<?php echo esc_html($tag); ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( $this->has_children ? 'parent' : '', $comment ); ?>>
			<article id="div-comment-<?php comment_ID(); ?>" class="comment-body">

				<div class="comment-avatar">
					<?php if ( 0 != $args['avatar_size'] ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
				</div>

				<div class="comment-text">
					<?php
						printf( __( '%s <span class="sr-only sr-only-focusable screen-reader-text">says:</span>', 'khaddokothon' ),
							sprintf( '<h6 class="comment-author d-block mb-0">%s</h6>', get_comment_author_link( $comment ) )
						);
					?>
					<div class="comment-metadata">
						<a href="<?php echo esc_url( get_comment_link( $comment, $args ) ); ?>" class="comment-date">
							<time datetime="<?php comment_time( 'c' ); ?>">
								<?php
									printf( esc_html__( '%1$s at %2$s', 'khaddokothon' ), get_comment_date( '', $comment ), get_comment_time() );
								?>
							</time>
						</a>
					</div>

					<?php if ( '0' == $comment->comment_approved ) : ?>
					<p class="p-2 text-center khaddokothon-theme-bg-light"><?php _e( 'Your comment is awaiting moderation.', 'khaddokothon' );
					?></p>
					<?php endif; ?>

					<div class="comment-content">
						<?php comment_text(); ?>
					</div>

                    <?php
                        global $post;
                        $current_user = wp_get_current_user();
                        if(current_user_can( 'edit_others_posts', $post->ID ) && ($post->post_author == $current_user->ID)):
                    ?>
                    <div class="comment-edit-link">
					    <?php edit_comment_link( esc_html__( 'Edit', 'khaddokothon' )); ?>
                    </div>
                    <?php endif; ?>

					<?php
					comment_reply_link( array_merge( $args, array(
						'add_below' => 'div-comment',
						'depth'     => $depth,
						'max_depth' => $args['max_depth'],
						'before'    => '<div class="reply">',
						'after'     => '</div>',
                        'reply_text' => '<i class="fas fa-reply"></i>'
					) ) );
					?>

				</div>


			</article>
<?php
	}
}