<?php
/*
Plugin Name: WP Permalauts
Plugin URI: http://permalauts.de/
Description: This plugin transforms the german umlauts into well-formed entities (needed ONLY for permalinks). It's based on o42-clean-umlauts.
Version: 1.0.2
Author: Christoph Grabo
Author URI: http://blogcraft.de/

This plugin transforms the german umlauts into well-formed entities (needed ONLY for permalinks). It's based on o42-clean-umlauts.

Replaces german umlauts in permalinks only! (All other sanitizing actions should be done natively by wordpress).
*/

$plugin_dir = basename(dirname(__FILE__));
load_plugin_textdomain( 'wp-permalauts', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );

function u8e($c){	return utf8_encode($c); }
function u8d($c){	return utf8_decode($c); }

$wpl_chartable = array(
	'perma'	=> array('ae'    ,'Ae'    ,'oe'    ,'Oe'    ,'ue'    ,'Ue'    ,'ss'     ),
	'raw'	  => array('ä'     ,'Ä'     ,'ö'     ,'Ö'     ,'ü'     ,'Ü'     ,'ß'      ),
	'in'	  => array(chr(228),chr(196),chr(246),chr(214),chr(252),chr(220),chr(223) ),
	'post'	=> array('&auml;','&Auml;','&ouml;','&Ouml;','&uuml;','&Uuml;','&szlig;'),
	'feed'	=> array('&#228;','&#196;','&#246;','&#214;','&#252;','&#220;','&#223;' ),
	'utf8'	=> array(u8e('ä'),u8e('Ä'),u8e('ö'),u8e('Ö'),u8e('ü'),u8e('Ü'),u8e('ß') )
);

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

    $slug = str_replace($wpl_chartable['raw'],  $wpl_chartable['perma'], $slug);
    $slug = str_replace($wpl_chartable['utf8'], $wpl_chartable['perma'], $slug);
    $slug = str_replace($wpl_chartable['in'],   $wpl_chartable['perma'], $slug);
    $slug = str_replace($wpl_chartable['post'], $wpl_chartable['perma'], $slug);

    return $slug;
}

function wpl_permalink_with_dashes($slug){
  $slug = wpl_permalink($slug);
  $slug = sanitize_title_with_dashes($slug);
  return $slug;
}

function wpl_restore_raw_title( $title, $raw_title="", $context="" ) {
	if ( $context == 'save' )
		return $raw_title;
	else
		return $title;
}

function wpl_options_page(){
  if (!current_user_can('manage_options'))  {
    wp_die( __('You do not have sufficient permissions to access this page.') );
  }
  ?><div class="wrap">
  <h2>Permalauts</h2>
  <div>
    <p>
      <strong><?php print __('Important!','wp-permalauts'); ?></strong>
      <?php print __('This plugin can only modify permalinks of new items. Old permalinks will never be re-sanitized! (You have to do this manually.)','wp-permalauts'); ?>
    </p>
  </div>
  <form method="post" action="options.php">

    <?php settings_fields('wpl_setting_options'); ?>
    <?php $options = wpl_options_validate( wpl_options_defaults( get_option('wpl_options') ) ); // pre validation and defaults ?>

      <table class="form-table">
        <tr valign="top">
          <th scope="row"><?php print __('What should be permalautized?','wp-permalauts'); ?></th>
          <td>
            <label><input name="wpl_options[clean_pp]" type="checkbox" value="1" <?php checked('1', $options['clean_pp']); ?> />
              <?php print __('Posts and Pages','wp-permalauts'); ?> </label>
            <br />
            <label><input name="wpl_options[clean_ct]" type="radio"  value="2" <?php checked('2', $options['clean_ct']); ?>>
              <?php print __('All Taxonomies','wp-permalauts'); ?> (<?php print __('including Categories','wp-permalauts'); ?>)</label>
            <br />
            <label><input name="wpl_options[clean_ct]" type="radio"  value="1" <?php checked('1', $options['clean_ct']); ?>>
              <?php print __('Categories only','wp-permalauts'); ?> </label>
            <br />
            <label><input name="wpl_options[clean_ct]" type="radio"  value="0" <?php checked('0', $options['clean_ct']); ?>>
              <?php print __('No Categories/Taxonomies','wp-permalauts'); ?></label>
          </td>
        </tr>
      </table>
  <p class="submit">
	<input type="submit" class="button-primary" value="<?php print __('Save Changes'); ?>" />
  </p>
  </form>
  </div><?php ;}

function wpl_options_menu(){
	$plugin_page = add_options_page( 'WP Permalauts', 'Permalauts', 'manage_options', __FILE__, 'wpl_options_page');
}
add_action('admin_menu', 'wpl_options_menu');

function wpl_options_defaults($input){
  $defaults = array( 'clean_pp' => 1, 'clean_ct' => 2 ); // pre defaults for unset values
  $output = array( 'clean_pp' => 0, 'clean_ct' => 0 ); // init with zeros

  $output['clean_pp'] = ( $input['clean_pp'] == 0 ? $defaults['clean_pp'] : $input['clean_pp'] );
  $output['clean_ct'] = ( $input['clean_ct'] == 0 ? $defaults['clean_ct'] : $input['clean_ct'] );

  return $output;
}
function wpl_options_validate($input){
  $input['clean_pp'] = ( $input['clean_pp'] == 1 ? 1 : -1 );
  $input['clean_ct'] = ( $input['clean_ct'] == 1 ? 1 : ( $input['clean_ct'] == 2 ? 2 : -1 ) ); // 2-cascade embedded-if (difficult to read?)
  return $input;
}

function wpl_options_init(){
    register_setting( 'wpl_setting_options', 'wpl_options', 'wpl_options_validate' );
}
add_action('admin_init', 'wpl_options_init' );

function add_settings_link($links, $file) {
  static $this_plugin;
  if (!$this_plugin) $this_plugin = plugin_basename(__FILE__);
  if ($file == $this_plugin){
    $settings_link = '<strong><a href="options-general.php?page=wp-permalauts/wp-permalauts.php"  style="color:#093;">'.__("Settings").'</a></strong>';
     array_unshift($links, $settings_link);
  }
  return $links;
}
add_filter('plugin_action_links', 'add_settings_link', 10, 2 );


$current_wpl_options = wpl_options_validate( wpl_options_defaults( get_option('wpl_options') ) );

if($current_wpl_options['clean_pp'] == 1) {
  remove_filter( 'sanitize_title', 'sanitize_title_with_dashes' );
  add_filter( 'sanitize_title', 'wpl_restore_raw_title', 9, 3 );
  add_filter( 'sanitize_title', 'wpl_permalink_with_dashes', 10);
};
if($current_wpl_options['clean_ct'] == 1) {
  remove_filter( 'sanitize_category', 'sanitize_title_with_dashes' );
  add_filter( 'sanitize_category', 'wpl_restore_raw_title', 9, 3 );
  add_filter( 'sanitize_category', 'wpl_permalink_with_dashes', 10);
};
if($current_wpl_options['clean_ct'] == 2) {
  remove_filter( 'sanitize_term', 'sanitize_title_with_dashes' );
  add_filter( 'sanitize_term', 'wpl_restore_raw_title', 9, 3 );
  add_filter( 'sanitize_term', 'wpl_permalink_with_dashes', 10);
};
?>
