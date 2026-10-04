<?php

//Setup Custom Post Types

function custom_post_type_books() {
 
	// Set UI labels for Custom Post Type
	$labels = array(
		'name'                => _x( 'Books', 'Post Type General Name'),
		'singular_name'       => _x( 'Book', 'Post Type Singular Name'),
		'menu_name'           => __( 'Books'),
		'all_items'           => __( 'All Books'),
		'view_item'           => __( 'View Book'),
		'add_new_item'        => __( 'Add New Book'),
		'add_new'             => __( 'Add New Book'),
		'edit_item'           => __( 'Edit Book'),
		'update_item'         => __( 'Update Book'),
		'search_items'        => __( 'Search Books'),
		'not_found'           => __( 'Book Not Found'),
		'not_found_in_trash'  => __( 'Book Not found in Trash'),
	);
		 
	// Set other options for Custom Post Type 
	$args = array(
		'menu_icon'           => 'dashicons-book-alt',
		'label'               => __( 'books'),
		'description'         => __( 'Books'),
		'labels'              => $labels,
		// Features this CPT supports in Post Editor
		'supports'            => array( 'title', 'thumbnail', 'revisions', 'custom-fields', ),
		/* A hierarchical CPT is like Pages and can have
		* Parent and child items. A non-hierarchical CPT
		* is like Posts.
		*/ 
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
		'show_in_rest' => true,
	
	);
		 
		// Registering your Custom Post Type
		register_post_type( 'books', $args );
	 
}

add_action( 'init', 'custom_post_type_books', 0 );

//hook into the init action and call create_book_taxonomies when it fires
 
add_action( 'init', 'create_subjects_hierarchical_taxonomy', 0 );
 
//create a custom taxonomy name it subjects for your posts
function create_subjects_hierarchical_taxonomy() {
 
// Add new taxonomy, make it hierarchical like categories
//first do the translations part for GUI
$labels = array(
	'name' => _x( 'Book Categories', 'taxonomy general name' ),
	'singular_name' => _x( 'Category', 'taxonomy singular name' ),
	'search_items' =>  __( 'Search Categories' ),
	'all_items' => __( 'All Book Categories' ),
	'parent_item' => __( 'Parent Category' ),
	'parent_item_colon' => __( 'Parent Category:' ),
	'edit_item' => __( 'Edit Category' ), 
	'update_item' => __( 'Update Category' ),
	'add_new_item' => __( 'Add New Category' ),
	'new_item_name' => __( 'New Category Name' ),
	'menu_name' => __( 'Book Categories' ),
);    
 
// Now register the taxonomy
register_taxonomy('subjects',array('books'), array(
	'hierarchical' => true,
	'description' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'genres' ),
  ));
}