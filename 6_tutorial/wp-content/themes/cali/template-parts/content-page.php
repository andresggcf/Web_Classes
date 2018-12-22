<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Cali
 */
$hide_thumb   = get_theme_mod( 'cali_page_hide_thumb', 0 );
$headerLayout = get_theme_mod( 'cali_page_header_layout', 'page-title--top' );
$titleAlignment = get_theme_mod( 'cali_page_title_alignment', 'page-title--align-center' );


if ( $hide_thumb ) :
    $headerLayout = 'page-no-feat-img';
endif;

$pageClasses = array(
    $headerLayout,
    $titleAlignment,
);
?>

<article id="post-<?php the_ID(); ?>" <?php post_class($pageClasses); ?>>

	<?php
        if ( ($headerLayout == 'feat-img--top') && !$hide_thumb ) :
            cali_post_thumbnail();
        endif; 
    ?>

	<header class="entry-header">
		<?php cali_page_title(); ?>
	</header><!-- .entry-header -->

	<?php
        if ( ($headerLayout == 'page-title--top') && !$hide_thumb ) :
            cali_post_thumbnail();
        endif; 
    ?>

	<div class="entry-content">
		<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'cali' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
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
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
	