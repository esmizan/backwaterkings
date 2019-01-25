<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package Templatation
 * @subpackage plumberx
 * @since Plumberx 1.0
 */
get_header(); ?>

			<?php if ( function_exists( 'tt_plumberx_hero_section' ) ) echo tt_plumberx_hero_section(); ?>
			<section id="blog-post" class="single-post">
				<div class="container">
					<div class="row">

						<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 blog-content">
						<?php

						if ( have_posts() ) :
						
						while ( have_posts() ) : the_post(); ?>
						
						<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<article>
							<div class="post-meta clearfix">
								<div class="post-title">
									<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
								</div>
							</div>

							<?php
								the_content();
								wp_link_pages();
							?>

							</article>
						</div>
							
						<?php
						endwhile;endif;
						?></div>
						<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 col-lg-push-0 col-md-push-0 col-sm-push-3 col-xs-push-0 sidebar blog-left">

							<?php get_sidebar();?>

						</div>

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