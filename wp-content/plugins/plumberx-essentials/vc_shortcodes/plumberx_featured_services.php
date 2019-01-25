<?php
if (class_exists ( 'WPBakeryShortCode' )) {
	class WPBakeryShortCode_plumberx_featured_services extends WPBakeryShortCode {
		
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
					'background' => '',
					'servicecats' => '',
					'servicelink' => '',

			), $atts ) );
			$alttext = '';
			if ($background != null) {
				
				$src = wp_get_attachment_image_src ( $background, 'testimonial' );
				
				$background_src = 'background:url('.esc_url ( $src [0] ).') repeat-x scroll !important';
				
				
			} else {
				$background_src = '';
			}

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
			<section id="featured-service" style="' . esc_html ( $background_src ) . '">
			<div class="container">';
			if($title !=""){			
						$output .= '
						<div class="section-title">
							<h1>'.esc_html($title).'</h1>
						</div>';
					}
			$output .='<div class="row">';
				$i = 0;
				foreach ( $posts_array as $single_post ) {
					$data_delay = .3*$i;
					setup_postdata( $single_post );
					if (has_post_thumbnail ( $single_post->ID)) {

					//$img =  get_the_post_thumbnail ( $single_post->ID, 'recent_blogs', false ) ;
					$src = wp_get_attachment_image_src ( get_post_thumbnail_id($single_post->ID), 'plumberx_recent_blogs');
					$alttext = tt_temptt_img_alt('', $single_post->ID);
					$img_src = esc_url ( $src [0] );

				} else {

					$img_src = esc_url ( $src [0] );

					//$img = '';

				}
					if( $servicelink ) {
						$output .= '<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 wow zoomIn" data-wow-delay = "' . $data_delay . '">
						<a href='. get_permalink($single_post->ID) .'><div class="img-holder"><img src="' . esc_url( $img_src ) . '" alt="' . $alttext . '"></div></a>
						<a href='. get_permalink($single_post->ID) .'><h4>' . esc_html( $single_post->post_title ) . '</h4></a>
					</div>';
					} else {
						$output .= '<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 wow zoomIn" data-wow-delay = "' . $data_delay . '">
						<div class="img-holder"><img src="' . esc_url( $img_src ) . '" alt="' . $alttext . '"></div>
						<h4>' . esc_html( $single_post->post_title ) . '</h4>
					</div>';
					}
					$i++;
				}
				wp_reset_postdata();
				$output .='				
			</div>
		</div>
	</section>';
				return $output;
			}				
		}
}



?>