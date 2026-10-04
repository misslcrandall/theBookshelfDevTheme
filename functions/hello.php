<?php
/*
Plugin Name: Hello Inspiration
Description: Based on Hello Dolly by Matt Mullenweg (http://wordpress.org/plugins/hello-dolly/)
*/

// Customize admin footer
function modify_footer_quote () {
	//echo 'Lets go rattle the stars';
	$chosen = hello_get_quote();
	$lang   = '';
	if ( 'en_' !== substr( get_user_locale(), 0, 3 ) ) {
		$lang = ' lang="en"';
	}
	printf(
		'<p id="inspire"><span class="screen-reader-text">%s </span><span dir="ltr"%s>%s</span></p>',
		__( '' ),
		$lang,
		$chosen
	);
}
add_filter('admin_footer_text', 'modify_footer_quote');

function hello_get_quote() {
	$quotes = "Books, she has found, are a way to live a thousand lives--or to find strength in a very long one.
	There is a defiance in being a dreamer.
	They say that the best blaze burns the brightest when circumstances are at their worst.
	One must always be careful of books and what is inside them, for words have the power to change us.";

	// Here we split it into lines.
	$quotes = explode( "\n", $quotes );

	// And then randomly choose a line.
	return wptexturize( $quotes[ mt_rand( 0, count( $quotes ) - 1 ) ] );
}

// We need some CSS to position the paragraph.
function inspire_css() {
	echo "
	<style type='text/css'>
	#inspire {
		float: left;
		font-style: italic;
	}
	.rtl #inspire {
		float: left;
	}
	.block-editor-page #dolly {
		display: none;
	}
	@media screen and (max-width: 782px) {
		#inspire,
		.rtl #dolly {
			float: none;
			padding-left: 0;
			padding-right: 0;
		}
	}
	</style>
	";
}

add_action( 'admin_head', 'inspire_css' );
