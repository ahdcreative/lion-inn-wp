<?php

/**
 * Handle POST Requests on Plugin Admin Page
 */
if($_SERVER['REQUEST_METHOD'] === 'POST') {

    require_once( WP_PLUGIN_DIR . '/lion-menu/includes/lm-sql-manager.class.php' );
    
    $db = new SQLManager();

    // Add Menu
    if(isset($_POST["add-menu"])) {
        $params = array(
            'name' => $_POST["menu-name"], 
            'date_created' => current_time( 'mysql' ), 
            'author' => get_current_user_id()
        );

        $db->insert("menu", $params);
        return;
    }
    // Edit Menu
    if(isset($_POST["edit-menu"])) {
        $db->update("menu", array(
                'name' => $_POST["menu-name"]
            ), 
            array('id' => $_POST["edit-menu"])
        );
        return;
    }
    // Delete Menu
    if(isset($_POST["delete-menu"])) {
        $db->delete("menu", array(
            'id' => $_POST["delete-menu"]
        ));
        return;
    }

    // Save Menu List on main Menu admin page (Mainly to Save Rankings / Menu Order)
    if(isset($_POST["rankings"])) {
        // Remove '\' from JSON string & decode / convert to array
        $menu_rankings = str_replace("\\", "", $_POST["rankings"]);
        $menu_rankings = json_decode($menu_rankings, true);

        if(!$menu_rankings) return;
        
        // Update Database - set rank equal to it's turn ($i) in the $menu_rankings list
        $i = 1;
        // Menu Rankings array is formatted as Array ( [0] => Array ( [id] => 1 ) [1] => Array ( [id] => 7 )...
        // So a double loop is needed to access the menu id's.
        foreach($menu_rankings as $key => $value) {
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
        // Remove '\' from JSON string & decode / convert to array
        $item_rankings = str_replace("\\", "", $_POST["menu_item_rankings"]);
        $item_rankings = json_decode($item_rankings, true);

        if(!$item_rankings) return;
        
        // Update Database - set rank equal to it's turn in the $item_rankings list
        $secRank = 1;
        $itemRank = 1;
        $subItemRank = 1;
        foreach($item_rankings as $key => $sections) {

            foreach($sections as $sKey => $sValue) {
                // Update Section Rank in sections table
                $db->update("section", array(
                        'rank' => $secRank
                    ), 
                    array('id' => $sValue['id'])
                );

                // Update Rankings of Child Items
                $items = $sValue['children'];
                $items = reset($items);
                foreach($items as $iKey => $iValue) {
                    // Update Each Item Rank & Parent Section in items table
                    $db->update("item", array(
                            'rank' => $itemRank,
                            'parent_section' => $sValue['id']
                        ), 
                        array('id' => $iValue['id'])
                    );

                    // Update Rankings of Child Items
                    $subitems = $iValue['children'];
                    $subitems = reset($subitems);
                    foreach($subitems as $siKey => $siValue) {
                        // Update Each Item Rank & Parent Section in items table
                        $db->update("subitem", array(
                                'rank' => $subItemRank,
                                'parent_item' => $iValue['id']
                            ), 
                            array('id' => $siValue['id'])
                        );

                        $subItemRank++;
                    }

                    $subItemRank = 1;
                    $itemRank++;
                }

                $itemRank = 1;
                $secRank++;
            }
            
        }

        return;
    }

}

?>