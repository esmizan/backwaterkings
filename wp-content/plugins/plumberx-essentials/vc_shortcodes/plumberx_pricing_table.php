<?php

 if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {


	    class WPBakeryShortCode_plumberx_pricing_table extends WPBakeryShortCodesContainer {

			

				protected function content($atts, $content = null) {
					extract(shortcode_atts(
						array(
							'title' => '',
							'subtitle' => '',
							'background' => ''
						), $atts)
					);
					$output = '
					<section id="pricing-content" style="background:'.esc_html($background).'">
						<div class="container">
							<div class="section-title">
								<h1>'.esc_html($title).'</h1>
							</div>
							<div class="row">
								<div class="col-lg-12">
									<p>'.esc_html($subtitle).'</p>
								</div>
							</div>
							<div class="row price-table-wrap">
								'.do_shortcode($content).'
							</div>
						</div>
					</section>	
					';
					return $output;
				}

		}


	}