<?php

class Simple_Notify_Deactivator {
    public static function deactivate() {
        flush_rewrite_rules();
    }
}