<?php

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Return formatted plugin output.
 *
 * @param string $text
 * @return string
 */
function plugin_name_format_output($text) {
    return '<strong class="plugin-name-highlight">' . esc_html($text) . '</strong>';
}

/**
 * Generate a frontend message box.
 *
 * @param string $message
 * @param string $type (success|error|info)
 * @return string
 */
function plugin_name_render_message($message, $type = 'info') {
    $class = 'plugin-name-message ' . sanitize_html_class($type);

    return sprintf(
        '<div class="%s">%s</div>',
        esc_attr($class),
        esc_html($message)
    );
}
