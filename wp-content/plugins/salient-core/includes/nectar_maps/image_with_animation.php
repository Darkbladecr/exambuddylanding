<?php 

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

return array(
	"name" => esc_html__("Single Image", "salient-core"),
	"base" => "image_with_animation",
	"icon" => "icon-wpb-single-image",
	"category" => esc_html__('Nectar Elements', 'salient-core'),
	"description" => esc_html__('Simple image with CSS animation', 'salient-core'),
	"params" => array(
		array(
			"type" => "fws_image",
			"heading" => esc_html__("Image", "salient-core"),
			"param_name" => "image_url",
			"value" => "",
			"description" => esc_html__("Select image from media library.", "salient-core")
		),
		array(
			"type" => "dropdown",
			"heading" => esc_html__("Image Alignment", "salient-core"),
			'save_always' => true,
			"param_name" => "alignment",
			"value" => array(esc_html__("Align left", "salient-core") => "", esc_html__("Align right", "salient-core") => "right", esc_html__("Align center", "salient-core") => "center"),
			"description" => esc_html__("Select image alignment.", "salient-core")
		),
		array(
			"type" => "dropdown",
			"heading" => esc_html__("CSS Animation", "salient-core"),
			"param_name" => "animation",
			"admin_label" => true,
			"value" => array(
				esc_html__("Fade In", "salient-core") => "Fade In", 
				esc_html__("Fade In From Left", "salient-core") => "Fade In From Left", 
				esc_html__("Fade In From Right", "salient-core") => "Fade In From Right", 
				esc_html__("Fade In From Bottom", "salient-core") => "Fade In From Bottom", 
				esc_html__("Grow In", "salient-core") => "Grow In",
				esc_html__("Flip In Horizontal", "salient-core") => "Flip In",
				esc_html__("Flip In Vertical", "salient-core") => "flip-in-vertical",
				esc_html__("None", "salient-core") => "None"
			),
			'save_always' => true,
			"description" => esc_html__("Select animation type if you want this element to be animated when it enters into the browsers viewport. Note: Works only in modern browsers.", "salient-core")
		),
		array(
			"type" => "textfield",
			"heading" => esc_html__("Animation Delay", "salient-core"),
			"param_name" => "delay",
			"description" => esc_html__("Enter delay (in milliseconds) if needed e.g. 150. This parameter comes in handy when creating the animate in \"one by one\" effect in horizontal columns.", "salient-core")
		),
		array(
			"type" => 'checkbox',
			"heading" => esc_html__("Link to large image?", "salient-core"),
			"param_name" => "img_link_large",
			"description" => esc_html__("If selected, image will be linked to the bigger image.", "salient-core"),
			"value" => Array(esc_html__("Yes, please", "salient-core") => 'yes')
		),
		array(
			"type" => "textfield",
			"heading" => esc_html__("Image link", "salient-core"),
			"param_name" => "img_link",
			"description" => esc_html__("Enter url if you want this image to have link.", "salient-core"),
			"dependency" => Array('element' => "img_link_large", 'is_empty' => true)
		),
		array(
			"type" => "dropdown",
			"heading" => esc_html__("Link Target", "salient-core"),
			"param_name" => "img_link_target",
			"value" => array(esc_html__("Same window", "salient-core") => "_self", esc_html__("New window", "salient-core") => "_blank"),
			"dependency" => Array('element' => "img_link", 'not_empty' => true)
		),
		array(
			"type" => "dropdown",
			"heading" => esc_html__("Hover Animation", "salient-core"),
			"param_name" => "hover_animation",
			"admin_label" => true,
			"value" => array(
				esc_html__("None", "salient-core") => "none", 
				esc_html__("Zoom In", "salient-core") => "zoom", 
				esc_html__("Zoom In Crop", "salient-core") => "zoom-crop", 
				esc_html__("Color Overlay", "salient-core") => "color-overlay", 
			),
			'save_always' => true,
			"description" => esc_html__("Select an optional animation that will occur when hovering over your image", "salient-core")
		),
		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => esc_html__("Hover Overlay Color", "salient-core"),
			"param_name" => "hover_overlay_color",
			"value" => "",
			"dependency" => Array('element' => "hover_animation", 'value' => 'color-overlay'),
			"description" => ""
		),
		array(
			"type" => "textfield",
			"heading" => esc_html__("Extra class name", "salient-core"),
			"param_name" => "el_class",
			"description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "salient-core")
		),
		array(
			"type" => "dropdown",
			"heading" => esc_html__("Border Radius", "salient-core"),
			'save_always' => true,
			"param_name" => "border_radius",
			"value" => array(
				esc_html__("0px", "salient-core") => "none",
				esc_html__("3px", "salient-core") => "3px",
				esc_html__("5px", "salient-core") => "5px", 
				esc_html__("10px", "salient-core") => "10px", 
				esc_html__("15px", "salient-core") => "15px", 
				esc_html__("20px", "salient-core") => "20px"),
			),	
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Box Shadow", "salient-core"),
				'save_always' => true,
				"param_name" => "box_shadow",
				"value" => array(esc_html__("None", "salient-core") => "none", esc_html__("Small Depth", "salient-core") => "small_depth", esc_html__("Medium Depth", "salient-core") => "medium_depth", esc_html__("Large Depth", "salient-core") => "large_depth", esc_html__("Very Large Depth", "salient-core") => "x_large_depth"),
				"description" => esc_html__("Select your desired image box shadow", "salient-core")
			),
			array(
	      "type" => "dropdown",
	      "class" => "",
	      'save_always' => true,
	      "heading" => esc_html__("Image Loading", "salient-core"),
	      "param_name" => "image_loading",
	      "value" => array(
	        "Default" => "default",
					"Lazy Load" => "lazy-load",
	      ),
				"description" => esc_html__("Determine whether to load the image on page load or to use a lazy load method for higher performance.", "salient-core"),
	      'std' => 'default',
	    ),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Desktop Max Width", "salient-core"),
				'save_always' => true,
				"param_name" => "max_width",
				"value" => array(
					esc_html__("100%", "salient-core") => "100%",
					esc_html__("110%", "salient-core") => "110%", 
					esc_html__("125%", "salient-core") => "125%", 
					esc_html__("150%", "salient-core") => "150%",
					esc_html__("165%", "salient-core") => "165%",  
					esc_html__("175%", "salient-core") => "175%", 
					esc_html__("200%", "salient-core") => "200%", 
					esc_html__("225%", "salient-core") => "225%", 
					esc_html__("250%", "salient-core") => "250%",
					esc_html__("75%", "salient-core") => "75%",
					esc_html__("50%", "salient-core") => "50%",
					esc_html__("none", "salient-core") => "none"
				),
				"description" => esc_html__("Select your desired max width here - by default images are not allowed to display larger than the column they're contained in. Changing this to a higher value will allow you to create designs where your image overflows out of the column partially off screen.", "salient-core")
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Mobile Max Width", "salient-core"),
				'save_always' => true,
				"param_name" => "max_width_mobile",
				"value" => array(
					esc_html__("Default", "salient-core") => "default",
					esc_html__("110%", "salient-core") => "110%", 
					esc_html__("125%", "salient-core") => "125%", 
					esc_html__("150%", "salient-core") => "150%",
					esc_html__("165%", "salient-core") => "165%",  
					esc_html__("175%", "salient-core") => "175%", 
					esc_html__("200%", "salient-core") => "200%"
				),
				"description" => ''
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
			)
			
		)
	);
	
	?>