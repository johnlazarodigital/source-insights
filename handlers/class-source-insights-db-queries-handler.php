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
class Source_Insights_Db_Queries_Handler {

	private $wpdb;

	public function __construct() {

	    global $wpdb;
	    $this->wpdb = $wpdb;

	}

	public function insert() {

		$table_name = $this->wpdb->prefix . 'souins_links';

		$hash = 'hash';

		$result = $this->wpdb->query( $this->wpdb->prepare( 
			"
			INSERT INTO $table_name
			( hash )
			VALUES ( %s )
			",
			$hash
		) );

		return 'from db';

	}

}
