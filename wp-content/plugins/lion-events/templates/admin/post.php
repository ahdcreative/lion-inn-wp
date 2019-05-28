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
            'image_url' => $_POST["add-event-image"],
            'image_height' => $_POST["add-event-img-height"],
            'image_width' => $_POST["add-event-img-width"],
            'isSingleDayEvent' => (isset($_POST["single-date-event"]))?(1):(0),
            'description' => $_POST["add-event-desc"],
            'date_created' => current_time( 'mysql' ), 
            'author' => get_current_user_id(),
            'toPublish' => (isset($_POST["publish-event"]))?(1):(0)
        );

        $db->insert("u_event", $params);
        return;
    }
    // Edit Event
    if(isset($_POST["edit-event"])) {
        $db->update("u_event", array(
                'name' => $_POST["event-name"],
                'event_start_date' => $_POST["event-start-date"],
                'image_url' => $_POST["edit-event-image"],
                'image_height' => $_POST["edit-event-img-height"],
                'image_width' => $_POST["edit-event-img-width"],
                'event_end_date' => (isset($_POST["single-date-event"]))?("0000-00-00"):($_POST["event-end-date"]),
                'isSingleDayEvent' => (isset($_POST["single-date-event"]))?(1):(0),
                'description' => $_POST["edit-event-desc"],
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
        $db->delete("u_event", array(
            'id' => $_POST["delete-event"]
        ));
        return;
    }


    // Edit Regular Event
    if(isset($_POST["edit-r-event"])) {
        $db->update("r_event", array(
                'title' => $_POST["r-event-title"],
                'description' => $_POST["r-event-desc"],
                'icon_url' => $_POST["edit-event-icon"]
            ), 
            array('id' => $_POST["edit-r-event"])
        );
        return;
    }

}

?>