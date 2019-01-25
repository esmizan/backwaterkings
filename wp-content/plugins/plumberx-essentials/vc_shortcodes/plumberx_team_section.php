<?php
 if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
	    class WPBakeryShortCode_plumberx_team_section extends WPBakeryShortCodesContainer {
			
				protected function content($atts, $content = null) {
					
					
					extract ( shortcode_atts ( array (
						'title' => '',												'css_class' => '',
						'background' => ''
					), $atts ) );
					$output = '<section  id="our-specialist" class="'.esc_html($css_class).'" style="background:'.esc_html($background).'"><div class="container">';
					
					if($title !=""){			
						$output .= '
						<div class="section-title">
							<h1>'.esc_html($title).'</h1>
						</div>';
					}							
					$output .= '<div class="row">'.do_shortcode($content).'
						
					</div></div></section>';
					return $output;
				}
		}
	}