<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Cali
 */


$sectionClass = is_404() ? 'error404' : 'no-results';
?>

<section class="<?php echo $sectionClass; ?> not-found clearfix">
	<div class="col-md-12">
		<div class="page-header">
			<?php
			if ( is_404() ) { ?>
				<h1 class="page-header_title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'cali' ); ?></h1>
			<?php
			} else { ?>
				<h1 class="page-header_title"><?php esc_html_e( 'Nothing Found', 'cali' ); ?></h1>
			<?php
			}
			?>
		</div>
	</div>
	<div id="primary" class="content-area col-md-12">
		<main id="main" class="site-main">
			<section class="ca-txt--center">
				<?php
				if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

					<p><?php
						printf(
							wp_kses(
								/* translators: 1: link to WP admin new post page. */
								__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'cali' ),
								array(
									'a' => array(
										'href' => array(),
									),
								)
							),
							esc_url( admin_url( 'post-new.php' ) )
						);
					?></p>

				<?php elseif ( is_search() ) : ?>

					<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'cali' ); ?></p>
					<div class="site-search__wrap site-search__wrap--body">
						<?php get_search_form(); ?>
					</div><!-- /.site-search__wrap--body -->

				<?php else : ?>

					<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'cali' ); ?></p>
					<div class="site-search__wrap site-search__wrap--body">
						<?php get_search_form(); ?>
					</div><!-- /.site-search__wrap--body -->

				<?php endif; ?>
			</section>
		</main><!-- #main -->
	</div><!-- #primary -->
</section><!-- .no-results -->
