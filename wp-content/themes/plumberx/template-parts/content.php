<?php
/**
 * The template part for displaying content
 *
 * @package Templatation
 * @subpackage Plumberx
 * @since Plumberx 1.0
 */
?>
	
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
			<span class="sticky-post"><?php esc_html_e( 'Featured', 'plumberx' ); ?></span>
		<?php endif; ?>

		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink()) ), '</a></h2>' ); ?>

	</header>

	<div class="col-lg-6 col-md-6 col-sm-6 blog-wrap ">
		<div class="col-lg-6 col-md-12 img-wrap">
		<?php if( tt_temptt_get_option('link_blog_images', '1') ) {

				  echo tt_plumberx_post_thumb('770', '330');
		} else {
				 the_post_thumbnail(array('770', '330'), array('class' => 'img-responsive'));
		}?>
			<div class="h2"><?php echo get_the_date();?></div>
		</div>
		<div class="col-lg-6 col-md-12 content-wrap">
			<?php the_title( sprintf( '<h2><a href="%s" rel="bookmark">', esc_url(get_permalink()) ), '</a></h2>' ); ?>
			
			<?php 
				the_content( sprintf(
					esc_html__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'plumberx' ),
					get_the_title()
				) );
				
				wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'plumberx' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'plumberx' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );
			?>
			
			<ul>
				<li><span><b><?php esc_html_e( 'By:', 'plumberx' ); ?></b> <?php the_author(); ?></span></li>
				<li><a class="readmore btn btn-1c" href="<?php echo esc_url(get_permalink());?>"><?php  echo esc_html__( 'Read more','plumberx' )?></a>		
			</ul>
		</div>
	</div>
	
	<div class="entry-footer">
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
