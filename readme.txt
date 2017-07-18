=== Multisite Media Display ===

Contributors: Rick Hellewell
Donate link: http://cellarweb.com/wordpress-plugins/
Tags: Multisite Media Display
Requires at least: 4.0.1
Tested up to: 4.8
Stable tag: 1.20
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Use shortcodes on a page/post to display/edit all media items on all multisite subsites. 
 
== Description ==

Creates shortcodes to display/edit of media items on pages/posts, showing all media on all subsites in a multisite installation. See all media on all sites without using each site's Media page. Exclude items by placing 'noshow' in a picture's caption. Can also be used on single (non-multisite) sites. An easy way to automatically display all media on a post/page. Shortcode parameters allow selection of last x days, items displayed, and showing of captions or upload date.

== Installation ==

1. Download the zip file, uncompress, then upload to `/wp-content/plugins/` directory. Or download, then upload/install via the Add Plugin page.

1. Activate the plugin through the 'Plugins' menu in WordPress.

1. Usage information in Settings, 'Multisite Media Display Info/Usage'.

== Frequently Asked Questions ==

= What are the shortcodes used? =

Use the *[mmd_display]* to display the pictures on your post/page. Use the *[mmd_edit]* shortcode to display the pictures; click on a picture to get to the Media edit screen.

= Where do I use the shortcodes? = 

Just place the shortcode on a post/page. The *[mmd_display*] shortcode can be used on any public or private page/post. The *[mmd_edit]* shortcode is only be available to the SuperAdmin, and in fact will not display pictures unless the SuperAdmin is logged in. (You don't want non-SuperAdmins to be able to see other subsites media.) We use the shortcodes only on our master site, and on a private page - it's just for our use and convenience.

= How are the pictures displayed? = 

The pictures are shown in two- or three-column format (depends on the size of the text area on a page/post with your theme), with the caption under each picture. There is some CSS to display the pictures, but the overall 'look' of the page/post will depend on your theme. Look at the screenshot for an example.

= Will this work with any theme? =

More than likely. All our CSS to display the pictures is contained within a DIV, so theme CSS is not affected.

= Are there any settings? = 

Nope. The 'Info/Usage' (Settings) screen just contains information on the plugin, and the shortcodes used.

= Can I limit the number of pictures displayed, or show the last 6 days? = 

Yes. Just use a shortcode similar to [mmd_display days=4 items=10] or [mmd_edit days=5 items=10]. These options will be shown above the pictures: 'Showing last 4 days, last 10 pictures. 

= How about showing the caption or upload date? = 

Yes. Add the *caption=yes* and/or *showdate=yes* parameters.

= What about excluding pictures from being shown? =

Gotcha covered. Just put 'noshow' in the picture's caption.

= Are there known issues? = 

Yes. When you are in the Media Edit screen, clicking the 'x' button to exit the Edit screen returns you to the Admin Media screen. Use the browser Back button twice to return to the page/post. But not a big deal, since the edit mode is only available to the multisite SuperAdmin, who should know how to use the Media Edit page.

I suppose we could figure out the trick to re-define the 'X' button to return to the page.

= What if I have problems or suggestions? =

Just contact us via the plugin's Support page. Or via www.CellarWeb.com . 

= Do you have other plugins? = 

Yes! 

* **FormSpammerTrap for Comments** : enhances comment forms so that bots can't spam your comments. Uses a more clever technique than just hidden fields or captchas or other things that don't always work. Also lets you change the text/headings of the comment form. (We also have a free standalone version; take a look at www.FormSpammerTrap.com (that's the page that comment bots will see, but also contains all the info about the 'trap').

* **URL Smasher** : automatically shortens URLs on all URLs in pages/posts.

* **AmazoLinkenator** : adds your Amazon Affiliate ID to any Amazon product link in pages/posts/comments. It's your site, so use your Amazon Affiliate ID. 

All plugins are free and full-functioned. No premium features. Just search for them on the Add Plugins page.

== Screenshots ==

1. An example display of pictures from a multisite installation.  Shows the first site's pictures, along with the selection criteria on top. Captions and upload dates were selected. (Wasn't I a cute kid?)

== Changelog ==

= 1.20 (10 Feb 2017) =

* optimized the shortcode sanitation statement to ensure it was working on an array.
* added default blank values for shortcode parameters.
* above changes were to ensure that sites with error-reporting set to 'warning' on don't get errors about missing array values; prior version still works, but this ensures sites don't get the error message in the site error log.
* added information about our similar plugins (Multisite Post Display, Multisite Comment Display) on the Settings/Info page.

= 1.19 (8 Feb 2017) = 

* fixed but with page_init function - not needed

= 1.18 (18 Jan 2017) = 

* changed link for media to open in a new tab, rather than the same tab. This makes it easier to get back to the all-sites media gallery page, rather than multiple clicks of the 'previous screen' in the browser.
* added an empty H2 tag pair above the settings header area - that's where WP will put any status messages. This prevents any status messages from breaking into the settings screen.
* some minor text changes to the settings/info screen.
* verified OK in WP 4.71

= 1.17 (10 Jan 2017, 13 Jan 2017) = 

* fixed repository problem (I should carefully read the part where it tells me where to put the distribution files...)
* tested for WP 4.71

= 1.16 (9 Jan 2017) = 

* updated version for repository sync

= 1.15 (9 Jan 2017) =

* minor install issues fixed
* minor code efficiencies
* updated version to get plugin repository correct

= 1.14 (4 Jan 2017) =

* fixed info screen to have correct shortcode (was [mmd-edit], changed to [mmd_edit] )
* just in case, added the 'dash' version of the shortcode so it will work; docs will continue to show the 'underline' version.

= 1.13 (31 Dec 2016) =

* minor code efficiencies
* weird problem with 'plugin does not have a valid header' on initial first-time install. But it really did. This version seems to fix that, though.

= 1.12 (30 Dec 2016) =

* fixed punctuation of the "Showing" text if only one 'days' or 'items' parameter specified (there was a comma at the end, instead of a period).

= 1.11 (30 Dec 2016) =

* I borked the [mmd_edit] code in version 1.10. It's now un-borked.

= 1.10 (28 Dec 2016) =

* New optional parameters; separate the parameters with spaces. For parameters with 'yes' values, don't specify the parameter if you want the default parameter. All parameters in lower-case.
   * **days=4** show only the last 4 days (default all dates)
   * **items=10** show only the last 10 items (default all items)
   * **caption=yes** show caption under picture (default no)
   * **showdate=yes** show upload date under picture (default no) 

* Options for days/items will be shown above each site's grouping of pictures.
* Changes to the Settings/Info page to show new options, plus a 'plug' about our AmazoLinkenator plugin
* Added code to use wp_get_sites() (<4.6, deprecated) or get_sites (4.6+) using wp_version check.
* Date of picture is shown (upload date) under the caption.
* Added the site name to the text shown before each site's picture groupings.
* Code efficiencies (less jumping around into functions).
* Minor changes to displayed text (items count and days) above each subsite's grouping of pictures.
* Fixed borked links to the plugin's review and support pages on the Settings/Info page.
* Updated Readme file with some minor text fixes
* Fixed the initial release date in the Readme file from 27 Dec 2016 to 25 Dec 2016 (because the WordPress plugin approval team was much faster than I thought).
* Changed banner image used on the WP Plugin pages to uncover some text on the graphic.


= 1.00 (25 Dec 2016) =

* Initial Release (25 Dec 2016)
* Fixed the initial release date in the Readme file from '27 Dec 2016' to '25 Dec 2016' (because the WordPress plugin approval team was much faster than I thought).


== Upgrade Notice ==

= 1.20 (10 Feb 2017) =

* optimized the shortcode sanitation statement to ensure it was working on an array.
* added default blank values for shortcode parameters.
* above changes were to ensure that sites with error-reporting set to 'warning' on don't get errors about missing array values; prior version still works, but this ensures sites don't get the error message in the site error log.
* added information about our similar plugins (Multisite Post Display, Multisite Comment Display) on the Settings/Info page.

= 1.19 (8 Feb 2017) = 

* fixed but with page_init function - not needed

= 1.18 (18 Jan 2017) = 

* changed link for media to open in a new tab, rather than the same tab. This makes it easier to get back to the all-sites media gallery page, rather than multiple clicks of the 'previous screen' in the browser.
* added an empty H2 tag pair above the settings header area - that's where WP will put any status messages. This prevents any status messages from breaking into the settings screen.
* some minor text changes to the settings/info screen.
* verified OK in WP 4.71

= 1.17 (10 Jan 2017, 13 Jan 2017) = 

* fixed repository problem (I should carefully read the part where it tells me where to put the distribution files...)
* tested for WP 4.71

= 1.16 (9 Jan 2017) = 

* updated version for repository sync

= 1.15 (9 Jan 2017) =

* minor install issues fixed
* minor code efficiencies
* updated version to get plugin repository correct
= 1.14 (4 Jan 2017) =

* fixed info screen to have correct shortcode (was [mmd-edit], changed to [mmd_edit] )
* just in case, added the 'dash' version of the shortcode so it will work; docs will continue to show the 'underline' version.

= 1.13 (31 Dec 2016) =

* minor code efficiencies
* weird problem with 'plugin does not have a valid header' on initial first-time install. But it really did. This version seems to fix that, though.

= 1.12 (30 Dec 2016) =

* fixed punctuation of the "Showing" text if only one 'days' or 'items' parameter specified (there was a comma at the end, instead of a period).

= 1.11 (30 Dec 2016) =

* I borked the [mmd_edit] code in version 1.10. It's now un-borked.

= 1.10 (28 Dec 2016) =

* New optional parameters; separate the parameters with spaces. For parameters with 'yes' values, don't specify the parameter if you want the default parameter. All parameters in lower-case.
   * **days=4** show only the last 4 days (default all dates)
   * **items=10** show only the last 10 items (default all items)
   * **caption=yes** show caption under picture (default no)
   * **showdate=yes** show upload date under picture (default no) 

* Options for days/items will be shown above each site's grouping of pictures.
* Changes to the Settings/Info page to show new options, plus a 'plug' about our AmazoLinkenator plugin
* Added code to use wp_get_sites() (<4.6, deprecated) or get_sites (4.6+) using wp_version check.
* Date of picture is shown (upload date) under the caption.
* Added the site name to the text shown before each site's picture groupings.
* Code efficiencies (less jumping around into functions).
* Minor changes to displayed text (items count and days) above each subsite's grouping of pictures.
* Fixed borked links to the plugin's review and support pages on the Settings/Info page.
* Updated Readme file with some minor text fixes
* Fixed the initial release date in the Readme file from 27 Dec 2016 to 25 Dec 2016 (because the WordPress plugin approval team was much faster than I thought).
* Changed banner image used on the WP Plugin pages to uncover some text on the graphic.


= 1.00 (25 Dec 2016) =

* Initial Release (25 Dec 2016)
* Fixed the initial release date in the Readme file from '27 Dec 2016' to '25 Dec 2016' (because the WordPress plugin approval team was much faster than I thought).


