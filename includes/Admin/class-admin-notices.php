<?php

class Simple_Notify_Admin_Notices {

    use Simple_Notify_Trait_Helpers;
    public function __construct() {
        add_action( 'admin_notices', [ $this, 'display_admin_notices' ] );
    }

    public function display_admin_notices() {
        if ( isset( $_GET['page'] ) && 'simple-notify-settings' === $_GET['page'] ) {
            $message = $this->notify( __('Welcome to the Custom Notification System plugin!', 'simple-notify'), 'success' );
            echo $message;
        }
    }
}