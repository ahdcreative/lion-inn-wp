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
if(!defined('ABSPATH')) {
    exit;
}

// Load scripts
require_once(plugin_dir_path(__FILE__).'/includes/lion-menu-scripts.php');

// Add 'Menu' Option to Admin Menu
add_action('admin_menu', 'admin_menu_option');

function admin_menu_option(){
    add_menu_page( 'Menu Page', 'Menu', 'manage_options', 'lion-menu-plugin', 'menu_init' );
}

function menu_init(){
    // Title
    echo "<h1>Menu</h1>";

    // Print paragraph about what this page is and how to do something

    // Print All Current Menu's (the menu's will probably print their own items)

    // Print Button(s) to create a new menu (menu will probably have buttons to create sections / items

}
