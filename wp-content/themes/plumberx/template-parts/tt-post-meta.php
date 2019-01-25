<?php
if ( ! defined( 'ABSPATH' ) ) exit;

 /*
  *  template file
  * @templatation.com
  */
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



<ul>
	<li><span><?php esc_html_e( 'By :', 'plumberx' ); ?><span class="vcard author author_name"> <span class="fn"><?php the_author(); ?></span></span></span></li>
	<li><span><?php echo tt_plumberx_get_cats('single');?></span></li>
	<?php if( comments_open()) { ?><li><span><?php echo esc_html($comments);?></span></li><?php } ?>
</ul>
