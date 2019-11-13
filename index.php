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

	global $wpdb;

	$table_name = $wpdb->prefix . 'fintra_records';

	$type = $_POST['type'];
	$amount = $_POST['amount'];
	$description = $_POST['description'];

	$count = $wpdb->get_results( 
		"
		SELECT amount_after FROM $table_name
		ORDER BY id DESC
		LIMIT 1
		"
	);

	if( $count )
		$amount_after = $count[0]->amount_after;
	else
		$amount_after = 0;

	if( $type == 'add' ) {
		$amount_after = $amount_after + $amount;
	} else {
		$amount_after = $amount_after - $amount;	
	}

	$result = $wpdb->query( $wpdb->prepare( 
		"
		INSERT INTO $table_name
		( description, amount, amount_after, date_created )
		VALUES ( %s, %d, %d, NOW() )
		",
		$description,
		$amount,
		$amount_after
	) );

	if( ! $result )
		$result = $wpdb->last_error;
	else
		$result = $amount_after;

    // return
    echo json_encode( $result );
    wp_die();

}

add_action( 'wp_ajax_get_money_record', 'get_money_record' );
add_action( 'wp_ajax_priv_get_money_record', 'get_money_record' );
function get_money_record() {

	global $wpdb;

	$table_name = $wpdb->prefix . 'fintra_records';

	$count = $wpdb->get_results( 
		"
		SELECT amount_after FROM $table_name
		ORDER BY id DESC
		LIMIT 1
		"
	);

	if( $count )
		$amount_after = $count[0]->amount_after;
	else
		$amount_after = 0;

    // return
    echo json_encode( $amount_after );
    wp_die();

}