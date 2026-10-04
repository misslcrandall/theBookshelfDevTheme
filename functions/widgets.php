<?php 

//Create Newsletter Widget
class Newsletter_Widget extends WP_Widget {
 
	//Register widget with WordPress.
	public function __construct() {
		parent::__construct(
			'newsletter_widget', // Base ID
			'Newsletter Sign Up', // Name
			array( 'description' => __( 'Newsletter Widget for Blog Sidebar', 'text_domain' ), ) // Args
		);
	}
 
    //Front-end display of widget.
    public function widget( $args, $instance ) {
        extract( $args );
        $title = apply_filters( 'widget_title', $instance['title'] );
		$intro = apply_filters( 'widget_intro', $instance['intro'] );
		$form = apply_filters( 'widget_form', $instance['form'] );
 		?>
		<div class="newsletter-widget">
			<h3>
				<?php if ( ! empty( $title ) ) { echo $title; } ?>
			</h3>
			<p>
				<?php if ( ! empty( $intro ) ) { echo $intro; } ?>
			</p>
			<div>
				<?php if ( ! empty( $form ) ) { echo $form; } ?>
			</div>
		</div>
		<?php
    }
 
    // Back-end widget form.
    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        }
        else {
            $title = __( 'New title', 'text_domain' );
        }
        ?>
        <p>
            <label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php _e( 'Widget Title' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
		<p>
            <label for="<?php echo $this->get_field_name( 'intro' ); ?>"><?php _e( 'Intro Text:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'intro' ); ?>" name="<?php echo $this->get_field_name( 'intro' ); ?>" type="text" value="<?php echo esc_attr( $intro ); ?>" />
        </p>
		<p>
            <label for="<?php echo $this->get_field_name( 'form' ); ?>"><?php _e( 'Form Shortcode:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'form' ); ?>" name="<?php echo $this->get_field_name( 'form' ); ?>" type="text" value="<?php echo esc_attr( $form ); ?>" />
        </p>
    <?php
    }
 
    //Sanitize widget form values as they are saved.
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( !empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['intro'] = ( !empty( $new_instance['intro'] ) ) ? strip_tags( $new_instance['intro'] ) : '';
		$instance['form'] = ( !empty( $new_instance['form'] ) ) ? strip_tags( $new_instance['form'] ) : '';
        return $instance;
    }
}
 
// Register Newsletter widget
add_action( 'widgets_init', 'register_newsletter' );
     
function register_newsletter() { 
    register_widget( 'Newsletter_Widget' ); 
}