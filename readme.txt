=== Domain Mapping System ===
Contributors: deniaz
Author URI: http://www.cheekyowl.com
Plugin URI: http://deniaz.github.com/wp-dms
Tags: domain, url, vhost, microsite, domain mapping
Requires at least: 3.1
Tested up to: 3.5.1
Stable tag: 2.0
Version: 2.0
License: GPLv3 or later
License URI: http://www.gnu.org/licenses/gpl-3.0.html

Domain Mapping System allows to map domains to WP Pages and/or custom post types.

== Description ==

= Important Links =

[Official Website](http://deniaz.github.com/wp-dms)

= Domain Mapping System = 

**Domain Mapping System allows to map domains to WP Pages and/or custom post types.**

If you're running a website on WordPress and need to create a related **Microsite**, DMS can help you. Both websites will run from the same WordPress instance and can therefore be managed by the same login.

DMS will analyse HTTP requests and check if the domain is mapped to WordPress content. If so, DMS will load the corresponding content. Otherwise, it will not do anything and let WordPress do its magic.

If you'd like to create a Microsite, you could use a custom template for a page (or custom post type) and use DMS to make the user feel like using a stand-alone website.

"So, why not just use WordPress MultiSite Network?" you might ask.

Because it says:
>If you plan on creating sites that are strongly interconnected, that share data, or share users, then a multisite network might not be the best solution.
>[ow.ly/aQybY](http://ow.ly/aQybY)

If you do plan on creating sites that are strongly interconnected and share data - **please do you a multiste network**!

== Installation ==

1. Upload the plugin through WordPress' Plugin System or alternatively via FTP
2. Activate the plugin through WordPress' Plugin System
3. Point all domains to your WordPress vhost
4. Create a WP Page (*My Cool Single-Page*) or Custom Post
5. Go to Settings -> Domain Mapping. Add your domain and designated content.
6. Save
7. You're ready to rumble!

Regarding Point 5: Remember to add mydomain.com **AND** **www**.mydomain.com!

== Frequently Asked Questions ==

= Can I map to categories or archives? =
Yes.

= When clicking a link, the URL changes. What am I doing wrong? =
Nothing. The way WordPress works and DMS was built, this is the correct behaviour. DMS is aimed to support Microsites.

= Does this plugin support Multisites? =
Yes.

= Does this plugin work with WPMUDEV plugins? =
Yes, yes it does. To make use of the full potential, you should go to the WPMUDEV Domain Mapping directory and open up domain-mapping.php. Uncomment the following line code (line 31):

`define('DOMAINMAPPING_ALLOWMULTI', 'yes');`

= What does DMS do about SEO? =
Version < 2.0: Absolutely nothing.
Version >= 2.0: It gives you the option to remove WordPress' <link rel="canonical" href="" />. Otherwise you have the following issue, that *www.mappeddomain.com* points to *www.wp_siteurl.com* in the canonical tag, which is wrong.

You can also choose to use the canonical tag, which would then write the page's permalink (<site_url>/page_slug or <site_url>/?p=42). 
This is needed if you have a portfolio of projects and can access one special project by using www.verycoolproject.com but show the same
page as www.myportfolio.com/projects/very-cool-project.


== Changelog ==

= 2.0 =
* Completely re-engineered Codebase
* New strucute. Zips downloaded from GitHub are now directly installable.
* Added Canonical-Feature

= 1.3.2 =
* Show all posts/pages/cpt-posts

= 1.3.1 =
* Added support for Blogpost Categories

= 1.3 =
* Code Refactoring, got rid of DMSMenu-Class
* Added support for Posts
* Added support for CPT Archives
* Some Admin-UI tweaks (chosen.js instead of HTML-Select, Post Type Selection)
* Tested with [WordPress MU Domain Mapping Plugin](http://wordpress.org/extend/plugins/wordpress-mu-domain-mapping)
* To provide MU support, users must now be able to change settings instead of installing plugins to use DMS Options (Capabilities).

= 1.2.1 =
* Fixed empty &lt;select&gt;-Bug

= 1.2 =
* Added support for Custom Post Types

= 1.1 = 
* Instead of strange page hack, modify page query
* Remove kill switch as it is unnecessary

= 1.0 =
* No changes - initial release.