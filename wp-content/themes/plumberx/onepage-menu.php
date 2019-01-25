<?php 		
	
	$header_1 = plumberx_return_theme_option ( 'header_style' )=='header_1' ? true:false;	
	$header_2 = plumberx_return_theme_option ( 'header_style' )=='header_2' ? true:false;	
	$header_3 = plumberx_return_theme_option ( 'header_style' )=='header_3' ? true:false;	
	$header_4 = plumberx_return_theme_option ( 'header_style' )=='header_4' ? true:false;	
	$header_5 = plumberx_return_theme_option ( 'header_style' )=='header_5' ? true:false;		
	
	$topbar_control = plumberx_return_theme_option ( 'topbar_control' )=='enable' ? true:false;		
	
	if(!$header_5){			
		$topbar_control = false;		
	}			
	if($header_1 ||$header_2 ||$header_5){			    
		$menu_class = 'mainmenu pull-right';	
		$menu_Container = 'col-lg-9 col-lg-pull-0 col-md-pull-1';		
	}elseif($header_3){	
	
		$menu_class = 'mainmenu pull-left';			
		$menu_Container = 'col-lg-12';		
	}elseif($header_4){		
		$menu_class = 'mainmenu col-lg-8 col-md-10 col-lg-push-0 col-md-push-2 pull-left';		
		$menu_Container = 'col-lg-12';		
	}else{			
		$menu_class = 'mainmenu';		
		$menu_Container = 'col-lg-12';		
	}?>		
	
	<?php if($header_4){?>		
		<div class="header-v4-bottom">			
		<div class="container">				
		<div class="row">
	<?php }elseif($header_3){?>				
		<div class="row header-v3-bottom">	
	<?php }?>		
	<?php if($header_1 || $header_2 || $header_5){?>		
		<div class="container">			
		<div class="row">			
		<div class="col-lg-3 col-md-4 <?php if($header_4){ echo 'col-lg-offset-0 col-md-offset-4';}elseif($header_5||$header_2){ echo 'col-lg-offset-0 col-md-offset-4';}?> logo">				
			<?php if ( function_exists('tt_plumberx_logo') ) echo tt_plumberx_logo(); ?>
		</div>		
	<?php }?>							
	<nav class="<?php echo esc_html($menu_Container);?> col-md-12 mainmenu-container">								
		<?php if($header_1 ||$header_2 ||$header_5){?>				
		<ul class="top-icons-wrap pull-right">			
<?php if ( tt_temptt_get_option('hdr_search_icon', '1') ) {?><li class="top-icons search"><a href="#"><i class="icon icon-Search"></i></a></li><?php }?>							<?php if( class_exists( 'woocommerce' ) && tt_temptt_get_option('hdr_cart_icon', '1') ) { ?>
							<li class="top-icons cart"><a href="#"><i class="icon icon-ShoppingCart"></i></a></li>
							<?php } ?>
		</ul>				
		<?php }?>										
		<button class="mainmenu-toggler">	
			<i class="fa fa-bars"></i>				
		</button>		


	<?php	
		$fornt_page = 'scrollto';							
		$object;	
		
		if (is_front_page ()) {								
			$object = new plumberx_one_page_walker ( $fornt_page );	
		} else {					
			$object = new plumberx_one_page_walker ( $fornt_page = '' );	
		}							
		$defaults = array (						
			'theme_location' => 'onepage',									
			'menu' => '',			
			'container' => '',									
			'menu_class' => $menu_class,		
			'menu_id' => '',								
			'echo' => true,						
			'fallback_cb' => 'wp_page_menu',									
			'before' => '',			
			'after' => '',								
			'link_before' => '',						
			'link_after' => '',									
			'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',	
			'depth' => 4,									
			'walker' => $object 						
		);		
		if (has_nav_menu ( 'onepage' )) {					
			wp_nav_menu ( $defaults );			
		} 													
		?> 							           
		<?php if($header_3 ||$header_4){?>					
		<ul class="top-icons-wrap pull-right">	
<?php if ( tt_temptt_get_option('hdr_search_icon', '1') ) {?><li class="top-icons search"><a href="#"><i class="icon icon-Search"></i></a></li><?php }?>							<?php if( class_exists( 'woocommerce' ) && tt_temptt_get_option('hdr_cart_icon', '1') ) { ?>
							<li class="top-icons cart"><a href="#"><i class="icon icon-ShoppingCart"></i></a></li>
							<?php } ?>
		</ul>				
		<?php }?>								              
	</nav>
	<?php if(!$header_3){?>	
	</div>	
	</div>
	<?php }?>			
	<?php if($header_4){?>		
	</div>	
	<?php }?>	
	</header>
	
	
	
	