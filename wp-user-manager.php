<?php
/*
Plugin Name: WP User Manager
Plugin URI:  https://wpusermanager.com
Description: Beautifully simple user profile directories with frontend login, registration and account customization. WP User Manager is the best solution to manage your community and your users for WordPress.
Version: 2.0.0
Author:      Alessandro Tesoro
Author URI:  https://wpusermanager.com
License:     GPLv3+
Text Domain: wpum
Domain Path: /languages
*/

/**
 * WP User Manager.
 *
 * Copyright (c) 2018 Alessandro Tesoro
 *
 * WP User Manager. is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * any later version.
 *
 * WP User Manager. is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * @author     Alessandro Tesoro
 * @version    2.0.0
 * @copyright  (c) 2018 Alessandro Tesoro
 * @license    http://www.gnu.org/licenses/gpl-3.0.txt GNU LESSER GENERAL PUBLIC LICENSE
 * @package    wp-user-manager
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! class_exists( 'WP_User_Manager' ) ) :

	/**
	 * Main WP_User_Manager class.
	 */
	final class WP_User_Manager {

		/**
		 * WPUM Instance.
		 *
		 * @var WPUM() the WPUM Instance
		 */
		protected static $_instance;

		/**
		 * Main WPUM Instance.
		 *
		 * Ensures that only one instance of Give exists in memory at any one
		 * time. Also prevents needing to define globals all over the place.
		 *
		 * @return WPUM
		 */
		public static function instance() {
			if ( is_null( self::$_instance ) ) {
				self::$_instance = new self();
			}
			return self::$_instance;
		}

		/**
		 * Get things up and running.
		 */
		public function __construct() {

			// Verify the plugin can run first.
			if( $this->plugin_can_run() ) {

			}

		}

		/**
		 * Verify that the current environment is supported.
		 *
		 * @return boolean
		 */
		private function plugin_can_run() {

			require __DIR__ . '/vendor/autoload.php';

			$requirements_check = new WP_Requirements_Check( array(
				'title' => 'WP User Manager',
				'php'   => '9.3',
				'wp'    => '4.7',
				'file'  => __FILE__,
			) );

			return $requirements_check->passes();

		}

	}

endif; // End if class_exists check.

/**
 * Start WP User Manager.
 * The main function responsible for returning the one true WP User Manager instance to functions everywhere.
 *
 * @return object
 */
function WPUM() {
	return WP_User_Manager::instance();
}

WPUM();
