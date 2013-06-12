<?php
/*
Plugin Name: Sunburst Code Prettify
Plugin URI: http://www.rachelbaker.me/sunburst-code-prettify-wordpress-plugin/
Description: Uses Highlight.js with the Sunburst syntax theme to elegantly highlight code.
Version: 2.2.0
Author: Rachel Baker
Author URI: http://www.rachelbaker.me
Author Email: rachel@rachelbaker.me
License:

  Copyright 2012 Plugged In Consulting, Inc

  This program is free software; you can redistribute it and/or modify
  it under the terms of the GNU General Public License, version 3, as
  published by the Free Software Foundation.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program; if not, write to the Free Software
  Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

*/

/*
| -------------------------------------------------------------------
| Enqueue Scripts
| -------------------------------------------------------------------
|
| */
  function sunprettify_script_loader() {
        wp_enqueue_script('sunprettify_pack', plugins_url( 'assets/js/highlight.pack.js', __FILE__ ), array('jquery'),'', false );
      }
   add_action('wp_enqueue_scripts', 'sunprettify_script_loader');

/*
| -------------------------------------------------------------------
| Enqueue Styles
| -------------------------------------------------------------------
|
| */
  function sunprettify_style_loader() {
    wp_enqueue_style('sunprettify_style', plugins_url( 'assets/css/sunburst.css', __FILE__ ), true ,'1.0', 'all' );
      }
  add_action('wp_enqueue_scripts', 'sunprettify_style_loader', 50 );

  /*--------------------------------------------*
   * Loading the needed prettyprint() function in the body
   *--------------------------------------------*/
  function sunprettify_auto_loading() { ?>
<script type="text/javascript">
jQuery(document).ready(function(){
   jQuery('pre code').each(function(i, e) {
    hljs.highlightBlock(e, '    ')
   });
});
</script>
<?php }
add_action('wp_footer', 'sunprettify_auto_loading');

  /*--------------------------------------------*
   * Building the shortcode
   *--------------------------------------------*/

  function sunprettify_shortcode( $atts, $content = null ) {
     extract( shortcode_atts( array(
      'class' => 'prettify',
      ), $atts ) );

   // Thanks to Morcarag for the code contribution/suggestion
   //Stripping added line breaks...
   $content = str_replace('<p>', '', $content);
   $content = str_replace('</p>', '', $content);
   $content = str_replace('<br/>', '', $content);
   $content = str_replace('<br />', '', $content);
   $content = str_replace('<br>', '', $content);
   // Adding more stripping rules for code editor issues within the [prettify] shortcode
    $content = preg_replace( "/(\r\n|\n|\r)/", "\n", $content );
    $content = preg_replace( "/\n\n+/", "\n\n", $content );
    $content = str_replace( array( "&#36&;", "&#39&;" ), array( "$", "'" ), $content );
    $content = htmlspecialchars( $content, ENT_QUOTES );
    $content = str_replace( "\t", '  ', $content );
    $content = str_replace( array( '&#36&;', '&#39&;', '&lt; ?php' ), array( '$', "'", '&lt;?php' ),  $content );
    $content = str_replace( array( '$', "'" ), array( '&#36&;', '&#39&;' ), $content );

   return '<pre><code class="'. esc_attr($class) .'">' . $content . '</code></pre>';
}
add_shortcode( 'prettify', 'sunprettify_shortcode' );

  /*--------------------------------------------*
   * Declaring Language for Localization
   *--------------------------------------------*/
  function sunprettify_local() {
  load_plugin_textdomain( 'sunprettify', false, dirname( plugin_basename( __FILE__ ) ) . '/lang/' );
}
add_action('init', 'sunprettify_local');