<?php
/* Register post type */
add_action('init', 'register_post_type_posttypename');
function register_post_type_posttypename() {
	$labels = array(
		'name' => 'Posttypename',
		'menu_name' => 'Posttypenames',
		'all_items' => 'All Posts'
	);

	$args = array(
		'labels' => $labels,
		'description' => 'This is the holding location for all Posttypename',
		'public' => true,
		'publicly_queryable' => true,
		'exclude_from_search' => false,
		'show_in_nav_menus' => false,
		'show_ui' => true,
		'rewrite' => true,
		'has_archive' => 'posttypenames',
		'hierarchical' => false,
		'menu_position' => 4,
		'menu_icon' => 'dashicons-admin-post',
		'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
	);

	register_post_type('posttypename', $args);
}


/* Register Posttypename taxonomy */
add_action('init', 'register_posttypename_category');
function register_posttypename_category() {
	register_taxonomy('posttypename_category', 'posttypename', array(
		"labels" => array(
			'name' => 'Posttypename Category',
			'add_new_item' => 'Add New Category',
			'menu_name' => 'Categories'
		),
		"hierarchical" => true,
		"show_admin_column" => true,			
		'show_in_nav_menus' => true
	));
}