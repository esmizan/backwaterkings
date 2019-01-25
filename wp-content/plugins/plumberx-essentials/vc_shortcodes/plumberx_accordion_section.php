<?php
if (class_exists ( 'WPBakeryShortCodesContainer' )) {
	class WPBakeryShortCode_plumberx_accordion_section extends WPBakeryShortCodesContainer {
		
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
					'title' =>''
					
			), $atts ) );
						
		
			$output = '
				<div class="general-question">
					<div class="panel-group" role="tablist" aria-multiselectable="true">
						'.do_shortcode($content).'
					</div>
				</div>';
			return $output;
		}
	}
}