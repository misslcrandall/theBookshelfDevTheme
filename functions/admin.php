<?php

add_action('after_setup_theme', 'wp_admin_setup');
function wp_admin_setup() {
    
    // Remove WordPress logo from admin bar
    add_action('wp_before_admin_bar_render', 'custom_admin_bar' );
    function custom_admin_bar() {
        global $wp_admin_bar;
        $wp_admin_bar->remove_menu('wp-logo');
    }

    // Add shortcodes in widgets
    add_filter( 'widget_text', 'do_shortcode' );

    // Remove dashboard widgets
    add_action('admin_menu', 'remove_dashboard_widgets');
    function remove_dashboard_widgets(){
        remove_meta_box('dashboard_activity', 'dashboard', 'core'); // recent activity
        remove_meta_box('dashboard_right_now','dashboard','core'); // right now overview box
        remove_meta_box('dashboard_incoming_links', 'dashboard', 'core'); // incoming links box
        remove_meta_box('dashboard_quick_press', 'dashboard', 'core'); // quick press box
        remove_meta_box('dashboard_plugins', 'dashboard', 'core'); // new plugins box
        remove_meta_box('dashboard_recent_drafts', 'dashboard', 'core'); // recent drafts box
        remove_meta_box('dashboard_recent_comments', 'dashboard', 'core'); // recent comments box
        remove_meta_box('dashboard_primary', 'dashboard', 'core'); // wordpress development blog box
        remove_meta_box('dashboard_secondary', 'dashboard', 'core'); // other wordpress news box
    }

    // Remove comment columns from pages
    add_filter('manage_pages_columns', 'custom_pages_columns');
    function custom_pages_columns($defaults) {
        unset($defaults['comments']); // comments
        return $defaults;
    }

    // Remove post meta boxes from screen options
    add_action('admin_menu','remove_post_metaboxes');
    function remove_post_metaboxes() {
        remove_meta_box('trackbacksdiv', 'post', 'normal');
    }

    // remove the "tags" column from the post list
    add_filter('manage_posts_columns' , 'update_post_columns');
    function update_post_columns($columns) {
        unset( $columns['tags'] );
        return $columns;
    }

    // Remove page meta boxes from screen options
    add_action('admin_menu', 'remove_page_metaboxes');
    function remove_page_metaboxes() {
        remove_meta_box('commentstatusdiv', 'page', 'normal');
        remove_meta_box('commentsdiv', 'page', 'normal');
    }

    // Removes unnecessary user profile fields  
    add_filter('user_contactmethods', 'hide_profile_fields', 10, 1);
    function hide_profile_fields($contactmethods) {
        unset($contactmethods['aim']);
        unset($contactmethods['jabber']);
        unset($contactmethods['yim']);
        return $contactmethods;
    }

    add_action( 'admin_head-user-edit.php', 'remove_website_row_wpse_dte_css' );
    add_action( 'admin_head-profile.php',   'remove_website_row_wpse_dte_css' );
    function remove_website_row_wpse_dte_css() {
        echo '<style>
            tr.user-url-wrap,
            tr.user-description-wrap
            { display: none; }
        </style>';
    }

    // Removes color scheme options from user profiles
    /*add_action('admin_head', 'remove_color_scheme');
    function remove_color_scheme() {
        global $_wp_admin_css_colors;
        $_wp_admin_css_colors = 0;
    }*/

    // Hides updates from non-admins
    add_action('admin_menu', 'essentials_remove_update_nag');
    function essentials_remove_update_nag() {
        if ( !current_user_can('update_options')) {
            remove_action('admin_notices', 'update_nag', 3);
        }
    }

    // Disables self-trackbacking
    add_action('pre_ping', 'disable_self_pings');
    function disable_self_pings($links) {
        foreach ($links as $l => $link)
            if (0 === strpos($link, home_url()))
                unset($links[$l]);
    }

    // Custom Login Screen
    function custom_login() {
        wp_enqueue_style( 'custom-login', get_bloginfo('url') . '/wp-content/themes/baker/dist/styles/login.css' );
    }
    add_action('login_enqueue_scripts', 'custom_login');

    function my_login_logo_url() {
        return home_url();
    }
    add_filter( 'login_headerurl', 'my_login_logo_url' );

    //Customize admin footer
    function modify_footer_admin () {
        $lang   = '';
        if ( 'en_' !== substr( get_user_locale(), 0, 3 ) ) {
            $lang = ' lang="en"';
        }
    }
    add_filter('admin_footer_text', 'modify_footer_admin');

    add_filter( 'admin_bar_menu', 'replace_wordpress_howdy', 25 );
        function replace_wordpress_howdy( $wp_admin_bar ) {
        $time = current_time('H');
        if ($time >= "4" && $time < "12") { $greeting = "Good Morning,"; }
        else if ($time >= "12" && $time < "17") { $greeting = "Good Afternoon,"; }
        else if ( $time < "4" || $time >= "17" ) { $greeting = "Good Evening,"; }
        
        $my_account = $wp_admin_bar->get_node('my-account');
        if ( ! isset( $my_account->title ) ) {
            return;
        }
        $newtext = str_replace( 'Howdy,', $greeting, $my_account->title);
        $wp_admin_bar->add_node( array(
        'id' => 'my-account',
        'title' => $newtext,
        ) );
    }

    /*-----------------------------------------------------------------------------------*/
    // Admin Protection
    /*-----------------------------------------------------------------------------------*/
    if (is_admin()) {
        function essentials_block_admin() {
            // If the user is not an administrator, kill WordPress execution and provide a message
            if (!current_user_can('manage_categories') && $_SERVER['PHP_SELF'] != '/wp-admin/admin-ajax.php') {
                wp_die(__('You are not allowed to access this part of the site'));
            }
        }
        add_action('admin_init', 'essentials_block_admin', 1);
    }

    // Hide theme editor
    if(!defined('DISALLOW_FILE_EDIT')) {
        define('DISALLOW_FILE_EDIT', 'true');
    }

    // Protect against malicious URL requests
    global $user_ID; if($user_ID) {
        if(!current_user_can('administrator')) {
            if (strlen($_SERVER['REQUEST_URI']) > 255 ||
                stripos($_SERVER['REQUEST_URI'], "eval(") ||
                stripos($_SERVER['REQUEST_URI'], "CONCAT") ||
                stripos($_SERVER['REQUEST_URI'], "UNION+SELECT") ||
                stripos($_SERVER['REQUEST_URI'], "base64")) {
                    @header("HTTP/1.1 414 Request-URI Too Long");
                    @header("Status: 414 Request-URI Too Long");
                    @header("Connection: Close");
                    @exit;
            }
        }
    }

    // Reduce spam by banning empty referrers
    add_action('check_comment_flood', 'verify_comment_referrer');
    function verify_comment_referrer() {
        if (!wp_get_referer()) {
            wp_die(__('You cannot post a comment at this time. Maybe you need to enable referrers in your browser.'));
        }
    }

	/*-----------------------------------------------------------------------------------*/
	//remove pages
	/*-----------------------------------------------------------------------------------*/
	function dte_remove_menus(){
        //remove_menu_page( 'index.php' );                  	//Dashboard
        //remove_menu_page( 'edit.php' );                   	//Posts
        //remove_menu_page( 'upload.php' );                 	//Media
        remove_menu_page( 'link-manager.php' );              //Links
        //remove_menu_page( 'edit.php?post_type=page' );    	//Pages
        remove_menu_page( 'edit-comments.php' );          	//Comments
        //remove_menu_page( 'themes.php' );                 	//Appearance
        //remove_menu_page( 'plugins.php' );              	    //Plugins
        //remove_menu_page( 'users.php' );                  	//Users
        //remove_menu_page( 'tools.php' );                  	//Tools
        //remove_menu_page( 'options-general.php' );        	//Settings
        //remove_menu_page( 'about.php' );
        //remove_menu_page( 'edit-tags.php' );
  
        $currentuserID = get_current_user_id();
  
        if ($currentuserID !== 1) {
            //remove_menu_page( 'edit.php?post_type=acf-field-group' );
            //remove_menu_page( 'options-general.php' );
        }
        if ($currentuserID !== 1 && $currentuserID !== 2) {
            //remove_menu_page( 'tools.php');
        }
      }
      add_action( 'admin_menu', 'dte_remove_menus', 999 );
}