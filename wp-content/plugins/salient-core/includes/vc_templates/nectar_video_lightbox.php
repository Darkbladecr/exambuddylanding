<?php 

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

extract(shortcode_atts(array(
	"link_style" => "play_button", 
  'hover_effect' => 'default', 
	"font_style" => "p", 
	"video_url" => '#', 
	"link_text" => "", 
	"play_button_color" => "default", 
	"nectar_button_color" => "default", 
	'nectar_play_button_color' => 'Accent-Color', 
	'image_url' => '', 
	'image_size' => 'full',
	'border_radius' => 'none',
	'play_button_size' => 'default',
	'nectar_play_button_style' => 'default',
	'parent_hover_relationship' => '',
	'mouse_indicator_style' => 'default',
	'mouse_indicator_color' => '',
	'box_shadow' => ''), $atts));

$wp_image_size = ( !empty($image_size) ) ? $image_size : 'full';
	

$extra_attrs   = ($link_style === 'nectar-button') ? 'data-color-override="false"': null;

$the_link_text_escaped = ($link_style === 'nectar-button') ? wp_kses_post($link_text) : '<span class="play"><span class="inner-wrap"><svg version="1.1"
	 xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="600px" height="800px" x="0px" y="0px" viewBox="0 0 600 800" enable-background="new 0 0 600 800" xml:space="preserve"><path fill="none" d="M0-1.79v800L600,395L0-1.79z"></path> </svg></span></span>';

$the_color = ($link_style === 'nectar-button') ? $nectar_button_color : $play_button_color;

if( $link_style === 'play_button_with_text' ) {
	$the_color = $nectar_play_button_color;
}

if( $link_style === 'play_button_2' || $link_style === 'play_button_mouse_follow' ) {

	  $image = null;

	  if( !empty($image_url) ) {
			
      	if( !preg_match('/^\d+$/',$image_url) ){
      		$image = '<img src="'.esc_url($image_url).'" alt="'. esc_html__('video preview', 'salient-core') .'" />';
      	} else {
      		$image = wp_get_attachment_image($image_url, $wp_image_size);
      	}  
		}
		
	$mouse_markup = ( $link_style === 'play_button_mouse_follow' ) ? 'data-mouse-style="'.esc_attr($mouse_indicator_style).'" data-mouse-icon-color="'.esc_attr($mouse_indicator_color).'"': '';	
	echo '<div class="nectar-video-box" data-color="'.esc_attr(strtolower($nectar_play_button_color)).'" '.$mouse_markup.' data-play-button-size="'.esc_attr($play_button_size).'" data-border-radius="'.esc_attr($border_radius).'" data-hover="'.esc_attr($hover_effect).'" data-shadow="'.esc_attr($box_shadow).'"><div class="inner-wrap"><a href="'.esc_url($video_url).'" class="full-link pp"></a>'. $image;
}

$pbwt_escaped = ($link_style === 'play_button_with_text') ? '<span class="link-text"><'.esc_html($font_style).'>'.wp_kses_post($link_text).'</'.esc_html($font_style).'></span>' : null;
if( $font_style === 'nectar-btn-medium' || $font_style === 'nectar-btn-large' || $font_style === 'nectar-btn-jumbo' ) {
	$pbwt_escaped = '<span class="link-text" data-font="'.esc_attr($font_style).'">'.wp_kses_post($link_text).'</span>';
}

echo '<a href="'.esc_url($video_url).'" '.$extra_attrs.' data-style="'. esc_attr($nectar_play_button_style) .'" data-parent-hover="'.esc_attr($parent_hover_relationship).'" data-font-style="'.esc_html($font_style).'" data-color="'.esc_attr(strtolower($the_color)).'" class="'.esc_attr($link_style).' large nectar_video_lightbox pp"><span>'.$the_link_text_escaped .$pbwt_escaped.'</span></a>';

if( $link_style === 'play_button_2' || $link_style === 'play_button_mouse_follow' ) {
	echo '</div></div>';
}

?>