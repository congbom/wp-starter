<?php

/* Adding Enqueue scripts */
add_action( 'wp_enqueue_scripts', 'enqueue_scripts_styles' );
function enqueue_scripts_styles() {
	wp_enqueue_style( 'styles', get_stylesheet_uri() );
    wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'addons', get_template_directory_uri() . '/scripts/addons.js', array(), '1.0' );
	wp_enqueue_script( 'scripts', get_template_directory_uri() . '/scripts/scripts.js', array(), '1.0' );	

	$wp_script_data = array(
		'ajaxurl' => admin_url('admin-ajax.php' ),
		'homeurl' => home_url(),
	);
	
	wp_localize_script( 'scripts', 'wp_script_data', $wp_script_data );
}




?>