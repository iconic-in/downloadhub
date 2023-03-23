<?php

/**
 * Ceating meta boxes
 * @return void
 */
function nx_create_metaboxes(){

    add_meta_box(
        'nx_admin_featured', 
        __('Make Featured', '9xmovies'),
        'nx_metaboxes_input',
        'post',
        'side',
        'high'
    );

}