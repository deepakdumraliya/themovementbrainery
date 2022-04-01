<?php
// Register Custom Post Type
function mb_courses_post_type() {

    $labels = array(
        'name'                  => _x( 'Courses', 'Post Type General Name', 'text_domain' ),
        'singular_name'         => _x( 'Courses', 'Post Type Singular Name', 'text_domain' ),
        'menu_name'             => __( 'Courses', 'text_domain' ),
        'name_admin_bar'        => __( 'Courses', 'text_domain' ),
        'archives'              => __( 'Courses Archives', 'text_domain' ),
        'attributes'            => __( 'Courses Attributes', 'text_domain' ),
        'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
        'all_items'             => __( 'All Courses', 'text_domain' ),
        'add_new_item'          => __( 'Add New Course', 'text_domain' ),
        'add_new'               => __( 'Add New Course', 'text_domain' ),
        'new_item'              => __( 'New Course', 'text_domain' ),
        'edit_item'             => __( 'Edit Course', 'text_domain' ),
        'update_item'           => __( 'Update Course', 'text_domain' ),
        'view_item'             => __( 'View Course', 'text_domain' ),
        'view_items'            => __( 'View Items', 'text_domain' ),
        'search_items'          => __( 'Search Courses', 'text_domain' ),
        'not_found'             => __( 'Not found', 'text_domain' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
        'featured_image'        => __( 'Featured Image', 'text_domain' ),
        'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
        'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
        'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
        'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
        'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
        'items_list'            => __( 'Items list', 'text_domain' ),
        'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
        'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
    );
    $args = array(
        'label'                 => __( 'Courses', 'text_domain' ),
        'description'           => __( 'MB Courses', 'text_domain' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'revisions', 'excerpt' ),
        'taxonomies'            => array( 'category', 'post_tag' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-book',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => 'courses',
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
        'show_in_rest'          => true,
    );
    register_post_type( 'courses', $args );

}
add_action( 'init', 'mb_courses_post_type', 0 );

function mb_mentors_post_type() {

	$labels = array(
		'name'                  => _x( 'Mentors', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Mentors', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Mentors', 'text_domain' ),
		'name_admin_bar'        => __( 'Mentors', 'text_domain' ),
		'archives'              => __( 'Mentors Archives', 'text_domain' ),
		'attributes'            => __( 'Mentors Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'All Mentors', 'text_domain' ),
		'add_new_item'          => __( 'Add New Mentor', 'text_domain' ),
		'add_new'               => __( 'Add New Mentor', 'text_domain' ),
		'new_item'              => __( 'New Mentor', 'text_domain' ),
		'edit_item'             => __( 'Edit Mentor', 'text_domain' ),
		'update_item'           => __( 'Update Mentor', 'text_domain' ),
		'view_item'             => __( 'View Mentor', 'text_domain' ),
		'view_items'            => __( 'View Items', 'text_domain' ),
		'search_items'          => __( 'Search Mentors', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Items list', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Mentors', 'text_domain' ),
		'description'           => __( 'MB Mentors', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'revisions', 'excerpt' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-universal-access',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => 'mentors',
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'show_in_rest'          => true,
	);
	register_post_type( 'mentors', $args );

}
add_action( 'init', 'mb_mentors_post_type', 0 );