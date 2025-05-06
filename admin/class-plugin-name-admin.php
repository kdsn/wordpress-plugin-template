<?php

if (!defined('ABSPATH')) {
    exit;
}

class Plugin_Name_Admin {

    public function __construct() {
        // Constructor if needed
    }

    /**
     * Tilføjer plugin menu til admin.
     */
    public function add_admin_menu() {
        add_options_page(
            'Plugin Name Settings',
            'Plugin Name',
            'manage_options',
            'plugin-name',
            [$this, 'create_admin_page']
        );
    }

    /**
     * Registrerer pluginets indstillinger.
     */
    public function register_settings() {
        register_setting('plugin_name_settings_group', 'plugin_name_settings', [
            'sanitize_callback' => [$this, 'sanitize_settings']
        ]);

        add_settings_section(
            'plugin_name_main_section',
            'Main Settings',
            null,
            'plugin-name'
        );

        add_settings_field(
            'plugin_name_api_key',
            'API Key',
            [$this, 'render_api_key_field'],
            'plugin-name',
            'plugin_name_main_section'
        );
    }

    /**
     * Saniterer indstillinger.
     */
    public function sanitize_settings($input) {
        $output = [];
        if (isset($input['api_key'])) {
            $output['api_key'] = plugin_name_sanitize($input['api_key']);
        }
        return $output;
    }

    /**
     * Viser API Key-felt.
     */
    public function render_api_key_field() {
        $options = get_option('plugin_name_settings');
        $api_key = $options['api_key'] ?? '';
        echo "<input type='text' name='plugin_name_settings[api_key]' value='" . esc_attr($api_key) . "' class='regular-text'>";
    }

    /**
     * HTML for selve admin siden.
     */
    public function create_admin_page() {
        ?>
        <div class="wrap">
            <h1>Plugin Name Settings</h1>
            <form method="post" action="options.php">
                <?php
                settings_fields('plugin_name_settings_group');
                do_settings_sections('plugin-name');
                submit_button();
                ?>
            </form>
        </div>
        <?php
    }
}
