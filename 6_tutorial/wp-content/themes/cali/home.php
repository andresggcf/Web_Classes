<?php
/**
 * Home template file
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Cali
 */

$moSliderCategory = get_theme_mod( 'cali_post_slider_category');

$sidebar = get_theme_mod( 'cali_blog_home_sidebar', 1 );

$postLayout = 'post-layout-columns-2';
$postCols = 'col-sm-6 col-md-6';

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
				<div class="post-layout post-layout-home <?php echo $postLayout ?>">
					<?php

					$postIndex = 0;
					if ( have_posts() ) :

						// If the page is "paged" place div.row opening tag - used as post wrapper
						// else the opening tag is placed after the highlighted/sticky post on line #59
						if ( is_paged() ) :
						?>
								<div class="row">
						<?php 
						endif;

						// The Loop
						while (have_posts()) : the_post();

							// If latest post on page or sticky, use content-post_highlighted and wrap it in .row
							if ( $postIndex == 0 && !is_paged() ) : ?>

								<div class="row">
									<div class="col-md-12">
										<?php get_template_part( 'template-parts/content', 'post_highlighted' ); ?>
									</div>
								</div>

								<div class="row">
							<?php
							// else use regular content for all other posts on the page
							else : ?>

									<div class="<?php echo $postCols ?>">
										<?php get_template_part( 'template-parts/content', get_post_format() ); ?>
									</div>

							<?php
							endif;

						$postIndex++;

						endwhile; ?>
					
								<div class="col-xs-12">
									<?php
									/* Post pagination */
									the_posts_pagination(); 
									?>
								</div>
					<?php
					else :

						// no posts found
						get_template_part( 'template-parts/content', 'none' );

					endif;

					/* Restore original Post Data */
					wp_reset_postdata();

					?>
								</div><!-- end of div.row for posts under highlighted post -->
				</div>
			</section>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php 
if ( $sidebar ) {
	get_sidebar();
}
get_footer();
