<?php
/*
 * Templatation.com
 *
 * Simple text block shortcode for VC
 *
 */
$title = $title_size = $subtitle_size = $title_color =  $subtitle = $subtitle_color = '';

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

?>
<div class="plcontent">
<?php if (!empty($title)) { ?>
	<div class="h1" style="margin-bottom: 18px;
	<?php if (!empty($title_size)) echo 'font-size: ' . esc_html($title_size) . 'px;'; ?>
	<?php if (!empty($title_color)) echo 'color: ' . esc_html($title_color) . ';'; ?>
		"> <?php print esc_html($title); ?> </div>
<?php } ?>
<?php if (!empty($subtitle)) { ?>
<p class="subtitle" style="<?php if (!empty($subtitle_size)) echo 'font-size: ' . esc_html($subtitle_size) . 'px;'; ?><?php if (!empty($subtitle_color)) echo 'color: ' . esc_html($subtitle_color) . ';'; ?>"><?php print esc_html($subtitle); ?></p>
<?php } ?>
<?php if(!empty($content)) { ?>
<p class="highlighted2"><?php print $content; ?></p>
<?php } ?>
</div>