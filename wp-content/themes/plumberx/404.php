<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package Templatation
 * @subpackage plumberx
 * @since Plumberx 1.0
 */

get_header();
	// grab the hero bg image
	$global_herobg = tt_temptt_get_option('global_herobg');
	if( empty($global_herobg['url']) || !isset($global_herobg['url']) ) $global_herobg['url'] = get_template_directory_uri().'/img/resources/page-title-bg.jpg' ;
?>

			<section id="page-title" style="
			<?php if( !empty($global_herobg['url']) ) echo 'background-image: url('. $global_herobg['url']. ');'; ?>
			">>
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							
							<div class="title pull-left"><h1><?php echo esc_html__('404 Page','plumberx'); ?></h1></div>
							
							<?php 
								if ( function_exists('plumberx_breadcrumb') ) {
									plumberx_breadcrumb();
								}
							?>				
						</div>
					</div>
				</div>
			</section>
	<section id="page-404-content">
		<div class="container">
			<div class="row">
			<?php  if ( '' != plumberx_return_theme_option('image_404','url') ) { ?>
				<img src="<?php echo plumberx_return_theme_option('image_404','url'); ?>" alt="" class="man-404">
			<?php }else{?>
				<img src="<?php echo get_template_directory_uri(); ?>/img/404/404-man.png" alt="" class="man-404">
			<?php }?>
				<div class="col-lg-7 col-md-7 col-sm-9 col-xs-12 col-lg-offset-5 col-md-offset-5 col-sm-offset-2">
					<h1><?php esc_html_e( '404: PAGE NOT FOUND', 'plumberx' ); ?></h1>
					<p><?php esc_html_e( 'We\'re sorry but we can\'t seem to find the page you requested.', 'plumberx' ); ?></p>
					<p><?php esc_html_e( 'This might be because you have typed the web address incorrectly.', 'plumberx' ); ?></p>
					<a href="<?php echo esc_url(home_url('/'));?>" class="button-404 hvr-bounce-to-right"><?php esc_html_e('Go To Home','plumberx')?></a>
				</div>
			</div>
		</div>
	</section>
<?php get_footer(); ?>
