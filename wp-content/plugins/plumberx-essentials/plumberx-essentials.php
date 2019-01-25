<?php
/*
Plugin Name: Plumberx Essentials
Plugin URI: http://templatation.com/
Author: Templatation
Author URI: http://templatation.com/
Version: 1.71
Description: Essential plugin for plumberx theme. Keep it activated please.
Text Domain: plumberx-essentials
License: Themeforest Split License.
*/


add_action( 'wp_enqueue_scripts', 'front_end_style' );
 
function front_end_style() {
	
	//wp_enqueue_style( 'plumberx_style', plugins_url('/css/themestyle.css',__FILE__), array(), 1.0, 'all' );
	do_action( 'front_end_style' );	
	
}

require dirname( __FILE__ ) . '/cpt/projects.php';
require dirname( __FILE__ ) . '/cpt/services.php';

if ( function_exists( 'vc_set_as_theme' ) ) {
	require dirname( __FILE__ ) . '/vc_shortcodes/plumberx_aboutus_section.php';
	require dirname( __FILE__ ) . '/vc_shortcodes/plumberx_accordion_item.php';
	require dirname( __FILE__ ) . '/vc_shortcodes/plumberx_accordion_section.php';
	require dirname( __FILE__ ) . '/vc_shortcodes/plumberx_blog_post.php';
	require dirname( __FILE__ ) . '/vc_shortcodes/plumberx_contact_us.php';
	require dirname( __FILE__ ) . '/vc_shortcodes/plumberx_counter.php';
	require dirname( __FILE__ ) . '/vc_shortcodes/plumberx_emergency_contact_section.php';
	require dirname( __FILE__ ) . '/vc_shortcodes/plumberx_featured_services.php';

	require dirname( __FILE__ ) . '/vc_shortcodes/plumberx_gap.php';
	require dirname( __FILE__ ) . '/vc_shortcodes/plumberx_mailchimp.php';
	require dirname( __FILE__ ) . '/vc_shortcodes/plumberx_price_column.php';

	require dirname( __FILE__ ) . '/vc_shortcodes/plumberx_pricing_faq.php';
	require dirname( __FILE__ ) . '/vc_shortcodes/plumberx_pricing_faq_section.php';
	require dirname( __FILE__ ) . '/vc_shortcodes/plumberx_pricing_table.php';
	require dirname( __FILE__ ) . '/vc_shortcodes/plumberx_projects.php';
	require dirname( __FILE__ ) . '/vc_shortcodes/plumberx_section.php';
	require dirname( __FILE__ ) . '/vc_shortcodes/plumberx_services_tab.php';
	require dirname( __FILE__ ) . '/vc_shortcodes/plumberx_shop_title.php';
	require dirname( __FILE__ ) . '/vc_shortcodes/plumberx_sponsor.php';
	require dirname( __FILE__ ) . '/vc_shortcodes/plumberx_sponsor_section.php';
	require dirname( __FILE__ ) . '/vc_shortcodes/plumberx_team.php';
	require dirname( __FILE__ ) . '/vc_shortcodes/plumberx_team_section.php';
	require dirname( __FILE__ ) . '/vc_shortcodes/plumberx_testimonial.php';

	require dirname( __FILE__ ) . '/vc_shortcodes/plumberx_testimonial_section.php';
	require dirname( __FILE__ ) . '/vc_shortcodes/plumberx_title.php';
	require dirname( __FILE__ ) . '/vc_shortcodes/plumberx_why_choose_us.php';
	require dirname( __FILE__ ) . '/vc_shortcodes/plumberx_why_choose_us_section.php';
}

//Include redux framework
if ( ! class_exists( 'Redux' && ! empty( $tt_temptt_components['theme_options'] ) ) ) {
	include dirname( __FILE__ ) . '/inc/redux/admin-init.php';
}

//Include CS framework
if ( ! class_exists( 'CSFramework' && ! empty( $tt_temptt_components['metaboxes'] ) ) ) {
	include dirname( __FILE__ ) . '/inc/cs-framework/cs-framework.php';
}

 
if (class_exists ( 'WPBakeryShortCode' )) {
	require dirname( __FILE__ ) . '/Visual_Composer.php';
	add_action ( 'vc_before_init', 'Visual_Composer::add_shortcode_to_VC' );
}




class plumberx_widget_get_in_touch extends WP_Widget {

	function __construct() {
		parent::__construct(
			'plumberx_widget_get_in_touch',

			esc_html__('Plumberx Get In Touch', 'plumberx-essentials'), 

			array( 'description' => esc_html__( 'Plumberx Get In Touch', 'plumberx-essentials' ), ) 
		);
	}

	public function widget( $args, $instance ) {
		
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		
		
		$output = $args['before_widget'].$args['before_title']. $title .$args['after_title'].'<ul class="contact-info">';
        					
		$output .= '
		<li><i class="fa fa-map-marker"></i><span>'.esc_attr($instance['address'],'plumberx-essentials').'</span></li>
		<li><i class="fa fa-phone"></i>'.esc_attr($instance['phone']).'</li>
		<li><i class="fa fa-envelope-o"></i><a href="mailto:'.esc_attr($instance['email']).'">'.esc_attr($instance['email']).'</a></li>
		<li><i class="fa fa-globe"></i><a href="'.esc_attr($instance['website']).'">'.esc_attr($instance['website']).'</a></li>';
		
		$output .= '</ul>'.$args['after_widget'];
		
		echo $output;
		
	}
		
	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		else {
			$title = esc_html__( 'Get In Touch', 'plumberx-essentials' );
		}
		
		if ( isset( $instance[ 'address' ] ) ) {
			$address = $instance[ 'address' ];
		}
		else {
			$address = esc_html__( "Lorance Road 542B, Tailstoi Town 5248 MT, Wordwide Country", 'plumberx-essentials' );
		}
		if ( isset( $instance[ 'phone' ] ) ) {
			$phone = $instance[ 'phone' ];
		}
		else {
			$phone = esc_html__( "01865 524 8503", 'plumberx-essentials' );
		}
		if ( isset( $instance[ 'email' ] ) ) {
			$email = $instance[ 'email' ];
		}
		else {
			$email = esc_html__( "contact@plumberx.com", 'plumberx-essentials' );
		}
		if ( isset( $instance[ 'website' ] ) ) {
			$website = $instance[ 'website' ];
		}
		else {
			$website = esc_url( "http://plumberx.com", 'plumberx-essentials' );
		}
		
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:','plumberx-essentials' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
			
			<label style="margin-top: 20px; display: block;" for="<?php echo $this->get_field_id( 'address' ); ?>"><?php esc_html_e( 'Address:','plumberx-essentials' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'address' ); ?>" name="<?php echo $this->get_field_name( 'address' ); ?>" type="text" value="<?php echo esc_attr( $address ); ?>" />
		
			<label style="margin-top: 20px; display: block;" for="<?php echo $this->get_field_id( 'phone' ); ?>"><?php esc_html_e( 'Phone:','plumberx-essentials' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'phone' ); ?>" name="<?php echo $this->get_field_name( 'phone' ); ?>" type="text" value="<?php echo esc_attr( $phone ); ?>" />
		
			<label style="margin-top: 20px; display: block;" for="<?php echo $this->get_field_id( 'email' ); ?>"><?php esc_html_e( 'Email:','plumberx-essentials' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'email' ); ?>" name="<?php echo $this->get_field_name( 'email' ); ?>" type="text" value="<?php echo esc_attr( $email ); ?>" />
		
			<label style="margin-top: 20px; display: block;" for="<?php echo $this->get_field_id( 'website' ); ?>"><?php esc_html_e( 'Website:','plumberx-essentials' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'website' ); ?>" name="<?php echo $this->get_field_name( 'website' ); ?>" type="text" value="<?php echo esc_attr( $website ); ?>" />
		
		</p>
		<?php 
	}
	
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		
		$instance['address'] = ( ! empty( $new_instance['address'] ) ) ? strip_tags( $new_instance['address'] ) : '';
		$instance['phone'] = ( ! empty( $new_instance['phone'] ) ) ? strip_tags( $new_instance['phone'] ) : '';
		$instance['email'] = ( ! empty( $new_instance['email'] ) ) ? strip_tags( $new_instance['email'] ) : '';
		$instance['website'] = ( ! empty( $new_instance['website'] ) ) ? strip_tags( $new_instance['website'] ) : '';
		
		
		return $instance;
	}
	
}
class plumberx_widget_popular_posts extends WP_Widget {

	function __construct() {
		parent::__construct(
			'plumberx_widget_popular_posts',

			esc_html__('Plumberx Popular Posts', 'plumberx-essentials'), 

			array( 'description' => esc_html__( 'Plumberx Popular Posts', 'plumberx-essentials' ), ) 
		);
	}

	public function widget( $args, $instance ) {
		
		$title = apply_filters( 'widget_title', $instance['title'] );
		$post_args = array (
				'posts_per_page' => $instance['posts_per_page'],
				'orderby' => 'date',
				'order' => 'DESC',
				'include' => '',
				'exclude' => '',
				'meta_key' => '',
				'meta_value' => '',
				'post_type' => 'post',
				'post_mime_type' => '',
				'post_parent' => '',
				'author' => '',
				'post_status' => 'publish',
				'suppress_filters' => true 
		);
		$posts_array = get_posts ( $post_args );	
		
		$output = $args['before_widget'].$args['before_title']. $title .$args['after_title'].'<ul class="popular-post">';
                            
                           
			foreach ( $posts_array as $single_post ) {						
				setup_postdata( $single_post );
				if (has_post_thumbnail ( $single_post->ID)) {											
					$src = wp_get_attachment_image_src ( get_post_thumbnail_id($single_post->ID), 'plumberx_thumb');
					$img_src = esc_url ( $src [0] );
				} else {
					$img_src = "";
				}

				if ( isset( $instance[ 'show_thumb' ] ) ) {
					if ( $instance[ 'show_thumb' ] =='show'  ) {
						 
						$output .= '
						<li class="clearfix">
							<img src="'.esc_url($img_src).'" alt="">
							<div class="content-wrap">
								<h5><a href="' . get_the_permalink ( $single_post->ID ) . '">'.esc_html($single_post->post_title).'</a></h5>
								<span class="date">'.get_the_date('',$single_post->ID).'</span>
							</div>
						</li>';
					}else{
						$output .= '
							<li>
								<a href="' . get_the_permalink ( $single_post->ID ) . '"><h5>'.esc_html($single_post->post_title).'</h5></a>
								<p class="date">'.get_the_date('',$single_post->ID).'</p>
							</li>';
					}
				}
				
			}
			$output .= '</ul>'.$args['after_widget'];
		echo $output;
		
	}
		
	public function form( $instance ) {
	
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		else {
			$title = esc_html__( 'Popular Posts', 'plumberx-essentials' );
		}
		
		if ( isset( $instance[ 'posts_per_page' ] ) ) {
			$posts_per_page = $instance[ 'posts_per_page' ];
		}
		else {
			$posts_per_page = esc_html__( "4", 'plumberx-essentials' );
		}
		
		if ( isset( $instance[ 'show_thumb' ] ) ) {
			$show_thumb = $instance[ 'show_thumb' ];
		}
		else {
			$show_thumb = esc_html__( "hide", 'plumberx-essentials' );
		}
		
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:','plumberx-essentials' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
			
			<label style="margin-top: 20px; display: block;" for="<?php echo $this->get_field_id( 'posts_per_page' ); ?>"><?php esc_html_e( 'Post Per Page:','plumberx-essentials' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'posts_per_page' ); ?>" name="<?php echo $this->get_field_name( 'posts_per_page' ); ?>" type="text" value="<?php echo esc_attr( $posts_per_page ); ?>" />
			
			
			<label style="margin-top: 20px; display: block;"  for="<?php echo $this->get_field_id('show_thumb'); ?>"><?php esc_html_e('Show/Hide Thumbnail', 'plumberx-essentials'); ?></label>
			<select name="<?php echo $this->get_field_name('show_thumb'); ?>" id="<?php echo $this->get_field_id('show_thumb'); ?>" class="widefat">				
				<option <?php if ( 'hide' == $instance['show_thumb'] ) echo 'selected="selected"'; ?> value="<?php echo esc_attr( 'hide'); ?>"><?php esc_html_e('Hide', 'plumberx-essentials'); ?></option>	
				<option <?php if ( 'show' == $instance['show_thumb'] ) echo 'selected="selected"'; ?> value="<?php echo esc_attr( 'show'); ?>"><?php esc_html_e('Show', 'plumberx-essentials'); ?></option>
			</select>
			
		
		</p>
		<?php 
	}
	
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['posts_per_page'] = ( ! empty( $new_instance['posts_per_page'] ) ) ? strip_tags( $new_instance['posts_per_page'] ) : '';
		$instance['show_thumb'] = ( ! empty( $new_instance['show_thumb'] ) ) ? strip_tags( $new_instance['show_thumb'] ) : '';
		return $instance;
	}
}

function plumberx_load_widget() {
	register_widget( 'plumberx_widget_popular_posts' );
	register_widget( 'plumberx_widget_get_in_touch' );
}
add_action( 'widgets_init', 'plumberx_load_widget' );


/*-----------------------------------------------------------------------------------*/
/* Fetch ALT tags for images
/*-----------------------------------------------------------------------------------*/
// returns title based on the requirement.

if (!function_exists( 'tt_temptt_img_alt')) {
function tt_temptt_img_alt( $imgid = '', $postid = '' ){
$alt = '';
if( '' == $imgid && '' != $postid ) // if only post id is given, fetch imgid from it.
$imgid = get_post_thumbnail_id( $postid );

if($imgid) $alt = get_post_meta( $imgid, '_wp_attachment_image_alt', true);

return htmlspecialchars($alt);

}
}
