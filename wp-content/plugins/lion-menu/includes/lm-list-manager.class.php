<?php

require_once(plugin_dir_path(__FILE__) . '/lm-debug.php');
require_once(plugin_dir_path(__FILE__) . '/lm-template.class.php');

/**
 * Class to Sortable Lists
 */
class ListManager {
	
	/**
	 * ListManager Constructor
	 */
	public function __construct() {
        
    }

    /**
     * Generate Menu List
     * TODO - try to make this dynamic so it can be used for the item list too
     * 
     * @param array $menus Array of menus pulled from db
     */
    public function generateMenus($menus) {

        if(!$menus) {
            echo "You have not created any menu's.";
            return;
        }

        echo "<ol class='sortable'>";

            foreach($menus as $menu) {

                echo "<li data-id='$menu->id'>$menu->name</li>";

            }    

        echo "</ol>";        
    }

}
