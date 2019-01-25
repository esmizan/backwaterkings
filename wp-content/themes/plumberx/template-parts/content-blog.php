<?php
/**
 * The template part for displaying content
 *
 * @package Templatation
 * @subpackage Plumberx
 * @since Plumberx 1.0
 */
?>
<?php 
$num_comments = get_comments_number();
if ( comments_open() ) {
	if ( $num_comments == 0 ) {
		$comments = __(' Comment: 0', 'plumberx' );
	} elseif ( $num_comments > 1 ) {
		$comments =   __(' Comments: ', 'plumberx' ).$num_comments;
	} else {
		$comments = __('Comment: 1', 'plumberx' );
	}
} else {
	$comments =  __('Comments are off for this post.', 'plumberx' );
}

?>	
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
			<span class="sticky-post"><?php esc_html_e( 'Featured', 'plumberx' ); ?></span>
		<?php endif; ?>

	</header>

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
				<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
				<?php get_template_part( 'template-parts/tt-post-meta' ); ?>
			</div>
		</div>
		<?php 
			the_excerpt();
			
			wp_link_pages();
		?>		
		<a class="read-more" href="<?php echo esc_url(get_permalink());?>"><?php  echo esc_html__( 'Read more','plumberx' )?></a>
		
	
	
	</article>
	
	
	<div class="entry-footer hide">
		<?php
			edit_post_link(
				sprintf(
					esc_html__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'plumberx' ),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
		?>
	</div>
</div>
