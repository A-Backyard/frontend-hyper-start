<?php
/**
 * Comment List & Form
 *
 * @package KhaddoKothon
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="mt-5">

	<?php if ( have_comments() ) : ?>
		<h4>
			<?php
				comments_number( esc_html__( 'no responses', 'khaddokothon' ),
					esc_html__( '1 Comment', 'khaddokothon' ),
					esc_html__( '% Comments', 'khaddokothon' )
				);
			?>
		</h4>
		<ul class="comment-list list-inline">
			<?php
				wp_list_comments( array(
					'style'             => 'ul',
					'short_ping'        => true,
					'avatar_size'       => 60,
					'per_page'          => '',
					'reverse_top_level' => true,
					'walker'            => new khaddokothon_Walker_Comment()
				) );
			?>
		</ul>
        <?php khaddokothon_comments_pagination(); ?>
	<?php endif; ?>

	<?php
		// Show Comments Count
		if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
        <!--When Comments are closed show this message-->
		<p class="no-comments"><?php echo esc_html__( 'Comments are closed.', 'khaddokothon' ); ?></p>
	<?php endif; ?>

    <!--Comment Form-->
	<?php
		$commenter = wp_get_current_commenter();
		$consent = empty( $commenter['comment_author_email'] ) ? '' : ' checked="checked"';

		$fields = array(

			'author' =>
			'<div class="row"><div class="col-md-4 mb-3"><label for="author">' . esc_html__( 'Name', 'khaddokothon' ) . '</label> <span class="required">*</span> 
<input id="author" name="author" type="text" class="form-control" value="' . esc_attr( $commenter['comment_author'] ) . '" required="required" /></div>',

			'email' =>
			'<div class="col-md-4 mb-3"><label for="email">' . esc_html__( 'Email', 'khaddokothon' ) . '</label> <span class="required">*</span><input id="email" 
name="email" class="form-control" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" required="required" /></div>',

			'url' =>
			'<div class="col-md-4 mb-3"><label for="url">' . esc_html__( 'Website', 'khaddokothon' ) . '</label><input id="url" name="url" class="form-control" 
type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" /></div></div>',

			'cookies' =>
			'<p class="comment-form-cookies-consent"><input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" 
type="checkbox" value="yes" ' . $consent . ' />' .
			'<label for="wp-comment-cookies-consent">' . esc_html__( 'Save my details for the next time I comment.', 'khaddokothon' ) . '</label></p>'

		);

		$args = array(
			'class_submit'  => 'btn khaddokothon-btn mt-2',
			'title_reply_before' => '<h5 id="reply-title" class="">',
			'title_reply_after' => '</h5>',
			'comment_notes_before' => '',
			'comment_field' => '<div class="form-group"><label for="comment">' . _x( 'Comment', 'noun', 'khaddokothon' ) . '</label> <span class="required">*</span><textarea id="comment" class="form-control" name="comment" rows="7" required="required"></textarea></div>',
			'fields' => apply_filters( 'comment_form_default_fields', $fields ),
			'submit_field' => '<p class="text-center">%1$s %2$s</p>',
		);

		comment_form( $args );

	?>

</div>