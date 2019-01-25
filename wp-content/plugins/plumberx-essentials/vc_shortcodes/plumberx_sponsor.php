<?php
if (class_exists ( 'WPBakeryShortCode' )) {
	class WPBakeryShortCode_plumberx_sponsor extends WPBakeryShortCode {
		
		/*
		 * This methods returns HTML code for frontend representation of your shortcode.
		 * You can use your own html markup.
		 *
		 * @param $atts - shortcode attributes
		 * @param @content - shortcode content
		 *
		 * @access protected
		 * vc_filter: VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG vc_shortcodes_css_class - hook to edit element class
		 * @return string
		 */
		protected function content($atts, $content = null) {
			extract ( shortcode_atts ( array (
					'sponsor_img' => '',
					'sponsor_link' => ''
			), $atts ) );
						
			$alttext = '';

			if ($sponsor_img != null) {
				$src = wp_get_attachment_image_src ( $sponsor_img, 'plumberx_sponsor' );
				$sponsor_img_src = esc_url ( $src [0] );
				$alttext = tt_temptt_img_alt($sponsor_img);
			} else {
				$sponsor_img_src = '';
			}

			ob_start(); ?>

					<div class="item">
						<?php if( $sponsor_link != '' ) { ?>
						<a href="<?php echo esc_url($sponsor_link); ?>" >
						<img src="<?php echo esc_url ( $sponsor_img_src ); ?> " alt="<?php echo esc_attr ( $alttext ); ?>">
						</a>
						<?php } else { ?>
						<img src="<?php echo esc_url ( $sponsor_img_src ); ?> " alt="<?php echo esc_attr ( $alttext ); ?>">
						<?php }  ?>
					</div>
			<?php
			$output = ob_get_clean();
			return $output;
		}
	}
}