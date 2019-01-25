<?php
/**
 * The template for displaying comments
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package Templatation
 * @subpackage plumberx
 * @since plumberx
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if (post_password_required ()) {
	return;
}

if ( comments_open() ) : 
?>
						<div class="row comments1">
							<div class="col-lg-12">
								<div class="comments_area">
									<div class="col-lg-12">
										<div class="comment_title">
										    <div class="col-lg-12">
											  <h4><?php echo esc_html__('Comments','plumberx');?> <span><?php echo get_comments_number();?></span></h4>
											</div>
										</div>
									</div>
									
									<?php if ( have_comments() ) : ?>
									<div class="hide"><?php comment_form(); ?></div>
										<?php
											wp_list_comments ( array (										
												'type'=>'comment',
												'short_ping' => true,
												'avatar_size' => 70,
												'callback' => 'plumberx_comment::plumberx_comments' 
											) );
										?>
									<?php endif;  ?>
								</div>
							</div>
						</div>
								
	
						<div class="row comments2">
							<div class="col-lg-12">
								<div class="comment-box">
								    <div class="row">
										<div class="col-lg-12">
											<div class="comment-box-title">
											    <div class="col-lg-12">
												    <h4><?php comment_form_title( 'Leave a Comment', 'Submit Your Comment To %s' ); ?></h4>
												</div>
											</div>		
						<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
							<p>
								<?php esc_html_e('You must be','plumberx')?> <a
									href="<?php echo wp_login_url( get_permalink() ); ?>"><?php
							
							esc_html_e ( 'logged in', 'plumberx' )?></a> <?php esc_html_e('to post a comment','plumberx')?>.
							</p>
						<?php else : ?>	
							<form
								action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php"
								method="post" name="comments-form" id="commentform"
								class="form contact-form ">
								
							
								<div class="comment-box-field">
								
								
								
								<?php if ( is_user_logged_in() ) : ?>

								<p class="comment-notes">
									<?php esc_html_e('Logged in as','plumberx')?> 
									<a href="<?php echo esc_url(get_option('siteurl')); ?>/wp-admin/profile.php">
										<?php echo esc_html($user_identity); ?>
									</a>
									<a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php esc_html_e('Log out from this account','plumberx'); ?>">
										<?php esc_html_e('Logged in as','plumberx')?> &raquo;
									</a>
								</p>
								
								<br>
								
								<?php else : ?>	
								
									<div class="col-lg-6">
										<div class="comment-box-half">
											<input placeholder="Your Name" name="author" id="comment-name" type="text" aria-required="true">
										</div>
									</div>
									<div class="col-lg-6">
										<div class="comment-box-half">
											<input placeholder="Email" name="email" id="comment-email" type="email" aria-required="true">
										</div>
									</div>
										
										
										
										
										
									<?php endif; ?>

									
									
									<div class="col-lg-12">
										<div class="comment-box-full">
											<textarea placeholder="Comment" name="comment" id="comment-message" rows="8"></textarea>
										</div>
									</div>
									<div class="col-lg-12">
										<div class="comment-box-submit">
											<input type="submit" tabindex="5" value="<?php esc_html_e('Submit','plumberx')?>">
										</div>
									</div>
									<?php comment_id_fields(); ?>
									<?php do_action('comment_form', $post->ID); ?>
								</div>
							</form>
							<?php endif;  ?>
						</div>
					</div>
				</div>
			</div>
		</div> 
	<div id="cancel-comment-reply reply">
		<?php cancel_comment_reply_link(); ?>
		
	</div>
<?php endif; ?>