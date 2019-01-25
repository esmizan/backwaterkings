<?php
if ( ! defined( 'ABSPATH' ) ) { die( '-1' ); }
/*
 * Templatation.com
 *
 *Image with info for VC
 *
 */


function tt_pl_map_shortcode_fn_vc() {

	vc_map(
		array(
			"icon" => 'tt-vc-block',
			"name" => esc_html__("PB Google map", 'plumberx'),
			"base" => "tt_pl_map_shortcode",
			'description' => esc_html__( 'Google map (with marker).', 'plumberx' ),
            "category" => __('Plumberx Theme', 'plumberx'),
			"params" => array(

	            array(
	                'type'        => 'textfield',
	                'heading'     => esc_html__( 'Latitude', 'plumberx' ),
	                'description'     => esc_html__( 'Google map Latitude', 'plumberx' ),
	                'param_name'  => 'latitude',
	                'value'       => '-37.812802'
	            ),

	            array(
	                'type'        => 'textfield',
	                'heading'     => esc_html__( 'Longitude', 'plumberx' ),
	                'description'     => esc_html__( 'Google map Longitude', 'plumberx' ),
	                'param_name'  => 'longitude',
	                'value'       => '144.956981'
	            ),
/*
				 array(
                    'type' => 'attach_image',
                    'heading' => esc_html__( 'Custom Marker Image', 'plumberx' ),
                    'param_name' => 'image',
                    'value' => '',
                    'description' => esc_html__( 'Leave empty for default marker image.', 'plumberx' ),
                ),*/

	            array(
	                'type'        => 'textfield',
	                'heading'     => esc_html__( 'Map zoom', 'plumberx' ),
	                'param_name'  => 'zoom',
	                'description' => 'Map zooming value. Max # 19, Min # 0.',
	                'value'       => 12
	            ),

                array(
                    'type'       => 'textarea',
                    'heading'    => __( 'Marker text', 'plumberx' ),
                    'holder'     => 'div',
                    'param_name' => 'marker_text'
                )
			)
		)
	);
	
}
add_action( 'vc_before_init', 'tt_pl_map_shortcode_fn_vc' );

if(class_exists('WPBakeryShortCode')) {
	class WPBakeryShortCode_tt_pl_map_shortcode extends WPBakeryShortCode {
	}
}