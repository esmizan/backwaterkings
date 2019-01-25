<?php
/**
 * The template for the sidebar containing the main widget area
 *
 * @package Templatation
 * @subpackage plumberx
 * @since plumberx 1.0
 */
?>

<?php if ( is_active_sidebar( 'sidebar-1' )  ) : ?>

	<?php dynamic_sidebar( 'sidebar-1' ); ?>

<?php endif; ?>
