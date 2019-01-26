<?php
/*
Plugin Name: Lion Menu
Plugin URI:
Description: Menu Plugin for Restuarants & Pubs
Version: 1.0.0
Author: Alexander Lord
Author URI:
*/

// Exit if accessed directly
if(!defined('ABSPATH')) exit;

// Load scripts
require_once(plugin_dir_path(__FILE__).'/includes/lm-scripts.php');
// Load Template Class
require_once(plugin_dir_path(__FILE__).'/views/Template.class.php');
// Load SQL Database Class
require_once(plugin_dir_path(__FILE__).'/includes/lm-sql-manager.class.php');

/*
 * Plugin Class
 */
class LionMenu {

    /**
     * SQLManager - Manage Database
     */
    public $db;    

	public function __construct() {
        $this->db = new SQLManager(); 

        // Add 'Menu' Option to Admin Menu & Init the Page
        add_action('admin_menu', array( $this, 'admin_menu_option' ) );
    }

	function activate() {
        // Create DB Tables
        $this->db->initTables(); 

        // Flush Rewrite Rules
        flush_rewrite_rules();
	}

	function deactivate() {
        // TEMP - delete tables on deactivate (for debugging)
        

        // Print message stating that data will not be deleted from database
        // but that there might be issues on your website.
        

        // Flush Rewrite Rules
        flush_rewrite_rules();
	}

	function uninstall() {
        // Delete Databases OR Add Option of Deleting Databases 
    }
    
    /*
     * Add 'Menu' Option to Admin Menu & Init the Page 
     */
    public function admin_menu_option() {
        add_menu_page( 'Menu Page', 'Menu', 'manage_options', 'lion-menu-plugin', array( $this, 'menu_init' ) );
    }
    
    public function menu_init(){
        
        $tpl = new Template(__DIR__ . '/templates/admin' );
        
        echo "<h1>Menu</h1>";
        echo "
            Create and manage menu's from this page. <br/>
            Click 'Add Menu' below to create a new menu. <br/>
            Select a menu from the list below to edit a menu. <br/>
        ";
    
        // Add Modal Support
        add_thickbox();          
        // Print Add Menu Button & Modal Functionality
        print $tpl->render( 'add-menu', array() );

        // Print All Current Menu's (the menu's will probably print their own items)
        
    }

    public function test_foo_in() {
        echo "Test Foo In <br/>";
    }

}

function test_foo_out() {
    echo "Test Foo Out <br/>";
}

/*
 * Initialize the plugin
 */
if (class_exists( 'LionMenu' )) {
	$lionMenu = new LionMenu();
}

/*
 * Hooks
 */
register_activation_hook(__FILE__, array( $lionMenu, 'activate' ) );
register_deactivation_hook(__FILE__, array( $lionMenu, 'deactivate' ) );
