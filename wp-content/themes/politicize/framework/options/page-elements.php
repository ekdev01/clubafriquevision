<?php

	/*
	*	CrunchPress Page Item File
	*	---------------------------------------------------------------------
	* 	@version	1.0
	* 	@author		CrunchPress
	* 	@link		http://crunchpress.com
	* 	@copyright	Copyright (c) CrunchPress
	*	---------------------------------------------------------------------
	*	This file contains the function that can print each page item in 
	*	different conditions.
	*	---------------------------------------------------------------------
	*/

	
	// Print the item size <div> with it's class
	function print_item_size($item_size, $addition_class=''){
		global $cp_item_row_size;
		
		$cp_item_row_size = (empty($cp_item_row_size))? 'first': $cp_item_row_size;
		if($cp_item_row_size >= 1){
			$cp_item_row_size = 'first';
		}
		
		switch($item_size){
			case 'element1-4':
				echo '<article class="span3 mbtm ' . $addition_class .' ' .$cp_item_row_size. '">';
				$cp_item_row_size += 1/4; 
				break;
			case 'element1-3':
				echo '<article class="span4 mbtm ' . $addition_class .' ' .$cp_item_row_size. '">';
				$cp_item_row_size += 1/3; 
				break;
			case 'element1-2':
				echo '<article class="span6 mbtm ' . $addition_class .' ' .$cp_item_row_size. '">';
				$cp_item_row_size += 1/2; 
				break;
			case 'element2-3':
				echo '<article class="span8 mbtm ' . $addition_class .' ' .$cp_item_row_size. '">';
				$cp_item_row_size += 2/3; 
				break;
			case 'element3-4':
				echo '<article class="span9 mbtm ' . $addition_class .' ' .$cp_item_row_size. '">';
				$cp_item_row_size += 3/4; 
				break;
			case 'element1-1':
				echo '<article class="span12 mbtm ' . $addition_class .' ' .$cp_item_row_size. '">';
				$cp_item_row_size += 1; 
				break;	
		}
		
	}
	
	
	// Print column 
	function print_column_item($item_xml){
		echo do_shortcode(html_entity_decode(find_xml_value($item_xml,'column-text')));
	}

	
	
	
	//Print Sidebar
	function print_sidebar_item($item_xml){ 
	
		$select_layout = find_xml_value($item_xml, 'sidebar-layout-select'); 
		dynamic_sidebar( $select_layout );
		
	
	}
	
	function print_div_end_item ( $item_xml ){
		echo '</div></div>';
	}
	//Division of sections
	function print_div_item ( $item_xml ){
		//Fetch Data from Theme Options
		
		$select_type = find_xml_value($item_xml, 'select-type'); 
		$bgimage = find_xml_value($item_xml, 'image'); 
		$bgcolor = find_xml_value($item_xml, 'color'); 
		$bgattachment = find_xml_value($item_xml, 'background-attachment'); 
		$paddingtop = find_xml_value($item_xml, 'padding-top'); 
		$paddingbottom = find_xml_value($item_xml, 'padding-bottom'); 
		$image_url = wp_get_attachment_image_src($bgimage, 'full');
		
		if($select_type == 'Plain'){
			echo '<div class="container inner-container-cp" ><div class="row-fluid" style="padding-top:'.$paddingtop.';padding-bottom:'.$paddingbottom.';float:left;">';
		}else{
		//return '<div style="border-size:'.$bordersize.';border-color:'.$bordercolor.';padding-top:'.$paddingtop.';padding-bottom:'.$paddingbottom.';background-color:'.$bgcolor.';background-image:'.$bgimage.';background-repeat:'.$bgrepeat.';background-attachment:'.$bgattachment.';background-position:'.$bgposition.'" class="full-width"><div class="container">'.do_shortcode($content).'</div></div>';
			echo '<div style="float:left;width:100%;padding-top:'.$paddingtop.';padding-bottom:'.$paddingbottom.';background-color:'.$bgcolor.';background-image:url('.$image_url[0].');background-attachment:'.$bgattachment.';" class="full-width"><div class="container">';
		}
	
	}
	
	$gallery_div_size_listing_class = array(
		'Masonry View' => array( 'class'=>'span3', 'class2'=>'col4_gallery_one_sidebar','class3'=>'col4_gallery_two_sidebar','size'=>array(614,614),'size2'=>array(614,614),'size3'=>array(614,614)),
		'4 Column' => array( 'class'=>'span3', 'class2'=>'col4_gallery_one_sidebar','class3'=>'col4_gallery_two_sidebar','size'=>array(614,614),'size2'=>array(614,614),'size3'=>array(614,614)),
		'3 Column' => array( 'class'=>'span4', 'class2'=>'col3_gallery_one_sidebar','class3'=>'col3_gallery_two_sidebar','size'=>array(614,614),'size2'=>array(614,614),'size3'=>array(614,614)),
		'2 Column' => array( 'class'=>'span6', 'class2'=>'span4','class3'=>'span3','size'=>array(570, 360),'size2'=>array(570, 360),'size3'=>array(570, 360)),
		'Catalogue View' => array( 'class'=>'span12', 'class2'=>'span4','class3'=>'span3','size'=>array(360,300),'size2'=>array(360,300),'size3'=>array(360,300)),
		'Carousel' => array( 'class'=>'span12', 'class2'=>'col-md-3','class3'=>'col-md-3','size'=>array(360,300),'size2'=>array(360,300),'size3'=>array(360,300)),
	); 	
	
	// Print gallery
	function print_gallery_item($item_xml){
	
		global $gallery_div_size_listing_class;
		global $paged,$sidebar,$post_id,$wp_query;		

		if(empty($paged)){
			$paged = (get_query_var('page')) ? get_query_var('page') : 1; 
		}
		$gal_counter = '';
		
		//Fetch Elements Data from database
		$header = find_xml_value($item_xml, 'header');
		$gallery_page = find_xml_value($item_xml, 'page');
		$gallery_size = find_xml_value($item_xml, 'item-size');
		$num_size = find_xml_value($item_xml, 'num-size');
		$show_pagination = find_xml_value($item_xml, 'show-pagination');
		
		//Count Images per row
		if($gallery_size == '2 Column'){$gal_counter = 2;}else if($gallery_size == '3 Column'){$gal_counter = 3;}else if($gallery_size == '4 Column'){$gal_counter = 4;}else{}		
		
		$gallery_class = $gallery_div_size_listing_class[$gallery_size]['class'];
		if( $sidebar == "no-sidebar" || $sidebar == ''){
			$gallery_class = $gallery_div_size_listing_class[$gallery_size]['class'];
			$item_size = $gallery_div_size_listing_class[$gallery_size]['size'];
		}else if ( $sidebar == "left-sidebar" || $sidebar == "right-sidebar" ){
			$gallery_class = $gallery_div_size_listing_class[$gallery_size]['class'];
			$item_size = $gallery_div_size_listing_class[$gallery_size]['size2'];
		}else{
			$gallery_class = $gallery_div_size_listing_class[$gallery_size]['class'];
			$item_size = $gallery_div_size_listing_class[$gallery_size]['size3'];
		}
		
		
		if(!empty($header)){
			if($gallery_size <> 'Carousel'){
				echo '<h2 class="heading">' . $header . '</h2>';
				echo '<span class="border-line m-bottom"></span>';
			}
		}


		//$gallery_post = get_posts(array('posts_per_page' => 1, 'post_type' => 'gallery', 'name'=>$gallery_page, 'numberposts'=> 2));
		// wp_register_script('prettyPhoto', CP_PATH_URL.'/frontend/js/jquery.prettyphoto.js', false, '1.0', true);
		// wp_enqueue_script('prettyPhoto');

		// wp_register_script('cp-pscript', CP_PATH_URL.'/frontend/js/pretty_script.js', false, '1.0', true);
		// wp_enqueue_script('cp-pscript');	
		
		// wp_enqueue_style('prettyPhoto',CP_PATH_URL.'/frontend/css/prettyphoto.css');
		if($gallery_page <> ''){
		$slider_xml_string = get_post_meta($gallery_page,'post-option-gallery-xml', true);
			if($gallery_size == 'Masonry View'){ 
				echo '<div class="gallery-cp">
                    <div id="container" class="gallery">';						
							wp_register_script('cp-isotop-min', CP_PATH_URL.'/frontend/js/blocksit.min.js', false, '1.0', true);
							wp_enqueue_script('cp-isotop-min');
							echo '<script>
								jQuery(document).ready(function($) {
									if ($("#container").length) {
										$("#container").BlocksIt({
											numOfCol: 4,
											offsetX: 15,
											offsetY: 15
										});
									}
								});
							</script>';
							if($slider_xml_string <> ''){
								$slider_xml_dom = new DOMDocument();
								if( !empty( $slider_xml_string ) ){
									$slider_xml_dom->loadXML($slider_xml_string);
										$children = $slider_xml_dom->documentElement->childNodes;
										if ( empty($wp_query->query['paged']) ) $wp_query->query['paged'] = 1;
											$total_page = '';
											if($num_size > 0){
													$limit_start = $num_size * ($wp_query->query['paged']-1);
													$limit_end = $limit_start + $num_size;
													if ( $limit_end > $slider_xml_dom->documentElement->childNodes->length ) {
														$limit_end = $slider_xml_dom->documentElement->childNodes->length;
													}
													
													if($num_size < $slider_xml_dom->documentElement->childNodes->length){
														$total_page = ceil($slider_xml_dom->documentElement->childNodes->length/$num_size);
													}else{
														$total_page = 1;
													}
											}
											else {
												$limit_start = 0;
												$limit_end = $slider_xml_dom->documentElement->childNodes->length;
											}
											$counter_gal_element = 0;
											for($i=$limit_start;$i<$limit_end;$i++) { 
												$thumbnail_id = find_xml_value($children->item($i), 'image');
												$title = find_xml_value($children->item($i), 'title');
												$caption = find_xml_value($children->item($i), 'caption');
												$link_type = find_xml_value($children->item($i), 'linktype');
												$video = find_xml_value($children->item($i), 'video');
												//$link = find_xml_value($children->item($i), 'link');
												$image_url = wp_get_attachment_image_src($thumbnail_id, $item_size);
												$alt_text = get_post_meta($thumbnail_id , '_wp_attachment_image_alt', true);
												
												$image_full = wp_get_attachment_image_src($thumbnail_id, 'full');
												$image_thumb = wp_get_attachment_image_src($thumbnail_id, array(614,614));
												$link = find_xml_value( $children->item($i), 'link');
												//Condition for Width and Height for each Masonry Element
												if($counter_gal_element % 4 == 0){$gal_class= 'item-w2 item-h3';}else if($counter_gal_element % 4 == 1){$gal_class= 'item-h2';}else if($counter_gal_element % 4 == 2){$gal_class= 'item-h2';}else if($counter_gal_element % 4 == 3){$gal_class= '';}else{}?>
												<div class="grid">
													<div class="caption"><a href="<?php echo $image_full[0]?>" class="zoom" data-rel="prettyPhoto[gallery1]"><i class="fa fa-plus"></i></a></div>
													<div class="imgholder"> <img src="<?php echo $image_full[0]?>" alt="<?php echo $title;?>"> </div>
												</div>
										<?php $counter_gal_element++;
											} //Foreach loop
								} //Empty Condition check 
							}	//Empty Condition check 
						
                    echo '</div>
                </div>';
			}elseif($gallery_size == 'Carousel'){
				

				global $counter;
				
				echo '<div class="partners-section">';						
							//Bx Slider Script Calling
							wp_register_script('cp-bx-slider', CP_PATH_URL.'/frontend/js/bxslider.min.js', false, '1.0', true);
							wp_enqueue_script('cp-bx-slider');	
							wp_enqueue_style('cp-bx-slider',CP_PATH_URL.'/frontend/css/bxslider.css');?>
							<script type="text/javascript">
							jQuery(document).ready(function ($) {
								"use strict";
								if ($('#logo-slider-<?php echo esc_attr($counter)?>').length) {
									$('#logo-slider-<?php echo esc_attr($counter)?>').bxSlider({
										minSlides: 3,
										maxSlides: 6,
										slideWidth: 170,
										pager:false,
										slideMargin: 24,
										auto:true
									});
								}
							});
							</script>
							
							<div class="heading-style-1">
								<h2><?php echo $header;?></h2>
							</div>
							
							<?php
							
							echo '<ul id="logo-slider-'.esc_attr($counter).'" class="partners-slider">';
							if($slider_xml_string <> ''){
								$slider_xml_dom = new DOMDocument();
								if( !empty( $slider_xml_string ) ){
									$slider_xml_dom->loadXML($slider_xml_string);
										$children = $slider_xml_dom->documentElement->childNodes;
										if ( empty($wp_query->query['paged']) ) $wp_query->query['paged'] = 1;
											$total_page = '';
											if($num_size > 0){
													$limit_start = $num_size * ($wp_query->query['paged']-1);
													$limit_end = $limit_start + $num_size;
													if ( $limit_end > $slider_xml_dom->documentElement->childNodes->length ) {
														$limit_end = $slider_xml_dom->documentElement->childNodes->length;
													}
													
													if($num_size < $slider_xml_dom->documentElement->childNodes->length){
														$total_page = ceil($slider_xml_dom->documentElement->childNodes->length/$num_size);
													}else{
														$total_page = 1;
													}
											}
											else {
												$limit_start = 0;
												$limit_end = $slider_xml_dom->documentElement->childNodes->length;
											}
											$counter_gal_element = 0;
											for($i=$limit_start;$i<$limit_end;$i++) { 
												$thumbnail_id = find_xml_value($children->item($i), 'image');
												$title = find_xml_value($children->item($i), 'title');
												$caption = find_xml_value($children->item($i), 'caption');
												$link_type = find_xml_value($children->item($i), 'linktype');
												$video = find_xml_value($children->item($i), 'video');
												//$link = find_xml_value($children->item($i), 'link');
												$image_url = wp_get_attachment_image_src($thumbnail_id, $item_size);
												$alt_text = get_post_meta($thumbnail_id , '_wp_attachment_image_alt', true);
												
												$image_full = wp_get_attachment_image_src($thumbnail_id, 'full');
												$image_thumb = wp_get_attachment_image_src($thumbnail_id, array(614,614));
												$link = find_xml_value( $children->item($i), 'link');
												//Condition for Width and Height for each Masonry Element
												if($counter_gal_element % 4 == 0){$gal_class= 'item-w2 item-h3';}else if($counter_gal_element % 4 == 1){$gal_class= 'item-h2';}else if($counter_gal_element % 4 == 2){$gal_class= 'item-h2';}else if($counter_gal_element % 4 == 3){$gal_class= '';}else{}?>
												<li><img src="<?php echo esc_url($image_full[0])?>" alt="<?php echo esc_attr($title);?>"></li>
										<?php $counter_gal_element++;
											} //Foreach loop
								} //Empty Condition check 
							}	//Empty Condition check 
						
                    echo '</ul>
                </div>';
			}else{
				if($slider_xml_string <> ''){
				$slider_xml_dom = new DOMDocument();
					if( !empty( $slider_xml_string ) ){
						$slider_xml_dom->loadXML($slider_xml_string);
						echo '<div class="gallery gallery-page row-fluid normal_listing">';							
							$children = $slider_xml_dom->documentElement->childNodes;
							if ( empty($wp_query->query['paged']) ) $wp_query->query['paged'] = 1;
										$total_page = '';
										if($num_size > 0){
											$limit_start = $num_size * ($wp_query->query['paged']-1);
											$limit_end = $limit_start + $num_size;
											if ( $limit_end > $slider_xml_dom->documentElement->childNodes->length ) {
												$limit_end = $slider_xml_dom->documentElement->childNodes->length;
											}
											
											if($num_size < $slider_xml_dom->documentElement->childNodes->length){
												$total_page = ceil($slider_xml_dom->documentElement->childNodes->length/$num_size);
											}else{
												$total_page = 1;
											}
									}
									else {
										$limit_start = 0;
										$limit_end = $slider_xml_dom->documentElement->childNodes->length;
									}
							$counter_gal_element = 0;
							$single_col = 0;
							for($i=$limit_start;$i<$limit_end;$i++) { 
								$thumbnail_id = find_xml_value($children->item($i), 'image');
								$title = find_xml_value($children->item($i), 'title');
								$caption = find_xml_value($children->item($i), 'caption');
								$link_type = find_xml_value($children->item($i), 'linktype');
								$video = find_xml_value($children->item($i), 'video');
								//$link = find_xml_value($children->item($i), 'link');
								$image_url = wp_get_attachment_image_src($thumbnail_id, $item_size);
								$alt_text = get_post_meta($thumbnail_id , '_wp_attachment_image_alt', true);	
								
								if($gallery_size == 'Catalogue View'){
								if($single_col % 3 == 0){$first_class="first";}else{$first_class = '';}$single_col++;
										echo '<div class="margin-bottom gallery-frame span4 '.$first_class.'">';
										$image_full = wp_get_attachment_image_src($thumbnail_id, 'full');
										$image_thumb = wp_get_attachment_image_src($thumbnail_id, $item_size);
										$link = find_xml_value( $children->item($i), 'link');
										if( $link_type == 'Link to URL' ){
											$link = find_xml_value( $children->item($i), 'link');	?>
											<div class="frame"> <a href="<?php echo $link; ?>"><img src="<?php echo $image_thumb[0];?>" alt="<?php echo $alt_text;?>"></a>
												<div class="caption"><strong class="title"><?php echo $title?></strong></div>
											</div>
											<div class="text-box"><p><?php echo $caption;?></p></div>
										<?php }else if( $link_type == 'Lightbox' ){
											$image_full = wp_get_attachment_image_src($thumbnail_id, 'full');
											$image_thumb = wp_get_attachment_image_src($thumbnail_id, $item_size);
											$link = find_xml_value( $children->item($i), 'link'); ?>
											<div class="frame"> <a href="<?php echo $image_thumb[0];?>"><img src="<?php echo $image_thumb[0];?>" alt="<?php echo $alt_text;?>"></a>
												<div class="caption"><strong class="title"><?php echo $title?></strong></div>
											</div>
											<div class="text-box"><p><?php echo $caption;?></p></div>
											<?php
										}else if( $link_type == 'Video' ){
											$image_full = wp_get_attachment_image_src($thumbnail_id, 'full');
											$image_thumb = wp_get_attachment_image_src($thumbnail_id, $item_size);
											$link = find_xml_value( $children->item($i), 'link');
											echo  get_video($video,700,700);
										}else{
											$link = find_xml_value( $children->item($i), 'link');
											?>
											<div class="frame"> <a href="<?php echo $image_thumb[0];?>"><img src="<?php echo $image_thumb[0];?>" alt="<?php echo $alt_text;?>"></a>
												<div class="caption"><strong class="title"><?php echo $title?></strong></div>
											</div>
											<div class="text-box"><p><?php echo $caption;?></p></div>
											<?php
										}
									echo '</div>';
								}else{
									if($counter_gal_element % $gal_counter == 0){ ?>		
										<div class="clear"></div>
										<!--LIST ITEM START-->									
										<div class="list_item margin-bottom first fadeInUpBig cp_load <?php echo $gallery_class;?>">
											<div class="gallery-frame">
											<?php 
											$image_full = wp_get_attachment_image_src($thumbnail_id, 'full');
											$image_thumb = wp_get_attachment_image_src($thumbnail_id, $item_size);
											$link = find_xml_value( $children->item($i), 'link');
											if( $link_type == 'Link to URL' ){
												$link = find_xml_value( $children->item($i), 'link');
												echo '<img class="cp-gallery-image" src="' . $image_thumb[0] . '" alt="' . $alt_text . '" />'; ?>
												<div class="caption">
													<a class="zoom" href="<?php echo $link; ?>"><i class="fa fa-link"></i></a>
												</div>
											<?php }else if( $link_type == 'Lightbox' ){
												$image_full = wp_get_attachment_image_src($thumbnail_id, 'full');
												$image_thumb = wp_get_attachment_image_src($thumbnail_id, $item_size);
												$link = find_xml_value( $children->item($i), 'link'); ?>
												<?php if($title <> ''){ ?>
													<div class="caption">
														<h2><?php echo $title;?></h2>
														<p><?php echo $caption;?></p>
														<a class="zoom" href="<?php echo $image_thumb[0];?>" data-rel="prettyPhoto[gallery1]"><i class="fa fa-plus"></i></a>
													</div>
												<?php }else{ ?>
													<div class="caption">
														<a class="zoom" href="<?php echo $image_thumb[0];?>" data-rel="prettyPhoto[gallery1]"><i class="fa fa-plus"></i></a>
													</div>
												<?php } ?>
												<img src="<?php echo $image_thumb[0];?>" alt="<?php echo $alt_text;?>">
												<?php
											}else if( $link_type == 'Video' ){
												$image_full = wp_get_attachment_image_src($thumbnail_id, 'full');
												$image_thumb = wp_get_attachment_image_src($thumbnail_id, $item_size);
												$link = find_xml_value( $children->item($i), 'link');
												echo get_video($video,700,700);
											}else{
												$link = find_xml_value( $children->item($i), 'link');
												echo '<img src="'.$image_thumb[0].'" alt="'.$alt_text.'">';
												echo '<div class="caption">';
														echo '<h3>'.$title.'</h3>';
														echo '<p>'.$caption.'</p>';
													echo '</div>';
											}
										?>
											</div>
											<!--LIST ITEM START-->
										</div>	
									<?php 
									}else{ ?>
									<div class="list_item margin-bottom view_new view-tenth pull-left fadeInDownBig cp_load <?php echo $gallery_class;?>">
										<div class="gallery-frame">
										<?php 
										$image_full = wp_get_attachment_image_src($thumbnail_id, 'full');
										$image_thumb = wp_get_attachment_image_src($thumbnail_id, $item_size);
										$link = find_xml_value( $children->item($i), 'link');
										if( $link_type == 'Link to URL' ){
											$link = find_xml_value( $children->item($i), 'link');	?>
											<?php echo '<img class="cp-gallery-image" src="' . $image_thumb[0] . '" alt="' . $alt_text . '" />';?>
											<div class="caption">
												<a class="zoom" href="<?php echo $link; ?>"><i class="fa fa-link"></i></a>
											</div>
										<?php }else if( $link_type == 'Lightbox' ){
											$image_full = wp_get_attachment_image_src($thumbnail_id, 'full');
											$image_thumb = wp_get_attachment_image_src($thumbnail_id, $item_size);
											$link = find_xml_value( $children->item($i), 'link'); ?>
											<?php if($title <> ''){?>
												<div class="caption">
													<h2><?php echo $title;?></h2>
													<p><?php echo $caption;?></p>
													<a class="zoom" href="<?php echo $image_thumb[0];?>" data-rel="prettyPhoto[gallery1]"><i class="fa fa-plus"></i></a>
												</div>
											<?php }else{ ?>
												<div class="caption">
													<a class="zoom" href="<?php echo $image_thumb[0];?>" data-rel="prettyPhoto[gallery1]"><i class="fa fa-plus"></i></a>
												</div>
											<?php }?>
											<img src="<?php echo $image_thumb[0];?>" alt="<?php echo $alt_text;?>">
											<?php
										}else if( $link_type == 'Video' ){
											$image_full = wp_get_attachment_image_src($thumbnail_id, 'full');
											$image_thumb = wp_get_attachment_image_src($thumbnail_id, $item_size);
											$link = find_xml_value( $children->item($i), 'link');
											echo  get_video($video,700,700);
										}else{
											$link = find_xml_value( $children->item($i), 'link');
											echo '<img src="'.$image_thumb[0].'" alt="'.$alt_text.'">';
											echo '<div class="caption">';
													echo '<h3>'.$title.'</h3>';
													echo '<p>'.$caption.'</p>';
												echo '</div>';
										}
									?>
										</div>
										<!--LIST ITEM START-->
									</div>	
								<?php 
									} $counter_gal_element++;
								}	
							} // End Foreach Loop
						echo '</div>';
						if($show_pagination == 'Yes'){
							pagination_crunch($pages = $total_page);
						}
					}
				}
			} //Masonry Condition Ends
		} //Gallery page if not empty ends	
	} // Gallery element function ends
	
	function get_gallery_image_one($post_id, $item_size){
		$thumbnail_id = get_post_thumbnail_id( $post_id );
		$thumbnail = wp_get_attachment_image_src( $thumbnail_id , $item_size );
		
		if($thumbnail[1].'x'.$thumbnail[2] == $item_size){
			echo get_the_post_thumbnail($post_id, $item_size);
		}else{
			echo get_the_post_thumbnail($post_id, 'full');
		}
	}
	
	
	
	//Newest Album Section
	function print_newest_album_item($item_xml){
		
		global $counter,$post,$post_id;
		
		$header = find_xml_value($item_xml, 'header');
		$category_album = find_xml_value($item_xml, 'category');		
		
		//Bx Slider Script Calling
		wp_register_script('cp-bx-slider', CP_PATH_URL.'/frontend/js/bxslider.min.js', false, '1.0', true);
		wp_enqueue_script('cp-bx-slider');	
		wp_enqueue_style('cp-bx-slider',CP_PATH_URL.'/frontend/css/bxslider.css');?>
		<script type="text/javascript">
		jQuery(document).ready(function ($) {
			"use strict";
			if ($('#newest-<?php echo $counter?>').length) {
				$('#newest-<?php echo $counter?>').bxSlider({
					minSlides: 1,
					maxSlides: 1,
					auto:true
				});
			}
		});
		</script>
		<?php if($header <> ''){ ?><h2 class="h-style"><?php echo $header;?></h2><?php }?>
		<div class="accordian-list">
			<Section id="newest-<?php echo $counter;?>">
				<?php
				query_posts(array(
				'posts_per_page' 			=> 5,
				'post_type'					=> 'albums',
				'album-category'			=> $category_album,
				'post_status'				=> 'publish',
				'order'						=> 'DESC',
				));
				$counter_one = 0;
				while( have_posts() ){
					the_post();	?>
					<div class="slide">
						<a href="<?php echo get_permalink();?>"><?php echo get_the_post_thumbnail($post_id, array(350,350));?></a>
						<div class="img-cap">
							<h3><?php echo get_the_title();?></h3>
							<strong><?php //echo get_the_expert();?></strong>
						</div>
					</div>
				<?php } //End While loop ?>
			</Section>
		</div>
		<?php
	
	}
	
	//Newest Album Section
	function print_footer_shop_item($category_product="",$bg_img=""){
		global $counter,$post,$post_id;
		
		$select_layout_cp = '';
		$cp_general_settings = get_option('general_settings');
		if($cp_general_settings <> ''){
			$cp_logo = new DOMDocument ();
			$cp_logo->loadXML ( $cp_general_settings );
			$select_layout_cp = find_xml_value($cp_logo->documentElement,'select_layout_cp');
		}
		
		//Condition to Fetch All Categories
		if(!empty($category_product)){
			$category_term = get_term_by( 'term_id', $category_product , 'product_cat');
			$category_product = $category_term->slug;
		}			
		//Bx Slider Script Calling
		wp_register_script('cp-bx-slider', CP_PATH_URL.'/frontend/js/bxslider.min.js', false, '1.0', true);
		wp_enqueue_script('cp-bx-slider');	
		wp_enqueue_style('cp-bx-slider',CP_PATH_URL.'/frontend/css/bxslider.css');
		?>
				<script type="text/javascript">
				jQuery(document).ready(function ($) {
					"use strict";
					if ($('#product-<?php echo $counter?>').length) {
						$('#product-<?php echo $counter?>').bxSlider({
							slideWidth: <?php if($select_layout_cp == 'boxed_layout'){echo '278';}else{echo '278';}?>,
							minSlides: 1,
							maxSlides: <?php if($category_product == '' || $category_product == ' '){echo '4';}else{echo '3';}?>,
							slideMargin: 20,
							pager:false, 
							auto:true
						});
					}
				});
				</script>
				<div <?php if($bg_img[0] <> ''){ echo 'style="background:url('.$bg_img[0].') no-repeat;"';}?> data-type="background" data-speed="12"  class="new-album-list">
					<div class="<?php if($select_layout_cp == 'boxed_layout'){echo 'container-boxed container-fluid';}else{echo 'container';}?>">
						<div class="row-fluid">
							<?php if($category_product <> ''){ ?>
								<div class="span3 new-album-cap fadeInLeft cp_load">
									<h2><?php echo $category_term->name;?></h2>
									<p><?php echo substr($category_term->description,0,200);?></p>
								</div>
							<?php }else{ ?>
								<div class="span12">
									<h2><?php _e('All Categories','crunchpress');?></h2>
								</div>	
							<?php } ?>
							<div class="<?php if($category_product == '' || $category_product == ' '){echo 'span12 first';}else{echo 'span9';}?> album-slider fadeInRight cp_load">
								<div id="product-<?php echo $counter?>" class="slider7">
								<?php
									//Reset Query for Post
									//Default Query For Grid
									query_posts(array(
										'posts_per_page'			=> 10,
										'post_type'					=> 'product',
										'product_cat'				=> $category_product,
										'post_status'				=> 'publish',
										'order'						=> 'DESC',
									));
									$counter_product = 0;
									if(have_posts()){
										while(have_posts()){
										the_post();	
										global $post,$post_id,$product,$product_url,$woocommerce;
										$permalink_structure = get_option('permalink_structure');
										if($permalink_structure <> ''){
											$permalink_structure = '?';
										}else{
											$permalink_structure = '&';
										}
										$regular_price = get_post_meta($post->ID, '_regular_price', true);
										if($regular_price == ''){
											$regular_price = get_post_meta($post->ID, '_max_variation_regular_price', true);
										}
										$sale_price = get_post_meta($post->ID, '_sale_price', true);
										$sku_num = get_post_meta($post->ID, '_sku', true);
										
										if($sale_price == ''){
											$sale_price = get_post_meta($post->ID, '_min_variation_sale_price', true);
										}
										$currency = get_woocommerce_currency_symbol(); ?>
										<!-- Start New Album Slider -->							
										<div class="slide"> 
											<a href="<?php echo get_permalink();?>"><?php echo get_the_post_thumbnail($post_id, array(270,290));?></a>
											<div class="mask-overlay">
												<a href="<?php echo get_permalink();?>" class="anchor"><span> </span> <i class="fa fa-shopping-cart"></i></a>
												<a href="<?php echo get_permalink();?>" class="anchor"> <i class="fa fa-link"></i></a>
											</div>
											<div class="item-cap"> <strong class="item-title"><a href="<?php echo get_permalink();?>"><?php echo get_the_title();?></a></strong> <span class="price-rating"> <span class="price"><?php echo $currency;?><?php if($sale_price <> ''){echo $sale_price;}else{echo $regular_price;}?></span></span> 
												<form enctype="multipart/form-data" method="post" class="cart" action="<?php echo get_permalink();?><?php echo $permalink_structure;?>add-to-cart=<?php echo $post->ID;?>">
													<!--<div class="quantity buttons_added"><input type="button" class="minus" value="-">
													<input type="number" class="input-text qty text" title="Qty" value="1" name="quantity" step="1">
													<input type="button" class="plus" value="+"></div>-->
													<button class="add_to_cart_button button product_type_simple added" data-quantity="1" data-product_sku="<?php echo $sku_num;?>" data-product_id="<?php echo $post->ID;?>" type="submit"><?php _e('Add to cart','crunchpress');?></button>
												</form>
											</div>
										</div>
										<!-- End New Album Slider --> 					
									<?php
										}
									} ?>
								</div>
							</div>
						</div>
					</div>
				</div>
		<?php	
	}
	
	
	
	
	
	//Blog Item
	function print_blog_item_item($item_xml){
		global $counter;
		$num_excerpt = 250;
		$header = find_xml_value($item_xml, 'header');
		$category = find_xml_value($item_xml, 'category');
		$num_excerpt = find_xml_value($item_xml, 'num-excerpt');
		$num_fetch = find_xml_value($item_xml, 'num-fetch');
		
		wp_register_script('cp-bx-slider', CP_PATH_URL.'/frontend/js/bxslider.min.js', false, '1.0', true);
		wp_enqueue_script('cp-bx-slider');	
		wp_enqueue_style('cp-bx-slider',CP_PATH_URL.'/frontend/css/bxslider.css');
		?>
		<script type="text/javascript">
		jQuery(document).ready(function ($) {
			if ($('#blog_slider-<?php echo $counter;?>').length) {
				$('#blog_slider-<?php echo $counter;?>').bxSlider({
					minSlides: 1,
					maxSlides: 1
				});
			}
		});
		</script>
		<div class="blog_class" id="blog_store">
			<figure id="blog" class="span12 first">
				<?php if($header <> ''){?><h2 class="title"><?php echo $header;?><span class="h-line"></span></h2><?php }?>
				<div id="slider_blog">
					<ul id="blog_slider-<?php echo $counter;?>">
					<?php
					query_posts(array(
						'posts_per_page'			=> $num_fetch,
						'post_type'					=> 'post',
						'category'					=> $category,
						'post_status'				=> 'publish',
						'order'						=> 'DESC',
					));
					$event_counter = 0;
					while( have_posts() ){
					the_post();	
					global $post,$post_id;
					?>
						<li>
							<div class="img span4">
								<?php echo get_the_post_thumbnail($post_id, array(175,155));;?>
							</div>
							<div class="content span8">
								<div class="icon_date"> 
									<i class="fa fa-picture"></i>
									<span class="date"><?php echo get_the_date(get_option('date_format'))?></span>
								</div>
								<div class="post_excerpt">
									<h4><a href="<?php echo get_permalink();?>"><?php echo get_the_title();?></a></h4>
									<p><?php 
									if($num_excerpt <> ''){
										echo strip_tags(substr(get_the_content(),0,$num_excerpt));
									}else{
										echo strip_tags(substr(get_the_content(),0,250));
									}
									
									?></p>
									<a href="<?php echo get_permalink();?>"><?php _e('Read More','crunchpress');?><i class="icon-plus"></i> </a>
								</div>
							</div>
						</li>
					<?php }
					wp_reset_query();
					wp_reset_postdata();
					?>	
					</ul>
				</div>
			</figure>
		</div>	
	<?php
	}
	
	//WooProduct Slider
	function print_woo_product_slider_item($item_xml){ 
		wp_register_script('cp-caroufredsel-slider', CP_PATH_URL.'/frontend/js/caroufredsel.js', false, '1.0', true);
		wp_enqueue_script('cp-caroufredsel-slider');	
		
		$header = find_xml_value($item_xml, 'header');
		$category = find_xml_value($item_xml, 'category');
		$num_fetch = find_xml_value($item_xml, 'num-fetch');
		
	
		global $post;
		$facebook_class = '';
		if($post <> ''){
			$facebook_class = get_post_meta ( $post->ID, "page-option-item-facebook-selection", true );
		}
	?>
			
		<script type="text/javascript">
			jQuery(document).ready(function ($) {
				<?php if($facebook_class == 'Yes'){?>
				var _visible = 4;
				<?php }else{?>
				var _visible = 6;
				<?php }?>
				var $pagers = $('#pager a');
				var _onBefore = function() {
					$(this).find('img').stop().fadeTo( 300, 1 );
					$pagers.removeClass( 'selected' );
				};

				$('#carousel').carouFredSel({
					items: _visible,
					width: '100%',
					auto: false,
					scroll: {
						duration: 750
					},
					prev: {
						button: '#prev',
						items: 2,
						onBefore: _onBefore
					},
					next: {
						button: '#next',
						items: 2,
						onBefore: _onBefore
					},
				});

				$pagers.click(function( e ) {
					e.preventDefault();
					
					var group = $(this).attr( 'href' ).slice( 1 );
					var slides = $('#carousel div.' + group);
					var deviation = Math.floor( ( _visible - slides.length ) / 2 );
					if ( deviation < 0 ) {
						deviation = 0;
					}

					$('#carousel').trigger( 'slideTo', [ $('#' + group), -deviation ] );
					$('#carousel div img').stop().fadeTo( 300, 1 );
					slides.find('img').stop().fadeTo( 300, 1 );

					$(this).addClass( 'selected' );
				});
			});
		</script>
			<div id="inner">
				<div id="carousel">
				<?php
					query_posts(array(
						'posts_per_page'			=> $num_fetch,
						'post_type'					=> 'product',
						'category'					=> $category,
						'post_status'				=> 'publish',
						'order'						=> 'DESC',
					));
					while( have_posts() ){
					the_post();	
					global $post,$post_id;
					$categories = '';
					$currency = '';
					//Price of Product
					$regular_price = get_post_meta($post->ID, '_regular_price', true);
					if($regular_price == ''){
						$regular_price = get_post_meta($post->ID, '_max_variation_regular_price', true);
					}
					$sale_price = get_post_meta($post->ID, '_sale_price', true);
					if($sale_price == ''){
						$sale_price = get_post_meta($post->ID, '_min_variation_sale_price', true);
					}
					if(function_exists('get_woocommerce_currency_symbol')){
						$currency = get_woocommerce_currency_symbol();
					}
					?>
					<div class="cp_product" id="<?php 
					if(class_exists("Woocommerce")){
						$categories = get_the_terms( $post->ID, 'product_cat' );
							if($categories <> ''){
								foreach ( $categories as $category ) {
									echo $category->term_id;
								}
							}
					}	
					?>">
						<?php echo get_the_post_thumbnail($post_id, array(140,200));;?>
						<em><?php echo get_the_title();?></em>
						<span class="cp_price"><sup><?php echo $currency;?></sup><?php echo $regular_price;?></span>
						<a class="view_detail" href="<?php echo get_permalink();?>"><?php _e('View Detail','crunchpress');?></a>
					</div>
				<?php }?>
				</div>
				<div id="pager">
				<?php
				$category = find_xml_value($item_xml, 'category');
				$category = ( $category == '786512' )? '': $category;
				if( !empty($category) ){
					$category_term = get_term_by( 'name', $category , 'product_cat');
					$category = $category_term->slug;
				}
				if(class_exists("Woocommerce")){
					$categories = get_categories( array('child_of' => $category, 'taxonomy' => 'product_cat', 'hide_empty' => 0) );
					if($categories <> ""){
						foreach($categories as $values){?>
						<a href="#<?php echo $values->term_id;?>"><?php echo $values->name;?></a>
					<?php
						}
					}
				}
				?>
				</div>
				<a href="#" id="prev"><span class="font_aw"><i class="fa fa-chevron-left"></i></span></a>
				<a href="#" id="next"><span class="font_aw"><i class="fa fa-chevron-right"></i></span></a>
			</div>
	<?php }	
	
	// Print the slider item
	function print_slider_item($item_xml){
		
		global $counter;
		$xml_size = find_xml_value($item_xml, 'size');
		if( $xml_size == 'full-width' ){
			echo '<div class="Full-Image"><div class="thumbnail_image">';
		}else{
			echo '<div class="Full-Image"><div class="thumbnail_image">';
		}
		$slider_xml_dom  = new DOMDocument ();
		$slider_type= find_xml_value($item_xml,'slider-type');
		$slider_width = find_xml_value($item_xml, 'width');
		$slider_height = find_xml_value($item_xml, 'height');
		$slider_slide = find_xml_value($item_xml, 'slider-slide');
		$slider_slide_layer = find_xml_value($item_xml, 'slider-slide-layer');
		//$post_slider_slug = get_posts(array('post_type' => 'cp_slider','name' => $slider_slide,'numberposts' => 1));
		if(!empty($slider_slide)){
		$slider_xml = get_post_meta( intval($slider_slide), 'cp-slider-xml', true);
			if($slider_xml <> ''){
				$slider_xml_dom = new DOMDocument ();
				$slider_xml_dom->loadXML ( $slider_xml );
			}
		}
		//Determine the width of slider
		if( !empty($slider_width) && !empty($slider_height) ){
			$xml_size = array($slider_width, $slider_height);
		} else if(!empty($slider_height)){
			$xml_size = array(980, $slider_height);
		}else{
			$xml_size = array(980,360);
		}
		//Slider Name
		$slider_name = 'slider'.$counter;
		switch(find_xml_value($item_xml,'slider-type')){
			
			case 'Anything': 
				wp_register_script('cp-anything-slider', CP_PATH_URL.'/frontend/anythingslider/js/jquery.anythingslider.js', false, '1.0', true);
				wp_enqueue_script('cp-anything-slider');	

				wp_register_script('cp-anything-slider-fx', CP_PATH_URL.'/frontend/anythingslider/js/jquery.anythingslider.fx.js', false, '1.0', true);
				wp_enqueue_script('cp-anything-slider-fx');	
				echo print_anything_slider($slider_name,$slider_xml_dom->documentElement,$size=$xml_size);
				break;
			case 'Flex-Slider': 
				print_flex_slider($slider_xml_dom->documentElement,$size=$xml_size);
				break;
			case 'Default-Slider': 
				print_fine_slider($slider_xml_dom->documentElement,$size=$xml_size);
				break;
			case 'Bx-Slider': 
				echo print_bx_slider($slider_xml_dom->documentElement,$size=$xml_size,$slider_name);				
				break;
			case 'Layer-Slider': 
				if(class_exists('LS_Sliders')){
					echo do_shortcode('[layerslider id="' . $slider_slide_layer . '"]');
				}else{
					echo '<h2>Please install the LayerSlider plugin first.</h2>';
				}	
			break;	
				
		}
		?>
		
		<?php
		
		
		if( find_xml_value($item_xml, 'size') == 'full-width' ){
			echo "</div></div>";
		}else{
		      echo "</div></div>";
		}
		
	}
	
	// Print Content Item
	function print_content_item($item_xml){
		
		$title = find_xml_value($item_xml, 'title');
		$description = find_xml_value($item_xml, 'description');
		
		//Loop for Content Area
		if(have_posts()){
			while(have_posts()){
				the_post();
				global $post;
				if($title == 'Yes'){
					echo '<h2 class="h-style">' . get_the_title() . '</h2>';
				}
				
				if($description == 'Yes'){
					the_content();	
				}
				
			}
		}
	}
	
	// Print Content Item
	function print_default_content_item(){
		
		while ( have_posts() ) : the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<a href="<?php echo get_permalink();?>">
			<?php
				the_title( '<header class="entry-header"><h1 class="entry-title">', '</h1></header><!-- .entry-header -->' );
			?>
			</a>
			<div class="entry-content-cp">
				<?php
					the_content();
					wp_link_pages( array(
						'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'rockon' ) . '</span>',
						'after'       => '</div>',
						'link_before' => '<span>',
						'link_after'  => '</span>',
					) );

					edit_post_link( __( 'Edit', 'rockon' ), '<span class="edit-link">', '</span>' );
				?>
			</div><!-- .entry-content -->
		</article><!-- #post-## -->
		
		<?php
		echo '<div class="comment-box">';
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}
		echo '</div>';
		endwhile;
	}
	
	// Print Accordion
	function print_accordion_item($item_xml){
		
		$tab_xml = find_xml_node($item_xml, 'tab-item');
		$header = find_xml_value($item_xml, 'header');
		if(!empty($header)){
			echo '<h2 class="h-style">' . $header . '</h2>';
		}
		echo " <div class='accordtion-area accordion_cp acc-list2'>";	
		foreach($tab_xml->childNodes as $accordion){
			echo "<h3 class='accordion-heading'><a class='accordion-toggle'>";
			echo find_xml_value($accordion, 'title') . "</a></h3>";
			echo "<div><p>";
			echo do_shortcode(html_entity_decode(find_xml_value($accordion, 'caption'))) . '</p></div>';
		}
		
		echo "</div>";
	
	}
	
	
	
	// Print Divider
	function print_divider($item_xml){
		//Hide me button
		$hide_button = find_xml_value($item_xml, 'hide-bottom-top');
		$margin_top = find_xml_value($item_xml, 'margin-top');
		$margin_bottom = find_xml_value($item_xml, 'margin-bottom');
		
		
		if($hide_button == 'No'){
			wp_register_script('cp-easing', CP_PATH_URL.'/frontend/js/jquery-easing-1.3.js', false, '1.0', true);
			wp_enqueue_script('cp-easing');
			wp_register_script('cp-top-script', CP_PATH_URL.'/frontend/js/jquery.scrollTo-min.js', false, '1.0', true);
			wp_enqueue_script('cp-top-script');
			echo '<div style="margin-top:'.$margin_top.';margin-bottom:'.$margin_bottom.'" class="clear"></div><div class="divider mr10"><div class="scroll-top"><a class="scroll-topp">Back to Top</a>';
			echo find_xml_value($item_xml, 'text');
			echo '</div></div>';
		}else{
			echo '<div style="float:left;width:100%;margin-top:'.$margin_top.';margin-bottom:'.$margin_bottom.'" class="clear"></div>';
		}
	}
	
	// Print Message Box
	function print_message_box($item_xml){
		$box_color = find_xml_value($item_xml, 'color');
		$box_title = find_xml_value($item_xml, 'title');
		$box_content = html_entity_decode(find_xml_value($item_xml, 'content'));
		echo '<div class="message-box-wrapper ' . $box_color . '">';
		echo '<div class="message-box-title">' . $box_title . '</div>';
		echo '<div class="message-box-content">' . $box_content . '</div>';
		echo '</div>';
	}
	
	// Print Toggle Box
	function print_toggle_box_item($item_xml){
		$tab_xml = find_xml_node($item_xml, 'tab-item');
		$header = find_xml_value($item_xml, 'header');
		if(!empty($header)){
			echo '<h3 class="toggle-box-header-title title-color cp-title">' . $header . '</h3>';
		}
		echo "<ul class='toggle-view'>";
		foreach($tab_xml->childNodes as $toggle_box){
			$active = find_xml_value($toggle_box, 'active');
			echo "<li>";
			
			echo "<span class='link";
			echo ($active == 'Yes')? ' active':'';
			echo "' ></span>";
			echo "<h3 class='color'>". find_xml_value($toggle_box, 'title') . "</h3>";
			echo "<div class='panel"; 
			echo ($active == 'Yes')? ' active': '';
			echo "' id='toggle-box-content' >";
			echo do_shortcode(html_entity_decode(find_xml_value($toggle_box, 'caption'))) . '</div>';
			echo "</li>";
		
		}
		echo "</ul>";
	}

	// Print Tab
	function print_tab_item($item_xml){
	
		$tab_xml = find_xml_node($item_xml, 'tab-item');
		
		$tab_widget_title =  html_entity_decode(find_xml_value($item_xml,'tab-widget'));
		$tab_style =  html_entity_decode(find_xml_value($item_xml,'tab-layout-select'));
		$num = 0;
		$tab_title = array();
		$tab_content = array();
		$tab_title[$num] = find_xml_value($item_xml, 'title');
		if( !empty($tab_widget_title) ){
			if(is_front_page()){
				echo '<h2>'.$tab_widget_title.'</h2>';
			}else{
				echo '<h3 class="heading1 bg-div"><span class="inner"><strong>';
				echo  $tab_widget_title;
				echo '</strong><span class="bgr1"></span></span></h3>';
			}
		}
		if($tab_style == 'Horizontal'){
			echo '<div id="horizontal-tabs" class="tabs tab-area">';
		}else{
			echo '<div id="vertical-tabs" class="tabs tab-area">';
		}
		foreach($tab_xml->childNodes as $toggle_box){
			$tab_title[$num] = find_xml_value($toggle_box, 'title');
			$tab_content[$num] = html_entity_decode(find_xml_value($toggle_box, 'caption'));
			$num++;
		}
		
			echo "<ul class='cp-divider nav nav-tabs'>";
			for($i=0; $i<$num; $i++){
				echo '<li><a href="#' . str_replace(' ', '-', $tab_title[$i]) .$i. '" class=" cp-divider ';
				echo ( $i == 0 )? 'active':'';
				echo '" >' . $tab_title[$i] . '</a></li>';
			}
			echo "</ul>";
			
			echo "<ul class='contents tab-content'>";
			for($i=0; $i<$num; $i++){
				echo '<li id="' . str_replace(' ', '-', $tab_title[$i]) .$i. '" class="tabscontent ';
				echo ( $i == 0 )? 'active':'';  
				echo '" >' . do_shortcode($tab_content[$i]) . '</li>';
			}
			echo "</ul>";	
			echo "</div>";	
		
	}
	
	
	
	
	// Print column service
	function print_column_service($item_xml){		
		$html_readmore = '';
		$title = find_xml_value($item_xml, 'title');
		$fontaw = find_xml_value($item_xml, 'FontAwesome');
		$descrip = html_entity_decode(find_xml_value($item_xml, 'text'));
		$service_layout = find_xml_value($item_xml, 'service-layout');
		$service_style = find_xml_value($item_xml, 'services-style');
		$morelink = find_xml_value($item_xml, 'morelink');
		
		if($morelink <> ''){$html_readmore = '<a class="readmore" href="'.$morelink.'">'.__('Readmore','crunchpress').'</a>';}
		if ($service_style == 'Government'){
		echo '<div class="government-widgets-box government-color-1">
              <div class="cp_shap-box"><span class="'.$fontaw.'"></span></div>
              <strong><a href = "'.$morelink.'">'.$title.'</strong></a></div>';
		}else {
		//$thumbnail = wp_get_attachment_image_src( $image , array(300,110) );
		echo ' <div class="widget-box-inner">
              <div class="round"><a href="'.$morelink.'" class="inner"><i class="'.$fontaw.'"></i></a></div>
              <h2>'.$title.'</h2>
              <p>'.do_shortcode($descrip).'</p>
            </div>';
		}
	}

	// Print contact form
	function print_contact_form($item_xml){
		global $post,$counter;
		foreach ($_REQUEST as $keys=>$values) {
			$$keys = $values;
		}
		wp_register_script('contact-validation', CP_PATH_URL.'/frontend/js/jquery.validate.js', false, '1.0', true);
		wp_enqueue_script('contact-validation');
		
		?>
		<script type="text/javascript">
			function contact_submit(){
				jQuery("#submit_btn").hide();
				jQuery("#loading_div").html('<img src="<?php echo CP_PATH_URL?>/images/ajax_loading.gif" alt="Loading" />');
				jQuery.ajax({
					type:'POST', 
					url: '<?php echo CP_PATH_URL?>/contact_submit.php',
					data:jQuery('#form_contact').serialize(), 
					success: function(response) {
						//$('#frm').get(0).reset();
						jQuery("#loading_div").html('');
						jQuery("#frm_area").hide();
						jQuery("#succ_mess").show('');
						jQuery("#succ_mess").html(response);
					}
				});
			}
			jQuery(document).ready(function($) {
				$('#form_contact').validate();
				
			});
		</script>
		<?php
		$header = find_xml_value($item_xml, 'header');
		if(!empty($header)){
			echo '<h2 class="h-style">' . $header . '</h2><span class="border-line m-bottom"></span>';
		}
		?>
			<form class="contact-form" id="form_contact" action="javascript:contact_submit()" method="POST">
				<div id="succ_mess"></div>
				<div id="frm_area" class="form-list form-area">					
					<div class="form-left">
						<ul>
							<li class="user">
								<label><?php _e('Name','crunchpress');?></label>
								<input type="text" class="required require-field detail-input" value="" name="name_contact" />
							</li>
							<li class="mail">
								<label><?php _e('Email','crunchpress');?></label>
								<input type="text" class="required email require-field detail-input" value="" name="email_contact" />
							</li>
							<li class="web">
								<label><?php _e('Website','crunchpress');?></label>
								<input type="text" class="detail-input" value="" name="website" />
							</li>
						</ul>	
					</div>	
					<div class="form-right">
						<label><?php _e('Message','crunchpress');?></label>
						<textarea class="required require-field detail-textarea" name="message_comment" cols="10" rows="10"></textarea>
						<input type="submit" id="submit_btn" class="detail-btn-sumbit2" value="<?php echo __('Submit','crunchpress'); ?>">
					</div>
					<div id="loading_div" class=""></div>
					<div class="hide"><input type="hidden" name="receiver" value="<?php echo find_xml_value($item_xml, 'email'); ?>"></div>
					<div class="hide"><input type="hidden" name="successful_msg_contact" value="Your message has been submitted."></div>
					<div class="hide"><input type="hidden" name="un_successful_msg_contact" value="Please Provide Correct Information!"></div>
					<div class="hide"><input type="hidden" name="form_submitted" value="form_submitted"></div>
				</div>
			</form>
	<?php
		
	
	}
	
	//News Slider
	function print_news_slider_box($item_xml){
		global $counter;
		$header = find_xml_value($item_xml, 'header');
		$category = html_entity_decode(find_xml_value($item_xml, 'category'));
		$num_fetch = html_entity_decode(find_xml_value($item_xml, 'num-fetch'));
		if($category <> ''){
		wp_register_script('cp-bx-slider', CP_PATH_URL.'/frontend/js/bxslider.min.js', false, '1.0', true);
		wp_enqueue_script('cp-bx-slider');	
		wp_enqueue_style('cp-bx-slider',CP_PATH_URL.'/frontend/css/bxslider.css');
		?>
		<script type="text/javascript">
        jQuery(document).ready(function($) {
			$('#news_slider-<?php echo $counter;?>').bxSlider({  minSlides: 1, maxSlides: 1, slideMargin: 18,  speed: 500, });
        });
        </script>
         <!-- Content -->
			<div id="news" class="blog_class">
			<?php if($header <> ''){?><h2 class="title"><?php echo $header;?><span class="h-line"></span></h2><?php }?>
				<ul class="news_slider" id="news_slider-<?php echo $counter;?>">
				<?php
			global $post;
				query_posts(array( 
				'post_type' => 'post',
				'showposts' => $num_fetch,
				'tax_query' => array(
					array(
						'taxonomy' => 'category',
						'terms' => $category,
						'field' => 'term_id',
					)
				),
				'orderby' => 'title',
				'order' => 'DESC' )
			);
			$counter_team = 0; 
			if ( have_posts() <> "" ) {
				while( have_posts() ){
					the_post();
					global $post; ?>
					<li> 
						<div class="span5 first" id="img_holder"> 
							<div class="img">
								<?php $size = array(260,220); echo function_library::cp_thumb_size($post->ID,$size);?>
							</div>
							<div class="img_title"> 
							<a> <i class="fa fa-plus"></i> </a>
							<a href="<?php echo get_permalink();?>"><?php echo get_the_title();?></a> 
							<p><?php echo strip_tags(substr(get_the_content(),0,10));?></p>
							</div>
						</div>
						<div class="span7 ns_desc"> 
							<a href="<?php echo get_permalink();?>" class="title"><?php echo get_the_title();?>  <span class="h-line"></span> </a> 
							<p><?php echo strip_tags(substr(get_the_content(),0,130));?></p>
							<a href="<?php echo get_permalink()?>" class="rm"><?php _e('View All News &nbsp;','crunchpress');?><i class="fa fa-plus"></i></a>
						</div> 
					</li>
					<?php } //End while loop
				} //Check Post Condition Ends?>
				</ul>
			</div>
        <?php
		} //if Category Empty
	}
	
	//News Headline Function Starts Here
	function print_news_headline($item_xml){

		global $counter;
		//Fetch All Elements from Element
		$header = find_xml_value($item_xml, 'header');
		$category = html_entity_decode(find_xml_value($item_xml, 'category'));
		$num_fetch = html_entity_decode(find_xml_value($item_xml, 'num-fetch'));
		
		//Condition For Category
		if($category <> ''){
			
			?>
			<!--Runs the Slider Script here -->
			<script type="text/javascript">
				jQuery(document).ready(function($) {
					$('#news_slider-<?php echo $counter;?>').bxSlider({  minSlides: 1, maxSlides: 1, slideMargin: 18,  speed: 500, });
				});
			</script>
			 <!-- News Content Start -->
				<div id="news" class="blog_class">
				<?php if($header <> ''){?><h2 class="title"><?php echo $header;?><span class="h-line"></span></h2><?php }?>
					<ul class="news_slider" id="news_slider-<?php echo $counter;?>">
					<?php
					
					//Arguments for Loop
					global $post;
					query_posts(array( 
						'post_type' => 'post',
						'showposts' => $num_fetch,
						'tax_query' => array(
							array(
								'taxonomy' => 'category',
								'terms' => $category,
								'field' => 'term_id',
							)
						),
						'orderby' => 'title',
						'order' => 'DESC' )
					);
					if ( have_posts() <> "" ) {
						while ( have_posts() ): the_post();?>
						<li> 
							<div class="span5 first" id="img_holder"> 
								<div class="img">
								<?php $size = array(260,220); echo function_library::cp_thumb_size($post->ID,$size);?>
								</div>
								<div class="img_title"> 
								<a> <i class="fa fa-plus"></i> </a>
								<a href="<?php echo get_permalink();?>"><?php echo get_the_title();?></a> 
								<p><?php echo strip_tags(substr(get_the_content(),0,10));?></p>
								</div>
							</div>
							<div class="span7 ns_desc"> 
								<a href="<?php echo get_permalink();?>" class="title"><?php echo get_the_title();?>  <span class="h-line"></span> </a> 
								<p><?php echo strip_tags(substr(get_the_content(),0,130));?></p>
								<a href="<?php echo get_permalink()?>" class="rm"><?php _e('View All News &nbsp;','crunchpress');?><i class="fa fa-plus"></i></a>
							</div> 
						</li>
						<?php endwhile;
					}	
						?>
					</ul>
				</div>
			<?php
		} //if Category Empty
	} //News Headline Function Ends Here

	
	// Print text widget
	function print_text_widget($item_xml){
		
		$title = find_xml_value($item_xml, 'title');
		$caption = html_entity_decode(find_xml_value($item_xml, 'caption'));
		$button_title =  find_xml_value($item_xml, 'button-title');
		echo '<div class="text-widget-wrapper"><div class="text-widget-content-wrapper ';   
		echo empty($button_title)? 'sixteen columns': 'twelve columns';
		echo ' mt0"><h3 class="text-widget-title">' . $title . '</h3>';
		echo '<div class="text-widget-caption">' . do_shortcode($caption) . '</div>';
		echo '</div>';
		if( !empty($button_title) ){
			$button_margin = (int) find_xml_value($item_xml, 'button-top-margin');
			echo '<div class="text-widget-button-wrapper three columns mt0" >';
			echo '<a class="text-widget-button" style="position:relative; top:' . $button_margin . 'px;" href="' . find_xml_value($item_xml, 'button-link') . '" >';
			echo  $button_title . '</a>';
			echo '</div> '; 
			echo '<br class="clear">';
		}  echo '</div>';
		
	}
	

	// size is when no sidebar, side2 is use when 1 sidebar, side 3 is use when 3 sidebar
	if( $cp_is_responsive ){
		$port_div_size_num_class = array(
			"1/4" => array("class"=>"four columns", "size"=>"390x224", "size2"=>"390x245", "size3"=>"390x247"), 
			"1/3" => array("class"=>"one-third column", "size"=>"390x242", "size2"=>"390x238", "size3"=>"390x247"), 
			"1/2" => array("class"=>"eight columns", "size"=>"450x290", "size2"=>"390x247", "size3"=>"390x247"), 
			"1/1" => array("class"=>"sixteen columns", "size"=>"620x225", "size2"=>"390x182", "size3"=>"390x292"));	
	}else{
		$port_div_size_num_class = array(
			"1/4" => array("class"=>"four columns", "size"=>"210x121", "size2"=>"135x85", "size3"=>"210x135"), 
			"1/3" => array("class"=>"one-third column", "size"=>"290x180", "size2"=>"190x116", "size3"=>"210x135"), 
			"1/2" => array("class"=>"eight columns", "size"=>"450x290", "size2"=>"300x190", "size3"=>"210x135"), 
			"1/1" => array("class"=>"sixteen columns", "size"=>"620x225", "size2"=>"320x150", "size3"=>"180x135"));
	}
	$class_to_num = array(
		"element1-4" => 0.25,
		"1/4"=>0.25,
		"element1-3" => 0.33,
		"1/3"=>0.33,
		"element1-2" => 0.5,
		"1/2"=>0.5,
		"element2-3" => 0.66,
		"2/3"=>0.66,
		"element3-4" => 0.75,
		"3/4"=>0.75,
		"element1-1" => 1,
		"1/1" => 1	
	);
	

	// Print nested page
	function print_page_item($item_xml){		
		
		global $paged;
		global $sidebar;
		global $port_div_size_num_class;	
		global $class_to_num;
		if(empty($paged)){
			$paged = (get_query_var('page')) ? get_query_var('page') : 1; 
		}
	
		// get the item class and size from array
		$port_size = find_xml_value($item_xml, 'item-size');
		
		// get the item class and size from array
		$item_class = $port_div_size_num_class[$port_size]['class'];
		if( $sidebar == "no-sidebar" ){
			$item_size = $port_div_size_num_class[$port_size]['size'];
		}else if ( $sidebar == "left-sidebar" || $sidebar == "right-sidebar" ){
			$item_size = $port_div_size_num_class[$port_size]['size2'];
		}else{
			$item_size = $port_div_size_num_class[$port_size]['size3'];
		}

		// get the page meta value
		$header = find_xml_value($item_xml, 'header');
		$num_fetch = find_xml_value($item_xml, 'num-fetch');
		$num_excerpt = find_xml_value($item_xml, 'num-excerpt');	

		// page header
		if(!empty($header)){
			echo '<h2><span class="txt-left">' . $header . '</span> <span class="bg-right"></span></h2>';
		}
		global $post;
		$post_temp = query_posts(array('post_type'=>'page', 'paged'=>$paged, 'post_parent'=>$post->ID, 'posts_per_page'=>$num_fetch ));
		// get the portfolio size
		$port_wrapper_size = $class_to_num[find_xml_value($item_xml, 'size')];
		$port_current_size = 0;
		$port_size =  $class_to_num[$port_size];
		
		$port_num_have_bottom = sizeof($post_temp) % (int)($port_wrapper_size/$port_size);
		$port_num_have_bottom = ( $port_num_have_bottom == 0 )? (int)($port_wrapper_size/$port_size): $port_num_have_bottom;
		$port_num_have_bottom = sizeof($post_temp) - $port_num_have_bottom;
		
		echo '<section id="portfolio-item-holder" class="portfolio-item-holder">';
		while( have_posts() ){
			the_post();
			// start printing data
			echo '<figure class="' . $item_class . ' mt0 pt25 portfolio-item">'; 
			$image_type = get_post_meta( $post->ID, 'post-option-featured-image-type', true);
			$image_type = empty($image_type)? "Link to Current Post": $image_type; 
			$thumbnail_id = get_post_thumbnail_id();
			$thumbnail = wp_get_attachment_image_src( $thumbnail_id , $item_size );
			$alt_text = get_post_meta($thumbnail_id , '_wp_attachment_image_alt', true);
			
			$hover_thumb = "hover-link";
			$pretty_photo = "";
			$permalink = get_permalink();
			

			if( !empty($thumbnail[0]) ){
				echo '<div class="portfolio-thumbnail-image">';
				echo '<div class="overflow-hidden">';
				echo '<a href="' . $permalink . '" ' . $pretty_photo . ' title="' . get_the_title() . '">';
				echo '<span class="portfolio-thumbnail-image-hover">';
				echo '<span class="' . $hover_thumb . '"></span>';
				echo '</span>';
				echo '</a>';
				echo '<img src="' . $thumbnail[0] .'" alt="'. $alt_text .'"/>';
				echo '</div>'; //overflow hidden
				echo '</div>'; //portfolio thumbnail image						
			}
			
			
			echo '<div class="portfolio-thumbnail-context">';
			// page title
			if( find_xml_value($item_xml, "show-title") == "Yes" ){
				echo '<h2 class="heading portfolio-thumbnail-title port-title-color cp-title"><a href="' . get_permalink() . '">' . get_the_title() . '</a></h2>';
			}
			// page excerpt
			if( find_xml_value($item_xml, "show-excerpt") == "Yes" ){			
				echo '<div class="portfolio-thumbnail-content">' . mb_substr( get_the_excerpt(), 0, $num_excerpt ) . '</div>';
			}
			// read more button
			if( find_xml_value($item_xml, "read-more") == "Yes" ){
				echo '<a href="' . get_permalink() . '" class="portfolio-read-more cp-button">' . __('Read More','crunchpress') . '</a>';
			}
			echo '</div>';
			// print space if not last line
			if($port_current_size < $port_num_have_bottom){
				echo '<div class="portfolio-bottom"></div>';
				$port_current_size++;
			}
			echo '</figure>';

		}

		echo "</section>";
		echo '<div class="clear"></div>';
		if( find_xml_value($item_xml, "pagination") == "Yes" ){	
			pagination();
		}		
		
	}
	
	//Donation Box
	function print_donate_item($item_xml){
		$header = find_xml_value($item_xml, 'header');
		$description = find_xml_value($item_xml, 'description');
		$donate_button = find_xml_value($item_xml, 'donate_button_text');
		$button_link = find_xml_value($item_xml, 'button-link');
	?>
	<section id="donation_box">	
		<div class="donation_box">
			<figure class="span10">
				<?php echo $description;?>
			</figure>
			<figure class="span2">
					<a href="<?php echo $button_link;?>" class="donate-now btn btn-large dropdown-toggle" type="submit"><?php echo $donate_button;?></a>
			</figure>
		</div>
	</section>
	<?php }
	
	
	//Crowd Funding Functions to Fetch Products
	function print_funds_item_item($item_xml){ 
		$header = find_xml_value($item_xml, 'header');
		$project = find_xml_value($item_xml, 'project');
		
		//Condition to check Projects are not empty
		if($project <> ''){
			//Fetch All elements here
			$ign_fund_goal = get_post_meta($project, 'ign_fund_goal', true);
			$ign_project_id = get_post_meta($project, 'ign_project_id', true);
			$ign_product_image1 = get_post_meta($project, 'ign_product_image1', true);
			$ignition_date = get_post_meta($project, 'ign_fund_end', true);
			$ignition_datee = date('d-m-Y h:i:s',strtotime($ignition_date));
			
			$getPledge_cp = getPledge_cp($ign_project_id);
			$current_date = date('d-m-Y h:i:s');
			$project_date = new DateTime($ignition_datee);
			$current = new DateTime($current_date);
			
			$days = round(($project_date->format('U') - $current->format('U')) / (60*60*24));

		?>
		<div id="charity_progress">
			<h3><a href="<?php echo get_permalink($project);?>"><?php echo get_the_title($project);?></a></h3>
			<div id="charity_process_inner">
				<div class="span4 img first">
					<img src="<?php echo $ign_product_image1;?>" alt="<?php echo get_the_title($project);?>"/>
				</div>
				<div class="span8 progress_report">
				<h2> <?php _e('$','crunchpress');?><?php echo getTotalProductFund_cp($ign_project_id);?> </h2>
				<h4><?php _e('Pledged of','crunchpress');?> <?php _e('$','crunchpress');?><?php echo $ign_fund_goal;?> <?php _e('Goal','crunchpress');?></h4>
					<div class="progress progress-striped active">  
						<div style="width:<?php echo getPercentRaised_cp($ign_project_id);?>%;" class="bar p80"></div>    
					</div>
					  <div class="info"> 
							<div class="span6 first">
								<i class="fa fa-user"></i> <span> <?php echo $getPledge_cp[0]->p_number;?></span> <?php _e('Pledgers','crunchpress');?>
							</div>
							<div class="span6 ntr">
								<i class="fa fa-calendar-empty"></i> <span> <?php echo $days;?></span> <?php _e('Days Left','crunchpress');?>
							</div>
					  </div>
				</div>
			</div>
		</div>	
	<?php
		}// Condition Ends Here
	} // Function ends here
	
	//WooCommerece Feature Products
	function print_woo_product_feature_item($item_xml){ 
		global $counter;
		$header = find_xml_value($item_xml, 'header');
		$category = find_xml_value($item_xml, 'category');
		$num_fetch = find_xml_value($item_xml, 'num-fetch');
		
		//BX Slider Scripts
		wp_register_script('cp-bx-slider', CP_PATH_URL.'/frontend/js/bxslider.min.js', false, '1.0', true);
		wp_enqueue_script('cp-bx-slider');	
		wp_enqueue_style('cp-bx-slider',CP_PATH_URL.'/frontend/css/bxslider.css');
	?>
		<script type="text/javascript">
		//Run Bx Slider
		jQuery(document).ready(function ($) {
			$('#shop_slider-<?php echo $counter;?>').bxSlider({
				slideWidth: 140,
				minSlides: 1,
				maxSlides: 3,
				slideMargin: 28
			});
		});	
		</script>
		<figure id="blog_store">
			<?php if($header <> ''){?><h2 class="title"> <?php echo $header;?><span class="h-line"></span></h2><?php }?>
			<div class="slider_shop" id="slider_shop">
				<ul class="shop_slider" id="shop_slider-<?php echo $counter;?>">
				<?php
		
			
					$counter_team = 0; 
					query_posts(array( 
						'post_type' => 'product',
						'showposts' => $num_fetch,
						'tax_query' => array(
							array(
								'taxonomy' => 'product_cat',
								'terms' => $category,
								'field' => 'term_id',
							)
						),
						'orderby' => 'title',
						'order' => 'DESC' )
					);
					while( have_posts() ){
					the_post();
					$currency = '';
					global $post,$product,$product_url;
						$regular_price = get_post_meta($post->ID, '_regular_price', true);
						if($regular_price == ''){
							$regular_price = get_post_meta($post->ID, '_max_variation_regular_price', true);
						}
						$sale_price = get_post_meta($post->ID, '_sale_price', true);
						if($sale_price == ''){
							$sale_price = get_post_meta($post->ID, '_min_variation_sale_price', true);
						}
						if(function_exists('get_woocommerce_currency_symbol')){
							$currency = get_woocommerce_currency_symbol();
						}
					?>
					<li> 
						<div class="img">
							<a href="<?php echo get_permalink();?>">
								<?php $size = array(260,220); echo function_library::cp_thumb_size($post->ID,$size);?>
							</a>
						</div>
						<div class="price_cart"><span class="price"><?php echo $currency;?><?php echo $sale_price;?></span><a href="<?php echo get_permalink();?>&add-to-cart=<?php echo $post->ID;?>"><i class="fa fa-shopping-cart"></i></a></div>
					</li>
					<?php } ?>
				</ul>
			</div>
		</figure>
	<?php
	}
	
	//News Bar Under Slider
	function news_bar_frontpage($news_button,$news_title,$news_category){

		//BX Slider Scripts
		wp_register_script('cp-bx-slider', CP_PATH_URL.'/frontend/js/bxslider.min.js', false, '1.0', true);
		wp_enqueue_script('cp-bx-slider');	
		wp_enqueue_style('cp-bx-slider',CP_PATH_URL.'/frontend/css/bxslider.css'); ?>
		<script type="text/javascript">
		//Run Bx Slider
		jQuery(document).ready(function ($) {
			$('#slider12').bxSlider({
			pager:false,
			});
		});	
		</script>
		<?php
		$args = array(
			'cat' => $news_category, 
			'posts_per_page'   => 5,
			'orderby'          => 'post_date',
			'order'            => 'DESC',
		);
		// Retrieve posts
		$post_list = get_posts( $args );
		//News Title
		if($news_title <> ''){ ?><strong class="news-title"><?php echo $news_title;?></strong><?php }else{ ?><strong class="news-title"><?php _e('Dont miss','crunchpress');?></strong><?php } ?>
		<div id="ticker" class="ticker ">
			<div id="slider12">
				<?php
				//Arguments for Loop
				foreach($post_list as $post){ ?>
						<div class="slide">
							<p><?php echo $post->post_title;?> — 
								<em><?php echo htmlspecialchars(strip_tags(substr($post->post_content,0,120)));?>,…</em>
							</p>
						</div>
					<?php
				} //If Posts Condition Ends
				?>
			</div>						
		</div> <!-- End News Ticker & Share-search bar -->
		<?php
		wp_reset_query();
		wp_reset_postdata();
	}	//Function ends Here

	
	
	
	