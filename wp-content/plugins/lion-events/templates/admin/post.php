<?php

/**
 * Handle POST Requests on Plugin Admin Page
 */
if($_SERVER['REQUEST_METHOD'] === 'POST') {

    require_once( WP_PLUGIN_DIR . '/lion-events/includes/le-sql-manager.class.php' );
    
    $db = new LESQLManager();

    // Add Menu
    if(isset($_POST["add-event"])) {
        $params = array(
            'name' => $_POST["event-name"],
            'event_date' => $_POST["event-date"],
            'description_sml' => $_POST["description_sml"],
            'description_lrg' => $_POST["description_lrg"],
            'date_created' => current_time( 'mysql' ), 
            'author' => get_current_user_id(),
            'toPublish' => (isset($_POST["publish-event"]))?(1):(0)
        );

        $db->insert("event", $params);
        return;
    }
    // Edit Menu
    if(isset($_POST["edit-event"])) {
        $db->update("event", array(
                'name' => $_POST["event-name"],
                'event_date' => $_POST["event-date"],
                'description_sml' => $_POST["description_sml"],
                'description_lrg' => $_POST["description_lrg"],
                'date_updated' => current_time( 'mysql' ), 
                'editor' => get_current_user_id(),
                'toPublish' => (isset($_POST["publish-event"]))?(1):(0)
            ), 
            array('id' => $_POST["edit-event"])
        );
        return;
    }
    // Delete Menu
    if(isset($_POST["delete-event"])) {
        $db->delete("event", array(
            'id' => $_POST["delete-event"]
        ));
        return;
    }

}

?>