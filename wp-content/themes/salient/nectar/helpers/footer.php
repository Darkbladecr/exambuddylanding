<?php
/**
 * Footer related helper functions
 *
 * @package Salient WordPress Theme
 * @subpackage helpers
 * @version 10.5
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 * Output the footer attributes
 *
 * @since 10.5
 */
 if( !function_exists('nectar_footer_attributes') ) {
   
  function nectar_footer_attributes() {
    
    $nectar_options = get_nectar_theme_options();
    $header_format  = ( ! empty( $nectar_options['header_format'] ) ) ? $nectar_options['header_format'] : 'default';
    $theme_skin     = ( ! empty( $nectar_options['theme-skin'] ) ) ? $nectar_options['theme-skin'] : 'original';
    if ( 'centered-menu-bottom-bar' === $header_format ) {
    	$theme_skin = 'material';
    }

    $using_footer_widget_area  = ( ! empty( $nectar_options['enable-main-footer-area'] ) && $nectar_options['enable-main-footer-area'] === '1' ) ? 'true' : 'false';
    $disable_footer_copyright  = ( ! empty( $nectar_options['disable-copyright-footer-area'] ) && $nectar_options['disable-copyright-footer-area'] === '1' ) ? 'true' : 'false';
    $footer_reveal             = ( ! empty( $nectar_options['footer-reveal'] ) ) ? $nectar_options['footer-reveal'] : 'false';
    $footer_full_width         = ( ! empty( $nectar_options['footer-full-width'] ) ) ? $nectar_options['footer-full-width'] : 'false';
    $copyright_line            = ( ! empty( $nectar_options['footer-copyright-line'] ) && $nectar_options['footer-copyright-line'] === '1' ) ? 'true' : 'false';
    $footer_columns            = ( ! empty( $nectar_options['footer_columns'] ) ) ? $nectar_options['footer_columns'] : '4';
    $footer_bg_image_overlay   = ( ! empty( $nectar_options['footer-background-image-overlay'] ) ) ? $nectar_options['footer-background-image-overlay'] : '0.8';
    $footer_bg_image           = ( ! empty( $nectar_options['footer-background-image'] ) && ! empty( $nectar_options['footer-background-image']['url'] ) ) ? nectar_options_img( $nectar_options['footer-background-image'] ) : false;
    $footer_bg_color           = ( ! empty( $nectar_options['footer-background-color'] ) ) ? $nectar_options['footer-background-color'] : 'default-footer-color';
    $footer_copyright_bg_color = ( ! empty( $nectar_options['footer-copyright-background-color'] ) ) ? $nectar_options['footer-copyright-background-color'] : 'default-footer-copyright-color';
    $footer_custom_color       = ( ! empty( $nectar_options['footer-custom-color'] ) && $nectar_options['footer-custom-color'] === '1' ) ? 'true' : 'false';
		$footer_link_hover         = ( ! empty( $nectar_options['footer-link-hover'] ) ) ? $nectar_options['footer-link-hover'] : 'default';
    $using_footer_bg_img       = 'false';



    // Is the footer color BG the same as the copyright bar?
    $matching_footer_color = 'false';

    if ( 'true' === $footer_custom_color ) {
    	$matching_footer_color = ( $footer_bg_color === $footer_copyright_bg_color ) ? 'true' : 'false';
    } 
    elseif ( 'false' === $footer_custom_color && 'material' === $theme_skin || 'false' === $footer_custom_color && 'ascend' === $theme_skin ) {
    	$matching_footer_color = 'true';
    }
    
    
    // Output attributes.
    if ( $footer_bg_image && ! empty( $footer_bg_image ) ) {
    	$using_footer_bg_img = 'true';
    	echo 'style="background-image:url(' . esc_url($footer_bg_image) . ');" ';
    }
    
    if( '1' !== $footer_reveal ) {
      echo 'data-midnight="light" ';
    }
    
    echo 'data-cols="'. esc_attr( $footer_columns ) .'" '; 
    echo 'data-custom-color="'.esc_attr( $footer_custom_color ).'" '; 
    echo 'data-disable-copyright="'.esc_attr( $disable_footer_copyright ).'" '; 
    echo 'data-matching-section-color="'.esc_attr( $matching_footer_color ).'" '; 
    echo 'data-copyright-line="'.esc_attr( $copyright_line ).'" '; 
    echo 'data-using-bg-img="'.esc_attr( $using_footer_bg_img ).'" '; 
    echo 'data-bg-img-overlay="'.esc_attr( $footer_bg_image_overlay ).'" '; 
    echo 'data-full-width="'.esc_attr( $footer_full_width ).'" '; 
    echo 'data-using-widget-area="'.esc_attr( $using_footer_widget_area ).'" '; 
		echo 'data-link-hover="'.esc_attr( $footer_link_hover ).'"'; 
    
  }
  
}