<?php
/* Add theme support */
add_action( 'after_setup_theme', 'block_theme_after_setup_theme' );
function block_theme_after_setup_theme() {
	// Add support for block styles.
	add_theme_support( 'custom-spacing' );

	// Enqueue editor styles.
	add_editor_style( get_template_directory_uri() .'/assets/dist/editor.css' );
}


/* Enqueue scripts */
add_action( 'wp_enqueue_scripts', 'block_theme_wp_enqueue_scripts' );
function block_theme_wp_enqueue_scripts() {
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
add_action( 'admin_enqueue_scripts', 'block_theme_admin_enqueue_scripts' );
function block_theme_admin_enqueue_scripts() {
	$theme_data = wp_get_theme(); 
	$theme_version = $theme_data->get( 'Version' );

	wp_enqueue_style( 'stella_residence-styles', get_template_directory_uri() . '/assets/dist/admin.css', array(), $theme_version, 'all' );
	wp_enqueue_script( 'stella_residence-script', get_template_directory_uri() . '/assets/dist/admin.js', array(), $theme_version, true );

	$wp_script_data = array(
		'homeurl' => home_url(),
		'ajaxurl' => admin_url('admin-ajax.php' ),
		'themeurl' => get_template_directory_uri(),
	);
	
	wp_localize_script( 'stella_residence-script', 'wp_vars', $wp_script_data );
}


/* Document title parts */
add_filter( 'document_title_parts', 'block_theme_document_title_parts' );
function block_theme_document_title_parts( $title_parts ) {
	if ( is_home() ) {
		unset( $title_parts['tagline'] );
	} else {
		unset( $title_parts['site'] );
	}

	return $title_parts; 
}


/* Sanitize file name */
add_filter('sanitize_file_name', 'block_theme_sanitize_file_name', 10);
function block_theme_sanitize_file_name( $filename ) {
	return remove_accents( $filename );
}


/* Excerpt length */
add_filter( 'excerpt_length', 'block_theme_excerpt_length', 999 );
function block_theme_excerpt_length( $length ) {
    return 44;
}


/* Async load */
add_filter( 'clean_url', 'block_theme_theme_async_scripts', 11, 1 );
function block_theme_theme_async_scripts( $url ) {
    if ( strpos( $url, '#asyncload') === false ) {
        return $url;
    } elseif ( is_admin() ) {
        return str_replace( '#asyncload', '', $url );
    } else {
		return str_replace( '#asyncload', '', $url )."' async='async"; 
    }
}