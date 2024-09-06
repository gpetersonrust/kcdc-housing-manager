<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://Moxcar.com
 * @since      1.0.0
 *
 * @package    Kcdc_Housing_Manager
 * @subpackage Kcdc_Housing_Manager/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Kcdc_Housing_Manager
 * @subpackage Kcdc_Housing_Manager/includes
 * @author     Gino Peterson <gpeterson@moxcar.com>
 */
class Kcdc_Housing_Manager_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'kcdc-housing-manager',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
