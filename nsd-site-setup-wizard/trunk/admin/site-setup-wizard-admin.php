<?php

/**
 * The dashboard-specific functionality of the plugin.
 *
 * @link       http://example.com
 * @since      0.0.1
 *
 * @package    Site_Setup_Wizard_NSD
 * @subpackage Site_Setup_Wizard_NSD/admin
 */

/**
 * The dashboard-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the dashboard-specific stylesheet and JavaScript.
 *
 * @package    Site_Setup_Wizard_NSD
 * @subpackage Site_Setup_Wizard_NSD/admin
 * @author     Neel Shah <neel@nsdesigners.com>
 */
class Site_Setup_Wizard_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    0.0.1
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    0.0.1
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * @since    0.0.1
	 * @access   private
	 * @var      The url slug for Site Setup Wizard's Create Site Page
	 */
	private $ssw_create_site_slug = 'Site_Setup_Wizard';

	/**
	 * @since    0.0.1
	 * @access   private
	 * @var      The url slug for Site Setup Wizard's Settings Page
	 */
	private $ssw_settings_page_slug = 'Site_Setup_Wizard_Settings';
	
	/**
	 * @since    0.0.1
	 * @access   private
	 * @var      The plugin url for admin dir of Site Setup Wizard
	 */
	private $ssw_plugin_admin_url;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    0.0.1
	 * @param    string    $plugin_name 		The name of this plugin.
	 * @param    string    $version 			The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		$this->ssw_plugin_admin_url = plugin_dir_url( __FILE__ );
		$this->load_dependencies();
		
	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Site_Setup_Wizard_Settings. Orchestrates the Settings page of the plugin.
	 *
	 * @since    0.0.1
	 * @access   private
	 */
	private function load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * Settings page of Site Setup Wizard
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/site-setup-wizard-settings.php';

	}

	/**
	 * Menu function to display Site Setup Wizard -> Create Site in the Network Admin's Dashboard
	 *
	 * @since    0.0.1
	 */
	public function ssw_network_menu() {
		
		/**
		 * This function adds menu item "Create Site" in Network Admin Dashboard, 
		 * allowing it to be displayed for all users including subscribers with "read"
		 * capability and displaying it above the Dashboard with position "1.27"
		 */

		add_menu_page('Site Setup Wizard', 'Create Site', 'read', $this->ssw_create_site_slug, 
			array($this, 'ssw_print_test_data'), $this->ssw_plugin_admin_url.'images/icon.png', '1.27');
		
		// Adding First Sub menu item in the SSW Plugin to reflect the Create Site functionality in the sub menu
		add_submenu_page($this->ssw_create_site_slug, 'Site Setup Wizard', 'Create Site', 'read',
			$this->ssw_create_site_slug, array($this, 'ssw_print_test_data'));
		// Adding SSW Settings page in the Network Dashboard below the Create Site menu item
		add_submenu_page($this->ssw_create_site_slug, 'Site Setup Wizard Settings', 'Settings', 'manage_network', 
			$this->ssw_settings_page_slug, array($this, 'ssw_settings'));
		// Adding SSW Reports page in the Network Dashboard below the Create Site menu item
		/*
		add_submenu_page(SSW_CREATE_SITE_SLUG, 'Site Setup Wizard Analytics', 'Analytics', 'manage_network', 
			SSW_ANALYTICS_PAGE_SLUG, array($this, 'ssw_analytics_page'));
		*/

	}
	
	/**
	 * Print Test Data for Debug and Development Purpose
	 *
	 * @since    0.0.1
	 */
	public function ssw_print_test_data() {
		
		echo '<h3>Options Page</h3>';

		echo '<p>This page will be having all the available options to configure for the Site Setup Wizard Plugin</p>';

		echo '<p>Following is the Demo of different Sanitize functions of wordpress for reference<br/>';

		$ssw_plugin_fixed_dir = plugin_dir_path( __FILE__ ) ;
		echo "ssw_plugin_fixed_dir = ".$ssw_plugin_fixed_dir;
		echo '<br/><br/>Calling test variable<br/><br/>';
		
		$site_setup_wizard_nsd = new Site_Setup_Wizard_NSD();
		$ssw_test_var1 = $site_setup_wizard_nsd->get_ssw_test_var1();
		echo 'Test Var1 = '.$ssw_test_var1;
	}

	/**
	 * Settings Page for Site Setup Wizard 
	 *
	 * @since    0.0.1
	 */
	public function ssw_settings() {
		
		echo '<h3>Settings Page</h3>';

		$site_setup_wizard_settings = new Site_Setup_Wizard_Settings;
		
	}

	/**
	 * Register the stylesheets for the Dashboard.
	 *
	 * @since    0.0.1
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Site_Setup_Wizard_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Site_Setup_Wizard_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/site-setup-wizard-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the dashboard.
	 *
	 * @since    0.0.1
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Site_Setup_Wizard_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Site_Setup_Wizard_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/site-setup-wizard-admin.js', array( 'jquery' ), $this->version, false );

	}

}
