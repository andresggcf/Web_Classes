<?php
/**
 * The template for custom Cali search form
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Cali
 */
?>

<?php $unique_id = esc_attr( uniqid( 'search-form-' ) ); ?>

<form class="site-search" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search" method="get" id="searchform">
    <label for="<?php echo $unique_id; ?>">
        <span class="screen-reader-text"><?php esc_attr_e( 'Search for:', 'cali' ); ?></span>
    </label>
    <input type="text" name="s" id="<?php echo $unique_id; ?>" class="site-search_input" value="<?php the_search_query(); ?>" placeholder="<?php esc_attr_e( 'Search &hellip;', 'cali' ); ?>">
    <button type="submit" id="searchsubmit" class="site-search_submit">
        <i class="fas fa-search" aria-hidden="true"></i>
    </button>
</form>
