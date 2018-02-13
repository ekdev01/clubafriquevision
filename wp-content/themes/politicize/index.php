<?php
/*
 * This file is used to generate main index page.
 */
					
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

		@get_header();
		
		global $post,$post_id;
		$item_class = '';
		$header_style = '';
		$header_style = get_post_meta ( $post->ID, "page-option-top-header-style", true );
		$print_header_class = print_header_class($header_style);
		//Print Style 6
		// if(print_header_html_val($header_style) == 'Style 6'){
			// print_header_html($header_style);
		// }
		
		//Print Style 6
		if(print_header_html_val($header_style) == 'Style 6'){
			print_header_html($header_style);
		}
		?>
		<section class="<?php if($print_header_class <> ''){ echo 'banner'.' '.$print_header_class;}?>"></section>
		<div class="contant">
			<div class="container">
				 <!--BREADCRUMS START-->
				<div class="breadcrumb-section">
					<?php 
					$breadcrumbs = get_themeoption_value('breadcrumbs','general_settings');
					if($breadcrumbs == 'enable'){ ?>
				   <?php
					if(!is_front_page()){
						cp_breadcrumbs();
						}
					}
				   ?>
				</div>
				<!--BREADCRUMS END-->
				<!--MAIN CONTANT ARTICLE START-->
				<div class="main-content">
					<div class="single_content row-fluid blog_listing">
						<div id="<?php the_ID(); ?>" class="blog_post_detail">
									<?php
									//Feature Sticky Post	
										if ( is_front_page() && cp_has_featured_posts() ) {
											// Include the featured content template.
											get_template_part( 'featured-content' );
										}
										$mask_html = '';
										$no_image_class = 'no-image';
									?>
									<?php while ( have_posts() ) : the_post();
										//If image exists print its mask
											$mask_html = '';
											$no_image_class = 'no-image';
											if(get_the_post_thumbnail($post_id, array(1170,350)) <> ''){
												$mask_html = '<div class="mask">
													<a href="'.get_permalink().'#comments" class="anchor"><span> </span> <i class="fa fa-comment"></i></a>
													<a href="'.get_permalink().'" class="anchor"> <i class="fa fa-link"></i></a>
												</div>';
												$no_image_class = 'image-exists';
											}	
									?>
										<!--BLOG LIST ITEM START-->
										<div <?php post_class(); ?>>
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
													
													<?php 
													//Excerpt Function for Listing
													the_content();
													?>
													
														
													
												</div>
											</div>
										</div>	
										<!--BLOG LIST ITEM END-->
								<?php endwhile; pagination();?>
						</div>
					</div>
				</div>	
			</div>
		</div>	
<?php 
		//Reset all data now
		wp_reset_query();
		wp_reset_postdata();
			
		@get_footer();
}
 ?>