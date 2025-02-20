<?php

class SIMPNO_Activator {
	public static function activate() {
		// when plugin activate create a table in database
		SIMPNO_Database_Handler::create_table();
	}
}
