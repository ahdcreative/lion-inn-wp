<?php

/**
 * Handle POST Requests on Plugin Admin Page
 */
if($_SERVER['REQUEST_METHOD'] === 'POST') {

    require_once( WP_PLUGIN_DIR . '/lion-events/includes/le-sql-manager.class.php' );
    
    $db = new LESQLManager();

    require_once( WP_PLUGIN_DIR . '/lion-events/includes/le-debug.php' );

    // Add Event
    if(isset($_POST["add-event"])) {
        $params = array(
            'name' => $_POST["event-name"],
            'event_start_date' => $_POST["event-start-date"],
            'event_end_date' => $_POST["event-end-date"],
            'isSingleDayEvent' => (isset($_POST["single-date-event"]))?(1):(0),
            'description_sml' => $_POST["event-desc-sml"],
            'description_lrg' => $_POST["event-desc-lrg"],
            'date_created' => current_time( 'mysql' ), 
            'author' => get_current_user_id(),
            'toPublish' => (isset($_POST["publish-event"]))?(1):(0)
        );

        $db->insert("event", $params);
        return;
    }
    // Edit Event
    if(isset($_POST["edit-event"])) {
        $db->update("event", array(
                'name' => $_POST["event-name"],
                'event_start_date' => $_POST["event-start-date"],
                'event_end_date' => (isset($_POST["single-date-event"]))?("0000-00-00"):($_POST["event-end-date"]),
                'isSingleDayEvent' => (isset($_POST["single-date-event"]))?(1):(0),
                'description_sml' => $_POST["event-desc-sml"],
                'description_lrg' => $_POST["event-desc-lrg"],
                'date_updated' => current_time( 'mysql' ), 
                'editor' => get_current_user_id(),
                'toPublish' => (isset($_POST["publish-event"]))?(1):(0)
            ), 
            array('id' => $_POST["edit-event"])
        );
        return;
    }
    // Delete Event
    if(isset($_POST["delete-event"])) {
        $db->delete("event", array(
            'id' => $_POST["delete-event"]
        ));
        return;
    }

}

?>