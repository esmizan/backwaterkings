<?php
if ( ! defined( 'ABSPATH' ) ) exit;

/*-----------------------------------------------------------------------------------
 *
 * This file contains required functions for the theme.
 * @templatation.com
 *
-----------------------------------------------------------------------------------*/

add_action( 'wp_head', 'tt_plumberx_wp_head', 9 );
if ( ! function_exists( 'tt_plumberx_wp_head' ) ) {
/**
 * Output the default ttFramework "head" markup in the "head" section.
 * @since  2.0.0
 * @return void
 */
function tt_plumberx_wp_head() {
	do_action( 'tt_plumberx_wp_head_before' );

	// Output custom styles to Head.
	if ( function_exists( 'tt_plumberx_custom_styling' ) ) {
		tt_plumberx_custom_styling();
	}

	do_action( 'tt_plumberx_wp_head_after' );
} // End tt_plumberx_wp_head()
}


/*-----------------------------------------------------------------------------------*/
/* tt_temptt_get_option() */
/* Replace values in a provided variable with theme options, if available. */
/*
 * field id should be without tt_
 */
/* TT @since 6.0 */
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists( 'tt_temptt_get_option' ) ) {
	function tt_temptt_get_option( $var, $default = false ) {
		global $plumberx_opt;

		if ( isset( $plumberx_opt[ 'tt_' . $var ] ) ) {
			$var = $plumberx_opt[ 'tt_' . $var ];
		} else {
			$var = $default;
		}

		return $var;
	} // End tt_temptt_get_option()
}


/*-----------------------------------------------------------------------------------*/
/* tt_get_dynamic_value() */
/* Replace values in a provided array with theme options, if available. */
/*
/* $settings array should resemble: $settings = array( 'theme_option_without_tt' => 'default_value' );
/*
/* @since 4.4.4 */
/*-----------------------------------------------------------------------------------*/
if( !function_exists( 'tt_temptt_opt_values' )) {
	function tt_temptt_opt_values( $settings ) {
		global $plumberx_opt;

		if ( is_array( $plumberx_opt ) ) {
			foreach ( $settings as $k => $v ) {

				if ( is_array( $v ) ) {
					foreach ( $v as $k1 => $v1 ) {
						if ( isset( $plumberx_opt[ 'tt_' . $k ][ $k1 ] ) && ( $plumberx_opt[ 'tt_' . $k ][ $k1 ] != '' ) ) {
							$settings[ $k ][ $k1 ] = $plumberx_opt[ 'tt_' . $k ][ $k1 ];
						}
					}
				} else {
					if ( isset( $plumberx_opt[ 'tt_' . $k ] ) && ( $plumberx_opt[ 'tt_' . $k ] != '' ) ) {
						$settings[ $k ] = $plumberx_opt[ 'tt_' . $k ];
					}
				}
			}
		}

		return $settings;
	} // End tt_temptt_opt_values()
}

/*-----------------------------------------------------------------------------------*/
/* Add a class to body_class if fullwidth slider to appear. */
/*-----------------------------------------------------------------------------------*/

add_filter( 'body_class','plumberx_tt_body_class', 10 );// Add layout to body_class output

if ( ! function_exists( 'plumberx_tt_body_class' ) ) {
function plumberx_tt_body_class( $classes ) {

	global $wp_query;
	$current_page_template = $single_data2 = $tt_post_id = $single_enable_headline = '';


	if ( !tt_temptt_get_option('default_animations', '0') ) { $classes[] = 'no-ani'; }
	//if ( tt_temptt_get_option('en_sticky_logo', '1') ) { $classes[] = 'no-st-logo'; }
	if ( tt_temptt_get_option('en_sticky_logo_mob', '1') ) { $classes[] = 'no-mob-st-logo'; }
	if ( ! tt_temptt_get_option('sticky_menu', '1') ) { $classes[] = 'st-menu-off'; }

	return $classes;
  }
}


/*-----------------------------------------------------------------------------------*/
/* Post/page title
/*-----------------------------------------------------------------------------------*/
// returns title based on the requirement.

if (!function_exists( 'tt_temptt_post_title')) {
function tt_temptt_post_title( $tag='' ){

	global $wp_query;
	$tt_post_id = $single_item_layout = $output = $single_data2 = '';
	if( empty($tag)) $tag = 'h3';
	$output = '';
		if ( ! is_404() && ! is_search() ) {
			if ( ! empty( $wp_query->post->ID ) ) {
				$tt_post_id = $wp_query->post->ID;
			}
		}
		if ( ! empty( $tt_post_id ) ) {
			$single_data2 = get_post_meta( $tt_post_id, '_tt_meta_page_opt', true );
		}
		if ( is_array( $single_data2 ) && !( is_home() || is_front_page()) ) {
			if ( !$single_data2['_hide_title_display'] ) { // return title ONLY if explicitly turned off by user.
				$output = '<div class="title pull-left"><'.$tag. ' class="ml-title">'. get_the_title() .'</'.$tag.'></div>';
			}
		}

	return $output;
}
}

/*-----------------------------------------------------------------------------------*/
/* Fetch ALT tags for images
/*-----------------------------------------------------------------------------------*/
// returns title based on the requirement.

if (!function_exists( 'tt_temptt_img_alt')) {
function tt_temptt_img_alt( $imgid = '', $postid = '' ){
$alt = '';
if( '' == $imgid && '' != $postid ) // if only post id is given, fetch imgid from it.
$imgid = get_post_thumbnail_id( $postid );

if($imgid) $alt = get_post_meta( $imgid, '_wp_attachment_image_alt', true);

return htmlspecialchars($alt);

}
}

/*-----------------------------------------------------------------------------------*/
/* Is Hero area ? */
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists( 'tt_plumberx_is_hero_section' ) ) {
	function tt_plumberx_is_hero_section() {
	// check whether hero section disabled in page meta.
	global $wp_query;
	$tt_post_id = $single_enable_hero = $single_data2 = ''; $enable_hero_display = true;
	if ( !is_404() && !is_search() ) {
		if ( ! empty( $wp_query->post->ID ) ) {
			$tt_post_id = $wp_query->post->ID;
		}
	}
	if(is_home()) $tt_post_id = get_option( 'page_for_posts' );
	if( isset($tt_post_id) ) $single_data2 = get_post_meta( $tt_post_id, '_tt_meta_page_opt', true );
	if( is_array($single_data2) ) {
		if ( isset( $single_data2['_enable_hero_display'] ) ) $enable_hero_display = $single_data2['_enable_hero_display'];
	}
	if ( $enable_hero_display === false ) return false; // disabled in page meta

		return true;
	} // End tt_plumberx_is_hero_section()
}


/*-----------------------------------------------------------------------------------*/
/* Hero area */
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists( 'tt_plumberx_hero_section' ) ) {
	function tt_plumberx_hero_section( ) {

	// check whether its disabled in page meta.
	if ( ! tt_plumberx_is_hero_section() ) return ''; // disabled in page meta, nothing left to do.

	// prepare hero section
	global $wp_query;
	$tt_post_id = $bgimage = $single_enable_headline = $single_headline_title = $single_text_align = $single_page_color = $single_page_img = $single_text_apprnce = $single_hero_breadcrumbs = $hide_title_display = $single_display_breadcrumbs = '';
	if ( is_404() || is_search() ) return;
	if( isset($wp_query->post->ID)) $tt_post_id = $wp_query->post->ID;
	if(is_home()) $tt_post_id = get_option( 'page_for_posts' );
	if( empty($tt_post_id) ) return; // nothing left to do!
	if ( class_exists( 'woocommerce' ) ) {
		if ( is_shop() ) {
			$tt_post_id = get_option( 'woocommerce_shop_page_id' );
		}
		if ( is_account_page() ) {
			$tt_post_id = get_option( 'woocommerce_myaccount_page_id' );
		}
		if ( is_checkout() ) {
			$tt_post_id = get_option( 'woocommerce_checkout_page_id' );
		}
		if ( is_cart() ) {
			$tt_post_id = get_option( 'woocommerce_cart_page_id' );
		}
	}

	// fetching value from single posts .
	$single_data2 = get_post_meta( $tt_post_id, '_tt_meta_page_opt', true );
	if( is_array($single_data2) ) {
		if ( isset( $single_data2['_single_headline_title'] ) ) $single_headline_title = esc_attr($single_data2['_single_headline_title']);
		if ( isset( $single_data2['_single_page_img'] ) ) $single_page_img = esc_textarea($single_data2['_single_page_img']);
		if ( isset( $single_data2['_single_page_color'] ) ) $single_page_color = esc_attr($single_data2['_single_page_color']);
		if ( isset( $single_data2['_single_hero_breadcrumbs'] ) ) $single_hero_breadcrumbs = esc_attr($single_data2['_single_hero_breadcrumbs']);
	}

	// grab the hero bg image
	$global_herobg = tt_temptt_get_option('global_herobg');
	if( empty($global_herobg['url']) ) $global_herobg['url'] = get_template_directory_uri().'/img/resources/page-title-bg.jpg' ;
	$single_page_img = $single_page_img ? $single_page_img : $global_herobg['url'];

	$single_page_color = !empty($single_page_color) ? $single_page_color = 'background-color: '. $single_page_color.';' : '';
	ob_start() ?>
	<section id="page-title" style="
			<?php if( !empty($single_page_img) ) echo 'background-image: url('. $single_page_img. ');'; ?>
			">
		<div class="overlay-clr" style="<?php echo esc_html($single_page_color); ?>"></div>
		<div class="container">
			<div class="row">
				<div class="col-lg-12">

					<?php echo ( !empty( $single_headline_title ) ) ?
						'<div class="title pull-left"><h1>'.esc_attr($single_headline_title).'</h1></div>' :
						'<div class="title pull-left"><h1>'. get_the_title($tt_post_id) .'</h1></div>';

					if( $single_hero_breadcrumbs ) {
						if ( function_exists( 'plumberx_breadcrumb' ) ) {
							plumberx_breadcrumb();
						}
					}
					?>
				</div>
			</div>
		</div>
	</section>
	<?php
		return ob_get_clean();
	} // End tt_plumberx_hero_section()
}



function plumberx_breadcrumb() {

		// Breadcrumb
		 if ( function_exists('yoast_breadcrumb') ) {
			 yoast_breadcrumb('<div class="page-breadcumb pull-right"><i class="fa fa-home"></i>','</div>');
			 return;
		    }


    global $post;
	$separator = "<i class=\"fa fa-angle-right\"></i>";

    echo '<div class="page-breadcumb pull-right"><i class="fa fa-home"></i>';
	if (!is_front_page()) {
		echo '<a href="';
		echo esc_url(home_url());
		echo '">';
		echo esc_html__('Home', 'plumberx');
		echo '</a>'.$separator;
		if ( is_category() || is_single() ) {
			echo tt_plumberx_get_cats('single');
			if ( is_single() ) {
				echo $separator;
				the_title();
			}


		} elseif ( is_page() && $post->post_parent) {



			$home = get_page(get_option('page_on_front'));
			for ($i = count($post->ancestors)-1; $i >= 0; $i--) {
				if (($home->ID) != ($post->ancestors[$i])) {
					echo '<a href="';
					echo esc_url(get_permalink($post->ancestors[$i]));
					echo '">';
					echo get_the_title($post->ancestors[$i]);
					echo "</a>".$separator;
				}
			}
			echo the_title();
		} elseif (is_page()) {
			echo the_title();
		} elseif (is_404()) {
			echo esc_html__('404','plumberx');
		}
	} else {
		echo '<a href="';
		echo home_url();
		echo '">';
		echo esc_html__('Home','plumberx');
		echo '</a>';
	}
	echo '</div>';
}


/*-----------------------------------------------------------------------------------*/
/* Load custom logo. */
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists( 'tt_plumberx_logo' ) ) {
function tt_plumberx_logo () {
	global $plumberx_opt;
	$width = $height = $style = $logo = '';
	$settingsl = array(
					'retina_favicon' => '0',
					'texttitle' => '0',
					'logo' => '',
					'retina_logo_wh' => '',
				);
	$settingsl = tt_temptt_opt_values( $settingsl );

	// for plumberx theme only
	$plumberx_opt['tt_logo']['url'] = plumberx_return_theme_option('logo','url') ;

	$logo = esc_url( TT_TEMPTT_THEME_DIRURI . 'img/logo.png' );
	if ( isset( $plumberx_opt['tt_logo']['url'] ) && $plumberx_opt['tt_logo']['url'] != '' ) { $logo = $plumberx_opt['tt_logo']['url'] ; }
	if ( is_ssl() ) { $logo = str_replace( 'http://', 'https://', $logo ); }
?>

	<a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'description' ) ); ?>">
	 <?php if ( '0' == $settingsl['retina_favicon'] ) { ?>
		<img src="<?php echo esc_url( $logo ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" />
	 <?php } else {
		if( !empty($settingsl['retina_logo_wh']['width']) ) {
			if (strpos($settingsl['retina_logo_wh']['width'],'px') !== false) {
				$width = 'width:'.$settingsl['retina_logo_wh']['width'].';';
			}
			else{
				$width = 'width:'.$settingsl['retina_logo_wh']['width'].'px;';
			}
		}
		if( !empty($settingsl['retina_logo_wh']['height']) ) {
			if (strpos($settingsl['retina_logo_wh']['height'],'px') !== false) {
				$height = 'height:'.$settingsl['retina_logo_wh']['height'].';';
			}
			else{
				$height = 'height:'.$settingsl['retina_logo_wh']['height'].'px;';
			}
		}

		if ( !empty($width) ) $style .= $width;
		if ( !empty($height) ) $style .= $height ;
		if ( !empty($style) ) $style = 'style="'.$style.'"';
		?>
		<img src="<?php echo esc_url( $logo ); ?>" <?php echo wp_strip_all_tags( $style ); ?> alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" />
	 <?php } ?>
	</a>
<?php
} // End tt_plumberx_logo()
}

/*-----------------------------------------------------------------------------------*/
/* Function to retrieve categories. */
/*-----------------------------------------------------------------------------------*/
/*
 * it can either return single category or all categories separated by comma.
 * by default it returns all category separated by comma but if single category is required, just pass 'single' into the fn.
 *
 */
if (!function_exists('tt_plumberx_get_cats')) {
	function tt_plumberx_get_cats( $return='' ) {
		global $post, $wp_query;
		$output = '';
		$post_type_taxonomies = get_object_taxonomies( get_post_type(), 'objects' );
		foreach ( $post_type_taxonomies as $taxonomy ) {
			if ( $taxonomy->hierarchical == true ) {

				$cats       = get_the_terms( get_the_ID(), $taxonomy->name );
				$cats_count = 0;
				if ( $cats ) {
					foreach ( $cats as $cat ) {
						$cats_count ++;
						if ( $cats_count > 1 && $return == 'single' ) {
							break;
						}
						if ( $cats_count > 1 ) {
							$output .= ', ';
						}
						$output .= ' <a class="tt_cats ' . $taxonomy->name . '" href="' . get_term_link( $cat, $taxonomy->name ) . '">' . $cat->name . '</a> ';
					}
				}
			}
		}
		return $output;
	}
}

/*-----------------------------------------------------------------------------------*/
/* Templatation , render featured post thumb function.                               */
/*-----------------------------------------------------------------------------------*/
if ( !function_exists( 'tt_plumberx_post_thumb') ) {
	function tt_plumberx_post_thumb( $width = null, $height = null, $lightbox = true, $crop = true, $srconly = false, $id = '' ) {
		global $plumberx_opt, $post;
		if( empty($id) ) $id = get_the_ID();
		if( empty($id) ) return ''; // no id, nothing left to do.
		$output = $single_w = $single_h = $featuredimg = '';

		$featuredimg =  get_post_thumbnail_id($id);
		$featuredimg = wp_get_attachment_image_src( $featuredimg, 'full' );
		$featuredimg = $featuredimg[0];

		if( !isset( $featuredimg ) || empty ( $featuredimg ) ) return ''; // no image found, return.

		// if width and height is not given, we dont need to resize so output the full image.
		if( empty( $width ) || empty ( $height ) ) {

			if( $srconly ) { $returnimg = wp_get_attachment_image_src( get_post_thumbnail_id($id), 'full' ); $returnimg = $returnimg[0]; }
			else $returnimg = get_the_post_thumbnail($id, 'full');

			return $returnimg;
		}

		$featuredimg = tt_plumberx_aq_resize( $featuredimg, $width, $height, $crop, false ); // this returns an array if image was cropped, and url otherwise.

		if( is_array( $featuredimg )) {
			$output = '
				<a class="fancybox" href="'.$featuredimg[0].'">
						<img width="'.$featuredimg[1].'" height="'.$featuredimg[2].'" class="img-responsive" alt="" src="'.$featuredimg[0].'">
				</a>
			';
			if ( !$lightbox ) $output = '<img width="'.$featuredimg[1].'" height="'.$featuredimg[2].'" class="img-responsive" alt="" src="'.$featuredimg[0].'">'; // if no lightbox needed, turn the link off.
		}
		else $output = '<img class="img-responsive" alt="" src="'.$featuredimg.'">'; // image was not cropped so AQ returned URL.

		if( $srconly )  $output = isset($featuredimg[0]) ? $featuredimg[0] : $featuredimg;
		return $output;
	}
}



/*-----------------------------------------------------------------------------------*/
/* Preloader. */
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists( 'plumberx_tt_preloader' ) ) {
function plumberx_tt_preloader () {

	if ( tt_temptt_get_option( 'enable_preloader', '0' ) == '1') {
		return '
		<div id="loader-wrapper">
		 <div class="tt-loading-center">
		  <div class="tt-loading-center-absolute">
		   <div class="tt-object object_four"></div>
		   <div class="tt-object object_three"></div>
		   <div class="tt-object object_two"></div>
		   <div class="tt-object object_one"></div>
		  </div>
		 </div>
		</div>
		';
	}

} // End plumberx_tt_preloader()
}


/*-----------------------------------------------------------------------------------*/
/* Add Custom Styling to HEAD */
/*-----------------------------------------------------------------------------------*/
// this is hooked into wp_head.

if ( ! function_exists( 'tt_plumberx_custom_styling' ) ) {
	function tt_plumberx_custom_styling( $force = false ) {

		$output = $body_image = '';
		// Get options
		$settings = array(
			'second_color' => '',
			'main_acnt_clr' => '',
			'top_bar_clr' => '',
			'sticky_menu' => '1',
			'custom_css' => ''
		);
		$settings = tt_temptt_opt_values( $settings );

		if($force) { // we have been forced to show specific colors.
			global $plumberx_opt;
			$settings['main_acnt_clr'] = $plumberx_opt['tt_main_acnt_clr'];
			$settings['second_color'] = $plumberx_opt['tt_second_color'];
		}
		// Type Check for Array
		if ( is_array($settings) ) {
			if ( ! ( $settings['main_acnt_clr'] == '' )) { // if usr changed!

				$output .= '

.tp-caption .frontcorner, .tp-caption .backcorner, .tp-caption .frontcornertop,.tp-caption .backcornertop, .banner .banner-form .tab-title div.active,.section-title-style-2 h1,	.post-pagination ul li.active a,.post-pagination ul li:hover a, #blog.version-two .post-pagination ul li.active a,#blog.version-two .post-pagination ul li:hover a,.home-v2#project-version-two .gallery-filter li.active span,.request-a-qoute-container .tab-title ul li span.active,.banner.horizontal.home-v1 .tab-title,.banner.horizontal.home-v1 .tab-title div:after,.request-a-qoute-container ul.vc_tta-tabs-list li.vc_active, header .mainmenu-container ul li.top-icons:hover a i, #testimonials .single-testimonial .content, .tt-object

{ border-color: ' . $settings['main_acnt_clr'] . '; }

#topbar .contact-info ul li:hover a,#topbar .contact-info ul li a:before,header .cart-box, .banner .banner-form .tab-content p input[type="text"]:focus,.banner .banner-form .tab-content p button:before, #who-we-are .large-box .col-lg-6:last-child,.service-tab-title ul li.active:before, .our-projects .section-title h1:before, #our-specialist .single-member .info:before,#blog .content-wrap:before,#service-content .hvr-bounce-to-right:before,#featured-service .section-title h1:before,#blog-post .sidebar-widget h4:before,.post-pagination ul li.active a,.post-pagination ul li:hover a,#pricing-content .price-table-wrap .price-table button:before,#project-version-one .gallery-filter li.active span:before,#project-version-two .gallery-filter li.active span:before,#blog-post .no-search-content h2:after, #blog-post.faq .faq-content .faq-title h2:after, #blog-post article .popular-question h2:after,#blog.version-two .post-pagination ul li.active a,#blog.version-two .post-pagination ul li:hover a,  header.home-v2, .home-v2 .search-box, #subscribe-section,#our-achivement, .request-a-qoute-container .tab-content form ul li input:hover,.request-a-qoute-container .tab-content form ul li input:focus,.request-a-qoute-container .tab-content form ul li input:focus,.request-a-qoute-container .container .request-a-qoute-with-tooltip,header.header-v1.header-fixed, #header-v1-banner h1.blue,header.header-v3 .mainmenu-container, header.header-v3 .mainmenu-container > ul > li > a:before,.banner-header-v3-button,  #project-version-one .normal-gallery.gallery-v5 .single-project-item .col-lg-8:before,#project-version-one .normal-gallery.gallery-v5 .single-project-item .col-lg-4:before,#project-version-one .normal-gallery.gallery-v5 .single-project-item .meta:before,.cart-page .add-to-cart-wrap a:before, .cart-page .cart-total-box .proceed-to-checkout a:before,body.woocommerce-page .single-shop-item a.add-to-cart:before, .our-projects.with-filter .gallery-filter li.active span:before,.banner.home-v1 .banner-form .tab-content .wpcf7-form-control:focus,.banner.home-v1 .banner-form .tab-content input[type="submit"]:hover,.banner.horizontal.home-v1 .tab-title div, .request-a-qoute-container  .request-a-qoute-with-tooltip,.woocommerce-checkout #blog-post h1:before, .woocommerce-checkout #blog-post h2:before,.woocommerce-checkout #blog-post h3:before, .woocommerce-checkout #blog-post h4:before,.woocommerce-checkout #blog-post h5:before, .woocommerce-checkout #blog-post h6:before,.woocommerce nav.woocommerce-pagination ul li a:hover,.woocommerce nav.woocommerce-pagination ul li span.current,#our-mission .img-holder:before, #featured .about-image:before, #service-content .img-holder:before,#featured-service .img-holder:before, .products h2::before, .cart_totals h2::before, .cross-sells h2::before, .section-title h1::before, #blog .content-wrap::before,.hvr-radial-out::before, #project-version-one .single-project-item .img-wrap .content-wrap:before, #our-specialist .single-member .info, .hvr-bounce-to-top:before, .checkout-button:before, .hvr-bounce-to-right:before, .single_add_to_cart_button:before, .add_to_cart_button:before, header.header-v3 .mainmenu-container > ul > li:hover > a, header.header-v3 .mainmenu-container > ul > li.current > a

{ background-color:' . $settings['main_acnt_clr'] . '; }



header .mainmenu-container ul li.top-icons a i, header .search-box form button,.banner .banner-txt h1,#who-we-are .single-box:hover h2, .service-tab-title ul li:hover,.service-tab-title ul li.active,  #testimonials .single-testimonial .content .fa,#blog .content-wrap ul li a, footer .footer-menu ul li a,footer .widget a.read-more,#contact-content  .success,#project-version-one .gallery-filter li.active span,#project-version-one .gallery-filter li:hover span,#project-version-two .gallery-filter li.active span,#project-version-two .gallery-filter li:hover span, button.mainmenu-toggler, .home-v2#topbar .social ul li a,.home-v2#project-version-two .gallery-filter li:hover span, .home-v2#project-version-two .gallery-filter li.active span,.home-v2#pricing-faq ul li h2, .request-a-qoute-container .tab-content .success,.request-a-qoute-container .tab-content form ul li:focus label,.request-a-qoute-container .container .request-a-qoute-with-tooltip:hover,.request-a-qoute-container .container .request-a-qoute-with-tooltip:focus,.request-a-qoute-container .container .request-a-qoute-with-tooltip i,header.header-v3 .col-lg-9 ul li span a:hover .fa,header.header-v3 .col-lg-9 ul li span .icon,h1.banner-header-v3-heading.blue,header.header-v4 .col-lg-9 ul li span a:hover .fa,header.header-v4 .col-lg-9 ul li span .icon,header.header-v4 .mainmenu-container ul li.top-icons a i,#banner.header-v2 h1 span, .our-projects.with-filter .gallery-filter li.active span,.our-projects.with-filter .gallery-filter li:hover span,.our-projects.with-filter .gallery-filter li:hover span,.our-projects.with-filter .gallery-filter li.active span,.page-template-frontpage-php #topbar .social ul li a,.request-a-qoute-container .request-a-qoute-with-tooltip:hover,.request-a-qoute-container .request-a-qoute-with-tooltip:focus,.request-a-qoute-container .request-a-qoute-with-tooltip i,mark,ins, #who-we-are .single-box:hover h2, header .mainmenu-container ul li.top-icons:hover a i, button.mainmenu-toggler:hover

{ color: ' . $settings['main_acnt_clr'] . '; }
@media only screen and (max-width: 991px) {
header .mainmenu-container ul.mainmenu li a {
    background-color: ' . $settings['main_acnt_clr'] . ';
}}
@media (max-width: 991px) {
	#emergency:before{
	    background-color: ' . $settings['main_acnt_clr'] . ';
	}
}
@media only screen and (max-width: 767px) {
footer .footer-menu ul {
Ωaqasz1qaZAQWEZSAZZΩ1SAZA1qw}}
';

	}

} // End If Statement


if ( is_array($settings) ) {
	if ( ! ( $settings['second_color'] == '' )) { // if usr changed!

		$output .= '

.custom-checkbox input+span,.button.color-1:hover, .button.color-1.style-1,.swiper-arrow-left.color-1.type-1,.swiper-arrow-right.color-1.type-1,.text-widget>a:hover, .tabs-line, .tab-switch,.tabs-drop,.testimonials .swiper-slide.swiper-slide-active .one-slide .one-img,.message.color-1, .message.color-1 .message-close:hover,.search.line .submit-button:hover, .sort-drop,.one-item.style-2>a:hover,  .menu,   .tabs.style-2 .tabs-drop,.tabs.style-2.active .tabs-line, .main-slider.style-2 .swiper-chained-bottom .swiper-slide.chained-active span,.cell-view.blog, .grid, .one-blog.detail-banner .special-subtitle a:hover,.tt-video-play:before, .tt-tesmimonals-img:hover img,.tt-contact, .tt-product-image:hover,.tt-tab-wrapper .tt-nav-tab-item:after,.tt-feature-2-imgage:hover .tt-feature-2-img,  .wpcf7-form .wpcf7-submit:hover,.sidebar-widget .tagcloud a:hover, .woocommerce-tabs ul li.active,.comment-form .form-submit input[type="submit"],button,html input[type="button"],input[type="reset"],input[type="submit"],.woocommerce .woocommerce-message, .woocommerce .woocommerce-info,.woocommerce-cart table.cart td.actions .coupon .input-text:focus, footer .container, .mainmenu-container ul > li > ul, footer .container .col-lg-12 a.request-for-qoute,header.header-v3 .mainmenu-container,button.mainmenu-toggler:hover
{ border-color: ' . $settings['second_color'] . '; }


#loader-wrapper,.title-3:after,.title-4.color-2:after,.custom-checkbox input:checked+span:before, .overlay-2:before, .button.color-1, .button.color-1.style-1:hover, .button.color-6.style-2:hover,.swiper-arrow-left.color-1.style-1,.swiper-arrow-right.color-1.style-1,.swiper-arrow-left.color-1.type-1:hover,.swiper-arrow-right.color-1.type-1:hover,.accordeon.type-3 .accordeon-title.active, a.tag:hover,.tab-switch.active, .icon-tweet,.message.color-1 .message-close, .info-one:hover span,.search .submit-button, .sub-menu.style-2 > ul > li:hover,header.active .menu-icon span,.footer.style-2 .menu-title:after,.page-pagination a:hover,.page-pagination a.active,.border-image:before,.border-image:after,.border-image span:before,.border-image span:after,.border-image-2:before,.border-image-2:after,.border-image-2 span:before,.border-image-2 span:after,.tt-success.type-2 .tt-success-icon:hover,.tt-team:hover,  .tt-team:hover .tt-team-inner,.tt-video-close, a.tt-product-2-desc:hover, .round-hover:before,.tt-timeline-line,.tt-timeline-row:last-child:after,.tt-timeline-row.date:before, .tt-tab-wrapper .tt-nav-tab-item,.tt-tab-wrapper .tt-nav-tab-item.active:before,.tt-tab-wrapper .tt-tab-select .select-arrow,.tt-service-post-link:after, .tt-feature-link:after,.tt-search-2-inner input[type="submit"],.tt-progress-bar,  .wpcf7-form .wpcf7-submit,.page  .faq-search .widget_search .searchsubmit,.pink-title .title-4:after, .sidebar-widget .tagcloud a:hover,.checkout-content .order-box ul li a.place-order,.vc_row[data-vc-full-width] .contact-form input[type="submit"],.faq .faq-content .faq-search input[type="submit"],#blog-post .no-search-content .suggesion-input input[type="submit"],.place-order input#place_order,.cart-page .add-to-cart-wrap input[type="submit"],.product-details-box .single_add_to_cart_button,.request-a-qoute-container .wpcf7-submit,.woocommerce  button.single_add_to_cart_button,#contact-content .wpcf7-submit,#pricing-content .price-table-wrap .price-table button,#pricing-content .price-table-wrap .price-table a,.comment-form .form-submit input[type="submit"],button,html input[type="button"],input[type="reset"],input[type="submit"],.woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover,.woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover,.woocommerce span.onsale, .woocommerce button.button.alt, .woocommerce input.button.alt,.added_to_cart.wc-forward, .woocommerce-cart table.cart td.actions .coupon input.button:hover,#blog-post article .img-holder a:before,#blog-post article .img-holder a:after,.woocommerce .widget_price_filter .ui-slider .ui-slider-range,.woocommerce .widget_price_filter .ui-slider .ui-slider-handle,.woocommerce .widget_price_filter .price_slider_wrapper .ui-widget-content,#blog-post .shear_area .shear a, #blog-post .comment-box .comment-box-field .comment-box-submit input[type=submit],.scrollup, #colorSelector_2 .inner-color, .woocommerce a.button, .promotional-text, .banner.home-v1 .banner-form .tab-content input[type="submit"], #service-content button, .vcbtn, footer .widget .social li a, header .mainmenu-container ul li a::before,#topbar .social ul li:hover a,header .mainmenu-container ul li a:before, #our-specialist .single-member .info, #project-version-one .two-col-gallery .single-project-item .content:before, #emergency p.phone-contact a:before, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, body.woocommerce-page .single-shop-item a.add-to-cart, footer .container .col-lg-12 a.request-for-qoute,header.header-v3 .mainmenu-container > ul > li.current > a, header.header-v3 .mainmenu-container ul li a:hover, header.header-v3 .mainmenu-container > ul > li.current-menu-ancestor > a, #why-choose-us .col-lg-3 .img-wrap,button.mainmenu-toggler:hover, header .search-box

{ background-color:' . $settings['second_color'] . '; }

a, .simple-article ul.style-4 li:before, .button.color-1:hover,.button.color-1.style-1,.button.color-4.style-1:hover, .swiper-arrow-left.color-1, .swiper-arrow-right.color-1,.swiper-arrow-left.color-2:hover,.swiper-arrow-right.color-2:hover,.swiper-arrow-left.color-3:hover,.swiper-arrow-right.color-3:hover,.swiper-arrow-left.color-1.style-1:hover,.swiper-arrow-right.color-1.style-1:hover,.swiper-arrow-left.color-1.type-1,.swiper-arrow-right.color-1.type-1,.typography div,  .widget-title, .article-title:hover, .info-widget-title:hover,.accordeon-title.active,.one-content, .accordeon-title.active:after,.name a:hover, .reply a:hover, .icon-search .fa, .categories a:hover,.post-title:hover, .tab-switch,.tabs-drop, .tweet-text a:hover,.message.color-1 .message-close:hover, .line-text span,.search.line .submit-button:hover input,  .login a:hover,.sort-drop a.text-sort:not(.active):hover,.info-one .fa, .social a:hover, nav > ul > li:hover > a,nav > ul > li > a.active,.item-title:hover, .price,.footer-nav a:hover,.footer-nav a:hover .fa,.footer-bottom .social a:hover,.footer.style-2 .one-contact a:hover,.footer.style-2 .footer-nav a:hover, .footer.style-2 .footer-nav a:hover .fa,.footer.style-2 .footer-bottom .social a,.prod-title:hover, .breadcrumbs ul li a .fa, .breadcrumbs ul li a:hover,.social a:hover, .detail-ph > a .fa, .collection a:not(.button):hover,.simple-article h1 a, .quote-author, .detail-content .simple-article p:first-letter,.one-box .fa, .one-box a:hover, .tt-success-icon, .tt-success.type-2 .tt-success-title:hover,.tt-counter-desc, .tt-product-title:hover, .tt-product-title:hover span,.tt-client-link:hover, .tt-client-name,.tt-timeline-title:hover, .tt-tab-wrapper .tt-tab-select select,.tt-service-post-link:hover, .tt-feature-link:hover,.tt-feature-2-title:hover, .tt-search-2-inner input[type="submit"]:hover,.tt-topics a:hover,  a.help-link-item:hover, a.help-link-item.active,.wpcf7-form .wpcf7-submit:hover, .sidebar-widget li:hover > a,.checkout-content .return-customer a,.checkout-content .order-box ul li a span, #blog-post .general-question .panel-body .panel_body_up h2,.woocommerce-checkout #payment .payment_method_paypal .about_paypal, #blog-post .comments_area .single_comment .comment_text p span a,#blog-post article .expert_quote_area .col-lg-12 .expert_quote h6,#blog-post article .expert_quote_area .col-lg-12 .expert_quote span,header .mainmenu-container > ul > li.current-menu-ancestor > a,.sticky,  .sticky .post-title h2,.sticky,.sticky  .post-title h2,  .post-date a,.woocommerce div.product p.price, .woocommerce div.product span.price,span.amount, .woocommerce .woocommerce-message::before,.woocommerce .woocommerce-info::before,#blog-post article .post-date, #blog-post article > .read-more,  ul.red_list li .fa, #blog .img-wrap h2, #blog .img-wrap .h2 a, #blog .img-wrap h2, #blog .img-wrap .h2, header .mainmenu-container > ul > li.current > a, header .mainmenu-container ul li a:hover,header nav.mainmenu-container ul > li > ul > li > a:hover, header nav.mainmenu-container ul > li > ul > li > a:hover:after,.mainmenu-container ul > li.dropdown:after, footer .widget .social li:hover a, footer .widget .popular-post li a:hover h5, footer .footer-menu ul li a:hover, footer .container .col-lg-12 a.request-for-qoute:hover, footer .container .col-lg-12 a.request-for-qoute:focus, div.wpcf7-response-output, .service-tab-content ul li .fa
{ color: ' . $settings['second_color'] . '; }

header.header-v3 .mainmenu-container > ul > li.current > a, header.header-v3 .mainmenu-container ul li a:hover {color:#fff;}
.woocommerce-tabs ul li.active{border-top-color: ' . $settings['second_color'] . ' !important; }

@media (min-width: 992px) {
    header.header-v3 .mainmenu > li > ul > li > a:hover{
        color: ' . $settings['second_color'] . ';
    }
}
@media only screen and (max-width: 991px){
header .mainmenu-container ul.mainmenu li a:hover, header .mainmenu-container ul.mainmenu li.current > a {
    background-color: ' . $settings['second_color'] . ';
}}

';

	}

} // End If Statement
        if (!($settings['top_bar_clr'] == '')) { $output .= '#topbar{ background: '.$settings['top_bar_clr'].'}'; }
        if ($settings['sticky_menu'] == '0') { $output .= '.header-v4.header-fixed, .header-v3.header-fixed, .base.header-fixed{ display:none; }'; }

			if ( $settings['custom_css'] != '' ) {
				$output .= $settings['custom_css'];
			}


		// Output styles
		if ( isset( $output ) && $output != '' ) {
			$output = strip_tags( $output );
			// Remove space after colons
			$output = str_replace(': ', ':', $output);
			// Remove whitespace
			$output = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '   ', '    '), '', $output);

			$output = "\n" . "<!-- Theme Custom Styling -->\n<style type=\"text/css\">\n" . $output . "</style>\n";
			echo  $output; // its already sanitized by redux.
		}
	} // End tt_plumberx_custom_styling()
}


/*-----------------------------------------------------------------------------------*/
/* Function for color switcher. */
/*-----------------------------------------------------------------------------------*/
/*
 * it only works on demo websites, where its needed by the way.
 */
if( strpos(get_site_url(),'plumberwp.wpengine')) {
	add_action('tt_after_body', 'tt_temptt_clr_switcher');
	add_action('wp_head', 'tt_temptt_clr_switcher_scripts');
}
if (!function_exists('tt_temptt_clr_switcher_scripts')) {
	function tt_temptt_clr_switcher_scripts() {
		$output = '';
		ob_start(); ?>
	<script type="text/javascript" src="<?php  echo get_template_directory_uri(); ?>/inc/switcher/jquery.cookie.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/inc/switcher/jscript_styleswitcher.js"></script>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/inc/switcher/styleswitcher.css" />

	<?php
		$output = ob_get_clean();
		print $output; // its safe to output, all variables already escaped above.
}
}

if (!function_exists('tt_temptt_clr_switcher')) {
	function tt_temptt_clr_switcher( ) {
		ob_start(); ?>

<!-------------------------------------------------------------------/
Color switcher for demo, to be removed from live website.
<!------------------------------------------------------------------->

	<?php
	if( $_COOKIE['ttcookie1'] != '31AFE2' || $_COOKIE['ttcookie2'] != 'FE5454' ) { // only trigger following if user actually changed colors
		global $plumberx_opt;
		$plumberx_opt['tt_main_acnt_clr'] = '#'.esc_attr($_COOKIE['ttcookie1']);
		$plumberx_opt['tt_second_color']  = '#'.esc_attr($_COOKIE['ttcookie2']);
		tt_plumberx_custom_styling(true);

	}
	?>
<!-- ADD Switcher -->
<div class="demo_changer">
	<div class="demo-icon"><i class="fa fa-gear"></i></div>
	<div class="form_holder">
		<p class="color-title">THEME OPTIONS</p>

		<div class="predefined_styles">
			<div class="clear"></div>
		</div>
		<p>Change colors !</p>
		<?php
		if(isset($_COOKIE['ttcookie1'])) {
			$style = '#' . $_COOKIE['ttcookie1'];
		} else {
			$style = '#31AFE2';
		}
		if(isset($_COOKIE['ttcookie2'])) {
			$style2 = '#' . $_COOKIE['ttcookie2'];
		} else {
			$style2 = '#FE5454';
		}
		?>
		<div class="color-box">
			<div class="col-col">
				<div  id="colorSelector">
					<div class="inner-color" style="background-color: <?php  echo esc_attr($style);?>"></div>
				</div>
				<p>Color 1</p>
			</div>
			<div class="col-col">
				<div  id="colorSelector_2">
					<div class="inner-color" style="background-color: <?php  echo esc_attr($style2);?>"></div>
				</div>
				<p>Color 2</p>
			</div>
		</div>
		<span class="switcherbutton clear switchspan"><a rel="stylesheet" class="switchapply switchinner" href="">APPLY COLORS</a></span>
		<span class="switcherbutton switcherreset clear switchspan"><a rel="stylesheet" class="switcherreset switchinner" href="">RESET TO DEFAULT</a></span>
		<span class="clear switchspan"><a rel="stylesheet" class="normallink" href="http://plumberwp.wpengine.com/">Back to landing page</a></span>
        <span class="clear switchspan"><a rel="stylesheet" class="buy normallink" href="http://themeforest.net/item/plumberx-plumber-and-construction-wordpress-theme/14036883">Purchase PlumberX</a></span>
        <span class="clear switchspan alignl">Note: Some colors are controlled by Slider & Pagebuilder.</span>
	</div>
</div>

<!-- END Switcher -->
<!-------------------------------------------------------------------/
EOF Color switcher for demo, to be removed from live website.
<!------------------------------------------------------------------->
<?php
		$output = ob_get_clean();
		print $output; // its safe to output, all variables already escaped above.
	}
}


/*-----------------------------------------------------------------------------------*/
/* Image Resizer script for on the fly resizing                                     */
/*-----------------------------------------------------------------------------------*/
// Source: https://github.com/syamilmj/Aqua-Resizer

if( ! class_exists('tt_plumberx_Aq_Resize') ) {

	/**
	 * Image resizing class
	 *
	 * @since 1.0
	 */
	class tt_plumberx_Aq_Resize {

		/**
		 * The singleton instance
		 */
		static private $instance = null;

		/**
		 * No initialization allowed
		 */
		private function __construct() {}

		/**
		 * No cloning allowed
		 */
		private function __clone() {}

		/**
		 * For your custom default usage you may want to initialize an Aq_Resize object by yourself and then have own defaults
		 */
		static public function getInstance() {
			if(self::$instance == null) {
				self::$instance = new self;
			}

			return self::$instance;
		}

		/**
		 * Run, forest.
		 */
		public function process( $url, $width = null, $height = null, $crop = null, $single = true, $upscale = true ) {

			// Validate inputs.
			if ( ! $url || ( ! $width && ! $height ) ) return false;

			$upscale = true;

			// Caipt'n, ready to hook.
			if ( true === $upscale ) add_filter( 'image_resize_dimensions', array($this, 'aq_upscale'), 10, 6 );

			// Define upload path & dir.
			$upload_info = wp_upload_dir();
			$upload_dir = $upload_info['basedir'];
			$upload_url = $upload_info['baseurl'];

			$http_prefix = "http://";
			$https_prefix = "https://";

			/* if the $url scheme differs from $upload_url scheme, make them match
			   if the schemes differe, images don't show up. */
			if(!strncmp($url,$https_prefix,strlen($https_prefix))){ //if url begins with https:// make $upload_url begin with https:// as well
				$upload_url = str_replace($http_prefix,$https_prefix,$upload_url);
			}
			elseif(!strncmp($url,$http_prefix,strlen($http_prefix))){ //if url begins with http:// make $upload_url begin with http:// as well
				$upload_url = str_replace($https_prefix,$http_prefix,$upload_url);
			}


			// Check if $img_url is local.
			if ( false === strpos( $url, $upload_url ) ) return false;

			// Define path of image.
			$rel_path = str_replace( $upload_url, '', $url );
			$img_path = $upload_dir . $rel_path;

			// Check if img path exists, and is an image indeed.
			if ( ! file_exists( $img_path ) or ! getimagesize( $img_path ) ) return false;

			// Get image info.
			$info = pathinfo( $img_path );
			$ext = $info['extension'];
			list( $orig_w, $orig_h ) = getimagesize( $img_path );

			// Get image size after cropping.
			$dims = image_resize_dimensions( $orig_w, $orig_h, $width, $height, $crop );
			$dst_w = $dims[4];
			$dst_h = $dims[5];

			// Return the original image only if it exactly fits the needed measures.
			if ( ! $dims && ( ( ( null === $height && $orig_w == $width ) xor ( null === $width && $orig_h == $height ) ) xor ( $height == $orig_h && $width == $orig_w ) ) ) {
				$img_url = $url;
				$dst_w = $orig_w;
				$dst_h = $orig_h;
			} else {
				// Use this to check if cropped image already exists, so we can return that instead.
				$suffix = "{$dst_w}x{$dst_h}";
				$dst_rel_path = str_replace( '.' . $ext, '', $rel_path );
				$destfilename = "{$upload_dir}{$dst_rel_path}-{$suffix}.{$ext}";

				if ( ! $dims || ( true == $crop && false == $upscale && ( $dst_w < $width || $dst_h < $height ) ) ) {
					// Can't resize, so return false saying that the action to do could not be processed as planned.
					return $url;
				}
				// Else check if cache exists.
				elseif ( file_exists( $destfilename ) && getimagesize( $destfilename ) ) {
					$img_url = "{$upload_url}{$dst_rel_path}-{$suffix}.{$ext}";
				}
				// Else, we resize the image and return the new resized image url.
				else {

					$editor = wp_get_image_editor( $img_path );

					if ( is_wp_error( $editor ) || is_wp_error( $editor->resize( $width, $height, $crop ) ) )
						return $url;

					$resized_file = $editor->save();

					if ( ! is_wp_error( $resized_file ) ) {
						$resized_rel_path = str_replace( $upload_dir, '', $resized_file['path'] );
						$img_url = $upload_url . $resized_rel_path;
					} else {
						return $url;
					}

				}
			}

			// Okay, leave the ship.
			if ( true === $upscale ) remove_filter( 'image_resize_dimensions', array( $this, 'aq_upscale' ) );

			// Return the output.
			if ( $single ) {
				// str return.
				$image = $img_url;
			} else {
				// array return.
				$image = array (
					0 => $img_url,
					1 => $dst_w,
					2 => $dst_h
				);
			}

			return $image;
		}

		/**
		 * Callback to overwrite WP computing of thumbnail measures
		 */
		function aq_upscale( $default, $orig_w, $orig_h, $dest_w, $dest_h, $crop ) {
			if ( ! $crop ) return null; // Let the wordpress default function handle this.

			// Here is the point we allow to use larger image size than the original one.
			$aspect_ratio = $orig_w / $orig_h;
			$new_w = $dest_w;
			$new_h = $dest_h;

			if ( ! $new_w ) {
				$new_w = intval( $new_h * $aspect_ratio );
			}

			if ( ! $new_h ) {
				$new_h = intval( $new_w / $aspect_ratio );
			}

			$size_ratio = max( $new_w / $orig_w, $new_h / $orig_h );

			$crop_w = round( $new_w / $size_ratio );
			$crop_h = round( $new_h / $size_ratio );

			$s_x = floor( ( $orig_w - $crop_w ) / 2 );
			$s_y = floor( ( $orig_h - $crop_h ) / 2 );

			return array( 0, 0, (int) $s_x, (int) $s_y, (int) $new_w, (int) $new_h, (int) $crop_w, (int) $crop_h );
		}

	}

}


if ( ! function_exists('tt_plumberx_aq_resize') ) {

	/**
	 * Resize an image using tt_plumberx_Aq_Resize Class
	 *
	 * @since 1.0
	 *
	 * @param string $url     The URL of the image
	 * @param int    $width   The new width of the image
	 * @param int    $height  The new height of the image
	 * @param bool   $crop    To crop or not to crop, the question is now
	 * @param bool   $single  If true only returns the URL, if false returns array
	 * @param bool   $upscale If image not big enough for new size should it upscale
	 * @return mixed If $single is true return new image URL, if it is false return array
	 *               Array contains 0 = URL, 1 = width, 2 = height
	 */
	function tt_plumberx_aq_resize( $url, $width = null, $height = null, $crop = null, $single = true, $upscale = false ) {
		$aq_resize = tt_plumberx_Aq_Resize::getInstance();
		return $aq_resize->process( $url, $width, $height, $crop, $single, $upscale );
	}

}


/*-----------------------------------------------------------------------------------*/
/* Admin CSS */
/*-----------------------------------------------------------------------------------*/
if(!function_exists('plumberx_admin_css')) {
	function plumberx_admin_css() {
		echo '<style>';
			echo 'tr[data-slug="slider-revolution"] + .plugin-update-tr, .vc_license-activation-notice, .rs-update-notice-wrap, tr.plugin-update-tr.active#js_composer-update { display: none !important;}';
		echo '</style>';
	}
}
add_action('admin_head', 'plumberx_admin_css');

/* EOF */