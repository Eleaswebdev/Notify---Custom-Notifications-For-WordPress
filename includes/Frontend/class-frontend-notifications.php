<?php

class Notify_Frontend_Notifications {
    public function __construct() {
        add_action("user_register", [$this, "send_welcome_email"]);
        add_action("publish_post", [$this, "send_new_post_email"], 10, 2);
        // add_action("login_form_login", [$this, "send_login_email"]);
        // add_action("profile_update", [$this, "send_profile_update_email"]);
    }

    public function send_welcome_email( $user_id ) {

        if (!get_option('notification_enable_emails_new_user_register')) return;
        $user = get_user_by("ID", $user_id);
        $email_template = get_option('notification_email_template_new_user_register', 'Welcome to our site, {name}!');
        $email = $user->user_email;
        $subject = "Welcome to our site!";
        $message = str_replace('{name}', $user->display_name, $email_template);
        wp_mail($email, $subject, $message);
    }

    public function send_new_post_email( $post_id, $post ) {
        if (!get_option('notification_enable_emails_new_post_publish')) return;

        $users = get_users(['fields' => ['user_email']]);
        $email_template = get_option( 
            'notification_email_template_new_post_publish', 
            'A new post "<a href="{url}">{title}</a>" has been published!' 
        );
        $subject = "New Post Notification";
        $post_url = get_permalink( $post_id );
        $message = str_replace(
            [ '{title}', '{url}' ], 
            [ esc_html( $post->post_title ), esc_url( $post_url ) ], 
            $email_template
        );
        foreach ($users as $user) {
            wp_mail($user->user_email, $subject, $message);
        }
    }
}