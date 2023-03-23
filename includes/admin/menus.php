<?php 

/**
 * Adding menu page
 * @return void
 */
function nx_admin_menu(){

    add_menu_page(
        '9xadmin Theme Options', 
        'Theme Options', 
        'manage_options', 
        'nx-basic-options', 
        'nx_setbasic_input', 
        'dashicons-performance' 

    );

    // Basic Settings
    add_submenu_page(
        'nx-basic-options',
        'Basic Settings', 
        'Basic Settings', 
        'manage_options', 
        'nx-basic-options', 
        'nx_setbasic_input'
    );

    // Custom Options
    add_submenu_page(
        'nx-basic-options',
        'Custom Options', 
        'Custom Options', 
        'manage_options', 
        'nx-custom-options', 
        'nx_setcustom_input'
    );

    // Ads Managent
    add_submenu_page(
        'nx-basic-options',
        'Ads Management', 
        'Ads Management', 
        'manage_options', 
        'nx-ads-options', 
        'nx_setads_input'
    );


}