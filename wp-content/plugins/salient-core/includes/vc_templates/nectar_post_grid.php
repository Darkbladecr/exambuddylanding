<?php 
extract( shortcode_atts( array(
	'post_type' => 'post',
	'portfolio_category' 	=> 'all',
  'blog_category' 	=> 'all',
  'text_content_layout' => 'top_left',
  'subtext' => 'none',
  'orderby' => 'date',
	'order' 	=> 'DESC',
  'posts_per_page' => '-1',
  'post_offset' => '0',
	'enable_sortable' => '',
	'pagination' => 'none',
  'display_categories' => '0',
  'display_date' => '0',
  'display_excerpt' => '0',
  'grid_item_height' => '30vh',
  'grid_item_spacing' => '10px',
  'columns' => '4',
  'enable_masonry' => '',
	'image_size' => 'large',
	'image_loading' => 'normal',
	'button_color' => 'black',
  'color_overlay' => '',
  'color_overlay_opacity' => '',
  'color_overlay_hover_opacity' => '',
  'text_color' => 'dark',
  'text_color_hover' => 'dark',
  'shadow_on_hover' => '',
	'enable_indicator' => '',
	'mouse_indicator_style' => 'default',
	'mouse_indicator_color' => '#000',
	'mouse_indicator_text' => 'view',
  'hover_effect' => 'zoom',
  'border_radius' => 'none',
  'text_style' => 'default'
), $atts ) );


// Certain items need to be stored in JSON when using sortable.
$el_settings = array(
	'post_type' => esc_attr($post_type),
	'pagination' => esc_attr($pagination),
	'image_size' => esc_attr($image_size),
	'display_categories' => esc_attr($display_categories),
	'display_excerpt' => esc_attr($display_excerpt),
	'display_date' => esc_attr($display_date),
	'color_overlay' => esc_attr($color_overlay),
	'color_overlay_opacity' => esc_attr($color_overlay_opacity),
	'color_overlay_hover_opacity' => esc_attr($color_overlay_hover_opacity)
);

$el_query = array(
	'post_type' => esc_attr($post_type),
	'posts_per_page' => esc_attr($posts_per_page),
	'order' => esc_attr($order),
	'orderby' => esc_attr($orderby),
	'offset' => esc_attr($post_offset)
); 

echo "<div class='nectar-post-grid-wrap' data-el-settings='".json_encode($el_settings)."' data-query='".json_encode($el_query)."' data-load-more-color='". esc_attr($button_color) ."' data-load-more-text='".esc_html__("Load More", "salient-core") ."'>";

// Sortable filters.
$cat_links_escaped = '';
$show_all_cats = false;

if( empty($blog_category) ) {
	$blog_category = 'all';
}
if( empty($portfolio_category) ) {
	$portfolio_category = 'all';
}

if( 'post' === $post_type ) {
	
	$selected_cats_arr = explode(",", $blog_category);
	$blog_cat_list     = get_categories();
	
	if( in_array('all', $selected_cats_arr) ) {
		
		if( sizeof($selected_cats_arr) < 2 ) {
			$all_filters = '-1';
			$show_all_cats = true;
		} else {
			$all_filters = $blog_category;
		}
		
		$cat_links_escaped .= '<a href="#" class="active all-filter" data-total-count="'.esc_attr(nectar_post_grid_get_category_total($all_filters, 'post')).'" data-filter="'. esc_attr($all_filters) .'">'.esc_html__('All', 'salient-core').'</a>';
	} else {
		
		if( 'yes' === $enable_sortable) {
			// Only query for the first category to start.
			$blog_category = $selected_cats_arr[0];
		}
	}
	
	foreach ($blog_cat_list as $type) {

		if( in_array($type->slug, $selected_cats_arr) || true === $show_all_cats ) {
  		$cat_links_escaped .= '<a href="#" data-filter="'.esc_attr($type->slug).'" data-total-count="'.esc_attr(nectar_post_grid_get_category_total($type->slug, 'post')).'">'. esc_attr($type->name) .'</a>';
		}
	}
	
	
} else if( 'portfolio' === $post_type && !empty($portfolio_category) ) {
	
	$selected_cats_arr = explode(",", $portfolio_category);
	$project_cat_list  = get_terms('project-type');
	
	if( in_array('all', $selected_cats_arr) ) {
		
		if( sizeof($selected_cats_arr) < 2 ) {
			$all_filters = '-1';
			$show_all_cats = true;
		} else {
			$all_filters = $portfolio_category;
		}
		
		$cat_links_escaped .= '<a href="#" class="active all-filter" data-filter="'.$all_filters.'" data-total-count="'.esc_attr(nectar_post_grid_get_category_total($all_filters, 'portfolio')).'">'.esc_html__('All', 'salient-core').'</a>';
	} else {
		// Only query for the first category to start.
		if( 'yes' === $enable_sortable) {
			$portfolio_category = $selected_cats_arr[0];
		}
	}
	
	foreach ($project_cat_list as $type) {

		if( in_array($type->slug, $selected_cats_arr) || true === $show_all_cats ) {
  		$cat_links_escaped .= '<a href="#" data-filter="'.esc_attr($type->slug).'" data-total-count="'.esc_attr(nectar_post_grid_get_category_total($type->slug, 'portfolio')).'">'. esc_attr($type->name) .'</a>';
		}
	}

}

// Sortable filter output.
if( !empty($cat_links_escaped) ) {
	echo '<div class="nectar-post-grid-filters" data-sortable="'.esc_attr($enable_sortable).'"><h4>'.esc_html__('Filter','salient').'</h4><div>'.$cat_links_escaped.'</div></div>';
}
	



if( 'view' === $mouse_indicator_text ) {
	$indicator_text = esc_html__('View','salient-core');
} else {
	$indicator_text = esc_html__('Read','salient-core');
}

// Grid output.
$data_attrs_escaped = 'data-indicator="'.esc_attr($enable_indicator).'" '; 
$data_attrs_escaped .= 'data-indicator-style="'.esc_attr($mouse_indicator_style).'" '; 
$data_attrs_escaped .= 'data-indicator-color="'.esc_attr($mouse_indicator_color).'" ';
$data_attrs_escaped .= 'data-indicator-text="'. esc_html($indicator_text). '" ';
$data_attrs_escaped .= 'data-columns="'. esc_attr($columns) .'" ';
$data_attrs_escaped .= 'data-hover-effect="'.esc_attr($hover_effect).'" ';
$data_attrs_escaped .= 'data-text-style="'.esc_attr($text_style).'" ';
$data_attrs_escaped .= 'data-border-radius="'.esc_attr($border_radius).'" ';
$data_attrs_escaped .= 'data-grid-item-height="'.esc_attr($grid_item_height).'" ';
$data_attrs_escaped .= 'data-grid-spacing="'.esc_attr($grid_item_spacing).'" ';
$data_attrs_escaped .= 'data-text-layout="'.esc_attr($text_content_layout).'" ';
$data_attrs_escaped .= 'data-text-color="'.esc_attr($text_color).'" ';
$data_attrs_escaped .= 'data-text-hover-color="'.esc_attr($text_color_hover).'" ';
$data_attrs_escaped .= 'data-shadow-hover="'.esc_attr($shadow_on_hover).'" ';
$data_attrs_escaped .= 'data-masonry="'.esc_attr($enable_masonry).'"';

echo '<div class="nectar-post-grid" '.$data_attrs_escaped.'>';

// Posts.
if( 'post' === $post_type ) {
  
  // In case only all was selected.
  if( 'all' === $blog_category ) {
    $blog_category = null;
  }
    
  $nectar_blog_arr = array(
    'posts_per_page' => $posts_per_page,
    'post_type'      => 'post',
    'order'          => $order,
    'orderby'        => $orderby,
    'offset'         => $post_offset,
    'category_name'  => $blog_category
  );
  
  $nectar_blog_el_query = new WP_Query( $nectar_blog_arr );
        
  if( $nectar_blog_el_query->have_posts() ) : while( $nectar_blog_el_query->have_posts() ) : $nectar_blog_el_query->the_post();
        
    echo nectar_post_grid_item_markup($atts);
  
  endwhile; endif; 
  
	wp_reset_query();


} //end blog post type 

else if( 'portfolio' === $post_type ) {
	
	// In case only all was selected.
	if( 'all' === $portfolio_category ) {
		$portfolio_category = null;
	}
	
	$portfolio_arr = array(
		'posts_per_page' => $posts_per_page,
		'post_type'      => 'portfolio',
		'order'          => $order,
    'orderby'        => $orderby,
		'project-type'   => $portfolio_category,
		'offset'         => $post_offset,
	);
	
	$nectar_portfolio_el_query = new WP_Query( $portfolio_arr );
        
  if( $nectar_portfolio_el_query->have_posts() ) : while( $nectar_portfolio_el_query->have_posts() ) : $nectar_portfolio_el_query->the_post();
        
    echo nectar_post_grid_item_markup($atts);
  
  endwhile; endif; 
	
	wp_reset_query();
  
}// end product post type


echo '</div></div>';

?>