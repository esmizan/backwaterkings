<?php
/*
 * Templatation.com
 *
 * Tabs for VC
 *
 */

function tt_pl_tabs_fn_vc() {
    vc_map(
        array(
            'name'                    => __( 'PB Modified Tabs' , 'plumberx' ),
            'base'                    => 'tt_pl_tabs_shortcode',
            'description'             => __( 'Updated tabs since v1.2', 'plumberx' ),
            "icon" => 'tt-vc-block',
            'as_parent'               => array('only' => 'tt_pl_tabs_item_shortcode'),
            'content_element'         => true,
            "js_view" => 'VcColumnView',
            "category" => __('Plumberx Theme', 'plumberx'),
            'params' => array(
                array(
                    'type' => 'param_group',
                    'heading' => __( 'Tabs', 'plumberx' ),
                    'param_name' => 'tabs',
                    'group' => 'Tab name',
                    'params' => array(
                        array(
                            'type'        => 'textfield',
                            'heading'     => __( 'Tab Name', 'plumberx' ),
                            'param_name'  => 'name',
                            'value'       => '',
                            'admin_label' => true,
                        ),
                        array(
                            "type"       => "checkbox",
                            "heading"    => __ ( "Please click Save button below and then select its child shortcode to enter items.", 'plumberx' ),
                            "description"    => __ ( "Above field is for information purpose only.", 'plumberx' ),
                            "param_name" => "inffoo3",
                            "value"      => 'ok'
                        ),
                    ),
                    'callbacks' => array(
                        'after_add' => 'vcChartParamAfterAddCallback'
                    )
                ),

            ),
            
        )
    );
}
add_action( 'vc_before_init', 'tt_pl_tabs_fn_vc' );
// Nested Element
function tt_pl_tabs_item_fn_vc() {
    vc_map(
        array(
            'name'            => __('Tab item', 'plumberx'),
            'base'            => 'tt_pl_tabs_item_shortcode',
            'description'     => __( 'Tab content', 'plumberx' ),
            "category" => __('Plumberx Theme', 'plumberx'),
            'content_element' => true,
            'as_child'        => array('only' => 'tt_pl_tabs_shortcode'), // Use only|except attributes to limit parent (separate multiple values with comma)
            'params'          => array(
                array(
                    'type' => 'textarea_html',
                    'heading' => __( 'Content info', 'plumberx' ),
                    'param_name' => 'content',
                    'value' => '',
                    'description' => __( 'Content info', 'plumberx' )
                ),
            ),
        )
    );
}
add_action( 'vc_before_init', 'tt_pl_tabs_item_fn_vc' );

// A must for container functionality, replace Wbc_Item with your base name from mapping for parent container
if(class_exists('WPBakeryShortCodesContainer')){
    class WPBakeryShortCode_tt_pl_tabs_shortcode extends WPBakeryShortCodesContainer {

    }
}

// Replace Wbc_Inner_Item with your base name from mapping for nested element
if(class_exists('WPBakeryShortCode')){
    class WPBakeryShortCode_tt_pl_tabs_item_shortcode extends WPBakeryShortCode {

    }
}