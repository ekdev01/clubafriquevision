<?php
	/*
	 * This file will generate 404 error page.
	 */	
get_header(); 


//Get Theme Options for Page Layout
$select_layout_cp = '';
$cp_general_settings = get_option('general_settings');
if($cp_general_settings <> ''){
	$cp_logo = new DOMDocument ();
	$cp_logo->loadXML ( $cp_general_settings );
	$select_layout_cp = find_xml_value($cp_logo->documentElement,'select_layout_cp');
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
							<h1><?php _e('404 Page Not Found!','crunchpress');?></h1>
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
    
    <!--404 Page Start-->
    <section class="error-page <?php echo $class_margin;?>">
      <div class="container">
        <div class="holder">
          <h2><?php _e('404','crunchpress');?><span>!</span></h2>
          <div class="error-heading">
            <h3><?php _e('Page Not Found!','crunchpress');?></h3>
          </div>
          <strong class="title"><?php _e('It seems we can not find what you are looking for.','crunchpress');?></strong>
			<form class="search error-form" method="get" id="searchform-four-o-four" action="<?php  echo home_url(); ?>/">
				<input  name="s" value="<?php the_search_query(); ?>" placeholder="Search Here" autocomplete="off" type="text" class="text error-field">
				<button class="error-search-btn" type="submit"><i class="fa fa-search"></i></button>
			</form>		
        </div>
      </div>
    </section>
    <!--404 Page End--> 
  </div>
  <!-- Main End--> 


<?php get_footer();?>
