<?php 

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

return array(
	"name" => esc_html__("Highlighted Text", "salient-core"),
	"base" => "nectar_highlighted_text",
	"icon" => "icon-wpb-nectar-gradient-text",
	"allowed_container_element" => 'vc_row',
	"category" => esc_html__('Nectar Elements', 'salient-core'),
	"description" => esc_html__('Highlight text in an animated manner', 'salient-core'),
	"params" => array(
		array(
			"type" => "dropdown",
			"heading" => esc_html__("Color Type", "salient-core"),
			"param_name" => "color_type",
			"value" => array(
				esc_html__("Regular", "salient-core") => "regular",
				esc_html__("Gradient", "salient-core") => "gradient",
			),
			'save_always' => true,
			"description" => ''
		),
		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => esc_html__("Highlight Color", "salient-core"),
			"param_name" => "highlight_color",
			"value" => "",
			"description" => esc_html__("If left blank this will default to a desaturated variant of your defined theme accent color.", "salient-core")
		),
		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => esc_html__("Highlight Color #2", "salient-core"),
			"param_name" => "secondary_color",
			"value" => "",
			"dependency" => Array('element' => "color_type", 'value' => 'gradient'),
			"description" => esc_html__("Add a second color which will be used for the gradient", "salient-core")
		),
		array(
			"type" => "textarea_html",
			"holder" => "div",
			"heading" => esc_html__("Text Content", "salient-core"),
			"param_name" => "content",
			"value" => '',
			"description" => esc_html__("Any text that is wrapped in italics will get an animated highlight. Use the \"I\" button on the editor above when highlighting text to toggle italics.", "salient-core"),
			"admin_label" => false
		),
		array(
			"type" => "dropdown",
			"heading" => esc_html__("Style", "salient-core"),
			"param_name" => "style",
			"value" => array(
				esc_html__("Full Text BG Cover", "salient-core") => "full_text",
				esc_html__("Fancy Underline", "salient-core") => "half_text",
				esc_html__("Regular Underline", "salient-core") => "regular_underline"
			),
			'save_always' => true,
			"description" => esc_html__("Please select the style you would like for your highlights.", "salient-core")
		),
		array(
			"type" => "textfield",
			"heading" => esc_html__("Animation Delay", "salient-core"),
			"param_name" => "delay",
			"description" => esc_html__("Enter delay (in milliseconds) if needed e.g. 150. This parameter comes in handy when creating the animate in \"one by one\" effect.", "salient-core")
		),
		
		
	)
);

?>