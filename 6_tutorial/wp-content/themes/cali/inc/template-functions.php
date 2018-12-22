<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Cali
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function cali_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'cali_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function cali_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'cali_pingback_header' );

/**
 * Single comment template
 */
function cali_comment_template($comment, $args, $depth) {

	?>
	<li id="comment-<?php comment_ID(); ?>" <?php comment_class( $comment->has_children ? 'parent' : '' ); ?>>
		<article id="div-comment-<?php comment_ID(); ?>" class="comment-body comment-entry clearfix">
			<figure class="comment-avatar">
				<?php echo get_avatar( $comment, $args['avatar_size'] ); ?>
			</figure>
			<div class="comment-text">
				<header class="comment-meta">
					<span class="comment-author">
					<?php printf( '<b class="fn">%s</b>', get_comment_author_link() ) ; ?>
					</span><!-- .comment-author -->
					<span class="comment-time">,
						<time datetime="<?php comment_time( 'c' ); ?>">
							<?php
								/* translators: 1: comment date, 2: comment time */
								printf( esc_html__( '%1$s at %2$s', 'cali' ), get_comment_date( '', $comment ), get_comment_time() );
							?>
						</time>
					</span><!-- .comment-metadata -->
					<a class="comment-href" href="<?php echo esc_url( get_comment_link( $comment, $args ) ); ?>">
						<span class="sr-only"><?php esc_html_e( 'Direct link to comment', 'cali' ); ?></span>
						<i class="fas fa-link" aria-hidden="true"></i>
					</a>
				</header><!-- .comment-meta -->

				<div class="comment-content">
					<?php if ( '0' == $comment->comment_approved ) : ?>
					<p class="comment-awaiting-caliration"><?php esc_html_e( 'Your comment is awaiting caliration.', 'cali' ); ?></p>
					<?php endif; ?>

					<?php comment_text(); ?>
				</div><!-- .comment-content -->
				<footer class="comment-links">
					<?php edit_comment_link( __( 'Edit', 'cali' ), '<span class="edit-link">', '</span>' ); ?>
					<?php
					comment_reply_link( array_merge( $args, array(
						'add_below' => 'div-comment',
						'depth'     => $depth,
						'max_depth' => $args['max_depth'],
						'before'    => '<span class="reply-link">',
						'after'     => '</span>'
					) ) );
					?>
				</footer><!-- .comment-links -->
			</div>
		</article>
	<?php
}

/**
 * Move comment textarea to bottom.
 */
function cali_move_comment_field_to_bottom( $fields ) {
	$comment_field = $fields['comment'];
	unset( $fields['comment'] );
	$fields['comment'] = $comment_field;
	return $fields;
} 
add_filter( 'comment_form_fields', 'cali_move_comment_field_to_bottom' );

/**
 * Excerpt length
 */
function cali_excerpt_length( $length ) {

	if ( is_admin() ) {
		return $length;
	}

	$excerpt = get_theme_mod('cali_exc_length', '20');
	return $excerpt;
}
add_filter( 'excerpt_length', 'cali_excerpt_length', 999 );

/**
 * Excerpt read more
 * We are using a custom Read more position for highlighted posts
 */
function cali_custom_excerpt( $more ) {

	if ( is_admin() ) {
		return $more;
	}

	$more = get_theme_mod('cali_custom_read_more_regular');
  	if ( $more == '' ) {
    	return '<span class="read-more">[&hellip;]</span>';
	} else {
		return ' <a class="read-more" href="' . esc_url( get_permalink( get_the_ID() ) ) . '">' . esc_html( $more ) . '</a>';
	}
}
add_filter( 'excerpt_more', 'cali_custom_excerpt' );

/**
 * Remove labels from archives
 */
function cali_remove_archive_labels( $title ) {
    if ( is_category() ) {
        $title = single_cat_title( '', false );
    } elseif ( is_tag() ) {
        $title = single_tag_title( '', false );
    } elseif ( is_author() ) {
        $title = '<span class="vcard">' . get_the_author() . '</span>';
    } elseif ( is_post_type_archive() ) {
        $title = post_type_archive_title( '', false );
    } elseif ( is_tax() ) {
        $title = single_term_title( '', false );
    }
  
    return $title;
}
 
add_filter( 'get_the_archive_title', 'cali_remove_archive_labels' );