<?php

class Simple_Notify_Loader {
    public static function init() {
        // Load traits
        require_once plugin_dir_path(__FILE__) . 'traits/trait-helpers.php';

        // Load utility classes
        require_once plugin_dir_path(__FILE__) . 'utilities/class-logger.php';

        // Load core functionality
        require_once plugin_dir_path(__FILE__) . 'class-activator.php';
        require_once plugin_dir_path(__FILE__) . 'class-deactivator.php';

        // Load Admin classes
        require_once plugin_dir_path(__FILE__) . 'Admin/class-admin-notices.php';
        require_once plugin_dir_path(__FILE__) . 'Admin/class-admin-settings.php';

        // Load Frontend classes
        require_once plugin_dir_path(__FILE__) . 'Frontend/class-frontend-notifications.php';

        // Load Database classes
        require_once plugin_dir_path(__FILE__) . 'Database/class-database-handler.php';

        // Initialize components
        new Simple_Notify_Admin_Notices();
        new Simple_Notify_Admin_Settings();
        new Simple_Notify_Frontend_Notifications();
    }
}