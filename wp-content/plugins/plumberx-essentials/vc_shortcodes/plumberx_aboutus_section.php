<?php
if (class_exists ( 'WPBakeryShortCode' )) {
	class WPBakeryShortCode_plumberx_aboutus_section extends WPBakeryShortCode {
		
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
					'title_1' => '',
					'img_1' => '',
					'description_1' => '',
					
					'title_2' => '',
					'img_2' => '',
					'description_2' => '',
					
					'title_3' => '',
					'img_3' => '',
					'description_3' => '',
					
			), $atts ) );
			$img_src_1_alt = $img_src_1_alt = $img_src_1_alt = '';
			
			if ($img_1 != null) {
				$src = wp_get_attachment_image_src ( $img_1, 'plumberx_testimonial' );
				$img_src_1 = esc_url ( $src [0] );
				$img_src_1_alt = tt_temptt_img_alt($img_1) ;
			} else {
				$img_src_1 = '';
			}
			
			if ($img_2 != null) {
				$src = wp_get_attachment_image_src ( $img_2, 'plumberx_testimonial' );
				$img_src_2 = esc_url ( $src [0] );
				$img_src_2_alt = tt_temptt_img_alt($img_2) ;
			} else {
				$img_src_2 = '';
			}
			
			if ($img_3 != null) {
				$src = wp_get_attachment_image_src ( $img_3, 'plumberx_testimonial' );
				$img_src_3 = esc_url ( $src [0] );
				$img_src_3_alt = tt_temptt_img_alt($img_3) ;
			} else {
				$img_src_3 = '';
			}
			

			$output = '
				<section id="who-we-are">
					<div class="container">
						<div class="row">
							<div class="col-lg-6 col-md-12 large-box col-sm-12 col-xs-12">
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 img-holder">
									<img src="' . esc_url ( $img_src_1 ) . '" alt="'.$img_src_1_alt.'">
								</div>
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 ">
									<h2>' . esc_html ( $title_1 ) . '</h2>
									<p>' . esc_html ( $description_1 ) . '</p>
								</div>
							</div>
							<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 single-box">
								<div class="img-holder">
									<img src="' . esc_url ( $img_src_2 ) . '" alt="'.$img_src_2_alt.'">
								</div>
								<h2>' . esc_html ( $title_2 ) . '</h2>
								<p>' . esc_html ( $description_2 ) . '</p>
							</div>
							<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 single-box wow zoomIn" data-wow-duration=".5s" data-wow-delay="1s">
								<div class="img-holder">
									<img src="' . esc_url ( $img_src_3 ) . '" alt="'.$img_src_3_alt.'">
								</div>
								<h2>' . esc_html ( $title_3 ) . '</h2>
								<p>' . esc_html ( $description_3 ) . '</p>
							</div>
						</div>
					</div>
				</section>';
			return $output;
		}
	}
}