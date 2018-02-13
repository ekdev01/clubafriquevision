<?php 
 	//Fetch the theme Option Values
	$maintenance_mode = get_themeoption_value('maintenance_mode','general_settings');
	$maintenace_title = get_themeoption_value('maintenace_title','general_settings');
	$countdown_time = get_themeoption_value('countdown_time','general_settings');
	$email_mainte = get_themeoption_value('email_mainte','general_settings');
	$mainte_description = get_themeoption_value('mainte_description','general_settings');
	$social_icons_mainte = get_themeoption_value('social_icons_mainte','general_settings');
	
	if($maintenance_mode <> 'disable'){
		//If Logged in then Remove Maintenance Page
		if ( is_user_logged_in() ) {
			$maintenance_mode = 'disable';
		} else {
			$maintenance_mode = 'enable';
		}
	}
	
	if($maintenance_mode == 'enable'){
		//Trigger the Maintenance Mode Function Here
		maintenance_mode_fun();
	}else{
	
	get_header(); 
 
	if ( have_posts() ){ while (have_posts()){ the_post();
	
	global $paged,$post,$sidebar,$counter,$wp_query;	
	$ignition_date = get_post_meta($post->ID, 'ign_fund_end', true);
	$ignition_datee = date('d-m-Y h:i:s',strtotime($ignition_date));

	$ign_project_id = get_post_meta($post->ID, 'ign_project_id', true);

	$ign_fund_goal = get_post_meta($post->ID, 'ign_fund_goal', true);
	
	$thumbnail_id = get_post_thumbnail_id( $post->ID, 'ign_project_id', true );
	
	$thumbnail = wp_get_attachment_image_src( $thumbnail_id , 'full' );

	//$ign_product_image1 = get_post_meta($post->ID, 'ign_product_image1', true);

	$getPledge_cp = getPledge_cp($ign_project_id);
	$current_date = date('d-m-Y h:i:s');
	$project_date = new DateTime($ignition_datee);
	$current = new DateTime($current_date);
	$days = round(($project_date->format('U') - $current->format('U')) / (60*60*24));
	
	
	//Get Default Option for Archives, Category, Search.
	// Get Post Meta Elements detail 
	$post_social = '';
	$sidebar = '';
	$right_sidebar = '';
	$left_sidebar = '';
	$ignition_product_detail_xml = get_post_meta($post->ID, 'ignition_product_detail_xml', true);
	if($ignition_product_detail_xml <> ''){
		$cp_post_xml = new DOMDocument ();
		$cp_post_xml->loadXML ( $ignition_product_detail_xml );
		$igni_social = find_xml_value($cp_post_xml->documentElement,'igni_social');
		$sidebars = find_xml_value($cp_post_xml->documentElement,'sidebar_post');
		$right_sidebar_post = find_xml_value($cp_post_xml->documentElement,'right_sidebar_post');
		$left_sidebar_post = find_xml_value($cp_post_xml->documentElement,'left_sidebar_post');
		$post_thumbnail = find_xml_value($cp_post_xml->documentElement,'post_thumbnail');
		$video_url_type = find_xml_value($cp_post_xml->documentElement,'video_url_type');
		$select_slider_type = find_xml_value($cp_post_xml->documentElement,'select_slider_type');			
	}
	$currency = get_option('currency_code_default');
	$purchase_url = '';
	//Get Default Excerpt
	$purchaseform = '';
	$sidebar_class = '';
	$content_class = '';
	//Sidebar for archives
	$sidebar_class = sidebar_func($sidebar);
	
	//Fetch Layout Options
	$select_layout_cp = '';
	$cp_general_settings = get_option('general_settings');
	if($cp_general_settings <> ''){
		$cp_logo = new DOMDocument ();
		$cp_logo->loadXML ( $cp_general_settings );
		$select_layout_cp = find_xml_value($cp_logo->documentElement,'select_layout_cp');
	}
	
	$header_style = '';
	$header_style = get_post_meta ( $post->ID, "page-option-top-header-style", true );
	$html_class_banner = '';
	$html_class = print_header_class($header_style);
	if($html_class <> ''){$html_class_banner = 'banner';}
	//Print Style 6
	if(print_header_html_val($header_style) == 'Style 6'){
		print_header_html($header_style);
	}
	?>
	<!--Banner Start-->
		<?php 	
			$header_logo_bg = get_themeoption_value('header_logo_bg','general_settings');
			$image_src = '';
			if(!empty($header_logo_bg)){ 
				$image_src = wp_get_attachment_image_src( $header_logo_bg, 'full' );
				$image_src = (empty($image_src))? '': $image_src[0];			
			}
		?>
		<!--<div class="inner-banner">
			<img src="<?php if($image_src <> ''){echo $image_src;}else{echo CP_PATH_URL.'/images/inner-banner.jpg';}?>">
		</div>-->
	<!--Banner End--> 
	
	</header>
	<?php $breadcrumbs = get_themeoption_value('breadcrumbs','general_settings');
		if($breadcrumbs == 'enable'){?>
			<div id="inner-banner">
				<div class="container">
					<?php if(get_the_title() <> ''){?>
					  <h1><?php echo get_the_title();?></h1>
					<?php }?>
					  <!--<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>-->
					<?php
						if(!is_front_page()){
							echo cp_breadcrumbs();
						}
					?>
				</div>
			</div>
	<?php } ?>
  
	<div class="main">
		<div class="contant">
			<div class="container">
				<!--MAIN CONTANT ARTICLE START-->
				<div class="main-content causes-detail">
					<div class="single_content row">
						<?php
						if($sidebar == "left-sidebar" || $sidebar == "both-sidebar" || $sidebar == "both-sidebar-left"){?>
							<div id="block_first" class="sidebar side-bar<?php echo $sidebar_class[0];?>">
								<?php dynamic_sidebar( $left_sidebar ); ?>
							</div>
							<?php
						}
						if($sidebar == 'both-sidebar-left'){?>
						<div id="block_first_left" class="sidebar side-bar <?php echo $sidebar_class[0];?>">
							<?php dynamic_sidebar( $right_sidebar );?>
						</div>
						<?php } ?>
						<div id="<?php the_ID(); ?>" class="<?php echo $sidebar_class[1];?> ignitiondeck">
						<div <?php post_class(); ?>>
							<?php 
							if (isset($_GET['purchaseform'])) {
								echo do_shortcode('[project_purchase_form]');
							}else{  ?>
								
							<div class="blog-content"> 
							<!--Photo Post Start-->
								<div class="blog-box-1">
									<div class="thumb"><a href="#"><img src="<?php echo esc_url($thumbnail[0]);?>"></a></div>
										<div class="cp_donation-details-2">
											<div class="cp_progress-box-2">
												<div class="progress progress-info">
												  <div style="width: <?php echo getPercentRaised_cp($ign_project_id);?>%" class="bar"><span><?php echo getPercentRaised_cp($ign_project_id);?>%</span></div>
												</div>
												<span class="pull-left">$<?php echo getTotalProductFund_cp($ign_project_id);?> <?php _e('Raised','crunchpress');?></span> <span class="pull-right">$<?php echo $ign_fund_goal;?><?php _e('Goal','crunchpress');?></span> 
											</div>
											<div class="cp_donation-details">
												<ul>
												  <li><?php echo getPercentRaised_cp($ign_project_id);?>%<span><?php _e('Donated','crunchpress');?></span></li>
												  <li><?php echo $getPledge_cp[0]->p_number;?><span><?php _e('Pledgers','crunchpress');?></span></li>
												 <!-- <li>176<span>Backers</span><?php do_shortcode();?></li>
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
										<a href="<?php echo getProjectURLfromType($ign_project_id, "purchaseform");?>" class="btn-back"><?php _e('Back this','crunchpress');?><br> <?php _e('Project','crunchpress');?></a>
										<div class="bottom-row causes-detail-row">
											<div class="left"> 
											  <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" class="title"><i class="fa fa-user"></i><?php the_author(); ?></a>
											  <a href="<?php echo get_permalink();?>" class="title"><i class="fa fa-calendar"></i><?php echo get_the_date(get_option('date_format'));?></a> 
											  <?php
												//Get Post Comment 
												comments_popup_link( __('<i class="fa fa-comments-o"></i> 0 Comment','crunchpress'),
												__('<i class="fa fa-comments-o"></i> 1 Comment','crunchpress'),
												__('<i class="fa fa-comments-o"></i> % Comments','crunchpress'), '',
												__('<i class="fa fa-comments-o"></i> Comments are off','crunchpress') );										
												?>	
												<ul>
												  <li><?php the_tags('<i class="fa fa-tags"></i>', '','');?></li>
												</ul>
												<div class="share-socila">
													<strong class="title"><?php _e('Share: ','crunchpress');?></strong>
													  <ul>
														<li>
															<?php include_social_shares();?>
														</li>	
													  </ul>
												</div>
											</div>
											<div class = "text project_user_content">
												<?php echo the_content(); ?>
											</div>
											<div class="text">
												<!-- Short/Long Descriptions & Video-->
												<?php 
												$ign_project_description = get_post_meta( $post->ID, "ign_project_description", true ); 
												$ign_project_long_description = get_post_meta( $post->ID, "ign_project_long_description", true );
												$ign_product_video = get_post_meta( $post->ID, "ign_product_video", true );
												?>
												<p><?php echo html_entity_decode($ign_project_description); ?></p>
												<p><?php echo html_entity_decode($ign_project_long_description); ?></p>
												<div class = "project_video">
													<?php echo do_shortcode($ign_product_video);?>
												</div>
												<div class="faq-terms">
													<?php 
														echo do_shortcode('
														[accordion]
														[acc_item title="FAQ"]'.get_post_meta( $post->ID, "ign_faqs", true ).'[/acc_item]
														[acc_item title="Project Updates"]'.get_post_meta( $post->ID, "ign_updates", true ).'[/acc_item]
														[/accordion]');
													?>							
												</div>  
												<?php
							$project_type = get_post_meta( $post->ID, "ign_project_type", true );
							$meta_no_levels = get_post_meta( $post->ID, $name="ign_product_level_count", true );
							if($project_type == 'level-based'){
							?>
								<div class="donation-rank-box">
									<a href="<?php echo getPurchaseURLfromType($ign_project_id, "purchaseform");?>" class="btn-donation"><?php _e('Donation','crunchpress');?></a>
									<ul id="tiers">
									<?php
										
											$meta_title = stripslashes(get_post_meta( $post->ID, $name="ign_product_title", true ));
											$meta_limit = get_post_meta( $post->ID, $name="ign_product_limit", true );
											$meta_price = get_post_meta( $post->ID, $name="ign_product_price", true );
											$meta_desc = stripslashes(get_post_meta( $post->ID, $name="ign_product_details", true ));
											//print_r(getPurchaseURLfromType($post->ID, "purchaseform"));
											?>
											<li>
												  <div class="rank-box"><strong class="rank"><?php _e('Pledge','crunchpress');?> <?php echo $meta_limit;?> <?php _e('Limited','crunchpress');?> <?php echo $meta_price;?> <?php _e('Spots Only','crunchpress');?></strong></div>
												  <div class="donate-box-2"><strong class="title"><?php echo $meta_title;?></strong><a href="<?php echo getPurchaseURLfromType($ign_project_id, "purchaseform").'&level=1';?>" class="btn-donate"><?php _e('Donate','crunchpress');?></a></div>
												</li>
											<?php
											
											for ($i=2 ; $i <= $meta_no_levels ; $i++) {
												$meta_title = stripslashes(get_post_meta( $post->ID, $name="ign_product_level_".($i)."_title", true ));
												$meta_limit = get_post_meta( $post->ID, $name="ign_product_level_".($i)."_limit", true );
												$meta_price = get_post_meta( $post->ID, $name="ign_product_level_".($i)."_price", true );
												$meta_desc = stripslashes(get_post_meta( $post->ID, $name="ign_product_level_".($i)."_desc", true ));
												?>
												<li>
												  <div class="rank-box"><strong class="rank"><?php _e('Pledge','crunchpress');?> <?php echo $meta_limit;?> <?php _e('Limited','crunchpress');?> <?php echo $meta_price;?> <?php _e('Spots Only','crunchpress');?></strong></div>
												  <div class="donate-box-2"><strong class="title"><?php echo $meta_title;?></strong><a href="<?php echo getPurchaseURLfromType($ign_project_id, "purchaseform").'&level='.$i;?>" class="btn-donate"><?php _e('Donate','crunchpress');?></a></div>
												</li>
												<?php
											}
										
									?>
									</ul>
								</div>
							<?php } ?>
												<div class="blog-detail-bottom-row">
													<div class="author-box">
													  <div class="frame"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php echo get_avatar(get_the_author_meta('ID'));?></a></div>
													  <div class="text"> <strong class="title"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></strong>
														<p><?php echo mb_substr(get_the_author_meta( 'description' ),0,360);?></p>
													  </div>
													</div>
													<div class="contact-me-row"> <strong class="title"><?php _e('Connect with Me:','crunchpress');?></strong>
														<ul>
																<li><a href="mailto:<?php echo get_the_author_meta( 'email' );?>"><i class="fa fa-envelope"></i></a></li>
															
															<?php if(get_the_author_meta('dbem_phone') <> ''){ ?>
																<li><a href="<?php echo get_the_author_meta('dbem_phone');?>"><i class="fa fa-phone"></i></a></li>
															<?php } ?>
															<?php if(get_the_author_meta('twitter') <> ''){ ?>
																<li><a href="<?php echo get_the_author_meta('twitter');?>"><i class="fa fa-twitter-square"></i></a></li>
															<?php } ?>
															<?php if(get_the_author_meta('facebook') <> ''){ ?>
																<li><a href="<?php echo get_the_author_meta('facebook');?>"><i class="fa fa-facebook-square"></i></a></li>
															<?php } ?>
															<?php if(get_the_author_meta('gplus') <> ''){ ?>
																<li><a href="<?php echo get_the_author_meta('gplus');?>"><i class="fa fa-google-plus-square"></i></a></li>
															<?php } ?>
															<?php if(get_the_author_meta('linked') <> ''){ ?>
																<li><a href="<?php echo get_the_author_meta('linked');?>"><i class="fa fa-linkedin-square"></i></a></li>
															<?php } ?>
															<?php if(get_the_author_meta('skype') <> ''){ ?>
																<li><a href="<?php echo get_the_author_meta('skype');?>"><i class="fa fa-skype"></i></a></li>
															<?php } ?>
														</ul>
													</div>
													<?php comments_template(); ?>			
												</div>
											</div>
										</div>
									<!--Photo Post End--> 
								</div>			
								<div class="clearfix"></div>
								<?php }?>
							</div>
						</div>	
					<?php
					if($sidebar == "both-sidebar-right"){?>
						<div class="<?php echo $sidebar_class[0];?> side-bar">
							<?php dynamic_sidebar( $left_sidebar ); ?>
						</div>
						<?php
					}
					if($sidebar == 'both-sidebar-right' || $sidebar == "right-sidebar" || $sidebar == "both-sidebar"){?>
					<div class="<?php echo $sidebar_class[0];?> side-bar">
						<?php dynamic_sidebar( $right_sidebar );?>
					</div>
					<?php } ?>						   
				</div>
			</div>
		</div>
	</div>	
</div>
<?php 
	}
}
?>
<div class="clear"></div>
<?php get_footer(); 
}
?>