<?php

/**
 * Handle POST Requests on Plugin Admin Page
 */
if($_SERVER['REQUEST_METHOD'] === 'POST') {

    require_once( WP_PLUGIN_DIR . '/lion-menu/includes/lm-sql-manager.class.php' );
    
    $db = new SQLManager();

    // Add Menu
    if(isset($_POST["add"])) {
        $params = array(
            'name' => $_POST["menu-name"], 
            'date_created' => current_time( 'mysql' ), 
            'author' => get_current_user_id()
        );

        $db->insert("menu", $params);
        return;
    }

    // Edit Menu
    if(isset($_POST["edit"])) {
        $db->update("menu", array(
                'name' => $_POST["menu-name"]
            ), 
            array('id' => $_POST["edit"])
        );
        return;
    }

    // Delete Menu
    if(isset($_POST["delete"])) {
        $db->delete("menu", array(
            'id' => $_POST["delete"]
        ));
        return;
    }

    // Save Menu List on main Menu admin page (Mainly to Save Rankings / Menu Order)
    if(isset($_POST["rankings"])) {
        // Remove '\' from JSON string & decode / convert to array
        $rankings = str_replace("\\", "", $_POST["rankings"]);
        $rankings = json_decode($rankings, true);

        if(!$rankings) return;
        
        // Update Database - set rank equal to it's turn ($i) in the $rankings list
        $i = 1;
        // Rankings array is formatted as Array ( [0] => Array ( [id] => 1 ) [1] => Array ( [id] => 7 )...
        // So a double loop is needed to access the menu id's.
        foreach($rankings as $key => $value) {
            foreach($value as $id => $rank) {
                $db->update("menu", array(
                        'rank' => $i
                    ), 
                    array('id' => $rank)
                );
            }
            $i++;
        }        
        return;
    }

    // Save Menu Item List on Edit Menu subpage (Mainly to Save Rankings / Order)
    if(isset($_POST["menu_item_rankings"])) {
        // console_log($_POST["menu_item_rankings"]);
    }

}

?>