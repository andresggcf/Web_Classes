<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Cali
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('regular-post'); ?>>
	<?php cali_post_thumbnail(); ?>
	<header class="entry-header">
		<div class="cat-links ca-category">
			<?php cali_get_first_cat(); ?>
		</div>
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
		<div class="entry-meta">
			<?php cali_posted_on(); ?>
		</div>
	</header>
	<div class="entry-content">
        <?php the_excerpt(); ?>
    </div>
</article>
