<?php

require 'functions/theme_settings.php';
require 'functions/add_scripts.php';
require 'functions/recipe.php';
require 'functions/recipe_meta.php';
require 'functions/recipe_taxonomy.php';
require 'functions/save_recipe.php';





// AJAX FUN 


add_action('wp_ajax_nopriv_my_cool_ajax', 'my_ajax_func');
add_action('wp_ajax_my_cool_ajax', 'my_ajax_func');

function my_ajax_func() {

   $tat_id = get_field('tattoo', absint( $_REQUEST['post_id'] ));

   echo wp_get_attachment_image( $tat_id, 'full' );

   die();
}
