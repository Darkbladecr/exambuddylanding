<?php 
/**
 * Outputs the theme option color related styles.
 *
 * The styles generated from here will either be contained in salient/css/salient-dynamic-styles.css 
 * or output directly in the head, depending on if the server writing permission is set for the css directory.
 *
 * @version 10.5
 */
 
 
$nectar_options = get_nectar_theme_options(); 

// Only add certain WooCommerce selectors when needed.
global $woocommerce; 
if ($woocommerce) {
	$woocommerce_main = ', .woocommerce ul.products li.product .onsale, .woocommerce-page ul.products li.product .onsale, .woocommerce span.onsale, .woocommerce-page span.onsale, .woocommerce .product-wrap .add_to_cart_button.added, .single-product .facebook-share a:hover, .single-product .twitter-share a:hover, .single-product .pinterest-share a:hover, .woocommerce-message, .woocommerce-error, .woocommerce-info, .woocommerce .chzn-container .chzn-results .highlighted, .woocommerce .chosen-container .chosen-results .highlighted, .woocommerce a.button:hover, .woocommerce-page a.button:hover, .woocommerce button.button:hover, .woocommerce-page button.button:hover, .woocommerce input.button:hover, .woocommerce-page input.button:hover, .woocommerce #respond input#submit:hover, .woocommerce-page #respond input#submit:hover, .woocommerce #content input.button:hover, .woocommerce-page #content input.button:hover, .woocommerce .widget_price_filter .ui-slider .ui-slider-range, .woocommerce-page .widget_price_filter .ui-slider .ui-slider-range, .ascend.woocommerce .widget_price_filter .ui-slider .ui-slider-range, .ascend.woocommerce-page .widget_price_filter .ui-slider .ui-slider-range, .woocommerce #sidebar div ul li a:hover ~ .count, .woocommerce #sidebar div ul .current-cat > .count, body[data-fancy-form-rcs="1"] .select2-container--default .select2-selection--single:hover, body[data-fancy-form-rcs="1"] .select2-container--default.select2-container--open .select2-selection--single, .woocommerce .widget_price_filter .ui-slider .ui-slider-range, .material.woocommerce-page .widget_price_filter .ui-slider .ui-slider-range, .woocommerce-account .woocommerce-form-login button.button, .woocommerce-account .woocommerce-form-register button.button, .woocommerce.widget_price_filter .price_slider:not(.ui-slider):before, .woocommerce.widget_price_filter .price_slider:not(.ui-slider):after , .woocommerce.widget_price_filter .price_slider:not(.ui-slider), body .woocommerce.add_to_cart_inline a.button.add_to_cart_button, .woocommerce table.cart a.remove:hover, .woocommerce #content table.cart a.remove:hover, .woocommerce-page table.cart a.remove:hover, .woocommerce-page #content table.cart a.remove:hover, .woocommerce-page .woocommerce p.return-to-shop a.wc-backward, .woocommerce .yith-wcan-reset-navigation.button ';
} else {
	$woocommerce_main = null;
}
	
// Main Accent Color: color property.
echo '
body a, 
label span, 
body [class^="icon-"].icon-default-style,
.blog-recent[data-style*="classic_enhanced"] .post-meta .icon-salient-heart-2.loved, 
.blog-recent[data-style*="classic_enhanced"] .post-meta a:hover i,
.masonry.classic_enhanced .post .post-meta .icon-salient-heart-2.loved,
.masonry.classic_enhanced .post .post-meta a:hover i,
.post .post-header h2 a,
.post .post-header a:hover,
#single-below-header a:hover,
.post .post-header a:focus,
#single-below-header a:focus,
.comment-list .pingback .comment-body > a:hover,
.pricing-column h3,
[data-style="list_featured_first_row"] .meta-category a,
body.material .tabbed[data-color-scheme="accent-color"][data-style="minimal"]:not(.using-icons) >ul li:not(.cta-button) a:hover, 
body.material .tabbed[data-color-scheme="accent-color"][data-style="minimal"]:not(.using-icons) >ul li:not(.cta-button) .active-tab, 
.tabbed[data-style*="material"][data-color-scheme="accent-color"] .wpb_tabs_nav li a:not(.active-tab):hover,
[data-style="list_featured_first_row"] .meta-category a,
.icon-3x[class^="icon-"], 
.icon-3x[class*=" icon-"],
.icon-tiny[class^="icon-"],
.nectar-fancy-box[data-style="color_box_hover"][data-color="accent-color"] .icon-default-style,
.col:hover > [class^="icon-"].icon-3x.accent-color.alt-style.hovered,
.col:hover > [class*=" icon-"].icon-3x.accent-color.alt-style.hovered,
div[data-style="minimal"] .toggle:hover h3 a,
div[data-style="minimal"] .toggle.open h3 a,
#footer-outer #copyright li a i:hover,
.ascend .comment-list .reply a,
body.material .widget:not(.nectar_popular_posts_widget):not(.recent_posts_extra_widget) li a:hover,
body.material #sidebar .widget:not(.nectar_popular_posts_widget):not(.recent_posts_extra_widget) li a:hover,
body.material #footer-outer .widget:not(.nectar_popular_posts_widget):not(.recent_posts_extra_widget) li a:hover,
#top nav .sf-menu .current_page_item > a .sf-sub-indicator i, 
#top nav .sf-menu .current_page_ancestor > a .sf-sub-indicator i,
.sf-menu > .current_page_ancestor > a > .sf-sub-indicator i, 
.material .widget .tagcloud a,
#single-below-header a:hover [class^="icon-"],
#header-outer[data-format="left-header"] #top nav > ul > li:not(.megamenu) ul a:hover,
#header-outer #mobile-menu ul li[class*="current"] > a,
#header-outer #mobile-menu ul li a:hover,
#header-outer #mobile-menu ul li a:focus,
#header-outer #mobile-menu ul li a:hover .sf-sub-indicator i,
#header-outer #mobile-menu ul li a:focus .sf-sub-indicator i
{ 
	color: '. esc_attr($nectar_options["accent-color"]) .'; 
}


#header-outer[data-lhe="default"] #top nav > ul > li > a:hover,
#header-outer[data-lhe="default"] #top nav .sf-menu > .sfHover:not(#social-in-menu) > a, 
#header-outer[data-lhe="default"] #top nav .sf-menu > .current-menu-item > a,
#header-outer[data-lhe="default"] #top nav .sf-menu > .current_page_ancestor > a, 
#header-outer[data-lhe="default"] #top nav .sf-menu > .current-menu-ancestor > a, 
#header-outer[data-lhe="default"] #top nav .sf-menu > .current_page_item > a,
#header-outer[data-lhe="default"] #top nav > ul > .button_bordered > a:hover,
#header-outer[data-lhe="default"] #top nav > .sf-menu > .button_bordered.sfHover > a,
#header-outer #top nav > ul > .button_bordered > a:hover,  
#header-outer:not(.transparent) #social-in-menu a i:after, 
.sf-menu > li > a:hover > .sf-sub-indicator i, 
.sf-menu > li > a:active > .sf-sub-indicator i,
.sf-menu > .sfHover > a > .sf-sub-indicator i,
.sf-menu .megamenu > ul > li:hover > a,
#top nav > ul > .megamenu > ul > li > a:hover, 
#top nav > ul > .megamenu > ul > .sfHover > a, 
#top nav > ul > .megamenu > ul > li > a:focus, 
#top nav ul #nectar-user-account a:hover span, 
#top nav ul #search-btn a:hover span, 
#top nav ul .slide-out-widget-area-toggle a:hover span, 
#header-outer[data-format="left-header"] .sf-menu .sub-menu .current-menu-item > a, 
body.material:not([data-header-color="custom"]) #header-outer:not([data-format="left-header"]) #top ul.cart_list a:hover, 
body.material #header-outer:not(.transparent) .cart-outer:hover .cart-menu-wrap .icon-salient-cart, 
#header-outer .widget_shopping_cart .cart_list a, 
#header-outer .woocommerce.widget_shopping_cart .cart_list li a.remove,
#header-outer:not([data-format="left-header"]) #top nav > ul > .megamenu ul ul .current-menu-item.has-ul > a,
#header-outer:not([data-format="left-header"]) #top nav > ul > .megamenu ul ul .current-menu-ancestor.has-ul > a, 
body #header-secondary-outer #social a:hover i,
body #header-secondary-outer #social a:focus i,
#footer-outer a:focus, 
#footer-outer a:hover, 
.recent-posts .post-header a:hover, 
.result a:hover, 
.post-area.standard-minimal .post .post-meta .date a,
.post-area.standard-minimal .post .post-header h2 a:hover, 
.post-area.standard-minimal  .post .more-link:hover span,
.post-area.standard-minimal .post .more-link span:after, 
.post-area.standard-minimal .post .minimal-post-meta a:hover, 
.single .post .post-meta a:hover,
.single .post .post-meta a:focus,
.single #single-meta div a:hover i, 
.single #single-meta div:hover > a, 
.single #single-meta div:focus > a, 
.comment-list .comment-meta a:hover, 
.comment-list .comment-meta a:focus, 
.result .title a, 
.wpcf7-form p span, 
.wpcf7-form .wpcf7-not-valid-tip, 
.circle-border, 
.home .blog-recent:not([data-style="list_featured_first_row"]) .col .post-header a:hover,
.home .blog-recent .col .post-header h3 a, 
.pricing-table[data-style="flat-alternative"] .pricing-column.accent-color h4, 
.pricing-table[data-style="flat-alternative"] .pricing-column.accent-color .interval,
.comment-author a:hover, 
.comment-author a:focus, 
.project-attrs li i, 
.woocommerce .star-rating, 
.woocommerce form .form-row .required, 
.woocommerce-page form .form-row .required, 
.woocommerce ul.products li.product .price, 
.woocommerce-page ul.products li.product .price, 
.woocommerce-checkout-review-order-table .product-info .amount,
.woocommerce-pagination a.page-numbers:hover, 
.woocommerce p.stars a:hover, 
.woocommerce .material.product .product-wrap .product-add-to-cart a:hover, 
.woocommerce .material.product .product-wrap .product-add-to-cart a:hover > span, 
.woocommerce-MyAccount-navigation ul li.is-active a:before, 
.woocommerce-MyAccount-navigation ul li:hover a:before, 
.woocommerce.ascend .price_slider_amount button.button[type="submit"], 
.ascend.woocommerce #sidebar div ul li a:hover, 
.ascend.woocommerce #sidebar div ul .current-cat > a, 
.woocommerce .widget_layered_nav ul li.chosen a:after, 
.woocommerce-page .widget_layered_nav ul li.chosen a:after, 
.woocommerce-account .woocommerce > #customer_login .nectar-form-controls .control.active, 
.woocommerce-account .woocommerce > #customer_login .nectar-form-controls .control:hover, 
.woocommerce #review_form #respond p.comment-notes span.required,
.nectar-milestone .number.accent-color, 
body #portfolio-nav a:hover i,
span.accent-color, 
.portfolio-items .nectar-love:hover i, 
.portfolio-items .nectar-love.loved i, 
body .hovered .nectar-love i, 
body:not(.material) #search-outer #search #close a span:hover, 
.carousel-wrap[data-full-width="true"] .carousel-heading a:hover i, 
#search-outer .ui-widget-content li:hover *,  
#search-outer .ui-widget-content .ui-state-focus *, 
.portfolio-filters-inline .container ul li .active,
.svg-icon-holder[data-color="accent-color"], 
.team-member .accent-color:hover, 
.text_on_hover.product .add_to_cart_button, .blog-recent[data-style="minimal"] .col > span, 
.blog-recent[data-style="title_only"] .col:hover .post-header .title, 
.nectar-icon-list[data-icon-style="border"][data-icon-color="accent-color"] .list-icon-holder[data-icon_type="numerical"] span, 
.nectar-icon-list[data-icon-color="accent-color"][data-icon-style="border"] .content h4, 
.nectar-icon-list[data-icon-color="accent-color"] .nectar-icon-list-item .list-icon-holder[data-icon_type="numerical"],
body #pagination .page-numbers.prev:hover, 
body #pagination .page-numbers.next:hover,  
body #pagination a.page-numbers:hover, 
body #pagination a.page-numbers:focus, 
.nectar-slide-in-cart .widget_shopping_cart .cart_list a, 
.sf-menu ul .open-submenu > a,
body[data-form-submit="see-through"] input[type=submit], 
body[data-form-submit="see-through"] button[type=submit], 
.nectar_icon_wrap[data-color="accent-color"] i, 
.nectar_team_member_close .inner:before, 
body:not([data-header-format="left-header"]) #top nav > ul > .megamenu > ul > li > ul > .has-ul > a:hover, 
body:not([data-header-format="left-header"]) #top nav > ul > .megamenu > ul > li > ul > .has-ul > a:focus, 
.masonry.material .masonry-blog-item .meta-category a, 
body .wpb_row .span_12 .portfolio-filters-inline[data-color-scheme="accent-color-underline"].full-width-section .active, 
body .wpb_row .span_12 .portfolio-filters-inline[data-color-scheme="accent-color-underline"].full-width-section a:hover, 
.material .comment-list .reply a:hover, 
.material .comment-list .reply a:focus, 
.related-posts[data-style="material"] .meta-category a,
.material .widget li:not(.has-img) a:hover .post-title, 
.material #sidebar .widget li:not(.has-img) a:hover .post-title, 
.material .container-wrap #author-bio #author-info a:hover,
.material #sidebar .widget ul[data-style="featured-image-left"] li a:hover .post-title, 
.material #sidebar .widget .tagcloud a, 
.single.material .post-area .content-inner > .post-tags a, 
.post-area.featured_img_left .meta-category a,
body.material .nectar-button.see-through.accent-color[data-color-override="false"],
div[data-style="minimal_small"] .toggle.accent-color > h3 a:hover, 
div[data-style="minimal_small"] .toggle.accent-color.open > h3 a, 
.testimonial_slider[data-rating-color="accent-color"] .star-rating .filled:before,
.nectar_single_testimonial[data-color="accent-color"] p .open-quote, 
.nectar-quick-view-box .star-rating, 
.minimal.product .product-wrap .normal.icon-salient-cart[class*=" icon-"], 
.minimal.product .product-wrap i, 
.minimal.product .product-wrap .normal.icon-salient-m-eye, 
.products li.product.minimal .product-add-to-cart .loading:after, 
.widget_search .search-form button[type=submit] .icon-salient-search, 
body.search-no-results .search-form button[type=submit] .icon-salient-search, 
#sidebar .widget_shopping_cart .cart_list li a.remove:hover,
.col:not(.post-area):not(.span_12):not(#sidebar):hover [class^="icon-"].icon-3x.accent-color.alt-style.hovered, 
body .col:not(.post-area):not(.span_12):not(#sidebar):hover a [class*=" icon-"].icon-3x.accent-color.alt-style.hovered,
.ascend #header-outer:not(.transparent) .cart-outer:hover .cart-menu-wrap:not(.has_products) .icon-salient-cart {
	color:'. esc_attr($nectar_options["accent-color"]) .'!important;
}';
	

// Main Accent Color: background-color property.
echo '
.nectar-highlighted-text em:before,
.nectar_icon_wrap[data-style="soft-bg"][data-color="accent-color"] .nectar_icon:before, 
.nectar_icon_wrap[data-style="shadow-bg"][data-color="accent-color"] .nectar_icon:after,
.pricing-table[data-style="default"] .pricing-column.highlight.accent-color h3,
.pricing-table[data-style="flat-alternative"] .pricing-column.highlight h3 .highlight-reason,
.pricing-table[data-style="flat-alternative"] .pricing-column.accent-color:before,
[data-style="list_featured_first_row"] .meta-category a:before,
.tabbed > ul li .active-tab,
.tabbed > ul li .active-tab:hover,
.tabbed[data-style="vertical_modern"][data-color-scheme="accent-color"] .wpb_tabs_nav li .active-tab,
.tabbed[data-style*="minimal"] > ul li a:after, 
.tabbed[data-style="minimal_alt"] .magic-line, 
.tabbed[data-style*="material"][data-color-scheme="accent-color"] ul:after,
.testimonial_slider[data-style="multiple_visible"][data-color*="accent-color"] .flickity-page-dots .dot.is-selected:before, 
.testimonial_slider[data-style="multiple_visible"][data-color*="accent-color"] blockquote.is-selected p,
.nectar_video_lightbox.nectar-button[data-color="default-accent-color"],
.nectar_video_lightbox.nectar-button[data-color="transparent-accent-color"]:hover,
.nectar-cta[data-color="accent-color"]:not([data-style="material"]) .link_wrap,
.flex-direction-nav a,
.carousel-prev:hover, 
.carousel-next:hover,
.nectar-flickity[data-controls*="arrows_overlaid"][data-control-color="accent-color"] .flickity-prev-next-button:hover:before,
.nectar-flickity[data-controls="default"][data-control-color="accent-color"] .flickity-page-dots .dot:before,
.nectar-flickity[data-controls="touch_total"][data-control-color="accent-color"] .visualized-total span,
body [class^="icon-"].icon-3x.alt-style.accent-color, 
body [class*=" icon-"].icon-3x.alt-style.accent-color,
[class*=" icon-"],
.col:hover > [class^="icon-"].icon-3x:not(.alt-style).accent-color.hovered, 
.col:hover > [class*=" icon-"].icon-3x:not(.alt-style).accent-color.hovered,
.col:not(.post-area):not(.span_12):not(#sidebar):hover [class^="icon-"].icon-3x:not(.alt-style).accent-color.hovered, 
.col:not(.post-area):not(.span_12):not(#sidebar):hover a [class*=" icon-"].icon-3x:not(.alt-style).accent-color.hovered,
.toggle.open h3 a,
div[data-style="minimal"] .toggle.open h3 i:after, 
div[data-style="minimal"] .toggle:hover h3 i:after, 
div[data-style="minimal"] .toggle.open h3 i:before, 
div[data-style="minimal"] .toggle:hover h3 i:before,
div[data-style="minimal_small"] .toggle.accent-color > h3:after,
.post .more-link span:hover,
.post.format-quote .post-content .quote-inner, 
.post.format-link .post-content .link-inner,
.nectar-post-grid-wrap[data-load-more-color="accent-color"] .load-more:hover,
.format-status .post-content .status-inner, 
input[type=submit]:hover, 
input[type="button"]:hover,  
body[data-form-submit="regular"] input[type=submit], 
body[data-form-submit="regular"] button[type=submit],
body[data-form-submit="regular"] .container-wrap .span_12.light input[type=submit]:hover, 
body[data-form-submit="regular"] .container-wrap .span_12.light button[type=submit]:hover,
.woocommerce div.product .woocommerce-tabs ul.tabs li.active, 
.woocommerce #content div.product .woocommerce-tabs ul.tabs li.active, 
.woocommerce-page div.product .woocommerce-tabs ul.tabs li.active, 
.woocommerce-page #content div.product .woocommerce-tabs ul.tabs li.active,
#slide-out-widget-area, 
#slide-out-widget-area-bg.fullscreen, 
#slide-out-widget-area-bg.fullscreen-alt .bg-inner,
body.material #slide-out-widget-area-bg.slide-out-from-right,
.widget .material .widget .tagcloud a:before { 
	background-color:'.esc_attr($nectar_options["accent-color"]).'; 
}
	

.orbit-wrapper .slider-nav .right, 
.orbit-wrapper .slider-nav .left, 
.progress li span, .nectar-progress-bar span,
#footer-outer #footer-widgets .col .tagcloud a:hover, 
#sidebar .widget .tagcloud a:hover, 
#fp-nav.tooltip ul li .fp-tooltip .tooltip-inner,
#pagination .next a:hover, 
#pagination .prev a:hover, 
.comment-list .reply a:hover, 
.comment-list .reply a:focus, 
.icon-normal, 
.bar_graph li span, 
.nectar-button[data-color-override="false"].regular-button, 
.nectar-button.tilt.accent-color, 
body .swiper-slide .button.transparent_2 .primary-color:hover, 
#footer-outer #footer-widgets .col input[type="submit"],
body .products-carousel .carousel-next:hover, 
body .products-carousel .carousel-prev:hover, 
.blog-recent .more-link span:hover, 
.post-tags a:hover, 
#to-top:hover, 
#to-top.dark:hover, 
body[data-button-style*="rounded"] #to-top:after, 
#pagination a.page-numbers:hover,
#pagination span.page-numbers.current, 
.portfolio-items .col[data-default-color="true"] .work-item:not(.style-3) .work-info-bg,
.portfolio-items .col[data-default-color="true"] .bottom-meta, 
.portfolio-items .col.nectar-new-item .inner-wrap:before, 
.portfolio-filters-inline[data-color-scheme="accent-color-underline"] a:after, 
.portfolio-filters a, 
.portfolio-filters #sort-portfolio, 
.project-attrs li span, 
.portfolio-filters, 
.portfolio-filters-inline[data-color-scheme="accent-color"], 
.bottom_controls #portfolio-nav .controls li a i:after, 
.bottom_controls #portfolio-nav ul:first-child li#all-items a:hover i, 
.single-portfolio .facebook-share a:hover, 
.single-portfolio .twitter-share a:hover, 
.single-portfolio .pinterest-share a:hover,  
.single-post .facebook-share a:hover, 
.single-post .twitter-share a:hover, 
.single-post .pinterest-share a:hover, 
.mejs-controls .mejs-time-rail .mejs-time-current,
.mejs-controls .mejs-volume-button .mejs-volume-slider .mejs-volume-current, 
.mejs-controls .mejs-horizontal-volume-slider .mejs-horizontal-volume-current,
#sidebar .widget:hover [class^="icon-"].icon-3x, 
.post.quote .content-inner .quote-inner .whole-link, 
.masonry.classic_enhanced .post.quote.wide_tall .post-content a:hover .quote-inner, 
.masonry.classic_enhanced .post.link.wide_tall .post-content a:hover .link-inner, 
.iosSlider .prev_slide:hover, 
.iosSlider .next_slide:hover,  
#header-outer .widget_shopping_cart a.button, 
#header-outer a.cart-contents .cart-wrap span, 
#header-outer #mobile-cart-link .cart-wrap span, 
#top nav ul .slide-out-widget-area-toggle a:hover .lines, 
#top nav ul .slide-out-widget-area-toggle a:hover .lines:after, 
#top nav ul .slide-out-widget-area-toggle a:hover .lines:before, 
#top nav ul .slide-out-widget-area-toggle a:hover .lines-button:after,
#header-outer #top nav > ul > li:not(.megamenu) ul a:hover, 
#header-outer #top nav > ul > li:not(.megamenu) .sfHover > a, 
#header-outer:not([data-format="left-header"]) #top nav > ul > li:not(.megamenu) .sfHover > a, 
#header-outer .widget_shopping_cart a.button, 
body[data-header-format="left-header"] #header-outer[data-lhe="animated_underline"] #top nav ul li:not([class*="button_"]) > a span:after, 
#header-outer:not([data-format="left-header"]) #top nav > ul > li:not(.megamenu) ul a:hover,
#header-outer:not([data-format="left-header"]) #top nav > ul > li:not(.megamenu) ul .current-menu-item > a, 
#header-outer:not([data-format="left-header"]) #top nav > ul > li:not(.megamenu) ul .current-menu-ancestor > a, 
#top nav > ul > .megamenu > ul ul li a:hover, 
#top nav > ul > .megamenu > ul ul li a:focus,
#top nav > ul > .megamenu > ul ul .sfHover > a, 
body:not([data-header-format="left-header"]) #top nav > ul > .megamenu > ul ul .current-menu-item > a, 
#buddypress a.button:focus, 
.text_on_hover.product a.added_to_cart, 
.swiper-slide .button.solid_color a, 
.swiper-slide .button.solid_color_2 a, 
.select2-container .select2-choice:hover, 
.select2-dropdown-open .select2-choice,
#top nav > ul > .button_solid_color > a:before,
#header-outer.transparent #top nav > ul > .button_solid_color > a:before, 
.twentytwenty-handle, 
.twentytwenty-horizontal .twentytwenty-handle:before,
.twentytwenty-horizontal .twentytwenty-handle:after, 
.twentytwenty-vertical .twentytwenty-handle:before, .twentytwenty-vertical 
.twentytwenty-handle:after, 
.masonry.classic_enhanced .posts-container article .meta-category a:hover, 
.blog-recent[data-style*="classic_enhanced"] .meta-category a:hover, 
.masonry.classic_enhanced .posts-container article .video-play-button,
.masonry.material .masonry-blog-item .meta-category a:before, 
.material.masonry .masonry-blog-item .video-play-button, 
.masonry.material .quote-inner:before, 
.masonry.material .link-inner:before, 
.nectar-recent-posts-slider .container .strong span:before, 
#page-header-bg[data-post-hs="default_minimal"] .inner-wrap > a:hover,
#page-header-bg[data-post-hs="default_minimal"] .inner-wrap > a:focus,
.single .heading-title[data-header-style="default_minimal"] .meta-category a:hover, 
.single .heading-title[data-header-style="default_minimal"] .meta-category a:focus, 
.nectar-fancy-box:after, 
.divider-small-border[data-color="accent-color"], 
.divider-border[data-color="accent-color"], 
.nectar-animated-title[data-color="accent-color"] .nectar-animated-title-inner:after, 
#fp-nav:not(.light-controls).tooltip_alt ul li a span:after, 
#fp-nav.tooltip_alt ul li a span:after, 
.nectar-video-box[data-color="default-accent-color"] .nectar_video_lightbox,  
body .nectar-video-box[data-color="default-accent-color"][data-hover="zoom_button"] .nectar_video_lightbox:after, 
.span_12.dark .owl-theme .owl-dots .owl-dot.active span, 
.span_12.dark .owl-theme .owl-dots .owl-dot:hover span, 
.nectar_image_with_hotspots[data-stlye="color_pulse"][data-color="accent-color"] .nectar_hotspot, 
.nectar_image_with_hotspots .nectar_hotspot_wrap .nttip .tipclose span:before, 
.nectar_image_with_hotspots .nectar_hotspot_wrap .nttip .tipclose span:after,
#header-secondary-outer ul > li:not(.megamenu) .sfHover > a, 
#header-secondary-outer ul > li:not(.megamenu) ul a:hover, 
#header-secondary-outer ul > li:not(.megamenu) ul a:focus, 
.nectar-recent-posts-single_featured .strong a, 
.post-area.standard-minimal .post .more-link span:before, 
.nectar-slide-in-cart .widget_shopping_cart a.button, 
.related-posts[data-style="material"] .meta-category a:before, 
.post-area.featured_img_left .meta-category a:before, 
.nectar_icon_wrap[data-style="border-animation"][data-color="accent-color"]:not([data-draw="true"]) .nectar_icon:hover, 
body.material #page-header-bg.fullscreen-header .inner-wrap >a, 
.nectar-google-map[data-nectar-marker-color="accent-color"] .animated-dot .middle-dot, 
.nectar-leaflet-map[data-nectar-marker-color="accent-color"] .animated-dot .middle-dot, 
.nectar-google-map[data-nectar-marker-color="accent-color"] .animated-dot div[class*="signal"], 
.nectar-leaflet-map[data-nectar-marker-color="accent-color"] .animated-dot div[class*="signal"], 
.nectar_video_lightbox.play_button_with_text[data-color="default-accent-color"]:not([data-style="small"]) .play > .inner-wrap:before, 
.nectar-hor-list-item[data-color="accent-color"]:before,  
.material #sidebar .widget .tagcloud a:before, 
.single .post-area .content-inner > .post-tags a:before, 
.auto_meta_overlaid_spaced .post.quote .n-post-bg:after, 
.auto_meta_overlaid_spaced .post.link .n-post-bg:after,
.post-area.featured_img_left .posts-container .article-content-wrap .video-play-button, 
.post-area.featured_img_left .post .quote-inner:before, 
.post-area.featured_img_left .link-inner:before,
.nectar-recent-posts-single_featured.multiple_featured .controls li:after,
.nectar-recent-posts-single_featured.multiple_featured .controls .active:before, 
.nectar-fancy-box[data-color="accent-color"]:not([data-style="default"]) .box-bg:after, 
body.material[data-button-style^="rounded"] .nectar-button.see-through.accent-color[data-color-override="false"] i, 
body.material .nectar-video-box[data-color="default-accent-color"] .nectar_video_lightbox:before,
.nectar_team_member_overlay .team_member_details .bio-inner .mobile-close:before, 
.nectar_team_member_overlay .team_member_details .bio-inner .mobile-close:after, 
.fancybox-navigation button:hover:before, 
ul.products li.minimal.product span.onsale, 
.span_12.dark .nectar-woo-flickity[data-controls="arrows-and-text"] .nectar-woo-carousel-top a:after,
.woocommerce-page button.single_add_to_cart_button,
.woocommerce div.product .woocommerce-tabs .full-width-content ul.tabs li a:after, 
.woocommerce-cart .wc-proceed-to-checkout a.checkout-button, 
.woocommerce #order_review #payment #place_order, 
.woocommerce .span_4 input[type="submit"].checkout-button,
.woocommerce .material.product .add_to_cart_button,
body nav.woocommerce-pagination span.page-numbers.current, 
.woocommerce span.onsale .nectar-quick-view-box .onsale, 
.nectar-quick-view-box .onsale, 
.woocommerce-page .nectar-quick-view-box .onsale, 
.nectar-quick-view-box .cart .quantity input.plus:hover, 
.nectar-quick-view-box .cart .quantity input.minus:hover, 
.woocommerce .cart .quantity input.plus:hover, 
.woocommerce .cart .quantity input.minus:hover, 
body .nectar-quick-view-box .single_add_to_cart_button, 
.woocommerce .classic .add_to_cart_button,
.woocommerce .classic .product-add-to-cart a.button, 
button[type=submit]:hover, 
button[type=submit]:focus,
body[data-form-submit="see-through"] input[type=submit]:hover, 
body[data-form-submit="see-through"] button[type=submit]:hover, 
body[data-form-submit="see-through"] .container-wrap .span_12.light input[type=submit]:hover, 
body[data-form-submit="see-through"] .container-wrap .span_12.light button[type=submit]:hover, 
body[data-form-submit="see-through"] .woocommerce #order_review #payment #place_order:hover,
.text_on_hover.product .nectar_quick_view, 
body.original .bypostauthor .comment-body:before, 
.widget_layered_nav ul.yith-wcan-label li a:hover, 
.widget_layered_nav ul.yith-wcan-label .chosen a, 
.nectar-next-section-wrap.bounce a:before,
body .nectar-button.see-through-2[data-hover-color-override="false"]:hover  '.$woocommerce_main.'
{
	background-color:'.esc_attr($nectar_options["accent-color"]).'!important;
}';
	


// Main Accent Color: border-color property.
echo '
.tabbed > ul li .active-tab, 	
.material input[type=text]:focus, 
.material textarea:focus, 
.material input[type=email]:focus, 
.material input[type=search]:focus, 
.material input[type=password]:focus, 
.material input[type=tel]:focus, 
.material input[type=url]:focus, 
.material input[type=date]:focus, 
.row .col .wp-caption .wp-caption-text, 
.material.woocommerce-page input#coupon_code:focus, 
.material #search-outer #search input[type="text"],
#header-outer[data-lhe="animated_underline"] #top nav > ul > li > a:after, 
div[data-style="minimal"] .toggle.default.open i, 
div[data-style="minimal"] .toggle.default:hover i, 
div[data-style="minimal"] .toggle.accent-color.open i, 
div[data-style="minimal"] .toggle.accent-color:hover i,
body[data-form-style="minimal"] input[type=text]:focus, 
body[data-form-style="minimal"].woocommerce-cart table.cart .actions .coupon .input-text:focus,
body[data-form-style="minimal"] textarea:focus, 
body[data-form-style="minimal"] input[type=email]:focus, 
body[data-form-style="minimal"] input[type=search]:focus, 
body[data-form-style="minimal"] input[type=password]:focus, 
body[data-form-style="minimal"] input[type=tel]:focus, 
body[data-form-style="minimal"] input[type=url]:focus, 
body[data-form-style="minimal"] input[type=date]:focus,
.single #single-meta div a:hover,
.single #single-meta div a:focus,
.single .fullscreen-blog-header #single-below-header > span a:hover,
.blog-title #single-meta .nectar-social.hover > div a:hover {
	border-color:'.esc_attr($nectar_options["accent-color"]).';
}


body[data-form-style="minimal"] label:after, 
body .recent_projects_widget a:hover img, 
.recent_projects_widget a:hover img, 
#sidebar #flickr a:hover img, 
body .nectar-button.see-through-2[data-hover-color-override="false"]:hover,
#footer-outer #flickr a:hover img,  
#featured article .post-title a:hover, 
body #featured article .post-title a:hover, 
div.wpcf7-validation-errors, 
.select2-container .select2-choice:hover, 
.select2-dropdown-open .select2-choice, 
body:not(.original) .bypostauthor img.avatar, 
.material blockquote::before,
blockquote.wp-block-quote:before,
#header-outer:not(.transparent) #top nav > ul > .button_bordered > a:hover:before, 
.single #project-meta ul li:not(.meta-share-count):hover a, 
.nectar_image_with_hotspots .nectar_hotspot_wrap .nttip .tipclose, 
body[data-button-style="rounded"] #pagination > a:hover, 
body[data-form-submit="see-through"] input[type=submit], 
body[data-form-submit="see-through"] button[type=submit], 
.nectar_icon_wrap[data-style="border-basic"][data-color="accent-color"] .nectar_icon, 
.nectar_icon_wrap[data-style="border-animation"][data-color="accent-color"]:not([data-draw="true"]) .nectar_icon,
.nectar_icon_wrap[data-style="border-animation"][data-color="accent-color"][data-draw="true"]:hover .nectar_icon, 
.span_12.dark .nectar_video_lightbox.play_button_with_text[data-color="default-accent-color"] .play:before,
.span_12.dark .nectar_video_lightbox.play_button_with_text[data-color="default-accent-color"] .play:after, 
#header-secondary-outer[data-lhe="animated_underline"] nav > .sf-menu >li >a:after, 
body.material .nectar-button.see-through.accent-color[data-color-override="false"], 
.woocommerce-page.material .widget_price_filter .ui-slider .ui-slider-handle,
body[data-form-submit="see-through"] button[type=submit]:not(.search-widget-btn),
.woocommerce-account[data-form-submit="see-through"] .woocommerce-form-login button.button,
.woocommerce-account[data-form-submit="see-through"] .woocommerce-form-register button.button,
body[data-form-submit="see-through"] .woocommerce #order_review #payment #place_order,
.single-product .product[data-gallery-style="left_thumb_sticky"] .product-thumbs .flickity-slider .thumb.is-nav-selected img,
.single-product:not(.mobile) .product[data-gallery-style="left_thumb_sticky"] .product-thumbs .thumb a.active img,
.gallery a:hover img {
	border-color:'.esc_attr($nectar_options["accent-color"]).'!important;
}';


// Main Accent Color: other misc properties.
echo '
.nectar_icon_wrap .svg-icon-holder[data-color="accent-color"] svg path { 
	stroke:'. esc_attr($nectar_options["accent-color"]).'!important; 
}
	
body.material[data-button-style^="rounded"] .nectar-button.see-through.accent-color[data-color-override="false"] i:after { 
	box-shadow: '.esc_attr($nectar_options["accent-color"]).' 0px 8px 15px; opacity: 0.24; 
}

.nectar-fancy-box[data-style="color_box_hover"][data-color="accent-color"]:hover:before { 
	box-shadow: 0 30px 90px '.esc_attr($nectar_options["accent-color"]).'; 
} 

.nectar-fancy-box[data-style="hover_desc"][data-color="accent-color"]:before {
  background: linear-gradient(to bottom, rgba(0,0,0,0), '.esc_attr($nectar_options["accent-color"]).' 100%);
}

#footer-outer[data-link-hover="underline"][data-custom-color="false"] ul:not([class*="nectar_blog_posts"]) a:not(.tag-cloud-link):not(.nectar-button),
#footer-outer[data-link-hover="underline"] #footer-widgets .textwidget a:not(.nectar-button) {
  background-image: linear-gradient(to right, '.esc_attr($nectar_options["accent-color"]).' 0%, '.esc_attr($nectar_options["accent-color"]).' 100%);
}

.woocommerce.material .widget_price_filter .ui-slider .ui-slider-handle:before, 
.material.woocommerce-page .widget_price_filter .ui-slider .ui-slider-handle:before {
	box-shadow: 0 0 0 10px '.esc_attr($nectar_options["accent-color"]).' inset;
}
.woocommerce.material .widget_price_filter .ui-slider .ui-slider-handle.ui-state-active:before, 
.material.woocommerce-page .widget_price_filter .ui-slider .ui-slider-handle.ui-state-active:before {
	box-shadow: 0 0 0 2px '.esc_attr($nectar_options["accent-color"]).' inset;
}

.nectar_icon_wrap[data-style="shadow-bg"][data-color="accent-color"] .nectar_icon:before {
  box-shadow: 0px 15px 28px '. esc_attr($nectar_options["accent-color"]) .'; opacity: 0.3; 
}  

.tabbed[data-style="minimal_flexible"][data-color-scheme="accent-color"] .wpb_tabs_nav > li a:before {
  box-shadow: 0px 8px 22px '. esc_attr($nectar_options["accent-color"]) .';
}

.woocommerce #sidebar .widget_layered_nav ul.yith-wcan-color li.chosen a {
	box-shadow: 0 0 0 2px '.esc_attr($nectar_options["accent-color"]).', inset 0 0 0 3px #fff;
}
.woocommerce #sidebar .widget_layered_nav ul.yith-wcan-color li a:hover {
	box-shadow: 0 0 0 2px '.esc_attr($nectar_options["accent-color"]).', 0px 8px 20px rgba(0,0,0,0.2), inset 0 0 0 3px #fff;
}

.nectar-leaflet-map[data-nectar-marker-color="accent-color"] .nectar-leaflet-pin { 
	border: 10px solid '.esc_attr($nectar_options["accent-color"]).'; 
}

.woocommerce-account .woocommerce > #customer_login .nectar-form-controls .control {
  background-image: linear-gradient(to right, '.esc_attr($nectar_options["accent-color"]).' 0%, '.esc_attr($nectar_options["accent-color"]).' 100%); 
}

#search-results .result .title a {
  background-image: linear-gradient(to right, '.esc_attr($nectar_options["accent-color"]).' 0%, '.esc_attr($nectar_options["accent-color"]).' 100%); 
}
.tabbed[data-style*="material"][data-color-scheme="accent-color"] ul li .active-tab:after { 
	box-shadow: 0px 18px 50px  '.esc_attr($nectar_options["accent-color"]).'; 
}

.container-wrap .bottom_controls #portfolio-nav ul:first-child  li#all-items a:hover i { 
	box-shadow: -.6em 0 '.esc_attr($nectar_options["accent-color"]).', 
  -.6em .6em '.esc_attr($nectar_options["accent-color"]).', 
  .6em 0 '.esc_attr($nectar_options["accent-color"]).', 
  .6em -.6em '.esc_attr($nectar_options["accent-color"]).', 
  0 -.6em '.esc_attr($nectar_options["accent-color"]).', 
  -.6em -.6em '.esc_attr($nectar_options["accent-color"]).', 
  0 .6em '.esc_attr($nectar_options["accent-color"]).', 
  .6em .6em '.esc_attr($nectar_options["accent-color"]).';  
}

@media only screen and (max-width: 768px) {
	.woocommerce-page table.cart a.remove {
		background-color:'.esc_attr($nectar_options["accent-color"]).'!important;
	}
}

#fp-nav:not(.light-controls).tooltip_alt ul li a.active span, 
#fp-nav.tooltip_alt ul li a.active span { 
	box-shadow: inset 0 0 0 2px '.esc_attr($nectar_options["accent-color"]).'; 
	-webkit-box-shadow: inset 0 0 0 2px '.esc_attr($nectar_options["accent-color"]).'; 
}

.default-loading-icon:before { 
	border-top-color:'.esc_attr($nectar_options["accent-color"]).'!important; 
}

#header-outer a.cart-contents span:before, 
#fp-nav.tooltip ul li .fp-tooltip .tooltip-inner:after { 
	border-color: transparent '.esc_attr($nectar_options["accent-color"]).'!important; 
}

body .col:not(.post-area):not(.span_12):not(#sidebar):hover .hovered .circle-border, 
body #sidebar .widget:hover .circle-border, 
body .testimonial_slider[data-style="multiple_visible"][data-color*="accent-color"] blockquote .bottom-arrow:after, 
body .dark .testimonial_slider[data-style="multiple_visible"][data-color*="accent-color"] blockquote .bottom-arrow:after, 
.portfolio-items[data-ps="6"] .bg-overlay, 
.portfolio-items[data-ps="6"].no-masonry .bg-overlay,
.nectar_team_member_close .inner, 
.nectar_team_member_overlay .team_member_details .bio-inner .mobile-close { 
	border-color:'.esc_attr($nectar_options["accent-color"]).'; 
}

.widget .nectar_widget[class*="nectar_blog_posts_"] .arrow-circle svg circle,
.nectar-woo-flickity[data-controls="arrows-and-text"] .flickity-prev-next-button svg circle.time { 
	stroke: '.esc_attr($nectar_options["accent-color"]).'; 
}

.im-icon-wrap[data-color="accent-color"] path {
		 fill: '.esc_attr($nectar_options["accent-color"]).';
}

';
	
	
if( !empty($nectar_options['responsive']) && $nectar_options['responsive'] === '1' ) { 
	
	echo '@media only screen and (min-width : 1px) and (max-width : 1000px) {
		body #featured article .post-title > a { background-color:'. esc_attr($nectar_options["accent-color"]).'; }
		body #featured article .post-title > a { border-color:'. esc_attr($nectar_options["accent-color"]).'; }
	}';

} 
	
	
	
	

// Extra accent colors.

//// Styles that use accent #1 only.
if( ! empty($nectar_options["extra-color-1"]) ) { 
	
	echo '#header-outer .widget_shopping_cart .cart_list li a.remove,  
		.original #header-outer .woocommerce.widget_shopping_cart .cart_list li a.remove,
		.stock.out-of-stock,
		#header-outer #top nav > ul > .button_bordered_2 > a:hover,
		#header-outer[data-lhe="default"] #top nav > ul > .button_bordered_2 > a:hover,
		#header-outer[data-lhe="default"] #top nav .sf-menu .button_bordered_2.current-menu-item > a {
				color: '. esc_attr($nectar_options["extra-color-1"]) .'!important;
		}
		
		#top nav > ul > .button_solid_color_2 > a:before, 
		#header-outer.transparent #top nav > ul > .button_solid_color_2 > a:before, 
		body[data-slide-out-widget-area-style="slide-out-from-right"]:not([data-header-color="custom"]).material .slide_out_area_close:before,
		#header-outer .widget_shopping_cart a.button, 
		.woocommerce ul.products li.product .onsale, 
		.woocommerce-page ul.products li.product .onsale, 
		.woocommerce span.onsale, 
		.woocommerce-page span.onsale {
				background-color: '. esc_attr($nectar_options["extra-color-1"]) .';
		}
		
		#header-outer .woocommerce.widget_shopping_cart .cart_list li a.remove, 
		#header-outer .woocommerce.widget_shopping_cart .cart_list li a.remove, 
		#header-outer:not(.transparent) #top nav > ul > .button_bordered_2 > a:hover:before {
			border-color: '. esc_attr($nectar_options["extra-color-1"]) .';
		}
	
	';
} ////End accent #1 only.
	
	
// Main extra color loop.
$nectar_extra_accent_colors = array(
	'extra-color-1' => ( isset($nectar_options["extra-color-1"]) && !empty($nectar_options["extra-color-1"]) ) ? $nectar_options["extra-color-1"] : false,
	'extra-color-2' => ( isset($nectar_options["extra-color-2"]) && !empty($nectar_options["extra-color-2"]) ) ? $nectar_options["extra-color-2"] : false,
	'extra-color-3' => ( isset($nectar_options["extra-color-3"]) && !empty($nectar_options["extra-color-3"]) ) ? $nectar_options["extra-color-3"] : false
);

foreach( $nectar_extra_accent_colors as $selector => $color ){
	
	if( $color !== false ) { 
	
		echo '
		.pricing-table[data-style="flat-alternative"] .pricing-column.highlight.'.$selector.' h3,
		.pricing-table[data-style="flat-alternative"] .pricing-column.'.$selector.' h4,
		.pricing-table[data-style="flat-alternative"] .pricing-column.'.$selector.' .interval,
		body.material .tabbed[data-color-scheme="'.$selector.'"][data-style="minimal"]:not(.using-icons) >ul li:not(.cta-button) a:hover, 
		body.material .tabbed[data-color-scheme="'.$selector.'"][data-style="minimal"]:not(.using-icons) >ul li:not(.cta-button) .active-tab, 
		.tabbed[data-style*="material"][data-color-scheme="'.$selector.'"] ul li a:not(.active-tab):hover,
		.testimonial_slider[data-rating-color="'.$selector.'"] .star-rating .filled:before,
		.icon-3x[class^="icon-"].'.$selector.':not(.alt-style), 
		.icon-tiny[class^="icon-"].'.$selector.', 
		.icon-3x[class*=" icon-"].'.$selector.':not(.alt-style), 
		body .icon-3x[class*=" icon-"].'.$selector.':not(.alt-style) .circle-border,
		.col:hover > [class^="icon-"].icon-3x.'.$selector.'.alt-style.hovered, 
		.col:hover > [class*=" icon-"].icon-3x.'.$selector.'.alt-style.hovered, 
		.col:not(.post-area):not(.span_12):not(#sidebar):hover [class^="icon-"].icon-3x.'.$selector.'.alt-style.hovered, 
		body .col:not(.post-area):not(.span_12):not(#sidebar):hover a [class*=" icon-"].icon-3x.'.$selector.'.alt-style.hovered,
		div[data-style="minimal"] .toggle.'.$selector.':hover h3 a, 
		div[data-style="minimal"] .toggle.'.$selector.'.open h3 a, 
		div[data-style="minimal_small"] .toggle.'.$selector.' > h3 a:hover, 
		div[data-style="minimal_small"] .toggle.'.$selector.'.open > h3 a {
			color: '. esc_attr($color) .';
		}
		
		
		.nectar-milestone .number.'.$selector.', span.'.$selector.',
		.team-member .social.'.$selector.' li a, 
		body [class^="icon-"].icon-default-style.'.$selector.', 
		body [class^="icon-"].icon-default-style[data-color="'.$selector.'"], 
		.team-member .'.$selector.':hover, 
		.svg-icon-holder[data-color="'.$selector.'"], 
		.nectar-icon-list[data-icon-style="border"][data-icon-color="'.$selector.'"] .list-icon-holder[data-icon_type="numerical"] span, 
		.nectar-icon-list[data-icon-color="'.$selector.'"][data-icon-style="border"] .content h4,
		 .nectar_icon_wrap[data-color="'.$selector.'"] i, 
		 body .wpb_row .span_12 .portfolio-filters-inline[data-color-scheme="'.$selector.'-underline"].full-width-section .active, 
		 body .wpb_row .span_12 .portfolio-filters-inline[data-color-scheme="'.$selector.'-underline"].full-width-section a:hover, 
		 body.material .nectar-button.see-through.'.$selector.'[data-color-override="false"], 
		 .nectar_single_testimonial[data-color="'.$selector.'"] p .open-quote, 
		 .nectar-icon-list[data-icon-color="'.$selector.'"] .nectar-icon-list-item .list-icon-holder[data-icon_type="numerical"],
		 .no-highlight.'.$selector.' h3 {
			color: '. esc_attr($color) .'!important;
		}
		

		.pricing-table[data-style="flat-alternative"] .pricing-column.'.$selector.':before,
		.pricing-table[data-style="flat-alternative"] .pricing-column.highlight.'.$selector.' h3 .highlight-reason,
		.tabbed[data-color-scheme="'.$selector.'"][data-style="default"] li:not(.cta-button) .active-tab,
		.tabbed[data-style="vertical_modern"][data-color-scheme="'.$selector.'"] .wpb_tabs_nav li .active-tab,
		body .tabbed[data-color-scheme="'.$selector.'"][data-style="minimal"] > ul li:not(.cta-button) a:after,
		.tabbed[data-color-scheme="'.$selector.'"][data-style="minimal_alt"] .magic-line, 
		.tabbed[data-style*="material"][data-color-scheme="'.$selector.'"] ul:after, 
		.tabbed[data-style*="material"][data-color-scheme="'.$selector.'"] ul li .active-tab,
		.testimonial_slider[data-style="multiple_visible"][data-color*="'.$selector.'"] .flickity-page-dots .dot.is-selected:before,
		.testimonial_slider[data-style="multiple_visible"][data-color*="'.$selector.'"] blockquote.is-selected p,
		.nectar-button.nectar_video_lightbox[data-color="default-'.$selector.'"], 
		.nectar_video_lightbox.nectar-button[data-color="transparent-'.$selector.'"]:hover,
		body [class^="icon-"].icon-3x.alt-style.'.$selector.', 
		body [class*=" icon-"].icon-3x.alt-style.'.$selector.',
		.col:hover > [class^="icon-"].icon-3x.'.$selector.':not(.alt-style),
		.col:hover > [class*=" icon-"].icon-3x.'.$selector.':not(.alt-style).hovered, 
    .nectar_icon_wrap[data-style="shadow-bg"][data-color="'.$selector.'"] .nectar_icon:after,
    .nectar-cta[data-color="'.$selector.'"]:not([data-style="material"]) .link_wrap,
		body .col:not(.post-area):not(.span_12):not(#sidebar):hover [class^="icon-"].icon-3x.'.$selector.':not(.alt-style).hovered, 
		body .col:not(.post-area):not(#sidebar):not(.span_12):hover a [class*=" icon-"].icon-3x.'.$selector.':not(.alt-style).hovered,
    .nectar-flickity[data-controls*="arrows_overlaid"][data-control-color="'.$selector.'"] .flickity-prev-next-button:hover:before,
    .nectar-flickity[data-controls="default"][data-control-color="'.$selector.'"] .flickity-page-dots .dot:before,
    .nectar-flickity[data-controls="touch_total"][data-control-color="'.$selector.'"] .visualized-total span,
    .nectar-post-grid-wrap[data-load-more-color="'.$selector.'"] .load-more:hover,
		[class*=" icon-"].'.$selector.'.icon-normal,
		div[data-style="minimal"] .toggle.'.$selector.'.open i:after, 
		div[data-style="minimal"] .toggle.'.$selector.':hover i:after, 
		div[data-style="minimal"] .toggle.open.'.$selector.' i:before, 
		div[data-style="minimal"] .toggle.'.$selector.':hover i:before, 
		div[data-style="minimal_small"] .toggle.'.$selector.' > h3:after,
		.toggle.open.'.$selector.' h3 a {
			background-color: '. esc_attr($color) .';
		}
		
		.nectar-button.regular-button.'.$selector.', 
		.nectar-button.tilt.'.$selector.',
		body .swiper-slide .button.transparent_2 .'.$selector.':hover,
		#sidebar .widget:hover [class^="icon-"].icon-3x.'.$selector.':not(.alt-style),
		.portfolio-filters-inline[data-color-scheme="'.$selector.'"], 
    .portfolio-filters[data-color-scheme="'.$selector.'"] #sort-portfolio, 
    .portfolio-filters[data-color-scheme="'.$selector.'"] a,
		.nectar-fancy-box[data-color="'.$selector.'"]:after, 
		.divider-small-border[data-color="'.$selector.'"],
		.divider-border[data-color="'.$selector.'"], 
		.nectar-animated-title[data-color="'.$selector.'"] .nectar-animated-title-inner:after, 
		.nectar-video-box[data-color="'.$selector.'"] .nectar_video_lightbox,  
		body .nectar-video-box[data-color="'.$selector.'"][data-hover="zoom_button"] .nectar_video_lightbox:after, 
		.nectar_image_with_hotspots[data-stlye="color_pulse"][data-color="'.$selector.'"] .nectar_hotspot, 
		.portfolio-filters-inline[data-color-scheme="'.$selector.'-underline"] a:after, 
		.nectar_icon_wrap[data-style="border-animation"][data-color="'.$selector.'"]:not([data-draw="true"]) .nectar_icon:hover, 
		.nectar-google-map[data-nectar-marker-color="'.$selector.'"] .animated-dot .middle-dot, 
		.nectar-leaflet-map[data-nectar-marker-color="'.$selector.'"] .animated-dot .middle-dot, 
		.nectar-google-map[data-nectar-marker-color="'.$selector.'"] .animated-dot div[class*="signal"], 
		.nectar-leaflet-map[data-nectar-marker-color="'.$selector.'"] .animated-dot div[class*="signal"], 
		.nectar_video_lightbox.play_button_with_text[data-color="'.$selector.'"]:not([data-style="small"]) .play > .inner-wrap:before,
		.nectar-hor-list-item[data-color="'.$selector.'"]:before, 
		.nectar-fancy-box[data-color="'.$selector.'"]:not([data-style="default"]) .box-bg:after, 
		body.material[data-button-style^="rounded"] .nectar-button.see-through.'.$selector.'[data-color-override="false"] i,
		.nectar-recent-posts-single_featured.multiple_featured .controls[data-color="'.$selector.'"] li:after, 
		body.material .nectar-video-box[data-color="'.$selector.'"] .nectar_video_lightbox:before,
		.nectar_icon_wrap[data-style="soft-bg"][data-color="'.$selector.'"] .nectar_icon:before,
		.'.$selector.'.icon-normal, 
		.bar_graph li .'.$selector.',
		.nectar-progress-bar .'.$selector.', 
		.swiper-slide .button.solid_color .'.$selector.', 
		.swiper-slide .button.solid_color_2 .'.$selector.',
		.pricing-column.highlight.'.$selector.' h3
		{
			background-color: '. esc_attr($color).'!important;
		}
		
		.nectar-leaflet-map[data-nectar-marker-color="'.$selector.'"] .nectar-leaflet-pin { 
			border: 10px solid '. esc_attr($color) .'; 
		}
		
		.nectar_icon_wrap .svg-icon-holder[data-color="'.$selector.'"] svg path { 
			stroke:'. esc_attr($color) .'!important; 
		}
		
		body.material[data-button-style^="rounded"] .nectar-button.see-through.'.$selector.'[data-color-override="false"] i:after { 
			box-shadow: '. esc_attr($color) .' 0px 8px 15px; opacity: 0.24; 
		}
    .nectar_icon_wrap[data-style="shadow-bg"][data-color="'.$selector.'"] .nectar_icon:before {
      box-shadow: 0px 15px 28px '. esc_attr($color) .'; opacity: 0.3; 
    }   
    
    .tabbed[data-style="minimal_flexible"][data-color-scheme="'.$selector.'"] .wpb_tabs_nav > li a:before {
      box-shadow: 0px 8px 22px '. esc_attr($color) .';
    } 
		
		.tabbed[data-style*="material"][data-color-scheme="'.$selector.'"] ul li .active-tab:after { 
			 box-shadow: 0px 18px 50px  '. esc_attr($color) .'; 
		 }
		
		.nectar-fancy-box[data-style="color_box_hover"][data-color="'.$selector.'"]:hover:before { 
			box-shadow: 0 30px 90px '. esc_attr($color) .'; 
		} 
    .nectar-fancy-box[data-style="hover_desc"][data-color="'.$selector.'"]:before {
      background: linear-gradient(to bottom, rgba(0,0,0,0), '.esc_attr($color).' 100%);
    }
		
		body .col:not(.post-area):not(.span_12):not(#sidebar):hover .'.$selector.'.hovered .circle-border, 
		body #sidebar .widget:hover .'.$selector.' .circle-border, 
		body .testimonial_slider[data-style="multiple_visible"][data-color*="'.$selector.'"] blockquote .bottom-arrow:after,
		body .dark .testimonial_slider[data-style="multiple_visible"][data-color*="'.$selector.'"] blockquote .bottom-arrow:after, 
		div[data-style="minimal"] .toggle.open.'.$selector.' i, div[data-style="minimal"] .toggle.'.$selector.':hover i,
		.nectar_icon_wrap[data-style="border-basic"][data-color="'.$selector.'"] .nectar_icon, 
		.nectar_icon_wrap[data-style="border-animation"][data-color="'.$selector.'"]:not([data-draw="true"]) .nectar_icon, 
		.nectar_icon_wrap[data-style="border-animation"][data-color="'.$selector.'"][data-draw="true"]:hover .nectar_icon,
		.span_12.dark .nectar_video_lightbox.play_button_with_text[data-color="'.$selector.'"] .play:before, 
		.span_12.dark .nectar_video_lightbox.play_button_with_text[data-color="'.$selector.'"] .play:after,
		.tabbed[data-color-scheme="'.$selector.'"][data-style="default"] li:not(.cta-button) .active-tab { 
			border-color:'. esc_attr($color) .'; 
		}
		
		body.material .nectar-button.see-through.'.$selector.'[data-color-override="false"] { 
			border-color:'. esc_attr($color) .'!important; 
		}
		
		
		.im-icon-wrap[data-color="'.$selector.'"] path {
				 fill: '. esc_attr($color) .';
		}
		
		';
		
		
	} // End color is set.
} // End main extra accent color loop.
	
	


//Gradient colors.

////Styles that use gradient #1 only.
if( $nectar_options["extra-color-gradient"]['to'] && $nectar_options["extra-color-gradient"]['from'] ) {
	echo '.widget .nectar_widget[class*="nectar_blog_posts_"][data-style="hover-featured-image-gradient-and-counter"] > li a .popular-featured-img:after {
		background: '.esc_attr($nectar_options["extra-color-gradient"]['from']).'; 
		background: linear-gradient(to right, '.esc_attr($nectar_options["extra-color-gradient"]['from']).', '.esc_attr($nectar_options["extra-color-gradient"]['to']).'); 
	}';
} ////End gradient #1 only.


////Main Gradient loop.
$nectar_gradient_colors = array(
	'extra-color-gradient-1' => ( $nectar_options["extra-color-gradient"]['to'] && $nectar_options["extra-color-gradient"]['from'] ) ? array($nectar_options["extra-color-gradient"]['to'],$nectar_options["extra-color-gradient"]['from']) : false,
	'extra-color-gradient-2' => ( $nectar_options["extra-color-gradient-2"]['to'] && $nectar_options["extra-color-gradient-2"]['from'] ) ? array($nectar_options["extra-color-gradient-2"]['to'],$nectar_options["extra-color-gradient-2"]['from']) : false
);

foreach( $nectar_gradient_colors as $selector => $color_grad ){
	
	if( $color_grad !== false ) { 
		
		$accent_gradient_from = $color_grad[0];
		$accent_gradient_to 	= $color_grad[1];

		echo '.divider-small-border[data-color="'.$selector.'"], 
		.divider-border[data-color="'.$selector.'"], 
		.nectar-progress-bar .'.$selector.',
		.tabbed[data-style*="minimal"][data-color-scheme="'.$selector.'"] >ul li a:after,
		.tabbed[data-style="minimal_alt"][data-color-scheme="'.$selector.'"] .magic-line,
		.nectar-recent-posts-single_featured.multiple_featured .controls[data-color="'.$selector.'"] li:after, 
		.nectar-fancy-box[data-style="default"][data-color="'.$selector.'"]:after {
			background: '.esc_attr($accent_gradient_from).'; 
		  background: linear-gradient(to right, '.esc_attr($accent_gradient_from).', '.esc_attr($accent_gradient_to).'); 
		}
		
		.icon-normal.'.$selector.', 
		body [class^="icon-"].icon-3x.alt-style.'.$selector.',
		.nectar-button.'.$selector.':after, 
    .nectar-cta[data-color="'.$selector.'"]:not([data-style="material"]) .link_wrap,
		.nectar-button.see-through-'.$selector.':after,
		.nectar_icon_wrap[data-color="'.$selector.'"]:not([data-style="shadow-bg"]) i, 
		.nectar_icon_wrap[data-style="border-animation"][data-color="'.$selector.'"]:before, 
		.tabbed[data-style*="material"][data-color-scheme="'.$selector.'"] ul li a:before,
		.tabbed[data-style*="default"][data-color-scheme="'.$selector.'"] ul li a:before, 
		.tabbed[data-style*="vertical"][data-color-scheme="'.$selector.'"] ul li a:before,
		.nectar-fancy-box[data-style="color_box_hover"][data-color="'.$selector.'"] .box-bg:after, 
		.nectar_icon_wrap[data-style="soft-bg"][data-color="'.$selector.'"] .nectar_icon:before,
    .nectar_icon_wrap[data-style="shadow-bg"][data-color="'.$selector.'"] .nectar_icon:after,
    .nectar-post-grid-wrap[data-load-more-color="'.$selector.'"] .load-more:before {
			 background: '.esc_attr($accent_gradient_from).'; 
		   background: linear-gradient(to bottom right, '.esc_attr($accent_gradient_from).', '.esc_attr($accent_gradient_to).'); 
		}
		
		body.material .nectar-button.regular.m-'.$selector.', 
		body.material .nectar-button.see-through.m-'.$selector.':before,
		.swiper-slide .button.solid_color .'.$selector.', 
		.swiper-slide .button.transparent_2 .'.$selector.':before {
			 background: '.esc_attr($accent_gradient_from).'; 
		   background: linear-gradient(125deg, '.esc_attr($accent_gradient_from).', '.esc_attr($accent_gradient_to).');
		}
		body.material .nectar-button.regular.m-'.$selector.':before {
			 background: '.esc_attr($accent_gradient_to).'; 
		}
		
		.tabbed[data-style*="material"][data-color-scheme="'.$selector.'"] ul:after { 
			background-color: '.esc_attr($accent_gradient_to).';
		}
		
		.tabbed[data-style*="material"][data-color-scheme="'.$selector.'"] ul li .active-tab:after { 
			box-shadow: 0px 18px 50px '.esc_attr($accent_gradient_to).'; 
		}
		
		.nectar-fancy-box[data-style="color_box_hover"][data-color="'.$selector.'"]:hover:before { 
			box-shadow: 0px 30px 90px '.esc_attr($accent_gradient_to).'; 
		}
    
    .tabbed[data-style="minimal_flexible"][data-color-scheme="'.$selector.'"] .wpb_tabs_nav > li a:before {
      box-shadow: 0px 8px 22px '. esc_attr($accent_gradient_to) .';
    } 
    
    .nectar_icon_wrap[data-style="shadow-bg"][data-color="'.$selector.'"] .nectar_icon:before {
      box-shadow: 0px 15px 28px '. esc_attr($accent_gradient_to) .'; opacity: 0.3; 
    }  
		
		
		.testimonial_slider[data-rating-color="'.$selector.'"] .star-rating .filled:before {
			 color: '.esc_attr($accent_gradient_from).';
			 background: linear-gradient(to right, '.esc_attr($accent_gradient_from).', '.esc_attr($accent_gradient_to).'); 
			 -webkit-background-clip: text;
			 -webkit-text-fill-color: transparent;
			 background-clip: text;
			 text-fill-color: transparent;
		}

		.nectar-button.'.$selector.', 
		.nectar-button.see-through-'.$selector.' {
			 border-width: 3px;
			 border-style: solid;
		   -moz-border-image: -moz-linear-gradient(top right, '.esc_attr($accent_gradient_from).' 0%, '.esc_attr($accent_gradient_to).' 100%);
		   -webkit-border-image: -webkit-linear-gradient(top right, '.esc_attr($accent_gradient_from).' 0%,'.esc_attr($accent_gradient_to).' 100%);
		   border-image: linear-gradient(to bottom right, '.esc_attr($accent_gradient_from).' 0%, '.esc_attr($accent_gradient_to).' 100%);
		   border-image-slice: 1;
		}
		
		.nectar-gradient-text[data-color="'.$selector.'"][data-direction="horizontal"] * { 
			background-image: linear-gradient(to right, '.esc_attr($accent_gradient_from).', '.esc_attr($accent_gradient_to).');  
		}
		
		.nectar-gradient-text[data-color="'.$selector.'"] *, 
		.nectar-icon-list[data-icon-style="border"][data-icon-color="'.$selector.'"] .list-icon-holder[data-icon_type="numerical"] span {
			 color: '.esc_attr($accent_gradient_from).';
			 background: linear-gradient(to bottom right, '.esc_attr($accent_gradient_from).', '.esc_attr($accent_gradient_to).'); 
			 -webkit-background-clip: text;
			 -webkit-text-fill-color: transparent;
			 background-clip: text;
			 text-fill-color: transparent;
			 display: inline-block;
		}
		
		[class^="icon-"][data-color="'.$selector.'"]:before, 
		[class*=" icon-"][data-color="'.$selector.'"]:before,
		[class^="icon-"].'.$selector.':not(.icon-normal):before, 
		[class*=" icon-"].'.$selector.':not(.icon-normal):before,
		.nectar_icon_wrap[data-color="'.$selector.'"]:not([data-style="shadow-bg"]) i {
			  color: '.esc_attr($accent_gradient_from).';
			  background: linear-gradient(to bottom right, '.esc_attr($accent_gradient_from).', '.esc_attr($accent_gradient_to).'); 
			  -webkit-background-clip: text;
			  -webkit-text-fill-color: transparent;
			  background-clip: text;
			  text-fill-color: transparent;
			  display: initial; 
		}
		.nectar-button.'.$selector.' .hover, 
		.nectar-button.see-through-'.$selector.' .start {
			  background: '.esc_attr($accent_gradient_from).'; 
			  background: linear-gradient(to bottom right, '.esc_attr($accent_gradient_from).', '.esc_attr($accent_gradient_to).'); 
			  -webkit-background-clip: text;
			  -webkit-text-fill-color: transparent;
			  background-clip: text;
			  text-fill-color: transparent;
			  display: initial; 
		}
		
		.nectar-button.'.$selector.'.no-text-grad .hover, 
		.nectar-button.see-through-'.$selector.'.no-text-grad .start {
			 background: transparent!important;
			 color: '.esc_attr($accent_gradient_from).'!important; 
		}';
		
		
		
	} // End color gradient is set.
} // End main gradient color loop.
			




// Custom bg/font colors.
if( !empty($nectar_options['overall-bg-color']) ) {
	echo '
	body, 
	.container-wrap, 
	.material .ocm-effect-wrap, 
	.project-title, 
	.ascend .container-wrap, 
	.ascend .project-title, 
	body .vc_text_separator div, 
	.carousel-wrap[data-full-width="true"] .carousel-heading, 
	.carousel-wrap .left-border, 
	.carousel-wrap .right-border, 
	.single-post.ascend #page-header-bg.fullscreen-header, 
	.single-post #single-below-header.fullscreen-header,
	#page-header-wrap, 
	.page-header-no-bg, 
	#full_width_portfolio .project-title.parallax-effect, 
	.portfolio-items .col, 
	.page-template-template-portfolio-php .portfolio-items .col.span_3, 
	.page-template-template-portfolio-php .portfolio-items .col.span_4 { 
		background-color: '.esc_attr($nectar_options['overall-bg-color']).'; 
	}';
}

if( !empty($nectar_options['overall-font-color']) ) {
	
	echo 'body, body h1, body h2, body h3, body h4, body h5, body h6, .masonry.material .masonry-blog-item .grav-wrap .text { 
		color: '.$nectar_options['overall-font-color'].'; 
	}';

	if( $nectar_options['overall-font-color'] !== '#000000' && $nectar_options['overall-font-color'] !== '#0a0a0a' && 
	    $nectar_options['overall-font-color'] !== '#111111' && $nectar_options['overall-font-color'] !== '#222222' && 
			$nectar_options['overall-font-color'] !== '#333333') {
		
		echo '.full-width-section > .col.span_12.dark, .full-width-content > .col.span_12.dark {
			color: '.esc_attr($nectar_options['overall-font-color']).';	
		}';
		
		echo '
		.full-width-section  > .col.span_12.dark .portfolio-items .col h3,
		.full-width-section  > .col.span_12.dark .portfolio-items[data-ps="6"] .work-meta h4 { color: #fff; } ';
		
	}
}

// Custom header colors.
if( !empty($nectar_options['header-color']) && $nectar_options['header-color'] === 'custom' ) {
	
	if( !empty($nectar_options['header-background-color']) ) {
		echo 'body #header-outer, 
		body #search-outer, 
		body.ascend #search-outer, 
    body[data-header-format="left-header"].ascend #search-outer,
		.material #header-space, 
		#header-space, 
		.material #header-outer .bg-color-stripe, 
		.material #search-outer .bg-color-stripe, 
		.material #header-outer #search-outer:before,
    body[data-header-format="left-header"].material #search-outer, 
		body.material[data-header-format="centered-menu-bottom-bar"] #page-header-wrap.fullscreen-header,
		#header-outer #mobile-menu:before { 
			background-color:'.esc_attr($nectar_options['header-background-color']).'; 
		}';
	}

	 // Custom header bg opacity.
	 if( !empty($nectar_options['header-bg-opacity']) ) {

	 		 $navBGColor = esc_attr($nectar_options['header-background-color']);
	 		 $navBGColor = substr($navBGColor,1);
			 $colorR = hexdec( substr( $navBGColor, 0, 2 ) );
			 $colorG = hexdec( substr( $navBGColor, 2, 2 ) );
			 $colorB = hexdec( substr( $navBGColor, 4, 2 ) );
			 $colorA = ($nectar_options['header-bg-opacity'] != '100') ? '0.'.esc_attr($nectar_options['header-bg-opacity']) : esc_attr($nectar_options['header-bg-opacity']);

			 echo 'body #header-outer, body[data-header-color="dark"] #header-outer { 
				 background-color: rgba('.$colorR.','.$colorG.','.$colorB.','.$colorA.'); 
			 }';	

			 // Material search.
			 echo '.material #header-outer:not(.transparent) .bg-color-stripe { 
				 display: none; 
			 }';
	}

	if( !empty($nectar_options['header-font-color']) ) {
		echo '
		#header-outer #top nav > ul > li > a, 
    #header-outer .slide-out-widget-area-toggle a i.label,
		#header-outer:not(.transparent) #top #logo, 
		#header-outer #top .span_9 > .slide-out-widget-area-toggle i, 
		#header-outer #top .sf-sub-indicator i, 
		body[data-header-color="custom"].ascend #boxed #header-outer .cart-menu .cart-icon-wrap i,  
		#header-outer #top nav ul #nectar-user-account a span, 
		#header-outer #top #toggle-nav i, 
    .material #header-outer:not([data-permanent-transparent="1"]) .mobile-search .icon-salient-search, 
		#header-outer:not([data-permanent-transparent="1"]) .mobile-user-account .icon-salient-m-user, 
		#header-outer:not([data-permanent-transparent="1"]) .mobile-search .icon-salient-search,
		#header-outer #top #mobile-cart-link i, 
		#header-outer .cart-menu .cart-icon-wrap .icon-salient-cart, 
		body[data-header-format="left-header"] #header-outer #social-in-menu a, 
		#header-outer #top nav ul #search-btn a span,
		#search-outer #search input[type="text"], 
		#search-outer #search #close a span,
		body.ascend #search-outer #search #close a span,
		body.ascend #search-outer #search input[type="text"],
		.material #search-outer #search .span_12 span,
		.material #header-outer #search-outer input::-webkit-input-placeholder,
    body[data-header-format="left-header"].material #search-outer input::-webkit-input-placeholder,
		#header-outer #mobile-menu ul li a,
		#header-outer #mobile-menu .below-menu-items-wrap p { 
			color:'.esc_attr($nectar_options['header-font-color']).'!important; 
		}';

		
		echo '
		#header-outer #top .slide-out-widget-area-toggle a .lines:after, 
		#header-outer #top .slide-out-widget-area-toggle a .lines:before,
		#header-outer #top .slide-out-widget-area-toggle a .lines-button:after, 
		body.material.mobile #header-outer.transparent:not([data-permanent-transparent="1"]) header .slide-out-widget-area-toggle a .close-line, 
		body.material.mobile #header-outer:not([data-permanent-transparent="1"]) header .slide-out-widget-area-toggle a .close-line, 
		#search-outer .close-wrap .close-line,
		#header-outer:not(.transparent) #top .slide-out-widget-area-toggle .close-line { 
			background-color:'.esc_attr($nectar_options['header-font-color']).'; 
		}';
		
		echo '#top nav > ul > .button_bordered > a:before, 
		#header-outer:not(.transparent) #top .slide-out-widget-area-toggle .close-line { 
			border-color:'.esc_attr($nectar_options['header-font-color']).'; 
		}';
	}
	
	if( !empty($nectar_options['header-font-hover-color']) ) {
		echo '
		#header-outer[data-lhe="default"] #top nav > ul > li > a:hover, 
    #header-outer .slide-out-widget-area-toggle a:hover i.label,
		body #header-outer:not(.transparent) #social-in-menu a i:after,
		#header-outer[data-lhe="default"] #top nav .sf-menu > .sfHover:not(#social-in-menu) > a, 
		body #header-outer[data-lhe="default"] #top nav > ul > li > a:hover, 
		.ascend #header-outer:not(.transparent) .cart-outer:hover .cart-menu-wrap:not(.has_products) .icon-salient-cart, 
		body.material #header-outer:not(.transparent) .cart-outer:hover .cart-menu-wrap .icon-salient-cart, 
		body #header-outer[data-lhe="default"] #top nav .sf-menu > .sfHover:not(#social-in-menu) > a, 
		body #header-outer[data-lhe="default"] #top nav .sf-menu > .current-menu-item > a, 
		body #header-outer[data-lhe="default"] #top nav .sf-menu > .current_page_item > a .sf-sub-indicator i,  
		body #header-outer[data-lhe="default"] #top nav .sf-menu > .current_page_ancestor > a, 
		body #header-outer[data-lhe="default"] #top nav .sf-menu > .current-menu-ancestor > a, 
		body #header-outer[data-lhe="default"] #top nav .sf-menu > .current-menu-ancestor > a i,  
		body #header-outer[data-lhe="default"] #top nav .sf-menu > .current_page_item > a, 
		body #top nav .sf-menu > .current_page_ancestor > a .sf-sub-indicator i,
		body #top nav .sf-menu > .current_page_item > a .sf-sub-indicator i, 
		body #header-outer[data-lhe="default"] #top nav .sf-menu > .current-menu-ancestor > a, 
		#header-outer #top .sf-menu > .sfHover > a .sf-sub-indicator i, 
		#header-outer #top .sf-menu > li > a:hover .sf-sub-indicator i, 
		#header-outer #top nav ul #search-btn a:hover span, 
		#header-outer #top nav ul #nectar-user-account a:hover span, 
		#header-outer #top nav ul .slide-out-widget-area-toggle a:hover span, 
		body:not(.material) #search-outer #search #close a span:hover,
		#header-outer #mobile-menu ul li a:hover,
		#header-outer #mobile-menu ul li a:hover .sf-sub-indicator i,
		#header-outer #mobile-menu ul li a:focus,
		#header-outer #mobile-menu ul li a:focus .sf-sub-indicator i,
		#header-outer #mobile-menu ul li[class*="current"] > a,
		#header-outer #mobile-menu ul li[class*="current"] > a i { 
			color:'.esc_attr($nectar_options['header-font-hover-color']).'!important; 
		}';
		
		echo '
		#header-outer:not(.transparent) #top nav ul .slide-out-widget-area-toggle a:hover .lines:after, 
		#header-outer:not(.transparent) #top nav ul .slide-out-widget-area-toggle a:hover .lines:before,
		#header-outer:not(.transparent) #top nav ul .slide-out-widget-area-toggle a:hover .lines-button:after, 
		body[data-header-format="left-header"] #header-outer[data-lhe="animated_underline"] #top nav > ul > li:not([class*="button_"]) > a > span:after { 
			background-color:'.esc_attr($nectar_options['header-font-hover-color']).'!important; 
		}';
		
		echo '
		#header-outer[data-lhe="animated_underline"] #top nav > ul > li > a:after, 
		body.material #header-outer #search-outer #search input[type="text"],
    body[data-header-format="left-header"].material #search-outer #search input[type="text"] { 
			border-color:'.esc_attr($nectar_options['header-font-hover-color']).'; 
		}';
	}


	if( !empty($nectar_options['header-dropdown-background-color']) ) {
		echo '
		#search-outer .ui-widget-content, 
		body:not([data-header-format="left-header"]) #top .sf-menu li ul, 
		#top nav > ul > .megamenu > .sub-menu, 
		body #top nav > ul > .megamenu > .sub-menu > li > a, 
		#header-outer .widget_shopping_cart .cart_list a, 
		#header-outer .widget_shopping_cart .cart_list li, 
		#header-outer .widget_shopping_cart_content, 
		.woocommerce .cart-notification, 
		#header-secondary-outer ul ul li a, 
		#header-secondary-outer .sf-menu li ul { 
			background-color:'.esc_attr($nectar_options['header-dropdown-background-color']).'; 
		}';
		
		echo 'body[data-header-format="left-header"] #header-outer .cart-outer .cart-notification:after { 
			border-color: transparent transparent '.esc_attr($nectar_options['header-dropdown-background-color']).' transparent; 
		} ';
	}
	
	if( !empty($nectar_options['header-dropdown-background-hover-color']) ) {
		echo '
		#top .sf-menu li ul li a:hover, 
		body #top nav .sf-menu ul .sfHover > a, 
		#top .sf-menu li ul .current-menu-item > a, 
		#top .sf-menu li ul .current-menu-ancestor > a, 
		#top nav > ul > .megamenu > ul ul li a:hover, 
		#top nav > ul > .megamenu > ul ul li a:focus, 
		#top nav > ul > .megamenu > ul ul .current-menu-item > a, 
		#header-secondary-outer ul ul li a:hover, 
		#header-secondary-outer ul ul li a:focus, 
		#header-secondary-outer ul > li:not(.megamenu) ul a:hover,
		body #header-secondary-outer .sf-menu ul .sfHover > a, 
		#search-outer .ui-widget-content li:hover, 
		.ui-state-hover, 
		.ui-widget-content .ui-state-hover, 
		.ui-widget-header .ui-state-hover, 
		.ui-state-focus, 
		.ui-widget-content .ui-state-focus, 
		.ui-widget-header .ui-state-focus, 
		#header-outer #top nav > ul > li:not(.megamenu) ul a:hover, 
		#header-outer #top nav > ul > li:not(.megamenu) .sfHover > a, 
		#header-outer:not([data-format="left-header"]) #top nav > ul > li:not(.megamenu) .sfHover > a, 
		#top nav > ul > .megamenu > ul ul .sfHover > a,
		#header-outer:not([data-format="left-header"]) #top nav > ul > li:not(.megamenu) ul a:hover, 
		body:not([data-header-format="left-header"]) #top nav > ul > .megamenu > ul ul .current-menu-item > a, 
		#header-outer:not([data-format="left-header"]) #top nav > ul > li:not(.megamenu) ul .current-menu-item > a, 
		#header-outer:not([data-format="left-header"]) #top nav > ul > li:not(.megamenu) ul .current-menu-ancestor > a { 
			background-color:'.esc_attr($nectar_options['header-dropdown-background-hover-color']).'!important; 
		}';
	}
	
	if( !empty($nectar_options['header-dropdown-font-color']) ) {
		echo '
		#search-outer .ui-widget-content li a, 
		#search-outer .ui-widget-content i, 
		#top .sf-menu li ul li a, 
		body #header-outer .widget_shopping_cart .cart_list a, 
		#header-secondary-outer ul ul li a, 
		.woocommerce .cart-notification .item-name, 
		.cart-outer .cart-notification, 
		#header-outer #top .sf-menu li ul .sf-sub-indicator i, 
		#header-outer .widget_shopping_cart .quantity, 
		#header-outer:not([data-format="left-header"]) #top nav > ul > li:not(.megamenu) ul a, 
		#header-outer .cart-notification .item-name, 
		#header-outer #top nav > ul > .nectar-woo-cart .cart-outer .widget ul a:hover, 
		#header-outer .cart-outer .total strong, 
		#header-outer .cart-outer .total,
		#header-outer ul.product_list_widget li dl dd,  
		#header-outer ul.product_list_widget li dl dt { 
			color:'.esc_attr($nectar_options['header-dropdown-font-color']).'!important; 
		}';
	}
	

	if( !empty($nectar_options['header-dropdown-font-hover-color']) ) {
		echo '
		#search-outer .ui-widget-content li:hover *, 
		#search-outer .ui-widget-content .ui-state-focus *, 
		body #top nav .sf-menu ul .sfHover > a, 
		#top nav > ul > .megamenu > ul ul .current-menu-item > a, 
		#header-secondary-outer ul ul li:hover > a, 
		#header-secondary-outer ul ul li:hover > a i, 
		#header-secondary-outer ul .sfHover > a, 
    body[data-dropdown-style="minimal"] #header-secondary-outer ul > li:not(.megamenu) .sfHover > a, 
		body #top nav .sf-menu ul .sfHover > a .sf-sub-indicator i, 
		body #top nav .sf-menu ul li:hover > a .sf-sub-indicator i, 
		body #top nav .sf-menu ul li:hover > a, 
		#top nav > ul > .megamenu > ul > li > a:hover, 
		#top nav > ul > .megamenu > ul > .sfHover > a, 
		body #top nav .sf-menu ul .current-menu-item > a, 
		body #top nav .sf-menu ul .current_page_item > a .sf-sub-indicator i, 
		body #top nav .sf-menu ul .current_page_ancestor > a .sf-sub-indicator i, 
		body #top nav .sf-menu ul .sfHover > a, 
		body #top nav .sf-menu ul .current_page_ancestor > a, 
		body #top nav .sf-menu ul .current-menu-ancestor > a, 
		body #top nav .sf-menu ul .current_page_item > a, 
		body .sf-menu ul li ul .sfHover > a .sf-sub-indicator i, 
		body .sf-menu > li > a:active > .sf-sub-indicator i, 
		body .sf-menu > .sfHover > a > .sf-sub-indicator i, 
		#header-outer:not([data-format="left-header"]) #top nav > ul > li:not(.megamenu) .sfHover > a, 
		body .sf-menu li ul .sfHover > a, 
		body #top nav > ul > .megamenu ul li:hover > a, 
		#header-outer #top nav > ul > li:not(.megamenu) ul a:hover, 
    body[data-dropdown-style="minimal"] #header-secondary-outer ul >li:not(.megamenu) ul a:hover,
		#header-outer #top nav > ul > li:not(.megamenu) .sfHover > a, 
		#header-outer #top nav ul li .sfHover > a .sf-sub-indicator i, 
		#top nav > ul > .megamenu > ul ul li a:hover, 
    #top nav > ul > .megamenu > ul ul li a:focus,
		#top nav > ul > .megamenu > ul ul .sfHover > a, 
		#header-outer #top nav ul li li:hover > a .sf-sub-indicator i, 
    #header-outer[data-format="left-header"] .sf-menu .sub-menu .current-menu-item > a,
		#header-outer:not([data-format="left-header"]) #top nav > ul > li:not(.megamenu) ul a:hover, 
		body:not([data-header-format="left-header"]) #top nav > ul > .megamenu > ul ul .current-menu-item > a, 
		#header-outer:not([data-format="left-header"]) #top nav > ul > li:not(.megamenu) .current-menu-item > a, 
		#header-outer:not([data-format="left-header"]) #top nav > ul > li:not(.megamenu) ul .current-menu-item > a, 
		#header-outer:not([data-format="left-header"]) #top nav > ul > li:not(.megamenu) ul .current-menu-ancestor > a, 
		#header-outer:not([data-format="left-header"]) #top nav > ul > li:not(.megamenu) ul .current-menu-ancestor > a .sf-sub-indicator i, 
		#header-outer:not([data-format="left-header"]) #top nav > ul > .megamenu ul ul .current-menu-item > a, 
		body:not([data-header-format="left-header"]) #top nav > ul > .megamenu > ul > li > ul > .has-ul > a:hover, 
    body:not([data-header-format="left-header"]) #top nav > ul > .megamenu > ul > li > ul > .has-ul > a:focus, 
		body:not([data-header-format="left-header"]) #top nav > ul > .megamenu > ul > li:hover > a, 
		body:not([data-header-format="left-header"]) #top nav > ul > .megamenu > ul > li > ul > .has-ul:hover > a, 
		#header-outer:not([data-format="left-header"]) #top nav > ul > .megamenu ul ul .current-menu-item.has-ul > a, 
	  #header-outer:not([data-format="left-header"]) #top nav > ul > .megamenu ul ul .current-menu-ancestor.has-ul > a, 
		#header-outer ul.product_list_widget li:hover dl dt, #header-outer ul.product_list_widget li:hover dl dd { 
			color:'.esc_attr($nectar_options['header-dropdown-font-hover-color']).'!important; 
		}';
	}


	if( !empty($nectar_options['header-dropdown-heading-font-color']) ) {
		echo '
		body:not([data-header-format="left-header"]) #top nav > ul > .megamenu > ul > li > a, 
		body:not([data-header-format="left-header"]) #top nav > ul > .megamenu > ul > li > ul > .has-ul > a, 
		body:not([data-header-format="left-header"]) #top nav > ul > .megamenu > ul > li > a, 
		#header-outer[data-lhe="default"] #top nav .sf-menu .megamenu ul .current_page_ancestor > a, 
		#header-outer[data-lhe="default"] #top nav .sf-menu .megamenu ul .current-menu-ancestor > a, 
		body:not([data-header-format="left-header"]) #top nav > ul > .megamenu > ul > li > ul > .has-ul > a { 
			color:'.esc_attr($nectar_options['header-dropdown-heading-font-color']).'!important; 
		}';
	}
	
	if( !empty($nectar_options['header-dropdown-heading-font-hover-color']) ) {
		echo '
		body:not([data-header-format="left-header"]) #top nav > ul > .megamenu > ul > li:hover > a, 
	  #header-outer:not([data-format="left-header"]) #top nav > ul > .megamenu > ul > .current-menu-ancestor.menu-item-has-children > a, 
		#top nav > ul > .megamenu > ul ul .current-menu-item > a, 
		body:not([data-header-format="left-header"]) #top nav > ul > .megamenu > ul > li > ul > .has-ul:hover > a, 
    body:not([data-header-format="left-header"]) #top nav > ul > .megamenu > ul > li > ul > .has-ul > a:focus, 
	  #header-outer:not([data-format="left-header"]) #top nav > ul > .megamenu ul ul .current-menu-item.has-ul > a, 
		#header-outer:not([data-format="left-header"]) #top nav > ul > .megamenu ul ul .current-menu-ancestor.has-ul > a  { 
			color:'.esc_attr($nectar_options['header-dropdown-heading-font-hover-color']).'!important; 
		}';
	}
	
	if( !empty($nectar_options['header-separator-color']) ) {
		echo '
		body #header-outer[data-transparent-header="true"] #top nav ul #nectar-user-account > div, 
		body[data-header-color="custom"] #top nav ul #nectar-user-account > div, 
		.ascend #header-outer[data-transparent-header="true"][data-full-width="true"][data-remove-border="true"] #top nav ul #search-btn a:after, 
		.ascend #header-outer[data-transparent-header="true"][data-full-width="true"][data-remove-border="true"] #top nav ul #nectar-user-account a:after, 
		.ascend #header-outer[data-transparent-header="true"][data-full-width="true"][data-remove-border="true"] #top nav ul .slide-out-widget-area-toggle a:after, 
		.ascend #header-outer[data-transparent-header="true"][data-full-width="true"][data-remove-border="true"] .cart-contents:after,
		#header-outer:not(.transparent) .sf-menu > li ul { 
			border-color:'.esc_attr($nectar_options['header-separator-color']).'; 
		} 
		#header-outer:not(.transparent) .sf-menu > li ul { 
				border-top-width: 1px; border-top-style: solid; 
		}';
	}
	
	if( !empty($nectar_options['secondary-header-background-color']) ) {
		echo '#header-secondary-outer, 
    #header-outer #header-secondary-outer, 
    #header-outer #mobile-menu .secondary-header-text { 
			background-color:'.esc_attr($nectar_options['secondary-header-background-color']).'; 
		}';
	}
	
	if( !empty($nectar_options['secondary-header-font-color']) ) {
		echo '#header-secondary-outer nav > ul > li > a, 
		#header-secondary-outer .nectar-center-text, 
		#header-secondary-outer .nectar-center-text a, 
		body #header-secondary-outer nav > ul > li > a .sf-sub-indicator i, 
		#header-secondary-outer #social li a i,
		#header-secondary-outer[data-lhe="animated_underline"] nav > .sf-menu >li:hover >a,
    #header-outer #mobile-menu .secondary-header-text p { 
			color:'.esc_attr($nectar_options['secondary-header-font-color']).'; 
		}';
	}
	
	if( !empty($nectar_options['secondary-header-font-hover-color']) ) {
		echo '
		#header-secondary-outer #social li a:hover i, 
		#header-secondary-outer .nectar-center-text a:hover, 
		#header-secondary-outer[data-lhe="animated_underline"] nav > .sf-menu >li >a:after, 
		#header-secondary-outer nav > ul > li:hover > a, 
		#header-secondary-outer nav > ul > .current-menu-item > a, 
		#header-secondary-outer nav > ul > .sfHover > a, 
		#header-secondary-outer nav > ul > .sfHover > a .sf-sub-indicator i, 
		#header-secondary-outer nav > ul > .current-menu-item > a .sf-sub-indicator i, 
		#header-secondary-outer nav > ul > .current-menu-ancestor > a, 
		#header-secondary-outer nav > ul > .current-menu-ancestor > a .sf-sub-indicator i, 
		#header-secondary-outer nav > ul > li:hover > a .sf-sub-indicator i { 
			color:'.esc_attr($nectar_options['secondary-header-font-hover-color']).'!important; 
		}';
	}


	if( !empty($nectar_options['header-dropdown-opacity']) ) {

	 		 $dropdownBGColor = esc_attr($nectar_options['header-dropdown-background-color']);
	 		 $dropdownBGColor = substr($dropdownBGColor,1);
			 $colorR = hexdec( substr( $dropdownBGColor, 0, 2 ) );
			 $colorG = hexdec( substr( $dropdownBGColor, 2, 2 ) );
			 $colorB = hexdec( substr( $dropdownBGColor, 4, 2 ) );
			 $colorA = ($nectar_options['header-dropdown-opacity'] != '100') ? '0.'.esc_attr($nectar_options['header-dropdown-opacity']) : esc_attr($nectar_options['header-dropdown-opacity']);

			 echo '
			 #search-outer .ui-widget-content, 
			 body:not([data-header-format="left-header"]) #top .sf-menu li ul, 
			 #top nav > ul > .megamenu > .sub-menu, 
			 body #top nav > ul > .megamenu > .sub-menu > li > a, 
			 #header-outer .widget_shopping_cart .cart_list a, 
			 #header-secondary-outer ul ul li a, 
			 #header-outer .widget_shopping_cart .cart_list li, 
			 .woocommerce .cart-notification, 
			 #header-outer .widget_shopping_cart_content { 
				 background-color: rgba('.$colorR.','.$colorG.','.$colorB.','.$colorA.')!important; 
			 }';	
	}


	// Custom off canvas menu colors.
	if( !empty($nectar_options['header-slide-out-widget-area-background-color']) ) {
		echo '
		#slide-out-widget-area:not(.fullscreen-alt):not(.fullscreen), 
		#slide-out-widget-area-bg.fullscreen, 
		#slide-out-widget-area-bg.fullscreen-alt .bg-inner, 
		body.material #slide-out-widget-area-bg.slide-out-from-right { 
			background-color:'.esc_attr($nectar_options['header-slide-out-widget-area-background-color']).'; 
		}';
		
		// Gradients.
		if( !empty($nectar_options['header-slide-out-widget-area-background-color-2']) ) {
			echo '
			body:not(.material) #slide-out-widget-area.slide-out-from-right, 
			#slide-out-widget-area.slide-out-from-right-hover, 
			#slide-out-widget-area-bg.fullscreen, 
			#slide-out-widget-area-bg.fullscreen-alt .bg-inner, 
			body.material #slide-out-widget-area-bg.slide-out-from-right { 
				background: linear-gradient(145deg, '.esc_attr($nectar_options['header-slide-out-widget-area-background-color']).', '.esc_attr($nectar_options['header-slide-out-widget-area-background-color-2']).'); 
			}';
		}
	}

	

	if( !empty($nectar_options['header-slide-out-widget-area-color']) ) {
		echo '
		#slide-out-widget-area, 
		body.material #slide-out-widget-area.slide-out-from-right .off-canvas-social-links a:hover i:before, 
		#slide-out-widget-area a, 
    #slide-out-widget-area.fullscreen-alt .inner .widget.widget_nav_menu li a, 
    #slide-out-widget-area.fullscreen-alt .inner .off-canvas-menu-container li a,
    #slide-out-widget-area.fullscreen .menuwrapper li a,
		body #slide-out-widget-area.slide-out-from-right-hover .inner .off-canvas-menu-container li a,
		body #slide-out-widget-area .slide_out_area_close .icon-default-style[class^="icon-"] { 
			color:'.esc_attr($nectar_options['header-slide-out-widget-area-color']).'; 
		}';
		
		echo '
		#slide-out-widget-area .tagcloud a, 
		body.material #slide-out-widget-area[class*="slide-out-from-right"] .off-canvas-menu-container li a:after { 
			border-color: '.esc_attr($nectar_options['header-slide-out-widget-area-color']).'; 
		}';
		
		echo '
		.slide-out-hover-icon-effect.slide-out-widget-area-toggle .lines:before, 
		.slide-out-hover-icon-effect.slide-out-widget-area-toggle .lines:after, 
		.slide-out-hover-icon-effect.slide-out-widget-area-toggle .lines-button:after,
		.slide-out-hover-icon-effect.slide-out-widget-area-toggle .unhidden-line .lines:before, 
		.slide-out-hover-icon-effect.slide-out-widget-area-toggle .unhidden-line .lines:after, 
		.slide-out-hover-icon-effect.slide-out-widget-area-toggle .unhidden-line.lines-button:after { 
			background-color:'.esc_attr($nectar_options['header-slide-out-widget-area-color']).'; 
		}';
	}

	if( !empty($nectar_options['header-slide-out-widget-area-header-color']) ) {
		echo '#slide-out-widget-area h1, 
		#slide-out-widget-area h2, 
		#slide-out-widget-area h3, 
		#slide-out-widget-area h4, 
		#slide-out-widget-area h5 { 
			color:'.esc_attr($nectar_options['header-slide-out-widget-area-header-color']).'; 
		}';
	}


	if( !empty($nectar_options['header-slide-out-widget-area-hover-color']) ) {
		echo '
		body #slide-out-widget-area.fullscreen a:hover, 
		#slide-out-widget-area.slide-out-from-right-hover a:hover,
		body.material #slide-out-widget-area.slide-out-from-right .off-canvas-social-links a i:after, 
		body #slide-out-widget-area.slide-out-from-right a:hover, 
		#slide-out-widget-area.fullscreen-alt .inner .off-canvas-menu-container li a:hover, 
		#slide-out-widget-area.slide-out-from-right-hover .inner .off-canvas-menu-container li a:hover, 
		#slide-out-widget-area.slide-out-from-right-hover.no-text-effect .inner .off-canvas-menu-container li a:hover, 
		body #slide-out-widget-area .slide_out_area_close:hover .icon-default-style[class^="icon-"], 
		body.material #slide-out-widget-area.slide-out-from-right .off-canvas-menu-container .current-menu-item > a { 
			color:'.esc_attr($nectar_options['header-slide-out-widget-area-hover-color']).'!important; 
		}  
		body.material #slide-out-widget-area[class*="slide-out-from-right"] .off-canvas-menu-container li a:after,
		#slide-out-widget-area .tagcloud a:hover { 
			border-color: '.esc_attr($nectar_options['header-slide-out-widget-area-hover-color']).'; 
		} ';
		
	
	}

	if( !empty($nectar_options['header-slide-out-widget-area-close-bg-color']) ) {
		echo 'body[data-slide-out-widget-area-style="slide-out-from-right"].material .slide_out_area_close:before { 
			background-color: '.esc_attr($nectar_options['header-slide-out-widget-area-close-bg-color']).'; 
		} ';
	}
	
	if( !empty($nectar_options['header-slide-out-widget-area-close-icon-color']) ) {
		echo '@media only screen and (min-width: 1000px) { 
			body[data-slide-out-widget-area-style="slide-out-from-right"].material .slide_out_area_close .close-line { 
				background-color: '.esc_attr($nectar_options['header-slide-out-widget-area-close-icon-color']).'; 
			} 
		} ';
	}


} 


// Custom footer colors.
if( !empty($nectar_options['footer-custom-color']) && $nectar_options['footer-custom-color'] === '1' ) {
	
	if( !empty($nectar_options['footer-background-color']) ) {
		echo '
		#footer-outer, 
		#nectar_fullscreen_rows > #footer-outer.wpb_row .full-page-inner-wrap { 
			background-color:'.esc_attr($nectar_options['footer-background-color']).'!important; 
		} 
		#footer-outer #footer-widgets { 
			border-bottom: none; 
		} 
		body.original #footer-outer #footer-widgets .col ul li { 
			border-bottom: 1px solid rgba(0,0,0,0.1); 
		} 
		.original #footer-outer #footer-widgets .col .widget_recent_comments ul li,
		#footer-outer #footer-widgets .col .widget_recent_comments ul li { 
			background-color: rgba(0, 0, 0, 0.07); 
			border-bottom: 0px;
		} ';
    if( '#000000' === $nectar_options['footer-background-color'] ) {
      echo '#ajax-content-wrap #footer-outer #footer-widgets .col .widget_recent_comments ul li { background-color: rgba(255,255,255,0.05); }';
    }
	}
	
	if( !empty($nectar_options['footer-font-color']) ) {
		echo '
		#footer-outer, 
		#footer-outer a:not(.nectar-button) { 
			color:'.esc_attr($nectar_options['footer-font-color']).'!important; 
		}
    #footer-outer[data-link-hover="underline"][data-custom-color="true"] #footer-widgets ul:not([class*="nectar_blog_posts"]) a:not(.tag-cloud-link):not(.nectar-button),
    #footer-outer[data-link-hover="underline"] #footer-widgets .textwidget a:not(.nectar-button) {
      background-image: linear-gradient(to right, '.esc_attr($nectar_options["footer-font-color"]).' 0%, '.esc_attr($nectar_options["footer-font-color"]).' 100%);
    }';
	}
	
	if( !empty($nectar_options['footer-secondary-font-color']) ) {
		echo '
		#footer-outer #footer-widgets .widget h4, 
		#footer-outer .col .widget_recent_entries span, 
		#footer-outer .col .recent_posts_extra_widget .post-widget-text span { 
			color:'.esc_attr($nectar_options['footer-secondary-font-color']).'!important; 
		}';
	}
	
	if( !empty($nectar_options['footer-copyright-background-color']) ) {
		echo '
		#footer-outer #copyright,
		.ascend #footer-outer #copyright { 
			border: none; 
			background-color:'.esc_attr($nectar_options['footer-copyright-background-color']).'; 
		}';
	}
	
	if( !empty($nectar_options['footer-copyright-font-color']) ) {
		echo '
		#footer-outer #copyright .widget h4, 
		#footer-outer #copyright li a i, 
		#footer-outer #copyright p { 
			color:'.esc_attr($nectar_options['footer-copyright-font-color']).'; 
		} 
		#footer-outer[data-cols="1"] #copyright li a i:after { 
			border-color:'.esc_attr($nectar_options['footer-copyright-font-color']).'; 
		}';
	}

	if( !empty($nectar_options['footer-copyright-icon-hover-color']) ) {
		echo '
		#footer-outer #copyright li a:hover i, 
		#footer-outer[data-cols="1"] #copyright li a:hover i, 
		#footer-outer[data-cols="1"] #copyright li a:hover i:after { 
			border-color: '.esc_attr($nectar_options['footer-copyright-icon-hover-color']).'; 
			color:'.esc_attr($nectar_options['footer-copyright-icon-hover-color']).'; 
		}';
	}

	// Copyright border line.
	if( !empty($nectar_options['footer-copyright-line']) && $nectar_options['footer-copyright-line'] === '1' ) {
		echo '
		#ajax-content-wrap #footer-outer #copyright { 
			border-top: 1px solid rgba(255,255,255,0.18); 
		}';
	}
}

// Custom CTA colors.
if( !empty($nectar_options['cta-background-color']) ) {
	echo '#call-to-action { 
		background-color:'.esc_attr($nectar_options['cta-background-color']).'; 
	}';
}

if( !empty($nectar_options['cta-text-color']) ) {
	echo '#call-to-action span { 
		color:'.esc_attr($nectar_options['cta-text-color']).'; 
	}';
}

// Off canvas menu overlay color.
$slide_out_widget_overlay = (!empty($nectar_options['header-slide-out-widget-area-overlay-opacity'])) ? $nectar_options['header-slide-out-widget-area-overlay-opacity'] : 'dark';

if( $slide_out_widget_overlay === 'dark' ) {
	echo 'body #slide-out-widget-area-bg { 
		background-color: rgba(0,0,0,0.8); 
	}';
} else if( $slide_out_widget_overlay === 'medium' ) {
	echo 'body #slide-out-widget-area-bg { 
		background-color: rgba(0,0,0,0.6); 
	}';
} else {
	echo 'body #slide-out-widget-area-bg { 
		background-color: rgba(0,0,0,0.4); 
	}';
}

// Blog categories.
$theme_skin   = (!empty($nectar_options['theme-skin'])) ? $nectar_options['theme-skin'] : 'default';
$headerFormat = (!empty($nectar_options['header_format'])) ? $nectar_options['header_format'] : 'default';
$masonry_type = (!empty($nectar_options['blog_masonry_type'])) ? $nectar_options['blog_masonry_type'] : 'classic'; 

if( 'centered-menu-bottom-bar' === $headerFormat ) {
	$theme_skin = 'material';
}

if( 'classic_enhanced' === $masonry_type || 'material' === $theme_skin ) {

	$categories = get_categories();

	if(!empty($categories)){

		foreach($categories as $k => $v) {

			$t_id  = esc_attr($v->term_id);
			$terms = get_option( "taxonomy_$t_id" );

			if( !empty($terms['category_color']) ) {
				echo '
				.single .heading-title[data-header-style="default_minimal"] .meta-category .'.esc_attr($v->slug) . ':hover, 
				.single .heading-title[data-header-style="default_minimal"] .meta-category .'.esc_attr($v->slug) . ':focus, 
				body.material #page-header-bg.fullscreen-header .inner-wrap >a.'.esc_attr($v->slug) . ', 
				.blog-recent.related-posts[data-style="classic_enhanced"] .meta-category .'.esc_attr($v->slug) . ':hover, 
				.masonry.classic_enhanced .posts-container article .meta-category .'.esc_attr($v->slug) . ':hover, 
				.blog-recent.related-posts[data-style="classic_enhanced"] .meta-category .'.esc_attr($v->slug) . ':focus, 
				.masonry.classic_enhanced .posts-container article .meta-category .'.esc_attr($v->slug) . ':focus, 
				#page-header-bg[data-post-hs="default_minimal"] .inner-wrap > .'.esc_attr($v->slug) . ':hover, 
				#page-header-bg[data-post-hs="default_minimal"] .inner-wrap > .'.esc_attr($v->slug) . ':focus, 
				.nectar-recent-posts-slider .container .strong .'.esc_attr($v->slug).':before, 
				.masonry.material .masonry-blog-item .meta-category .'.esc_attr($v->slug) . ':before, 
				[data-style="list_featured_first_row"] .meta-category .'.esc_attr($v->slug) . ':before, 
				.nectar-recent-posts-single_featured .strong .'.esc_attr($v->slug) . ', 
				.related-posts[data-style="material"] .meta-category .'.esc_attr($v->slug) . ':before, 
				.post-area.featured_img_left .meta-category .'.esc_attr($v->slug) . ':before, 
				.post-area.featured_img_left .quote.category-'.esc_attr($v->slug) . ' .quote-inner:before, 
				.material.masonry .masonry-blog-item.category-'.esc_attr($v->slug) . ' .quote-inner:before, 
				.material.masonry .masonry-blog-item.category-'.esc_attr($v->slug) . ' .video-play-button, 
				.material.masonry .masonry-blog-item.category-'.esc_attr($v->slug) . ' .link-inner:before { 
					background-color: '.esc_attr($terms['category_color']).'!important; 
				}
				
				[data-style="list_featured_first_row"] .meta-category .'.esc_attr($v->slug) . ', 
				.masonry.material .masonry-blog-item .meta-category .'.esc_attr($v->slug) . ', 
				.post-area.featured_img_left .meta-category .'.esc_attr($v->slug) . ', 
				.related-posts[data-style="material"] .meta-category .'.esc_attr($v->slug) . ' { 
					color: '.esc_attr($terms['category_color']).'!important; 
				}';
			}
			
		}
	}
}



// Page full screen rows.
global $post;
$page_full_screen_rows_bg_color  = (isset($post->ID)) ? get_post_meta($post->ID, '_nectar_full_screen_rows_overall_bg_color', true) : '#333333';
$page_full_screen_rows_animation = (isset($post->ID)) ? get_post_meta($post->ID, '_nectar_full_screen_rows_animation', true) : '';

echo '#nectar_fullscreen_rows { 
	background-color: '.esc_attr($page_full_screen_rows_bg_color).'; 
}';

if( 'parallax' === $page_full_screen_rows_animation ) {
	echo '#nectar_fullscreen_rows > .wpb_row .full-page-inner-wrap { 
		background-color: '.esc_attr($page_full_screen_rows_bg_color).'; 
	}';
}


?>