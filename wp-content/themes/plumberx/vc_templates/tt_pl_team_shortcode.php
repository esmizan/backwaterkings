<?php
/*
 * Templatation.com
 *
 * Block with image and effect shortcode for VC
 *
 */
$image = $name = $position = $social_fb = $social_in = $social_li = $social_tw = $social_pi = $social_google = ''; 

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );


$img = ( is_numeric( $image ) && ! empty( $image ) ) ? wp_get_attachment_url( $image ) : '';
?>

<div class="wow zoomIn single-team-page" id="our-specialist" data-wow-duration=".5s" data-wow-delay="0">
    <!-- .single-member -->
    <div class="single-member hvr-bounce-to-bottom">
        <img src="<?php print esc_url($img); ?>" alt="team">
        <div class="info hvr-bounce-to-top">
            <ul class="social">
                <?php if ('' != $social_fb) { ?>
                <li><a href="<?php print esc_url($social_fb); ?>"><i class="fa fa-facebook"></i></a></li>
                <?php } ?>
                <?php if ('' != $social_tw) { ?>
                <li><a href="<?php print esc_url($social_tw); ?>"><i class="fa fa-twitter"></i></a></li>
                <?php } ?>
                <?php if ('' != $social_google) { ?>
                <li><a href="<?php print esc_url($social_google); ?>"><i class="fa fa-google-plus"></i></a></li>
                <?php } ?>
                <?php if ('' != $social_li) { ?>
                <li><a href="<?php print esc_url($social_li); ?>"><i class="fa fa-linkedin"></i></a></li>
                <?php } ?>
            </ul>
            <?php if (!empty($name)) { ?>
            <h2><?php print esc_html($name); ?></h2>
            <?php } ?>
            <?php if (!empty($position)) { ?>
            <p class="position"><?php print esc_html($position); ?></p>
            <?php } ?>
        </div>
    </div> <!-- /.single-member -->
</div>