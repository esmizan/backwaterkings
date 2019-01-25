<?php
if (class_exists ( 'WPBakeryShortCode' )) {
	class WPBakeryShortCode_plumberx_team extends WPBakeryShortCode {
		
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
					'team_img' => '',
					'name' => '',
					'designation' => '',
					'social_icons' => '',
					'social_links' => '',
					'teamcol' => ''
			), $atts ) );
			if($teamcol == '') $teamcol = 'default';

			if ($team_img != null) {
				$src = wp_get_attachment_image_src ( $team_img, 'plumberx_team' );
				$team_img_src = esc_url ( $src [0] );
				$alttext = tt_temptt_img_alt($team_img);
			} else {
				$team_img_src = '';
			}
			
			$icons = explode ( ',', esc_html ( $social_icons ) );
			$links = explode ( ',', esc_url ( $social_links ) );
			
			if ($social_links != 'no') {
				
				$social_html = '<ul class="social">';									
				
				foreach ( $icons as $key => $icon ) {
					$link = $links [$key] == null ? '#' : $links [$key];
					$social_html .= '<li><a href="' . esc_url ( $link ) . '"><i class="fa '. esc_attr ( $icon ) . '"></i></a></li> ';
				}
				$social_html .= ' </ul>';
			} else {
				$social_html = '';
			}
			if($link == '#') $social_html = '';
			if($teamcol == 'teamcol3') {
				$output = '
				<div class="col-lg-6 col-md-6 col-sm-6 wow zoomIn hvr-float-shadow" data-wow-duration=".5s" data-wow-delay="0">
                    <div class="single-member hvr-bounce-to-bottom">
						<img src="' . esc_url( $team_img_src ) . '" alt="' . $alttext . '">
						<div class="info hvr-bounce-to-top">
							' . $social_html . '
							<h2>' . esc_html( $name ) . '</h2>
							<p class="position">' . esc_html( $designation ) . '</p>
						</div>  
                    </div>          
                </div>';
			} else {
				$output = '
				<div class="col-lg-3 col-md-3 col-sm-6 wow zoomIn hvr-float-shadow" data-wow-duration=".5s" data-wow-delay="0">
                    <div class="single-member hvr-bounce-to-bottom">
						<img src="' . esc_url( $team_img_src ) . '" alt="' . $alttext . '">
						<div class="info hvr-bounce-to-top">
							' . $social_html . '
							<h2>' . esc_html( $name ) . '</h2>
							<p class="position">' . esc_html( $designation ) . '</p>
						</div>
                    </div>
                </div>';
			}

			return $output;
		}
	}
}