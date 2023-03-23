<?php 

/**
 * Theme intial setup
 */
function nx_theme_setup(){

    // register navigation menu
    register_nav_menu( 'primary', __( 'Header Menu', '9xmovies' ) );
    register_nav_menu( 'footer', __( 'Footer Menu', '9xmovies' ) );
}

/**
 * Widget init
 * @return void
 */
function nx_widgets_init(){

    $args = array(
        'name' => __( 'Main Sidebar', '9xmovies' ),
        'id' => 'sidebar',
        'description' => __( 'Widgets in this area will be shown on all posts and pages.', '9xmovies' ),
        'before_widget' => '<div class="widget-title">',
        'after_widget'  => '</div>',
        'before_title'  => '<i class="material-icons">&#xE1BD;</i>&nbsp;<span class="material-text">',
        'after_title'   => '</span></div><div class="widget-body">',
        );

    register_sidebar($args);
}

/**
 * Admin Init Function
 * @return void
 */
function nx_admin_init(){

    // adding meta boxes
    add_action('add_meta_boxes', 'nx_create_metaboxes');

    add_action('admin_enqueue_scripts', 'nx_admin_enqueue');

    wp_enqueue_media();

    add_action('admin_post_nx_setbasic_output', 'nx_setbasic_output');
    add_action('admin_post_nx_setads_output', 'nx_setads_output');
    add_action('admin_post_nx_setcustom_output', 'nx_setcustom_output');
}