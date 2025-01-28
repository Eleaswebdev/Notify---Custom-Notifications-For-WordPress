<?php

/**
 * Plugin Name: Notify
 * Description: A customizable notification system for admin and users with email and dashboard notifications.
 * Version: 1.0.0
 * Author: Eleas Kanchon
 * Text Domain: notify
 */

 defined('ABSPATH') || exit;

 // Load the loader class
require_once plugin_dir_path(__FILE__) . 'includes/class-loader.php';

Notify_Loader::init();

// Register activation and deactivation hooks
register_activation_hook(__FILE__, ['Notify_Activator', 'activate']);
register_deactivation_hook(__FILE__, ['Notify_Deactivator', 'deactivate']);

