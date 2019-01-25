<?php 

add_action( 'init', 'plumberx_service_init', 1 );
/**
 * Register a service post type.
 *
 */
function plumberx_service_init() {
	$labels = array(
		'name'               => _x( 'Services', 'Plumberx Services', 'plumberx-essentials' ),
		'singular_name'      => _x( 'Service', 'Plumberx Service', 'plumberx-essentials' ),
		'menu_name'          => _x( 'PB Services', 'admin menu', 'plumberx-essentials' ),
		'name_admin_bar'     => _x( 'service', 'add new on admin bar', 'plumberx-essentials' ),
		'add_new'            => _x( 'Add New', 'service', 'plumberx-essentials' ),
		'add_new_item'       => __( 'Add New Service', 'plumberx-essentials' ),
		'new_item'           => __( 'New Service', 'plumberx-essentials' ),
		'edit_item'          => __( 'Edit Service', 'plumberx-essentials' ),
		'view_item'          => __( 'View Service', 'plumberx-essentials' ),
		'all_items'          => __( 'All Services', 'plumberx-essentials' ),
		'search_items'       => __( 'Search Services', 'plumberx-essentials' ),
		'parent_item_colon'  => __( 'Parent Services:', 'plumberx-essentials' ),
		'not_found'          => __( 'No Services found.', 'plumberx-essentials' ),
		'not_found_in_trash' => __( 'No Services found in Trash.', 'plumberx-essentials' )
	);

	$args = array(
		'labels'             => $labels,
        'description'        => __( 'Description.', 'plumberx-essentials' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'service' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt' )
	);

	// Apply filters
	$args = apply_filters( 'tt_service_cpt_args', $args );
	register_post_type( 'service', $args );


	/**
	 * Register Taxonomy ( Category )
	 */

	// Arguments
	$tax_args = array(
		'labels' => array(
			'name' => esc_attr__( 'Service Categories', 'allureshop' ),
			'singular_name' => esc_attr__( 'Category', 'allureshop' ),
			'search_items'  => esc_attr__( 'Search Categories', 'allureshop' ),
			'all_items' => esc_attr__( 'All Categories', 'allureshop' ),
			'parent_item' => esc_attr__( 'Parent Category', 'allureshop' ),
			'parent_item_colon' => esc_attr__( 'Parent Category:', 'allureshop' ),
			'edit_item' => esc_attr__( 'Edit Category', 'allureshop' ),
			'update_item' => esc_attr__( 'Update Category', 'allureshop' ),
			'add_new_item' => esc_attr__( 'Add New Category', 'allureshop' ),
			'new_item_name' => esc_attr__( 'New Category Name', 'allureshop' ),
			'menu_name' => esc_attr__( 'Categories', 'allureshop' ),
		),
		'hierarchical' => true,
	    'show_ui' => true,
	    'show_admin_column' => true,
	    'query_var' => true,
	    'rewrite' => array( 'slug' => 'pb_service' ),
		);

	// Apply filters
	$tax_args = apply_filters( 'tt_service_cats_args', $tax_args );

	// Register Taxonomy
	register_taxonomy( 'pb_service', 'service', $tax_args );

}