<?php
/*
 * Templatation.com
 *
 * Social Accordion for VC
 *
 */

// Parent Element
function tt_pl_banner_fn_vc() {
    vc_map(
        array(
            "icon" => 'tt-vc-block',
            'name'                    => __( 'LC Slider' , 'plumberx' ),
            'base'                    => 'tt_pl_banner_shortcode',
            'description'             => __( 'Create slider with Form', 'plumberx' ),
            'as_parent'               => array('only' => 'tt_pl_banner_content_shortcode'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
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
                array(
                    'type' => 'textfield',
                    'heading' => __( 'Extra class name', 'plumberx' ),
                    'param_name' => 'el_class',
                    'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'plumberx' ),
                ),
            ),
        )
    );
}
add_action( 'vc_before_init', 'tt_pl_banner_fn_vc' );

// Nested Element
function tt_pl_banner_content_fn_vc() {

    vc_map(
        array(
            "icon" => 'tt-vc-block',
            'name'            => __('Create Slide', 'plumberx'),
            'base'            => 'tt_pl_banner_content_shortcode',
            "category" => __('Plumberx Theme', 'plumberx'),
            'content_element' => true,
            'as_child'        => array('only' => 'tt_pl_banner_shortcode'), // Use only|except attributes to limit parent (separate multiple values with comma)
            'params'          => array(
                array(
                    'type' => 'attach_image',
                    'heading' => __( 'Background image of Slide', 'plumberx' ),
                    'param_name' => 'image',
                    'value' => '',
                    'description' => __( 'Select image from media library.', 'plumberx' ),
                ),
                array(
                    "type" => "textfield",
                    "heading" => __("Title", 'plumberx'),
                    "description" => __("This text appears in biggest font", 'plumberx'),
                    "param_name" => "title",
                    'admin_label' => true,
                ),
                array(
                    "type" => "colorpicker",
                    "class" => "",
                    "heading" => __("Title color (Optional)",'plumberx'),
                    "param_name" => "title_color",
                    "value" => "",
                ),
                array(
                    "type" => "textfield",
                    "heading" => __("Subtitle", 'plumberx'),
                    "param_name" => "subtitle",
                    'description'     => __( 'Enter subtitle', 'plumberx' ),
                ),
                array(
                    "type" => "colorpicker",
                    "class" => "",
                    "heading" => __("Subtitle  color (Optional)",'plumberx'),
                    "param_name" => "sbtitle_color",
                    "value" => "",
                ),
                array(
                    'type'       => 'checkbox',
                    'heading'    => __( 'Check this to make item active', 'plumberx' ),
                    'param_name' => 'separator',
                    'value'      => array( __( 'Yes, please', 'plumberx' ) => 'yes' ),
                ),
                array(
                    "type" => "colorpicker",
                    "class" => "",
                    "heading" => __("Separator color (Optional)",'plumberx'),
                    "param_name" => "sep_color",
                    "value" => "",
                    'dependency' => array(
                        'element' => 'separator',
                        'value' => 'yes'
                    ),
                ),
                array(
                    "type" => "textarea",
                    "heading" => __("Text", 'plumberx'),
                    "param_name" => "description",
                    'description'     => __( 'Enter text', 'plumberx' ),
                ),
                array(
                    "type" => "colorpicker",
                    "class" => "",
                    "heading" => __("Text color (Optional)",'plumberx'),
                    "param_name" => "text_color",
                    "value" => "",
                ),
                array(
                    "type" => "textfield",
                    "heading" => __("Button text", 'plumberx'),
                    "param_name" => "btn_text",
                    'description'     => __( 'Enter text on button', 'plumberx' ),
                ),
                array(
                    "type" => "colorpicker",
                    "class" => "",
                    "heading" => __("Button  color",'plumberx'),
                    "param_name" => "btn_color",
                    "value" => "",
                ),
                array(
                    "type" => "textfield",
                    "heading" => __("Button Link", 'plumberx'),
                    "param_name" => "link",
                    'description'     => __( 'Enter Button link', 'plumberx' ),
                ),
                array(
                    'type'       => 'checkbox',
                    'heading'    => __( 'Show contact form', 'plumberx' ),
                    'description'    => __( 'Do you want to show contact form on this slide, powered by Contact form 7 plugin.', 'plumberx' ),
                    'param_name' => 'form',
                    'value'      => array( __( 'Yes, please', 'plumberx' ) => 'yes' ),
                ),
                array(
                    'type'      => 'dropdown',
                    'heading'     => __( 'Contact form vertical style', 'plumberx' ),
                    'param_name'  => 'vertical',
                    'value'       => array(
                        'Center'  =>  'center',
                        'Bottom'  =>  'form_bt',
                        'Top'  =>  'form_top',
                    ),
                    'dependency' => array(
                        'element' => 'form',
                        'value' => 'yes'
                    ),
                ),
                array(
                    "type" => "textfield",
                    "heading" => __("Form 1 name", 'plumberx'),
                    "param_name" => "form_1",
                    'description'     => __( 'This appears in the tab on top of form, eg: residential', 'plumberx' ),
                    'dependency' => array(
                        'element' => 'form',
                        'value' => 'yes'
                    ),
                ),
                array(
                    "type" => "textfield",
                    "heading" => __("Form 2 name", 'plumberx'),
                    "param_name" => "form_2",
                    'description'     => __( 'This appears in the tab on top of form, eg: residential', 'plumberx' ),
                    'dependency' => array(
                        'element' => 'form',
                        'value' => 'yes'
                    ),
                ),
                array(
                    "type" => "textfield",
                    "heading" => __("Shortcode form 1 name", 'plumberx'),
                    "param_name" => "sform_1",
                    'description'     => __( 'Enter shortcode, for example [contact-form-7 id="77" title="Contact form 2"]', 'plumberx' ),
                    'dependency' => array(
                        'element' => 'form',
                        'value' => 'yes'
                    ),
                ),
                array(
                    "type" => "textfield",
                    "heading" => __("Shortcode form 1 name", 'plumberx'),
                    "param_name" => "sform_2",
                    'description'     => __( 'Enter shortcode, for example [contact-form-7 id="77" title="Contact form 2"]', 'plumberx' ),
                    'dependency' => array(
                        'element' => 'form',
                        'value' => 'yes'
                    ),
                ),
            ),
        )
    );
}
add_action( 'vc_before_init', 'tt_pl_banner_content_fn_vc' );

// A must for container functionality, replace Wbc_Item with your base name from mapping for parent container
if(class_exists('WPBakeryShortCodesContainer')){
    class WPBakeryShortCode_tt_pl_banner_shortcode extends WPBakeryShortCodesContainer {

    }
}

// Replace Wbc_Inner_Item with your base name from mapping for nested element
if(class_exists('WPBakeryShortCode')){
    class WPBakeryShortCode_tt_pl_banner_content_shortcode extends WPBakeryShortCode {

    }
}

