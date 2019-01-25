<?php
if (class_exists ( 'WPBakeryShortCodesContainer' )) {
	class WPBakeryShortCode_plumberx_accordion_item extends WPBakeryShortCodesContainer {
		
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
				//'description' => '',
				'html_id' => '',
			), $atts ) );
			
			
			$output = '
			
			<div class="panel panel-default">
				<div class="panel-heading headback" role="tab">
				  <h4 class="panel-title">
					<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#'.esc_html($html_id).'" aria-expanded="false" aria-controls="collapseOne">
					  '.esc_html($title).'
					</a>
				  </h4>
				</div>
				<div id="'.esc_html($html_id).'" class="panel-collapse collapse" role="tabpanel" style="height: 0px;" aria-expanded="false">
				  <div class="panel-body">
				  
					'.do_shortcode($content).'
					
					
				  </div>
				</div>
			</div>';
			return $output;
		}
	}
}