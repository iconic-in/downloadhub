<?php

/**
 * Theme style and js setup
 */
function nx_site_enqueue(){

    // main style
    wp_enqueue_style( 'nx-style', get_stylesheet_uri(), [], rand());
    wp_enqueue_style( 'nx-font', '//fonts.googleapis.com/css?family=Roboto:400,500|Material+Icons');

    // bootstrap & other js
    wp_enqueue_script('jquery-script', '//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js', null, null, true);
    wp_enqueue_script('nx-script', get_template_directory_uri().'/script/script.min.js', null, null, true);
}