<?php

$name = '';

$atts = vc_map_get_attributes($this->getShortcode(), $atts);
extract($atts);

$group_val = json_decode(urldecode($atts['tabs']));
?>



<!-- #service-we-provide -->
<section id="service-we-provide">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 wow slideInLeft">
                <div class="service-tab-title">
                    <ul class="clearfix">
                        <?php foreach ($group_val as $val) {
                            if (isset($val->name)) { ?>
                                <li data-tab-name="">
                                   <?php print esc_html($val->name); ?>
                                </li>
                            <?php } ?>
                        <?php } ?>
                    </ul>
                </div>
            </div>
            <div class="col-lg-9 col-md-9 wow slideInRight">
                <div class="row">
                    <div class="service-tab-content clearfix">
                       <?php print do_shortcode($content); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> <!-- /#service-we-provide -->