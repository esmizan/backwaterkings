<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package Templatation
 * @subpackage plumberx
 * @since Plumberx 1.0
 */

get_header();?>
<?php if ( function_exists( 'tt_plumberx_hero_section' ) ) echo tt_plumberx_hero_section(); ?>

<!-- MAIN CONTENT BLOCK -->
<section id="blog-post" class="mainblock">
	<div class="container">

		<?php echo tt_temptt_post_title('h1'); ?>

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php

		the_content();
		if (comments_open ()) :?>
			<?php comments_template ();
		endif;
	?>
</div>

		<?php endwhile; endif; ?>

	</div>

</section>


<?php get_footer(); ?>
