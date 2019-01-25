<?php
/**
 * Template for displaying search forms in Twenty Sixteen
 *
 * @package Templatation
 * @subpackage plumberx
 * @since Plumberx 1.0
 */
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
	<input type="text" class="search-field" placeholder="<?php echo esc_attr_x( 'Enter Search Keywords', 'placeholder', 'plumberx' ); ?>" value="<?php echo get_search_query(); ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label', 'plumberx' ); ?>" />	
	<button type="submit">
		<i class="fa fa-search"></i>
	</button>
</form>
