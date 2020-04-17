<?php 

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

return array(
	"name" => esc_html__("Toggle Panels", "salient-core"),
	"base" => "toggles",
	"show_settings_on_create" => false,
	"is_container" => true,
	"icon" => "icon-wpb-ui-accordion",
	"category" => esc_html__('Nectar Elements', 'salient-core'),
	"description" => esc_html__('jQuery toggles/accordion', 'salient-core'),
	"params" => array(
		array(
			"type" => "dropdown",
			"heading" => esc_html__("Style", "salient-core"),
			"param_name" => "style",
			"admin_label" => true,
			"value" => array(
				esc_html__("Default", "salient-core") => "default",
				esc_html__("Minimal", "salient-core") => "minimal",
				esc_html__("Minimal Small", "salient-core") => "minimal_small",
			),
			'save_always' => true,
			"description" => esc_html__("Please select the style you desire for your toggle element.", "salient-core")
		),
		array(
			"type" => 'checkbox',
			"heading" => esc_html__("Accordion Toggles", "salient-core"),
			"param_name" => "accordion",
			"description" => esc_html__("Selecting this will make it so that only one toggle can be opened at a time.", "salient-core"),
			"value" => Array(esc_html__("Allow", "salient-core") => 'true')
		)
	),
	"custom_markup" => '
	<div class="wpb_accordion_holder wpb_holder clearfix vc_container_for_children">
	%content%
	</div>
	<div class="tab_controls">
	<a class="add_tab" title="' . esc_html__( 'Add section', 'salient-core' ) . '"><span class="vc_icon"></span> <span class="tab-label">' . esc_html__( 'Add section', 'salient-core' ) . '</span></a>
	</div>
	',
	'default_content' => '
	[toggle title="'.esc_html__('Section', "salient-core").'"][/toggle]
	[toggle title="'.esc_html__('Section', "salient-core").'"][/toggle]
	',
	'js_view' => 'VcAccordionView'
);
?>