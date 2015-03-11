<?php

/**
 * The settings page of the plugin.
 *
 * @link       http://example.com
 * @since      0.0.1
 *
 * @package    Site_Setup_Wizard_NSD
 * @subpackage Site_Setup_Wizard_NSD/admin
 */

/**
 * The settings page of the plugin.
 *
 * Allows Super Admin to configure settings for Site Setup Wizard
 *
 * @package    Site_Setup_Wizard_NSD
 * @subpackage Site_Setup_Wizard_NSD/admin
 * @author     Neel Shah <neel@nsdesigners.com>
 */
class Site_Setup_Wizard_Settings {

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    0.0.1
	 */
	public function __construct() {

		$this->ssw_settings_content();
	}

	/**
	 * Settings Page Content for Site Setup Wizard 
	 *
	 * @since    0.0.1
	 */
	public function ssw_settings_content() {

		echo '<p><strong>This page contains the configurable settings for the Site Setup Wizard</strong></p>';

		echo '<p>Following is the Demo of different Sanitize functions of wordpress for reference<br/>';

		$ssw_plugin_fixed_dir = plugin_dir_path( __FILE__ ) ;
		echo "ssw_plugin_fixed_dir = ".$ssw_plugin_fixed_dir;
		echo '<br/><br/>Calling test variable<br/><br/>';
		
		$site_setup_wizard_nsd = new Site_Setup_Wizard_NSD();
		$ssw_test_var1 = $site_setup_wizard_nsd->get_ssw_test_var1();
		echo 'Test Var1 = '.$ssw_test_var1;

	}
}