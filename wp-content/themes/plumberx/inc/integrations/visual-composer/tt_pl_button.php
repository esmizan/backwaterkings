<?php
if ( ! defined( 'ABSPATH' ) ) { die( '-1' ); }
/*
 * Templatation.com
 *
 * Button for VC *
 */


function tt_pl_button_shortcode_fn_vc() {

	vc_map(
		array(
			"icon" => 'tt-vc-block',
			"name" => __("PB Button", 'plumberx'),
			"base" => "tt_pl_button_shortcode",
			'description' => __( 'Special Button for this theme', 'plumberx' ),
			"category" => __('Plumberx Theme', 'plumberx'),
			"params" => array(
                array(
                    'type'        => 'textfield',
                    'heading'     => __( 'Text on button', 'plumberx' ),
                    'param_name'  => 'title',
                    'admin_label' => true,
                    'value'       => '',
                ),

                array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __("Button text color",'plumberx'),
					"param_name" => "txt_color",
					"value" => "",
			    ),

			    array(
                    'type'        => 'textfield',
                    'heading'     => __( 'Button link', 'plumberx' ),
                    'param_name'  => 'b_link',
                    'value'       => '',
                ),
                array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __("Button background color",'plumberx'),
					"param_name" => "bg_color",
					"value" => "",
			    ),
			    array(
                    'type' => 'iconpicker',
                    'heading' => __( 'Icon', 'plumberx' ),
                    'param_name' => 'icon',
                    'value' => '', 
                    'settings' => array(
                        'emptyIcon' => true,
                        'iconsPerPage' => 300,
                    ),
                    'description' => __( 'Select icon from library.', 'plumberx' )
                ),
			)
		)
	);
	
}
add_action( 'vc_before_init', 'tt_pl_button_shortcode_fn_vc' );

if(class_exists('WPBakeryShortCode')) {
	class WPBakeryShortCode_tt_pl_button_shortcode extends WPBakeryShortCode {
	}
}