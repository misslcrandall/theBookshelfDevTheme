<?php

add_action('after_setup_theme', 'excerpts_setup');
function excerpts_setup() {

	//Shorten Exceprt Length
	add_filter( 'excerpt_length', function($length) {
		return 120;
	}, PHP_INT_MAX );
	//Edit Excerpt Text
	function custom_excerpt_more($more) {
		global $post;
		return '&hellip;';
	}
	add_filter('excerpt_more', 'custom_excerpt_more');

	// Returns a "Continue Reading" link for excerpts
	if ( !function_exists( 'dte_continue_reading_link' ) ) {
		function dte_continue_reading_link() {
			return ' <br>' . __( 'Continue Reading' );
		}
	}
	
	// Adds a pretty "Continue Reading" link to custom post excerpts.
	if ( !function_exists( 'dte_custom_excerpt_more' ) ) {
		function dte_custom_excerpt_more( $output ) {
			if ( has_excerpt() && ! is_attachment() ) {
				$output .= dte_continue_reading_link();
			}
			return $output;
		}
		add_filter( 'get_the_excerpt', 'dte_custom_excerpt_more' );
	}
}