<?php

$title = '';

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

?>


<?php if (!empty($title)) { ?>
	<li><i class="fa fa-arrow-circle-o-right"></i><?php print esc_html($title); ?></li>
<?php } ?>