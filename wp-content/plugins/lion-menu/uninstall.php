<?php
/**
 * Trigger this file on plugin uninstall
 * 
 * @package LionMenu
 */

if( !defined( 'WP_UNINSTALL_PLUGIN' )) {
    die;
}

// Clear Database Data
require_once(plugin_dir_path(__FILE__).'/includes/lm-sql-manager.class.php');

$db = new SQLManager();

$db->deleteTables();