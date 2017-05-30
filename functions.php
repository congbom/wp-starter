<?php
add_action( 'wp_enqueue_scripts', 'enqueue_scripts_styles' );
function enqueue_scripts_styles() {
	/* CSS */
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() .'/vendors/bootstrap/css/bootstrap.min.css' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() .'/vendors/font-awesome/css/font-awesome.min.css' );
	wp_enqueue_style( 'styles', get_stylesheet_uri() );

	/* JS */
	wp_enqueue_script( 'scripts', get_template_directory_uri() . '/vendors/bootstrap/js/bootstrap.min.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'scripts', get_template_directory_uri() . '/scripts.js', array( 'jquery' ), '', true );

	$wp_script_data = array(
		'ajaxurl' => admin_url('admin-ajax.php' ),
		'homeurl' => home_url(),
	);
	
	wp_localize_script( 'scripts', 'wp_vars', $wp_script_data );
}


add_action( 'after_setup_theme', 'dw_pagebold_setup' );
function dw_pagebold_setup() {
	load_theme_textdomain( 'dw-pagebold', get_template_directory() . '/languages' );

	add_theme_support( 'customize-selective-refresh-widgets' );

	add_theme_support( 'automatic-feed-links' );

	add_theme_support( 'post-thumbnails' );

	add_theme_support( 'custom-logo' );

	add_theme_support( 'title-tag' );

	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'dw-pagebold' ),
	) );

	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );
}
