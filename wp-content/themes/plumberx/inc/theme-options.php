<?php
if ( ! defined( 'ABSPATH' ) ) exit;

/*-----------------------------------------------------------------------------------*/
/* This file hooks the redux options panel. While Redux powered by TT FW plugin.
/*-----------------------------------------------------------------------------------*/


add_filter('redux/options/plumberx_opt/sections', 'tt_plumberx_redux_options');

if ( ! function_exists( 'tt_plumberx_redux_options' ) ) {
    function tt_plumberx_redux_options( $sections ) {

	//reset themeoptions array
    $sections = array();
    // This is your option name where all the Redux data is stored.
    $opt_name = "plumberx_opt";


	$shortname = 'tt';

    /*
     *
     * ---> START SECTIONS
     *
     */

    // -> START Basic Fields
    Redux::setSection( $opt_name, array(
        'title'  => __( 'General Settings', 'plumberx' ),
        'id'     => 'basic',
        'desc'   => __( 'Basic field with no subsections.', 'plumberx' ),
        'icon'   => 'el el-home',
        /*  'fields' => array(
            array(
                'id'       => 'opt-text',
                'type'     => 'text',
                'title'    => __( 'Example Text', 'plumberx' ),
                'desc'     => __( 'Example description.', 'plumberx' ),
                'subtitle' => __( 'Example subtitle.', 'plumberx' ),
                'hint'     => array(
                    'content' => 'This is a <b>hint</b> tool-tip for the text field.<br/><br/>Add any HTML based text you like here.',
                )
            )
        ) */
    ) );

    $sections[] = array(
        'title' => __( 'General Settings', 'plumberx' ),
        'id'    => 'basic',
        'icon'  => 'el el-home'
    );

    $sections[] = array(
        'title'      => __( 'Quick Start', 'plumberx' ),
        'id'         => 'opt-text-subsection',
        'subsection' => true,
        'fields'     => array(
            array(
                'id' => $shortname . '_welcome_info',
                'type'   => 'info',
                'notice' => false,
                'style'  => 'info',
                'desc'   =>  sprintf( esc_html__( 'Thanks for purchasing and installing this theme. From here you can customize almost everything in the theme. If you need help, please %1$s we will be more than happy to help. ', 'plumberx' ), '<a href="http://templatation.ticksy.com/">' . esc_html__( 'contact support', 'plumberx' ) . '</a>' ),
            ),


            array(
                'id' => 'logo',
                'type'     => 'media',
                'url'      => true,
                'title'    => esc_html__( 'Upload Main Logo', 'plumberx' ),
                'readonly'    => false,
                'subtitle'     => esc_html__( 'Upload a logo for your theme, or specify an image URL directly. ', 'plumberx' ),
                'desc' => esc_html__( 'Ideal size of the logo is 230x50 px.', 'plumberx' ),
            ),
            array(
                'id'       => $shortname . '_retina_favicon',
                'type'     => 'switch',
                'title'    => 'Retina Ready Logo',
                'subtitle' => esc_html__( 'Do you want sharp logo display on retina display devices?', 'plumberx' ),
                'desc'     => esc_html__( 'To make logo look sharp on Retina devices, you need to upload double size logo above and turn it on to be able to enter desired width/height for logo image. If you are not sure what this means leave it off. Note: To comply with all retina devices app icon etc, please go to Appearance->customize->site identity.', 'plumberx' ),
                'default'  => false
            ),
            array(
                'id' => $shortname . '_retina_logo_wh',
                'type'           => 'dimensions',
                'units'          => array( 'px' ),    // You can specify a unit value. Possible: px, em, %
                'units_extended' => 'true',  // Allow users to select any type of unit
                'title'          => esc_html__( 'Dimensions (Width/Height) Option', 'plumberx' ),
                'subtitle'       => esc_html__( 'Enter desired Width and height for your retina logo. If you want logo to be retina ready, please upload double size version of logo above and enter the dimensions you want it to appear in. Recommended: 290 x 60.', 'plumberx' ),
                'desc'       => esc_html__( ' Normally it will be half of actual retina logo image dimensions. Enter values without px eg: 50, 70 etc. Recommended: Leave blank to disable this. Note: If your logo is distorted, try putting 0 in Height.', 'plumberx' ),
                'required' => array( $shortname . '_retina_favicon', '=', true ),
                 'default'        => array(
                    'width'  => 0,
                    'height' => 0,
                )
            ),
           array(
                'id' => $shortname . '_gmap_api',
                'type'     => 'text',
                'title' => esc_html__( 'Google Map API Text', 'plumberx' ),
                'desc'  => sprintf( esc_html__( '%1$s for complete instructions to get an API key from Google itself.', 'plumberx' ), '<a href="https://developers.google.com/maps/documentation/javascript/get-api-key">' . esc_html__( 'Click here', 'plumberx' ) . '</a>' ),
                'subtitle' => esc_html__( 'Since June 2016, Google requires an API key for displaying maps.', 'plumberx' ),
           ),

            array(
                'id' => $shortname . '_default_animations',
                'type'     => 'switch',
                'title' => esc_html__( 'Enable Animations', 'plumberx' ),
                'desc'   => esc_html__( 'In earlier version of the theme, the theme had animations on mouse movement. As of v1.8 they were removed for the sake of consistent look, enable it if you want them back.', 'plumberx' ),
                'default'  => false,
            ),

            array(
                'id' => $shortname . '_sticky_menu',
                'type'     => 'switch',
                'title' => esc_html__( 'Enable Sticky Menu', 'plumberx' ),
                'desc'   => esc_html__( 'Keep the menu on top even when you browse down on the page.', 'plumberx' ),
                'default'  => true,
            ),
            array(
                'id' => $shortname . '_link_blog_images',
                'type'     => 'switch',
                'title' => esc_html__( 'Enable blog image links.', 'plumberx' ),
                'desc'   => esc_html__( 'If enabled, the Blog featured image links to their larger version.', 'plumberx' ),
                'default'  => true,
            ),
           array(
                'id' => $shortname . '_enable_preloader',
                'type'     => 'switch',
                'title' => esc_html__( 'Enable Preloader', 'plumberx' ),
                'subtitle' => esc_html__( 'If enabled, website shows a preloader icon before the page loads.', 'plumberx' ),
                'default'  => false
           ),
           array(
                'id' => $shortname . '_enable_li_disc',
                'type'     => 'switch',
                'title' => esc_html__( 'Enable List style', 'plumberx' ),
                'subtitle' => esc_html__( 'In service block, there is font awesome icon inserted in demo content. So we disable the default list dot. In case you do not want to use font awesome icon you can enable default dot for lists here.', 'plumberx' ),
                'default'  => true
           ),


        )
    );


	$sections[] = array (
		'title' => __ ( 'Blog', 'plumberx' ),
		'desc' => __ ( 'Choose default blog styles, this will be used on common places like Archive pages etc.', 'plumberx' ),
		'id' => 'blog',
		'subsection' => true,
		'customizer_width' => '450px',
		'fields' => array (
				array (
				'id' => 'blog_style',
				'type'     => 'button_set',
				'title' => __ ( 'Select Blog Layout, this only affects general pages like archive etc. For main block, please use Blog page template.', 'plumberx' ),
				'full_width' => true,
				'mode' => false,
				'desc' => __ ( '', 'plumberx' ),
				'subtitle' => __ ( '', 'plumberx' ),
				'options'  => array(
					'blog1' => 'Blog With Left sidebar',
					'blog2' => 'Blog With Right sidebar',
/*					'blog3' => 'Blog Grid Layout',
					'blog4' => 'Blog Masonary Layout',*/
				),
				 'default'  => 'blog2'
			)
		)
	);

	$sections[] = array (
		'title' => __ ( '404 Page', 'plumberx' ),
		'id' => 'page_404',
		'subsection' => true,
		'customizer_width' => '450px',
		'fields' => array (
				array (
					'id' => 'image_404',
					'type' => 'media',
					'title' => __ ( 'Upload Image', 'plumberx' ),
					'full_width' => true,
					'mode' => false,
					// Can be set to false to allow any media type, or can also be set to any mime type.
					'desc' => __ ( '', 'plumberx' ),
					'subtitle' => __ ( 'Upload any media using the WordPress native uploader', 'plumberx' )
				)
		)
	);

    $sections[] = array(
        'title'            => esc_html__( 'Custom CSS', 'plumberx' ),
        'id'               => 'custom-css',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(

            array(
    			'id' => $shortname . '_custom_css',
                'type'     => 'ace_editor',
                'title'    => esc_html__( 'Custom CSS', 'plumberx' ),
    			'subtitle' => esc_html__( 'Quickly add some CSS to your theme by adding it to this block.', 'plumberx' ),
                'mode'     => 'css',
                'theme'    => 'monokai',
                'default'  => ''
            ),

        )
    );

		/*-----------------------------------------------------------------------------------*/
		/* Style Settings                                                                  */
		/*-----------------------------------------------------------------------------------*/

		$sections[] = array(
			'title'            => esc_html__( 'Styling', 'plumberx' ),
			'id'               => 'styling-options',
			'customizer_width' => '450px',
			'icon'   => 'el el-icon-brush',
			'fields'           => array(

				array(
					'id' => $shortname . '_main_acnt_clr',
					'type'     => 'color',
					'title'    => esc_html__( 'Main Accent Color', 'plumberx' ),
					'subtitle' => esc_html__( 'Main accent color of the theme. Note: Some color are powered by page builder/images. Contact support if you need help.', 'plumberx' ),
					'desc'     => esc_html__( 'Default: Blue family #51b7e3', 'plumberx' ),
					'default'  => ''
				),

                array(
                    'id' => $shortname . '_second_color',
                    'type'     => 'color',
                    'title'    => esc_html__( 'Second Accent Color', 'plumberx' ),
                    'subtitle' => esc_html__( 'Second Accent color of the theme. Used as contrast to first, like on hover etc. Note: Some color are powered by page builder/images. Contact support if you need help.', 'plumberx' ),
                    'desc'     => esc_html__( 'Default: Red family #fe5454', 'plumberx' ),
                    'default'  => ''
                ),
            array(
                'id' => $shortname . '_tt_ft_bg',
                'type'     => 'background',
                'output'   => array( 'footer' ),
                'title'    => esc_html__( 'Footer Background', 'plumberx' ),
                'subtitle' => esc_html__( 'Select background image or color for footer area, where widgets appear.', 'plumberx' ),
                'desc'   =>  sprintf( esc_html__( 'Note: As by default an image is set on this area, selecting only color will not work, if you want to have color only, you might need to set image as transparent image(and then select color.). %1$s.', 'plumberx' ), '<a href="'. esc_url(get_template_directory_uri()) .'/images/zTransparent.png" target="_blank">' . esc_html__( 'Here is a transparent image you can download and use.', 'plumberx' ) . '</a>' ),
            ),
            array(
                'id' => $shortname . '_extreme_ft_bg',
                'type'     => 'background',
                'output'   => array( '#bottom-bar' ),
                'title'    => esc_html__( 'Exreme footer Background', 'plumberx' ),
                'subtitle' => esc_html__( 'Select background image or color for extreme bottom image, the section which is used for copyright info etc.', 'plumberx' ),
                //'default'   => '#FFFFFF',
            ),

			)
		);
	$sections[] = array (
		'title' => __ ( 'Layout/Header Settings', 'plumberx' ),
		'id' => 'headersettings',
		'customizer_width' => '450px',
		'fields' => array (

            array(
                'id' => 'header_style',
                'type'     => 'image_select',
                'title' => esc_html__( 'Header/Menu Layout', 'plumberx' ),
                'subtitle' => esc_html__( 'Select header layout.', 'plumberx' ),
                //Must provide key => value(array:title|img) pairs for radio options
                'options'  => array(
	                // please be careful changing anything below.
                    'header_5' => array(
                        'alt' => 'Header 1',
                        'img' => TT_TEMPTT_THEME_DIRURI. 'inc/images/hdr1.png',
                        'title' => '(Default)Header 1.'
                    ),
                    'header_2' => array(
                        'alt' => 'Header 2',
                        'img' => TT_TEMPTT_THEME_DIRURI. 'inc/images/hdr2.png',
                        'title' => 'Header 2. This is same as header 1, only difference is this header has a Call to action area on the top.'
                    ),
                    'header_3' => array(
                        'alt' => 'Header 3',
                        'img' => TT_TEMPTT_THEME_DIRURI. 'inc/images/hdr3.png',
                        'title' => 'Header 3.'
                    ),
                    'header_4' => array(
                        'alt' => 'Header 4',
                        'img' => TT_TEMPTT_THEME_DIRURI. 'inc/images/hdr4.png',
                        'title' => 'Header 4.'
                    ),
/*                    'header_1' => array(
                        'alt' => 'Header 5',
                        'img' => TT_TEMPTT_THEME_DIRURI. 'inc/images/hdr5.png',
                        'title' => 'Header 5.'
                    ),*/
                ),
                'default'  => 'header_5'
            ),

			array (
					'id' => 'banner_v1',
					'type' => 'media',
					'title' => __ ( 'Upload background image for header', 'plumberx' ),
					'full_width' => true,
					'mode' => false,
					'desc' => __ ( '', 'plumberx' ),
					'subtitle' => __ ( 'This image is used as a background of CTA.', 'plumberx' ),
			),
			array(
					'id'       => 'heading_blue',
					'type'     => 'text',
					'title'    => __( 'Bannar text Blue', 'plumberx' ),
					'default'  => 'Expertize',
					'required' => array( 'header_style', '=', 'header_1' ),
			),
			array(
					'id'       => 'heading_red',
					'type'     => 'text',
					'title'    => __( 'Bannar text Red', 'plumberx' ),
					'default'  => 'you Can Trust',
					'required' => array( 'header_style', '=', 'header_1' ),
			),

			array (
					'id' => 'subtitle',
					'type' => 'textarea',
					'title' => __ ( 'Subtitle', 'plumberx' ),
					'required' => array( 'header_style', '=', 'header_1' ),
			),


			array(
					'id'       => 'learn_more_text',
					'type'     => 'text',
					'title'    => __( 'Learn More Text', 'plumberx' ),
					'required' => array( 'header_style', '=', 'header_1' ),
			),

			array(
					'id'       => 'learn_more_link',
					'type'     => 'text',
					'title'    => __( 'Learn More Link', 'plumberx' ),
					'required' => array( 'header_style', '=', 'header_1' ),
			),

            array(
                'id' => $shortname . '_hdr2_info',
                'type'   => 'info',
                'notice' => false,
                'style'  => 'info',
                'desc'   =>  esc_html__( 'Header 2 displays call to action area on the top, with background image, 3 Titles and subtitles, you can customize them below.', 'plumberx' ),
				'required' => array( 'header_style', '=', 'header_2' ),
            ),
           array(
                'id' => $shortname . '_hdr2_cta_onlyhome',
                'type'     => 'switch',
                'title' => esc_html__( 'Enable CTA only on homepage', 'plumberx' ),
                'desc'   => esc_html__( 'If enabled, the big banner with info only appears on the page set as homepage in settings/reading.', 'plumberx' ),
                'default'  => true,
				'required' => array( 'header_style', '=', 'header_2' ),
            ),

			array (
					'id' => 'banner',
					'type' => 'media',
					'title' => __ ( 'Upload Banner Image', 'plumberx' ),
					'full_width' => true,
					'mode' => false,
					'desc' => __ ( '', 'plumberx' ),
					'subtitle' => __ ( 'Upload any media using the WordPress native uploader', 'plumberx' ),
					'required' => array( 'header_style', '=', 'header_2' ),
			),
			array(
					'id'       => 'heading_1',
					'type'     => 'text',
					'title'    => __( 'Highlight text', 'plumberx' ),
					'desc'    => __( 'This is the first row of text.', 'plumberx' ),
					'default'  => 'Expertize',
					'required' => array( 'header_style', '=', 'header_2' ),
			),
			array(
					'id'       => 'heading_2',
					'type'     => 'text',
					'title'    => __( 'Highlight text 2', 'plumberx' ),
					'desc'    => __( 'This is the second row of text.', 'plumberx' ),
					'default'  => 'you Can Trust',
					'required' => array( 'header_style', '=', 'header_2' ),
			),

			array(
					'id'       => 'title_1',
					'type'     => 'text',
					'title'    => __( 'Title One', 'plumberx' ),
					'required' => array( 'header_style', '=', 'header_2' ),
			),

			array(
					'id'       => 'subtitle_1',
					'type'     => 'text',
					'title'    => __( 'Subtitle One', 'plumberx' ),
					'required' => array( 'header_style', '=', 'header_2' ),
			),
			array(
					'id'       => 'title_2',
					'type'     => 'text',
					'title'    => __( 'Title Two', 'plumberx' ),
					'required' => array( 'header_style', '=', 'header_2' ),
			),
			array(
					'id'       => 'subtitle_2',
					'type'     => 'text',
					'title'    => __( 'Suntitle Two', 'plumberx' ),
					'required' => array( 'header_style', '=', 'header_2' ),
			),
			array(
					'id'       => 'title_3',
					'type'     => 'text',
					'title'    => __( 'Title Three', 'plumberx' ),
					'required' => array( 'header_style', '=', 'header_2' ),
			),
			array(
					'id'       => 'subtitle_3',
					'type'     => 'text',
					'title'    => __( 'SutTitle Three', 'plumberx' ),
					'required' => array( 'header_style', '=', 'header_2' ),
			),
           array(
                'id'       => 'header_bg_color',
                'type'     => 'background',
                'output'   => array( 'header' ),
                'title'    => __( 'Header Background Color', 'plumberx' ),
                'desc'     => esc_html__( 'Note: Color only shows up if there is no image uploaded.', 'plumberx' ),
                'subtitle' => __( 'Pick a background color for the Header (default: #fff).', 'plumberx' ),
		        'default'  => array(
		            'background-color' => '',
		            //'background-image' => TT_TEMPTT_THEME_DIRURI. '/images/headerbg.jpg'
		        )
           ),
                array(
                    'id'       => $shortname . '_global_herobg',
                    'type'     => 'media',
                    'url'      => true,
                    'title'    => esc_html__( 'Hero area Global background', 'plumberx' ),
                    'readonly' => false,
                    'subtitle' => esc_html__( 'In this theme, heading area of page shows Hero section, which has an image in background. You can set that background image on per page basis. But choose one global image here which applies by default.', 'plumberx' ),
                ),
            array(
                'id' => $shortname . '_hdr_cart_icon',
                'type'     => 'switch',
                'title' => esc_html__( 'Enable header cart icon', 'plumberx' ),
                'desc'   => esc_html__( 'If enabled, a small cart icon appears after menu. Note that icon only appears if woocommerce plugin is active.', 'plumberx' ),
                'default'  => true,
            ),
            array(
                'id' => $shortname . '_hdr_search_icon',
                'type'     => 'switch',
                'title' => esc_html__( 'Enable header Search icon', 'plumberx' ),
                'desc'   => esc_html__( 'If enabled, a small Search icon appears after menu. ', 'plumberx' ),
                'default'  => true,
            ),
			array(
                'id' => $shortname . '_hdr_ph_icon',
				'type'     => 'text',
				'title'    => __( 'Header Phone icon', 'plumberx' ),
				'desc' => __ ( 'By default phone icon shows up in the header after the logo in header3 and header4. You can enter class here if you want to change it. eg fa fa-phone. Applicable only on header 3 and header 4. Default: icon icon-Phone2', 'plumberx' ),
			),
			array(
                'id' => $shortname . '_hdr_tm_icon',
				'type'     => 'text',
				'title'    => __( 'Header Clock icon', 'plumberx' ),
				'desc' => __ ( 'By default Clock icon shows up in the header after the logo in header3 and header4. You can enter class here if you want to change it. eg fa fa-home. Applicable only on header 3 and header 4. Default: icon icon-Timer', 'plumberx' ),
			),
			array (
				'id' => 'topbar_control',
				'title' => __ ( 'Show/Hide Topbar', 'plumberx' ),
				'desc' => __ ( 'This bar appears on the top most area, with social and email/phone info', 'plumberx' ),
				'type'     => 'button_set',
				'full_width' => true,
				'mode' => false,
				'options'  => array(
					'enable' => 'Enable',
					'disable' => 'Disable'
				),
				 'default'  => 'enable'
			),
           array(
                'id' => $shortname . '_top_bar_clr',
                'type'     => 'color',
                'title'    => esc_html__( 'Color for the Top bar', 'plumberx' ),
                'subtitle' => esc_html__( 'Default : # 012c3c . Leave blank to trigger default color.', 'plumberx' ),
                'default'  => '',
                'required' => array( 'topbar_control', '=', 'enable' )
           ),
/*           array(
                'id' => $shortname . '_cart_control',
                'type'     => 'switch',
				'title'     => 'Enable/Disable Cart',
                'desc'   => esc_html__( 'Appears on top, besides menu. NA if woocommerce is not installed.', 'plumberx' ),
                'default'  => true,
           ),
           array(
                'id' => $shortname . '_search_control',
                'type'     => 'switch',
				'title'     => 'Enable/Disable Search',
                'desc'   => esc_html__( 'Appears on top, besides menu.', 'plumberx' ),
                'default'  => true,
           ),*/
			array(
					'id'       => 'phone',
					'type'     => 'text',
					'title'    => __( 'Topbar Phone', 'plumberx' ),
					'desc'    => __( 'This appears on top bar, and also after logo in few header types.', 'plumberx' ),
					'default'  => '+ (123) 456 7890 ',
			),

			array(
					'id'       => 'email',
					'type'     => 'text',
					'title'    => __( 'Topbar Email', 'plumberx' ),
					'desc'    => __( 'This appears on top bar, and also after logo in few header types.', 'plumberx' ),
					'default'  => 'info@plumberx.com',
			),

			array(
					'id'       => 'office_time',
					'type'     => 'text',
					'title'    => __( 'Office Time', 'plumberx' ),
					'desc'    => __( 'This data is used in certain header types, in the after logo.', 'plumberx' ),
					'default'  => 'Mon - Sat 9.00 - 19.00',
			),
			array(
					'id'       => 'off_day',
					'type'     => 'text',
					'title'    => __( 'Off Day', 'plumberx' ),
					'desc'    => __( 'This data is used in certain header types, in the after logo.', 'plumberx' ),
					'default'  => 'Sunday Closed',
			),
            array(
                'id' => $shortname . '_welcome_info22',
                'type'   => 'info',
                'notice' => false,
                'style'  => 'info',
                'desc'   =>  sprintf( esc_html__( 'Please note the social icons content in the Top bar will be fetched as you put them in Footer/Social tab.', 'plumberx' ), '<a href="http://templatation.ticksy.com/">' . esc_html__( 'contact support', 'plumberx' ) . '</a>' ),
            ),
/*            array(
                'id' => $shortname . '_en_sticky_logo',
                'type'     => 'switch',
                'title' => esc_html__( 'Enable Logo from Sticky menu.', 'plumberx' ),
                'default'  => true,
            ),*/
            array(
                'id' => $shortname . '_en_sticky_logo_mob',
                'type'     => 'switch',
                'title' => esc_html__( 'Disable Logo from Sticky menu on Mobile.', 'plumberx' ),
                'desc'   => esc_html__( 'If enabled, logo disappears from the sticky menu on the mobile. Many users prefer it to save space for small mobile screen for real content.', 'plumberx' ),
                'default'  => true,
            ),
		)
	);

    $sections[] = array(
        'title'            => esc_html__( 'Post settings', 'plumberx' ),
        'id'               => 'post-settings',
        'customizer_width' => '450px',
        'fields'           => array(

           array(
                'id' => $shortname . '_post_sharing',
                'type'     => 'switch',
                'title' => esc_html__( 'Enable post sharing', 'plumberx' ),
                'desc'   => esc_html__( 'If enabled, single post page shows sharing icons at the end of the post.', 'plumberx' ),
                'default'  => true
            ),

           array(
                'id' => $shortname . '_post_author',
                'type'     => 'switch',
                'title' => esc_html__( 'Enable post author box', 'plumberx' ),
                'desc'   => esc_html__( 'If enabled, single post page shows author box at the end of the post. The data for this box can be controlled from wp-admin/users/profile.', 'plumberx' ),
                'default'  => true
            ),


        )
    );
/*
	$sections[] = array (
		'title' => __ ( 'Emergency Contact(CTA)', 'plumberx' ),
		'desc' => __ ( 'This call to action (CTA) area appears footer.', 'plumberx' ),
		'id' => 'emergency',
		'customizer_width' => '450px',
		'fields' => array (
				array (
						'id' => 'emergency_description',
						'type' => 'textarea',
						'title' => __ ( 'Description', 'plumberx' ),
						'subtitle' => __ ( 'Sequentialy added selected social links', 'plumberx' ),

				),
				array (
					'id' => 'emergency_img',
					'type' => 'media',
					'title' => __ ( 'Upload Image', 'plumberx' ),
					'full_width' => true,
					'mode' => false,
					'desc' => __ ( '', 'plumberx' ),
					'subtitle' => __ ( 'Upload any media using the WordPress native uploader', 'plumberx' )
				),
				array (
					'id' => 'emergency_background',
					'type' => 'media',
					'title' => __ ( 'Upload Image', 'plumberx' ),
					'full_width' => true,
					'mode' => false,
					'desc' => __ ( '', 'plumberx' ),
					'subtitle' => __ ( 'Upload any media using the WordPress native uploader', 'plumberx' )
				),
				array(
						'id'       => 'emergency_title',
						'type'     => 'text',
						'title'    => __( 'Title', 'plumberx' ),
				),
				array(
						'id'       => 'phone',
						'type'     => 'text',
						'title'    => __( 'Phone', 'plumberx' ),
						'default'  => '+ (123) 456 7890 ',
				),


				array(
						'id'       => 'button_text',
						'type'     => 'text',
						'title'    => __( 'Button Text', 'plumberx' ),
				),
				array(
						'id'       => 'button_link',
						'type'     => 'text',
						'title'    => __( 'Buttin Link', 'plumberx' ),
				),
		)
	);
*/

	$sections[] = array (
		'title' => __ ( 'Footer / Social', 'plumberx' ),
		'id' => 'footer',
		'customizer_width' => '450px',
		'fields' => array (
           array(
                'id' => $shortname . '_enable_social',
                'type'     => 'switch',
                'title' => esc_html__( 'Enable Social icons', 'plumberx' ),
                'desc'   => esc_html__( 'If enabled, and entered values below, social icons shows up in Footer and selected header.', 'plumberx' ),
                'default'  => false
            ),

			array (
						'id' => 'social_icons',
						'type' => 'sortable',
						'mode' => 'checkbox',
						'title' => __ ( 'Multi Social Options', 'plumberx' ),
						'subtitle' => __ ( 'Select Social Networks that show on Footer and in header in selected header types. Please copy paste this link in browser to see more about placeholders http://kb.templatation.com/article/53-how-to-use-other-icon-in-top-bar-social ', 'plumberx' ),
						'options' => array (

								'fa-facebook' => 'Facebook',
								'fa-twitter' => 'Twitter',
								'fa-google-plus' => 'Google Plus',
								'fa-linkedin' => 'LinkedIn',
								'fa-instagram' => 'Instagram',
								'fa-pinterest' => 'Pinterest',
								'fa-yahoo' => 'Yahoo',
								'fa-yelp' => 'Yelp',
								'fa-placeholder1' => 'Placeholder1',
								'fa-placeholder2' => 'Placeholder2',
								'fa-placeholder3' => 'Placeholder3'

						),
		                'required' => array( $shortname . '_enable_social', '=', true ),
				),
				array (
						'id' => 'social_links',
						'type' => 'textarea',
						'title' => __ ( 'Social Links', 'plumberx' ),
						'subtitle' => __ ( 'Sequentialy added selected social links. For example, http://facebook.com/blah, http://twitter.com/blah in same sequence that you choose above.', 'plumberx' ),
						'desc' => __ ( 'Sequentialy added selected social links, Separated links with ","', 'plumberx' ),
						'default' => '#tw, #fb, #ins, #pin, #link, #drop',
		                'required' => array( $shortname . '_enable_social', '=', true ),
				),
            array(
                'id' => $shortname . '_open_social_newtab',
                'type'     => 'switch',
                'title' => esc_html__( 'Open in New tab', 'plumberx' ),
                'subtitle' => esc_html__( 'If this is turned on, the social icon links open in new tab instead of same window. Please note that it applies only for top bar, for the footer widget etc, please enter target=_blank in a tag manually.', 'plumberx' ),
                 'default'  => false
            ),
            array(
                'id' => $shortname . '_enable_ft_menu',
                'type'     => 'switch',
                'title' => esc_html__( 'Enable menu in the footer', 'plumberx' ),
                'desc'   => esc_html__( 'If enabled, menu in the footer appears which can be assigned from appearance -> Menu. ', 'plumberx' ),
                'default'  => true,
            ),
				array (
						'id' => 'copyright',
						'type' => 'editor',
						'title' => __ ( 'Footer Copyright', 'plumberx' ),
						'subtitle' => __ ( 'This text appears on left side of the footer.', 'plumberx' ),
						'default' => 'Powered by DesignArc.',
				),
				array (
						'id' => 'bottom_right_text',
						'type' => 'editor',
						'title' => __ ( 'Footer Bottom Right Text', 'plumberx' ),
						'subtitle' => __ ( 'This text appears on right side of the footer.', 'plumberx' ),
						'default' => 'Created by: DesignArc',
				),

				array (
						'id' => 'request_free_quote_text',
						'type' => 'editor',
						'title' => __ ( 'Request a Free Quote Text', 'plumberx' ),
						'subtitle' => __ ( 'This button appears just above the footer. Can be used as a quick contact button.', 'plumberx' ),
				),
				array(
						'id'       => 'quote_link',
						'type'     => 'text',
						'title'    => __( 'Request Quote Link', 'plumberx' ),
						'subtitle' => __ ( 'Where do you want to link above button ?', 'plumberx' ),
				),
		)
	);

/*-----------------------------------------------------------------------------------*/
/* Included Plugins / Theme updates                                                  */
/*-----------------------------------------------------------------------------------*/

   $sections[] = array(
        'title' => esc_html__( 'Included Plugins', 'plumberx' ),
        'id'               => 'included-plugins',
        'customizer_width' => '450px',
        'fields'           => array(

            array(
                'id' => $shortname . '_inc_plugins',
                'type'   => 'info',
                'notice' => false,
                'style'  => 'info',
                'title' => esc_html__( 'Included Plugins', 'plumberx' ),
                'desc'   => sprintf( esc_html__( 'The theme requires/recommends some plugin to function properly. Theme also includes some premium plugins with your purchase, to manage plugins, please go to Appearance -> Install plugins. Note: The menu only appears if all required plugins are not activated. So not to worry if you do not find that menu link.', 'plumberx' ), '<a href="' . esc_url( home_url('/') ) . 'wp-admin/themes.php?page=tgmpa-install-plugins">'.esc_html__( 'Click Here', 'plumberx' ).'</a>' ),
            ),
        )
    );

   $sections[] = array(
        'title'  => esc_html__( 'Theme Updates', 'plumberx' ),
        'id'     => 'theme-update',
        'icon'   => 'el el-refresh',
        'customizer_width' => '450px',
        'fields' => array(

            array(
                'id' => $shortname . '_theme_update',
                'type'   => 'info',
                'notice' => false,
                'style'  => 'info',
                'title' => esc_html__( 'Theme Update', 'plumberx' ),
                'desc'   => sprintf( esc_html__( 'The theme is regularly updated with new features and other bug fixes and improvement. You can activate Envato plugin for hassle free theme updates whenever update is available without having to download from Themeforest. Note if you modified any theme files, it will be overwritten with update. Again, make sure to keep regular backups. You can use awesome free plugin named %1$s  to create backups periodically(automatically) without hassles.', 'plumberx' ), '<a href="https://wordpress.org/plugins/updraftplus/">'.esc_html__( 'UpdraftPlus', 'plumberx' ).'</a>' ),
            ),
            array(
                'id' => $shortname . '_theme_update3',
                'type'   => 'info',
                'notice' => false,
                'style'  => 'info',
                'title' => __( 'Step by Step instruction to setup easy updates.', 'plumberx' ),
                'desc'   => sprintf( __( 'Please %1s for complete instruction to setup the updater plugin and update easily in future.', 'plumberx' ), '<a href="http://kb.templatation.com/article/35-how-to-update-the-theme">'.__( 'Click Here', 'plumberx' ).'</a>' ),
            )
        )
    );

    /*
     * <--- END SECTIONS
     */

    return $sections;

    }
}

