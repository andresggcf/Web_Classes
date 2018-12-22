<?php
/**
 * Template part for displaying sidebar HTML during dev stage
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Cali
 */

?>

<div class="site-breadcrumbs">
	<div class="container">
		<?php
		if ( class_exists( 'WooCommerce' ) && is_woocommerce() ) :

			// Remove Breadcrumbs on the shop/archive and single product pages if the user selected that option
			$cali_hide_wc_bc = get_theme_mod('cali_hide_wc_bc', 0);
			if ( $cali_hide_wc_bc == 0 ) :

				woocommerce_breadcrumb();

			endif;

		elseif ( function_exists('yoast_breadcrumb') ) :

			// Remove Yoast Breadcrumbs on non WooCommerce pages if the user selected that option
			$cali_hide_yoast_bc = get_theme_mod('cali_hide_yoast_bc', 0);
			
			if ( $cali_hide_yoast_bc == 0 ) :

				yoast_breadcrumb(' <p id="yoast-breadcrumbs">','</p> ');

			endif;

		endif; 
		?>
	</div>
</div>
