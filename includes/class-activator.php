<?php

class Notify_Activator {
    public static function activate() {
        // when plugin activate create a table in database
        Notify_Database_Handler::create_table();
    }
}