<?php
/**
 * The template part for displaying single posts
 *
 * @package Templatation
 * @subpackage Plumberx
 * @since Plumberx 1.0
 */
?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<article>
						<div class="img-holder">
						<?php if( tt_temptt_get_option('link_blog_images', '1') ) {

								  echo tt_plumberx_post_thumb('770', '330');
						} else {
								 the_post_thumbnail(array('770', '330'), array('class' => 'img-responsive'));
						}?>
						</div>
						<div class="post-meta clearfix">
							<div class="post-date updated">
								<?php echo get_the_date('d');?><br />
								<span><?php echo get_the_date('M');?></span>
							</div>
							<div class="post-title">
								<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
								<?php get_template_part( 'template-parts/tt-post-meta' ); ?>
							</div>
						</div>
						
						<?php 
							the_content();
							wp_link_pages();
						?>							
						<!-- Post sharing meta -->
	                    <?php get_template_part( 'inc/templates/tt-post-sharing' ); ?>
						<!-- Post author -->
						<?php get_template_part( 'template-parts/biography' ); ?>

						<?php
							if (comments_open () || get_comments_number ()) :?>
								
								
								<?php comments_template ();
							endif;
						?>
					
						
						
						
	</article>
</div>
