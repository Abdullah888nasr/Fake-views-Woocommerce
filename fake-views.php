<?php 

/**
 * Plugin Name
 *
 * @package           PluginPackage
 * @author            Abdullah Nasr
 * @copyright         2023 Your Name or Company Name
 * @license           GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name:       Fake Views - Woocommerce
 * Plugin URI:        #
 * Description:       Show to the customer fake views in single product page.
 * Version:           1.0.0
 * Requires at least: 5.5
 * Requires PHP:      8.0
 * Author:            Abdullah Nasr
 * Author URI:        #
 * Text Domain:       fake-views
 * License:           GPL v2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Update URI:        #
 */

 /*
Fake Views is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

Fake Views is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Fake Views. If not, see http://www.gnu.org/licenses/gpl-2.0.txt.
*/


// For Security Plugin
defined( 'ABSPATH' ) || exit;


// Check If autoload file is existing or not and calling it.
if(file_exists(dirname(__FILE__) . '/vendor/autoload.php')){
    require_once dirname(__FILE__) . '/vendor/autoload.php';
}

// Calling function when plugin activate or deactivate.
register_deactivation_hook( __FILE__, array('Inc\Base\Deactivate', 'deactivate'));
register_activation_hook( __FILE__, array('Inc\Base\Activate', 'activate'));
register_uninstall_hook( __FILE__, array('Inc\Base\Uninstall', 'uninstall'));

// Check If Init class is existing or not and calling static function (register_actions) on it.
if(class_exists('Inc\\Init')):
    Inc\Init::register_actions();
endif;