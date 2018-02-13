<?php get_header(); ?>
<?php if ( have_posts() ){ while (have_posts()){ the_post();
	global $post;
	
	// Get Post Meta Elements detail 
	$post_social = '';
	$sidebar = '';
	$right_sidebar = '';
	$left_sidebar = '';
	$thumbnail_types = '';
	
	$post_format = get_post_meta($post->ID, 'post_format', true);
	//$post_detail_xml = get_post_meta($post->ID, 'post_detail_xml', true);
	$port_detail_xml = get_post_meta($post->ID, 'port_detail_xml', true);
	if($port_detail_xml <> ''){
		$cp_team_xml = new DOMDocument ();
		$cp_team_xml->loadXML ( $port_detail_xml );
		$post_social = find_xml_value($cp_team_xml->documentElement,'post_social');
		$sidebar = find_xml_value($cp_team_xml->documentElement,'sidebars_port');
		$right_sidebar = find_xml_value($cp_team_xml->documentElement,'right_sidebar_port');
		$left_sidebar = find_xml_value($cp_team_xml->documentElement,'left_sidebar_port');
		$thumbnail_types = find_xml_value($cp_team_xml->documentElement,'post_thumbnail');
		$video_url_type = find_xml_value($cp_team_xml->documentElement,'video_url_type');
		$select_slider_type = find_xml_value($cp_team_xml->documentElement,'select_slider_type');	
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
	<?php 
		$breadcrumbs = get_themeoption_value('breadcrumbs','general_settings');
		if($breadcrumbs == 'enable'){ ?>
		<div id="banner">
			<div id="inner-banner">
				<div class="container">
					<div class="row-fluid">
						<h1><?php echo get_the_title();?></h1>
						<!--breadcrumb start-->
						<?php
							if(!is_front_page()){
							echo cp_breadcrumbs();
							}
						}
						?>
						<!---Caption Required Here! -->
						<!--<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>-->
					</div>
				</div>
			</div>
		</div>
    </section>
    <!--Inner Pages Heading Area End--> 
	 <section class="blog-page">
    	<div class="container">
			<!--MAIN CONTANT ARTICLE START-->
            <!--<div class="main-content">-->
				<div class="row-fluid">
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
					<?php $image_size = array(1170,350);?>
					<!--Blog Detail Page Page Start-->
					<?php if($breadcrumbs == 'disable'){
						$class_margin='margin_top_cp';
					}else {
						$class_margin='';
					}
					?>
					<div id="<?php the_ID(); ?>" class="<?php echo $sidebar_class[1];?> timeline-project-box timeline-detail <?php echo $class_margin;?><?php echo $thumbnail_types;?>">
						<div class="blog-box-1">
								
								<div class="holder">
									<div class="heading-area">
									<?php 
										//$tags_post = wp_get_post_tags($post->ID,'timeline-tag');
										$tags_post = wp_get_object_terms($post->ID, 'timeline-category');
										$count_tag = 0;
										foreach($tags_post as $tag){											
											if($count_tag == 0){echo '<a href="'.get_term_link($tag->slug, 'timeline-category').'">'.$tag->name.'</a>';}$count_tag++;
										}
										
										//$tags_post = wp_get_post_tags($post->ID,'timeline-tag');
										// $tags_post = wp_get_object_terms($post->ID, 'timeline-tag');
										// $count_tag = 0;
										// foreach($tags_post as $tag){											
											// echo '<a href="'.get_term_link($tag->slug, 'timeline-tag').'">'.$tag->name.'</a>';
										// }
										?>
									</div>
									<?php if(get_the_post_thumbnail($post->ID,$image_size) <> ''){ ?>
									<div class="frame"><?php echo get_the_post_thumbnail($post->ID, $image_size);?></div>
								<?php }?>
								</div>
								<div class="text">
									<h2><?php echo get_the_title();?></h2>
									<?php the_content();?>
								</div>
								<div class="clear clearfix"></div>
								<?php 
								//get_related_tag_posts_ids($post->ID,5);
								echo related_timeline($post);?>
							<?php //comments_template(); ?>						
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
			<!--</div>-->
		</div>
	</section>
</div>	
<?php 
	}
}
?>
<div class="clear"></div>
<?php get_footer(); ?>