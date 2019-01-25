<?php
if (class_exists ( 'WPBakeryShortCode' )) {
	class WPBakeryShortCode_plumberx_pricing_faq_section extends WPBakeryShortCodesContainer {
		
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
					'title' =>'',
					'background' =>''
					
			), $atts ) );
						
		
			if ($background != null) {
				$src = wp_get_attachment_image_src ( $background, 'full' );
				$background_src = esc_url ( $src [0] );
				$class="home-v2";
			} else {
				$background_src = '';
				$class="";
			}
			
			
			
							
					$output = '<section id="pricing-faq" class="'.$class.'">					
					<div class="parallax-container">
						<div class="parallax bg-img-sharp-effect" data-velocity="-.5"  style="background-image: url(' . esc_url ( $background_src ) . ');"></div>
					</div>
					<div class="container">
						<div class="section-title">
							<h1>'.esc_html($title).'</h1>
						</div>
						<div class="row">
							<div class="col-lg-12">
								<ul style="padding-left: 0;margin:0;list-style: none;">
									'.do_shortcode($content).'
								</ul>
							</div>
						</div>
					</div>
				</section>';
			return $output;
		}
	}
}