<?php

/* Plugin Name: Finance Tracker
Plugin URI: https://1stwebdesigner.com/
Description: Slider Component for WordPress
Version: 1.0
Author: Rakhitha Nimesh Author
URI: https://1stwebdesigner.com/
License: GPLv2 or later */

add_shortcode( 'finance-tracker', 'shortcode_daily_journal' );
function shortcode_daily_journal( $atts ) {

	ob_start();

	include plugin_dir_path( __FILE__ ) . 'template.php';

	return ob_get_clean();

}

add_action( 'wp_enqueue_scripts', 'enqueue_scripts' );
function enqueue_scripts() {

	wp_register_script( 'script-name', plugin_dir_url( __FILE__ ) . 'scripts.js', array( 'jquery' ), '1.0.0', true );

	// send ajax url to frontend
	wp_localize_script(
		'script-name',
		'ajax_data',
		array( 'url' => admin_url( 'admin-ajax.php' ) )
	);

	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'script-name' );

}

add_action( 'wp_ajax_insert_to_db_function', 'insert_to_db_function' );
add_action( 'wp_ajax_priv_insert_to_db_function', 'insert_to_db_function' );
function insert_to_db_function() {

	// global $wpdb;

	// $table_name = $wpdb->prefix . 'finance_tracker';

	// $hash = 'hash';

	// $result = $wpdb->query( $wpdb->prepare( 
	// 	"
	// 	INSERT INTO $table_name
	// 	( hash )
	// 	VALUES ( %s )
	// 	",
	// 	$hash
	// ) );

    // return
    echo json_encode( 'test function');
    wp_die();

}