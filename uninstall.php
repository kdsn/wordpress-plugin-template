<?php
if (!defined('WP_UNINSTALL_PLUGIN')) {
    exit;
}

// Delete plugin options
delete_option('plugin_name_settings');

// Remove custom post type content
$posts = get_posts([
    'post_type' => 'my_custom_post_type',
    'numberposts' => -1,
    'post_status' => 'any'
]);

foreach ($posts as $post) {
    wp_delete_post($post->ID, true);
}

// Drop custom DB table
global $wpdb;
$wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}plugin_name_table");
