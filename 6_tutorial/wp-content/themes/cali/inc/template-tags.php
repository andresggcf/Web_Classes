<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Cali
 */

if ( ! function_exists( 'cali_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function cali_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			'<a href="%1$s" rel="bookmark">%2$s</a>',
			esc_url( get_permalink() ),
			$time_string
		);

		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'by %s', 'post author', 'cali' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="byline"> ' . $byline . '</span> <span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'cali_posted_on_static' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time without the link.
	 */
	function cali_posted_on_static() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$posted_on = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'by %s', 'post author', 'cali' ),
			'<span class="slide-overlay_author">' . esc_html( get_the_author() ) . '</span>'
		);

		echo $byline . ', <span class="slide-overlay_date">' . $posted_on . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'cali_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function cali_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'by %s', 'post author', 'cali' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'cali_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function cali_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'cali' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'cali' ) . '</span>', $categories_list ); // WPCS: XSS OK.
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'cali' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'cali' ) . '</span>', $tags_list ); // WPCS: XSS OK.
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'cali' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'cali' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

if ( ! function_exists( 'cali_post_thumbnail' ) ) :
/**
 * Displays an optional post thumbnail.
 *
 * Wraps the post thumbnail in an anchor element on index views, or a div
 * element when on single views.
 */
function cali_post_thumbnail() {
	if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
		return;
	}

	if ( is_singular() ) :
	?>

	<figure class="entry-thumb">
		<?php the_post_thumbnail(); ?>
	</figure><!-- .post-thumbnail -->

	<?php else : ?>

	<a class="entry-thumb" href="<?php the_permalink(); ?>" aria-hidden="true">
		<?php
			the_post_thumbnail( 'post-thumbnail', array(
				'alt' => the_title_attribute( array(
					'echo' => false,
				) ),
			) );
		?>
	</a>

	<?php endif; // End is_singular().
}
endif;

if ( ! function_exists( 'cali_show_cats' ) ) :
/**
 * Prints HTML with meta information for the categories
 */
function cali_show_cats() {
	if ( 'post' === get_post_type() ) {
		$categories_list = get_the_category_list(', ');
		if ( $categories_list ) {
			echo '<span class="cat-links">' . $categories_list . '</span>';
		}

	}
}
endif;

/**
 * First category
 */
function cali_get_first_cat() {
	if ( 'post' === get_post_type() ) {
		$cats = get_the_category();
		echo '<a href="' . esc_url( get_category_link( $cats[0]->term_id ) ) . '" title="' . esc_attr( $cats[0]->name ) . '" >' . esc_html( $cats[0]->name ) . '</a>';
	}
}

/**
 * First category name
 */
function cali_get_first_cat_name() {
	if ( 'post' === get_post_type() ) {
		$cats = get_the_category();
		echo esc_html( $cats[0]->name );
	}
}

/**
 * Custom read more link
 */
function cali_read_more_link() {

	$more = get_theme_mod('cali_custom_read_more_highlighted');
  	if ( $more == '' ) {
    	echo '<a class="more-link" href="' . esc_url( get_permalink() ) . '">' . esc_html__( 'Continue Reading', 'cali' ) . '</a>';
	} else {
		echo '<a class="more-link" href="' . esc_url( get_permalink( get_the_ID() ) ) . '">' . esc_html( $more ) . '</a>';
	}
}

/**
 * Page title
 */
function cali_page_title() {

	?>
	<?php if ( is_home() ) : ?>
		<h1 class="page-header_title"><?php single_post_title(); ?></h1>
	<?php elseif ( is_page() ) : ?>
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	<?php elseif ( class_exists( 'Woocommerce') && is_woocommerce() ) : ?>
		<h1 class="page-title"><?php woocommerce_page_title(); ?></h1>
	<?php elseif ( is_archive() ) : ?>
		<?php the_archive_title( '<h1 class="page-header_title">', '</h1>' ); ?>
		<?php the_archive_description( '<h3 class="page-header_subtitle">', '</h3>' ); ?>
	<?php endif; ?>

	<?php
}
