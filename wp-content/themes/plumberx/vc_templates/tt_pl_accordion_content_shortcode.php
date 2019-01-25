<?php
$title = $acc_id = '';

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );


//$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );
?>

<div class="panel panel-default">
    <div class="panel-heading headback" role="tab" id="headingOne">
        <?php if (!empty($title)) { ?>
        <h4 class="panel-title">
            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#<?php print esc_html($acc_id); ?>" aria-expanded="false" aria-controls="<?php print esc_html($acc_id); ?>" class="collapsed">
              <?php print esc_html($title); ?>
            </a>
        </h4>
        <?php } ?>
    </div>
    <div id="<?php print esc_html($acc_id); ?>" class="panel-collapse collapse" role="tabpanel" aria-expanded="false" style="height: 0px;">
      <div class="panel-body">
        <?php print $content; ?>
    </div>
    </div>
</div>
