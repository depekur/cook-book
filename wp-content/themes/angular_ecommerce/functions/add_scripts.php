<?php

add_action( 'wp_enqueue_scripts', 'add_my_super_app' );

function add_my_super_app() {

   wp_enqueue_script('brick_app', 
      get_template_directory_uri().'/js/app.js', 
      array('jquery'), '1.0', true );
   
   $protocol = isset( $_SERVER["HTTPS"] ) ? 'https://' : 'http://';

   $params = array(
      'ajaxurl' => admin_url('admin-ajax.php', '$protocol')
   );

   wp_localize_script( 'brick_app', 'brick_app', $params );
} 