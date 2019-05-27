<?php

/**
 * Remove unneeded role types
 */
function remove_roles() {
    if( get_role('subscriber') ){
        remove_role( 'subscriber' );
    }
    if( get_role('author') ){
        remove_role( 'author' );
    }
    if( get_role('contributor') ){
        remove_role( 'contributor' );
    }
}
add_action( 'admin_menu', 'remove_roles' );

/**
 * Remove Posts and Comments from sidebar menu
 * Not needed for this site
 * 
 * NOTE :- Some pages are removed via the User Role Editor plugin
 */
function remove_menu_pages() {
    /**
     * Hide for everyone
     */
    remove_menu_page( 'edit.php' );
    remove_menu_page( 'edit-comments.php' );

    $user = wp_get_current_user();
    if(isset($user->roles[0])) { 
        $current_role = $user->roles[0];
    } else {
        $current_role = 'no_role';
    }

    /**
     * Hide for Owners
     */
    if($current_role == 'owner') {
        remove_menu_page( 'image-sizes' );
        remove_menu_page( 'versionpress' );
        remove_menu_page( 'tools.php' );
        remove_menu_page( 'options-general.php' );
        remove_menu_page( 'edit.php?post_type=udb_widgets' );        
    }

    /**
     * Hide for Editors
     */
    if($current_role == 'editor') {
        remove_menu_page( 'image-sizes' );
        remove_menu_page( 'versionpress' );
        remove_menu_page( 'users.php' );
        remove_menu_page( 'options-general.php' );
        remove_menu_page( 'tools.php' );
    }
}
add_action( 'admin_menu', 'remove_menu_pages' );

/**
 * Remove Sub Pages that aren't needed
 * 
 * NOTE :- Some subpages are removed via the User Role Editor plugin
 */
function remove_submenu_pages() {
    remove_submenu_page( 'themes.php', 'theme-editor.php' );
    remove_submenu_page( 'plugins.php', 'plugin-editor.php' );
    remove_submenu_page( 'tools.php', 'tools.php' );
    remove_submenu_page( 'tools.php', 'import.php' );
    remove_submenu_page( 'tools.php', 'export.php' );
    remove_submenu_page( 'tools.php', 'tools.php?page=export_personal_data' );
}
add_action( 'admin_menu', 'remove_submenu_pages', 110 );

/**
 * Print to debug.log file
 */
function log_me($message) {
    if (WP_DEBUG === true) {
        if (is_array($message) || is_object($message)) {
            error_log(print_r($message, true));
        } else {
            error_log($message);
        }
    }
}

/**
 * Print to console in browser dev tools
 */
function console_log($toPrint) {
    echo "<script>console.log('$toPrint');</script>";
}

?>
