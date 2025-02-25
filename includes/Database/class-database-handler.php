<?php

class SIMPNO_Database_Handler {
	public static function create_table() {
		global $wpdb;

		$table_name      = $wpdb->prefix . 'custom_notifications';
		$charset_collate = $wpdb->get_charset_collate();

		if( ! function_exists( 'dbDelta' ) ) {
			require_once ABSPATH . 'wp-admin/includes/upgrade.php';
		}

		$sql = "CREATE TABLE IF NOT EXISTS $table_name (
            id INT NOT NULL AUTO_INCREMENT,
            user_id BIGINT NOT NULL,
            message TEXT NOT NULL,
            status VARCHAR(20) DEFAULT 'unread',
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (id)
        ) $charset_collate;";

		
		dbDelta( $sql );
	}
}
