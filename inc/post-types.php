<?php
	
/*function register_cpt_events() {
	$labels = array(
		'name' 				=> ( 'Events' ),
		'singular_name' 	=> ( 'Events' ),
		'add_new' 			=> ( 'Add New Event' ),
		'add_new_item' 		=> ( 'Add New Event' ),
		'edit_item' 		=> ( 'Edit Event' ),
		'new_item' 			=> ( 'New Event' ),
		'view_item' 		=> ( 'View Event' ),
		'search_items' 		=> ( 'Search Events' ),
		'not_found' 		=> ( 'No Events found' ),
		'not_found_in_trash'=> ( 'No Events found in Trash' ),
		'parent_item_colon' => ( 'Parent Events:' ),
		'menu_name' 		=> ( 'Events' ),
	);
	$args = array(
		'labels' 			=> $labels,
		'hierarchical' 		=> true,
		'description' 		=> 'My events',
		'supports' 			=> array( 'title', 'editor', 'thumbnail' , 'excerpt', 'author', 'revisions'),
		'taxonomies' 		=> array( '' ),
		'public' 			=> true,
		'show_ui' 			=> true,
		'show_in_menu' 		=> true,
		'menu_position' 	=> 3,
		'hierarchical' 		=> true,
		'show_in_nav_menus' => true,
		'publicly_queryable'=> true,
		'exclude_from_search'=> false,
		'has_archive' 		=> true,
		'query_var' 		=> true,
		'can_export' 		=> true,
		'capability_type' 	=> 'post'
	);
	register_post_type( 'events', $args );	
}
add_action( 'init', 'register_cpt_events' );*/

function register_cpt_press() {
	$labels = array(
		'name' 				=> ( 'Press Releases' ),
		'singular_name' 	=> ( 'Press Release' ),
		'add_new' 			=> ( 'Add New Press Release' ),
		'add_new_item' 		=> ( 'Add New Press Release' ),
		'edit_item' 		=> ( 'Edit Press Release' ),
		'new_item' 			=> ( 'New Press Release' ),
		'view_item' 		=> ( 'View Press Release' ),
		'search_items' 		=> ( 'Search Press Release' ),
		'not_found' 		=> ( 'No Press Release found' ),
		'not_found_in_trash'=> ( 'No Press Release found in Trash' ),
		'parent_item_colon' => ( 'Parent Press Release:' ),
		'menu_name' 		=> ( 'Press Releases' ),
	);
	$args = array(
		'labels' 			=> $labels,
		'hierarchical' 		=> true,
		'description' 		=> 'Press Releases',
		'supports' 			=> array( 'title', 'editor', 'thumbnail' , 'excerpt', 'author', 'revisions'),
		'taxonomies' 		=> array( 'post_tag' ),
		'public' 			=> true,
		'show_ui' 			=> true,
		'show_in_menu' 		=> true,
		'menu_position' 	=> 4,
		'menu_icon'			=> 'dashicons-megaphone',
		'hierarchical' 		=> true,
		'show_in_nav_menus' => true,
		'publicly_queryable'=> true,
		'exclude_from_search'=> false,
		'has_archive' 		=> true,
		'query_var' 		=> true,
		'can_export' 		=> true,
		'capability_type' 	=> 'post'
	);
	register_post_type( 'press-release', $args );	
}
add_action( 'init', 'register_cpt_press' );


/*function register_cpt_deals() {
	$labels = array(
		'name' 				=> ( 'Deals' ),
		'singular_name' 	=> ( 'Deal' ),
		'add_new' 			=> ( 'Add New Deal' ),
		'add_new_item' 		=> ( 'Add New Deal' ),
		'edit_item' 		=> ( 'Edit Deal' ),
		'new_item' 			=> ( 'New Deal' ),
		'view_item' 		=> ( 'View Deal' ),
		'search_items' 		=> ( 'Search Deal' ),
		'not_found' 		=> ( 'No Deal found' ),
		'not_found_in_trash'=> ( 'No Deal found in Trash' ),
		'parent_item_colon' => ( 'Parent Deal:' ),
		'menu_name' 		=> ( 'Deals' ),
	);
	$args = array(
		'labels' 			=> $labels,
		'hierarchical' 		=> true,
		'description' 		=> 'Deals',
		'supports' 			=> array( 'title', 'editor', 'thumbnail' , 'excerpt', 'author', 'revisions'),
		'taxonomies' 		=> array( 'type', 'location' ),
		'public' 			=> true,
		'show_ui' 			=> true,
		'show_in_menu' 		=> true,
		'menu_position' 	=> 4,
		'menu_icon'			=> 'dashicons-products',
		'hierarchical' 		=> true,
		'show_in_nav_menus' => true,
		'publicly_queryable'=> true,
		'exclude_from_search'=> false,
		'has_archive' 		=> false,
		'query_var' 		=> true,
		'can_export' 		=> true,
		'capability_type' 	=> 'post'
	);
	register_post_type( 'deals', $args );	
}
add_action( 'init', 'register_cpt_deals' );

add_action( 'init', 'create_deals_type');

function create_deals_type() {
	register_taxonomy(
		'type',
		'deals',
		array(
			'label' => __( 'Type' ),
			'rewrite' => array( 'slug' => 'type' ),
			'hierarchical' => true,
			'query_var'  => true,
			'show_ui'	 => true,
			'show_admin_column' => true
		)
	);
}*/