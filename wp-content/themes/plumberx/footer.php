<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Templatation
 * @subpackage Plumberx
 * @since Plumberx 1.0
 */
?>

<footer>
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12">
					<?php if ( plumberx_return_theme_option('request_free_quote_text') ) { ?>
				
						<div class="request-for-qoute-wrap">
							<a href="<?php echo plumberx_return_theme_option('quote_link'); ?>" class="request-for-qoute wow slideInDown hvr-bounce-to-right">
								<?php echo plumberx_return_theme_option('request_free_quote_text'); ?>
							</a>
						</div>
					
					<?php }?>
					<?php if( tt_temptt_get_option('enable_ft_menu', '1')) { ?>
					<nav class="footer-menu">
						<button class="footer-nav-toggler hvr-bounce-to-right"><?php esc_html_e('Footer Menu ','plumberx'); ?><i class="fa fa-bars"></i></button>
						
						
						<?php
							/*
							$defaults = array (
									'theme_location' => 'footer_menu',
									'container'       => '',
									'container_class' => '',
									'menu' => '',
									'menu_class'        => '',
									'menu_id'         => '',
									'fallback_cb' => 'wp_page_menu',
									'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
									'depth' => 4,
									'walker' => ''
							);
							
							if(has_nav_menu('footer_menu')) {
									wp_nav_menu( $defaults );
							}else{
								echo esc_html__('No menu assigned!','plumberx');
							}	*/
							?>  
					</nav>
					<?php }?>
				</div>
			</div>
			<div class="row">
				
				<?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
	
					<?php dynamic_sidebar( 'sidebar-2' ); ?>
							
				<?php endif; ?>
							
			</div>
		</div>
	</footer>
	<section id="bottom-bar">
		<div class="container">
				<div class="copyright pull-left">
					
					<?php if ( plumberx_return_theme_option('copyright') ) { ?>
				
						<p><?php echo plumberx_return_theme_option('copyright'); ?></p>
					
					<?php } ?>
					
				</div>
				
				<div class="credit pull-right">
					
					<?php if ( plumberx_return_theme_option('bottom_right_text') ) { ?>
				
						<p><?php echo plumberx_return_theme_option('bottom_right_text'); ?></p>
					
					<?php } ?>
					
				</div>
		</div>
	</section>
<a href="#" class="scrollup"></a>
<?php wp_footer(); ?>
</body>
</html>
