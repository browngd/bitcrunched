<?php
/**
 * List authors widget
 *
 * @package TS Widget Pack
 * @version 1.1
 */


/**
 * Adds TS_List_Authors_Widget widget.
 */
add_action( 'widgets_init', create_function( '', 'register_widget( "ts_widgets_list_authors" );' ) );
class TS_Widgets_List_Authors extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		parent::__construct(
	 		'ts_widgets_list_authors', // Base ID
			'TS List Authors', // Name
			array(
				'description'	=> __( 'A widget that lists authors', 'ts-widgets' )
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
			'number_of_authors' => array (
				'ts_widgets_name'			=> 'number_of_authors',
				'ts_widgets_title'			=> __( 'Number of authors to display', 'ts-widgets' ),
				'ts_widgets_field_type'		=> 'number'
			),
			'user_role' => array (
				'ts_widgets_name'			=> 'user_role',
				'ts_widgets_title'			=> __( 'User role(s) to display', 'ts-widgets' ),
				'ts_widgets_field_type'		=> 'select',
				'ts_widgets_field_options'	=> array(
					'All'				=> 'All users',
					'Administrator'		=> 'Administrators',
					'Editor'			=> 'Editors',
					'Author'			=> 'Authors',
					'Contributor'		=> 'Contributors',
					'Subscriber'		=> 'Subscribers'
				)
			),
			'display_gravatar' => array (
				'ts_widgets_name'			=> 'display_gravatar',
				'ts_widgets_title'			=> __( 'Show gravatars', 'ts-widgets' ),
				'ts_widgets_field_type'		=> 'checkbox'
			),
			'gravatar_size' => array (
				'ts_widgets_name'				=> 'gravatar_size',
				'ts_widgets_title'			=> __( 'Gravatar size', 'ts-widgets' ),
				'ts_widgets_field_type'		=> 'select',
				'ts_widgets_field_options'	=> array(
					'32'	=> '32px',
					'48'	=> '48px',
					'64'	=> '64px',
				)
			),
			'sort_by' => array (
				'ts_widgets_name'			=> 'sort_by',
				'ts_widgets_title'			=> __( 'Sort by', 'ts-widgets' ),
				'ts_widgets_field_type'		=> 'select',
				'ts_widgets_field_options'	=> array(
					'post_count'	=> __( 'Number of posts', 'ts-widgets' ),
					'display_name'	=> __( 'Alphabetically', 'ts-widgets' ),
				)
			),
			'sort' => array (
				'ts_widgets_name'			=> 'sort',
				'ts_widgets_title'			=> __( 'Sorting', 'ts-widgets' ),
				'ts_widgets_field_type'		=> 'select',
				'ts_widgets_field_options'	=> array(
					'ASC'	=> __( 'Ascending', 'ts-widgets' ),
					'DESC'	=> __( 'Descending', 'ts-widgets' ),
				)
			),
			'display_latest_posts' => array (
				'ts_widgets_name'			=> 'display_latest_posts',
				'ts_widgets_title'			=> __( 'Show latest posts for each author', 'ts-widgets' ),
				'ts_widgets_field_type'		=> 'checkbox'
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
		$number_of_authors 		= $instance['number_of_authors'];
		$user_role		 		= $instance['user_role'];
		$display_gravatar		= $instance['display_gravatar'];
		$gravatar_size			= $instance['gravatar_size'];
		$sort_by				= $instance['sort_by'];
		$sort					= $instance['sort'];
		$display_latest_posts	= $instance['display_latest_posts'];

		echo $before_widget;

		// Set default values if fields are not set 
		if( !isset( $sort_by ) ) $sort_by = 'post_count';
		if( !isset( $sort ) ) $sort = 'ASC';
		if( !isset( $gravatar_size ) ) $gravatar_size = 64;

		// Get users based on parameters set in widget form
		$args = array(
			'blog_id'	=> $GLOBALS['blog_id'],
			'number'	=> $number_of_authors,
			'order'		=> $sort,
			'orderby'	=> $sort_by
		);
		// If needed add Role argument
		if( isset( $user_role ) && 'All' != $user_role ) {
			$args['role'] = $user_role;
		}
		$blogusers = get_users( $args );

		// Determine button position and color
		$extra_classes = '';
		
		// Gravatar size class
		$extra_classes .= 'ts-widgets-gravatar-size-' . $gravatar_size; ?>
		
		<div class="ts-widgets-list-authors <?php echo $extra_classes; ?>">
			<?php
				// Show title
				if( isset( $widget_title ) ) {
					echo $before_title . $widget_title . $after_title;
				}
			?>
			<ul>
				<?php
					foreach ( $blogusers as $user ) {
						echo '<li class="ts-widgets-list-authors-author">';
							// Check if gravatars need to be shown
							if( $display_gravatar ) {
								// Get gravatar size
								echo get_avatar( $user->ID, $gravatar_size, '', $user->display_name );
							}

							echo '<div class="ts-widgets-list-authors-text">';
							echo '<div class="ts-widgets-list-authors-name">' . $user->display_name . '</div>';
								
								// Check if latest posts need to be shown
								if( $display_latest_posts ) {
									$args = array(
										'author'			=> $user->ID,
										'posts_per_page'	=> 3
									);
									$latest_by_author = new WP_Query( $args );
									
									if ( $latest_by_author->have_posts() ) :
										echo '<ul>';
										while ( $latest_by_author->have_posts() ) : $latest_by_author->the_post();
											echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
										endwhile;
										echo '</ul>';
									endif;
									
									// Reset Post Data
									wp_reset_postdata();
								}
								
							echo '</div><!-- .ts-widgets-list-authors-text -->';
						echo '</li>';
					}
				?>
			</ul>
		</div><!-- .ts-widgets-list-authors -->
		
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
	 * @uses	ts_widgets_updated_field_value()		defined in ts-widgets-fields.php
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
	 * @param	array $instance Previously saved values from database.
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