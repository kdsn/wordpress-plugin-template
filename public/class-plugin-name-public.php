<?php

if (!defined('ABSPATH')) {
    exit;
}

class Plugin_Name_Public {

    public function __construct() {
        // Initial setup if needed
    }

    /**
     * Tilføjer shortcode funktionalitet.
     *
     * [plugin_name]
     */
    public function render_shortcode($atts = [], $content = null) {
        // Hent indstillinger fra databasen
        $settings = get_option('plugin_name_settings');
        $api_key = $settings['api_key'] ?? 'Not set';

        // Valgfrie shortcode attributter
        $atts = shortcode_atts([
            'title' => 'Default Title'
        ], $atts, 'plugin_name');

        ob_start();
        ?>
        <div class="plugin-name-box">
            <h3><?php echo esc_html($atts['title']); ?></h3>
            <p>API Key: <?php echo esc_html($api_key); ?></p>
        </div>
        <?php
        return ob_get_clean();
    }

    /**
     * Indlæser CSS/JS til frontend.
     */
    public function enqueue_public_assets() {
        wp_enqueue_style(
            'plugin-name-public',
            plugin_dir_url(__FILE__) . '../css/public.css',
            [],
            '1.0.0'
        );

        wp_enqueue_script(
            'plugin-name-public',
            plugin_dir_url(__FILE__) . '../js/public.js',
            [],
            '1.0.0',
            true
        );
    }
}
