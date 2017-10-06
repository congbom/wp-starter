<?php
add_action( 'wp_enqueue_scripts', 'wp_starter_theme_enqueue_scripts' );
function wp_starter_theme_enqueue_scripts() {

	wp_enqueue_script( 'scripts', get_template_directory_uri() . '/assets/dist/bundle.js', '', '', true );

	$wp_script_data = array(
		'ajaxurl' => admin_url('admin-ajax.php' ),
		'homeurl' => home_url(),
	);
	
	wp_localize_script( 'scripts', 'wp_vars', $wp_script_data );
}


add_action( 'after_setup_theme', 'wp_starter_theme_setup' );
function wp_starter_theme_setup() {
	load_theme_textdomain( 'wp-starter', get_template_directory() . '/languages' );

	add_theme_support( 'customize-selective-refresh-widgets' );

	add_theme_support( 'automatic-feed-links' );

	add_theme_support( 'post-thumbnails' );

	add_theme_support( 'custom-logo' );

	add_theme_support( 'title-tag' );

	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'wp-starter' ),
	) );

	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );
}
