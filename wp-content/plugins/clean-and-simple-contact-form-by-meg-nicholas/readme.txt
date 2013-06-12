=== Clean and Simple Contact Form ===
Contributors: MegNicholas
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=AKQM4KSBQ4H66
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl.html
Tags: simple, contact, form, contact button, contact form, contact form plugin, contacts, contacts form plugin, contact me, feedback form, bootstrap, twitter, google, reCAPTCHA, ajax, secure
Requires at least: 3.3
Tested up to: 3.5
Stable tag: 4.1.0

A clean and simple contact form with Google reCAPTCHA and Twitter Bootstrap markup.

== Description ==
A clean and simple contact form with Google reCAPTCHA and Twitter Bootstrap markup.

*   **Clean**: all user inputs are stripped in order to avoid cross-site scripting (XSS) vulnerabilities. 

*   **Simple**: Ajax enabled validation for immediate response and guidance for your users (can be switched off). 

*   **Stylish**: Use the included stylesheet or switch it off and use your own for seamless integration with your website. 
Uses **Twitter Bootstrap** classes.

This is a straightforward contact form for your WordPress site. There is very minimal set-up 
required. 

A standard set of input boxes are provided, these include Email Address, Name, Message and a nice big ‘Send Message’ button. 

When your user has completed the form an email will be sent to you containing your user’s message. To reply simply click the ‘reply’ button on your email client. The email address used is the one you have set up in WordPress under ‘Settings’ -> ‘General’, so do check this is correct. 

To help prevent spam, this plugin allows you to add a ‘reCAPTCHA’. This adds a picture of a couple of words to the bottom of the form. Your user must correctly type the words before the form can be submitted, and in so doing, prove that they are human.

= Why Choose This Plugin? =
Granted there are many plugins of this type in existence already. Why use this one in-particular? 

Here’s why:

*   Minimal setup. Simply activate the plugin and place the shortcode [contact-form] on any post or page.

*   **Safe**. All input entered by your user  is stripped back to minimise as far as possible the likelihood of any malicious user attempting to inject a script into your website. You can turn on reCAPTCHA to avoid your form being abused by bots.

*   **Ajax enabled**. You have the option to turn on ajax (client-side) validation which gives your users immediate guidance when completing the form without having to wait for the page to refresh.

*   The form can **integrate seamlessly into your website**. Turn off the plugin’s default css style sheet so that your theme’s style sheet can be used instead.

*   If your theme is based on **twitter bootstrap** then this plugin will fit right in because it already has all the right div’s and CSS classes for bootstrap.

*   This plugin will only link in its jQuery file where it’s needed, it **will not impose** itself on every page of your whole site!

*   Works with the **latest version of WordPress**.

*   Written by an **experienced PHP programmer** and rigorously  tested as standard practice.

Hopefully this plugin will fulfil all your needs, if not [get in-touch](http://www.megnicholas.co.uk/contact-me "Get In Touch") and I will customise to your exact requirements.


== Installation ==
There are two ways to install:

1. Click the ‘Install Now’ link from the plugin library listing to automatically download and install.

2. Download the plugin as a zip file. To install the zip file simply double click to extract it and place the ‘contact-form’ folder in your wordpress plugins folder, i.e. <wordpress>/wp-content/plugins where <wordpress> is the directory that you installed WordPress in.

== How to Use ==
Unless you want to change messages or add reCAPTCHA to your contact form then this plugin will work without any additional setup.

Important: Check that you have an email address set-up in your WordPress ‘Settings’->’General’ page. This is the address that the plugin will use to send the contents of the contact form.

To add the contact form to your WordPress website simply place the shortcode [contact-form] on the post or page that you wish the form to appear on.

== Additional Settings ==
This plugin will work as is without any additional setup. You have the option to change the default messages that are displayed to your user and to add reCAPTCHA capabilities.

Go to the settings screen for the contact form plugin.

You will find a link to the setting screen against the entry of this plugin on the ‘Installed Plugins’ page.

Here is a list of things that you can change

*   **Message**: The message displayed to the user at the top of the contact form.

*   **Message** Sent Heading: The message heading or title displayed to the user after the message has been sent.

*   **Message Sent Content**: The message content or body displayed to the user after the message has been sent.

*   **Use this plugin’s default stylesheet**: The plugin comes with a default style sheet to make the form look nice for your user. Untick this if you want to use your theme’s stylesheet instead. The default stylesheet will simply not be linked in.

*   **Use client side validation (Ajax)**: When ticked the contact form will be validated on the client giving your user instant feedback if they have filled the form in incorrectly. If you wish the form to be validated only on the server then untick this option.

*   **Use reCAPTCHA**: Tick this option if you wish your form to have a reCAPTCHA box. ReCAPTCHA helps to avoid spam bots using your form by checking that the form filler is actually a real person. To use reCAPTCHA you will need to get a some special keys from google https://www.google.com/recaptcha/admin/create. Once you have your keys enter them into the Public key and Private key boxes

*   **reCAPTCHA Public Key**: Enter the public key that you obtained from here.

*   **reCAPTCHA Private Key**: Enter the private key that you obtained from here.

*   **reCAPTCHA Theme**: Here you can change the reCAPTCHA box theme so that it fits with the style of your website.

*   **!NEW! Recipient Email**: The email address where you would like all messages to be sent. This will default to the email address you have specified under 'E-Mail Address' in your WordPress General Settings. If you want your mail sent to a different address then enter it here.

*   **!NEW! Email Subject**: This is the email subject that will appear on all messages. If you would like to set it to something different then enter it here.

== Screenshots ==
1. Contact Form With reCAPTCHA
2. Contact Form Without reCAPTCHA
3. Message Sent
4. Contact Form Options Screen
5. Place this shortcode on your post or page to deploy

== Demo ==
This is a demonstration of this plugin working on the default Twenty Twelve theme ->
[Clean and Simple Contact Form Demonstration](http://demo.megnicholas.co.uk/wordpress-clean-and-simple-contact-form "Plugin Demonstration")

==About Meg Nicholas ==
I am a freelance WordPress Developer. 
[Hire me for all your Wordpress needs](http://www.megnicholas.co.uk "Hire Me").

== Frequently Asked Questions ==
A clean and simple contact form with Google reCAPTCHA and Twitter Bootstrap markup.

== Changelog ==
= 4.1.0 =
* Fixed a bug in class.cff_settings.php where php opening tag had got missed off. This problem caused the settings screen not to display correctly but only occurred with some versions of php. Please upgrade if you have this problem.
= 4.0.9 =
* Switched header argument of wp_mail over to a filter to remove any potential conflicts with other emailing plugins or themes
* The ability to set a different recipient email address. Previously all email was sent to the WordPress administrator email address.
* Allow the email subject to be customised.
= 4.0.8 =
* Fixed a bug: When using reCAPTCHA ajax did not work.
* Fixed a bug: Ajax validation was not checking email address were equal (server side was doing it instead)
* Improvement: Ajax now works better.
* Documentation update: nicer links (worked how to do them in markdown!), changelog and upgrade notice sections now correctly formatted.
= 4.0.7 =
* Fixed a bug: Plugin name is actually clean-and-simple-contact-form-by-meg-nicholas now (not contact-form) but this new name needed to be updated in the plugin settings definitions. I also needed to rename contact-form.php to clean-and-simple-contact-form-by-meg-nicholas.php. My thanks to Jakub for finding this bug.
* If your webpage is ssl then reCAPTCHA will now also use ssl mode.


== Upgrade Notice ==
= 4.1.0 =
Please upgrade if your settings screen is not displaying.
= 4.0.9 =
More customisation: recipient email address, and email subject.
= 4.0.8 =
Ajax now works when your form has reCAPTCHA on it. Ajax validation is now cleaner.
= 4.0.7 =
Fixed a bug which occurred when plugin name was changed. reCAPTCHA will now use ssl if your webpage is ssl.
