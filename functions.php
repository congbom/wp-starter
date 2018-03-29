<?php
/* Enqueue scripts */
add_action( 'wp_enqueue_scripts', 'wp_starter_theme_enqueue_scripts' );
function wp_starter_theme_enqueue_scripts() {
	$theme_data = wp_get_theme(); 
	$theme_version = $theme_data->get( 'Version' );

	wp_enqueue_style( 'styles', get_template_directory_uri() . '/distribute/styles.css', array(), $theme_version, 'all' );
	wp_enqueue_script( 'bundle', get_template_directory_uri() . '/distribute/bundle.js#asyncload', array(), $theme_version, true );

	$wp_script_data = array(
		'ajaxurl' => admin_url('admin-ajax.php' ),
		'homeurl' => home_url(),
	);
	
	wp_localize_script( 'bundle', 'wp_vars', $wp_script_data );
}


/* Async load */
add_filter( 'clean_url', 'wp_starter_theme_async_scripts', 11, 1 );
function wp_starter_theme_async_scripts($url) {
    if ( strpos( $url, '#asyncload') === false )
        return $url;
    else if ( is_admin() )
        return str_replace( '#asyncload', '', $url );
    else
	return str_replace( '#asyncload', '', $url )."' async='async"; 
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


/* Remove special characters from Uploaded files */
add_filter('sanitize_file_name', 'sanitize_file_name_remove_accents', 10);
function sanitize_file_name_remove_accents( $filename ) {
	return remove_accents( $filename );
}
