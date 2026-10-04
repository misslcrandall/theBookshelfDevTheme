<?php

//Social Icons Shortcode
function get_social($atts) {
	include 'template-parts/components/social-menu.php';
}
add_shortcode('SocialIcons', 'get_social');
