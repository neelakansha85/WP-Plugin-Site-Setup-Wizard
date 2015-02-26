<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * Dashboard. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://github.com/neelakansha85/WP-Plugin-Site-Setup-Wizard
 * @since             0.0.1
 * @package           Site_Setup_Wizard_NSD
 *
 * @wordpress-plugin
 * Plugin Name:       Site Setup Wizard
 * Plugin URI:        https://github.com/neelakansha85/WP-Plugin-Site-Setup-Wizard
 * Description:       Allows creating sites automatically using a simple shortcode [site_setup_wizard] placed on the site. The plugin is completely customizable.
 * Version:           0.0.1
 * Author:            Neel Shah
 * Author URI:        http://neelshah.info
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       site-setup-wizard
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/site-setup-wizard-activator.php
 */
function activate_site_setup_wizard() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/site-setup-wizard-activator.php';
	Site_Setup_Wizard_NSD_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/site-setup-wizard-deactivator.php
 */
function deactivate_site_setup_wizard() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/site-setup-wizard-deactivator.php';
	Site_Setup_Wizard_NSD_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_site_setup_wizard' );
register_deactivation_hook( __FILE__, 'deactivate_site_setup_wizard' );

/**
 * The core plugin class that is used to define internationalization,
 * dashboard-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/site-setup-wizard.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    0.0.1
 */
function run_plugin_name() {

	$plugin = new Site_Setup_Wizard_NSD();
	$plugin->run();

}
run_plugin_name();
