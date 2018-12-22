<?php
/**
 * Template part for displaying sidebar HTML during dev stage
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Cali
 */


$caSliderMobile 		= 2;
$caSliderTablet 		= 3;
$caSliderDesktop 		= 4;

$caSliderClasses 		= ' ca-slider-mobile-' . $caSliderMobile . ' ca-slider-tablet-' . $caSliderTablet . ' ca-slider-desktop-' . $caSliderDesktop;

$caSliderCategory		= get_theme_mod( 'cali_post_slider_category' );
$hide_post_slider_cat	= get_theme_mod( 'cali_post_slider_hide_cat', 0 );

?>
<div class="ca-slider js-ca-article-slider owl-carousel owl-theme <?php echo $caSliderClasses; ?>">
	<?php

	// Arguments
	$args = array(
		'post_type' 			=> 'post',
		'cat' 					=> $caSliderCategory,
		'ignore_sticky_posts' 	=> true
	);

	// The Query
	$the_query = new WP_Query( $args );

	// The Loop
	if ( $the_query->have_posts() ) {
		while ( $the_query->have_posts() ) {
			$the_query->the_post(); ?>

				<a href="<?php the_permalink(); ?>" class="ca-slider_slide">
					<?php if ( has_post_thumbnail() ) : ?>
					<?php the_post_thumbnail(); ?>
					<?php else : ?>
					<div class="ca-slider_slide-placeholder">
						<i class="far fa-image" aria-hidden="true"></i>
					</div>
					<?php endif; ?>
					<div class="slide-overlay">
						<?php if ( !$hide_post_slider_cat ) : ?>
						<span class="slide-overlay_category ca-category"><?php cali_get_first_cat_name(); ?></span>
						<?php endif; ?>
						<?php the_title( '<h2 class="slide-overlay_title">', '</h2>' ); ?>
						<span class="slide-overlay_meta">
							<?php cali_posted_on_static(); ?>
						</span>
					</div>
				</a>

			<?php
			
		}
	} else { ?>
		<h3><?php esc_html_e('Please add posts to the selected slider category in Customizer to populate the Post slider', 'cali'); ?></h3>
	<?php
	}
	/* Restore original Post Data */
	wp_reset_postdata();

	?>
	
</div>
