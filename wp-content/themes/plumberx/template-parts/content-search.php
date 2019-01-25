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

	<article class="single-search-content clearfix">
			<?php 
				if ( has_post_thumbnail() ) {
				$src = wp_get_attachment_image_src ( get_post_thumbnail_id($post->ID), 'plumberx_thumb');
				$img_src = esc_url ( $src [0] );
				?>	
				<div class="col-lg-3 img-holder">
					<img src="<?php echo esc_url($img_src)?>" alt="">
				</div>
				<div class="col-lg-9 content">
				
					
		<?php }else {?>
			<div class="col-lg-12 content">
		<?php }?>
			<span><?php echo get_the_date();?></span>
			<h3><?php the_title(); ?></h3>
			<?php 

			the_excerpt();
			
			wp_link_pages( array(
			'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'plumberx' ) . '</span>',
			'after'       => '</div>',
			'link_before' => '<span>',
			'link_after'  => '</span>',
			'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'plumberx' ) . ' </span>%',
			'separator'   => '<span class="screen-reader-text">, </span>',
			) );
		?>		
		
		<a href="<?php echo esc_url(get_permalink());?>" class="link"><?php echo  esc_html__( 'Read More','plumberx' )?></a>
		</div>
	</article>
	
</div>
