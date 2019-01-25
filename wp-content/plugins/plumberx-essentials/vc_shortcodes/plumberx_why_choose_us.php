<?php
if (class_exists ( 'WPBakeryShortCode' )) {
	class WPBakeryShortCode_plumberx_why_choose_us extends WPBakeryShortCode {
		
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
			), $atts ) );
						
			$alttext = '';

			if ($img != null) {
				$src = wp_get_attachment_image_src ( $img, 'plumberx_testimonial' );
				$img_src = esc_url ( $src [0] );
				$alttext = tt_temptt_img_alt($img);
			} else {
				$img_src = '';
			}			
			$output = '
				<div class="col-lg-3 col-md-6 col-sm-12">
					<div class="img-wrap wow fadeInDown">
						<img src="' . esc_url ( $img_src ) . '" alt="'.$alttext.'">
					</div>
					<h4>' . esc_html ( $title ) . '</h4>
					<p>'.$content.'</p>
				</div>';

			return $output;
		}
	}
}