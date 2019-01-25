<?php
if (class_exists ( 'WPBakeryShortCodescontainer' )) {
	class WPBakeryShortCode_plumberx_contact_us extends WPBakeryShortCode {
		
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
					'subtitle' => '',
					'background' => '',
					'background_img' => '',
					
					
					'description' => '',
					
					'address_label' => '',
					'address' => '',
					'address_img' => '',
					
					
					
					'contact_phone_label' => '',
					'contact_phone' => '',
					'phone_img' => '',
					
					'contact_email_label' => '',
					'contact_email' => '',
					'email_img' => '',
					
					'extra1_label' => '',
					'extra1_label_img' => '',
					'extra1_label_value' => '',

					'extra2_label' => '',
					'extra2_label_img' => '',
					'extra2_label_value' => '',

			), $atts ) );
			
			
			
/*			if ($background_img != null) {
				$src = wp_get_attachment_image_src ( $background_img, 'contact_bg' );				
				$background_src = 'background:url('.esc_url ( $src [0] ).')  no-repeat fixed right bottom !important';	
			} else {*/
				$background_src = $address_img_src_alt = $phone_img_src_alt = $email_img_src_alt = '';
/*			}*/
			
			if ($address_img != null) {
				$src = wp_get_attachment_image_src ( $address_img, 'full' );
				$address_img_src = esc_url ( $src [0] );
				$address_img_src_alt = tt_temptt_img_alt($address_img);
			} else {
				$address_img_src = get_template_directory_uri() . '/img/contact-page/icon/1.png';
			}
			
			if ($phone_img != null) {
				$src = wp_get_attachment_image_src ( $phone_img, 'full' );
				$phone_img_src = esc_url ( $src [0] );
				$phone_img_src_alt = tt_temptt_img_alt($phone_img);
			} else {
				$phone_img_src = get_template_directory_uri() . '/img/contact-page/icon/3.png';
			}
			
			if ($email_img != null) {
				$src = wp_get_attachment_image_src ( $email_img, 'full' );
				$email_img_src = esc_url ( $src [0] );
				$email_img_src_alt = tt_temptt_img_alt($email_img);
			} else {
				$email_img_src = get_template_directory_uri() . '/img/contact-page/icon/2.png';
			}

			if ($extra1_label_img != null) {
				$src = wp_get_attachment_image_src ( $extra1_label_img, 'full' );
				$extra1_label_img_src = esc_url ( $src [0] );
				$extra1_label_img_src_alt = tt_temptt_img_alt($extra1_label_img);
			}

			if ($extra2_label_img != null) {
				$src = wp_get_attachment_image_src ( $extra2_label_img, 'full' );
				$extra2_label_img_src = esc_url ( $src [0] );
				$extra2_label_img_src_alt = tt_temptt_img_alt($extra2_label_img);
			}


			$contactdesc = '';
			if($content != '') $contactdesc = '<p>'.wp_kses($content, array( 'br'=> array(), 'span'=> array(), 'h3'=> array(),'h1'=> array(),'h2'=> array(),'h4'=> array(), 'h5'=> array(), 'h6'=> array(), 'p'=> array(), 'a'=> array( 'href'=> array()) ) ).'</p>';

			$output ='
			
			<section id="contact-content" style="' . esc_html ( $background_src ) . '">
			<div class="container">';
			if($title !=""){			
				$output .= '
					<div class="section-title">
                    	<h1>'.esc_html($title).'</h1>
                    </div>	';
			}
			if($subtitle !=""){				
			
				$output .= '<p>'.esc_html($subtitle).'</p>';			}
			$output .= '<div class="row">	
				<div class="col-lg-6 col-md-6 col-sm-8 col-xs-12 contact-form">
					'.do_shortcode($description).'
				</div>
				<div class="col-lg-5 col-md-6 col-sm-4 col-xs-12  col-lg-offset-1  col-md-offset-0  col-sm-offset-0  col-xs-offset-0 contact-info">'
					.do_shortcode($contactdesc).
					
					'<ul>
						<li class="clearfix">
							<img src="' . esc_url ( $address_img_src ) . '" alt="'.$address_img_src_alt.'">
							<div class="content">
								<h4>'.esc_html($address_label).'</h4>
								<p>'.esc_html($address).'</p>
							</div>
						</li>
						<li class="clearfix">
							<img src="' . esc_url ( $email_img_src ) . '" alt="'.$email_img_src_alt.'">
							<div class="content">
								<h4>'.esc_html($contact_email_label).'</h4>
								<p>'.esc_html($contact_email).'</p>
							</div>
						</li>
						<li class="clearfix">
							<img src="' . esc_url ( $phone_img_src ) . '" alt="'.$phone_img_src_alt.'">
							<div class="content">
								<h4>'.esc_html($contact_phone_label).'</h4>
								<p>'.esc_html($contact_phone).'</p>
							</div>
						</li>';
				if('' != $extra1_label ) {
					$output .= '
						<li class="clearfix">
							<img src="' . esc_url ( $extra1_label_img_src ) . '" alt="'.$extra1_label_img_src_alt.'">
							<div class="content">
								<h4>'.esc_html($extra1_label).'</h4>
								<p>'.esc_html($extra1_label_value).'</p>
							</div>
						</li>
					';
				}

				if('' != $extra2_label ) {
					$output .= '
						<li class="clearfix">
							<img src="' . esc_url ( $extra2_label_img_src ) . '" alt="'.$extra2_label_img_src_alt.'">
							<div class="content">
								<h4>'.esc_html($extra2_label).'</h4>
								<p>'.esc_html($extra2_label_value).'</p>
							</div>
						</li>
					';
				}


				$output .= '</ul>
				</div>
			</div>
			
		</div>
	</section>';
			return $output;
		}				
	}
}

?>