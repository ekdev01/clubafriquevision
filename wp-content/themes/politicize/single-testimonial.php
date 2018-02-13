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
		<div class="inner-headding">
			<div id="banner">
			<?php $breadcrumbs = get_themeoption_value('breadcrumbs','general_settings');
			if($breadcrumbs == 'enable'){?>
				<div id="inner-banner">
					<div class="container">
						<div class="row-fluid">
							<?php if(get_the_title() <> ''){ ?><h1><?php echo get_the_title();?></h1><?php }?>
							<!-- BreadCrumb Start-->
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
		</div>
		<!--Inner Pages Heading Area End--> 
	<?php if($breadcrumbs == 'disable'){
				$class_margin='margin_top_cp';
			}else {
				$class_margin='';
			}
	?>
		<div class="blog-page <?php echo $class_margin;?>">
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
					<div id="<?php the_ID(); ?>" class="<?php echo $sidebar_class[1];?> blog-content <?php echo $thumbnail_types;?>">
						<div class="blog-box-1">
							<?php if(print_blog_thumbnail($post->ID,$image_size) <> ''){ ?>
							<div class="frame"><?php echo print_blog_thumbnail($post->ID,$image_size);?></div><?php }?>
								<div class="bottom-row">
									<div class="left"> 
										<a href="<?php echo get_permalink();?>" class="title"><i class="fa fa-calendar"></i><?php echo get_the_date(get_option('date_format'));?></a>
											<?php
												//Get Post Comment 
												comments_popup_link( __('<i class="fa fa-comments-o"></i> 0 Comment','crunchpress'),
												__('<i class="fa fa-comments-o"></i> 1 Comment','crunchpress'),
												__('<i class="fa fa-comments-o"></i> % Comments','crunchpress'), '',
												__('<i class="fa fa-comments-o"></i> Comments are off','crunchpress') );										
											?>										
										<a href="<?php echo get_permalink();?>" class="title"><i class="fa fa-user"></i><?php echo get_the_author();?></a>
										<ul>
											<li class="post_tags"><?php the_tags('<i class="fa fa-tags"></i>','','');?></li>
										</ul>
										<ul class="pull-right post_category">
											<li class="post_tags">
											<?php 
												//$tags_post = wp_get_post_tags($post->ID,'timeline-tag');
												$tags_post = wp_get_object_terms($post->ID, 'category');
												$count_tag = 0;
												foreach($tags_post as $tag){
													if($count_tag == 0){echo '<i class="fa fa-tasks"></i>';}$count_tag++;
													echo '<a href="'.get_term_link($tag->slug, 'category').'">'.$tag->name.'</a>';
												}
											?>
											</li>
										</ul>
									</div>
								</div>
								<div class="text">
									<?php if(get_the_title() <> ''){ ?><h2><?php echo get_the_title();?></h2><?php }?>
									<?php the_content();?>
								</div>
							
								<div class="blog-detail-bottom-row">
									<div class="share-socila">
										<strong class="title"><?php _e('Share Post','crunchpress');?></strong>
									  <ul>
										<li>
											<?php include_social_shares();?>
										</li>	
									  </ul>
									  
									</div>
								</div>
							
								<div class="author-box">
									<h4><?php _e('About Author','crunchpress');?></h4>
									<div class="frame">
										<a href="<?php echo get_permalink();?>"><?php echo get_avatar(get_the_author_meta('ID'));?></a>
									</div>
									<div class="text">
										<strong class="title"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></a></strong>
										<p><?php echo mb_substr(get_the_author_meta( 'description' ),0,360);?></p>
									</div>
								</div>
								<div class="contact-me-row"> <strong class="title"><?php _e('Connect with Me:','crunchpress');?></strong>
									<ul>
											<li><a href="mailto:<?php echo get_the_author_meta( 'email' );?>"><i class="fa fa-envelope"></i></a></li>
										<?php if(get_the_author_meta('url') <> ''){ ?>
											<li><a href="<?php echo get_the_author_meta('url');?>"><i class="fa fa-sitemap"></i></a></li>
										<?php } ?>
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
	</div>
<?php 
	}
}
?>
<div class="clear"></div>
<?php get_footer(); ?>