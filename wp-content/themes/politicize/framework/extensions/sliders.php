<?php

	/*
	*	CrunchPress Misc File
	*	---------------------------------------------------------------------
	* 	@version	1.0
	* 	@author		CrunchPress
	* 	@link		http://crunchpress.com
	* 	@copyright	Copyright (c) CrunchPress
	*	---------------------------------------------------------------------
	*	This file contains all of the necessary function for the front-end to
	*	easily used. You can see the description of each function below.
	*	---------------------------------------------------------------------
	*/
	
	// Check if url is from youtube or vimeo
	function get_video($url, $width = 640, $height = 480){
	
		$videoHtml = '';
		
		if(strpos($url,'youtube')){		
		
			$videoHtml = get_youtube($url, $width, $height);
		
		}else if(strpos($url,'youtu.be')){
		
			$videoHtml = get_youtube($url, $width, $height, 'youtu.be');
			
		}else{
		
			$videoHtml = get_vimeo($url, $width, $height);
		}
		
		return $videoHtml;
	}
	
	// Print youtube video
	function get_youtube($url, $width = 640, $height = 480, $type = 'youtube'){
		
		if( $type == 'youtube' ){
			preg_match('/[\\?\\&]v=([^\\?\\&]+)/',$url,$id);
		}else{
			preg_match('/youtu.be\/([^\\?\\&]+)/', $url, $id);
		}
		
		/*
		<object type="application/x-shockwave-flash" data="http://www.youtube.com/v/<?php echo $id[1]; ?>&hd=1" style="width:<?php echo $width; ?>px;height:<?php echo $height; ?>px">
			<param name="wmode" value="opaque"><param name="movie" value="http://www.youtube.com/v/<?php echo $id[1]; ?>&hd=1" />
		</object>
		*/
		
		
		return '<iframe src="http://www.youtube.com/embed/'.$id[1].'?wmode=transparent" width="'.$width.'" height="'.$height.'" ></iframe>';
		
		
		
	}
	
	//Get Audio Player OR SoundCloud
	function get_audio_track($url,$counter_track){
		$audio_html = '';
		if(strpos($url,'soundcloud')){
			$audio_html .= do_shortcode('[soundcloud type="visual-embed" url="'.$url.'" color="#1e73be" auto_play="false" hide_related="true" show_artwork_or_visual="true" width="100%" height="300" iframe="true" /]');
		}else{
			if($url <> '' ){
				$audio_html  .= do_shortcode('[audio mp3="'.$url.'"][/audio]');
			} // No MP3 Song
		}
		
		return $audio_html;
	}
	
	// Print vimeo video
	function get_vimeo($url, $width = 640, $height = 480){
	
		preg_match('/http:\/\/vimeo.com\/(\d+)$/', $url, $id);
		return '
		<object width="'.$width.'" height="'.$height.'">
			<param name="allowscriptaccess" value="always" >
			<param name="allowfullscreen" value="true" >
			<param name="wmode" value="transparent" >
			<param name="bgcolor" value="#000000" >
			<param name="movie" value="http://vimeo.com/moogaloop.swf?clip_id='.$id[1].'&amp;server=vimeo.com&amp;show_title=0&amp;show_byline=0&amp;show_portrait=0&amp;color=00ADEF&amp;fullscreen=1" />
			<embed src="http://vimeo.com/moogaloop.swf?clip_id='.$id[1].'&amp;server=vimeo.com&amp;show_title=0&amp;show_byline=0&amp;show_portrait=0&amp;color=00ADEF&amp;fullscreen=1" type="application/x-shockwave-flash" allowfullscreen="true" allowscriptaccess="always" width="'.$width.'" height="'.$height.'" wmode="transparent" bgcolor="#000000"></embed>
		</object>';
		
	}

	function print_flex_slider($slider_xml, $size){
		if( empty($slider_xml) ) return;

		$slider_style = 'slider';
		//Getting Slider Settings
		$cp_slider_settings = get_option('slider_settings');
		if($cp_slider_settings <> ''){
			
			$cp_slider = new DOMDocument ();
			$cp_slider->loadXML ( $cp_slider_settings );
			$animation_type_flex = find_xml_child_nodes($cp_slider_settings,'flex_slider_settings','animation_type_flex');
			$reverse_order_flex = find_xml_child_nodes($cp_slider_settings,'flex_slider_settings','reverse_order_flex');
				if($reverse_order_flex == 'disable'){$reverse_order_flex = 'false';}else{$reverse_order_flex = 'true';}
			$startat_flex_slider = find_xml_child_nodes($cp_slider_settings,'flex_slider_settings','startat_flex_slider');
			$auto_play_flex = find_xml_child_nodes($cp_slider_settings,'flex_slider_settings','auto_play_flex');
				if($auto_play_flex == 'disable'){$auto_play_flex = 'false';}else{$auto_play_flex = 'true';}
			$animation_speed_flex = find_xml_child_nodes($cp_slider_settings,'flex_slider_settings','animation_speed_flex');
			$pause_on_flex = find_xml_child_nodes($cp_slider_settings,'flex_slider_settings','pause_on_flex');
			if($pause_on_flex == 'disable'){$pause_on_flex = 'false';}else{$pause_on_flex = 'true';}
			$navigation_on_flex = find_xml_child_nodes($cp_slider_settings,'flex_slider_settings','navigation_on_flex');
			if($navigation_on_flex == 'disable'){$navigation_on_flex = 'false';}else{$navigation_on_flex = 'true';}
			$arrow_on_flex = find_xml_child_nodes($cp_slider_settings,'flex_slider_settings','arrow_on_flex');
			if($arrow_on_flex == 'disable'){$arrow_on_flex = 'false';}else{$arrow_on_flex = 'true';}
			//Anything Slider Values
			$slide_mod_anything = find_xml_child_nodes($cp_slider_settings,'anything_slider_settings','slide_mod_anything');
			$auto_play_anything = find_xml_child_nodes($cp_slider_settings,'anything_slider_settings','auto_play_anything');
			if($auto_play_anything == 'disable'){$auto_play_anything = 'false';}else{$auto_play_anything = 'true';}
			$pause_on_anything = find_xml_child_nodes($cp_slider_settings,'anything_slider_settings','pause_on_anything');
			if($pause_on_anything == 'disable'){$pause_on_anything = 'false';}else{$pause_on_anything = 'true';}
			$animation_speed_anything = find_xml_child_nodes($cp_slider_settings,'anything_slider_settings','animation_speed_anything');
		}
		
		?>
		<script type="text/javascript">
		jQuery(document).ready(function($) {
			'use strict';
			$('#flexslider').flexslider({
				animation: '<?php echo $animation_type_flex;?>',
				reverse: <?php echo $reverse_order_flex;?>,
				startAt: <?php echo $startat_flex_slider;?>,
				slideshow: <?php echo $auto_play_flex;?>,
				animationSpeed: <?php echo $animation_speed_flex;?>, 
				pauseOnHover: <?php echo $pause_on_flex;?>, 
				directionNav: <?php echo $navigation_on_flex;?>, 
				controlNav: <?php echo $arrow_on_flex;?>, 
				start: function(slider){
				  $('body').removeClass('loading');
				}
			});
		});
		</script>
		
		<?php
		global $cp_is_responsive;
		
			echo '<div id="flexslider" class="flexslider ">';
				echo '<ul class="slides">';		
					foreach($slider_xml->childNodes as $slider){
						$title = find_xml_value($slider, 'title');
						$caption = html_entity_decode(find_xml_value($slider, 'caption'));
						$link = find_xml_value($slider, 'link');
						$link_type = find_xml_value($slider, 'linktype');
						$btn_txt = find_xml_value($slider, 'btn_txt');
						if(cp_get_width($size) == '5000'){
							$image_url = wp_get_attachment_image_src(find_xml_value($slider, 'image'),'full');
						}else{
							$image_url = wp_get_attachment_image_src(find_xml_value($slider, 'image'),$size);
						}
						$alt_text = get_post_meta(find_xml_value($slider, 'image') , '_wp_attachment_image_alt', true);
						echo '<li class="slide-image">';				
							echo '<img src="' . $image_url[0] . '" alt="' . $alt_text . '" />';
							if( !empty($title) ){
								echo '<div class="caption"><div class="cp-slider-title cp-title">' . $title . '</div>' . substr($caption,0,150) . '</div>'; 
							}
						echo '</li>';
					}
				echo "</ul>";
			echo "</div>";
	}
	
	
	function print_bx_slider($slider_xml,$size,$slider_id){
		global $post;
		//BX slider
		$slider_html = 'false';
		$slide_order_bx = '';
		$auto_play_bx = '';
		$pause_on_bx = '';
		$animation_speed_bx = '';
		$anchor_hr = '';
		$show_bullets = '';
		$show_arrow = '';
		
		$cp_slider_settings = get_option('slider_settings');
		if($cp_slider_settings <> ''){
			$cp_slider = new DOMDocument ();
			$cp_slider->loadXML ( $cp_slider_settings );
			//Bx Slider Values
			$slide_order_bx = find_xml_child_nodes($cp_slider_settings,'bx_slider_settings','slide_order_bx');
			$auto_play_bx = find_xml_child_nodes($cp_slider_settings,'bx_slider_settings','auto_play_bx');
			if($auto_play_bx == 'enable'){$auto_play_bx = 'true';}else{$auto_play_bx = 'false';}
			$pause_on_bx = find_xml_child_nodes($cp_slider_settings,'bx_slider_settings','pause_on_bx');
			if($pause_on_bx == 'enable'){$pause_on_bx = 'true';}else{$pause_on_bx = 'false';}
			$animation_speed_bx = find_xml_child_nodes($cp_slider_settings,'bx_slider_settings','animation_speed_bx');
			$show_bullets = find_xml_child_nodes($cp_slider_settings,'bx_slider_settings','show_bullets');
			$show_arrow = find_xml_child_nodes($cp_slider_settings,'bx_slider_settings','show_arrow');
		}
		$mode_slide = '';
		if($slide_order_bx == 'slide'){}else{$mode_slide = "mode: 'fade',";}
		if($animation_speed_bx == ''){$animation_speed_bx = '2000';}
		if($show_bullets == 'enable'){$show_bullets = 'true';}else{$show_bullets = 'false';}
		if($show_arrow == 'enable'){$show_arrow = 'true';}else{$show_arrow = 'false';}
		
		$header_style = '';
		$header_style = get_post_meta ( $post->ID, "page-option-top-header-style", true );

		if($header_style == 'Style 6'){
	
		if(!empty($slider_xml)){
			$slider_html = '<div id="cp_causes-banner">';
			$slider_html = $slider_html . '<script type="text/javascript">jQuery(document).ready(function($){$("#causes-banner").bxSlider({'.$mode_slide.'minSlides: 1,maxSlides: 1,pager:'.$show_bullets.',controls:'.$show_arrow.',hideControlOnEnd: true,easing: "swing",auto: '.$auto_play_bx.',autoHover:'.$pause_on_bx.',speed:'.$animation_speed_bx.'});});</script>';
			$slider_html = $slider_html . '<ul id="causes-banner" class="" >';
					foreach($slider_xml->childNodes as $slider){
						$title = find_xml_value($slider, 'title');
						$caption = html_entity_decode(find_xml_value($slider, 'caption'));
						$link = find_xml_value($slider, 'link');
						$link_type = find_xml_value($slider, 'linktype');
						$btn_txt = find_xml_value($slider, 'btn_txt');
						if(cp_get_width($size) == '5000'){
							$image_url = wp_get_attachment_image_src(find_xml_value($slider, 'image'),'full');
						}else{
							$image_url = wp_get_attachment_image_src(find_xml_value($slider, 'image'),$size);
						}
						$alt_text = get_post_meta(find_xml_value($slider, 'image') , '_wp_attachment_image_alt', true);
						
							if($link_type == 'No Link'){$anchor_hr = '<h1>'. $title.'</h1>';}else if($link_type == 'Link to URL'){$anchor_hr = '<h1><a href="'.esc_url($link).'">'. $title.'</a></h1>';}else{$anchor_hr = '';}
							//if($link <> ''){$anchor_hr = '<h2><a href="'.esc_url($link).'">'. $title.'</a></h2>';}else{$anchor_hr = '<h2>'. $title.'</h2>';}
							$slider_html = $slider_html  .'<li>';
							$slider_html = $slider_html  .'<img src="'. $image_url[0].'" alt=""/>';
							//Condition for Title and Description if Empty
							if($title <> '' AND $caption <> ''){
								$slider_html = $slider_html  .'<div class="caption"><div class="holder">';
								$slider_html = $slider_html  .$anchor_hr;
								$slider_html = $slider_html  .'<p>'. esc_html($caption).'</p>';
								$slider_html = $slider_html  .'<a href="'.$link.'" class="btn-donate">Donate Now</a></div></div>';
							}
							$slider_html = $slider_html  .'</li>';
					}
					
				$slider_html = $slider_html . '</ul>';
				$slider_html = $slider_html . '</div>';
			}
			return $slider_html;
				
		}else{
			
			if(!empty($slider_xml)){
			$slider_html = '<div class="border_slider cp-banner">';
			$slider_html = $slider_html . '<script type="text/javascript">jQuery(document).ready(function($){$("#'.$slider_id.'").bxSlider({'.$mode_slide.'minSlides: 1,maxSlides: 1,pager:'.$show_bullets.',controls:'.$show_arrow.',hideControlOnEnd: true,easing: "swing",auto: '.$auto_play_bx.',autoHover:'.$pause_on_bx.',speed:'.$animation_speed_bx.'});});</script>';
			$slider_html = $slider_html . '<ul id="'.$slider_id.'" class="banner_sliderr" >';
					foreach($slider_xml->childNodes as $slider){
						$title = find_xml_value($slider, 'title');
						$caption = html_entity_decode(find_xml_value($slider, 'caption'));
						$link = find_xml_value($slider, 'link');
						$link_type = find_xml_value($slider, 'linktype');
						$btn_txt = find_xml_value($slider, 'btn_txt');
						if(cp_get_width($size) == '5000'){
							$image_url = wp_get_attachment_image_src(find_xml_value($slider, 'image'),'full');
						}else{
							$image_url = wp_get_attachment_image_src(find_xml_value($slider, 'image'),$size);
						}
						$alt_text = get_post_meta(find_xml_value($slider, 'image') , '_wp_attachment_image_alt', true);
						
							if($link_type == 'No Link'){$anchor_hr = '<h2>'. $title.'</h2>';}else if($link_type == 'Link to URL'){$anchor_hr = '<h2><a href="'.esc_url($link).'">'. $title.'</a></h2>';}else{$anchor_hr = '';}
							//if($link <> ''){$anchor_hr = '<h2><a href="'.esc_url($link).'">'. $title.'</a></h2>';}else{$anchor_hr = '<h2>'. $title.'</h2>';}
							$slider_html = $slider_html  .'<li>';
							$slider_html = $slider_html  .'<img src="'. $image_url[0].'" alt=""/>';
							//Condition for Title and Description if Empty
							if($title <> '' AND $caption <> ''){
								$slider_html = $slider_html  .'<div class="holder"><div class="caption">';
								$slider_html = $slider_html  .$anchor_hr;
								$slider_html = $slider_html  .'<strong class="title">'. esc_html($caption).'</strong>';
								$slider_html = $slider_html  .'<a href="'.$link.'" class="view">View Details</a></div></div>';
							}
							$slider_html = $slider_html  .'</li>';
					}
					
				$slider_html = $slider_html . '</ul>';
				$slider_html = $slider_html . '</div>';
			}
			return $slider_html;
			
		}

	}
	
	function print_bx_post_slider($slider_xml,$size,$slider_id){
		global $post;
		//BX slider
		$slider_html = 'false';
		$slide_order_bx = '';
		$auto_play_bx = '';
		$pause_on_bx = '';
		$animation_speed_bx = '';
		$anchor_hr = '';
		
		$cp_slider_settings = get_option('slider_settings');
		if($cp_slider_settings <> ''){
			$cp_slider = new DOMDocument ();
			$cp_slider->loadXML ( $cp_slider_settings );
			//Bx Slider Values
			$slide_order_bx = find_xml_child_nodes($cp_slider_settings,'bx_slider_settings','slide_order_bx');
			$auto_play_bx = find_xml_child_nodes($cp_slider_settings,'bx_slider_settings','auto_play_bx');
			if($auto_play_bx == 'enable'){$auto_play_bx = 'true';}else{$auto_play_bx = 'false';}
			$pause_on_bx = find_xml_child_nodes($cp_slider_settings,'bx_slider_settings','pause_on_bx');
			if($pause_on_bx == 'enable'){$pause_on_bx = 'true';}else{$pause_on_bx = 'false';}
			$animation_speed_bx = find_xml_child_nodes($cp_slider_settings,'bx_slider_settings','animation_speed_bx');
		}
		
		if($slide_order_bx == 'slide'){}else{$mode_slide = "mode: 'fade',";}
		if($animation_speed_bx == ''){$animation_speed_bx = '2000';}
	
	
		if(!empty($slider_xml)){
		$slider_html = '<section class="border_slider">';
		$slider_html = $slider_html . '<script type="text/javascript">jQuery(document).ready(function($){var blockexist = $(".post-type-bar");$("#'.$slider_id.'").bxSlider({'.$mode_slide.'minSlides: 1,maxSlides: 1,slideMargin: 0,hideControlOnEnd: true,easing: "swing",auto: '.$auto_play_bx.',autoHover:'.$pause_on_bx.',speed:'.$animation_speed_bx.',onSliderLoad:function(){if(blockexist.length){var para_post = "slider-'.$post->ID.'";equalheight_fun(para_post);}}});});</script>';
			$slider_html = $slider_html . '<ul id="'.$slider_id.'" class="banner_sliderr" >';
				foreach($slider_xml->childNodes as $slider){
					$title = find_xml_value($slider, 'title');
					$caption = html_entity_decode(find_xml_value($slider, 'caption'));
					$link = find_xml_value($slider, 'link');
					$link_type = find_xml_value($slider, 'linktype');
					$btn_txt = find_xml_value($slider, 'btn_txt');
					if(cp_get_width($size) == '5000'){
						$image_url = wp_get_attachment_image_src(find_xml_value($slider, 'image'),'full');
					}else{
						$image_url = wp_get_attachment_image_src(find_xml_value($slider, 'image'),$size);
					}
					$alt_text = get_post_meta(find_xml_value($slider, 'image') , '_wp_attachment_image_alt', true);
					
						if($link_type == 'No Link'){$anchor_hr = '<strong class="f-post-title">'. $title.'</strong>';}else if($link_type == 'Link to URL'){$anchor_hr = '<strong class="f-post-title"><a href="'.esc_url($link).'">'. $title.'</a></strong>';}else{$anchor_hr = '';}
						//if($link <> ''){$anchor_hr = '<h2><a href="'.esc_url($link).'">'. $title.'</a></h2>';}else{$anchor_hr = '<h2>'. $title.'</h2>';}
						$slider_html = $slider_html  .'<li>';
						$slider_html = $slider_html  .'<img src="'. $image_url[0].'" alt=""/>';
						//Condition for Title and Description if Empty
						if($title <> '' AND $caption <> ''){
							$slider_html = $slider_html  .'<div class="post-slide-cap"><span class="post-type">'.get_the_date(get_option('date_format')).'<i class="icon-facetime-video"></i></span>';
							$slider_html = $slider_html  .$anchor_hr;
							$slider_html = $slider_html  .'</div>';
						}
						$slider_html = $slider_html  .'</li>';
				}
				
			$slider_html = $slider_html . '</ul>';
			$slider_html = $slider_html . '</section>';
		
		}
	return $slider_html;
	
	}
	
	function print_bx_slider_shortcode($slider_xml,$size,$slider_id){
	global $post;
	//BX slider
	$slider_html = 'false';
	$slide_order_bx = '';
	$auto_play_bx = '';
	$pause_on_bx = '';
	$animation_speed_bx = '';
	
	$cp_slider_settings = get_option('slider_settings');
	if($cp_slider_settings <> ''){
		$cp_slider = new DOMDocument ();
		$cp_slider->loadXML ( $cp_slider_settings );
		//Bx Slider Values
		$slide_order_bx = find_xml_child_nodes($cp_slider_settings,'bx_slider_settings','slide_order_bx');
		$auto_play_bx = find_xml_child_nodes($cp_slider_settings,'bx_slider_settings','auto_play_bx');
		if($auto_play_bx == 'enable'){$auto_play_bx = 'true';}else{$auto_play_bx = 'false';}
		$pause_on_bx = find_xml_child_nodes($cp_slider_settings,'bx_slider_settings','pause_on_bx');
		if($pause_on_bx == 'enable'){$pause_on_bx = 'true';}else{$pause_on_bx = 'false';}
		$animation_speed_bx = find_xml_child_nodes($cp_slider_settings,'bx_slider_settings','animation_speed_bx');
	}
	
	if($slide_order_bx == 'slide'){}else{$mode_slide = "mode: 'fade',";}
	if($animation_speed_bx == ''){$animation_speed_bx = '2000';}
	
	
		if(!empty($slider_xml)){
		$slider_html = '<section class="border_slider">';
		$slider_html = $slider_html . '<script type="text/javascript">jQuery(document).ready(function($){var blockexist = $(".post-type-bar");$("#'.$slider_id.'").bxSlider({'.$mode_slide.'minSlides: 1,maxSlides: 1,slideMargin: 0,hideControlOnEnd: true,easing: "swing",auto: '.$auto_play_bx.',autoHover:'.$pause_on_bx.',speed:'.$animation_speed_bx.',onSliderLoad:function(){if(blockexist.length){var para_post = "slider-'.$post->ID.'";equalheight_fun(para_post);}}});});</script>';
			$slider_html = $slider_html . '<ul id="'.$slider_id.'" class="banner_sliderr" >';
				foreach($slider_xml->childNodes as $slider){
					$title = find_xml_value($slider, 'title');
					$caption = html_entity_decode(find_xml_value($slider, 'caption'));
					$link = find_xml_value($slider, 'link');
					$link_type = find_xml_value($slider, 'linktype');
					$btn_txt = find_xml_value($slider, 'btn_txt');
					if(cp_get_width($size) == '5000'){
						$image_url = wp_get_attachment_image_src(find_xml_value($slider, 'image'),'full');
					}else{
						$image_url = wp_get_attachment_image_src(find_xml_value($slider, 'image'),$size);
					}
					$alt_text = get_post_meta(find_xml_value($slider, 'image') , '_wp_attachment_image_alt', true);
					
						$slider_html = $slider_html  .'<li>';
						$slider_html = $slider_html  .'<img src="'. $image_url[0].'" alt=""/>';
						$slider_html = $slider_html  .'<div class="slider_content">';
						$slider_html = $slider_html  .'<a href="'.esc_url($link).'"><h2">'. $title.' </h2></a>';
						$slider_html = $slider_html  .'<span class="clear"></span>';
						$slider_html = $slider_html  .'<p class="b_green"> '. $caption.'</p>';
						$slider_html = $slider_html  .'</div>';
						$slider_html = $slider_html  .'</li>';
				}
				
			$slider_html = $slider_html . '</ul>';
			$slider_html = $slider_html . '</section>';
		
		}
	return $slider_html;
	
	}