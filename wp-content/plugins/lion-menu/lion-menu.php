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

/*
 * Plugin Class
 */
class LionMenu {

	public function __construct() {
        // Add 'Menu' Option to Admin Menu & Init the Page
        add_action('admin_menu', array( $this, 'admin_menu_option' ) );
    }

	function activate() {
        // Flush Rewrite Rules
        flush_rewrite_rules();
	}

	function deactivate() {
        // Flush Rewrite Rules
        flush_rewrite_rules();
	}

	function uninstall() {

	}

	function custom_post_type() {
		//register_post_type();
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
