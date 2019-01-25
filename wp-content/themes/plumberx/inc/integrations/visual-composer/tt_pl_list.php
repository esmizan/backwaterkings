<?php
/*
 * Templatation.com
 *
 * List for VC
 *
 */

// Parent Element
function tt_pl_list_fn_vc() {
    vc_map( 
        array(
            "icon" => 'tt-vc-block',
            'name'                    => __( 'PB List' , 'plumberx' ),
            'base'                    => 'tt_pl_list_shortcode',
            'description'             => __( 'Create list', 'plumberx' ),
            'as_parent'               => array('only' => 'tt_pl_list_content_shortcode'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
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
add_action( 'vc_before_init', 'tt_pl_list_fn_vc' );

// Nested Element
function tt_pl_list_content_fn_vc() {
    
    vc_map(
        array(
            'name'            => __('List Item', 'plumberx'),
            'base'            => 'tt_pl_list_content_shortcode',
            'description'     => __( 'One item from the list', 'plumberx' ),
            "category" => __('Plumberx Theme', 'plumberx'),
            'content_element' => true,
            'as_child'        => array('only' => 'tt_pl_list_shortcode'), // Use only|except attributes to limit parent (separate multiple values with comma)
            'params'          => array(
                array(
                    'type'        => 'textfield',
                    'heading'     => __( 'Enter list item content', 'plumberx' ),
                    'param_name'  => 'title',
                    'admin_label' => true,
                    'value'       => '',
                )
            ),
        ) 
    );
}
add_action( 'vc_before_init', 'tt_pl_list_content_fn_vc' );

// A must for container functionality, replace Wbc_Item with your base name from mapping for parent container
if(class_exists('WPBakeryShortCodesContainer')){
    class WPBakeryShortCode_tt_pl_list_shortcode extends WPBakeryShortCodesContainer {

    }
}

// Replace Wbc_Inner_Item with your base name from mapping for nested element
if(class_exists('WPBakeryShortCode')){
    class WPBakeryShortCode_tt_pl_list_content_shortcode extends WPBakeryShortCode {

    }
}