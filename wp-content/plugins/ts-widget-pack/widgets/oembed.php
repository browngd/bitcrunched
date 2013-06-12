<?php
/**
 * oEmbed widget
 *
 * @package TS Widget Pack
 * @version 1.1
 */


/**
 * Adds TS_Call_To_Action_Widget widget.
 */
add_action( 'widgets_init', create_function( '', 'register_widget( "ts_widgets_oembed" );' ) );
class TS_Widgets_oEmbed extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		parent::__construct(
	 		'ts_widgets_oembed', // Base ID
			'TS oEmbed', // Name
			array(
				'description'	=> __( 'oEmbed widget', 'ts-widgets' )
			) // Args
		);
	}

	/**
	 * Helper function that holds widget fields
	 * Array is used in update and form functions
	 */
	 private function widget_fields() {
		$fields = array(
			// Title
			'widget_title' => array(
				'ts_widgets_name'			=> 'widget_title',
				'ts_widgets_title'			=> __( 'Title', 'ts-widgets' ),
				'ts_widgets_field_type'		=> 'text'
			),
			
			// Other fields
			'embed_url' => array (
				'ts_widgets_name'			=> 'embed_url',
				'ts_widgets_title'			=> __( 'Embed URL', 'ts-widgets' ),
				'ts_widgets_field_type'		=> 'text'
			),
			'embed_width' => array (
				'ts_widgets_name'			=> 'embed_width',
				'ts_widgets_title'			=> __( 'Embed width in pixels', 'ts-widgets' ),
				'ts_widgets_field_type'		=> 'number'
			),
			'embed_description' => array (
				'ts_widgets_name'			=> 'embed_description',
				'ts_widgets_title'			=> __( 'Description', 'ts-widgets' ),
				'ts_widgets_field_type'		=> 'textarea',
				'ts_widgets_allowed_tags'		=> '<strong>'
			),
		);

		return $fields;
	 }


	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		extract( $args );
		
		$widget_title		= apply_filters( 'widget_title', $instance['widget_title'] );
		$embed_url 			= $instance['embed_url'];
		$embed_width		= $instance['embed_width'];
		$embed_description	= $instance['embed_description'];
				
		echo $before_widget; ?>
		
		<div class="ts-widgets-oembed">
			<?php
				// Show title
				if( isset( $widget_title ) ) {
					echo $before_title . $widget_title . $after_title;
				}
			?>
			
			<?php
				// Check if embed URL is entered
				if( isset( $embed_url ) ) {
				echo '<div class="ts-widgets-oembed-content">';
					// Check if user entered embed width
					if( isset( $embed_width ) && $embed_width > 0 ) {
						echo wp_oembed_get( $embed_url, array( 'width' => $embed_width ) );
					} else {
						echo wp_oembed_get( $embed_url );
					}
				echo '</div><!-- .ts-widgets-oembed-content -->';
				} // end if embed URL

				if( isset( $embed_description ) ) {
					echo '<div class="ts-widgets-oembed-description">' . $embed_description . '</div>';
				} // end if embed description
			?>
		</div><!-- .ts-widgets-oembed -->
		
		<?php
		echo $after_widget;
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param	array	$new_instance	Values just sent to be saved.
	 * @param	array	$old_instance	Previously saved values from database.
	 *
	 * @uses	ts_widgets_show_widget_field()		defined in ts-widgets-fields.php
	 *
	 * @return	array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		$widget_fields = $this->widget_fields();

		// Loop through fields
		foreach( $widget_fields as $widget_field ) {
			extract( $widget_field );
	
			// Use helper function to get updated field values
			$instance[$ts_widgets_name] = ts_widgets_updated_field_value( $widget_field, $new_instance[$ts_widgets_name] );
			echo $instance[$ts_widgets_name];
		}
				
		return $instance;
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 *
	 * @uses	ts_widgets_show_widget_field()		defined in ts-widgets-fields.php
	 */
	public function form( $instance ) {
		$widget_fields = $this->widget_fields();

		// Loop through fields
		foreach( $widget_fields as $widget_field ) {
		
			// Make array elements available as variables
			extract( $widget_field );
			$ts_widgets_field_value = isset( $instance[$ts_widgets_name] ) ? esc_attr( $instance[$ts_widgets_name] ) : '';			
			ts_widgets_show_widget_field( $this, $widget_field, $ts_widgets_field_value );
		
		}	
	}

} // class Foo_Widget