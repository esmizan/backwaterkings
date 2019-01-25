<?php
if (class_exists ( 'WPBakeryShortCode' )) {
	class WPBakeryShortCode_plumberx_pricing_faq extends WPBakeryShortCode {
		
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
				'question' => '',
				'answer' => '',
				'data_delay' => '',
				'data_duration' => '',
			), $atts ) );
			
			
			$output = '
			
			<li class="wow fadeIn" data-wow-duration="'.esc_html($data_duration).'" data-wow-delay="'.esc_html($data_delay).'">
				<h2> '.esc_html($question).'</h2>
				<p> '.esc_html($answer).'</p>
			</li>';

			return $output;
		}
	}
}