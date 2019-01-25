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
	
	<?php 
	
		the_content();
		if (comments_open () || get_comments_number ()) :?>
			<?php comments_template ();
		endif;
	?>
</div>
