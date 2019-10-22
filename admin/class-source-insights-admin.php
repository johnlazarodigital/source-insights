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
class Source_Insights_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Source_Insights_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Source_Insights_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/source-insights-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Source_Insights_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Source_Insights_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/source-insights-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Setup admin menu that manage links and sources.
	 *
	 * @since    1.0.0
	 */
	public function setup_admin_menu() {

		add_menu_page( 'Source Insights', 'Source Insights', 'manage_options', 'source-insights-links' );
		
		add_submenu_page(
			'source-insights-links',
			'Links',
			'Links',
			'manage_options',
			'source-insights-links',
			array( $this, 'source_insights_links_content' )
		);

		add_submenu_page(
			'source-insights-links',
			'Sources',
			'Sources',
			'manage_options',
			'source-insights-sources',
			array( $this, 'source_insights_sources_content' )
		);

	}

	/**
	 * Display content for link page.
	 *
	 * @since    1.0.0
	 */
	public function source_insights_links_content() {

		echo 'links';

	}

	/**
	 * Display content for source page.
	 *
	 * @since    1.0.0
	 */
	public function source_insights_sources_content() {

		echo 'sources';
		
	}

	/**
	 * Handle ajax request.
	 *
	 * @since    1.0.0
	 */
	public function handle_ajax_requests() {

		// test function
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
