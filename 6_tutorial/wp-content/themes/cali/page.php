<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Cali
 */

$sidebar = get_theme_mod( 'cali_blog_single_sidebar' );
$sidebar = true;

if ( !$sidebar ) {
	$cols = 'col-md-8 col-md-offset-2';
	$pageLayout = 'page-no-sidebar';
} else {
	$cols = 'col-md-8';
	$pageLayout = 'page-with-sidebar';
}

get_header(); ?>
	<div id="primary" class="content-area <?php echo $pageLayout ?> <?php echo $cols; ?>">
		<main id="main" class="site-main">
			<section>
				<?php
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/content', 'page' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile; // End of the loop.
				?>
			</section>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php 
if ( $sidebar ) {
	get_sidebar();
}
get_footer();
