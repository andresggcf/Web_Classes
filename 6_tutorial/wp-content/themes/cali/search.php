<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Cali
 */

get_header(); ?>
	<?php if ( have_posts() ) : ?>
		<div class="col-md-12">
			<div class="page-header">
				<h1 class="page-header_title"><?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for: %s', 'cali' ), '<span>' . get_search_query() . '</span>' );
				?></h1>
			</div>
		</div>
		<div id="primary" class="content-area col-md-12">
			<main id="main" class="site-main">
				<section>
					<div class="post-layout post-layout-columns-3 clearfix">
						<div class="row">
							<?php
							/* Start the Loop */
							while ( have_posts() ) : the_post(); ?>
								<div class="col-sm-6 col-md-4">
									<?php
									/*
									* Include the Post-Format-specific template for the content.
									* If you want to override this in a child theme, then include a file
									* called content-___.php (where ___ is the Post Format name) and that will be used instead.
									*/
									get_template_part( 'template-parts/content', 'search' );
									?>
								</div>
							<?php
							endwhile; ?>
							<div class="col-xs-12">
								<?php
								/* Post pagination */
								the_posts_pagination(); 
								?>
							</div>
						</div>
					</div>
				</section>
			</main><!-- #main -->
		</div><!-- #primary -->
	<?php else : 

		get_template_part( 'template-parts/content', 'none' );

	endif; ?>
<?php
//get_sidebar();
get_footer();
