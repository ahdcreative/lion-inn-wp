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

        // Add 'Menu' Option to Admin Menu & Init the Page
        add_action('admin_menu', array( $this, 'admin_menu_pages' ) );
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

        // Check tables are created properly

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
        wp_enqueue_script('jquery-sortable', plugins_url() . '/lion-menu/assets/js/jquery-sortable.js', array('jquery'));

        // Add Custom Javascript
        wp_enqueue_script('lm-script', plugins_url() . '/lion-menu/assets/js/script.js', array('jquery'));

        // Add Bootstrap CSS & JS & PopperJS
        wp_enqueue_script('popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js', array('jquery'));
        wp_enqueue_style('bs-css', plugins_url() . '/lion-menu/assets/css/bootstrap.min.css');
        wp_enqueue_script('bs-js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js', array('jquery'));
        
        // Font Awesome
        wp_enqueue_style('fa-icons', 'https://use.fontawesome.com/releases/v5.6.3/css/all.css');
    }
    
    /**
     * Add 'Menu' Option to Admin Menu & Init the Page
     * Create Subpages
     */
    public function admin_menu_pages() {
        add_menu_page( 'Menu Page', 'Menu', 'manage_options', 'lm-menu-page', array( $this, 'menu_init' ) );
        add_submenu_page( 'lm-menu-page', 'Menu Edit Subpage', 'Edit Menu', 'manage_options', 'lm-menu-edit-subpage', array( $this, 'edit_menu_init' ) );
    }
    
    /**
     * Initialise Admin Page with Menu-related content
     */
    public function menu_init() {
        
        $tpl = new Template( __DIR__ . '/templates/admin' );

        // Render POST & GET request handlers
        echo $tpl->render( 'post' );

        // Add Modal Support & Render Modals
        add_thickbox();
        echo $tpl->render( 'lm-modals' );

        // Print Header section of Admin Page
        $data = array ('title' => 'Menu', 'desc' => "Create and manage menu's from this page. Click 'Add Menu' below to create a new menu. Select a menu from the list below to edit a menu.");
        echo $tpl->render( 'lm-header', $data );
        
        // Display save button and it's functionality
        echo $tpl->render( 'lm-menu-buttons' );
        
        // Get Menu's
        $menus = $this->db->get( 'menu' );
        if(!$menus) {
            echo "You have not created any menu's.";
            return;
        }

        // Display menu's as sortable list
        echo "<ol class='sortable vertical list-group ml-0'>";
        foreach($menus as $menu) {
            echo $tpl->render( 'lm-menu-item' , $menu );
        } 
        echo "</ol><br/>";        
    }

    /**
     * Subpage: Edit a Menu
     * Accessed when a menu is selected from the Admin Page
     */
    public function edit_menu_init() {

        $tpl = new Template( __DIR__ . '/templates/admin' );

        // Render POST request handlers
        echo $tpl->render( 'post' );

        // Add Modal Support & Render Modals
        add_thickbox();
        echo $tpl->render( 'lm-modals' );

        // Render Title and Desc
        $data = array ('title' => 'Edit Menu', 'desc' => "Edit Menu Here.  Use the 'Change Menu' dropdown below to select a new menu.");
        echo $tpl->render( 'lm-header', $data );

        // Render save and change menu buttons
        $menus = $this->db->get( 'menu' );
        echo $tpl->render( 'lm-edit-buttons' );
        foreach($menus as $menu) {
            echo "<a class='dropdown-item' href='admin.php?page=lm-menu-edit-subpage&menu_id=$menu->id'>$menu->name</a>";
        }
        echo "</div></div></div><br/>";

        // Print Sections & Items related to Menu
        if(isset($_GET["menu_id"]) && is_numeric($_GET["menu_id"])) {

            // Print Current Menu Title
            $current_menu = $this->db->get( 'menu', $_GET["menu_id"] );
            $curr = $current_menu[0];
            echo "<h1>$curr->name</h1>";
            
            $sections = $this->db->get("section", $_GET["menu_id"]);

            echo "<div class='row'>";
            
            // Print Left Side
            $this->edit_menu_print_menu_side($sections, 0);

            // Print Right Side
            $this->edit_menu_print_menu_side($sections, 1);

            echo "</div>";
        } else {
            echo "You have not selected a menu.  Please use the dropdown above.";
            return;
        }
        
    }


    /**
     * Support function to help print the menu's
     * Support for Edit Menu subpage
     */
    public function edit_menu_print_menu_side($sections, $side) {
        
        $tpl = new Template( __DIR__ . '/templates/admin' );

        // Set class depending on section side
        if($side == 0) {
            $classes = "col-6 pl-3 pr-4";
        } else {
            $classes = "col-6 pl-4";
        }

        // Print Sections
        echo "<ol class='nested-sortable vertical ml-0 list-group $classes'>";
        foreach($sections as $sec) {
            // 1 is right
            if($sec->side == $side) {
                // Start Section List Item
                echo "<li class='list-group-item list-group-item-action no-position' data-id='$sec->id' data-name='$sec->name'>";           
                // E.g. Starters, Mains, Sides
                echo $tpl->render( 'lm-section-item' , $sec );

                // Print Items in Section
                $items = $this->db->get("item", $sec->id);
                echo "<ol class='list-group'>";
                foreach($items as $item) {
                    echo "<li class='list-group-item list-group-item-action' data-id='$item->id' data-name='$item->name'>";
                    // E.g. Soup, HEC, Pie
                    echo $tpl->render( 'lm-item' , $item );

                    // If item has subitems, print them
                    $subitems = $this->db->get("subitem", $item->id);
                    echo "<ol class='list-group'>";
                    foreach($subitems as $subitem) {
                        echo "<li class='list-group-item list-group-item-action' data-id='$subitem->id' data-name='$subitem->name'>";
                        // E.g. Cheese, Cajun Spice
                        echo $tpl->render( 'lm-sub-item' , $subitem );
                        echo "</li>"; // End subitem
                    }
                    echo "</ol>"; // End subitem list 

                    echo "</li>"; // End item
                }
                echo "</ol>"; // End item list 

                echo "</li>"; // End section
            }
        }
        echo "</ol><br/>"; // End section list
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
