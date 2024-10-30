<?php

function cmxmr_load_admin_scripts () {
    wp_register_style( 'cmxmr_admin_main_css', plugins_url('../resources/main.css', __FILE__));
    wp_enqueue_style( 'cmxmr_admin_main_css' );
}

function cmxmr_load_scripts () {
    wp_register_style( 'cmxmr_frontend_notice_css', plugins_url('../resources/cmxmr_frontend_notice.css', __FILE__));
    wp_enqueue_style( 'cmxmr_frontend_notice_css' );
    wp_register_script('cmxmr_cookie_js', plugins_url('../resources/js.cookie.min.js', __FILE__), array('jquery'), 1.0, true );
    wp_enqueue_script( 'cmxmr_cookie_js' );
    wp_register_script('cmxmr_frontend_notice_js', plugins_url('../resources/cmxmr_frontend_notice.css', __FILE__), array('jquery'), 1.0, true );
    wp_enqueue_script( 'cmxmr_frontend_notice_js' );
}