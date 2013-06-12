<?php
/*
Plugin Name: RawR (Raw Revisited) for WordPress
Plugin URI: http://derek.simkowiak.net/rawr-raw-revisited-for-wordpress/
Description: This plugin allows the embedding of raw text, such as raw html, xml, css, javascript, etc. using a simple [rawr][/rawr] shortcode.
Version: 1.0
Author: Derek Simkowiak
Author URI: http://derek.simkowiak.net/
License: MIT
*/

/*
Copyright (c) 2011 Derek Simkowiak

Permission is hereby granted, free of charge, to any person obtaining
a copy of this software and associated documentation files (the
"Software"), to deal in the Software without restriction, including
without limitation the rights to use, copy, modify, merge, publish,
distribute, sublicense, and/or sell copies of the Software, and to
permit persons to whom the Software is furnished to do so, subject to
the following conditions:

The above copyright notice and this permission notice shall be included
in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT.
IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY
CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT,
TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE
SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
*/

/* Create a unique class name to provide a unique plugin namespace: */
class Rawr {
	
	// Use the latest PHP5 style construtor:
	function __construct() {
		
		// This plugin is WP 2.5+ only:
		if ( !function_exists('add_shortcode') ) return;
		
		// We must bypass wptexturize(), convert_chars(), convert_smilies(), and (starting in WP 2.5.1) wpautop() in priority 10.
		// We hold all the [rawr] blocks of a given page display in this array, in priority 8.
		$this->unformatted_shortcode_blocks = array();
		add_filter( 'the_content', array(&$this, 'get_unformatted_shortcode_blocks'), 8 );

		// Shortcode handler for [rawr], which WordPress runs at priority 11.
		add_shortcode( 'rawr', array(&$this, 'my_shortcode_handler2') );
	}
	
	// Inspired by media.php
	
	/**
	 * Process the [rawr] shortcode in priority 8.
	 *
	 * Since the [rawr] shortcode needs to be run earlier than other shortcodes,
	 * this function removes all existing shortcodes, uses the shortcode parser to grab all [rawr blocks],
	 * calls {@link do_shortcode()}, and then re-registers the old shortcodes.
	 *
	 * @uses $shortcode_tags
	 * @uses remove_all_shortcodes()
	 * @uses add_shortcode()
	 * @uses do_shortcode()
	 *
	 * @param string $content Content to parse
	 * @return string Content with shortcode parsed
	 */
	function get_unformatted_shortcode_blocks( $content ) {
		global $shortcode_tags;

		// Back up current registered shortcodes and clear them all out
		$orig_shortcode_tags = $shortcode_tags;
		remove_all_shortcodes();
		
		// my_shortcode_handler1(), below, saves the rawr blocks into $this->unformatted_shortcode_blocks[]
		add_shortcode( 'rawr', array(&$this, 'my_shortcode_handler1') );

		// Do the shortcode (only the [rawr] shortcode is now registered)
		$content = do_shortcode( $content );

		// Put the original shortcodes back for normal processing at priority 11
		$shortcode_tags = $orig_shortcode_tags;
		
		return $content;
	}
	
	function my_shortcode_handler1( $atts, $content=null, $code="" ) {
		
		// Store the unformatted content for later:
		$this->unformatted_shortcode_blocks[] = $content;
		$content_index = count( $this->unformatted_shortcode_blocks ) - 1;
		// Put the shortcode tag back around the index, so it gets processed again below.
		return "[rawr]" . $content_index . "[/rawr]";
	}

	function my_shortcode_handler2( $atts, $content=null, $code="" ) {
		// Extract the unformatted content out of the array.
		// $content is really just the $content_index int returned above.
		return $this->unformatted_shortcode_blocks[ $content ];
	}
}

add_action( 'plugins_loaded', create_function( '', 'global $rawr; $rawr = new Rawr();' ) );


