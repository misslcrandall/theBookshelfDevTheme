<?php

// Add Stylesheets
function theme_styles() {
	wp_enqueue_style( 'styles', get_stylesheet_directory_uri() . '/dist/styles/styles.min.css' );
	wp_enqueue_style( 'slick', get_stylesheet_directory_uri() . '/dist/styles/slick.css' );
	//wp_enqueue_style( 'slick-theme', get_stylesheet_directory_uri() . '/dist/styles/slick-theme.css' );
	wp_enqueue_style('AOS_animate', 'https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.css', false, null);
}
add_action( 'wp_enqueue_scripts', 'theme_styles' );

// Add Scripts
function theme_scripts() {
	//wp_deregister_script('jquery');
	wp_register_script('jqueryCDN', 'https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js', null, false);
	wp_enqueue_script('jqueryCDN');
	
	wp_register_script( 'AOS', 'https://unpkg.com/aos@2.3.1/dist/aos.js', false, null, true );
	wp_enqueue_script('AOS');

	wp_register_script( 'slick', get_stylesheet_directory_uri() . '/libraries/slick.min.js', null, true );
	wp_enqueue_script('slick');

	//wp_deregister_script('Mixitup');
	wp_register_script( 'Mixitup', get_stylesheet_directory_uri() . '/libraries/mixitup.min.js', array ('jquery'), null, true);
	wp_enqueue_script('Mixitup');

	//wp_deregister_script('Multifilter');
	wp_register_script( 'Multifilter', get_stylesheet_directory_uri() . '/libraries/mixitup-multifilter.min.js', array ('jquery'), null, true);
	wp_enqueue_script('Multifilter');

	wp_register_script('myScripts', get_stylesheet_directory_uri() . '/dist/scripts/scripts.js', '', NULL, true);
	wp_enqueue_script('myScripts');
}
add_action( 'wp_enqueue_scripts', 'theme_scripts' );