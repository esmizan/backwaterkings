<?php

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
?>

 <ul class="red_list">
    <?php print do_shortcode($content); ?> 
</ul>