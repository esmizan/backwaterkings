<?php
/**
 * The template for displaying Archives pages
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Templatation
 * @subpackage plumberx
 * @since Plumberx 1.0
 */

get_header(); ?>
<?php 
	$blog1 = plumberx_return_theme_option ( 'blog_style' )=='blog1' ? true:false;
	$blog2 = plumberx_return_theme_option ( 'blog_style' )=='blog2' ? true:false;
	$blog3 = plumberx_return_theme_option ( 'blog_style' )=='blog3' ? true:false;
	$blog4 = plumberx_return_theme_option ( 'blog_style' )=='blog4' ? true:false;
	// grab the hero bg image
	$global_herobg = tt_temptt_get_option('global_herobg');
	if( empty($global_herobg['url']) ) $global_herobg['url'] = get_template_directory_uri().'/img/resources/page-title-bg.jpg' ;

?>
					
<section id="page-title" style="
<?php if( !empty($global_herobg['url']) ) echo 'background-image: url('. $global_herobg['url']. ');'; ?>
">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">

				<div class="title pull-left"><?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?></div>

				<?php
					if ( function_exists('plumberx_breadcrumb') ) {
						plumberx_breadcrumb();
					}
				?>
			</div>
		</div>
	</div>
</section>
			
			<section id="<?php if($blog3 || $blog4){ echo "blog"; }else{ echo "blog-post"; }?>" <?php if($blog3){ echo 'class="version-two"'; } ?> <?php if($blog4){ echo 'class="home-v2"'; } ?>>
				<div class="container">
					<div class="row">
					
						
						<?php if ( class_exists( 'Redux' ) ) { ?>
						
						
						<?php if($blog1){  ?>

							<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 col-lg-push-0 col-md-push-0 col-sm-push-3 col-xs-push-0 sidebar blog-left">

								<?php get_sidebar();?>
							
							</div>
						<?php }  
						if($blog1 || $blog2){
							?><div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 blog-content"><?php								
						}else{
							?><div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 blog-content"><?php
						}
						
						
						if ( have_posts() ) :
						while ( have_posts() ) : the_post();

						get_template_part( 'template-parts/content', 'blog' );

						endwhile;
						?></div><div class="hide"><?php
						the_posts_pagination( array(
							'prev_text'          => esc_html__( 'Previous page', 'plumberx' ),
							'next_text'          => esc_html__( 'Next page', 'plumberx' ),
							'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', 'plumberx' ) . ' </span>',
						) );
						?></div><?php
						else :
							get_template_part( 'template-parts/content', 'none' );

						endif;
						?>
						
						<?php if($blog2){?>
							<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 col-lg-push-0 col-md-push-0 col-sm-push-3 col-xs-push-0 sidebar">
								<?php get_sidebar();?>
							</div>
						<?php }?>
						
						
						<?php }else{?>
						
						
						<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 blog-content"><?php								
						
						
						if ( have_posts() ) :
						while ( have_posts() ) : the_post();

						get_template_part( 'template-parts/content', 'blog' );

							
						endwhile;
						?></div><div class="hide"><?php
						the_posts_pagination( array(
							'prev_text'          => esc_html__( 'Previous page', 'plumberx' ),
							'next_text'          => esc_html__( 'Next page', 'plumberx' ),
							'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', 'plumberx' ) . ' </span>',
						) );
						?></div><?php
						else :
							get_template_part( 'template-parts/content', 'none' );

						endif;
						?>
						
						
							<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 col-lg-push-0 col-md-push-0 col-sm-push-3 col-xs-push-0 sidebar">
								<?php get_sidebar();?>
							</div>
						
						
						
						<?php }?>
						
						
						
					</div>
					
					<div class="row">
						<?php
							if (function_exists("plumberx_pagination")) {
								plumberx_pagination();
							}
						?>
					</div>
				</div>
			</section>
<?php get_footer(); ?>
