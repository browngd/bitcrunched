<?php
/**
 * Plugin Name: TS Widget Pack
 * Plugin URI: https://github.com/slobodan/TS-Widget-Pack
 * Description: Adds custom widgets to site
 * Author: ThematoSoup
 * Author URI: http://thematosoup.com
 * Version: 1.1
 * License: GPLv2 or later
 *
 * @package TS Widget Pack
 * @version 1.1
 * 
 * Plugin prefix: 'ts_widgets_'
 */


// Define plugin version constant
define( 'TS_WIDGET_PACK_VERSION', '1.1' );



/**
 * Enqueue CSS and JS files
 *
 * @since 0.1
 */
add_action( 'wp_enqueue_scripts', 'ts_widgets_add_scripts_styles' );
function ts_widgets_add_scripts_styles() {

	$css_url = plugins_url( 'css/ts-widget-pack.css', __FILE__ );
	wp_register_style( 'ts_widget-pack', $css_url, '', TS_WIDGET_PACK_VERSION );
	wp_enqueue_style( 'ts_widget-pack' );

	wp_enqueue_script( 'jquery' );
	
	$js_url = plugins_url( 'js/ts-widget-pack.js', __FILE__ );
	wp_register_script( 'ts_widget-pack', $js_url, array( 'jquery' ), TS_WIDGET_PACK_VERSION );
	wp_enqueue_script( 'ts_widget-pack' );
	
}



/**
 * Add action links in Plugins page
 *
 * @since	0.1
 * @todo	Add some links 
 */
// add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'ts_widgets_plugin_action_links' );
/*
function ts_widgets_plugin_action_links( $links ) {

	return array_merge(
		array(),
		$links
	);

}



/**
 * Add meta links in Plugins page
 *
 * @since 0.1
 */
add_filter( 'plugin_row_meta', 'ts_widgets_plugin_meta_links', 10, 2 );
function ts_widgets_plugin_meta_links( $links, $file ) {

	$plugin = plugin_basename(__FILE__);
	
	// create link
	if ( $file == $plugin ) {
		return array_merge(
			$links,
			array( '<a href="http://twitter.com/thematosoup">Twitter</a>' )
		);
	}
	return $links;

}



/**
 * Helper function that updates fields in the dashboard form
 *
 * @since	TS Widget Pack 0.1
 */
function ts_widgets_updated_field_value( $widget_field, $new_field_value ) {

	extract( $widget_field );
	
	// Allow only integers in number fields
	if( $ts_widgets_field_type == 'number' ) {
		return absint( $new_field_value );
		
	// Allow some tags in textareas
	} elseif( $ts_widgets_field_type == 'textarea' ) {
		// Check if field array specifed allowed tags
		if( !isset( $ts_widgets_allowed_tags ) ) {
			// If not, fallback to default tags
			$ts_widgets_allowed_tags = '<p><strong><em><a>';
		}
		return strip_tags( $new_field_value, $ts_widgets_allowed_tags );
		
	// No allowed tags for all other fields
	} else {
		return strip_tags( $new_field_value );
	}

}



/**
 * Include helper functions that display widget fields in the dashboard
 *
 * @since	TS Widget Pack 0.1
 */
include( plugin_dir_path( __FILE__ ) . 'ts-widget-pack-fields.php' );



/**
 * Register Call to Action Widget
 *
 * @since	TS Widget Pack 0.1
 */
include( plugin_dir_path( __FILE__ ) . 'widgets/call-to-action.php' );

/**
 * Page Tree Widget
 *
 * @since	TS Widget Pack 0.1
 */
include( plugin_dir_path( __FILE__ ) . 'widgets/page-tree.php' );

/**
 * Register List Authors Widget
 *
 * @since	TS Widget Pack 0.1
 */
include( plugin_dir_path( __FILE__ ) . 'widgets/list-authors.php' );

/**
 * Register List Authors Widget
 *
 * @since	TS Widget Pack 0.1
 */
include( plugin_dir_path( __FILE__ ) . 'widgets/preview-post.php' );

/**
 * Register Social Icons Widget
 *
 * @since	TS Widget Pack 0.1
 */
include( plugin_dir_path( __FILE__ ) . 'widgets/social-icons.php' );

/**
 * Video Embed Widget
 *
 * @since	TS Widget Pack 0.1
 */
include( plugin_dir_path( __FILE__ ) . 'widgets/oembed.php' );