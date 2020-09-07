<?php

/**
 *
 * @link              http://jefferyng.com
 * @since             1.0.0
 * @package           Epilogue
 *
 * @wordpress-plugin
 * Plugin Name:       Epilogue
 * Plugin URI:        https://github.com/jefferyng/epilogue
 * Description:       Transitioning Facebook to Wordpress
 * Version:           1.0.0
 * Author:            Jeffery Ng
 * Author URI:        http://jefferyng.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       epilogue
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
define( 'EPILOGUE_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-epilogue-activator.php
 */
function activate_epilogue() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-epilogue-activator.php';
	Epilogue_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-epilogue-deactivator.php
 */
function deactivate_epilogue() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-epilogue-deactivator.php';
	Epilogue_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_epilogue' );
register_deactivation_hook( __FILE__, 'deactivate_epilogue' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-epilogue.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_epilogue() {

	$plugin = new Epilogue();
	$plugin->run();

}
run_epilogue();
