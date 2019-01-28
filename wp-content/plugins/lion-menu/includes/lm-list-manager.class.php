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

        echo "<br/><ol class='sortable list-group ml-0'>";

            foreach($menus as $menu) {

                echo "
                    <li class='list-group-item list-group-item-action' data-id='$menu->id'>
                        $menu->name
                        <div class='float-right'>
                            <i class='fas fa-edit mr-3' data-toggle='tooltip' title='Edit'></i>
                            <i class='fas fa-trash-alt' data-toggle='tooltip' title='Delete'></i>
                        </div>
                    </li>
                ";

            }    

        echo "</ol><br/>";        
    }

}
