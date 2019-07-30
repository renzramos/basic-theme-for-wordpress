<?php
/*
* Basic Theme for WordPress
* Author: Renz R.
* Created At: 2018-06-06
* Updated At: 2019-07-30
*/

// Basic Setup
if (!function_exists('basic_setup')){

	function basic_setup(){
		add_theme_support( 'title-tag' );
		add_theme_support( 'custom-logo' );
		add_theme_support( 'html5' );
		add_theme_support( 'post-thumbnails' ); 

		// Woocommerce Support
		if ( class_exists( 'woocommerce' ) ):
			add_theme_support( 'woocommerce' );
		endif;

	}

}
add_action( 'after_setup_theme', 'basic_setup' );



// Enqueue Scripts
function enqueue_scripts() {

	wp_enqueue_style( 'bootstrap', get_stylesheet_directory_uri() . '/node_modules/dist/css/bootstrap.min.css', array(), null);
    wp_enqueue_style( 'style', get_stylesheet_uri(), array(), null  );

	wp_enqueue_script('bootstrap', get_stylesheet_directory_uri() . '/node_modules/dist/js/bootstrap.js', array() ,null, true);
	wp_enqueue_script('script', get_stylesheet_directory_uri() . '/assets/js/script.js', array() ,null, true);
	
	// Localize the script with new data
	$translation_array = array(
		'template_directory' => get_template_directory_uri(),
		'home_url' => home_url(),
		'ajax_url' => admin_url( 'admin-ajax.php' )
	);
	wp_localize_script( 'script', 'localizedScript', $translation_array );

}
add_action( 'wp_enqueue_scripts', 'enqueue_scripts' );
?>