<?php 

/**
 * Activate theme options
 * @return void
 */
function nx_activate(){

    // less then 4.2
    if(version_compare(get_bloginfo('version'), '4.2', '<')){
        wp_die(('You must have a minimum version of 4.2 to use this theme'));
    }

    $theme_opts = get_option('nx_options');

    if($theme_opts) return;

    $opts = array(
        
            'tracker_code' => '',
            'site_logo'    => get_template_directory_uri().'/assets/logo.png',
            'favicon_icon' => '',
            'custom_css' => '',
            'custom_js'  => '',
            'footer_code'  => '',
            'header_code'  => '',
            'footer_code_mobile'  => '',
            'header_code_mobile'  => '',
            'mobile_users' => '',
            'desktop_users' => '',
            'boost_site'    => 'no',
            'site_notice'   => '',

    );

    add_option('nx_options', $opts);
}