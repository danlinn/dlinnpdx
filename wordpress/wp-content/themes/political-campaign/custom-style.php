<?php

	$political_campaign_custom_css= "";

	/*-------------------- First Highlight Color -------------------*/

	$political_campaign_first_color = get_theme_mod('political_campaign_first_color');

	if($political_campaign_first_color != false){
		$political_campaign_custom_css .='.principle-box:hover .principle-box-inner-img, .more-btn a , #comments input[type="submit"],#comments a.comment-reply-link,input[type="submit"],.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt,.pro-button a, .woocommerce a.added_to_cart.wc-forward, #footer input[type="submit"], #footer-2, #footer .wp-block-search .wp-block-search__button, #sidebar .wp-block-search .wp-block-search__button, .scrollup i:hover, #sidebar .custom-social-icons a,#footer .custom-social-icons a, #sidebar h3,  #sidebar .widget_block h3, #sidebar h2, .pagination span, .pagination a, .woocommerce span.onsale, nav.woocommerce-MyAccount-navigation ul li,#sidebar label.wp-block-search__label, #sidebar .wp-block-heading,.wp-block-tag-cloud a:hover,.bradcrumbs a,.bradcrumbs span,.post-categories li a,.wp-block-button__link,nav.navigation.posts-navigation .nav-previous a,nav.navigation.posts-navigation .nav-next a{';
			$political_campaign_custom_css .='background: '.esc_attr($political_campaign_first_color).';';
		$political_campaign_custom_css .='}';
	}

	if($political_campaign_first_color != false){
		$political_campaign_custom_css .='a, p.site-title a, .logo h1 a, .logo p.site-description, .main-header span.donate a:hover, .main-header span.volunteer a:hover, .main-header span.donate i:hover, .main-header span.volunteer i:hover, .box-content h3, .box-content h3 a, .woocommerce-message::before,.woocommerce-info::before{';
			$political_campaign_custom_css .='color: '.esc_attr($political_campaign_first_color).';';
		$political_campaign_custom_css .='}';
	}

	if($political_campaign_first_color != false){
		$political_campaign_custom_css .='.woocommerce-message,.woocommerce-info{';
			$political_campaign_custom_css .='border-top-color: '.esc_attr($political_campaign_first_color).';';
		$political_campaign_custom_css .='}';
	}

	$political_campaign_custom_css .='@media screen and (max-width:1000px) {';
		if($political_campaign_first_color != false){
			$political_campaign_custom_css .='.main-header{
				background:'.esc_attr($political_campaign_first_color).' !important;
			}';
		}
	$political_campaign_custom_css .='}';

	/*-------------------- Second Highlight Color -------------------*/

	$political_campaign_second_color = get_theme_mod('political_campaign_second_color');

	if($political_campaign_second_color != false){
		$political_campaign_custom_css .='#comments input[type="submit"]:hover, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover,.woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover,.widget_product_search button:hover, .woocommerce button.button:disabled:hover, .woocommerce button.button:disabled[disabled]:hover, .woocommerce a.added_to_cart.wc-forward:hover, #topbar .custom-social-icons i:hover, #slider .carousel-control-next i:hover, #slider .carousel-control-prev i:hover, .more-btn a:hover,input[type="submit"]:hover, #comments a.comment-reply-link:hover,.pagination a:hover,#footer .tagcloud a:hover, .pro-button a:hover, #preloader, #footer .tagcloud a:hover, .scrollup i, #sidebar .custom-social-icons a:hover, #footer .custom-social-icons a:hover, #footer input[type="submit"]:hover, #sidebar .tagcloud a:hover, .pagination a:hover, .pagination .current, nav.woocommerce-MyAccount-navigation ul li:hover, .toggle-nav i{';
			$political_campaign_custom_css .='background: '.esc_attr($political_campaign_second_color).';';
		$political_campaign_custom_css .='}';
	}

	if($political_campaign_second_color != false){
		$political_campaign_custom_css .='a:hover, p.site-title a:hover, .logo h1 a:hover, #topbar span.adress i, #topbar span.phone-number i, #topbar span.location i, #topbar span.adress a:hover, #topbar span.phone-number a:hover, .main-navigation li a:hover, .main-navigation li a:focus, .main-navigation ul ul a:focus, .main-navigation ul ul a:hover, #slider .inner_carousel h1 a:hover, #slider .slider-btn a:hover, #Campaign-princi-section .Campaign-content strong, .principle-box:hover .box-content h3 a, .post-main-box:hover h2 a, .post-main-box:hover .post-info span a, .single-post .post-info:hover a, .middle-bar h6, .post-main-box:hover h3 a,#sidebar ul li a:hover, #footer li a:hover,.post-navigation a:hover .post-title, .post-navigation a:focus .post-title,.post-navigation a:hover,.post-navigation a:focus, .post-navigation span.meta-nav:hover, .woocommerce div.product p.price, .woocommerce div.product span.price,.woocommerce ul.products li.product .price, del span.woocommerce-Price-amount.amount bdi{';
			$political_campaign_custom_css .='color: '.esc_attr($political_campaign_second_color).';';
		$political_campaign_custom_css .='}';
	}

	if($political_campaign_second_color != false){
		$political_campaign_custom_css .='.tags-bg a:hover{';
			$political_campaign_custom_css .='color: '.esc_attr($political_campaign_second_color).'!important;';
		$political_campaign_custom_css .='}';
	}

	if($political_campaign_second_color != false){
		$political_campaign_custom_css .='#topbar .custom-social-icons i:hover, #slider .carousel-control-next i:hover, #slider .carousel-control-prev i:hover, #footer .tagcloud a:hover{';
			$political_campaign_custom_css .='border-color: '.esc_attr($political_campaign_second_color).';';
		$political_campaign_custom_css .='}';
	}

	if($political_campaign_second_color != false){
		$political_campaign_custom_css .='#slider .slider-btn a:hover{';
			$political_campaign_custom_css .='border-top-color: '.esc_attr($political_campaign_second_color).';';
		$political_campaign_custom_css .='}';
	}

	if($political_campaign_second_color != false){
		$political_campaign_custom_css .='.main-navigation .current-menu-item > a:after, #slider .slider-btn a:hover{';
			$political_campaign_custom_css .='border-bottom-color: '.esc_attr($political_campaign_second_color).';';
		$political_campaign_custom_css .='}';
	}

	$political_campaign_custom_css .='@media screen and (max-width:1000px) {';
		if($political_campaign_second_color != false){
			$political_campaign_custom_css .='.main-navigation a:hover{
				color:'.esc_attr($political_campaign_second_color).' !important;
			}';
		}
	$political_campaign_custom_css .='}';

	if($political_campaign_first_color != false || $political_campaign_second_color != false){
		$political_campaign_custom_css .='.main-header{
		background: linear-gradient(to right, '.esc_attr($political_campaign_first_color).' 64%, '.esc_attr($political_campaign_second_color).' 36%);
		}';
	}

	if($political_campaign_first_color != false || $political_campaign_second_color != false){
		$political_campaign_custom_css .='#Campaign-princi-section .Campaign-content h2:after{
		background: linear-gradient(to right, '.esc_attr($political_campaign_first_color).' 50%, '.esc_attr($political_campaign_second_color).' 50%);
		}';
	}

	/*---------------------------Width Layout -------------------*/

	$political_campaign_theme_lay = get_theme_mod( 'political_campaign_width_option','Full Width');
    if($political_campaign_theme_lay == 'Boxed'){
		$political_campaign_custom_css .='body{';
			$political_campaign_custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$political_campaign_custom_css .='}';
		$political_campaign_custom_css .='.scrollup i{';
			$political_campaign_custom_css .='right: 100px;';
		$political_campaign_custom_css .='}';
		$political_campaign_custom_css .='.row.outer-logo{';
			$political_campaign_custom_css .='margin-left: 0px;';
		$political_campaign_custom_css .='}';
	}else if($political_campaign_theme_lay == 'Wide Width'){
		$political_campaign_custom_css .='body{';
			$political_campaign_custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$political_campaign_custom_css .='}';
		$political_campaign_custom_css .='.scrollup i{';
			$political_campaign_custom_css .='right: 30px;';
		$political_campaign_custom_css .='}';
		$political_campaign_custom_css .='.row.outer-logo{';
			$political_campaign_custom_css .='margin-left: 0px;';
		$political_campaign_custom_css .='}';
	}else if($political_campaign_theme_lay == 'Full Width'){
		$political_campaign_custom_css .='body{';
			$political_campaign_custom_css .='max-width: 100%;';
		$political_campaign_custom_css .='}';
	}

	/*----------------Responsive Media -----------------------*/

	$political_campaign_resp_slider = get_theme_mod( 'political_campaign_resp_slider_hide_show',true);
	if($political_campaign_resp_slider == true && get_theme_mod( 'political_campaign_slider_hide_show', false) == false){
    	$political_campaign_custom_css .='#slider{';
			$political_campaign_custom_css .='display:none;';
		$political_campaign_custom_css .='} ';
	}
    if($political_campaign_resp_slider == true){
    	$political_campaign_custom_css .='@media screen and (max-width:575px) {';
		$political_campaign_custom_css .='#slider{';
			$political_campaign_custom_css .='display:block;';
		$political_campaign_custom_css .='} }';
	}else if($political_campaign_resp_slider == false){
		$political_campaign_custom_css .='@media screen and (max-width:575px) {';
		$political_campaign_custom_css .='#slider{';
			$political_campaign_custom_css .='display:none;';
		$political_campaign_custom_css .='} }';
		$political_campaign_custom_css .='@media screen and (max-width:575px){';
		$political_campaign_custom_css .='.page-template-custom-home-page.admin-bar .homepageheader{';
			$political_campaign_custom_css .='margin-top: 45px;';
		$political_campaign_custom_css .='} }';
	}

	$political_campaign_resp_sidebar = get_theme_mod( 'political_campaign_sidebar_hide_show',true);
    if($political_campaign_resp_sidebar == true){
    	$political_campaign_custom_css .='@media screen and (max-width:575px) {';
		$political_campaign_custom_css .='#sidebar{';
			$political_campaign_custom_css .='display:block;';
		$political_campaign_custom_css .='} }';
	}else if($political_campaign_resp_sidebar == false){
		$political_campaign_custom_css .='@media screen and (max-width:575px) {';
		$political_campaign_custom_css .='#sidebar{';
			$political_campaign_custom_css .='display:none;';
		$political_campaign_custom_css .='} }';
	}

	$political_campaign_resp_scroll_top = get_theme_mod( 'political_campaign_resp_scroll_top_hide_show',true);
	if($political_campaign_resp_scroll_top == true && get_theme_mod( 'political_campaign_hide_show_scroll',true) == false){
    	$political_campaign_custom_css .='.scrollup i{';
			$political_campaign_custom_css .='visibility:hidden !important;';
		$political_campaign_custom_css .='} ';
	}
    if($political_campaign_resp_scroll_top == true){
    	$political_campaign_custom_css .='@media screen and (max-width:575px) {';
		$political_campaign_custom_css .='.scrollup i{';
			$political_campaign_custom_css .='visibility:visible !important;';
		$political_campaign_custom_css .='} }';
	}else if($political_campaign_resp_scroll_top == false){
		$political_campaign_custom_css .='@media screen and (max-width:575px){';
		$political_campaign_custom_css .='.scrollup i{';
			$political_campaign_custom_css .='visibility:hidden !important;';
		$political_campaign_custom_css .='} }';
	}

	/*-------------- Copyright Alignment ----------------*/

	$political_campaign_copyright_alingment = get_theme_mod('political_campaign_copyright_alingment');
	if($political_campaign_copyright_alingment != false){
		$political_campaign_custom_css .='.copyright p{';
			$political_campaign_custom_css .='text-align: '.esc_attr($political_campaign_copyright_alingment).';';
		$political_campaign_custom_css .='}';
	}

	$political_campaign_copyright_background_color = get_theme_mod('political_campaign_copyright_background_color');
	if($political_campaign_copyright_background_color != false){
		$political_campaign_custom_css .='#footer-2{';
			$political_campaign_custom_css .='background-color: '.esc_attr($political_campaign_copyright_background_color).';';
		$political_campaign_custom_css .='}';
	} 

	$political_campaign_footer_img_position = get_theme_mod('political_campaign_footer_img_position','center center');
	if($political_campaign_footer_img_position != false){
		$political_campaign_custom_css .='#footer{';
			$political_campaign_custom_css .='background-position: '.esc_attr($political_campaign_footer_img_position).'!important;';
		$political_campaign_custom_css .='}';
	}

	$political_campaign_copyright_font_size = get_theme_mod('political_campaign_copyright_font_size');
	if($political_campaign_copyright_font_size != false){
		$political_campaign_custom_css .='.copyright p, .copyright a{';
			$political_campaign_custom_css .='font-size: '.esc_attr($political_campaign_copyright_font_size).';';
		$political_campaign_custom_css .='}';
	}

	$political_campaign_copyright_font_weight = get_theme_mod('political_campaign_copyright_font_weight');
	if($political_campaign_copyright_font_weight != false){
		$political_campaign_custom_css .='.copyright p, .copyright a{';
			$political_campaign_custom_css .='font-weight: '.esc_attr($political_campaign_copyright_font_weight).';';
		$political_campaign_custom_css .='}';
	}

	$political_campaign_copyright_text_color = get_theme_mod('political_campaign_copyright_text_color');
	if($political_campaign_copyright_text_color != false){
		$political_campaign_custom_css .='.copyright p, .copyright a{';
			$political_campaign_custom_css .='color: '.esc_attr($political_campaign_copyright_text_color).';';
		$political_campaign_custom_css .='}';
	} 
	
	/*----------------Sroll to top Settings ------------------*/

	$political_campaign_scroll_to_top_font_size = get_theme_mod('political_campaign_scroll_to_top_font_size');
	if($political_campaign_scroll_to_top_font_size != false){
		$political_campaign_custom_css .='.scrollup i{';
			$political_campaign_custom_css .='font-size: '.esc_attr($political_campaign_scroll_to_top_font_size).';';
		$political_campaign_custom_css .='}';
	}

	$political_campaign_scroll_to_top_padding = get_theme_mod('political_campaign_scroll_to_top_padding');
	$political_campaign_scroll_to_top_padding = get_theme_mod('political_campaign_scroll_to_top_padding');
	if($political_campaign_scroll_to_top_padding != false){
		$political_campaign_custom_css .='.scrollup i{';
			$political_campaign_custom_css .='padding-top: '.esc_attr($political_campaign_scroll_to_top_padding).';padding-bottom: '.esc_attr($political_campaign_scroll_to_top_padding).';';
		$political_campaign_custom_css .='}';
	}

	$political_campaign_scroll_to_top_width = get_theme_mod('political_campaign_scroll_to_top_width');
	if($political_campaign_scroll_to_top_width != false){
		$political_campaign_custom_css .='.scrollup i{';
			$political_campaign_custom_css .='width: '.esc_attr($political_campaign_scroll_to_top_width).';';
		$political_campaign_custom_css .='}';
	}

	$political_campaign_scroll_to_top_height = get_theme_mod('political_campaign_scroll_to_top_height');
	if($political_campaign_scroll_to_top_height != false){
		$political_campaign_custom_css .='.scrollup i{';
			$political_campaign_custom_css .='height: '.esc_attr($political_campaign_scroll_to_top_height).';';
		$political_campaign_custom_css .='}';
	}

	$political_campaign_scroll_to_top_border_radius = get_theme_mod('political_campaign_scroll_to_top_border_radius');
	if($political_campaign_scroll_to_top_border_radius != false){
		$political_campaign_custom_css .='.scrollup i{';
			$political_campaign_custom_css .='border-radius: '.esc_attr($political_campaign_scroll_to_top_border_radius).'px;';
		$political_campaign_custom_css .='}';
	}

	/*------------------ Logo  -------------------*/

	$political_campaign_site_title_font_size = get_theme_mod('political_campaign_site_title_font_size');
	if($political_campaign_site_title_font_size != false){
		$political_campaign_custom_css .='.logo h1, .logo p.site-title{';
			$political_campaign_custom_css .='font-size: '.esc_attr($political_campaign_site_title_font_size).'!important;';
		$political_campaign_custom_css .='}';
	}

	$political_campaign_site_tagline_font_size = get_theme_mod('political_campaign_site_tagline_font_size');
	if($political_campaign_site_tagline_font_size != false){
		$political_campaign_custom_css .='.logo p.site-description{';
			$political_campaign_custom_css .='font-size: '.esc_attr($political_campaign_site_tagline_font_size).'!important;';
		$political_campaign_custom_css .='}';
	}

	$political_campaign_site_title_color = get_theme_mod('political_campaign_site_title_color');
	if($political_campaign_site_title_color != false){
		$political_campaign_custom_css .='p.site-title a{';
			$political_campaign_custom_css .='color: '.esc_attr($political_campaign_site_title_color).';';
		$political_campaign_custom_css .='}';
	}

	$political_campaign_site_tagline_color = get_theme_mod('political_campaign_site_tagline_color');
	if($political_campaign_site_tagline_color != false){
		$political_campaign_custom_css .='.logo p.site-description{';
			$political_campaign_custom_css .='color: '.esc_attr($political_campaign_site_tagline_color).';';
		$political_campaign_custom_css .='}';
	}

	$political_campaign_logo_width = get_theme_mod('political_campaign_logo_width');
	if($political_campaign_logo_width != false){
		$political_campaign_custom_css .='.logo img{';
			$political_campaign_custom_css .='width: '.esc_attr($political_campaign_logo_width).';';
		$political_campaign_custom_css .='}';
	}

	$political_campaign_logo_height = get_theme_mod('political_campaign_logo_height');
	if($political_campaign_logo_height != false){
		$political_campaign_custom_css .='.logo img{';
			$political_campaign_custom_css .='height: '.esc_attr($political_campaign_logo_height).';';
		$political_campaign_custom_css .='}';
	}

	// Woocommerce img

	$political_campaign_shop_featured_image_border_radius = get_theme_mod('political_campaign_shop_featured_image_border_radius', 0);
	if($political_campaign_shop_featured_image_border_radius != false){
		$political_campaign_custom_css .='.woocommerce ul.products li.product a img{';
			$political_campaign_custom_css .='border-radius: '.esc_attr($political_campaign_shop_featured_image_border_radius).'px;';
		$political_campaign_custom_css .='}';
	}

	$political_campaign_shop_featured_image_box_shadow = get_theme_mod('political_campaign_shop_featured_image_box_shadow',0);
	if($political_campaign_shop_featured_image_box_shadow != false){
		$political_campaign_custom_css .='.woocommerce ul.products li.product a img{';
			$political_campaign_custom_css .='box-shadow: '.esc_attr($political_campaign_shop_featured_image_box_shadow).'px '.esc_attr($political_campaign_shop_featured_image_box_shadow).'px '.esc_attr($political_campaign_shop_featured_image_box_shadow).'px #cccccc;';
		$political_campaign_custom_css .='}';
	}

	$political_campaign_products_padding_top_bottom = get_theme_mod('political_campaign_products_padding_top_bottom');
	if($political_campaign_products_padding_top_bottom != false){
		$political_campaign_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$political_campaign_custom_css .='padding-top: '.esc_attr($political_campaign_products_padding_top_bottom).'!important; padding-bottom: '.esc_attr($political_campaign_products_padding_top_bottom).'!important;';
		$political_campaign_custom_css .='}';
	}

	$political_campaign_products_padding_left_right = get_theme_mod('political_campaign_products_padding_left_right');
	if($political_campaign_products_padding_left_right != false){
		$political_campaign_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$political_campaign_custom_css .='padding-left: '.esc_attr($political_campaign_products_padding_left_right).'!important; padding-right: '.esc_attr($political_campaign_products_padding_left_right).'!important;';
		$political_campaign_custom_css .='}';
	}

	$political_campaign_products_box_shadow = get_theme_mod('political_campaign_products_box_shadow');
	if($political_campaign_products_box_shadow != false){
		$political_campaign_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
				$political_campaign_custom_css .='box-shadow: '.esc_attr($political_campaign_products_box_shadow).'px '.esc_attr($political_campaign_products_box_shadow).'px '.esc_attr($political_campaign_products_box_shadow).'px #ddd;';
		$political_campaign_custom_css .='}';
	}

	$political_campaign_products_border_radius = get_theme_mod('political_campaign_products_border_radius', 0);
	if($political_campaign_products_border_radius != false){
		$political_campaign_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$political_campaign_custom_css .='border-radius: '.esc_attr($political_campaign_products_border_radius).'px;';
		$political_campaign_custom_css .='}';
	}

	$political_campaign_products_btn_padding_top_bottom = get_theme_mod('political_campaign_products_btn_padding_top_bottom');
	if($political_campaign_products_btn_padding_top_bottom != false){
		$political_campaign_custom_css .='.woocommerce a.button{';
			$political_campaign_custom_css .='padding-top: '.esc_attr($political_campaign_products_btn_padding_top_bottom).' !important; padding-bottom: '.esc_attr($political_campaign_products_btn_padding_top_bottom).' !important;';
		$political_campaign_custom_css .='}';
	}

	$political_campaign_products_btn_padding_left_right = get_theme_mod('political_campaign_products_btn_padding_left_right');
	if($political_campaign_products_btn_padding_left_right != false){
		$political_campaign_custom_css .='.woocommerce a.button{';
			$political_campaign_custom_css .='padding-left: '.esc_attr($political_campaign_products_btn_padding_left_right).' !important; padding-right: '.esc_attr($political_campaign_products_btn_padding_left_right).' !important;';
		$political_campaign_custom_css .='}';
	}

	$political_campaign_products_button_border_radius = get_theme_mod('political_campaign_products_button_border_radius', 0);
	if($political_campaign_products_button_border_radius != false){
		$political_campaign_custom_css .='.woocommerce ul.products li.product .button, a.checkout-button.button.alt.wc-forward,.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt{';
			$political_campaign_custom_css .='border-radius: '.esc_attr($political_campaign_products_button_border_radius).'px !important;';
		$political_campaign_custom_css .='}';
	}

	$political_campaign_woocommerce_sale_position = get_theme_mod( 'political_campaign_woocommerce_sale_position','right');
    if($political_campaign_woocommerce_sale_position == 'left'){
		$political_campaign_custom_css .='.woocommerce ul.products li.product .onsale{';
			$political_campaign_custom_css .='left: 10px !important; right: auto !important;';
		$political_campaign_custom_css .='}';
	}else if($political_campaign_woocommerce_sale_position == 'right'){
		$political_campaign_custom_css .='.woocommerce ul.products li.product .onsale{';
			$political_campaign_custom_css .='left: auto !important; right: 10px !important;';
		$political_campaign_custom_css .='}';
	}

	$political_campaign_woocommerce_sale_font_size = get_theme_mod('political_campaign_woocommerce_sale_font_size');
	if($political_campaign_woocommerce_sale_font_size != false){
		$political_campaign_custom_css .='.woocommerce span.onsale{';
			$political_campaign_custom_css .='font-size: '.esc_attr($political_campaign_woocommerce_sale_font_size).';';
		$political_campaign_custom_css .='}';
	}

	$political_campaign_woocommerce_sale_border_radius = get_theme_mod('political_campaign_woocommerce_sale_border_radius', 0);
	if($political_campaign_woocommerce_sale_border_radius != false){
		$political_campaign_custom_css .='.woocommerce span.onsale{';
			$political_campaign_custom_css .='border-radius: '.esc_attr($political_campaign_woocommerce_sale_border_radius).'px;';
		$political_campaign_custom_css .='}';
	}


	/*-------------------------------------------------------------------------------------------*/

	$political_campaign_theme_lay = get_theme_mod( 'political_campaign_img_footer','scroll');
	if($political_campaign_theme_lay == 'fixed'){
		$political_campaign_custom_css .='#footer{';
			$political_campaign_custom_css .='background-attachment: fixed !important;';
		$political_campaign_custom_css .='}';
	}elseif ($political_campaign_theme_lay == 'scroll'){
		$political_campaign_custom_css .='#footer{';
			$political_campaign_custom_css .='background-attachment: scroll !important;';
		$political_campaign_custom_css .='}';
	}

	/*------------- Preloader Background Color  -------------------*/

	$political_campaign_preloader_bg_color = get_theme_mod('political_campaign_preloader_bg_color');
	if($political_campaign_preloader_bg_color != false){
		$political_campaign_custom_css .='#preloader{';
			$political_campaign_custom_css .='background-color: '.esc_attr($political_campaign_preloader_bg_color).';';
		$political_campaign_custom_css .='}';
	}

	$political_campaign_preloader_border_color = get_theme_mod('political_campaign_preloader_border_color');
	if($political_campaign_preloader_border_color != false){
		$political_campaign_custom_css .='.loader-line{';
			$political_campaign_custom_css .='border-color: '.esc_attr($political_campaign_preloader_border_color).'!important;';
		$political_campaign_custom_css .='}';
	}

	$political_campaign_preloader_bg_img = get_theme_mod('political_campaign_preloader_bg_img');
	if($political_campaign_preloader_bg_img != false){
		$political_campaign_custom_css .='#preloader{';
			$political_campaign_custom_css .='background: url('.esc_attr($political_campaign_preloader_bg_img).');-webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;';
		$political_campaign_custom_css .='}';
	}

	// Header Background Color
	$political_campaign_header_background_color = get_theme_mod('political_campaign_header_background_color');
	if($political_campaign_header_background_color != false){
		$political_campaign_custom_css .='.home-page-header, .politics-logo{';
			$political_campaign_custom_css .='background-color: '.esc_attr($political_campaign_header_background_color).';';
		$political_campaign_custom_css .='}';
	}

	$political_campaign_header_img_position = get_theme_mod('political_campaign_header_img_position','center top');
	if($political_campaign_header_img_position != false){
		$political_campaign_custom_css .='.home-page-header, .politics-logo{';
			$political_campaign_custom_css .='background-position: '.esc_attr($political_campaign_header_img_position).'!important;';
		$political_campaign_custom_css .='}';
	}

	/*---------------------------Blog Layout -------------------*/

	$political_campaign_theme_lay = get_theme_mod( 'political_campaign_blog_layout_option','Default');
    if($political_campaign_theme_lay == 'Default'){
		$political_campaign_custom_css .='.post-main-box{';
			$political_campaign_custom_css .='';
		$political_campaign_custom_css .='}';
	}else if($political_campaign_theme_lay == 'Center'){
		$political_campaign_custom_css .='.post-main-box, .post-main-box h2, .post-info, .new-text p, .content-bttn{';
			$political_campaign_custom_css .='text-align:center;';
		$political_campaign_custom_css .='}';
		$political_campaign_custom_css .='.post-info{';
			$political_campaign_custom_css .='margin-top:10px;';
		$political_campaign_custom_css .='}';
		$political_campaign_custom_css .='.post-info hr{';
			$political_campaign_custom_css .='margin:15px auto;';
		$political_campaign_custom_css .='}';
	}else if($political_campaign_theme_lay == 'Left'){
		$political_campaign_custom_css .='.post-main-box, .post-main-box h2, .post-info, .new-text p, .content-bttn, #our-services p{';
			$political_campaign_custom_css .='text-align:Left;';
		$political_campaign_custom_css .='}';
		$political_campaign_custom_css .='.post-info hr{';
			$political_campaign_custom_css .='margin-bottom:10px;';
		$political_campaign_custom_css .='}';
		$political_campaign_custom_css .='.post-main-box h2{';
			$political_campaign_custom_css .='margin-top:10px;';
		$political_campaign_custom_css .='}';
	}

	// featured image dimention
	$political_campaign_blog_post_featured_image_dimension = get_theme_mod('political_campaign_blog_post_featured_image_dimension', 'default');
	$political_campaign_blog_post_featured_image_custom_width = get_theme_mod('political_campaign_blog_post_featured_image_custom_width',250);
	$political_campaign_blog_post_featured_image_custom_height = get_theme_mod('political_campaign_blog_post_featured_image_custom_height',250);
	if($political_campaign_blog_post_featured_image_dimension == 'custom'){
		$political_campaign_custom_css .='.post-main-box img{';
			$political_campaign_custom_css .='width: '.esc_attr($political_campaign_blog_post_featured_image_custom_width).'; height: '.esc_attr($political_campaign_blog_post_featured_image_custom_height).';';
		$political_campaign_custom_css .='}';
	}
		$political_campaign_featured_img_border_radius = get_theme_mod('political_campaign_featured_image_border_radius');
	if($political_campaign_featured_img_border_radius != false){
		$political_campaign_custom_css .='.post-main-box img, .feature-box img, #content-vw img{';
			$political_campaign_custom_css .='border-radius: '.esc_attr($political_campaign_featured_img_border_radius).'px;';
		$political_campaign_custom_css .='}';
	}

	$political_campaign_resp_menu_toggle_btn_bg_color = get_theme_mod('political_campaign_resp_menu_toggle_btn_bg_color');
	if($political_campaign_resp_menu_toggle_btn_bg_color != false){
		$political_campaign_custom_css .='.toggle-nav i{';
			$political_campaign_custom_css .='background: '.esc_attr($political_campaign_resp_menu_toggle_btn_bg_color).';';
		$political_campaign_custom_css .='}';
	}

	$political_campaign_featured_image_box_shadow = get_theme_mod('political_campaign_featured_image_box_shadow',0);
	if($political_campaign_featured_image_box_shadow != false){
		$political_campaign_custom_css .='.post-main-box img, .feature-box img, #content-vw img{';
			$political_campaign_custom_css .='box-shadow: '.esc_attr($political_campaign_featured_image_box_shadow).'px '.esc_attr($political_campaign_featured_image_box_shadow).'px '.esc_attr($political_campaign_featured_image_box_shadow).'px #cccccc;';
		$political_campaign_custom_css .='}';
	}

	/*---------------- Single Blog Page Settings ------------------*/

	$political_campaign_single_blog_comment_title = get_theme_mod('political_campaign_single_blog_comment_title', 'Leave a Reply');
	if($political_campaign_single_blog_comment_title == ''){
		$political_campaign_custom_css .='#comments h2#reply-title {';
			$political_campaign_custom_css .='display: none;';
		$political_campaign_custom_css .='}';
	}

	$political_campaign_single_blog_comment_button_text = get_theme_mod('political_campaign_single_blog_comment_button_text', 'Post Comment');
	if($political_campaign_single_blog_comment_button_text == ''){
		$political_campaign_custom_css .='#comments p.form-submit {';
			$political_campaign_custom_css .='display: none;';
		$political_campaign_custom_css .='}';
	}

	$political_campaign_comment_width = get_theme_mod('political_campaign_single_blog_comment_width');
	if($political_campaign_comment_width != false){
		$political_campaign_custom_css .='#comments textarea{';
			$political_campaign_custom_css .='width: '.esc_attr($political_campaign_comment_width).';';
		$political_campaign_custom_css .='}';
	}

	$political_campaign_single_blog_post_navigation_show_hide = get_theme_mod('political_campaign_single_blog_post_navigation_show_hide',true);
	if($political_campaign_single_blog_post_navigation_show_hide != true){
		$political_campaign_custom_css .='.post-navigation{';
			$political_campaign_custom_css .='display: none;';
		$political_campaign_custom_css .='}';
	}

	/*------------------ Menus -------------------*/

	$political_campaign_header_menus_color = get_theme_mod('political_campaign_header_menus_color');
	if($political_campaign_header_menus_color != false){
		$political_campaign_custom_css .='.main-navigation a{';
			$political_campaign_custom_css .='color: '.esc_attr($political_campaign_header_menus_color).';';
		$political_campaign_custom_css .='}';
	}

	$political_campaign_header_menus_hover_color = get_theme_mod('political_campaign_header_menus_hover_color');
	if($political_campaign_header_menus_hover_color != false){
		$political_campaign_custom_css .='.main-navigation a:hover{';
			$political_campaign_custom_css .='color: '.esc_attr($political_campaign_header_menus_hover_color).'!important;';
		$political_campaign_custom_css .='}';
	}

	$political_campaign_header_submenus_color = get_theme_mod('political_campaign_header_submenus_color');
	if($political_campaign_header_submenus_color != false){
		$political_campaign_custom_css .='.main-navigation ul ul a{';
			$political_campaign_custom_css .='color: '.esc_attr($political_campaign_header_submenus_color).';';
		$political_campaign_custom_css .='}';
	}

	$political_campaign_header_submenus_hover_color = get_theme_mod('political_campaign_header_submenus_hover_color');
	if($political_campaign_header_submenus_hover_color != false){
		$political_campaign_custom_css .='.main-navigation ul.sub-menu a:hover{';
			$political_campaign_custom_css .='color: '.esc_attr($political_campaign_header_submenus_hover_color).'!important;';
		$political_campaign_custom_css .='}';
	}

	$political_campaign_menus_item = get_theme_mod( 'political_campaign_menus_item_style','None');
    if($political_campaign_menus_item == 'None'){
		$political_campaign_custom_css .='.main-navigation a{';
			$political_campaign_custom_css .='';
		$political_campaign_custom_css .='}';
	}else if($political_campaign_menus_item == 'Zoom In'){
		$political_campaign_custom_css .='.main-navigation a:hover{';
			$political_campaign_custom_css .='transition: all 0.3s ease-in-out !important; transform: scale(1.2) !important; color:#000;';
		$political_campaign_custom_css .='}';
	}

	$political_campaign_navigation_menu_font_weight = get_theme_mod('political_campaign_navigation_menu_font_weight','500');
	if($political_campaign_navigation_menu_font_weight != false){
		$political_campaign_custom_css .='.main-navigation a{';
			$political_campaign_custom_css .='font-weight: '.esc_attr($political_campaign_navigation_menu_font_weight).';';
		$political_campaign_custom_css .='}';
	}

	$political_campaign_theme_lay = get_theme_mod( 'political_campaign_menu_text_transform','Capitalize');
	if($political_campaign_theme_lay == 'Capitalize'){
		$political_campaign_custom_css .='.main-navigation a{';
			$political_campaign_custom_css .='text-transform:Capitalize;';
		$political_campaign_custom_css .='}';
	}
	if($political_campaign_theme_lay == 'Lowercase'){
		$political_campaign_custom_css .='.main-navigation a{';
			$political_campaign_custom_css .='text-transform:Lowercase;';
		$political_campaign_custom_css .='}';
	}
	if($political_campaign_theme_lay == 'Uppercase'){
		$political_campaign_custom_css .='.main-navigation a{';
			$political_campaign_custom_css .='text-transform:Uppercase;';
		$political_campaign_custom_css .='}';
	}

	$political_campaign_navigation_menu_font_size = get_theme_mod('political_campaign_navigation_menu_font_size');
	if($political_campaign_navigation_menu_font_size != false){
		$political_campaign_custom_css .='.main-navigation a{';
			$political_campaign_custom_css .='font-size: '.esc_attr($political_campaign_navigation_menu_font_size).';';
		$political_campaign_custom_css .='}';
	}

	/*------------------ Logo  -------------------*/

	$political_campaign_logo_padding = get_theme_mod('political_campaign_logo_padding');
	if($political_campaign_logo_padding != false){
		$political_campaign_custom_css .='.politics-logo .logo{';
			$political_campaign_custom_css .='padding: '.esc_attr($political_campaign_logo_padding).';';
		$political_campaign_custom_css .='}';
	}

	$political_campaign_logo_margin = get_theme_mod('political_campaign_logo_margin');
	if($political_campaign_logo_margin != false){
		$political_campaign_custom_css .='.politics-logo .logo{';
			$political_campaign_custom_css .='margin: '.esc_attr($political_campaign_logo_margin).';';
		$political_campaign_custom_css .='}';
	}

	/*-------------- Copyright Alignment ----------------*/

	$political_campaign_footer_widgets_heading = get_theme_mod( 'political_campaign_footer_widgets_heading','Left');
    if($political_campaign_footer_widgets_heading == 'Left'){
		$political_campaign_custom_css .='#footer h3, #footer .wp-block-search .wp-block-search__label{';
		$political_campaign_custom_css .='text-align: left;';
		$political_campaign_custom_css .='}';
	}else if($political_campaign_footer_widgets_heading == 'Center'){
		$political_campaign_custom_css .='#footer h3, #footer .wp-block-search .wp-block-search__label{';
			$political_campaign_custom_css .='text-align: center;';
		$political_campaign_custom_css .='}';
	}else if($political_campaign_footer_widgets_heading == 'Right'){
		$political_campaign_custom_css .='#footer h3, #footer .wp-block-search .wp-block-search__label{';
			$political_campaign_custom_css .='text-align: right;';
		$political_campaign_custom_css .='}';
	}

	$political_campaign_footer_widgets_content = get_theme_mod( 'political_campaign_footer_widgets_content','Left');
    if($political_campaign_footer_widgets_content == 'Left'){
		$political_campaign_custom_css .='#footer .widget{';
		$political_campaign_custom_css .='text-align: left;';
		$political_campaign_custom_css .='}';
	}else if($political_campaign_footer_widgets_content == 'Center'){
		$political_campaign_custom_css .='#footer .widget{';
			$political_campaign_custom_css .='text-align: center;';
		$political_campaign_custom_css .='}';
	}else if($political_campaign_footer_widgets_content == 'Right'){
		$political_campaign_custom_css .='#footer .widget{';
			$political_campaign_custom_css .='text-align: right;';
		$political_campaign_custom_css .='}';
	}

	$political_campaign_footer_padding = get_theme_mod('political_campaign_footer_padding');
	if($political_campaign_footer_padding != false){
		$political_campaign_custom_css .='#footer{';
			$political_campaign_custom_css .='padding: '.esc_attr($political_campaign_footer_padding).' 0;';
		$political_campaign_custom_css .='}';
	}

	$political_campaign_footer_background_image = get_theme_mod('political_campaign_footer_background_image');
	if($political_campaign_footer_background_image != false){
		$political_campaign_custom_css .='#footer{';
			$political_campaign_custom_css .='background: url('.esc_attr($political_campaign_footer_background_image).');';
		$political_campaign_custom_css .='}';
	}

	$political_campaign_footer_background_color = get_theme_mod('political_campaign_footer_background_color');
	if($political_campaign_footer_background_color != false){
		$political_campaign_custom_css .='#footer{';
			$political_campaign_custom_css .='background-color: '.esc_attr($political_campaign_footer_background_color).';';
		$political_campaign_custom_css .='}';
	}

	$political_campaign_footer_icon = get_theme_mod('political_campaign_footer_icon');
	if($political_campaign_footer_icon == false){
		$political_campaign_custom_css .='.copyright p{';
			$political_campaign_custom_css .='width:100%; text-align:center; float:none;';
		$political_campaign_custom_css .='}';
	}
	/*------------------ Slider Opacity -------------------*/

	$political_campaign_theme_lay = get_theme_mod( 'political_campaign_slider_opacity_color','0.7');
	if($political_campaign_theme_lay == '0'){
		$political_campaign_custom_css .='#slider img{';
			$political_campaign_custom_css .='opacity:0';
		$political_campaign_custom_css .='}';
		}else if($political_campaign_theme_lay == '0.1'){
		$political_campaign_custom_css .='#slider img{';
			$political_campaign_custom_css .='opacity:0.1';
		$political_campaign_custom_css .='}';
		}else if($political_campaign_theme_lay == '0.2'){
		$political_campaign_custom_css .='#slider img{';
			$political_campaign_custom_css .='opacity:0.2';
		$political_campaign_custom_css .='}';
		}else if($political_campaign_theme_lay == '0.3'){
		$political_campaign_custom_css .='#slider img{';
			$political_campaign_custom_css .='opacity:0.3';
		$political_campaign_custom_css .='}';
		}else if($political_campaign_theme_lay == '0.4'){
		$political_campaign_custom_css .='#slider img{';
			$political_campaign_custom_css .='opacity:0.4';
		$political_campaign_custom_css .='}';
		}else if($political_campaign_theme_lay == '0.5'){
		$political_campaign_custom_css .='#slider img{';
			$political_campaign_custom_css .='opacity:0.5';
		$political_campaign_custom_css .='}';
		}else if($political_campaign_theme_lay == '0.6'){
		$political_campaign_custom_css .='#slider img{';
			$political_campaign_custom_css .='opacity:0.6';
		$political_campaign_custom_css .='}';
		}else if($political_campaign_theme_lay == '0.7'){
		$political_campaign_custom_css .='#slider img{';
			$political_campaign_custom_css .='opacity:0.7';
		$political_campaign_custom_css .='}';
		}else if($political_campaign_theme_lay == '0.8'){
		$political_campaign_custom_css .='#slider img{';
			$political_campaign_custom_css .='opacity:0.8';
		$political_campaign_custom_css .='}';
		}else if($political_campaign_theme_lay == '0.9'){
		$political_campaign_custom_css .='#slider img{';
			$political_campaign_custom_css .='opacity:0.9';
		$political_campaign_custom_css .='}';
		}

	/*---------------------- Slider Image Overlay ------------------------*/

	$political_campaign_slider_image_overlay = get_theme_mod('political_campaign_slider_image_overlay', true);
	if($political_campaign_slider_image_overlay == false){
		$political_campaign_custom_css .='#slider img{';
			$political_campaign_custom_css .='opacity:1;';
		$political_campaign_custom_css .='}';
	}

	$political_campaign_slider_image_overlay_color = get_theme_mod('political_campaign_slider_image_overlay_color', true);
	if($political_campaign_slider_image_overlay_color != false){
		$political_campaign_custom_css .='#slider{';
			$political_campaign_custom_css .='background-color: '.esc_attr($political_campaign_slider_image_overlay_color).';';
		$political_campaign_custom_css .='}';
	}

	/*---------------------------Slider Height ------------*/

	$political_campaign_slider_height = get_theme_mod('political_campaign_slider_height');
	if($political_campaign_slider_height != false){
		$political_campaign_custom_css .='#slider img{';
			$political_campaign_custom_css .='height: '.esc_attr($political_campaign_slider_height).';';
		$political_campaign_custom_css .='}';
	}

	$political_campaign_theme_lay = get_theme_mod( 'political_campaign_slider_content_option','Left');
    if($political_campaign_theme_lay == 'Left'){
		$political_campaign_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1{';
			$political_campaign_custom_css .='text-align:left; left:10%; right:40%;';
		$political_campaign_custom_css .='}';
	}else if($political_campaign_theme_lay == 'Center'){
		$political_campaign_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1{';
			$political_campaign_custom_css .='text-align:center; left:20%; right:20%;';
		$political_campaign_custom_css .='}';
	}else if($political_campaign_theme_lay == 'Right'){
		$political_campaign_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1{';
			$political_campaign_custom_css .='text-align:right; left:40%; right:10%;';
		$political_campaign_custom_css .='}';
	}

	/*------------- Slider Content Padding Settings ------------------*/

	$political_campaign_slider_content_padding_top_bottom = get_theme_mod('political_campaign_slider_content_padding_top_bottom');
	$political_campaign_slider_content_padding_left_right = get_theme_mod('political_campaign_slider_content_padding_left_right');
	if($political_campaign_slider_content_padding_top_bottom != false || $political_campaign_slider_content_padding_left_right != false){
		$political_campaign_custom_css .='#slider .carousel-caption{';
			$political_campaign_custom_css .='top: '.esc_attr($political_campaign_slider_content_padding_top_bottom).'; bottom: '.esc_attr($political_campaign_slider_content_padding_top_bottom).';left: '.esc_attr($political_campaign_slider_content_padding_left_right).';right: '.esc_attr($political_campaign_slider_content_padding_left_right).';';
		$political_campaign_custom_css .='}';
	}

	/*---------------- Button Settings ------------------*/

	$political_campaign_button_padding_top_bottom = get_theme_mod('political_campaign_button_padding_top_bottom');
	$political_campaign_button_padding_left_right = get_theme_mod('political_campaign_button_padding_left_right');
	if($political_campaign_button_padding_top_bottom != false || $political_campaign_button_padding_left_right != false){
		$political_campaign_custom_css .='.post-main-box .more-btn a{';
			$political_campaign_custom_css .='padding-top: '.esc_attr($political_campaign_button_padding_top_bottom).'!important; padding-bottom: '.esc_attr($political_campaign_button_padding_top_bottom).'!important;padding-left: '.esc_attr($political_campaign_button_padding_left_right).'!important;padding-right: '.esc_attr($political_campaign_button_padding_left_right).'!important;';
		$political_campaign_custom_css .='}';
	}

	$political_campaign_button_border_radius = get_theme_mod('political_campaign_button_border_radius');
	if($political_campaign_button_border_radius != false){
		$political_campaign_custom_css .='.post-main-box .more-btn a{';
			$political_campaign_custom_css .='border-radius: '.esc_attr($political_campaign_button_border_radius).'px !important;';
		$political_campaign_custom_css .='}';
	}

	$political_campaign_button_font_size = get_theme_mod('political_campaign_button_font_size',14);
	$political_campaign_custom_css .='.post-main-box .more-btn a{';
		$political_campaign_custom_css .='font-size: '.esc_attr($political_campaign_button_font_size).';';
	$political_campaign_custom_css .='}';

	$political_campaign_theme_lay = get_theme_mod( 'political_campaign_button_text_transform','Uppercase');
	if($political_campaign_theme_lay == 'Capitalize'){
		$political_campaign_custom_css .='.post-main-box .more-btn a{';
			$political_campaign_custom_css .='text-transform:Capitalize;';
		$political_campaign_custom_css .='}';
	}
	if($political_campaign_theme_lay == 'Lowercase'){
		$political_campaign_custom_css .='.post-main-box .more-btn a{';
			$political_campaign_custom_css .='text-transform:Lowercase;';
		$political_campaign_custom_css .='}';
	}
	if($political_campaign_theme_lay == 'Uppercase'){
		$political_campaign_custom_css .='.post-main-box .more-btn a{';
			$political_campaign_custom_css .='text-transform:Uppercase;';
		$political_campaign_custom_css .='}';
	}

	$political_campaign_button_letter_spacing = get_theme_mod('political_campaign_button_letter_spacing',14);
	$political_campaign_custom_css .='.post-main-box .more-btn a{';
		$political_campaign_custom_css .='letter-spacing: '.esc_attr($political_campaign_button_letter_spacing).';';
	$political_campaign_custom_css .='}';

	// Wocommerce 

	$political_campaign_related_product_show_hide = get_theme_mod('political_campaign_related_product_show_hide',true);
	if($political_campaign_related_product_show_hide != true){
		$political_campaign_custom_css .='.related.products{';
			$political_campaign_custom_css .='display: none;';
		$political_campaign_custom_css .='}';
	}

	/*----------------Social Icons Settings ------------------*/

	$political_campaign_social_icon_font_size = get_theme_mod('political_campaign_social_icon_font_size');
	if($political_campaign_social_icon_font_size != false){
		$political_campaign_custom_css .='#sidebar .custom-social-icons i, #footer-2 .custom-social-icons i{';
			$political_campaign_custom_css .='font-size: '.esc_attr($political_campaign_social_icon_font_size).';';
		$political_campaign_custom_css .='}';
	}

	$political_campaign_social_icon_padding = get_theme_mod('political_campaign_social_icon_padding');
	if($political_campaign_social_icon_padding != false){
		$political_campaign_custom_css .='#sidebar .custom-social-icons i, #footer-2 .custom-social-icons i{';
			$political_campaign_custom_css .='padding: '.esc_attr($political_campaign_social_icon_padding).';';
		$political_campaign_custom_css .='}';
	}

	$political_campaign_social_icon_width = get_theme_mod('political_campaign_social_icon_width');
	if($political_campaign_social_icon_width != false){
		$political_campaign_custom_css .='#sidebar .custom-social-icons i, #footer-2 .custom-social-icons i{';
			$political_campaign_custom_css .='width: '.esc_attr($political_campaign_social_icon_width).';';
		$political_campaign_custom_css .='}';
	}

	$political_campaign_social_icon_height = get_theme_mod('political_campaign_social_icon_height');
	if($political_campaign_social_icon_height != false){
		$political_campaign_custom_css .='#sidebar .custom-social-icons i, #footer-2 .custom-social-icons i{';
			$political_campaign_custom_css .='height: '.esc_attr($political_campaign_social_icon_height).';';
		$political_campaign_custom_css .='}';
	}

	/*--------------------- Grid Posts Posts -------------------*/

	$political_campaign_display_grid_posts_settings = get_theme_mod( 'political_campaign_display_grid_posts_settings','Into Blocks');
    if($political_campaign_display_grid_posts_settings == 'Without Blocks'){
		$political_campaign_custom_css .='.grid-post-main-box{';
			$political_campaign_custom_css .='box-shadow: none; border: none; margin:30px 0;';
		$political_campaign_custom_css .='}';
	}

	/*---------------------------Footer Style -------------------*/

	$political_campaign_theme_lay = get_theme_mod( 'political_campaign_footer_template','political_campaign-footer-one');
    if($political_campaign_theme_lay == 'political_campaign-footer-one'){
		$political_campaign_custom_css .='#footer{';
			$political_campaign_custom_css .='';
		$political_campaign_custom_css .='}';

	}else if($political_campaign_theme_lay == 'political_campaign-footer-two'){
		$political_campaign_custom_css .='#footer{';
			$political_campaign_custom_css .='background: linear-gradient(to right, #f9f8ff, #dedafa);';
		$political_campaign_custom_css .='}';
		$political_campaign_custom_css .='#footer p, #footer li a, #footer, #footer h3, #footer a.rsswidget, #footer #wp-calendar a, .copyright a, #footer .custom_details, #footer ins span, #footer .tagcloud a, .main-inner-box span.entry-date a, nav.woocommerce-MyAccount-navigation ul li:hover a, #footer ul li a, #footer table, #footer th, #footer td, #footer caption, #sidebar caption,#footer nav.wp-calendar-nav a,#footer .search-form .search-field{';
			$political_campaign_custom_css .='color:#000;';
		$political_campaign_custom_css .='}';
		$political_campaign_custom_css .='#footer ul li::before{';
			$political_campaign_custom_css .='background:#000;';
		$political_campaign_custom_css .='}';
		$political_campaign_custom_css .='#footer table, #footer th, #footer td,#footer .search-form .search-field,#footer .tagcloud a{';
			$political_campaign_custom_css .='border: 1px solid #000;';
		$political_campaign_custom_css .='}';

	}else if($political_campaign_theme_lay == 'political_campaign-footer-three'){
		$political_campaign_custom_css .='#footer{';
			$political_campaign_custom_css .='background: #232524;';
		$political_campaign_custom_css .='}';
	}
	else if($political_campaign_theme_lay == 'political_campaign-footer-four'){
		$political_campaign_custom_css .='#footer{';
			$political_campaign_custom_css .='background: #f7f7f7;';
		$political_campaign_custom_css .='}';
		$political_campaign_custom_css .='#footer p, #footer li a, #footer, #footer h3, #footer a.rsswidget, #footer #wp-calendar a, .copyright a, #footer .custom_details, #footer ins span, #footer .tagcloud a, .main-inner-box span.entry-date a, nav.woocommerce-MyAccount-navigation ul li:hover a, #footer ul li a, #footer table, #footer th, #footer td, #footer caption, #sidebar caption,#footer nav.wp-calendar-nav a,#footer .search-form .search-field{';
			$political_campaign_custom_css .='color:#000;';
		$political_campaign_custom_css .='}';
		$political_campaign_custom_css .='#footer ul li::before{';
			$political_campaign_custom_css .='background:#000;';
		$political_campaign_custom_css .='}';
		$political_campaign_custom_css .='#footer table, #footer th, #footer td,#footer .search-form .search-field,#footer .tagcloud a{';
			$political_campaign_custom_css .='border: 1px solid #000;';
		$political_campaign_custom_css .='}';
	}
	else if($political_campaign_theme_lay == 'political_campaign-footer-five'){
		$political_campaign_custom_css .='#footer{';
			$political_campaign_custom_css .='background: linear-gradient(to right, #01093a, #2d0b00);';
		$political_campaign_custom_css .='}';
	}

 	/*---------------- Footer Settings ------------------*/

	$political_campaign_button_footer_heading_letter_spacing = get_theme_mod('political_campaign_button_footer_heading_letter_spacing',1);
	$political_campaign_custom_css .='#footer h3, a.rsswidget.rss-widget-title{';
		$political_campaign_custom_css .='letter-spacing: '.esc_attr($political_campaign_button_footer_heading_letter_spacing).'px !important;';
	$political_campaign_custom_css .='}';

	$political_campaign_button_footer_font_size = get_theme_mod('political_campaign_button_footer_font_size','30');
	$political_campaign_custom_css .='#footer h3, a.rsswidget.rss-widget-title{';
		$political_campaign_custom_css .='font-size: '.esc_attr($political_campaign_button_footer_font_size).'px !important;';
	$political_campaign_custom_css .='}';

	$political_campaign_theme_lay = get_theme_mod( 'political_campaign_button_footer_text_transform','Capitalize');
	if($political_campaign_theme_lay == 'Capitalize'){
		$political_campaign_custom_css .='#footer h3{';
			$political_campaign_custom_css .='text-transform:Capitalize;';
		$political_campaign_custom_css .='}';
	}
	if($political_campaign_theme_lay == 'Lowercase'){
		$political_campaign_custom_css .='#footer h3, a.rsswidget.rss-widget-title{';
			$political_campaign_custom_css .='text-transform:Lowercase;';
		$political_campaign_custom_css .='}';
	}
	if($political_campaign_theme_lay == 'Uppercase'){
		$political_campaign_custom_css .='#footer h3, a.rsswidget.rss-widget-title{';
			$political_campaign_custom_css .='text-transform:Uppercase;';
		$political_campaign_custom_css .='}';
	}

	$political_campaign_footer_heading_weight = get_theme_mod('political_campaign_footer_heading_weight','600');
	if($political_campaign_footer_heading_weight != false){
		$political_campaign_custom_css .='#footer h3, a.rsswidget.rss-widget-title{';
			$political_campaign_custom_css .='font-weight: '.esc_attr($political_campaign_footer_heading_weight).';';
		$political_campaign_custom_css .='}';
	}