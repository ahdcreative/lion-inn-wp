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

require_once(plugin_dir_path(__FILE__).'/includes/lm-template.class.php');
require_once(plugin_dir_path(__FILE__).'/includes/lm-sql-manager.class.php');
require_once(plugin_dir_path(__FILE__).'/includes/lm-list-manager.class.php');

/* 
 * Plugin Class
 */
class LionMenu {

    /**
     * SQLManager - Manage Database
     */
    public $db;
    
    /**
     * List Manager - Manage Sortable Lists in Admin Area
     * Such as the menu and item lists.
     */
    public $lists;

    /**
     * Class Constructor
     */
	public function __construct() {
        $this->db = new SQLManager(); 
        $this->lists = new ListManager();

        // Add 'Menu' Option to Admin Menu & Init the Page
        add_action('admin_menu', array( $this, 'admin_menu_option' ) );
    }

    /**
     * Register Assets
     */
    public function register() {
        add_action('admin_enqueue_scripts', array($this, 'enqueue'));  
    }

    /**
     * Plugin Activation Hook
     */
	function activate() {
        // Create DB Tables
        $this->db->createTables(); 

        flush_rewrite_rules();
	}

    /**
     * Plugin Deactivation Hook
     */
	function deactivate() {
        // TEMP - delete tables on deactivate (for debugging)
        $this->db->deleteTables(); 

        // Print message stating that data will not be deleted from database
        // but that there might be issues on your website.
        
        flush_rewrite_rules();
	}

    /**
     * Plugin Uninstall Hook
     */
	function uninstall() {
        // Delete Databases OR Add Option of Deleting Databases 
    }

    /**
     * Enqueue Assets
     */
    public function enqueue() {
        // Add Main CSS
        wp_enqueue_style('lm-style', plugins_url() . '/lion-menu/assets/css/style.css');

        // Add JQuery Sortable
        wp_register_script('jquery-sortable', plugins_url() . '/lion-menu/assets/js/jquery-sortable.js', array('jquery'));
        wp_enqueue_script('jquery-sortable');
         // Add Custom Sortable
         wp_register_script('custom-sortable', plugins_url() . '/lion-menu/assets/js/custom-sortable.js', array('jquery'));
         wp_enqueue_script('custom-sortable');
    }
    
    /**
     * Add 'Menu' Option to Admin Menu & Init the Page 
     */
    public function admin_menu_option() {
        add_menu_page( 'Menu Page', 'Menu', 'manage_options', 'lion-menu-plugin', array( $this, 'menu_init' ) );
    }
    
    /**
     * Initialise Admin Page with Menu-related content
     */
    public function menu_init(){
        
        $tpl = new Template( __DIR__ . '/templates/admin' );

        // Add Modal Support
        add_thickbox();
        // Print Header section of Admin Page
        echo $tpl->render( 'lm-header' );
        
        // Display menu's as sortable list
        $menus = $this->db->get( 'menu' );
        $this->lists->generateMenus($menus);        
        
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
    $lionMenu->register();
}

/*
 * Hooks
 */
register_activation_hook(__FILE__, array( $lionMenu, 'activate' ) );
register_deactivation_hook(__FILE__, array( $lionMenu, 'deactivate' ) );
