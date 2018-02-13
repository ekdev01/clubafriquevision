<?php
/**
 * Template Name: 404 Layout 2
 * Author: CrunchPress
 * Team: Crunchpress Team
 */

get_header(); 
	global $post;
	
	 $sidebar = get_post_meta ( $post->ID, 'page-option-sidebar-template', true );
	$sidebar_class = '';
	$content_class = '';
	$sidebar_class = sidebar_func($sidebar);

	$slider_off = '';
	$slider_type = '';
	$slider_slide = '';
	$slider_height = '';
	
	//Fetch the data from page
	$left_sidebar = get_post_meta ( $post->ID, "page-option-choose-left-sidebar", true );
	$right_sidebar = get_post_meta ( $post->ID, "page-option-choose-right-sidebar", true );
	$slider_off = get_post_meta ( $post->ID, "page-option-top-slider-on", true );
	$slider_type = get_post_meta ( $post->ID, "page-option-top-slider-types", true );
	$slider_type_album = get_post_meta ( $post->ID, "page-option-top-slider-album", true );
	$page_builder_full = get_post_meta ( $post->ID, "cp-show-full-layout", true );
	$cp_page_title = get_post_meta ( $post->ID, "page-option-item-page-title", true );
	
	
	//Fetch the data from page
	if($slider_off <> 'Yes'){
		$thumbnail_id = get_post_thumbnail_id( $post->ID );
		if($thumbnail_id <> ''){
			$thumbnail = wp_get_attachment_image_src( $thumbnail_id , 'full' );
			$html_thumb = 'style="background-image:url('.$thumbnail[0].') !important"';
		}else{
			$html_thumb = '';
		}
		
		$header_style = get_post_meta ( $post->ID, "page-option-top-header-style", true );
		$html_class = print_header_class($header_style);
		
	}else{
		$html_class = 'banner';
		$html_thumb = '';

		
		
	}
	$header_style = get_post_meta ( $post->ID, "page-option-top-header-style", true );
	add_header_bg($header_style);
	
?>
	<!--BANNER SECTION START-->
    <section class="<?php if($html_class <> ''){ echo 'banner'.' '.$html_class;}?>" <?php echo $html_thumb;?>>
    
    </section>
    <!--BANNER SECTION END-->
    <!--CONTANT SECTION START-->
	
    <section class="contant">
		<div class="container">
            <!--BREADCRUMS START-->
            <div class="breadcrumb-section ">
			<?php 
			$breadcrumbs = get_themeoption_value('breadcrumbs','general_settings');
			if($breadcrumbs == 'enable'){ ?>
               <?php
				if(!is_front_page()){				
					echo cp_breadcrumbs();
				}
			}
				?>
            </div>
		</div>	
        <article class="main-content">
        	<div class="container">
            	<h2 class="h-style"><?php _e('404','crunchpress');?></h2>
                <div class="error-404">
                	<h1><?php _e('404 -Page Not found !','crunchpress');?></h1>
                    <p><?php _e("You've tried to reach a page that doesn't exist or has moved.","crunchpress");?></p>
                    <a href="<?php  echo home_url(); ?>"><?php _e('Back Home','crunchpress');?></a>
                </div>
            </div>
        </article>
    
    <!--CONTANT SECTION END-->
<?php get_footer();?>