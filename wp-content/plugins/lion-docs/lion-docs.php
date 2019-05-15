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

require_once(plugin_dir_path(__FILE__).'/includes/ld-template.class.php');
require_once(plugin_dir_path(__FILE__).'/includes/ld-sql-manager.class.php');

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
        // Add Main CSS
        wp_enqueue_style('ld-style', plugins_url() . '/lion-docs/assets/css/style.css');

        // Add Bootstrap CSS & JS & PopperJS
        wp_enqueue_script('popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js', array('jquery'));
        wp_enqueue_style('bs-css', plugins_url() . '/lion-events/assets/css/bootstrap.min.css');
        wp_enqueue_script('bs-js', plugins_url() . '/lion-events/assets/js/bootstrap.min.js');
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
        $pdf = plugins_url() . '/lion-docs/docs/test.pdf';
        $pdf2 = plugins_url() . '/lion-docs/docs/test2.pdf';

        $tpl = new LDTemplate( __DIR__ . '/templates' );

        // Print Header section of Admin Page
        $data = array ('title' => 'HowTo Articles', 'desc' => "Select a different HowTo article from the left-side navigation.");
        echo $tpl->render( 'ld-header', $data );

        echo "
            <div class='container-fluid'>
                <div class='row py-3'>
                    <div class='col-2'>
                        <h3>Side Navigation</h3>
                        <a href='$pdf' target='Docs'>Test 1</a><br/>
                        <a href='$pdf2' target='Docs'>Test 2</a>
                    </div>
                    <div class='col' id='main'>
                        <iframe src='$pdf' title='Documentation Frame' id='Docs' name='Docs'><iframe>
                    </div>
                </div>
            </div>
        ";
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
