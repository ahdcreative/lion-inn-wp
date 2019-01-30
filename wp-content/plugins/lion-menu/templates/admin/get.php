<?php

/**
 * Handle GET Requests on Plugin Admin Page
 */
if($_SERVER['REQUEST_METHOD'] === 'GET') {

    require_once( WP_PLUGIN_DIR . '/lion-menu/includes/lm-sql-manager.class.php' );
    
    $db = new SQLManager();

    // Get Menu Items
    if(isset($_GET["menu_id"])) {
        
        echo "Menu ID - " . $_GET["menu_id"];

        return;
    }

}