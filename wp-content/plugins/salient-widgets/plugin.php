<?php
/**
 * Plugin Name: Salient Widgets
 * Plugin URI: --
 * Description: Adds the Salient collection of widgets.
 * Author: ThemeNectar
 * Author URI: http://themenectar.com
 * Version: 1.1
 * Text Domain: salient-widgets
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'SALIENT_WIDGETS_ROOT_DIR_PATH', plugin_dir_path( __FILE__ ) );
define( 'SALIENT_WIDGETS_PLUGIN_PATH', plugins_url( 'salient-widgets' ) );
	
class Salient_Widgets {
	
	static $instance = false;
	
	public $plugin_version = '1.1';
		
	private function __construct() {
		
		// Front end assets.
		add_action('wp_enqueue_scripts', array( $this, 'salient_widgets_enqueue_css' ),	10 );

		// Admin assets.
		add_action( 'admin_enqueue_scripts',  array( $this, 'salient_widgets_edit_scripts' ) );
		
		// Text domain.
		add_action( 'init', array( $this, 'salient_widgets_load_textdomain' ) );
		
		// Start it up.
		add_action( 'after_setup_theme', array( $this, 'init' ), 0 );
		
	}
	
	public static function getInstance() {
		if ( !self::$instance ) {
			self::$instance = new self;
		}
		return self::$instance;
	}
	
	

	public function salient_widgets_enqueue_css() {

			wp_register_style('salient-widgets', plugins_url('/css/widget-nectar-posts.css', __FILE__),'', $this->plugin_version );
		
	    // Enqueue CSS files.
			if( ! defined( 'NECTAR_THEME_NAME' ) ) {
		    wp_enqueue_style( 'salient-widgets' );
			}
			
	}
	

	public function salient_widgets_edit_scripts() {
		wp_enqueue_media();
	}


	
	public function salient_widgets_load_textdomain() {
		load_plugin_textdomain( 'salient-widgets', false, plugin_basename( dirname( __FILE__ ) ) . '/languages' );
	}
	
	
	public function init() {
			
			// Before init.
			do_action( 'before_salient_widgets_init' );
			
			// Recent Posts Extra.
			require_once( SALIENT_WIDGETS_ROOT_DIR_PATH.'includes/admin/recent-posts-extra-widget.php' );
			
			// Recent portfolio items.
			if( class_exists('Salient_Portfolio') ) {
				require_once( SALIENT_WIDGETS_ROOT_DIR_PATH.'includes/admin/recent-projects-widget.php' );
			}
			
			// Recent portfolio items.
			require_once( SALIENT_WIDGETS_ROOT_DIR_PATH.'includes/admin/popular-posts.php' );

			// After init.
			do_action( 'salient_widgets_init' );
			
	}

	
}

// Plugin init.
$Salient_Widgets = Salient_Widgets::getInstance();