<?php
if (class_exists ( 'WPBakeryShortCode' )) {
	class WPBakeryShortCode_plumberx_services_tab extends WPBakeryShortCode {
		
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
					'posts_per_page' => '',
					'servicecats' => ''

			), $atts ) );
			
			
			// Category args (but we also need to be compatible with old version where pb_service was not present)
			$numberOfPost = $posts_per_page != '' ? $posts_per_page : 4;
			if ( isset( $servicecats ) && $servicecats != '' ) {
				$cats_array = explode( ',', trim( $servicecats ));
				$args = array (
						'posts_per_page' => $numberOfPost,
						'post_type' => 'service',
						'post_status' => 'publish',
						'tax_query' => array(
							array(
								'taxonomy' => 'pb_service',
								'field' => 'slug',
								'terms' => $cats_array
							)
						)
						//'suppress_filters' => true
				);
			} else {
				$args = array (
						'posts_per_page' => $numberOfPost,
						'post_type' => 'service',
						'post_status' => 'publish',
						'suppress_filters' => true
				);
			}


			$posts_array = get_posts ( $args );


			$output ='
			<section id="service-we-provide">
				<div class="container">';
					if($title !=""){			
						$output .= '
						<div class="section-title">
							<h1>'.esc_html($title).'</h1>
						</div>';
					}
					$output .='<div class="row">
						<div class="col-lg-3 col-md-3 wow slideInLeft">
							<div class="service-tab-title">
								<ul class="clearfix">';
									$i = 0;
									foreach ( $posts_array as $single_post ) {
										setup_postdata( $single_post );
										if($i==0){
											$class = "active";
										}else{
											$class="";
										}
										$output .='<li class="'.$class.'" data-tab-name="service-'.$i.'">'.esc_html($single_post->post_title).'</li>';
									$i++;
									}
									wp_reset_postdata();
								$output .='</ul>
							</div>
						</div>
						<div class="col-lg-9 col-md-9 wow slideInRight">
							<div class="row">
								<div class="service-tab-content clearfix">';
									$i = 0;
									foreach ( $posts_array as $single_post ) {
										setup_postdata( $single_post );
										$tt_content = get_the_content();
										$tt_content = apply_filters('the_content', $tt_content);
										$output .='<div id="service-'.$i.'">
										'.$tt_content.'
										
										</div>';
									$i++;
									}
									wp_reset_postdata();
						
						
						
						
						
				
						$output .='
							
							</div>
						</div>
					</div>
					</div>
						</div>
					</section>';
				return $output;
			}				
		}
}



?>