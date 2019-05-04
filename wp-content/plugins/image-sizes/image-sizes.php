<?php
/*
Plugin Name: Stop Generating Image Sizes
Description: So, it creates multiple sizes of an image while uploading? Here is the solution!
Plugin URI: https://wppeople.net
Author: Nazmul Ahsan
Author URI: https://nazmulahsan.me
Version: 2.0.2
License: GPL2
Text Domain: image-sizes
Domain Path: /languages
*/

/*

    Copyright (C) 2016  Nazmul Ahsan  n.mukto@gmail.com

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

namespace WPpeople\Image_Size;

/**
 * if accessed directly, exit.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'WPPIS', __FILE__ );

/**
 * Main class for the plugin
 * @package Plugin
 * @author Nazmul Ahsan <n.mukto@gmail.com>
 */
class Plugin {
	
	public static $_instance;
	public $name;
	public $version;

	public function __construct() {
		self::includes();
		self::define();
		self::hooks();
	}

	/**
	 * Define constants
	 */
	public function define(){
		$this->name = 'image-sizes';
		$this->version = '2.0.2';
		$this->server = 'https://codexpert.io';
	}

	/**
	 * Includes files
	 */
	public function includes(){
		require_once dirname( WPPIS ) . '/vendor/autoload.php';
		require_once dirname( WPPIS ) . '/includes/functions.php';
	}

	/**
	 * Hooks
	 */
	public function hooks(){

		// admin hooks
		$admin = ( isset( $admin ) && ! is_null( $admin ) ) ? $admin : new Admin( $this->name, $this->version );
		add_action( 'plugins_loaded', array( $admin, 'i18n' ) );
		add_action( 'admin_enqueue_scripts', array( $admin, 'enqueue_scripts' ) );
		add_action( 'admin_notices', array( $admin, 'admin_notices' ) );
		add_filter( 'intermediate_image_sizes_advanced', array( $admin, 'image_sizes' ) );
		// add_filter( 'wp_ajax_wpp-need-help', array( $admin, 'send_message' ) );

		// survey hooks
		$survey = ( isset( $survey ) && ! is_null( $survey ) ) ? $survey : new Survey( WPPIS, $this->server );

		// settings hooks
		$settings = ( isset( $settings ) && ! is_null( $settings ) ) ? $settings : new Settings( $this->name, $this->version );
		add_action( 'admin_menu', array( $settings, 'admin_menu' ) );
		add_action( 'admin_init', array( $settings, 'admin_init' ) );

	}

	/**
	 * Cloning is forbidden.
	 */
	private function __clone() { }

	/**
	 * Unserializing instances of this class is forbidden.
	 */
	private function __wakeup() { }

	/**
	 * Instantiate the plugin
	 */
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}
}

Plugin::instance();