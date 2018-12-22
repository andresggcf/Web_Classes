<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Cali
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) : ?>
		<h3 class="comments-title section-title">
			<?php
			$comment_count = get_comments_number();
			if ( '1' === $comment_count ) {
				printf(
					/* translators: 1: title. */
					esc_html__( 'One comment on &ldquo;%1$s&rdquo;', 'cali' ),
					'<span>' . get_the_title() . '</span>'
				);
			} else {
				if ( $comment_count < "10" ) {
					printf( // WPCS: XSS OK.
						/* translators: 1: comment count number, 2: title. */
						esc_html( _nx( '0%1$s comment on &ldquo;%2$s&rdquo;', '0%1$s comments on &ldquo;%2$s&rdquo;', $comment_count, 'comments title', 'cali' ) ),
						number_format_i18n( $comment_count ),
						'<span>' . get_the_title() . '</span>'
					);
				} else {
					printf( // WPCS: XSS OK.
						/* translators: 1: comment count number, 2: title. */
						esc_html( _nx( '%1$s comment on &ldquo;%2$s&rdquo;', '%1$s comments on &ldquo;%2$s&rdquo;', $comment_count, 'comments title', 'cali' ) ),
						number_format_i18n( $comment_count ),
						'<span>' . get_the_title() . '</span>'
					);
				}
			}
			?>
		</h3><!-- .comments-title -->

		<?php the_comments_navigation(); ?>

		<ul class="comment-list">
			<?php
				wp_list_comments( array(
					'style'      => 'ul',
					'short_ping' => true,
					'avatar_size'=> 70,
					'callback'	 => 'cali_comment_template'
				) );
			?>
		</ul><!-- .comment-list -->

		<?php the_comments_navigation();

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) : ?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'cali' ); ?></p>
		<?php
		endif;

	endif; // Check for have_comments().

	$aria_req = ( $req ? " aria-required='true'" : '' );
	$html_req = ( $req ? " required='required'" : '' );
	
	$html5 = true;

	$comment_args = array( 
		'title_reply'			=> 'Leave a comment',
		'fields' 				=> apply_filters( 'comment_form_default_fields', array(
		'author' 				=> '<p class="comment-form-author">' .
									'<input id="author" name="author" type="text" placeholder="' . esc_attr__( 'Name', 'cali' ) . ( $req ? ' *' : '' ) . '" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" maxlength="245"' . $aria_req . $html_req . ' /></p>',
		'email'  				=> '<p class="comment-form-email">' .
		            				'<input id="email" name="email" type="email" placeholder="' . esc_attr__( 'Email', 'cali' ) . ( $req ? ' *' : '' ) . '" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" maxlength="100" aria-describedby="email-notes"' . $aria_req . $html_req  . ' /></p>',
		'url'    				=> '<p class="comment-form-url">' .
									'<input id="url" name="url" type="url" placeholder="' . esc_attr__( 'Website', 'cali' ) .'" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" maxlength="200" /></p>'
		)),
		'comment_field' 		=> '<p class="comment-form-comment"><textarea id="comment" name="comment" placeholder="' . _x( 'Message', 'noun', 'cali' ) . ' *' . '" cols="45" rows="3" maxlength="65525" aria-required="true" required="required"></textarea></p>',
		'comment_notes_after' 	=> '',
		'label_submit'         	=> esc_attr__( 'Send Message', 'cali' ),
	);

	comment_form($comment_args);
	?>

</div><!-- #comments -->
