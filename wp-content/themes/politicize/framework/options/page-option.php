<?php 
	/*	

	*	CrunchPress Page Option File
	*	---------------------------------------------------------------------
	* 	@version	1.0
	* 	@author		CrunchPress
	* 	@link		http://crunchpress.com
	* 	@copyright	Copyright (c) CrunchPress
	*	---------------------------------------------------------------------
	*	This file create and contains the page post_type meta elements
	*	---------------------------------------------------------------------
	*/

	// a type that each element can be ( also set in page-dragging.js )

	
	$div_size = array(		
	
		'Blog' => array('element1-1'=>'1/1'),
		
		'Blog-Slider' => array('element1-1'=>'1/1'),
		
		'Modern-Blog' => array('element1-1'=>'1/1','element3-4'=>'3/4'),
			
		'Timeline' => array(
			'element1-2'=>'1/2',
			'element1-1'=>'1/1'
		),		

		'Crowd-Funding' => array('element1-1'=>'1/1', 'element2-3'=>'2/3'),
		
		'Crowd-Slider' => array('element1-1'=>'1/1'),
		
		//'Feature-Projects' => array('element1-1'=>'1/1'),
		
		'News' => array('element1-1'=>'1/1','element1-2'=>'1/2'),
		
		'Latest-News' => array(
			'element1-1'=>'1/1'
		),		
		
		'Woo-Products' => array(
			'element1-1'=>'1/1'),
		
		'Contact-Form' => array(

			'element1-4'=>'1/4',

			'element1-3'=>'1/3',

			'element1-2'=>'1/2',

			'element2-3'=>'2/3',

			'element3-4'=>'3/4',

			'element1-1'=>'1/1'),
		
		'Content' => array(

			'element1-4'=>'1/4',

			'element1-3'=>'1/3',

			'element1-2'=>'1/2',

			'element2-3'=>'2/3',

			'element1-3'=>'3/4',

			'element1-1'=>'1/1'),
	);

	

	// the element in page options

	$page_meta_boxes = array(
		
		"Top Content Header" => array( 'type'=>'header', 'name'=>'header_start','inner'=>'','title'=>'Page Options','class'=>'content', 'id'=>'cp-show-content-header'),
		
		"Top Content Open" => array( 'type'=>'open', 'name'=>'cp-open','class'=>'container-fluid', 'id'=>'cp-options-content'),
		
		"CP Div0 Open" => array( 'type'=>'open', 'name'=>'cp-open','class'=>'row-fluid', 'id'=>'cp-div-0'),
		
		// "Header Style" => array(

			// 'title'=> __('Header Style', 'crunchpress'),

			// 'name'=>'page-option-top-header-style',

			// 'options'=>array('1'=>'Style 1','2'=>'Style 2','3'=>'Style 3','4'=>'Style 4','5'=>'Style 5','6'=>'Style 6','7'=>'Style 7','8'=>'Style 8','9'=>'Style 9','10'=>'Style 10','11'=>'Style 11','12'=>'Style 12','13'=>'Style 13','14'=>'Style 14','15'=>'Style 15','16'=>'Style 16','17'=>'Style 17','18'=>'Style 18','19'=>'Style 19','20'=>'Style 20'),

			// 'type'=>'combobox',
			
			// 'default'=> 'Style 1',

			// 'hr'=>'none',

			// 'description' => 'Select page header style from dropdown theme has multiple header style that will help you to built custom layout.'

		// ),

		"Header Style" => array(

			'title'=> __('Header Style', 'crunchpress'),

			'name'=>'page-option-top-header-style',

			'options'=>array('1'=>'Style 1','2'=>'Style 2','3'=>'Style 3','4'=>'Style 4','5'=>'Style 5','6'=>'Style 6'),

			'type'=>'combobox',
			
			'default'=> 'Style 1',

			'hr'=>'none',

			'description' => 'Select page header style from dropdown, theme has 5 different header styles.'

		),		
		
		'page-title'=>array(					

			'title'=> 'PAGE TITLE',

			'name'=> 'page-option-item-page-title',

			'type'=> 'inputtext',

			'default'=> '',
			
			'class'=> 'page-title-here',

			'description'=>'Please Write Title For page to show at top of content start.'),
		
		
		'Facebook Fan'=>array(

			'title'=>'FACEBOOK FAN PAGE',

			'name'=>'page-option-item-facebook-selection',

			'options'=>array('0'=>'Yes','1'=>'No'),

			'type'=>'combobox',
			
			'default' => 'No',
			
			'class'=> '',

			'hr'=>'none',

			'description'=>'Do you want to set this page as facebook fan page.'),
			
		"CP Div0 Close" => array( 'type'=>'close', 'name'=>'cp-close','class'=>'row-fluid', 'id'=>'cp-div-0'),
		
		"CP Div Open" => array( 'type'=>'open', 'name'=>'cp-close','class'=>'row-fluid', 'id'=>'cp-div-1'),
		
		"Top Slider On" => array(

			'title'=> __('MAIN SLIDER', 'crunchpress'),

			'name'=>'page-option-top-slider-on',

			'options'=>array('0'=>'Yes','1'=>'No'),

			'type'=>'combobox',
			
			'default'=> 'No',

			'hr'=>'none',

			'description' => 'Activate Or Deactivate Main Slider On Page. selecting no page title field will appear where you can add page title.'

		),		
		
		"Top Slider Type" => array(

			'title'=> __('TOP SLIDER TYPE', 'crunchpress'),

			'name'=>'page-option-top-slider-types',

			'options'=>array('0'=>'Bx-Slider','1'=>'Layer-Slider','2'=>'Add-Shortcode'),
			
			/*'options'=>array('0'=>'Anything','1'=>'Flex-Slider','2'=>'Bx-Slider','3'=>'Layer-Slider'),*/
			/*'options'=>array('0'=>'Anything','1'=>'Flex-Slider','2'=>'Default-Slider','3'=>'Layer-Slider'),*/
			/*'options'=>array('0'=>'Anything','1'=>'Flex-Slider','2'=>'Default-Slider'),*/

			'type'=>'combobox',
			
			'default' => 'no-slider',
			
			'class'=>'slider-default-selection',

			'hr'=>'none',

			'description' => 'Top slider is the slider under the main navigation menu and above the page template( so it will always be full width ).'

		),
		
		"Top Slider Images" => array(

			'title'=> __('TOP SLIDER SLIDE IMAGES', 'crunchpress'),

			'name'=>'page-option-top-slider-images',

			'options'=>array(),

			'type'=>'combobox_post',
			
			'class'=>'slider-default',

			'hr'=>'none',

			'description' => 'Top slider comes top of the page select image slide for default sliders..'

		),
		
		"CP Div Close" => array( 'type'=>'close','name'=>'cp-close','id'=>'cp-div-1'),
		
		"CP Div2 Open" => array( 'type'=>'open', 'name'=>'cp-open','class'=>'row-fluid', 'id'=>'cp-div-2'),
		
		
		"Top Slider Layer" => array(

			'title'=> __('TOP LAYER SLIDER ID', 'crunchpress'),

			'name'=>'page-option-top-slider-layer',

			'options'=>array(),

			'type'=>'combobox',
			
			'class'=>'slider-layer',

			'hr'=>'none',

			'description' => 'Top Slider Layer shortcode for main slider.'

		),
		
		"Top Slider Shortcode" => array(

			'title'=> __('TOP SLIDER SHORTCODE', 'crunchpress'),

			'name'=>'page-option-top-slider-shortcode',

			'default'	=>	'[shortcode_xyz][/shortcode_xyz]',

			'type'=>'inputtext',
			
			'class'=>'slider-none',

			'hr'=>'none',

			'description' => 'Add top slider shortcode if any other slider you want to add other than default sliders.'

		),
		
		// "Footer Style" => array(

			// 'title'=> __('Footer Style', 'crunchpress'),

			// 'name'=>'page-option-bottom-footer-style',

			// 'options'=>array('1'=>'Style 1','2'=>'Style 2','3'=>'Style 3','4'=>'Style 4','5'=>'Style 5','6'=>'Style 6'),

			// 'type'=>'combobox',
			
			// 'default'=> 'Style 1',

			// 'hr'=>'none',

			// 'description' => 'Select page footer style from dropdown theme has multiple footer style that will help you to built custom layout.'

		//),		
		
		
			
		"CP Div2 Close" => array( 'type'=>'close','name'=>'cp-close','id'=>'cp-div-2'),
		
		// "CP Div3 Open" => array( 'type'=>'open', 'class'=>'row-fluid', 'id'=>'cp-div-3'),
			
		// 'news-headline-button'=>array(					

			// 'title'=> 'TURN ON NEWS HEADLINE',

			// 'name'=> 'cp-show-post-news-headline',

			// 'type'=> 'combobox',
			
			// 'default'=> 'No',
			
			// 'class'=> '',

			// 'options'=>array('0'=>'Yes','1'=>'No'),

			// 'description'=>'Activate Or Deactivate News Headline On Page.'),	

		// 'news-title'=>array(					

			// 'title'=> 'NEWS HEADLINE TITLE',

			// 'name'=> 'page-option-item-post-news-headline',

			// 'type'=> 'inputtext',

			// 'default'=> 'Headline',
			
			// 'class'=> 'news-headline-here',

			// 'description'=>'Please Write Title For News Headline.'),
			
		// 'category'=>array(

			// 'title'=>'CHOOSE CATEGORY',

			// 'name'=>'page-option-item-news-headline-category',

			// 'options'=>array(),

			// 'type'=>'combobox_category',
			
			// 'class'=> 'news-headline-here',

			// 'description'=>'Choose the post category you want to fetch the posts to shwo in news headline.'),	
		
		// "CP Div3 Close" => array( 'type'=>'close','id'=>'cp-div-3'),
		
		// "CP Div4 Open" => array( 'type'=>'open', 'class'=>'row-fluid', 'id'=>'cp-div-4'),	
		
		
		
		// "CP Div4 Close" => array( 'type'=>'close','id'=>'cp-div-4'),
		
		"Top Sidebar Header" => array( 'type'=>'header', 'name'=>'header-open','inner'=>'Yes','title'=>'Page Sidebar','class'=>'cp-div-5', 'id'=>'cp-show-sidebar-header'),
		
		"CP Div5 Open" => array( 'type'=>'open', 'name'=>'cp-open','class'=>'row-fluid full_class', 'id'=>'cp-div-5'),	
		
		"Page Sidebar Template" => array(

			'title'=> __('SELECT LAYOUT', 'crunchpress'), 

			'name'=>'page-option-sidebar-template', 
			
			'id'=>'page-option-sidebar-template', 

			'type'=>'radioimage', 

			'default'=>'no-sidebar',

			'hr'=>'none',

			'options'=>array(

				'1'=>array('value'=>'right-sidebar','image'=>'/framework/images/right-sidebar.png'),

				'2'=>array('value'=>'left-sidebar','image'=>'/framework/images/left-sidebar.png'),

				'3'=>array('value'=>'both-sidebar','image'=>'/framework/images/both-sidebar.png'),
				
				'4'=>array('value'=>'both-sidebar-left','image'=>'/framework/images/both-sidebar-left.png'),
				
				'5'=>array('value'=>'both-sidebar-right','image'=>'/framework/images/both-sidebar-right.png'),

				'6'=>array('value'=>'no-sidebar','image'=>'/framework/images/no-sidebar.png','default'=>'selected')

			)

		),
		
		"CP Div5 Close" => array( 'type'=>'close','name'=>'cp-close','id'=>'cp-div-5'),
		
		"CP Div6 Open" => array( 'type'=>'open', 'name'=>'cp-open','class'=>'row-fluid half_class', 'id'=>'cp-div-6'),	

		"Choose Left Sidebar" => array(

			'title'=> __('CHOOSE LEFT SIDEBAR', 'crunchpress'),

			'name'=>'page-option-choose-left-sidebar',

			'type'=>'combobox',
			
			'class'=> '',

			'hr'=>'none'

		),		

		

		"Choose Right Sidebar" => array(

			'title'=> __('CHOOSE RIGHT SIDEBAR', 'crunchpress'),

			'name'=>'page-option-choose-right-sidebar',
			
			'class'=> '',

			'type'=>'combobox',

		),
		
		"CP Div6 Close" => array( 'type'=>'close','name'=>'cp-close','id'=>'cp-div-6'),
		
		// "Top Footer Header" => array( 'type'=>'header','inner'=>'Yes','title'=>'Page Footer Options','class'=>'cp-div-7', 'id'=>'cp-show-footer-header'),
		
		// "CP Div7 Open" => array( 'type'=>'open', 'class'=>'row-fluid', 'id'=>'cp-div-7'),	

		// 'Footer-Product-Button' => array(					

			// 'title'=> 'TURN ON/OFF FOOTER PRODUCT',

			// 'name'=> 'cp-show-footer-product',

			// 'type'=> 'combobox',
			
			// 'default'=> 'No',

			// 'options'=>array('0'=>'Yes','1'=>'No'),

			// 'description'=>'Activate Or Deactivate footer product slider from here.'),		
			
		/*'background_product'=>array(

			'title'=>'CHOOSE PARALLAX BACKGROUND',

			'name'=>'page-option-item-footer-product-background',
			
			'class'=> 'footer-product-here',

			'type'=>'upload',

			'description'=>'Please upload the background parallax image you want to move behind carousel.'),*/
		
		// 'category_product'=>array(

			// 'title'=>'CHOOSE CATEGORY OF PRODUCTS',

			// 'name'=>'page-option-item-footer-product-category',

			// 'options'=>array(),
			
			// 'class'=> 'footer-product-here',

			// 'type'=>'combobox_category',

			// 'description'=>'Choose the WooCommerce product category you want to fetch its products.'),	

		// "CP Div7 Close" => array( 'type'=>'close','id'=>'cp-div-7'),	
		
		"Top Content Close" => array( 'type'=>'close' ,'name'=>'cp-close','id'=>'cp-show-content-options'),
		
		"Top Page Header" => array( 'type'=>'header', 'name'=>'cp-header','inner'=>'','title'=>'Page Elements','class'=>'common-class', 'id'=>'cp-show-page-header'),
		
		'page-builder-full' => array(					

			'title'=> 'TURN ON/OFF PAGE BUILDER FULL LAYOUT',

			'name'=> 'cp-show-full-layout',

			'type'=> 'combobox',
			
			'class'=>'full-width',
			
			'default'=> 'No',

			'options'=>array('0'=>'Yes','1'=>'No'),

			'description'=>'You can manage your Pagebuilder layout full width and inside container.'),
		
		"Page Item" => array(

			'item'=>'page-option-item-type' ,

			'size'=>'page-option-item-size', 

			'xml'=>'page-option-item-xml', 

			'type'=>'page-option-item',

			'name'=>array(
				
				'Content' => array(
					
					'image_icon' =>array(

						'type'=> 'image',

						'hr'=> 'none',
						
						'name'=> '',

						'description'=> "fa fa-file-text"),
				
					"top-bar-div1-open" => array( 'type'=>'open' ,'name'=>'div_start','class'=>'row-fluid','id'=>'cp-top-bar-div1'),
				
					'text'=>array(

						'title'=> 'Content Title / Description',

						'name'=> 'page-option-item-content-text-des',

						'type'=> 'description',

						'hr'=> 'none',

						'description'=> "Please Set your Content Options from bottom Content Title and Content Description."),
						
					'title'=>array(					

						'title'=> 'CONTENT TITLE',

						'name'=> 'cp-show-content-title',

						'type'=> 'combobox',

						'options'=>array('0'=>'Yes','1'=>'No'),
						
						'class'=> '',

						'description'=>'You can Turn On/Off Page Title /Content Title On This Page.'),
					
					'description'=>array(					

						'title'=> 'CONTENT DESCRIPTION',

						'name'=> 'cp-show-content-descrip',

						'type'=> 'combobox',

						'options'=>array('0'=>'Yes','1'=>'No'),
						
						'class'=> '',

						'description'=>'You can Turn On/Off Page Description /Content Description  On Page.'),		
					
					"top-bar-div1-close" => array( 'type'=>'close','name'=>'cp-close','id'=>'cp-top-bar-div1'),	
				),
				
				'Crowd-Funding' => array(

					'image_icon' =>array(

						'type'=> 'image','name'=> 'cp-icon',

						'hr'=> 'none',

						'description'=> "fa fa-credit-card"),
					
					"top-bar-div117-open" => array( 'type'=>'open' ,'name'=>'div_start','class'=>'row-fluid','id'=>'cp-top-bar-div117'),
					
					'header'=>array(

						'title'=> 'HEADER TITLE',

						'name'=> 'page-option-item-ignition-header-title',

						'type'=> 'inputtext'
					),

					'category'=>array(

						'title'=>'CHOOSE CATEGORY',

						'name'=>'page-option-item-ignition-category',

						'options'=>array(),

						'type'=>'combobox_category',

						'hr'=> 'none',

						'description'=>'Choose the category you want the Items to be fetched.'
					),
					
					'num-excerpt'=>array(

						'title'=> 'LENGHT OF EXCERPT',

						'name'=> 'page-option-item-ignition-num-excerpt',

						'type'=> 'inputtext',

						'default'=> 150,

						'description'=>'This is the number of content character to show on each post.'
					),
					
					"top-bar-div117-close" => array( 'name'=>'div_end','type'=>'close' ,'id'=>'cp-top-bar-div117'),
					
					"top-bar-div118-open" => array( 'type'=>'open' ,'name'=>'div_start','class'=>'row-fluid','id'=>'cp-top-bar-div118'),	
					
					'style'=>array(

						'title'=>'SELECT STYLE',

						'name'=>'page-option-item-igni-style',

						'type'=> 'combobox',

						'options'=>array('0'=>'Grid Style', '1'=>'List Style'),

						'hr'=> 'none',

						'description'=>'Select the style to display projects.'),			
					
					
					'pagination'=>array(

						'title'=>'ENABLE PAGINATION',

						'name'=>'page-option-item-igni-pagination',

						'type'=> 'combobox',

						'options'=>array('0'=>'Wp-Default', '1'=>'Theme-Custom','2'=>'No-Pagination'),

						'hr'=> 'none',

						'description'=>'Pagination will only appear when the number of posts is greater than the number of fetched item in one page you can also select wordpress default pagination that can be added from settings.'),			
					
					'num-fetch'=>array(					

						'title'=> 'NUMBER OF POSTS',

						'name'=> 'page-option-item-igni-num-fetch',

						'type'=> 'inputtext',
						
						'class'=> 'igni-fetch-item',

						'default'=> 5,

						'description'=>'Set the number of posts fetched on one page.'),	
						
					"top-bar-div118-close" => array( 'name'=>'div_end','type'=>'close' ,'id'=>'cp-top-bar-div118'),
					
				),
				
				'Crowd-Slider' => array(

					'image_icon' =>array(

						'type'=> 'image','name'=> 'cp-icon',

						'hr'=> 'none',

						'description'=> "fa fa-sliders"),
					
					"top-bar-div185open" => array( 'type'=>'open' ,'name'=>'div_start','class'=>'row-fluid','id'=>'cp-top-bar-div185'),
					
					'header'=>array(

						'title'=> 'SLIDER TITLE',

						'name'=> 'page-option-item-ignition-slider-title',

						'type'=> 'inputtext'
					),

					'category'=>array(

						'title'=>'CHOOSE CATEGORY',

						'name'=>'page-option-item-ignition-category-slider',

						'options'=>array(),

						'type'=>'combobox_category',

						'hr'=> 'none',

						'description'=>'Choose the category you want the Items to be fetched.'
					),
					
					'num-fetch'=>array(

						'title'=> 'NUMBER OF POSTS',

						'name'=> 'page-option-item-ignition-num-slider',

						'type'=> 'inputtext',

						'default'=> 150,

						'description'=>'This is the number of posts you want to display.'
					),
					
					"top-bar-div185-close" => array( 'name'=>'div_end','type'=>'close' ,'id'=>'cp-top-bar-div185'),
					
				),
				
				'Blog-Slider' => array(

					'image_icon' =>array(

						'type'=> 'image','name'=> 'cp-icon',

						'hr'=> 'none',

						'description'=> "fa fa-files-o"),
					
					"top-bar-div1872open" => array( 'type'=>'open' ,'name'=>'div_start','class'=>'row-fluid','id'=>'cp-top-bar-div1872'),
					
					'header'=>array(

						'title'=> 'BLOG SLIDER TITLE',

						'name'=> 'page-option-item-blog-slider-title',

						'type'=> 'inputtext'
					),

					'category'=>array(

						'title'=>'CHOOSE CATEGORY',

						'name'=>'page-option-item-blog-category-slider',

						'options'=>array(),

						'type'=>'combobox_category',

						'hr'=> 'none',

						'description'=>'Choose the category you want the Items to be fetched.'
					),
					
					'num-fetch'=>array(

						'title'=> 'NUMBER OF POSTS',

						'name'=> 'page-option-item-blog-num-slider',

						'type'=> 'inputtext',

						'default'=> 150,

						'description'=>'This is the number of posts you want to display.'
					),
					
					"top-bar-div1872-close" => array( 'name'=>'div_end','type'=>'close' ,'id'=>'cp-top-bar-div1872'),
					
				),
				
				
				// 'Feature-Projects' => array(

					// 'image_icon' =>array(

						// 'type'=> 'image','name'=> 'cp-icon',

						// 'hr'=> 'none',

						// 'description'=> "fa fa-hand-o-up"),
					
					// "top-bar-div4117-open" => array( 'type'=>'open' ,'name'=>'div_start','class'=>'row-fluid','id'=>'cp-top-bar-div4117'),
					
					// 'header'=>array(

						// 'title'=> 'HEADER TITLE',

						// 'name'=> 'page-option-fea-ignition-header-title',

						// 'type'=> 'inputtext'
					// ),

					// 'category'=>array(

						// 'title'=>'CHOOSE CATEGORY',

						// 'name'=>'page-option-fea-ignition-category',

						// 'options'=>array(),

						// 'type'=>'combobox_category',

						// 'hr'=> 'none',

						// 'description'=>'Choose the category you want the Items to be fetched.'
					// ),
					
					
					// 'add_map'=>array(

						// 'title'=>'ADD MAP SHORTCODE',

						// 'name'=>'page-option-fea-map-area',

						// 'type'=> 'textarea',

						// 'hr'=> 'none',

						// 'description'=>'add google map shortcode here to show map behind this section.'),			
						
					// "top-bar-div4117-close" => array( 'name'=>'div_end','type'=>'close' ,'id'=>'cp-top-bar-div4117'),
					
				// ),
				
				'Blog'=>array(
				
					'image_icon' =>array(

						'type'=> 'image','name'=> 'cp-icon',

						'hr'=> 'none',

						'description'=> "fa fa-edit"),
					
					"top-bar-div7-open" => array( 'type'=>'open' ,'name'=>'div_start','class'=>'row-fluid','id'=>'cp-top-bar-div7'),					

					'header'=>array(

						'title'=> 'BLOG HEADER TITLE',

						'name'=> 'page-option-item-blog-header-title',
						
						'description'=>'Please add header title here it will be shown at top of this element.',

						'type'=> 'inputtext'),			

					'category'=>array(

						'title'=>'CHOOSE CATEGORY',

						'name'=>'page-option-item-blog-category',

						'options'=>array(),

						'type'=>'combobox_category',

						'description'=>'Choose the post category you want to fetch its post.'),

					'layout_select'=>array(

						'title'=>'Select Layout',

						'name'=>'page-option-item-blog-layout',

						'type'=> 'combobox',

						'options'=>array('0'=>'Half Width', '1'=>'Full Width'),

						'hr'=> 'none',

						'description'=>'Select Blog Layout Two Options are given 1/2 (two column) and 1/1 full width.'),
					
					"top-bar-div7-close" => array( 'name'=>'div_end','type'=>'close' ,'id'=>'cp-top-bar-div7'),

					"top-bar-div8-open" => array( 'type'=>'open' ,'name'=>'div_start','class'=>'row-fluid','id'=>'cp-top-bar-div8'),	

					'num-excerpt'=>array(					

						'title'=> 'LENGHT OF DESCRIPTION',

						'name'=> 'page-option-item-blog-num-excerpt',

						'type'=> 'inputtext',

						'default'=> 100,

						'description'=>'Set the number of content character of each post.'),					

					'pagination'=>array(

						'title'=>'ENABLE PAGINATION',

						'name'=>'page-option-item-blog-pagination',

						'type'=> 'combobox',

						'options'=>array('0'=>'Wp-Default', '1'=>'Theme-Custom','2'=>'No-Pagination'),

						'hr'=> 'none',

						'description'=>'Pagination will only appear when the number of posts is greater than the number of fetched item in one page you can also select wordpress default pagination that can be added from settings.'),
					
					'num-fetch'=>array(					

						'title'=> 'NUMBER OF POSTS',

						'name'=> 'page-option-item-blog-num-fetch',

						'type'=> 'inputtext',
						
						'class'=> 'blog-fetch-item',

						'default'=> 5,

						'description'=>'Set the number of posts fetched on one page, leaving blank.'),	
						
					"top-bar-div8-close" => array( 'name'=>'div_end','type'=>'close' ,'id'=>'cp-top-bar-div8'),

				),
				
				'Timeline'=>array(
				
					'image_icon' =>array(

						'type'=> 'image','name'=> 'cp-icon',

						'hr'=> 'none',

						'description'=> "fa fa-bullhorn"),
					
					// "top-bar-div9-open" => array( 'type'=>'open' ,'name'=>'div_start','class'=>'row-fluid','id'=>'cp-top-bar-div9'),	

					// 'header'=>array(

						// 'title'=> 'SHOWS HEADER TITLE',

						// 'name'=> 'page-option-item-blog-header-title-latest',
						
						// 'description'=>'Please add header title here it will be shown at top of this element.',

						// 'type'=> 'inputtext'),	

					// 'select_feature'=>array(

						// 'title'=>'FEATURED POST',

						// 'name'=>'page-option-item-blog-feature-post',

						// 'options'=>array(),

						// 'type'=>'combobox_post',

						// 'description'=>'Choose the post you want to fetch as the feature post.'),	
					
					// 'num-excerpt'=>array(					

						// 'title'=> 'LENGHT OF DESCRIPTION',

						// 'name'=> 'page-option-item-blog-num-excerpt-latest',

						// 'type'=> 'inputtext',

						// 'default'=> 200,

						// 'description'=>'Set the number of character show at feature post.'),	

					// "top-bar-div9-close" => array( 'name'=>'div_end','type'=>'close' ,'id'=>'cp-top-bar-div9'),

					"top-bar-div10-open" => array( 'type'=>'open' ,'name'=>'div_start','class'=>'row-fluid','id'=>'cp-top-bar-div10'),		

					'header'=>array(

						'title'=> 'SHOWS HEADER TITLE',

						'name'=> 'page-option-item-latest-header-title',
						
						'description'=>'Please add header title here it will be shown at top of this element.',

						'type'=> 'inputtext'),	

					'category'=>array(

						'title'=>'CHOOSE CATEGORY',

						'name'=>'page-option-item-news-category-latest',

						'options'=>array(),

						'type'=>'combobox_category',

						'description'=>'Choose the post category you want to fetch its posts.'),

					'num-excerpt'=>array(					

						'title'=> 'NUMBER OF CHARACTERS',

						'name'=> 'page-option-item-blog-num-char',

						'type'=> 'inputtext',

						'default'=> 148,

						'description'=>'Set the number of character show at timeline posts.'),	
					
					"top-bar-div10-close" => array( 'name'=>'div_end','type'=>'close' ,'id'=>'cp-top-bar-div10'),

				),
				
				'Latest-News'=>array(
				
					'image_icon' =>array(

						'type'=> 'image','name'=> 'cp-icon',

						'hr'=> 'none',

						'description'=> "fa fa-bullhorn"),
					
					"top-bar-div459-open" => array( 'type'=>'open' ,'name'=>'div_start','class'=>'row-fluid','id'=>'cp-top-bar-div459'),	

					'header'=>array(

						'title'=> 'SHOWS HEADER TITLE',

						'name'=> 'page-option-item-blog-header-title-feature',
						
						'description'=>'Please add header title here it will be shown at top of this element.',

						'type'=> 'inputtext'),	

					'category'=>array(

						'title'=>'CHOOSE CATEGORY',

						'name'=>'page-option-item-news-category-feature',

						'options'=>array(),

						'type'=>'combobox_category',

						'description'=>'Choose the post category you want to fetch its posts.'),

					'number-of-posts'=>array(

						'title'=>'NUMBER OF NEWS',

						'name'=>'page-option-item-news-pagination-feature',

						'type'=> 'inputtext',

						'default'=> 5,

						'hr'=> 'none',

						'description'=>'number of posts to show in each tab recent and popular.'),	

					"top-bar-div459-close" => array( 'name'=>'div_end','type'=>'close' ,'id'=>'cp-top-bar-div459'),

				),
				
				'News'=>array(
				
					'image_icon' =>array(

						'type'=> 'image','name'=> 'cp-icon',

						'hr'=> 'none',

						'description'=> "fa fa-exclamation"),
						
					"top-bar-div11-open" => array( 'type'=>'open' ,'name'=>'div_start','class'=>'row-fluid','id'=>'cp-top-bar-div11'),	

					'header'=>array(

						'title'=> 'NEWS HEADER TITLE',

						'name'=> 'page-option-item-news-header-title',
						
						'description'=>'Please add header title here it will be shown at top of this element.',

						'type'=> 'inputtext'),			

					'category'=>array(

						'title'=>'CHOOSE CATEGORY',

						'name'=>'page-option-item-news-category',

						'options'=>array(),

						'type'=>'combobox_category',

						'description'=>'Choose the post category you want to fetch its posts.'),

					'num-excerpt'=>array(					

						'title'=> 'LENGHT OF DESCRIPTION',

						'name'=> 'page-option-item-news-num-excerpt',

						'type'=> 'inputtext',

						'default'=> 285,

						'description'=>'Set the number of characters of each post.'),
						
					"top-bar-div11-close" => array( 'name'=>'div_end','type'=>'close' ,'id'=>'cp-top-bar-div11'),	
					
					"top-bar-div12-open" => array( 'type'=>'open' ,'name'=>'div_start','class'=>'row-fluid','id'=>'cp-top-bar-div12'),	

					'pagination'=>array(

						'title'=>'ENABLE PAGINATION',

						'name'=>'page-option-item-news-pagination',

						'type'=> 'combobox',

						'options'=>array('0'=>'Wp-Default', '1'=>'Theme-Custom','2'=>'No-Pagination'),

						'hr'=> 'none',

						'description'=>'Pagination will only appear when the number of posts is greater than the number of fetched item in one page you can also select wordpress default pagination that can be added from settings.'),
						
					'num-fetch'=>array(					

						'title'=> 'NUMBERS OF NEWS',

						'name'=> 'page-option-item-news-num-fetch',

						'type'=> 'inputtext',
						
						'class'=> 'news-fetch-item',

						'default'=> 5,

						'description'=>'Set the number of fetched posts on one page.'),	
					
					'news_style'=>array(

						'title'=>'News Style',

						'name'=>'page-option-item-news-style',

						'type'=> 'combobox',

						'options'=>array('0'=>'Default', '1'=>'Government Style'),

						'hr'=> 'none',

						'description'=>'Select The Style of The News Element.'),
						
					"top-bar-div12-close" => array( 'name'=>'div_end','type'=>'close' ,'id'=>'cp-top-bar-div12'),		

				),
				
				'Woo-Products'=>array(
				
					'image_icon' =>array(

						'type'=> 'image','name'=> 'cp-icon',

						'hr'=> 'none',

						'description'=> "fa fa-ellipsis-v"),
				
					"top-bar-div13-open" => array( 'type'=>'open' ,'name'=>'div_start','class'=>'row-fluid','id'=>'cp-top-bar-div13'),

					'header'=>array(

						'title'=> 'HEADER TITLE',

						'name'=> 'page-option-item-product-header-title',
						
						'description'=>'Please add header title here it will be shown at top of this element.',

						'type'=> 'inputtext'
					),

					'category'=>array(

						'title'=>'CHOOSE CATEGORY',

						'name'=>'page-option-item-product-category',

						'options'=>array(),

						'type'=>'combobox_category',

						'hr'=> 'none',

						'description'=>'Choose the product category you want the products to be fetched.'
					),
					
					'num-excerpt'=>array(

						'title'=> 'LENGHT OF EXCERPT',

						'name'=> 'page-option-item-product-num-excerpt',

						'type'=> 'inputtext',

						'default'=> 300,

						'description'=>'Set the number of content character to each product (work only on list view).'
					),
					
					"top-bar-div13-close" => array( 'name'=>'div_end','type'=>'close' ,'id'=>'cp-top-bar-div13'),
					
					"top-bar-div14-open" => array( 'type'=>'open' ,'name'=>'div_start','class'=>'row-fluid','id'=>'cp-top-bar-div14'),
					
					'layout_select'=>array(

						'title'=> 'SELECT LAYOUT',

						'name'=> 'page-option-item-product-layout',

						'type'=> 'combobox',
						
						'defualt'=> 'Simple Grid',

						'options'=>array('0'=>'Simple Grid','1'=>'Normal Grid','2'=>'Modern Grid','3'=>'Modern Grid Diagonal'),

					),	
						
					'filterable'=>array(

						'title'=> 'SHOW FILTERABLE',

						'name'=> 'page-option-item-product-filterable',

						'type'=> 'combobox',
						
						'defualt'=> 'No',

						'options'=>array('0'=>'Yes', '1'=>'No'),

					),		
					
					'pagination'=>array(

						'title'=>'ENABLE PAGINATION',

						'name'=>'page-option-item-product-pagination',

						'type'=> 'combobox',
						
						'class'=> 'product-fetch-item-pagination',

						'options'=>array('0'=>'Wp-Default', '1'=>'Theme-Custom','2'=>'No-Pagination'),

						'hr'=> 'none',

						'description'=>'Pagination will only appear when the number of posts is greater than the number of fetched item in one page you can also select wordpress default pagination that can be added from settings.'),
					
					"top-bar-div14-close" => array( 'name'=>'div_end','type'=>'close' ,'id'=>'cp-top-bar-div14'),
					
					"top-bar-div15-open" => array( 'type'=>'open' ,'name'=>'div_start','class'=>'row-fluid','id'=>'cp-top-bar-div15'),

					'num-fetch'=>array(					

						'title'=> 'NEWS NUM FETCH',

						'name'=> 'page-option-item-product-num-fetch',

						'type'=> 'inputtext',
						
						'class'=> 'product-fetch-item',

						'default'=> 5,

						'description'=>'Set the number of fetched products on one page.'
					),					
					
					"top-bar-div15-close" => array( 'name'=>'div_end','type'=>'close' ,'id'=>'cp-top-bar-div15'),

				),
				
				'Contact-Form'=>array(
				
					'image_icon' =>array(

						'type'=> 'image','name'=> 'cp-icon',

						'hr'=> 'none',

						'description'=> "fa fa-envelope"),
						
					"top-bar-div16-open" => array( 'type'=>'open' ,'name'=>'div_start','class'=>'row-fluid','id'=>'cp-top-bar-div16'),	

					'header'=>array(

						'title'=>'HEADER TITLE',

						'name'=>'page-option-item-header-email',

						'type'=>'inputtext',

						'hr'=>'none',
						
						'description'=>'Please add header title here it will be shown at top of this element.',),
					
					'email'=>array(

						'title'=>'E-MAIL',

						'name'=>'page-option-item-contat-email',

						'type'=>'inputtext',

						'hr'=>'none',

						'description'=>'Add the email address where you want to receive queries for your contact form.'),
						
					"top-bar-div16-close" => array( 'name'=>'div_end','type'=>'close' ,'id'=>'cp-top-bar-div16'),	

				),	
			),

		),
		
		
		
		

		

	);
	
	
	// create Page Option Meta

	add_action('add_meta_boxes', 'add_page_option');

	function add_page_option(){

		add_meta_box('page-option', __('CP Page Builder','crunchpress'), 'add_page_option_element',

			'page', 'normal', 'high');

	}

	function add_page_option_element(){

		global $post, $page_meta_boxes;

		$page_meta_boxes['Page Item']['name']['Blog']['category']['options'] = get_category_list_array( 'category' );	

		$page_meta_boxes['Page Item']['name']['Blog-Slider']['category']['options'] = get_category_list_array( 'category' );
		
		$page_meta_boxes['Page Item']['name']['Timeline']['category']['options'] = get_category_list_array( 'category' );
		
		$page_meta_boxes['Page Item']['name']['Woo-Products']['category']['options'] = get_category_list_array( 'product_cat' );
		
		$page_meta_boxes['Page Item']['name']['News']['category']['options'] = get_category_list_array( 'category' );
		
		$page_meta_boxes['Page Item']['name']['Latest-News']['category']['options'] = get_category_list_array( 'category' );
		
		//$page_meta_boxes['Page Item']['name']['Feature-Projects']['category']['options'] = get_category_list_array( 'project_category' );
		
		$page_meta_boxes['Page Item']['name']['Crowd-Funding']['category']['options'] = get_category_list_array( 'project_category' );
		
		$page_meta_boxes['Page Item']['name']['Crowd-Slider']['category']['options'] = get_category_list_array( 'project_category' );
		
		$page_meta_boxes['Choose Left Sidebar']['options'] = get_sidebar_name();

		$page_meta_boxes['Choose Right Sidebar']['options'] = get_sidebar_name();
		
		echo '<div id="cp-overlay-wrapper">';

		echo '<div class="bootstrap_admin" id="cp-overlay-content">';
		//echo '<div class="container">';

		

		set_nonce();

		
		//Print Extra Plugins by Extended Classes
		if(count(get_extends_name('function_library')) <> 0){
			$function_library =  new function_library;
			foreach(class_function_layout() as $keys=>$values){
				$$keys = 'dynamic'.$keys;
				$page_mera_variable = $function_library->create_variable($keys, $values);
				$page_mera_variable->page_builder_element_class();
			}
		}

		//print_r($page_meta_boxes);
		global $post, $page_meta_boxes;
		
		if(!class_exists("Woocommerce")){
			unset($page_meta_boxes['Footer-Product-Button']);
			unset($page_meta_boxes['category_product']);
			
		}
		
		//ignitionDeck
		if(!class_exists("Deck")){
			unset($page_meta_boxes['Crowd-Funding']);
			unset($page_meta_boxes['Feature-Projects']);
		}
		
		//function_library
		if(!class_exists("function_library")){
			unset($page_meta_boxes['Top Slider On']);
			unset($page_meta_boxes['Top Slider Type']);
			unset($page_meta_boxes['Top Slider Images']);
			unset($page_meta_boxes['Top Slider Layer']);
			unset($page_meta_boxes['Top Slider Shortcode']);
		}
		
		
		//get value
		$counter_element = 0;
		foreach( $page_meta_boxes as $page_meta_box ){
		
			if( $page_meta_box['type'] == 'page-option-item' ){	

				$page_meta_box['value'] = get_post_meta($post->ID, $page_meta_box['xml'], true);
				
				print_page_default_elements($page_meta_box);
				
				print_page_selected_elements($page_meta_box);

			}

			elseif( $page_meta_box['type'] == 'sidebar' ){ echo 'ok'; die;

				$page_meta_box['value'] = get_post_meta($post->ID, $page_meta_box['xml'], true);
				
				print_page_default_elements($page_meta_box);
				
				print_page_selected_elements($page_meta_box);
				

				echo 'ok';

				

			}else if( $page_meta_box['type'] == 'imagepicker' ){

			

				$slider_xml_string = get_post_meta($post->ID, $page_meta_box['xml'], true);

				if(!empty($slider_xml_string)){

				

					$slider_xml_val = new DOMDocument();

					$slider_xml_val->loadXML( $slider_xml_string );

					$page_meta_box['value'] = $slider_xml_val->documentElement;

					

				}

				print_meta( $page_meta_box );

			

			}else{


				if( empty( $page_meta_box['name'] ) ){ $page_meta_box['name'] = ''; }

				$page_meta_box['value'] = get_post_meta($post->ID, $page_meta_box['name'], true);
				
				print_meta( $page_meta_box );
				
				

			}
			
			//echo "<div class='clear'></div>";

			//echo empty($page_meta_box['hr'])? '<hr class="separator mt20">': '';

		

		}		

		//echo '</div>';
		
		echo '</div>';
		
		echo '</div>';

		

	}

	

	// call when update page with save_post action 

	function save_page_option_meta($post_id){

	
		if(count(get_extends_name('function_library')) <> 0){
			$function_library =  new function_library;
			foreach(class_function_layout() as $keys=>$values){
				//$page_meta_boxes['value'] = get_post_meta($post->ID, $page_meta_boxes['xml'], true);
				$$keys = 'dynamic'.$keys;
				$myvariable = $function_library->create_variable($keys, $values);
				$myvariable->page_builder_element_class();
			}
		}
		
		global $page_meta_boxes;

		$edit_meta_boxes = $page_meta_boxes;

		

		foreach ($edit_meta_boxes as $edit_meta_box){

			if( $edit_meta_box['type'] == 'page-option-item' ){

				if(isset($_POST[$edit_meta_box['size']])){

					$num = sizeof($_POST[$edit_meta_box['size']]);

				}else{

					$num = 0;

				}

				

				$item_xml = '<item-tag>';

				$item_content_num = array();

				for($i=0; $i<$num; $i++){

				

					$item_type_new = $_POST[$edit_meta_box['item']][$i];

					
					$item_xml = $item_xml . '<' . $item_type_new . '>';

					$item_size_new = $_POST[$edit_meta_box['size']][$i];

					$item_xml = $item_xml . create_xml_tag('size',$item_size_new);

					$item_content = $edit_meta_box['name'][$item_type_new];

					if(!isset($item_content_num[$item_type_new])){

						$item_content_num[$item_type_new] = 1 ;

						if($item_type_new == 'Slider'){

							$item_content_num['slider-item'] = 0;

						}else if($item_type_new == 'Accordion'){

							$item_content_num['accordion-item'] = 0;

						}else if($item_type_new == 'Tab'){

							$item_content_num['tab-item'] = 0;

						}else if($item_type_new == 'Toggle-Box'){

							$item_content_num['toggle-box-item'] = 0;

						}

					}

					

					foreach($item_content as $key => $value){					

						if($key == 'slider-item'){

					

							$item_xml = $item_xml . '<' . $key . '>';

							$slider_num = $_POST[$value['slider-num']][$item_content_num[$item_type_new]];

							for($j=0; $j<$slider_num; $j++){

								$item_xml = $item_xml . '<slider>';

								$temp = isset( $_POST[$value['image']][$item_content_num['slider-item']] )? $_POST[$value['image']][$item_content_num['slider-item']] : '';

								$item_xml = $item_xml . create_xml_tag('image', $temp);

								$temp = isset( $_POST[$value['title']][$item_content_num['slider-item']] )? htmlspecialchars($_POST[$value['title']][$item_content_num['slider-item']]) : '';

								$item_xml = $item_xml . create_xml_tag('title', $temp);

								$temp = isset( $_POST[$value['linktype']][$item_content_num['slider-item']] )? $_POST[$value['linktype']][$item_content_num['slider-item']] : '';

								$item_xml = $item_xml . create_xml_tag('linktype', $temp);

								$temp = isset( $_POST[$value['link']][$item_content_num['slider-item']] )? htmlspecialchars($_POST[$value['link']][$item_content_num['slider-item']]) : '';

								$item_xml = $item_xml . create_xml_tag('link', $temp);

								$temp = isset( $_POST[$value['caption']][$item_content_num['slider-item']] )? htmlspecialchars($_POST[$value['caption']][$item_content_num['slider-item']]) : '';

								$item_xml = $item_xml . create_xml_tag('caption', $temp);

								$item_xml = $item_xml . '</slider>';

								$item_content_num['slider-item']++; 

								

							}

							

							$item_xml = $item_xml . '</' . $key . '>';

						}else if($key == "tab-item"){

							$item_xml = $item_xml . '<' . $key . '>';

							if($item_type_new == "Accordion"){

								$tab_type = 'accordion-item';

							}else if($item_type_new == "Toggle-Box"){

								$tab_type = 'toggle-box-item';

							}else{

								$tab_type = 'tab-item';

							}



							$tab_num = $_POST[$value['tab-num']][$item_content_num[$item_type_new]];

							

							for($j=0; $j<$tab_num; $j++){

								$item_xml = $item_xml . '<tab>';

								$temp = isset( $_POST[$value['title']][$item_content_num[$tab_type]] )? htmlspecialchars($_POST[$value['title']][$item_content_num[$tab_type]]) : '';

								$item_xml = $item_xml . create_xml_tag('title', $temp);

								$temp = isset( $_POST[$value['caption']][$item_content_num[$tab_type]] )? htmlspecialchars($_POST[$value['caption']][$item_content_num[$tab_type]]) : '';

								$item_xml = $item_xml . create_xml_tag('caption', $temp);

								$temp = isset( $_POST[$value['active']][$item_content_num[$tab_type]] )? $_POST[$value['active']][$item_content_num[$tab_type]] : '';

								$item_xml = $item_xml . create_xml_tag('active', $temp);

								$item_xml = $item_xml . '</tab>';

								$item_content_num[$tab_type]++;

							}

							

							$item_xml = $item_xml . '</' . $key . '>';

							

						}else{

						

							if(isset($_POST[$value['name']][$item_content_num[$item_type_new]])){

							
							
								$item_value = htmlspecialchars($_POST[$value['name']][$item_content_num[$item_type_new]]);

								$item_xml = $item_xml .  create_xml_tag($key, $item_value);

							}else{

								$item_xml = $item_xml .  create_xml_tag($key, '');

							}

						}

					}

					

					$item_xml = $item_xml . '</' . $item_type_new . '>';

					$item_content_num[$item_type_new]++;

					

				}

				

				$item_xml = $item_xml . '</item-tag>';

				$item_xml_old = get_post_meta($post_id, $edit_meta_box['xml'], true);

				save_meta_data($post_id, $item_xml, $item_xml_old, $edit_meta_box['xml']);

				

			}else if( $edit_meta_box['type'] == 'imagepicker' ){

				if(isset($_POST[$edit_meta_box['name']['image']])){

					$num = sizeof($_POST[$edit_meta_box['name']['image']]) - 1;

				}else{

					$num = -1;

				}

				

				$slider_xml_old = get_post_meta($post_id,$edit_meta_box['xml'],true);

				$slider_xml = "<slider-item>";

				

				for($i=0; $i<=$num; $i++){

					$slider_xml = $slider_xml. "<slider>";

					$image_new = stripslashes($_POST[$edit_meta_box['name']['image']][$i]);

					$slider_xml = $slider_xml. create_xml_tag('image',$image_new);

					$title_new = stripslashes(htmlspecialchars($_POST[$edit_meta_box['name']['title']][$i]));

					$slider_xml = $slider_xml. create_xml_tag('title',$title_new);

					$caption_new = stripslashes(htmlspecialchars($_POST[$edit_meta_box['name']['caption']][$i]));

					$slider_xml = $slider_xml. create_xml_tag('caption',$caption_new);

					$linktype_new = stripslashes($_POST[$edit_meta_box['name']['linktype']][$i]);

					$slider_xml = $slider_xml. create_xml_tag('linktype',$linktype_new);

					$link_new = stripslashes(htmlspecialchars($_POST[$edit_meta_box['name']['link']][$i]));

					$slider_xml = $slider_xml. create_xml_tag('link',$link_new);

					$slider_xml = $slider_xml . "</slider>";

				}

				

				$slider_xml = $slider_xml . "</slider-item>";

				save_meta_data($post_id, $slider_xml, $slider_xml_old, $edit_meta_box['xml']);

					

			}else if($edit_meta_box['type'] == 'open' || $edit_meta_box['type'] == 'close'){

			

			}else{

				if(isset($_POST[$edit_meta_box['name']])){

					$new_data = stripslashes($_POST[$edit_meta_box['name']]);

				}else{

					$new_data = '';

				}

				$old_data = get_post_meta($post_id, $edit_meta_box['name'],true);

				save_meta_data($post_id, $new_data, $old_data, $edit_meta_box['name']);				

			}

		}

	}
	
	

	// print all elements that can be added to selected elements

	function print_page_default_elements($args){

		extract($args); ?>
	<div id="cp-options-common-class">
		<div id="page_builder" class="meta-body custom_page container-fluid">
			<!-- Select Item List -->
			<div class="meta-input bootstrap_admin">
				<div class="page-select-element-list-wrapper combobox box-one container">
					<!--<div class="title_backend"><h2>Custom Post/ Content</h2></div>-->
					<ul class="element_backend parent_width"><?php 
							$counter_pagebuilder = 0;
							if(!class_exists("Woocommerce")){
								unset($name['Woo-Products']);
							}
							//ignitionDeck
							if(!class_exists("Deck")){
								unset($name['Crowd-Funding']);
								unset($name['Feature-Projects']);
							}
							
							
							
							foreach( $name as $key => $value ){ ?>
								<li class="drag_able element_width "><a class="dragable" id="" rel="<?php echo $key;?>"><span class="inside_fontAw"><i class="<?php echo $value['image_icon']['description'];?>"></i></span><span class="text-bg"><?php echo $key;?></span></a></li>
					  <?php } ?>
					</ul>
				</div>
			</div>
		</div>
		<!-- Default Item to Clone to-->
		<div class="page-element-lists" id="page-element-lists">
			<?php
				foreach( $name as $key => $value ){
					print_page_elements($args, '', $key);					
				}
			?>
		  <br class="clear">
		</div>
	</div>	
<?php

	}

	

	// chosen elements
	function print_page_selected_elements($args){	

		    extract($args);?>
		
		<div class="page-methodology " id="page-methodology">
		  <div class="page-selected-elements-wrapper">
			<div class="page-selected-elements page-no-sidebar" id="page-selected-elements">
				<div id="selected-image-none" class="bg_title_drop"><?php _e('Drop Elements Here','crunchpress');?></div>

			  <?php
				if($value != ''){

					$xml = new DOMDocument();

					$xml->loadXML($value);
					$counter_xml = 0;
					foreach($xml->documentElement->childNodes as $item){
						$counter_xml++;
							print_page_elements($args, $item, $item->nodeName);
					}

				}?>
			</div>
			<br class="clear">
		  </div>
		</div>
	
<?php
	}

	

	// function that manage to print each elements from receiving arguments

	function print_page_elements($args, $xml_val, $item_type){

		$element1_2 = '';

		extract($args);

		
		//echo '<pre>';print_r($args);
		//echo "<pre>";print_r($name['Widget']);

		$head_type = $item_type;

		if(empty($xml_val)){

			$head_size = '';

			$head_name = array('item'=>$item,'size'=>$size,'itemname'=>'','sizename'=>'');

		}else{

			$head_size = find_xml_value($xml_val, 'size');

			$head_name = array('item'=>$item,'size'=>$size,'itemname'=>$item.'[]','sizename'=>$size.'[]');

		}

		

		print_page_item_identical($head_name, $head_size, $head_type);

		?>
<div class="page-element-edit-box" id="page-element-edit-box">
  <?php

				foreach( $name[$item_type] as $input_key => $input_value ){

					

					if( $input_key == 'slider-item' ){

						$slider_value = find_xml_node($xml_val, 'slider-item');

						print_image_picker( array('name'=>$input_value, 'value'=>$slider_value ) );

					  }else if( $input_key == 'tab-item' ){

							   print_box_tab($input_value, find_xml_node($xml_val, 'tab-item'));

				      }else if( $input_key == 'haji-item' ){

							   print_panel_sidebar('lol',$input_value);

				      }else{

					    $input_value['value'] = find_xml_value($xml_val, $input_key);

						$input_value['name'] = $input_value['name'] . '[]';

						print_meta( $input_value );

					}

					if( ( $input_key!= 'open' && $input_key != 'close') ){

						//echo ( empty($input_value['hr']) )? '<hr class="separator mt20">': '';

					}

				}

			?>
</div>
</div>
<?php

		

	}

	
	function print_page_item_identical($item, $size, $text){
		global $div_size;
	//Adding New Sizes
		if(count(get_extends_name('function_library')) <> 0){
			$function_library =  new function_library;
			foreach(class_function_layout() as $keys=>$values){
				$$keys = 'dynamic'.$keys;
				$size_variable = $function_library->create_variable($keys, $values);
				$size_variable->page_builder_size_class();
			}
		}	
		global $div_size;
		
		

		if(empty( $size )) { 

			foreach( $div_size[$text] as $key => $val ){

				$size = $key; 

				break;

			}

		} 

						

		?>
<div class="page-element <?php echo $size; ?>" id="page-element" rel="<?php echo $text; ?>">
  <div class="page-element-item" id="page-element-item" >
    <div class="item-bar-left">
      <div class="change-element-size-temp">
        <div class="add-element-size" id="add-element-size" ></div>
        <div class="sub-element-size" id="sub-element-size" ></div>
      </div>
    </div>
    <span class="page-element-item-text"> <?php echo $text; ?> </span>
    <input type="hidden" id="<?php echo $item['item'];?>" class="<?php echo $item['item'];?>" value="<?php echo $text; ?>" name="<?php echo $item['itemname'];?>">
    <input type="hidden" id="<?php echo $item['size'];?>" class="<?php echo $item['size'];?>" value="<?php echo $size; ?>" name="<?php echo $item['sizename'];?>">
    <div class="item-bar-right">
      <div class="element-size-text" id="element-size-text"><?php echo $div_size[$text][$size]; ?></div>
      <div class="change-element-property"> <a title="Edit">
        <div rel="cp-edit-box" id="page-element-edit-box" class="edit-element"></div>
        </a> <a title="Delete">
        <div class="delete-element" id="delete-element"></div>
        </a> </div>
    </div>
  </div>
  <?php

		

	}

	

	//Print exceptional input element ( from meta-template )

	function print_box_tab($name, $values){

	

		?>
  <div class="meta-body">
    <div class="meta-title meta-tab"><?php _e('ADD MORE TABS','crunchpress');?></div>
    <div id="page-tab-add-more" class="page-tab-add-more" />
  </div>
  <br class="clear">
  <div class="meta-input">
    <input type='hidden' class="tab-num" id="tab-num" name='<?php echo $name['tab-num']; ?>[]' value=<?php 

					echo empty($values)? 0: $values->childNodes->length;

				?> />
    <div class="added-tab" id="added-tab">
      <ul>
        <li id="page-item-tab" class="default">
          <div class="meta-title meta-tab-title"><?php _e('TABS TITLE','crunchpress');?></div>
          <input type="text"  id='<?php echo $name['title']; ?>' />
          <br>
          <div class="meta-title meta-tab-title"><?php _e('TABS TEXT','crunchpress');?></div>
          <textarea id='<?php echo $name['caption']; ?>' ></textarea>
          <br>
          <?php if(!empty($name['active'])){ ?>
          <div class="meta-title meta-tab-title"><?php _e('Tabs Active','crunchpress');?></div>
          <div class="combobox">
            <select id='<?php echo $name['active']; ?>' >
              <option><?php _e('Yes','crunchpress');?></option>
              <option selected><?php _e('No','crunchpress');?></option>
            </select>
          </div>
          <?php } ?>
          <div id="unpick-tab" class="unpick-tab"><i class="fa fa-remove-sign"></i></div>
        </li>
        <?php

							

							if(!empty($values)){

								foreach ($values->childNodes as $tab){ 

							?>
        <li id="page-item-tab" class="page-item-tab">
          <div class="meta-title meta-tab-title"><?php _e('TABS TITLE','crunchpress');?></div>
          <input type="text" name='<?php echo $name['title']; ?>[]' id='<?php echo $name['title']; ?>' value="<?php echo find_xml_value($tab, 'title'); ?>" />
          <br>
          <div class="meta-title meta-tab-title"><?php _e('TABS TEXT','crunchpress');?></div>
          <textarea name='<?php echo $name['caption']; ?>[]' id='<?php echo $name['caption']; ?>' ><?php echo find_xml_value($tab, 'caption'); ?></textarea>
          <br>
          <div id="unpick-tab" class="unpick-tab"><i class="fa fa-remove-sign"></i></div>
          <?php if(!empty($name['active'])){ ?>
          <?php $is_active = find_xml_value($tab, 'active'); ?>
          <div class="meta-title meta-tab-title"><?php _e('Tabs Active','crunchpress');?></div>
          <div class="combobox">
            <select id='<?php echo $name['active']; ?>' name='<?php echo $name['active']; ?>[]' >
              <option <?php if($is_active=='Yes'){ echo 'selected'; } ?>><?php _e('Yes','crunchpress');?></option>
              <option <?php if($is_active!='Yes'){ echo 'selected'; } ?>><?php _e('No','crunchpress');?></option>
            </select>
          </div>
          <?php } ?>
        </li>
        <?php

							

								}

							}

						?>
      </ul>
      <br class=clear>
    </div>
  </div>
  <br class=clear>
</div>
<?php

		

	}

	

	// sidebar => name, value

	function print_panel_sidebar($title, $values){

	

		extract($values);

		

		?>
<div class="panel-body" id="panel-body">
  <div class="panel-body-gimmick"></div>
  <div class="panel-title">
    <label>
      <?php echo $title; ?>
    </label>
  </div>
  <div class="panel-input">
    <input type="text" id="add-more-sidebar" value="type title here" rel="type title here">
    <div id="add-more-sidebar" class="add-more-sidebar"></div>
  </div>
  <?php if(isset($description)){ ?>
  <div class="panel-description">
    <?php echo $description; ?>
  </div>
  <?php } ?>
  <br class="clear">
  <div id="selected-sidebar" class="selected-sidebar">
    <div class="default-sidebar-item" id="sidebar-item">
      <div class="panel-delete-sidebar"></div>
      <div class="slider-item-text"></div>
      <input type="hidden" id="<?php echo $name; ?>">
    </div>
    <?php 

				

				if(!empty($value)){

					

					$xml = new DOMDocument();

					$xml->loadXML($value);

					

					foreach( $xml->documentElement->childNodes as $sidebar_name ){

					

				?>
    <div class="sidebar-item" id="sidebar-item">
      <div class="panel-delete-sidebar"></div>
      <div class="slider-item-text"><?php echo $sidebar_name->nodeValue; ?></div>
      <input type="hidden" name="<?php echo $name; ?>[]" id="<?php echo $name; ?>" value="<?php echo $sidebar_name->nodeValue; ?>">
    </div>
    <?php 

					} 

					

				} 

				

				?>
  </div>
</div>
<?php 

		

	}
