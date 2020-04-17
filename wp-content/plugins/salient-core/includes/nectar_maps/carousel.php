<?php 

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$tab_id_1 = time().'-1-'.rand(0, 100);
$tab_id_2 = time().'-2-'.rand(0, 100);
$tab_id_3 = time().'-3-'.rand(0, 100);

$vc_is_wp_version_3_6_more = version_compare(preg_replace('/^([\d\.]+)(\-.*$)/', '$1', get_bloginfo('version')), '3.6') >= 0;

return array(
	"name"  => esc_html__("Carousel", 'salient-core'),
	"base" => "carousel",
	"show_settings_on_create" => true,
	"is_container" => true,
	"icon" => "icon-wpb-carousel",
	"category" => esc_html__('Nectar Elements', 'salient-core'),
	"description" => esc_html__('A simple carousel for any content', 'salient-core'),
	"params" => array(
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__('Carousel Script','salient-core'),
			'save_always' => true,
			"param_name" => "script",
			"value" => array(
				"carouFredSel" => "carouFredSel",
				"Owl Carousel" => "owl_carousel",
				"Flickity" => "flickity"
			),
			"description" => esc_html__("Owl Carousel and Flickity are recommended over carouFredSel - however carouFredSel is still available for legacy users who prefer it." , "salient-core")
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__('Style','salient-core'),
			'save_always' => true,
			"param_name" => "flickity_formatting",
			"value" => array(
				esc_html__("Default", "salient-core") => "default",
				esc_html__("Fixed Text Content Fullwidth", "salient-core") => "fixed_text_content_fullwidth",
			),
			"dependency" => array('element' => "script", 'value' => 'flickity'),
			"description" => esc_html__("Select the formatting of your carousel. When using the \"Fixed Text Content Fullwidth\" format, the carousel should be the only element in your row and inside of a full (1/1) column." , 'salient-core')
		),
		array(
			"type" => "textarea",
			"holder" => "div",
			"heading" => esc_html__("Text Content", 'salient-core'),
			"param_name" => "flickity_fixed_content",
			"value" => '',
			"dependency" => array('element' => "flickity_formatting", 'value' => array('fixed_text_content_fullwidth')),
			"description" => esc_html__("Enter any text/content you would like to be shown prominently in your carousel", 'salient-core'),
			"admin_label" => false
		),
		
		array(
			"type" => "textfield",
			"heading" => esc_html__("CTA Button Text", 'salient-core'),
			"param_name" => "cta_button_text",
			"description" => esc_html__("Enter your CTA text here" , 'salient-core'),
			"dependency" => array('element' => "flickity_formatting", 'value' => array('fixed_text_content_fullwidth'))
		),
		
		array(
			"type" => "textfield",
			"heading" => esc_html__("CTA Button Link URL", 'salient-core'),
			"param_name" => "cta_button_url",
			"description" => esc_html__("Enter your URL here" , 'salient-core'),
			"dependency" => array('element' => "flickity_formatting", 'value' => array('fixed_text_content_fullwidth'))
		),
		
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => esc_html__("CTA Button Open in New Tab", 'salient-core'),
			"param_name" => "cta_button_open_new_tab",
			"value" => Array(esc_html__("Yes", 'js_composer') => 'true'),
			"description" => "",
			"dependency" => array('element' => "flickity_formatting", 'value' => array('fixed_text_content_fullwidth'))
		),
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			'save_always' => true,
			"heading" => esc_html__('CTA Button Color','salient-core'),
			"param_name" => "button_color",
			"value" => array(
				esc_html__( "Accent Color", "salient-core") => "Accent-Color",
				esc_html__( "Extra Color 1", "salient-core") => "Extra-Color-1",
				esc_html__( "Extra Color 2", "salient-core") => "Extra-Color-2",	
				esc_html__( "Extra Color 3", "salient-core") => "Extra-Color-3",
				esc_html__( "Color Gradient 1", "salient-core") => "extra-color-gradient-1",
				esc_html__( "Color Gradient 2", "salient-core") => "extra-color-gradient-2"
			),
			"dependency" => array('element' => "flickity_formatting", 'value' => array('fixed_text_content_fullwidth')),
			'description' => __( 'Choose a color from your','salient-core') . ' <a target="_blank" href="'. esc_url(admin_url()) .'?page=Salient&tab=6"> ' . esc_html__('globally defined color scheme','salient-core') . '</a>',
		),
		
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__('Columns','salient-core') . '<span>' . esc_html__('Desktop','salient-core') . '</span>',
			'save_always' => true,
			"param_name" => "desktop_cols",
			"value" => array(
				"Default (4)" => "4",
				"1" => "1",
				"2" => "2",
				"3" => "3",
				"4" => "4",
				"5" => "5",
				"6" => "6",
				"7" => "7",
				"8" => "8",
			),
			"edit_field_class" => "col-md-2 vc_column",
			"dependency" => array('element' => "script", 'value' => array('owl_carousel')),
			"description" => ''
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => "<span>" . esc_html__('Desktop Small','salient-core') . "</span>",
			'save_always' => true,
			"param_name" => "desktop_small_cols",
			"value" => array(
				"Default (3)" => "3",
				"1" => "1",
				"2" => "2",
				"3" => "3",
				"4" => "4",
				"5" => "5",
				"6" => "6",
				"7" => "7",
				"8" => "8",
			),
			"edit_field_class" => "col-md-2 vc_column",
			"dependency" => array('element' => "script", 'value' => array('owl_carousel')),
			"description" => ''
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => "<span>" . esc_html__('Tablet','salient-core') . "</span>",
			'save_always' => true,
			"param_name" => "tablet_cols",
			"value" => array(
				"Default (2)" => "2",
				"1" => "1",
				"2" => "2",
				"3" => "3",
				"4" => "4",
				"5" => "5",
				"6" => "6",
			),
			"edit_field_class" => "col-md-2 vc_column",
			"dependency" => array('element' => "script", 'value' => array('owl_carousel')),
			"description" => ''
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => "<span>" . esc_html__('Mobile','salient-core') . "</span>",
			'save_always' => true,
			"param_name" => "mobile_cols",
			"value" => array(
				"Default (1)" => "1",
				"1" => "1",
				"2" => "2",
				"3" => "3",
				"4" => "4",
			),
			"dependency" => array('element' => "script", 'value' => array('owl_carousel')),
			"edit_field_class" => "col-md-2 vc_column",
			"description" => ''
		),
		
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__('Columns','salient-core') . '<span>' . esc_html__('Desktop','salient-core') . '</span>',
			'save_always' => true,
			"param_name" => "desktop_cols_flickity",
			"value" => array(
				"Default (3)" => "3",
				"1" => "1",
				"2" => "2",
				"3" => "3",
				"4" => "4",
				"5" => "5",
				"6" => "6",
			),
			"edit_field_class" => "col-md-2 vc_column",
			"dependency" => array('element' => "script", 'value' => array('flickity')),
			"description" => ''
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => "<span>" . esc_html__('Desktop Small','salient-core') . "</span>",
			'save_always' => true,
			"param_name" => "desktop_small_cols_flickity",
			"value" => array(
				"Default (3)" => "3",
				"1" => "1",
				"2" => "2",
				"3" => "3",
				"4" => "4",
				"5" => "5",
				"6" => "6",
			),
			"edit_field_class" => "col-md-2 vc_column",
			"dependency" => array('element' => "script", 'value' => array('flickity')),
			"description" => ''
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => "<span>" . esc_html__('Tablet','salient-core') . "</span>",
			'save_always' => true,
			"param_name" => "tablet_cols_flickity",
			"value" => array(
				"Default (2)" => "2",
				"1" => "1",
				"2" => "2",
				"3" => "3"
			),
			"edit_field_class" => "col-md-2 vc_column",
			"dependency" => array('element' => "script", 'value' => array('flickity')),
			"description" => ''
		),
		
		array(
			  "type" => "dropdown",
			  "heading" => esc_html__("Controls", "salient-core"),
			  "param_name" => "flickity_controls",
			  "value" => array(
				    "Pagination" => "default",
						"Next/Prev Arrows Overlaid" => "next_prev_arrows_overlaid",
						"Touch Indicator and Total Visualized" => "touch_total"
				),
			  'save_always' => true,
				"dependency" => array('element' => "flickity_formatting", 'value' => array('default')),
			  "description" => esc_html__("Please select the controls you would like for your gallery ", "salient-core"),
		),
		
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			'save_always' => true,
			"heading" => esc_html__('Control Coloring','salient-core'),
			"param_name" => "color",
			"value" => array(
				esc_html__( "Default (inherit from row Text Color)", "salient-core") => "default",
				esc_html__( "Accent Color", "salient-core") => "accent-color",
				esc_html__( "Extra Color 1", "salient-core") => "extra-color-1",
				esc_html__( "Extra Color 2", "salient-core") => "extra-color-2",	
				esc_html__( "Extra Color 3", "salient-core") => "extra-color-3"
			),
			"dependency" => array('element' => "script", 'value' => array('flickity')),
			'description' => __( 'Choose a color from your','salient-core') . ' <a target="_blank" href="'. esc_url(admin_url()) .'?page=Salient&tab=6"> ' . esc_html__('globally defined color scheme','salient-core') . '</a>',
		),
		
		array(
			  "type" => "dropdown",
			  "heading" => esc_html__("Overflow Visibility", "salient-core"),
			  "param_name" => "flickity_overflow",
			  "value" => array(
				    "Hidden" => "hidden",
				    "Visible" => "visible",
				),
			  'save_always' => true,
			  "dependency" => array('element' => "flickity_formatting", 'value' => array('default')),
		),
		
		array(
			  "type" => "dropdown",
			  "heading" => esc_html__("Wrap Around Items", "salient-core"),
			  "param_name" => "flickity_wrap_around",
			  "value" => array(
				    "Wrap Around (infinite loop)" => "wrap",
				    "Do Not Wrap" => "no-wrap",
				),
				'description' => 'At the end of the items, determine if they should wrap-around to the other end for an infinite loop.',
			  'save_always' => true,
			  "dependency" => array('element' => "flickity_formatting", 'value' => array('default')),
		),
		
		
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Pagination Alignment", 'salient-core'),
			'save_always' => true,
			"param_name" => "pagination_alignment_flickity",
			"value" => array(
				"Middle" => "default",
				"Left" => "left",
				"Right" => "right"
			),
			"dependency" => array('element' => "flickity_controls", 'value' => array('default')),
			"description" => ''
		),
		
		array(
			"type" => "textfield",
			"heading" => esc_html__("Carousel Title", 'salient-core'),
			"param_name" => "carousel_title",
			"dependency" => array('element' => "script", 'value' => array('carouFredSel')),
			"description" => esc_html__("Enter the title you would like at the top of your carousel (optional)" , 'salient-core')
		),
		
		array(
			  "type" => "dropdown",
			  "heading" => esc_html__("Item Spacing", "salient-core"),
			  "param_name" => "flickity_spacing",
			  "value" => array(
				    "Default" => "default",
				    "5px" => "5px",
				    "10px" => "10px",
						"20px" => "20px",
						"30px" => "30px"
				),
			  'save_always' => true,
				"description" => 'Select the spacing that will be between each carousel item. (Applied to both sides of each item)',
			  "dependency" => array('element' => "flickity_formatting", 'value' => array('default')),
		),
		
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Column Padding", 'salient-core'),
			'save_always' => true,
			"param_name" => "column_padding",
			"value" => array(
				"None" => "0",
				"5px" => "5px",
				"10px" => "10px",
				"15px" => "15px",
				"20px" => "20px",
				"30px" => "30px",
				"40px" => "40px",
				"50px" => "50px"
			),
			"dependency" => array('element' => "script", 'value' => array('owl_carousel','flickity')),
			"description" => esc_html__("Please select your desired column padding " , 'salient-core')
		),
		array(
			"type" => "textfield",
			"heading" => esc_html__("Transition Scroll Speed", 'salient-core'),
			"param_name" => "scroll_speed",
			"dependency" => array('element' => "script", 'value' => array('carouFredSel')),
			"description" => esc_html__("Enter in milliseconds (default is 700)" , 'salient-core')
		),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => esc_html__("Loop?", 'salient-core'),
			"param_name" => "loop",
			"value" => Array(esc_html__("Yes", 'js_composer') => 'true'),
			"dependency" => array('element' => "script", 'value' => array('owl_carousel')),
			"description" => ""
		),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => esc_html__("Autorotate?", 'salient-core'),
			"param_name" => "autorotate",
			"value" => Array(esc_html__("Yes", 'js_composer') => 'true'),
			"description" => ""
		),
		array(
			"type" => "textfield",
			"heading" => esc_html__("Autorotation Speed", 'salient-core'),
			"param_name" => "autorotation_speed",
			"dependency" => array('element' => "script", 'value' => array('owl_carousel','flickity')),
			"description" => esc_html__("Enter in milliseconds (default is 5000)" , 'salient-core')
		),
		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => esc_html__("Carousel Column Color", 'salient-core'),
			"param_name" => "column_color",
			"value" => "",
			"dependency" => array('element' => "script", 'value' => array('flickity')),
			"description" => ""
		),
		array(
			"type" => "dropdown",
			"heading" => esc_html__("Border Radius", 'salient-core'),
			'save_always' => true,
			"param_name" => "border_radius",
			"dependency" => array('element' => "script", 'value' => array('flickity')),
			"value" => array(
				esc_html__("0px", 'salient-core') => "none",
				esc_html__("3px", 'salient-core') => "3px",
				esc_html__("5px", 'salient-core') => "5px", 
				esc_html__("10px", 'salient-core') => "10px", 
				esc_html__("15px", 'salient-core') => "15px", 
				esc_html__("20px", 'salient-core') => "20px"
			),
		),	
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => esc_html__("Column Border", 'salient-core'),
			"value" => array("Enable?" => "true" ),
			"param_name" => "enable_column_border",
			"dependency" => array('element' => "script", 'value' => array('flickity')),
			"description" => "This add a subtle border to your columns"
		),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => esc_html__("Enable Animation", 'salient-core'),
			"value" => array("Enable Animation?" => "true" ),
			"param_name" => "enable_animation",
			"dependency" => array('element' => "script", 'value' => array('owl_carousel')),
			"description" => "This will cause your list items to animate in one by one"
		),
		
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Animation Delay", 'salient-core'),
			"param_name" => "delay",
			"admin_label" => false,
			"description" => "",
			"dependency" => Array('element' => "enable_animation", 'not_empty' => true)
		),
		
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"admin_label" => false,
			"heading" => esc_html__("Easing", 'salient-core'),
			"param_name" => "easing",
			'save_always' => true,
			"dependency" => array('element' => "script", 'value' => array('carouFredSel')),
			"value" => array(
				'linear'=>'linear',
				'swing'=>'swing',
				'easeInQuad'=>'easeInQuad',
				'easeOutQuad' => 'easeOutQuad',
				'easeInOutQuad'=>'easeInOutQuad',
				'easeInCubic'=>'easeInCubic',
				'easeOutCubic'=>'easeOutCubic',
				'easeInOutCubic'=>'easeInOutCubic',
				'easeInQuart'=>'easeInQuart',
				'easeOutQuart'=>'easeOutQuart',
				'easeInOutQuart'=>'easeInOutQuart',
				'easeInQuint'=>'easeInQuint',
				'easeOutQuint'=>'easeOutQuint',
				'easeInOutQuint'=>'easeInOutQuint',
				'easeInExpo'=>'easeInExpo',
				'easeOutExpo'=>'easeOutExpo',
				'easeInOutExpo'=>'easeInOutExpo',
				'easeInSine'=>'easeInSine',
				'easeOutSine'=>'easeOutSine',
				'easeInOutSine'=>'easeInOutSine',
				'easeInCirc'=>'easeInCirc',
				'easeOutCirc'=>'easeOutCirc',
				'easeInOutCirc'=>'easeInOutCirc',
				'easeInElastic'=>'easeInElastic',
				'easeOutElastic'=>'easeOutElastic',
				'easeInOutElastic'=>'easeInOutElastic',
				'easeInBack'=>'easeInBack',
				'easeOutBack'=>'easeOutBack',
				'easeInOutBack'=>'easeInOutBack',
				'easeInBounce'=>'easeInBounce',
				'easeOutBounce'=>'easeOutBounce',
				'easeInOutBounce'=>'easeInOutBounce',
			),
			"description" => "Select the animation easing you would like for slide transitions <a href=\"http://jqueryui.com/resources/demos/effect/easing.html\" target=\"_blank\"> Click here </a> to see examples of these."
			)
		),
		"custom_markup" => '
		<div class="wpb_tabs_holder wpb_holder vc_container_for_children">
		<ul class="tabs_controls">
		</ul>
		%content%
		</div>'
		,
		'default_content' => '
		[item id="'.$tab_id_1.'"] Add Content Here [/item]
		[item id="'.$tab_id_2.'"] Add Content Here [/item]
		[item id="'.$tab_id_3.'"] Add Content Here [/item]
		',
		"js_view" => ($vc_is_wp_version_3_6_more ? 'VcTabsView' : 'VcTabsView35')
	);
	
	?>