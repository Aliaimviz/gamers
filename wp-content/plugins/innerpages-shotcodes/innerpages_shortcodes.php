<?php
/**
Plugin Name: Inner pages shortcodes
Description: Inner pages shortcodes show slider and mix design of content pages
version: 1.0
author: waseem aimviz
**/
function Zumper_widget_enqueue_script() {   
    //wp_enqueue_script( 'my_custom_script', plugin_dir_url( __FILE__ ) . 'js/jquery.repeatable.js', array('jquery'), '1.0' );
    wp_enqueue_style( 'myCSS1', plugins_url( '/css/inner_pages.css', __FILE__ ) );
}
add_action('wp_enqueue_scripts', 'Zumper_widget_enqueue_script');
include("includes/class_inner_pages.php");
$inner_pages = new inner_pages_shortcodes();
?>