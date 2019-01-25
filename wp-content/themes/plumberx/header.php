<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package Templatation
 * @subpackage Plumberx
 * @since Plumberx 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
<?php do_action('tt_after_body'); ?>

		<?php
		$header_1 = plumberx_return_theme_option ( 'header_style' )=='header_1' ? true:false;
		$header_2 = plumberx_return_theme_option ( 'header_style' )=='header_2' ? true:false;
		$header_3 = plumberx_return_theme_option ( 'header_style' )=='header_3' ? true:false;
		$header_4 = plumberx_return_theme_option ( 'header_style' )=='header_4' ? true:false;
		$header_5 = plumberx_return_theme_option ( 'header_style' )=='header_5' ? true:false;
		
		
		$topbar_control = (plumberx_return_theme_option ( 'topbar_control' )=='enable') ? true:false;
	
		if($header_1){			
			$topbar_control = false;
		}

	    if ( plumberx_option() ) { ?>
		<?php if($header_2) {
			    get_template_part( 'template-parts/header-2' );
		    }
		?>
<?php if( function_exists('plumberx_tt_preloader')) echo plumberx_tt_preloader(); ?>
		<?php  if($topbar_control){
				get_template_part( 'template-parts/topbar' );
			 } ?>

	
	<header class="<?php 
	
	
	if($header_3) 
		echo 'header-v3'; 
	elseif($header_1) 
		echo 'header-v1'; 
	elseif($header_4) 
		echo 'header-v4'; 
	elseif(is_page(163) || $header_4) 
		echo 'home-v2 ';
	else 
		echo 'base';?>">
		
	<?php if(!$header_4){?>
		<div class="search-box">
			<div class="container">
				<div class="pull-right search  col-lg-3 col-md-4 col-sm-5 col-xs-12">
					<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url( '/' )); ?>">
						<input type="text" class="search-field" placeholder="<?php echo esc_attr_x( 'Search Here', 'Search Here', 'plumberx' ); ?>" value="<?php echo get_search_query(); ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'Search Here label', 'plumberx' ); ?>" />
						<button type="submit">
							<i class="icon icon-Search"></i>
						</button>
					</form>
				</div>
			</div>
		</div>
	<?php }?>
	
	<?php
		if (function_exists("plumberx_top_cart")) {
			plumberx_top_cart();
		}
	?>
		
		
	<?php if($header_1 && $topbar_control){?>
		<div class="top-info">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<ul>
							<li><span><i class="fa fa-phone"></i><?php echo plumberx_return_theme_option ( 'phone' );?></span></li>
							<li><span><i class="fa fa-envelope-o"></i><?php echo plumberx_return_theme_option ( 'email' );?></span></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	<?php }?>
	
	<?php if($header_4 || $header_3){?>
		<div class="container">
			<div class="row <?php if($header_4) echo 'header-v4-top'; if($header_3) echo 'header-v3-top'; ?>">
				<div class="col-lg-3 col-md-3  logo">

					<?php if ( function_exists('tt_plumberx_logo') ) echo tt_plumberx_logo(); ?>

				</div>
				<div class="col-lg-9 col-md-9 headerright">
					<ul>
						<li>
							<?php $header_tm_icon = tt_temptt_get_option('hdr_tm_icon', 'icon icon-Timer');
							      if( '' == $header_tm_icon ) $header_tm_icon = 'icon icon-Timer';

								  $header_ph_icon = tt_temptt_get_option('hdr_ph_icon', 'icon icon-Phone2');
							      if( '' == $hdr_ph_icon ) $hdr_ph_icon = 'icon icon-Phone2';
							?>
							<span class="ico"><i class="<?php print $header_tm_icon; ?>"></i></span>
							<span>
								<b><?php echo plumberx_return_theme_option('office_time'); ?></b>
								<?php echo plumberx_return_theme_option('off_day'); ?>
							</span>
						</li>
						<li>
							<span class="ico"><i class="<?php print $header_ph_icon; ?>"></i></span>
							<span>
								<b class="number"><?php echo plumberx_return_theme_option ( 'phone' );?></b>
								<?php echo plumberx_return_theme_option ( 'email' );?>
							</span>
						</li>
						<?php if( tt_temptt_get_option('enable_social', 1)) { ?>
						<li>
							<span>
								<b><?php echo esc_html__('Follow Us','plumberx')?></b>
								<?php
								
								$social_icons = plumberx_return_theme_option ( 'social_icons' );
								$social_links = plumberx_return_theme_option ( 'social_links' );
								$open_social_newtab = ( tt_temptt_get_option('open_social_newtab', '1')) ? 'target=_blank' : '' ;
								$social_links = explode ( ',', $social_links );
								$social_html = '';
								$grab = false;
								$count = 0;
								if (isset ( $social_icons )) {
									foreach ( $social_icons as $key => $icon ) {
										$link = isset($social_links [$count]) ? $social_links [$count] : '#';
										if ($icon != '') {
											$social_html .= '<a ' . $open_social_newtab . ' href="' . esc_url ( $link ) . '"><i class="fa ' . esc_attr ( $key ) . '"></i></a>';
											$grab = true;
										}
										$count ++;
									}
									
									if ($grab) {
										
										
										print $social_html;
									}
								}
								?>		
							</span>						
						</li>
						<?php } ?>

					</ul>
				</div>				
			</div>	
	<?php 
		if($header_4){ 
			echo '</div>';
		}else{ 
			echo '';
		}
	?>
	<?php }?>
		<?php }else{ //Redux Check else ?>
		
		
		<header>
		
	
		<div class="search-box">
			<div class="container">
				<div class="pull-right search  col-lg-3 col-md-4 col-sm-5 col-xs-12">
					<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url( '/' )); ?>">
						<input type="text" class="search-field" placeholder="<?php echo esc_attr_x( 'Search Here', 'Search Here', 'plumberx' ); ?>" value="<?php echo get_search_query(); ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'Search Here label', 'plumberx' ); ?>" />
						<button type="submit">
							<i class="icon icon-Search"></i>
						</button>
					</form>
				</div>
			</div>
		</div>
	
	<?php if (function_exists("plumberx_top_cart")) { plumberx_top_cart(); } ?>
	
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-3  logo">
					<?php if ( function_exists('tt_plumberx_logo') ) echo tt_plumberx_logo(); ?>
				</div>
	<?php }//Redux check end
		

get_template_part('menu-section');
