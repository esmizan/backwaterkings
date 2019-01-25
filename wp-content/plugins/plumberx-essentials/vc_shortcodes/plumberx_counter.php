<?php
if (class_exists ( 'WPBakeryShortCode' )) {
	class WPBakeryShortCode_plumberx_counter extends WPBakeryShortCode {
		
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
					'item_1' => '',
					'item_1_icon' => '',
					'item_1_upto' => '',
					
					'item_2' => '',
					'item_2_icon' => '',
					'item_2_upto' => '',
					
					'item_3' => '',
					'item_3_icon' => '',
					'item_3_upto' => '',
					
					'item_4' => '',
					'item_4_icon' => '',
					'item_4_upto' => ''
					
			), $atts ) );
				
			
			$output = '
			
			<section id="our-achivement">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-3 col-sm-6 achivement text-center">
					<ul>
						<li>
							<span><i class="icon '. esc_html($item_1_icon).'"></i></span> 
							<span><b class="timer" data-from="10" data-to="'. esc_html($item_1_upto).'" data-speed="5000" data-refresh-interval="50">1532</b><br> '. esc_html($item_1).'</span>
						</li>
					</ul>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 achivement text-center">
					<ul>
						<li>
							<span><i class="icon '. esc_html($item_2_icon).'"></i></span> 
							<span><b class="timer" data-from="10" data-to="'. esc_html($item_2_upto).'" data-speed="5000" data-refresh-interval="50">1624</b><br> '. esc_html($item_1).'</span>
						</li>
					</ul>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 achivement text-center">
					<ul>
						<li>
							<span><i class="icon '. esc_html($item_3_icon).'"></i></span> 
							<span><b class="timer" data-from="10" data-to="'. esc_html($item_3_upto).'" data-speed="5000" data-refresh-interval="50">1588</b><br> '. esc_html($item_1).'</span>
						</li>
					</ul>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 achivement text-center">
					<ul>
						<li>
							<span><i class="icon '. esc_html($item_4_icon).'"></i></span> 
							<span><b class="timer" data-from="10" data-to="'. esc_html($item_4_upto).'" data-speed="5000" data-refresh-interval="50">9654</b><br> '. esc_html($item_1).'</span>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</section>';

			return $output;
		}
	}
}