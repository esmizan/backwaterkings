<?php
/*
Plugin Name: Plumberx Demo Importer
Plugin URI: http://templatation.com/
Author: Templatation
Author URI: http://templatation.com/
Version: 1.0
Description: Adds a feature to import Plumberx theme demo in Appearance > Theme setup wizard. Disable/delete from live site please.
Text Domain: templatation
*/

// Define Constants
defined('TT_ROOT_TEMPTT')		or define('TT_ROOT_TEMPTT', dirname(__FILE__));

$tt_temptt_theme = wp_get_theme();
$tt_temptt_currtheme = strtolower( preg_replace( '#[^a-zA-Z]#', '', $tt_temptt_theme->get( 'Name' ) ) );
if( strpos($tt_temptt_currtheme,'child') ) {
    $tt_temptt_currtheme = strtolower( preg_replace( '#[^a-zA-Z]#', '', $tt_temptt_theme->get( 'Template' ) ) );
}
// Only do stuff if correct theme is activated.
if( 'plumberx' == $tt_temptt_currtheme ) {

    require_once TT_ROOT_TEMPTT .'/inc/envato_setup/envato_setup.php';
    require_once TT_ROOT_TEMPTT .'/inc/envato_setup/envato_setup_init.php';

}