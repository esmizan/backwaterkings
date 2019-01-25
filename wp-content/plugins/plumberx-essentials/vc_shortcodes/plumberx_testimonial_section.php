<?php
 if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {

	    class WPBakeryShortCode_plumberx_testimonial_section extends WPBakeryShortCodesContainer {
			
				protected function content($atts, $description = null) {
					
					
					extract(shortcode_atts(

						array(

							'title' => '',
							'background' => '',
							'version' => ''

						), $atts)

					);
					
					if($version == "version_2"){
						$output = '
						<section id="blog-post" class="testimonials_v2">
							<div class="container">
								<div class="row">
									<div class="col-lg-12 col-md-12 testimonials_v2_content" id="testimonials" style="background:'.esc_html($background).'">';
										
										
										if($title !=""){			
											$output .= '
											<div class="section-title">
												<h1>'.esc_html($title).'</h1>
											</div>';
										}
										$output .= '<div class="row">'.do_shortcode($description).'</div>
									</div>
								</div>
							</div>
						</section>';
					}elseif($version == "version_1"){
						$output = '
						<div class="testimonials_v1">		
						<div id="testimonials" class="testimonials_v1_content" style="background:'.esc_html($background).'">';				
							if($title !=""){			
								$output .= '
								<div class="section-title">
									<h1>'.esc_html($title).'</h1>
								</div>';
							}							
							$output .= '<div class="row">'.do_shortcode($description).'</div>
						</div>
						</div>';
					}else{
						$output = '
						<section  id="testimonials" style="background:'.esc_html($background).'">
							<div class="container">';
					
								if($title !=""){			
									$output .= '
									<div class="section-title">
										<h1>'.esc_html($title).'</h1>
									</div>';
								}							
								$output .= '
								<div class="row">'.do_shortcode($description).'</div>
							</div>
						</section>';
					}

					return $output;

				}
		}

	}