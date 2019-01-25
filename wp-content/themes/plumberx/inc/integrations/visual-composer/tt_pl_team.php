<?php
if ( ! defined( 'ABSPATH' ) ) { die( '-1' ); }
/*
 * Templatation.com
 *
 * Team for VC
 *
 */


function tt_pl_team_shortcode_fn_vc() {

	vc_map(
		array(
			"icon" => 'tt-vc-block',
			"name" => __("PB Modified Team", 'plumberx'),
			"base" => "tt_pl_team_shortcode",
			'description' => __( 'Team member block.', 'plumberx' ),
			"category" => __('Plumberx Theme', 'plumberx'),
			"params" => array(
				
                array(
                    'type' => 'attach_image',
                    'heading' => __( 'Team member image', 'plumberx' ),
                    'param_name' => 'image',
                    'value' => '',
                    'description' => __( 'Select image from media library.', 'plumberx' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => __( 'Name', 'plumberx' ),
                    'param_name' => 'name',
                    'value' => '',
                    'admin_label' => true,
                    'description' => __( 'Team member name.', 'plumberx' )
                ),
                array(
                    'type' => 'textfield',
                    'heading' => __( 'Position', 'plumberx' ),
                    'param_name' => 'position',
                    'value' => '',
                    'description' => __( 'Team member position.', 'plumberx' )
                ),
                array(
                    'type'        => 'textfield',
                    'heading'     => __( 'Facebook', 'plumberx' ),
                    'param_name'  => 'social_fb',
                    'value'       => '',
                    'description' => __( 'Enter facebook social link url.', 'plumberx' ),
                    'group'       => 'Social URL'
                ),

                array(
                    'type'        => 'textfield',
                    'heading'     => __( 'Linkedin', 'plumberx' ),
                    'param_name'  => 'social_li',
                    'value'       => '',
                    'description' => __( 'Enter linkedin social link url.', 'plumberx' ),
                    'group'       => 'Social URL'
                ),

                array(
                    'type'        => 'textfield',
                    'heading'     => __( 'Twitter', 'plumberx' ),
                    'param_name'  => 'social_tw',
                    'value'       => '',
                    'description' => __( 'Enter twitter social link url.', 'plumberx' ),
                    'group'       => 'Social URL'
                ),

                array(
                    'type'        => 'textfield',
                    'heading'     => __( 'Google', 'plumberx' ),
                    'param_name'  => 'social_google',
                    'value'       => '',
                    'description' => __( 'Enter google social link url.', 'plumberx' ),
                    'group'       => 'Social URL'
                ),
                 
			)
		)
	);
	
}
add_action( 'vc_before_init', 'tt_pl_team_shortcode_fn_vc' );

if(class_exists('WPBakeryShortCode')) {
	class WPBakeryShortCode_tt_pl_team_shortcode extends WPBakeryShortCode {
	}
}