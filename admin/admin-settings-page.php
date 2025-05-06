<?php
if (!defined('ABSPATH')) {
    exit;
}

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
