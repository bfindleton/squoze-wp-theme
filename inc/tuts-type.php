<?php
/**
 * Tutorials custom post type
 *
 * @package squoze
 * @since squoze 1.0
 */

// Register Tutorials Post Type  
add_action( 'init', 'register_tutorial_posts' );  
  
function register_tutorial_posts() {  
    $labels = array(  
        'name' => _x( 'Tutorials', 'squoze' ),  
        'singular_name' => _x( 'Tutorial', 'squoze' ),  
        'add_new' => _x( 'Add New', 'squoze' ),  
        'add_new_item' => _x( 'Add New Tutorial', 'squoze' ),  
        'edit_item' => _x( 'Edit Tutorial', 'squoze' ),  
        'new_item' => _x( 'New Tutorial', 'squoze' ),  
        'view_item' => _x( 'View Tutorial', 'squoze' ),  
        'search_items' => _x( 'Search Tutorial', 'squoze' ),  
        'not_found' => _x( 'No Tutorial  found', 'squoze' ),  
        'not_found_in_trash' => _x( 'No Tutorial  found in Trash', 'squoze' ),  
        'parent_item_colon' => _x( 'Parent Tutorial:', 'squoze' ),  
        'menu_name' => _x( 'Tutorials', 'squoze' )  
    );  
    $args = array(  
        'labels' => $labels,  
        'hierarchical' => true,  
        'description' => 'Tutorials',  
        'supports' => array( 'title', 'editor', 'thumbnail' ),  
        'taxonomies' => array( 'category', 'tutorials' ),  
        'public' => true,  
        'show_ui' => true,  
        'show_in_menu' => true,  
        'show_in_nav_menus' => true,  
        'publicly_queryable' => true,  
        'exclude_from_search' => false,  
        'has_archive' => true,  
        'query_var' => true,  
        'can_export' => true,  
        'rewrite' => true,  
        'capability_type' => 'post'  
    );  
  
    register_post_type( 'tutorials', $args );  
}  