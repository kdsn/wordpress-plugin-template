<?php
/**
 * Plugin Name: Plugin Name
 * Description: A brief description of what your plugin does.
 * Version: 1.0.0
 * Author: Your Name
 * License: MIT
 * Text Domain: plugin-name
 */

defined('ABSPATH') || exit;

// Include the main plugin class
require_once plugin_dir_path(__FILE__) . 'includes/class-plugin-name.php';

// Initialize plugin
function run_plugin_name() {
    $plugin = new Plugin_Name();
    $plugin->run();
}
run_plugin_name();
