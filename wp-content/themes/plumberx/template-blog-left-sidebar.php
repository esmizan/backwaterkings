<?php
defined ( 'ABSPATH' ) or die ( "No script kiddies please!" );
/**
 * Template Name: Blog With Left Sidebar
 */
get_header (); ?>

<?php if ( function_exists( 'tt_plumberx_hero_section' ) ) echo tt_plumberx_hero_section(); ?>

		<section id="blog-post">
				<div class="container">
					<div class="row">
						<!-- sidebar -->
						<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 col-lg-push-0 col-md-push-0 col-sm-push-3 col-xs-push-0 sidebar blog-left">
							<?php get_sidebar();?>
						</div>
						<!-- content area -->
						<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 blog-content">
			            <?php
			            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			                $args = array(
			                'post_type' => 'post',
			                'paged' => $paged

			            );
			            // query
			            $tt_query = new WP_Query( $args );

			                if ( $tt_query->have_posts() ) :
			                    while ( $tt_query->have_posts() ) : $tt_query->the_post();

										get_template_part( 'template-parts/content', 'blog' );

									endwhile;
									?>
			                <?php
			                    $pages = $wp_query->max_num_pages;
			                    $page = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
			                ?>
			                <div class="pager-article  practice-v3-paginat clearfix">
			                       <?php previous_posts_link( '<i class="fa fa-long-arrow-left"></i>', $tt_query->max_num_pages); ?>
			                       <?php print ('<a class="active_page">' . $page . '</a>'); ?>
			                       <?php next_posts_link( '<i class="fa fa-long-arrow-right"></i>', $tt_query->max_num_pages); ?>

			                </div>
						</div>
						<?php
						else :
							get_template_part( 'template-parts/content', 'none' );
						endif;
						wp_reset_postdata();
						?>

					</div>

				</div>
			</section>
<?php get_footer(); ?>