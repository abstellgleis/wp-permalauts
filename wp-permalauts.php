<?php
/*
Plugin Name: WP-Permalauts
Plugin URI: http://blogcraft.de/wordpress-plugins/wp-permalauts/
Description: This plugin is base on o42-clean-umlauts. It transform the german umlauts into well-formed entities (especially for permalinks).
Version: 0.1
Author: Christoph Grabo
Author URI: http://blogcraft.de/

This plugin is based on o42-clean-umlauts. It transform the german umlauts into well-formed letters (especially for permalinks).

*/

#helper
function u8e($c){
	return utf8_encode($c);
} #u8e
function u8d($c){
	return utf8_decode($c);
} #u8d
					
$wpl_chartable = array(
	'raw'	=> array('ä'     ,'Ä'     ,'ö'     ,'Ö'     ,'ü'     ,'Ü'     ,'ß'      ,'—'      ,'–'      ,'---'    ,'--'     ),
	'in'	=> array(chr(228),chr(196),chr(246),chr(214),chr(252),chr(220),chr(223) ,chr(8212),chr(8211),'---'    ,'--'     ),
	'perma'	=> array('ae'    ,'Ae'    ,'oe'    ,'Oe'    ,'ue'    ,'Ue'    ,'ss'     ,'---'     ,'--'    ,'---'    ,'--'     ),
	'post'	=> array('&auml;','&Auml;','&ouml;','&Ouml;','&uuml;','&Uuml;','&szlig;','&mdash;','&ndash;','&mdash;','&ndash;'),
	'feed'	=> array('&#228;','&#196;','&#246;','&#214;','&#252;','&#220;','&#223;' ,'&#8212;','&#8211;','&#8212;','&#8211;'),
	'utf8'	=> array(u8e('ä'),u8e('Ä'),u8e('ö'),u8e('Ö'),u8e('ü'),u8e('Ü'),u8e('ß') ,u8e('—') ,u8e('–') ,u8e('—') ,u8e('–') )
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


#add_filter ( 'hook_name', 'your_filter', [priority], [accepted_args] );

remove_filter( 'sanitize_title', 'sanitize_title_with_dashes' );
add_filter(    'sanitize_title', 'wpl_permalink'              );

add_filter('the_excerpt',		'wpl_content');
add_filter('the_excerpt_rss',	'wpl_content');
add_filter('the_content',		'wpl_content');
add_filter('the_title_rss',		'wpl_content');
add_filter('the_title',			'wpl_content');
add_filter('comment_text_rss',	'wpl_content');
add_filter('comment_text',		'wpl_content');


?>
