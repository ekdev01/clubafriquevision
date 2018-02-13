<?php

	/*
	*	CrunchPress Blog Item File
	*	---------------------------------------------------------------------
	* 	@version	1.0
	* 	@author		CrunchPress
	* 	@link		http://crunchpress.com
	* 	@copyright	Copyright (c) CrunchPress
	*	---------------------------------------------------------------------
	*	This file contains the function that can print each blog item in 
	*	different conditions.
	*	---------------------------------------------------------------------
	*/
	
	// size is when no sidebar, side2 is use when 1 sidebar, side 3 is use when 3 sidebar
	if( $cp_is_responsive ){
		$blog_div_listing_num_class = array(
			"Full-Image" => array("index"=>"1", "class"=>"sixteen ", "size"=>array(1170,350), "size2"=>array(770, 265), "size3"=>array(570,300)),
			"Small-Thumbnail" => array("index"=>"2", "class"=>"sixteen", "size"=>array(175,155), "size2"=>array(175,155), "size3"=>array(175,155)));
	}	
	
	// Print blog item
	function print_blog_item($item_xml){  ?>
		<div class="blog-content" id="content">
		<?php
		global $paged,$post,$sidebar,$blog_div_listing_num_class,$counter,$post_id;
		
		if(empty($paged)){
			$paged = (get_query_var('page')) ? get_query_var('page') : 1; 
		}
		
		// Post Per Page Default
		$get_default_nop = get_option('posts_per_page');
		
		// get the blog meta value		
		$header = find_xml_value($item_xml, 'header');
		$num_fetch = find_xml_value($item_xml, 'num-fetch');
		$num_excerpt = find_xml_value($item_xml, 'num-excerpt');
		$category = find_xml_value($item_xml, 'category');
		$layout_select = find_xml_value($item_xml, 'layout_select');
		

		
		//Pagination default wordpress
		if(find_xml_value($item_xml, "pagination") == 'Wp-Default'){
			$num_fetch = get_option('posts_per_page');
		}else if(find_xml_value($item_xml, "pagination") == 'Theme-Custom'){
			$num_fetch = find_xml_value($item_xml, 'num-fetch');
		}else{}
		
		
		// print header
		if(!empty($header)){ ?>
				<h2 class="h-style"><?php echo $header;?></h2>
		<?php
		}
		echo '<div class="blog_listing row-fluid">';
		$counter_blog = 0;
		// Get Post From Database
		if($category == '0'){
			//Popular Post 
			query_posts(
				array( 
				'post_type' => 'post',
				'paged'				=> $paged,
				'posts_per_page' => $num_fetch,
				//'ignore_sticky_posts' => true,
				'orderby' => 'date',
				'order' => 'DESC' )
			);
		}else{
			//Popular Post 
			query_posts(
				array( 
				'post_type' => 'post',
				'posts_per_page' => $num_fetch,
				'paged'				=> $paged,
				//'ignore_sticky_posts' => true,
				'tax_query' => array(
					array(
						'taxonomy' => 'category',
						'terms' => $category,
						'field' => 'term_id',
					)
				),
				'orderby' => 'date',
				'order' => 'DESC' )
			);
		}
		while( have_posts() ){
			the_post();
			global $post, $post_id;
			
			// Get Post Meta Elements detail 
			$post_social = '';
			$sidebar = '';
			$right_sidebar = '';
			$left_sidebar = '';
			$thumbnail_types = '';
			
			$post_format = get_post_meta($post->ID, 'post_format', true);
			$post_detail_xml = get_post_meta($post->ID, 'post_detail_xml', true);
			if($post_detail_xml <> ''){
				$cp_post_xml = new DOMDocument ();
				$cp_post_xml->loadXML ( $post_detail_xml );
				$post_social = find_xml_value($cp_post_xml->documentElement,'post_social');
				$sidebar = find_xml_value($cp_post_xml->documentElement,'sidebar_post');
				$right_sidebar = find_xml_value($cp_post_xml->documentElement,'right_sidebar_post');
				$left_sidebar = find_xml_value($cp_post_xml->documentElement,'left_sidebar_post');
				$thumbnail_types = find_xml_value($cp_post_xml->documentElement,'post_thumbnail');
				$video_url_type = find_xml_value($cp_post_xml->documentElement,'video_url_type');
				$select_slider_type = find_xml_value($cp_post_xml->documentElement,'select_slider_type');	
				$audio_url_type = find_xml_value($cp_post_xml->documentElement,'audio_url_type');	
				
			}
			
			// get the item class and size from array
			$item_type = 'Full-Image';
			$item_class = $blog_div_listing_num_class[$item_type]['class'];
			$item_index = $blog_div_listing_num_class[$item_type]['index'];
			if( $sidebar == "no-sidebar" ){
				$item_size = $blog_div_listing_num_class[$item_type]['size'];
			}else if ( $sidebar == "left-sidebar" || $sidebar == "right-sidebar" ){
				$item_size = $blog_div_listing_num_class[$item_type]['size2'];
			}else{
				$item_size = $blog_div_listing_num_class[$item_type]['size3'];
				$item_class = 'both_sidebar_class';
			} 
			
			
			if($thumbnail_types == 'Image'){
				$mask_html = '';
				$no_image_class = 'no-image';
				$image_size = array(1170,350);
			}else if($thumbnail_types == 'Slider'){
				$mask_html = '';
				$no_image_class = '';
				$image_size = array(1170,350);
			}else if($thumbnail_types == 'Video'){
				$mask_html = '';
				$no_image_class = '';
				$image_size = array(1170,350);
			}else{
				$mask_html = '';
				$no_image_class = 'no-image';
				$image_size = array(1170,350);
			}
			$thumbnail_id = get_post_thumbnail_id( $post->ID );
			$image_thumb = wp_get_attachment_image_src($thumbnail_id, array(1170,350));
			if($image_thumb[1] == '1600'){
				$mask_html = '<div class="mask">
					<a href="'.get_permalink().'#comments" class="anchor"><span> </span> <i class="fa fa-comment"></i></a>
					<a href="'.get_permalink().'" class="anchor"> <i class="fa fa-link"></i></a>
				</div>';
				$no_image_class = 'image-exists';
			}	
			if($counter_blog % 2 == 0 ){
				if($layout_select == 'Half Width'){$item_class = 'span6 first';}else{$item_class = 'post-box';}
				$item_div_clear = '<div class="clear clearfix"></div>';
				
			}else{
				if($layout_select == 'Half Width'){$item_class = 'span6';}else{$item_class = 'post-box';}
				$item_div_clear = '';
			}$counter_blog++;
			echo $item_div_clear;
			$counter_track = $counter.$post->ID;
			if($layout_select == 'Half Width'){ ?>
			<div <?php post_class($item_class); ?>>
				<?php if(get_the_post_thumbnail($post->ID,array(262,340)) <> ''){$item_class = '';}else{$item_class = 'no-image-cp';}?>
				<div class="blog-post-box <?php echo $item_class?>">
					<div class="frame-area">
						<div class="frame">
							<?php
							if(get_the_post_thumbnail($post->ID,array(262,340)) <> ''){
								echo get_the_post_thumbnail($post->ID,array(262,340));?>
								<div class="caption">
									<strong class="type"><i class="fa fa-picture-o"></i></strong>
									<strong class="date"><?php echo get_the_date('d');?><span class="mnt"><?php echo get_the_date('M');?></span></strong>
									<strong class="comment"><?php
									//Get Post Comment 
									comments_popup_link( __('<i class="fa fa-comments-o"></i>	 0','crunchpress'),
									__('<i class="fa fa-comments-o"></i>	 1 ','crunchpress'),
									__('<i class="fa fa-comments-o"></i>	 %','crunchpress'), '',
									__('<i class="fa fa-comments-o"></i>	 0','crunchpress') );
										?></strong>
								</div>
							<?php }?>
						</div>
					</div>
					<div class="text">
						<strong class="title"><?php the_tags('<i class="fa fa-tags"></i>','','');?></strong>
						<h4><a href="<?php echo get_permalink();?>"><?php echo substr(get_the_title(),0,20).'...';?></a></h4>
						<p>
						<?php 
							//Excerpt Function for Listing
							echo strip_tags(substr(get_the_content(),0,$num_excerpt));
						?>
						</p>
						<?php if(strlen(get_the_excerpt() > $num_excerpt)){?> <a href="<?php echo get_permalink();?>" class="readmore"><?php echo __('Read More','crunchpress') ?></a><?php }?>
						<div class="blog-post-share">
							<strong class="title1"><?php _e('Share:','crunchpress');?></strong>
							<div class="social-icon-no-text">
								<?php include_social_shares();?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php }else{ ?>
			<!--BLOG LIST ITEM START-->
			<div <?php post_class($item_class); ?>>
				<div class="blog-box-1">
					<?php if(print_blog_thumbnail($post->ID,array(1170,350)) <> ''){ ?><div class="frame"><?php echo print_blog_thumbnail($post->ID,array(1170,350));?></div><?php }?>
					<div class="bottom-row">
						<div class="left"> 
							<a href="<?php echo get_permalink();?>" class="title"><i class="fa fa-calendar"></i><?php echo get_the_date(get_option('date_format'));?></a>
							<?php
									//Get Post Comment 
									comments_popup_link( __('<i class="fa fa-comments-o"></i>	 0 Comment','crunchpress'),
									__('<i class="fa fa-comments-o"></i>	 1 Comment','crunchpress'),
									__('<i class="fa fa-comments-o"></i>	 % Comments','crunchpress'), '',
									__('<i class="fa fa-comments-o"></i>	 Comments are off','crunchpress') );
							?>
							<a href="<?php echo get_permalink();?>" class="title"><i class="fa fa-user"></i><?php echo get_the_author();?></a>
							<ul>
								<li class="post_tags"> <?php the_tags('<i class="fa fa-tags"></i>',' ',' ');?></li>
							</ul>
						</div>
					  <div class="right"> <strong class="title"><?php _e('Share:','crunchpress');?></strong>
						<?php include_social_shares();?>
					  </div>
					</div>
					<div class="text">
						<h2><a href="<?php echo get_permalink();?>"><?php echo get_the_title();?></a></h2>
						<p>
						<?php 
						//Excerpt Function for Listing
						// if(strlen(get_the_excerpt()) < $num_excerpt){
							// echo strip_tags(get_the_excerpt());
						// }else{
							// echo strip_tags(mb_substr(get_the_content(),0,$num_excerpt));
						// }
						echo strip_tags(mb_substr(get_the_content(),0,$num_excerpt));
						?>
						</p>
							<?php if(strlen(get_the_excerpt() > $num_excerpt)){?> <a href="<?php echo get_permalink();?>" class="readmore"><?php echo __('Read More','crunchpress') ?></a><?php }?>
						
					</div>
				</div>
			</div>	
			<!--BLOG LIST ITEM END-->
		<?php
			}
		}//end while
		echo '</div>';
			echo '<div class="cp_load fadeIn">';
			if( find_xml_value($item_xml, "pagination") == "Theme-Custom" ){	
				pagination();
			}
			echo '</div>';
		wp_reset_query(); 
		wp_reset_postdata(); 
		
	echo '</div>';
		
		
	}	
	
	
	// Print blog item
	function print_blog_modern_item($item_xml){
		global $paged,$post,$sidebar,$blog_div_listing_num_class,$counter,$post_id;
		
		if(empty($paged)){
			$paged = (get_query_var('page')) ? get_query_var('page') : 1; 
		}
		
		// Post Per Page Default
		$get_default_nop = get_option('posts_per_page');
		
		// get the blog meta value		
		$header = find_xml_value($item_xml, 'header');
		$num_fetch = find_xml_value($item_xml, 'num-fetch');
		$select_feature = find_xml_value($item_xml, 'select_feature');
		$category = find_xml_value($item_xml, 'category');
		
		//Pagination default wordpress
		if(find_xml_value($item_xml, "pagination") == 'Wp-Default'){
			$num_fetch = get_option('posts_per_page');
		}else if(find_xml_value($item_xml, "pagination") == 'Theme-Custom'){
			$num_fetch = find_xml_value($item_xml, 'num-fetch');
		}else{}
		
		
		// print header
		if(!empty($header)){ ?>
		<figure class="page_titlen feature_story">
			<div class="span12 first">
				<h2><?php echo $header;?></h2>
			</div>
		</figure>
		<?php
		}
		

		//If feature Post selected
		if($select_feature <> '786512'){ 
			$thumbnail_types = '';
			$post_detail_xml = get_post_meta($select_feature, 'post_detail_xml', true);
			if($post_detail_xml <> ''){
				$cp_post_xml = new DOMDocument ();
				$cp_post_xml->loadXML ( $post_detail_xml );
				$thumbnail_types = find_xml_value($cp_post_xml->documentElement,'post_thumbnail');
				$video_url_type = find_xml_value($cp_post_xml->documentElement,'video_url_type');
				$select_slider_type = find_xml_value($cp_post_xml->documentElement,'select_slider_type');				
			}
			if($thumbnail_types == 'Image'){ ?>
				<ul class="featured-story">
					<li class="span12 featured-slider">
						<?php echo get_the_post_thumbnail($select_feature, array(1170,350));?>
						<div class="post-slide-cap">
							<span class="post-type"><?php get_the_date(get_option('date_format'));?><i class="fa fa-camera"></i></span>
							<strong class="f-post-title"><a href="<?php echo get_permalink($select_feature);?>"><mark><?php echo get_the_title($select_feature)?></mark></a></strong>
						</div>
					</li>
				</ul>
			<?php
			}else{ ?>
				<ul class="featured-story">
					<li class="span12 featured-slider">
						<?php echo print_blog_modern_thumbnail($select_feature,array(1170,350));?>
						<div class="post-slide-cap">
							<span class="post-type"><?php get_the_date(get_option('date_format'));?><i class="fa fa-camera"></i></span>
							<strong class="f-post-title"><a href="<?php echo get_permalink($select_feature);?>"><mark><?php echo get_the_title($select_feature)?></mark></a></strong>
						</div>
					</li>
				</ul>
			<?php
			}
			
			//Arguments for loop
			query_posts(array(
				'posts_per_page'			=> $num_fetch,
				'paged'						=> $paged,
				'category_name'				=> $category,
				'post_type'					=> 'post',
				'post_status'				=> 'publish',
				'order'						=> 'DESC',
				'post__not_in' => array($select_feature)
			));
		}else{
			query_posts(array(
				'posts_per_page'			=> $num_fetch,
				'paged'						=> $paged,
				'category_name'				=> $category,
				'post_type'					=> 'post',
				'post_status'				=> 'publish',
				'order'						=> 'DESC',
			));
		}
		echo '<ul class="featured-story">';
		$counter_post = 0;
		while( have_posts() ){
			the_post();
			global $post, $post_id;
			
			//Get post parameters
			$thumbnail_types = '';
			$post_detail_xml = get_post_meta($post->ID, 'post_detail_xml', true);
			if($post_detail_xml <> ''){
				$cp_post_xml = new DOMDocument ();
				$cp_post_xml->loadXML ( $post_detail_xml );
				$thumbnail_types = find_xml_value($cp_post_xml->documentElement,'post_thumbnail');
				$video_url_type = find_xml_value($cp_post_xml->documentElement,'video_url_type');
				$select_slider_type = find_xml_value($cp_post_xml->documentElement,'select_slider_type');				
			}
			// get the item class and size from array
			$item_type = 'Full-Image';
			$item_class = $blog_div_listing_num_class[$item_type]['class'];
			$item_index = $blog_div_listing_num_class[$item_type]['index'];
			if( $sidebar == "no-sidebar" ){
				$item_size = array(150,150);
			}else if ( $sidebar == "left-sidebar" || $sidebar == "right-sidebar" ){
				$item_size = array(150,150);
			}else{
				$item_size = array(150,150);
				$item_class = 'both_sidebar_class';
			} 
			//Slider Settings
			if($select_slider_type <> 'Slider'){
				//Every Third
				if($counter_post % 3 == 0 ){ ?>	 
					<li class="span4 first"> 
						<?php echo print_blog_modern_thumbnail($post->ID, $item_size);?>
						<div class="post-slide-cap modern-dec">
							<span class="post-type"><?php get_the_date(get_option('date_format'));?><i class="fa fa-camera"></i></span>
							<strong class="f-post-title"><a href="<?php echo get_permalink();?>"><mark><?php echo get_the_title()?></mark></a></strong>
						</div>
					</li>
				<?php }else{ ?>
					<li class="span4"> 
						<?php echo print_blog_modern_thumbnail($post->ID, $item_size);?>
						<div class="post-slide-cap modern-dec">
							<span class="post-type"><?php get_the_date(get_option('date_format'));?><i class="fa fa-camera"></i></span>
							<strong class="f-post-title"><a href="<?php echo get_permalink();?>"><mark><?php echo get_the_title()?></mark></a></strong>
						</div>
					</li>
				<?php } $counter_post++;
			}
			
		}//end while
		echo '</ul>';	
		wp_reset_query(); 
		wp_reset_postdata(); 		
	}	
	
	
	function print_blog_thumbnail( $postid, $item_size ){
		global $counter;
		
		//Get Post Meta Options
		$img_html = '';
		$thumbnail_types = '';
		$video_url_type = '';
		$select_slider_type = '';
		$post_detail_xml = get_post_meta($postid, 'post_detail_xml', true);
		if($post_detail_xml <> ''){
			$cp_post_xml = new DOMDocument ();
			$cp_post_xml->loadXML ( $post_detail_xml );
			$thumbnail_types = find_xml_value($cp_post_xml->documentElement,'post_thumbnail');
			$audio_url_type = find_xml_value($cp_post_xml->documentElement,'audio_url_type');
			$video_url_type = find_xml_value($cp_post_xml->documentElement,'video_url_type');
			$select_slider_type = find_xml_value($cp_post_xml->documentElement,'select_slider_type');			
			//Print Image
			
			if( $thumbnail_types == "Image"){
				if(get_the_post_thumbnail($postid, $item_size) <> ''){
					$img_html = '<div class="post_featured_image thumbnail_image">';
					$img_html = $img_html . get_the_post_thumbnail($postid, $item_size);
					$img_html = $img_html . '</div>';
				}
				//echo '<div class="mask"><a href="'.get_permalink().'"#comments" class="anchor"><span> </span> <i class="fa fa-comment"></i></a><a href="'. get_permalink().'" class="anchor"> <i class="fa fa-link"></i></a></div>';
			}else if( $thumbnail_types == "Video" ){
				//Print Video
				if($video_url_type <> ''){
					$img_html = '<div class="post_featured_image thumbnail_image">';
					$img_html = $img_html . '<div class="blog-thumbnail-video">';
					//echo cp_get_width($item_size);
					if(cp_get_width($item_size) == '175'){
						$img_html = $img_html . get_video($video_url_type, cp_get_width($item_size), cp_get_height($item_size));
					}else{
						$img_html = $img_html . get_video($video_url_type, '100%', cp_get_height($item_size));
					}
					$img_html = $img_html . '</div></div>';
				}
			}else if ( $thumbnail_types == "Slider" ){
				//Print Slider
				$slider_xml = get_post_meta( intval($select_slider_type), 'cp-slider-xml', true); 				
				if($slider_xml <> ''){
					$slider_xml_dom = new DOMDocument();
					$slider_xml_dom->loadXML($slider_xml);
					$slider_name='bxslider'.$counter.$postid;
					$audio_counter = $counter.$postid;
					//Included Anything Slider Script/Style
					wp_register_script('cp-bx-slider', CP_PATH_URL.'/frontend/js/bxslider.min.js', false, '1.0', true);
					wp_enqueue_script('cp-bx-slider');	
					wp_enqueue_style('cp-bx-slider',CP_PATH_URL.'/frontend/css/bxslider.css');
					//Inline Style for Slider Width
					if(cp_get_width($item_size) == '175'){
						$img_html = "<style>#'". $slider_name."'{width:'".cp_get_width($item_size)."'px;height:'".cp_get_height($item_size)."'px;float:left;}</style>";
					}else{
						$img_html = "<style>#'". $slider_name."'{width:100%;height:350px;float:left;}</style>";
					}
					$img_html = '<div class="post_featured_image thumbnail_image">';
					$img_html = $img_html . print_bx_slider($slider_xml_dom->documentElement, $item_size,$slider_name);
					$img_html = $img_html . '</div>';
				}
			}else if($thumbnail_types == "Audio"){ 
				if($audio_url_type <> '' ){
				$audio_counter = $counter.$postid;
					//Jplayer Music Started	
					$img_html =  '<div class="audio_player song-list">';
					$audio_html = '';
					if(strpos($audio_url_type,'soundcloud')){
						$img_html = $img_html . get_audio_track($audio_url_type,$audio_counter);
					}else{
						$img_html = $img_html . get_audio_track($audio_url_type,$audio_counter) . get_the_post_thumbnail($postid, $item_size);
					}
					$img_html = $img_html . '</div>';
				} // No MP3 Song
			}else{				
				if(get_the_post_thumbnail($postid, $item_size) <> ''){
					$img_html = '<div class="post_featured_image thumbnail_image">';
					$img_html = $img_html . get_the_post_thumbnail($postid, $item_size);
					$img_html = $img_html . '</div>';
				}
			}
		}
		return $img_html;
	}
	
	
	// print the blog thumbnail
	function print_blog_modern_thumbnail( $post_id, $item_size ){
		global $counter;
		//Get Post Meta Options
		$img_html = '';
		$thumbnail_types = '';
		$video_url_type = '';
		$select_slider_type = '';
		$post_detail_xml = get_post_meta($post_id, 'post_detail_xml', true);
		if($post_detail_xml <> ''){
			$cp_post_xml = new DOMDocument ();
			$cp_post_xml->loadXML ( $post_detail_xml );
			$thumbnail_types = find_xml_value($cp_post_xml->documentElement,'post_thumbnail');
			$video_url_type = find_xml_value($cp_post_xml->documentElement,'video_url_type');
			$select_slider_type = find_xml_value($cp_post_xml->documentElement,'select_slider_type');			
			//Print Image
			if( $thumbnail_types == "Image" || empty($thumbnail_types) ){
				if(get_the_post_thumbnail($post_id, $item_size) <> ''){
					$img_html = '<div class="post_featured_image thumbnail_image">';
					$img_html = $img_html . get_the_post_thumbnail($post_id, $item_size);
					$img_html = $img_html . '</div>';
				}
				//echo '<div class="mask"><a href="'.get_permalink().'"#comments" class="anchor"><span> </span> <i class="fa fa-comment"></i></a><a href="'. get_permalink().'" class="anchor"> <i class="fa fa-link"></i></a></div>';
			}else if( $thumbnail_types == "Video" ){
				//Print Video
				if($video_url_type <> ''){
					$img_html = '<div class="post_featured_image thumbnail_image">';
					$img_html = $img_html . '<div class="blog-thumbnail-video">';
					//echo cp_get_width($item_size);
					if(cp_get_width($item_size) == '175'){
						$img_html = $img_html . get_video($video_url_type, cp_get_width($item_size), cp_get_height($item_size));
					}else{
						$img_html = $img_html . get_video($video_url_type, '100%', cp_get_height($item_size));
					}
					$img_html = $img_html . '</div></div>';
				}
			}else if ( $thumbnail_types == "Slider" ){
				//Print Slider
				$slider_xml = get_post_meta( intval($select_slider_type), 'cp-slider-xml', true); 				
				if($slider_xml <> ''){
					$slider_xml_dom = new DOMDocument();
					$slider_xml_dom->loadXML($slider_xml);
					$slider_name='bxslider'.$counter.$post_id;				
					//Included Anything Slider Script/Style
					wp_register_script('cp-bx-slider', CP_PATH_URL.'/frontend/js/bxslider.min.js', false, '1.0', true);
					wp_enqueue_script('cp-bx-slider');	
					wp_enqueue_style('cp-bx-slider',CP_PATH_URL.'/frontend/css/bxslider.css');
					if(cp_get_width($item_size) == '175'){
						$img_html = "<style>#'". $slider_name."'{width:'".cp_get_width($item_size)."'px;height:'".cp_get_height($item_size)."'px;float:left;}</style>";
					}else{
						$img_html = "<style>#'". $slider_name."'{width:100%;height:350px;float:left;}</style>";
					}
					$img_html = '<div class="post_featured_image thumbnail_image">';
					$img_html = $img_html . print_bx_post_slider($slider_xml_dom->documentElement, $item_size,$slider_name);
					$img_html = $img_html . '</div>';
				}
			}else if($thumbnail_types == "Audio"){ 
				if(get_the_post_thumbnail($post_id, $item_size) <> ''){
					$img_html = '<div class="post_featured_image thumbnail_image">';
					$img_html = $img_html . get_audio_track($audio);;
					$img_html = $img_html . '</div>';
				}
			}
		}
		return $img_html;
	}
	
	 
	//Print News on Frontpage
	function print_news_item($item_xml){

		echo '<div id="content">';
		global $paged,$post,$sidebar,$blog_div_listing_num_class,$post_id;
		
		if(empty($paged)){
			$paged = (get_query_var('page')) ? get_query_var('page') : 1; 
		}
		
		//Get Thumbnail Options
		$thumbnail_types = '';
		$post_detail_xml = get_post_meta($post_id, 'post_detail_xml', true);
		if($post_detail_xml <> ''){
			$cp_post_xml = new DOMDocument ();
			$cp_post_xml->loadXML ( $post_detail_xml );
			$thumbnail_types = find_xml_value($cp_post_xml->documentElement,'post_thumbnail');
		}
				
		// get the blog meta value		
		$header = find_xml_value($item_xml, 'header');
		$num_fetch = find_xml_value($item_xml, 'num-fetch');
		$num_excerpt = find_xml_value($item_xml, 'num-excerpt');
		$news_layout = find_xml_value($item_xml, 'news-layout');
		$news_style = find_xml_value($item_xml, 'news_style');
		$category = find_xml_value($item_xml, 'category');
		
		// print header
		if($news_style == 'Government Style'){ 
		
		echo '<div class="cp_news-box">
              <div class="heading-style-1">
                <h2>'.$header.'</h2>
              </div>';
		
		}else{
			
			echo '<div class="news-page">
              <ul class="gallery">';
			
		}
		
		//Pagination default wordpress
		if(find_xml_value($item_xml, "pagination") == 'Wp-Default'){
			$num_fetch = get_option('posts_per_page');
		}else if(find_xml_value($item_xml, "pagination") == 'Theme-Custom'){
			$num_fetch = find_xml_value($item_xml, 'num-fetch');
		}else{}
		
		if($category == '0'){
			//Popular Post 
			query_posts(
				array( 
				'post_type' => 'post',
				'paged'				=> $paged,
				'posts_per_page' => $num_fetch,
				//'ignore_sticky_posts' => true,
				'orderby' => 'date',
				'order' => 'DESC' )
			);
		}else{
			//Popular Post 
			query_posts(
				array( 
				'post_type' => 'post',
				'posts_per_page' => $num_fetch,
				'paged'				=> $paged,
				//'ignore_sticky_posts' => true,
				'tax_query' => array(
					array(
						'taxonomy' => 'category',
						'terms' => $category,
						'field' => 'term_id',
					)
				),
				'orderby' => 'date',
				'order' => 'DESC' )
			);
		}
		
  
		$counter_news = 0;
		while( have_posts() ){
			the_post();
			$counter_news++;
			global $post, $post_id;
		//Print All post from News
		
			  // get the item class and size from array
			$item_type = 'Full-Image';
			$item_class = $blog_div_listing_num_class[$item_type]['class'];
			$item_index = $blog_div_listing_num_class[$item_type]['index'];
			if( $sidebar == "no-sidebar" ){
				$item_size = $blog_div_listing_num_class[$item_type]['size'];
			}else if ( $sidebar == "left-sidebar" || $sidebar == "right-sidebar" ){
				$item_size = $blog_div_listing_num_class[$item_type]['size2'];
			}else{
				$item_size = $blog_div_listing_num_class[$item_type]['size3'];
				$item_class = 'both_sidebar_class';
			} 
			$thumbnail_id = get_post_thumbnail_id( $post->ID );
			$image_thumb = wp_get_attachment_image_src($thumbnail_id, array(1170,350));

			if($news_style == 'Government Style'){ ?>
			
			  <?php if(print_blog_thumbnail( $post->ID, array(1170,450) ) <> ''){ ?>
              <div class="thumb"><a href="<?php echo get_permalink();?>"><?php echo print_blog_thumbnail( $post->ID, array(1170,450) );?></a></div>
			  <?php } ?>
              <div class="text-box">
                <h4><a href="<?php echo get_permalink();?>"><?php echo get_the_title();?></a></h4>
                <div class="bottom-row">
                  <div class="left"> 
					<a class="title" href="<?php echo get_permalink();?>"><?php _e('Posted: ','crunchpress');?><?php echo get_the_date(get_option("date_format"));?> <span>//</span> </a> 
					<a class="title" href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) )); ?>"><?php _e('Author: ','crunchpress');?> <?php echo esc_attr(get_the_author());?> <span>//</span></a> 
					<?php comments_popup_link( __('<i class="fa fa-comments-o"></i> 0 Comment','crunchpress'),__('<i class="fa fa-comments-o"></i> 1 Comment','crunchpress'),__('<i class="fa fa-comments-o"></i> % Comments','crunchpress'), '',__('<i class="fa fa-comments-o"></i> Comments are off','crunchpress') );?>
				  </div>
                </div>
                <p><?php echo strip_tags(substr(get_the_excerpt(),0, $num_excerpt));?></p>
              </div>
            
		<?php }else{ 
			$item_class = '';
				if(print_blog_thumbnail( $post->ID, array(360,300) ) <> ''){ $item_class = '';}else{$item_class = 'no-image-found';}?>
					<li class="<?php echo $item_class;?>">
						<div class="news-box">
							<?php if(print_blog_thumbnail( $post->ID, array(360,300) ) <> ''){ ?>
								<div class="frame">
									<div class="caption">
										<a href="<?php echo $image_thumb[0]?>" class="zoom" data-rel="prettyPhoto[gallery1]"><i class="fa fa-plus"></i></a>
									</div>
									<?php echo print_blog_thumbnail( $post->ID, array(360,300) );?>
								</div>
							<?php }?>
							<div class="text">
								<div class="text-top-row">
									<a href="<?php echo get_permalink();?>" class="mnt"><i class="fa fa-calendar"></i><?php echo get_the_date(get_option("date_format"));?></a>
									<?php comments_popup_link( __('<i class="fa fa-comments-o"></i> 0 Comment','crunchpress'),__('<i class="fa fa-comments-o"></i> 1 Comment','crunchpress'),__('<i class="fa fa-comments-o"></i> % Comments','crunchpress'), '',__('<i class="fa fa-comments-o"></i> Comments are off','crunchpress') );?>
								</div>
								<h2><a href="<?php echo get_permalink();?>"><?php echo get_the_title();?></a></h2>
								<p><?php echo strip_tags(substr(get_the_excerpt(),0, $num_excerpt));?></p>
								<?php if(strlen(get_the_excerpt() > $num_excerpt)){?> <a href="<?php echo get_permalink();?>" class="readmore"><?php echo __('Read More','crunchpress') ?></a><?php }?>
							</div>
						</div>
					</li>
			<?php } //end else
			
		}//end while
		if($news_style == 'Government Style'){
				echo '</div>';
		}else{
		echo '</ul>
            </div>';
		}
			
			
			if( find_xml_value($item_xml, "pagination") == "Theme-Custom" ){	
				pagination();
			}
		echo '</div>';
		echo '<span id="loader"></span>';
		
	
	}	
	
	
	//Latest Show For DJ
	function print_latest_show_item($item_xml){
		global $post,$counter;
		
		//Fetch elements data from database
		$header = find_xml_value($item_xml, 'header');
		$category = find_xml_value($item_xml, 'category');
		$num_excerpt = find_xml_value($item_xml, 'num-excerpt');
		
		//Condition for Header
		if($header <> ''){ echo '<h2 class="h-style">'.$header.'</h2>';} ?>
		<?php
		//Bx Slider Script Calling
		wp_register_script('cp-bx-slider', CP_PATH_URL.'/frontend/js/bxslider.min.js', false, '1.0', true);
		wp_enqueue_script('cp-bx-slider');	
		wp_enqueue_style('cp-bx-slider',CP_PATH_URL.'/frontend/css/bxslider.css');?>
		<script type="text/javascript">
		jQuery(document).ready(function ($) {
			"use strict";
			if ($('#news-<?php echo $counter?>').length) {
				$('#news-<?php echo $counter?>').bxSlider({
					minSlides: 1,
					maxSlides: 1,
					auto:true,
					mode:'fade',
					pagerCustom: '#bx-pager'
				});
			}
		});
		</script>
			<div class="timelines-box">
			<?php
					if($category == '0'){
					//Popular Post 
						query_posts(
							array( 
							'post_type' => 'post',
							'posts_per_page' => 3,
							//'ignore_sticky_posts' => true,
							'orderby' => 'title',
							'order' => 'ASC' )
						);
					
					}else{
						//Popular Post 
						query_posts(
							array( 
							'post_type' => 'post',
							'posts_per_page' => 3,
							//'ignore_sticky_posts' => true,
							'tax_query' => array(
								array(
									'taxonomy' => 'category',
									'terms' => $category,
									'field' => 'term_id',
								)
							),
							'orderby' => 'title',
							'order' => 'ASC' )
						);
					}
			?>
				<ul class="text-parent-cp" id="bx-pager">
				<?php 
					$counter_news = 0;
					while ( have_posts() ) { 
						the_post();
						global $post,$post_id;?>
							<li><a data-slide-index="<?php echo $counter_news;?>"><?php echo get_the_title();?></a></li>
					<?php 
						$counter_news++;
					}
						
					?>
				</ul>
				<ul id="news-<?php echo $counter?>" class="timelines-slider post-list">
					<?php
					while ( have_posts() ) { 
						the_post();
						global $post,$post_id;
						//Post Extra Information
						$thumbnail_types = '';
						$post_detail_xml = get_post_meta($post->ID, 'post_detail_xml', true);
						if($post_detail_xml <> ''){
							$cp_post_xml = new DOMDocument ();
							$cp_post_xml->loadXML ( $post_detail_xml );
							$thumbnail_types = find_xml_value($cp_post_xml->documentElement,'post_thumbnail');
							$video_url_type = find_xml_value($cp_post_xml->documentElement,'video_url_type');
							$select_slider_type = find_xml_value($cp_post_xml->documentElement,'select_slider_type');				
						}
						$width_class_first = '';
						$thumbnail_id = get_post_thumbnail_id( $post->ID );
						$thumbnail = wp_get_attachment_image_src( $thumbnail_id , array(1600,900) );?>
						<li>
							<?php if($thumbnail[1].'x'.$thumbnail[2] == '1600x900'){ ?><figure><a href="<?php echo get_permalink();?>"><?php echo get_the_post_thumbnail($post->ID, array(1600,900));?></a></figure>
							<div class="caption">
								<p><?php echo strip_tags(mb_substr(get_the_content(),0,$num_excerpt));?></p>
							</div>
							<?php }?>
						</li>
					<?php }
						wp_reset_query();
						wp_reset_postdata();
					?>	
				</ul>
				
			</div>
		<?php
	}
	
	
              
	
	//Latest News For Site
	function print_featured_item($item_xml){
		global $post,$counter;
		
		//Fetch elements data from database
		$header = find_xml_value($item_xml, 'header');
		$category = find_xml_value($item_xml, 'category');
		$number_posts = find_xml_value($item_xml, 'number-of-posts');
		?>
		<div class="latest_posts acc-style">
		
		<?php 
		//Condition for Header
		if($header <> ''){ echo '<h3>'.$header.'</h3>';} ?>
		
			<div class="css3accordion">
				<ul id="feature-<?php echo $counter?>" class="css3accordion-cp">
					<?php
					if($category == '0'){
					//Popular Post 
						query_posts(
							array( 
							'post_type' => 'post',
							'posts_per_page' => 3,
							//'ignore_sticky_posts' => true,
							'orderby' => 'date',
							'order' => 'DESC' )
						);
					
					}else{
						//Popular Post 
						query_posts(
							array( 
							'post_type' => 'post',
							'posts_per_page' => 3,
							//'ignore_sticky_posts' => true,
							'tax_query' => array(
								array(
									'taxonomy' => 'category',
									'terms' => $category,
									'field' => 'term_id',
								)
							),
							'orderby' => 'date',
							'order' => 'DESC' )
						);
					}
					while ( have_posts() ) { 
						the_post();
						global $post,$post_id;
						//Post Extra Information
						$thumbnail_types = '';
						$post_detail_xml = get_post_meta($post->ID, 'post_detail_xml', true);
						if($post_detail_xml <> ''){
							$cp_post_xml = new DOMDocument ();
							$cp_post_xml->loadXML ( $post_detail_xml );
							$thumbnail_types = find_xml_value($cp_post_xml->documentElement,'post_thumbnail');
							$video_url_type = find_xml_value($cp_post_xml->documentElement,'video_url_type');
							$select_slider_type = find_xml_value($cp_post_xml->documentElement,'select_slider_type');				
						}
						$width_class_first = '';
						$thumbnail_id = get_post_thumbnail_id( $post->ID );
						$thumbnail = wp_get_attachment_image_src( $thumbnail_id , array(570,300) );?>
						<li>
							<div class="inner-acc">
								<a href="<?php echo get_permalink();?>" class="thumb hoverBorder"><?php echo get_the_post_thumbnail($post->ID, array(570,300));?></a>
								<div class="content">
									 <div class="top">
										<strong class="mnt"><i class="fa fa-calendar"></i><?php echo get_the_date();?></strong>
										<?php comments_popup_link( __('<i class="fa fa-comments-o"></i> 0 Comment','crunchpress'),__('<i class="fa fa-comments-o"></i> 1 Comment','crunchpress'),__('<i class="fa fa-comments-o"></i> % Comments','crunchpress'), '',__('<i class="fa fa-comments-o"></i> Comments are off','crunchpress') );?>
									</div>
									<strong class="title"><?php echo mb_substr(get_the_title(),0,26);?></strong>
									<p><?php echo strip_tags(mb_substr(get_the_content(),0,65));?></p>
									<a href="<?php echo get_permalink();?>" class="readmore"><?php _e('Read More','crunchpress');?></a></div>
							</div>
						</li>
					<?php } ?>	
				</ul>
			</div>
		</div>	
		<?php
	}
	
	function print_blog_slider_item($item_xml){
		
		global $sidebar,$post,$wp_query,$counter;
		
		//Fetch elements meta data from database
		$header = find_xml_value($item_xml, 'header');
		$category = find_xml_value($item_xml, 'category');
		$num_fetch = find_xml_value($item_xml, 'num-fetch');

		if(empty($paged)){
			$paged = (get_query_var('page')) ? get_query_var('page') : 1; 
		}

		if($category == '0'){
			query_posts(array(
				'posts_per_page'=> $num_fetch,
				'paged'			=> $paged,
				'post_type'   	=> 'post',
				'post_status'	=> 'publish',
				'order'			=> 'DESC',
			));
		}else{
			query_posts(array(
				'posts_per_page'=> $num_fetch,
				'paged'	=> $paged,
				'post_type'   => 'post',
				'tax_query' => array(
						array(
							'taxonomy' => 'category',
							'field' => 'term_id',
							'terms' => $category
						)
				),
				'post_status'   => 'publish',
				'order'			=> 'DESC',
			));
		}
		
		$counter_blog	= 0; ?>
		
		<?php //Bx Slider Script Calling
				// wp_register_script('cp-bx-slider', CP_PATH_URL.'/frontend/js/bxslider.min.js', false, '1.0', true);
				// wp_enqueue_script('cp-bx-slider');	
				// wp_register_script('jquery.bxslider', CP_PATH_URL.'/frontend/js/jquery.bxslider.js', false, '1.0', true);
				// wp_enqueue_script('jquery.bxslider');	
				// wp_enqueue_style('cp-bx-slider',CP_PATH_URL.'/frontend/css/bxslider.css');
			?>
			<script type="text/javascript">
				jQuery(document).ready(function ($) {
						"use strict";
						if ($('.blog-slider-<?php echo $counter?>').length) {
							$('.blog-slider-<?php echo $counter?>').bxSlider({
								auto: true,
								minSlides: 2,
								maxSlides: 2,
								slideWidth: 470,
								pause: 7000,
								speed: 1500,
								slideMargin: 30
							});
						}
					});
			</script>
		
				<section class="cp_blog-section">
				  <div class="container">
						<div class="heading-style-1">
						<?php 
						if($header <> ''){
						  echo '<h2>'.$header.'</h2>';
						}?>
						</div>
						<div class="holder">
							<ul class="blog-slider-<?php echo $counter?>">
							<?php 
								while( have_posts() ){
								global $post;
								the_post(); ?>
								<li>
								  <div class="box">
									<div class="thumb"><?php echo get_the_post_thumbnail($post->ID, array(570,300));?></div>
									<div class="text-box">
									  <h4><a href="<?php echo get_permalink();?>"><?php echo get_the_title();?></a></h4>
									  <ul>
										<li><?php _e('Posted On: ','crunchpress'); ?><a href="<?php echo get_permalink();?>"><?php echo get_the_date();?><span>//</span></a></li>
										<li><?php _e('Author: ','crunchpress'); ?><a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) )); ?>"> <?php echo esc_attr(get_the_author());?> <span>//</span></a></li>
										<li><?php comments_popup_link( __('<i class="fa fa-comments-o"></i> 0 Comment','crunchpress'),__('<i class="fa fa-comments-o"></i> 1 Comment','crunchpress'),__('<i class="fa fa-comments-o"></i> % Comments','crunchpress'), '',__('<i class="fa fa-comments-o"></i> Comments are off','crunchpress') );?></li>
									  </ul>
									  <p><?php echo substr(get_the_content(),0,165);?></p>
									  <a href="<?php echo get_permalink();?>" class="read-more"><?php _e('Read More','crunchpress');?></a> </div>
								  </div>
								</li>
								<?php } // End While
									wp_reset_query();
									wp_reset_postdata();
								?>
							</ul>
						</div>
					</div>
				</section>
			<?php
			if( find_xml_value($item_xml, "pagination") == "Yes"){	
				pagination();
			}	
	 }	
	
