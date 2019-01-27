<h1>Menu</h1>
<p>Create and manage menu's from this page. Click 'Add Menu' below to create a new menu. Select a menu from the list below to edit a menu.</p> 

<!-- Modal Content -->
<div id="add-menu-modal" style="display:none;">

    <form action="#" method="post">

        <h1>Menu Name:</h1>
        <input type="text" name="menu-name" /> <br/>
        <input type="submit" value="Add" />
    </form>

</div>

<!-- Add Menu Button -->
<button>
    <a href="#TB_inline?&width=400&height=300&inlineId=add-menu-modal" class="thickbox">Add Menu</a>
</button>

<br />

<?php

/**
 * When 'Add' is Clicked in Modal
 * Insert a New Menu into Database
 */
if($_SERVER['REQUEST_METHOD'] === 'POST') {

    require_once( WP_PLUGIN_DIR . '/lion-menu/includes/lm-sql-manager.class.php' );

    if(!isset($_POST["menu-name"])) {
        return;
    }

    $params = array(
        'name' => $_POST["menu-name"], 
        'date_created' => current_time( 'mysql' ), 
        'author' => get_current_user_id()
    );

    $db = new SQLManager();
    $db->insert("menu", $params);
}

?>