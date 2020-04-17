<?php 

extract(shortcode_atts(array(
  "animation" => 'Fade In',
  "delay" => '0', 
  "image_url" => '', 
  'alt' => '', 
  'margin_top' => '', 
  'margin_right' => '', 
  'margin_bottom' => '', 
  'margin_left' => '', 
  'alignment' => 'left', 
  'border_radius' => '', 
  'img_link_target' => '_self', 
  'img_link' => '', 
  'img_link_large' => '', 
  'hover_animation' => 'none',
  'hover_overlay_color' => '',
  'box_shadow' => 'none', 
  'box_shadow_direction' => 'middle', 
  'image_loading' => 'normal',
  'max_width' => '100%',
  'max_width_mobile' => '100%',
  'el_class' => ''), $atts));
    
  $parsed_animation = str_replace(" ","-",$animation);
  (!empty($alt)) ? $alt_tag = $alt : $alt_tag = null;
  
  $image_width  = '100';
  $image_height = '100';
  $image_srcset = null;
  $has_dimension_data = false;
  
  if( preg_match('/^\d+$/',$image_url) ) {
    
    $image_src = wp_get_attachment_image_src($image_url, 'full');
  
    if (function_exists('wp_get_attachment_image_srcset')) {
  
      $image_srcset_values = wp_get_attachment_image_srcset($image_url, 'full');
      if($image_srcset_values) {
        
        if( 'lazy-load' === $image_loading ) {
          $image_srcset = 'data-nectar-img-srcset="';
        } else {
          $image_srcset = 'srcset="';
        }
        $image_srcset .= $image_srcset_values;
        $image_srcset .= '" sizes="(min-width: 1450px) 75vw, (min-width: 1000px) 85vw, 100vw"';
      }
    }
    
    $image_meta = wp_get_attachment_metadata($image_url);
    
    if(isset($image_meta['width']) && !empty($image_meta['width'])) {
      $image_width = $image_meta['width'];
    }
    if(isset($image_meta['height']) && !empty($image_meta['height'])) {
      $image_height = $image_meta['height'];}
      
    // Needed for lazy loading.  
    if( !empty($image_meta['width']) && !empty($image_meta['height']) ) {
      $has_dimension_data = true;
    }
  
    $wp_img_alt_tag = get_post_meta( $image_url, '_wp_attachment_image_alt', true );
    
    if(!empty($wp_img_alt_tag)) {
      $alt_tag = $wp_img_alt_tag;
    }
    
    $image_url = $image_src[0];
    
  }
  
  $margins = '';
  
  if( !empty($margin_top) ) {
    
    if( strpos($margin_top,'%') !== false ) {
      $margins .= 'margin-top: '.intval($margin_top).'%; ';
    } else {
      $margins .= 'margin-top: '.intval($margin_top).'px; ';
    }
  
  }
  if( !empty($margin_right) ) {
    
    if( strpos($margin_right,'%') !== false ) {
      $margins .= 'margin-right: '.intval($margin_right).'%; ';
    } else {
      $margins .= 'margin-right: '.intval($margin_right).'px; ';
    }
    
  }
  if( !empty($margin_bottom) ) {
    
    if( strpos($margin_bottom,'%') !== false ) {
      $margins .= 'margin-bottom: '.intval($margin_bottom).'%; ';
    } else {
      $margins .= 'margin-bottom: '.intval($margin_bottom).'px; ';
    }
    
  }
  if( !empty($margin_left) ) {
    
    if( strpos($margin_left,'%') !== false ) {
      $margins .= 'margin-left: '.intval($margin_left).'%;';
    } else {
      $margins .= 'margin-left: '.intval($margin_left).'px;';
    }
    
  }
  
  $margin_style_attr = '';
  
  if( !empty($margins) ) {
     $margin_style_attr = ' style="'.$margins.'"';
  }
  
  // Attributes applied to img-with-animation-wrap.
  $wrap_image_attrs_escaped  = 'data-max-width="'.esc_attr($max_width).'" ';
  $wrap_image_attrs_escaped .= 'data-max-width-mobile="'.esc_attr($max_width_mobile).'" ';
  $wrap_image_attrs_escaped .= 'data-border-radius="'.esc_attr($border_radius).'" ';
  $wrap_image_attrs_escaped .= 'data-shadow="'.esc_attr($box_shadow).'" ';
  $wrap_image_attrs_escaped .= 'data-animation="'.esc_attr(strtolower($parsed_animation)).'" ';
  $wrap_image_attrs_escaped .= $margin_style_attr;
  
  // Attributes applied to img.
  $image_attrs_escaped = 'data-delay="'.esc_attr($delay).'" ';
  $image_attrs_escaped .= 'height="'.esc_attr($image_height).'" ';
  $image_attrs_escaped .= 'width="'.esc_attr($image_width).'" ';
  $image_attrs_escaped .= 'data-animation="'.esc_attr(strtolower($parsed_animation)).'" ';
  if( 'lazy-load' === $image_loading && true === $has_dimension_data ) {
    $el_class .= ' nectar-lazy';
    $image_attrs_escaped .= 'data-nectar-img-src="'.esc_url($image_url).'" ';
  } else {
    $image_attrs_escaped .= 'src="'.esc_url($image_url).'" ';
  }
  $image_attrs_escaped .= 'alt="'.esc_attr($alt_tag).'" ';
  $image_attrs_escaped .= $image_srcset;
  
  $color_overlay_markup_escaped = null;
  if( 'color-overlay' === $hover_animation && !empty($hover_overlay_color) ) {
    $color_overlay_markup_escaped = '<div class="color-overlay" style="background-color: '.esc_attr($hover_overlay_color).';"></div>';
  }
  
  if( !empty($img_link) || !empty($img_link_large) ) {
    
    if( !empty($img_link) && empty($img_link_large) ) {
      // Link image to larger version.
      echo '<div class="img-with-aniamtion-wrap '.esc_attr($alignment).'" '.$wrap_image_attrs_escaped.'>
      <div class="inner">
        <div class="hover-wrap" data-hover-animation="'.esc_attr($hover_animation).'"> '.$color_overlay_markup_escaped.'
          <div class="hover-wrap-inner">
            <a href="'.esc_url($img_link).'" target="'.esc_attr($img_link_target).'" class="'.esc_attr($alignment).'">
              <img class="img-with-animation skip-lazy '.esc_attr($el_class).'" '.$image_attrs_escaped.' />
            </a>
          </div>
        </div>
      </div>
      </div>';
      
    } elseif(!empty($img_link_large)) {
      // Regular link image.
      echo '<div class="img-with-aniamtion-wrap '.esc_attr($alignment).'" '.$wrap_image_attrs_escaped.'>
      <div class="inner">
        <div class="hover-wrap" data-hover-animation="'.esc_attr($hover_animation).'"> '.$color_overlay_markup_escaped.'
          <div class="hover-wrap-inner">
            <a href="'.esc_url($image_url).'" class="pp '.esc_attr($alignment).'">
              <img class="img-with-animation skip-lazy '.esc_attr($el_class).'" '.$image_attrs_escaped.' />
            </a>
          </div>
        </div>
      </div>
      </div>';
    }
    
  } else {
    // No link image.
    echo '<div class="img-with-aniamtion-wrap '.esc_attr($alignment).'" '.$wrap_image_attrs_escaped.'>
      <div class="inner">
        <div class="hover-wrap" data-hover-animation="'.esc_attr($hover_animation).'"> '.$color_overlay_markup_escaped.'
          <div class="hover-wrap-inner">
            <img class="img-with-animation skip-lazy '.esc_attr($el_class).'" '.$image_attrs_escaped.' />
          </div>
        </div>
      </div>
    </div>';
  }

?>