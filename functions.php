<?php
// /* Include partials */
// include_once(get_template_directory() . '/includes/post-type.php');


/* Adding Enqueue scripts */
add_action( 'wp_enqueue_scripts', 'enqueue_scripts_styles' );
function enqueue_scripts_styles() {
    wp_enqueue_style( 'fonts', 'http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700&subset=latin,latin-ext,vietnamese,cyrillic,cyrillic-ext' );
	wp_enqueue_style( 'addons', get_template_directory_uri() .'/addons.css' );
	wp_enqueue_style( 'styles', get_stylesheet_uri() );
    wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'addons', get_template_directory_uri() . '/scripts/addons.js', array(), '1.0' );
	wp_enqueue_script( 'scripts', get_template_directory_uri() . '/scripts/scripts.js', array(), '1.0' );	

	$wp_script_data = array(
		'ajaxurl' => admin_url('admin-ajax.php' ),
		'homeurl' => home_url(),
	);
	
	wp_localize_script( 'scripts', 'wp_vars', $wp_script_data );
}


/* Enqueue scripts Back-end */
add_action( 'admin_enqueue_scripts', 'enqueue_custom_admin_style' );
function enqueue_custom_admin_style( ) {
    wp_enqueue_style( 'admins', get_template_directory_uri() . '/admin.css');
}


/* Remove special characters from Uploaded files */
add_filter('sanitize_file_name', 'sanitize_file_name_remove_accents', 10);
function sanitize_file_name_remove_accents( $filename ) {
	return remove_accents( $filename );
}


// /* Register Menus */
// register_nav_menus(
    // array(
        // 'main_menu' => 'Main Menu',
    // )
// );




// /* Thumbnail */
// if ( function_exists( 'add_theme_support' ) ) {
	// add_theme_support( 'post-thumbnails' );  
    // add_image_size('thumbnail', 300, 300, true );
	// add_image_size('small', 600, 400, true );
	// add_image_size('medium', 900, 0, true );
	// add_image_size('large', 1400, 0, true );
// }


// /* Get attachment image source by ID */
// function timevn_attachment_src( $attachmentID, $size = 'thumbnail' ) {
//     $imageSrc = get_template_directory_uri() . '/images/default-'. $size .'.png';

//     if( wp_attachment_is_image( $attachmentID ) ) {
//         $imageInfo = wp_get_attachment_image_src( $attachmentID, $size);
//         $imageSrc = $imageInfo[0];
//     }

//     return $imageSrc;
// }


// /* Load theme textdomain */
// add_action ('init', 'theme_init');
// function theme_init(){
	// load_theme_textdomain('mb', get_template_directory() . '/resources/lang');
// }


// /* admin_menu hooks */
// add_action( 'admin_menu', 'custom_admin_menu_hooks' );
// function custom_admin_menu_hooks() {
    // /* Change Posts menu label */
    // global $menu;
    // $menu[10][0] = 'Upload';

    // /* Remove 'Comments' menu page */
    // remove_menu_page( 'edit-comments.php' );  
// }


// /* Custom EXCERPT length */
// add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
// function custom_excerpt_length( $length ) {
    // return 50;
// }


// /* Custom EXCERPT more */
// add_filter('excerpt_more', 'new_excerpt_more');
// function new_excerpt_more( $more ) {
    // return ' ...';
// }


// /* Remove AdminBar */
// add_filter('show_admin_bar', '__return_false');


// /* Remove the_excerpt auto <p> */
// remove_filter('the_excerpt', 'wpautop');