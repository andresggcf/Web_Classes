<?php
/**
 * Sidebar posts widget
 *
 * @package Cali
 */

class Cali_Sidebar_Posts extends WP_Widget {

	public function __construct() {
		$widget_ops = array(
			'classname' => 'widget_recent_post',
			'description' => __( 'Same as the core recent posts widget, but with thumbnails', 'cali' ),
			'customize_selective_refresh' => true,
		);
		parent::__construct( 'cali-sidebar-posts', __( 'Cali: Sidebar posts', 'cali' ), $widget_ops );
		$this->alt_option_name = 'widget_recent_post';
	}

	public function widget( $args, $instance ) {
		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Popular Posts', 'cali' );

		/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

		$number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
		if ( ! $number )
			$number = 5;
		$show_author = isset( $instance['show_author'] ) ? $instance['show_author'] : false;

		$r = new WP_Query( apply_filters( 'widget_posts_args', array(
			'posts_per_page'      => $number,
			'no_found_rows'       => true,
			'post_status'         => 'publish',
			'ignore_sticky_posts' => true
		) ) );

		if ($r->have_posts()) :
		?>
		<?php echo $args['before_widget']; ?>
		<?php if ( $title ) {
			echo $args['before_title'] . $title . $args['after_title'];
		} ?>
		<div class="ca-popular-posts">
			<ul>
			<?php while ( $r->have_posts() ) : $r->the_post(); ?>
				<li>
					<a href="<?php echo esc_url( get_permalink() ); ?>" class="clearfix">
						<?php the_post_thumbnail('thumbnail'); ?>
						<?php the_title( '<h3 class="post-title">','</h3>' ); ?>
						<?php if ( $show_author ) : ?>
							<span class="byline"><?php esc_html_e('by', 'cali'); ?> <em><?php echo get_the_author(); ?></em></span>
						<?php endif; ?>
					</a>
				</li>
			<?php endwhile; ?>
			</ul>
		</div>
		<?php echo $args['after_widget']; ?>
		<?php
		// Reset the global $the_post as this query will have stomped on it
		wp_reset_postdata();

		endif;
	}

	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = sanitize_text_field( $new_instance['title'] );
		$instance['number'] = (int) $new_instance['number'];
		$instance['show_author'] = isset( $new_instance['show_author'] ) ? (bool) $new_instance['show_author'] : false;
		return $instance;
	}

	public function form( $instance ) {
		$title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
		$show_author = isset( $instance['show_author'] ) ? (bool) $instance['show_author'] : false;
?>
		<p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:', 'cali' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" /></p>

		<p><label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php esc_html_e( 'Number of posts to show:', 'cali' ); ?></label>
		<input class="tiny-text" id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="number" step="1" min="1" value="<?php echo $number; ?>" size="3" /></p>

		<p><input class="checkbox" type="checkbox"<?php checked( $show_author ); ?> id="<?php echo $this->get_field_id( 'show_author' ); ?>" name="<?php echo $this->get_field_name( 'show_author' ); ?>" />
		<label for="<?php echo $this->get_field_id( 'show_author' ); ?>"><?php esc_html_e( 'Display post author?', 'cali' ); ?></label></p>
<?php
	}
}