<?php
/*
Template name: Page With Right Sidebar

 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package Templatation
 * @subpackage plumberx
 * @since Plumberx 1.0
 */

get_header(); ?>

<?php if ( function_exists( 'tt_plumberx_hero_section' ) ) echo tt_plumberx_hero_section(); ?>

<section id="blog-post">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-8 blog-content">
			<?php if ( have_posts() ) : ?>

				<?php if ( is_home() && ! is_front_page() ) : ?>
					
				<?php single_post_title(); ?>
					
				<?php endif; ?>

				<?php
				while ( have_posts() ) : the_post();
					$select_contact = get_post_meta( get_the_ID(), 'select_contact' );
					get_template_part( 'template-parts/content', 'page' );
				endwhile;

				the_posts_pagination( array(
					'prev_text'          => esc_html__( 'Previous page', 'plumberx' ),
					'next_text'          => esc_html__( 'Next page', 'plumberx' ),
					'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', 'plumberx' ) . ' </span>',
				) );

			else :
				get_template_part( 'template-parts/content', 'none' );

			endif;
			?>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 col-lg-push-0 col-md-push-0 col-sm-push-3 col-xs-push-0 sidebar">
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>
