<?php
/**
 * Nectar Lazy Load Images 
 *
 * 
 * @package Salient WordPress Theme
 * @version 11.5
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 * Nectar Lazy Images.
 */
if( !class_exists('NectarLazyImages') ) { 
	
	class NectarLazyImages {
	  
	  private static $instance;
	  
	  
	  /**
		 * Initiator.
		 */
	  public static function get_instance() {
			if ( !self::$instance ) {
				self::$instance = new self;
			}
			return self::$instance;
		}
	  
	  /**
		 * Determines whether or not to use lazy loading data source.
		 */
	  public static function activate_lazy() {
	    
	    // Disable for Feed.
	    if( is_feed() ) {
	      return false;
	    }
	    
	    // Disable for AMP.
	    if( function_exists( 'is_amp_endpoint' ) && is_amp_endpoint() ) {
	      return false;
	    }
	    
	    return true;
	  }
	  
	}


	/**
	 * Initialize the NectarElAssets class
	 */
	NectarLazyImages::get_instance();

}