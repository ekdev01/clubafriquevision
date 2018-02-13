<?php
/*
 * This file is used to generate WordPress standard archive/category pages.
 */
get_header ();
	
	//Get Default Option for Archives, Category, Search.
	$num_excerpt = '';
	$cp_default_settings = get_option('default_pages_settings');
	
	if($cp_default_settings != ''){
		$cp_default = new DOMDocument ();
		$cp_default->loadXML ( $cp_default_settings );
		$sidebar = find_xml_value($cp_default->documentElement,'sidebar_default');
		$right_sidebar = find_xml_value($cp_default->documentElement,'right_sidebar_default');
		$left_sidebar = find_xml_value($cp_default->documentElement,'left_sidebar_default');
		$num_excerpt = find_xml_value($cp_default->documentElement,'default_excerpt');
	}	
	//Get Default Excerpt
	if($num_excerpt == ''){$num_excerpt = 250;}
	
	if(empty($paged)){
		$paged = (get_query_var('page')) ? get_query_var('page') : 1; 
	}
	global $paged,$post,$sidebar,$blog_div_size_num_class,$counter,$wp_query;	
		
		if(empty($paged)){
			$paged = (get_query_var('page')) ? get_query_var('page') : 1; 
		}
	
		$select_layout_cp = '';
		$cp_general_settings = get_option('general_settings');
		if($cp_general_settings <> ''){
			$cp_logo = new DOMDocument ();
			$cp_logo->loadXML ( $cp_general_settings );
			$select_layout_cp = find_xml_value($cp_logo->documentElement,'select_layout_cp');
		}
		
		$sidebar_class = '';
		$content_class = '';
		
		//Get Sidebar for page
		$sidebar_class = sidebar_func($sidebar);
		$header_style = '';
		//Print Style 6
		if(print_header_html_val($header_style) == 'Style 6'){
			print_header_html($header_style);
		}
		
		$html_class_banner = '';
		$html_class = print_header_class($header_style);
		
			
	if($html_class <> ''){$html_class_banner = 'banner';}
	?>
	
	<section class="<?php echo $html_class_banner;?> <?php echo $html_class;?>"></section>
	
    <div class="contant">
		 <!--Banner Start-->
			<div id="banner">
			<?php $breadcrumbs = get_themeoption_value('breadcrumbs','general_settings');
					if($breadcrumbs == 'enable'){ ?>
			  <div id="inner-banner">
				<div class="container">
				  <div class="row-fluid">
					<?php if (is_category()) { ?>
					<h1 class="h-style"><?php _e('Categories', 'crunchpress'); ?> <?php echo single_cat_title(); ?></h1>
					<?php } elseif (is_day()) { ?>
						<h1 class="h-style"><?php _e('Archive for', 'crunchpress'); ?> 
						<?php echo get_the_date(get_option("time_format")); ?></h1>
					<?php } elseif (is_month()) { ?>
						<h1 class="h-style"><?php _e('Archive for', 'crunchpress'); ?> <?php echo get_the_date(get_option("time_format")); ?></h1>
					<?php } elseif (is_year()) { ?>
						<h1 class="h-style"><?php _e('Archive for', 'crunchpress'); ?> <?php echo get_the_date(get_option("time_format")); ?></h1>
					<?php }elseif (is_search()) { ?>
						<h1 class="h-style"><?php _e('Search results for', 'crunchpress'); ?> : <?php echo get_search_query() ?></h1>
					<?php } elseif (is_tag()) { ?>
						<h1 class="h-style"><?php _e('Tag Archives', 'crunchpress'); ?> : <?php echo single_tag_title('', true); ?></h1>
					<?php }elseif (is_author()) { ?>
						<h1 class="h-style"><?php _e('Archive by Author', 'crunchpress'); ?></h1>
					<?php }?>
					
					<!--BreadCrumbs Start-->
					<?php
						if(!is_front_page()){
							echo cp_breadcrumbs();
						}
					}
					?><!--BreadCrumbs End-->
				  </div>
				</div>
			  </div>
			</div>
			<!--Banner End--> 
    	<div class="container">
            <!--MAIN CONTANT ARTICLE START-->
			<?php if($breadcrumbs == 'disable'){
				$class_margin='margin_top_cp';
			}else {
				$class_margin='';
			}
			?>
            <div class="main-content main-content-area <?php echo $class_margin;?>">
				
				<div class="single_content row-fluid">
					<?php
					if($sidebar == "left-sidebar" || $sidebar == "both-sidebar" || $sidebar == "both-sidebar-left"){?>
						<div id="block_first" class="sidebar <?php echo $sidebar_class[0];?>">
							<?php dynamic_sidebar( $left_sidebar ); ?>
						</div>
						<?php
					}
					if($sidebar == 'both-sidebar-left'){?>
					<div id="block_first_left" class="sidebar <?php echo $sidebar_class[0];?>">
						<?php dynamic_sidebar( $right_sidebar );?>
					</div>
					<?php } ?>
					<div id="archive-<?php the_ID(); ?>" class="<?php echo $sidebar_class[1];?> blog_listing blog_post_detail cp-blog">
								<div <?php post_class(); ?>>
										<?php if (is_author()) { ?>
												<!--<h2 class="heading"><?php _e('Archive by Author', 'crunchpress'); ?></h2><span class="border-line m-bottom"></span>-->
											<?php 
											if ( have_posts() ) {
												the_post();?>
												<div class="clear"></div>
												<!--DETAILED TEXT END-->
												<div class="about-admin">
													<div class="thumb">
														<?php echo get_avatar(get_the_author_meta( 'ID' ));?>
													</div>
													<div class="text">
														<h4><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
																<?php the_author(); ?>
															</a>
														</h4>
														<p><?php echo mb_substr(get_the_author_meta( 'description' ),0,360);?></p>
														<div class="share-it">
															<h5><?php _e('Follow Me','crunchpress');?></h5>
															<?php 
																$facebook = get_the_author_meta('facebook');
																$twitter = get_the_author_meta('twitter');
																$gplus = get_the_author_meta('gplus');
																$linked = get_the_author_meta('linked');
																$skype = get_the_author_meta('skype');
															?>
															<?php if($facebook <> ''){ ?><a title="" data-toggle="tooltip" href="<?php echo $facebook;?>" data-original-title="facebook"><i class="fa fa-facebook"></i></a><?php }?>
															<?php if($twitter <> ''){ ?><a title="" data-toggle="tooltip" href="<?php echo $twitter;?>" data-original-title="Twitter"><i class="fa fa-twitter"></i></a><?php }?>
															<?php if($gplus <> ''){ ?><a title="" data-toggle="tooltip" href="<?php echo $gplus;?>" data-original-title="Google Plus"><i class="fa fa-google-plus"></i></a><?php }?>
															<?php if($linked <> ''){ ?><a title="" data-toggle="tooltip" href="<?php echo $linked;?>" data-original-title="Linkedin"><i class="fa fa-linkedin"></i></a><?php }?>
															<?php if($skype <> ''){ ?><a title="" data-toggle="tooltip" href="<?php echo $skype;?>" data-original-title="skype"><i class="fa fa-skype"></i></a><?php }?>
														</div>
													</div>
												</div>
												<div class="clear"></div>
											<?php
											} wp_reset_query();
										}
										if ( have_posts() ) : while ( have_posts() ) : the_post();
											//Image dimenstion
										global $post, $post_id;	
										$mask_html = '';
										$no_image_class = 'no-image';
										if(get_the_post_thumbnail($post_id, array(1170,350)) <> ''){
											$mask_html = '<div class="mask">
												<a href="'.get_permalink().'#comments" class="anchor"><span> </span> <i class="fa fa-comment"></i></a>
												<a href="'.get_permalink().'" class="anchor"> <i class="fa fa-link"></i></a>
											</div>';
											$no_image_class = 'image-exists';
										}	
										$arc_div_archive_listing_class = array("Full-Image" => array("index"=>"1", "class"=>"sixteen ", "size"=>array(1170,420), "size2"=>array(770, 400), "size3"=>array(570,300)));
										$item_type = 'Full-Image';
										$item_class = $arc_div_archive_listing_class[$item_type]['class'];
										$item_index = $arc_div_archive_listing_class[$item_type]['index'];		
										if( $sidebar == "no-sidebar" ){
											$item_size = $arc_div_archive_listing_class[$item_type]['size'];
										}else if ( $sidebar == "left-sidebar" || $sidebar == "right-sidebar" ){
											$item_size = $arc_div_archive_listing_class[$item_type]['size2'];
										}else{
											$item_size = $arc_div_archive_listing_class[$item_type]['size3'];
										}
										//print_r($item_size);
										?>
										<!--BLOG LIST ITEM START-->
										<div <?php post_class($item_class); ?>>
											<div class="blog-box-1">
												<?php if(get_the_post_thumbnail($post->ID,array(1170,350)) <> ''){ ?><div class="frame"><?php echo get_the_post_thumbnail($post->ID,array(1170,350));?></div><?php }?>
												
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
													
													<?php 
													//Excerpt Function for Listing
													the_content();
													?>
													
														
													
												</div>
											</div>
										</div>	
										<!--BLOG LIST ITEM END-->
											<?php 
										//End while
										endwhile; 
										//Condition Ends
										endif;
										//Pagination
										pagination();
									?>
									</div>
							</div>	
					<?php
					if($sidebar == "both-sidebar-right"){?>
						<div class="<?php echo $sidebar_class[0];?>">
							<?php dynamic_sidebar( $left_sidebar ); ?>
						</div>
						<?php
					}
					if($sidebar == 'both-sidebar-right' || $sidebar == "right-sidebar" || $sidebar == "both-sidebar"){?>
					<div class="<?php echo $sidebar_class[0];?>">
						<?php dynamic_sidebar( $right_sidebar );?>
					</div>
					<?php } ?>						   
				</div>
			</div>
		</div>
	</div>	
<div class="clear"></div>
<?php get_footer(); ?>