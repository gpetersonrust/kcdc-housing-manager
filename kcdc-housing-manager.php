<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://Moxcar.com
 * @since             1.0.0
 * @package           Kcdc_Housing_Manager
 *
 * @wordpress-plugin
 * Plugin Name:       KCDC Housing Manager
 * Plugin URI:        https://moxcar.com
 * Description:       The **KCDC Housing Manager** is a WordPress plugin that allows admins to create, manage, and display housing collections dynamically. Each collection can be grouped into landing pages that are created automatically based on the admin's configurations.
 * Version:           1.0.0
 * Author:            Gino Peterson
 * Author URI:        https://Moxcar.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       kcdc-housing-manager
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'KCDC_HOUSING_MANAGER_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-kcdc-housing-manager-activator.php
 */
function activate_kcdc_housing_manager() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-kcdc-housing-manager-activator.php';
	Kcdc_Housing_Manager_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-kcdc-housing-manager-deactivator.php
 */
function deactivate_kcdc_housing_manager() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-kcdc-housing-manager-deactivator.php';
	Kcdc_Housing_Manager_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_kcdc_housing_manager' );
register_deactivation_hook( __FILE__, 'deactivate_kcdc_housing_manager' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-kcdc-housing-manager.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_kcdc_housing_manager() {

	$plugin = new Kcdc_Housing_Manager();
	$plugin->run();

}
run_kcdc_housing_manager();
