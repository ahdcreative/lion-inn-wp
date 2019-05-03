<?php
/**
 * Trigger this file on plugin uninstall
 * 
 * @package LionEvents
 */

if( !defined( 'WP_UNINSTALL_PLUGIN' )) {
    die;
}

// Clear Database Data
require_once(plugin_dir_path(__FILE__).'/includes/le-sql-manager.class.php');

$db = new LESQLManager();

$db->deleteTables();