<?php

if(!function_exists('add_action')) {
    die('This file cannot be accessed directly');
}

// Setup

// Includes

include('includes/cmxmr_js_include.php');
include('includes/cmxmr_admin_page.php');
include('includes/cmxmr_enqueue.php');
include('includes/cmxmr_display_notice.php');

// Hooks

add_action( 'wp_head', 'cmxmr_js_include' );
add_action('admin_menu', 'cmxmr_add_admin_page');
add_action('admin_enqueue_scripts', 'cmxmr_load_admin_scripts');

// enabling the actions for the frontend notice only if the user has selected to display the notice and has added text of the notice
if (get_option('cmxmr_display_frontend_notice') && esc_attr(get_option('cmxmr_display_frontend_notice_text'))) {
    add_action('wp_footer', 'cmxmr_display_notice');
    add_action('wp_enqueue_scripts', 'cmxmr_load_scripts');
}