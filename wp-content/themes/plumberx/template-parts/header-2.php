		<?php if(!tt_temptt_get_option('hdr2_cta_onlyhome', 1) || (tt_temptt_get_option('hdr2_cta_onlyhome', 1) && is_front_page()) ){ ?>
		<section id="banner" class="header-v2" style="background:url('<?php echo plumberx_return_theme_option("banner","url"); ?>') no-repeat scroll right top / cover !important;">
		<div class="container">
			<div class="row">
				<div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
					<h1><span><?php echo plumberx_return_theme_option('heading_1'); ?></span><br><?php echo plumberx_return_theme_option('heading_2'); ?></h1>
					<ul class="header-v2-caption">
						<li class="clearfix">
							<div class="icon-holder plumbing pull-left">
								<i class="icon icon-Wrench"></i>
							</div>
							<div class="info">
								<b><?php echo plumberx_return_theme_option('title_1'); ?></b><br>
								<?php echo plumberx_return_theme_option('subtitle_1'); ?>
							</div>
						</li>
						<li class="clearfix">
							<div class="icon-holder heating pull-left">
								<i class="icon icon-DownloadCloud"></i>
							</div>
							<div class="info">
								<b><?php echo plumberx_return_theme_option('title_2'); ?></b><br>
								<?php echo plumberx_return_theme_option('subtitle_2'); ?>
							</div>
						</li>
						<li class="clearfix">
							<div class="icon-holder handyman pull-left">
								<i class="icon icon-DownloadCloud"></i>
							</div>
							<div class="info">
								<b><?php echo plumberx_return_theme_option('title_3'); ?></b><br>
								<?php echo plumberx_return_theme_option('subtitle_3'); ?>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
		</section>
		<?php }