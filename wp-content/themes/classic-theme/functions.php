<?php
/* Includes */
include_once( get_template_directory() . '/includes/nav-walker.php' );
// include_once( get_template_directory() . '/includes/post-type.php' );


/* Enqueue scripts */
add_action( 'wp_enqueue_scripts', 'timevn_wp_enqueue_scripts' );
function timevn_wp_enqueue_scripts() {
	$theme_data = wp_get_theme(); 
	$theme_version = $theme_data->get( 'Version' );

	wp_enqueue_style( 'styles', get_template_directory_uri() . '/assets/dist/main.css', array(), $theme_version, 'all' );
	wp_enqueue_script( 'bundle', get_template_directory_uri() . '/assets/dist/main.js#asyncload', array(), $theme_version, true );

	$wp_script_data = array(
		'homeurl' => home_url(),
		'ajaxurl' => admin_url('admin-ajax.php' ),
		'themeurl' => get_template_directory_uri(),
	);
	
	wp_localize_script( 'bundle', 'wp_vars', $wp_script_data );
}


/* Admin enqueue scripts */
add_action( 'admin_enqueue_scripts', 'timevn_admin_enqueue_scripts' );
function timevn_admin_enqueue_scripts() {
	$theme_data = wp_get_theme(); 
	$theme_version = $theme_data->get( 'Version' );

	wp_enqueue_style( 'timevn-styles', get_template_directory_uri() . '/assets/dist/admin.css', array(), $theme_version, 'all' );
	wp_enqueue_script( 'timevn-script', get_template_directory_uri() . '/assets/dist/admin.js', array(), $theme_version, true );

	$wp_script_data = array(
		'homeurl' => home_url(),
		'ajaxurl' => admin_url('admin-ajax.php' ),
		'themeurl' => get_template_directory_uri(),
	);
	
	wp_localize_script( 'timevn-script', 'wp_vars', $wp_script_data );
}


/* After setup theme */
add_action( 'after_setup_theme', 'timevn_after_theme_setup' );
function timevn_after_theme_setup() {
	add_theme_support( 'customize-selective-refresh-widgets' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-logo' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'responsive-embeds' );

	add_theme_support( 'editor-styles' );
	add_editor_style( get_template_directory_uri() .'/assets/dist/editor.css' );

	register_nav_menus( array(
		'primary' => 'Primary Menu',
	) );

	// load_theme_textdomain( 'wp-starter-theme', get_template_directory() . '/languages' );
}


/* Document title parts */
add_filter( 'document_title_parts', 'timevn_document_title_parts' );
function timevn_document_title_parts( $title_parts ) {
	if ( is_home() ) {
		unset( $title_parts['tagline'] );
	} else {
		unset( $title_parts['site'] );
	}

	return $title_parts; 
}


/* Sanitize file name */
add_filter('sanitize_file_name', 'timevn_sanitize_file_name', 10);
function timevn_sanitize_file_name( $filename ) {
	return remove_accents( $filename );
}


/* Excerpt length */
add_filter( 'excerpt_length', 'timevn_custom_excerpt_length', 999 );
function timevn_custom_excerpt_length( $length ) {
    return 44;
}


/* Async load */
add_filter( 'clean_url', 'timevn_theme_async_scripts', 11, 1 );
function timevn_theme_async_scripts($url) {
    if ( strpos( $url, '#asyncload') === false ) {
        return $url;
    } elseif ( is_admin() ) {
        return str_replace( '#asyncload', '', $url );
    } else {
		return str_replace( '#asyncload', '', $url )."' async='async"; 
    }
}
