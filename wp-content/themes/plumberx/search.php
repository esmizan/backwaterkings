<?php
/**
 * The template for displaying search results pages
 *
 * @package Templatation
 * @subpackage plumberx
 * @since Plumberx 1.0
 */

/* Removing soft-error for seo purpose */
if ( !have_posts() ) {
	header( 'HTTP/1.0 404 Not Found' );
	get_template_part('404');
	die();
}

get_header();
?>
<?php 
	$blog1 = plumberx_return_theme_option ( 'blog_style' )=='blog1' ? true:false;
	$blog2 = plumberx_return_theme_option ( 'blog_style' )=='blog2' ? true:false;
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
				
				<div class="title pull-left"><h1><?php printf( esc_html__( 'Search Results for: %s', 'plumberx' ), get_search_query() ); ?></h1></div>
							
			</div>
		</div>
	</div>
</section>
	


<section id="blog-post">
	<div class="container">
		<div class="row">
			
			<?php if ( class_exists( 'Redux' ) ) { ?>
			
			<?php if($blog1){  ?>

				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 col-lg-push-0 col-md-push-0 col-sm-push-3 col-xs-push-0 sidebar blog-left">

					<?php get_sidebar();?>
				
				</div>
			<?php }  
			
			
			
			if($blog1 || $blog2){
				?><div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 search-content"><?php								
			}else{
				?><div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 search-content"><?php
			}
			if ( have_posts() ) : 
			while ( have_posts() ) : the_post();
			
				get_template_part( 'template-parts/content', 'blog' );
				
				
			endwhile;
			?><div class="hide"><?php
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
			</div>
			<?php if($blog2){?>
				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 col-lg-push-0 col-md-push-0 col-sm-push-3 col-xs-push-0 sidebar">
					<?php get_sidebar();?>
				</div>
			<?php }?>
		
		<?php }else{?>
		
			<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 search-content"><?php								
			
			if ( have_posts() ) : 
			while ( have_posts() ) : the_post();
			
				get_template_part( 'template-parts/content', 'blog' );
				
				
			endwhile;
			?><div class="hide"><?php
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
			</div>
			
				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 col-lg-push-0 col-md-push-0 col-sm-push-3 col-xs-push-0 sidebar">
					<?php get_sidebar();?>
				</div>
			
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
