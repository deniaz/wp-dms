WordPress Domain Mapping System (DMS)
=====================================

General
-------

[Official Website](https://github.com/deniaz//wp-dms) | [WordPress Plugin Page](http://www.wordpress.org/extend/plugins/domain-mapping-system)

Description
-----------
Imagine you've got a company website based on wordpress with the domain www.mycompany.com,
all good so far. Furthermore, you've got two products with own domains, e.g. www.myregularproduct.com
and www.myspecialproduct.com.

Let's assume your product pages are micro-sites. One way to handle this, is by using Wordpress Networks.
One important note from Wordpress is:

> If you plan on creating sites that are strongly interconnected, that share data, or share users, then a
> multisite network might not be the best solution.
(http://ow.ly/aQybY)

Well, if you need a shared blog or something similar, WordPress Multisite isn't what you're looking for. But DMS is.

With DMS you may point all three domains to the same Apache vhost (or nginx, lighthttpd, ...), where your WordPress
instance is running on. You than create a WordPress Page (*My Regular Product*), perhaps with a custom template. In the
DMS options you can now configure the domain www.myregularproduct.com to your WordPress page *My Regular Product*.

As easy as pie!

*Note; the custom template is not handled by DMS, it's a built-in Wordpress feature.*