<?php
/**
 * Plugin Name: Trellwoo
 * Plugin URI: https://trellwoo.com.br
 * Description: Integração entre WooCommerce e Trello. Crie cards automaticamente no seu Trello e melhore a organização dos pedidos da sua loja virtual.
 * Version: 1.0
 * Author: ER Soluções Web
 * Author URI: https://www.ersolucoesweb.com.br/
 * License: GPLv2
 *
 * @package trellwoo
 */

/**
 * Site URL Constant
 */

const SITE_TRELLWOO = 'trellwoo.com.br';

/**
 * Register a custom menu page.
 */
function woo_trayllo_client_menu_page() {
	add_menu_page(
		__( 'Trellwoo WooCommerce', 'textdomain' ),
		'Trellwoo',
		'manage_options',
		'trellwoo_main',
		'main_trellwoo_client',
		'dashicons-admin-plugins',
		4
	);
}
add_action( 'admin_menu', 'woo_trayllo_client_menu_page' );

/**
 * Display a custom menu page
 */
function main_trellwoo_client() {
	$nonce = wp_create_nonce( 'trayllo_check_domain' );
	include_once plugin_dir_path( __FILE__ ) . 'pages/main.php';
}


/**
 * Load custom plugin css and scripts
 */
function trellwoo_scripts() {
	if ( isset( $_GET['page'] ) ) {
		if ( 'trellwoo_main' === $_GET['page'] ) {
			wp_enqueue_style( 'style', plugin_dir_url( __FILE__ ) . '/assets/theme/trellwoo.css', false, 1.1, 'all' );
			wp_enqueue_style( 'bootstrap', plugin_dir_url( __FILE__ ) . '/assets/bootstrap-5.0.2/css/bootstrap.min.css', false, 1.0, 'all' );
			wp_enqueue_script( 'script', plugin_dir_url( __FILE__ ) . '/assets/bootstrap-5.0.2/js/bootstrap.min.js', array( 'jquery' ), 1.1, true );
			wp_enqueue_script( 'axios', 'https://unpkg.com/axios/dist/axios.min.js', null, 1.1, false );
		}
	}
}
add_action( 'admin_enqueue_scripts', 'trellwoo_scripts' );
