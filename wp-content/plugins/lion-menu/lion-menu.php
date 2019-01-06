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
    echo "<h1>Menu Page!</h1>";
}

?>
