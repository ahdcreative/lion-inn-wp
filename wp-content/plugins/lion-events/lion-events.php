<?php
/** 
 * @package LionEvents
 */
/**
 * Plugin Name: Lion Events
 * Plugin URI:
 * Description: Events Plugin for Restuarants & Pubs
 * Version: 1.0.0
 * Author: Alexander Lord
 * Author URI:
 */

// Exit if accessed directly
if(!defined('ABSPATH')) exit;

require_once(plugin_dir_path(__FILE__).'/includes/le-template.class.php');
require_once(plugin_dir_path(__FILE__).'/includes/le-sql-manager.class.php');

/**
 * Plugin Class
 */
class LionEvents {

    /**
     * LESQLManager - Manage Database
     */
    public $db;

    /**
     * Class Constructor
     */
	public function __construct() {
        $this->db = new LESQLManager();

        // Setup Admin Pages
        add_action('admin_menu', array( $this, 'admin_menu_pages' ) );
    }

    /**
     * Register Assets
     */
    public function register() {
        add_action('admin_enqueue_scripts', array($this, 'enqueue'));  
    }

    /**
     * Plugin Activation Hook
     */
	function activate() {
        $this->db->createTables();

        flush_rewrite_rules();
	}

    /**
     * Plugin Deactivation Hook
     */
	function deactivate() {
        $this->db->deleteTables();

        flush_rewrite_rules();
	}

    /**
     * Enqueue Assets
     */
    public function enqueue() {
        // Add Main CSS
        wp_enqueue_style('le-style', plugins_url() . '/lion-events/assets/css/style.css');

        // Add JQuery Sortable
        wp_enqueue_script('jquery-sortable', plugins_url() . '/lion-events/assets/js/jquery-sortable.js', array('jquery'));

        // Add Custom Javascript
        wp_enqueue_script('le-lists', plugins_url() . '/lion-events/assets/js/custom-lists.js', array('jquery'));

        // Add Bootstrap CSS & JS & PopperJS
        wp_enqueue_script('popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js', array('jquery'));
        wp_enqueue_style('bs-css', plugins_url() . '/lion-events/assets/css/bootstrap.min.css');
        wp_enqueue_script('bs-js', plugins_url() . '/lion-events/assets/js/bootstrap.min.js');
        
        // Font Awesome
        wp_enqueue_style('fa-icons', 'https://use.fontawesome.com/releases/v5.6.3/css/all.css');
    }
    
    /**
     * Add 'Menu' Option to Admin Menu & Init the Page
     * Create Subpages
     */
    public function admin_menu_pages() {
        add_menu_page( 'Events Page', 'Events', 'manage_options', 'le-events-page', array( $this, 'events_init' ) );
    }
    
    /**
     * Initialise Admin Page with Menu-related content
     */
    public function events_init() {
        
        $tpl = new LETemplate( __DIR__ . '/templates/admin' );

        // Render POST & GET request handlers
        echo $tpl->render( 'post' );

        // Add Modal Support & Render Modals
        add_thickbox();
        // echo $tpl->render( 'le-modals' );

        // Print Header section of Admin Page
        $data = array ('title' => 'Events', 'desc' => "Create and manage events from this page. Click 'Add Event' below to create a new menu. Select an event from the list below to edit a event.");
        echo $tpl->render( 'le-header', $data );
        
        // Display save button and it's functionality
        echo $tpl->render( 'le-event-buttons' );
        
        // Get Menu's
        $events = $this->db->get( 'event' );
        if(!$events) {
            echo "You have not created any events.";
            return;
        }

        // Display menu's as sortable list
        echo $tpl->render( 'le-list' , array( "listOf" => $events, "type" => "EVENTS", "classes" => "list-group ml-0" ));
    }

}

/**
 * Initialize the plugin
 */
if (class_exists( 'LionEvents' )) {
    $lionEvents = new LionEvents();
    $lionEvents->register();
}

/**
 * Hooks
 */
register_activation_hook(__FILE__, array( $lionEvents, 'activate' ) );
register_deactivation_hook(__FILE__, array( $lionEvents, 'deactivate' ) );
