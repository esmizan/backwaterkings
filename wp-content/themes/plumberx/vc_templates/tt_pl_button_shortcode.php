<?php
/*
 * Templatation.com
 *
 * Button shortcode for VC
 *
 */
$title = $txt_color = $b_link = $bg_color = $icon = ''; 

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

?>
<div class="vc_custbutton">
<a class="pl-button" href="<?php print esc_url($b_link); ?>"><button class="vcbtn bold hvr-bounce-to-right" style="
	    <?php if (!empty($txt_color)) echo 'color: ' . esc_html($txt_color) . ';'; ?>
	    <?php if (!empty($bg_color)) echo 'background: ' . esc_html($bg_color) . ';'; ?>">
	<?php if (!empty($icon)) { ?><i class="<?php print esc_html($icon); ?>"></i><?php } ?><?php print esc_html($title); ?></button>
</a>
</div>