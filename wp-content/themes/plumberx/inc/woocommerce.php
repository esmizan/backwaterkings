<?php
/**
 * Plumberx Customizer functionality
 *
 * @package Templatation
 * @subpackage Plumberx
 * @since Plumberx 1.0
 */

add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}

/**
 * Sets up the WordPress core custom header and custom background features.
 *
 * @since Plumberx 1.0
 *
 * @see plumberx_header_style()
 */
 
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);

remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);


remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_output_content_wrapper_end', 10);
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_output_content_wrapper_end', 10);

//remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
//remove_action( 'woocommerce_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );

// moving price
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 22 );
// remove product rating
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);
// remove link
remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
// Remove WC breadcrumb (we're using the wooFramework breadcrumb)
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );

add_action( 'woocommerce_before_main_content', 'tt_wc_plumberx_output_content_wrapper', 10);
function tt_wc_plumberx_output_content_wrapper() {
ob_start(); ?>
<?php if ( is_product_category() ) {
	// grab the hero bg image
	$global_herobg = tt_temptt_get_option('global_herobg');
	if( empty($global_herobg['url']) ) $global_herobg['url'] = get_template_directory_uri().'/img/resources/page-title-bg.jpg' ; ?>
	<section id="page-title" style="
	<?php if( !empty($global_herobg['url']) ) echo 'background-image: url('. $global_herobg['url']. ');'; ?>
	">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">

					<div class="title pull-left"><?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?></div>

				</div>
			</div>
		</div>
	</section>
	<?php
	} else {
		if ( function_exists( 'tt_plumberx_hero_section' ) ) {
			echo tt_plumberx_hero_section();
		}
	}

	?>

<section id="blog-post">
<?php
	echo ob_get_clean();
}

add_action( 'woocommerce_after_main_content', 'tt_wc_plumberx_output_content_wrapper_end', 10);
function tt_wc_plumberx_output_content_wrapper_end() {

	echo '</section><!--.blog-post -->';
}


//add_filter( 'woocommerce_breadcrumb_defaults', 'plumberx_change_breadcrumb_delimiter' );
function plumberx_change_breadcrumb_delimiter( $defaults ) {
	$defaults['wrap_before'] = '<div class="page-breadcumb pull-right"><i class="fa fa-home"></i> ';
	$defaults['wrap_after'] = '</div>';
	$defaults['delimiter'] = ' <i class="fa fa-angle-right"></i> ';
	return $defaults;
}

// Modify cart page image size.
if ( ! function_exists( 'tt_temptt_cart_thumb' ) ) {
	function tt_temptt_cart_thumb( $thumb, $cart_item, $cart_item_key ) {

		$thumb1 = tt_plumberx_post_thumb( '120', '130', false, false, '', $cart_item['product_id'] );
		return $thumb1;

	}

	add_filter( 'woocommerce_cart_item_thumbnail', 'tt_temptt_cart_thumb', 10, 3 );
}
