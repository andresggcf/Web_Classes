<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Cali
 */

$sidebar = get_theme_mod( 'cali_blog_single_sidebar', 1 );

if ( !$sidebar ) {
	$cols = 'col-md-8 col-md-offset-2';
} else {
	$cols = 'col-md-8';
}

get_header(); ?>
	<div id="primary" class="content-area <?php echo $cols; ?>">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) : the_post(); ?>

			<section>
				<?php get_template_part( 'template-parts/content', 'single' ); ?>
			</section>

			<section>
				<?php get_template_part( 'template-parts/content', 'next_prev_posts' ); ?>
			</section>

			<section>
				<?php
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif; ?>
			</section>

		<?php
		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->
<?php
if ( $sidebar ) {
	get_sidebar();
}
get_footer();
