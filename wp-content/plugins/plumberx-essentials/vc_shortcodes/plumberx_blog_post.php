<?php
if (class_exists ( 'WPBakeryShortCode' )) {
	class WPBakeryShortCode_plumberx_blog_post extends WPBakeryShortCode {
		
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
					'orderby' => '',
					'order' => ''
					
			), $atts ) );
			
			
			
			
			$numberOfPost = $posts_per_page != '' ? $posts_per_page : 4;
			$args = array (
					'posts_per_page' => $numberOfPost,
					'orderby' => $orderby!='' ? $orderby : 'date',
					'order' => $order!='' ? $order : 'DESC',
					'include' => '',
					'exclude' => '',
					'meta_key' => '',
					'meta_value' => '',
					'post_type' => 'post',
					'post_mime_type' => '',
					'post_parent' => '',
					'author' => '',
					'post_status' => 'publish',
					'suppress_filters' => true 
			);
			$posts_array = get_posts ( $args );	
			$alttext ='';
			$output ='
				<section id="blog" class="version-two sc">
					<div class="container">';
					
					if($title !=""){			
						$output .= '
						<div class="section-title">
							<h1>'.esc_html($title).'</h1>
						</div>';
					}
					
					
					$output .= '<div class="row">';
						
                   
					foreach ( $posts_array as $single_post ) {
					
					setup_postdata( $single_post );
					
					$content = get_the_excerpt() ;
					
					if (has_post_thumbnail ( $single_post->ID)) {
						$img_src = tt_plumberx_post_thumb('285','210','',false,true,$single_post->ID);
						$alttext = tt_temptt_img_alt('', $single_post->ID);

/*						$src = wp_get_attachment_image_src ( get_post_thumbnail_id($single_post->ID), 'plumberx_blog_full');
						$img_src = esc_url ( $src [0] );*/
					} else {
						$img_src = "";
					}					

					$output .= '
					
					<div class="col-lg-6 col-md-6 col-sm-6 blog-wrap ">
						<div class="col-lg-6 col-md-12 img-wrap">
							<img src="' . esc_url ( $img_src ) . '" alt="'.$alttext.'">
							<div class="h2">'.get_the_date('',$single_post->ID).'</div>
						</div>
						<div class="col-lg-6 col-md-12 content-wrap">
							<h2><a href="' . get_the_permalink ( $single_post->ID ) . '">'.esc_html($single_post->post_title).'</a></h2>
							<p>' . substr($content,0,140) . '</p>
							<ul>
								<li><span><b>'. esc_html__( 'By: ', 'plumberx' ) .'</b>'.get_the_author().'</span></li>
								<li><a href="' . get_the_permalink ( $single_post->ID ) . '">'. esc_html__( 'Read more', 'plumberx' ) .'</a></li>
							</ul>
						</div>
					</div>';
						
					
					
				}
				wp_reset_postdata();
				   
				   
				$output .= ' </div></div></div>';
				return $output;
			}				
		}
}

?>