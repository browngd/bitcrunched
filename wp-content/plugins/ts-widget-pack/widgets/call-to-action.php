<?php
/**
 * Call to action widget
 *
 * @package TS Widget Pack
 * @version 1.1
 */


/**
 * Adds TS_Call_To_Action_Widget widget.
 */
add_action( 'widgets_init', create_function( '', 'register_widget( "ts_widgets_call_to_action" );' ) );
class TS_Widgets_Call_To_Action extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		parent::__construct(
	 		'ts_widgets_call_to_action', // Base ID
			'TS Call to Action', // Name
			array(
				'description'	=> __( 'A call to action widget', 'ts-widgets' )
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
			'call_to_action_text' => array (
				'ts_widgets_name'			=> 'call_to_action_text',
				'ts_widgets_title'			=> __( 'Call to action text', 'ts-widgets' ),
				'ts_widgets_field_type'		=> 'textarea',
				'ts_widgets_allowed_tags'	=> '<strong>,<em>,<a>'
			),
			'button_link' => array (
				'ts_widgets_name'			=> 'button_link',
				'ts_widgets_title'			=> __( 'Button link', 'ts-widgets' ),
				'ts_widgets_field_type'		=> 'text'
			),
			'button_text' => array (
				'ts_widgets_name'			=> 'button_text',
				'ts_widgets_title'			=> __( 'Button text', 'ts-widgets' ),
				'ts_widgets_field_type'		=> 'text'
			),
			'button_second_line' => array (
				'ts_widgets_name'			=> 'button_second_line',
				'ts_widgets_title'			=> __( 'Button second line', 'ts-widgets' ),
				'ts_widgets_description'	=> __( 'Optional', 'ts-widgets' ),
				'ts_widgets_field_type'		=> 'text'
			),
			'button_position' => array (
				'ts_widgets_name'			=> 'button_position',
				'ts_widgets_title'			=> __( 'Button position', 'ts-widgets' ),
				'ts_widgets_description'	=> __( 'Compared to call to action text', 'ts-widgets' ),
				'ts_widgets_field_type'		=> 'select',
				'ts_widgets_field_options'	=> array(
					'right' 	=> 'Right',
					'bottom' 	=> 'Bottom',
					'left' 		=> 'Left',
					'no_button'	=> 'No button'
				)
			),
			'button_color' => array (
				'ts_widgets_name'			=> 'button_color',
				'ts_widgets_title'			=> __( 'Button color', 'ts-widgets' ),
				'ts_widgets_field_type'		=> 'select',
				'ts_widgets_field_options'	=> array(
					'yellow'	=> 'Yellow',
					'blue' 		=> 'Blue',
					'red' 		=> 'Red',
					'green'		=> 'Green',
					'black'		=> 'Black'
				)
			)
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
		
		$widget_title 			= apply_filters( 'widget_title', $instance['widget_title'] );
		$call_to_action_text 	= $instance['call_to_action_text'];
		$button_link		 	= $instance['button_link'];
		$button_text		 	= $instance['button_text'];
		$button_second_line 	= $instance['button_second_line'];
		$button_position	 	= $instance['button_position'];
		$button_color		 	= $instance['button_color'];
				
		echo $before_widget;

		// Determine button position and color
		$extra_classes = '';
		
		// Button position class
		if( isset( $button_position ) )
			$extra_classes .= 'ts-widgets-button-position-' . $button_position;

		// Button color class
		if( isset( $button_color ) )
			$extra_classes .= ' ts-widgets-button-color-' . $button_color; ?>
		
		<div class="ts-widgets-call-to-action <?php echo $extra_classes; ?>">
			 <?php if( isset( $widget_title ) || isset( $call_to_action_text ) ) { ?>
			 <div class="ts-widgets-call-to-action-text">
				<?php
					// Show title
					if( isset( $widget_title ) ) {
						echo $before_title . $widget_title . $after_title;
					} 
					// Show call to action text
					if( isset( $call_to_action_text ) ) {
						echo '<div class="ts-widgets-call-to-action-cta">' . $call_to_action_text . '</div>';
					}
				?>
			</div><!-- .ts-widgets-call-to-action-text -->
			<?php } // endif ?>
	
			<?php if( isset( $button_link ) && isset( $button_text ) && $button_position != 'no_button' ) { ?>
			<div class="ts-widgets-call-to-action-button">
				<a href="<?php echo $button_link; ?>">
					<span class="ts-widgets-call-to-action-first-line"><?php echo $button_text; ?></span>
					
					<?php
						// Show button second line
						if( isset( $button_second_line ) ) {
							echo '<span class="ts-widgets-call-to-action-second-line">' . $button_second_line . '</span>';
						}
					?>
				</a>
			</div><!-- .ts-widgets-call-to-action-button -->
			<?php } ?>
		</div><!-- .ts-widgets-call-to-action -->
		
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