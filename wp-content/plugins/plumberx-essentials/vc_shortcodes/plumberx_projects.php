<?php
if (class_exists ( 'WPBakeryShortCode' )) {
	class WPBakeryShortCode_plumberx_projects extends WPBakeryShortCode {

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
				'layout' => '',
				'filter' => '',
				'background' => '',
				'projectcats' => '',
				'singlelink' => '',
			), $atts ) );
			$final_link = $alttext = $img_src = '';
			if($layout == '') $layout = 'v1';

			$project_cats = get_terms( 'pb_project' );
			$numberOfPost = $posts_per_page != '' ? $posts_per_page : 6;

			if( !empty($project_cats)) { // user has atleast 1 new taxonomy pb_project, do the updated v1.5 thing
				$cats_array = array();
				// Generate usable array of categories
				foreach ( $project_cats as $cat ) {
					$cats_array[] = $cat->slug;
				}

				// user selected particular tax to show in SC, so update it
				if ( isset( $projectcats ) && $projectcats != '' ) {
					$cats_array = array();
					$cats_array = explode( ',', trim( $projectcats ));
				}

				$args = array (
				'post_type' => 'project',
				'post_status' => 'publish',
				'posts_per_page' => $numberOfPost,
				'tax_query' => array(
						array(
							'taxonomy' => 'pb_project',
							'field' => 'slug',
							'terms' => $cats_array
						)
					)
					//'suppress_filters' => true
				);
			}
			else { // dont break for old customers
				$args = array (
				'post_type' => 'project',
				'post_status' => 'publish',
				'posts_per_page' => $numberOfPost,
				//'suppress_filters' => true
				);
			}



			$the_query = new WP_Query( $args );

			if ($background != null) {
				$src = wp_get_attachment_image_src ( $background, 'full' );
				$background_src = 'background:url('.esc_url ( $src [0] ).') repeat scroll !important';
			} else {
				$background_src = '';
			}

			$section_id = "";
			$section_class = "";
			if( $layout == "v1" ){
				$section_id = "project-version-one";
			}elseif( $layout == "v2" ){
				$section_class = "project-v3";

				$section_id = "project-version-one";
			}elseif( $layout == "v3" ){
				$section_id = "project-version-one";
			}else{
				$section_id = "project-version-one";
				$section_class = "project-v5";
			}

			//if( $layout == "v1" || $layout == "v2" || $layout == "v3" || $layout == "v4"){
			$output = '
			<section id="'.esc_html($section_id).'" class="our-projects '.esc_html($section_class).'" style="' . esc_html ( $background_src ) . '">';
			if( $layout == "v3" ){
				$output .= '<div class="container-fluid">';
			}else{
				$output .= '<div class="container">';
			}
			if($title !=""){
				$output .= '
				<div class="section-title">
					<h1>'.esc_html($title).'</h1>
				</div>';
			}
			if($filter != "off"){
				$output .= '<div class="row">
				<div class="col-lg-12">
					<ul class="gallery-filter">';
					$output .= '<li data-filter="all" class="active filter tt-all"><span>'.esc_html('All').'</span></li>';

			if( !empty($project_cats)) { // user has atleast 1 new taxonomy pb_project, do the updated v1.5 thing
				// creating category filters
				if ( $the_query->have_posts() ) {
					while ( $the_query->have_posts() ) {
						$the_query->the_post();
						$post_cats = get_the_terms( get_the_ID(), 'pb_project' );
						if ( ! empty( $post_cats ) ) {
							foreach ( $post_cats as $post_cat ) {
								$pjcats_array[ $post_cat->slug ] = $post_cat->name;
							}
						}
					}
				}
				foreach ( $pjcats_array as $cat_slug => $cat_name ) :

					$output .= '<li data-filter=".' . $cat_slug . '"><span>' . $cat_name . '</span></li>';
				endforeach;
			}
			else{ // old version compatibility
				$categories = get_categories( $args );
				foreach($categories as $category) {
					if ( ( $category->slug ) != "uncategorized" ) {
						$output .= '<li data-filter=".' . $category->slug . '"><span>' . $category->name . '</span></li>';
					}
				}
			}
					$output .= '
				</ul>
					</div>
				</div>';
			}
			$filoff = 'no-filter';
			if($filter != "off") $filoff = 'image-gallery-mix';
			if( $layout == "v1" ){
				$output .= '<div class="row normal-gallery" id="'.$filoff.'">';
			}elseif( $layout == "v2" ){
				$output .= '<div class="row normal-gallery two-col-gallery" id="'.$filoff.'">';
			}elseif( $layout == "v3" ){
				$output .= '<div class="row normal-gallery gallery-v4" id="'.$filoff.'">';
			}else{
				$output .= '<div class="row normal-gallery gallery-v5 clearfix" id="'.$filoff.'">';
			}

			if ( $the_query->have_posts() ) {
				while ( $the_query->have_posts() ){


					$the_query->the_post();
					if (has_post_thumbnail ()) {
						$src = wp_get_attachment_image_src ( get_post_thumbnail_id(), 'full');
						$img_src = esc_url ( $src [0] );
						$alttext = tt_temptt_img_alt(get_post_thumbnail_id());
					}

					if( $singlelink ) $final_link = get_permalink($the_query->post->ID);
					else $final_link = $img_src;

					$cats = array();
					$cat_name = array();
					$categories = get_the_category();
					foreach($categories as $category){
						array_push($cats,$category->slug);
						array_push($cat_name,$category->name);
					}
					$post_categories = implode(' ',$cats);

					// new version thing
					$post_cats = get_the_terms( get_the_ID(), 'pb_project' );
					$post_cats_data = '';
					if ( ! empty( $post_cats ) ) {
						foreach( $post_cats as $post_cat ) {
							$post_cats_data .= $post_cat->slug . ' ';
						}
						foreach( $post_cats as $post_cat ) {
							$post_cats_data2 = ' ( ' .$post_cat->slug. ' ) ';
						}
					}

					//$image_size = get_post_meta( get_the_ID(), 'image_size' );

					if( $layout == "v1" ){
							$output .= '
							<a href="' . esc_url ( $final_link ) . '" class="fancybox">
							<div class="col-lg-4 col-sm-6 col-xs-12 '.$post_cats_data.' '.$post_categories.' single-project-item">
								<div class="img-wrap">
									<img src="' . esc_url ( $img_src ) . '" alt="'.$alttext.'">
									<div class="content-wrap">
										<div class="border">
											<div class="content">
												<h4>'.esc_html(get_the_title()).'</h4>
												<span class="catname">'.esc_html($cat_name[0]).'</span>
												<span class="catslug">'.esc_html($post_cats_data2).'</span>
											</div>
										</div>
									</div>
								</div>
							</div>
							</a>';


					}elseif( $layout == "v2" ){

							$output .= '
							<a href="' . esc_url ( $final_link ) . '" class="fancybox" >
								<div class="col-lg-6 col-sm-6 col-xs-12 '.$post_cats_data.' '.$post_categories.'  single-project-item hvr-float-shadow mix">
									<div class="img-wrap">
										<div class="overlay">
											<img src="' . esc_url ( $img_src ) . '" alt="'.$alttext.'">
										</div>
									</div>
									<div class="content hvr-bounce-to-bottom">
										<h4>'.esc_html(get_the_title()).'</h4>
												<span class="catname">'.esc_html($cat_name[0]).'</span>
												<span class="catslug">'.esc_html($post_cats_data2).'</span>
									</div>
								</div>
							</a>';

					}elseif( $layout == "v3" ){

							$output .= '
							<a class="fancybox" href="' . esc_url ( $final_link ) . '">
							<div class="col-lg-3 single-project-item col-md-3 col-sm-6	col-xs-12   '.$post_cats_data.' '.$post_categories.'  ">
								<div class="img-wrap">
									<img src="' . esc_url ( $img_src ) . '" alt="'.$alttext.'">
									<div class="content-wrap">
										<div class="border">
											<div class="content">
												<h4>'.esc_html(get_the_title()).'</h4>
												<span class="catname">'.esc_html($cat_name[0]).'</span>
												<span class="catslug">'.esc_html($post_cats_data2).'</span>
											</div>
										</div>
									</div>
								</div>
							</div>
							</a>';

					}elseif( $layout == "v4" ){

							$output .= '
							<a class="fancybox" href="' . esc_url ( $final_link ) . '">
							<div class="col-lg-4 single-project-item col-md-4 col-sm-6	col-xs-12   '.$post_cats_data.' '.$post_categories.'  ">
								<div class="img-wrap">
									<img src="' . esc_url ( $img_src ) . '" alt="'.$alttext.'">
									<div class="content-wrap">
										<div class="border">
											<div class="content">
												<h4>'.esc_html(get_the_title()).'</h4>
												<span class="catname">'.esc_html($cat_name[0]).'</span>
												<span class="catslug">'.esc_html($post_cats_data2).'</span>
											</div>
										</div>
									</div>
								</div>
							</div>
							</a>';

					}else{

						$output .= '
						<div class="single-project-item hvr-float-shadow mix  '.$post_cats_data.' '.$post_categories.'   clearfix">
							<div class="col-lg-8 col-md-8 col-sm-12 img-holder hvr-bounce-to-bottom">
								<div class="overlay"><img src="' . esc_url ( $img_src ) . '" alt="'.$alttext.'"></div>
							</div>
							<div class="col-lg-4 col-md-4 col-sm-12 hvr-bounce-to-bottom">
								<div class="meta">
									<h4>'.esc_html(get_the_title()).'</h4>
												<span class="catname">'.esc_html($cat_name[0]).'</span>
												<span class="catslug">'.esc_html($post_cats_data2).'</span>
								</div>
								<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium dolore mque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis.</p>
								<a href="'.esc_url( get_permalink() ).'" class="read-more hvr-bounce-to-right">'.esc_html("More Infor").'</a>
							</div>

						</div>';

					}

				}
			}

			$output .= '</div></div></section>';
			/* Restore original Post Data */
			wp_reset_postdata();
			return $output;

		}
	}

}