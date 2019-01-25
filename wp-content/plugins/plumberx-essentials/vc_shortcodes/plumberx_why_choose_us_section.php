<?php
 if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {

	    class WPBakeryShortCode_plumberx_why_choose_us_section extends WPBakeryShortCodesContainer {
			
				protected function content($atts, $content = null) {
					
					
					extract(shortcode_atts(

						array(

							'title' => '',
							'background' => '',

						), $atts)

					);
					if (!empty($background)) {
						 $bg_color = 'background: ' . esc_html($background).';';
						}
					$output = '
						<section id="why-choose-us" style="'.$bg_color.'">
							<div class="container">
								<div class="section-title">
									<h1>'.esc_html($title).'</h1>
								</div>
								<div class="row">
									'.do_shortcode($content).'
								</div>
							</div>
						</section>';
					
					return $output;

				}
		}

	}