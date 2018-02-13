<?php

	/*	
	*	CrunchPress Options File
	*	---------------------------------------------------------------------
	* 	@version	1.0
	* 	@author		CrunchPress
	* 	@link		http://crunchpress.com
	* 	@copyright	Copyright (c) CrunchPress
	*	---------------------------------------------------------------------
	*	This file contains the CrunchPress panel elements and create the 
	*	CrunchPress panel at the back-end of the framework
	*	---------------------------------------------------------------------
	*/
	

add_action('wp_ajax_dummydata_import','dummydata_import');
function dummydata_import(){
	
	foreach ($_REQUEST as $keys=>$values) {
		$$keys = trim($values);
	}
	
	$return_data = array('success'=>'-1', 'alert'=>'Save option failed, please try contacting your host provider to increase the post_max_size and suhosin.post.max_vars varialble on the server.');?>
<div class="cp-wrapper bootstrap_admin cp-margin-left"> 

    <!--content area start -->	  
	<div class="hbg top_navigation row-fluid">
		<div class="cp-logo span2">
			<img src="<?php echo CP_PATH_URL;?>/framework/images/logo.png" class="logo" />
		</div>
		<div class="sidebar span10">
			<?php echo top_navigation_html_tooltip();?>
		</div>
	 <?php //echo top_navigation_html(); ?>
	</div>
	<div class="content-area-main row-fluid"> 
	
      <!--sidebar start -->
      <div class="sidebar-wraper span2">
        <div class="sidebar-sublinks">
				<ul id="wp_t_o_right_menu">
					<li class="news_letter" id="active_tab"><?php _e('Dummy Content Settings', 'crunchpress'); ?></li>
				</ul>
        </div>
      </div>
      <!--sidebar end --> 
		<div class="content-area span10">
		<?php //echo top_navigation_html(); ?>
			<div class="wrapper_right themeple_container">
				<ul class="newsletter_class">
					<li id="news_letter" class="active_tab">
						<ul class="download_newsletter recipe_class row-fluid">
							<li class="panel-input span8">
								<span class="panel-title">
									<h3><?php _e('Import Dummy Content', 'crunchpress'); ?> </h3>
								</span>
								<input type="hidden" value="<?php echo wp_create_nonce ('themeple_nonce_import_dummy_data');?>" name="themeple-nonce-dummy">
								<a class="themeple_btn themeple_btn_active themeple_dummy_data"><input type="button" value="<?php _e('Import Content', 'crunchpress'); ?>" id="importcontent" /></a>
								<div class="js_data" id="themeple_js_data">
									<input type="hidden" value="<?php echo admin_url("admin-ajax.php");?>" name="admin_ajax_url">						
								</div>
								<span class="loading"></span>
							</li>
							<li class="span4 right-box-sec"><p><?php _e('Click on Import button to import your theme dummy content, After Clicking here everything will be set as demo. <br /><br />Note: If dummy content display any error please make sure your Allowed memory size greater than 64MB.','crunchpress');?></p></li>
						</ul>
					</li>
				</ul>	
			</div>	
		</div>
	</div>				
</div>	
</div>		
	<?php
}	



?>
