<?php

class SIMPNO_Admin_Notices {

    use SIMPNO_Trait_Helpers;
    public function __construct() {
        add_action( 'admin_notices', [ $this, 'display_admin_notices' ] );
    }

    public function display_admin_notices() {
        if ( isset( $_GET['page'] ) && 'simple-notify-settings' === $_GET['page'] ) {
            $message = $this->notify( __('Welcome to the Simple Notify System plugin!', 'simple-notify'), 'success' );
            echo wp_kses_post($message);
           
        }
    }
}