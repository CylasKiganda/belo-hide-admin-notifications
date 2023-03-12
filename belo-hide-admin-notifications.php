<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://fmh
 * @since             1.0.0
 * @package           Belo_Hide_Admin_Notifications
 *
 * @wordpress-plugin
 * Plugin Name:       Hide Admin Dashboard Notifications
 * Plugin URI:        https://#
 * Description:       Hides admin notifications for either specific admin users or for all admin users
 * Version:           1.0.0
 * Author:            Belo
 * Author URI:        https://fmh
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       belo-hide-admin-notifications
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
define( 'BELO_HIDE_ADMIN_NOTIFICATIONS_VERSION', '1.0.111111111111111111111' );

 

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-belo-hide-admin-notifications-activator.php
 */
function activate_belo_hide_admin_notifications() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-belo-hide-admin-notifications-activator.php';
	Belo_Hide_Admin_Notifications_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-belo-hide-admin-notifications-deactivator.php
 */
function deactivate_belo_hide_admin_notifications() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-belo-hide-admin-notifications-deactivator.php';
	Belo_Hide_Admin_Notifications_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_belo_hide_admin_notifications' );
register_deactivation_hook( __FILE__, 'deactivate_belo_hide_admin_notifications' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-belo-hide-admin-notifications.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_belo_hide_admin_notifications() {

	$plugin = new Belo_Hide_Admin_Notifications();
	$plugin->run();

}
run_belo_hide_admin_notifications();
