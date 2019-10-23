<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       johnlazaro.com
 * @since      1.0.0
 *
 * @package    Source_Insights
 * @subpackage Source_Insights/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Source_Insights
 * @subpackage Source_Insights/admin
 * @author     John Lazaro <johnlazarodigital@gmail.com>
 */
class Source_Insights_Ajax_Requests_Handler {

	public function init() {

		$this->register_localize_ajax_script();
		$this->setup_actions();

	}

	public function register_localize_ajax_script() {

		// prepare script for enqueue
		wp_register_script(
			'souins_ajax_scripts',
			plugin_dir_url( __FILE__ ) . 'js/source-insights-ajax.js',
			array('jquery')
		);
		
		// send ajax url to frontend
		wp_localize_script(
			'souins_ajax_scripts',
			'ajax_data',
			array( 'url' => admin_url( 'admin-ajax.php' ) )
		);

		// enqueue script for ajax requests
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'souins_ajax_scripts' );

	}

	public function setup_actions() {

		add_action(
			'wp_ajax_souins_ajax_test_function',
			array( $this, 'souins_ajax_test_function')
		);

		add_action(
			'wp_ajax_nopriv_souins_ajax_test_function',
			array( $this, 'souins_ajax_test_function' )
		);

	}

	public function souins_ajax_test_function() {

	    // return
	    echo json_encode('test function');
	    wp_die();

	}

}
