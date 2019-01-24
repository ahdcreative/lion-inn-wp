<?php

// Needed for dbDelta foo 
require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

/**
 * Class to Manage Database
 */
class SQLManager {

    /**
     * Global WordPress Database Variable 
     */
    private $wpdb;
	
	/**
	 * SQLManager Constructor
	 */
	function __construct() {
		
    }

    /**
     * Create the 4 Tables Needed for the Plugin
     */
    public function initTables() {
        createTable("menu");
        createTable("section");
        createTable("item");
        createTable("subitem"); 
    }

    /**
     * Create a Database Table
     * 
     * @param string $table The name of the database to be created
     */
    private function createTable($table) {
        // Get correct SQL file
        $sql = file_get_contents( WP_PLUGIN_DIR  . "assets/sql/create_" . $table . "_table.sql" );

        // Set table name
        $sql = str_replace("tableplaceholder", $wpdb->prefix . $table, $sql);

        // Set charset 
        $sql = str_replace("charsetplaceholder", $wpdb->get_charset_collate(), $sql);

        // Create the table
        dbDelta($sql);
    }
    

}