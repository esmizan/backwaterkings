<?php
/**
 * Template Name: Blog Grid Layout
 */
get_header (); ?>
<section id="page-title">
	<div class="container">	
		<div class="row">			
			<div class="col-lg-12">						
				<div class="title pull-left"><h1><?php echo wp_title('')?></h1></div>		
				<?php if ( function_exists('plumberx_breadcrumb') ) {				
					plumberx_breadcrumb();					
				}?>							
			</div>		
		</div>
	</div>
</section>
<section id="blog" class="home-v2 grid">
	<div class="container">		
		<div class="row">								
			<?php 

			$wp_query = new WP_Query();
			$wp_query->query('post_type=post&post_status=publish&paged='. get_query_var('paged'));
			$posts_per_page = $wp_query->max_num_pages;

			if ( have_posts() ) : 			
			while ( have_posts() ) : the_post();	
					get_template_part( 'template-parts/content', 'grid' );
												
			endwhile;			
			?><div class="hide">
			<?php the_posts_pagination( 
				array('prev_text' => esc_html__( 'Previous page', 'plumberx' ),
					'next_text' => esc_html__( 'Next page', 'plumberx' ),	
					'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', 'plumberx' ) . ' </span>',		
					) );?>
			</div><?php			
			else :				
			get_template_part( 'template-parts/content', 'none' );			
			endif;		
			?>				
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