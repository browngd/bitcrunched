<?php
/**
 * Social icons widget
 *
 * @package TS Widget Pack
 * @version 1.1
 */


/**
 * Adds TS_Call_To_Action_Widget widget.
 */
add_action( 'widgets_init', create_function( '', 'register_widget( "ts_widgets_social_icons" );' ) );
class TS_Widgets_Social_Icons extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		parent::__construct(
	 		'ts_widgets_social_icons', // Base ID
			'TS Social Icons', // Name
			array(
				'description'	=> __( 'Shows links to your social network profiles, enter full profile URLs', 'ts-widgets' )
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
			'twitter' => array (
				'ts_widgets_name'			=> 'twitter',
				'ts_widgets_title'			=> __( 'Twitter', 'ts-widgets' ),
				'ts_widgets_field_type'		=> 'text'
			),
			'facebook' => array (
				'ts_widgets_name'			=> 'facebook',
				'ts_widgets_title'			=> __( 'Facebook', 'ts-widgets' ),
				'ts_widgets_field_type'		=> 'text'
			),
			'linkedin' => array (
				'ts_widgets_name'			=> 'linkedin',
				'ts_widgets_title'			=> __( 'LinkedIn', 'ts-widgets' ),
				'ts_widgets_field_type'		=> 'text'
			),
			'googleplus' => array (
				'ts_widgets_name'			=> 'googleplus',
				'ts_widgets_title'			=> __( 'Google+', 'ts-widgets' ),
				'ts_widgets_field_type'		=> 'text'
			),
			'pinterest' => array (
				'ts_widgets_name'			=> 'pinterest',
				'ts_widgets_title'			=> __( 'Pinterest', 'ts-widgets' ),
				'ts_widgets_field_type'		=> 'text'
			),
			'youtube' => array (
				'ts_widgets_name'			=> 'youtube',
				'ts_widgets_title'			=> __( 'YouTube', 'ts-widgets' ),
				'ts_widgets_field_type'		=> 'text'
			),
			'vimeo' => array (
				'ts_widgets_name'			=> 'vimeo',
				'ts_widgets_title'			=> __( 'Vimeo', 'ts-widgets' ),
				'ts_widgets_field_type'		=> 'text'
			),
			'flickr' => array (
				'ts_widgets_name'			=> 'flickr',
				'ts_widgets_title'			=> __( 'Flickr', 'ts-widgets' ),
				'ts_widgets_field_type'		=> 'text'
			),
			'dribbble' => array (
				'ts_widgets_name'			=> 'dribbble',
				'ts_widgets_title'			=> __( 'Dribbble', 'ts-widgets' ),
				'ts_widgets_field_type'		=> 'text'
			),
			'tumblr' => array (
				'ts_widgets_name'			=> 'tumblr',
				'ts_widgets_title'			=> __( 'Tumblr', 'ts-widgets' ),
				'ts_widgets_field_type'		=> 'text'
			),
			'instagram' => array (
				'ts_widgets_name'			=> 'instagram',
				'ts_widgets_title'			=> __( 'Instagram', 'ts-widgets' ),
				'ts_widgets_field_type'		=> 'text'
			),
			'lastfm' => array (
				'ts_widgets_name'			=> 'lastfm',
				'ts_widgets_title'			=> __( 'Last.fm', 'ts-widgets' ),
				'ts_widgets_field_type'		=> 'text'
			),
			'reddit' => array (
				'ts_widgets_name'			=> 'reddit',
				'ts_widgets_title'			=> __( 'Reddit', 'ts-widgets' ),
				'ts_widgets_field_type'		=> 'text'
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
		
		$widget_title 			= apply_filters( 'widget_title', $instance['widget_title'] );
				
		echo $before_widget; ?>
		
		<div class="ts-widgets-social-icons">
			<?php
				// Show title
				if( isset( $widget_title ) ) {
					echo $before_title . $widget_title . $after_title;
				}
			?>
			<ul>
			<?php
			// Loop through fields
			$widget_fields = $this->widget_fields();
			foreach( $widget_fields as $widget_field ) {
				// Make array elements available as variables
				extract( $widget_field );
				// Check if field has value and skip title field
				unset( $ts_widgets_field_value );
				if( isset( $instance[$ts_widgets_name] ) && 'widget_title' != $ts_widgets_name ) { 
					$ts_widgets_field_value = esc_attr( $instance[$ts_widgets_name] ); 
					if( '' != $ts_widgets_field_value ) {	?>
					<li class="ts-widgets-social-icons-<?php echo $ts_widgets_name; ?>"><a href="<?php echo $ts_widgets_field_value; ?>" title="<?php echo $ts_widgets_title; ?>"><?php echo $ts_widgets_title; ?></a></li>
					<?php } // end if
				}
			} // end foreach
			?>
		</div><!-- .ts-widgets-social-icons -->
		
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