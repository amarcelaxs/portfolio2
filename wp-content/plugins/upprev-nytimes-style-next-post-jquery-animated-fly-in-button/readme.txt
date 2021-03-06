=== upPrev — Next Post Slide-in Box ===
Contributors: jpelker, gkrzyminski
Tags: animated, animation, box, fade, featured, featured, flyout, fly-out, links, new york times, notification, NYTimes, post, posts, previous post, previous posts, related, related content, rtl, seo, slider, thumbnail
Requires at least: 3.3
Tested up to: 4.3
Stable tag: 3.3.30
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Do you want to decrease your blog's bounce rate? Use this NYTimes-style “Next Post” slide-in and keep your users reading.

== Description ==

When a reader scrolls to the bottom of a post or page, upPrev animates a call-to-action to encourage further reading.

Basically, you'll get this, but for WordPress: http://www.youtube.com/watch?v=ZTrQGhWhCKs

Additionally, you can customize upPrev to suggest navigating to any one of the following:

* Previous
* Previous, but by category
* Previous, but by tag
* Random
* Or related, using YARPP (available only for posts/pages)

You can also edit display options, including size, position and custom CSS.

== Installation ==

1. Upload upPrev to your plugins directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. Configure upPrev plugin using Appearance -> upPrev

== Frequently Asked Questions ==

= upPrev is activated, but I don't see the slide-in box. Now what? =

It may be your WordPress theme. You'll need both the `wp_head` and `wp_footer` functions in your theme for this plugin to work. 

If you're not sure whether those functions are present, use this plugin to double-check: https://gist.github.com/378450

= My website is not in English, will upPrev work? =

upPrev plugin will work on websites in the following languages:

* Brazilian Portuguese
* Bulgarian
* Czech
* Dutch
* English
* French
* German
* Hebrew
* Italian
* Polish
* Romanian
* Russian
* Simplified Chinese
* Slovak
* Spanish
* Turkish
* Vietnamese

= Can I add a default image for posts without thumbnails? =

Use the `iworks_upprev_image` action:
`
<?php
add_action( 'iworks_upprev_image' , 'default_image' );
function default_image()
{
    return '<img src="image.png" alt="" />';
}
`
= Can I change the post thubnail to another image? =

Use the `iworks_upprev_get_the_post_thumbnail` filter:
`
<?php
add_filter( 'iworks_upprev_get_the_post_thumbnail' , 'change_thumbnail' );
function change_thumbnail( $image )
{
    return '<img src="image.png" alt="" />';
}
`

= Can I use upPrev with custom post types? =

Yes. Just select post types on `Appearance -> upPrev -> Content` page in `Select post types` section.

= Can I add my own styles? =

See here: [How I can customize with my own styles?](http://upprev.com/faq/how-i-can-customize-with-my-own-styles.html)

= Need more snippets? =

Visit: [upPrev: snippet archive](http://upprev.com/tag/snippet)

== Screenshots ==

1. upPrev on post
2. upPrev options: appearance
3. upPrev options: content
4. upPrev options: links
5. upPrev options: cache

== Changelog ==

= 3.3.30 =

* Release date: 2015-10-13
* MERGE: Returning the fork to the drawer (thanks, Marcin, for your hard work!)
* BUGFIX: fixed a problem with showing the title if contains tags with attributes. Props for [Ovidiu](http://pacura.ru/)

= 3.3.29 =

* Release date: 2015-09-01
* IMPROVEMENT: added Tagalog translation by [Kel DC](https://profiles.wordpress.org/kel-dc)

= 3.3.28 =

* IMPROVEMENT: added Slovak translation by Daniel Schmidt

= 3.3.27 =

* IMPROVEMENT: added Dutch translation by [Ruud Kok](http://www.ruudkok.nl/)

= 3.3.26 =

* BUGFIX: fixed empty post_type value thx to [Zeus](http://wordpress.org/support/profile/prabhakaraan) [UpPrev error - array_key_exists()!](http://wordpress.org/support/topic/upprev-error-array_key_exists)
* IMPROVEMENT: added Italian translation by [Francesco Giossi](http://www.giossi.com/)

= 3.3.25 =

* IMPROVEMENT: updated Simplified Chinese translation by [Leo](http://smallseotips.com/)
* IMPROVEMENT: added filter '[iworks_upprev_box_title](http://upprev.com/documentation/filter-reference/iworks_upprev_box_title)' for box title, return false to remove title

= 3.3.24 =

* BUGFIX: prevent to display upPrev box on attachment page thx to [Swaps4](http://wordpress.org/support/profile/swaps4) [Upprev displaying on attachment pages with no styling](http://wordpress.org/support/topic/upprev-displaying-on-attachment-pages-with-no-styling)
* BUGFIX: remove add_contextual_help function (deprecated from 3.3).
* IMPROVEMENT: updated IworksOptionClass to 2.0.0

= 3.3.23 =

* BUGFIX: default value only when is need thx to [Jeff](http://wordpress.org/support/profile/lambje) [Offset Not Working](http://wordpress.org/support/topic/offset-not-working)
* IMPROVEMENT: updated IworksOptionClass to 1.7.7

= 3.3.22 =

* IMPROVEMENT: add [iworks_upprev_check filter](http://upprev.com/documentation/filter-reference/iworks_upprev_check), see documentation: [Filter Reference – iworks_upprev_check](http://upprev.com/fiter_reference_iworks_upprev_check.html)

= 3.3.21 =

* BUGFIX: replace WP_PLUGIN_URL with plugins_url() thx to [tigr](http://wordpress.org/support/profile/tigr) [SSL compatibility](http://wordpress.org/support/topic/ssl-compatibility)

= 3.3.20 =

* IMPROVEMENT: updated IworksOptionClass to 1.7.4
* IMPROVEMENT: check upPrev compatybility with WordPress 3.7
* BUGFIX: fixed "last selected tab"

= 3.3.19 =

* IMPROVEMENT: updated Hebrew translation by [של אודי בורג](http://blog.udiburg.com)

= 3.3.18 =

* IMPROVEMENT: updated Bulgarian translation by [Martin Halachev](http://wordpress.org/support/profile/mhalachev)

= 3.3.17 =

* BUGFIX: Move custom css after wp_enqueue_style. thx to [007me](http://wordpress.org/support/profile/007me) [Can't change font size and style and costumize close button](http://wordpress.org/support/topic/cant-change-font-size-and-style-and-costumize-close-button)

= 3.3.16 =

* BUGFIX: Excerpt number of words to show option not working for a concrete excerpt. thx to [gyalokai](http://wordpress.org/support/profile/gyalokai) [Excerpt number of words to show option not working](http://wordpress.org/support/topic/excerpt-number-of-words-to-show-option-not-working)
* IMPROVEMENT: updated IworksOptionClass to 1.7.2
* IMPROVEMENT: added box to front page thx to [SARed](http://wordpress.org/support/profile/sared) [Using Upprev on a front page with latest posts?](http://wordpress.org/support/topic/using-upprev-on-a-front-page-with-latest-posts)

= 3.3.15 =

* IMPROVEMENT: added Hebrew translation by [עמיעד](http://hatul.info)

= 3.3.14 =

* BUGFIX: fixed limit for taxonomies thx to [darkjedipete](http://wordpress.org/support/profile/darkjedipete)

= 3.3.13 =

* IMPROVEMENT: added Czech translation by [Michal Bláha](http://michalblaha.cz/)

= 3.3.12 =

* BUGFIX: fixed compatybility errors with YARPP 4.x version thx to [adamdport](http://wordpress.org/support/profile/adamdport)
* IMPROVEMENT: add css to changed tabs class in WordPress 3.5
* IMPROVEMENT: check upPrev compatybility with WordPress 3.5

= 3.3.11 =

* IMPROVEMENT: added Bulgarian translation by [Martin Halachev](http://wordpress.org/support/profile/mhalachev)

= 3.3.10 =

* IMPROVEMENT: added Spanish translation by [Ramón Rautenstrauch](http://www.apasionadosdelmarketing.es/about/)

= 3.3.9 =

* IMPROVEMENT: added Romanian translation by [Florin Arjocu](http://drumliber.ro/)

= 3.3.8 =

* BUGFIX: critical update, plugin crash site if choose no post types

= 3.3.7 =

* IMPROVEMENT: added Russian translation by [Вадим Сохин](http://webbizreshenie.ru/)

= 3.3.6 =

* IMPROVEMENT: added German translation by [Mario Wolf](http://wolfmedien.de/)

= 3.3.5 =

* BUGFIX: fixed double output when using YARPP thx to [gyutae](http://wordpress.org/support/profile/gyutae)
* BUGFIX: hide developer admin option

= 3.3.4 =

* IMPROVEMENT: added Brazilian Portuguese translation by [Leonardo Antonioli](http://www.tobeguarany.com/)
* BUGFIX: fixed minor description bug (thx Eva)

= 3.3.3 =

* IMPROVEMENT: added Vietnamese translation by [Xman](http://thegioimanguon.com/)
* BUGFIX: use crc32 to build ids for tabbed config, wich collapsed in other than utf8 charset

= 3.3.2 =

* IMPROVEMENT: added GA option: non-interaction to prevent events in bounce-rate calculation.

= 3.3.1 =

* IMPROVEMENT: added French translation by [Eva](http://myclientisrich-leblog.com/)

= 3.3 =

* IMPROVEMENT: added option to hide upPrevBox on mobile devices, matching imlemented from [WP Mobile Detector](http://wordpress.org/extend/plugins/wp-mobile-detector/) ticket from [forum](http://wordpress.org/support/topic/plugin-upprev-mobile-themes)

= 3.2 =

* IMPROVEMENT: added action *[iworks_upprev_image](http://upprev.com/documentation/action-reference/iworks_upprev_image)* - you can add own code to produce icon, when them don't support post-thumbnails
* IMPROVEMENT: added thumbnail filter *iworks_upprev_get_the_post_thumbnail* - now you can easy change thumbnail
* IMPROVEMENT: added purging transient cache entries from $wpdb->options table when turn off this cache [forum](http://wordpress.org/support/topic/plugin-upprev-crazy-number-of-wp-options-database-entries)
* IMPROVEMENT: add check _gaq object exist
* CHECK: checked compatybility to WordPress 3.3
* IMPROVEMENT: updated IworksOptionClass to version 1.0.1

= 3.1.1 =

* IMPROVEMENT: added ability to turn off "remove_all_filters" function

= 3.1 =

* IMPROVEMENT: change GA trackEvent syntax
* IMPROVEMENT: added Turkish translation by [wpdestek](http://wordpress.org/support/profile/wpdestek)

= 3.0.1 =

* BUGFIX: fixed printing GA code when "I don't have GA tracking on site." is unticked. [forum](http://wordpress.org/support/topic/plugin-upprev-google-analytics-tracking-code-error-ga-tracking-installed) thx [win101](http://wordpress.org/support/profile/win101)

= 3.0 =

* BUGFIX: fixed end date filter for imported posts
* BUGFIX: fixed javascript conflict on edit post screen
* BUGFIX: fixed problem with unchecking 'Excerpts'. [forum](http://wordpress.org/support/topic/plugin-upprev-bugs-no-box-in-firefox-6-offset-doesnt-work-disable-excerpts-doesnt-work) thx [benjamin](http://wordpress.org/support/profile/kbenjamin)
* BUGFIX: fixed sticky posts display loop
* BUGFIX: fixed thumbnail display problem
* IMPROVEMENT: added filter '[iworks_upprev_box_item](http://upprev.com/documentation/filter-reference/iworks-upprev-box-item)' for any item excerpt YARPPs
* IMPROVEMENT: added GA track: view box and click link
* IMPROVEMENT: added option *ignore sticky posts*
* IMPROVEMENT: added sanitize function for offset
* IMPROVEMENT: added thumbnail preview on posts/pages list
* IMPROVEMENT: cleaning empty styles from custom css field
* REFACTORING: option managment

= 2.3.7 =

* BUGFIX: fixed problem for defaults post_type if no one choosed [forum](http://wordpress.org/support/topic/plugin-upprev-error)

= 2.3.6 =

* BUGFIX: fixed problem with using thumbnails in themes with thumbnail support [forum](http://wordpress.org/support/topic/plugin-upprev-version-235-update-breaks-thumbnail-support)
* IMPROVEMENT: added custom css rules (forum](http://wordpress.org/support/topic/plugin-upprev-version-235-update-breaks-thumbnail-support)

= 2.3.5 =

* BUGFIX: fixed problem with using thumbnails in themes without thumbnail support

= 2.3.4 =

* BUGFIX: fixed problem with default values and values saving (again)
* IMPROVEMENT: added correct way to enquene style and js files

= 2.3.3 =

* BUGFIX: hide configuration link on plugins list page for WordPress MU
* BUGFIX: fixed problem with post excerpt
* BUGFIX: fixed problem with default values and values saving

= 2.3.2 =

* BUGFIX: fixed translation bug
* BUGFIX: removed date limit for random posts
* BUGFIX: fixed open in new window bug
* IMPROVEMENT: added limit to display only on selected post types [forum](http://wordpress.org/support/topic/plugin-upprev-previous-post-animated-notification-custom-post-types)

= 2.3.1 =

* BUGFIX: fixed small bug with display option

= 2.3 =

* IMPROVEMENT: added filter **iworks_upprev_box**
* IMPROVEMENT: added tabed options (based on [Breadcrumb NavXT](http://wordpress.org/extend/plugins/breadcrumb-navxt/) plugin
* IMPROVEMENT: added prefix and suffix to urls
* IMPROVEMENT: added option to allow open links in new window
* IMPROVEMENT: added integration with [YARPP](http://wordpress.org/extend/plugins/yet-another-related-posts-plugin/)
* BUGFIX: fixed [Transients Cache Lifetime is set to wrong seconds](http://wordpress.org/support/topic/plugin-upprev-transients-cache-lifetime-is-set-to-wrong-seconds)
* BUGFIX: fixed deactivation hook option names

= 2.2.1 =

* BUGFIX: fixed display problem with document shorter than browser
* IMPROVEMENT: document post type as checkbox list

= 2.2 =

* IMPROVEMENT: added upPrev configuration link to admin bar
* IMPROVEMENT: added registered custom posts
* BUGFIX: fixed error if the behavior of boxing display for html element
* BUGFIX: fixed wrong method post_type selection

= 2.1.2 =

* BUGFIX: remove margin-top for title element
* IMPROVEMENT: added display taxonomies limit

= 2.1.1 =

* BUGFIX: When they scroll down again, the box flies out, which -- on a small screen -- can obscure a big chunk of the content. [forum](http://wordpress.org/support/topic/plugin-upprev-return-to-top-of-post-after-clicking-x)

= 2.1 =

* IMPROVEMENT: added box width option
* IMPROVEMENT: added box bottom and side margin option
* IMPROVEMENT: added transient cache for scripts and styles
* IMPROVEMENT: added actions: **iworks_upprev_box_before** and **iworks_upprev_box_after**, called inside the upPrevBox, before and after post. Now you can add some elements to upPrevBox whithout plugin modyfication.
* IMPROVEMENT: added option to display (or not) close button
* IMPROVEMENT: added post type choose: post, page or any.
* IMPROVEMENT: added random order for displayed posts

= 2.0.1 =

* BUGFIX: fixed translation load
* IMPROVEMENT: added show box header option
* IMPROVEMENT: added stamp for cache key
* IMPROVEMENT: added Polish translation by [Marcin Pietrzak](http://iworks.pl/)

= 2.0 =

* BUGFIX: fixed display upPrev box in case of an equal height of the window and the document
* IMPROVEMENT: added to use transient cache
* IMPROVEMENT: added thumbnail width (height depent of theme thumbnail)
* IMPROVEMENT: added prevent some options if active theme dosen't support it
* IMPROVEMENT: added activation & deactivation hooks (to setup defaults and remove config )
* BUGFIX: remove all filters the_content for post in upPrev box

= 1.0.1 =

* BUGFIX: added post_date as parametr, to get real previous post
* BUGFIX: javascript error
* IMPROVEMENT: added header for simple method

= 1.0 =

* INIT: forking of [original plugin](http://wordpress.org/extend/plugins/upprev-nytimes-style-next-post-jquery-animated-fly-in-button/)

== Upgrade Notice ==

= 3.3.13 =

Add Czech translation.

= 3.3.12 =

Fixed using YARPP 4.x. Check upPrev compatybility with WordPress 3.5.

= 3.3.11 =

Add Bulgarian translation.

= 3.3.10 =

Add Spanish translation.

= 3.3.9 =

Add Russian translation.

= 3.3.8 =

Critical update to prevent site crash!

= 3.3.3.1 =

Add Brazilian Portuguese translation.

= 3.0 =

Add GA tracking for display and click. Add filter and action to modify result.

= 2.3 =

Add YARPP integration.

= 2.1 =

Add support to custom post type.

= 2.1 =

Add some apperance, cache IMPROVEMENTs. Scripts and styles optimization. New order available: random.

= 2.0.1 =

Add a polish translation. Fix cache refresh missing after change plugin configuration.

= 2.0 =

More configuration options. Uses transient cache to store results. Optimization activation & deactivation process.

