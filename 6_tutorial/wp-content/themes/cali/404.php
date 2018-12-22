<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Cali
 */

get_header(); ?>

	<?php
	// Use content-none
	get_template_part( 'template-parts/content', 'none' ); 
	
	the_widget( 'WP_Widget_Recent_Posts' );
	?>

<?php
get_footer();
