<?php
/*
Plugin Name: Multisite Media Display
Plugin URI: http://cellarweb.com/wordpress-plugins/
Description: Displays all subsite media, allows editing of media, accessed via shortcodes
Stable tag: 1.20 
Version: 1.20
Tested up to: 4.72
Author: Rick Hellewell - CellarWeb.com
Author URI: http://CellarWeb.com
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

*/

/*
Copyright (c) 2016-2017 by Rick Hellewell and CellarWeb.com
All Rights Reserved


This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

*/
// ----------------------------------------------------------------
// ----------------------------------------------------------------
global $mmd_version;
$mmd_version = "1.20 (10-Feb-2017)";
global $atts;		// used for the shortcode parameters

// Add settings link on plugin page
function mmd_settings_link($links) {
	$settings_link = '<a href="options-general.php?page=mmd_settings" title="Multisite Media Display">Multisite Media Display Info/Usage</a>' ;
	array_unshift($links, $settings_link) ;
	return $links ;
}
$plugin = plugin_basename(__FILE__) ;
add_filter("plugin_action_links_$plugin", 'mmd_settings_link') ;

//	build the class for all of this
class mmd_Settings_Page {
	
// start your engines!
	public function __construct() {
		add_action( 'admin_menu', array($this, 'mmd_add_plugin_page')) ;
	}
	
// add options page
	public function mmd_add_plugin_page() {
// This page will be under "Settings"
		add_options_page( 'Multisite Media Display Info/Usage', 'Multisite Media Display Info/Usage', 'manage_options', 'mmd_settings', array($this, 'mmd_create_admin_page')) ;
	}
	
// options page callback
	public function mmd_create_admin_page() {
	// Set class property
		$this->options = get_option('mmd_options') ;
	echo '<div class="wrap">';
	 mmd_info_top() ;
			mmd_info_bottom() ; 	// display bottom info stuff
		echo '</div>';
	}
	
// print the Section text
	public function mmd_print_section_info() {
		print '<h3><strong>Information about Multisite Media Display from CellarWeb.com</strong></h3>' ;
	}
}
// end of the class stuff
if ( is_admin()) {
	$my_settings_page = new mmd_Settings_Page() ;
	// ----------------------------------------------------------------------------
	// supporting functions
	// ----------------------------------------------------------------------------
	//	display the top info part of the page
	// ----------------------------------------------------------------------------
	function mmd_info_top() {
		global $mmd_version;
		?>

<div class="wrap" >
	<h2></h2>
	<!-- empty area for any WP status areas -->
	<hr />
	<div style="background-color:#9FE8FF;padding-left:15px;padding-bottom:10px;margin-bottom:15px;"> <br />
		<h1 align="center" style="font-size:300%"><strong>Multisite Media Display</strong></h1>
		<h3 align="center">Display/Edit All Multisite's Media on a Page or Post</h3>
		<p>Version <?php echo $mmd_version; ?></p>
	</div>
	<hr />
	<div style="padding-left:15px;>"

	<p><strong>Multisite Media Display</strong> allows you to use shortcodes to display all media in a multisite system. It will show all subsite's media on one screen, so you don't have to switch to each site to look at that site's media. This is great for monitoring all the media on all subsites. The plugin also works on standalone sites.</p>
	<p>You can also, if you are the super-admin, edit any subsite's media. Clicking on an image will open the Media editor screen, where you can rotate the picture or change attributes like the caption.</p>
	<p>Pictures are displayed in rows of 2-4 pictures, depending on your post/page theme. If you want to exclude a picture from the display, set that picture's caption to 'noshow'.</p>
	<h3><strong>Media is displayed on post or page via a shortcode</strong></h3>
	<ul style="list-style-type: disc; list-style-position: inside;padding-left:12px;">
		<li>Use <strong>[mmd_display]</strong> to display pictures (no editing). This shortcode can be used by sub-sites to display only their media.</li>
		<li>Use <strong>[mmd_edit]</strong> to edit pictures (only SuperAdmin users). This is best used on the main site, on a private page. Non-SuperAdmin users will not see any pictures.</li>
		<li>For pictures you don't want to display, put <strong>noshow</strong> in the caption of the picture.</li>
		<li>Optional parameters allow display of caption and upload date of the picture under the picture. (as of version 1.10)</li>
	</ul>
	<h3>There are shortcode options/parameters for:</h3>
	<ul style="list-style-type: disc; list-style-position: inside;padding-left:12px;">
		<li><strong>days=4</strong> show only the last 4 days (default all dates, option used will be shown above each sites' picture group.)</li>
		<li><strong>items=10</strong> show only the last 10 items (default all items, option used will be shown above each sites' picture group.)</li>
		<li><strong>caption=yes</strong> show caption under picture (default no)</li>
		<li><strong>showdate=yes</strong> show upload date under picture (default no) </li>
	</ul>
	<p>The parameters can be combined, as in <strong>[mmd_display days=4 items=10]</strong> or <strong>[mmd_edit days=5 items=10]</strong>. The days and items options will be shown above the pictures: 'Showing last 4 days, last 10 pictures.' All parameters should be in lower-case.</p>
	<hr />
	<p><strong>Known Issue</strong>: when you 'x' out of the Media editing screen, you are returned to the Admin Media screen for that subsite. Since the 1.18 version opens up the Media editing screen in a new tab, just close that tab and return back to the display of pictures. Refresh the page to show current version of all pictures. </p>
</div>
<hr />
<p><strong>Tell us how the Multisite Media Display plugin works for you - leave a <a href="https://wordpress.org/support/view/plugin-reviews/multisite-media-display" title="Multisite Media Display Reviews" target="_blank" >review or rating</a> on our plugin page.&nbsp;&nbsp;&nbsp;<a href="https://wordpress.org/support/plugin/multisite-media-display" title="Help or Questions" target="_blank">Get Help or Ask Questions here</a>.</strong></p>
<hr />
<div style="background-color:#9FE8FF;padding:3px 8px 3px 8px;">
	<p><strong>Interested in a plugin that will automatically add your Amazon Affiliate code to any Amazon links?&nbsp;&nbsp;&nbsp;Check out our nifty <a href="https://wordpress.org/plugins/amazolinkenator/" target="_blank">AmazoLinkenator</a>!&nbsp;&nbsp;It will probably increase your Amazon Affiliate revenue!</strong></p>
	<p>How about <strong><a href="https://wordpress.org/plugins/multisite-comment-display/" target="_blank">Multisite Comment Display</a></strong> to show all comments from all subsites? Or <strong><a href="https://wordpress.org/plugins/multisite-post-reader/" target="_blank">Multisite Post Reader</a></strong> to show all posts from all subsites? Or our <strong>U<a href="https://wordpress.org/plugins/url-smasher/" target="_blank">RL Smasher</a></strong> which automatically shortens URLs in pages/posts/comments? Just search for them in the Add Plugins screen - <strong>they are all free and fully featured!</strong></p>
</div>
<?php
	}
	
	// ----------------------------------------------------------------------------
	// display the copyright info part of the admin  page
	// ----------------------------------------------------------------------------
	function mmd_info_bottom() {
	// print copyright with current year, never needs updating
		$xstartyear = "2016" ;
		$xname = "Rick Hellewell" ;
		$xcompanylink1 = ' <a href="http://CellarWeb.com" title="CellarWeb" >CellarWeb.com</a>' ;
		echo '<hr><div style="background-color:#9FE8FF;padding-left:15px;padding:10px 0 10px 0;margin:15px 0 15px 0;">
<p align="center">Copyright &copy; ' . $xstartyear . '  - ' . date("Y") . ' by ' . $xname . ' and ' . $xcompanylink1 ;
		echo ' , All Rights Reserved. Released under GPL2 license.</p></div><hr>' ;
		return ;
	}
	// end  copyright ---------------------------------------------------------
	
	// ----------------------------------------------------------------------------
	// ``end of admin area
	//here's the closing bracket for the is_admin thing
}
	// ----------------------------------------------------------------------------

	// register/deregister/uninstall hooks
	
	register_activation_hook( __FILE__, 'mmd_register' );
	register_deactivation_hook( __FILE__, 'mmd_deregister' );
	register_uninstall_hook(__FILE__, 'mmd_uninstall');	
	
	// register/deregister/uninstall options (even though there aren't options)
	function mmd_register() {
		return;
	}
	function mmd_deregister() {
		return;
	}
	
	function mmd_uninstall() {
	return;
	}
	//  ----------------------------------------------------------------------------
	// set up shortcodes
	
	function mmd_shortcodes_init()
		{
			add_shortcode('mmd_display', 'mmd_media_display');
			add_shortcode('mmd-display', 'mmd_media_display');
			add_shortcode('mmd_edit', 'mmd_media_edit');
			add_shortcode('mmd-edit', 'mmd_media_edit');
		}
	
	add_action('init', 'mmd_shortcodes_init');

	// ----------------------------------------------------------------------------
	// here's where we do the work!
	// ----------------------------------------------------------------------------

	function mmd_media_display($atts = array()) {
		if (! empty($atts)) {
			$atts = array_map('sanitize_text_field', $atts);
		}
		// set up default $atts values for sites that have error-reporting on
		if (! isset($atts[items])) { $atts[items] = "";}
		if (! isset($atts[days])) { $atts[days] = "";}
		if (! isset($atts[caption])) { $atts[caption] = "";}
		if (! isset($atts[showdate])) { $atts[showdate] = "";}

		if (is_array($atts)) {
			echo "<hr>" ;
			if(($atts[days])) {echo "Last $atts[days] day"; }
			if (count($atts[items]) > 1) {echo "s. ";} else {echo ".";}
			if (($atts[items])) {echo "Last $atts[items] pictures."; }
		}
		// display only multisite media 
		add_action('wp_enqueue_style', 'mmd_site_gallery_css'); 	// properly adds the css code in the above function
		mmd_get_sites_array($atts); 		// get the sites array, and loop through them in that function
		return;
	}
	
	function mmd_media_edit($atts = array()) {
		if (! is_super_admin()) {
			echo "<hr><strong>Sorry, you are not authorized to view this page.</strong><hr>";
			return;
		}
		// set up default $atts values for sites that have error-reporting on
			$atts = array_map('sanitize_text_field', $atts);
		if (! isset($atts[items])) { $atts[items] = "";}
		if (! isset($atts[days])) { $atts[days] = "";}
		if (! isset($atts[caption])) { $atts[caption] = "";}
		if (! isset($atts[showdate])) { $atts[showdate] = "";}

		if (is_array($atts)) {
			echo "<hr>" ;
			if(($atts[days])) {echo "Last $atts[days] day"; }
			if (count($atts[items]) > 1) {echo "s. ";} else {echo ".";}
			if (($atts[items])) {echo "Last $atts[items] pictures."; }
		}
		// these scripts to support media page edit mode
		// 	- per http://wordpress.stackexchange.com/questions/29735/how-to-link-to-the-image-editors-edit-image-function
		wp_enqueue_script( 'wp-ajax-response' );
		wp_enqueue_script('image-edit');
		wp_enqueue_style('imgareaselect');
		mmd_get_sites_array($atts,1); 		// get the sites array, and loop through them in that function
		return;
	}
	
// ---------------------------------------------------------------------------------------------------------
// show media on all multisite sub-sites. click an image to get into the media edit screen; only for super-admins

// ===============================================================================
//	functions to display all media files
// ===============================================================================
/*
	 Styles and code 'functionated' for displaying all media files 
		adapted from http://alijafarian.com/responsive-image-grids-using-css/
		*/	
// --------------------------------------------------------------------------------
// need to adjust for wp_get_sites deprecated in 4.6 for get_sites
function mmd_get_sites_array($atts, $xedit=0) {
	// needed since wp_get_sites deprecated as of 4.6+, but can't use replacement get_sites in < 4.6
	global $wp_version;

	// WordPress 4.6
	if ( $wp_version >= 4.6 ) {		// instead of looking for deprecated functions that might still exist
		$subsites_object = get_sites();
		$subsites = objectToArray($subsites_object);
		foreach( $subsites as $subsite ) {
			  $subsite_id = $subsite ["blog_id"];
			  $subsite_name = get_blog_details($subsite_id)->blogname;
			  $subsite_path = $subsite[path];
			  $subsite_domain = $subsite[domain];
			switch_to_blog( $subsite_id );
			echo "<hr>Site:<strong> $subsite_id - $subsite_name</strong> ;   Path: <strong>$subsite_path</strong><hr>";
			$xsiteurl = $subsite_domain . $subsite_path;
			mmd_site_gallery_getpix($xedit, $xsiteurl, $atts);	// '1' parameter to allow edit; second parameter for the site id
			restore_current_blog();
		}
	}
if ( $wp_version <= 4.5 ) {		// WordPress < 4.6
		$sites = wp_get_sites();
		
		// and this is how we loop through blogs with <4.6
		foreach ( $sites as $site ) {
			switch_to_blog( $site['blog_id'] );
			//mmd_blog_loop($site);
			echo "<hr>Site:<strong> $site[blog_id]</strong> ;   Path: <strong>$site[path]</strong><hr>";
			$xsiteurl = $site[domain] . $site[path];
			mmd_site_gallery_getpix($xedit, $xsiteurl, $atts);	// '1' parameter to allow edit; second parameter for the site id
			restore_current_blog();
		}
	}
		
return ;		// return empty array due to fail
}
// ---------------------------------------------------------------------------------------------------------
//	 list all media on all multisite sites
// 		inspired by https://wisdmlabs.com/blog/how-to-list-posts-from-all-blogs-on-wordpress-multisite/
/* -----------------------------------------------------------------*/
// display pictures of current site
//	 - media with 'noshow' in caption are not displayed

function mmd_site_gallery_getpix($xedit=0, $xsiteurl="", $atts = "") {
	global $post;
	//global $atts;
	$items = $atts[items];
	$days = $atts[days];
	mmd_site_gallery_css() ;  
	if ($days) {$daystring = "$days days ago";}		// optional parameter
	$list = array();
	$media_query = new WP_Query(
		array(
			'post_type' => 'attachment',
			'post_status' => 'inherit',
			'posts_per_page' => -1,
			'post_mime_type' => 'image',
			'date_query' => (isset($daystring) ? array(array('after' => $daystring,  // or '-2 days'
				'inclusive' => true,)) : null),
			'posts_per_page' =>(isset($items) ?  $items : null),
		)
	);
	// uncomment this if you want to see the SQL statement
	// echo "SQL = " . $media_query->request;
	// end uncomment area
	foreach ($media_query->posts as $post) {
		$list[] = array('the_url' => wp_get_attachment_url($post->ID), 'the_post_id' => $post->ID);
	}
	echo ' <ul class="ml_gallery_list_items">';		// start unordered list
	// loop through the array to output the listitem ($list array) for each picture	
	foreach ($list as $item) {
		$metadata =  wp_get_attachment_metadata( $item['the_post_id'], $unfiltered );
		$pix_meta = wp_prepare_attachment_for_js( $item[the_post_id]);
		$caption = $pix_meta['caption'];
		$pixdate = $pix_meta['dateFormatted'];	// key is case-sensitive
		if ( $caption !== 'noshow') {
			echo "<li >";
			if ($xedit) {// add HREF if used for editing media
				echo "<a href=\"//" . $xsiteurl . "wp-admin/upload.php?item=$pix_meta[id]\" target=\"_blank\">";
				 }
				echo "<img src=\"$item[the_url]\"  width='250px' />";
				if ($atts[caption]) {
					echo "<br><div align='center'>$caption</div>";
				}
				if ($atts[showdate]) {
					echo "<br><div align='center'>$pixdate</div>";
				}
			if ($xedit) {echo "</a>";} // close the HREF if necessary
			echo "</li>";
		}
	}
	echo "</ul>";	// close the unordered list
	
return;
}

// ---------------------------------------------------------------------------------------------------------
function objectToArray ($object) {		// convert object to array, required for get_sites() loop
		if(!is_object($object) && !is_array($object)) return $object;

return array_map('objectToArray', (array) $object);
}
// ---------------------------------------------------------------------------------------------------------
// CSS code 'functionated'
		
function mmd_site_gallery_css() {
?>
<style type="text/css">
.entry-content ul li {	/* gets rid of default bullet */
	list-style-type: none !important;
	background: rgba(0,0,0,0) !important;
}
ul.ml_gallery_list_items {
	list-style: none;
	font-size: 0px;
	margin-left: -2.5%;	/* should match li left margin */
}
ul.ml_gallery_list_items li {
	display: inline-block;
	padding: 10px;
	margin: 0 0 2.5% 2.5%;
	background: #fff;
	border: 1px solid #ddd;
	font-size: 16px;
	font-size: 1rem;
	vertical-align: top;
	box-shadow: 0 0 5px #ddd;
	box-sizing: border-box;
	-moz-box-sizing: border-box;
	-webkit-box-sizing: border-box;
}
ul.ml_gallery_list_items li img {
	max-width: 100%;
	height: auto;
	margin: 0 0 10px;
}
ul.ml_gallery_list_items li h3 {
	margin: 0 0 5px;
}
ul.ml_gallery_list_items li p {
	font-size: .9em;
	line-height: 1.5em;
	color: #999;
}
/* class for 2 columns */
ul.ml_gallery_list_items.columns-2 li {
	width: 47.5%;	/* this value + 2.5 should = 50% */
}
/* class for 3 columns */
ul.ml_gallery_list_items.columns-3 li {
	width: 30.83%;	/* this value + 2.5 should = 33% */
}
/* class for 4 columns */
ul.ml_gallery_list_items.columns-4 li {
	width: 22.5%;	/* this value + 2.5 should = 25% */
}
 @media (max-width: 480px) {
ul.grid-nav li {
	display: block;
	margin: 0 0 5px;
}
ul.grid-nav li a {
	display: block;
}
ul.ml_gallery_list_items {
	margin-left: 0;
}
ul.ml_gallery_list_items li {
	width: 100% !important;		/* over-ride all li styles */
	margin: 0 0 20px;
}
}
</style>
<?
	return;
	}


// ===============================================================================
//	end functions to display all media files
// ===============================================================================

// ----------------------------------------------------------------------------
// debugging function to show array values nicely formatted
function mmd_show_array( $xarray = array()) {
	echo "<pre>"; print_r($xarray);echo "</pre>";
	return;
}

// ----------------------------------------------------------------------------
// all done!
// ----------------------------------------------------------------------------


