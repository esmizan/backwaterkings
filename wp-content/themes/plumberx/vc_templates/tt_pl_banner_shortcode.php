<?php
$el_class = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
?>

<section id="banner">
    <div class="swiper-container <?php print esc_html($el_class); ?>" data-autoplay="0" data-loop="1" data-speed="500" data-center="0" data-slides-per-view="1" data-add-slides="1">
        <div class="swiper-wrapper clearfix">
            <?php print do_shortcode($content); ?>
        </div>
        <div class="pagination hidden"></div>
        <div class="swiper-arrow-left"><i class="fa fa-chevron-left" aria-hidden="true"></i></div>
        <div class="swiper-arrow-right"><i class="fa fa-chevron-right" aria-hidden="true"></i></div>
    </div>
</section> <!-- /#banner -->







