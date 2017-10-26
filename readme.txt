=== Pound :: Easy Unit Testing For WordPress ===
Contributors: reality66
Tags: testing, unit testing,  plugins, development
Requires at least: 3.0
Tested up to: 4.4
Requires PHP: 5.4
Stable tag: 1.0.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Easily write unit tests for WordPress plugins

== Description ==

Pound makes it really easy to write and run unit tests for WordPress plugins.

== Installation ==

To  Install ChordWP

1. Download the pound.zip file
2. Extract the zip file so that you have a folder called chordwp
3. Upload the 'chordwp' folder to the `/wp-content/plugins/` directory
4. Activate the plugin through the 'Plugins' menu in WordPress

To Uninstall Pound

1. Deactivate the plugin thorugh the 'Plugins' menu in WordPress
2. Click the "delete" link to delete the plugin. This will remove all
of the files installed by the plugin from your plugins directory. It 
will not delete any pages or posts on your WordPress site.

== Frequently Asked Questions ==

= Where can I learn more about how to use Pound to test my plugins? =

For more information about how it works, why you may want to use it, and how to set up and
run unit tests for your WordPress plugins, please see this article: 
http://leehblue.com/unit-testing-wordpress-plugins/

= Why not just use PHPUnit? =

Pound was created to make it fast and easy to start writing unit tests for your WordPress
plugins. You can run the plugin on the actual site where you are developing if you don't have
a test site. There is virtually no configuration necessary to start writing tests. The overall
intention of this plugin is to make unit testing more accessible to WordPress plugin developers.

PHPUnit is a very powerful tool and is great for testing PHP code including WordPress plugins.
In fact, if you get into using WP-CLI you will notice that there is built-in support for using
PHPUnit to test your code. Pound is not intended to replace the need for PHPUnit. It is intended
to provide an easy way to get started with unit testing WordPress plugins. It's a great option
for small to medium sized plugins. 

= How is Pound different from PHPUnit? =

On one hand, Pound and PHPUnit are both tools to help you run automated tests for your code.
Pound is built as a WordPress plugin, and therefore really only intended to be used for WordPress
development. PHPUnit can be used to test any codebase. The main benefits of Pound over PHPUnit
are ease of use. Pound has one boolean check at the end of each tests. PHPUnit has a very large
number of assertions. Pound requires virtually no configuration to start using. PHPUnit requires
XML configuration files to set up your testing environment. Pound runs right in your web browser
with clean, colorful output. PHPUnit is a command line tool.

== Screenshots ==

1. Shortcode to run tests
2. Example output with a failing test

== Changelog ==

= 1.0.1 =

- Update minimum PHP requirement to PHP 5.4

= 1.0.0 =

- Initial relase of Pound
