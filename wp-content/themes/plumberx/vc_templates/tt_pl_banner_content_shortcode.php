<?php
$title = $vertical =   $link = $separator = $sform_1 = $sform_2 = $form_2 = $form_1 = $sep_color = $form = $description = $sbtitle_color = $btn_color =  $text_color =  $title_color = $btn_text = $title_span = '';

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
$img = (is_numeric($image) && !empty($image)) ? wp_get_attachment_url($image) : '';

?>


<div class="swiper-slide" data-val="0">
	<div class="tt-main-slide" style="background-image:url(<?php print esc_url($img); ?>);">
		<div class="container">
			<div class="tt-main-slide-table">
				<div class="tt-main-slide-cell <?php print esc_html($vertical); ?>" >
					<div class="row">
						<div class="col-sm-6">
							<div class="tt-main-slide-text">
								<?php if(!empty($title)) { ?>
								<h1 style="<?php if (!empty($sbtitle_color)) echo 'color: ' . esc_html($sbtitle_color) . ';'; ?>">
									<span style="<?php if (!empty($title_color)) echo 'color: ' . esc_html($title_color) . ';'; ?>"><?php print esc_html($title); ?></span> <br>
									<?php print esc_html($subtitle); ?></h1>
								<?php } ?>
								<?php if($separator == 'yes') { ?>
								<span class="sep" style="<?php if (!empty($sep_color)) echo 'background-color: ' . esc_html($sep_color) . ';'; ?>"></span>
								<?php } ?>
								<?php if(!empty($description)) { ?>
								<p style="<?php if (!empty($text_color)) echo 'color: ' . esc_html($text_color) . ';'; ?>"> <?php print do_shortcode($description); ?></p>
								<?php } ?>
								<?php if(!empty($btn_text)) { ?>
								<a style="<?php if (!empty($btn_color)) echo 'color: ' . esc_html($btn_color) . ';'; ?>" href="<?php print esc_url($link); ?>" class="hvr-bounce-to-right"><?php print esc_html($btn_text); ?></a>
								<?php } ?>
							</div>
						</div>
						<?php if($form == 'yes') { ?>
						<div class="col-sm-6">
							<div class="tab-wrapper banner-form-2">
								<div class="nav-tab clearfix">
									<div class="nav-tab-item active"><?php print esc_html($form_1); ?></div>
									<div class="nav-tab-item"><?php print esc_html($form_2); ?></div>
								</div>
								<div class="tab-content">
									<div class="tab-info active">
										<p class="txt-highlight">Request a free quote</p>
										<div class="rqa-form" >
											<?php print do_shortcode($sform_1); ?>
										</div>
									</div>
									<div class="tab-info">
										<p class="txt-highlight">Request a free quote</p>
										<div class="rqa-form" >
											<?php print do_shortcode($sform_2); ?>
										</div>
									</div>
								</div>
							</div>
						</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>