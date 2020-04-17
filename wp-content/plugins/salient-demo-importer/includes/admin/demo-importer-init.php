<?php 

/**
* Demo Importer Initialize.
*
* @since 1.0
*/


// Only load when using Salient.
if( defined( 'NECTAR_THEME_NAME' ) ) {
  
  add_action("redux/extensions/salient_redux/before", 'redux_register_nectar_demo_importer_extension_loader', 0);
  add_filter( 'wbc_importer_description', 'nectar_wbc_importer_description_text', 10 );
  add_action( 'wbc_importer_after_content_import', 'nectar_after_ecommerce_demo_import', 10, 2 );
  
}



/**
* Loads demo importer extension.
*
* @since 1.0
*/
if( ! function_exists( 'redux_register_nectar_demo_importer_extension_loader' ) ) {
  
  function redux_register_nectar_demo_importer_extension_loader( $ReduxFramework ) {
    
    $extension_class = 'ReduxFramework_Extension_wbc_importer';
    
    if( ! class_exists( $extension_class ) ) {
      
      $path       = SALIENT_DEMO_IMPORTER_ROOT_DIR_PATH . 'includes/admin/redux-extensions/';
      $folder     = 'wbc_importer';
      $class_file = $path . $folder . '/extension_' . $folder . '.php';
      $class_file = apply_filters( 'redux/extension/salient_redux/'.$folder, $class_file );
      
      if( $class_file && file_exists($class_file) ) {
        require_once( $class_file );
        $extension = new $extension_class( $ReduxFramework );
      }
      
    }
    
  }
  
}


/**
* Alter demo importer top helper text.
*
* @since 1.0
*/
if ( ! function_exists( 'nectar_wbc_importer_description_text' ) ) {
  
  function nectar_wbc_importer_description_text( $description ) {
    $message  = '<p>' . esc_html__( 'A note for users importing demos on an existing WordPress install: When the option is selected to import "Theme option settings", your current theme options will be overwritten.', 'salient-demo-importer' ) . '</p>';
    $message .= '<p>' . esc_html__( 'Ensure that you have all required plugins installed & activated for the demo you wish to import before confirming the import.', 'salient-demo-importer' ) . ' ' . esc_html__( 'For demos that require the WooCommerce plugin - do not forget to run the', 'salient-demo-importer' ) . ' <a href="' . esc_url( get_admin_url() ) . 'admin.php?page=wc-setup">' . esc_html( 'plugin setup wizard', 'salient-demo-importer' ) . '</a> ' . esc_html( 'before the demo import if you have not previously used the plugin on your site.', 'salient-demo-importer' ) . '</p>';
    $message .= '<p>' . esc_html__( 'See the', 'salient-demo-importer' ) . ' <a href="//themenectar.com/docs/salient/importing-demo-content/" target="_blank">' . esc_html__( 'documentation', 'salient-demo-importer' ) . '</a> ' . esc_html__( 'if you run into trouble importing a demo.', 'salient-demo-importer' ) . '</p>';
    return $message;
  }
  
}



/**
* Helper for eCommerce demo imports.
*
* @since 1.0
*/
if ( ! function_exists( 'nectar_update_woo_cat_thumb' ) ) {
  
  function nectar_update_woo_cat_thumb( $cat_slug, $thumb_id ) {
    
    $n_woo_category    = get_term_by( 'slug', $cat_slug, 'product_cat' );
    $n_woo_category_id = ( $n_woo_category && isset( $n_woo_category->term_id ) ) ? $n_woo_category->term_id : false;
    if ( $n_woo_category_id ) {
      update_woocommerce_term_meta( $n_woo_category_id, 'thumbnail_id', $thumb_id );
    }
    
  }
  
}


/**
* After a demo has imported.
*
* @since 1.0
*/
if ( ! function_exists( 'nectar_after_ecommerce_demo_import' ) ) {
  
  function nectar_after_ecommerce_demo_import( $demo_active_import, $demo_directory_path ) {
    
    global $woocommerce;
    
    if ( isset( $demo_directory_path ) && strpos( $demo_directory_path, 'Ecommerce-Ultimate' ) && $woocommerce ) {
      
      // Update shop page page header.
      $shop_page_id = wc_get_page_id( 'shop' );
      if ( $shop_page_id ) {
        
        update_post_meta( $shop_page_id, '_nectar_header_bg_color', '#eaf0ff' );
        update_post_meta( $shop_page_id, '_nectar_header_title', 'All Products' );
        update_post_meta( $shop_page_id, '_nectar_header_font_color', '#000000' );
        update_post_meta( $shop_page_id, '_nectar_header_subtitle', 'Affordable designer clothing with unmatched quality' );
        update_post_meta( $shop_page_id, '_nectar_page_header_alignment', 'center' );
        update_post_meta( $shop_page_id, '_nectar_header_bg_height', '230' );
        update_post_meta( $shop_page_id, '_disable_transparent_header', 'on' );
      }
      
      // Update category thumbnails.
      nectar_update_woo_cat_thumb( 'accessories', 5688 );
      nectar_update_woo_cat_thumb( 'basic-t-shirts', 17 );
      nectar_update_woo_cat_thumb( 'casual-shirts', 29 );
      nectar_update_woo_cat_thumb( 'fresh-clothing', 18 );
      nectar_update_woo_cat_thumb( 'hipster-style', 41 );
      nectar_update_woo_cat_thumb( 'outerwear', 38 );
      nectar_update_woo_cat_thumb( 'sports-clothing', 5767 );
      
    } // end ecommerce ultimate
    
    elseif ( isset( $demo_directory_path ) && strpos( $demo_directory_path, 'Ecommerce-Creative' ) && $woocommerce ) {
      
      // Update shop page page header.
      $shop_page_id = wc_get_page_id( 'shop' );
      if ( $shop_page_id ) {
        update_post_meta( $shop_page_id, '_nectar_header_title', 'The Shop' );
        update_post_meta( $shop_page_id, '_nectar_header_subtitle', 'Affordable designer clothing with unmatched quality' );
        update_post_meta( $shop_page_id, '_nectar_page_header_alignment', 'center' );
        update_post_meta( $shop_page_id, '_nectar_header_bg_height', '400' );
        update_post_meta( $shop_page_id, '_nectar_header_bg', 'http://themenectar.com/demo/salient-ecommerce-creative/wp-content/uploads/2018/08/adrian-sava-184378-unsplash.jpg' );
      }
      
      // Update category thumbnails.
      nectar_update_woo_cat_thumb( 'basic-t-shirts', 3002 );
      nectar_update_woo_cat_thumb( 'casual-shirts', 3004 );
      nectar_update_woo_cat_thumb( 'cool-clothing', 3003 );
      nectar_update_woo_cat_thumb( 'fresh-accessories', 3001 );
      nectar_update_woo_cat_thumb( 'hipster-style', 2960 );
      nectar_update_woo_cat_thumb( 'outerwear', 3060 );
      nectar_update_woo_cat_thumb( 'sport-clothing', 2970 );
      
    } // end ecommerce creative
    
  } // main function end
  
}

