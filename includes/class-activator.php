<?php

class Simple_Notify_Activator {
    public static function activate() {
        // when plugin activate create a table in database
        Simple_Notify_Database_Handler::create_table();
    }
}