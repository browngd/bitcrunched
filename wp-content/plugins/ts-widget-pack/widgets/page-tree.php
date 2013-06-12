<?php
/**
 * Page tree widget
 *
 * @package TS Widget Pack
 * @version 1.1
 */


/**
 * Adds TS_Call_To_Action_Widget widget.
 */
add_action( 'widgets_init', create_function( '', 'register_widget( "ts_widgets_page_tree" );' ) );
class TS_Widgets_Page_Tree extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		parent::__construct(
	 		'ts_widgets_page_tree', // Base ID
			'TS Page Tree', // Name
			array(
				'description'	=> __( 'This widget is only displayed on pages that have child or parent pages', 'ts-widgets' )
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
			'top_level_page' => array (
				'ts_widgets_name'			=> 'top_level_page',
				'ts_widgets_title'			=> __( 'Page tree top level page', 'ts-widgets' ),
				'ts_widgets_description'	=> __( 'Choose between top page in hierarchy or current page', 'ts-widgets' ),
				'ts_widgets_field_type'		=> 'select',
				'ts_widgets_field_options'	=> array(
					'current' 	=> 'Current',
					'top' 		=> 'Top'
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
		global $post;
		
		$widget_title		= apply_filters( 'widget_title', $instance['widget_title'] );
		$top_level_page 	= $instance['top_level_page'];
		
		if( is_page() ) {
		
			// Check if tree should start with top level page in current page's hierarchy
			if( 'top' == $top_level_page ) {
				// Check if page has ancestors
				if( $post->ancestors ) {
					// WordPress is putting the ids DESC, thats why the top level ID is the last one
					$top_level = end( $post->ancestors );
					$children = wp_list_pages( 'title_li=&child_of=' . $top_level . '&echo=0' );
				// If not, current page is top level page
				} else {
					$children = wp_list_pages( 'title_li=&child_of=' . $post->ID . '&echo=0' );
					$top_level_class = 'current_page_item';
				}
				
			// Otherwise start with current page
			} else {
				$children = wp_list_pages( 'title_li=&child_of=' . $post->ID . '&echo=0' );
				$top_level = $post->ID;
				$top_level_class = 'current_page_item';
			}
		
			if( $children ) {
				echo $before_widget;
	
				// Show title
				if( '' != $widget_title ) echo $before_title . $widget_title . $after_title; ?>
		
				<ul class="ts-widgets-page-tree">
					<li class="<?php echo $top_level_class; ?>">
						<a href="<?php echo get_permalink( $top_level ); ?>"><?php echo get_the_title( $top_level ); ?></a>
						<ul>
							<?php echo $children; ?>
						</ul>
					</li>
				</ul>
				
				<?php
				echo $after_widget;
			
			} // end if $children
		
		} // end if is_page()
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