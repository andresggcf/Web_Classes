<?php
/**
 * Template part for displaying next and previous posts with thumbnails
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Cali
 */

?>

<div class="ca-related-posts">
    <div class="row">
    <?php
        $prev_post              = get_previous_post();
        $next_post              = get_next_post();
        
        // prev/next post thumb size and class
        $pn_post_thumb_size     = 'thumbnail';
        $pn_post_thumb_class    = 'ca-related-post_thumb';
    ?>
    
        <?php
            if($prev_post) {
                $prev_post_id = $prev_post->ID;
                $prev_thumb = get_the_post_thumbnail($prev_post_id, $pn_post_thumb_size, array( 'class' => $pn_post_thumb_class ));
        ?>
                <div class="col-sm-6">
                    <div class="ca-related-post ca-related-post--prev">
                        <a title="<?php echo apply_filters( 'the_title_attribute', $prev_post->post_title ); ?>" href="<?php the_permalink($prev_post_id); ?>">
                            <i class="fas fa-long-arrow-alt-left"></i>
                            <p class="ca-related-post_title"><?php echo apply_filters( 'the_title', $prev_post->post_title ); ?></p>
                            <?php echo $prev_thumb; ?>
                        </a>
                    </div>
                </div>
        <?php
            } // end if
            
            
            if($next_post) {
                $next_post_id = $next_post->ID;
                $next_thumb = get_the_post_thumbnail($next_post_id, $pn_post_thumb_size, array( 'class' => $pn_post_thumb_class ));
        ?>
                <div class="col-sm-6">
                    <div class="ca-related-post ca-related-post--next">
                        <a href="<?php the_permalink($next_post_id); ?>">
                            <?php echo $next_thumb; ?>
                            <p class="ca-related-post_title"><?php echo apply_filters( 'the_title', $next_post->post_title ); ?></p>
                            <i class="fas fa-long-arrow-alt-right"></i>
                        </a>
                    </div>
                </div>
        <?php
                
            } // end if
        ?>
    </div>
</div>