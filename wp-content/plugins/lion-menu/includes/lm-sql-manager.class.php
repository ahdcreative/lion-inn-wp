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

        $sql = "
            ALTER TABLE tableplaceholder 
            ADD CONSTRAINT fk_parent_menu 
            FOREIGN KEY (parent_menu) REFERENCES prefixplaceholder_menu(id);

            ALTER TABLE tableplaceholder 
            ADD CONSTRAINT fk_parent_section 
            FOREIGN KEY (parent_section) REFERENCES prefixplaceholder_section(id);

            ALTER TABLE tableplaceholder 
            ADD CONSTRAINT fk_parent_item 
            FOREIGN KEY (parent_item) REFERENCES prefixplaceholder_item(id);
        ";
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
        $sql = str_replace("tableplaceholder", $wpdb->prefix . "lm_" . $table, $sql);

        // If sql contains a foreign key - add prefix
        if (strpos($sql, 'FOREIGN KEY') !== false) {
            $sql = str_replace("prefixplaceholder", $wpdb->prefix . "lm", $sql);
        }

        // Set charset 
        $sql = str_replace("charsetplaceholder", $wpdb->get_charset_collate(), $sql);

        // Print sql to console
        debug_to_console( $sql );
        log_me($sql);

        // Create the table
        dbDelta($sql);
    }

    /**
     * Remove Plugin Tables
     */
    public function deleteTables() {
        $this->deleteTable("menu");
        $this->deleteTable("section");
        $this->deleteTable("item");
        $this->deleteTable("subitem"); 
    }

    /**
     * Delete a Database Table
     * 
     * @param string $table The name of the database to be created
     */
    private function deleteTable($table) {
        global $wpdb;

        $sql = file_get_contents( WP_PLUGIN_DIR  . "/lion-menu/assets/sql/delete_table.sql" );

        // Set table name
        $sql = str_replace("tableplaceholder", $wpdb->prefix . "lm_" . $table, $sql);

        $wpdb->query($sql);
    }
    
    

}