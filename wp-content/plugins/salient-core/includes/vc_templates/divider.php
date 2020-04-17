<?php 

extract(shortcode_atts(array(
  "line" => 'false', 
  "custom_height" => '25', 
  "line_type" => 'No Line', 
  "line_alignment" => 'default', 
  'line_thickness' => '1', 
  'custom_line_width' => '20%', 
  'divider_color' => 'default', 
  'animate' => '', 
  'delay' => ''), $atts));
  
  if ($line_type === 'Small Thick Line' || $line_type === 'Small Line' ) {
    $height  = (!empty($custom_height)) ? 'style="margin-top: '.intval($custom_height/2).'px; width: '.esc_attr($custom_line_width).'px; height: '.esc_attr($line_thickness).'px; margin-bottom: '.intval($custom_height/2).'px;"' : null;
    $divider = '<div '.$height.' data-width="'.esc_attr($custom_line_width).'" data-animate="'.esc_attr($animate).'" data-animation-delay="'.esc_attr($delay).'" data-color="'.esc_attr($divider_color).'" class="divider-small-border"></div>';
  } 
  else if ($line_type === 'Full Width Line') {
    $height  = (!empty($custom_height)) ? 'style="margin-top: '.intval($custom_height/2).'px; height: '.esc_attr($line_thickness).'px; margin-bottom: '.intval($custom_height/2).'px;"' : null;
    $divider = '<div '.$height.' data-width="100%" data-animate="'.esc_attr($animate).'" data-animation-delay="'.esc_attr($delay).'" data-color="'.esc_attr($divider_color).'" class="divider-border"></div>';
  } 
  else {
    $height  = (!empty($custom_height)) ? 'style="height: '.intval($custom_height).'px;"' : null;
    $divider = '<div '.$height.' class="divider"></div>';
  }
  // old option
  if ($line === 'true') {
    $divider = '<div class="divider-border"></div>';
  }
  echo '<div class="divider-wrap" data-alignment="' . esc_attr($line_alignment) . '">'.$divider.'</div>';

?>