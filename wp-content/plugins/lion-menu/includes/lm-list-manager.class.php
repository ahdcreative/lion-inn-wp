<?php

require_once(plugin_dir_path(__FILE__) . '/lm-debug.php');
require_once(plugin_dir_path(__FILE__) . '/lm-template.class.php');

/**
 * Class to Sortable Lists
 * 
 * TODO - if this class doesn't develop more than this, delete it
 * and convert all startList() calls to just the echo line.
 * Same for endList or any other short pointless functions.
 */
class ListManager {
	
	/**
	 * ListManager Constructor
	 */
	public function __construct() {
        
    }

    public function startList() {
        echo "<br/><ol class='sortable list-group ml-0'>";
    }

    public function endList() {
        echo "</ol><br/>";  
    }
}
