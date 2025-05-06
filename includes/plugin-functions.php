<?php

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Get plugin option value with fallback.
 *
 * @param string $option_name
 * @param mixed $default
 * @return mixed
 */
function plugin_name_get_option($option_name, $default = '') {
    $options = get_option('plugin_name_settings');
    return $options[$option_name] ?? $default;
}

/**
 * Sanitize user input (basic example).
 *
 * @param string $input
 * @return string
 */
function plugin_name_sanitize($input) {
    return sanitize_text_field($input);
}

/**
 * Log debug message (for development).
 *
 * @param mixed $data
 */
function plugin_name_log($data) {
    if (WP_DEBUG === true) {
        error_log(print_r($data, true));
    }
}
