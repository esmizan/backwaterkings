<?php
/*
 * Templatation.com
 *
 * Accordion for VC
 *
 */

// Parent Element
function tt_pl_accordion_vc() {
	vc_map( 
		array(
		    "icon" => 'tt-vc-block',
		    'name'                    => __( 'PB Modified Accordion' , 'plumberx' ),
		    'base'                    => 'tt_pl_accordion_shortcode',
		    'description'             => __( 'Create accordion', 'plumberx' ),
		    'as_parent'               => array('only' => 'tt_pl_accordion_content_shortcode'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
		    'content_element'         => true,
		    "js_view" => 'VcColumnView',
			"category" => __('Plumberx Theme', 'plumberx'),
            'params'          => array(
                    array(
                        "type"       => "checkbox",
                        "heading"    => __ ( "Please click Save button below and then select its child shortcode to enter items.", 'plumberx' ),
                        "description"    => __ ( "Above field is for information purpose only.", 'plumberx' ),
                        "param_name" => "inffoo3",
                        "value"      => 'ok'
                    ),
            ),
		)
	);
}
add_action( 'vc_before_init', 'tt_pl_accordion_vc' );

// Nested Element
function tt_pl_accordion_content_vc() {
	
	vc_map(
		array(
		    "icon" => 'tt-vc-block',
		    'name'            => __('PB Accordion Content', 'plumberx'),
		    'base'            => 'tt_pl_accordion_content_shortcode',
		    'description'     => __( 'Content Element', 'plumberx' ),
			"category" => __('Plumberx Theme', 'plumberx'),
		    'content_element' => true,
		    'as_child'        => array('only' => 'tt_pl_accordion_shortcode'), // Use only|except attributes to limit parent (separate multiple values with comma)
		    'params'          => array(
		    	array(
		    		"type" => "textfield",
		    		"heading" => __("Title", 'plumberx'),
		    		"param_name" => "title",
				    'admin_label' => true,
				    'description'     => __( 'Enter title for accordion.', 'plumberx' ),
		    	),
                array(
                    "type" => "textfield",
                    "heading" => __("Accordion item ID", 'plumberx'),
                    "param_name" => "acc_id",
                    'admin_label' => true,
                    'description'     => __( 'Enter ID for accordion item . It should be unique. (for example: myid1, myid2 etc)', 'plumberx' ),
                ),
	             array(
                    'type'        => 'textarea_html',
                    'heading'     => __( 'Block Content', 'plumberx' ),
                    'description'     => __( 'Add content for accordion.', 'plumberx' ),
                    'param_name'  => 'content'
                )

		    ),
		) 
	);
}
add_action( 'vc_before_init', 'tt_pl_accordion_content_vc' );

// A must for container functionality, replace Wbc_Item with your base name from mapping for parent container
if(class_exists('WPBakeryShortCodesContainer')){
    class WPBakeryShortCode_tt_pl_accordion_shortcode extends WPBakeryShortCodesContainer {

    }
}

// Replace Wbc_Inner_Item with your base name from mapping for nested element
if(class_exists('WPBakeryShortCode')){
    class WPBakeryShortCode_tt_pl_accordion_content_shortcode extends WPBakeryShortCode {

    }
}