<?php
/* Register posttype, taxonomy posttypename */
add_action('init', 'register_posttype_taxonomy_posttypename');
function register_posttype_taxonomy_posttypename() {
	/* Post-type */
	$post_type_args = array(
		'labels' => array(
			'name' => 'PostTypeNames',
			'singular_name' => 'PostTypeName',
		),
		'public' => true,
		'menu_position' => 5,
		'menu_icon' => 'dashicons-welcome-view-site',
		'supports' => array(
			'title', 
			'editor', 
			'thumbnail'
		),
	);

	register_post_type( 'posttypename', $post_type_args );

	/* Taxonomy */
	$taxonomy_args = array(
		'label' => 'PostTypeCategory',
		'hierarchical' => true,
	);

	register_taxonomy( 'posttypename_category', 'posttypename', $taxonomy_args );
}