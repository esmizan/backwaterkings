<?php
class Visual_Composer {
	static function plumberx_param_settings_field($settings, $value) {
		
		$html = '';
		return $html;
	}
	
	static function add_shortcode_to_VC() {
/*		vc_add_param("vc_row", array(
				"type" => "dropdown",
				"group" => "plumberx Additions",
				"class" => "",
				"heading" => "Type",
				"param_name" => "type",
				"value" => array(
						"No Container" => "no_container",
						"In Container" => "in_container"
				)
		));
		
		vc_add_param("vc_row", array(
				"type" => "textfield",
				"group" => "plumberx Additions",
				"class" => "",
				"heading" => "ID",
				"param_name" => "row_id",
				"value" => "",
				
		));
		
		vc_add_param("vc_row_inner", array(
				"type" => "dropdown",
				"group" => "plumberx Additions",
				"class" => "",
				"heading" => "Type",
				"param_name" => "row_type",
				"value" => array(
						"No Container" => "no_container",
						"In Container" => "in_container"
				)
		)); */

		/***********************Title*******************************/
		
		
			vc_map(array(
	    		"icon" => 'tt-vc-block',
	    		'name'  => "PB Title Block",
				"category" => __ ( 'Plumberx Theme', 'Plumberx Theme' ),
	    		'base'                    => "plumberx_title_block",
	    		"content_element"         => true,
	    		'params'                  => array(
	    			
					array(
						"type"       => "textfield",
						"admin_label" => true,
						"heading"    => "Title",
						"param_name" => "title",
						"value"      => ''
					),
					array(
						"type"       => "textarea",
						"heading"    => "Description (optional)",
						"param_name" => "description2",
						"value"      => ''
					),
	    		)
	    	));
				vc_map(array(
	    		"icon" => 'tt-vc-block',
	    		'name'                    => "PB Shop Title",
	    		'base'                    => "plumberx_shop_title",
	    		"content_element"         => true,
	    		'params'                  => array(
	    			
					array(
						"type"       => "textfield",
						"heading"    => "Title",
						"admin_label" => true,
						"param_name" => "title",
						"value"      => ''
					)
	    		)
	    	));
			
			vc_map(array(
	    		'name'                    => "PB Gap",
	    		"icon" => 'tt-vc-block',
	    		'base'                    => "plumberx_gap",
	    		"content_element"         => true,
				'deprecated'         => 'v1.2',
	    		'params'                  => array(
	    			
					array(
						"type"       => "textfield",
						"heading"    => "Gap in Pixel",
						"admin_label" => true,
						"param_name" => "height",
						"value"      => ''
					)
	    		)
	    	));
			
			
/***********************About Us*******************************/
		
		
			vc_map(array(
						'name'                    => "PB About",
	    		        "icon" => 'tt-vc-block',
						'base'                    => "plumberx_aboutus_section",
						'description'             => "About Us Section",
						"content_element"         => true,
						"category" => __ ( 'Plumberx Theme', 'Plumberx Theme' ),
						'params'                  => array(
							array(
								"type"       => "textfield",
								"heading"    => "Title 1",
								"admin_label" => true,
								"param_name" => "title_1",
								"value"      => ''
							),
							
							array(
								"type"       => "textarea",
								"heading"    => "Description 1",
								"param_name" => "description_1",
								"value"      => ''
							),
							array (
								"type" => "attach_image",
								"class" => "",
								"heading" => __ ( "Thumbnail 1", 'Plumberx Theme' ),
								"param_name" => "img_1",
								"description" => __ ( "Upload Media", 'Plumberx Theme' ) 
							),
							array(
								"type"       => "textfield",
								"heading"    => "Title 2",
								"admin_label" => true,
								"param_name" => "title_2",
								"value"      => ''
							),
							array(
								"type"       => "textarea",
								"heading"    => "Description 2",
								"param_name" => "description_2",
								"value"      => ''
							),
							array (
								"type" => "attach_image",
								"class" => "",
								"heading" => __ ( "Thumbnail 2", 'Plumberx Theme' ),
								"param_name" => "img_2",
								"description" => __ ( "Upload Media", 'Plumberx Theme' ) 
							),
							array(
								"type"       => "textfield",
								"heading"    => "Title 3",
								"admin_label" => true,
								"param_name" => "title_3",
								"value"      => ''
							),
							array(
								"type"       => "textarea",
								"heading"    => "Description 3",
								"param_name" => "description_3",
								"value"      => ''
							),
							array (
								"type" => "attach_image",
								"class" => "",
								"heading" => __ ( "Thumbnail 3", 'Plumberx Theme' ),
								"param_name" => "img_3",
								"description" => __ ( "Upload Media", 'Plumberx Theme' ) 
							)
						),
					));
			
/***********************Emergency Conatact*******************************/
		
		
			vc_map(array(
						'name'                    => "PB CTA Contact",
	    		        "icon" => 'tt-vc-block',
						'description'             => "PB Emergency Contact Section",
						'base'                    => "plumberx_emergency_contact_section",
						"content_element"         => true,
						"category" => __ ( 'Plumberx Theme', 'Plumberx Theme' ),
						'params'                  => array(
							array(
								"type"       => "textfield",
								"heading"    => "Title",
								"admin_label" => true,
								"param_name" => "title",
								"value"      => ''
							),
							
							array(
								"type"       => "textarea",
								"heading"    => "Description",
								"param_name" => "description",
								"value"      => ''
							),
							array (
								"type" => "attach_image",
								"class" => "",
								"heading" => __ ( "Image", 'Plumberx Theme' ),
								"param_name" => "img",
								"description" => __ ( "Upload Media", 'Plumberx Theme' ) 
							),
							array (
								"type" => "attach_image",
								"class" => "",
								"heading" => __ ( "Background", 'Plumberx Theme' ),
								"param_name" => "background",
								"description" => __ ( "Upload Media For Background", 'Plumberx Theme' ) 
							),
							
							array(
								"type"       => "textfield",
								"heading"    => "Phone",
								"param_name" => "phone",
								"value"      => ''
							),
							
							array(
								"type"       => "textfield",
								"heading"    => "Or text",
								"description"    => "This text appears in the middle of Phone number and contact button. Default: Or",
								"param_name" => "or_text",
								"value"      => 'Or'
							),

							array(
								"type"       => "textfield",
								"heading"    => "Button Text",
								"param_name" => "button_text",
								"value"      => ''
							),
							
							array(
								"type"       => "textfield",
								"heading"    => "Button Link",
								"param_name" => "button_link",
								"value"      => ''
							),
							
						),
					));
					
					
			
/***********************Accordion*******************************/
		
		
			vc_map(array(
						'name'                    => "PB Accordion",
	    		        "icon" => 'tt-vc-block',
						'base'                    => "plumberx_accordion_section",
						'description'             => "Create accordion in theme style",
						"as_parent"               => array('only' => 'plumberx_accordion_item'),
					    'deprecated'         => 'v1.2',
					    "js_view" => 'VcColumnView',
						"category" => __ ( 'Plumberx Theme', 'Plumberx Theme' ),
						'params'                  => array(
							array(
							"type"       => "textfield",
							"heading"    => "Title",
							"param_name" => "title",
							"value"      => ''
							),
						),
					));
			
			vc_map(array(
	    		"icon" => 'tt-vc-block',
	    		'name'                    => "PB Accordion Item",
	    		'base'                    => "plumberx_accordion_item",
	    		"as_child"                => array('only' => 'plumberx_accordion_section'),
				'deprecated'         => 'v1.2',
				"category" => __ ( 'Plumberx Theme', 'Plumberx Theme' ),
	    		'params'                  => array(
	    			array(
						"type"       => "textfield",
						"heading"    => "Title",
						"admin_label" => true,
						"param_name" => "title",
						"value"      => ''
					),
					
	    			array(
						"type"       => "textfield",
						"heading"    => "HTML ID",
						"param_name" => "html_id",
						"value"      => ''
					),
					
					array(
						"type"       => "textarea",
						"heading"    => "Description",
						"param_name" => "description",
						"value"      => ''
					)
	    		)
	    	));
			
/***********************Pricing Faq*******************************/
		
		
			vc_map(array(
						"icon" => 'tt-vc-block',
						'name'                    => "PB Faq",
						'description'             => "FAQ section for pricing page.",
						'base'                    => "plumberx_pricing_faq_section",
						"as_parent"               => array('only' => 'plumberx_pricing_faq'),
						"content_element"         => true,
						"js_view" => 'VcColumnView',
						'show_settings_on_create' => true,
						"category" => __ ( 'Plumberx Theme', 'Plumberx Theme' ),
						'params'                  => array(
							
							array(
							"type"       => "textfield",
							"heading"    => "Title",
							"admin_label" => true,
							"param_name" => "title",
							"value"      => ''
							),
							array(
								"type"       => "checkbox",
								"heading"    => __ ( "Please click save button below and select its child items.", 'Plumberx Theme' ),
								"description"    => __ ( "Above field is for information purpose only.", 'Plumberx Theme' ),
								"param_name" => "inffoo",
								"value"      => ''
							),
						),
					));
			
			vc_map(array(
	    		'name'                    => "PB Pricing Faq",
	    		"icon" => 'tt-vc-block',
				"category" => __ ( 'Plumberx Theme', 'Plumberx Theme' ),
	    		'base'                    => "plumberx_pricing_faq",
	    		"as_child"                => array('only' => 'plumberx_pricing_faq_section'),
	    		"content_element"         => true,
	    		'params'                  => array(
	    			array(
						"type"       => "textfield",
						"heading"    => "Question",
						"admin_label" => true,
						"param_name" => "question",
						"value"      => ''
					),
					
	    			array(
						"type"       => "textfield",
						"heading"    => "Answer",
						"param_name" => "answer",
						"value"      => ''
					),

	    		)
	    	));

			
			
/***********************Counter*******************************/
vc_map(array(
	    		'name'    => "PB Counter",
	    		"icon" => 'tt-vc-block',
				"category" => __ ( 'Plumberx Theme', 'Plumberx Theme' ),
	    		'base'                    => "plumberx_counter",
	    		"content_element"         => true,
	    		'params'                  => array(
					array (
							"type" => "colorpicker",
							"class" => "",
							"heading" => __ ( "Background", 'Plumberx Theme' ),
							"param_name" => "background",
							"description" => __ ( "Background Color", 'Plumberx Theme' ), 
					),
	    			array(
						"type"       => "textfield",
						"heading"    => "Item 1",
						"param_name" => "item_1",
					    "admin_label" => true,
						"value"      => ''
					),
	    			array(
						"type"       => "textfield",
						"heading"    => "Item 1 Icon",
						
						"description" => __ ( "Use Stroke Gap Icon Class", 'Plumberx Theme' ), 
						"param_name" => "item_1_icon",
						"value"      => ''
					),
	    			array(
						"type"       => "textfield",
						"heading"    => "Upto",
						"param_name" => "item_1_upto",
						"value"      => ''
					),
	    			array(
						"type"       => "textfield",
						"heading"    => "Item 2",
						"param_name" => "item_2",
					    "admin_label" => true,
						"value"      => ''
					),
	    			array(
						"type"       => "textfield",
						"heading"    => "Item 2 Icon",
						
						"description" => __ ( "Use Stroke Gap Icon Class", 'Plumberx Theme' ), 
						"param_name" => "item_2_icon",
						"value"      => ''
					),
	    			array(
						"type"       => "textfield",
						"heading"    => "Upto",
						"param_name" => "item_2_upto",
						"value"      => ''
					),
	    			array(
						"type"       => "textfield",
						"heading"    => "Item 3",
						"param_name" => "item_3",
					    "admin_label" => true,
						"value"      => ''
					),
	    			array(
						"type"       => "textfield",
						"heading"    => "Item 3 Icon",
						"description" => __ ( "Use Stroke Gap Icon Class", 'Plumberx Theme' ),
						
						"param_name" => "item_3_icon",
						"value"      => ''
					),
	    			array(
						"type"       => "textfield",
						"heading"    => "Upto",
						"param_name" => "item_3_upto",
						"value"      => ''
					),
	    			array(
						"type"       => "textfield",
						"heading"    => "Item 4",
						"param_name" => "item_4",
					    "admin_label" => true,
						"value"      => ''
					),
	    			array(
						"type"       => "textfield",
						"heading"    => "Item 4 Icon",
						"description" => __ ( "Use Stroke Gap Icon Class", 'Plumberx Theme' ),
						
						"param_name" => "item_4_icon",
						"value"      => ''
					),
	    			array(
						"type"       => "textfield",
						"heading"    => "Upto",
						"param_name" => "item_4_upto",
						"value"      => ''
					)
					
					
					
	    		)
	    	));
			
			
			
/***********************Section*******************************/
			vc_map(array(
	    		'name'                    => "PB Section",
	    		"icon" => 'tt-vc-block',
	    		'base'                    => "plumberx_section",
	    		"content_element"         => true,
						
				'show_settings_on_create' => true,
				"category" => __ ( 'Plumberx Theme', 'Plumberx Theme' ),
	    		'params'                  => array(
					array (
							"type" => "colorpicker",
							"class" => "",
							"heading" => __ ( "Background", 'Plumberx Theme' ),
							"param_name" => "background",
							"description" => __ ( "Background Color", 'Plumberx Theme' ), 
					),
	    			array(
						"type"       => "textfield",
						"heading"    => "Title",
						"param_name" => "title",
					    "admin_label" => true,
						"value"      => ''
					),
	    			array(
						"type"       => "textfield",
						"heading"    => "ID",
						"param_name" => "id",
						"value"      => ''
					),
					array (
							"type" => "dropdown",
							"class" => "",
							"heading" => __ ( "Container", 'Plumberx Theme' ),
							"param_name" => "has_container",
							"value" => array (
									"" => "",
									"Yes" => "yes",
									"No" => "no",
									
							)
					)
	    		)
	    	));
/***********************Why Choose Us*******************************/
		
		
			vc_map(array(
						'name'                    => "PB Choose Us",
			    		"icon" => 'tt-vc-block',
						'description'             => "Why Choose Us Section",
						'base'                    => "plumberx_why_choose_us_section",
						"as_parent"               => array('only' => 'plumberx_why_choose_us'),
						"js_view" => 'VcColumnView',
						"content_element"         => true,
						
						'show_settings_on_create' => true,
						"category" => __ ( 'Plumberx Theme', 'Plumberx Theme' ),

						'params'                  => array(
							
							array(
								"type"       => "textfield",
								"heading"    => "Title",
								"param_name" => "title",
								"admin_label" => true,
								"value"      => ''
							),
							
							array(
								"type"       => "colorpicker",
								"heading"    => "Background Color",
								"param_name" => "background"
							),
							array(
								"type"       => "checkbox",
								"heading"    => __ ( "Please click save button below and select its child items.", 'Plumberx Theme' ),
								"description"    => __ ( "Above field is for information purpose only.", 'Plumberx Theme' ),
								"param_name" => "inffoo",
								"value"      => ''
							),
						),
					));
			
			vc_map(array(
	    		"icon" => 'tt-vc-block',
	    		'name'                    => "PB Why Choose Us",
				"category" => __ ( 'Plumberx Theme', 'Plumberx Theme' ),
	    		'base'                    => "plumberx_why_choose_us",
	    		"as_child"                => array('only' => 'plumberx_why_choose_us_section'),
	    		"content_element"         => true,
	    		'params'                  => array(
	    			
					array(
						"type"       => "textfield",
						"heading"    => "Title",
						"param_name" => "title",
						"admin_label" => true,
						"value"      => ''
					),
					array (
							"type" => "attach_image",
							"class" => "",
							"heading" => __ ( "Thumbnail", 'Plumberx Theme' ),
							"param_name" => "img",
							"description" => __ ( "Upload Image", 'Plumberx Theme' ) 
					),
					array(
						"type"       => "textarea_html",
						"heading"    => "Description",
						"param_name" => "content",
						"value"      => ''
					)
	    		)
	    	));
			
			/*-----------------------------Pricing Table------------------------------------*/			
			
			vc_map(array(
	    		"icon" => 'tt-vc-block',
				'name'                    => "PB Pricing table",
	    		'base'                    => "plumberx_pricing_table",
	    		"as_parent"               => array('only' => 'plumberx_price_column'),
				"content_element"         => true,
				"js_view" => 'VcColumnView',
				'show_settings_on_create' => true,
				"category" => __ ( 'Plumberx Theme', 'Plumberx Theme' ),
				'params'                  => array(
					array(
						"type"       => "textfield",
						"heading"    => "Title",
						"param_name" => "title",
						"admin_label" => true,
						"value"      => ''
					),
					array(
						"type"       => "textarea",
						"heading"    => "Subtitle",
						"param_name" => "subtitle",
						"value"      => ''
					),
					array(
						"type"       => "colorpicker",
						"heading"    => "Background Color",
						"param_name" => "background"
					),
				),
			));

			vc_map(array(
	    		"icon" => 'tt-vc-block',
				'name'                 	  => "PB Price Column",
				"category" => __ ( 'Plumberx Theme', 'Plumberx Theme' ),
				'base'                    => "plumberx_price_column",
	    		"as_child"                => array('only' => 'plumberx_pricing_table'),				
	    		"content_element"         => true,
	    		'params'                  => array(
	    			array(
	    				"type"       => "textfield",
						"heading"    => "Title",
						"admin_label" => true,
						"param_name" => "title",
						
						"value"      => ""
					),
					array(
	    				"type"       => "textarea",
						"heading"    => "Price",
						"param_name" => "price",
						"value"      => ""
					),
	    			array(
						"type"       => "textarea",
						"heading"    => "Rows",
						"param_name" => "content",
						"value"      => '',
						'description' => 'Use line break (press Enter) to separate between items',
					),
					array(
	    				"type"       => "textfield",
						"heading"    => "Button Text",
						"param_name" => "button_text",
						"value"      => ""
					),
					array(
	    				"type"       => "textfield",
						"heading"    => "Button link",
						"param_name" => "link",
						"value"      => ""
					),
					array (
							"type" => "dropdown",
							"class" => "",
							"heading" => __ ( "Package", 'Plumberx Theme' ),
							"description" => __ ( "This controls the color of the price column.", 'Plumberx Theme' ),
							"param_name" => "package",
							"value" => array (
									"Bronze" => "bronze",
									"Silver" => "silver",
									"Gold" => "gold",
									"Platinum" => "platinum"
									
							)
					)
				)
	    	));
/***********************Testimonial*******************************/
		

			vc_map(array(
	    		"icon" => 'tt-vc-block',
						'name'                    => "PB Testimonial Section",
						'base'                    => "plumberx_testimonial_section",
						"as_parent"               => array('only' => 'plumberx_testimonial_1,plumberx_testimonial_2,plumberx_testimonial_3'),
						"js_view" => 'VcColumnView',
						"content_element"         => true,
						
						'show_settings_on_create' => true,
						"category" => __ ( 'Plumberx Theme', 'Plumberx Theme' ),
						'params'                  => array(
							
							array(
								"type"       => "textfield",
								"heading"    => "Title",
								"param_name" => "title",
								"admin_label" => true,
								"value"      => ''
							),
							
							array(
								"type"       => "colorpicker",
								"heading"    => "Background Color",
								"param_name" => "background"
							),
							array (
							"type" => "dropdown",
							"class" => "",
							"heading" => __ ( "Version", 'Plumberx Theme' ),
							"param_name" => "version",
							"value" => array (
									"Default Layout" => "default",
									"Full width One Column" => "version_1",
									"Full Width Two Columns" => "version_2"
									
							),
							"description" => __ ( "Social Link shows or not", 'Plumberx Theme' ) 
					)
						),
					));
			
			vc_map(array(
	    		"icon" => 'tt-vc-block',
	    		'name'                    => "PB Testimonial Three Column",
				"category" => __ ( 'Plumberx Theme', 'Plumberx Theme' ),
	    		'base'                    => "plumberx_testimonial_1",
	    		"as_child"                => array('only' => 'plumberx_testimonial_section'),
	    		"content_element"         => true,
	    		'params'                  => array(
	    			
					array(
						"type"       => "textfield",
						"heading"    => "Name",
						"param_name" => "name",
						"admin_label" => true,
						"value"      => ''
					),
					array (
							"type" => "attach_image",
							"class" => "",
							"heading" => __ ( "Thumbnail", 'Plumberx Theme' ),
							"param_name" => "img",
							"description" => __ ( "Images for Client", 'Plumberx Theme' ) 
					),
					array(
						"type"       => "textarea",
						"heading"    => "Description",
						"param_name" => "description",
						"value"      => ''
					)
	    		)
	    	));
			vc_map(array(
	    		"icon" => 'tt-vc-block',
	    		'name'                    => "PB Testimonial Two Columns",
	    		'base'                    => "plumberx_testimonial_2",
	    		"as_child"                => array('only' => 'plumberx_testimonial_section'),
	    		"content_element"         => true,
	    		'params'                  => array(
	    			
					array(
						"type"       => "textfield",
						"heading"    => "Name",
						"param_name" => "name",
						"admin_label" => true,
						"value"      => ''
					),
					array (
							"type" => "attach_image",
							"class" => "",
							"heading" => __ ( "Thumbnail", 'Plumberx Theme' ),
							"param_name" => "img",
							"description" => __ ( "Images for Client", 'Plumberx Theme' ) 
					),
					array(
						"type"       => "textarea",
						"heading"    => "Description",
						"param_name" => "description",
						"value"      => ''
					)
	    		)
	    	));
			vc_map(array(
	    		"icon" => 'tt-vc-block',
				"category" => __ ( 'Plumberx Theme', 'Plumberx Theme' ),
	    		'name'                    => "PB Testimonial One Column",
	    		'base'                    => "plumberx_testimonial_3",
	    		"as_child"                => array('only' => 'plumberx_testimonial_section'),
	    		"content_element"         => true,
	    		'params'                  => array(
	    			
					array(
						"type"       => "textfield",
						"heading"    => "Name",
						"param_name" => "name",
						"admin_label" => true,
						"value"      => ''
					),
					array (
							"type" => "attach_image",
							"class" => "",
							"heading" => __ ( "Thumbnail", 'Plumberx Theme' ),
							"param_name" => "img",
							"description" => __ ( "Images for Client", 'Plumberx Theme' ) 
					),
					array(
						"type"       => "textarea",
						"heading"    => "Description",
						"param_name" => "description",
						"value"      => ''
					)
	    		)
	    	));

			

		/**
		 * ******** ===================== TEAM ===================== *************
		 */
		
		
		
		
			vc_map(array(
	    		"icon" => 'tt-vc-block',
				'name'                    => "PB Team Section",
				'base'                    => "plumberx_team_section",
				"as_parent"               => array('only' => 'plumberx_team'),
				"content_element"         => true,
				"js_view" => 'VcColumnView',
				'show_settings_on_create' => true,
				"category" => __ ( 'Plumberx Theme', 'Plumberx Theme' ),
				'params'                  => array(
					
					
							array(
								"type"       => "textfield",
								"heading"    => "Title",
								"param_name" => "title",
								"admin_label" => true,
								"value"      => ''
							),
							
							array(
								"type"       => "textfield",
								"heading"    => "Css Class",
								"param_name" => "css_class",
								"value"      => ''
							),
							
							array(
								"type"       => "colorpicker",
								"heading"    => "Background Color",
								"param_name" => "background"
							),
							array(
								"type"       => "checkbox",
								"heading"    => __ ( "Please click save button below and select its child items.", 'Plumberx Theme' ),
								"description"    => __ ( "Above field is for information purpose only.", 'Plumberx Theme' ),
								"param_name" => "inffoo",
								"value"      => ''
							),
				),
			));
			vc_map(array(
	    		"icon" => 'tt-vc-block',
	    		'name'                    => "PB Team",
	    		'base'                    => "plumberx_team",
	    		"as_child"                => array('only' => 'plumberx_team_section'),
	    		"content_element"         => true,
	    		'params'                  => array(
	    			array (
							"type" => "textfield",
							"admin_label" => true,
							"class" => "",
							"heading" => __ ( "Team Member Name", 'Plumberx Theme' ),
							"param_name" => "name",
							"description" => __ ( "Name of Team Member", 'Plumberx Theme' )
					),
					array (
							"type" => "textfield",
							"class" => "",
							"heading" => __ ( "Designation of Team Member", 'Plumberx Theme' ),
							"param_name" => "designation",
							"description" => __ ( "Designation of Team Member,", 'Plumberx Theme' )
					),
					array (
							"type" => "attach_image",
							"class" => "",
							"heading" => __ ( "Team Image", 'Plumberx Theme' ),
							"param_name" => "team_img",
							"description" => __ ( "Images for Team Member", 'Plumberx Theme' ) 
					),
					array (
							"type" => "dropdown",
							"class" => "",
							"heading" => __ ( "Social Link", 'Plumberx Theme' ),
							"param_name" => "social_link",
							"value" => array (
									'',
									'yes',
									'no' 
							),
							"description" => __ ( "Social Link shows or not", 'Plumberx Theme' ) 
					),
					array (
							"type" => "exploded_textarea",
							"class" => "",
							"heading" => __ ( "Social Icon Classes", 'Plumberx Theme' ),
							"param_name" => "social_icons",
							"description" => __ ( "Social Icon Classes multiple separated by new line. Check it out for full list of classes https://fortawesome.github.io/Font-Awesome/cheatsheet/ eg: fa-facebook, fa-google-plus", 'Plumberx Theme' ),
							'dependency' => array (
									'element' => 'social_link',
									'value' => 'yes' 
							) 
					),
					array (
							"type" => "exploded_textarea",
							"class" => "",
							"heading" => __ ( "Social Links", 'Plumberx Theme' ),
							"param_name" => "social_links",
							"description" => __ ( "Social links multiple separated by new line. eg: http://facebook.com/blah", 'Plumberx Theme' ),
							'dependency' => array (
									'element' => 'social_link',
									'value' => 'yes' 
							) 
					) ,
							array (
							"type" => "dropdown",
							"class" => "",
							"heading" => __ ( "Columns", 'Plumberx Theme' ),
							"param_name" => "teamcol",
							"value" => array (
									"Default 4 col" => "default",
									"Wider" => "teamcol3",
							),
							"description" => __ ( "By default teams show up as 4 blocks in a row, you can choose to make them wider instead.", 'Plumberx Theme' )
					)
	    		)
	    	));
		
		
		
		
		
		
		/**
		 * ******** ===================== SPONSOR ===================== *************
		 */		
		
			vc_map(array(
	    		"icon" => 'tt-vc-block',
						'name'                    => "PB Sponsor Section",
						'base'                    => "plumberx_sponsor_section",
						"as_parent"               => array('only' => 'plumberx_sponsor'),
						"content_element"         => true,
				"js_view" => 'VcColumnView',
				'show_settings_on_create' => true,
				"category" => __ ( 'Plumberx Theme', 'Plumberx Theme' ),
				'params'                  => array(
							
							
							array(
								"type"       => "textfield",
								"heading"    => "Title",
								"param_name" => "title",
								"admin_label" => true,
								"value"      => ''
							),
							array(
								"type"       => "checkbox",
								"heading"    => __ ( "Please click save button below and select its child items.", 'Plumberx Theme' ),
								"description"    => __ ( "Above field is for information purpose only.", 'Plumberx Theme' ),
								"param_name" => "inffoo",
								"value"      => ''
							),
						),
					));
			vc_map(array(
	    		"icon" => 'tt-vc-block',
	    		'name'                    => "PB Sponsor",
	    		'base'                    => "plumberx_sponsor",
	    		"as_child"                => array('only' => 'plumberx_sponsor_section'),
	    		"content_element"         => true,
	    		'params'                  => array(
	    			array (
							"type" => "attach_image",
							"heading" => __ ( "Sponsor's Image", 'Plumberx Theme' ),
							"param_name" => "sponsor_img",
					        "admin_label" => true,
							"description" => __ ( "Images for Sponsor", 'Plumberx Theme' ) 
					),
	    			array (
							"type" => "textfield",
							"heading" => __ ( "(Optional) Link ", 'Plumberx Theme' ),
							"param_name" => "sponsor_link",
							"description" => __ ( "Enter url if you want to link this sponsor image to somewhere. Leave blank to disable.", 'Plumberx Theme' )
					)
	    		)
	    	));
			
			
			
/* ============= BLOG POSTS ========== */
		vc_map ( array (
	    		"icon" => 'tt-vc-block',
				"name" => __ ( "PB Blog", 'Plumberx Theme' ),
				"base" => "plumberx_blog_post",
				"class" => "",
				"category" => __ ( 'Plumberx Theme', 'Plumberx Theme' ),
				"params" => array (
							
							
						array(
							"type"       => "textfield",
							"heading"    => "Title",
							"param_name" => "title",
							"admin_label" => true,
							"value"      => ''
						),
						
						array (
								"type" => "dropdown",
								"class" => "",
								"heading" => __ ( "Orderby", 'Plumberx Theme' ),
								"param_name" => "orderby",
								"value" => array (
										'',
										'ID',
										'author',
										'title',
										'date',
										'modified',
										'rand' 
								),
								"description" => __ ( "Oderby arragement see <a href='https://codex.wordpress.org/Template_Tags/get_posts'>codex</a> for details", 'Plumberx Theme' ) 
						),
						array (
								"type" => "dropdown",
								"class" => "",
								"heading" => __ ( "Select Order", 'Plumberx Theme' ),
								"param_name" => "order",
								"value" => array (
										'',
										'ASC',
										'DESC' 
								),
								"description" => __ ( "Ascending or decending Order ", 'Plumberx Theme' ) 
						),
						array (
								"type" => "textfield",
								"class" => "",
								"heading" => __ ( "Number Of posts", 'Plumberx Theme' ),
								"param_name" => "posts_per_page",
								"description" => __ ( "Number of posts should be shown in this section, numeric value", 'Plumberx Theme' ) 
						) 
				) 
		) );

		// Get service categories
		$serv_cats = get_terms( 'pb_service' );
		$serv_cats_choices = array();

		// Generate usable array of categories
		foreach ( $serv_cats as $cat ) {
			$serv_cats_choices[$cat->name] = $cat->slug;
		}
/* ============= Services Tab ========== */
		vc_map ( array (
	    		"icon" => 'tt-vc-block',
				"name" => __ ( "PB Service Tabs", 'Plumberx Theme' ),
				"base" => "plumberx_services_tab",
				"class" => "",
				"category" => __ ( 'Plumberx Theme', 'Plumberx Theme' ),
				"params" => array (
							
							
						array(
							"type"       => "checkbox",
							"heading"    => __ ( "Content for this service section will be fetched from PB services post type on the left.", 'Plumberx Theme' ),
							"description"    => __ ( "Above field is for information purpose only.", 'Plumberx Theme' ),
							"param_name" => "inffoo",
							"value"      => ''
						),
						array(
							"type"       => "textfield",
							"heading"    => "Title",
							"admin_label" => true,
							"param_name" => "title",
							"value"      => ''
						),
						array (
								"type" => "textfield",
								"class" => "",
								"heading" => __ ( "Number Of posts", 'Plumberx Theme' ),
								"param_name" => "posts_per_page",
								"description" => __ ( "Number of posts should be shown in this section, numeric value", 'Plumberx Theme' ) 
						),
						array(
							"type" => "checkbox",
							"class" => "",
							"heading" => __("Categories to fetch posts from."),
							"description" => __("Note that service categories only show up here if there exists one, with Services inside it."),
							"param_name" => "servicecats",
							"value" => $serv_cats_choices,
						),
				)
		) );
	
/* =============Featured Services ========== */
		vc_map ( array (
	    		"icon" => 'tt-vc-block',
				"name" => __ ( "PB Featured Services", 'Plumberx Theme' ),
				"base" => "plumberx_featured_services",
				"class" => "",
				"category" => __ ( 'Plumberx Theme', 'Plumberx Theme' ),
				"params" => array (
							
							
						array(
							"type"       => "textfield",
							"heading"    => "Title",
							"description"    => "Note that Title color is white by default, so you might need a background color or image.",
							"admin_label" => true,
							"param_name" => "title",
							"value"      => ''
						),
						array (
								"type" => "textfield",
								"class" => "",
								"heading" => __ ( "Number Of posts", 'Plumberx Theme' ),
								"param_name" => "posts_per_page",
								"description" => __ ( "Number of posts should be shown in this section, numeric value", 'Plumberx Theme' ) 
						),
						array (
							"type" => "attach_image",
							"class" => "",
							"heading" => __ ( "Service Background", 'Plumberx Theme' ),
							"param_name" => "background",
							"description" => __ ( "Upload Image", 'Plumberx Theme' ) 
						), 
						array(
							"type" => "checkbox",
							"class" => "",
							"heading" => __("Categories to fetch posts from."),
							"description" => __("Note that service categories only show up here if there exists one, with Services inside it."),
							"param_name" => "servicecats",
							"value" => $serv_cats_choices,
						),
						array(
							"type" => "checkbox",
							"class" => "",
							"heading" => __("Link to Service single page."),
							"description" => __("If checked, the title and image is linked to service single page."),
							"param_name" => "servicelink",
							"value" => '',
						),
				)
		) );

		// Get project categories
		$project_cats = get_terms( 'pb_project' );
		$project_cats_choices = array();

		// Generate usable array of categories
		foreach ( $project_cats as $cat ) {
			$project_cats_choices[$cat->name] = $cat->slug;
		}
/***********************Projects*******************************/
		
		
			vc_map(array(
	            		"icon" => 'tt-vc-block',
						'name'                    => "PB Projects",
						'base'                    => "plumberx_projects",					
						'description'             => "List projects in multiple types.",
						"content_element"         => true,
						"category" => __ ( 'Plumberx Theme', 'Plumberx Theme' ),
						'params'                  => array(
							array(
								"type"       => "checkbox",
								"heading"    => __ ( "Content for this projects section will be fetched from PB Projects post type on the left.", 'Plumberx Theme' ),
								"description"    => __ ( "Above field is for information purpose only.", 'Plumberx Theme' ),
								"param_name" => "inffoo1",
								"value"      => ''
							),
							array(
								"type"       => "textfield",
								"heading"    => "Title",
								"param_name" => "title",
								"admin_label" => true,
								"value"      => ''
							),
							array(
								"type"       => "textfield",
								"heading"    => "Posts Per Page",
								"param_name" => "posts_per_page",
								"description" => "Enter a number",
								"value"      => ''
							),
							array (
								"type"       => "dropdown",
								"heading"    => "Layout",
								"param_name" => "layout",
								"admin_label" => true,
								"description" => __ ( "Projects Layout ", 'Plumberx Theme' ), 
									"value" => array (
											"Project V1" => "v1",
											"Project V2" => "v2",
											"Project V3" => "v3",
											"Same as V3 but 3 columns" => "v4",
									)
							),
							array(
								"type"       => "dropdown",
								"heading"    => "Filter",
								"param_name" => "filter",
								"description" => __ ( "Filter", 'Plumberx Theme' ), 
								
								"value"      => array(
									"on",
									"off",
								)
							),
							array (
								"type" => "attach_image",
								"class" => "",
								"heading" => __ ( "Projects Background", 'Plumberx Theme' ),
								"param_name" => "background",
								"description" => __ ( "Upload Image", 'Plumberx Theme' ) 
							),
							array(
								"type" => "checkbox",
								"class" => "",
								"heading" => __("Project types to fetch posts from."),
								"description" => __("It will be blank if there are no Project types with active projects in them. If you do not select any, projects from all types appears. Please check https://templatation.gitbooks.io/plumberx-wordpress-theme/content/projects.html for more details."),
								"param_name" => "projectcats",
								"value" => $project_cats_choices,
							),
							array(
								"type"       => "checkbox",
								"heading"    => __ ( "Link to Single projects page.", 'Plumberx Theme' ),
								"description"    => __ ( "By default, the project links to larger image. Check this to link to actual project page instead. (Not applicable to Projects V2).", 'Plumberx Theme' ),
								"param_name" => "singlelink",
								"value"      => ''
							),
						),
					));
		/* ============= Contact Us ========== */
		vc_map ( array (
	    		"icon" => 'tt-vc-block',
				"name" => __ ( "PB Contact Us", 'Plumberx Theme' ),
				"base" => "plumberx_contact_us",
				"content_element"         => true,
				"category" => __ ( 'Plumberx Theme', 'Plumberx Theme' ),
				'params'                  => array(
						array(
							"type"       => "textfield",
							"heading"    => "Contact Form 7 Shortcode",
							"description"    => "eg: [contact-form-7 id=232]",
							"param_name" => "description",
							"value"      => ''
						),	
						
						array(
							"type"       => "textfield",
							"heading"    => "Title",
							"description"    => "Appears on the top",
							"param_name" => "title",
							"admin_label" => true,
							"value"      => ''
						),
						array(
							"type"       => "textarea",
							"heading"    => "Subtitle",
							"param_name" => "subtitle",
							"value"      => ''
						),
						
						array(
							"type"       => "textarea_html",
							"heading"    => "Description (This appears in the sidebar, above the contact panel)",
							"param_name" => "content",
							"value"      => ''
						),	
						
						
						array(
							"type"       => "textfield",
							"heading"    => "Address Label",
							"param_name" => "address_label",
							"value"      => ''
						),
						array (
							"type" => "attach_image",
							"class" => "",
							"heading" => __ ( "Address Image", 'Plumberx Theme' ),
							"param_name" => "address_img",
						),

						array(
							"type"       => "textfield",
							"heading"    => "Enter Address",
							"param_name" => "address",
							"value"      => ''
						),
						array(
							"type"       => "textfield",
							"heading"    => "Phone Label",
							"param_name" => "contact_phone_label",
							"value"      => ''						
						),
						array (
							"type" => "attach_image",
							"class" => "",
							"heading" => __ ( "Phone Image", 'Plumberx Theme' ),
							"param_name" => "phone_img",
						),
						array(
							"type"       => "textfield",
							"heading"    => "Enter Phone Number",
							"param_name" => "contact_phone",
							"value"      => ''
						),
						array(
							"type"       => "textfield",
							"heading"    => "Email Label",
							"param_name" => "contact_email_label",
							"value"      => ''
						),
						array (
							"type" => "attach_image",
							"class" => "",
							"heading" => __ ( "Email Image", 'Plumberx Theme' ),
							"param_name" => "email_img",
						),
						array(
							"type"       => "textfield",
							"heading"    => "Enter Email",
							"param_name" => "contact_email",
							"value"      => ''
						),

						array(
							"type"       => "textfield",
							"heading"    => "Extra Field 1 Label (Keep it blank to disable)",
							"param_name" => "extra1_label",
							"value"      => ''
						),
						array (
							"type" => "attach_image",
							"class" => "",
							"heading" => __ ( "Extra Field 1 Image", 'Plumberx Theme' ),
							"param_name" => "extra1_label_img",
						),
						array(
							"type"       => "textfield",
							"heading"    => "Extra Field 1 Value",
							"param_name" => "extra1_label_value",
							"value"      => ''
						),
						array(
							"type"       => "textfield",
							"heading"    => "Extra Field 2 Label(Keep it blank to disable)",
							"param_name" => "extra2_label",
							"value"      => ''
						),
						array (
							"type" => "attach_image",
							"class" => "",
							"heading" => __ ( "Extra Field 2 Image", 'Plumberx Theme' ),
							"param_name" => "extra2_label_img",
						),
						array(
							"type"       => "textfield",
							"heading"    => "Extra Field 2 Value",
							"param_name" => "extra2_label_value",
							"value"      => ''
						)
				)
		) );

	}
}