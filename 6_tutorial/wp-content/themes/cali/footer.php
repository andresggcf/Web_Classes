<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Cali
 */

?>

			</div><!-- /.row started in header.php -->
		</div><!-- /.container started in header.php -->
	</div><!-- #content started in header.php -->
	<?php 
	
	if ( is_active_sidebar( 'footer-instagram' ) ) {
		dynamic_sidebar('footer-instagram');
	}
	
	?>
		
	<footer id="colophon" class="site-footer">
		<div class="container">
			<nav class="social-navigation--footer social-links clearfix ca-social-buttons">
				<?php
					wp_nav_menu( array(
						'theme_location' => 'menu-social-footer',
						'menu_id'        => 'social-footer-menu',
						'fallback_cb'	 => false,
					) );
				?>
			</nav>
			<div class="site-branding--footer">
				<?php
				the_custom_logo(); ?>
				<p class="site-title--footer"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			</div><!-- .site-branding -->
			<nav class="footer-navigation clearfix">
				<?php
					wp_nav_menu( array(
						'theme_location' => 'footer-menu',
						'menu_id'        => 'footer-menu',
						'depth'			 => 1
					) );
				?>
			</nav><!-- #site-navigation -->
			<?php do_action( 'cali_footer' ); ?>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
