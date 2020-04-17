<?php 

extract(shortcode_atts(array(
	"columns" => "1", 
	"column_layout_using_2_columns" => 'even',
	"column_layout_using_3_columns" => 'even',
	"column_layout_using_4_columns" => 'even',
	"col_1_text_align" => "left",
	"col_2_text_align" => "left",
	"col_3_text_align" => "left",
	"col_4_text_align" => "left",
	"col_1_text_element" => "p",
	"col_2_text_element" => "p",
	"col_3_text_element" => "p",
	"col_4_text_element" => "p",
	"col_1_content" => '',
	"col_2_content" => '',
	"col_3_content" => '',
	"col_4_content" => '',
	"cta_1_text" => '',
	"cta_1_url" => '',
	"cta_1_open_new_tab" => '',
	"cta_2_text" => '',
	"cta_2_url" => '',
	"cta_2_open_new_tab" => '',
	"open_new_tab" => '',
	"url" => '',
	"hover_effect" => 'default',
	"hover_color" => 'accent-color',
	'font_family' => 'p'
), $atts));


if( $columns === '2' ) {
	$column_layout_to_use = $column_layout_using_2_columns;
} 
else if( $columns === '3' ) {
	$column_layout_to_use = $column_layout_using_3_columns;
} 
else if( $columns === '4' ) {
	$column_layout_to_use = $column_layout_using_4_columns;
} 
else {
	$column_layout_to_use = 'default';
}

$hasbtn_class = (!empty($cta_1_text) || !empty($cta_2_text)) ? 'has-btn' : null;

echo '<div class="nectar-hor-list-item '.$hasbtn_class.'" data-hover-effect="'.esc_attr($hover_effect).'" data-font-family="'.esc_attr($font_family).'" data-color="'.esc_attr($hover_color).'" data-columns="'.esc_attr($columns).'" data-column-layout="'.esc_attr($column_layout_to_use).'">'; 
	
	for($i = 0; $i < intval($columns); $i++) {

		$index_to_grab = $i+1;

		if(!isset($atts['col_'.$index_to_grab.'_text_align'])) { 
			$atts['col_'.$index_to_grab.'_text_align'] = null; 
		}
		if(!isset($atts['col_'.$index_to_grab.'_text_element'])) { 
			$atts['col_'.$index_to_grab.'_text_element'] = null; 
		}
		if(!isset($atts['col_'.$index_to_grab.'_content'])) {
			$atts['col_'.$index_to_grab.'_content'] = null; 
		}

		$cta_1_markup = $cta_2_markup = null;

		// Add btns into last col.
		if( $index_to_grab == intval($columns) ) {
			
			if( !empty($cta_1_text) ) {

				$btn_target_markup = (!empty($cta_1_open_new_tab) && $cta_1_open_new_tab == 'true' ) ? 'target="_blank"' : null;
				$cta_1_markup      = '<a class="nectar-list-item-btn" href="'.esc_url($cta_1_url).'" '.$btn_target_markup.'>'.wp_kses_post($cta_1_text).'</a>';
			}
			if( !empty($cta_2_text) ) {
				
				$btn_target_markup = (!empty($cta_2_open_new_tab) && $cta_2_open_new_tab == 'true' ) ? 'target="_blank"' : null;
				$cta_2_markup      = '<a class="nectar-list-item-btn second" href="'.esc_url($cta_2_url).'" '.$btn_target_markup.'>'.wp_kses_post($cta_2_text).'</a>';
			}
		}
		
		$opening_tag = null;
		$closing_tag = null;
		
		if( !empty($atts['col_'.$index_to_grab.'_text_element']) && $atts['col_'.$index_to_grab.'_text_element'] !== 'p' ) {
			$opening_tag = '<' . $atts['col_'.$index_to_grab.'_text_element'] . '>';
			$closing_tag = '</' . $atts['col_'.$index_to_grab.'_text_element'] . '>';
		}
		
		echo '<div class="nectar-list-item" data-text-align="'.esc_attr($atts['col_'.$index_to_grab.'_text_align']).'">'. $opening_tag . wp_kses_post($atts['col_'.$index_to_grab.'_content']) . $closing_tag . $cta_1_markup . $cta_2_markup. '</div>';
	}

$url_markup = null;

if( !empty($url) ) {
	
	$target = null;
	if(!empty($open_new_tab) && $open_new_tab === 'true') {
		$target = 'target="_blank"';
	}
	$url_markup = '<a class="full-link" '.$target.' href="'.esc_url($url).'"></a>';
}

echo wp_kses_post( $url_markup ).'</div>';

?>