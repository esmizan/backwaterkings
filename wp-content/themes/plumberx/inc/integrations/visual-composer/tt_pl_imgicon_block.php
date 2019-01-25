<?php
if ( ! defined( 'ABSPATH' ) ) { die( '-1' ); }
/*
 * Templatation.com
 *
 * Block with icon on top for VC
 *
 */


function tt_pl_icon_block_shortcode_fn_vc() {

	vc_map(
		array(
			"icon" => 'tt-vc-block',
			"name" => __("PB Block with image icon", 'plumberx'),
			"base" => "tt_pl_imgicon_block_shortcode",
			'description' => __( 'Block with icon (using image as icon).', 'plumberx' ),
			"category" => __('Plumberx Theme', 'plumberx'),
			"params" => array(
				array(
                    'type' => 'attach_image',
                    'heading' => __( 'Image icon', 'plumberx' ),
                    'param_name' => 'image',
                    'value' => '',
                    'description' => __( 'Please select image icon. Or select icon below.', 'plumberx' ),
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
                    'description' => __( 'Select icon from library. Leave it blank if you uploaded image icon above.', 'plumberx' )
                ),
                array(
                    'type'        => 'textfield',
                    'heading'     => __( 'Block title', 'plumberx' ),
                    'param_name'  => 'title',
                    'value'       => '',
                    'admin_label' => true,
                ),
                
				array(
					"type" => "textarea",
					"class" => "",
					"heading" => __("Content",'plumberx'),
					"param_name" => "desc1",
					"value" => "",
			    )
			)
		)
	);
	
}
add_action( 'vc_before_init', 'tt_pl_icon_block_shortcode_fn_vc' );

if(class_exists('WPBakeryShortCode')) {
	class WPBakeryShortCode_tt_pl_imgicon_block_shortcode extends WPBakeryShortCode {
	}
}