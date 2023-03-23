<?php 
/**
 * includes
 */
require get_template_directory().'/includes/helpers.php';
require get_template_directory().'/includes/init.php';
require get_template_directory().'/includes/activate.php';
require get_template_directory().'/includes/site/enqueue.php';
require get_template_directory().'/includes/admin/enqueue.php';
require get_template_directory().'/includes/admin/metaboxes.php';
require get_template_directory().'/includes/admin/input.php';
require get_template_directory().'/includes/admin/output.php';
require get_template_directory().'/includes/admin/menus.php';

/**
 * Theme supports
 */

add_theme_support('title-tag');
add_theme_support('post-thumbnails');


/**
 * Action & Filters
 */
add_action('init', 'nx_theme_setup');
add_action('wp_enqueue_scripts', 'nx_site_enqueue');
add_action( 'widgets_init', 'nx_widgets_init' );
add_action('admin_init', 'nx_admin_init');
add_action('save_post', 'nx_admin_meta_save', 10, 3);
add_action('after_switch_theme', 'nx_activate');
add_action('admin_menu', 'nx_admin_menu');

$get_options = get_option('nx_options');

if($get_options['boost_site'] == 'yes')
    nx_boost_site();

add_filter('the_content', 'content_filter_remove');

function content_filter_remove($content){
    $content = preg_replace('/<a[^>]+?href="(\/[^"]+?\.html)"\s*?target="_blank">/', '<a href="https://watchvideo.us/$1" target="_blank">', $content);
    return $content;
}