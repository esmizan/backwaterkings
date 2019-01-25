<?php
/*
 * Templatation.com
 *
 * Block with image left shortcode for VC
 *
 */
$latitude = $longitude = $image = $zoom = $title = '';

$ins_button = false;

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

wp_enqueue_script( 'goog_maps' );
wp_enqueue_script( 'g_maps' );

// This code is from VC plugin
// For images

$img = ( is_numeric( $image ) && ! empty( $image ) ) ? wp_get_attachment_url( $image ) : '';

//Map
$map_zoom = ( is_numeric( $zoom ) ) ? $zoom : 12;

?>
<!-- end of code from VC -->


 <section id="map-area">
<div class="tt-contact-map-2 map-block" id="map-canvas" data-scroll="no" data-lat="<?php print esc_html($latitude); ?>" data-lng="<?php print esc_html($longitude)?>" data-zoom="<?php print esc_html($zoom); ?>"></div>
<?php if(!empty($marker_text)) { ?>
<div class="addresses-block">
    <a data-lat="<?php print esc_html($latitude); ?>" data-lng="<?php print esc_html($longitude)?>" data-string="<?php print esc_html($marker_text)?>"></a>
</div>
<?php } ?>
 </section>