<?php

class Notify_Admin_Settings {
    public function __construct() {
        add_action("admin_menu", [$this, "add_settings_page"]);
        add_action("admin_init", [$this, "register_settings"]);
    }

    public function add_settings_page() {
       add_options_page(
        'Notify Settings',
        'Notify Settings',
        'manage_options',
        'notify-settings',
        [$this, 'settings_page_content'],
       );

    }

    public function register_settings() {
        register_setting('notify-options', 'notification_enable_emails_new_user_register');
        register_setting('notify-options', 'notification_email_template_new_user_register');
        register_setting('notify-options', 'notification_enable_emails_new_post_publish');
        register_setting('notify-options', 'notification_email_template_new_post_publish');
    }

    public function settings_page_content() {
        ?>
        <div class="wrap">
            <h1>Notification Settings</h1>
            <form method="post" action="options.php">
                <?php
                settings_fields('notify-options');
                do_settings_sections('notify-settings');
                ?>
                <table class="form-table">
                    <tr valign="top">
                        <th scope="row">Enable New User Register Notifications</th>
                        <td>
                            <input type="checkbox" name="notification_enable_emails_new_user_register" value="1"
                                <?php checked(1, get_option('notification_enable_emails_new_user_register'), true); ?> />
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row">Email Template</th>
                        <td>
                            <textarea name="notification_email_template_new_user_register" rows="10" cols="50"
                                class="large-text"><?php echo esc_textarea(get_option('notification_email_template_new_user_register')); ?></textarea>
                        </td>
                    </tr>
                </table>
                <table class="form-table">
                    <tr valign="top">
                        <th scope="row">Enable Post Publish Email Notifications</th>
                        <td>
                            <input type="checkbox" name="notification_enable_emails_new_post_publish" value="1"
                                <?php checked(1, get_option('notification_enable_emails_new_post_publish'), true); ?> />
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row">Email Template</th>
                        <td>
                            <textarea name="notification_email_template_new_post_publish" rows="10" cols="50"
                                class="large-text"><?php echo esc_textarea(get_option('notification_email_template_new_post_publish')); ?></textarea>
                        </td>
                    </tr>
                </table>
                <?php submit_button(); ?>
            </form>
        </div>
        <?php
    }
}