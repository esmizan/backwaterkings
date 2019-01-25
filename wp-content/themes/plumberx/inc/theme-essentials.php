<?php
if ( ! defined( 'ABSPATH' ) ) exit;

/*-----------------------------------------------------------------------------------*/
/* Theme essentials! */
/*-----------------------------------------------------------------------------------*/

update_option('revslider-notices', false);
set_transient( '_redux_activation_redirect', false, 30 );

/**
 * Add default options and show Options Panel after activate
 * @since  4.0.0
 */
global $pagenow;
if ( is_admin() && isset( $_GET['activated'] ) && $pagenow == 'themes.php' ) {
	// Flush rewrite rules.
	flush_rewrite_rules();
	// redirect
	$tt_update_log = get_option( 'tt_plumberx_updates_log');
	if( ! is_array($tt_update_log) ) tt_plumberx_activate_redirect(); // only redirect if its first time activation
}

// Adding redirect
function tt_plumberx_activate_redirect() {

	header( 'Location: ' . admin_url( 'themes.php?page=tgmpa-install-plugins' ) );

} // End tt_plumberx_activate_redirect()



// Adding versions
add_action( 'current_screen', 'tt_plumberx_update_version' );
function tt_plumberx_update_version( $current_screen ) {
	if ( 'appearance_page_tgmpa-install-plugins' == $current_screen->base ) {
		if( function_exists( 'tt_plumberx_firstInst_notice' )) add_action( 'admin_notices', 'tt_plumberx_firstInst_notice' ); // add notice.
	}
	if ( 'toplevel_page__templatation' == $current_screen->base ) {

		$woo_theme = wp_get_theme();
		$woo_this_theme_ver = $woo_theme->get( 'Version' );
		$theme_update_log = get_option( 'tt_plumberx_updates_log');

        if ( ! $theme_update_log ) $theme_update_log = array();

		// First update
		if ( ! in_array('1.0', $theme_update_log) ) {
			array_unshift($theme_update_log, '1.0');
			update_option( 'tt_plumberx_updates_log', $theme_update_log);
		}

		if ( ! in_array($woo_this_theme_ver, $theme_update_log) ) {
			array_unshift($theme_update_log, $woo_this_theme_ver);
			update_option( 'tt_plumberx_updates_log', $theme_update_log);
		}

	}
}

if( !function_exists( 'tt_plumberx_firstInst_notice' )) {
	function tt_plumberx_firstInst_notice() {

			 print '<div class="updated notice is-dismissible" style="padding: 25px 12px;"><span style="text-align:center;font-weight: bold;color:green;"> ' .
		     esc_html__( 'Thanks for Activating Plumberx WordPress theme.', 'buildcon' ) . '</span>'
			 . '<br /> <br />' .

		     esc_html__( 'Theme requires few bundled plugins to function on its full power. Please Install and Activate plugins below.', 'buildcon' )

			 . '<br />' .

		     esc_html__( 'You can choose not to install any particular plugin if you do not need it. eg woocommerce ', 'buildcon' )

			 . '<br /> <br />' .

			 '<span style="text-align:center;font-weight: bold;color:green;"> ' .
		     esc_html__( 'After plugins are activated, Click Dashboard on left top, then go to Appearance > Theme Setup Wizard for further setup.', 'buildcon' ) . '</span>'

		     . '</div>';
	}
}


/**
 * Registers a widget area.
 *
 * @link https://developer.wordpress.org/reference/functions/register_sidebar/
 *
 * @since Plumberx 1.0
 */


function plumberx_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Primary Widget Area', 'plumberx' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here to appear in your sidebar.', 'plumberx' ),
		'before_widget' => '<div id="%1$s" class="widget sidebar-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Shop Widget Area', 'plumberx' ),
		'id'            => 'sidebar-3',
		'description'   => esc_html__( 'Add widgets here to appear in your sidebar.', 'plumberx' ),
		'before_widget' => '<div id="%1$s" class="widget sidebar-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget Area', 'plumberx' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( 'Add widgets here to appear in footer.', 'plumberx' ),
		'before_widget' => '<div id="%1$s" class="col-lg-3 col-md-3 col-sm-6 col-xs-6 widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'plumberx_widgets_init' );



/**
 * Enqueues scripts and styles.
 *
 * @since Plumberx 1.0
 */
function plumberx_scripts() {
		$protocol = is_ssl() ? 'https' : 'http';
		if( tt_temptt_get_option('gmap_api') ) {
			$gmap_api = tt_temptt_get_option('gmap_api');
			wp_register_script( 'goog_maps', $protocol.'://maps.google.com/maps/api/js?key='.$gmap_api, '', null, true );
		} else
			wp_register_script( 'goog_maps', $protocol.'://maps.google.com/maps/api/js', '', null, true );

	wp_register_script( 'g_maps', TT_TEMPTT_THEME_DIRURI . 'js/map.js', '', null, true );
	wp_enqueue_script( 'bootstrap.min', TT_TEMPTT_THEME_DIRURI . 'js/bootstrap.min.js', array( 'jquery' ), null, true );
	wp_enqueue_script( 'isotope.pkgd.min', TT_TEMPTT_THEME_DIRURI . 'js/isotope.pkgd.min.js', '', null, true );
	wp_enqueue_script( 'jquery.appear', TT_TEMPTT_THEME_DIRURI . 'js/jquery.appear.js', '', null, true );
	wp_enqueue_script( 'jquery.countTo', TT_TEMPTT_THEME_DIRURI . 'js/jquery.countTo.js', '', null, true );
	wp_enqueue_script( 'jquery.fancybox.pack', TT_TEMPTT_THEME_DIRURI . 'js/jquery.fancybox.pack.js', '', null, true );

	wp_enqueue_script( 'jquery.mixitup.min', TT_TEMPTT_THEME_DIRURI . 'js/jquery.mixitup.min.js', '', null, true );
	//wp_enqueue_script( 'jquery.scrolly', TT_TEMPTT_THEME_DIRURI . 'js/jquery.scrolly.js', '', null, true );
	wp_enqueue_script( 'owl.carousel.min', TT_TEMPTT_THEME_DIRURI . 'js/owl.carousel.min.js', '', null, true );
	wp_enqueue_script( 'respond', TT_TEMPTT_THEME_DIRURI . 'js/respond.js', '', null, true );
	wp_enqueue_script( 'validate', TT_TEMPTT_THEME_DIRURI . 'js/validate.js', '', null, true );
	wp_enqueue_script( 'swp', TT_TEMPTT_THEME_DIRURI . 'js/idangerous.swiper.min.js', '', null, true );
	wp_enqueue_script( 'custom', TT_TEMPTT_THEME_DIRURI . 'js/custom.js', array( 'jquery' ), null, true );


	// Theme stylesheet.

	wp_enqueue_style( 'swps', TT_TEMPTT_THEME_DIRURI . 'css/idangerous.swiper.css', '', null );
	wp_enqueue_style( 'plumberx-style', TT_TEMPTT_THEME_DIRURI . 'css/themestyle.css', '', null );
	wp_enqueue_style( 'base', get_stylesheet_uri() );
	wp_enqueue_style( 'responsive', TT_TEMPTT_THEME_DIRURI . 'css/responsive.css', '', null );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// Fonts
	wp_enqueue_style( 'tt-fonts', tt_plumberx_g_fonts(), array(), null );

}
add_action( 'wp_enqueue_scripts', 'plumberx_scripts' );


add_action( 'after_setup_theme', 'plumberx_return_theme_option' );


if ( ! function_exists( 'tt_plumberx_g_fonts' ) ) {
	/**
	 * @return string Google fonts URL for the theme.
	 */
	function tt_plumberx_g_fonts() {
		$fonts_url = '';
		$fonts     = array();
		$subsets   = 'latin,latin-ext';

		/* translators: If there are characters in your language that are not supported by Merriweather, translate this to 'off'. Do not translate into your own language. */
		if ( 'off' !== _x( 'on', 'Google font: on or off', 'plumberx' ) ) {
			$fonts[] = 'Open Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic';
			$fonts[] = 'Raleway:400,100,200,300,500,600,700,800,900';
		}

		if ( $fonts ) {
			$fonts_url = add_query_arg( array(
				'family' => urlencode( implode( '|', $fonts ) ),
				'subset' => urlencode( $subsets ),
			), 'https://fonts.googleapis.com/css' );
		}

		return $fonts_url;
	}
}

function plumberx_return_theme_option($string, $str = null) {
	global $plumberx_opt;
	if ($str != null)
		return isset ( $plumberx_opt ['' . $string . ''] ['' . $str . ''] ) ? $plumberx_opt ['' . $string . ''] ['' . $str . ''] : null;
	else
		return isset ( $plumberx_opt ['' . $string . ''] ) ? $plumberx_opt ['' . $string . ''] : null;
}


// admin styles.
if ( ! function_exists( 'tt_plumberx_admin_styles' ) ) {
	function tt_plumberx_admin_styles() {

		wp_enqueue_style( 'theme-admin-css', TT_TEMPTT_THEME_DIRURI . 'css/tt-admin.css' );

	} add_action('admin_enqueue_scripts', 'tt_plumberx_admin_styles', 200);
}


/*--------------------------------------------------------------
 *          One-Page Nav Walker
 *-------------------------------------------------------------*/

  class plumberx_one_page_walker extends Walker_Nav_Menu {
	var $value;
	function __construct($value = NULL) {
		return $this->value = $value;
	}
	function start_lvl(&$output, $depth = 0, $args = array()) {

		$indent = str_repeat ( "\t", $depth );
		$output .= "\n$indent<ul class=\"submenu\">\n";
	}
	function start_el(&$output, $object, $depth = 0, $args = array(), $id = 0) {

		$dropdown_value = 0;
		$indent = ($depth) ? str_repeat ( "\t", $depth ) : '';


		$class_names = $value = '';

		$classes = empty ( $object->classes ) ? array () : ( array ) $object->classes;

		$classes = array_slice ( $classes, 1 );

		$class_names = join ( ' ', apply_filters ( 'nav_menu_css_class', array_filter ( $classes ), $object ) );



		if ($object->object == 'page' && $object->classes [0] != 'notsingle' && $this->value != 'alter') {

			$varpost = get_post ( $object->object_id );
			$separate_page = get_post_meta ( $object->object_id, "lg_separate_page", true );
			$disable_menu = get_post_meta ( $object->object_id, "lg_disable_section_from_menu", true );
			$current_page_id = get_option ( 'page_on_front' );

			if (($disable_menu != true) && ($varpost->ID != $current_page_id)) {

				$output .= $indent . '<li' . $value . '  class=" ' . esc_attr ( $class_names ) .' scrollToLink">';

				if ($separate_page == true)
					$attributes = ! empty ( $object->url ) ? ' href="' . esc_attr ( $object->url ) . '"' : '';
				else {
					if (is_front_page ())
						$attributes = ' href="#' . $varpost->post_name . '"';
					else

						$attributes = ' href="' . esc_url(home_url('/')) . '/#' . $varpost->post_name . '"';

				}
				$object_output = $args->before;
				$object_output .= '<a class="hvr-overline-from-left" ' . $attributes . '>';
				$object_output .= $args->link_before . '' . apply_filters ( 'the_title', $object->title, $object->ID ) . '';
				$object_output .= $args->link_after;
				$object_output .= '</a>';
				$object_output .= $args->after;

				$output .= apply_filters ( 'walker_nav_menu_start_el', $object_output, $object, $depth, $args );
			}
		}

		else {

			if (strpos ( $class_names, 'menu-item-has-children' ) !== false) {
				$output .= $indent . '<li ' . $value .' class="' . esc_attr ( $class_names ) .' dropdown scrollToLink"> ';
				$dropdown_value = 1;
			} else {
				$output .= $indent . '<li ' . $value .'  class=" ' . esc_attr ( $class_names ) .' scrollToLink">';
				$dropdown_value = 0;
			}
			$atts = array ();
			$atts ['title'] = ! empty ( $object->attr_title ) ? $object->attr_title : '';
			$atts ['target'] = ! empty ( $object->target ) ? $object->target : '';
			$atts ['rel'] = ! empty ( $object->xfn ) ? $object->xfn : '';
			$atts ['href'] = ! empty ( $object->url ) ? $object->url : '';

			$atts = apply_filters ( 'nav_menu_link_attributes', $atts, $object, $args );

			$attributes = '';
			foreach ( $atts as $attr => $value ) {
				if (! empty ( $value )) {
					$value = ('href' === $attr) ? esc_url ( $value ) : esc_attr ( $value );
					$attributes .= ' ' . $attr . '="' . $value . '"';
				}
			}

			$object_output = $args->before;
			if ($dropdown_value == 0) {
				if (strpos ( $class_names, 'icon' ) !== false) {
					$object_output .= '<a class="hvr-overline-from-left" ' . $attributes . ' target="_blank">';
					$object_output .= '<i class="icon ' . $classes [0] . '"></i>';
					$object_output .= '</a>';
				} else {
					$object_output .= '<a class="hvr-overline-from-left"' . $attributes . '>';
					$object_output .= $args->link_before . apply_filters ( 'the_title', $object->title, $object->ID ) . $args->link_after;
					$object_output .= '</a>';
				}
			} else {
				$object_output .= '<a class="hvr-overline-from-left" ' . $attributes . '>';
				$object_output .= $args->link_before . apply_filters ( 'the_title', $object->title, $object->ID ) . $args->link_after;
				$object_output .= '</a>';
			}
			$object_output .= $args->after;

			$output .= apply_filters ( 'walker_nav_menu_start_el', $object_output, $object, $depth, $args );
		}
	}
}

add_filter('nav_menu_css_class' , 'plumberx_current_menu_item' , 10 , 2);
function plumberx_current_menu_item($classes, $item){
     if( in_array('current-menu-item', $classes) ){
             $classes[] = 'current ';
     }
     return $classes;
}






function plumberx_pagination($pages = '', $range=4){
     $showitems = ($range * 2)+1;

     global $paged;
     if(empty($paged)) $paged = 1;

     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }
     if(1 != $pages)
     {
		 echo '<div class="post-pagination">
			<ul>
				<li><a href="'.esc_url(get_pagenum_link($paged - 1)).'"><i class="fa fa-angle-double-left"></i></a>';


		for ($i=1; $i <= $pages; $i++){
			if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )){
				echo ($paged == $i)? '<li class="active"><a href="'.esc_attr("javascript:void()").'">'.$i.'</a></li>':'<li><a href="'.esc_url(get_pagenum_link($i)).'">'.$i.'</a></li>';
			}
		}


		echo  '<li><a href="'.esc_url(get_pagenum_link($paged + 1)).'"><i class="fa fa-angle-double-right"></i></a>';

        echo  '</ul></div>';
     }

}


if ( class_exists( 'WooCommerce' ) ) {

	function plumberx_top_cart(){
		global $woocommerce;
			if( ! tt_temptt_get_option('hdr_cart_icon', '1') ) return; // user dont want it

			$output = '<div class="cart-box">
				<div class="container">
					<div class="pull-right cart col-lg-6 col-xs-12">
						<p><i class="icon icon-FullShoppingCart"></i>'.esc_html__(" You have ","plumberx").'<span>'.esc_attr($woocommerce->cart->cart_contents_count) . esc_html__(' Item(s)','plumberx').'</span>'.esc_html__(" in your cart. Total : ","plumberx") . '<a href="'.$woocommerce->cart->get_cart_url().'">'.$woocommerce->cart->get_cart_subtotal().'</a></p>
					</div>
				</div>
			</div>';

		echo $output;
	}
}

function plumberx_option(){
	if ( class_exists( 'Redux' ) ) {
		return true;
	}else{
		return false;
	}
}

/* The end */