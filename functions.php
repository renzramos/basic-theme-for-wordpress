<?php
// includes
include('includes/settings.php');

// basic setup
if (!function_exists('basic_setup')){

	function basic_setup(){
		add_theme_support( 'title-tag' );
		add_theme_support( 'custom-logo' );
		add_theme_support( 'html5' );
	}

}
add_action( 'after_setup_theme', 'basic_setup' );

// enqueue scripts
function enqueue_scripts() {

	wp_enqueue_style( 'bootstrap', get_stylesheet_directory_uri() . '/assets/css/bootstrap.min.css', array(), null);
    wp_enqueue_style( 'style', get_stylesheet_uri(), array(), null  );

	wp_enqueue_script('bootstrap', get_stylesheet_directory_uri() . '/assets/js/bootstrap.js', array() ,null, true);
	wp_enqueue_script('script', get_stylesheet_directory_uri() . '/assets/js/script.js', array() ,null, true);
	
	// Localize the script with new data
	$translation_array = array(
		'template_directory' => get_template_directory_uri(),
		'home_url' => home_url(),
		'ajax_url' => admin_url( 'admin-ajax.php' )
	);
	wp_localize_script( 'script', 'scr', $translation_array );

}
add_action( 'wp_enqueue_scripts', 'enqueue_scripts' );
?>