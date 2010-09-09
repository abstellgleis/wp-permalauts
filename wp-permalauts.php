<?php
/*
Plugin Name: WP-Permalauts
Plugin URI: http://blogcraft.de/wordpress-plugins/wp-permalauts/
Description: This plugin transforms the german umlauts into well-formed entities (needed ONLY for permalinks). It's based on o42-clean-umlauts.
Version: 0.4.1
Author: Christoph Grabo
Author URI: http://blogcraft.de/

This plugin transforms the german umlauts into well-formed entities (needed ONLY for permalinks). It's based on o42-clean-umlauts.

Replaces german umlauts in permalinks only! (All other sanitizing actions should be done natively by wordpress).

*/

$WPL_VERSION = "0.4.1";

#helper
function u8e($c){
	return utf8_encode($c);
} #u8e
function u8d($c){
	return utf8_decode($c);
} #u8d
					
$wpl_chartable = array(
	'raw'	=> array('ä'     ,'Ä'     ,'ö'     ,'Ö'     ,'ü'     ,'Ü'     ,'ß'      ),
	'in'	=> array(chr(228),chr(196),chr(246),chr(214),chr(252),chr(220),chr(223) ),
	'perma'	=> array('ae'    ,'Ae'    ,'oe'    ,'Oe'    ,'ue'    ,'Ue'    ,'ss'     ),
	'post'	=> array('&auml;','&Auml;','&ouml;','&Ouml;','&uuml;','&Uuml;','&szlig;'),
	'feed'	=> array('&#228;','&#196;','&#246;','&#214;','&#252;','&#220;','&#223;' ),
	'utf8'	=> array(u8e('ä'),u8e('Ä'),u8e('ö'),u8e('Ö'),u8e('ü'),u8e('Ü'),u8e('ß') )
); #chartable

# the dashes won't be converted so far, but leave them here as an example

function wpl_permalink($slug){
	global $wpl_chartable;
	
    if (seems_utf8($slug)) {
	$invalid_latin_chars = array(
		chr(197).chr(146) => 'OE',
		chr(197).chr(147) => 'oe',
		chr(197).chr(160) => 'S',
		chr(197).chr(189) => 'Z',
		chr(197).chr(161) => 's',
		chr(197).chr(190) => 'z',
		chr(226).chr(130).chr(172) => 'E');
	$slug = u8d(strtr($slug, $invalid_latin_chars));
    }
    
    $slug = str_replace($wpl_chartable['raw'], $wpl_chartable['perma'], $slug);
    $slug = str_replace($wpl_chartable['in'], $wpl_chartable['perma'], $slug);
    
	$slug = sanitize_title_with_dashes($slug);
	
    return $slug;
} #wpl_permalink

function wpl_content($content){
	global $wpl_chartable;
	
    if (strtoupper(get_option('blog_charset')) == 'UTF-8') {
	$content = str_replace($wpl_chartable['utf8'], $wpl_chartable['feed'], $content);
    }
	
    $content = str_replace($wpl_chartable['raw'], $wpl_chartable['feed'], $content);
    $content = str_replace($wpl_chartable['in'], $wpl_chartable['feed'], $content);

    return $content;
} #wpl_content

function wpl_footer(){
	/* because this plugin is free and open source, be so patient and let the small footer text - thank you! */
	$s = base64_decode("
PGRpdiBpZD0id3BsZm9vdGVyIj5UaGlzIGJsb2cgdXNlcyA8YSBocmVmPSJodHRwOi8vYmxvZ2Ny
YWZ0LmRlL3dvcmRwcmVzcy1wbHVnaW5zL3dwLXBlcm1hbGF1dHMvIj5XUCBQZXJtYWxhdXRzPC9h
PiAoY2xlYW4gZ2VybWFuIHVtbGF1dHMgaW4gcGVybWFsaW5rcykuIFNwZWNpYWw6IEl0J3MgdGhl
IDxzdHJvbmc+PGEgaHJlZj0iaHR0cDovL21hbm5hei5jYy9wL3JldmllcnBob25lLyIgdGl0bGU9
InJlVmllcnBob25lIj5yZVZpZXJwaG9uZTwvYT4gRWRpdGlvbiE8L3N0cm9uZz48L2Rpdj4=
");
	echo $s;
}
function wpl_header(){
	/* because this plugin is free and open source, be so patient and let the small footer text - thank you! */
	$s = '<style type="text/css">#wplfooter { text-align: center; }</style>';
	echo $s;
}

function wpl_options(){
  if (!current_user_can('manage_options'))  {
    wp_die( __('You do not have sufficient permissions to access this page.') );
  };

  ?><div class="wrap">
  <h2>WP PermaLauts</h2>
  <form method="post" action="options.php">
  <?php wp_nonce_field('update-options'); ?>
	<table class="form-table">
	<tr valign="top">
		<th scope="row">Show or hide footer text of PermaLauts</th>
		<td>
		  <select name="wpl_show_footer">
				<option value="true" <?php if (get_option('wpl_show_footer') == 'true') print "selected"; ?>>Add footer text</option>
				<option value="false" <?php if (get_option('wpl_show_footer') == 'false') print "selected"; ?>>Hide footer text</option>
		  </select>
			  Leaving footer in your blog supports the developer of free software! Show your love!
		</td>
	</tr>
	</table>
	  <input type="hidden" name="action" value="update" />
	  <input type="hidden" name="page_options" value="wpl_show_footer" />
  <p class="submit">
	<input type="submit" class="button-primary" value="<?php _e('Save Changes'); ?>" />
  </p>
  </form>
  </div><?php
  ;
}

function wpl_options_menu(){
	add_options_page( 'WP-PermaLauts', 'WP-PermaLauts', 8, __FILE__, 'wpl_options');
}
add_action('admin_menu', 'wpl_options_menu');

remove_filter( 'sanitize_title', 'sanitize_title_with_dashes' );
add_filter(    'sanitize_title', 'wpl_permalink'              );

/*** normally not needed! (we only want to clean the permalink of posts)
add_filter('the_title_rss',		'wpl_content');
add_filter('the_title',			'wpl_content');
add_filter('the_excerpt',		'wpl_content');
add_filter('the_excerpt_rss',	'wpl_content');
add_filter('the_content',		'wpl_content');
add_filter('comment_text_rss',	'wpl_content');
add_filter('comment_text',		'wpl_content');
***/

if(get_option("wpl_show_footer") != "false") {	
	add_action('wp_head', 'wpl_header');
	add_action('wp_footer', 'wpl_footer',99);
}

?>
