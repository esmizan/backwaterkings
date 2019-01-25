<?php
/**
 * The main template file
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
<?php if ( function_exists( 'tt_plumberx_hero_section' ) ) echo tt_plumberx_hero_section(); ?>

	<?php if ( have_posts() ) : ?>
	<div class="mbottom80 clearfix"></div>
	<section id="blog-post" class="mainblock">
		<div class="container">
			<div class="row">

				<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 blog-content"><?php

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
				<div class="clear"></div>
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
