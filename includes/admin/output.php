<?php

/**
 * Admin Meta Save
 * @return void
 */
function nx_admin_meta_save($post_id, $post, $update){
    
    if(!isset($_POST['nx_make_featured'])) 
        return;

    $featured = $_POST['nx_make_featured'];

    update_post_meta($post_id, 'make_featured', $featured);
}


/**
 * Basic output
 */
function nx_setbasic_output(){

    if(!current_user_can('manage_options'))
        wp_die('You are not allowed to be on this page.');

    check_admin_referer('nx_setbasic_output');

    $get_opts = get_option('nx_options');

    $post_data = $_POST['basic'];

    $get_opts['tracker_code'] = htmlspecialchars($post_data['tracker_code']);
    $get_opts['site_notice'] = htmlspecialchars($post_data['site_notice']);
    $get_opts['site_logo'] = esc_url_raw($post_data['site_logo']);
    $get_opts['favicon_icon'] = esc_url_raw($post_data['favicon_icon']);
    $get_opts['boost_site'] =  ($post_data['boost_site'] == 'yes')? 'yes' : 'no';

    update_option('nx_options', $get_opts);

    wp_redirect(admin_url('admin.php?page=nx-basic-options&status=1'));
}


/**
 * Output ads
 */
function nx_setads_output(){

    if(!current_user_can('manage_options'))
        wp_die('You are not allowed to be on this page.');

    check_admin_referer('nx_setads_output');

    $get_opts = get_option('nx_options');

    $post_data = $_POST['ads'];

    $get_opts['footer_code'] = htmlspecialchars($post_data['footer_code']);
    $get_opts['header_code'] = htmlspecialchars($post_data['header_code']);
    $get_opts['footer_code_mobile'] = htmlspecialchars($post_data['footer_code_mobile']);
    $get_opts['header_code_mobile'] = htmlspecialchars($post_data['header_code_mobile']);
    $get_opts['mobile_users'] = htmlspecialchars($post_data['mobile_users']);
    $get_opts['desktop_users'] = htmlspecialchars($post_data['desktop_users']);

    update_option('nx_options', $get_opts);

    wp_redirect(admin_url('admin.php?page=nx-ads-options&status=1'));
}


/**
 * nx_setcustom_output
 */
function nx_setcustom_output(){

   if(!current_user_can('manage_options'))
        wp_die('You are not allowed to be on this page.');

    check_admin_referer('nx_setcustom_output');

    $get_opts = get_option('nx_options');

    $post_data = $_POST['custom'];

    $get_opts['custom_js'] = htmlspecialchars($post_data['custom_js']);
    $get_opts['custom_css'] = $post_data['custom_css'];
     

    update_option('nx_options', $get_opts);

    wp_redirect(admin_url('admin.php?page=nx-custom-options&status=1'));

}