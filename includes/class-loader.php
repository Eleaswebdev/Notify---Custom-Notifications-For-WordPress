<?php

class SIMPNO_Loader {
    public static function init() {
        // Load traits
        require_once SIMPNO_PLUGIN_DIR . 'includes/traits/trait-helpers.php';

        // Load utility classes
        require_once SIMPNO_PLUGIN_DIR . 'includes/utilities/class-logger.php';

        // Load core functionality
        require_once SIMPNO_PLUGIN_DIR . 'includes/class-activator.php';
        require_once SIMPNO_PLUGIN_DIR . 'includes/class-deactivator.php';

        // Load Admin classes
        require_once SIMPNO_PLUGIN_DIR . 'includes/Admin/class-admin-notices.php';
        require_once SIMPNO_PLUGIN_DIR . 'includes/Admin/class-admin-settings.php';

        // Load Frontend classes
        require_once SIMPNO_PLUGIN_DIR . 'includes/Frontend/class-frontend-notifications.php';

        // Load Database classes
        require_once SIMPNO_PLUGIN_DIR . 'includes/Database/class-database-handler.php';

        // Initialize components
        new SIMPNO_Admin_Notices();
        new SIMPNO_Admin_Settings();
        new SIMPNO_Frontend_Notifications();
    }
}