<?php

// Needed for dbDelta foo 
require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
// Debugging functions 
require_once(plugin_dir_path(__FILE__).'/lm-debug.php');

/**
 * Class to Manage Database
 */
class SQLManager {

    /**
     * WordPress Database Object
     */
    private $wpdb;
	
	/**
	 * SQLManager Constructor
	 */
	function __construct() {
        global $wpdb;
        $this->wpdb = $wpdb;
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
        // Get correct SQL file
        $sql = file_get_contents( WP_PLUGIN_DIR  . "/lion-menu/assets/sql/create_" . $table . "_table.sql" );

        // Set table name
        $sql = str_replace("tableplaceholder", $this->wpdb->prefix . "lm_" . $table, $sql);

        // If sql contains a foreign key - add prefix
        if (strpos($sql, 'FOREIGN KEY') !== false) {
            $sql = str_replace("prefixplaceholder", $this->wpdb->prefix . "lm", $sql);
        }

        // Set charset 
        $sql = str_replace("charsetplaceholder", $this->wpdb->get_charset_collate(), $sql);

        dbDelta($sql);
    }

    /**
     * Remove Plugin Tables
     */
    public function deleteTables() {
        $this->deleteTable("subitem");
        $this->deleteTable("item");
        $this->deleteTable("section");
        $this->deleteTable("menu"); 
    }

    /**
     * Delete a Database Table
     * 
     * @param string $table The name of the database to delete
     */
    private function deleteTable($table) {
        $sql = file_get_contents( WP_PLUGIN_DIR  . "/lion-menu/assets/sql/delete_table.sql" );

        // Set table name
        $sql = str_replace("tableplaceholder", $this->wpdb->prefix . "lm_" . $table, $sql);

        $this->wpdb->query($sql);
    }

    /**
     * Add a Menu
     * 
     * @param array $params To insert into database
     */
    public function insert($table, $params) {
        $table = $this->wpdb->prefix . "lm_" . $table;

        $this->wpdb->insert($table, $params);
    }

}