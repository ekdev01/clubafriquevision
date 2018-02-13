<?php get_header(); 
 if ( have_posts() ){ while (have_posts()){ the_post();
	
	global $post;
	
	$team_social = '';
	$sidebar = '';
	$left_sidebar = '';
	$right_sidebar = '';
	$team_designation = '';
	// Get Post Meta Elements detail 
	$team_detail_xml = get_post_meta($post->ID, 'team_detail_xml', true);
	if($team_detail_xml <> ''){
		$cp_team_xml = new DOMDocument ();
		$cp_team_xml->loadXML ( $team_detail_xml );
		$team_social = find_xml_value($cp_team_xml->documentElement,'team_social');
		$sidebar = find_xml_value($cp_team_xml->documentElement,'sidebar_team');
		$left_sidebar = find_xml_value($cp_team_xml->documentElement,'left_sidebar_team');
		$right_sidebar = find_xml_value($cp_team_xml->documentElement,'right_sidebar_team');
		$team_designation = find_xml_value($cp_team_xml->documentElement,'team_designation');
		$team_facebook = find_xml_value($cp_team_xml->documentElement,'team_facebook');
		$team_linkedin = find_xml_value($cp_team_xml->documentElement,'team_linkedin');
		$team_twitter = find_xml_value($cp_team_xml->documentElement,'team_twitter');
	}
	
	$select_layout_cp = '';
	$cp_general_settings = get_option('general_settings');
	if($cp_general_settings <> ''){
		$cp_logo = new DOMDocument ();
		$cp_logo->loadXML ( $cp_general_settings );
		$select_layout_cp = find_xml_value($cp_logo->documentElement,'select_layout_cp');
	}
	
	//Get Sidebar for page
	$sidebar_class = sidebar_func($sidebar);
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
	
    <div class="contant">
	<!--Inner Pages Heading Area Start-->
    <section class="inner-headding">
      <div id="banner">
	  <?php $breadcrumbs = get_themeoption_value('breadcrumbs','general_settings');
		if($breadcrumbs == 'enable'){?>
			<div id="inner-banner">
				<div class="container">
					<div class="row-fluid">
						<h1><?php echo get_the_title();?></h1>
						<!-- Breadcrumb Start -->
						<?php
							if(!is_front_page()){
								echo cp_breadcrumbs();
							}
						}
						?>
					</div>
				</div>
			</div>
		</div>
    </section>
    <!--Inner Pages Heading Area End--> 
    	<div class="container">
			<!--MAIN CONTANT ARTICLE START-->
			<?php if($breadcrumbs == 'disable'){
				$class_margin='margin_top_cp_team';
			}else {
				$class_margin='team_bottom_margin';
			}
			?>
            <div class="main-content <?php echo $class_margin;?>">
				<div class="team-content row-fluid">
					<?php
					if($sidebar == "left-sidebar" || $sidebar == "both-sidebar" || $sidebar == "both-sidebar-left"){?>
						<div id="block_first" class="sidebar side-bar <?php echo $sidebar_class[0];?>">
							<?php dynamic_sidebar( $left_sidebar ); ?>
						</div>
						<?php
					}
					if($sidebar == 'both-sidebar-left'){?>
					<div id="block_first_left" class="sidebar side-bar <?php echo $sidebar_class[0];?>">
						<?php dynamic_sidebar( $right_sidebar );?>
					</div>
					<?php } ?>
					<?php $image_size = array('1170','350');?>
					<!--Blog Detail Page Page Start-->
					<div id="<?php the_ID(); ?>" class="<?php echo $sidebar_class[1];?> team_detail_cp ">
						<div <?php post_class(); ?>>
							<div class="first mbtm2 outer_lyr">
								<div class="inner_lyr">
									<div class="section_content"> 
										<div class="span3 first img">
										<?php
											//Image Size
											$item_size = array(350, 350);
											$thumbnail_id = get_post_thumbnail_id( $post->ID );
											$thumbnail = wp_get_attachment_image_src( $thumbnail_id , $item_size );
											if($thumbnail[1].'x'.$thumbnail[2] == '350x350'){
												echo '<figure class="img_team_feature">'.get_the_post_thumbnail($post->ID, array(350, 350)).'</figure>';
											}else{
												echo '<figure class="img_team_feature">'.get_the_post_thumbnail($post->ID, array(150, 150)).'</figure>';
											}
											echo '<div class="sermon-detail-row">';
												//Post Social Sharing 
												if($team_social == "enable"){
													echo include_social_shares();
													echo "<div class='clear'></div>";
												}
											echo '</div>';?>	
											<div class="desi_section">
												<span><?php echo __( 'Designation:', 'crunchpress' )?></span>
												<h4><?php echo $team_designation;?></h4>
											</div>
										</div>
										<div class="span9"> 
											<h3 class="h-style"><?php echo get_the_title();?></h3>
											<?php 
												the_content();
												wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'crunchpress' ) . '</span>', 'after' => '</div>' ) );
											?>
											<div class="socialicons">
												<?php if(isset($team_facebook) AND $team_facebook <> ''){?>
												<a title="Facebook Sharing" href="<?php echo $team_facebook;?>" class="social_active" id="fb_hr">
													<span class="da-animate da-slideFromLeft"></span>
												</a>
												<?php }?>
												<?php if(isset($team_twitter) AND $team_twitter <> ''){?>
												<a title="Twitter Sharing" href="<?php echo $team_twitter;?>" class="social_active" id="twitter_hr">
													<span class="da-animate da-slideFromLeft"></span>
												</a>
												<?php }?>
												<?php if(isset($team_linkedin) AND $team_linkedin <> ''){?>
												<a title="Linked In Sharing" href="<?php echo $team_linkedin;?>" class="social_active" id="linked_hr">
													<span class="da-animate da-slideFromLeft"></span>
												</a>
												<?php }?>
											</div>	
										</div>
									</div>
								</div>
							</div>
							<div class="clear"></div>
						</div>
					</div>
					<!--Blog Detail Page Page End--> 
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
<?php 
	}
}
?>
<div class="clear"></div>
<?php get_footer(); ?>