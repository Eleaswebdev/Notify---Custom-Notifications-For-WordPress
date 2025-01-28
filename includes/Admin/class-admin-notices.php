<?php

class Notify_Admin_Notices {

    use Notify_Trait_Helpers;
    public function __construct() {
        add_action( 'admin_notices', [ $this, 'display_admin_notices' ] );
    }

    public function display_admin_notices() {
        $message = $this->notify('Welcome to the Custom Notification System plugin!', 'success');
        echo $message;
    }
}