<?php
/**
 * Template Name: Narrow without sidebar
 * 
 * For narrow pages without sidebar
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Cali
 */

$pageType = 'page-no-sidebar';
$pageClass = 'col-md-8 col-md-offset-2';

get_header(); ?>
	<div id="primary" class="content-area <?php echo $pageType; ?> <?php echo $pageClass; ?>">
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
get_footer();
