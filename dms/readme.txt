=== Domain Mapping System ===
Contributors: deniaz
Author URI: http://www.cheekyowl.com
Plugin URI: http://projects.cheekyowl.com/wp-dms
Tags: domain, url, vhost, microsite
Requires at least: 3.1
Tested up to: 3.2.2
Stable tag: 1.2
Version: 1.2
License: GPLv3 or later
License URI: http://www.gnu.org/licenses/gpl-3.0.html

Domain Mapping System allows to map domains to WP pages and/or custom types.

== Description ==

= Important Links =

[Official Websites](http://projects.cheekyowl.com/wp-dms) | [Bug Tracker](http://www.github.com/deniaz/wp-dms/issues) | [Support](http://www.github.com/deniaz/wp-dms/wiki)

= TL;DR =
DMS allows one to map domains to WordPress pages and/or custom posts.

= Domain Mapping System = 

Imagine you've got a company website based on wordpress with the domain www.mycompany.com, 
all good so far. Furthermore, you've got two products with own domains, e.g. www.myregularproduct.com 
and www.myspecialproduct.com.

Let's assume your product pages are micro-sites. One way to handle this, is by using Wordpress Networks. 
One important note from Wordpress is:

> If you plan on creating sites that are strongly interconnected, that share data, or share users, then a 
> multisite network might not be the best solution.
(http://ow.ly/aQybY)

Well, if you need a shared blog or something similar, this Networks isn't what you're looking for. But DMS is.

With DMS you may point all three domains to the same Apache vhost (or nginx, lighthttpd, ...), where your wordpress 
instance is running on. You than create a Wordpress Page (*My Regular Product*), perhaps with a custom template. In the 
DMS options you can now configure the domain www.myregularproduct.com to your Wordpress page *My Regular Product*.

As easy as pie!

*Note; the custom template is not handled by DMS, it's a built-in Wordpress feature.*

== Installation ==

1. Upload domain-mapping-system.zip as a plugin into your WordPress instance
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Point all domains to your WordPress vhost
4. Create a WP Page (*My Regular Product*) or Custom Post
5. Go to Settings -> DMS Options, add your domain and select your page/custom post
6. Save
7. You're ready to rumble!

== Frequently Asked Questions ==

= Which Wordpress Versions are supported? =

I have no idea, Wordpress 3.3.2 surely is.

= I've found a bug! What now? =

Please report it on [github](http://www.github.com/deniaz/wp-dms/issues).

= Woah, my_domain.com turns into my.domain.com?! =

Possibly, yes. That's because I use the php function `parse_str()` . It turns . (dot)
 into _ (underscore), so they are manually replaced afterwards. If it actually bothers 
 you, I will change this.

== Changelog ==

= 1.0 =
* No changes - initial release.

= 1.1 = 
* Instead of strange page hack, modify page query
* Remove kill switch as it is unnecessary

= 1.2 =
* Added support for Custom Post Types
