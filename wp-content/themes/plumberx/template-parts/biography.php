<?php
/**
 * The template part for displaying an Author biography
 *
 * @package Templatation
 * @subpackage Plumberx
 * @since Plumberx 1.0
 */
?>
<?php if( (tt_temptt_get_option('post_author', 1) == '1') && is_singular('post') ) { ?>
<div class="row">
    <div class="col-lg-12">
		<div class="administrator">
			<div class="col-lg-3 col-md-3 col-sm-4">
			    <div class="administrator_img">
					<?php echo get_avatar( get_the_author_meta('email'), '100' ); ?>
				</div>
			</div>
			<div class="col-lg-9 col-md-9 col-sm-8">
				<div class="administrator_text">
				    <span class="vcard author author_name"><span class="fn h4"><?php the_author(); ?></span></span>
					<p><?php the_author_meta('description');?></p>
					<p><a class="author-link" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" rel="author"><?php printf( esc_html__( 'View all posts by %s', 'plumberx' ), get_the_author() ); ?></a></p>
				</div>
			</div>
		</div>
	</div>
</div>
<?php } ?>