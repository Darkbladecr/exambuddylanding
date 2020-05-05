<?php 
/**
 * Outputs various sizing/spacing calculations and dynamic theme option styles.
 *
 * The styles generated from here will either be contained in salient/css/salient-dynamic-styles.css 
 * or output directly in the head, depending on if the server writing permission is set for the css directory.
 *
 * @version 10.5
 */
 
  $nectar_options = get_nectar_theme_options(); 
  $theme_skin     = ( !empty($nectar_options['theme-skin']) ) ? $nectar_options['theme-skin'] : 'original';
  $headerFormat   = (!empty($nectar_options['header_format'])) ? $nectar_options['header_format'] : 'default';
	
	if( $headerFormat === 'centered-menu-bottom-bar' ) { 
		$theme_skin = 'material'; 
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

	$mobile_logo_height	 		= (!empty($nectar_options['use-logo']) && !empty($nectar_options['mobile-logo-height'])) ? intval($nectar_options['mobile-logo-height']) : 24;
	$header_padding 				= (!empty($nectar_options['header-padding'])) ? intval($nectar_options['header-padding']) : 28;
	$nav_font_size 					= (!empty($nectar_options['navigation_font_family']['font-size']) && $nectar_options['navigation_font_family']['font-size'] != '-') ? intval(substr($nectar_options['navigation_font_family']['font-size'],0,-2) *1.4 ) : 20;
	$dd_indicator_height 		= (!empty($nectar_options['use-custom-fonts']) && $nectar_options['use-custom-fonts'] == 1 && !empty($nectar_options['navigation_font_size']) && $nectar_options['navigation_font_size'] != '-') ? intval(substr($nectar_options['navigation_font_size'],0,-2)) -1 : 20;
	$headerFormat 					= (!empty($nectar_options['header_format'])) ? $nectar_options['header_format'] : 'default';
	$shrinkNum 							= (!empty($nectar_options['header-resize-on-scroll-shrink-num'])) ? intval($nectar_options['header-resize-on-scroll-shrink-num']) : 6;
	$perm_trans 						= (!empty($nectar_options['header-permanent-transparent'])) ? $nectar_options['header-permanent-transparent'] : 'false';
  $headerResize 					= (!empty($nectar_options['header-resize-on-scroll']) && $perm_trans != '1' && $headerFormat != 'centered-menu-bottom-bar') ? $nectar_options['header-resize-on-scroll'] : '0'; 
	$hideHeaderUntilNeeded 	= (!empty($nectar_options['header-hide-until-needed']) && $headerFormat != 'centered-menu-bottom-bar') ? $nectar_options['header-hide-until-needed'] : '0';
	$body_border 						= (!empty($nectar_options['body-border'])) ? $nectar_options['body-border'] : 'off';
	$headerRemoveStickiness = (!empty($nectar_options['header-remove-fixed'])) ? $nectar_options['header-remove-fixed'] : '0'; 
	$using_secondary 				= (!empty($nectar_options['header_layout'])) ? $nectar_options['header_layout'] : ' ';
	$menu_item_spacing 			= (!empty($nectar_options['header-menu-item-spacing'])) ? esc_attr($nectar_options['header-menu-item-spacing']) : '10';
  $side_widget_class      = (!empty($nectar_options['header-slide-out-widget-area-style'] ) ) ? $nectar_options['header-slide-out-widget-area-style'] : 'slide-out-from-right';
  $side_widget_area       = (!empty($nectar_options['header-slide-out-widget-area'] ) && $headerFormat != 'left-header') ? $nectar_options['header-slide-out-widget-area'] : 'off';

  $header_fullwidth       = (!empty($nectar_options['header-fullwidth'])) ? $nectar_options['header-fullwidth'] : '0';  
	$header_fullwidth_pad   = (!empty($nectar_options['header-fullwidth-padding'])) ? intval($nectar_options['header-fullwidth-padding']) : 28;
  
  $user_set_side_widget_area = $side_widget_area;
  
  if( isset($nectar_options['header-resize-on-scroll-shrink-num']) && '0' === $nectar_options['header-resize-on-scroll-shrink-num'] ) {
		$shrinkNum = 0;
	}
  
	// Options that disable the header resize effect.
	if( $hideHeaderUntilNeeded === '1' || $body_border === '1' || $headerFormat === 'left-header' || $headerRemoveStickiness === '1') { 
		$headerResize = '0'; 
	}
	
	// Larger secondary header with material theme skin.
	if( $theme_skin === 'material' ) {
		$extra_secondary_height = ($using_secondary === 'header_with_secondary') ? 42 : 0;
	} else {
		$extra_secondary_height = ($using_secondary === 'header_with_secondary') ? 34 : 0;
	}
	
	if( $headerFormat === 'centered-menu-bottom-bar') {
	 	$header_space = $logo_height + ($header_padding*3) + $nav_font_size + $extra_secondary_height;
	}	
	else if( $headerFormat === 'centered-menu-under-logo') {
	 	$header_space = $logo_height + ($header_padding*2) + 20 + $nav_font_size + $extra_secondary_height;
	}	
	else {
		$header_space = $logo_height + ($header_padding*2) + $extra_secondary_height;
	}

	$page_transition_bg 	= (!empty($nectar_options['transition-bg-color'])) ? $nectar_options['transition-bg-color'] : '#ffffff';
	$page_transition_bg_2 = (!empty($nectar_options['transition-bg-color-2'])) ? $nectar_options['transition-bg-color-2'] : $page_transition_bg;


	$headerFormat = (!empty($nectar_options['header_format'])) ? $nectar_options['header_format'] : 'default';
	$small_matieral_header_space = (($header_padding/1.8)*2) + $logo_height - $shrinkNum;
  
  $menu_label = false;
  if( ! empty( $nectar_options['header-menu-label'] ) && $nectar_options['header-menu-label'] === '1' ) {
    $menu_label = true;
  }

	  if( $headerFormat !== 'left-header') {

	  	$material_header_space = $logo_height + ($header_padding*2);
			
			// Desktop header navigation sizing.
		  echo '
		  @media only screen and (min-width: 1000px) {

				#header-outer[data-format="centered-menu-bottom-bar"] #top .span_9 #logo {  
					margin-top: -'. $header_padding/2 .'px; 
				}
				
				#header-outer[data-format="centered-menu-bottom-bar"] #top .span_9 nav >ul >li:not(#social-in-menu):not(#nectar-user-account):not(#search-btn):not(.slide-out-widget-area-toggle) > a { 
					padding-bottom: '.$header_padding.'px;  
				}
			  
				#header-outer #logo, 
				#header-outer .logo-spacing { 
					margin-top: '.$header_padding.'px; 
					margin-bottom: '.$header_padding.'px; 
					position: relative; 
				}
				
				 #header-outer.small-nav #logo, 
				 #header-outer.small-nav .logo-spacing { 
						margin-top: '. ($header_padding/1.8) .'px; 
						margin-bottom: '. ($header_padding/1.8) .'px; 
					
				} 
				
				#header-outer.small-nav #logo img, 
				#header-outer.small-nav .logo-spacing img { 
						height: '. ($logo_height - $shrinkNum) .'px; 
				}

			  .material #header-outer:not(.transparent) .bg-color-stripe { 
					top: '.$material_header_space.'px; 
					height: calc(35vh - '.$material_header_space.'px); 
				}
					
			  .material #header-outer:not(.transparent).small-nav .bg-color-stripe { 
					top: '.$small_matieral_header_space.'px; 
					height: calc(35vh - '.$small_matieral_header_space.'px); 
				}
		  }
			
		  @media only screen and (max-width: 999px) {
		  	.material #header-outer:not([data-permanent-transparent="1"]):not(.transparent) .bg-color-stripe, 
				.material #header-outer:not([data-permanent-transparent="1"]).transparent .bg-color-stripe { 
					top: '. ($mobile_logo_height+24) .'px; 
					height: calc(30vh - '. ($mobile_logo_height+24) .'px); 
				}
		  }

		  #header-outer #logo img, 
			#header-outer .logo-spacing img { 
				height: ' . $logo_height .'px; 
			}';
    
    // Full width header left/right custom padding  
    if( 'left-header' !== $headerFormat && '1' === $header_fullwidth && !empty($header_fullwidth_pad) && 28 !== $header_fullwidth_pad ) {
     echo '@media only screen and (min-width: 1000px) {
       #header-outer[data-full-width="true"] header > .container {
         padding: 0 '. esc_attr($header_fullwidth_pad) . 'px;
       }
     }';
    }  

		 echo'
		 #header-outer[data-lhe="animated_underline"] #top nav > ul > li > a,
		 #top nav > ul > li[class*="button_solid_color"] > a, 
		 body #header-outer[data-lhe="default"] #top nav .sf-menu > li[class*="button_solid_color"] > a:hover,
		 #header-outer[data-lhe="animated_underline"] #top nav > .sf-menu > li[class*="button_bordered"] > a,
		 #top nav > ul > li[class*="button_bordered"] > a, 
		 body #header-outer.transparent #top nav > ul > li[class*="button_bordered"] > a,
		 body #header-outer[data-lhe="default"] #top nav .sf-menu > li[class*="button_bordered"] > a:hover,
		 body #header-outer.transparent #top nav > ul > li[class*="button_solid_color"] > a, 
		 #header-outer[data-lhe="animated_underline"] #top nav > ul > li[class*="button_solid_color"] > a { 
			 margin-left: '.$menu_item_spacing.'px; 
			 margin-right: '.$menu_item_spacing.'px; 
		 }
		 
		 #header-outer[data-lhe="default"] #top nav > ul > li > a { 
			 padding-left: '.$menu_item_spacing.'px; 
			 padding-right: '.$menu_item_spacing.'px; 
		 }
		 
		 #header-outer[data-lhe="animated_underline"][data-condense="true"][data-format="centered-menu-bottom-bar"].fixed-menu #top nav > ul > li > a { 
			 margin-left: '. floor($menu_item_spacing/1.3) .'px; 
			 margin-right: '. floor($menu_item_spacing/1.3) .'px; 
		 }
		 
		 #header-outer[data-lhe="default"][data-condense="true"][data-format="centered-menu-bottom-bar"].fixed-menu #top nav > ul > li > a { 
			 padding-left: '. floor($menu_item_spacing/1.3) .'px; 
			 padding-right: '. floor($menu_item_spacing/1.3) .'px; 
		 }
		 ';
     
     // No margin on last li for full width header layout
     if( 'default' === $headerFormat && '1' === $header_fullwidth ) {
      echo '@media only screen and (min-width: 1000px) {
        body.material #header-outer #top .span_9 nav > ul.sf-menu > li:last-child > a {
          margin-right: 0;
        }
      }';
     }  
		 
		 $dropdown_arrows = (!empty($nectar_options['header-dropdown-arrows']) && $headerFormat !== 'left-header' ) ? $nectar_options['header-dropdown-arrows'] : 'inherit'; 
		 
		 if( $dropdown_arrows === 'show' && intval($menu_item_spacing) > 7 || $theme_skin === 'original' && $dropdown_arrows === 'inherit') {
			 
			 echo '#header-outer #top .sf-menu > .sf-with-ul > a { 
					 padding-right: '. intval(intval($menu_item_spacing) + 10) .'px!important;
				 }
	 			 #header-outer[data-lhe="animated_underline"] #top .sf-menu > .sf-with-ul:not([class*="button"]) > a { 
					 padding-right: 10px!important;
				 }
         #header-outer[data-lhe="animated_underline"] #top .sf-menu > .sf-with-ul[class*="button"] > a { 
					 padding-right: 26px!important;
				 }
				 #header-outer[data-lhe="default"][data-condense="true"][data-format="centered-menu-bottom-bar"].fixed-menu #top nav .sf-menu > .sf-with-ul > a { 
					 padding-right: '. intval( floor($menu_item_spacing/1.3) + 10) .'px!important;
				 }';
				 
		 }
		 
		 if( intval($menu_item_spacing) > 15 ) {
			 echo 'body.material[data-header-format="default"] #header-outer[data-has-buttons="yes"]:not([data-format="left-header"]) #top nav >.buttons { 
				 margin-left: '. intval($menu_item_spacing)*2 .'px; 
			 }';
		 }
		 
		 if( intval($menu_item_spacing) > 30 ) {
		 	  echo 'body.material[data-header-format="default"] #header-outer[data-format="default"] #social-in-menu { 
					margin-left: '. intval($menu_item_spacing) .'px;  
				} ';
	   }


	} 
	// Desktop left format header navigation sizing.
	else {
		echo '#header-outer #logo img { 
			height: ' . $logo_height .'px; 
		} 
		body[data-header-format="left-header"] #header-outer .row .col.span_9 { 
			top: '. intval($logo_height+40) .'px; 
		}';
	}
	
	// Original theme skin mobile search height.
	if( $theme_skin === 'original' ) {
		echo '
		@media only screen and ( max-width: 1000px ) {
			#search-outer {
				height: '. (intval($mobile_logo_height) + 24) .'px;
			}
		}';
	}
	
	// Blog archive.
	if( (is_archive() || is_author() || is_category() || is_home() || is_tag()) && 'post' == get_post_type() ) {
		
		$blog_type = (!empty($nectar_options['blog_type'])) ? $nectar_options['blog_type'] : 'masonry-blog-fullwidth';
		
		if( $blog_type === 'masonry-blog-full-screen-width' ) {
			
			$blog_masonry_type = (!empty($nectar_options['blog_masonry_type'])) ? $nectar_options['blog_masonry_type'] : 'auto_meta_overlaid_spaced';
			
			if( $theme_skin === 'material' ) {
				echo 'body[data-header-resize] .container-wrap { 
					padding-top: 0; 
				}
				body[data-bg-header="false"].archive .container-wrap { 
					padding-top: 40px; 
				}
				body[data-bg-header="true"].archive .container-wrap { 
					padding-top: 40px!important; 
				}';
				
				if( $blog_masonry_type === 'auto_meta_overlaid_spaced' || $blog_masonry_type === 'meta_overlaid' ) {
					echo 'body[data-bg-header="true"].archive .container-wrap { 
						padding-top: 0!important; 
					}';
				}
				
			} else {
				
				echo 'body[data-bg-header="false"].archive .container-wrap { 
					padding-top: 40px; 
					margin-top: 0; 
				}
				body[data-bg-header="true"].archive .container-wrap { 
						padding-top: 40px!important; 
				}';
				
				if( $blog_masonry_type === 'auto_meta_overlaid_spaced' || $blog_masonry_type === 'meta_overlaid' ) {
					echo 'body[data-bg-header="true"].archive .container-wrap { 
						padding-top: 0!important; 
					}';
				}
				
			}
			
		} // using full width masonry blog.
		
	} // if archive.
	
	
	global $post;
	if( !empty($nectar_options['transparent-header']) && $nectar_options['transparent-header'] === '1' && isset($post->ID) ) {
		$activate_transparency = nectar_using_page_header($post->ID); 
	} else {
		$activate_transparency = false;
	}

	 echo '#header-space { 
		 height: '. $header_space .'px;
	 }
	 @media only screen and (max-width: 999px) {
		 #header-space { 
			 height: '. (intval($mobile_logo_height) + 24) .'px;
		 }
	 }';
	 
	 $header_extra_space_to_remove = $extra_secondary_height;
	 
	 if($headerFormat === 'centered-menu-under-logo' || $headerFormat === 'centered-menu-bottom-bar') {
		 $header_extra_space_to_remove += 20;
	 } else {
		 $header_extra_space_to_remove += intval($header_padding);
	 }
	 
	 
	
	// Mobile fullscreen header/row height calcs.
	$nectar_mobile_browser_padding 		= 76;
	$nectar_mobile_padding 						= 23;
	$mobile_logo_height_header_calcs 	= $mobile_logo_height;
	
	if( $activate_transparency ) {
		$mobile_logo_height_header_calcs	= 0;
		$nectar_mobile_padding 	= 1;
	}
	
	echo '@media only screen and (max-width: 999px) {
		
		.using-mobile-browser #page-header-wrap.fullscreen-header,
		.using-mobile-browser #page-header-wrap.fullscreen-header #page-header-bg,
		.using-mobile-browser #nectar_fullscreen_rows:not(.afterLoaded):not([data-mobile-disable="on"]) > div {
			height: calc(100vh - '. (intval($mobile_logo_height_header_calcs) + $nectar_mobile_browser_padding) .'px);
		}
		.using-mobile-browser .wpb_row.vc_row-o-full-height.top-level, 
		.using-mobile-browser .wpb_row.vc_row-o-full-height.top-level > .col.span_12 { 
			min-height: calc(100vh - '. (intval($mobile_logo_height_header_calcs) + $nectar_mobile_browser_padding) .'px); 
		}
		';
		
		if( is_admin_bar_showing() ) {
			echo '.admin-bar #page-header-wrap.fullscreen-header,
			.admin-bar #page-header-wrap.fullscreen-header #page-header-bg,
			html:not(.nectar-box-roll-loaded) .admin-bar .nectar-box-roll > #page-header-bg.fullscreen-header,
			.admin-bar .nectar_fullscreen_zoom_recent_projects,
			.admin-bar .nectar-slider-wrap[data-fullscreen="true"]:not(.loaded), 
			.admin-bar .nectar-slider-wrap[data-fullscreen="true"]:not(.loaded) .swiper-container,
			.admin-bar #nectar_fullscreen_rows:not(.afterLoaded):not([data-mobile-disable="on"]) > div  {
				height: calc(100vh - '. (intval($mobile_logo_height_header_calcs) + $nectar_mobile_padding) .'px - 46px);
			}
			.admin-bar .wpb_row.vc_row-o-full-height.top-level, 
			.admin-bar .wpb_row.vc_row-o-full-height.top-level > .col.span_12 { 
				min-height: calc(100vh - '. (intval($mobile_logo_height_header_calcs) + $nectar_mobile_padding) .'px - 46px); 
			}
			';
		} else {
			echo '#page-header-wrap.fullscreen-header,
			#page-header-wrap.fullscreen-header #page-header-bg,
			 html:not(.nectar-box-roll-loaded) .nectar-box-roll > #page-header-bg.fullscreen-header,
			 .nectar_fullscreen_zoom_recent_projects,
			 .nectar-slider-wrap[data-fullscreen="true"]:not(.loaded), 
			 .nectar-slider-wrap[data-fullscreen="true"]:not(.loaded) .swiper-container,
			 #nectar_fullscreen_rows:not(.afterLoaded):not([data-mobile-disable="on"]) > div {
				height: calc(100vh - '. (intval($mobile_logo_height_header_calcs) + $nectar_mobile_padding) .'px);
			}
			.wpb_row.vc_row-o-full-height.top-level, 
			.wpb_row.vc_row-o-full-height.top-level > .col.span_12 { 
				min-height: calc(100vh - '. (intval($mobile_logo_height_header_calcs) + $nectar_mobile_padding) .'px); 
			}';
		}
		
		echo '[data-bg-header="true"][data-permanent-transparent="1"] #page-header-wrap.fullscreen-header,
		[data-bg-header="true"][data-permanent-transparent="1"] #page-header-wrap.fullscreen-header #page-header-bg,
		html:not(.nectar-box-roll-loaded) [data-bg-header="true"][data-permanent-transparent="1"] .nectar-box-roll > #page-header-bg.fullscreen-header,
		[data-bg-header="true"][data-permanent-transparent="1"] .nectar_fullscreen_zoom_recent_projects,
		[data-permanent-transparent="1"] .nectar-slider-wrap[data-fullscreen="true"]:not(.loaded), 
		[data-permanent-transparent="1"] .nectar-slider-wrap[data-fullscreen="true"]:not(.loaded) .swiper-container {
			height: 100vh;
		}
		
		[data-permanent-transparent="1"] .wpb_row.vc_row-o-full-height.top-level, 
		[data-permanent-transparent="1"] .wpb_row.vc_row-o-full-height.top-level > .col.span_12 {	min-height: 100vh; }
		
		body[data-transparent-header="false"] #ajax-content-wrap.no-scroll { 
			min-height:  calc(100vh - '. (intval($mobile_logo_height_header_calcs) + $nectar_mobile_padding) .'px);	
			height: calc(100vh - '. (intval($mobile_logo_height_header_calcs) + $nectar_mobile_padding) .'px); 
		} 
		
	}';
		
	

	// Page transitions coloring.
	if( $page_transition_bg !== '#ffffff' ) { 
		echo '#ajax-loading-screen, 
		#ajax-loading-screen[data-effect="center_mask_reveal"] span { 
			background-color: '.esc_attr($page_transition_bg).'
		} 
		.default-loading-icon { 
			border-color: rgba(255,255,255,0.2); 
		} '; 
	}
	
	echo '#ajax-loading-screen .reveal-1 { background-color: '.esc_attr($page_transition_bg).'; }';
	echo '#ajax-loading-screen .reveal-2 { background-color: '.esc_attr($page_transition_bg_2).'; }';


	 // Permanent transparent theme option.
	 $perm_trans = (!empty($nectar_options['header-permanent-transparent'])) ? $nectar_options['header-permanent-transparent'] : 'false';


	 // Mobile logo height.
	 echo '
	 #header-outer #logo .mobile-only-logo, 
	 #header-outer[data-format="centered-menu-bottom-bar"][data-condense="true"] .span_9 #logo img { 	
		 height: '.esc_attr($mobile_logo_height).'px; 
	 }
	 
	 @media only screen and (max-width: 999px) { 
		 	body #top #logo img, 
			#header-outer[data-permanent-transparent="false"] #logo .dark-version { 
		 		height: '.esc_attr($mobile_logo_height).'px!important; 
		 	} 

	 }';

	 // Header custom mobile breakpoint theme option.
	 $mobile_breakpoint = (!empty($nectar_options['header-menu-mobile-breakpoint'])) ? $nectar_options['header-menu-mobile-breakpoint'] : 1000; 
	 $has_main_menu     = (has_nav_menu('top_nav')) ? 'true' : 'false';

	 if( !empty($mobile_breakpoint) && $mobile_breakpoint != 1000 && $headerFormat !== 'left-header' && $has_main_menu === 'true' ) {

	 	$mobileMenuTopPadding      = ceil(($logo_height/2)) - 10;
	 	$mobileMenuTopPaddingSmall = ceil( ($logo_height-$shrinkNum) / 2  ) - 10;

	 	$starting_color    = (empty($nectar_options['header-starting-color'])) ? '#ffffff' : $nectar_options['header-starting-color'];
	 	$mobile_menu_hover = $nectar_options["accent-color"];

	 	if( !empty($nectar_options['header-color']) && $nectar_options['header-color'] === 'custom' && !empty($nectar_options['header-font-hover-color'])) {
	 		$mobile_menu_hover = $nectar_options['header-font-hover-color'];
	 	}

	 	echo '@media only screen and (min-width: 1000px) and (max-width: '.esc_attr($mobile_breakpoint).'px) {
			
      #header-outer:not([data-format="centered-menu-bottom-bar"]) #top .span_9 {
        flex-direction: row-reverse;
      }
      
      body[data-slide-out-widget-area-style="simple"] #header-outer #mobile-menu {
          top: 100%;
      }
      
      body[data-slide-out-widget-area-style="simple"][data-ext-responsive="true"] #header-outer[data-full-width="false"] #mobile-menu { 
        padding: 0 90px;
      }
      
	 		#header-outer #top .span_9 nav .sf-menu:not(.buttons) > li, 
			#top .span_9 nav .buttons .menu-item,
      #top .right-aligned-menu-items .buttons .menu-item { 
				visibility: hidden; 
				pointer-events: none; 
				margin: 0; 
			}
			
	 		#header-outer #top .span_9 nav .sf-menu:not(.buttons) > li:not(:nth-child(1)), 
			#top .span_9 nav .buttons .menu-item,
      #top .right-aligned-menu-items .buttons .menu-item { 
				position: absolute;
			}
      
      #header-outer[data-format="centered-menu"] #top nav >.buttons {
        position: relative;
      }
			
	 		#header-outer #top nav .sf-menu > #social-in-menu { 
				position: relative; 
				visibility: visible; 
				pointer-events: auto;
			}
			
			body.material[data-header-search="true"][data-user-set-ocm="off"] #header-outer:not([data-format="left-header"]):not([data-format="centered-menu-bottom-bar"]) #top nav > .buttons,
			body.material[data-cart="true"][data-user-set-ocm="off"] #header-outer:not([data-format="left-header"]):not([data-format="centered-menu-bottom-bar"]) #top nav > .buttons,
			body.material[data-user-account-button="true"][data-user-set-ocm="off"] #header-outer:not([data-format="left-header"]):not([data-format="centered-menu-bottom-bar"]) #top nav > .buttons { 
				margin-right: 28px; 
			}
			
      body.ascend[data-header-search="true"] #header-outer[data-full-width="false"]:not([data-format="left-header"]) #top nav > .buttons,
      body.ascend[data-cart="true"] #header-outer[data-full-width="false"]:not([data-format="left-header"]) #top nav > .buttons { 
        margin-right: 19px; 
      } 
      
			body[data-header-search="true"] #header-outer:not([data-format="left-header"]):not([data-format="centered-menu-bottom-bar"]) #top nav > .buttons,
			body[data-cart="true"] #header-outer:not([data-format="left-header"]):not([data-format="centered-menu-bottom-bar"]) #top nav > .buttons,
			body[data-user-account-button="true"] #header-outer:not([data-format="left-header"]):not([data-format="centered-menu-bottom-bar"]) #top nav > .buttons { 
				margin-right: 19px; 
			}
      
      body #header-outer[data-full-width="false"][data-has-buttons="no"]:not([data-format="left-header"]) #top nav #social-in-menu,
      body.material #header-outer[data-has-buttons="no"]:not([data-format="left-header"]) #top nav #social-in-menu {
        margin-right: 20px;
      }
      
      #header-outer[data-format="menu-left-aligned"] #top > .container .span_9 > .slide-out-widget-area-toggle.mobile-icon {
        top: 50%;
        right: 0;
        position: absolute;
        transform: translateY(-50%);
        -webkit-transform: translateY(-50%);
      }
      body #header-outer[data-format="menu-left-aligned"]:not([data-format="left-header"]):not([data-format="centered-menu-bottom-bar"]) #top nav > .buttons {
        margin-right: 55px;
      }
      ';
			if( true === $menu_label ) {
        echo 'body #header-outer[data-format="menu-left-aligned"]:not([data-format="left-header"]):not([data-format="centered-menu-bottom-bar"]) #top nav > .buttons {
          margin-right: 110px;
        }';
      }

			if( $headerFormat === 'centered-menu-bottom-bar' ) { 
				
				echo '
				#header-outer[data-format="centered-menu-bottom-bar"] #top .span_3 .slide-out-widget-area-toggle.mobile-icon { 
					display: flex; 
					display: -webkit-flex; 
					margin-left: 13px; 
					align-items: center; 
					-webkit-align-items: center;
				}
				
				body[data-user-set-ocm="off"] #header-outer[data-format="centered-menu-bottom-bar"] #top .span_3 .slide-out-widget-area-toggle.mobile-icon { 
					margin-left: 23px; 
				}
				
				#header-outer[data-format="centered-menu-bottom-bar"] #top .span_3 .slide-out-widget-area-toggle.mobile-icon > div { 
				 display: flex; display: -webkit-flex;
	       display: -ms-flexbox;     
				 -webkit-align-items: center;  
				 -moz-align-items: center; 
				 -ms-align-items: center;
				 -ms-flex-align: center; 
				 align-items: center; 
				 height: 100%; 
			 }
				
				body.material #header-outer[data-using-secondary="1"][data-format="centered-menu-bottom-bar"][data-condense="true"]:not([data-format="left-header"]) {
					margin-top: 0;
				}
				
				#header-outer[data-format="centered-menu-bottom-bar"] #top .span_3 .right-side ul .slide-out-widget-area-toggle.mobile-icon { 
					display: block!important; 
				}
				body #header-outer[data-has-menu="true"][data-format="centered-menu-bottom-bar"] #top .span_3 {
					text-align: center;
				}
				
				body #header-outer[data-has-menu="true"][data-format="centered-menu-bottom-bar"][data-condense="true"] { 
					position: fixed!important; 
				}
				
				body.admin-bar #header-outer[data-has-menu="true"][data-format="centered-menu-bottom-bar"][data-condense="true"] { 
					top: 32px; 
				}
				
				#header-outer[data-has-menu="true"][data-format="centered-menu-bottom-bar"][data-condense="true"].fixed-menu #top nav >.buttons,
				#header-outer[data-has-menu="true"]:not([data-format="centered-menu-bottom-bar"]) #top .span_3 #logo img { 
					transform: none!important; 
				}
				
				body #header-outer[data-has-menu="true"][data-format="centered-menu-bottom-bar"] #top .span_9 { 
					display: none; 
				}';
				
			} // end conditional for centered menu bottom bar
			
			echo '
			body.ascend #header-outer[data-full-width="false"] .cart-menu { 
				border-left: none; 
			}
			
			#top nav ul .slide-out-widget-area-toggle { 
				display: none!important; 
			}
			

	 		#header-outer[data-format="centered-menu"] #top .span_9 nav .sf-menu, 
	 		#header-outer[data-format="centered-logo-between-menu"] #top .span_9 nav .sf-menu, 
      #header-outer[data-format="centered-logo-between-menu"] #top .span_9 nav .sf-menu:not(.buttons),
	 		#header-outer[data-format="centered-menu-under-logo"] #top .span_9 nav {
	 			-webkit-justify-content: flex-end;
			    -moz-justify-content: flex-end;
			    -ms-flex-pack: flex-end;
			    -ms-justify-content: flex-end;
			    justify-content: flex-end;
	 		}
			
			#header-outer[data-format="centered-logo-between-menu"] #top nav > .buttons {
				position: relative;
			}
			
			body #header-outer[data-format="centered-logo-between-menu"] #top #logo { 
				transform: none; 
			}
			
 	    #header-outer:not([data-format="centered-menu-bottom-bar"]) #top .span_9 > .slide-out-widget-area-toggle, 
			#slide-out-widget-area .mobile-only { 
        display: -webkit-flex;
				display: flex!important;
        -webkit-align-items: center;   
        align-items: center;
				transition: padding 0.2s ease; 
			}
      
      #slide-out-widget-area.fullscreen .mobile-only,
      #slide-out-widget-area.fullscreen-alt .mobile-only {
        justify-content: center;
      }
			
	 		#header-outer[data-has-menu="true"] #top .span_3, 
			body #header-outer[data-format="centered-menu-under-logo"] .span_3 {
			    text-align: left;
			    left: 0;
			    width: auto;
			    float: left;
			}
			
			#header-outer[data-format="centered-menu-under-logo"] #top .span_9 ul #social-in-menu a {
				margin-bottom: 0;
			}
			
			#header-outer[data-format="centered-menu-under-logo"] #top .span_9 nav >.buttons {
				padding-bottom: 0;
			}
			
			body.material #header-outer[data-format="centered-menu-under-logo"] #top .span_9 {
			    margin-left: auto;
			}
			
			body.material #header-outer[data-format="centered-menu-under-logo"] #top .span_9 ul #social-in-menu a,
		  body.material #header-outer[data-format="centered-menu-under-logo"] #top .span_9 nav >.buttons { 
				margin-bottom: 0; 
				padding-bottom: 0;
			}
			
			body.material #header-outer[data-format="centered-menu-under-logo"] #top .row .span_9,
			body.material #header-outer[data-format="centered-menu-under-logo"] #top .row .span_3,
			body.ascend #header-outer[data-format="centered-menu-under-logo"] #top .row .span_9,
			body.ascend #header-outer[data-format="centered-menu-under-logo"] #top .row .span_3,
			body.original #header-outer[data-format="centered-menu-under-logo"] #top .row .span_9,
			body.original #header-outer[data-format="centered-menu-under-logo"] #top .row .span_3 { 
				    display: -webkit-flex;
				    display: -ms-flexbox;
				    display: flex;
			}
			
			body #header-outer[data-format="centered-menu-under-logo"] .row {
				-webkit-flex-direction: row; 
			    -ms-flex-direction: row; 
			    -moz-flex-direction: row; 
			    flex-direction: row; 
			}
			
			#header-outer[data-format="centered-menu-under-logo"] #top #logo{
			  display: -webkit-flex;
			  display: -ms-flexbox;
			  display: flex;
			  -webkit-align-items: center;
			  align-items: center;
			}
			
			body #header-outer[data-format="centered-menu-under-logo"] #top #logo .starting-logo { 
				left: 0;
				-webkit-transform: none; 
				transform: none;
			}
			 
			body #header-outer[data-format="centered-menu-under-logo"] #top #logo img { 
				margin: 0
			}
			
			#header-outer[data-format="centered-menu-under-logo"] #top #logo { 
				text-align: left;
			}

			.cart-outer, body #header-outer[data-full-width="false"] .cart-outer {
			    display: block;
			}

			#header-outer[data-format="centered-logo-between-menu"] #top nav .sf-menu > li { 
				float: left!important; 
			} 
			

			body[data-full-width-header="false"] #slide-out-widget-area.slide-out-from-right-hover .slide_out_area_close { 
				display: none; 
			}

			body[data-slide-out-widget-area-style="slide-out-from-right-hover"][data-slide-out-widget-area="true"][data-user-set-ocm="off"] #header-outer[data-full-width="false"][data-cart="false"] header > .container {
			    max-width: 100%!important;
			    padding: 0 28px !important;
			}

			body[data-full-width-header="false"][data-cart="true"] .slide-out-hover-icon-effect.small {
				right: 28px!important;
			}

			body[data-full-width-header="false"][data-cart="true"] .slide-out-widget-area-toggle .lines-button.x2.no-delay .lines:before, 
			body[data-full-width-header="false"][data-cart="true"] .slide-out-widget-area-toggle .lines-button.x2.no-delay .lines:after,
			body[data-full-width-header="false"][data-cart="true"] .slide-out-hover-icon-effect.slide-out-widget-area-toggle .no-delay.lines-button.no-delay:after {
				-webkit-transition: none!important;
				transition: none!important;
			}

			body:not(.mobile) #header-outer.transparent > #top .span_9 > .slide-out-widget-area-toggle .lines-button:after, 
			body:not(.mobile) #header-outer.transparent > #top .span_9 > .slide-out-widget-area-toggle .lines:before,
			body:not(.mobile) #header-outer.transparent > #top .span_9 > .slide-out-widget-area-toggle .lines:after {
				background-color: '.esc_attr($starting_color).'!important;
				opacity: 0.75;
			}
			body:not(.mobile) #header-outer.transparent.dark-slide > #top .span_9 > .slide-out-widget-area-toggle .lines-button:after, 
			body:not(.mobile) #header-outer.transparent.dark-slide > #top .span_9 > .slide-out-widget-area-toggle .lines:before,
			body:not(.mobile) #header-outer.transparent.dark-slide > #top .span_9 > .slide-out-widget-area-toggle .lines:after {
				background-color: #000!important;
				opacity: 0.75;
			}
			body:not(.mobile) #header-outer.transparent > #top .span_9 > .slide-out-widget-area-toggle:hover .lines-button:after, 
			body:not(.mobile) #header-outer.transparent > #top .span_9 > .slide-out-widget-area-toggle:hover .lines:before,
			body:not(.mobile) #header-outer.transparent > #top .span_9 > .slide-out-widget-area-toggle:hover .lines:after { 
				opacity: 1;
			}

			body #top .span_9 > .slide-out-widget-area-toggle.mobile-icon a:hover .lines:after, 
			body #top .span_9 > .slide-out-widget-area-toggle.mobile-icon a:hover .lines-button:after, 
			body #top .span_9 > .slide-out-widget-area-toggle.mobile-icon a:hover .lines:before {
				background-color: '.esc_attr($mobile_menu_hover).'!important;
			}

			body:not(.mobile) #header-outer.light-text > #top .span_9 > .slide-out-widget-area-toggle .lines-button:after, 
			body:not(.mobile) #header-outer.light-text > #top .span_9 > .slide-out-widget-area-toggle .lines:before,
			body:not(.mobile) #header-outer.light-text > #top .span_9 > .slide-out-widget-area-toggle .lines:after {
				background-color: #fff!important;
			}
      
      body[data-user-set-ocm="off"] #slide-out-widget-area.fullscreen-split,
      body[data-user-set-ocm="off"] #slide-out-widget-area-bg.fullscreen-split {
        display: block;
      }
      
	 	}';
	 }

	 // Material boxed desktop off canvas menu.
	 if(!empty($nectar_options['boxed_layout']) && $nectar_options['boxed_layout'] === '1')  {
	 	$boxed_max_width = 1200;

	 	if(!empty($nectar_options['responsive']) && $nectar_options['responsive'] === '1' && !empty($nectar_options['ext_responsive']) && $nectar_options['ext_responsive'] === '1') {
	 		$boxed_max_width = 1400;

	 		if ( !empty($nectar_options['max_container_width']) ) {
				$boxed_max_width = $nectar_options['max_container_width'];
		 	}
	 	} 
	 	
	 	echo '@media only screen and (min-width: '.esc_attr($boxed_max_width).'px) {
	 		.material .ocm-effect-wrap.material-ocm-open #boxed { 
	 			margin-left: auto;
	 			margin-right: 80px;
	 		} 
	 	}';
	 }

	 // Custom header bg opacity for light/dark.
	 if( !empty($nectar_options['header-bg-opacity']) && !empty($nectar_options['header-color']) ) {
		 
	 	if( $nectar_options['header-color'] === 'light' || $nectar_options['header-color'] === 'dark' ) {

	 		 if( $headerFormat !== 'left-header' ) {
	 		 	
				 $navBGColor = ($nectar_options['header-color'] === 'light') ? 'ffffff' : '000000';
				 $colorR = hexdec( substr( $navBGColor, 0, 2 ) );
				 $colorG = hexdec( substr( $navBGColor, 2, 2 ) );
				 $colorB = hexdec( substr( $navBGColor, 4, 2 ) );
				 $colorA = ($nectar_options['header-bg-opacity'] != '100') ? '0.'.esc_attr($nectar_options['header-bg-opacity']) : esc_attr($nectar_options['header-bg-opacity']);

				 echo 'body #header-outer, 
				 body[data-header-color="dark"] #header-outer { 
					 background-color: rgba('.$colorR.','.$colorG.','.$colorB.','.$colorA.'); 
				 }';

				 // Material search.
				 echo '.material #header-outer:not(.transparent) .bg-color-stripe { 
					 display: none; 
				 }';
			}
		}
	}

	if(!empty($nectar_options['header-dropdown-opacity']) && $nectar_options['header-dropdown-opacity'] !== '100' && !empty($nectar_options['header-color'])) {

		if($nectar_options['header-color'] === 'light' || $nectar_options['header-color'] === 'dark') {

			 $dropdownBGColor = '1c1c1c';

	 		 if( $nectar_options['header-color'] === 'light' ) { 
				 $dropdownBGColor = 'ffffff'; 
			 }

			 $colorR = hexdec( substr( $dropdownBGColor, 0, 2 ) );
			 $colorG = hexdec( substr( $dropdownBGColor, 2, 2 ) );
			 $colorB = hexdec( substr( $dropdownBGColor, 4, 2 ) );
			 $colorA = ($nectar_options['header-dropdown-opacity'] != '100') ? '0.'.esc_attr($nectar_options['header-dropdown-opacity']) : esc_attr($nectar_options['header-dropdown-opacity']);

			 echo '
			 #search-outer .ui-widget-content, 
			 body:not([data-header-format="left-header"]) #top .sf-menu li ul, 
			 #top nav > ul > .megamenu > .sub-menu,
			 body #top nav > ul > .megamenu > .sub-menu > li > a, 
			 #header-outer .widget_shopping_cart .cart_list a, 
			 #header-secondary-outer ul ul li a, 
			 #header-outer .widget_shopping_cart .cart_list li, 
			 .woocommerce .cart-notification, 
			 #header-outer .widget_shopping_cart_content { 
					background-color: rgba('.$colorR.','.$colorG.','.$colorB.','.$colorA.')!important; 
				}';	
		}
	}
  
  // Custom loading icon.
  if( isset($nectar_options['loading-image']['id']) ){
    echo ' .portfolio-loading, #ajax-loading-screen .loading-icon, .loading-icon, .pp_loaderIcon { background-image: url("'.nectar_options_img( $nectar_options["loading-image"] ).'"); } ';
  } 
	 
	 
	 // Nectar slider font calcs.
	 $heading_size = (!empty($nectar_options['use-custom-fonts']) && $nectar_options['use-custom-fonts'] == 1 && $nectar_options['nectar_slider_heading_font_size'] != '-') ? intval($nectar_options['nectar_slider_heading_font_size']) : 60;
	 $caption_size = (!empty($nectar_options['use-custom-fonts']) && $nectar_options['use-custom-fonts'] == 1 && $nectar_options['home_slider_caption_font_size'] != '-') ? intval($nectar_options['home_slider_caption_font_size']) : 24;
	 
	 echo '@media only screen and (min-width: 1000px) and (max-width: 1300px) {
	    .nectar-slider-wrap[data-full-width="true"] .swiper-slide .content h2, 
	    .nectar-slider-wrap[data-full-width="boxed-full-width"] .swiper-slide .content h2,
	    .full-width-content .vc_span12 .swiper-slide .content h2 {
			font-size: ' .$heading_size*0.75 . 'px!important;
			line-height: '.$heading_size*0.85 .'px!important;
		}

		.nectar-slider-wrap[data-full-width="true"] .swiper-slide .content p, 
		.nectar-slider-wrap[data-full-width="boxed-full-width"] .swiper-slide .content p, 
	    .full-width-content .vc_span12 .swiper-slide .content p {
			font-size: ' .$caption_size *0.75 . 'px!important;
			line-height: '.$caption_size *1.3 .'px!important;
		}
	}
	
	@media only screen and (min-width : 690px) and (max-width : 999px) {
		.nectar-slider-wrap[data-full-width="true"] .swiper-slide .content h2, 
		.nectar-slider-wrap[data-full-width="boxed-full-width"] .swiper-slide .content h2,
	    .full-width-content .vc_span12 .swiper-slide .content h2 {
			font-size: ' . (($heading_size*0.55 > 20) ? $heading_size*0.55 : 20) . 'px!important;
			line-height: '. (($heading_size*0.55 > 20) ? $heading_size*0.65 : 27) .'px!important;
		}

		.nectar-slider-wrap[data-full-width="true"] .swiper-slide .content p, 
		.nectar-slider-wrap[data-full-width="boxed-full-width"] .swiper-slide .content p, 
	    .full-width-content .vc_span12 .swiper-slide .content p {
			font-size: ' . (($caption_size *0.55 > 12) ? $caption_size *0.55 : 12). 'px!important;
			line-height: '.$caption_size *1 .'px!important;
		}
	}
	
	@media only screen and (max-width : 690px) {
		.nectar-slider-wrap[data-full-width="true"][data-fullscreen="false"] .swiper-slide .content h2, 
		.nectar-slider-wrap[data-full-width="boxed-full-width"][data-fullscreen="false"] .swiper-slide .content h2,
	    .full-width-content .vc_span12 .nectar-slider-wrap[data-fullscreen="false"] .swiper-slide .content h2 {
			font-size: ' .(($heading_size*0.25 > 14) ? $heading_size*0.25 : 14) . 'px!important;
			line-height: '.(($heading_size*0.25 > 14) ? $heading_size*0.35 : 20) .'px!important;
		}

		.nectar-slider-wrap[data-full-width="true"][data-fullscreen="false"] .swiper-slide .content p, 
		.nectar-slider-wrap[data-full-width="boxed-full-width"][data-fullscreen="false"]  .swiper-slide .content p, 
	    .full-width-content .vc_span12 .nectar-slider-wrap[data-fullscreen="false"] .swiper-slide .content p {
			font-size: ' .(($caption_size *0.32 > 10) ? $caption_size *0.32 : 10) . 'px!important;
			line-height: '.(($caption_size *0.73 > 10) ? $caption_size *0.73 : 18) .'px!important;
		}
	}
	';
	 

		 
	 // Header navigation transparent option coloring.
	if( !empty($nectar_options['transparent-header']) && $nectar_options['transparent-header'] === '1' ) {
		
		$starting_color = (empty($nectar_options['header-starting-color'])) ? '#ffffff' : $nectar_options['header-starting-color'];

		echo '
				#header-outer.transparent #top #logo, 
				#header-outer.transparent #top #logo:hover {
				 	color: '.esc_attr($starting_color).';
				 }
				 
				 #header-outer.transparent[data-permanent-transparent="false"] #top .slide-out-widget-area-toggle.mobile-icon i:before,
				 #header-outer.transparent[data-permanent-transparent="false"] #top .slide-out-widget-area-toggle.mobile-icon i:after,
				 body.material.mobile #header-outer.transparent:not([data-permanent-transparent="1"]) header .slide-out-widget-area-toggle a .close-line,
				 body #header-outer[data-permanent-transparent="1"].transparent:not(.dark-slide) > #top .span_9 > .slide-out-widget-area-toggle .lines-button:after, 
				 body #header-outer[data-permanent-transparent="1"].transparent:not(.dark-slide) > #top .span_9 > .slide-out-widget-area-toggle .lines:before, 
				 body #header-outer[data-permanent-transparent="1"].transparent:not(.dark-slide) > #top .span_9 > .slide-out-widget-area-toggle .lines:after { 
					 background-color: '.esc_attr($starting_color).'!important; 
				 }
				 
				 #header-outer.transparent #top nav > ul > li > a, 
				 #header-outer.transparent #top nav > .sf-menu > li > a,
         #header-outer.transparent .slide-out-widget-area-toggle a i.label,
         #header-outer.transparent #top .span_9 > .slide-out-widget-area-toggle a.using-label .label,
				 #header-outer.transparent #top nav ul #search-btn a .icon-salient-search, 
				 #header-outer.transparent #top nav ul #nectar-user-account a span, 
				 #header-outer.transparent #top nav > ul > li > a > .sf-sub-indicator i, 
				 #header-outer.transparent .cart-menu .cart-icon-wrap .icon-salient-cart,
				 .ascend #boxed #header-outer.transparent .cart-menu .cart-icon-wrap .icon-salient-cart
				  {
				 	color: '.esc_attr($starting_color).'!important;
				 	opacity: 0.75;
					transition: opacity 0.2s ease, color 0.2s ease;
				 }
				#header-outer.transparent[data-lhe="default"] #top nav > ul > li > a:hover,
				#header-outer.transparent[data-lhe="default"] #top nav .sf-menu > .sfHover:not(#social-in-menu) > a, 
				#header-outer.transparent[data-lhe="default"] #top nav .sf-menu > .current_page_ancestor > a, 
				#header-outer.transparent #top nav .sf-menu > .current-menu-item > a, 
				#header-outer.transparent[data-lhe="default"] #top nav .sf-menu > .current-menu-ancestor > a, 
				#header-outer.transparent[data-lhe="default"] #top nav .sf-menu > .current-menu-item > a, 
				#header-outer.transparent[data-lhe="default"] #top nav .sf-menu > .current_page_item > a,
				#header-outer.transparent #top nav > ul > li > a:hover > .sf-sub-indicator > i, 
        #header-outer.transparent #top .sf-menu > .sfHover > a .sf-sub-indicator i, 
				#header-outer.transparent #top nav > ul > .sfHover > a > span > i, 
				#header-outer.transparent #top nav ul #search-btn a:hover span, 
				#header-outer.transparent #top nav ul #nectar-user-account a:hover span, 
				#header-outer.transparent #top nav ul .slide-out-widget-area-toggle a:hover span,
				#header-outer.transparent #top nav .sf-menu > .current-menu-item > a i, 
				body #header-outer.transparent[data-lhe="default"] #top nav .sf-menu > .current_page_item > a .sf-sub-indicator i, 
				#header-outer.transparent #top nav .sf-menu > .current-menu-ancestor > a i, 
				body #header-outer.transparent[data-lhe="default"] #top nav .sf-menu > .current-menu-ancestor > a i,
				#header-outer.transparent .cart-outer:hover .icon-salient-cart, 
				.ascend #boxed #header-outer.transparent .cart-outer:hover .cart-menu .cart-icon-wrap .icon-salient-cart,
				#header-outer.transparent[data-permanent-transparent="false"]:not(.dark-slide) #top .span_9 > a[class*="mobile-"] > *,
				#header-outer.transparent[data-permanent-transparent="false"]:not(.dark-slide) #top #mobile-cart-link i,
				#header-outer[data-permanent-transparent="1"].transparent:not(.dark-slide) #top .span_9 > a[class*="mobile-"] > *,
				#header-outer[data-permanent-transparent="1"].transparent:not(.dark-slide) #top #mobile-cart-link i
				
				{
					opacity: 1;
					color: '.esc_attr($starting_color).'!important;
				}

				#header-outer.transparent[data-lhe="animated_underline"] #top nav > ul > li > a:hover, 
        #header-outer.transparent[data-lhe="animated_underline"] #top nav > ul > li > a:focus, 
				#header-outer.transparent[data-lhe="animated_underline"] #top nav .sf-menu > .sfHover > a,
				#header-outer.transparent[data-lhe="animated_underline"] #top nav .sf-menu > .current-menu-ancestor > a, 
				#header-outer.transparent[data-lhe="animated_underline"] #top nav .sf-menu > .current_page_item > a,
        #header-outer.transparent[data-lhe="default"] #top nav > ul > li > a:focus, 
        #header-outer.transparent .slide-out-widget-area-toggle a:hover i.label,
        #header-outer.transparent #top nav ul #search-btn a:focus span, 
				#header-outer.transparent #top nav ul #nectar-user-account a:focus span, 
				#header-outer.transparent #top nav ul .slide-out-widget-area-toggle a:focus span,
        #header-outer.transparent .nectar-woo-cart .cart-contents:focus .icon-salient-cart {
					opacity: 1;
				}

				#header-outer[data-lhe="animated_underline"].transparent #top nav > ul > li > a:after, 
				#header-outer.transparent #top nav>ul>li[class*="button_bordered"]>a:before {
					border-color: '.esc_attr($starting_color).'!important;
				}

				#header-outer.transparent > #top nav ul .slide-out-widget-area-toggle a .lines, 
				#header-outer.transparent > #top nav ul .slide-out-widget-area-toggle a .lines:before,
				#header-outer.transparent > #top nav ul .slide-out-widget-area-toggle a .lines:after,
				body.material #header-outer.transparent .slide-out-widget-area-toggle a .close-line,
				#header-outer.transparent > #top nav ul .slide-out-widget-area-toggle .lines-button:after {
					background-color: '.esc_attr($starting_color).'!important;
				}
				
				#header-outer.transparent #top nav ul .slide-out-widget-area-toggle a .lines,
				body.material:not(.mobile) #header-outer.transparent .slide-out-widget-area-toggle a .close-line,
				#header-outer.transparent:not(.side-widget-open) #top nav ul .slide-out-widget-area-toggle a .lines-button:after {
					opacity: 0.75;
				}
				
				#header-outer.transparent.side-widget-open #top nav ul .slide-out-widget-area-toggle a .lines,
				body.material #header-outer.transparent .slide-out-widget-area-toggle a:hover .close-line,
				#header-outer.transparent #top nav ul .slide-out-widget-area-toggle a:hover .lines, 
        #header-outer.transparent #top nav ul .slide-out-widget-area-toggle a:hover .lines-button:after, 
				#header-outer.transparent #top nav ul .slide-out-widget-area-toggle a:hover .lines:before,
				#header-outer.transparent #top nav ul .slide-out-widget-area-toggle a:hover .lines:after,
        #header-outer.transparent #top nav ul .slide-out-widget-area-toggle a:focus .lines-button:after, 
				#header-outer.transparent #top nav ul .slide-out-widget-area-toggle a:focus .lines:before,
				#header-outer.transparent #top nav ul .slide-out-widget-area-toggle a:focus .lines:after,
        #header-outer.transparent #top nav ul .slide-out-widget-area-toggle a:focus .lines {
					opacity: 1;
				}
		';

		$dark_header_color = (!empty($nectar_options['header-transparent-dark-color'])) ? $nectar_options['header-transparent-dark-color'] : '#000000';
		
		echo '
		#header-outer.transparent[data-permanent-transparent="false"].dark-slide #top .slide-out-widget-area-toggle.mobile-icon i:before,
		#header-outer.transparent[data-permanent-transparent="false"].dark-slide #top .slide-out-widget-area-toggle.mobile-icon i:after { 
			background-color: '.esc_attr($dark_header_color).'!important; 
		}';
		
		echo '#header-outer.transparent.dark-slide > #top nav > ul > li > a, 
		#header-outer.transparent.dark-row > #top nav > ul > li > a,
    #header-outer.transparent.dark-row .slide-out-widget-area-toggle a i.label,
    #header-outer.transparent.dark-slide .slide-out-widget-area-toggle a i.label,
    #header-outer.transparent.dark-slide #top .span_9 > .slide-out-widget-area-toggle a.using-label .label,
    #header-outer.transparent.dark-row #top .span_9 > .slide-out-widget-area-toggle a.using-label .label,
		#header-outer.transparent.dark-slide > #top nav ul #search-btn a span, 
		#header-outer.transparent.dark-row > #top nav ul #search-btn a span, 
		#header-outer.transparent.dark-slide > #top nav ul #nectar-user-account a span, 
		#header-outer.transparent.dark-row > #top nav ul #nectar-user-account a span, 
		#header-outer.transparent.dark-slide > #top nav > ul > li > a > .sf-sub-indicator [class^="icon-"], 
		#header-outer.transparent.dark-slide > #top nav > ul > li > a > .sf-sub-indicator [class*=" icon-"],
		#header-outer.transparent.dark-row > #top nav > ul > li > a > .sf-sub-indicator [class*=" icon-"],
		#header-outer.transparent.dark-slide .cart-menu .cart-icon-wrap .icon-salient-cart,
		#header-outer.transparent.dark-row .cart-menu .cart-icon-wrap .icon-salient-cart,
		 body.ascend[data-header-color="custom"] #boxed #header-outer.transparent.dark-slide > #top .cart-outer .cart-menu .cart-icon-wrap i,
		 body.ascend #boxed #header-outer.transparent.dark-slide > #top .cart-outer .cart-menu .cart-icon-wrap i,
		 #header-outer[data-permanent-transparent="1"].transparent.dark-slide .mobile-search .icon-salient-search,
		 #header-outer[data-permanent-transparent="1"].transparent.dark-slide .mobile-user-account .icon-salient-m-user,
		 #header-outer[data-permanent-transparent="1"].transparent.dark-slide #top #mobile-cart-link i,
		 #header-outer.transparent[data-permanent-transparent="false"].dark-slide #top .span_9 > a[class*="mobile-"] > *,
 		#header-outer.transparent[data-permanent-transparent="false"].dark-slide #top #mobile-cart-link i {
		 	color: '.esc_attr($dark_header_color).'!important;
		 }

		#header-outer.transparent.dark-slide > #top nav ul .slide-out-widget-area-toggle a .lines-button i:after,
		#header-outer.transparent.dark-slide > #top nav ul .slide-out-widget-area-toggle a .lines-button i:before,
		#header-outer.transparent.dark-slide > #top nav ul .slide-out-widget-area-toggle .lines-button:after,
		body.marterial #header-outer.transparent.dark-slide > #top nav .slide-out-widget-area-toggle a .close-line,
		body #header-outer[data-permanent-transparent="1"].transparent.dark-slide > #top .span_9 > .slide-out-widget-area-toggle.mobile-icon .lines-button:after, 
		body #header-outer[data-permanent-transparent="1"].transparent.dark-slide > #top .span_9 > .slide-out-widget-area-toggle.mobile-icon .lines:before, 
		body #header-outer[data-permanent-transparent="1"].transparent.dark-slide > #top .span_9 > .slide-out-widget-area-toggle.mobile-icon .lines:after {
			background-color: '.esc_attr($dark_header_color).'!important;
		}

		#header-outer.transparent.dark-slide > #top nav > ul > li > a:hover, 
		#header-outer.transparent.dark-slide > #top nav .sf-menu > .sfHover > a, 
		#header-outer.transparent.dark-slide > #top nav .sf-menu > .current_page_ancestor > a, 
		#header-outer.transparent.dark-slide > #top nav .sf-menu > .current-menu-item > a, 
		#header-outer.transparent.dark-slide > #top nav .sf-menu > .current-menu-ancestor > a, 
		#header-outer.transparent.dark-slide > #top nav .sf-menu > .current_page_item > a,
		#header-outer.transparent.dark-slide > #top nav > ul > li > a:hover > .sf-sub-indicator > i, 
		#header-outer.transparent.dark-slide > #top nav > ul > .sfHover > a > span > i, 
		#header-outer.transparent.dark-slide > #top nav ul #search-btn a:hover span,
		#header-outer.transparent.dark-slide > #top nav ul #nectar-user-account a:hover span,
		body #header-outer.dark-slide.transparent[data-lhe="default"] #top nav .sf-menu > .current_page_item > a .sf-sub-indicator i,
		#header-outer.transparent.dark-slide > #top nav .sf-menu > .current-menu-item > a i, 
		#header-outer.transparent.dark-slide > #top nav .sf-menu > .current-menu-ancestor > a i,
		body #header-outer.dark-slide.transparent[data-lhe="default"] #top nav .sf-menu > .current-menu-ancestor > a i,
		#header-outer.transparent.dark-slide  > #top .cart-outer:hover .icon-salient-cart,
		body.ascend[data-header-color="custom"] #boxed #header-outer.transparent.dark-slide > #top .cart-outer:hover .cart-menu .cart-icon-wrap i,
		#header-outer.transparent.dark-slide > #top #logo,
		#header-outer.transparent[data-lhe="default"].dark-slide #top nav .sf-menu > .current_page_item > a,
		#header-outer.transparent[data-lhe="default"].dark-slide #top nav .sf-menu > .current-menu-ancestor > a,
		#header-outer.transparent[data-lhe="default"].dark-slide #top nav > ul > li > a:hover, 
		#header-outer.transparent[data-lhe="default"].dark-slide #top nav .sf-menu > .sfHover:not(#social-in-menu) > a,
		#header-outer.transparent.dark-slide #top nav > ul > .sfHover > a > span > i, 
		body.ascend[data-header-color="custom"] #boxed #header-outer.transparent.dark-slide > #top .cart-outer:hover .cart-menu .cart-icon-wrap i,
		.swiper-wrapper .swiper-slide[data-color-scheme="dark"] .slider-down-arrow i.icon-default-style[class^="icon-"],
		.slider-prev.dark-cs i, 
		.slider-next.dark-cs i, 
		.swiper-container .dark-cs.slider-prev .slide-count span, 
		.swiper-container .dark-cs.slider-next .slide-count span {
			color: '.esc_attr($dark_header_color).'!important;
		}
		
		#header-outer[data-lhe="animated_underline"].transparent.dark-slide #top nav > ul > li > a:after,
		#header-outer.dark-slide.transparent:not(.side-widget-open) #top nav>ul>li[class*="button_bordered"]>a:before {
			border-color: '.esc_attr($dark_header_color).'!important;
		}
		
		.swiper-container[data-bullet_style="scale"] .slider-pagination.dark-cs .swiper-pagination-switch.swiper-active-switch i,
		.swiper-container[data-bullet_style="scale"] .slider-pagination.dark-cs .swiper-pagination-switch:hover i {
			background-color: '.esc_attr($dark_header_color).';
		}

		.slider-pagination.dark-cs .swiper-pagination-switch {
			 border: 1px solid '.esc_attr($dark_header_color).';
			 background-color: transparent;
		}
		.slider-pagination.dark-cs .swiper-pagination-switch:hover {
			background: none repeat scroll 0 0 '.esc_attr($dark_header_color).';
		}

		.slider-pagination.dark-cs .swiper-active-switch {
			 background: none repeat scroll 0 0 '.esc_attr($dark_header_color).';
		}
		';

	   $dark_header_color = str_replace("#", "", $dark_header_color);;
		 $darkcolorR = hexdec( substr( $dark_header_color, 0, 2 ) );
		 $darkcolorG = hexdec( substr( $dark_header_color, 2, 2 ) );
		 $darkcolorB = hexdec( substr( $dark_header_color, 4, 2 ) );
		 echo '
		 #fp-nav:not(.light-controls) ul li a span:after { 
			 background-color: #'.esc_attr($dark_header_color).'; 
		 }
		 #fp-nav:not(.light-controls) ul li a span { 
			 box-shadow: inset 0 0 0 8px rgba('.$darkcolorR.','.$darkcolorG.','.$darkcolorB.',0.3); 
			 -webkit-box-shadow: inset 0 0 0 8px rgba('.$darkcolorR.','.$darkcolorG.','.$darkcolorB.',0.3); 
		 }
		 body #fp-nav ul li a.active span  { 
			 box-shadow: inset 0 0 0 2px rgba('.$darkcolorR.','.$darkcolorG.','.$darkcolorB.',0.8); 
			 -webkit-box-shadow: inset 0 0 0 2px rgba('.$darkcolorR.','.$darkcolorG.','.$darkcolorB.',0.8); 
		 }';

	 } // Using transparent theme option
		 
	// Custom off canvas navigation menu button coloring.	
  $ocm_menu_btn_bg_color = false;
  $ocm_menu_btn_color    = false;
  $full_width_header     = (!empty($nectar_options['header-fullwidth']) && $nectar_options['header-fullwidth'] === '1') ? true : false;
  
  if ( $headerFormat === 'centered-menu-under-logo' ) {
    if ( $side_widget_class === 'slide-out-from-right-hover' && $user_set_side_widget_area === '1' ) {
      $side_widget_class = 'slide-out-from-right';
    }
    $full_width_header = false;
  }
  if ( $side_widget_class === 'slide-out-from-right-hover' && $user_set_side_widget_area === '1' ) {
    $full_width_header = true;
  }
  
  $ocm_menu_btn_color_non_compatible = ( 'ascend' === $theme_skin && true === $full_width_header ) ? true : false;
  
  if( true !== $ocm_menu_btn_color_non_compatible &&
  isset($nectar_options['header-slide-out-widget-area-menu-btn-color']) && 
  !empty( $nectar_options['header-slide-out-widget-area-menu-btn-color'] ) ) {
    
    $ocm_menu_btn_color = $nectar_options['header-slide-out-widget-area-menu-btn-color'];
    
    echo 'body #header-outer[data-has-menu][data-format][data-padding] #top .slide-out-widget-area-toggle[data-custom-color="true"] a i.label,
    body #header-outer.transparent #top .slide-out-widget-area-toggle[data-custom-color="true"] a i.label {
      color: '.esc_attr($ocm_menu_btn_color).'!important;
    }
    body #header-outer[data-has-menu][data-format][data-padding][data-using-logo] > #top .slide-out-widget-area-toggle[data-custom-color="true"] .lines-button:after,
    body #header-outer[data-has-menu][data-format][data-padding][data-using-logo] > #top .slide-out-widget-area-toggle[data-custom-color="true"] a .lines-button i:before,
    body #header-outer[data-has-menu][data-format][data-padding][data-using-logo] > #top .slide-out-widget-area-toggle a .lines-button i.lines:after,
    body.material #header-outer .slide-out-widget-area-toggle a .close-line,
    body.material #header-outer[data-using-logo].transparent .slide-out-widget-area-toggle a .close-line,
    body.material:not(.mobile) #header-outer.transparent .slide-out-widget-area-toggle a .close-line {
      background-color: '.esc_attr($ocm_menu_btn_color).'!important;
      opacity: 1;
    }
    #header-outer.transparent #top nav ul .slide-out-widget-area-toggle a .lines {
      opacity: 1;
    }';
    
  } 
  
  if( true !== $ocm_menu_btn_color_non_compatible &&
  isset($nectar_options['header-slide-out-widget-area-menu-btn-bg-color']) && 
  !empty( $nectar_options['header-slide-out-widget-area-menu-btn-bg-color'] ) ) {
    
    $ocm_menu_btn_bg_color = $nectar_options['header-slide-out-widget-area-menu-btn-bg-color'];
    $mobile_padding_mod    = ( $mobile_logo_height < 35 ) ? 30 : 20;
    
    echo 'body #header-outer #top .slide-out-widget-area-toggle[data-custom-color="true"] a:before {
      background-color: '.esc_attr($ocm_menu_btn_bg_color ).';
    }
    
    @media only screen and (max-width: 999px) {
      body #header-outer {
        padding: '.esc_attr($mobile_padding_mod).'px 0;
      }
      #header-secondary-outer {
        top: -'.esc_attr($mobile_padding_mod).'px;
      }
      #header-space { 
 			 height: '. (intval($mobile_logo_height) + ($mobile_padding_mod*2)) .'px;
 		 }
     body.material #header-outer[data-using-secondary="1"] #search-outer {
      margin-top: -'.esc_attr($mobile_padding_mod).'px;
    }
    #top #mobile-cart-link, #top .mobile-search, #header-outer #top .mobile-user-account {
      padding: 0 10px;
    }
    
    }';
    
    if( true === $menu_label && 
    !empty($mobile_breakpoint) && 
    $mobile_breakpoint != 1000 && 
    $headerFormat !== 'left-header' && 
    $has_main_menu === 'true' ) {
      echo '@media only screen and (min-width: 1000px) and (max-width: '.esc_attr($mobile_breakpoint).'px) {
        body #header-outer[data-format="menu-left-aligned"]:not([data-format="left-header"]):not([data-format="centered-menu-bottom-bar"]) #top nav > .buttons {
          margin-right: 140px;
        }
      }';
    }
    
  } 
  
  // Circular ocm icon.
  
  if( false === $menu_label && 
  false !== $ocm_menu_btn_bg_color &&
  isset($nectar_options['header-slide-out-widget-area-icon-style']) && 
  !empty( $nectar_options['header-slide-out-widget-area-icon-style'] ) && 
  'circular' === $nectar_options['header-slide-out-widget-area-icon-style']) {
    echo 'body #header-outer #top .slide-out-widget-area-toggle[data-custom-color] a:before {
      height: 46px;
      padding-bottom: 0;
    }
    body #header-outer #top .slide-out-widget-area-toggle[data-custom-color] a {
      padding: 0 12px;
    }
    body[data-button-style] #header-outer .slide-out-widget-area-toggle[data-custom-color="true"] a:before {
      border-radius: 100px!important;
    }
    body[data-slide-out-widget-area-style*="fullscreen"] #top .slide-out-widget-area-toggle:not(.small) a .close-wrap {
      height: 22px;
    }
    body[data-slide-out-widget-area-style*="fullscreen"] #top .slide-out-widget-area-toggle .close-line {
      left: 10px;
    }
    #header-outer[data-format="centered-menu-bottom-bar"] #top .slide-out-widget-area-toggle[data-custom-color="true"] a:before,
    #header-outer[data-format="centered-menu-under-logo"] #top .slide-out-widget-area-toggle[data-custom-color="true"] a:before {
      transform: translateY(-14px);
    }
    #header-outer[data-format="centered-menu-bottom-bar"][data-header-button_style*="scale"] #top nav ul .slide-out-widget-area-toggle[data-custom-color="true"] a:hover:before,
    #header-outer[data-format="centered-menu-under-logo"][data-header-button_style*="scale"] #top nav ul .slide-out-widget-area-toggle[data-custom-color="true"] a:hover:before {
      transform: scale(1.1) translateY(-14px);
    }
    @media only screen and (max-width: 690px) {
      body #header-outer[data-full-width="true"] header > .container {
        padding: 0 25px;
      }
    }
    ';
  }
  

	// Material loader color.
	$loading_icon = (isset($nectar_options['loading-icon'])) ? $nectar_options['loading-icon'] : 'default';
	
	if( $loading_icon === 'material' ) {
		
		$icon_colors = (isset($nectar_options['loading-icon-colors'])) ? $nectar_options['loading-icon-colors'] : array('from' => '#444444', 'to' => '#444444');
		
		echo '.loading-icon .material-icon .bar:after { 
					background-color: '.esc_attr($icon_colors['from']).'; 
				}
			  .loading-icon .material-icon .bar { 
					border-color: '.esc_attr($icon_colors['from']).';
				}
			  .loading-icon .material-icon .color-2 .bar:after { 
					background-color: '.esc_attr($icon_colors['to']).'; 
				}
			  .loading-icon .material-icon .color-2 .bar { 
					border-color: '.esc_attr($icon_colors['to']).';
				}';

		 if($icon_colors['from'] == $icon_colors['to']) {
			 
			 	echo '.loading-icon .material-icon .spinner.color-2 { 
					display: none!important; 
				} 
				.loading-icon .material-icon > div:first-child .right-side, 
				.loading-icon .material-icon > div:first-child .left-side { 
					-webkit-animation: none!important; 
					animation: none!important; 
				}';
			
		 }
	}
	
	// Extended responsive theme option width.
	global $woocommerce;
	
	if( !empty($nectar_options['responsive']) && 
		$nectar_options['responsive'] === '1' && 
		!empty($nectar_options['ext_responsive']) && 
		$nectar_options['ext_responsive'] === '1') {
		
		echo '@media only screen and (min-width: 1000px) {
			    .container, 
					body[data-header-format="left-header"] .container, 
					.woocommerce-tabs .full-width-content .tab-container, 
					.nectar-recent-posts-slider .flickity-page-dots, 
					.post-area.standard-minimal.full-width-content .post .inner-wrap, 
					.material #search-outer #search  {
			      max-width: 1425px; 
					  width: 100%;
					  margin: 0 auto;
					  padding: 0px 90px; 
			    } 

			    body[data-header-format="left-header"] .container, body[data-header-format="left-header"] .woocommerce-tabs .full-width-content .tab-container, 
					body[data-header-format="left-header"] .nectar-recent-posts-slider .flickity-page-dots,
			    body[data-header-format="left-header"] .post-area.standard-minimal.full-width-content .post .inner-wrap {
			    	padding: 0 60px;
			    }

			    body .container .page-submenu.stuck .container:not(.tab-container):not(.normal-container), 
					.nectar-recent-posts-slider .flickity-page-dots,
			    #nectar_fullscreen_rows[data-footer="default"] #footer-widgets .container, 
					#nectar_fullscreen_rows[data-footer="default"] #copyright .container {
			    	  padding: 0px 90px!important; 
			    }	
				
				.swiper-slide .content {
				  padding: 0px 90px; 
				}

				body[data-header-format="left-header"] .container .page-submenu.stuck .container:not(.tab-container), 
				body[data-header-format="left-header"] .nectar-recent-posts-slider .flickity-page-dots {
			    	  padding: 0px 60px!important; 
			    }	
				
				body[data-header-format="left-header"] .swiper-slide .content {
				  padding: 0px 60px; 
				}
				
				body .container .container:not(.tab-container):not(.recent-post-container):not(.normal-container) {
					width: 100%!important;
					padding: 0!important;
				}
				
				body .carousel-heading .container .carousel-next { 
					right: 10px; 
				} 
				body .carousel-heading .container .carousel-prev { 
					right: 35px; 
				}
				.carousel-wrap[data-full-width="true"] .carousel-heading .portfolio-page-link { 
					left: 90px; 
				}
				.carousel-wrap[data-full-width="true"] .carousel-heading { 
					margin-left: -20px; 
					margin-right: -20px; 
				}
				#ajax-content-wrap .carousel-wrap[data-full-width="true"] .carousel-next { 
					right: 90px; 
				} 
		   	#ajax-content-wrap .carousel-wrap[data-full-width="true"] .carousel-prev { 
					right: 115px; 
				}
				.carousel-wrap[data-full-width="true"] { 
					padding: 0; 
				}
				.carousel-wrap[data-full-width="true"] .caroufredsel_wrapper { 
					padding: 20px; 
				}
				
				#search-outer #search #close a {
					right: 90px;
				}
	
				#boxed, 
				#boxed #header-outer, 
				#boxed #slide-out-widget-area-bg.fullscreen, 
				#boxed #page-header-bg[data-parallax="1"], 
				#boxed #featured, 
				body[data-footer-reveal="1"] #boxed #footer-outer, 
				#boxed .orbit > div, 
				#boxed #featured article, 
				body.ascend #boxed #search-outer {
				   max-width: 1400px!important;
				   width: 90%!important;
				   min-width: 980px;
				}

				body[data-hhun="1"] #boxed #header-outer:not(.detached), 
				body[data-hhun="1"] #boxed #header-secondary-outer,
				#boxed #header-outer[data-format="centered-menu-bottom-bar"][data-condense="true"]:not(.fixed-menu),
				#boxed #header-secondary-outer.centered-menu-bottom-bar {
					width: 100%!important;
				}

				#boxed #search-outer #search #close a {
					right: 0!important;
				}

				#boxed .container {
				  width: 92%;
				  padding: 0;
			   } 
				
				#boxed #footer-outer #footer-widgets, #boxed #footer-outer #copyright {
					padding-left: 0;
					padding-right: 0;
				}

				#boxed .carousel-wrap[data-full-width="true"] .carousel-heading .portfolio-page-link { 
					left: 35px; 
				}
				
				#boxed .carousel-wrap[data-full-width="true"] .carousel-next { 
					right: 35px!important; 
				} 
				#boxed .carousel-wrap[data-full-width="true"] .carousel-prev { 
					right: 60px!important; 
				}

				
			 }';

		  // Custom max width theme option.
		  if(!empty($nectar_options['max_container_width'])) {
		  	   echo '@media only screen and (min-width: 1000px) { 
						 .container, 
						 body[data-header-format="left-header"] .container, 
						 .woocommerce-tabs .full-width-content .tab-container, 
						 .nectar-recent-posts-slider .flickity-page-dots, 
						 .post-area.standard-minimal.full-width-content .post .inner-wrap, 
						 .material #search-outer #search { 
							 max-width: '.esc_attr($nectar_options['max_container_width']).'px; 
						 } 
					 }';
		  }	
      
    }
    
    // Form input size.
    if( isset( $nectar_options['form-input-font-size'] ) && !empty($nectar_options['form-input-font-size']) ) {
      
      echo 'input[type=text], 
      input[type=email], 
      input[type=password], 
      input[type=tel], 
      input[type=url], 
      input[type=search], 
      input[type=date], 
      textarea,
      span.wpcf7-not-valid-tip,
      .woocommerce input#coupon_code,
      body[data-fancy-form-rcs="1"] .select2-container, 
      body[data-fancy-form-rcs="1"] .select2-drop, 
      body[data-fancy-form-rcs="1"] .select2-search, 
      .select2-search input,
      body[data-form-style="minimal"] input[type="text"], 
      body[data-form-style="minimal"] textarea,
      body[data-form-style="minimal"] input[type="email"],
      body[data-form-style="minimal"] .container-wrap .span_12.light input[type="email"], 
      body[data-form-style="minimal"] input[type=password], 
      body[data-form-style="minimal"] input[type=tel], 
      body[data-form-style="minimal"] input[type=url], 
      body[data-form-style="minimal"] input[type=search], 
      body[data-form-style="minimal"] input[type=date] {
        font-size: '.esc_attr($nectar_options['form-input-font-size']).'px;
      }';
      
    }
    
    // Form input button padding.
    if( isset( $nectar_options['form-input-spacing'] ) && !empty($nectar_options['form-input-spacing']) ) {
      
      // Top.
      $form_input_padding_top = false;
      if( isset( $nectar_options['form-input-spacing']['padding-top'] ) && 
          !empty($nectar_options['form-input-spacing']['padding-top']) ) {
        $form_input_padding_top = $nectar_options['form-input-spacing']['padding-top'];
      }
      
      // Right.
      $form_input_padding_right = false;
      if( isset( $nectar_options['form-input-spacing']['padding-right'] ) && 
          !empty($nectar_options['form-input-spacing']['padding-right']) ) {
        $form_input_padding_right = $nectar_options['form-input-spacing']['padding-right'];
      }
      
      // Verify a custom val was set for atleast one prop before creating rule.
      if( false !== $form_input_padding_top || 
      false !== $form_input_padding_right ) {
        
        echo 'input[type=text], 
        input[type=email], 
        input[type=password], 
        input[type=tel], 
        input[type=url], 
        input[type=search], 
        input[type=date], 
        textarea,
        .woocommerce input#coupon_code {';
          if( false !== $form_input_padding_top ) {
            echo 'padding-top: '.esc_attr($form_input_padding_top) .'; padding-bottom: '.esc_attr($form_input_padding_top) .';';
          }
          if( false !== $form_input_padding_right ) {
            echo 'padding-right: '.esc_attr($form_input_padding_right) .'; padding-left: '.esc_attr($form_input_padding_right) .';';
          }
          
          echo 'line-height: 1em;';
          
        echo '}';
        
        echo 'body[data-fancy-form-rcs="1"] .select2-container--default .select2-selection--single {';
          if( false !== $form_input_padding_top ) {
            echo 'padding-top: '.esc_attr($form_input_padding_top) .'; padding-bottom: '.esc_attr($form_input_padding_top) .';';
          }
        echo '}';
        
        echo '.select2-container--default .select2-selection--single .select2-selection__rendered { line-height: 1.2em; }';
        
      }
      
    } // End form input padding.
    
    
    // Form submit button padding.
    if( isset( $nectar_options['form-submit-spacing'] ) && !empty($nectar_options['form-submit-spacing']) ) {
      
      // Top.
      $form_submit_padding_top = false;
      if( isset( $nectar_options['form-submit-spacing']['padding-top'] ) && 
          !empty($nectar_options['form-submit-spacing']['padding-top']) ) {
        $form_submit_padding_top = $nectar_options['form-submit-spacing']['padding-top'];
      }
      
      // Right.
      $form_submit_padding_right = false;
      if( isset( $nectar_options['form-submit-spacing']['padding-right'] ) && 
          !empty($nectar_options['form-submit-spacing']['padding-right']) ) {
        $form_submit_padding_right = $nectar_options['form-submit-spacing']['padding-right'];
      }

      
      // Verify a custom val was set for atleast one prop before creating rule.
      if( false !== $form_submit_padding_top || 
      false !== $form_submit_padding_right) {
        
        echo 'body[data-form-submit="regular"] .container-wrap input[type=submit], 
        body[data-form-submit="regular"] .container-wrap button[type=submit]:not(.search-widget-btn), 
        body[data-form-submit="see-through"] .container-wrap input[type=submit], 
        body[data-form-submit="see-through"] .container-wrap button[type=submit]:not(.search-widget-btn),
        body[data-button-style="rounded"].ascend .container-wrap input[type="submit"], 
        body[data-button-style="rounded"].ascend .container-wrap button[type="submit"]:not(.search-widget-btn),
        .wc-proceed-to-checkout .button.checkout-button, 
        .woocommerce #order_review #payment #place_order, 
        body.woocommerce-cart .wc-proceed-to-checkout a.checkout-button,
        .woocommerce-page button[type="submit"].single_add_to_cart_button, 
        body[data-form-submit="regular"].woocommerce-page .container-wrap button[type=submit].single_add_to_cart_button,
        .nectar-post-grid-wrap .load-more {';
          
          if( false !== $form_submit_padding_top ) {
            echo 'padding-top: '.esc_attr($form_submit_padding_top) .'!important; padding-bottom: '.esc_attr($form_submit_padding_top) .'!important;';
          }
          if( false !== $form_submit_padding_right ) {
            echo 'padding-right: '.esc_attr($form_submit_padding_right) .'!important; padding-left: '.esc_attr($form_submit_padding_right) .'!important;';
          }

          echo 'line-height: 1.2em;';
          
        echo '}';
        
      }
      
    } // End form submit button padding.
    
    // Custom blog width.
    $blog_hide_sidebar = ( isset( $nectar_options['blog_hide_sidebar'] ) && !empty($nectar_options['blog_hide_sidebar']) ) ? $nectar_options['blog_hide_sidebar'] : false;
    
    if( '1' === $blog_hide_sidebar && isset( $nectar_options['blog_width'] ) && !empty($nectar_options['blog_width']) ) {
      if( 'default' !== $nectar_options['blog_width'] ) {
        echo '
        @media only screen and (min-width: 1000px) {
          body.single-post #ajax-content-wrap .container-wrap.no-sidebar .post-area, 
          body.single-post #ajax-content-wrap .container-wrap.no-sidebar .comment-list >li, 
          body.single-post #ajax-content-wrap .container-wrap.no-sidebar .comment-wrap h3#comments, 
          body.single-post #ajax-content-wrap .comment-wrap #respond,
          body.single-post #ajax-content-wrap #page-header-bg.fullscreen-header h1, 
          body.single-post #ajax-content-wrap #page-header-bg[data-post-hs="default_minimal"] h1, 
          body.single-post #ajax-content-wrap .heading-title[data-header-style="default_minimal"] .entry-title {
            max-width: '.esc_attr($nectar_options['blog_width']).';
            margin-left: auto;
            margin-right: auto;
          }
          
          body.single-post .container-wrap.no-sidebar .wpb_row.full-width-content {
            margin-left: -50vw!important;
            left: 50%!important;
            width: 100vw!important;
          }
          
        }';
      }
    }



?>