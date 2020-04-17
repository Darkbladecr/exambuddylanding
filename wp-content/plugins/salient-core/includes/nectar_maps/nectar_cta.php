<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

return array(
	"name" => esc_html__("Call To Action", "salient-core"),
	"base" => "nectar_cta",
	"icon" => "icon-cta",
	"category" => esc_html__('Nectar Elements', 'salient-core'),
	"description" => esc_html__('minimal & animated', 'salient-core'),
	"params" => array(
		array(
			"type" => "dropdown",
			"class" => "",
			'save_always' => true,
			"heading" => "Style",
			"param_name" => "btn_style",
			"value" => array(
				esc_html__("See Through Button", "salient-core") => "see-through",
				esc_html__("Arrow Animation", "salient-core") => "arrow-animation",
				esc_html__("Material Button", "salient-core") => "material",
				esc_html__("Underline", "salient-core") => "underline",
				esc_html__("Next Section Button", "salient-core") => "next-section"
			)),
			array(
				"type" => "dropdown",
				"class" => "",
				'save_always' => true,
				"heading" => "Heading Tag",
				"dependency" => array('element' => "btn_style", 'value' => array('see-through','arrow-animation','material','underline')),
				"param_name" => "heading_tag",
				"value" => array(
					"H6" => "h6",
					"H5" => "h5",
					"H4" => "h4",
					"H3" => "h3",
					"H2" => "h2",
					"H1" => "h1"
				)),
				array(
					"type" => "textfield",
					"heading" => esc_html__("Call to action text", "salient-core"),
					"param_name" => "text",
					"admin_label" => true,
					"dependency" => array('element' => "btn_style", 'value' => array('see-through','material','underline')),
					"description" => esc_html__("The text that will appear before the actual CTA link", "salient-core")
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__("Link text", "salient-core"),
					"param_name" => "link_text",
					"dependency" => array('element' => "btn_style", 'value' => array('see-through','arrow-animation','material','underline')),
					"description" => esc_html__("The text that will be used for the CTA link", "salient-core")
				),
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => "CTA Text Color",
					"param_name" => "text_color",
					"value" => "",
					"dependency" => array('element' => "btn_style", 'value' => array('see-through','arrow-animation','material','underline')),
					"description" => ""
				),
				array(
					'type' => 'dropdown',
					'heading' => __( 'CTA Background Color', 'salient-core' ),
					'value' => array(
						esc_html__( "Transparent", "salient-core") => "default",
						esc_html__( "Accent Color", "salient-core") => "accent-color",
						esc_html__( "Extra Color 1", "salient-core") => "extra-color-1",
						esc_html__( "Extra Color 2", "salient-core") => "extra-color-2",	
						esc_html__( "Extra Color 3", "salient-core") => "extra-color-3",
						esc_html__( "Color Gradient 1", "salient-core") => "extra-color-gradient-1",
						esc_html__( "Color Gradient 2", "salient-core") => "extra-color-gradient-2"
					),
					'save_always' => true,
					'param_name' => 'button_color',
					"description" => "",
					"dependency" => array('element' => "btn_style", 'value' => array('see-through','arrow-animation','underline')),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__("Link URL", "salient-core"),
					"param_name" => "url",
					"dependency" => array('element' => "btn_style", 'value' => array('see-through','arrow-animation','material','underline')),
					"description" => esc_html__("The URL that will be used for the link", "salient-core")
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__("Link Type", "salient-core"),
					"param_name" => "link_type",
					"value" => array(
						esc_html__('Regular (open in same tab)', 'salient-core') => 'regular',
						esc_html__('Open In New Tab', 'salient-core') => 'new_tab',
					),
					'save_always' => true,
					"dependency" => array('element' => "btn_style", 'value' => array('see-through','arrow-animation','material','underline')),
					"description" => esc_html__("Please select the type of link you will be using.", "salient-core")
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__("Button Type", "salient-core"),
					"dependency" => array('element' => "btn_style", 'value' => array('next-section')),
					"param_name" => "btn_type",
					"admin_label" => true,
					"value" => array(
						esc_html__('Down Arrow Bordered', 'salient-core') => 'down-arrow-bordered',
						esc_html__('Down Arrow Bounce', 'salient-core') => 'down-arrow-bounce',
						esc_html__('Mouse Wheel Scroll Animation', 'salient-core') => 'mouse-wheel',
						esc_html__('Minimal Arrow Animation', 'salient-core') => 'minimal-arrow'
					),
					'save_always' => true
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__("Alignment", "salient-core"),
					"param_name" => "alignment",
					"admin_label" => true,
					"value" => array(
						esc_html__('Left', 'salient-core') => 'left',
						esc_html__('Center', 'salient-core') => 'center',
						esc_html__('Right', 'salient-core') => 'right',
					),
					'save_always' => true,
					"description" => esc_html__("Please select the desired alignment for your CTA", "salient-core")
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__("Margin", "salient-core") . "<span>" . esc_html__("Top", "salient-core") . "</span>",
					"param_name" => "margin_top",
					"edit_field_class" => "col-md-2",
					"description" => ''
				),
				array(
					"type" => "textfield",
					"heading" => "<span>" . esc_html__("Right", "salient-core") . "</span>",
					"param_name" => "margin_right",
					"edit_field_class" => "col-md-2",
					"description" => ''
				),
				array(
					"type" => "textfield",
					"heading" => "<span>" . esc_html__("Bottom", "salient-core") . "</span>",
					"param_name" => "margin_bottom",
					"edit_field_class" => "col-md-2",
					"description" => ''
				),
				array(
					"type" => "textfield",
					"heading" => "<span>" . esc_html__("Left", "salient-core") . "</span>",
					"param_name" => "margin_left",
					"edit_field_class" => "col-md-2",
					"description" => ''
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__("Padding", "salient-core") . "<span>" . esc_html__("Top", "salient-core") . "</span>",
					"param_name" => "padding_top",
					"edit_field_class" => "col-md-2",
					"dependency" => array('element' => "btn_style", 'value' => array('see-through','arrow-animation','underline')),
					"description" => ''
				),
				array(
					"type" => "textfield",
					"heading" => "<span>" . esc_html__("Right", "salient-core") . "</span>",
					"param_name" => "padding_right",
					"edit_field_class" => "col-md-2",
					"dependency" => array('element' => "btn_style", 'value' => array('see-through','arrow-animation','underline')),
					"description" => ''
				),
				array(
					"type" => "textfield",
					"heading" => "<span>" . esc_html__("Bottom", "salient-core") . "</span>",
					"param_name" => "padding_bottom",
					"edit_field_class" => "col-md-2",
					"dependency" => array('element' => "btn_style", 'value' => array('see-through','arrow-animation','underline')),
					"description" => ''
				),
				array(
					"type" => "textfield",
					"heading" => "<span>" . esc_html__("Left", "salient-core") . "</span>",
					"param_name" => "padding_left",
					"edit_field_class" => "col-md-2",
					"dependency" => array('element' => "btn_style", 'value' => array('see-through','arrow-animation','underline')),
					"description" => ''
				),
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => "Color",
					"param_name" => "next_section_color",
					"value" => "",
					"dependency" => array('element' => "btn_style", 'value' => array('next-section')),
					"description" => ""
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__("Display", "salient-core"),
					"param_name" => "display",
					"admin_label" => true,
					"value" => array(
						esc_html__('Block', 'salient-core') => 'block',
						esc_html__('Inline', 'salient-core') => 'inline',
					),
					'save_always' => true,
					"dependency" => array('element' => "btn_style", 'value' => array('see-through','material','arrow-animation','underline')),
					"description" => esc_html__("Block will cause the CTA to go a new line, while inline will allow multiple CTA's to appear on the same line.", "salient-core")
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__("Extra Class Name", "salient-core"),
					"param_name" => "class",
					"description" => ''
				),
			)
		);
		
		?>
