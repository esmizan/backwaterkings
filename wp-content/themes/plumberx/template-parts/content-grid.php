<?php
/**
 * The template used for displaying page content
 *
 * @package Templatation
 * @subpackage Plumberx
 * @since Plumberx 1.0
 */
?>

	<div id="post-<?php the_ID(); ?>" <?php post_class("col-lg-6 col-md-6 col-sm-6 blog-wrap "); ?>>
		<div class="col-lg-6 col-md-12 img-wrap">
			<?php 
					
				if (has_post_thumbnail ()) {					
					echo tt_plumberx_post_thumb('285','210','',false,'',$single_post->ID);

				}
			?>
			
			<div class="h2"><?php echo get_the_date();?></div>
		</div>
		<div class="col-lg-6 col-md-12 content-wrap">
			<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
			<?php 
				$content = get_the_excerpt() ;
									
				echo substr($content,0,140);
				
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
				<li><span><b><?php esc_html_e( 'By ', 'plumberx' ); ?></b> <?php the_author(); ?></span></li>
				<li><a href="<?php echo esc_url(get_permalink());?>"><?php  echo esc_html__( 'Read more','plumberx' )?></a>
			</ul>
		</div>
	</div>
