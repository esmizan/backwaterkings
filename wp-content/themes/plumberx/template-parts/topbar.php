		<section id="topbar">
			<div class="container">
				<div class="row">
					<?php if( tt_temptt_get_option('enable_social', '1')) { ?>
					<div class="social pull-left">
					
						<?php
						$social_icons = plumberx_return_theme_option ( 'social_icons' );
						$social_links = plumberx_return_theme_option ( 'social_links' );
						$open_social_newtab = ( tt_temptt_get_option('open_social_newtab', '1')) ? 'target=_blank' : '' ;
						$social_links = explode ( ',', $social_links );
						$social_html = '<ul>';
						$grab = false;
						$count = 0;
						if (isset ( $social_icons )) {
							foreach ( $social_icons as $key => $icon ) {
								$link = isset($social_links [$count]) ? $social_links [$count] : '#';
								if ($icon != '') {
									$social_html .= '<li><a ' . $open_social_newtab . ' href="' . esc_url ( $link ) . '"><i class="fa ' . esc_attr ( $key ) . '"></i></a></li>';
									$grab = true;
								}
								$count ++;
							}
							
							if ($grab) {
								$social_html .= '</ul>';
								print $social_html;
							}
						}
						?>
						
					</div>
					<?php } ?>
					<div class="contact-info pull-right">
						<ul>
							<?php if(plumberx_return_theme_option ( 'phone' ) != '') { ?>
							<li><a href="<?php echo esc_url('tel:'.plumberx_return_theme_option ( 'phone' ));?>" class="hvr-bounce-to-bottom"><i class="fa fa-phone"></i><?php echo plumberx_return_theme_option ( 'phone' );?></a></li>
							<?php } ?>
							<?php if(plumberx_return_theme_option ( 'email' ) != '') { ?>
							<li><a href="
							<?php echo esc_url('mailto:'.plumberx_return_theme_option ( 'email' ));?>" class="hvr-bounce-to-bottom"><i class="fa fa-envelope-o"></i><?php echo plumberx_return_theme_option ( 'email' );?></a></li>
							<?php } ?>
						</ul>
					</div>
				</div>
			</div>
		</section>
