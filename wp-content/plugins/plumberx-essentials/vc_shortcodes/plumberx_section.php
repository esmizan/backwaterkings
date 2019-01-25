<?php
if (class_exists ( 'WPBakeryShortCodesContainer' )) {
	class WPBakeryShortCode_plumberx_section extends WPBakeryShortCodesContainer {
		
		/*
		 * This methods returns HTML code for frontend representation of your shortcode.
		 * You can use your own html markup.
		 *
		 * @param $atts - shortcode attributes
		 * @param @content - shortcode content
		 *
		 * @access protected
		 * vc_filter: VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG vc_shortcodes_css_class - hook to edit element class
		 * @return string
		 */
		protected function content($atts, $content = null) {
			extract ( shortcode_atts ( array (					
					'title' => '',
					'background' => '',
					'id' => '',
					'has_container' => ''
					
			), $atts ) );
				
			
			$output = '<section class="plumberx_section" style="background:'.$background.'" id='.$id.' >';
				
				if($has_container == "yes"){$output .= '<div class="container">';}
				
					$output .= '<div class="row">';
						if($title !=""){$output .= '<div class="section-title"><h1>'.esc_html($title).'</h1></div>';}
						$output .= do_shortcode($content);
					$output .= '</div>';
				
				if($has_container == "yes"){$output .= '</div>';}
			
			$output .= '</section>';
			return $output;
		}
	}
}