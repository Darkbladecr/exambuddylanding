<?php 

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
  exit;
}


/**
* Nectar Dynamic Element Styles.
*/

class NectarElDynamicStyles {
  
  private static $instance;
  
  public static $element_css  = array();
  public static $elements_arr = array(
    'vc_row',
    'vc_row_inner',
    'vc_column',
    'vc_column_inner',
    'nectar_icon',
    'nectar_post_grid',
    'image_with_animation',
    'nectar_highlighted_text',
    'nectar_scrolling_text',
    'fancy_box',
    'divider',
    'nectar_cta'
  );
  
  public static $using_fullscreen_rows = false;
  
  public function __construct() {

    add_action( 'wp_ajax_nectar_frontend_builder_generate_styles', array( $this, 'nectar_frontend_builder_generate_styles' ) );
  }
  
  
  /**
  * Used to regenerate styles when using the frontend editor.
  * 
  */
  public static function nectar_frontend_builder_generate_styles() {
    
    if( !wp_verify_nonce( $_POST['_vcnonce'], 'vc-nonce-vc-admin-nonce' ) || true !== current_user_can('edit_pages') ) {
      exit();
    }
    
    if ( isset( $_POST['nectar_page_content'] ) ) {
      
      self::$element_css = array();
      
      $content = htmlspecialchars( stripslashes( $_POST['nectar_page_content'] ),  ENT_NOQUOTES );
      
      self::generate_el_styles($content);
      
      echo self::remove_duplicate_rules(self::$element_css);
      
    }

    exit();
    
  }
  
  
  /**
  * Removes duplicate css rules.
  * 
  */
  public static function remove_duplicate_rules($rules) {
    
    if( is_array($rules) ) {
      
      $rules = array_unique($rules);
      
      $css_rules = '';
      
      foreach($rules as $rule) {
        $css_rules .= $rule;
      }
      
      return $css_rules;
      
    }
    
    return '';
    
  }
  
  
  /**
  * Calls all functions to handle styles for 
  * elements on page and obscured in templates 
  *
  * @see nectar/helpers/dynamic-styles.php location where called.
  */
  public static function generate_styles($post_content) {
    
    global $post;
    
    $page_full_screen_rows = ( isset( $post->ID ) ) ? get_post_meta( $post->ID, '_nectar_full_screen_rows', true ) : '';
    if( 'on' === $page_full_screen_rows ) {
      self::$using_fullscreen_rows = true;
    }
    
    // Generate All.
    self::generate_el_styles($post_content);
    self::generate_templatera_el_styles($post_content);
    
    // Output if styles exist.
    if( count(self::$element_css) > 0 ) {
      
      $rules = self::remove_duplicate_rules(self::$element_css);
      return $rules;
    }
    
    return '';
  
  }
  
  
  
  /**
  * Generates dynamic CSS of elements on current page.
  */
  public static function generate_el_styles($post_content) {
    
    // Regular Pages.
    if(!empty($post_content) ) {
      
      foreach( self::$elements_arr as $element ) {
        
        if ( preg_match_all( '/\['.$element.'(\s.*?)?\]/s', $post_content, $matches, PREG_SET_ORDER ) )  {
          
          if (!empty($matches)) {
            
            foreach ($matches as $shortcode) {
              
              // Output CSS.
              self::element_css($shortcode);
              
            } // End Single Element Item Loop.
            
          } // End Not Empty Matches.
          
        } // End Preg Match.
        
      } // End Element Loop.

    }
    
  }
  
  
  /**
  * Locates the content of a templatera template and generates dynamic CSS.
  */
  public static function generate_templatera_el_styles($post_content) {
    
    preg_match_all( '/\[templatera(\s.*?)?\]/s', $post_content, $templatera_shortcode_match, PREG_SET_ORDER  );
    
    if( !empty($templatera_shortcode_match) ) {
      
      foreach( $templatera_shortcode_match as $shortcode ) {
        
        if( strpos($shortcode[0],'[') !== false && strpos($shortcode[0],']') !== false ) {
          $shortcode_inner = substr($shortcode[0], 1, -1);
        } else {
          $shortcode_inner = $shortcode[0];
        }
        
        $atts = shortcode_parse_atts( $shortcode_inner );
        
        if( isset($atts['id']) ) {
          
          $template_ID = (int) $atts['id'];
          $templatera_content_query = get_post($template_ID);
          
          if( isset($templatera_content_query->post_content) && !empty($templatera_content_query->post_content) ) {
            self::generate_styles($templatera_content_query->post_content);
          }

        }
        
      } // End Templatera Loop.

    } // End found Templatera.
    
  }
  
  
  /**
  * Outputs the dynamic CSS for a specific element passed to it.
  */
  public static function element_css($shortcode) {
    
    if( !isset($shortcode[0]) ) {
      return;
    }
    
    if( strpos($shortcode[0],'[') !== false && strpos($shortcode[0],']') !== false ) {
      $shortcode_inner = substr($shortcode[0], 1, -1);
    } else {
      $shortcode_inner = $shortcode[0];
    }
    
    $override = '!important';
    $devices  = array(
      'tablet' => '999px', 
      'phone' => '690px'
    );
    
    
    // Row Element.
    if ( false !== strpos($shortcode[0],'[vc_row ') || false !== strpos($shortcode[0],'[vc_row_inner ') ) {
      
      $atts = shortcode_parse_atts($shortcode_inner);
      
      $row_selector = ( false !== strpos($shortcode[0],'[vc_row ') ) ? '.vc_row' : '.vc_row.inner_row';
      $row_span12_selector = ( false !== strpos($shortcode[0],'[vc_row ') ) ? '.row_col_wrap_12' : '.row_col_wrap_12_inner';
      
      $fullscreen_rows_bypass = ( false !== strpos($shortcode[0],'[vc_row ') && true === self::$using_fullscreen_rows ) ? true : false;
      
      // Inner Row specific.
      if ( false !== strpos($shortcode[0],'[vc_row_inner ') ) {
        
        
        
        //// DESKTOP ONLY.
        if( isset($atts['min_width_desktop']) && strlen($atts['min_width_desktop']) > 0 ) {
          self::$element_css[] = $row_selector.'.min_width_desktop_'. esc_attr( self::percent_unit_type_class($atts['min_width_desktop']) ) .' { 
            min-width: '.esc_attr( self::percent_unit_type($atts['min_width_desktop']) ).';
          }';
        }
      
        //// DEVICES.  
        foreach( $devices as $device => $media_query ) {
          
          if( isset($atts['min_width_'.$device]) && strlen($atts['min_width_'.$device]) > 0 ) {
            
            self::$element_css[] = '@media only screen and (max-width: '.$media_query.') { 
              body '.$row_selector.'.min_width_'.$device.'_'. esc_attr( self::percent_unit_type_class($atts['min_width_'.$device]) ) .' { 
              min-width: '.esc_attr( self::percent_unit_type($atts['min_width_'.$device]) ).';
            } }';
            
          }
          
        }
        
      } // End Inner Row specific.
      
      
      // DESKTOP SPECIFIC 
      //// Left Padding.
      if( true !== $fullscreen_rows_bypass ) {
        
        if( isset($atts['left_padding_desktop']) && strlen($atts['left_padding_desktop']) > 0 ) {
          self::$element_css[] = '#ajax-content-wrap ' . $row_selector.'.left_padding_'. esc_attr( self::percent_unit_type_class($atts['left_padding_desktop']) ) . ' ' . $row_span12_selector .' { 
            padding-left: '.esc_attr( self::percent_unit_type($atts['left_padding_desktop']) ).';
          } ';
        }
        //// Right Padding.
        if( isset($atts['right_padding_desktop']) && strlen($atts['right_padding_desktop']) > 0 ) {
          self::$element_css[] = '#ajax-content-wrap ' . $row_selector.'.right_padding_'. esc_attr( self::percent_unit_type_class($atts['right_padding_desktop']) ) . ' ' . $row_span12_selector .' { 
            padding-right: '.esc_attr( self::percent_unit_type($atts['right_padding_desktop']) ).';
          } ';
        }
        
      }
      
      // Device Loop.
      foreach( $devices as $device => $media_query ) {
        
        // Padding.
        if( true !== $fullscreen_rows_bypass ) {
          
          //// Top.
          if( isset($atts['top_padding_'.$device]) && strlen($atts['top_padding_'.$device]) > 0 ) {
            
            self::$element_css[] = '@media only screen and (max-width: '.$media_query.') { '.$row_selector.'.top_padding_'.$device.'_'. esc_attr( self::percent_unit_type_class($atts['top_padding_'.$device]) ) .' { 
              padding-top: '.esc_attr( self::percent_unit_type($atts['top_padding_'.$device]) ). esc_attr( $override ).';
            } }';
            
          }
          
          //// Bottom.
          if( isset($atts['bottom_padding_'.$device]) && strlen($atts['bottom_padding_'.$device]) > 0 ) {
            
            self::$element_css[] = '@media only screen and (max-width: '.$media_query.') { '.$row_selector.'.bottom_padding_'.$device.'_'. esc_attr( self::percent_unit_type_class($atts['bottom_padding_'.$device]) ) .' { 
              padding-bottom: '.esc_attr( self::percent_unit_type($atts['bottom_padding_'.$device]) ). esc_attr( $override ).';
            } }';
            
          }
        
      
          //// Left.
          if( isset($atts['left_padding_'.$device]) && strlen($atts['left_padding_'.$device]) > 0 ) {
            
            self::$element_css[] = '@media only screen and (max-width: '.$media_query.') { #ajax-content-wrap '.$row_selector.'.left_padding_'.$device.'_'. esc_attr( self::percent_unit_type_class($atts['left_padding_'.$device]) ) . ' ' . $row_span12_selector .' { 
              padding-left: '.esc_attr( self::percent_unit_type($atts['left_padding_'.$device]) ). esc_attr( $override ).';
            } }';
            
          }
          //// Right.
          if( isset($atts['right_padding_'.$device]) && strlen($atts['right_padding_'.$device]) > 0 ) {
            
            self::$element_css[] = '@media only screen and (max-width: '.$media_query.') { #ajax-content-wrap '.$row_selector.'.right_padding_'.$device.'_'. esc_attr( self::percent_unit_type_class($atts['right_padding_'.$device]) ) . ' ' . $row_span12_selector .' { 
              padding-right: '.esc_attr( self::percent_unit_type($atts['right_padding_'.$device]) ). esc_attr( $override ).';
            } }';
            
          }
          
        }
      
        // Transform.
        $transform_vals = '';
        $transform_x    = false;
        $transform_y    = false;
        
        //// Translate X.
        if( isset($atts['translate_x_'.$device]) && strlen($atts['translate_x_'.$device]) > 0 ) {
          
          $transform_vals .= 'translateX('. esc_attr( self::percent_unit_type($atts['translate_x_'.$device]) ).') ';
          $transform_x = true;
          
        } 
        //// Translate Y.
        if( isset($atts['translate_y_'.$device]) && strlen($atts['translate_y_'.$device]) > 0 ) {
          
          $transform_vals .= 'translateY('. esc_attr( self::percent_unit_type($atts['translate_y_'.$device]) ).')';
          $transform_y = true;
          
        } 
  
        if( !empty($transform_vals) ) {
          
          // X only.
          if( false === $transform_y && false !== $transform_x ) {
            
            self::$element_css[] = '@media only screen and (max-width: '.$media_query.') { 
              '.$row_selector.'.translate_x_'.$device.'_'. esc_attr( self::percent_unit_type_class($atts['translate_x_'.$device]) ) .' { 
              -webkit-transform: '.esc_attr( $transform_vals ). esc_attr( $override ).';
              transform: '.esc_attr( $transform_vals ). esc_attr( $override ).';
            } }';
            
          } 
          // Y only.
          else if ( false !== $transform_y && false === $transform_x ) {
            
            self::$element_css[] = '@media only screen and (max-width: '.$media_query.') { 
              '.$row_selector.'.translate_y_'.$device.'_'. esc_attr( self::percent_unit_type_class($atts['translate_y_'.$device]) ) .' { 
              -webkit-transform: '.esc_attr( $transform_vals ). esc_attr( $override ).';
              transform: '.esc_attr( $transform_vals ). esc_attr( $override ).';
            } }';
            
          } 
          // X and Y.
          else if( false !== $transform_y && false !== $transform_x ) {
            self::$element_css[] = '@media only screen and (max-width: '.$media_query.') { 
              '.$row_selector.'.translate_x_'.$device.'_'. esc_attr( self::percent_unit_type_class($atts['translate_x_'.$device]) ) .'.translate_y_'.$device.'_'. esc_attr( self::percent_unit_type_class($atts['translate_y_'.$device]) ) .' { 
              -webkit-transform: '.esc_attr( $transform_vals ). esc_attr( $override ).';
              transform: '.esc_attr( $transform_vals ). esc_attr( $override ).';
            } }';
            
          }

        } // endif not empty transform vals.

      } // End foreach device loop.
        

    } // End Row Element.
    
    
    
    // Column Element.
    else if( false !== strpos($shortcode[0],'[vc_column ') || false !== strpos($shortcode[0],'[vc_column_inner ') ) {
      
      
      $atts = shortcode_parse_atts($shortcode_inner);
      
      $col_selector = ( false !== strpos($shortcode[0],'[vc_column ') ) ? '.wpb_column' : '.wpb_column.child_column';
      
      //// DESKTOP ONLY.
      if( isset($atts['right_margin']) && strlen($atts['right_margin']) > 0 ) {
        self::$element_css[] = $col_selector.'.right_margin_'. esc_attr( self::percent_unit_type_class($atts['right_margin']) ) .' { 
          margin-right: '.esc_attr( self::percent_unit_type($atts['right_margin']) ). esc_attr( $override ).';
        }';
      }
      if( isset($atts['left_margin']) && strlen($atts['left_margin']) > 0 ) {
        self::$element_css[] = $col_selector.'.left_margin_'. esc_attr( self::percent_unit_type_class($atts['left_margin']) ) .' { 
          margin-left: '.esc_attr( self::percent_unit_type($atts['left_margin']) ). esc_attr( $override ).';
        }';
      }
      
      //// DEVICES.  
      foreach( $devices as $device => $media_query ) {
        
        // Margin.
        
        //// Top.
        if( isset($atts['top_margin_'.$device]) && strlen($atts['top_margin_'.$device]) > 0 ) {
          
          self::$element_css[] = '@media only screen and (max-width: '.$media_query.') { '.$col_selector.'.top_margin_'.$device.'_'. esc_attr( self::percent_unit_type_class($atts['top_margin_'.$device]) ) .' { 
            margin-top: '.esc_attr( self::percent_unit_type($atts['top_margin_'.$device]) ). esc_attr( $override ).';
          } }';
          
        }
        
        //// Right.
        if( isset($atts['right_margin_'.$device]) && strlen($atts['right_margin_'.$device]) > 0 ) {
          
          self::$element_css[] = '@media only screen and (max-width: '.$media_query.') { '.$col_selector.'.right_margin_'.$device.'_'. esc_attr( self::percent_unit_type_class($atts['right_margin_'.$device]) ) .' { 
            margin-right: '.esc_attr( self::percent_unit_type($atts['right_margin_'.$device]) ). esc_attr( $override ).';
          } }';
          
        }
        
        //// Left.
        if( isset($atts['left_margin_'.$device]) && strlen($atts['left_margin_'.$device]) > 0 ) {
          
          self::$element_css[] = '@media only screen and (max-width: '.$media_query.') { '.$col_selector.'.left_margin_'.$device.'_'. esc_attr( self::percent_unit_type_class($atts['left_margin_'.$device]) ) .' { 
            margin-left: '.esc_attr( self::percent_unit_type($atts['left_margin_'.$device]) ). esc_attr( $override ).';
          } }';
          
        }
        
        //// Bottom.
        if( isset($atts['bottom_margin_'.$device]) && strlen($atts['bottom_margin_'.$device]) > 0 ) {
          
          self::$element_css[] = '@media only screen and (max-width: '.$media_query.') { '.$col_selector.'.bottom_margin_'.$device.'_'. esc_attr( self::percent_unit_type_class($atts['bottom_margin_'.$device]) ) .' { 
            margin-bottom: '.esc_attr( self::percent_unit_type($atts['bottom_margin_'.$device]) ). esc_attr( $override ).';
          } }';
          
        }
        
        
        // Padding.
        if( isset($atts['column_padding_'.$device]) && strlen($atts['column_padding_'.$device]) > 0
        && $atts['column_padding_'.$device] !== 'inherit' && $atts['column_padding_'.$device] !== 'no-extra-padding' ) {
          
          $padding_number = preg_replace("/[^0-9\.]/", '', $atts['column_padding_'.$device]);
          $leading_zero   = ( $padding_number < 10) ? '0' : '';
          
          self::$element_css[] = '@media only screen and (max-width: '.$media_query.') { '.$col_selector.'.padding-'.esc_attr($padding_number).'-percent_'.$device.' > .vc_column-inner { 
            padding: calc('.$media_query.' * 0.'.$leading_zero . esc_attr($padding_number).');
          } }';
          
        }
        
        
        // Parent Col specific - Max width.
        if ( false !== strpos($shortcode[0],'[vc_column ') ) {

          //// Desktop.
          if( isset($atts['max_width_desktop']) && strlen($atts['max_width_desktop']) > 0 ) {
            self::$element_css[] = '.wpb_column.max_width_desktop_'. esc_attr( self::percent_unit_type_class($atts['max_width_desktop']) ) .' { 
              max-width: '.esc_attr( self::percent_unit_type($atts['max_width_desktop']) ).';
            }';
          }
          
          //// Devices.
          foreach( $devices as $device => $media_query ) {
            
            if( isset($atts['max_width_'.$device]) && strlen($atts['max_width_'.$device]) > 0 ) {
              
              self::$element_css[] = '@media only screen and (max-width: '.$media_query.') { body .wpb_column.max_width_'.$device.'_'. esc_attr( self::percent_unit_type_class($atts['max_width_'.$device]) ) .' { 
                max-width: '.esc_attr( self::percent_unit_type($atts['max_width_'.$device]) ).';
              } }';
              
            }
            
          }
          
        } // End Parent Col specific.
        
        
      } // End foreach device loop.

    } // End Column Element.


    // Icon Element.
    else if ( false !== strpos($shortcode[0],'[nectar_icon ') ) {
      
      $atts = shortcode_parse_atts($shortcode_inner);
      
      // Custom coloring.
      if( true === self::custom_color_bool('icon_color', $atts) ) {
        
        if( isset($atts['icon_style']) && !empty($atts['icon_style']) ) {
          
          $icon_color = ltrim($atts['icon_color_custom'],'#');

            
            // Default style.
            if( 'default' === $atts['icon_style'] ) {
              self::$element_css[] = '.nectar_icon_wrap[data-style="default"] .icon_color_custom_'.esc_attr($icon_color).' i { 
                color: #'.esc_attr($icon_color). esc_attr( $override ).';
              }';
            }
            
            // Border Basic style.
            if( 'border-basic' === $atts['icon_style'] || 'border-animation' === $atts['icon_style'] ) {
              self::$element_css[] = '.nectar_icon_wrap .icon_color_custom_'.esc_attr($icon_color).' i { 
                color: #'.esc_attr($icon_color). esc_attr( $override ).';
              }';
              self::$element_css[] = '.nectar_icon_wrap[data-style="border-basic"] .nectar_icon.icon_color_custom_'.esc_attr($icon_color).', 
              .nectar_icon_wrap[data-style="border-animation"]:not([data-draw="true"]) .nectar_icon.icon_color_custom_'.esc_attr($icon_color).',
              .nectar_icon_wrap[data-style="border-animation"][data-draw="true"] .nectar_icon.icon_color_custom_'.esc_attr($icon_color).':hover { 
                border-color: #'.esc_attr($icon_color). esc_attr( $override ).';
              }';
            }
            
            // Border animation style.
            if( 'border-animation' === $atts['icon_style'] ) {
              self::$element_css[] = '.nectar_icon_wrap[data-style="border-animation"]:not([data-draw="true"]) .nectar_icon.icon_color_custom_'.esc_attr($icon_color).':hover { 
                background-color: #'.esc_attr($icon_color). esc_attr( $override ).';
              }';
            }
            
            // Shadow BG style.
            if( 'shadow-bg' === $atts['icon_style'] ) {
              self::$element_css[] = '.nectar_icon_wrap[data-style="shadow-bg"] .nectar_icon.icon_color_custom_'.esc_attr($icon_color).',
              .nectar_icon_wrap[data-style="shadow-bg"] .nectar_icon.icon_color_custom_'.esc_attr($icon_color).':after { 
                background-color: #'.esc_attr($icon_color). esc_attr( $override ).';
              }';
              self::$element_css[] = '.nectar_icon_wrap[data-style="shadow-bg"] .nectar_icon.icon_color_custom_'.esc_attr($icon_color).':before { 
                box-shadow: 0px 15px 28px #'.esc_attr($icon_color). esc_attr( $override ).';
              }';
              self::$element_css[] = '.nectar_icon_wrap[data-style="shadow-bg"] .nectar_icon.icon_color_custom_'.esc_attr($icon_color).' .svg-icon-holder svg path { 
                stroke: #fff!important;
              }';
            }
            
            // Soft BG style.
            if( 'soft-bg' === $atts['icon_style'] ) {
              self::$element_css[] = '.nectar_icon_wrap[data-style="soft-bg"] .nectar_icon.icon_color_custom_'.esc_attr($icon_color).' i { 
                color: #'.esc_attr($icon_color). esc_attr( $override ).';
              }';
              self::$element_css[] = '.nectar_icon_wrap[data-style="soft-bg"] .nectar_icon.icon_color_custom_'.esc_attr($icon_color).':before { 
                background-color: #'.esc_attr($icon_color). esc_attr( $override ).';
              }';
            }
            
            // SVG.
            self::$element_css[] = '.nectar_icon_wrap .nectar_icon.icon_color_custom_'.esc_attr($icon_color).' .svg-icon-holder[data-color] svg path {
              stroke: #'.esc_attr($icon_color). esc_attr( $override ).';
            }';
            

          }    
               
        } // endif using custom coloring.
  
      } // End Icon Element.
      
      
      // Nectar CTA Element.
      else if ( false !== strpos($shortcode[0],'[nectar_cta ') ) {
        
      $atts = shortcode_parse_atts($shortcode_inner);
      
        if( isset($atts['btn_style']) && 'next-section' !== $atts['btn_style'] ) {

          if( isset($atts['button_color_hover']) && !empty($atts['button_color_hover']) ) {
            
            $btn_color = ltrim($atts['button_color_hover'],'#');
            
            // Gradient colors will overlay color on pseudo for transition
            if( isset($atts['button_color']) && 'extra-color-gradient-1' === $atts['button_color'] || 
                isset($atts['button_color']) && 'extra-color-gradient-2' === $atts['button_color'] ) {
              self::$element_css[] = '.nectar-cta.hover_color_'.esc_attr($btn_color).' .link_wrap:before { 
                background-color: #'.esc_attr($btn_color).';
              }';
            } 
            // Regular colored btns
            else {
              self::$element_css[] = '.nectar-cta.hover_color_'.esc_attr($btn_color).' .link_wrap:hover { 
                background-color: #'.esc_attr($btn_color). esc_attr( $override ).';
              }';
            }
            

          }    
          
        }

      } // End CTA Element.
    
      
      // Post Grid Element
      else if ( false !== strpos($shortcode[0],'[nectar_post_grid ') ) {
        
        $atts = shortcode_parse_atts($shortcode_inner);
        
        // Font size.
        if( isset($atts['custom_font_size']) && !empty($atts['custom_font_size']) ) {

          $font_size = self::font_sizing_format($atts['custom_font_size']);

          self::$element_css[] = '@media only screen and (min-width: 1000px) { .nectar-post-grid.font_size_'.esc_attr($font_size).' .post-heading { 
            font-size: '.esc_attr($font_size).';
          } }';
          
        }
        
        // BG Color Hover.
        if( isset($atts['card_bg_color_hover']) && !empty($atts['card_bg_color_hover']) ) {

          $card_hover_color = ltrim($atts['card_bg_color_hover'],'#');

          self::$element_css[] = '.nectar-post-grid[data-card="yes"].card_hover_color_'.esc_attr($card_hover_color).' .nectar-post-grid-item:hover { 
            background-color: #'.esc_attr($card_hover_color) . esc_attr( $override ) .';
          }';
          
        }
        
      } // End Post Grid Element.
      
      // Nectar Highlighted Text
      else if ( false !== strpos($shortcode[0],'[nectar_highlighted_text ') ) {
        
        $atts = shortcode_parse_atts($shortcode_inner);
        
        if( isset($atts['custom_font_size']) && !empty($atts['custom_font_size']) ) {

          $font_size = self::font_sizing_format($atts['custom_font_size']);

          self::$element_css[] = '@media only screen and (min-width: 1000px) { 
            .nectar-highlighted-text.font_size_'.esc_attr($font_size).' h1,
            .nectar-highlighted-text.font_size_'.esc_attr($font_size).' h2,
            .nectar-highlighted-text.font_size_'.esc_attr($font_size).' h3,
            .nectar-highlighted-text.font_size_'.esc_attr($font_size).' h4 { 
            font-size: '.esc_attr($font_size).';
            line-height: 1.1em;
          }}
          .nectar-highlighted-text[data-style="regular_underline"].font_size_'.esc_attr($font_size).' em:before,
          .nectar-highlighted-text[data-style="half_text"].font_size_'.esc_attr($font_size).' em:before {
             bottom: 0.07em;
          }';
          
        }
        
      } // End Nectar Highlighted Text Element.
      
      
      // Nectar Scrolling Text
      else if ( false !== strpos($shortcode[0],'[nectar_scrolling_text ') ) {
        
        $atts = shortcode_parse_atts($shortcode_inner);
        
        if( isset($atts['custom_font_size']) && !empty($atts['custom_font_size']) ) {

          $font_size = self::font_sizing_format($atts['custom_font_size']);

          self::$element_css[] = '@media only screen and (min-width: 1000px) { 
            .nectar-scrolling-text.font_size_'.esc_attr($font_size).' .nectar-scrolling-text-inner * { 
            font-size: '.esc_attr($font_size).';
            line-height: 1.1em;
          } }';
          
        }
        
        if( isset($atts['custom_font_size_mobile']) && !empty($atts['custom_font_size_mobile']) ) {

          $font_size = self::font_sizing_format($atts['custom_font_size_mobile']);

          self::$element_css[] = '@media only screen and (max-width: 1000px) { 
            .nectar-scrolling-text.font_size_mobile_'.esc_attr($font_size).' .nectar-scrolling-text-inner * { 
            font-size: '.esc_attr($font_size).';
            line-height: 1.1em;
          } }';
          
        }
        
      } // End Nectar Scrolling Text.
      
      // Single Image Element.
      else if( false !== strpos($shortcode[0],'[image_with_animation ') ) {
        
        $atts = shortcode_parse_atts($shortcode_inner);
          
        foreach( $devices as $device => $media_query ) {
          
          // Margin.
          
          //// Top.
          if( isset($atts['margin_top_'.$device]) && strlen($atts['margin_top_'.$device]) > 0 ) {
            self::$element_css[] = '@media only screen and (max-width: '.$media_query.') { .img-with-aniamtion-wrap.margin_top_'.$device.'_'. esc_attr( self::percent_unit_type_class($atts['margin_top_'.$device]) ) .' { 
              margin-top: '.esc_attr( self::percent_unit_type($atts['margin_top_'.$device]) ). esc_attr( $override ).';
            } }';
          }
          
          //// Right.
          if( isset($atts['margin_right_'.$device]) && strlen($atts['margin_right_'.$device]) > 0 ) {
            self::$element_css[] = '@media only screen and (max-width: '.$media_query.') { .img-with-aniamtion-wrap.margin_right_'.$device.'_'. esc_attr( self::percent_unit_type_class($atts['margin_right_'.$device]) ) .' { 
              margin-right: '.esc_attr( self::percent_unit_type($atts['margin_right_'.$device]) ). esc_attr( $override ).';
            } }';
          }
          
          //// Bottom.
          if( isset($atts['margin_bottom_'.$device]) && strlen($atts['margin_bottom_'.$device]) > 0 ) {
            self::$element_css[] = '@media only screen and (max-width: '.$media_query.') { .img-with-aniamtion-wrap.margin_bottom_'.$device.'_'. esc_attr( self::percent_unit_type_class($atts['margin_bottom_'.$device]) ) .' { 
              margin-bottom: '.esc_attr( self::percent_unit_type($atts['margin_bottom_'.$device]) ). esc_attr( $override ).';
            } }';
          }
          
          //// Left.
          if( isset($atts['margin_left_'.$device]) && strlen($atts['margin_left_'.$device]) > 0 ) {
            self::$element_css[] = '@media only screen and (max-width: '.$media_query.') { .img-with-aniamtion-wrap.margin_left_'.$device.'_'. esc_attr( self::percent_unit_type_class($atts['margin_left_'.$device]) ) .' { 
              margin-left: '.esc_attr( self::percent_unit_type($atts['margin_left_'.$device]) ). esc_attr( $override ).';
            } }';
          }
          
          
        } // End foreach device loop.
  
      } // End Single Image.
      
      
      
      // Divider Element.
      else if( false !== strpos($shortcode[0],'[divider ') ) {
        
        $atts = shortcode_parse_atts($shortcode_inner);
        
        $style = ( isset($atts['line_type']) && !empty($atts['line_type']) ) ? $atts['line_type'] : 'No Line';
          
        foreach( $devices as $device => $media_query ) {
          
          // Height.
          if( isset($atts['custom_height_'.$device]) && strlen($atts['custom_height_'.$device]) > 0 ) {
            
            if( 'No Line' === $style ) {
              self::$element_css[] = '@media only screen and (max-width: '.$media_query.') { .divider-wrap.height_'.$device.'_'. esc_attr( self::percent_unit_type_class($atts['custom_height_'.$device]) ) .' > .divider { 
                height: '.esc_attr( self::percent_unit_type($atts['custom_height_'.$device]) ). esc_attr( $override ).';
              } }';
            } else {
              self::$element_css[] = '@media only screen and (max-width: '.$media_query.') { .divider-wrap.height_'.$device.'_'. esc_attr( self::percent_unit_type_class($atts['custom_height_'.$device]) ) .' > div { 
                margin-top: '.esc_attr( self::percent_unit_type($atts['custom_height_'.$device]) ). esc_attr( $override ).';
                margin-bottom: '.esc_attr( self::percent_unit_type($atts['custom_height_'.$device]) ). esc_attr( $override ).';
              } }';
            }
            
            
          }
          
        } // End foreach device loop.
  
      } // End Divider.
      
      
      
      // Fancy Box Element.
      else if( false !== strpos($shortcode[0],'[fancy_box ') ) {
        
        $atts = shortcode_parse_atts($shortcode_inner);
        
        // Min Height.
        foreach( $devices as $device => $media_query ) {
          
          // Height.
          if( isset($atts['min_height_'.$device]) && strlen($atts['min_height_'.$device]) > 0 ) {
            

            self::$element_css[] = '@media only screen and (max-width: '.$media_query.') { 
              .nectar-fancy-box:not([data-style="parallax_hover"]):not([data-style="hover_desc"]).min_height_'.$device.'_'. esc_attr( self::percent_unit_type_class($atts['min_height_'.$device]) ) .' .inner,
              .nectar-fancy-box[data-style="parallax_hover"].min_height_'.$device.'_'. esc_attr( self::percent_unit_type_class($atts['min_height_'.$device]) ) .' .meta-wrap,
              .nectar-fancy-box[data-style="hover_desc"].min_height_'.$device.'_'. esc_attr( self::percent_unit_type_class($atts['min_height_'.$device]) ) .' { 
                 min-height: '.esc_attr( self::percent_unit_type($atts['min_height_'.$device]) ). esc_attr( $override ).';
              } 
          }';
            

          }
          
        } // End foreach device loop.
        
        
        // Parallax hover styles.
        if( isset($atts['parallax_hover_box_overlay']) && !empty($atts['parallax_hover_box_overlay']) ) {
          
          $color = ltrim($atts['parallax_hover_box_overlay'],'#');
          
          self::$element_css[] = '.nectar-fancy-box[data-style="parallax_hover"].overlay_'.esc_attr($color).' .bg-img:after { 
            background-color: #'.esc_attr($color).';
          }';

        }
        
        // Description on hover styles.
        if( isset($atts['hover_color_custom']) && !empty($atts['hover_color_custom']) ) {
          
          $color = ltrim($atts['hover_color_custom'],'#');
          
          self::$element_css[] = '.nectar-fancy-box[data-style="hover_desc"][data-color].hover_color_'.esc_attr($color).':before { 
            background: linear-gradient(to bottom, rgba(0,0,0,0), #'.esc_attr($color).' 100%);
          }';

        }
        
        // Default and Color box hover.
        if( isset($atts['color_custom']) && !empty($atts['color_custom']) ) {
          
          $color = ltrim($atts['color_custom'],'#');
          
          self::$element_css[] = '.nectar-fancy-box[data-style="default"].box_color_'.esc_attr($color).':after { 
            background-color: #'.esc_attr($color).esc_attr( $override ).';
          }';
          
          self::$element_css[] = '.nectar-fancy-box[data-style="color_box_hover"][data-color].box_color_'.esc_attr($color).':hover:before { 
             box-shadow: 0 30px 90px #'.esc_attr($color).';
          }
          .nectar-fancy-box[data-style="color_box_hover"][data-color].box_color_'.esc_attr($color).':not(:hover) i.icon-default-style { 
             color: #'.esc_attr($color).esc_attr( $override ).';
          }
          .nectar-fancy-box[data-style="color_box_hover"][data-color].box_color_'.esc_attr($color).' .box-bg:after { 
             background-color: #'.esc_attr($color).esc_attr( $override ).';
          }';

        }
          
  
      } // End Fancy Box
    
    
  }  
  
  
  
  /**
  * Prepares font sizing
  */
  public static function font_sizing_format($str) {
    
    if( strpos($str,'vw') !== false || 
      strpos($str,'vh') !== false || 
      strpos($str,'em') !== false || 
      strpos($str,'rem') !== false ) {
      return $str;
    } else {
      return intval($str) . 'px';
    }
    
  }
  

  /**
  * Verifies custom coloring is in use.
  */
  public static function custom_color_bool($param, $atts) {
    
    if(isset($atts[$param.'_type']) && 
			!empty($atts[$param.'_type']) && 
			'custom' === $atts[$param.'_type'] &&
			isset($atts[$param.'_custom']) && 
			!empty($atts[$param.'_custom']) ) {
			return true;
		}
		return false;
    
  }
  
  
  /**
  * Determines the unit type px or percent
  */
  public static function percent_unit_type($str) {
    
    if( false !== strpos($str,'%') ) {
      return intval($str) . '%';
    } else if( false !== strpos($str,'vh') ) {
      return intval($str) . 'vh';
    } else if( false !== strpos($str,'vw') ) {
      return intval($str) . 'vw';
    } else if( 'auto' === $str ) {
			return 'auto';
		}
    
    return intval($str) . 'px';
    
  }
  
  /**
  * Determines the unit type classname px or percent
  */
  public static function percent_unit_type_class($str) {
    
    if( false !== strpos($str,'%') ) {
      return str_replace('%','pct', $str);
    } else if( false !== strpos($str,'vh') ) {
      return intval($str) . 'vh';
    } else if( false !== strpos($str,'vw') ) {
      return intval($str) . 'vw';
    } else if( 'auto' === $str ) {
			return 'auto';
		}
    
    return intval($str) . 'px';
  }
  
  
  
}

$nectar_el_dynamic_styles = new NectarElDynamicStyles();

