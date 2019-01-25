<?php
/**
 * The template part for displaying a message that posts cannot be found
 *
 * @package Templatation
 * @subpackage Plumberx
 * @since Plumberx 1.0
 */
?>





<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

		<p><?php printf( esc_html__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'plumberx' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

	<?php elseif ( is_search() ) : ?>

		<div class="no-search-content">
			<div class="section-title">
				<h1><?php esc_html_e( 'no search results showing', 'plumberx' ); ?></h1>
			</div>
			<article>
				<h3><?php esc_html_e( 'Suggestions:', 'plumberx' ); ?></h3>
				<div class="suggesion">
					<i class="fa fa-angle-right"></i><?php esc_html_e( 'Make sure all words are spelled correctly', 'plumberx' ); ?> 
				</div>
				<div class="suggesion">
					<i class="fa fa-angle-right"></i><?php esc_html_e( 'Wildcard searches (using the asterisk *) are not supported', 'plumberx' ); ?> 
				</div>
				<div class="suggesion">
					<i class="fa fa-angle-right"></i><?php esc_html_e( 'Try more general keywords, especially if you are attempting a name', 'plumberx' ); ?>
				</div>
				
				<div class="suggesion-input">
					<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url( '/' )); ?>">
						<input type="text" value="<?php echo get_search_query(); ?>" name="s" />
						<input type="submit" value="<?php esc_html__( 'SEARCH','plumberx')?>">
					</form>
				</div>
				
				
			</article>
		</div>

	<?php else : ?>

		<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'plumberx' ); ?></p>
		<?php get_search_form(); ?>

	<?php endif; ?>
</div>