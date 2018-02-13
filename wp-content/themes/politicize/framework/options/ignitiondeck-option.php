<?php

	/*	
	*	Crunchpress Portfolio Option File
	*	---------------------------------------------------------------------
	* 	@version	1.0
	* 	@author		Crunchpress
	* 	@link		http://crunchpress.com
	* 	@copyright	Copyright (c) Crunchpress
	*	---------------------------------------------------------------------
	*	This file create and contains the portfolio post_type meta elements
	*	---------------------------------------------------------------------
	*/
	
	//FRONT END RECIPE LAYOUT
	$wooproduct_class = array("Full-Image" => array("index"=>"1", "class"=>"sixteen ", "size"=>array(1170,420), "size2"=>array(770, 400), "size3"=>array(570,300)));

	
	// Print Crowd Funding item
	function print_ignition_item($item_xml){
		wp_reset_query();
		global $paged,$sidebar,$wooproduct_class,$post,$wp_query,$counter;
		if(empty($paged)){
			$paged = (get_query_var('page')) ? get_query_var('page') : 1; 
		}
		$sidebar_class = '';
		$layout_set_ajax = '';
		$item_type = 'Full-Image';
		// get the item class and size from array
		$item_class = $wooproduct_class[$item_type]['class'];
		$item_index = $wooproduct_class[$item_type]['index'];
		$full_content = find_xml_value($item_xml, 'show-full-news-post');
		if( $sidebar == "no-sidebar" ){
			$item_size = $wooproduct_class[$item_type]['size'];
			$sidebar_class = 'no_sidebar';
		}else if ( $sidebar == "left-sidebar" || $sidebar == "right-sidebar" ){
			$sidebar_class = 'one_sidebar';
			$item_size = $wooproduct_class[$item_type]['size2'];
		}else{
			$sidebar_class = 'two_sidebar';
			$item_size = $wooproduct_class[$item_type]['size3'];
		}
		
				
		// get the product meta value
		$header = find_xml_value($item_xml, 'header');
		$category = find_xml_value($item_xml, 'category');
		$num_fetch = find_xml_value($item_xml, 'num-fetch');
		$num_excerpt = find_xml_value($item_xml, 'num-excerpt');
		$style = find_xml_value($item_xml, 'style');		
		$pagination = find_xml_value($item_xml, 'pagination');
		$category_name = '';

		$quan = array();
		$quantity = '';
		$total = '';
		$currency = '';
		
		if(($style == 'List Style') ||($style == 'Grid Style')){
			if($header <> ''){
		echo '<div class="heading-style-1">
          <h2>'.$header.'</h2>
        </div>';
			}else {}
		}else{
			if($header <> ''){ echo '<h2 class="">' .$header. '</h2>'; } 
		}
		?>
		
		<div class = "causes-listing causes-challenges causes-col list_view_project">
			<div class="row-fluid">
			<?php
				if($category == '0'){
					query_posts(array(
						'posts_per_page'=> $num_fetch,
						'paged'			=> $paged,
						'post_type'   	=> 'ignition_product',
						'post_status'	=> 'publish',
						'order'			=> 'DESC',
					));
				}else{
					query_posts(array(
						'posts_per_page'=> $num_fetch,
						'paged'	=> $paged,
						'post_type'   => 'ignition_product',
						'tax_query' => array(
								array(
									'taxonomy' => 'project_category',
									'field' => 'term_id',
									'terms' => $category
								)
						),
						'post_status'   => 'publish',
						'order'			=> 'DESC',
					));
				}
				$counter_ignition = 0;
				while( have_posts() ){
					global $post;
					the_post();	
					
					$ignition_date = get_post_meta($post->ID, 'ign_fund_end', true);
					$ignition_datee = date('d-m-Y h:i:s',strtotime($ignition_date));
					
					$ign_project_id = get_post_meta($post->ID, 'ign_project_id', true);
					
					$ign_fund_goal = get_post_meta($post->ID, 'ign_fund_goal', true);
					
					$ign_product_image1 = get_post_meta($post->ID, 'ign_product_image1', true);
					
					$getPledge_cp = getPledge_cp($ign_project_id);
					$current_date = date('d-m-Y h:i:s');
					$project_date = new DateTime($ignition_datee);
					$current = new DateTime($current_date);
					$days = round(($project_date->format('U') - $current->format('U')) / (60*60*24));
					$item_class = '';
					if($counter_ignition % 3 == 0){ $item_class = 'first';}else{$item_class = "";}$counter_ignition++; ?>
					<!--Crowdfunding START-->
					<?php if($style == 'Grid Style'){?>
					<div class="span4 <?php echo $item_class;?>">
						<div class="thumb"><a href="<?php echo get_permalink();?>"><?php echo get_the_post_thumbnail($post->ID, array(570,300));?></a></div>
						<div class="text-box">
						<div class = "project_content">
						  <h3><a href="<?php echo get_permalink();?>"><?php echo get_the_title();?></a></h3>
						  <a class="name" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><i class="fa fa-user"></i><?php _e('Posted By: ','crunchpress');?> <?php the_author(); ?></a>
						  <div class = "projects_comments">
							 <?php
								//Get Post Comment 
								comments_popup_link( __('<i class="fa fa-comments-o"></i> 0 Comment','crunchpress'),
								__('<i class="fa fa-comments-o"></i> 1 Comment','crunchpress'),
								__('<i class="fa fa-comments-o"></i> % Comments','crunchpress'), '',
								__('<i class="fa fa-comments-o"></i> Comments are off','crunchpress') );										
								?>
						  </div>
						  <p><?php echo strip_shortcodes(strip_tags(substr(get_the_content(), 0 , $num_excerpt)));?>
							<a href="<?php echo get_permalink();?>" class="detail-btn"><?php _e('Read More','crunchpress');?></a>
						  </p>
						</div>
						  <div class="cp_donation-details-2">
							<div class="cp_progress-box-2">
							  <div class="progress progress-info">
								<div style="width: <?php echo getPercentRaised_cp($ign_project_id);?>%" class="bar"><span><?php echo getPercentRaised_cp($ign_project_id);?>%</span></div>
							  </div>
							  <span class="pull-left">$<?php echo getTotalProductFund_cp($ign_project_id);?> <?php _e('Raised','crunchpress');?></span> <span class="pull-right">$<?php echo $ign_fund_goal; ?> <?php _e('Goal','crunchpress');?></span> </div>
							<div class="cp_donation-details">
							  <ul>
								<li><?php echo getPercentRaised_cp($ign_project_id);?>%<span><?php _e('Donated','crunchpress');?></span></li>
								<li><?php echo $getPledge_cp[0]->p_number;?><span><?php _e('Pledgers','crunchpress');?></span></li>
								<!-- <li>176<span>Backers</span></li>
								<li>96<span>Days Remain</span></li>-->
								<?php 
								if($days < 1){ ?>
									<li class="btn-detail" href="<?php echo getProjectURLfromType($ign_project_id, "purchaseform");?>"><?php _e('Fund Raising','crunchpress');?></li>
								<?php }else{ ?>
									<li class="btn-detail" href="<?php echo getProjectURLfromType($ign_project_id, "purchaseform");?>"><?php echo $days;?><span><?php _e('Days Remain','crunchpress');?></span></li>
								<?php } ?>
							</ul>
							</div>
						  </div>
						
						  <a class="btn-project" href="<?php echo get_permalink();?>"><?php _e('Back this Project','crunchpress');?></a></div>
					</div>
					<?php }else { ?>	
						<div class="causes-listing  causes-challenges">
							<ul>
								<li>
									  <div class="span4">
										<div class="thumb"><a href="<?php echo get_permalink();?>"><?php echo get_the_post_thumbnail($post->ID, array(614,614));?></a></div>
									  </div>
									  <div class="span8">
										<div class="text-box">									
											<h3><a href="<?php echo get_permalink();?>"><?php echo get_the_title();?></a></h3>
											<a class="name" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><i class="fa fa-user"></i><?php _e('Posted By: ','crunchpress');?> <?php the_author(); ?></a>
											<div class = "projects_comments">
												<?php
													//Get Post Comment 
													comments_popup_link( __('<i class="fa fa-comments-o"></i> 0 Comment','crunchpress'),
													__('<i class="fa fa-comments-o"></i> 1 Comment','crunchpress'),
													__('<i class="fa fa-comments-o"></i> % Comments','crunchpress'), '',
													__('<i class="fa fa-comments-o"></i> Comments are off','crunchpress') );										
												?>	
											</div>
											<p><?php echo strip_shortcodes(strip_tags(substr(get_the_content(), 0 , $num_excerpt)));?>
												<a href="<?php echo get_permalink();?>" class="detail-btn"><?php _e('Read More','crunchpress');?></a>
											</p>
											<div class="cp_donation-details-2">
												<div class="cp_progress-box-2">
												  <div class="progress progress-info">
													<div style="width: <?php echo getPercentRaised_cp($ign_project_id);?>%" class="bar"><span><?php echo getPercentRaised_cp($ign_project_id);?>%</span></div>
												  </div>
												  <span class="pull-left">$<?php echo getTotalProductFund_cp($ign_project_id);?> <?php _e('Raised','crunchpress');?></span> <span class="pull-right">$<?php echo $ign_fund_goal; ?> <?php _e('Goal','crunchpress');?></span> </div>
												<div class="cp_donation-details">
												  <ul>
													<li><?php echo getPercentRaised_cp($ign_project_id);?>%<span><?php _e('Donated','crunchpress');?></span></li>
													<li><?php echo $getPledge_cp[0]->p_number;?><span><?php _e('Pledgers','crunchpress');?></span></li>
													<!--<li>176<span>Backers</span></li>-->
													<?php 
														if($days < 1){ ?>
															<li class="btn-detail" href="<?php echo getProjectURLfromType($ign_project_id, "purchaseform");?>"><?php _e('Fund Raising','crunchpress');?></li>
														<?php }else{ ?>
															<li class="btn-detail" href="<?php echo getProjectURLfromType($ign_project_id, "purchaseform");?>"><?php echo $days;?><span><?php _e('Days Remain','crunchpress');?></span></li>
														<?php } ?>
												  </ul>
												</div>
											
											</div>
										  <a class="btn-project" href="<?php echo get_permalink();?>"><?php _e('Back this Project','crunchpress');?></a> 
										</div>
									  </div>
								</li>
							 </ul>
						</div>
				<?php } ?>
				<!--Crowdfunding END-->
				<?php
				}
				wp_reset_query();
				wp_reset_postdata();// End While 
				?>
			</div>	<!--Crowdfunding ROW END-->
		</div>			
		<div class="clear"></div>
		<?php
		if( find_xml_value($item_xml, "pagination") == "Yes"){	
			pagination();
		}	
	 }	
	 
	 // Print Crowd Funding Slider
	function print_ignition_slider_item($item_xml){
		wp_reset_query();
		global $paged,$sidebar,$wooproduct_class,$post,$wp_query,$counter;
		if(empty($paged)){
			$paged = (get_query_var('page')) ? get_query_var('page') : 1; 
		}
	
		// get the Crowd Slider meta value
		$header = find_xml_value($item_xml, 'header');
		$category = find_xml_value($item_xml, 'category');
		$num_fetch = find_xml_value($item_xml, 'num-fetch');
		
		if($category == '0'){
			query_posts(array(
				'posts_per_page'=> $num_fetch,
				'paged'			=> $paged,
				'post_type'   	=> 'ignition_product',
				'post_status'	=> 'publish',
				'order'			=> 'DESC',
			));
		}else{
			query_posts(array(
				'posts_per_page'=> $num_fetch,
				'paged'	=> $paged,
				'post_type'   => 'ignition_product',
				'tax_query' => array(
						array(
							'taxonomy' => 'project_category',
							'field' => 'term_id',
							'terms' => $category
						)
				),
				'post_status'   => 'publish',
				'order'			=> 'DESC',
			));
		}
		$counter_ignition = 0;

		 //Bx Slider Script Calling
			// wp_register_script('cp-bx-slider', CP_PATH_URL.'/frontend/js/bxslider.min.js', false, '1.0', true);
			// wp_enqueue_script('cp-bx-slider');	
			// wp_register_script('jquery.bxslider', CP_PATH_URL.'/frontend/js/jquery.bxslider.js', false, '1.0', true);
			// wp_enqueue_script('jquery.bxslider');	
			// wp_enqueue_style('cp-bx-slider',CP_PATH_URL.'/frontend/css/bxslider.css');
		?>
		<script type="text/javascript">
			jQuery(document).ready(function ($) {
					"use strict";
					 if ($('#donation-slider-<?php echo $counter; ?>').length) {
							$('#donation-slider-<?php echo $counter; ?>').bxSlider({
								infiniteLoop: true,
								mode: 'fade',
								auto: true,
								controls:true,
								hideControlOnEnd: false
							});
						}
				});
		</script>
				<div class = "causes-listing causes-challenges causes-col">
					<div class="row-fluid">
					 <section class="cp_donation-slider">
						<div class="container">
							<ul id="donation-slider-<?php echo $counter; ?>">
								<?php 
								while( have_posts() ){
								global $post;
								the_post();	
								
								$ignition_date = get_post_meta($post->ID, 'ign_fund_end', true);
								$ignition_datee = date('d-m-Y h:i:s',strtotime($ignition_date));
								
								$ign_project_id = get_post_meta($post->ID, 'ign_project_id', true);
								
								$ign_fund_goal = get_post_meta($post->ID, 'ign_fund_goal', true);
								
								$ign_product_image1 = get_post_meta($post->ID, 'ign_product_image1', true);
								
								$getPledge_cp = getPledge_cp($ign_project_id);
								$current_date = date('d-m-Y h:i:s');
								$project_date = new DateTime($ignition_datee);
								$current = new DateTime($current_date);
								$days = round(($project_date->format('U') - $current->format('U')) / (60*60*24));
								?>
								
								  <li> <?php echo get_the_post_thumbnail($post->ID, array(1170,450));?>
									<div class="caption">
									  <div class="cp_donation-box">
										<h2><a href = "<?php echo get_permalink();?>"><?php echo get_the_title();?></a></h2>
										<!--<strong class="title">Help for disabled people to make shelter homes</strong>-->
										<ul>
										  <li> <a class="name" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><i class="fa fa-user"></i><?php _e('Posted By: ','crunchpress');?> <?php the_author(); ?></a></li>
										  <li><?php the_tags('<i class="fa fa-tags"></i>',' ',' ');?></li>
										 <!--<li><a href="#"><i class="fa fa-map-marker"></i>New York, South Africa, Albania, Sweden</a></li>-->
										 <?php
											//Get Post Comment 
											comments_popup_link( __('<i class="fa fa-comments-o"></i> 0 Comment','crunchpress'),
											__('<i class="fa fa-comments-o"></i> 1 Comment','crunchpress'),
											__('<i class="fa fa-comments-o"></i> % Comments','crunchpress'), '',
											__('<i class="fa fa-comments-o"></i> Comments are off','crunchpress') );										
										?>	
										</ul>
										<p><?php echo strip_shortcodes(strip_tags(substr(get_the_content(), 0 , 225))) .'...';?>
											<!--<a href="<?php echo get_permalink();?>" class="detail-btn"><?php _e('Read More','crunchpress');?></a>-->
										</p>
										<div class="cp_progress-box">
										  <div class="progress progress-info">
											<div class="bar" style="width: <?php echo getPercentRaised_cp($ign_project_id);?>%"></div>
										  </div>
										</div>
										<div class="cp_donation-details">
										  <ul>
											<li><?php echo getPercentRaised_cp($ign_project_id);?>%<span><?php _e('Donated','crunchpress');?></span></li>
											<li><?php echo $getPledge_cp[0]->p_number;?><span><?php _e('Pledgers','crunchpress');?></span></li>
											<!--<li>176<span>Backers</span></li>
											<li>96<span>Days Remain</span></li>-->
											<?php 
											if($days < 1){ ?>
												<li class="btn-detail" href="<?php echo getProjectURLfromType($ign_project_id, "purchaseform");?>"><?php _e('Fund Raising','crunchpress');?></li>
											<?php }else{ ?>
												<li class="btn-detail" href="<?php echo getProjectURLfromType($ign_project_id, "purchaseform");?>"><?php echo $days;?><span><?php _e('Days Remain','crunchpress');?></span></li>
											<?php } ?>
										  </ul>
										</div>
										<a href="<?php echo get_permalink();?>" class="btn-donate"><?php _e('Donate Now','crunchpress');?></a> </div>
									</div>
								  </li>
							<?php } // End While
								wp_reset_query();
								wp_reset_postdata();
							?>
							</ul>
						</div>
				</section>
				<!--Crowdfunding END-->
				<?php
				 //end if
				?>
			</div>	<!--Crowdfunding ROW END-->
		</div>			
		
		<?php
		if( find_xml_value($item_xml, "pagination") == "Yes"){	
			pagination();
		}	
	 }	

	function getTotalProductFund_cp($productid) {
		global $wpdb;		
		
		$sql = "Select SUM(prod_price) AS prod_price from ".$wpdb->prefix . "ign_pay_info where product_id='".$productid."'";
		
		$result = $wpdb->get_row($sql);
		if ($result->prod_price != NULL || $result->prod_price != 0)
			return $result->prod_price;
		else
			return 0;
	}

	function getProjectGoal_cp($project_id) {
		global $wpdb;
		$goal_return = array('');
		$goal_query = $wpdb->prepare('SELECT goal FROM '.$wpdb->prefix.'ign_products WHERE id=%d', $project_id);
		$goal_return = $wpdb->get_row($goal_query);
		if($goal_return <> ''){
			return $goal_return->goal;
		}
	}
	function getPledge_cp($project_id) {
		global $wpdb;

		$p_query = "SELECT count(*) as p_number FROM ".$wpdb->prefix . "ign_pay_info where product_id='".$project_id."'";
		//$goal_query = $wpdb->prepare('SELECT goal FROM '.$wpdb->prefix.'ign_products WHERE id=%d', $project_id);
		$p_counts = $wpdb->get_results($p_query);
		return $p_counts;
	}


	function getPercentRaised_cp($project_id) {
		global $wpdb;
		$total = getTotalProductFund_cp($project_id);
		$goal = getProjectGoal_cp($project_id);
		$percent = 0;
		if ($total > 0) {
			$percent = number_format($total/$goal*100, 2, '.', '');
		}
		return $percent;
	}
	
?>