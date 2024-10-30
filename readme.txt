=== Jahuty Snippets ===
Contributors: jahuty
Donate link: https://www.jahuty.com
Tags: snippets, dynamic content
Requires at least: 4.6
Tested up to: 5.2.2
Stable tag: 1.0.1
Requires PHP: 7.0.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Turn any content under development into dynamic content with Jahuty Snippets.


== Description ==

Content changes often and finishes late. Unfortunately, it can't all live in a CMS. Engineers are often stuck updating and deploying content in an MVC or SPA application.

Instead, use our service and API clients to turn any content under development into dynamic content, freeing your engineers to engineer, not manage content.

= Create a snippet =

Use our website (https://www.jahuty.com) to create a snippet of HTML.

Logically, a snippet is a group of public, customer-facing content that changes together. Think of a snippet as a custom element you leave your content team to fill.

Physically, a snippet can be any valid HTML string: plain-text, an `h1` and a `p` element, multiple `div` elements, whatever you'd like.

Snippets must be smaller than 20 pages of text and markup (216 UTF-8 characters to be exact). If you find yourself needing more room, split your snippet in two.

Snippets must be valid HTML. Be sure to escape special HTML characters like <, >, and &; close important tags; and, avoid including untrusted third-party <script> tags.

Remember, snippets are public, customer-facing content. Don't include any secrets, because there are no protections to prevent other users from viewing your snippets (aside from your public API key, which is easy enough to discover).

= Add a container =

Add a container with a data-snippet-id attribute.

Add a data-snippet-id="XYZ" attribute to the snippet's container element, where XYZ is your snippet's identifier.

= Load the page =

We'll fetch your snippets and insert them into the container.

When the page loads (on DOMContentLoaded to be exact), we'll find any elements with the snippet-id data attribute, fetch their content using AJAX requests, and innerHTML the content into the container.


== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/plugin-name` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress
3. Use the Settings->Snippets screen to input your Jahuty key retrieved from https://www.jahuty.com


== Frequently Asked Questions ==


== Screenshots ==


== Changelog ==

= 1.0.1 =
* Better documentation.

= 1.0.0 =
* Plugin release.
