<?php 

add_action( 'init', 'plumberx_project_init', 1 );
/**
 * Register a project post type.
 *
 */
function plumberx_project_init() {
	$labels = array(
		'name'               => _x( 'Projects', 'Plumberx Projects', 'plumberx-essentials' ),
		'singular_name'      => _x( 'Project', 'Plumberx Project', 'plumberx-essentials' ),
		'menu_name'          => _x( 'PB Projects', 'admin menu', 'plumberx-essentials' ),
		'name_admin_bar'     => _x( 'project', 'add new on admin bar', 'plumberx-essentials' ),
		'add_new'            => _x( 'Add New', 'project', 'plumberx-essentials' ),
		'add_new_item'       => __( 'Add New Project', 'plumberx-essentials' ),
		'new_item'           => __( 'New Project', 'plumberx-essentials' ),
		'edit_item'          => __( 'Edit Project', 'plumberx-essentials' ),
		'view_item'          => __( 'View Project', 'plumberx-essentials' ),
		'all_items'          => __( 'All Projects', 'plumberx-essentials' ),
		'search_items'       => __( 'Search Projects', 'plumberx-essentials' ),
		'parent_item_colon'  => __( 'Parent Projects:', 'plumberx-essentials' ),
		'not_found'          => __( 'No Projects found.', 'plumberx-essentials' ),
		'not_found_in_trash' => __( 'No Projects found in Trash.', 'plumberx-essentials' )
	);

	$prj_args = array(
		'labels'             => $labels,
        'description'        => __( 'Description.', 'plumberx-essentials' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'project' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'taxonomies' => array('category'),
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt' )
	);

	// Apply filters
	$prj_args = apply_filters( 'tt_project_cpt_args', $prj_args );

	register_post_type( 'project', $prj_args );


	/**
	 * Register Taxonomy ( Category )
	 */

	// Arguments
	$tax_args = array(
		'labels' => array(
			'name' => esc_attr__( 'Project Type', 'allureshop' ),
			'singular_name' => esc_attr__( 'Type', 'allureshop' ),
			'search_items'  => esc_attr__( 'Search Type', 'allureshop' ),
			'all_items' => esc_attr__( 'All Types', 'allureshop' ),
			'parent_item' => esc_attr__( 'Parent Type', 'allureshop' ),
			'parent_item_colon' => esc_attr__( 'Parent Type:', 'allureshop' ),
			'edit_item' => esc_attr__( 'Edit Type', 'allureshop' ),
			'update_item' => esc_attr__( 'Update Type', 'allureshop' ),
			'add_new_item' => esc_attr__( 'Add New Type', 'allureshop' ),
			'new_item_name' => esc_attr__( 'New Type Name', 'allureshop' ),
			'menu_name' => esc_attr__( 'Types', 'allureshop' ),
		),
		'hierarchical' => true,
	    'show_ui' => true,
	    'show_admin_column' => true,
	    'query_var' => true,
	    'rewrite' => array( 'slug' => 'pb_project' ),
		);

	// Apply filters
	$tax_args = apply_filters( 'tt_project_cats_args', $tax_args );

	// Register Taxonomy
	register_taxonomy( 'pb_project', 'project', $tax_args );
}