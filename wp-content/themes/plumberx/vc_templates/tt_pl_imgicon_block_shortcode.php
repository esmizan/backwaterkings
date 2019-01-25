
<?php
/*
 * Templatation.com
 *
 * Block with icon shortcode for VC
 *
 */
$image = $title = $desc1 = '';

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$img = ( is_numeric( $image ) && ! empty( $image ) ) ? wp_get_attachment_url( $image ) : '';

?>

<div class="content clearfix imgicon">
    <div class="img-wrap pull-left fadeIn">
    <?php if (!empty($image)) { ?>
        <img src="<?php print esc_url($img); ?>" alt="icon">
    <?php } elseif(!empty($icon)) { ?><i class="<?php print esc_html($icon); ?>"></i><?php } else;  ?>
    </div>
    <div class="content-wrap pull-right">
        <?php if (!empty($title)) { ?>
        <h2><?php print esc_html($title); ?></h2>
        <?php } ?>
        <?php print do_shortcode($desc1); ?>
    </div>
</div>