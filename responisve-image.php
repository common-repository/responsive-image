<?php
/*
Plugin Name: Responsive Image Content
-Plugin URI: https://hash-webservices.com/
Description: The image on your  post and etc will be automatically responsive.
Version: 1.0.0
Author: Hassanal S. Aguam
Author URI: https://hash-webservices.com/
Text Domain: responisve-image
Domain Path: /languages
*/

// responsive images auto class
function ric_filesSetup() {   
	wp_register_style( 'responsive-image-content',  plugin_dir_url( __FILE__ ) . './css/responsive-image-content.css' );
	wp_enqueue_style( 'responsive-image-content' );
}
add_action('wp_enqueue_scripts', 'ric_filesSetup');


function ric_responsive($content) {
   global $post;
   $pattern ="/<img(.*?)class=\"(.*?)\"(.*?)>/i";
   $replacement = '<img$1class="$2 responsive_image_content "$3>';
   $content = preg_replace($pattern, $replacement, $content);
   return $content;
}
add_filter('the_content', 'ric_responsive');