<?php
/**
 * Dynamic CSS related helper functions
 *
 * @package Salient WordPress Theme
 * @subpackage helpers
 * @version 10.1
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}



/**
 * Check if the first element on the page is a full width row to handle the top padding
 *
 * @since 9.0
 */
if (!function_exists('nectar_top_padding_calc')) {
	
	function nectar_top_padding_calc() {
		
			global $post;
			
			$pattern = get_shortcode_regex();
			
			if($post && isset($post->post_content) && (!is_single() && !is_archive() && !is_home()) ) {

						if ( preg_match( '/'. $pattern .'/s', $post->post_content, $matches ) && array_key_exists( 0, $matches ))  {

								if($matches[0]){
									
										if( strpos($matches[0],'vc_row type="full_width_background"') !== false || strpos($matches[0],'vc_row type="full_width_content"') !== false ) {
							 				$custom_css = 'html body[data-header-resize="1"] .container-wrap, html body[data-header-resize="0"] .container-wrap, body[data-header-format="left-header"][data-header-resize="0"] .container-wrap { padding-top: 0; }';
							 				wp_add_inline_style( 'main-styles', $custom_css );
										} // First shortcode is fullwidth.
									
								}
							
						}

			} // Verify not on single or archive.
			
	} 
	
}

add_action( 'wp_enqueue_scripts', 'nectar_top_padding_calc' );




/**
 * Helper to output font properties for each font field.
 *
 * @param  string $typography_item Typography array key selector.
 * @param  string $line_height Calculated line height (can differ for each field).
 * @param  array  $nectar_options Array of theme options.
 * @since 10.5
 */
if( !function_exists('nectar_output_font_props') ) {
	
	function nectar_output_font_props($typography_item, $line_height, $nectar_options) {
				
		// Handle the use of !important when needed.
		$important_size_weight = '';
		$important_transform   = '';
		
		if( $typography_item === 'label_font' || 
		$typography_item === 'portfolio_filters_font' || 
		$typography_item === 'portfolio_caption_font' || 
		$typography_item === 'nectar_dropcap_font' ||
		$typography_item === 'nectar_sidebar_footer_headers_font' ||
		$typography_item === 'nectar_woo_shop_product_title_font' ||
		$typography_item === 'nectar_woo_shop_product_secondary_font' ) {
			$important_size_weight = '!important';
		}
		
		if( $typography_item === 'sidebar_footer_h_font' || 
		$typography_item === 'nectar_sidebar_footer_headers_font' || 
		$typography_item === 'nectar_woo_shop_product_secondary_font' ) {
			$important_transform = '!important';
		}
		
		$styles = explode('-', $nectar_options[$typography_item.'_style']);
		
		if( $nectar_options[$typography_item] != '-' ) {
			$font_family = (1 === preg_match('~[0-9]~', $nectar_options[$typography_item])) ? '"'. $nectar_options[$typography_item] .'"' : $nectar_options[$typography_item];
		}
		
		// Font Family.
		if( $nectar_options[$typography_item] != '-' ) { 
			
			// Handle fonts with quotes.
			
			if( strrpos($font_family, '"') ) {
				echo 'font-family: ' . htmlspecialchars($font_family, ENT_NOQUOTES) .'; '; 
			} else {
				echo 'font-family: ' . esc_attr($font_family) .'; '; 
			}
			
		}
		// Text Transform.
		if( $nectar_options[$typography_item.'_transform'] != '-' ) { 
			echo 'text-transform: ' . esc_attr($nectar_options[$typography_item.'_transform']) . $important_transform . '; '; 
		}
		// Letter Spacing.
		if( $nectar_options[$typography_item.'_spacing'] != '-' ) { 
			echo 'letter-spacing: ' . esc_attr($nectar_options[$typography_item.'_spacing']) .'; '; 
		}
		// Font Size.
		if( $nectar_options[$typography_item.'_size'] != '-' ) { 
			echo 'font-size:' . esc_attr($nectar_options[$typography_item.'_size']) . $important_size_weight . '; '; 
		}
		
		// User Set Line Height.
		if( $nectar_options[$typography_item.'_line_height'] != '-' && $line_height !== 'bypass' ) { 
			echo 'line-height:' . esc_attr($nectar_options[$typography_item.'_line_height']) .'; '; 
		} 
		// Auto Line Height.
		else if( !empty($line_height) && $line_height !== 'bypass' ) {
			echo 'line-height:' . esc_attr($line_height) .'; ';
		} 
		
		if( !empty($styles[0]) && $styles[0] == 'regular' ) { 
			$styles[0] = '400';
		}
		
		// Font Weight/Style.
		if( !empty($styles[0]) && strpos($styles[0],'italic') === false ) { 
			echo 'font-weight:' .  esc_attr($styles[0]) . $important_size_weight . '; '; 
		}
		else if(!empty( $styles[0]) && strpos($styles[0],'0italic') == true ) {
			
			$the_weight = explode("i",$styles[0]);
			
			echo 'font-weight:' . esc_attr($the_weight[0]) .'; '; 
			echo 'font-style: italic; ';
		}
		else if( !empty($styles[0]) ) {
			if(strpos($styles[0],'italic') !== false) {
				echo 'font-weight: 400; '; 
				echo 'font-style: italic; ';
			}
		}
		if( !empty($styles[1]) ) { 
			echo 'font-style:' . esc_attr($styles[1]);
		}
		
	}
	
}



/**
 * Helper to calculate the line height for each font field.
 *
 * @param  string $typography_item Typography array key selector.
 * @param  string $line_height
 * @param  array  $nectar_options Array of theme options.
 * @since 10.5
 */
 if( !function_exists('nectar_font_line_height') ) {
	 
	function nectar_font_line_height($typography_item, $line_height, $nectar_options) {
		
		// User Set Line Height.
		if( $nectar_options[$typography_item.'_line_height'] != '-' ) {  
			$the_line_height = $nectar_options[$typography_item.'_line_height'];
		} 
		// Auto Line Height.
		else if( !empty($line_height) ) {
			$the_line_height = $line_height;
		} 
		else { 
			$the_line_height = null; 
		}
		
		return $the_line_height;
		
	}
	
}



/**
 * Quick minification helper function
 *
 * @since 4.0
 */
 
function nectar_quick_minify( $css ) {

	$css = preg_replace( '/\s+/', ' ', $css );
	
	$css = preg_replace( '/\/\*[^\!](.*?)\*\//', '', $css );
	
	$css = preg_replace( '/(,|:|;|\{|}) /', '$1', $css );
	
	$css = preg_replace( '/ (,|;|\{|})/', '$1', $css );
	
	$css = preg_replace( '/(:| )0\.([0-9]+)(%|em|ex|px|in|cm|mm|pt|pc)/i', '${1}.${2}${3}', $css );
	
	$css = preg_replace( '/(:| )(\.?)0(%|em|ex|px|in|cm|mm|pt|pc)/i', '${1}0', $css );
	
	return trim( $css );

}


/**
 * Gets the color related dynamic css
 *
 * @since 9.0.2
 */
if (!function_exists('nectar_colors_css_output')) {
	function nectar_colors_css_output() {
		get_template_part('css/colors');
	}
}

/**
 * Gets the theme option related dynamic css
 *
 * @since 9.0.2
 */
if (!function_exists('nectar_custom_css_output')) {
	function nectar_custom_css_output() {
		get_template_part('css/custom');
	}
}

/**
 * Gets the font related dynamic css
 *
 * @since 9.0.2
 */
if (!function_exists('nectar_fonts_output')) {
	function nectar_fonts_output() {
		get_template_part('css/fonts');
	}
}



/**
 * Writes the dynamic CSS into a file
 * @since 6.0
 * @version 10.5
 * @hooked redux/options/salient_redux/saved
 */
function nectar_generate_options_css() {

	$nectar_options = get_nectar_theme_options(); 

	if( true === nectar_dynamic_css_dir_writable() ) {

		$css_dir = get_template_directory() . '/css/'; 
		ob_start(); 

		// Include css.
		nectar_colors_css_output();
		nectar_custom_css_output();
		nectar_fonts_output();

		$css = ob_get_clean(); 
		
		// Write css to file.
		global $wp_filesystem;
		
		if ( empty($wp_filesystem) ) {	
			require_once( ABSPATH . 'wp-admin/includes/file.php' );
		}

		WP_Filesystem();
		
		$file_chmod = ( defined('FS_CHMOD_FILE') ) ? FS_CHMOD_FILE : false;
		
		if ( is_multisite() ) {
			if( !$wp_filesystem->put_contents($css_dir . 'salient-dynamic-styles-multi-id-'. get_current_blog_id() .'.css', $css, $file_chmod)) { 
				// Filesystem can not write.
				update_option('salient_dynamic_css_success', 'false');
			} else {
				update_option('salient_dynamic_css_success', 'true');
			}
		} else {
			if( !$wp_filesystem->put_contents($css_dir . 'salient-dynamic-styles.css', $css, $file_chmod)) {
				// Filesystem can not write.
				update_option('salient_dynamic_css_success', 'false');
			} else {
				update_option('salient_dynamic_css_success', 'true');
			}
		}
		
		// Update version number for cache busting.
		$random_number = rand( 0, 99999 );
		update_option('salient_dynamic_css_version', $random_number);
		
	} // endif CSS dir is writable.
	else {
		// Filesystem can not write.
		update_option('salient_dynamic_css_success', 'false');
	}
	
}



/**
 * Enqueues dynamic theme option CSS in head using wp_add_inline_style.
 *
 * @since 10.1
 */
function nectar_enqueue_dynamic_css_non_external() {
	
	global $nectar_options;
	
	ob_start(); 
	
	// Include css.
	nectar_colors_css_output();
	nectar_custom_css_output();
	nectar_fonts_output();
	
	$nectar_dynamic_css = ob_get_contents();
	ob_end_clean();
	
	$nectar_dynamic_css = nectar_quick_minify($nectar_dynamic_css);
	
	// Theme options custom css.
	$nectar_theme_option_css = ( !empty($nectar_options["custom-css"]) ) ? $nectar_options["custom-css"] : false;
	
	// Handle page specific dynamic.
	$nectar_page_specific_dynamic_css = nectar_page_specific_dynamic();
	
	$theme_skin 		= ( !empty($nectar_options['theme-skin']) ) ? $nectar_options['theme-skin'] : 'original'; 
	$header_format 	= ( !empty($nectar_options['header_format']) ) ? $nectar_options['header_format'] : 'default';
	
	if( $header_format === 'centered-menu-bottom-bar' ) { 
		$theme_skin = 'material'; 
	}
	
	// Attach styles to current skin stylesheet.
	$theme_skin_arr = array('original','ascend','material');
	
	foreach( $theme_skin_arr as $skin_name ) {
		
		if ( $theme_skin === $skin_name ) {
			
			wp_add_inline_style( 'skin-'.$skin_name, $nectar_dynamic_css );
			wp_add_inline_style( 'skin-'.$skin_name, $nectar_page_specific_dynamic_css );
			
			if( false !== $nectar_theme_option_css ) {
				wp_add_inline_style( 'skin-'.$skin_name, $nectar_theme_option_css );
			}
			
		} 
		
	}

			
}




/**
 * Enqueue the dynamic CSS via stylesheet.
 * @since 6.0
 * @version 10.1
 */
function nectar_enqueue_dynamic_css() {
	
	global $nectar_options;
	
	$nectar_theme_version    = nectar_get_theme_version();
	$dynamic_css_version_num = ( !get_option('salient_dynamic_css_version') ) ? $nectar_theme_version : get_option('salient_dynamic_css_version');
	
	if( is_multisite() && file_exists( NECTAR_THEME_DIRECTORY . '/css/salient-dynamic-styles-multi-id-'. get_current_blog_id() .'.css' ) ) {
		wp_register_style('dynamic-css', get_template_directory_uri() . '/css/salient-dynamic-styles-multi-id-'. get_current_blog_id() .'.css', '', $dynamic_css_version_num);
	} else {
		wp_register_style('dynamic-css', get_template_directory_uri() . '/css/salient-dynamic-styles.css', '', $dynamic_css_version_num);
	}
	
	wp_enqueue_style('dynamic-css');
	
	// Handle page specific dynamic
	$nectar_page_specific_dynamic_css = nectar_page_specific_dynamic();
	wp_add_inline_style( 'dynamic-css', $nectar_page_specific_dynamic_css );
	
	// Theme options custom css.
	$nectar_theme_option_css = ( !empty($nectar_options["custom-css"]) ) ? $nectar_options["custom-css"] : false;
	if( false !== $nectar_theme_option_css ) {
		wp_add_inline_style( 'dynamic-css', $nectar_theme_option_css );
	}
	
}




// Enqueue dynamic css.
if( true === nectar_dynamic_css_external_bool() ) {
	add_action( 'wp_enqueue_scripts', 'nectar_enqueue_dynamic_css', 20 );
}
// Inline styles.
else {
	add_action( 'wp_enqueue_scripts', 'nectar_enqueue_dynamic_css_non_external' );
}



/**
 * Determine whether or not external dynamic css functionality can be used.
 * @since 10.5
 */
function nectar_dynamic_css_external_bool() {
	
	$nectar_options = get_nectar_theme_options(); 
		
	// Prevent external dynamic CSS theme option.
	$nectar_inline_dynamic_css = ( !empty($nectar_options["force-dynamic-css-inline"]) && $nectar_options["force-dynamic-css-inline"] === '1' ) ? true : false;
	if( $nectar_inline_dynamic_css ) {
		return false;
	}
	
	// Ensure that there are no problems with the dynamic css.
	$nectar_external_dynamic_success = get_option('salient_dynamic_css_success');
	if( !$nectar_external_dynamic_success || 'false' === $nectar_external_dynamic_success ) {
		return false;
	}

	
	// Multisite enqueue dynamic css.
	if( is_multisite() && file_exists( NECTAR_THEME_DIRECTORY . '/css/salient-dynamic-styles-multi-id-'. get_current_blog_id() .'.css' ) ) {
		return true;
	}
	// Non multisite enqueue dynamic css.
	else if( !is_multisite() && file_exists( NECTAR_THEME_DIRECTORY . '/css/salient-dynamic-styles.css' ) ) {
		return true;
	}
	
	return false;
	
}


/**
 * Determine whether or not css dir is writable.
 * @since 10.5
 */
function nectar_dynamic_css_dir_writable() {
	
	global $wp_filesystem;
	
	if ( empty($wp_filesystem) || ! function_exists( 'request_filesystem_credentials' ) ) {	
		require_once( ABSPATH . 'wp-admin/includes/file.php' );
	}
	
	$path = NECTAR_THEME_DIRECTORY . '/css/';
	
	// Does the fs have direct access?
	if( get_filesystem_method(array(), $path) === "direct" ) {
		return true;
	} 
	
	// Also check for stored credentials.
	if ( ! function_exists( 'submit_button' ) ) {
		require_once( ABSPATH . 'wp-admin/includes/template.php' );
	}
	
	ob_start();
	$fs_stored_credentials = request_filesystem_credentials('', '', false, false, null);
	ob_end_clean();

	
	if ( $fs_stored_credentials && WP_Filesystem( $fs_stored_credentials ) ) {
		return true;
	}
	
	return false;
	
}


/**
 * Checks if users has updated the theme.
 *
 * Automatically regenerates the external dynamic css upon updating theme.
 * Refreshes the TGM plugin notice.
 *
 * @since 10.5
 */
add_action( 'shutdown', 'nectar_update_external_dynamic_css' );

function nectar_update_external_dynamic_css() {

	global $nectar_options;
	
	$salient_current_version = nectar_get_theme_version();
	$salient_stored_version  = ( !get_option('salient_stored_version') ) ? 0 : sanitize_text_field(get_option('salient_stored_version'));
	
	// If the version has switched, rgenerate dynamic css. Verify if admin since requesting fs creds.
	if( $salient_current_version != $salient_stored_version && current_user_can('switch_themes') ) {
		update_option('salient_stored_version', $salient_current_version);
		nectar_generate_options_css();
		delete_metadata( 'user', null, 'tgmpa_dismissed_notice_salient', null, true );
	}
	
}





/**
 * Generates all dynamic CSS that can change based on the
 * page rather than global theme option settings alone.
 *
 * @since 6.0
 * @version 10.5
 */
if (!function_exists('nectar_page_specific_dynamic')) {
	
	function nectar_page_specific_dynamic() {

		 ob_start(); 

		 global $post;
		 global $nectar_options;

		 // Page header coloring.
		 global $woocommerce;
		 if( $woocommerce && version_compare( $woocommerce->version, "3.0", ">=" ) ) {
			 
			 if(is_shop() || is_product_category() || is_product_tag()) {
				 $font_color = get_post_meta(wc_get_page_id('shop'), '_nectar_header_font_color', true);
			 } else {
				 $font_color = get_post_meta($post->ID, '_nectar_header_font_color', true);
			 }
			 
		 } 
		 else {
			 $font_color = get_post_meta($post->ID, '_nectar_header_font_color', true);
		 }
		 
		 // Default minimal blog header.
		 $blog_header_type = (!empty($nectar_options['blog_header_type'])) ? $nectar_options['blog_header_type'] : 'default_minimal'; 
		 $default_minimal_text_color = (!empty($nectar_options['default_minimal_text_color'])) ? $nectar_options['default_minimal_text_color'] : false;
		 if( 'default_minimal' === $blog_header_type && is_singular('post') && false !== $default_minimal_text_color && empty($font_color) ) {
			 $font_color = $default_minimal_text_color;
		 }
		 
		 // Auto page header.
		 $header_auto_title = (!empty($nectar_options['header-auto-title']) && $nectar_options['header-auto-title'] == '1') ? true : false;
		 $page_header_title = get_post_meta($post->ID, '_nectar_header_title', true);
		 
		 if( $header_auto_title && is_page() && empty($page_header_title) ) {
			 if( empty($font_color) ) { 
				 $font_color = (!empty($nectar_options['overall-font-color'])) ? $nectar_options['overall-font-color'] : '#333333'; 
			 }
		 }
 	 
 		 if( !empty($font_color) && !is_search() && !is_category() && !is_author() && !is_date() ) {
			 
			 echo '#page-header-bg h1, 
			 #page-header-bg .subheader, 
			 .nectar-box-roll .overlaid-content h1, 
			 .nectar-box-roll .overlaid-content .subheader, 
			 #page-header-bg #portfolio-nav a i, 
			 body .section-title #portfolio-nav a:hover i, 
			 .page-header-no-bg h1, 
			 .page-header-no-bg span, 
			 #page-header-bg #portfolio-nav a i, 
			 #page-header-bg span,
			 #page-header-bg #single-below-header a:hover,
			 #page-header-bg #single-below-header a:focus,
			 #page-header-bg.fullscreen-header .author-section a { 
				 color: '. esc_attr($font_color) .'!important; 
			 } ';
			 
			 $font_color_no_hash = substr($font_color,1);
		 	 $colorR = hexdec( substr( $font_color_no_hash, 0, 2 ) );
			 $colorG = hexdec( substr( $font_color_no_hash, 2, 2 ) );
			 $colorB = hexdec( substr( $font_color_no_hash, 4, 2 ) );
			 
			 echo 'body #page-header-bg .pinterest-share i, 
			 body #page-header-bg .facebook-share i, 
			 body #page-header-bg .linkedin-share i, 
			 body #page-header-bg .twitter-share i, 
			 body #page-header-bg .google-plus-share i, 
		 	 body #page-header-bg .icon-salient-heart, 
			 body #page-header-bg .icon-salient-heart-2 { 
				 color: '. esc_attr($font_color) .'; 
			 }
			 #page-header-bg[data-post-hs="default_minimal"] .inner-wrap > a:not(:hover) {
				 color: '. esc_attr($font_color) .'; 
				 border-color: rgba('.$colorR.','.$colorG.','.$colorB.',0.4); 
			 }
			 .single #page-header-bg #single-below-header > span {
				 border-color: rgba('.$colorR.','.$colorG.','.$colorB.',0.4); 
			 }
			 ';
			 
		 	 echo 'body .section-title #portfolio-nav a:hover i { 
				 opacity: 0.75;
			 }';

		 	 echo '.single #page-header-bg .blog-title #single-meta .nectar-social.hover > div a, 
			 .single #page-header-bg .blog-title #single-meta > div a, 
			 .single #page-header-bg .blog-title #single-meta ul .n-shortcode a,
			 #page-header-bg .blog-title #single-meta .nectar-social.hover .share-btn { 
				 border-color: rgba('.$colorR.','.$colorG.','.$colorB.',0.4); 
			 }';
			 
		 	 echo '.single #page-header-bg .blog-title #single-meta .nectar-social.hover > div a:hover, 
			 #page-header-bg .blog-title #single-meta .nectar-social.hover .share-btn:hover,
			 .single #page-header-bg .blog-title #single-meta div > a:hover, 
			 .single #page-header-bg .blog-title #single-meta ul .n-shortcode a:hover, 
			 .single #page-header-bg .blog-title #single-meta ul li:not(.meta-share-count):hover > a{ 
				 border-color: rgba('.$colorR.','.$colorG.','.$colorB.',1); 
			 }';
			 
		 	 echo '.single #page-header-bg #single-meta div span, 
			 .single #page-header-bg #single-meta > div a, 
			 .single #page-header-bg #single-meta > div i {  
				 color: '. esc_attr($font_color) .'!important; 
			 }';
			 
		 	 echo '.single #page-header-bg #single-meta ul .meta-share-count .nectar-social a i { 
				 color: rgba('.$colorR.','.$colorG.','.$colorB.',0.7)!important; 
			 }';
			 
		 	 echo '.single #page-header-bg #single-meta ul .meta-share-count .nectar-social a:hover i { 
				 color: rgba('.$colorR.','.$colorG.','.$colorB.',1)!important; 
			 }';
		}
		
		$theme_skin 		= (!empty($nectar_options['theme-skin'])) ? $nectar_options['theme-skin'] : 'original'; 
		$header_format 	= (!empty($nectar_options['header_format'])) ? $nectar_options['header_format'] : 'default';
		
		if( $header_format === 'centered-menu-bottom-bar' ) { 
			$theme_skin = 'material'; 
		}
		
		// Should the header be transparent?.
		if( !empty($nectar_options['transparent-header']) && $nectar_options['transparent-header'] == '1' ) {
			$activate_transparency = nectar_using_page_header($post->ID);
		} else {
			$activate_transparency = false;
		}
		
		// Using image based logo.
		if( ! empty( $nectar_options['use-logo'] ) ) {
				$logo_height = ( !empty($nectar_options['logo-height']) ) ? intval($nectar_options['logo-height']) : 30;
		} 
		// Using text logo.
		else {
				// Custom size from typography logo line height option.
				if( !empty($nectar_options['logo_font_family']['line-height']) ) {
					$logo_height = intval(substr($nectar_options['logo_font_family']['line-height'],0,-2));
				} 
				// Custom size from typography logo font size option.
				else if( !empty($nectar_options['logo_font_family']['font-size']) ) {
					$logo_height = intval(substr($nectar_options['logo_font_family']['font-size'],0,-2));
				}
				// Default size.
				else {
					$logo_height = 22;
				}
		}
		$header_padding 				= (!empty($nectar_options['header-padding'])) ? intval($nectar_options['header-padding']) : 28;
		$nav_font_size 					= (!empty($nectar_options['use-custom-fonts']) && $nectar_options['use-custom-fonts'] == 1 && !empty($nectar_options['navigation_font_size']) && $nectar_options['navigation_font_size'] != '-') ? intval(substr($nectar_options['navigation_font_size'],0,-2) *1.4 ) : 20;
		$dd_indicator_height 		= (!empty($nectar_options['use-custom-fonts']) && $nectar_options['use-custom-fonts'] == 1 && !empty($nectar_options['navigation_font_size']) && $nectar_options['navigation_font_size'] != '-') ? intval(substr($nectar_options['navigation_font_size'],0,-2)) -1 : 20;
		$padding_top 						= ceil(($logo_height/2)) - ceil(($nav_font_size/2));
		$padding_bottom 				= (ceil(($logo_height/2)) - ceil(($nav_font_size/2))) + $header_padding;
		$search_padding_top 		= ceil(($logo_height/2)) - ceil(21/2) +1;
		$search_padding_bottom 	= (ceil(($logo_height/2)) - ceil(21/2));
		$using_secondary 				= (!empty($nectar_options['header_layout'])) ? $nectar_options['header_layout'] : ' ';
		$mobile_logo_height 		= (!empty($nectar_options['use-logo']) && !empty($nectar_options['mobile-logo-height'])) ? intval($nectar_options['mobile-logo-height']) : 24;
		
		// Larger secondary header with material theme skin.
		if( $theme_skin === 'material' ) {
			$extra_secondary_height = ($using_secondary === 'header_with_secondary') ? 42 : 0;
		} else {
			$extra_secondary_height = ($using_secondary === 'header_with_secondary') ? 34 : 0;
		}
		
		if( $header_format === 'centered-menu-bottom-bar' ) {
		 	$header_space = $logo_height + ($header_padding*3) + $nav_font_size + $extra_secondary_height;
		}	
		else if( $header_format === 'centered-menu-under-logo' ) {
		 	$header_space = $logo_height + ($header_padding*2) + 20 + $nav_font_size + $extra_secondary_height;
		}	
		else {
			$header_space = $logo_height + ($header_padding*2) + $extra_secondary_height;
		}
		
		
		// Hide scrollbar during loading if using fullpage option.
		$page_full_screen_rows = (isset($post->ID)) ? get_post_meta($post->ID, '_nectar_full_screen_rows', true) : '';
		if( $page_full_screen_rows === 'on' && !is_search() ) {

			echo 'body,html { 
				overflow: hidden; 
				height: 100%;
			}';
		}
		
		// Body border.
		$body_border 				= (!empty($nectar_options['body-border'])) ? $nectar_options['body-border'] : 'off';
		$body_border_size 	= (!empty($nectar_options['body-border-size'])) ? $nectar_options['body-border-size'] : '20';
		$body_border_color 	= (!empty($nectar_options['body-border-color'])) ? $nectar_options['body-border-color'] : '#ffffff';
		
		if( $body_border === '1' ) {
			
			$headerFormat          = (!empty($nectar_options['header_format'])) ? $nectar_options['header_format'] : 'default';
			$headerColorScheme     = (!empty($nectar_options['header-color'])) ? $nectar_options['header-color'] : 'light';
			$userSetBG             = (!empty($nectar_options['header-background-color']) && $headerColorScheme === 'custom') ? $nectar_options['header-background-color'] : '#ffffff';

			if( empty($nectar_options['transparent-header']) ) {
				$activate_transparency = false;
			}

			echo '@media only screen and (min-width: 1000px) { 
				
				.page-submenu > .full-width-section,
				.page-submenu .full-width-content,
				.full-width-content.blog-fullwidth-wrap,
				.wpb_row.full-width-content, 
				body .full-width-section .row-bg-wrap,
				body .full-width-section > .nectar-shape-divider-wrap,
				body .full-width-section > .video-color-overlay,
				body[data-aie="zoom-out"] .first-section .row-bg-wrap, 
				body[data-aie="long-zoom-out"] .first-section .row-bg-wrap,
				body[data-aie="zoom-out"] .top-level.full-width-section .row-bg-wrap, 
				body[data-aie="long-zoom-out"] .top-level.full-width-section .row-bg-wrap,
				body .full-width-section.parallax_section .row-bg-wrap {
					margin-left: calc(-50vw + '. intval($body_border_size*2) .'px);
			    left: calc(50% - '.intval($body_border_size).'px);
			    width: calc(100vw - '. intval($body_border_size)*2 .'px);
				}';
				
				if( $headerFormat === 'left-header' ) {
					echo '[data-header-format="left-header"] .full-width-content.blog-fullwidth-wrap,
				  [data-header-format="left-header"] .wpb_row.full-width-content, 
				  [data-header-format="left-header"] .page-submenu > .full-width-section,
				  [data-header-format="left-header"] .page-submenu .full-width-content,
				  [data-header-format="left-header"] .full-width-section .row-bg-wrap,
				  [data-header-format="left-header"] .full-width-section > .nectar-shape-divider-wrap,
				  [data-header-format="left-header"] .full-width-section > .video-color-overlay,
				  [data-header-format="left-header"][data-aie="zoom-out"] .first-section .row-bg-wrap, 
				  [data-header-format="left-header"][data-aie="long-zoom-out"] .first-section .row-bg-wrap,
				  [data-header-format="left-header"][data-aie="zoom-out"] .top-level.full-width-section .row-bg-wrap, 
				  [data-header-format="left-header"][data-aie="long-zoom-out"] .top-level.full-width-section .row-bg-wrap,
				  [data-header-format="left-header"] .full-width-section.parallax_section .row-bg-wrap,
				  [data-header-format="left-header"] .nectar-slider-wrap[data-full-width="true"] {
				    margin-left: -'. (61 + intval($body_border_size)) .'px;
				    width: calc(100% + '. (122 + intval($body_border_size)) .'px);
				    left: 0;
				  }
				  [data-header-format="left-header"] .full-width-section > .nectar-video-wrap {
						margin-left: -'. (61 + intval($body_border_size)) .'px;
				    width: calc(100% + '. (122 + intval($body_border_size)) .'px)!important;
				    left: 0;
				  }';
			}
				
			echo '
			body {
				padding-bottom: '.esc_attr($body_border_size).'px; 
			}
			
			.container-wrap { 
				padding-right: '.esc_attr($body_border_size).'px; 
				padding-left: '.esc_attr($body_border_size).'px; 
				padding-bottom: '.esc_attr($body_border_size).'px;
			} 
			
			 #footer-outer[data-full-width="1"] { 
				 padding-right: '.esc_attr($body_border_size).'px; 
				 padding-left: '.esc_attr($body_border_size).'px; 
			 }
			 
			 body[data-footer-reveal="1"] #footer-outer { 
				 bottom: '.esc_attr($body_border_size).'px; 
			 }
			 
			 #slide-out-widget-area.fullscreen .bottom-text[data-has-desktop-social="false"], 
			 #slide-out-widget-area.fullscreen-alt .bottom-text[data-has-desktop-social="false"] {
				 bottom: '. intval($body_border_size + 28) .'px;
			 }
			 
			#header-outer, 
			body #header-outer-bg-only { 
				box-shadow: none; 
				-webkit-box-shadow: none;
			} 
			
			 .slide-out-hover-icon-effect.small, 
			 .slide-out-hover-icon-effect:not(.small) {
				 margin-top: '.esc_attr($body_border_size).'px; 
				 margin-right: '.esc_attr($body_border_size).'px;
			 }
			 
			 #slide-out-widget-area-bg.fullscreen-alt { 
				 padding: '.esc_attr($body_border_size).'px; 
			 }
			 
			 #slide-out-widget-area.slide-out-from-right-hover {
				 margin-right: '.esc_attr($body_border_size).'px;
			 }
			 
			 .orbit-wrapper div.slider-nav span.left, 
			 .swiper-container .slider-prev { 
				 margin-left: '.esc_attr($body_border_size).'px;
			 } 
			 .orbit-wrapper div.slider-nav span.right, 
			 .swiper-container .slider-next { 
				 margin-right: '.esc_attr($body_border_size).'px;
			 }
			 
			 .admin-bar #slide-out-widget-area-bg.fullscreen-alt { 
				 padding-top: '. intval($body_border_size+32) .'px; 
			 }
			 
			 #header-outer, 
			 [data-hhun="1"] #header-outer.detached:not(.scrolling),
			 #slide-out-widget-area.fullscreen .bottom-text { 
				 margin-top: '.esc_attr($body_border_size).'px; 
				 padding-right: '.esc_attr($body_border_size).'px; 
				 padding-left: '.esc_attr($body_border_size).'px; 
			 }
			 
			 #nectar_fullscreen_rows { 
				 margin-top: '.esc_attr($body_border_size).'px; 
			 }
			 
			#slide-out-widget-area.fullscreen .off-canvas-social-links { 
				padding-right: '.esc_attr($body_border_size).'px; 
			}
			
			#slide-out-widget-area.fullscreen .off-canvas-social-links, 
			#slide-out-widget-area.fullscreen .bottom-text { 
				padding-bottom: '.esc_attr($body_border_size).'px; 
			} 
			
			body[data-button-style] .section-down-arrow,
      .scroll-down-wrap.no-border .section-down-arrow,
      [data-full-width="true"][data-fullscreen="true"] .swiper-wrapper .slider-down-arrow {
        bottom: calc(16px + '.esc_attr($body_border_size).'px);
      }
			
			.ascend #search-outer #search #close, 
			#page-header-bg .pagination-navigation { 
				margin-right:  '.esc_attr($body_border_size).'px; 
			}
			
			#to-top { 
				right: '. intval($body_border_size+17) .'px; 
				margin-bottom: '.esc_attr($body_border_size).'px; 
			}
			
			body[data-header-color="light"] #header-outer:not(.transparent) .sf-menu > li > ul { 
				border-top: none; 
			}
		
			.nectar-social.fixed { 
				margin-bottom: '.esc_attr($body_border_size).'px; 
				margin-right: '.esc_attr($body_border_size).'px; 
			}
			
			.page-submenu.stuck { 
				padding-left: '.esc_attr($body_border_size).'px; 
				padding-right: '.esc_attr($body_border_size).'px; 
			}
			
			#fp-nav { 
				padding-right: '.esc_attr($body_border_size).'px; 
			} 
			.body-border-left {
				background-color: '.esc_attr($body_border_color).'; 
				width: '.esc_attr($body_border_size).'px;
			} 
			.body-border-right {
				background-color: '.esc_attr($body_border_color).'; 
				width: '.esc_attr($body_border_size).'px;
			} 
			.body-border-bottom { 
				background-color: '.esc_attr($body_border_color).'; 
				height: '.esc_attr($body_border_size).'px;
			} 
			
			.body-border-top {
				background-color: '.esc_attr($body_border_color).'; 
				height: '.esc_attr($body_border_size).'px;
			} 
			
		} 
		
		@media only screen and (max-width: 999px) { 
			.body-border-right, 
			.body-border-left, 
			.body-border-top, 
			.body-border-bottom { 
				display: none; 
			} 
		}';
			
			
		if( ($body_border_color === '#ffffff' && $headerColorScheme === 'light' || $headerColorScheme === 'custom' && $body_border_color === $userSetBG ) && $activate_transparency !== true ) {
				
				echo '#header-outer:not([data-using-secondary="1"]):not(.transparent),  
				body.ascend #search-outer, 
				body[data-slide-out-widget-area-style="fullscreen-alt"] #header-outer:not([data-using-secondary="1"]),
				#nectar_fullscreen_rows,
				body #slide-out-widget-area-bg { 
					margin-top: 0!important; 
				} 
				
				.body-border-top { 
					z-index: 9997; 
				} 
				
				body:not(.material) #slide-out-widget-area.slide-out-from-right { 
					z-index: 9997;
				} 
				
				body #header-outer, 
				body[data-slide-out-widget-area-style="slide-out-from-right-hover"] #header-outer { 
					z-index: 9998; 
				}
				
				@media only screen and (min-width: 1000px) {
					body[data-user-set-ocm="off"].material #header-outer[data-full-width="true"], 
					body[data-user-set-ocm="off"].ascend #header-outer { z-index: 10010; }
				}	
				
				@media only screen and (min-width: 1000px) { 
					body #slide-out-widget-area.slide-out-from-right-hover { z-index: 9996; }
					#header-outer[data-full-width="true"]:not([data-transparent-header="true"]) header > .container, 
					#header-outer[data-full-width="true"][data-transparent-header="true"].pseudo-data-transparent header > .container { 
						padding-left: 0; padding-right: 0; 
					}
				}
				
				@media only screen and (max-width: 1080px) and (min-width: 1000px) {
					.ascend[data-slide-out-widget-area="true"] #header-outer[data-full-width="true"]:not([data-transparent-header="true"]) header > .container { 
						padding-left: 0; 
						padding-right: 0; 
					}
				}
				
				body[data-header-search="false"][data-slide-out-widget-area="false"].ascend #header-outer[data-full-width="true"][data-cart="true"]:not([data-transparent-header="true"]) header > .container { 
					padding-right: 28px; 
				}

				body[data-slide-out-widget-area-style="slide-out-from-right"] #header-outer[data-header-resize="0"] {
					-webkit-transition: -webkit-transform 0.7s cubic-bezier(0.645, 0.045, 0.355, 1), background-color 0.3s cubic-bezier(0.215,0.61,0.355,1), box-shadow 0.40s ease, margin 0.3s cubic-bezier(0.215,0.61,0.355,1)!important;
					transition: transform 0.7s cubic-bezier(0.645, 0.045, 0.355, 1), background-color 0.3s cubic-bezier(0.215,0.61,0.355,1), box-shadow 0.40s ease, margin 0.3s cubic-bezier(0.215,0.61,0.355,1)!important;
				}

				@media only screen and (min-width: 1000px) { 
					body div.portfolio-items[data-gutter*="px"][data-col-num="elastic"] { 
						padding: 0!important; 
					}
				}

				body #header-outer[data-transparent-header="true"].transparent {  
					transition: none; 
					-webkit-transition: none; 
				}
				body[data-slide-out-widget-area-style="fullscreen-alt"] #header-outer { 
					transition:  background-color 0.3s cubic-bezier(0.215,0.61,0.355,1); 
					-webkit-transition:  background-color 0.3s cubic-bezier(0.215,0.61,0.355,1); 
				}
				
				@media only screen and (min-width: 1000px) { 
					body.ascend[data-slide-out-widget-area="false"] #header-outer[data-header-resize="0"][data-cart="true"]:not(.transparent) { 
						z-index: 100000; 
					}
				} ';

			} 
			
			else if( $body_border_color === '#ffffff' && $headerColorScheme === 'light' || $headerColorScheme === 'custom' && $body_border_color === $userSetBG) {
			
				echo '
				@media only screen and (min-width: 1000px) { 
					#header-outer.small-nav:not(.transparent), 
					#header-outer[data-header-resize="0"]:not([data-using-secondary="1"]).scrolled-down:not(.transparent), 
					#header-outer[data-header-resize="0"]:not([data-using-secondary="1"]).fixed-menu:not(.transparent), 
					#header-outer.detached, 
					body.ascend #search-outer.small-nav, 
					body[data-slide-out-widget-area-style="slide-out-from-right-hover"] #header-outer:not([data-using-secondary="1"]):not(.transparent), 
					body[data-slide-out-widget-area-style="fullscreen-alt"] #header-outer:not([data-using-secondary="1"]).scrolled-down, 
					body[data-slide-out-widget-area-style="fullscreen-alt"] #header-outer:not([data-using-secondary="1"]).transparent.side-widget-open { 
						margin-top: 0px; 
						z-index: 100000; 
					}
					
					body[data-hhun="1"] #header-outer.detached { 
						z-index: 100000!important; 
					}
					
					body.ascend[data-slide-out-widget-area="true"] #header-outer[data-full-width="true"] .cart-menu-wrap,
					body.ascend[data-slide-out-widget-area="false"] #header-outer[data-full-width="true"][data-cart="true"] .cart-menu-wrap { 
						transition: right 0.3s cubic-bezier(0.215, 0.61, 0.355, 1); 
						-webkit-transition: all 0.3s cubic-bezier(0.215, 0.61, 0.355, 1); 
					}
					
					
					#header-outer[data-full-width="true"][data-transparent-header="true"][data-header-resize="0"].scrolled-down:not(.transparent) .container,
					body[data-slide-out-widget-area-style="fullscreen-alt"] #header-outer[data-full-width="true"].scrolled-down .container,
					body[data-slide-out-widget-area-style="fullscreen-alt"] #header-outer[data-full-width="true"].transparent.side-widget-open .container { 
						padding-left: 0!important; 
						padding-right: 0!important; 
					}
					
					@media only screen and (min-width: 1000px) { 
						.material #header-outer[data-full-width="true"][data-transparent-header="true"][data-header-resize="0"].scrolled-down:not(.transparent) #search-outer .container {
							padding: 0 90px!important;
						}
					}
					
					body[data-header-search="false"][data-slide-out-widget-area="false"].ascend #header-outer[data-full-width="true"][data-cart="true"]:not(.transparent) header > .container { 
						padding-right: 28px!important; 
					}

					
				}

				@media only screen and (min-width: 1000px) { 
					body div.portfolio-items[data-gutter*="px"][data-col-num="elastic"] { padding: 0!important; }
				}
				
				#header-outer[data-full-width="true"][data-header-resize="0"].transparent { 
					transition: transform 0.7s cubic-bezier(0.645, 0.045, 0.355, 1),  background-color 0.3s cubic-bezier(0.215,0.61,0.355,1), margin 0.3s cubic-bezier(0.215,0.61,0.355,1)!important; 
					-webkit-transition: -webkit-transform 0.7s cubic-bezier(0.645, 0.045, 0.355, 1),  background-color 0.3s cubic-bezier(0.215,0.61,0.355,1), margin 0.3s cubic-bezier(0.215,0.61,0.355,1)!important; 
				}
				
				body #header-outer[data-transparent-header="true"][data-header-resize="0"] {
					 -webkit-transition: -webkit-transform 0.7s cubic-bezier(0.645, 0.045, 0.355, 1), background-color 0.3s cubic-bezier(0.215,0.61,0.355,1), box-shadow 0.40s ease, margin 0.3s cubic-bezier(0.215,0.61,0.355,1)!important; 
					 transition: transform 0.7s cubic-bezier(0.645, 0.045, 0.355, 1), background-color 0.3s cubic-bezier(0.215,0.61,0.355,1), box-shadow 0.40s ease, margin 0.3s cubic-bezier(0.215,0.61,0.355,1)!important; 
				 }
				 
				#header-outer[data-full-width="true"][data-header-resize="0"] header > .container { 
					transition: padding 0.35s cubic-bezier(0.215,0.61,0.355,1); 
					-webkit-transition: padding 0.35s cubic-bezier(0.215,0.61,0.355,1); 
				}
				';

				$trans_header = (!empty($nectar_options['transparent-header']) && $nectar_options['transparent-header'] == '1') ? $nectar_options['transparent-header'] : 'false';
				$bg_header 		= (!empty($post->ID) && $post->ID != 0) ? nectar_using_page_header($post->ID) : 0;
				$perm_trans 	= (!empty($nectar_options['header-permanent-transparent']) && $trans_header != 'false' && $bg_header == 'true') ? $nectar_options['header-permanent-transparent'] : 'false'; 

			} 
			
			else if ( $body_border_color !== '#ffffff' && $headerColorScheme == 'light' ||  $headerColorScheme === 'custom' && $body_border_color !== $userSetBG ) {
				echo '@media only screen and (min-width: 1000px) { 
					#header-space { 
						margin-top: '.esc_attr($body_border_size).'px; 
					} 
				}';
				echo 'html body.ascend[data-user-set-ocm="off"] #header-outer[data-full-width="true"] .cart-outer[data-user-set-ocm="off"] .cart-menu-wrap { 
					right: '.intval($body_border_size) .'px!important; 
				}
				html body.ascend[data-user-set-ocm="1"] #header-outer[data-full-width="true"] .cart-outer[data-user-set-ocm="1"] .cart-menu-wrap { 
					right: '.intval($body_border_size+77) .'px!important; 
				}';
				
			}

		} // Body border end.


		// Header transparent option.
		if( !empty($nectar_options['transparent-header']) && $nectar_options['transparent-header'] == '1' ) {
			
			if( $activate_transparency ) {
				
				// Old IE versions.
				echo '.no-rgba #header-space { display: none;  } ';
				
				$headerFormat = (!empty($nectar_options['header_format'])) ? $nectar_options['header_format'] : 'default';
				
				if( $headerFormat !== 'left-header' ) {
					echo '@media only screen and (max-width: 999px) { 
						body #header-space[data-header-mobile-fixed="1"] { 
							display: none; 
						} 
						#header-outer[data-mobile-fixed="false"] { 
							position: absolute; 
						}
					}';
					
					// Secondary header always visible.
					$using_secondary_nav        = ( ! empty( $nectar_options['header_layout'] ) && $headerFormat !== 'left-header' ) ? $nectar_options['header_layout'] : ' ';
					$header_secondary_m_display = ( ! empty( $nectar_options['secondary-header-mobile-display'] ) ) ? $nectar_options['secondary-header-mobile-display'] : 'default';
					$header_secondary_m_bool    = ( $using_secondary_nav === 'header_with_secondary' && $header_secondary_m_display === 'display_full' ) ? true : false;

					echo '@media only screen and (max-width: 999px) { 
						body:not(.nectar-no-flex-height) #header-space[data-secondary-header-display="full"]:not([data-header-mobile-fixed="false"]) {
							display: block!important;
							margin-bottom: -'. (intval($mobile_logo_height) + 26) .'px;
						}
						#header-space[data-secondary-header-display="full"][data-header-mobile-fixed="false"] {
							display: none;
						}';
						
						if( $header_secondary_m_bool ) {
							
							$page_full_screen_rows                = ( isset( $post->ID ) ) ? get_post_meta( $post->ID, '_nectar_full_screen_rows', true ) : '';
							$page_full_screen_rows_mobile_disable = ( isset( $post->ID ) ) ? get_post_meta( $post->ID, '_nectar_full_screen_rows_mobile_disable', true ) : '';
							if( $page_full_screen_rows === 'on' && $page_full_screen_rows_mobile_disable === 'on' && !is_search()) {
								echo 'body.using-mobile-browser #header-space:not([data-header-mobile-fixed="false"]) {
									display: block!important;
									margin-bottom: -'. (intval($mobile_logo_height) + 26) .'px;
								}';
								echo '#header-outer[data-mobile-fixed="false"], body.nectar_using_pfsr:not(.using-mobile-browser) #header-outer {';
							} else {
								echo '#header-outer[data-mobile-fixed="false"], body.nectar_using_pfsr #header-outer {';
							}
							echo 'top: 0!important;
								margin-bottom: -'. (intval($mobile_logo_height) + 26) .'px!important;
								position: relative!important;
							}';
							
						}
						
					echo '}';
					
				}
				
				echo '@media only screen and (min-width: 1000px) {
					
					 #header-space {
						 display: none; 
					 } 
					 .nectar-slider-wrap.first-section, 
					 .parallax_slider_outer.first-section, 
					 .full-width-content.first-section, 
					 .parallax_slider_outer.first-section .swiper-slide .content, 
					 .nectar-slider-wrap.first-section .swiper-slide .content, 
					 #page-header-bg, .nder-page-header, 
					 #page-header-wrap,
					 .full-width-section.first-section {
						 margin-top: 0!important;
					 }
					 
					 body #page-header-bg, body #page-header-wrap {
						height: '.esc_attr($header_space).'px;
					 }

					 body #search-outer { z-index: 100000; }
					 
					}';
			
			} //activate
			
			else if( !empty($nectar_options['header-bg-opacity']) ) {
				$header_space_bg_color = (!empty($nectar_options['overall-bg-color'])) ? $nectar_options['overall-bg-color'] : '#ffffff';
				echo '#header-space { background-color: '.esc_attr($header_space_bg_color).'}';
			}

		} //using transparent theme option
		
		$header_extra_space_to_remove = $extra_secondary_height;
 	 
 	  if( $header_format === 'centered-menu-under-logo' || $header_format === 'centered-menu-bottom-bar' ) {
 		  $header_extra_space_to_remove += 20;
 	  } else {
			$remove_border = ( ! empty( $nectar_options['header-remove-border'] ) && $nectar_options['header-remove-border'] === '1' || $theme_skin === 'material' ) ? 'true' : 'false';
			if( 'true' === $remove_border ) {
	 		  $header_extra_space_to_remove += intval($header_padding);
			}
 	  }
	 	

		// Desktop page header fullscreen calcs.
		if( (!empty($nectar_options['transparent-header']) && $nectar_options['transparent-header'] === '1' && $activate_transparency) || $header_format === 'left-header' ) {

		 $headerFormat = (!empty($nectar_options['header_format'])) ? $nectar_options['header_format'] : 'default';	
		 
		 echo '
		 @media only screen and (min-width: 1000px) {
			 
				#page-header-wrap.fullscreen-header,
				#page-header-wrap.fullscreen-header #page-header-bg,
				html:not(.nectar-box-roll-loaded) .nectar-box-roll > #page-header-bg.fullscreen-header,
				.nectar_fullscreen_zoom_recent_projects,
				#nectar_fullscreen_rows:not(.afterLoaded) > div {
					height: 100vh;
				}
				
				.wpb_row.vc_row-o-full-height.top-level, 
				.wpb_row.vc_row-o-full-height.top-level > .col.span_12 { 
					min-height: 100vh; 
				}';
				
				if( is_admin_bar_showing() ) {
					echo '.admin-bar #page-header-wrap.fullscreen-header,
					.admin-bar #page-header-wrap.fullscreen-header #page-header-bg,
					.admin-bar .nectar_fullscreen_zoom_recent_projects,
					.admin-bar #nectar_fullscreen_rows:not(.afterLoaded) > div {
						height: calc(100vh - 32px);
					}
					.admin-bar .wpb_row.vc_row-o-full-height.top-level, 
					.admin-bar .wpb_row.vc_row-o-full-height.top-level > .col.span_12 { 
						min-height: calc(100vh - 32px); 
					}';
				}
				
				if( $headerFormat !== 'left-header' ) {
					echo '#page-header-bg[data-alignment-v="middle"] .span_6 .inner-wrap,
					#page-header-bg[data-alignment-v="top"] .span_6 .inner-wrap {
						padding-top: '. (intval($header_space) - $header_extra_space_to_remove) .'px;
					}';
				}
				
				echo '.nectar-slider-wrap[data-fullscreen="true"]:not(.loaded), 
				.nectar-slider-wrap[data-fullscreen="true"]:not(.loaded) .swiper-container {
					height: calc(100vh + 2px)!important;
				}
				.admin-bar .nectar-slider-wrap[data-fullscreen="true"]:not(.loaded), 
				.admin-bar .nectar-slider-wrap[data-fullscreen="true"]:not(.loaded) .swiper-container {
					height: calc(100vh - 30px)!important;
				}

				
			}';
			
			// Mobile transparent header.
			if( (!empty($nectar_options['transparent-header']) && $nectar_options['transparent-header'] === '1' && $activate_transparency) ) {

				 $nectar_mobile_padding = ( $theme_skin === 'material' ) ? 10 : 25;
				 
				 // OCM background specific.
				 $full_width_header = (!empty($nectar_options['header-fullwidth']) && $nectar_options['header-fullwidth'] === '1') ? true : false;
				 $ocm_menu_btn_color_non_compatible = ( 'ascend' === $theme_skin && true === $full_width_header ) ? true : false;
				 
				 if( true !== $ocm_menu_btn_color_non_compatible &&
			   isset($nectar_options['header-slide-out-widget-area-menu-btn-bg-color']) && 
			   !empty( $nectar_options['header-slide-out-widget-area-menu-btn-bg-color'] ) ) {
			     $nectar_mobile_padding = ( $theme_skin === 'material' ) ? 30 : 45;
				 }
				 
				 echo '
				 @media only screen and (max-width: 999px) {
					 
					 #page-header-bg[data-alignment-v="middle"]:not(.fullscreen-header) .span_6 .inner-wrap,
					 #page-header-bg[data-alignment-v="top"] .span_6 .inner-wrap {
						 padding-top: '. (intval($mobile_logo_height) + $nectar_mobile_padding) .'px;
					 }
					 
					 .vc_row.top-level.full-width-section:not(.full-width-ns) > .span_12,
					 #page-header-bg[data-alignment-v="bottom"] .span_6 .inner-wrap {
						 padding-top: '. intval($mobile_logo_height) .'px;
					 }

				 }
				 
				 @media only screen and (max-width: 690px) {
					 .vc_row.top-level.full-width-section:not(.full-width-ns) > .span_12 {
						 padding-top: '. (intval($mobile_logo_height) + $nectar_mobile_padding) .'px;
					 }
					 .vc_row.top-level.full-width-content .nectar-recent-posts-single_featured .recent-post-container > .inner-wrap {
						 padding-top: '. intval($mobile_logo_height) .'px;
					 }
				 }';
				 
				 // When secondary header is visible.
				 if( $using_secondary === 'header_with_secondary' ) {
					 echo '
					 @media only screen and (max-width: 999px) and (min-width: 690px) {
						 
						 #page-header-bg[data-alignment-v="middle"]:not(.fullscreen-header) .span_6 .inner-wrap,
						 #page-header-bg[data-alignment-v="top"] .span_6 .inner-wrap,
						 .vc_row.top-level.full-width-section:not(.full-width-ns) > .span_12 {
							 padding-top: '. (intval($mobile_logo_height) + $nectar_mobile_padding + 40) .'px;
						 }

					 }';
				 }
					 
				 echo '
				 @media only screen and (max-width: 999px) {
					 .full-width-ns .nectar-slider-wrap .swiper-slide[data-y-pos="middle"] .content,
					 .full-width-ns .nectar-slider-wrap .swiper-slide[data-y-pos="top"] .content {
						 padding-top: 30px;
					 }
				 }';
				 
			 }
		 
			
		} 
		
		// Mobile page header fullscreen calcs.
		else {
			
			echo '@media only screen and (min-width: 1000px) {  
				body #ajax-content-wrap.no-scroll { 
					min-height:  calc(100vh - '. esc_attr($header_space) .'px);	
					height: calc(100vh - '. esc_attr($header_space) .'px)!important; 
				} 
			}';
			
			echo '@media only screen and (min-width: 1000px) { 
				#page-header-wrap.fullscreen-header,
				#page-header-wrap.fullscreen-header #page-header-bg,
				html:not(.nectar-box-roll-loaded) .nectar-box-roll > #page-header-bg.fullscreen-header,
				.nectar_fullscreen_zoom_recent_projects,
				#nectar_fullscreen_rows:not(.afterLoaded) > div {
					height: calc(100vh - '. (intval($header_space) - 1) .'px);
				} 
				
				.wpb_row.vc_row-o-full-height.top-level, .wpb_row.vc_row-o-full-height.top-level > .col.span_12 { 
					min-height: calc(100vh - '. (intval($header_space) - 1) .'px); 
				}
				
				html:not(.nectar-box-roll-loaded) .nectar-box-roll > #page-header-bg.fullscreen-header { 
					top: '.esc_attr($header_space).'px; 
				}';
				
				if( is_admin_bar_showing() ) {
					echo '.admin-bar #page-header-wrap.fullscreen-header,
					.admin-bar #page-header-wrap.fullscreen-header #page-header-bg,
					.admin-bar .nectar_fullscreen_zoom_recent_projects,
					.admin-bar #nectar_fullscreen_rows:not(.afterLoaded) > div {
						height: calc(100vh - '. (intval($header_space) - 1) .'px - 32px);
					}
					.admin-bar .wpb_row.vc_row-o-full-height.top-level, .admin-bar .wpb_row.vc_row-o-full-height.top-level > .col.span_12 { 
						min-height: calc(100vh - '. (intval($header_space) - 1) .'px - 32px); 
					}';
				}
				
				echo '.nectar-slider-wrap[data-fullscreen="true"]:not(.loaded), 
				.nectar-slider-wrap[data-fullscreen="true"]:not(.loaded) .swiper-container {
					height: calc(100vh - '. (intval($header_space) - 2) .'px)!important;
				} 
				
				.admin-bar .nectar-slider-wrap[data-fullscreen="true"]:not(.loaded), 
				.admin-bar .nectar-slider-wrap[data-fullscreen="true"]:not(.loaded) .swiper-container  {
					height: calc(100vh - '. (intval($header_space) - 2) .'px - 32px)!important;
				}
			}';

 		}
		
		
		
		// Page full screen rows.
		global $post;
		$page_full_screen_rows_bg_color  = (isset($post->ID)) ? get_post_meta($post->ID, '_nectar_full_screen_rows_overall_bg_color', true) : '#333333';
		$page_full_screen_rows_animation = (isset($post->ID)) ? get_post_meta($post->ID, '_nectar_full_screen_rows_animation', true) : '';
		
		echo '#nectar_fullscreen_rows { 
			background-color: '.esc_attr($page_full_screen_rows_bg_color).'; 
		}';
		
		if( 'parallax' === $page_full_screen_rows_animation ) {
			echo '#nectar_fullscreen_rows > .wpb_row .full-page-inner-wrap { 
				background-color: '.esc_attr($page_full_screen_rows_bg_color).'; 
			}';
		}
		

		global $woocommerce;
		// WooCommerce items.
		if( $woocommerce && !empty($nectar_options['product_archive_bg_color']) ) {
			echo '.post-type-archive-product.woocommerce .container-wrap, 
			.tax-product_cat.woocommerce .container-wrap { 
				background-color: '.esc_attr($nectar_options['product_archive_bg_color']).'; 
			} ';
		}

		if( $woocommerce && !empty($nectar_options['product_tab_position']) && $nectar_options['product_tab_position'] === 'fullwidth' ||
		   $woocommerce && !empty($nectar_options['product_tab_position']) && $nectar_options['product_tab_position'] === 'fullwidth_centered' ) { 
				 echo '.woocommerce.single-product #single-meta { 
					 position: relative!important; 
					 top: 0!important; 
					 margin: 0; 
					 left: 8px; 
					 height: auto; 
				 } 
				 
			 .woocommerce.single-product #single-meta:after { 
				 display: block; 
				 content: " "; 
				 clear: both; 
				 height: 1px;  
			 }';
		 }

		 if( $woocommerce && !empty($nectar_options['product_bg_color']) ) {
			 	echo '.woocommerce ul.products li.product.material, 
				.woocommerce-page ul.products li.product.material { 
					background-color: '.esc_attr($nectar_options['product_bg_color']).'; 
				}';
		 }
		 
		 if( $woocommerce && !empty($nectar_options['product_minimal_bg_color']) ) {
		 	echo '.woocommerce ul.products li.product.minimal .product-wrap, 
			.woocommerce ul.products li.product.minimal .background-color-expand,
			.woocommerce-page ul.products li.product.minimal .product-wrap, 
			.woocommerce-page ul.products li.product.minimal .background-color-expand { 
				background-color: '.esc_attr($nectar_options['product_minimal_bg_color']).'; 
			}';
			
		 }


		// Boxed theme option.
		if( !empty($nectar_options['boxed_layout']) && $nectar_options['boxed_layout'] === '1' )  {
			
			$attachment 			= ( !empty($nectar_options["background-attachment"]) ) ? $nectar_options["background-attachment"] : 'scroll';
			$position 				= ( !empty($nectar_options["background-position"]) ) ? $nectar_options["background-position"] : '0% 0%' ;
			$repeat 					= ( !empty($nectar_options["background-repeat"]) ) ? $nectar_options["background-repeat"] : 'repeat';
			$background_color = ( !empty($nectar_options["background-color"]) ) ? $nectar_options["background-color"] : '#ffffff';
			
			echo '
			 body {';
				if( ! empty($nectar_options["background_image"]['id']) || ! empty($nectar_options["background_image"]['url']) ) {
			 		echo 'background-image: url("'.nectar_options_img($nectar_options["background_image"]).'");';
				}
				echo 'background-position: '.esc_attr($position).';
				background-repeat: '.esc_attr($repeat).';
				background-color: '.esc_attr($background_color).'!important;
				background-attachment: '.esc_attr($attachment).';';
				if( !empty($nectar_options["background-cover"]) && $nectar_options["background-cover"] === '1' ) {
					echo 'background-size: cover;
					-webkit-background-size: cover;';
				}
				
			 echo '} 
			';
		}

		// Blog next post coloring
		if( is_singular('post') ) {

			$next_post = get_previous_post();
			if (!empty($next_post) ) {
				
				$blog_next_bg_color   = get_post_meta($next_post->ID, '_nectar_header_bg_color', true);
				$blog_next_font_color = get_post_meta($next_post->ID, '_nectar_header_font_color', true);
				
				if(!empty($blog_next_font_color)){
					echo '.blog_next_prev_buttons .col h3, .full-width-content.blog_next_prev_buttons > .col.span_12.dark h3, .blog_next_prev_buttons span {  
						color: '.esc_attr($blog_next_font_color).';
					}';
				}
				if(!empty($blog_next_bg_color)){
					echo '.blog_next_prev_buttons {  
						background-color: '.esc_attr($blog_next_bg_color).';
					}';
				}
			}
		}
		
		
		// Page builder element styles.
		$portfolio_content = ( $post && isset($post->ID) ) ? get_post_meta( $post->ID, '_nectar_portfolio_extra_content', true ) : false;
		
		// Portfolio.
		if( is_singular( 'portfolio' ) && $portfolio_content ) {
			
			echo NectarElDynamicStyles::generate_styles($portfolio_content);
			
		} 
		// Everything else.
		else if( $post && isset($post->post_content) && !is_archive() && !is_home() ) {
			
		  echo NectarElDynamicStyles::generate_styles($post->post_content);
			
		}
		
		
		
		
		
		$dynamic_css = ob_get_contents();
		ob_end_clean();

		return nectar_quick_minify($dynamic_css);	

	}
}



/**
* Determines the unit type classname px or percent
*
* @since 11.1
*/
if( !function_exists('nectar_el_custom_color_bool') ) {
	
	function nectar_el_custom_color_bool($param, $atts) {
		
		if(isset($atts[$param.'_type']) && 
			!empty($atts[$param.'_type']) && 
			'custom' === $atts[$param.'_type'] &&
			isset($atts[$param.'_custom']) && 
			!empty($atts[$param.'_custom']) ) {
			return true;
		}
		return false;
		
	}
	
}


/**
* Determines the unit type classname px or percent
*
* @since 11.1
*/
if( !function_exists('nectar_el_padding_unit_type_class') ) {
	
	function nectar_el_percent_unit_type_class($str) {
		
		if( false !== strpos($str,'%') ) {
			return str_replace('%','pct', $str);
		} else if( false !== strpos($str,'vw') ) {
			return intval($str) . 'vw';
		} else if( false !== strpos($str,'vh') ) {
			return intval($str) . 'vh';
		} else if( 'auto' === $str ) {
			return 'auto';
		}
		
		return intval($str) . 'px';
	}
	
 }

/**
 * Generate dynamic classnames for dynamic page builder element styles.
 *
 * @since 11.1
 */
 if( !function_exists('nectar_el_dynamic_classnames') ) {
	 
	 function nectar_el_dynamic_classnames( $el, $atts ) {
		 
		 $classnames = '';

		 if( 'row' === $el || 'inner_row' === $el ) {
			 
			 $row_params = array('top_padding','bottom_padding','translate_x','translate_y','right_padding','left_padding');
			 
			 // inner specifc.
			 if( 'inner_row' === $el ) { 
				 if( isset($atts['min_width_desktop']) && strlen($atts['min_width_desktop']) > 0 ) {
				   $classnames .= 'min_width_desktop_'. nectar_el_percent_unit_type_class(esc_attr($atts['min_width_desktop'])) . ' ';
			   }
				 $row_params[] = 'min_width';
		   }
			 
			 // desktop specific.
			if( isset($atts['right_padding_desktop']) && strlen($atts['right_padding_desktop']) > 0 ) {
				$classnames .= 'right_padding_'. nectar_el_percent_unit_type_class(esc_attr($atts['right_padding_desktop'])) . ' ';
			}
			if( isset($atts['left_padding_desktop']) && strlen($atts['left_padding_desktop']) > 0 ) {
				$classnames .= 'left_padding_'. nectar_el_percent_unit_type_class(esc_attr($atts['left_padding_desktop'])) . ' ';
			}
			
			// column dir.
			if( isset($atts['column_direction']) && 'reverse' === $atts['column_direction'] ) {
				$classnames .= 'reverse_columns_desktop ';
			}
			if( isset($atts['column_direction_tablet']) && 'row_reverse' === $atts['column_direction_tablet'] ) {
				$classnames .= 'reverse_columns_row_tablet ';
			} else if( isset($atts['column_direction_tablet']) && 'column_reverse' === $atts['column_direction_tablet'] ) {
				$classnames .= 'reverse_columns_column_tablet ';
			}
			
			if( isset($atts['column_direction_phone']) && 'row_reverse' === $atts['column_direction_phone'] ) {
				$classnames .= 'reverse_columns_row_phone ';
			} else if( isset($atts['column_direction_phone']) && 'column_reverse' === $atts['column_direction_phone'] ) {
				$classnames .= 'reverse_columns_column_phone ';
			}
			
			 // loop.
			 foreach( $row_params as $param ) {
 
				 if( isset($atts[$param.'_tablet']) && strlen($atts[$param.'_tablet']) > 0 ) {
					 $classnames .= $param.'_tablet_'. nectar_el_percent_unit_type_class(esc_attr($atts[$param.'_tablet'])) . ' ';
				 }
				 if( isset($atts[$param.'_phone']) && strlen($atts[$param.'_phone']) > 0 ) {
					 $classnames .= $param.'_phone_'. nectar_el_percent_unit_type_class(esc_attr($atts[$param.'_phone'])) . ' ';
				 }
				 
			 }
			 
			 
		 } else if ( 'column' === $el || 'inner_column' === $el ) {
			 
			 $column_params = array('top_margin','bottom_margin','right_margin','left_margin','column_padding');
			 
			 // parent specifc.
			 if( 'column' === $el ) { 
				 if( isset($atts['max_width_desktop']) && strlen($atts['max_width_desktop']) > 0 ) {
				   $classnames .= 'max_width_desktop_'. nectar_el_percent_unit_type_class(esc_attr($atts['max_width_desktop'])) . ' ';
			   }
				 $column_params[] = 'max_width';
		   }
			 
			 // desktop specific.
			 if( isset($atts['right_margin']) && strlen($atts['right_margin']) > 0 ) {
				 $classnames .= 'right_margin_'. nectar_el_percent_unit_type_class(esc_attr($atts['right_margin'])) . ' ';
			 }
			 if( isset($atts['left_margin']) && strlen($atts['left_margin']) > 0 ) {
				 $classnames .= 'left_margin_'. nectar_el_percent_unit_type_class(esc_attr($atts['left_margin'])) . ' ';
			 }
			 
			 // loop.
			 foreach( $column_params as $param ) {
				 
				 if( isset($atts[$param.'_tablet']) && strlen($atts[$param.'_tablet']) > 0 ) {
					 
					 if('column_padding' === $param) {
						 $classnames .= esc_attr($atts[$param.'_tablet']) . '_tablet ';
					 } else {
						 $classnames .= $param.'_tablet_'. nectar_el_percent_unit_type_class(esc_attr($atts[$param.'_tablet'])) . ' ';
					 }
					 
				 }
				 if( isset($atts[$param.'_phone']) && strlen($atts[$param.'_phone']) > 0 ) {
					 
					 if('column_padding' === $param) {
						$classnames .= esc_attr($atts[$param.'_phone']) . '_phone ';
					 } else {
						 $classnames .= $param.'_phone_'. nectar_el_percent_unit_type_class(esc_attr($atts[$param.'_phone'])) . ' ';
					 }
					 
				 }
				 
			 }
			 
		 }
		 
		 else if( 'nectar_icon' === $el ) {
			 
			 // Custom color.
			 if( isset($atts['icon_color_custom']) && true === nectar_el_custom_color_bool('icon_color', $atts) ) {
				 $color = ltrim($atts['icon_color_custom'],'#');
				 $classnames .= 'icon_color_custom_'. esc_attr($color) . ' ';
			 }
			 
		 }
		 
		 else if( 'nectar_cta' === $el ) {
			 
			 // Custom color.
			 if( isset($atts['button_color_hover']) && !empty($atts['button_color_hover']) ) {
				 $color = ltrim($atts['button_color_hover'],'#');
				 $classnames .= 'hover_color_'. esc_attr($color) . ' ';
			 }
			 
		 }
		 
		 else if( 'nectar_highlighted_text' === $el || 'nectar_scrolling_text' === $el ) {
			 
			 // Custom size.
			 if( isset($atts['custom_font_size']) ) {
				 $classnames .= 'font_size_'. esc_attr($atts['custom_font_size']) . ' ';
			 }
			 if( isset($atts['custom_font_size_mobile']) ) {
				 $classnames .= 'font_size_mobile_'. esc_attr($atts['custom_font_size_mobile']) . ' ';
			 }
		 }
		 
		 else if( 'divider' === $el ) {
			 
			 // Custom height.
			 if( isset($atts['custom_height_tablet']) && strlen($atts['custom_height_tablet']) > 0 ) {
				 $classnames .= 'height_tablet_'. nectar_el_percent_unit_type_class(esc_attr($atts['custom_height_tablet'])) . ' ';
			 }
			 if( isset($atts['custom_height_phone']) && strlen($atts['custom_height_phone']) > 0 ) {
				 $classnames .= 'height_phone_'. nectar_el_percent_unit_type_class(esc_attr($atts['custom_height_phone'])) . ' ';
			 }
			 
		 }
		 
		 else if( 'nectar_post_grid' === $el ) {
			 // Custom font size.
			 if( isset($atts['custom_font_size']) ) {
				 $classnames .= 'font_size_'. esc_attr($atts['custom_font_size']) . ' ';
			 }
			 // Hover color.
			 if( isset($atts['card_bg_color_hover']) ) {
				 $color = ltrim($atts['card_bg_color_hover'],'#');
				 $classnames .= 'card_hover_color_'. esc_attr($color) . ' ';
			 }
			 
		 } 
		 
		 else if( 'nectar_fancy_box' === $el ) {
			 
			 // Min height.
			 if( isset($atts['min_height_tablet']) && strlen($atts['min_height_tablet']) > 0 ) {
				 $classnames .= 'min_height_tablet_'. nectar_el_percent_unit_type_class(esc_attr($atts['min_height_tablet'])) . ' ';
			 }
			 if( isset($atts['min_height_phone']) && strlen($atts['min_height_phone']) > 0 ) {
				 $classnames .= 'min_height_phone_'. nectar_el_percent_unit_type_class(esc_attr($atts['min_height_phone'])) . ' ';
			 }
			 
			 // Parallax hover.
			 if( isset($atts['parallax_hover_box_overlay']) && !empty($atts['parallax_hover_box_overlay']) ) {
				 
				 $color = ltrim($atts['parallax_hover_box_overlay'],'#');
				 
				 $classnames .= 'overlay_'. esc_attr($color) . ' ';
			 }
			 // Hover description.
			 if( isset($atts['hover_color_custom']) && !empty($atts['hover_color_custom']) ) {
				 
				 $color = ltrim($atts['hover_color_custom'],'#');
				 
				 $classnames .= 'hover_color_'. esc_attr($color) . ' ';
			 }
			 
			 // Hover description.
			 if( isset($atts['color_custom']) && !empty($atts['color_custom']) ) {
				 
				 $color = ltrim($atts['color_custom'],'#');
				 
				 $classnames .= 'box_color_'. esc_attr($color) . ' ';
			 }
			 
		 } 
		 
		 else if ( 'image_with_animation' === $el ) {
			 
			 $image_params = array('margin_top','margin_right','margin_bottom','margin_left');
			 
			 foreach( $image_params as $param ) {
 
				 if( isset($atts[$param.'_tablet']) && strlen($atts[$param.'_tablet']) > 0 ) {
					 $classnames .= $param.'_tablet_'. nectar_el_percent_unit_type_class(esc_attr($atts[$param.'_tablet'])) . ' ';
				 }
				 if( isset($atts[$param.'_phone']) && strlen($atts[$param.'_phone']) > 0 ) {
					 $classnames .= $param.'_phone_'. nectar_el_percent_unit_type_class(esc_attr($atts[$param.'_phone'])) . ' ';
				 }
				 
			 }
			 
		 }
		 
		 if( !empty($classnames) ) {
			 return ' ' . $classnames;
		 }
		 return $classnames;
		 
	 }
	 
 }
 
 


/**
 * Adds Lovelo to font list
 * @since 4.0
 */
if( !function_exists('nectar_lovelo_font') ) {
	
	function nectar_lovelo_font() {
		/* A font fabric font - http://fontfabric.com/lovelo-font/ */
		$nectar_custom_font = "@font-face { font-family: 'Lovelo'; src: url('".get_template_directory_uri()."/css/fonts/Lovelo_Black.eot'); src: url('".get_template_directory_uri()."/css/fonts/Lovelo_Black.eot?#iefix') format('embedded-opentype'), url('".get_template_directory_uri()."/css/fonts/Lovelo_Black.woff') format('woff'),  url('".get_template_directory_uri()."/css/fonts/Lovelo_Black.ttf') format('truetype'), url('".get_template_directory_uri()."/css/fonts/Lovelo_Black.svg#loveloblack') format('svg'); font-weight: normal; font-style: normal; }";
		
		wp_add_inline_style( 'main-styles', $nectar_custom_font );
	}
	
}

$font_fields = array(
	'navigation_font_family',
	'navigation_dropdown_font_family',
	'page_heading_font_family',
	'page_heading_subtitle_font_family',
	'off_canvas_nav_font_family',
	'off_canvas_nav_subtext_font_family',
	'body_font_family',
	'h1_font_family',
	'h2_font_family',
	'h3_font_family',
	'h4_font_family',
	'h5_font_family',
	'h6_font_family',
	'i_font_family',
	'label_font_family',
	'nectar_slider_heading_font_family',
	'home_slider_caption_font_family',
	'testimonial_font_family',
	'sidebar_footer_h_font_family',
	'team_member_h_font_family',
	'nectar_dropcap_font_family');

foreach( $font_fields as $k => $v ) {
	
	if( isset($nectar_options[$v]['font-family']) && $nectar_options[$v]['font-family'] == 'Lovelo, sans-serif' ) { 
		add_action( 'wp_enqueue_scripts', 'nectar_lovelo_font' );
		break;
	}
	
}