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
    //private $wpdb;
	
	/**
	 * SQLManager Constructor
	 */
	function __construct() {
		
    }

    /**
     * Create the 4 Tables Needed for the Plugin
     */
    public function initTables() {
        $this->createTable("menu");
        $this->createTable("section");
        $this->createTable("item");
        $this->createTable("subitem"); 
    }

    /**
     * Create a Database Table
     * 
     * @param string $table The name of the database to be created
     */
    private function createTable($table) {
        global $wpdb;

        // Get correct SQL file
        $sql = file_get_contents( WP_PLUGIN_DIR  . "/lion-menu/assets/sql/create_" . $table . "_table.sql" );

        // Set table name
        $sql = str_replace("tableplaceholder", $wpdb->prefix . "_lm_" . $table, $sql);

        // If sql contains a foreign key - add prefix
        if (\strpos($sql, 'FOREIGN KEY') !== false) {
            $sql = str_replace("prefixplaceholder", $wpdb->prefix . "_lm_", $sql);
        }

        // Set charset 
        $sql = str_replace("charsetplaceholder", $wpdb->get_charset_collate(), $sql);

        // Create the table
        dbDelta($sql);
    }
    

}