=== Plugin Name ===

Contributors: Rachel Baker

Tags: code, syntax, highlight, sunburst, programming

Requires at least: 3.1

Tested up to: 3.4

Stable tag: 2.2.0

Uses Highlight.js with the Sunburst syntax theme to elegantly highlight code.

== Description ==

This plugin uses the [Sunburst theme](http://projects.serenity.de/textmate/), a colorful and high contrast dark theme to highlight your code syntax with [Highlight.js](http://softwaremaniacs.org/soft/highlight/en/).  Highlight.js is accurate, fast, lightweight and easy to use.

__Usage__

Short-code method:

1.	From within a WordPress page or post, wrap the `[prettify][/prettify]` shortcode around the code snippet you wish to highlight.
2.	You can specify a language by specifying the language extension inside the shortcode.
Example:
`[prettify class="html"][/prettify]`
3.	The shortcode will work from within either the Visual or HTML editor.

Non-short-code method:

1.	Wrap your code snippets in `<pre><code></code></pre>`.
2.	You can specify a language by specifying a class in the <code> element.
Example:
`<pre><code class="html"></code></pre>`

__Sunburst Only__

This plugin only contains the CSS file for the Sunburst theme syntax highlighting formatting, because it is the best dark syntax theme.  If (for some reason) you wanted to highlight your code using a different theme, there are other syntax highlighting themes available in the [Highlight.js Theme Gallery](http://softwaremaniacs.org/media/soft/highlight/test.html)


__Languages Supported:__

*	Bash
*	C#
*	C++
*	CSS
*	Diff
*	HTML, XML
*	Ini
*	Java
*	JavaScript
*	PHP
*	Perl
*	Python
*	Ruby
*	SQL


== Installation ==

1. Wrap code snippets in `[prettify][/prettify]` shortcode and it will guess the syntax being used and highlight the code.

2. You can specify a language by specifying the language extension inside the shortcode.
Example:
`[prettify class="html"][/prettify]`
  The class="" specifies the language file extensions.




== Screenshots ==

1. PHP code examples
2. CSS code example
3. HTML code example
4. JavaScript code example
5. Ruby code example

== Changelog ==

= 2.2.0 =

*	Changed syntax highlight script to Highlight.js for more accurate code detection.
*	Improved content stripping rules for WordPress code editor when the `[prettify]...[/prettify]` is wrapped around content.
*	Improved Sunburst CSS styles

= 2.1.6 =

* Added plain text color to CSS file
* Adjusted spacing in CSS file
* Updated copyright year in plugin.php file

= 2.1.5 =

* Added CSS parsing js file
* Moved JS files into /js folder
* Fixed missing files from 2.1 commit

= 2.1 =
* Added [prettify] shortcode
* Automatically added the required onload="prettyPrint()" to body tag with jquery

= 2.0 =
* Initial WordPress.org commit


