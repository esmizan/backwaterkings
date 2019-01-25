<?php
if (class_exists ( 'WPBakeryShortCode' )) {
	class WPBakeryShortCode_plumberx_emergency_contact_section extends WPBakeryShortCode {
		
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
					'img' => '',
					'description' => '',
					'background' => '',
					
					'phone' => '',
					'button_text' => '',
					'button_link' => '',
					'or_text' => 'OR'

					
			), $atts ) );
						
			
			if ($img != null) {
				$src = wp_get_attachment_image_src ( $img, 'plumberx_testimonial' );
				$img_src = esc_url ( $src [0] );
			} else {
				$img_src = '';
			}
			if ($background != null) {
				$src = wp_get_attachment_image_src ( $background, 'testimonial' );
				$background_src = 'background:url('.esc_url ( $src [0] ).') no-repeat scroll right top / cover !important';
			} else {
				$background_src = '';
			}
			$output = '
			
				<section id="emergency" style="' . esc_html ( $background_src ) . '">
					<div class="container">
						<div class="row">
							<div class="col-lg-3 col-md-3">
								<img class="wow bounceInLeft" src="' . esc_url ( $img_src ) . '" alt="">
							</div>
							<div class="col-lg-offset-3 col-md-offset-3 col-lg-9 col-md-9">
								<h2>' .  $title . '</h2>
								<p class="em_sub">' . esc_html ( $description ) . '</p>
								<p class="phone-contact"><b>' . esc_html ( $phone ) . '</b> ' . esc_html ( $or_text ) . ' <a href="' . esc_html ( $button_link ) . '" class="hvr-bounce-to-right">' . esc_html ( $button_text ) . '</a></p>
							</div>
						</div>
					</div>
				</section>';
				
			return $output;
		}
	}
}