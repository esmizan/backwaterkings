<?php

class plumberx_comment {

	// /Comment call back function

	static function plumberx_comments($comment, $args, $depth) {

		$GLOBALS ['comment'] = $comment;

		extract ( $args, EXTR_SKIP );

		

		

		if ('div' == $args ['style']) {

			$tag = 'div';

			$add_below = 'comment';

		} else {

			$tag = 'li';

			$add_below = 'div-comment';

		}

		?>

		<<?php echo esc_attr($tag); ?> <?php comment_class ( empty ( $args ['has_children'] ) ? 'single_comment' : 'reply_comment single_comment' )?> id="comment-<?php comment_ID() ?>">
      
		<div id="div-comment-<?php comment_ID() ?>" class="row">

			<div class="col-lg-2 col-md-2 col-sm-2">

				<div class="comment_img">
					<?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
				</div>
			</div>

			<div class="col-lg-10 col-md-10 col-sm-10" >
				<div class="comment_text">
					<div id="comment_text-<?php comment_ID() ?>" class="comment_text">
						<h5><?php echo esc_attr($comment->comment_author);?></h5>
						<p>
							<span class="c_date">
						
								<?php echo date(get_option( 'date_format' ), strtotime($comment->comment_date)) ?>
							
							</span> 
							
							<?php echo esc_html('| '); ?>
							
							<span>
								<?php comment_reply_link( array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'], 'reply_text '=>esc_html__( 'Reply','plumberx' ),'login_text'=>esc_html__( 'Log In','plumberx' ) ) ) ); ?>
							</span>
						</p>
						<p class="c_text"><?php echo get_comment_text(); ?></p>
										
					</div>
				</div>
			</div>		
		</div>
		<div class="hide"><?php edit_comment_link( esc_html__( 'Edit this comment','plumberx' ), '  ', '' );?></div>
<?php

	}

}