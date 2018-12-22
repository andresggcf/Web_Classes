<?php
/**
 * Footer functions
 *
 * @package Cali
 */


/**
 * Footer credits
 */
function cali_footer_credits() {

?>
    <div class="site-info">
        <?php
            /* translators: %s: CMS name, i.e. WordPress. */
            printf( esc_html__( 'Powered by %s', 'cali' ), '<a href="https://wordpress.org/">WordPress</a>' );
        ?>
        <span class="sep"> | </span>
        <?php
            /* translators: 1: Theme name, 2: Theme author. */
            printf( esc_html__( 'Theme: %1$s by %2$s.', 'cali' ), '<a href="https://athemes.com/theme/cali/">Cali</a>', 'aThemes' );
        ?>
    </div><!-- .site-info -->
<?php	
}

/**
 * Footer output
 */
function cali_footer_output() {
	
	cali_footer_credits();
    
}
add_action( 'cali_footer', 'cali_footer_output' );
