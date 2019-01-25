<?php

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );


//$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );
?>

<div class="general-question">
	<div class="panel-group" role="tablist" aria-multiselectable="true">
	  <?php echo do_shortcode($content); ?>
	</div>
</div>