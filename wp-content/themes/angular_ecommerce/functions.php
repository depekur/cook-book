<?php

require 'functions/add_scripts.php';
require 'functions/recipe.php';
require 'functions/example.php';

//регаем менюхи, чтоб появились в админке
register_nav_menus( array(
	'sidebar_menu' => 'боковая менюха',
	'footer_menu' => 'менюха в футере',
) );

add_theme_support( 'post-thumbnails' ); 

set_post_thumbnail_size( 300, 300, true );

// Show posts of 'post', 'page' and 'movie' post types on home page
add_action( 'pre_get_posts', 'add_my_post_types_to_query' );

function add_my_post_types_to_query( $query ) {
  if ( is_home() && $query->is_main_query() )
    $query->set( 'post_type', array( 'post', 'page', 'tattoo' ) );
  return $query;
}

register_sidebar( array(
        'name' => __( 'Левая колонка', 'brick-tattoo' ),
        'id' => 'primary-widget-area',
        'description' => __( 'Область левой колонки', 'brick-tattoo' ),
        'before_widget' => '<li id="%1$s">',
        'after_widget' => '</li>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ) );


// AJAX FUN 


add_action('wp_ajax_nopriv_my_cool_ajax', 'my_ajax_func');
add_action('wp_ajax_my_cool_ajax', 'my_ajax_func');

function my_ajax_func() {

   $tat_id = get_field('tattoo', absint( $_REQUEST['post_id'] ));

   echo wp_get_attachment_image( $tat_id, 'full' );

   die();
}
