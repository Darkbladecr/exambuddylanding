<?php
/**
 * Enqueue styles
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
 * Register/Enqueue frontend CSS.
 *
 * @since 1.0
 */
function nectar_main_styles() {

		 global $nectar_get_template_directory_uri;
		 
		 $nectar_using_VC_front_end_editor = (isset($_GET['vc_editable'])) ? sanitize_text_field($_GET['vc_editable']) : '';
		 $nectar_using_VC_front_end_editor = ($nectar_using_VC_front_end_editor == 'true') ? true : false;
		
		 $nectar_theme_version = nectar_get_theme_version();

		 // Register.
		 wp_register_style( 'font-awesome', $nectar_get_template_directory_uri . '/css/font-awesome.min.css', '', '4.6.4' );
		 wp_register_style( 'main-styles', $nectar_get_template_directory_uri . '/css/style.css', '', $nectar_theme_version );
		 wp_register_style( 'salient-grid-system-legacy', $nectar_get_template_directory_uri . '/css/grid-system-legacy.css', '', $nectar_theme_version );
		 wp_register_style( 'salient-grid-system', $nectar_get_template_directory_uri . '/css/grid-system.css', '', $nectar_theme_version );
		 wp_register_style( 'woocommerce', $nectar_get_template_directory_uri . '/css/woocommerce.css', '', $nectar_theme_version );
		 wp_register_style( 'iconsmind', $nectar_get_template_directory_uri . '/css/iconsmind.css', '', '7.6' );
		 wp_register_style( 'linea', $nectar_get_template_directory_uri . '/css/fonts/svg/font/arrows_styles.css' );
		 wp_register_style( 'fullpage', $nectar_get_template_directory_uri . '/css/plugins/fullpage.css', '', $nectar_theme_version );
		 wp_register_style( 'nectar-header-layout-left', $nectar_get_template_directory_uri . '/css/header/header-layout-left.css', '', $nectar_theme_version );
		 wp_register_style( 'nectar-header-layout-centered-bottom-bar', $nectar_get_template_directory_uri . '/css/header/header-layout-centered-bottom-bar.css', '', $nectar_theme_version );
		 wp_register_style( 'nectar-header-secondary-nav', $nectar_get_template_directory_uri . '/css/header/header-secondary-nav.css', '', $nectar_theme_version );
		 wp_register_style( 'nectar-header-perma-transparent', $nectar_get_template_directory_uri . '/css/header/header-perma-transparent.css', '', $nectar_theme_version );
		 wp_register_style( 'nectar-boxed', $nectar_get_template_directory_uri . '/css/plugins/boxed.css', '', $nectar_theme_version );
		 wp_register_style( 'nectar-single-styles', $nectar_get_template_directory_uri . '/css/single.css', '', $nectar_theme_version );
		 wp_register_style( 'nectar-image-with-hotspots', $nectar_get_template_directory_uri . '/css/elements/element-image-with-hotspots.css', '', $nectar_theme_version );
		 wp_register_style( 'nectar-widget-posts', $nectar_get_template_directory_uri . '/css/elements/widget-nectar-posts.css', '', $nectar_theme_version );
		 
		 wp_register_style( 'nectar-element-recent-posts', $nectar_get_template_directory_uri . '/css/elements/element-recent-posts.css', '', $nectar_theme_version );
		 wp_register_style( 'nectar-element-testimonial', $nectar_get_template_directory_uri . '/css/elements/element-testimonial.css', '', $nectar_theme_version );
		 wp_register_style( 'nectar-element-flip-box', $nectar_get_template_directory_uri . '/css/elements/element-flip-box.css', '', $nectar_theme_version );
		 wp_register_style( 'nectar-element-fancy-box', $nectar_get_template_directory_uri . '/css/elements/element-fancy-box.css', '', $nectar_theme_version );
		 wp_register_style( 'nectar-element-post-grid', $nectar_get_template_directory_uri . '/css/elements/element-post-grid.css', '', $nectar_theme_version );
		 wp_register_style( 'nectar-element-category-grid', $nectar_get_template_directory_uri . '/css/elements/element-category-grid.css', '', $nectar_theme_version );
		 wp_register_style( 'nectar-element-icon-list', $nectar_get_template_directory_uri . '/css/elements/element-icon-list.css', '', $nectar_theme_version );
		 wp_register_style( 'nectar-element-tabbed-section', $nectar_get_template_directory_uri . '/css/elements/element-tabbed-section.css', '', $nectar_theme_version );
		 wp_register_style( 'nectar-element-team-member', $nectar_get_template_directory_uri . '/css/elements/element-team-member.css', '', $nectar_theme_version );
		 wp_register_style( 'nectar-element-pricing-table', $nectar_get_template_directory_uri . '/css/elements/element-pricing-table.css', '', $nectar_theme_version );
		 wp_register_style( 'nectar-element-wpb-column-border-legacy', $nectar_get_template_directory_uri . '/css/elements/element-wpb-column-border-legacy.css', '', $nectar_theme_version );
		 wp_register_style( 'nectar-element-wpb-column-border', $nectar_get_template_directory_uri . '/css/elements/element-wpb-column-border.css', '', $nectar_theme_version );
		 
		 wp_register_style( 'nectar-ocm-slide-out-right-hover', $nectar_get_template_directory_uri . '/css/off-canvas/slide-out-right-hover.css', '', $nectar_theme_version );
		 wp_register_style( 'nectar-ocm-fullscreen', $nectar_get_template_directory_uri . '/css/off-canvas/fullscreen.css', '', $nectar_theme_version );
		 wp_register_style( 'nectar-ocm-simple', $nectar_get_template_directory_uri . '/css/off-canvas/simple-dropdown.css', '', $nectar_theme_version );
		 
		 wp_register_style( 'twentytwenty', $nectar_get_template_directory_uri . '/css/plugins/twentytwenty.css' );		
		 wp_register_style( 'magnific', $nectar_get_template_directory_uri . '/css/plugins/magnific.css', '', '8.6.0' );
		 wp_register_style( 'fancyBox', $nectar_get_template_directory_uri . '/css/plugins/jquery.fancybox.css', '', '3.3.1' );
		 wp_register_style( 'box-roll', $nectar_get_template_directory_uri . '/css/plugins/box-roll.css', '', $nectar_theme_version);
		 wp_register_style( 'leaflet', $nectar_get_template_directory_uri . '/css/plugins/leaflet.css', '1.3.1' );
		 wp_register_style( 'nectar-flickity', $nectar_get_template_directory_uri . '/css/plugins/flickity.css', '', $nectar_theme_version );
		 wp_register_style( 'responsive', $nectar_get_template_directory_uri . '/css/responsive.css', '', $nectar_theme_version );
		 wp_register_style( 'select2', $nectar_get_template_directory_uri . '/css/plugins/select2.css', '', '6.2' );
		 wp_register_style( 'non-responsive', $nectar_get_template_directory_uri . '/css/non-responsive.css' );
		 wp_register_style( 'skin-original', $nectar_get_template_directory_uri . '/css/skin-original.css', '', $nectar_theme_version );
		 wp_register_style( 'skin-ascend', $nectar_get_template_directory_uri . '/css/ascend.css', '', $nectar_theme_version );
		 wp_register_style( 'skin-material', $nectar_get_template_directory_uri . '/css/skin-material.css', '', $nectar_theme_version );
		 

		 global $nectar_options;
		 global $post;
		 
		 if ( ! is_object( $post ) ) {
 			$post = (object) array(
 				'post_content' => ' ',
 				'ID'           => ' ',
 			);
 		}
 
		$lightbox_script = ( ! empty( $nectar_options['lightbox_script'] ) ) ? $nectar_options['lightbox_script'] : 'magnific';
		if ( $lightbox_script === 'pretty_photo' ) {
			$lightbox_script = 'magnific'; 
		}
	 
		// Boxed style.
	 	$nectar_using_boxed = ( ! empty( $nectar_options['boxed_layout'] ) ) ? $nectar_options['boxed_layout'] : 'off';
	 	if( $nectar_using_boxed === '1') {
	 		wp_enqueue_style( 'nectar-boxed' );
	 	}
			
	 wp_enqueue_style( 'font-awesome' );
	 
	 // Grid system.
	 if( function_exists('nectar_use_flexbox_grid') && true === nectar_use_flexbox_grid() ) {
		 /* Salient provides a modern flexbox grid system as of v10.6 as long
		 as the Salient core and Salient page builder plugins are up to date. */
		 $nectar_modern_grid_compat = true;
	 } else {
		 $nectar_modern_grid_compat = false;
	 }
	  
	 if( true === $nectar_modern_grid_compat ) {
		 wp_enqueue_style( 'salient-grid-system' );
	 } else {
		 wp_enqueue_style( 'salient-grid-system-legacy' );
	 }
	 
	 // Main Salient styles.
	 wp_enqueue_style( 'main-styles' );
	 
	 // Header layouts.
	 $header_format = ( ! empty( $nectar_options['header_format'] ) ) ? $nectar_options['header_format'] : 'default';
	 if( $header_format === 'left-header' ) {
		 wp_enqueue_style( 'nectar-header-layout-left' );
	 } else if( $header_format === 'centered-menu-bottom-bar' ) {
		 wp_enqueue_style( 'nectar-header-layout-centered-bottom-bar' );
	 }
	
	// Secondary navigation bar.
	$header_secondary_format = ( ! empty( $nectar_options['header_layout'] ) ) ? $nectar_options['header_layout'] : 'standard';
  if( $header_secondary_format === 'header_with_secondary') {
	  wp_enqueue_style( 'nectar-header-secondary-nav' );
  }
	 
	 // Permanent transparent navigation option.
	 $header_trans = ( ! empty( $nectar_options['transparent-header'] ) ) ? $nectar_options['transparent-header'] : '0'; 
	 $header_perma_trans = ( ! empty( $nectar_options['header-permanent-transparent'] ) ) ? $nectar_options['header-permanent-transparent'] : '0'; 
	 
	 if( $header_trans === '1' && $header_perma_trans === '1' ) {
		 wp_enqueue_style( 'nectar-header-perma-transparent' );
	 }
	 
	 // Off canvas menu.
	 $header_off_canvas_style = ( ! empty( $nectar_options['header-slide-out-widget-area-style'] ) ) ? $nectar_options['header-slide-out-widget-area-style'] : 'slide-out-from-right';
	 
	 if( $header_off_canvas_style === 'slide-out-from-right-hover' ) {
		 	wp_enqueue_style( 'nectar-ocm-slide-out-right-hover' );
	 } else if( $header_off_canvas_style === 'fullscreen' || $header_off_canvas_style === 'fullscreen-alt' ) {
	 		wp_enqueue_style( 'nectar-ocm-fullscreen' );
	 } else if( $header_off_canvas_style === 'simple' ) {
		 wp_enqueue_style( 'nectar-ocm-simple' );
	 }
	 
	 // Single posts.
	 if( is_single() ) {
		 wp_enqueue_style( 'nectar-single-styles' );
	 }
	 
	 // Testimonials.
	 if ( NectarElAssets::locate(array('[testimonial_slider','[nectar_single_testimonial')) ) {
		 wp_enqueue_style( 'nectar-element-testimonial' );
	 }
	 	 
	 // Image with hotspots.
	 if ( NectarElAssets::locate(array('[nectar_image_with_hotspots')) ) {
		 wp_enqueue_style( 'nectar-image-with-hotspots' );
	 }
	 
	 // Fancy box.
	 if ( NectarElAssets::locate(array('[fancy_box')) ) {
		 wp_enqueue_style( 'nectar-element-fancy-box' );
	 }
	 
	 // Flip box.
	 if ( NectarElAssets::locate(array('[nectar_flip_box')) ) {
		 wp_enqueue_style( 'nectar-element-flip-box' );
	 }
	 
	 // Post grid.
	 if ( NectarElAssets::locate(array('[nectar_post_grid')) ) {
		 wp_enqueue_style( 'nectar-element-post-grid' );
	 }
	 
	 // Category grid.
	 if ( NectarElAssets::locate(array('[nectar_category_grid')) ) {
		 wp_enqueue_style( 'nectar-element-category-grid' );
	 }
	 
	 // Icon list.
	 if ( NectarElAssets::locate(array('[nectar_icon_list')) ) {
		 wp_enqueue_style( 'nectar-element-icon-list' );
	 }
	 
	 // Tabbed section.
	 if ( NectarElAssets::locate(array('[tabbed_section')) ) {
		 wp_enqueue_style( 'nectar-element-tabbed-section' );
	 }
	 
	 // Team member.
	 if ( NectarElAssets::locate(array('[team_member')) ) {
		 wp_enqueue_style( 'nectar-element-team-member' );
	 }
	 
	 // Pricing table.
	 if ( NectarElAssets::locate(array('[pricing_table')) ) {
		 wp_enqueue_style( 'nectar-element-pricing-table' );
	 }
	 
	 // Column border.
	 if ( NectarElAssets::locate(array('column_border_color="#','column_border_color="rgb')) ) {
		 
		 if( true === $nectar_modern_grid_compat ) {
			 wp_enqueue_style( 'nectar-element-wpb-column-border' );
		 } else {
			 wp_enqueue_style( 'nectar-element-wpb-column-border-legacy' );
		 }
		 
	 }
	 
	 // Recent posts.
	 if ( NectarElAssets::locate(array('[recent_posts')) || 
		 is_page_template( 'template-home-2.php' ) || 
		 is_page_template( 'template-home-3.php' ) ) {
		 wp_enqueue_style( 'nectar-element-recent-posts' );
	 }
	 
	 // Single post using related posts.
	 $nectar_using_related_posts = ( ! empty( $nectar_options['blog_related_posts'] ) ) ? $nectar_options['blog_related_posts'] : 'off';
	 if( is_single() && $nectar_using_related_posts === '1') {
		 wp_enqueue_style( 'nectar-element-recent-posts' );
	 }
	 
	// Lightbox.
	if ( $lightbox_script === 'magnific' ) {
		wp_enqueue_style( 'magnific' );
	} elseif ( $lightbox_script === 'fancybox' ) {
		wp_enqueue_style( 'fancyBox' );
	}

	

	// Default Salient font (Open Sans).
	$nectar_default_font = ( ! empty( $nectar_options['default-theme-font'] ) ) ? $nectar_options['default-theme-font'] : 'from_google';
	
	if( 'from_google' === $nectar_default_font ) {
		// Load from Google.
		wp_enqueue_style( 'nectar_default_font_open_sans', 'https://fonts.googleapis.com/css?family=Open+Sans%3A300%2C400%2C600%2C700&subset=latin%2Clatin-ext', false, null, 'all' );
	} else if( 'from_theme' === $nectar_default_font ) {
		// Load locally.
		$nectar_default_font_css = "
		@font-face{
		     font-family:'Open Sans';
		     src:url('". get_template_directory_uri() ."/css/fonts/OpenSans-Light.woff') format('woff');
		     font-weight:300;
		     font-style:normal
		}
		 @font-face{
		     font-family:'Open Sans';
		     src:url('". get_template_directory_uri() ."/css/fonts/OpenSans-Regular.woff') format('woff');
		     font-weight:400;
		     font-style:normal
		}
		 @font-face{
		     font-family:'Open Sans';
		     src:url('". get_template_directory_uri() ."/css/fonts/OpenSans-SemiBold.woff') format('woff');
		     font-weight:600;
		     font-style:normal
		}
		 @font-face{
		     font-family:'Open Sans';
		     src:url('". get_template_directory_uri() ."/css/fonts/OpenSans-Bold.woff') format('woff');
		     font-weight:700;
		     font-style:normal
		}";
		
		wp_add_inline_style( 'main-styles', $nectar_default_font_css );
	}


	// Front end editor needs all.
	if ( $nectar_using_VC_front_end_editor || NectarElAssets::locate(array('[templatera')) ) {
		wp_enqueue_style( 'wp-mediaelement' );
		wp_enqueue_style( 'iconsmind' );
		wp_enqueue_style( 'fullpage' );
		wp_enqueue_style( 'nectar-slider' );
		wp_enqueue_style( 'nectar-portfolio' );
		wp_enqueue_style( 'nectar-flickity' );
		wp_enqueue_style( 'twentytwenty' );  
		wp_enqueue_style( 'linea' ); 
		wp_enqueue_style( 'leaflet' ); 
		wp_enqueue_style( 'nectar-element-recent-posts' ); 
		wp_enqueue_style( 'nectar-header-layout-left' );
	  wp_enqueue_style( 'nectar-single-styles' );
    wp_enqueue_style( 'nectar-element-testimonial' );
		wp_enqueue_style( 'nectar-image-with-hotspots' );
		wp_enqueue_style( 'nectar-element-fancy-box' );
		wp_enqueue_style( 'nectar-element-flip-box' );
		wp_enqueue_style( 'nectar-element-category-grid' );
		wp_enqueue_style( 'nectar-element-post-grid' );
		wp_enqueue_style( 'nectar-element-icon-list' );
		wp_enqueue_style( 'nectar-element-tabbed-section' );
		wp_enqueue_style( 'nectar-element-team-member' );
		wp_enqueue_style( 'nectar-element-pricing-table' );
    wp_enqueue_style( 'nectar-element-wpb-column-border' );
	}
	

}

add_action( 'wp_enqueue_scripts', 'nectar_main_styles' );



/**
 * Page specific frontend CSS.
 *
 * @since 1.0
 */
function nectar_page_sepcific_styles() {
	
	global $post;
	global $nectar_options;

	if ( ! is_object( $post ) ) {
		$post = (object) array(
			'post_content' => ' ',
			'ID'           => ' ',
		);
	}

	// Home templates.
	if ( is_page_template( 'template-home-1.php' ) || 
	is_page_template( 'template-home-2.php' ) || 
	is_page_template( 'template-home-3.php' ) || 
	is_page_template( 'template-home-4.php' ) ) {
		wp_enqueue_style( 'orbit' );
	}
	
	// Full page option.
	$page_full_screen_rows = ( isset( $post->ID ) ) ? get_post_meta( $post->ID, '_nectar_full_screen_rows', true ) : '';
	if ( $page_full_screen_rows === 'on' ) {
		wp_enqueue_style( 'fullpage' );
	}

	// Nectar slider.
	if ( NectarElAssets::locate(array('[nectar_slider','type="nectarslider_style"')) ) {
		wp_enqueue_style( 'nectar-slider' );
	}

	// Portfolio.
	if ( NectarElAssets::locate(array('nectar_portfolio','recent_projects', 'type="image_grid"')) ||
	   is_page_template( 'template-portfolio.php' ) || 
		 is_post_type_archive( 'portfolio' ) || 
		 is_singular( 'portfolio' ) || 
		 is_tax( 'project-attributes' ) || 
		 is_tax( 'project-type' ) ) {
			 wp_enqueue_style( 'nectar-portfolio' );
	}

	// Blog std style containing image gallery grid - non archive.
	if ( NectarElAssets::locate(array('[nectar_blog')) && NectarElAssets::locate(array('layout="std-blog-')) && NectarElAssets::locate(array('blog_standard_style="classic')) ||
		NectarElAssets::locate(array('[nectar_blog')) && NectarElAssets::locate(array('layout="std-blog-')) && NectarElAssets::locate(array('blog_standard_style="minimal')) ) {
		wp_enqueue_style( 'nectar-portfolio' );
	}
	
	// Blog styles - page builder element.
	$nectar_using_related_posts = ( ! empty( $nectar_options['blog_related_posts'] ) ) ? $nectar_options['blog_related_posts'] : 'off';

	$posttype                     = get_post_type( $post );
	$nectar_on_blog_archive_check = ( is_archive() || is_author() || is_category() || is_home() || is_tag() ) && ( 'post' == $posttype && ! is_singular() );
	$nectar_blog_type             = ( ! empty( $nectar_options['blog_type'] ) ) ? $nectar_options['blog_type'] : 'masonry-blog-fullwidth';
	$nectar_blog_std_style        = ( ! empty( $nectar_options['blog_standard_type'] ) ) ? $nectar_options['blog_standard_type'] : 'featured_img_left';
	$nectar_blog_masonry_style    = ( ! empty( $nectar_options['blog_masonry_type'] ) ) ? $nectar_options['blog_masonry_type'] : 'auto_meta_overlaid_spaced';
	


	// Blog std style containing image gallery grid - archive.
	if ( $nectar_on_blog_archive_check ) {
		
		if ( $nectar_blog_type === 'std-blog-sidebar' || $nectar_blog_type === 'std-blog-fullwidth' ) {
			// Standard styles that could contain gallery sliders.
			if ( $nectar_blog_std_style === 'classic' || $nectar_blog_std_style === 'minimal' ) {
				 wp_enqueue_style( 'nectar-flickity' );
				 wp_enqueue_style( 'nectar-portfolio' );
			}
		}
	}
	
	
	// Responsive.
	if ( ! empty( $nectar_options['responsive'] ) && $nectar_options['responsive'] == 1 ) {
		wp_enqueue_style( 'responsive' );
	} else {
		wp_enqueue_style( 'non-responsive' );

		add_filter( 'body_class', 'salient_non_responsive' );
		function salient_non_responsive( $classes ) {

				$classes[] = 'salient_non_responsive';

				return $classes;
		}
	}
	

	// WooCommerce.
	if ( function_exists( 'is_woocommerce' ) ) {
		wp_enqueue_style( 'woocommerce' );
	}
	
	// Gradient linea icons.
	if ( NectarElAssets::locate(array('.svg')) && NectarElAssets::locate(array('Extra-Color-Gradient')) ) {
		wp_enqueue_style( 'linea' );
	}
	
	
	// Flickity.
	$nectar_flickity_els = array(
		'[vc_gallery type="flickity"', 
		'style="multiple_visible"', 
		'style="slider_multiple_visible"', 
		'script="flickity"', 
		'style="multiple_visible_minimal"', 
		'style="slider"'
	);
	
	if ( NectarElAssets::locate($nectar_flickity_els) ) {
		wp_enqueue_style( 'nectar-flickity' );
	}
	

	$fancy_rcs = ( ! empty( $nectar_options['form-fancy-select'] ) ) ? $nectar_options['form-fancy-select'] : 'default';
	if ( $fancy_rcs === '1' ) {
		wp_enqueue_style( 'select2' );
	}
	
	// Child stylesheet
	if( is_child_theme() ) {
		$nectar_theme_version = nectar_get_theme_version();
		wp_register_style( 'salient-child-style', get_stylesheet_directory_uri() . '/style.css', '', $nectar_theme_version );
		wp_enqueue_style( 'salient-child-style' );
	}
	
	// Portfolio template inline styles.
	if( is_page_template( 'template-portfolio.php' ) ) {
		
		$nectar_portfolio_archive_layout = ( !empty($nectar_options['main_portfolio_layout']) ) ? $nectar_options['main_portfolio_layout'] : '3';
		$nectar_inline_filters   				 = ( ! empty( $nectar_options['portfolio_inline_filters'] ) && $nectar_options['portfolio_inline_filters'] === '1' ) ? '1' : '0';
		$nectar_portfolio_archive_bg     = get_post_meta( $post->ID, '_nectar_header_bg', true );
		
		$nectar_portfolio_css = '';
		if( $nectar_portfolio_archive_layout === 'fullwidth' ) {
			$nectar_portfolio_css .= '.container-wrap { padding-bottom: 0px!important; } #call-to-action .triangle { display: none; }';
		}
		
		if( $nectar_portfolio_archive_layout === 'fullwidth' && !empty($nectar_portfolio_archive_bg) ) {
			$nectar_portfolio_css .= '.container-wrap { padding-top: 0px!important; }';
		}
		
		if( $nectar_inline_filters === '1' && empty($nectar_portfolio_archive_bg) ) {
			$nectar_portfolio_css .= '.page-header-no-bg { display: none; }
			.container-wrap { padding-top: 0px!important; }
			body #portfolio-filters-inline { margin-top: -50px!important; padding-top: 5.8em!important; }';
		}
		
		if( $nectar_inline_filters === '1' && empty($nectar_portfolio_archive_bg) && $nectar_portfolio_archive_layout != 'fullwidth') {
			$nectar_portfolio_css .= '#portfolio-filters-inline.non-fw { margin-top: -37px!important; padding-top: 6.5em!important;}';
		}
		
		if( $nectar_inline_filters === '1' && !empty($nectar_portfolio_archive_bg) && $nectar_portfolio_archive_layout != 'fullwidth') {
			$nectar_portfolio_css .= '.container-wrap { padding-top: 3px!important; }';
		}
		
		wp_add_inline_style( 'main-styles', $nectar_portfolio_css );
		
	}
	
	// Search template inline styles.
	if( is_search() ) {
	
		$search_results_header_bg_color   = ( ! empty( $nectar_options['search-results-header-bg-color'] ) ) ? $nectar_options['search-results-header-bg-color'] : '#f4f4f4';
		$search_results_header_font_color = ( ! empty( $nectar_options['search-results-header-font-color'] ) ) ? $nectar_options['search-results-header-font-color'] : '#000000';
		
		$nectar_search_css = '
		#page-header-bg { 
			background-color: '.$search_results_header_bg_color.'; 
		}
		#page-header-bg h1, #page-header-bg .result-num {
			color: '.$search_results_header_font_color.';
		}
		';
		
		wp_add_inline_style( 'main-styles', $nectar_search_css );
	}
	
	// 404 template inline styles.
	if( is_404() ) {
	
		$page_404_bg_color               = ( ! empty( $nectar_options['page-404-bg-color'] ) ) ? $nectar_options['page-404-bg-color'] : '';
		$page_404_font_color             = ( ! empty( $nectar_options['page-404-font-color'] ) ) ? $nectar_options['page-404-font-color'] : '';
		$page_404_bg_image_overlay_color = ( ! empty( $nectar_options['page-404-bg-image-overlay-color'] ) ) ? $nectar_options['page-404-bg-image-overlay-color'] : '';
		
		$nectar_404_css = '';
				
		if ( ! empty( $page_404_bg_color ) ) { 
			$nectar_404_css .= 'html .error404 .container-wrap { 
				background-color: '.$page_404_bg_color.';
			}'; 
		}
		
		if ( ! empty( $page_404_bg_image_overlay_color ) ) {
			$nectar_404_css .= '.error404 .error-404-bg-img-overlay { 
				background-color: '. $page_404_bg_image_overlay_color .';
			}'; 
		}
		if ( ! empty( $page_404_font_color ) ) {
			$nectar_404_css .= '.error404 #error-404,
			.error404 #error-404 h1,
			.error404 #error-404 h2 { 
				color: '. $page_404_font_color .';
			}'; 
		}
		
		wp_add_inline_style( 'main-styles', $nectar_404_css );
	}
	

}

add_action( 'wp_enqueue_scripts', 'nectar_page_sepcific_styles' );



