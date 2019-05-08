<?php
/** 
 * @package LionDocs
 */
/**
 * Plugin Name: Lion Docs
 * Plugin URI:
 * Description: Documentation Plugin Specifically for lioninn.co.uk site
 * Version: 1.0.0
 * Author: Alexander Lord
 * Author URI:
 */

// Exit if accessed directly
if(!defined('ABSPATH')) exit;

/**
 * Plugin Class
 */
class LionDocs {

    /**
     * Class Constructor
     */
	public function __construct() {
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
        flush_rewrite_rules();
	}

    /**
     * Plugin Deactivation Hook
     */
	function deactivate() {
        flush_rewrite_rules();
	}

    /**
     * Enqueue Assets
     */
    public function enqueue() {
        
    }
    
    /**
     * Add 'Menu' Option to Admin Menu & Init the Page
     * Create Subpages
     */
    public function admin_menu_pages() {
        add_menu_page( 'Documentation Page', 'HowTo', 'manage_options', 'ld-how-to', array( $this, 'docs_init' ), 'dashicons-media-document' );
    }
    
    /**
     * Initialise Admin Page with Menu-related content
     */
    public function docs_init() {
        
        echo "<h1>Documentation</h1>";

        // echo "
        //     <div class='wrap'>
        //         <div id='DocIntro'>
        //             <h2>Theme Documentation</h2>
        //         </div>

        //         <iframe src="echo get_template_directory_uri() . '/documentation/'" title='Documentation Frame' id='Docs' name='Docs'><iframe>
        //     </div>
        // ";
        
    }
    
}

/**
 * Initialize the plugin
 */
if (class_exists( 'LionDocs' )) {
    $lionDocs = new LionDocs();
    $lionDocs->register();
}

/**
 * Hooks
 */
register_activation_hook(__FILE__, array( $lionDocs, 'activate' ) );
register_deactivation_hook(__FILE__, array( $lionDocs, 'deactivate' ) );
