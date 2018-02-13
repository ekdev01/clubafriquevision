<?php

	/*	
	*	CrunchPress Include Script File
	*	---------------------------------------------------------------------
	* 	@version	1.0
	*   @ Package   Fine Food Theme
	* 	@author		CrunchPress
	* 	@link		http://crunchpress.com
	* 	@copyright	Copyright (c) CrunchPress
	*	---------------------------------------------------------------------
	*	This file manage to embed the stylesheet and javascript to each page
	*	based on the content of that page.
	*	---------------------------------------------------------------------
	*/
	
	//Add Scripts in Theme
	if(is_admin()){
		add_action('admin_enqueue_scripts', 'register_meta_script');
		add_action('admin_enqueue_scripts','register_crunchpress_panel_scripts');
		add_action('admin_enqueue_scripts','register_crunchpress_panel_styles');
	}else{
		add_action('wp_enqueue_scripts','register_non_admin_styles');
		add_action('wp_enqueue_scripts','register_non_admin_scripts');

	}

	
	/* 	---------------------------------------------------------------------
	*	This section include the back-end script
	*	---------------------------------------------------------------------
	*/ 
	
	function register_meta_script(){
		global $post_type;
		
		wp_enqueue_style('bootstrap', CP_PATH_URL.'/framework/stylesheet/bootstrap.css');
		wp_enqueue_style('thickbox');
		
		//Font Awesome
		wp_enqueue_style('cp-fontAW',CP_PATH_URL.'/frontend/cp_font/css/font-awesome.css');
		wp_enqueue_style('cp-fontAW',CP_PATH_URL.'/frontend/cp_font/css/font-awesome-ie7.css');
		
		
		
		wp_enqueue_style('admin-css',CP_PATH_URL.'/framework/stylesheet/admin-css.css');
		
		// register style and script when access to the "page" post_type page
		if( $post_type == 'page' ){
		
			wp_enqueue_style('meta-css',CP_PATH_URL.'/framework/stylesheet/meta-css.css');
			wp_enqueue_style('page-dragging',CP_PATH_URL.'/framework/stylesheet/page-dragging.css');
			wp_enqueue_style('image-picker',CP_PATH_URL.'/framework/stylesheet/image-picker.css');
			
			wp_register_script('image-picker', CP_PATH_URL.'/framework/javascript/image-picker.js', false, '1.0', true);
			wp_enqueue_script('image-picker');
		
			wp_register_script('page-dragging', CP_PATH_URL.'/framework/javascript/page-dragging.js', false, '1.0', true);
			wp_enqueue_script('page-dragging');
			
			wp_register_script('edit-box', CP_PATH_URL.'/framework/javascript/edit-box.js', false, '1.0', true);
			wp_enqueue_script('edit-box');
			
			wp_register_script('confirm-dialog', CP_PATH_URL.'/framework/javascript/jquery.confirm.js', false, '1.0', true);
			wp_enqueue_script('confirm-dialog');
			
			
		// register style and script when access to the "post" post_type page
		}else if( $post_type == 'event' || $post_type == 'post' || $post_type == 'team'  || $post_type == 'portfolio' || $post_type == 'cp_slider' || $post_type == 'gallery' || $post_type == 'product' ){
		
			wp_deregister_style('admin-css');
			wp_enqueue_style('meta-css',CP_PATH_URL.'/framework/stylesheet/meta-css.css');
			wp_enqueue_style('image-picker',CP_PATH_URL.'/framework/stylesheet/image-picker.css');
			wp_enqueue_style('confirm-dialog',CP_PATH_URL.'/framework/stylesheet/jquery.confirm.css');
			
			wp_register_script('post-effects', CP_PATH_URL.'/framework/javascript/post-effects.js', false, '1.0', true);
			wp_enqueue_script('post-effects');
			
			wp_register_script('image-picker', CP_PATH_URL.'/framework/javascript/image-picker.js', false, '1.0', true);
			wp_localize_script('image-picker', 'URL', array('crunchpress' => CP_PATH_URL ));
			wp_enqueue_script('image-picker');
			
			wp_register_script('confirm-dialog', CP_PATH_URL.'/framework/javascript/jquery.confirm.js', false, '1.0', true);
			wp_enqueue_script('confirm-dialog');
		
		// register style and script when access to the "testimonial" post_type page		
		}else if( $post_type == 'testimonial' ){
		
			wp_enqueue_style('meta-css',CP_PATH_URL.'/framework/stylesheet/meta-css.css');
		
		}else if($post_type == 'albums'){
		
			wp_register_script('contact-validation', CP_PATH_URL.'/frontend/js/jquery.validate.js', false, '1.0', true);
			wp_enqueue_script('contact-validation');
		}
		
	}
	
	
	// register script in CrunchPress panel
	function register_crunchpress_panel_scripts(){
		global $post_type;
		//wp_enqueue_style('ie-style',CP_PATH_URL . '/stylesheet/ie-style.php?path=' . CP_PATH_URL);	
	
		if($post_type == 'page'){
		
		}else{
			wp_enqueue_style('bootstrap',CP_PATH_URL.'/framework/stylesheet/bootstrap.css');
			$cp_script_url = CP_PATH_URL.'/framework/javascript/cp-panel.js';
			wp_enqueue_script('cp_scripts_admin', $cp_script_url, array('jquery','media-upload','thickbox', 'jquery-ui-droppable','jquery-ui-datepicker','jquery-ui-tabs', 'jquery-ui-slider','jquery-timepicker','jquery-ui-position','mini-color','confirm-dialog','dummy_content'));

			wp_register_script('bootstrap', CP_PATH_URL.'/framework/javascript/bootstrap.js', false, '1.0', true);
			wp_enqueue_script('bootstrap');

			//Font Awesome
			wp_enqueue_style('cp-fontAW',CP_PATH_URL.'/frontend/cp_font/css/font-awesome.css');
			wp_enqueue_style('cp-fontAW',CP_PATH_URL.'/frontend/cp_font/css/font-awesome-ie7.css');
		
		
			wp_register_script('mini-color', CP_PATH_URL.'/framework/javascript/jquery.miniColors.js', false, '1.0', true);
			wp_register_script('confirm-dialog', CP_PATH_URL.'/framework/javascript/jquery.confirm.js', false, '1.0', true);
			wp_register_script('jquery-timepicker', CP_PATH_URL.'/framework/javascript/jquery.ui.timepicker.js', false, '1.0', true);
			wp_register_script('dummy_content', CP_PATH_URL.'/framework/javascript/dummy_content.js', false, '1.0', true);
		}		
	}

	// register style in CrunchPress panel
	function register_crunchpress_panel_styles(){
	
		wp_enqueue_style('jquery-ui',CP_PATH_URL.'/framework/stylesheet/jquery-ui.css');
		wp_enqueue_style('cp-panel',CP_PATH_URL.'/framework/stylesheet/cp-panel.css');
		wp_enqueue_style('mini-color',CP_PATH_URL.'/framework/stylesheet/jquery.miniColors.css');
		wp_enqueue_style('confirm-dialog',CP_PATH_URL.'/framework/stylesheet/jquery.confirm.css');
		wp_enqueue_style('jquery-timepicker',CP_PATH_URL.'/framework/stylesheet/jquery.ui.timepicker.css');
		
	}
	
	/* 	---------------------------------------------------------------------
	*	this section include the front-end script
	*	---------------------------------------------------------------------
	*/ 
	
	// Register all stylesheet

	function register_non_admin_styles(){
	
		$cp_page_xml = '';
		$slider_type = '';
	
		global $post,$post_id,$cp_page_xml,$slider_type;
		
		$cp_page_xml = get_post_meta($post_id,'page-option-item-xml', true);
		$slider_type = get_post_meta ( $post_id, "page-option-top-slider-types", true );
		
		
		wp_enqueue_style( 'default-style', get_stylesheet_uri() );  //Default Stylesheet
		
		wp_enqueue_style('woocommerce_frontend_styles',CP_PATH_URL.'/frontend/css/woocommerce.css');
		
		// Politicize Update Responsive file
		wp_enqueue_style('cp-woocommerce',CP_PATH_URL.'/frontend/css/update-responsive.css');

		wp_enqueue_style('cp-woocommerce',CP_PATH_URL.'/frontend/css/wp-commerce.css');
		//Bx-slider scripts
		wp_register_script('cp-bx-slider', CP_PATH_URL.'/frontend/js/bxslider.min.js', false, '1.0', true);
		wp_enqueue_script('cp-bx-slider');	
		wp_register_script('jquery.bxslider', CP_PATH_URL.'/frontend/js/jquery.bxslider.js', false, '1.0', true);
		wp_enqueue_script('jquery.bxslider');	
		
		//wp_enqueue_style('cp_default',CP_PATH_URL.'/frontend/css/cp_default.css'); //Include Default Widgets and Other settings
		wp_enqueue_style('cp-bootstrap',CP_PATH_URL.'/frontend/css/bootstrap.css'); //Bootstrap Grid
		wp_enqueue_style('cp-bootstrap-res',CP_PATH_URL.'/frontend/css/bootstrap-responsive.css'); //Bootstrap responsive
		wp_enqueue_style('cp-jplayer-res',CP_PATH_URL.'/frontend/css/jplayer.css'); //Bootstrap responsive
	
		wp_enqueue_style('cp-fontAW',CP_PATH_URL.'/frontend/cp_font/css/font-awesome.css');
		wp_enqueue_style('cp-fontAW',CP_PATH_URL.'/frontend/cp_font/css/font-awesome-ie7.css');
	
		$rtl_layout = '';
		$site_loader = '';
		$element_loader = '';
		//General Settings Values
		$cp_general_settings = get_option('general_settings');
		if($cp_general_settings <> ''){
			$cp_logo = new DOMDocument ();
			$cp_logo->loadXML ( $cp_general_settings );
			$rtl_layout = find_xml_value($cp_logo->documentElement,'rtl_layout');
			$site_loader = find_xml_value($cp_logo->documentElement,'site_loader');
			$element_loader = find_xml_value($cp_logo->documentElement,'element_loader');
		}
		
		//Responsive stylesheet
		
		
		wp_deregister_style('woocommerce-general');
		wp_deregister_style('woocommerce-layout');
		wp_deregister_style('woocommerce_frontend_styles');		
		wp_deregister_style('events-manager');		
	
		
		wp_enqueue_style('cp-event-manager',CP_PATH_URL.'/frontend/css/event-manager.css'); //Event Manager
		wp_enqueue_style('woocommerce_frontend_styles',CP_PATH_URL.'/frontend/css/woocommerce.css');			
		//Call own css for prayer box
		if(function_exists('pb_includePublicCSS')){
			wp_enqueue_style('cp-prayer-box',CP_PATH_URL.'/frontend/css/gd-praybox-sc.css'); //prayer Manager	
		}
		
		
		
		//RTL Layouts
		if($rtl_layout == 'enable'){
			wp_enqueue_style('cp-rtl',CP_PATH_URL.'/rtl.css');
		}		
		
		
		//Facebook Fan Page Script
		if(isset($post->ID)){
			$facebook_fan = '';
			$facebook_fan = get_post_meta ( $post->ID, "page-option-item-facebook-selection", true );
			if($facebook_fan == 'Yes'){$facebook_fan = 'facebook_fan';
				wp_enqueue_style('style_810',CP_PATH_URL.'/frontend/css/style810.css');
			}
		}	
		
		$maintenance_mode = get_themeoption_value('maintenance_mode','general_settings');				
		if($maintenance_mode == 'enable'){		
			wp_enqueue_style('cp-countdown',CP_PATH_URL.'/frontend/css/jquery.countdown.css');
		}

		$twitter_feed = get_themeoption_value('twitter_feed','general_settings');
		if($twitter_feed == 'enable'){ 
			wp_enqueue_style('cp-bx-slider',CP_PATH_URL.'/frontend/css/bxslider.css');
		}

		if(isset($post)){
			$content = strip_tags(get_the_content());
			
			
			if ( has_shortcode( $post->post_content, 'event_counter_box' ) ) { 		
				wp_enqueue_style('cp-countdown',CP_PATH_URL.'/frontend/css/jquery.countdown.css');
			}
			
			if ( has_shortcode( $post->post_content, 'slider' ) ) { 		
				wp_enqueue_style('cp-bx-slider',CP_PATH_URL.'/frontend/shortcodes/bxslider.css');
			}
			
			if ( has_shortcode( $post->post_content, 'counter_circle' ) ) { 		
				wp_enqueue_style('cp-easy-chart',CP_PATH_URL.'/frontend/shortcodes/chart.css');
			}

			if ( has_shortcode( $post->post_content, 'counters_circle' ) ) { 		
				wp_enqueue_style('cp-easy-chart',CP_PATH_URL.'/frontend/shortcodes/chart.css');
			}			
		}
		
		//Widget Active
		if(is_active_widget( '', '', 'twitter_widget')){			
			wp_enqueue_style('cp-bx-slider',CP_PATH_URL.'/frontend/shortcodes/bxslider.css');
		}
	
		if( is_search() || is_archive() ){
		
			wp_enqueue_style('cp-anything-slider',CP_PATH_URL.'/frontend/anythingslider/css/anythingslider.css');
	
		
	
		// Post post_type
		}else if( isset($post) && $post->post_type == 'post' || 
			isset($post) && $post->post_type == 'event' ){
		
				// If using slider (flex slider)	
				if(!is_home()){
					$thumbnail_types = '';
					$post_detail_xml = get_post_meta($post->ID, 'post_detail_xml', true);
					if($post_detail_xml <> ''){
						$cp_post_xml = new DOMDocument ();
						$cp_post_xml->loadXML ( $post_detail_xml );
						$thumbnail_types = find_xml_value($cp_post_xml->documentElement,'post_thumbnail');
						
						if( $thumbnail_types == 'Slider'){
					
							wp_enqueue_style('cp-bx-slider',CP_PATH_URL.'/frontend/css/bxslider.css');
							
						}
					}
					
					
					
					$event_detail_xml = get_post_meta($post->ID, 'event_detail_xml', true);
					if($event_detail_xml <> ''){
						$cp_event_xml = new DOMDocument ();
						$cp_event_xml->loadXML ( $event_detail_xml );
						$event_thumbnail = find_xml_value($cp_event_xml->documentElement,'event_thumbnail');
						//Call the CountDown Style
						wp_enqueue_style('cp-countdown',CP_PATH_URL.'/frontend/css/jquery.countdown.css'); //Load Style		
						
					}
					
				}
								
				
			
		// Page post_type
		}else if( isset($post) && $post->post_type == 'page' ){
		
			global $post,$cp_page_xml, $slider_type, $cp_top_slider_type;
			$cp_page_xml = get_post_meta($post->ID,'page-option-item-xml', true);
			$cp_top_slider_switch = get_post_meta($post->ID,'page-option-top-slider-on', true);
			$slider_type = get_post_meta ( $post->ID, "page-option-top-slider-types", true );
			$cp_top_slider_type = get_post_meta($post->ID,'page-option-top-slider-types', true);
			
			
			//Layer Slider
			if(strpos($cp_page_xml,'<slider-type>Layer-Slider</slider-type>') > -1 || $slider_type == 'Layer-Slider'){
				//wp_enqueue_style('layerslider_js', CP_PATH_URL.'/frontend/css/layerslider.css');
			}
			
			// If using carousel slider
			if(	strpos($cp_page_xml,'<slider-type>Flex-Slider</slider-type>') > -1 || $slider_type == 'Flex-Slider'){
				
				wp_enqueue_style('cp-flex-slider',CP_PATH_URL.'/frontend/css/flexslider.css');
			}			
			
			//Bx Slider Condition
			if(strpos($cp_page_xml,'<slider-type>Bx-Slider</slider-type>') > -1 || $slider_type == 'Bx-Slider' ){
				wp_enqueue_style('cp-bx-slider',CP_PATH_URL.'/frontend/css/bxslider.css');
			}
			
			if(strpos($cp_page_xml,'<Column>') > -1){
				wp_enqueue_style('cp-easy-chart',CP_PATH_URL.'/frontend/shortcodes/chart.css');
				wp_enqueue_style('cp-bx-slider',CP_PATH_URL.'/frontend/shortcodes/bxslider.css');
				wp_enqueue_style('cp-countdown',CP_PATH_URL.'/frontend/css/jquery.countdown.css');
			}			
			
			if( strpos($cp_page_xml,'<eventview>Calendar View</eventview>') > -1 ){
		
				wp_enqueue_style('cp-calender-view', CP_PATH_URL.'/framework/javascript/fullcalendar/fullcalendar.css');
			
			}
			// If using filterable plugin
			if( strpos($cp_page_xml,'<show-filterable>') > -1 ){
			
				wp_enqueue_style('cp-style-view', CP_PATH_URL.'/frontend/css/style_animate.css');
				
			
			}
			
			// If using filterable plugin
			if( strpos($cp_page_xml,'<filterable>Yes</filterable>') > -1 ){
			
				wp_register_script('filterable', CP_PATH_URL.'/frontend/shortcodes/jquery-filterable.js', false, '1.0', true);
				wp_enqueue_script('filterable');
				
				wp_register_script('jquery-easing-1.3', CP_PATH_URL.'/frontend/js/jquery-easing-1.3.js', false, '1.0', true);
				wp_enqueue_script('jquery-easing-1.3');
			
			}
			
			// If using Services
			if( strpos($cp_page_xml,'<service-widget-style>Circle-Icon</service-widget-style>') > -1 ){
			
				wp_enqueue_style('circle-hover',CP_PATH_URL.'/frontend/css/circle-hover.css');
			
			}
			
			// If using Events
			if( strpos($cp_page_xml,'<Events>') > -1 ){
				wp_enqueue_style('cp-countdown',CP_PATH_URL.'/frontend/css/jquery.countdown.css'); //Load Style				
			}
			
			// If using NewsSlider
			if( strpos($cp_page_xml,'<News-Slider>') > -1 ){
			
				wp_enqueue_style('cp-bx-slider',CP_PATH_URL.'/frontend/css/bxslider.css');
			
			}
			
			// If using NewsSlider
			if( strpos($cp_page_xml,'<Client-Slider>') > -1 ){
			
				wp_enqueue_style('cp-content-slider',CP_PATH_URL.'/frontend/css/content_slider_style.css');
			
			}
			  
			if( strpos($cp_page_xml,'<Portfolio>') > -1 || strpos($cp_page_xml,'<Portfolio-Gallery>') > -1){
			
				wp_enqueue_style('prettyPhoto',CP_PATH_URL.'/frontend/css/prettyphoto.css');
			
			}
			// if using timeline
			if( strpos($cp_page_xml,'<Timeline>') > -1 ){
				wp_enqueue_style('cp-bx-slider',CP_PATH_URL.'/frontend/css/bxslider.css');
			}
			
			// if using timeline
			if( strpos($cp_page_xml,'<Woo-Products>') > -1 ){
				wp_enqueue_style('cp-woocommerce',CP_PATH_URL.'/frontend/css/wp-commerce.css');
				wp_enqueue_style('prettyPhoto',CP_PATH_URL.'/frontend/css/prettyphoto.css');
			}
			
			if( strpos($cp_page_xml,'<Sermons>') > -1 || strpos($cp_page_xml,'<Gallery>') > -1 || strpos($cp_page_xml,'<Our-Team>') > -1  || strpos($cp_page_xml,'<News>') > -1 || strpos($cp_page_xml,'<Events>') > -1){
				wp_enqueue_style('prettyPhoto',CP_PATH_URL.'/frontend/css/prettyphoto.css');				
			}
			
			if( strpos($cp_page_xml,'<Woo-Products>') > -1 ){
				//WooCommerce Style
				wp_enqueue_style('woocommerce_frontend_styles',CP_PATH_URL.'/frontend/css/woocommerce.css');			
			}
			
		}
		
		$font_google = '';
		$font_size_normal = '';
		$menu_font_google = '';
		$fonts_array = '';
		$font_google_heading = '';
		$heading_h1 = '';
		$heading_h2 = '';
		$heading_h3 = '';
		$heading_h4 = '';
		$heading_h5 = '';
		$heading_h6 = '';
		$embed_typekit_code = '';
		$cp_typography_settings = get_option('typography_settings');
		
		//$dd = find_xml_node($logo_uploa_d,'logo_upload');
		if($cp_typography_settings <> ''){
			$cp_typo = new DOMDocument ();
			$cp_typo->loadXML ( $cp_typography_settings );
			$font_google = find_xml_value($cp_typo->documentElement,'font_google');
			$font_size_normal = find_xml_value($cp_typo->documentElement,'font_size_normal');
			$menu_font_google = find_xml_value($cp_typo->documentElement,'menu_font_google');
			$font_google_heading = find_xml_value($cp_typo->documentElement,'font_google_heading');
			$heading_h1 = find_xml_value($cp_typo->documentElement,'heading_h1');
			$heading_h2 = find_xml_value($cp_typo->documentElement,'heading_h2');
			$heading_h3 = find_xml_value($cp_typo->documentElement,'heading_h3');
			$heading_h4 = find_xml_value($cp_typo->documentElement,'heading_h4');
			$heading_h5 = find_xml_value($cp_typo->documentElement,'heading_h5');
			$heading_h6 = find_xml_value($cp_typo->documentElement,'heading_h6');
			$embed_typekit_code = find_xml_value($cp_typo->documentElement,'embed_typekit_code');
			
		}
		
		//Body Font Installing
		if(cp_get_font_type($font_google) == 'Google_Font'){
			//Google Font Body
			if($font_google <> ''){
				wp_enqueue_style('googleFonts', get_google_font_url($font_google));
			}	
		} else{
			//Adobe Edge Font (TypeKit) 
			if($font_google <> ''){
				wp_register_script( 'adobe-edge-font', "http://use.edgefonts.net/".$font_google.".js", false, '1.0', false);
				wp_enqueue_script('adobe-edge-font');	
			}
		}
		
		if(cp_get_font_type($font_google_heading) == 'Google_Font'){
			if($font_google_heading <> ''){				
				wp_enqueue_style('googleFonts-heading', get_google_font_url($font_google_heading) );
			}
		}else{
			if($font_google_heading <> ''){
				wp_register_script( 'adobe-edge-heading', "http://use.edgefonts.net/".$font_google_heading.".js", false, '1.0', false);
				wp_enqueue_script('adobe-edge-heading');	
			}
		}

		//Menu Font Installing
		//verify_google_menu($menu_font_google);
		if(cp_get_font_type($menu_font_google) == 'Google_Font'){
			if($menu_font_google <> ''){
				wp_enqueue_style('menu-googleFonts-heading', get_google_font_url($menu_font_google));
			}
		}else{
			if($menu_font_google <> ''){
				wp_register_script( 'menu-edge-heading', "http://use.edgefonts.net/".$menu_font_google.".js", false, '1.0', false);
				wp_enqueue_script('menu-edge-heading');	
			}
		}
		
	}
		 
        // Register all scripts
	function register_non_admin_scripts(){
		global $post,$post_id;
		global $cp_is_responsive;
		global $crunchpress_element;		
		global $wp_scripts;
		$cp_page_xml = get_post_meta($post_id,'page-option-item-xml', true);
		$slider_type = get_post_meta ( $post_id, "page-option-top-slider-types", true );

		$social_networking = '';
		$site_loader = '';
		$element_loader = '';
		$cp_general_settings = get_option('general_settings');
		if($cp_general_settings <> ''){
			$cp_logo = new DOMDocument ();
			$cp_logo->loadXML ( $cp_general_settings );
			$social_networking = find_xml_value($cp_logo->documentElement,'social_networking');
			$site_loader = find_xml_value($cp_logo->documentElement,'site_loader');
			$element_loader = find_xml_value($cp_logo->documentElement,'element_loader');
			$topweather_icon = find_xml_value($cp_logo->documentElement,'topweather_icon');
			
		}
		
		wp_enqueue_script('jquery');
	
		wp_register_script('cp-load', CP_PATH_URL.'/frontend/js/cp_loader.js', false, '1.0', true);
		wp_localize_script('cp-load', 'loader', array('site_loader' => $site_loader,'element_loader' => $element_loader));
		wp_enqueue_script('cp-load');
		
		//wp_register_script('cp-underscore-min', CP_PATH_URL.'/frontend/js/underscore-min.js', false, '1.0', true);
		//wp_enqueue_script('cp-underscore-min');
		
		$topcounter_circle = get_themeoption_value('topcounter_circle','general_settings');
		$countd_event_category = get_themeoption_value('countd_event_category','general_settings');
		$color_scheme = get_themeoption_value('color_scheme','general_settings');
		if(class_exists('CP_Shortcodes')){
			if($topcounter_circle == 'enable'){
				wp_register_script('cp-countdown', CP_PATH_URL.'/frontend/js/jquery_countdown.js', false, '1.0', true);
				wp_enqueue_script('cp-countdown');
			}
		}	

		
		if ( is_singular() && get_option( 'thread_comments' ) ) 	wp_enqueue_script( 'comment-reply' );
			
		//BootStrap Script Loaded
		wp_register_script('cp-bootstrap', CP_PATH_URL.'/frontend/js/bootstrap.js', array('jquery'), '1.0', true);
		wp_localize_script('cp-bootstrap', 'ajax_var', array('url' => admin_url('admin-ajax.php'),'nonce' => wp_create_nonce('ajax-nonce')));
		wp_enqueue_script('cp-bootstrap');
		
		//Custom Script Loaded
		wp_register_script('cp-scripts', CP_PATH_URL.'/frontend/js/frontend_scripts.js', false, '1.0', true);
		wp_enqueue_script('cp-scripts');
		
		// wp_register_script('cp-jquery-mmenu-min', CP_PATH_URL.'/frontend/js/jquery-mmenu-min.js', false, '1.0', true);
		// wp_enqueue_script('cp-jquery-mmenu-min');
		
		
		$twitter_feed = get_themeoption_value('twitter_feed','general_settings');
		if($twitter_feed == 'enable'){ 			
			wp_register_script('cp-bx-slider', CP_PATH_URL.'/frontend/js/bxslider.min.js', false, '1.0', true);
			wp_enqueue_script('cp-bx-slider');
		}

		$maintenance_mode = get_themeoption_value('maintenance_mode','general_settings');				
		if($maintenance_mode == 'enable'){		
			wp_register_script('cp-countdown', CP_PATH_URL.'/frontend/js/jquery_countdown.js', false, '1.0', true);
			wp_enqueue_script('cp-countdown');
			
		}
		if(isset($post)){
			$content = strip_tags(get_the_content($post_id));
			
			if ( has_shortcode( $post->post_content, 'event_counter_box' ) ) { 		
				wp_register_script('cp-countdown', CP_PATH_URL.'/frontend/js/jquery_countdown.js', false, '1.0', true);
				wp_enqueue_script('cp-countdown');
			}
			
			if ( has_shortcode( $post->post_content, 'slider' ) ) { 		
				wp_register_script('cp-bx-slider', CP_PATH_URL.'/frontend/shortcodes/bxslider.min.js', false, '1.0', true);
				wp_enqueue_script('cp-bx-slider');	
				wp_register_script('cp-fitvids-slider', CP_PATH_URL.'/frontend/shortcodes/jquery.fitvids.js', false, '1.0', true);
				wp_enqueue_script('cp-fitvids-slider');	
			}
			
			if ( has_shortcode( $post->post_content, 'counter_circle' ) ) {
				wp_register_script('cp-easy-chart', CP_PATH_URL.'/frontend/shortcodes/easy-pie-chart.js', false, '1.0', true);
				wp_enqueue_script('cp-easy-chart');
				wp_register_script('cp-excanvas', CP_PATH_URL.'/frontend/shortcodes/excanvas.js', false, '1.0', true);
				wp_enqueue_script('cp-excanvas');
			}
			
			if ( has_shortcode( $post->post_content, 'counters_circle' ) ) {
				wp_register_script('cp-easy-chart', CP_PATH_URL.'/frontend/shortcodes/easy-pie-chart.js', false, '1.0', true);
				wp_enqueue_script('cp-easy-chart');
				wp_register_script('cp-excanvas', CP_PATH_URL.'/frontend/shortcodes/excanvas.js', false, '1.0', true);
				wp_enqueue_script('cp-excanvas');
			}
		}
		
		
		
		//calling all the scripts for progress circle
		
		
		$topcounter_circle = get_themeoption_value('topcounter_circle','general_settings');
		$countd_event_category = get_themeoption_value('countd_event_category','general_settings');
		$color_scheme = get_themeoption_value('color_scheme','general_settings');
		if(class_exists('CP_Shortcodes')){
			if($topcounter_circle == 'enable'){
				wp_register_script('cp-countdown', CP_PATH_URL.'/frontend/js/jquery_countdown.js', false, '1.0', true);
				wp_enqueue_script('cp-countdown');
			}
		}	
				
		global $wp_scripts,$post;
		wp_register_script('html5shiv',CP_PATH_URL.'/frontend/js/html5shive.js',array(),'1.5.1',false);
		wp_enqueue_script('html5shiv');
		$wp_scripts->add_data( 'html5shiv', 'conditional', 'lt IE 9' );		
					
		//Widget Active
		if(is_active_widget( '', '', 'twitter_widget')){
			wp_register_script('cp-bx-slider', CP_PATH_URL.'/frontend/shortcodes/bxslider.min.js', false, '1.0', true);
			wp_enqueue_script('cp-bx-slider');	

			wp_register_script('cp-bx-fitdiv', CP_PATH_URL.'/frontend/js/jquery.fitvids.js', false, '1.0', true);
			wp_enqueue_script('cp-bx-fitdiv');			
		}
		
		// Search and archive page
		if( is_search() || is_archive() ){
		
			// wp_register_script('cp-anything-slider', CP_PATH_URL.'/frontend/anythingslider/js/jquery.anythingslider.js', false, '1.0', true);
			// wp_enqueue_script('cp-anything-slider');	
		
		// Post post_type
		}else if(isset($post) && $post->post_type == 'timeline' ){
				wp_register_script('cp-flexisel-slider', CP_PATH_URL.'/frontend/js/jquery.flexisel.js', false, '1.0', true);
				wp_enqueue_script('cp-flexisel-slider');				
		}else if( isset($post) &&  $post->post_type == 'sermons' && !is_home()){
		
			//Jplayer Music Started	
			wp_register_script('cp-jplayer', CP_PATH_URL.'/frontend/js/jquery.jplayer.min.js', false, '1.0', true);
			wp_enqueue_script('cp-jplayer');
			
			wp_register_script('prettyPhoto', CP_PATH_URL.'/frontend/js/jquery.prettyphoto.js', false, '1.0', true);
			wp_enqueue_script('prettyPhoto');

			wp_register_script('cp-pscript', CP_PATH_URL.'/frontend/js/pretty_script.js', false, '1.0', true);
			wp_enqueue_script('cp-pscript');	

			
		
		}else if(isset($post) &&  $post->post_type == 'event' && !is_home()){
		
			//Call the Countdown
			wp_register_script('cp-countdown', CP_PATH_URL.'/frontend/js/jquery_countdown.js', false, '1.0', true);
			wp_enqueue_script('cp-countdown');
		
		}else if(isset($post) &&  $post->post_type == 'post' && !is_home() ){
		
			if(!is_home()){
				$cp_post_thumbnail = '';
				$post_detail_xml = get_post_meta($post->ID, 'post_detail_xml', true);
				if($post_detail_xml <> ''){
					$cp_post_xml = new DOMDocument ();
					$cp_post_xml->loadXML ( $post_detail_xml );
					$cp_post_thumbnail = find_xml_value($cp_post_xml->documentElement,'post_thumbnail');						

					if( $cp_post_thumbnail == 'Slider'){

						wp_register_script('cp-bx-slider', CP_PATH_URL.'/frontend/js/bxslider.min.js', false, '1.0', true);
						wp_enqueue_script('cp-bx-slider');	
						
						wp_register_script('cp-bx-fitdiv', CP_PATH_URL.'/frontend/js/jquery.fitvids.js', false, '1.0', true);
						wp_enqueue_script('cp-bx-fitdiv');
						
					}
				}
			
				
			}
		
		// Page post_type
		}else if( isset($post) &&  $post->post_type == 'page' ){
			global $post,$cp_page_xml, $slider_type, $cp_top_slider_type;
			$cp_page_xml = get_post_meta($post->ID,'page-option-item-xml', true);
			$cp_top_slider_switch = get_post_meta($post->ID,'page-option-top-slider-on', true);
			$slider_type = get_post_meta ( $post->ID, "page-option-top-slider-types", true );
			$cp_top_slider_type = get_post_meta($post->ID,'page-option-top-slider-types', true);
			
	
			if(strpos($cp_page_xml,'<Column>') > -1){
			
				wp_register_script('cp-countdown', CP_PATH_URL.'/frontend/js/jquery_countdown.js', false, '1.0', true);
				wp_enqueue_script('cp-countdown');
				wp_register_script('cp-easy-chart', CP_PATH_URL.'/frontend/shortcodes/easy-pie-chart.js', false, '1.0', true);
				wp_enqueue_script('cp-easy-chart');
				wp_register_script('cp-excanvas', CP_PATH_URL.'/frontend/shortcodes/excanvas.js', false, '1.0', true);
				wp_enqueue_script('cp-excanvas');
				wp_register_script('cp-bx-slider', CP_PATH_URL.'/frontend/shortcodes/bxslider.min.js', false, '1.0', true);
				wp_enqueue_script('cp-bx-slider');	
				wp_register_script('cp-bx-fitdiv', CP_PATH_URL.'/frontend/js/jquery.fitvids.js', false, '1.0', true);
				wp_enqueue_script('cp-bx-fitdiv');
			}	
				
			// if using Accordicns
			if( strpos($cp_page_xml,'<Accordion>') > -1 ){
				wp_enqueue_script('jquery-ui-accordion');
				wp_register_script('cp-accordian-script', CP_PATH_URL.'/frontend/js/accordian_script.js', false, '1.0', true);
				wp_enqueue_script('cp-accordian-script');
				
			}
			// if using tabs
			if( strpos($cp_page_xml,'<Tab>') > -1 ){
			    //wp_enqueue_script('jquery-ui-accordion');
				wp_enqueue_script('jquery-ui-tabs');
				wp_register_script('cp-tabs-script', CP_PATH_URL.'/frontend/js/tabs_script.js', false, '1.0', true);
				wp_enqueue_script('cp-tabs-script');
				
			}
			
			// if using Testimonial
			if( strpos($cp_page_xml,'<Client-Slider>') > -1 ){
				wp_register_script('cp-content-slider', CP_PATH_URL.'/frontend/js/jquery_content_slider.js', false, '1.0', true);
				wp_enqueue_script('cp-content-slider');	
				
			}
			 
			// if using timeline
			if( strpos($cp_page_xml,'<Timeline>') > -1 ){
				wp_register_script('cp-bx-slider', CP_PATH_URL.'/frontend/js/bxslider.min.js', false, '1.0', true);
				wp_enqueue_script('cp-bx-slider');	
				
				wp_register_script('cp-bx-fitdiv', CP_PATH_URL.'/frontend/js/jquery.fitvids.js', false, '1.0', true);
				wp_enqueue_script('cp-bx-fitdiv');
			}
			
			// if using timeline
			if( strpos($cp_page_xml,'<Carousel>') > -1 ){
				wp_register_script('cp-flexisel-slider', CP_PATH_URL.'/frontend/js/jquery.flexisel.js', false, '1.0', true);
				wp_enqueue_script('cp-flexisel-slider');
			}
			
			  
			
			if( strpos($cp_page_xml,'<Sermons>') > -1 ){
				wp_register_script('prettyPhoto', CP_PATH_URL.'/frontend/js/jquery.prettyphoto.js', false, '1.0', true);
				wp_enqueue_script('prettyPhoto');

				wp_register_script('cp-pscript', CP_PATH_URL.'/frontend/js/pretty_script.js', false, '1.0', true);
				wp_enqueue_script('cp-pscript');	
				
				//Jplayer Music Started	
				wp_register_script('cp-jplayer', CP_PATH_URL.'/frontend/js/jquery.jplayer.min.js', false, '1.0', true);
				wp_enqueue_script('cp-jplayer');
				
				//Playlist Script
				wp_register_script('cp-jplayer-playlist', CP_PATH_URL.'/frontend/js/jplayer.playlist.min.js', false, '1.0', true);
				wp_enqueue_script('cp-jplayer-playlist');
				
			}
			
			if( strpos($cp_page_xml,'<Gallery>') > -1 ||
				strpos($cp_page_xml,'<Portfolio>') > -1 
				|| strpos($cp_page_xml,'<Portfolio-Gallery>') > -1
				|| strpos($cp_page_xml,'<News>') > -1
				|| strpos($cp_page_xml,'<Our-Team>') > -1
				|| strpos($cp_page_xml,'<Events>') > -1
				){
				wp_register_script('prettyPhoto', CP_PATH_URL.'/frontend/js/jquery.prettyphoto.js', false, '1.0', true);
				wp_enqueue_script('prettyPhoto');

				wp_register_script('cp-pscript', CP_PATH_URL.'/frontend/js/pretty_script.js', false, '1.0', true);
				wp_enqueue_script('cp-pscript');	
				
			}
			
			//Woo-Products Filterable
			
			if( strpos($cp_page_xml,'<Woo-Products>') > -1) {
			
				wp_register_script('jquery-easing-1.3', CP_PATH_URL.'/frontend/js/jquery-easing-1.3.js', false, '1.0', true);
				wp_enqueue_script('jquery-easing-1.3');
				
				wp_register_script('prettyPhoto', CP_PATH_URL.'/frontend/js/jquery.prettyphoto.js', false, '1.0', true);
				wp_enqueue_script('prettyPhoto');

				wp_register_script('cp-pscript', CP_PATH_URL.'/frontend/js/pretty_script.js', false, '1.0', true);
				wp_enqueue_script('cp-pscript');
			
			}
		
		
			// If using Flex Slider
			if( strpos($cp_page_xml,'<slider-type>Flex-Slider</slider-type>') > -1 || $slider_type == 'Flex-Slider' AND $cp_top_slider_switch == 'Yes'){				
				wp_register_script('cp-flex-slider', CP_PATH_URL.'/frontend/js/jquery.flexslider.js', false, '1.0', true);
				wp_enqueue_script('cp-flex-slider');
			}
			
			//Layer Slider Scripts
			if(strpos($cp_page_xml,'<slider-type>Layer-Slider</slider-type>') > -1 || $slider_type == 'Layer-Slider' AND $cp_top_slider_switch == 'Yes'){
				if(class_exists('LS_Sliders')){
				// Include in the footer?
					$footer = get_option('ls_include_at_footer', false) ? true : false;

					// Register LayerSlider resources
					wp_register_script('layerslider', LS_ROOT_URL.'/static/js/layerslider.kreaturamedia.jquery.js', array('jquery'), LS_PLUGIN_VERSION, $footer );
					wp_register_script('greensock', LS_ROOT_URL.'/static/js/greensock.js', false, '1.11.2', $footer );
					wp_register_script('layerslider-transitions', LS_ROOT_URL.'/static/js/layerslider.transitions.js', false, LS_PLUGIN_VERSION, $footer );
					wp_enqueue_style('layerslider', LS_ROOT_URL.'/static/css/layerslider.css', false, LS_PLUGIN_VERSION );

					// User resources
					$uploads = wp_upload_dir();
					if(file_exists($uploads['basedir'].'/layerslider.custom.transitions.js')) {
						wp_register_script('ls-user-transitions', $uploads['baseurl'].'/layerslider.custom.transitions.js', false, LS_PLUGIN_VERSION, $footer );
					}

					if(file_exists($uploads['basedir'].'/layerslider.custom.css')) {
						wp_enqueue_style('ls-user-css', $uploads['baseurl'].'/layerslider.custom.css', false, LS_PLUGIN_VERSION );
					}

					if(get_option('ls_conditional_script_loading', false) == false) {
						wp_enqueue_script('layerslider');
						wp_enqueue_script('greensock');
						wp_enqueue_script('layerslider-transitions');
						wp_enqueue_script('ls-user-transitions');
					}
				}
			}
			
			//Bx Slider Scripts
			if(strpos($cp_page_xml,'<slider-type>Bx-Slider</slider-type>') > -1){
				wp_register_script('cp-bx-slider', CP_PATH_URL.'/frontend/js/bxslider.min.js', false, '1.0', true);
				wp_enqueue_script('cp-bx-slider');		

				wp_register_script('cp-bx-fitdiv', CP_PATH_URL.'/frontend/js/jquery.fitvids.js', false, '1.0', true);
				wp_enqueue_script('cp-bx-fitdiv');
			}
			
			//Bx Slider Scripts
			if($slider_type == 'Bx-Slider' AND $cp_top_slider_switch == 'Yes'){
				wp_register_script('cp-bx-slider', CP_PATH_URL.'/frontend/js/bxslider.min.js', false, '1.0', true);
				wp_enqueue_script('cp-bx-slider');		

				wp_register_script('cp-bx-fitdiv', CP_PATH_URL.'/frontend/js/jquery.fitvids.js', false, '1.0', true);
				wp_enqueue_script('cp-bx-fitdiv');
			}
			
			// If using Events
			if( strpos($cp_page_xml,'<Events>') > -1 ){
				wp_register_script('cp-countdown', CP_PATH_URL.'/frontend/js/jquery_countdown.js', false, '1.0', true);
				wp_enqueue_script('cp-countdown');
				
			}
			
			if( strpos($cp_page_xml,'<Event-Slider>') > -1 ){
				wp_register_script('cp-countdown', CP_PATH_URL.'/frontend/js/jquery_countdown.js', false, '1.0', true);
				wp_enqueue_script('cp-countdown');
				
			}
			
			// ifcp_top_slider_switch = get_post_meta($post->ID,'page-option-top-slider-on', true); using Accordicns
			if( strpos($cp_page_xml,'<Accordion>') > -1 ){
				wp_enqueue_script('jquery-ui-accordion');
				wp_register_script('cp-accordian-script', CP_PATH_URL.'/frontend/js/accordian_script.js', false, '1.0', true);
				wp_enqueue_script('cp-accordian-script');
			}
			
			// If using Anything Slider
			if( strpos($cp_page_xml, '<slider-type>Anything</slider-type>') == 233 || $slider_type == 'Anything' AND $cp_top_slider_switch == 'Yes'){
				wp_register_script('cp-anything-slider', CP_PATH_URL.'/frontend/anythingslider/js/jquery.anythingslider.js', false, '1.0', true);
				wp_enqueue_script('cp-anything-slider');	
				
				wp_register_script('cp-anything-slider-fx', CP_PATH_URL.'/frontend/anythingslider/js/jquery.anythingslider.fx.js', false, '1.0', true);
				wp_enqueue_script('cp-anything-slider-fx');	
			}
			
			// If using NewsSlider
			if( strpos($cp_page_xml,'<News-Slider>') > -1 ){
			
				wp_register_script('cp-bx-slider', CP_PATH_URL.'/frontend/js/bxslider.min.js', false, '1.0', true);
				wp_enqueue_script('cp-bx-slider');		
				
				wp_register_script('cp-bx-fitdiv', CP_PATH_URL.'/frontend/js/jquery.fitvids.js', false, '1.0', true);
				wp_enqueue_script('cp-bx-fitdiv');		
				
			
			}
			
			if( strpos($cp_page_xml,'<Crowd-Slider>') > -1  || strpos($cp_page_xml,'<Blog-Slider>') > -1 || strpos($cp_page_xml,'<Portfolio-Slider>') > -1){
			
				wp_register_script('cp-bx-slider', CP_PATH_URL.'/frontend/js/bxslider.min.js', false, '1.0', true);
				wp_enqueue_script('cp-bx-slider');	
				wp_register_script('jquery.bxslider', CP_PATH_URL.'/frontend/js/jquery.bxslider.js', false, '1.0', true);
				wp_enqueue_script('jquery.bxslider');	
				wp_enqueue_style('cp-bx-slider',CP_PATH_URL.'/frontend/css/bxslider.css');		
				
			
			}

			// If using filterable plugin
			if( strpos($cp_page_xml,'<show-filterable>Yes</show-filterable>') > -1 ){
			
				wp_register_script('filterable', CP_PATH_URL.'/frontend/js/jquery-filterable.js', false, '1.0', true);
				wp_enqueue_script('filterable');
			
			}
			
			// If using filterable plugin
			  
			if( strpos($cp_page_xml,'<Portfolio>') > -1 || strpos($cp_page_xml,'<Portfolio-Gallery>') > -1 ){
			
				wp_register_script('filterable', CP_PATH_URL.'/frontend/js/jquery-filterable.js', false, '1.0', true);
				wp_enqueue_script('filterable');
				
				wp_register_script('jquery-easing-1.3', CP_PATH_URL.'/frontend/js/jquery-easing-1.3.js', false, '1.0', true);
				wp_enqueue_script('jquery-easing-1.3');
			
			}
			
			if( strpos($cp_page_xml,'<eventview>Calendar View</eventview>') > -1 ){
			
				wp_register_script('cp-calender-view', CP_PATH_URL.'/framework/javascript/fullcalendar/fullcalendar.js', false, '1.0', true);
				wp_enqueue_script('cp-calender-view');
			
			}
			
		}
	}

?>