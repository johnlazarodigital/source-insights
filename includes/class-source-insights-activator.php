<?php

/**
 * Fired during plugin activation
 *
 * @link       johnlazaro.com
 * @since      1.0.0
 *
 * @package    Source_Insights
 * @subpackage Source_Insights/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Source_Insights
 * @subpackage Source_Insights/includes
 * @author     John Lazaro <johnlazarodigital@gmail.com>
 */
class Source_Insights_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {

		self::setup_db();

	}

	/**
	 * Setup database tables on plugin activation.
	 *
	 * @since    1.0.0
	 */
	public function setup_db() {

        global $wpdb;

        $db_version = '1.0.0';
        
        $charset_collate = $wpdb->get_charset_collate();

        // table structure for links
        $links_table_name = $wpdb->prefix . 'souins_links';
        $links_sql = "CREATE TABLE $links_table_name (
        	id bigint(20) NOT NULL AUTO_INCREMENT,
        	hash text NOT NULL,
        	destination_url varchar(255) NOT NULL,
        	ref_source_id bigint(20) NOT NULL,
        	source_description longtext NOT NULL,
        	date_created timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY  (id)
        ) $charset_collate;";

        // table structure for link sources
        $sources_table_name = $wpdb->prefix . 'souins_sources';
        $sources_sql = "CREATE TABLE $sources_table_name (
        	id bigint(20) NOT NULL AUTO_INCREMENT,
        	source text NOT NULL,
        	date_created timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY  (id)
        ) $charset_collate;";

        // table structure for link clicks
        $clicks_table_name = $wpdb->prefix . 'souins_clicks';
        $clicks_sql = "CREATE TABLE $clicks_table_name (
        	id bigint(20) NOT NULL AUTO_INCREMENT,
        	ref_link_id bigint(20) NOT NULL,
        	ref_source_id bigint(20) NOT NULL,
        	date_clicked timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY  (id)
        ) $charset_collate;";

        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta( $links_sql );
        dbDelta( $sources_sql );
        dbDelta( $clicks_sql );

        add_option( 'souins_db_version', $db_version );

    }

}
