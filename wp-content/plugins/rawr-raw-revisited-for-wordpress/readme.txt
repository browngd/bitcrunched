=== RawR (Raw Revisited) ===
Contributors: dereks443
Donate link: 
Tags: raw, code, wordpress, unformatted, disable, filter, html, xml, css, javascript
Requires at least: 2.5.0
Tested up to: 3.2.1
Stable tag: trunk

This plugin allows the embedding of raw text, such as raw html, xml, css, javascript, etc.
using a simple [rawr][/rawr] shortcode.

== Description ==

This plugin allows the embedding of raw text, such as raw html, xml, css, javascript, etc.
using a shortcode. For example, [rawr]some <b>raw</b> <i>html</i> here.[/rawr].  It has no
filtering of any kind.  There are no configuration options; anything wrapped in [rawr][/rawr] is
put through to the page unfiltered, and thus displayed to the user.

See http://derek.simkowiak.net/rawr-raw-revisited-for-wordpress/ for full documentation.

== Features  ==

* Has no configuration options, no user interface, no access control "roles", no files, no tables in the database.  
Just activate it and use [rawr][/rawr] in your pages and posts.

* Just ~100 lines of code (and over half of that is comments and license).

* This plugin may be installed in parallel with the other raw plugins, because they don't use the [rawr] shortcode.

* Unlike Raw HTML, this plugin does not unregister or override any built-in WordPress filters.

* Unlike ML Raw HTML and Raw HTML Snippets, this plugin does not require you to provide unique IDs for each raw block on a page.

== Installation ==

Install this plugin like any other.  

1. Go to Admin > Plugins > Add New > Upload.

If that's too easy for you, try this:

1. Put it into the `/wordpress/wp-content/plugins/` directory 
2. Activate it in the admin Plugin page.

== Usage ==

Here are some examples:

[rawr]
<script>
SomeJavascript();
window.location("http://remote-site.us");
</script>
[/rawr]

[rawr]
<style>
.some_class {
	font-style: bold;
}
</style>
[/rawr]

...etc.

== Frequently Asked Questions == 

Q: Why aren't there any FAQ questions yet?

A: Good question.

== Screenshots == 

[none]

== Changelog ==

= 1.0 =
* Fixed display name in the plugin browser

= 0.1 =
* Initial commit.

== Upgrade Notice ==

Just copy the new version over the old version.  This plugin does
not use the database for anything.


