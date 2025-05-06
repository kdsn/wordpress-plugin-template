<?php

if (!defined('ABSPATH')) {
    exit;
}

class Plugin_Name {

    public function __construct() {
        // Hook loading here if needed
    }

    public function run() {
        // Init hooks
        $this->load_dependencies();
        $this->define_admin_hooks();
        $this->define_public_hooks();
    }

    private function load_dependencies() {
        require_once plugin_dir_path(__FILE__) . '../admin/class-plugin-name-admin.php';
        require_once plugin_dir_path(__FILE__) . '../public/class-plugin-name-public.php';
    }

    private function define_admin_hooks() {
        if (is_admin()) {
            $admin = new Plugin_Name_Admin();
            add_action('admin_menu', [$admin, 'add_admin_menu']);
            add_action('admin_init', [$admin, 'register_settings']);
        }
    }

    private function define_public_hooks() {
        $public = new Plugin_Name_Public();
        add_shortcode('plugin_name', [$public, 'render_shortcode']);
    }
}
