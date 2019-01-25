<?php
 if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {

	     class WPBakeryShortCode_plumberx_sponsor_section extends WPBakeryShortCodesContainer {
			
				protected function content($atts, $content = null) {
					
					
					extract ( shortcode_atts ( array (
						'title' => ''
					), $atts ) );

					$output = '<section  id="clients">
					
								<div class="container"><div class="row">
									<div class="col-lg-12 col-md-12">
										<div class="owl-carousel owl-theme">'.do_shortcode($content).'</div>
									</div>
								</div>
							</div>
						</section>';

					return $output;

				}
		}
	}
