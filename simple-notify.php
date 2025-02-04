<?php

/**
 * Plugin Name: Simple Notify
 * Description: A customizable notification system for admin and users with email and dashboard notifications.
 * Version: 1.0.0
 * Author: Eleas Kanchon
 * Author URI: https://github.com/Eleaswebdev
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: simple-notify
 */

 defined('ABSPATH') || exit;
 define( 'SIMPNO_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
 // Load the loader class
require_once plugin_dir_path(__FILE__) . 'includes/class-loader.php';


SIMPNO_Loader::init();

// Register activation and deactivation hooks
register_activation_hook(__FILE__, ['SIMPNO_Activator', 'activate']);
register_deactivation_hook(__FILE__, ['SIMPNO_Deactivator', 'deactivate']);

