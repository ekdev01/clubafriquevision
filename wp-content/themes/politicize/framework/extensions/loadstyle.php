<?php



	// Ajax to include font infomation

	add_action('wp_ajax_nopriv_cp_color_bg', 'cp_color_bg');

	add_action('wp_ajax_cp_color_bg','cp_color_bg');

	function cp_color_bg($recieve_color='',  $body_color = '', $backend_on_off=''){

	

		global $html_new;

		if($backend_on_off <> 1){

			$recieve_color = $_POST['color'];

		}		

		/*

		================================================

						Create StyleSheet

		================================================

		*/

		$html_new .= '<style id="stylesheet">';

			

				/*

				================================================

							TEXT SELECTION COLOR 

				================================================

				*/



				$html_new .= '::selection {

					background: '.$recieve_color.'; /* Safari */

					color:#fff;

					}

				::-moz-selection {

					background: '.$recieve_color.'; /* Firefox */

					color:#fff;

				}';

				

				

				/*Politicize Update Yellow Color*/

				$html_new .= '.normal-grid .add_to_cart_button:after, .normal-grid .add_to_cart_button, .normal-grid .added_to_cart , .normal-grid .add_to_cart_button , .simple-grid .product-box .bottom .title , .woocommerce .shop_table.cart .actions .button, .woocommerce .shipping_calculator .button, #order_review #payment .button, .woocommerce .login .button, .entry-content-cp .checkout_coupon .button, .summary.entry-summary .button, .wrapper .woocommerce #respond input#submit.submit, .wrapper .woocommerce-page #respond #submit.submit, #commentform input[type="submit"], .cp_head-search .btn, #main-woo .products li a.button:hover, .shopping_cart .nav-last2 a.button, .woocommerce-product-search input[type="submit"], .event-text-box .thumb .caption .timer-box-2, .cp_donation-box .btn-donate, .causes-challenges .text-box a.btn-project, .cp_blog-section .bx-wrapper .bx-controls-direction a, .donation-bar-section a.btn-donate, .parallax-progress .progress, .target-project-section .bx-wrapper .bx-controls-direction a, #footer .get-touch-form .btn-search, .causes-detail a.btn-back, .head-right-box .btn-donate, .cart-collaterals .cart_totals a, .onsale, .woocommerce-message a, .cp_donation-details-2, .cp_progress-box-2 .progress .bar, .challenges-box a.btn-more, #footer .widget_archive li a:hover, #footer .product-categories li:hover, .modern-grid .pro-content .rate, #main-woo .related.products .product h3, .archive #main-woo .products h3, #main-woo .woocommerce-pagination ul li a:hover {

					background-color:'.$recieve_color.';

				}';

				


				

				$html_new .= '.cp-accordion .accordion-heading:hover, .heading-style-1::before, .project_user_content blockquote, .project_user_content blockquote:before {

					border-color:'.$recieve_color.';

				}';

				

				$html_new .= '#cp_causes-banner .caption .holder h1 a span, .causes-challenges .text-box p a:hover, .cp_blog-section .box .text-box a.read-more:hover, .target-project-box .text-box a.btn-detail:hover{

					color:'.$recieve_color.';

				}';

				

				$html_new .= '.donation-rank-box a.btn-donation, .donate-box-2 a.btn-donate, #cp_causes-banner .caption .holder a.btn-donate, .normal-grid .pro-box h4{

					background-color:'.$recieve_color.';

				}';

				

				$html_new .= '.frame-caption .woocommerce .star-rating span::before, .frame-caption .woocommerce-page .star-rating span::before, .frame-caption .pro-box .pro-footer .star-rating span::before{

					color:'.$recieve_color.';

				}';

				

				$html_new .= '.woocommerce .star-rating, .woocommerce-page .star-rating, .pro-box .pro-footer .star-rating{

					color:'.$recieve_color.';

				}';

				

				$html_new .= '#inner-banner, .cp_newsletter-row, #cp-causes-header, .cp_donation-box, .cp_donation-slider .bx-wrapper::before, .cp_donation-slider .bx-wrapper::after, .cp_donation-details-2, .causes-footer{

					background-color:'.$body_color.';

				}';

				

				/*Background Color Start*/

				$html_new .= '.coming-soon .countdown_amount,.btn-style, .notify-input .share-it i, input.radio + label > span.show-hover, input.radio + label > span.show-hover:before, .error-page, .error-search-btn, .wpcf7-submit, .timeline-round, .even-box .caption, .product_info .gallery-box, .event-detail-timer, .cp-banner .caption a.view, #searchsubmit, .detail-btn-sumbit, .tagcloud a,.head-topbar, strong.logo, .widget-box-inner:hover .round a.inner, .blog-post-box .caption strong.type, .timeline-frame-outer .caption, .text-d, .btn, .our-facts, #inner-banner, .optionsDivVisible a:hover, .timeline-project-box .holder .heading-area, .event-heading, .navigation-area a.btn-donate3, a.btn-donate5, .news-box .frame .caption:before, .gallery-box:before, .gallery-frame .caption:before, .other-project .caption:before, .event-row .frame .caption:before, .event-row ul li:hover a.location, .related-box .frame .caption:before, .team-box .frame .caption:before, .accordition-box .accordion-heading .accordion-toggle:hover, .donate-form ul li:hover a:before, .upcoming-box .caption strong.mnt:before, .color-2:after, .color-3:after, .color-4:after, .color-5:after, .color-1, .accordition-box .accordion-heading .accordion-toggle:hover span, .cp-accordion .accordion-heading:hover, .grid .caption:before, .accordion-heading.active .accordion-toggle, .accordion-heading.active .accordion-toggle span, #banner .bx-wrapper .bx-pager.bx-default-pager a:hover, .bx-wrapper .bx-pager.bx-default-pager a.active, .gallery-box .caption:before, .news-box .frame .caption:before, .event-row .frame .caption:before, .content_section .review-final-score, .content_section .review-percentage .review-item span span, .blog_listing .topbar-social a:hover{

					background-color:'.$recieve_color.';

				}';

				/*Background Color End*/



				/*Border Color Start*/

				$html_new .= 'strong.logo:before, #nav li.active a:before, #nav li:hover > a:before, .widget-box-inner:hover .round a.inner:before, .timeline-project-box .holder .heading-area:before, .event-heading:before, #nav li:hover > a, .color-1:before, #nav li.active > a, .color-2:before, .color-3:before, .color-4:before, .color-5:before, .menu ul li.current-menu-item > a, #nav li.current-menu-item > a, .menu ul li.current-menu-item > a:before, #nav li.current-menu-item > a:before{

					border-top-color:'.$recieve_color.';

				}';

				/*Border Color End*/

/*
				$html_new .= '.cp_progress-box-2 .progress .bar::before {

					border-color: transparent transparent '.$recieve_color.';

				}'; */




				/*Text Color Start*/

				$html_new .= '.error-page .holder h2 span, .cp-banner .caption h2 a,.upcoming-events-box .bx-wrapper .bx-prev:before, .upcoming-events-box .bx-wrapper .bx-next:before, .text-b, .event-row ul li:hover h2, #banner .caption h1, #banner .caption h2 , .tweets a, .sidebar-recent-post ul li a{

					color:'.$recieve_color.';

				}';

				/*Text Color End*/



				/*Border Color Start*/

				$html_new .= '.our-project h3, .latest-news-box h3, .blog-post h3, .timeline-box h3, .welcome-text-box h2, .about-me-text h3, blockquote, blockquote:before, .team-member-box h3, .our-detail-box h4, .blog-content .pagination ul > li > a:hover, .pagination ul > li > a:focus, .pagination ul > .active > a, .pagination ul > .active > span, .blog-content .pagination ul > .active > a, .pagination ul > .active > span, .sidebar-recent-post h3, .blog-detail-form h3, .donate-page h2, .pagination-all.pagination ul > .active > a, .pagination ul > .active > span, .pagination-all.pagination ul > li > a:hover, .pagination ul > li > a:focus, .pagination ul > .active > a, .pagination ul > .active > span, .comment-box h3, .related-event-box h3, .other-project h3, .sidebar-member a.member-text:before, .event-row ul li:hover a.location, .get-touch-form input:focus:invalid:focus, textarea:focus:invalid:focus, select:focus:invalid:focus, .cp-columns h2, .customization-options h2, .cp-highlighter h2, .cp-testimonials h2, .blockquote-1, .blockquote-1:before, .syntaxhighlighter .gutter .line, .entry-header > h1, .h-style, .latest-news-box h3 {

				 border-color:'.$recieve_color.';

				}';

				$html_new .= '.timeline-last .frame-outer:after{

					border-color:transparent '.$recieve_color.' transparent transparent;

				}';

				

				$html_new .= '.even-box .frame-outer:before{

					border-color:transparent transparent transparent '.$recieve_color.';

				}';

				/*Border Color End*/

			

				

				



				/*Button Color Start*/

				$html_new .= '.our-project a.btn-view, .box-1 a.btn-readmore, .get-touch-form .btn-search, .blog-content .pagination ul > li > a:hover, .pagination ul > li > a:focus, .pagination ul > .active > a, .pagination ul > .active > span, .blog-content .pagination ul > .active > a, .pagination ul > .active > span, .sidebar-member a.member-text, .detail-btn-sumbit, .donate-btn-submit, .detail-btn-sumbit2, .pagination-all.pagination ul > li > a:hover, .pagination ul > li > a:focus, .pagination ul > .active > a, .pagination ul > .active > span, .pagination-all.pagination ul > .active > a, .pagination ul > .active > span, .timline-project .bx-wrapper .bx-pager.bx-default-pager a:hover, .bx-wrapper .bx-pager.bx-default-pager a.active, .member-btn-submit, .facts-tab-box .nav-tabs > .active > a, .nav-tabs > .active > a:hover, .nav-tabs > .active > a:focus, .facts-tab-box .nav > li > a:hover, .nav > li > a:focus, .timline-project .bx-wrapper .bx-pager.bx-default-pager a:hover, .bx-wrapper .bx-pager.bx-default-pager a.active, .donate-form ul li a:hover, .donate-form ul li:hover .inner, .head-topbar a.search:before, .btn, .navbar .btn-navbar, .tabs-box .nav-tabs > .active > a, .nav-tabs > .active > a:hover, .nav-tabs > .active > a:focus, .tabs-box .nav-tabs > li > a:hover, .nav-tabs > li > a:focus, .testimonial-box-1 .bx-wrapper .bx-pager.bx-default-pager a:hover, .bx-wrapper .bx-pager.bx-default-pager a.active, .timline-project .bx-wrapper .bx-pager.bx-default-pager a:hover, .bx-wrapper .bx-pager.bx-default-pager a.active, .cp-accordion .accordion-heading:hover span.open, .button-box a, #banner .caption a.view, #banner .bx-wrapper .bx-pager.bx-default-pager a:hover, .bx-wrapper .bx-pager.bx-default-pager a.active, .navbar .btn-navbar:hover, .navbar .btn-navbar:focus, .navbar .btn-navbar:active, .navbar .btn-navbar.active, .navbar .btn-navbar.disabled, .navbar .btn-navbar[disabled], .sermon-detail-row .topbar-social li a, thead, .bottom-row .right ul li a:hover, .page-numbers.current, .form-submit #submit, a.comment-reply-link, .post-password-form input[type="submit"]

				 {

					background-color:'.$recieve_color.';

				}';

				/*Button Color End*/



				/*Box Shadow Color Start*/

				$html_new .= '.pagination-all.pagination ul > li > a:hover, .pagination ul > li > a:focus, .pagination ul > .active > a, .pagination ul > .active > span, .pagination-all.pagination ul > .active > a, .pagination ul > .active > span {

					box-shadow:#950609 !important;

				}';

				/*Box Shadow Color End*/

					



				//Header Background Image

				

				$header_image = get_themeoption_value('header_image','general_settings');

				$header_image_link = get_themeoption_value('header_image_link','general_settings');

				

				$image_src = '';

					if(!empty($header_image)){ 

						$image_src = wp_get_attachment_image_src( $header_image, 'full' );

						$image_src = (empty($image_src))? '': $image_src[0];			

				}

				

				if($header_image <> ''){

					if($image_src <> ''){

							$html_new .= '#cp-header-1, #cp-header-2, #cp-header-3, #header {background: url('.$image_src.') no-repeat center center/cover}';

					}

				}else{

					$path =  CP_PATH_URL;

					$html_new .=  '#cp-header-1, #cp-header-2, #cp-header-3, #header {background: url('.$path.'/images/header-bg.jpg) no-repeat center center/cover}';

				}

				

				//Footer Background Image

				

				

				$footer_bg = get_themeoption_value('footer_bg','general_settings');

				$image_src_footer = get_themeoption_value('image_src_footer','general_settings');

				

				$image_src_foot = '';

					if(!empty($footer_bg)){ 

						$image_src_foot = wp_get_attachment_image_src( $footer_bg, 'full' );

						$image_src_foot = (empty($image_src_foot))? '': $image_src_foot[0];			

				}

				

				if($footer_bg <> ''){

					if($image_src_foot <> ''){

							$html_new .= '.causes-footer {background-image: url('.$image_src_foot.')}';

					}

				}else{

					$path =  CP_PATH_URL;

					$html_new .=  '.causes-footer {background-image: url('.$path.'/images/causes-footer.png) }';

				}

				



				// Boxed Layout Style

				$html_new .= '.boxed_v_cp {width:1200px; margin:0 auto;}';





		$html_new .= '</style>';

		

		//Color Picker Is Installed 

		if($backend_on_off <> 1){

			die(json_encode($html_new));

		}else{

			return $html_new;

		}

		

	}





	// Add Style to Frontend

	function add_font_code(){

		global $pagenow;

		

		//Style tag Start

		echo '<style type="text/css">';

			

			//Attach Background

			$select_bg_pat = get_themeoption_value('select_bg_pat','general_settings');

			$body_image = get_themeoption_value('body_image','general_settings');

			$image_repeat_layout = get_themeoption_value('image_repeat_layout','general_settings');

			$position_image_layout = get_themeoption_value('position_image_layout','general_settings');

			$image_attachment_layout = get_themeoption_value('image_attachment_layout','general_settings');

			

			 if($select_bg_pat == 'Background-Image'){

				$image_src_head = '';							

				if(!empty($body_image)){ 

					$image_src_head = wp_get_attachment_image_src( $body_image, 'full' );

					$image_src_head = (empty($image_src_head))? '': $image_src_head[0];

					$thumb_src_preview = wp_get_attachment_image_src( $body_image, 'full');

				}

				echo 'body{

				background-image:url('.$thumb_src_preview[0].');

				background-repeat:'.$image_repeat_layout.';

				background-position:'.$position_image_layout.';

				background-attachment:'.$image_attachment_layout.';

				background-size:cover; }';

			}else if($select_bg_pat == 'Background-Color'){ 

				$bg_scheme = get_themeoption_value('bg_scheme','general_settings');

				echo 'body{background:'.$bg_scheme.' !important;} .inner-pages h2 .txt-left{background:'.$bg_scheme.';}';

			}else if($select_bg_pat == 'Background-Patren'){

				$body_patren = get_themeoption_value('body_patren','general_settings');

				$color_patren = get_themeoption_value('color_patren','general_settings');

				//render Body Pattern

				if(!empty($body_patren)){

					$image_src_head = wp_get_attachment_image_src( $body_patren, 'full' );

					$image_src_head = (empty($image_src_head))? '': $image_src_head[0];

					$thumb_src_preview = wp_get_attachment_image_src( $body_patren, array(60,60));

					//Custom patterm

					if($thumb_src_preview[0] <> ''){ echo 'body{background:url('.$thumb_src_preview[0].') repeat !important;}'; }

				}else{ 

					$bg_scheme = get_themeoption_value('bg_scheme','general_settings');

					$color_patren = get_themeoption_value('color_patren','general_settings');

					//Default patterns

					echo 

					'body{background:'.$bg_scheme.' url('.CP_PATH_URL.$color_patren.') repeat;} 

					.inner-pages h2 .txt-left{background:'.$bg_scheme.' url('.CP_PATH_URL.$color_patren.') repeat;}'; 

				}

			}

			

			//Heading Variables

			$heading_h1 = get_themeoption_value('heading_h1','typography_settings');

			$heading_h2 = get_themeoption_value('heading_h2','typography_settings');

			$heading_h3 = get_themeoption_value('heading_h3','typography_settings');

			$heading_h4 = get_themeoption_value('heading_h4','typography_settings');

			$heading_h5 = get_themeoption_value('heading_h5','typography_settings');

			$heading_h6 = get_themeoption_value('heading_h6','typography_settings');

			

			//Render Heading sizes

			if($heading_h1 <> ''){ echo 'h1{ font-size:'.$heading_h1.'px !important; }'; }

			if($heading_h2 <> ''){ echo 'h2{ font-size:'.$heading_h2.'px !important; }'; }

			if($heading_h3 <> ''){ echo 'h3{ font-size:'.$heading_h3.'px !important; }'; }

			if($heading_h4 <> ''){ echo 'h4{ font-size:'.$heading_h4.'px !important; }'; }

			if($heading_h5 <> ''){ echo 'h5{ font-size:'.$heading_h5.'px !important; }'; }

			if($heading_h6 <> ''){ echo 'h6{ font-size:'.$heading_h6.'px !important; }'; }

			

			//Body Font Size

			$font_size_normal = get_themeoption_value('font_size_normal','typography_settings');

			if($font_size_normal <> ''){ echo 'body{font-size:'.$font_size_normal.'px !important;}'; }

			

			//Body Font Family

			$font_google = get_themeoption_value('font_google','typography_settings');

			if($font_google <> 'Default'){ echo 'body,.comments-list li .text p, .header-4-address strong.info,.header-4-address a.email,strong.copy,.widget-box-inner p,.blog-post-box .text p,.box-1 p, .box-1 .textwidget,.get-touch-form input,.get-touch-form strong.title,.footer-copyright strong.copy,#inner-banner p,.welcome-text-box p,.about-me-text p,.about-me-text blockquote q,.team-box .text p,.accordition-box .accordion-inner p,.facts-content-box p,.our-detail-box p,.our-detail-box ul li,.widget_em_widget ul li,.sidebar-recent-post ul li p,blockquote p,blockquote q,.author-box .text p,.contact-page address ul li strong.title,.contact-page address ul li strong.ph,.contact-page address ul li strong.mob,.contact-page address ul li a.email,a.comment-reply-link,.timeline-project-box > .text p,.comments .text p,.event-row .text p,.project-detail p,.news-box .text p,.error-page p,.cp-columns p,.cp-list-style ul li,.customization-options ul li,.cp-accordion .accordion-inner strong,.list-box ul li,.list-box2 ul li,.list-box3 ul li,.tab-content p, .tab-content-area p,.blockquote-1 q,.blockquote-2 q,.map h3,.even-box .caption p,.header-4-address strong.info,.header-4-address a.email,strong.copy,.widget-box-inner p { font-family:"'.$font_google.'";}'; }else{ 

			echo '';

			}

			

			//Body Font Size

			$boxed_scheme = get_themeoption_value('boxed_scheme','general_settings');

			$select_layout_cp = get_themeoption_value('select_layout_cp','general_settings');

			if($select_layout_cp == 'box_layout'){ echo '.boxed{background:'.$boxed_scheme.';}'; }

			

			//Heading Font Family

			$font_google_heading = get_themeoption_value('font_google_heading','typography_settings');

			if($font_google_heading <> 'Default'){ echo 'h1, h2, h3, h4, h5, h6, .head-topbar .left ul li strong.number,.head-topbar .left ul li a,.navigation-area a.btn-donate-2,.footer-menu li a,.footer-menu2 li a,#nav-2 li a,#nav-2 li ul li a,.navigation-area a.btn-donate3,.top-search-input,a.btn-donate5,.navigation-area a.btn-donate,.top-search-input,#nav li a,#nav li ul li a,.cp-banner .caption h1,.cp-banner .caption h2,.cp-banner .caption strong.title,.cp-banner .caption a.view,.widget-box-inner h2,.entry-header > h1,.h-style,.latest-news-box h3,.css3accordion .content .top a,.css3accordion .content .top strong.mnt,.css3accordion .content .top a.comment,.css3accordion .content strong.title,.css3accordion .content p,.css3accordion .content a.readmore,.upcoming-heading h3,.upcoming-box .caption strong.title,.upcoming-box .caption strong.mnt,.upcoming-events-box a.btn-view,.countdown_holding span,.countdown_amount,.countdown_period,.our-project a.btn-view,.our-project h3,.portfolio-filter li a,.gallery-box .caption strong.title,.timeline-box h3,.timeline-head strong.mnt,.timeline-frame-outer .caption h4,.timeline-frame-outer .caption p,.blog-post h3,.blog-post-box .caption strong.date,.blog-post-box .caption strong.comment,.blog-post-box .text strong.title,.blog-post-box .text h4,.blog-post-box .text a.readmore,.blog-post-share strong.title1,.name-box strong.name,.name-box-inner strong,.text-row strong.title,.text-row strong.time,.twitter-info-box ul li strong.number,.twitter-info-box ul li a.tweet,.box-1 h4,.box-1 a.btn-readmore,.box-1 .text strong.title,.box-1 .text strong.mnt,#inner-banner h1,.welcome-text-box h2,.about-me-left .text ul li h3,.about-me-left .text ul li strong.title,.about-me-socila strong.title,.about-me-text h3,.team-member-box h3,.team-box .text h4,.team-box .text h4 a,.team-box .text strong.title,.heading h3,.our-facts-box strong.number,.our-facts-box a.detail,.our-detail-box h4,.accordition-box .accordion-heading .accordion-toggle strong,.facts-tab-box .nav-tabs > li > a, .nav-pills > li > a,.blog-box-1 strong.title,.bottom-row .left span,.bottom-row .left a,.bottom-row .left ul li a,.bottom-row .right strong.title,.blog-box-1 .text h2,.blog-box-1 .text a.readmore,.pagination-all.pagination ul > li > a, .pagination ul > li > span,.sidebar-input,.sidebar-member a.member-text,.sidebar-recent-post h3,.sidebar-recent-post ul li:hover .text strong.title,.widget_em_widget ul li a,.sidebar-recent-post ul li .text strong.title,.sidebar-recent-post ul li a.mnt,.sidebar-recent-post ul li a.readmore,.list-area ul li a,.archive-box ul li a,.tagcloud a,.share-socila strong.title,.author-box .text strong.title,.contact-me-row strong.title,.blog-detail-form h3,.form-area label,.detail-input,.detail-textarea,.detail-btn-sumbit,.post-password-form input[type="submit"],#searchsubmit,.detail-btn-sumbit2,a.comment-reply-link,.donate-page h2,.donate-form ul li a,.donate-form-area ul li label,.donate-input,.donate-btn-submit,.timeline-project-box .holder .heading-area,.timeline-project-box .blog-box-1 > .text h2,.comment-box h3,.comments .text strong.title,.comments .text a.date,.comments .text a.reply,.timer-area ul li a,.event-detail-timer .countdown-amount,.countdown-period,.contact-me-row2 strong.title,.contact-me-row2 ul li a,.related-event-box h3,.related-box .text strong.title,.related-box .text a.date,.member-input,.member-input-2,.member-input-3,.member-form label,.check-box strong.title,.member-btn-submit,.event-heading a,.event-row .text h2,.detail-row li a,.map-row a.location,.project-detail h2,.project-detail-list li .even,.project-detail-list li .odd,.other-project h3,.news-box .text-top-row span,.news-box .text-top-row a,.news-box .text-top-row a,.news-box .text h2,.news-box .text a.readmore,.slide-out-div h3,.error-page h2,.cp-columns h2,.cp-columns strong.title,.customization-options h2,.cp-highlighter h2,.cp-accordion .accordion-heading .accordion-toggle strong,.cp-testimonials h2,.frame-box strong.name,.frame-box strong.title,.testimonial-box-1 blockquote q,.single-testimonial blockquote q,.frame-box2 strong.name,.frame-box2 strong.title,.button-box a,.typography h1,h2.cp-heading-full,.typography h2,h3.cp-heading-full,.typography h3,h4.cp-heading-full,.typography h4,h5.cp-heading-full,.typography h5,h6.cp-heading-full,.typography h6,.tabs-box .nav-tabs > li > a, .nav-pills > li > a,#wp-calendar caption,.even-box .caption h2,.timeline-round strong.year,#search-text input[type="text"],.sidebar-recent-post select,.content_section .review-final-score h3,.content_section .review-final-score h4{ font-family:"'.$font_google_heading.'";}'; }else{ echo 'h1, h2, h3, h4, h5, h6{}';}

			

			//Menu Font Family

			$menu_font_google = get_themeoption_value('menu_font_google','typography_settings');

			if($menu_font_google <> 'Default'){ echo '.navigation ul{font-family:"'.$menu_font_google.'";}';}else{ echo '#nav{font-family:"Open Sans",sans-serif;}';}

			

		echo '</style>';

		//Style Tag End

		

		

		$color_scheme = get_themeoption_value('color_scheme','general_settings');		

		$body_color = get_themeoption_value('body_color','general_settings');		

		$recieve_color = '';

		$recieve_an_color = '';

		$html_new = '';

		$backend_on_off = 1;

		

		//Color Scheme

		if($color_scheme <> ''){

			$recieve_color = $color_scheme;

			//$recieve_an_color = $color_anchor;

			echo cp_color_bg($recieve_color, $body_color, $backend_on_off);

		}

	}



	//Add Style in Footer

	global $pagenow;

	if( $GLOBALS['pagenow'] != 'wp-login.php' ){

		if(!is_admin()){

			//for Frontend only

			add_action('wp_head', 'add_font_code');

		}

	}