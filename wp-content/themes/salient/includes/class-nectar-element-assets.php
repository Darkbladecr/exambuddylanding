<?php
/**
 * Nectar Element Assets
 *
 * Verifies the existance of specific elements
 * on a given page/post for asset loading.
 *
 * @package Salient WordPress Theme
 * @version 10.5.1
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 * Nectar Element Assets.
 */
class NectarElAssets {
  
  private static $instance;
  
  public static $using_woocommerce   = false;
  public static $post_content        = '';
  public static $portfolio_content   = '';
  public static $woo_shop_content    = '';
  public static $woo_taxonmy_content = '';
	
	/**
	 * Constructor.
	 */
  public function __construct() {
		if( !is_admin() ) {
	    add_action( 'wp', array( $this, 'get_page_content' ), 5 );
		}
  }
  
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
	 * Stores page/post content for searching.
	 */
  public static function get_page_content() {
    
    global $post;
    
    if ( ! is_object( $post ) ) {
      $post = (object) array(
        'post_content' => ' ',
        'ID'           => ' ',
      );
    }
    
    // Check if using WooCommerce.
    if( class_exists( 'WooCommerce' ) && function_exists('is_shop') && function_exists('is_product_category') ) {
      self::$using_woocommerce = true;
    }
    
    // Portfolio.
    self::$portfolio_content = ( isset( $post->ID ) ) ? get_post_meta( $post->ID, '_nectar_portfolio_extra_content', true ) : '';
    
    // Page/Post.
    self::$post_content = ( isset( $post->post_content ) ) ? $post->post_content : '';
		
		// WooCommerce.
    if( self::$using_woocommerce ) {
      
      // WooCommerce Shop Page.
      if( is_shop() ) {
        $woo_shop_id   = get_option( 'woocommerce_shop_page_id' );
        $woo_shop_page = ( $woo_shop_id && !empty($woo_shop_id) ) ? get_post( $woo_shop_id ) : '';
        self::$woo_shop_content = ( !empty($woo_shop_page) && isset( $woo_shop_page->post_content ) ) ? $woo_shop_page->post_content : '';
      }
      
      // WooCommerce Category or Tag.
      if( is_product_category() || is_product_tag() ) {
        $current_query = get_queried_object();
        self::$woo_taxonmy_content = ( !empty($current_query) && !empty($current_query->description) && isset( $current_query->description ) ) ? $current_query->description : '';
      }
      
    }
    
    
  }
  
  
	/**
	 * Checks the page/post content for the given string.
	 *
	 * @return bool True if found. False otherwise.
	 */
  public static function locate($search_arr = '') {
    
    foreach( $search_arr as $string ) {
  		
  		if( strpos( self::$post_content, $string ) !== false || 
  			strpos( self::$portfolio_content, $string ) !== false ||
  			strpos( self::$woo_shop_content, $string ) !== false ||
  			strpos( self::$woo_taxonmy_content, $string ) !== false ) {
  			return true;
  		} 
  		
  	}
  
  	return false;
    
  }
  
  
}

/**
 * Initialize the NectarElAssets class
 */
NectarElAssets::get_instance();




/**
 * Verify elements are in use.
 *
 * @deprecated since 10.5.1
 */
if( !function_exists('nectar_using_content') ) { 
  function nectar_using_content() {
    return true;
  }
}