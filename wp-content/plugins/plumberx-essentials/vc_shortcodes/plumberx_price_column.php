<?php
if (class_exists ( 'WPBakeryShortCode' )) {
	class WPBakeryShortCode_plumberx_price_column extends WPBakeryShortCode {
		protected function content($atts, $content = null) {
			extract(shortcode_atts(
				array(			
					'price'       => '',
					'title'       => '',
					'button_text'        => '',					'link'        => '',					'package'        => ''				
				), 							$atts));		if (!isset($package) || empty($package)) {			$package = "bronze";		}
		if (isset($content) && !empty($content)) {
			$includes ='			<ul class="price-info">						';
				$split = preg_split("/(\r?\n)+|(<br\s*\/?>\s*)+/", $content);
				foreach($split as $haystack) {
					$includes .= '<li>' . $haystack . '</li>';
				}
			$includes .='</ul>';
		}		
		$output ='					<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 price-table '.esc_html($package).' wow zoomIn " data-wow-duration=".5s" data-wow-delay="0s">					<div class="price-content">						<div class="price-table-top">							<h3>'.esc_html($title).'</h3>						</div>						<div class="price-box">'.$price.'</div>																		'.$includes.'													<a href="'.esc_url($link).'" class="hvr-bounce-to-right">'.esc_html($button_text).'</a>					</div>				</div>';
		return $output;
		}
	}
}