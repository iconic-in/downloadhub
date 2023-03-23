<?php 

// adding styles in amdin panel
function nx_admin_enqueue(){

    if(!isset($_GET['page'])
        || !in_array($_GET['page'], ['nx-basic-options', 'nx-ads-options', 'nx-custom-options']))
            return;

    nx_site_enqueue();

}