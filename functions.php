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


// /* Register Menus */
// register_nav_menus(
    // array(
        // 'head-menu' => 'Head Menu',
        // 'foot-menu' => 'Foot Menu',
    // )
// );


// /* Include partials */
// include_once(get_template_directory() . '/includes/post-type.php');


// /* Thumbnail */
// if ( function_exists( 'add_theme_support' ) ) {
	// add_theme_support( 'post-thumbnails' );  
    // add_image_size('thumbnail', 220, 220, true );
	// add_image_size('small', 300, 200, true );
	// add_image_size('medium', 768, 0, true );
	// add_image_size('large', 1024, 0, true );
// }


// /* Get attachment image source by ID */
// function timevn_attachment_src( $attachmentID, $size = 'full' ) {
// 	$imageSrc = get_template_directory_uri() . '/images/no-thumbnail.png';

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
    // $menu[5][0] = 'News';

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