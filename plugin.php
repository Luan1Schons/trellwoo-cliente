<?php
/**
 * Plugin name: Trayllo WooCoommerce Cliente
 * Description: Plugin do Trayllo Woocommerce para Wordpress
 * */


/**
 * Register a custom menu page.
 */
function woo_trayllo_client_menu_page(){
    add_menu_page( 
        __( 'Trayllo WooCommerce - Trello', 'textdomain' ),
        'Trayllo WooCommerce',
        'manage_options',
        'custompage',
        'main_trayllo_woo_client',
        'dashicons-admin-plugins',
        4
    ); 
}
add_action( 'admin_menu', 'woo_trayllo_client_menu_page' );
 
/**
 * Display a custom menu page
 */
function main_trayllo_woo_client(){
    $nonce = wp_create_nonce('trayllo_check_domain');
    ob_start();
    include_once plugin_dir_path(__FILE__).'pages/main.php';
    $template = ob_get_contents();
    ob_end_clean();

    echo $template;
}