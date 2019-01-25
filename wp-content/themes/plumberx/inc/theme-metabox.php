<?php
if ( ! defined( 'ABSPATH' ) ) exit;

/*-----------------------------------------------------------------------------------*/
/* This file hooks the metaboxes to Metabox system powered by TT FW plugin.
/*-----------------------------------------------------------------------------------*/

/*-----------------------------------------------------------------------------------*/
/* CS meta boxes override                                                            */
/*-----------------------------------------------------------------------------------*/
// framework options filter example
if( !function_exists( 'tt_temptt_metas_opt' )) {
	function tt_temptt_metas_opt( $options ) {


// Lets create options that we will use mostly, in page, product, pages
	$tt_temptt_default_meta =  array(

				// begin: a section
				array(
					'name'   => 'section_1',
					'title'  => 'General Settings',
					'icon'   => 'fa fa-cog',
					// begin: fields
					'fields' => array(
						array(
						  'id'    => '_enable_hero_display',
						  'type'  => 'switcher',
						  'title' => esc_html__( 'Enable the hero area that appears just after the header.', 'plumberx' ),
						  'label'  => esc_html__( 'Recommended: Enabled. ', 'plumberx' ),
						  'default' => true
						),
						array(
							'id'         => '_single_headline_title',
							'type'       => 'text',
							'title'      => esc_html__( 'Custom Main Title.', 'plumberx' ),
							'desc'      => esc_html__( 'By default, default page title appears as Hero title, edit custom here if you want to.', 'plumberx' ),
							'dependency' => array( '_enable_hero_display', '==', 'true' ),
						),
						array(
							'id'    => '_single_page_img',
							'type'  => 'upload',
							'title' => esc_html__( 'Hero area background', 'plumberx' ),
							'desc'  => esc_html__( 'This image appears in background of hero section above. If left blank, default image appears. Recommended image size is 1300x400 px.', 'plumberx' ),
							'dependency' => array( '_enable_hero_display', '==', 'true' ),
						),
						array(
						  'id'      => '_single_page_color',
						  'type'    => 'color_picker',
						  'title'   => esc_html__( 'Background color.', 'plumberx' ),
						  'desc'    => esc_html__( 'You can choose to have background color, also, if you make this color transparent, it will work as overlay color on the image chosen above.', 'plumberx' ),
						  'default' => '',
						  'rgba'    => true,
						  'dependency' => array( '_enable_hero_display', '==', 'true' ),
						),

						array(
						  'id'    => '_single_hero_breadcrumbs',
						  'type'  => 'switcher',
						  'title' => esc_html__( 'Insert breadcrumbs in Hero section.', 'plumberx' ),
						  'label'  => esc_html__( 'Insert breadcrumb in this area.', 'plumberx' ),
						  'default' => true,
						  'dependency' => array( '_enable_hero_display', '==', 'true' ),
						),

						array(
						  'id'    => '_hide_title_display',
						  'type'  => 'switcher',
						  'title' => esc_html__( 'Hide default title display in content area.', 'plumberx' ),
						  'desc'  => esc_html__( 'In some case, you might want to hide the default title display. Check this to hide title. If you are not sure about it turn it On please. N/A for woocommerce products.', 'plumberx' ),
						  'label'  => esc_html__( 'It should be off if you disable Hero area above. Unless you want Visual composer to cover everything.', 'plumberx' ),
						  'default' => true
						),

					), // end: fields
				), // end: a section
);


/* Start creating meta options. */

$options = array(); // remove old options

// -----------------------------------------
// Page Metabox Options                    -
// -----------------------------------------

		$options[] = array(
			'id'        => '_tt_meta_page_opt',
			'title'     => 'Page Options',
			'post_type' => 'page',
			'context'   => 'normal',
			'priority'  => 'default',
			'sections'  => $tt_temptt_default_meta

		);
		$options[] = array(
			'id'        => '_tt_meta_page_opt',
			'title'     => 'Posts Options',
			'post_type' => 'post',
			'context'   => 'normal',
			'priority'  => 'default',
			'sections'  => $tt_temptt_default_meta

		);
		$options[] = array(
			'id'        => '_tt_meta_page_opt',
			'title'     => 'Posts Options',
			'post_type' => 'service',
			'context'   => 'normal',
			'priority'  => 'default',
			'sections'  => $tt_temptt_default_meta

		);
		$options[] = array(
			'id'        => '_tt_meta_page_opt',
			'title'     => 'Posts Options',
			'post_type' => 'project',
			'context'   => 'normal',
			'priority'  => 'default',
			'sections'  => $tt_temptt_default_meta

		);
		$options[] = array(
			'id'        => '_tt_meta_page_opt',
			'title'     => 'Products Options',
			'post_type' => 'product',
			'context'   => 'normal',
			'priority'  => 'default',
			'sections'  => $tt_temptt_default_meta

		);

		// Note : Meta options for CPTs are triggered from templatation-framework plugin as needed by this theme.

		return $options;

	}

	add_filter( 'cs_metabox_options', 'tt_temptt_metas_opt' );

}


