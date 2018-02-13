<?php
/**
 * Template Name: 404 Layout 1
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
		
		if(print_header_html_val($header_style) == 'Style 6'){
			print_header_html($header_style);
		}
		
		$html_class = print_header_class($header_style);
		
	}else{
		$html_class = 'banner';
		$html_thumb = '';
	}
	// $header_style = get_post_meta ( $post->ID, "page-option-top-header-style", true );
	// add_header_bg($header_style);
	
?>
	
    <!--CONTANT SECTION START-->
    <section class="contant">
		<div class="container">
            <!--BREADCRUMS START-->
            <div class="breadcrumb-section ">
			<?php 
			$breadcrumbs = get_themeoption_value('breadcrumbs','general_settings');
			if($breadcrumbs == 'enable'){ ?>
				 <!--Banner Start-->
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
				<div class="error-404 search-result">
                	<h1><?php _e('Page Not Found!','crunchpress');?></h1>
                    <h3><?php _e('Page you are looking for has been removed. Back to HOME','crunchpress');?></h3>
					<form class="search searchform-default" method="get" id="searchform-four-o-four" action="<?php  echo home_url(); ?>/">
						<input  name="s" value="<?php the_search_query(); ?>" placeholder="Search Here" autocomplete="off" type="text" class="text error-field">
						<button type="submit"><i class="fa fa-search"></i></button>
					</form>		
                </div>
            </div>
        </article>
<!--content-separator-->
<?php get_footer();?>