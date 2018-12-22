<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Cali
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class( 'header-is-sticky' ); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'cali' ); ?></a>
	<header id="masthead" class="site-header">
		<div class="header-top clearfix ca-header-shadow--desktop">
			<div class="container-fluid">
				<div class="row">
					<div class="ca-header-shadow--mobile clearfix">
						<div class="col-xs-3 col-sm-2 ca-hide-on-desktop header-mobile-menu__wrap">
							<div class="header-mobile-menu">
								<button class="mobile-menu-toggle" aria-controls="primary-menu">
									<span class="mobile-menu-toggle_lines"></span>
									<span class="sr-only"><?php esc_html_e( 'Toggle mobile menu', 'cali' ); ?></span>
								</button>
							</div>
						</div><!-- /.header-mobile-menu -->
						<div class="col-xs-12 col-sm-8 ca-hide-on-desktop">
							<div class="site-branding site-branding--mobile">
								<?php the_custom_logo(); ?>
								<?php if ( is_front_page() && is_home() ) : ?>
									<h1 class="site-title--mobile"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
								<?php else : ?>
									<p class="site-title--mobile"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
								<?php endif; ?>
							</div><!-- .site-branding--mobile -->
						</div>
						<div class="col-xs-3 col-sm-2 ca-hide-on-desktop pull-right secondary-navigation__wrap secondary-navigation__wrap--mobile-top">
							<div class="secondary-navigation">
								<?php
								$show_wc_cart = get_theme_mod( 'cali_show_wc_cart', 1 );
								
								if ( class_exists( 'Woocommerce' ) && $show_wc_cart ) :

									// Mobile WooCommerce Cart dropdown
									get_template_part( 'template-parts/content', 'wc_cart_mini' );

								endif; //end Woocommerce class_exists check ?>
							</div>
						</div>
					</div>
					<div class="col-xs-12 main-navigation_wrap">
						<div class="row">
							<div class="col-xs-12 col-lg-2 pull-right secondary-navigation__wrap secondary-navigation__wrap--desktop-top">
								<div class="secondary-navigation">

									<div class="site-search__wrap site-search__wrap--header">
										<?php get_search_form(); ?>
									</div>

									<div class="ca-hide-on-mobile">
										<?php 
										if ( class_exists( 'Woocommerce' ) && $show_wc_cart ) :
										
										// Desktop WooCommerce Cart dropdown
										get_template_part( 'template-parts/content', 'wc_cart_mini' );

										endif; //end Woocommerce class_exists check ?>
									</div>
									
								</div>
							</div>
							<div class="col-xs-12 col-lg-8 col-lg-push-2">
								<nav id="site-navigation" class="main-navigation" role="navigation">
									<?php
										wp_nav_menu( array(
											'theme_location' => 'menu-1',
											'menu_id'        => 'primary-menu',
										) );
									?>
								</nav><!-- #site-navigation -->
							</div>
							<div class="col-xs-12 col-lg-2 col-lg-pull-8 social-navigation__wrap">
								<nav class="social-navigation social-links clearfix">
									<?php 
										wp_nav_menu( array( 
											'theme_location' 	=> 'menu-social-header', 
											'link_before'		=> '<span class="screen-reader-text">', 
											'link_after' 		=> '</span>', 
											'menu_id'        	=> 'social-header-menu', 
											'fallback_cb' 		=> false 
										) ); 
									?>
								</nav>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="site-branding site-branding--desktop ca-hide-on-mobile">
			<?php the_custom_logo(); ?>
			<?php if ( is_front_page() && is_home() ) : ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php else : ?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			<?php endif; ?>
			<?php $cali_description = get_bloginfo( 'description', 'display' );
			if ( $cali_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $cali_description; /* WPCS: xss ok. */ ?></p>
			<?php endif; ?>
		</div><!-- .site-branding--desktop -->
	</header><!-- #masthead -->

	<div id="content" class="site-content"><!-- ends in footer.php -->
		<?php

		// include post slider on home.php ie. blog post home page
		if ( is_home() ) :
			get_template_part( 'template-parts/content', 'slider_article' );
		endif;
		
		// show breadcrumbs on every page except front page
		if ( ! is_front_page() ) :
			get_template_part( 'template-parts/content', 'breadcrumbs' );
		endif;
		
		?>
		<div class="container clearfix"><!-- ends in footer.php -->
			<div class="row"><!-- ends in footer.php -->
