<?php
if (class_exists ( 'WPBakeryShortCode' )) {
	class WPBakeryShortCode_plumberx_mailchimp extends WPBakeryShortCode {
		
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
			extract(shortcode_atts(

				array(

					'action'    => '',

					'title'      => '',
					
					'subtitle'      => '',
					
					'button_text'      => ''

				), $atts)

			);

			if (isset($action) && !empty($action)) {

				$output .=' 
					<section id="subscribe-section">
						<div class="container">
							<div class="row">
								<div class="col-lg-5 col-md-6">
									<h2>'.esc_html($title).'</h2>
									<p>'.esc_html($subtitle).'</p>
								</div>
								<div class="col-lg-7 col-md-6">
									<form action="'.$action.'" class="subscribe-form-wrap row">
										<input type="text" placeholder="Enter your email address">
										<button type="submit" class="hvr-bounce-to-right" >'.esc_html($button_text).'</button>
									</form>
								</div>
							</div>
						</div>
					</section>';
			}
			return $output;
		}
	}
}