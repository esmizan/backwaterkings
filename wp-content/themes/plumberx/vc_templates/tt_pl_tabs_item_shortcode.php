<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

?>


<div class="serv-tabs-content">
    <div class="col-lg-12 col-md-12 col-sm-12">
    <?php print wpautop(do_shortcode(htmlspecialchars_decode($content))); ?>
    </div>
</div>