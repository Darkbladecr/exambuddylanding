<?php 

extract(shortcode_atts(array(
	"carousel_title" => '', 
	"scroll_speed" => 'medium', 
	'loop' => 'false', 
	'color' => 'default',
	'flickity_fixed_content' => '', 
	'flickity_formatting' => 'default', 
	'flickity_controls' => 'default',
	'flickity_overflow' => 'hidden',
	'flickity_wrap_around' => 'wrap',
	'flickity_spacing' => 'default',
	'easing' => 'easeInExpo', 
	'autorotate' => '', 
	'enable_animation' => '', 
	'delay' => '', 
	'autorotation_speed' => '5000',
	'column_padding' => '' ,
	'script' => 'carouFredSel', 
	'desktop_cols' => '4', 
	'desktop_small_cols' => '3', 
	'tablet_cols' => '2',
	'mobile_cols' => '1', 
	'cta_button_text' => '', 
	'cta_button_url' => '', 
	'cta_button_open_new_tab' => '', 
	'button_color' => '', 
	'enable_column_border' => '', 
	'border_radius' => 'none', 
	'pagination_alignment_flickity' => 'default',
	'column_color' => '', 
	'desktop_cols_flickity' => '3', 
	'desktop_small_cols_flickity' => '3', 
	'tablet_cols_flickity' => '2'), $atts));


if( isset($_GET['vc_editable']) ) {
	
	$nectar_using_VC_front_end_editor = sanitize_text_field($_GET['vc_editable']);
	$nectar_using_VC_front_end_editor = ($nectar_using_VC_front_end_editor == 'true') ? true : false;
	// Limit script choices on front end editor.
	if($nectar_using_VC_front_end_editor && $script !== 'flickity') {
		$script = 'flickity';
	}
	
}

$GLOBALS['nectar-carousel-script']       = $script;
$GLOBALS['nectar_carousel_column_color'] = $column_color;

if( $script === 'carouFredSel' ) {
	?>
	
	<div class="carousel-wrap" data-full-width="false">
	<div class="carousel-heading">
		<div class="container">
			<h2 class="uppercase"><?php echo wp_kses_post($carousel_title); ?></h2>
			<div class="control-wrap">
				<a class="carousel-prev" href="#"><i class="icon-angle-left"></i></a>
				<a class="carousel-next" href="#"><i class="icon-angle-right"></i></a>
			</div>
		</div>
	</div>
	<ul class="row carousel" data-scroll-speed="<?php echo esc_attr($scroll_speed); ?>" data-easing="<?php echo esc_attr($easing); ?>" data-autorotate="<?php echo esc_attr($autorotate); ?>">
	<?php echo do_shortcode($content) . '</ul></div>';
} 

else if( $script === 'owl_carousel' ) {
	$delay = intval($delay);
	echo '<div class="owl-carousel" data-enable-animation="'.esc_attr($enable_animation).'" data-loop="'.esc_attr($loop).'"  data-animation-delay="'.esc_attr($delay).'" data-autorotate="' . esc_attr($autorotate) . '" data-autorotation-speed="'.esc_attr($autorotation_speed).'" data-column-padding="'.esc_attr($column_padding).'" data-desktop-cols="'.esc_attr($desktop_cols).'" data-desktop-small-cols="'.esc_attr($desktop_small_cols).'" data-tablet-cols="'.esc_attr($tablet_cols).'" data-mobile-cols="'.esc_attr($mobile_cols).'">';
	echo do_shortcode($content);
	echo '</div>';
} 

else if( $script === 'flickity' ) {
	
	if( $flickity_formatting === 'fixed_text_content_fullwidth' ) {
		
		echo '<div class="nectar-carousel-flickity-fixed-content" data-control-color="'.esc_attr($color).'"> <div class="nectar-carousel-fixed-content">';
		echo do_shortcode($flickity_fixed_content);
		
		if(!empty($cta_button_text)) {
			
			global $nectar_options;
			
			$button_color      = strtolower($button_color);
			$regular_btn_class = ' regular-button';
			$btn_text_markup   = '<span>'.$cta_button_text.'</span> <i class="icon-button-arrow"></i>';
			
			if($button_color === 'extra-color-gradient-1' || $button_color === 'extra-color-gradient-2') {
				$regular_btn_class = '';
				$btn_text_markup   = '<span class="start">'.$cta_button_text.' <i class="icon-button-arrow"></i></span><span class="hover">'.$cta_button_text.' <i class="icon-button-arrow"></i></span>';
			}
			
			if($nectar_options['theme-skin'] === 'material' && $button_color === 'extra-color-gradient-1') {
				$button_color    = 'm-extra-color-gradient-1';
				$btn_text_markup = '<span>'.$cta_button_text.'</span> <i class="icon-button-arrow"></i>';
			} 
			
			else if( $nectar_options['theme-skin'] === 'material' && $button_color === 'extra-color-gradient-2') {
				$button_color    = 'm-extra-color-gradient-2';
				$btn_text_markup = '<span>'.$cta_button_text.'</span> <i class="icon-button-arrow"></i>';
			} 
			
			$btn_target_markup = (!empty($cta_button_open_new_tab) && $cta_button_open_new_tab == 'true' ) ? 'target="_blank"' : null;
			
			echo '<div><a class="nectar-button large regular '. $button_color .  $regular_btn_class . ' has-icon" href="'.esc_url($cta_button_url).'" '.$btn_target_markup.' data-color-override="false" data-hover-color-override="false" data-hover-text-color-override="#fff">'.$btn_text_markup.'</a></div>';
		}
		
		echo '</div>';
		
	}
	
	
	echo '<div class="nectar-flickity not-initialized nectar-carousel" data-control-color="'.esc_attr($color).'" data-overflow="'.esc_attr($flickity_overflow).'" data-wrap="'.esc_attr($flickity_wrap_around).'" data-spacing="'.esc_attr($flickity_spacing).'" data-controls="'.esc_attr($flickity_controls).'" data-pagination-alignment="'.esc_attr($pagination_alignment_flickity).'" data-border-radius="'.esc_attr($border_radius).'" data-column-border="'.esc_attr($enable_column_border).'" data-column-padding="'.esc_attr($column_padding).'" data-format="'.esc_attr($flickity_formatting).'" data-autoplay="'.esc_attr($autorotate).'" data-autoplay-dur="'.esc_attr($autorotation_speed).'" data-control-style="material_pagination" data-desktop-columns="'.esc_attr($desktop_cols_flickity).'" data-small-desktop-columns="'.esc_attr($desktop_small_cols_flickity).'" data-tablet-columns="'.esc_attr($tablet_cols_flickity).'" data-column-color="'.esc_attr($column_color).'">';
	echo '<div class="flickity-viewport"> <div class="flickity-slider">' . do_shortcode($content) . '</div></div>';
	echo '</div>';
	
	if( $flickity_formatting === 'fixed_text_content_fullwidth' ) {
		echo '</div>';
	}
	
}

?>