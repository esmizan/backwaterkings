<?php
if ( ! defined( 'ABSPATH' ) ) { die( '-1' ); }
/*
 * Templatation.com
 *
 * VC integration
 *
 */

// Set VC as theme.
if( function_exists('vc_set_as_theme') ){
	function tt_temptt_vcAsTheme() {
	vc_set_as_theme(true);
	global $vc_manager;
	$vc_manager->setIsAsTheme();
	$vc_manager->disableUpdater();
	$vc_manager->setEditorDefaultPostTypes( array( 'page', 'service', 'project' ) );
	$vc_manager->automapper()->setDisabled();
	}
	add_action( 'vc_before_init', 'tt_temptt_vcAsTheme' );
}

// Initialize VC modules.

//include( get_template_directory() . '/inc/integrations/visual-composer/tt_pl_tabs.php');
//include( get_template_directory() . '/inc/integrations/visual-composer/tt_pl_team.php');
include( get_template_directory() . '/inc/integrations/visual-composer/tt_pl_list.php');
include( get_template_directory() . '/inc/integrations/visual-composer/tt_pl_gmap.php');
include( get_template_directory() . '/inc/integrations/visual-composer/tt_pl_imgicon_block.php');
include( get_template_directory() . '/inc/integrations/visual-composer/tt_pl_text.php');
include( get_template_directory() . '/inc/integrations/visual-composer/tt_pl_button.php');
include( get_template_directory() . '/inc/integrations/visual-composer/tt_pl_accordion.php');
include( get_template_directory() . '/inc/integrations/visual-composer/tt_pl_banner.php');
