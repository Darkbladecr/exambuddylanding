<?php

$text = $color = '';

extract(shortcode_atts(array(
	'highlight_color' => '',
	'secondary_color' => '',
  'style' => 'full_text',
	'delay' => 'false'
), $atts));

$using_custom_color = (!empty($highlight_color)) ? 'true' : 'false';

echo '<div class="nectar-highlighted-text" data-style="'.esc_attr($style).'" data-using-custom-color="'.esc_attr($using_custom_color).'" data-animation-delay="'.esc_attr($delay).'" data-color="'.esc_attr($highlight_color).'" data-color-gradient="'.esc_attr($secondary_color).'" style="">'.$content.'</div>';