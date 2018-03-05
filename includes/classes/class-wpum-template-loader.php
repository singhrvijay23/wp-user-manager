<?php
/**
 * WPUM Template loader class..
 *
 * @package     wp-user-manager
 * @copyright   Copyright (c) 2018, Alessandro Tesoro
 * @license     https://opensource.org/licenses/GPL-3.0 GNU Public License
*/

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

class WPUM_Template_Loader extends Gamajo_Template_Loader {

	protected $filter_prefix = 'wpum';

	protected $theme_template_directory = 'wpum';

	protected $plugin_directory = WPUM_PLUGIN_DIR;

	protected $plugin_template_directory = 'templates';

}
