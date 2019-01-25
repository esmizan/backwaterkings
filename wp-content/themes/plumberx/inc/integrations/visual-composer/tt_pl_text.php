<?php
if ( ! defined( 'ABSPATH' ) ) { die( '-1' ); }
/*
 * Templatation.com
 *
 * Simple text block for VC *
 */


function tt_pl_text_shortcode_fn_vc() {

	vc_map(
		array(
			"icon" => 'tt-vc-block',
			"name" => __("PB Content block", 'plumberx'),
			"base" => "tt_pl_text_shortcode",
			'description' => __( 'Text blocks (title, subtitle and content).', 'plumberx' ),
			"category" => __('Plumberx Theme', 'plumberx'),
			"params" => array(
				 
                array(
                    'type'        => 'textfield',
                    'heading'     => __( 'Title', 'plumberx' ),
                    'param_name'  => 'title',
                    'admin_label' => true,
                    'value'       => '',
                ),
                array(
                    'type'        => 'textfield',
                    'heading'     => __( 'Title size', 'plumberx' ),
					'description'     => __( 'Enter Title font size in px. eg 24 Note: please do not include px. Recommended: Leave blank.', 'plumberx' ),
                    'param_name'  => 'title_size',
                    'value'       => '',
                ),
                array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __("Title color",'plumberx'),
					"description" => __("Select title color if you want to modify default color.  Recommended: Leave blank.",'plumberx'),
					"param_name" => "title_color",
					"value" => "",
			    ),
			    array(
                    'type'        => 'textarea',
                    'heading'     => __( 'Subtitle', 'plumberx' ),
                    'param_name'  => 'subtitle',
                    'value'       => ''
                ),
                array(
                    'type'        => 'textfield',
                    'heading'     => __( 'Subtitle size', 'plumberx' ),
					'description'     => __( 'Enter Subtitle font size in px. eg 20 Note: please do not include px. Recommended: Leave blank.', 'plumberx' ),
                    'param_name'  => 'subtitle_size',
                    'value'       => '',
                ),
                array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __("Subtitle color",'plumberx'),
					"description" => __("Select subtitle color if you want to modify default color.  Recommended: Leave blank.",'plumberx'),
					"param_name" => "subtitle_color",
					"value" => ""
			    ),
			    array(
                    'type'        => 'textarea_html',
                    'heading'     => __( 'Description (optional)', 'plumberx' ),
                    'param_name'  => 'content',
                    'value'       => '',
                )
			)
		)
	);
	
}
add_action( 'vc_before_init', 'tt_pl_text_shortcode_fn_vc' );

if(class_exists('WPBakeryShortCode')) {
	class WPBakeryShortCode_tt_pl_text_shortcode extends WPBakeryShortCode {
	}
}