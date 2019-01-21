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

/*
 * Plugin Class
 */
class LionMenu {

	public function __construct() {
        // Add 'Menu' Option to Admin Menu & Init the Page
        add_action('admin_menu', array( $this, 'admin_menu_option' ) );

        // Add Modal Support
        //add_thickbox();
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
        // Title
        echo "<h1>Menu</h1>";
    
        // Print paragraph about what this page is and how to do something
    
        // Print All Current Menu's (the menu's will probably print their own items)
    
        // Print Button(s) to create a new menu (menu will probably have buttons to create sections / items 
        add_thickbox();
           
        echo '
            <div id="my-content-id" style="display:none;">
                <p>
                    This is my hidden content! It will appear in ThickBox when the link is clicked.
                </p>
            </div>
    
            <a href="#TB_inline?&width=600&height=550&inlineId=my-content-id" class="thickbox">View my inline content!</a>
        ';
    
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
