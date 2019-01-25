<?php
if (class_exists ( 'WPBakeryShortCode' )) {
	class WPBakeryShortCode_plumberx_testimonial_1 extends WPBakeryShortCode {
		
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
					'name' => '',
					'img' => '',
					'version' => '',
					'description' => ''

			), $atts ) );
						
			
			if ($img != null) {
				$src = wp_get_attachment_image_src ( $img, 'plumberx_testimonial' );
				$img_src = esc_url ( $src [0] );
				$alttext = tt_temptt_img_alt($img);
			} else {
				$img_src = '';
			}
			

			$output = '<div class="col-lg-4 col-md-4 col-sm-6">';
			
			$output .= '	<div class="single-testimonial ">
						<div class="profile-info pull-left">
							<img src="' . esc_url ( $img_src ) . '" alt="'.$alttext.'">
							<h2>' . esc_html ( $name ) . '</h2>
						</div>

						<div class="content pull-left">
							<p><i class="fa fa-quote-left"></i>  '.$description.'</p>
						</div>
					</div>
				</div>';

			return $output;
		}
	}
	
	
	
	class WPBakeryShortCode_plumberx_testimonial_3 extends WPBakeryShortCode {
		
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
					'name' => '',
					'img' => '',
					'version' => '',
					'description' => ''

			), $atts ) );
			$alttext = '';

			
			if ($img != null) {
				$src = wp_get_attachment_image_src ( $img, 'plumberx_testimonial' );
				$img_src = esc_url ( $src [0] );
				$alttext = tt_temptt_img_alt($img);
			} else {
				$img_src = '';
			}
			
			
			$output = '<div class="col-lg-12 col-md-12 col-sm-6 wow bounceInLeft single-testimoinal-wrap">';
			
			$output .= '	<div class="single-testimonial ">
						<div class="profile-info pull-left">
							<img src="' . esc_url ( $img_src ) . '" alt="'.$alttext.'">
							<h2>' . esc_html ( $name ) . '</h2>
						</div>
						<div class="content pull-left">
							<p><i class="fa fa-quote-left"></i>  '.$description.'</p>
						</div>
					</div>
				</div>';

			return $output;
		}
	}
	
	
	
	class WPBakeryShortCode_plumberx_testimonial_2 extends WPBakeryShortCode {
		
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
					'name' => '',
					'img' => '',
					'version' => '',
					'description' => ''

			), $atts ) );
						
			
			if ($img != null) {
				$src = wp_get_attachment_image_src ( $img, 'plumberx_testimonial' );
				$img_src = esc_url ( $src [0] );
				$alttext = tt_temptt_img_alt($img);
			} else {
				$img_src = '';
			}
			
			
			
			$output = '<div class="col-lg-6 col-md-6 col-sm-6 wow bounceInLeft single-testimoinal-wrap">';
			
			$output .= '	<div class="single-testimonial ">
						<div class="profile-info pull-left">
							<img src="' . esc_url ( $img_src ) . '" alt="'.$alttext.'">
							<h2>' . esc_html ( $name ) . '</h2>
						</div>
						<div class="content pull-left">
							<p><i class="fa fa-quote-left"></i>  '.$description.'</p>
						</div>
					</div>
				</div>';

			return $output;
		}
	}
}